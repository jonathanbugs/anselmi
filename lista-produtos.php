<?php
require_once CLASS_DIR.'menu.class.php';
require_once CLASS_DIR.'produto.class.php';
$Menu = new Menu($mysqli);
$Produto = new Produto($mysqli);

$paginaTit = 'Lista de Produtos';
$navegacao = 'Lista de Produtos';
$menu = 'lista_Produtos';

if(isset($_GET["busca"])){
	$busca = $_GET["busca"];
} else {
	$busca = null;
}

/**/
$topListaProduto = 15;
$smarty->assign('topListaProduto', $topListaProduto);
$listaProdutoSite = $Produto->fnProdutoSite(null,$topListaProduto,null,$busca,$getCategorias);
$smarty->assign('listaProdutoSite', $listaProdutoSite);
$smarty->assign('nroColunas', 5);
/**/

$smarty->assign('countCategorias',$countCategorias);
$smarty->assign('navegacaoCategoria',$getCategorias);

$smarty->assign('tituloCategoria',$getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"]);

/**/
$menuTopo = $Menu->fnMenu(1);
$smarty->assign('menuTopo',$menuTopo);
/**/

/**/
$menuSidebarNivel1 = $Menu->fnMenu(1, null, $getCategorias);
include 'include/menu_sidebar.php';
$smarty->assign('menuSidebar',$menuSidebar);
/**/

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
