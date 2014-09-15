<?php
$paginaTit = 'Lista de Casamento Editar Produtos';
$navegacao = 'Lista de Casamento Editar Produtos';
$menu = 'lista-de-casamento-editar-produtos';

if(isset($_SESSION["sessionIdPessoa"])){
	
	$idPessoa = $_SESSION["sessionIdPessoa"];
	
	if(!$_SESSION['sessionMinhaIdListaCasamento']){
		$query = "SELECT TOP 1 ID_LISTA_CASAMENTO FROM e_LISTA_CASAMENTO WHERE PESS_ID_PESSOA = ".$idPessoa." AND ATIVO = 'S'";
		$idListaCasamento = $mysqli->ConsultarSQL($query);
		$idListaCasamento = $idListaCasamento[0]['ID_LISTA_CASAMENTO'];
		$_SESSION['sessionMinhaIdListaCasamento'] = $idListaCasamento;
		if(!$idListaCasamento){
			header('Location:/lista-de-casamento');
			exit;
		}
	} 

} else {
	header('Location:/logar/&redirect=lista-de-casamento-editar-produtos');
	exit;
}

$idListaCasamento = $_SESSION['sessionMinhaIdListaCasamento'];
$smarty->assign('idListaCasamento', $idListaCasamento);

$queryListaCasamento = "SELECT
							LICA.CONJUGE1,
							LICA.CONJUGE2,
							LICA.URL,
							LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO,
							LCPR.QTD_SOLICITADA,
							LCPR.QTD_VENDIDA,
							LICA.FOTO_CAPA
						FROM
							e_LISTA_CASAMENTO LICA,
							e_LISTA_CASAMENTO_PRODUTO LCPR
						WHERE
							LICA.ATIVO = 'S'
						AND LICA.ID_LISTA_CASAMENTO = LCPR.LICA_ID_LISTA_CASAMENTO
						AND LICA.ID_LISTA_CASAMENTO = ".$idListaCasamento."
						AND LCPR.ATIVO = 'S'";

$resultListaCasamento = $mysqli->ConsultarSQL($queryListaCasamento);

foreach ($resultListaCasamento as $valueListaCasamento) {
	$arrayIdProduto[] = $valueListaCasamento['ID_PRODUTO'];
	$arrayProdutoQtd[$valueListaCasamento['ID_PRODUTO']]['QTD_SOLICITADA'] = $valueListaCasamento['QTD_SOLICITADA'];
	$arrayProdutoQtd[$valueListaCasamento['ID_PRODUTO']]['QTD_VENDIDA'] = $valueListaCasamento['QTD_VENDIDA'];
}

$nomeConjuge1 = ucwords(strtolower($valueListaCasamento['CONJUGE1']));
$nomeConjuge2 = ucwords(strtolower($valueListaCasamento['CONJUGE2']));
$url = $valueListaCasamento['URL'];
$fotoCapa = $valueListaCasamento['FOTO_CAPA'];

$smarty->assign('nomeConjuge1', $nomeConjuge1);
$smarty->assign('nomeConjuge2', $nomeConjuge2);
$smarty->assign('url', $url);
$smarty->assign('fotoCapa', $fotoCapa);

$smarty->assign('produtoQuantidade', $arrayProdutoQtd);

$listaProdutoListaCasamento = $Produto->fnProdutoSiteListaCasamento($arrayIdProduto);
$smarty->assign('listaProdutoSite', $listaProdutoListaCasamento);
$smarty->assign('nroColunas', 5);

// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
