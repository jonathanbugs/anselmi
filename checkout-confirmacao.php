<?php
$paginaTit = 'Confirma&ccedil;&atilde;o';
$navegacao = 'Confirma&ccedil;&atilde;o';
$menu = 'confirmacao';

require_once CLASS_DIR.'pedido.class.php';
$Pedido = new Pedido($mysqli);

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

if($idListaCasamento){
	$idListaCasamento = sqlvalue($idListaCasamento, false);
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$listaCasamento = $listaListaCasamento[0];

	$smarty->assign('idListaCasamento', $listaCasamento['ID_LISTA_CASAMENTO']);
	$smarty->assign('url', $listaCasamento['URL']);
	$smarty->assign('nomeConjuge1',  ucwords(strtolower($listaCasamento['CONJUGE1'])));
	$smarty->assign('nomeConjuge2',  ucwords(strtolower($listaCasamento['CONJUGE2'])));
	$smarty->assign('fotoCapa', $listaCasamento['FOTO_CAPA']);
	
}

$smarty->assign('etapaPedido', 3);

$idPedido = $_SESSION['sessionIdPedido'];

/*ENDERECO PEDIDO*/
$listaPedidoEndereco = $Pedido->fnPedidoEnderecoFinaliza($idPedido);
$smarty->assign('listaPedidoEndereco', $listaPedidoEndereco);
/**/

/*PEDIDO PAGAMENTO*/
$listaPedidoPagamento = $Pedido->fnPedidoPagamento($idPedido);
$smarty->assign('listaPedidoPagamento', $listaPedidoPagamento);
/**/

/*PEDIDO*/
$listaPedido = $Pedido->fnPedidoFinaliza($idPedido);
$fretePedido = $listaPedido[0]['DESCRICAO_FRETE'];
$prazoEntregaPedido = $listaPedido[0]['PRAZO_ENTREGA_DIAS'];
$numeroPedido = $listaPedido[0]['NUMERO_PEDIDO'];
$emailPessoa = $listaPedido[0]['EMAIL'];

