<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require('../configs/config.php');
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'exportaArquivo':

		$ID_PEDIDO_ITEM_SITUACAO = implode(',', $_POST['situacaoPedido']);
		$DATA_DE = implode('-', array_reverse(explode('/', $_POST['dataDe'])))." 00:00:00";
		$DATA_ATE = implode('-', array_reverse(explode('/', $_POST['dataAte'])))." 23:59:59";

		$busca = "";
		//$_POST['busca'] = 'paul';
		if ( isset($_POST['busca']) && $_POST['busca'] != "" )
		{
			$_busca = "'%".$_POST["busca"]."%'";
			$busca = " AND (";
			$busca .= "PEDI.NUMERO_PEDIDO LIKE ".$_busca." OR
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO LIKE ".$_busca." OR
						FOPA.DESCRICAO_FORMA_PAGAMENTO LIKE ".$_busca." OR
						PESS.NOME LIKE ".$_busca." OR
						PESS.SOBRENOME LIKE ".$_busca." OR
						PESS.CPF LIKE ".$_busca." OR
						PESS.EMAIL LIKE ".$_busca."";
			$busca .= ") ";
		}

		$query = "SELECT
					-- PEDIDO
					SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE) VALOR_TOTAL, PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO SITUACAO, CONVERT(CHAR, PEDI.DATA_EMISSAO, 103) DATA, PEDI.NUMERO_PEDIDO,
					-- PAGAMENTO
					FOPA.DESCRICAO_FORMA_PAGAMENTO, PEPA.NUMERO_PARCELAS,
					-- PESSOA
					PESS.NOME, PESS.SOBRENOME, PESS.CPF, PESS.EMAIL,
					-- CAMPANHA
					PRCA.DESCRICAO_PROMOCAO, CARR.URL_ORIGEM
				FROM
					e_PEDIDO PEDI LEFT JOIN e_PROMOCAO_CARRINHO PRCA
										ON PEDI.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO,
					e_PEDIDO_ITEM PEIT,
					e_PEDIDO_ITEM_SITUACAO PISI,
					e_PEDIDO_PAGAMENTO PEPA,
					e_FORMA_PAGAMENTO FOPA,
					e_PESSOA PESS,
					e_CARRINHO CARR
				WHERE
					PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
				AND PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
				AND fn_situacao_pedido(PEDI.ID_PEDIDO) IN ($ID_PEDIDO_ITEM_SITUACAO)
				AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = PISI.ID_PEDIDO_ITEM_SITUACAO
				AND PEDI.DATA_EMISSAO BETWEEN '$DATA_DE' AND '$DATA_ATE'
				AND PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO <> 'TIMEOUT DE SESSAO'
				AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
				AND PESS.PETC_ID_PESSOA_TIPO_CATEGORIA <> 12
				AND NUMERO_PEDIDO <> ''
				AND PEIT.CARR_ID_CARRINHO = CARR.ID_CARRINHO
				AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
				AND PEPA.ATIVO = 'S'
				$busca
				GROUP BY
					-- PEDIDO
					PEDI.ID_PEDIDO, PEDI.NUMERO_PEDIDO, PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO, PEDI.DATA_EMISSAO,
					-- PAGAMENTO
					PEPA.NUMERO_PARCELAS, FOPA.DESCRICAO_FORMA_PAGAMENTO,
					-- PESSOA
					PESS.NOME, PESS.SOBRENOME, PESS.CPF, PESS.EMAIL,
					-- CAMPANHA
					PRCA.DESCRICAO_PROMOCAO, CARR.URL_ORIGEM
				ORDER BY DATA_EMISSAO DESC";

				printr($query);

		$resultPedido = $mysqli->ExecutarSQL($query);

		$pastaArquivo = "../exportacao/";
		$arquivo = "Relatorio_".date("YmdHis").".xls";

		$nomeArquivo = $pastaArquivo.$arquivo;

		$fp = @fopen($nomeArquivo, "x");

		$pack = pack("CCC", 0xef, 0xbb, 0xbf);

		@fwrite($fp, $pack);
		@fwrite($fp,'<style type="text/css"> .table tr td { text-align: left; } </style>
						<table border="2" bordercolor="#CCCCCC" align="left" width="1100">
							<tr bgcolor="#F5F5F5">
								<th><strong>VALOR_TOTAL</strong></th>
								<th><strong>SITUACAO</strong></th>
								<th><strong>DATA</strong></th>
								<th><strong>NUMERO_PEDIDO</strong></th>
								<th><strong>DESCRICAO_FORMA_PAGAMENTO</strong></th>
								<th><strong>NUMERO_PARCELAS</strong></th>
								<th><strong>NOME</strong></th>
								<th><strong>SOBRENOME</strong></th>
								<th><strong>CPF</strong></th>
								<th><strong>EMAIL</strong></th>
								<th><strong>DESCRICAO_PROMOCAO</strong></th>
								<th><strong>URL_ORIGEM</strong></th>
							 </tr>');
		$i = 1;
		while($rowPedido = @mssql_fetch_array($resultPedido)){

			$i % 2 == 0 ? $cor = "bgcolor=\"#F5F5F5\"" : $cor = "";
			$i++;
			$escreve = @fwrite($fp, "<tr ".$cor.">".
										"<td>".fnFormataPreco($rowPedido["VALOR_TOTAL"])."</td>".
										"<td>".utf8_encode($rowPedido["SITUACAO"])."</td>".
										"<td>".utf8_encode($rowPedido["DATA"])."</td>".
										"<td>".utf8_encode($rowPedido["NUMERO_PEDIDO"])."</td>".
										"<td>".utf8_encode($rowPedido["DESCRICAO_FORMA_PAGAMENTO"])."</td>".
										"<td>".utf8_encode($rowPedido["NUMERO_PARCELAS"])."</td>".
										"<td>".utf8_encode($rowPedido["NOME"])."</td>".
										"<td>".utf8_encode($rowPedido["SOBRENOME"])."</td>".
										"<td>".fnFormataCpfCnpj($rowPedido["CPF"])."</td>".
										"<td>".utf8_encode($rowPedido["EMAIL"])."</td>".
										"<td>".utf8_encode($rowPedido["DESCRICAO_PROMOCAO"])."</td>".
										"<td>".utf8_encode($rowPedido["URL_ORIGEM"])."</td>".
									"</tr>");

		}

		@fwrite($fp,'</table>');

		if(@file_exists($nomeArquivo)){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.PEDIDO_EXPORTADO.'", "nomeArquivo": "'.BASE_DIR.'exportacao/download.php?arquivo='.$arquivo.'" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.PEDIDO_NAO_EXPORTADO.'" }';
		}

		@fclose($fp);

		echo $retorno;


		break;

	default:
		# code...
		break;
}




?>
