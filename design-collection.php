<?php
require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

$paginaTit = 'Design Collection';
$navegacao = 'Design Collection';
$menu = 'design-collection';

#getCategorias index.php
if(count($getCategorias) == 0){
	$getCategorias = null;
}

if(count($getLinhas) == 0){
	$getLinhas = null;
}

#trata busca
if($parametros[0] == 'busca' and isset($_GET['q'])){
	$busca = $_GET['q'];
} else {
	$busca = null;
}

$filtroOfertas = null;
if(isset($_GET['ofertas']) and $_GET['ofertas'] == 'S'){
	$filtroOfertas = 'S';
}

#
if(isset($_GET["ordem"])){
	$ordem = $_GET["ordem"];
} else {
	$ordem = '';
}


/**/
if(isset($_GET['page']) and $_GET['page'] > 1){
	$pagina = $_GET['page'];
} else {
	$pagina = 0;
}

if($pagina == 0){
	$paginaAtual = 1;
} else {
	$paginaAtual = $pagina;
}

$smarty->assign('paginaAtual', $paginaAtual);
//printr($_SESSION);
if(isset($_GET['topListaProduto'])){
	$_SESSION['sessionTopListaProduto'] = $_GET['topListaProduto'];
	$topListaProdutoCookie = $_GET['topListaProduto'];
} elseif(isset($_SESSION['sessionTopListaProduto']) and $_SESSION['sessionTopListaProduto'] > 20){
	$topListaProdutoCookie = $_SESSION['sessionTopListaProduto'];
} else {
	$topListaProdutoCookie = 20;
}

$smarty->assign('produtosLimiter', $topListaProdutoCookie);

$countProdutoSite = $Produto->fnProdutoSite(null,null,$ordem,$busca,$getCategorias,true,null,$getLinhas,$filtroOfertas);
$nroProdutos = $countProdutoSite[0]["NRO_PRODUTOS"];
$nroPaginas = ceil($nroProdutos/$topListaProdutoCookie);

$varListaProduto = $topListaProdutoCookie*$pagina;
$topListaProduto = ($varListaProduto-$topListaProdutoCookie)+1;
$smarty->assign('topListaProduto', $topListaProduto);

$smarty->assign('topListaProdutoCookie', $topListaProdutoCookie);

$listaProdutoSite = $Produto->fnProdutoSite(null,$topListaProduto,$ordem,$busca,$getCategorias,false,$topListaProdutoCookie,$getLinhas,$filtroOfertas);
$smarty->assign('listaProdutoSite', $listaProdutoSite);
$smarty->assign('nroColunas', 5);
/**/

/*desc boleto*/
$smarty->assign('descontoAVista', DESCONTO_FORMA_PAGAMENTO_BOLETO);
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

$navegacaoCategoria = array();
//printr($getCategorias);
if($getCategorias){
	foreach ($getCategorias as $value) {
		$urlAmigavel .= '/'.$value['URL_AMIGAVEL'];
		$descricaoCategoria = $value['DESCRICAO_CATEGORIA']; 
		$navegacaoCategoria[] = array('DESCRICAO_CATEGORIA'=>$descricaoCategoria, 'URL_AMIGAVEL'=>$urlAmigavel);
	}
} else {
	$urlAmigavel = '';
	$descricaoCategoria = '';
	$navegacaoCategoria[] = array();
}

$smarty->assign('navegacaoCategoria',$navegacaoCategoria);

// $tituloCategoria = $getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"];
// if(!isset($tituloCategoria)){
// 	$tituloCategoria = substr($busca, 0, 50);
// }
if($getLinhas[$countLinhas-1]["DESCRICAO_LINHA"]){
	$tituloCategoria = $getLinhas[$countLinhas-1]["DESCRICAO_LINHA"];
} elseif($getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"]){
	$tituloCategoria = $getCategorias[$countCategorias-1]["DESCRICAO_CATEGORIA"];
} else {
	$tituloCategoria = substr($busca, 0, 50);
}
$smarty->assign('tituloCategoria',$tituloCategoria);



/**/
$menuSidebarNivel1 = $Menu->fnMenu(1, null, $getCategorias,null,$filtroOfertas);
include 'include/menu_sidebar.php';
$smarty->assign('menuSidebar',$menuSidebar);
/**/

/**/
$linkAdicional = '';
if($_GET['ofertas']){
	$linkAdicional = '&ofertas=S';
}
$arrayOrdenacao = array('ordenar por menor pre&ccedil;o' => './&ordem=precomenor'.$linkAdicional, 
						'ordenar por maior pre&ccedil;o' => './&ordem=precomaior'.$linkAdicional,
						'lan&ccedil;amentos' => './&ordem=lancamentos'.$linkAdicional,
						'Nome / A - Z' => './&ordem=asc'.$linkAdicional,
						'Nome / Z - A' => './&ordem=desc'.$linkAdicional);

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
