<?php
require_once(PHP_ROOT.'/classes/produto.class.php');
$Produto = new Produto($mysqli);

require_once(PHP_ROOT.'/classes/lista_casamento.class.php');
$ListaCasamento = new ListaCasamento($mysqli);

$smarty->assign('titulo_pagina','Cadastra Lista de Casamento');

/**/
if(isset($_REQUEST["idListaCasamento"])){

	$idListaCasamento = sqlvalue($_REQUEST["idListaCasamento"], false);

	$listaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento, 'S');

	foreach ($listaCasamento as $key => $value) {
	   	if($value['TIPO_ENDERECO'] == 'CERIMONIA'){
	   		$enderecoCerimonia = array($value);
	   	} elseif($value['TIPO_ENDERECO'] == 'RECEPCAO'){
	   		$enderecoRecepcao = array($value);
	   	} elseif($value['TIPO_ENDERECO'] == 'ENTREGA'){
	   		$enderecoEntrega = array($value);
	   	}
	   	$arrayIdProduto[] = $value['ID_PRODUTO'];
	}

	$idListaCasamento = $listaCasamento[0]['ID_LISTA_CASAMENTO'];
	$ativo = $listaCasamento[0]['ATIVO'];
	$url = $listaCasamento[0]['URL'];
	$conjuge1 = ucwords(strtolower($listaCasamento[0]['CONJUGE1']));
	$emailConjuge1 = $listaCasamento[0]['EMAIL_CONJUGE1'];
	$nomePaiConjuge1 = $listaCasamento[0]['NOME_PAI_CONJUGE1'];
	$nomeMaeConjuge1 = $listaCasamento[0]['NOME_MAE_CONJUGE1'];
	$conjuge2 = ucwords(strtolower($listaCasamento[0]['CONJUGE2']));
	$emailConjuge2 = $listaCasamento[0]['EMAIL_CONJUGE2'];
	$nomePaiConjuge2 = $listaCasamento[0]['NOME_PAI_CONJUGE2'];
	$nomeMaeConjuge2 = $listaCasamento[0]['NOME_MAE_CONJUGE2'];
	$fotoCapa = $listaCasamento[0]['FOTO_CAPA'];
	$mensagem = $listaCasamento[0]['MENSAGEM'];
	$despachado = $listaCasamento[0]['DESPACHADO'];

	$smarty->assign('idListaCasamento', $idListaCasamento);
	$smarty->assign('ativo', $ativo);
	$smarty->assign('url', $url);
	$smarty->assign('nomeConjuge1', $conjuge1);
	$smarty->assign('emailConjuge1', $emailConjuge1);
	$smarty->assign('nomePaiConjuge1', $nomePaiConjuge1);
	$smarty->assign('nomeMaeConjuge1', $nomeMaeConjuge1);
	$smarty->assign('nomeConjuge2', $conjuge2);
	$smarty->assign('emailConjuge2', $emailConjuge2);
	$smarty->assign('nomePaiConjuge2', $nomePaiConjuge2);
	$smarty->assign('nomeMaeConjuge2', $nomeMaeConjuge2);
	$smarty->assign('fotoCapa', $fotoCapa);
	$smarty->assign('mensagem', $mensagem);
	$smarty->assign('enderecoEntrega', $enderecoEntrega);
	$smarty->assign('enderecoRecepcao', $enderecoRecepcao);
	$smarty->assign('enderecoCerimonia', $enderecoCerimonia);
	$smarty->assign('despachado', $despachado);

}
/**/

/**/
$listaCasamentoProduto = $ListaCasamento->fnListaCasamentoProduto($idListaCasamento);
$smarty->assign('listaProduto',$listaCasamentoProduto);
/**/

/**/
$queryListaCasamentoPedido = "SELECT
									PEDI.NUMERO_PEDIDO,
									PEDI.ID_PEDIDO,
									PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO
								FROM
									e_PEDIDO PEDI,
									e_PEDIDO_ITEM PEIT
								WHERE
									PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
								AND PEIT.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."";

$resultListaCasamentoPedido = $mysqli->ConsultarSQL($queryListaCasamentoPedido);

foreach ($resultListaCasamentoPedido as $value) {
	$listaCasamentoPedido[$value['ID_PRODUTO']][] = $value;
}
$smarty->assign('listaCasamentoPedido', $listaCasamentoPedido);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'lista_casamento.js?v=1');

#CSS
//$smarty->append('css_files', CSS_DIR.'pessoa.css');
?>