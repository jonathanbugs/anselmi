<?

require_once '../configs/config.php';

function moip_log($msg)
{

  $msg = "\n\n".date('[d/m/Y H:i:s] ') . $msg . "\n\n---\n";
      $fp = fopen("moip.log", "a");
        $escreve = fwrite($fp, $msg);
          fclose($fp);
}
if ($_POST) {
  moip_log('Recebendo dados via POST, estes dados serão verificados pelo Moip: '.print_r($_POST, true));
}


$arrayStatus = array(1 => array('AUTORIZADO', ID_SITUACAO_PEDIDO_APROVADO_CREDITO), 
					  2 => array('INICIADO', ID_SITUACAO_PEDIDO_ANALISE_CREDITO), 
					  3 => array('BOLETO IMPRESSO', ID_SITUACAO_PEDIDO_ANALISE_CREDITO), 
					  4 => array('CONCLUIDO', ID_SITUACAO_PEDIDO_APROVADO_CREDITO),
					  5 => array('CANCELADO', ID_SITUACAO_PEDIDO_CANCELADO), 
					  6 => array('EM ANALISE', ID_SITUACAO_PEDIDO_ANALISE_CREDITO),
					  7 => array('ESTORNADO', ID_SITUACAO_PEDIDO_ESTORNADO),
					  9 => array('REEMBOLSADO', ID_SITUACAO_PEDIDO_REEMBOLSADO)
					);

					  
if(isset($_POST["status_pagamento"])){

	$numeroPedido = sqlvalue($_POST["id_transacao"], true);
	$situacaoMoip = $_POST["status_pagamento"];

	if($arrayStatus[$situacaoMoip][1] == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){
		$where = "AND SPIT_ID_SITUACAO_PEDIDO_ITEM IN (".ID_SITUACAO_PEDIDO_DIGITACAO.", ".ID_SITUACAO_PEDIDO_TIMEOUT.", ".ID_SITUACAO_PEDIDO_ANALISE_CREDITO.")";
	} else {
		$where = "";
	}

	$queryUpdate = "UPDATE e_PEDIDO_ITEM 
					SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".$arrayStatus[$situacaoMoip][1].", DATA_UPDATE = now(), USUARIO_UPDATE = 'RETORNO_MOIP'  
					WHERE PEDI_ID_PEDIDO = (SELECT ID_PEDIDO FROM e_PEDIDO WHERE NUMERO_PEDIDO = ".$numeroPedido.")
					".$where."";
	
	$mysqli->ExecutarSQL($queryUpdate);

	if($arrayStatus[$situacaoMoip][1] == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){
		$idPedidoPagamento = explode('-',$_POST["id_transacao"]);
		$idPedidoPagamento = sqlvalue($idPedidoPagamento[1], false);
		$queryPagamento = "UPDATE e_PEDIDO_PAGAMENTO SET DATA_AUTORIZACAO = now(), TRANSACAO_AUTORIZADA = 'S', USUARIO_AUTORIZACAO = 'MOIP'
							WHERE ID_PEDIDO_PAGAMENTO = ".$idPedidoPagamento." AND DATA_AUTORIZACAO IS NULL AND ATIVO = 'S'";
		$mysqli->ExecutarSQL($queryPagamento);
	}

	if($arrayStatus[$situacaoMoip][1] == ID_SITUACAO_PEDIDO_CANCELADO or $arrayStatus[$situacaoMoip][1] == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){
		
		$query = "SELECT
						PEDI.ID_PEDIDO,
						PESS.NOME,
						PESS.EMAIL
					FROM
						e_PEDIDO PEDI,
						e_PESSOA PESS
					WHERE
						PEDI.NUMERO_PEDIDO = ".$numeroPedido."
					AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA";

		$result	= $mysqli->ConsultarSQL($query);		
		
		enviaEmail('situacaoPedido', $result[0]['NOME'], $result[0]['EMAIL'], null, $result[0]['ID_PEDIDO']);
	
	}

	$query = "INSERT INTO e_RETORNO_PAGAMENTO_MOIP
           (ID_TRANSACAO
           ,VALOR
           ,SITUACAO
           ,STATUS_PAGAMENTO
           ,COD_MOIP
           ,FORMA_PAGAMENTO
           ,TIPO_PAGAMENTO
           ,PARCELAS
           ,EMAIL_CONSUMIDOR
           ,CLASSIFICACAO
           ,CARTAO_BIN
           ,CARTAO_FINAL
           ,CARTAO_BANDEIRA
           ,COFRE
           ,DATA_INSERT
           ,USUARIO_INSERT)
     VALUES
           (".sqlvalue($_POST['id_transacao'], true).",
		    ".sqlvalue($_POST['valor'], true).",
		    ".sqlvalue($arrayStatus[$situacaoMoip][0], true).",
		    ".sqlvalue($_POST['status_pagamento'], true).",
		    ".sqlvalue($_POST['cod_moip'], true).",
		    ".sqlvalue($_POST['forma_pagamento'], true).",
		    ".sqlvalue($_POST['tipo_pagamento'], true).",
		    ".sqlvalue($_POST['parcelas'], true).",
		    ".sqlvalue($_POST['email_consumidor'], true).",
		    ".sqlvalue($_POST['classificacao'], true).",
		    ".sqlvalue($_POST['cartao_bin'], true).",
		    ".sqlvalue($_POST['cartao_final'], true).",
		    ".sqlvalue($_POST['cartao_bandeira'], true).",
		    ".sqlvalue($_POST['cofre'], true).",
		    now(),
		    'RETORNO_MOIP')
	";
	$mysqli->ExecutarSQL($query);
}


?>