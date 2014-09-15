<?php
require_once CLASS_DIR.'menu.class.php';
require_once CLASS_DIR.'produto.class.php';
$Menu = new Menu($mysqli);
$Produto = new Produto($mysqli);

$paginaTit = 'Lista de Produtos Categorias';
$navegacao = 'Lista de Produtos Categorias';
$menu = 'lista_produtos_categorias';

#getCategorias index.php
if(count($getCategorias) == 0){
	$getCategorias = null;
}

#trata busca
if($parametros[0] == 'busca' and isset($_GET['q'])){
	$busca = $_GET['q'];
} else {
	$busca = null;
}

#
if(isset($_GET["ordem"])){
	$ordem = $_GET["ordem"];
} else {
	$ordem = '';
}


/**/
if(isset($_GET['page']) and $_GET['page'] > 1)
	$pagina = $_GET['page'];
else
	$pagina = 0;

if($pagina == 0)
	$paginaAtual = 1;
else
	$paginaAtual = $pagina;

$smarty->assign('paginaAtual', $paginaAtual);

$topListaProdutoCookie = 30;
$lengthListaProduto = 30;
$smarty->assign('produtosLimiter', $topListaProdutoCookie);

$countProdutoSite = $Produto->fnProdutoSite(null,null,$ordem,$busca,$getCategorias,true,null);
$nroProdutos = $countProdutoSite[0]["NRO_PRODUTOS"];
$nroPaginas = ceil($nroProdutos/$topListaProdutoCookie);

$varListaProduto = $topListaProdutoCookie*$pagina;
$topListaProduto = ($varListaProduto-$lengthListaProduto)+1;
$smarty->assign('topListaProduto', $topListaProduto);

$smarty->assign('topListaProdutoCookie', $topListaProdutoCookie);

$listaProdutoSite = $Produto->fnProdutoSite(null,$topListaProduto,$ordem,$busca,$getCategorias,false,$lengthListaProduto);
$smarty->assign('listaProdutoSite', $listaProdutoSite);
$smarty->assign('nroColunas', 5);
/**/

$linkPagina = SERVER_NAME;
if(isset($_GET['page'])){
	$linkPagina = str_replace('&page='.$_GET['page'], '', SERVER_NAME);
} 
$smarty->assign('linkPagina', $linkPagina);

#PAGINACAO TOP
$arrayPagincaoTop = array();
$iInicial = 1;
if($paginaAtual >= 4){
	$iInicial = $paginaAtual-2;
}
for ($i=$iInicial; $i <= $nroPaginas; $i++) { 
	$arrayPagincaoTop[] = $i;
}
$smarty->assign('paginacaoTop', $arrayPagincaoTop);

if($paginaAtual == 1) $prevPaginacaoTop = 'javascript:;'; else $prevPaginacaoTop = $linkPagina.'&page='.($paginaAtual-1);
if($paginaAtual >= $nroPaginas) $nextPaginacaoTop = 'javascript:;'; else $nextPaginacaoTop = $linkPagina.'&page='.($paginaAtual+1);
$smarty->assign('prevPaginacaoTop', $prevPaginacaoTop);
$smarty->assign('nextPaginacaoTop', $nextPaginacaoTop);

#PAGINACAO BOTTOM
$arrayPagincaoBottom = array();
$iInicial = 1;
if($paginaAtual >= 13){
	$iInicial = $paginaAtual-5;
}
for ($i=$iInicial; $i <= $nroPaginas; $i++) { 
	$arrayPagincaoBottom[] = $i;
}
$smarty->assign('paginacaoBottom', $arrayPagincaoBottom);

if($paginaAtual == 1) $prevPaginacaoBottom = 'javascript:;'; else $prevPaginacaoBottom = $linkPagina.'&page='.($paginaAtual-1);
if($paginaAtual >= $nroPaginas) $nextPaginacaoBottom = 'javascript:;'; else $nextPaginacaoBottom = $linkPagina.'&page='.($paginaAtual+1);
$smarty->assign('prevPaginacaoBottom', $prevPaginacaoBottom);
$smarty->assign('nextPaginacaoBottom', $nextPaginacaoBottom);
$smarty->assign('primeiraPaginacaoBottom', 1);
$smarty->assign('ultimaPaginacaoBottom', $nroPaginas);
/**/


$smarty->assign('countCategorias',$countCategorias);
$smarty->assign('navegacaoCategoria',$getCategorias);

$tituloCategoria = $getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"];
if(!isset($tituloCategoria)){
	$tituloCategoria = substr($busca, 0, 50);
}
$smarty->assign('tituloCategoria',$tituloCategoria);

/**/
$menuTopoNivel1 = $Menu->fnMenu(1);
include 'include/menu_topo.php';
$smarty->assign('menuTopo',$menuTopo);
/**/

/**/
$menuSidebarNivel1 = $Menu->fnMenu(1, null, $getCategorias);
include 'include/menu_sidebar.php';
$smarty->assign('menuSidebar',$menuSidebar);
/**/

/**/
$arrayOrdenacao = array('ordenar por menor pre&ccedil;o' => './&ordem=precomenor', 
						'ordenar por maior pre&ccedil;o' => './&ordem=precomaior',
						'lan&ccedil;amentos' => './&ordem=lancamentos',
						'Nome / A - Z' => './&ordem=asc',
						'Nome / Z - A' => './&ordem=desc');

$chaveInicial = "";
if(isset($_GET["ordem"])){
	
	$order = $_GET["ordem"];

	if($order == "precomenor"){
        $chaveInicial = "ordenar por menor pre&ccedil;o";
    } elseif($order == "precomaior"){
        $chaveInicial = "ordenar por maior pre&ccedil;o";
    } elseif($order == "asc"){
        $chaveInicial = "Nome / Z - A";
    } elseif($order == "desc"){
        $chaveInicial = "Nome / A - Z";
    } elseif ($order == "lancamentos") {
        $chaveInicial = "lan&ccedil;amentos";
    }
}
if($chaveInicial != ""){
	$chaveInicial = $chaveInicial;
} else {
	$chaveInicial = "lan&ccedil;amentos";
}
$smarty->assign('ordemInicialListaProduto',$chaveInicial);
unset($arrayOrdenacao[$chaveInicial]);
$smarty->assign('ordemListaProduto',$arrayOrdenacao);
//echo $_COOKIE["tipoLista"];
/**/

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