if($numeroPedido){
	$mysqli->ExecutarMultiSQL("UPDATE e_PEDIDO_ITEM SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_ANALISE_CREDITO." 
				 WHERE PEDI_ID_PEDIDO = ".$idPedido." AND SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DIGITACAO.";
				 UPDATE e_CARRINHO CARR 
						INNER JOIN e_PEDIDO_ITEM PEIT
						  ON PEIT.CARR_ID_CARRINHO = CARR.ID_CARRINHO
						 AND PEIT.PEDI_ID_PEDIDO = ".$idPedido."
						 SET CARR.FINALIZADO = 'S';");
}

$smarty->assign('fretePedido', $fretePedido);
$smarty->assign('prazoEntregaPedido', $prazoEntregaPedido);
$smarty->assign('listaPedido', $listaPedido);
$smarty->assign('numeroPedido', $numeroPedido);
$smarty->assign('idPedido', $idPedido);
$smarty->assign('emailPessoa', $emailPessoa);

$subtotalPedido = 0;
$totalPedidoFinal = 0;
$valorPedidoDesconto = 0;
foreach ($listaPedido as $value) {
	$subtotalPedido = $subtotalPedido+($value['PRECO_UNITARIO_VENDA']*$value['QUANTIDADE']);
	$valorPedidoDesconto = $valorPedidoDesconto+$value['VALOR_DESCONTO'];
}


$valorFretePedido = $listaPedido[0]['VALOR_FRETE'];
$smarty->assign('valorFretePedido', $valorFretePedido);

$totalPedidoFinal = $subtotalPedido;
if($valorPedidoDesconto > 0){
	$totalPedidoFinal = $totalPedidoFinal-$valorPedidoDesconto;
}
if($valorFretePedido){
	$totalPedidoFinal = $totalPedidoFinal+$valorFretePedido;
}
$smarty->assign('subtotalPedido', $subtotalPedido);
$smarty->assign('totalPedidoFinal', $totalPedidoFinal);
$smarty->assign('valorPedidoDesconto', $valorPedidoDesconto);

$countPedidosItens = count($listaPedido);
$smarty->assign('countPedidosItens', $countPedidosItens);
/**/

/*RETORNO PAGAMENTO MOIP*/
$query = "SELECT
				MAX(COD_MOIP) COD_MOIP,
				CASE IFNULL(SITUACAO, 'N') WHEN 'N' THEN DESCRICAO_PEDIDO_ITEM_SITUACAO ELSE SITUACAO END SITUACAO,
				ID_PEDIDO_ITEM_SITUACAO
			FROM
				e_PEDIDO LEFT JOIN e_RETORNO_PAGAMENTO_MOIP
								ON NUMERO_PEDIDO = ID_TRANSACAO,
				e_PEDIDO_ITEM_SITUACAO 
			WHERE
				NUMERO_PEDIDO = '".$numeroPedido."'
			AND fn_situacao_pedido(ID_PEDIDO) = ID_PEDIDO_ITEM_SITUACAO
			GROUP BY
				SITUACAO,
				DESCRICAO_PEDIDO_ITEM_SITUACAO,
				ID_PEDIDO_ITEM_SITUACAO
				LIMIT 1";

$listaRetornoPagamentoMoip = $mysqli->ConsultarSQL($query);

$Status = $_SESSION['sessionStatusMoIP'];
if(!$Status){
	$Status = $listaRetornoPagamentoMoip[0]['SITUACAO'];	
}
$smarty->assign('situacaoMoip', $Status);

$CodigoMoIP = $_SESSION['sessionCodigoMoIP'];
if(!$CodigoMoIP){
	$CodigoMoIP = $listaRetornoPagamentoMoip[0]['COD_MOIP'];
}
$codMoip = mask($CodigoMoIP,'####.####.####');
$smarty->assign('codMoip', $codMoip);

if($listaRetornoPagamentoMoip[0]['ID_PEDIDO_ITEM_SITUACAO'] == ID_SITUACAO_PEDIDO_ANALISE_CREDITO){
	enviaEmail('situacaoPedido', $_SESSION['sessionNome'], $_SESSION['login'], null, $idPedido);
}
/**/

/*CONVERSAO FACEBOOK*/
//$arrayConversaoFacebook = array('6010232729684','6010236300884','6010236570684','6010236710284');
//$smarty->assign('arrayConversaoFacebook', $arrayConversaoFacebook);
/**/

/*BTG*/
$smarty->assign('valor_total', $totalPedidoFinal);
$smarty->assign('frete', $valorFretePedido);
$smarty->assign('dt_prevista_para_entrega', $prazoEntregaPedido);
$smarty->assign('metodo_de_pagamento', $listaPedidoPagamento[0]['DESCRICAO']);
$smarty->assign('banco1', $listaPedidoPagamento[0]['DESCRICAO_FORMA_PAGAMENTO']);
$smarty->assign('cod_compra', $numeroPedido);
$smarty->assign('nm_etapa', $sessao);

$countProdutoCarrinho = count($listaPedido);
$i=0;
foreach ($listaPedido as $valueProdutoCarrinho) {
	$i++;
	if($i == $countProdutoCarrinho){
		$idsProdutoCarrinho .= $valueProdutoCarrinho['ID_PRODUTO'];
	} else {
		$idsProdutoCarrinho .= $valueProdutoCarrinho['ID_PRODUTO'].',';
	}
}

$queryCategoriaProduto = "SELECT
								CATE.ID_CATEGORIA,
								CATE.URL_AMIGAVEL,
								CATE.DESCRICAO_CATEGORIA,
								PROD.ID_PRODUTO
							FROM
								e_PRODUTO PROD,
								e_PRODUTO_CATEGORIA PRCA,
								e_CATEGORIA CATE
							WHERE
								PROD.ID_PRODUTO = PRCA.PROD_ID_PRODUTO
							AND PRCA.CATE_ID_CATEGORIA = CATE.ID_CATEGORIA
							AND PROD.ID_PRODUTO IN (".$idsProdutoCarrinho.")
							ORDER BY 
								CATE.ID_CATEGORIA";

$resultCategoriaProduto = $mysqli->ConsultarSQL($queryCategoriaProduto);

foreach ($resultCategoriaProduto as $valueCategoriaProduto) {
	$categoriaProduto[$valueCategoriaProduto['ID_PRODUTO']][] = $valueCategoriaProduto;
}
$smarty->assign('categoriaProduto', $categoriaProduto);
/**/
/**/


function mask($val, $mask){
$val = str_pad($val, 12, "0", STR_PAD_LEFT);
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++){
 	if($mask[$i] == '#'){
 		if(isset($val[$k]))
 			$maskared .= $val[$k++];
 	} else {
 		if(isset($mask[$i]))
 			$maskared .= $mask[$i];
 	}
 }
 return $maskared;
}

$_SESSION['sessionCarrinhoTopo'] = null;

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
