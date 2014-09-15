<?php
$paginaTit = 'Lista de Casamento Produtos';
$navegacao = 'Lista de Casamento Produtos';
$menu = 'lista-de-casamento-produtos';

require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

/**/
$listaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);

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
$ativo = $listaCasamento[0]['ATIVO'];

$smarty->assign('idListaCasamento', $idListaCasamento);
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

$dataEntrega = strtotime('-7 days', strtotime(formataDataInsert($enderecoEntrega[0]['DATA_EVENTO'])));
$dataAtual = strtotime(date('Y-m-d'));

if($ativo == 'N'){
	$listaCasamentoVencida = 'S';
} else {
	$listaCasamentoVencida = 'N';
}

$smarty->assign('listaCasamentoVencida', $listaCasamentoVencida);


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

$countProdutoSite = $Produto->fnProdutoSite(null,null,$ordem,$busca,$getCategorias,true,null,$getLinhas,$filtroOfertas,$arrayIdProduto);
$nroProdutos = $countProdutoSite[0]["NRO_PRODUTOS"];
$nroPaginas = ceil($nroProdutos/$topListaProdutoCookie);

$varListaProduto = $topListaProdutoCookie*$pagina;
$topListaProduto = ($varListaProduto-$topListaProdutoCookie)+1;
$smarty->assign('topListaProduto', $topListaProduto);

$smarty->assign('topListaProdutoCookie', $topListaProdutoCookie);

$listaProdutoSite = $Produto->fnProdutoSite(null,$topListaProduto,$ordem,$busca,$getCategorias,false,$topListaProdutoCookie,$getLinhas,$filtroOfertas,$arrayIdProduto);
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



/*
include 'include/menu_sidebar.php';
$smarty->assign('menuSidebar',$menuSidebar);
*/

/**/
$linkAdicional = '';
if($_GET['ofertas']){
	$linkAdicional = '&ofertas=S';
}
$arrayOrdenacao = array('menor pre&ccedil;o' => './&ordem=precomenor'.$linkAdicional, 
						'maior pre&ccedil;o' => './&ordem=precomaior'.$linkAdicional,
						'lan&ccedil;amentos' => './&ordem=lancamentos'.$linkAdicional,
						'Nome / A - Z' => './&ordem=asc'.$linkAdicional,
						'Nome / Z - A' => './&ordem=desc'.$linkAdicional,
						'maior promo&ccedil;&atilde;o' => './&ordem=maiorpromocao'.$linkAdicional);

$chaveInicial = "";
if(isset($_GET["ordem"])){
	
	$order = $_GET["ordem"];

	if($order == "precomenor"){
        $chaveInicial = "menor pre&ccedil;o";
    } elseif($order == "precomaior"){
        $chaveInicial = "maior pre&ccedil;o";
    } elseif($order == "asc"){
        $chaveInicial = "Nome / Z - A";
    } elseif($order == "desc"){
        $chaveInicial = "Nome / A - Z";
    } elseif ($order == "lancamentos") {
        $chaveInicial = "lan&ccedil;amentos";
    } elseif ($order == "maiorpromocao") {
        $chaveInicial = "maior promo&ccedil;&atilde;o";
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

$smarty->append('css_files', CSS_DIR.'lista-produtos-categorias.css');
$smarty->append('js_files', JS_DIR.'lista-produtos-categorias.js');

// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
