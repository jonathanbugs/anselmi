<?php

require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

$paginaTit = '';
$navegacao = 'Home';
$menu = 'home';

/**/
$dataFinalBanner = date('Y-m-d');
if($dataFinalBanner == '2013-11-29'){
	$smarty->assign('bannerBlackFriday', 'S');
} else {
	$smarty->assign('bannerBlackFriday', 'N');
}
/**/

/**/
$topListaProduto = 20;
$lengthListaProduto = 20;
$smarty->assign('topListaProduto', $topListaProduto);
$listaProdutoSite = $Produto->fnProdutoSite(null,$topListaProduto,'visualizacao',$busca,$getCategorias,false,$lengthListaProduto);
$smarty->assign('listaProdutoSite', $listaProdutoSite);
$smarty->assign('nroColunas', 3);

$smarty->assign('produtosLimiter', $topListaProduto);
/**/

/**/
$topListaProdutoLancamento = 12;
$lengthListaProdutoLancamento = 12;
$smarty->assign('topListaProdutoLancamento', $topListaProdutoLancamento);
$listaProdutoSiteLancamento = $Produto->fnProdutoSite(null,$topListaProdutoLancamento,'lancamento',$busca,$getCategorias,false,$lengthListaProdutoLancamento);
$smarty->assign('listaProdutoSiteLancamento', $listaProdutoSiteLancamento);
$smarty->assign('nroColunas', 3);
/**/

$smarty->assign('countCategorias',$countCategorias);
$smarty->assign('navegacaoCategoria',$getCategorias);

$smarty->assign('tituloCategoria',$getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"]);

/*desc boleto*/
$smarty->assign('descontoAVista', DESCONTO_FORMA_PAGAMENTO_BOLETO);
/**/

if($idListaCasamento > 0 and $_SESSION['sessionMinhaIdListaCasamento'] != $idListaCasamento){
	$query = "SELECT URL FROM e_LISTA_CASAMENTO WHERE ID_LISTA_CASAMENTO = ".$idListaCasamento."";
	$result = $mysqli->ConsultarSQL($query);
	header('Location:/lc/'.$result[0]['URL']);
}

/**/
//$categoriaProduto = $Produto->fnCategoriaProduto();
//printr($categoriaProduto);
/**/

/**/
$menuSidebarNivel1 = $Menu->fnMenu(1);
include 'include/menu_sidebar.php';
$smarty->assign('menuSidebar',$menuSidebar);
/**/


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
