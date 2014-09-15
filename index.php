<?php
require('configs/config.php');

//flush();

//printr($_SESSION);

fnCapturaUrlOrigem();

# GETs #
if( isset($_GET['pagina']) ){ $pagina = $_GET['pagina']; $sessao = $_GET['pagina']; }
	else { $pagina = ''; $sessao = 'inicial'; }
if( isset($_GET['interna']) ){ $paginaInterna = $_GET['interna']; }
	else { $paginaInterna = ''; }
$smarty->assign('pagina',$pagina,true);
$smarty->assign('paginaInterna',$paginaInterna,true);
(isset($_POST['ajax'])) ? $ajax=true : $ajax=false;

$ultimoCaract = substr($pagina, -1);
if($ultimoCaract == "/"){
	$pagina = substr($pagina, 0, -1);
}
$parametros = explode("/", $pagina);

if(count($parametros) == 1){
	$sessao = $parametros[0];
	$htmlProdutoEspecifico = substr($sessao, -5);
	$descricaoUrlAmigavel = str_replace(".html", "", $sessao);
	if(trim($sessao) == ""){
		$sessao = 'inicial';	
	}
}

$idListaCasamento = 0;
if(isset($_SESSION['sessionIdListaCasamento'])){
	$idListaCasamento = $_SESSION['sessionIdListaCasamento'];
}
$minhaIdListaCasamento = 0;
if($_SESSION['sessionMinhaIdListaCasamento']){
	$minhaIdListaCasamento = $_SESSION['sessionMinhaIdListaCasamento'];
}
$smarty->assign('idListaCasamento', $idListaCasamento);
$smarty->assign('minhaIdListaCasamento', $minhaIdListaCasamento);

if( TentativaInjecao($sessao) ){
	die('Tentativa de MySQL Injection Bloqueada.');
} elseif($parametros[0] == 'noivas'){
	header('Location:/lista-de-casamento');
} elseif($htmlProdutoEspecifico == '.html'){

	$sessao = 'produto-detalhe';

} elseif($parametros[0] == 'lc'){

	if(!$_SESSION['sessionIdListaCasamento'] or $_SESSION['sessionIdListaCasamento'] == $_SESSION['sessionMinhaIdListaCasamento']){
		$urlListaCasamento = sqlvalue($parametros[1], true);
		$queryListaCasamento = "SELECT TOP 1 ID_LISTA_CASAMENTO FROM e_LISTA_CASAMENTO WHERE URL = ".$urlListaCasamento." --AND ATIVO = 'S'";
		$resultListaCasamento = $mysqli->ConsultarSQL($queryListaCasamento);
		$idListaCasamento = $resultListaCasamento[0]['ID_LISTA_CASAMENTO'];
		$_SESSION['sessionIdListaCasamento'] = $idListaCasamento;
	}

	$sessao = 'lista-de-casamento-produtos';

} elseif ( !file_exists($sessao.'.php') ) {
	
	$i=0;
	foreach($parametros as $value){
		$i++;
		if($i == count($parametros)){
			$categorias .= sqlvalue($value, true);
		} else {
			$categorias .= sqlvalue($value, true).",";
		}
	}


	$queryCategorias = "SELECT 
								CATE.ID_CATEGORIA, 
								CATE.DESCRICAO_CATEGORIA, 
								CATE.URL_AMIGAVEL URL_AMIGAVEL_CATE ,
								CATE.CATE_ID_CATEGORIA,
								NULL ID_LINHA, 
								NULL DESCRICAO_LINHA, 
								NULL URL_AMIGAVEL_LINHA,
								IFNULL(CATE.CATE_ID_CATEGORIA, 0) ORDEM
							FROM 
								e_CATEGORIA CATE
							WHERE 
								CATE.URL_AMIGAVEL IN (".$categorias.")
							AND CATE.ATIVO = 'S'
							AND (CATE.CATE_ID_CATEGORIA IN (SELECT 
															CATE2.ID_CATEGORIA
															FROM 
																e_CATEGORIA CATE2 
															WHERE 
																CATE2.URL_AMIGAVEL IN (".$categorias.")
															AND CATE2.ATIVO = 'S'
															AND (CATE2.ID_CATEGORIA = CATE.CATE_ID_CATEGORIA)
														  )
							OR CATE.CATE_ID_CATEGORIA IS NULL)
							ORDER BY ORDEM ASC";
//printr($queryCategorias);
	$resultCategorias = $mysqli->ConsultarSQL($queryCategorias);

	$i=0;
	foreach ($resultCategorias as $valueCategorias) {
		
		if($valueCategorias['ID_CATEGORIA']){
			$getCategorias[$i]['ID_CATEGORIA'] = $valueCategorias['ID_CATEGORIA']; 
			$getCategorias[$i]['DESCRICAO_CATEGORIA'] = $valueCategorias['DESCRICAO_CATEGORIA']; 
			$getCategorias[$i]['URL_AMIGAVEL'] = $valueCategorias['URL_AMIGAVEL_CATE'];
			$getCategorias[$i]['CATE_ID_CATEGORIA'] = $valueCategorias['CATE_ID_CATEGORIA'];

			$i++;
		} 

	}

	$i=0;
	foreach ($resultCategorias as $valueCategorias) {

		if($valueCategorias['ID_LINHA']){
			$getLinhas[$i]['ID_LINHA'] = $valueCategorias['ID_LINHA']; 
			$getLinhas[$i]['DESCRICAO_LINHA'] = $valueCategorias['DESCRICAO_LINHA']; 
			$getLinhas[$i]['URL_AMIGAVEL'] = $valueCategorias['URL_AMIGAVEL_LINHA'];

			$i++;
		} 

	}

	$countCategorias = count($getCategorias);
	$countLinhas = count($getLinhas);

	/*if(!$resultCategorias and $parametros[0] != 'busca'){
		header('location: '.BASE_DIR.'erro-404.php');
	}*/

	if($parametros[0] == '8944-design-collection'){
		$sessao = 'design-collection';
	} else {
		$sessao = 'lista-produtos-categorias';		
	}
	
	//printr($_REQUEST);
	
	
}

//BTG Integração da Tag//
$smarty->assign('idBTG', '74:1');
if($_SESSION['sessionIdPessoa']) {
	$smarty->assign('idPessoa', $_SESSION['sessionIdPessoa']);
}
if($_SESSION['login']) {
	$smarty->assign('email', $_SESSION['login']);
}

if($sessao == 'carrinho' or $sessao == 'checkout-pagamento-entrega'){
	$smarty->assign('nm_etapa', $sessao);	
}

if(isset($_GET['utm_source'])){
	$smarty->assign('utm_source', $_GET['utm_source']);
	$smarty->assign('utm_medium', $_GET['utm_medium']);
	$smarty->assign('utm_term', $_GET['utm_term']);
	$smarty->assign('utm_content', $_GET['utm_content']);
	$smarty->assign('utm_campaign', $_GET['utm_campaign']);
	if($_SESSION['sessionIdPessoa']) {
		$smarty->assign('utm_uid', $_SESSION['sessionIdPessoa']);
	}
	if($_SESSION['login']) {
		$smarty->assign('utm_email', $_SESSION['login']);
	}
} 
/**/

$urlAtual = UrlAtual();
$smarty->assign('urlAtual', $urlAtual);


$nomeCliente = null;
if(isset($_SESSION['sessionNome']) and isset($_SESSION['sessionIdPessoa'])){
	$nomeCliente = $_SESSION['sessionNome'];
	$idPessoaLogada = $_SESSION['sessionIdPessoa'];
}

$smarty->assign('nomeCliente', $nomeCliente);

/*CARRINHO TOPO*/

require_once CLASS_DIR.'/'.'carrinho.class.php';
$Carrinho = new Carrinho($mysqli);

if($idPessoaLogada){
	$idPessoaLogada = sqlvalue($_SESSION['sessionIdPessoa'], true);
	//$where = "OR PESS_ID_PESSOA = ".$idPessoaLogada."";
	$where = "";
}
if($idListaCasamento){
	$idListaCasamento = sqlvalue($idListaCasamento, false);
	$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
} else {
	$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
}

if(!$_SESSION['sessionCarrinhoTopo']){
	$listaProdutoCarrinhoTopo = $Carrinho->fnCarrinhoTopo($where, $whereListaCasamento);
} else {
	$listaProdutoCarrinhoTopo = $_SESSION['sessionCarrinhoTopo'];
}

$quantidadeTotalCarrinhoTopo = 0;
$precoTotalVendaCarrinhoTopo = 0;
foreach ($listaProdutoCarrinhoTopo as $value) {
	$quantidadeTotalCarrinhoTopo = $quantidadeTotalCarrinhoTopo+$value["QUANTIDADE"];
	$precoTotalVendaCarrinhoTopo = $precoTotalVendaCarrinhoTopo+($value["PRECO_UNITARIO_VENDA"]*$value["QUANTIDADE"]);
}

//$smarty->assign('queryCarrinhoTopo', $queryCarrinhoTopo);
$smarty->assign('listaProdutoCarrinhoTopo', $listaProdutoCarrinhoTopo, true);
$smarty->assign('quantidadeTotalCarrinhoTopo', $quantidadeTotalCarrinhoTopo, true);
$smarty->assign('precoTotalVendaCarrinhoTopo', $precoTotalVendaCarrinhoTopo, true);

/**/

/*facebook*/
$smarty->assign('ogImage', ROOT_DIR.'img/logos/logo.jpg');
/**/

$smarty->assign('sessao',$sessao,true);

require_once 'include/menu_topo.php';

if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on' and ($sessao != 'logar' and 
															  $sessao != 'cadastre-se' and 
															  $sessao != 'checkout-pagamento-entrega' and 
															  $sessao != 'alterar-email' and 
															  $sessao != 'alterar-senha' and 
															  $sessao != 'alterar-dados-cadastrais')) {
	$url = $urlAtual;
	header("Location: $url");
	exit;
}

# PAGE LOCATION #
require_once($sessao.'.php');


# TITULO DA PÁGINA #
$tituloFinal = null;
// if ($subtag && !$pagina){ $tituloFinal .= $subtag.' | '; }
// if ($paginaInterna){ $tituloFinal .=  $paginaTit.' | '.$navegacao.' | '; }
// if ($pagina && !$paginaInterna){ $tituloFinal .=  $paginaTit.' | '; }
// $tituloFinal .=  $title;
// if ($subtitle && !$pagina){ $tituloFinal .=  ' - '.$subtitle; }
if($paginaTit){ $tituloFinal = $paginaTit.' | '; }
$tituloFinal .= $title;
$smarty->assign('tituloFinal',$tituloFinal,true);

#JS geral
//$smarty->append('js_files', JS_DIR.'geral.js');


# TPLs #
if(!$ajax) $smarty->display('header.tpl');
$smarty->display($sessao.'.tpl');
if(!$ajax) $smarty->display('footer.tpl');


# FECHAR BANCO #
$mysqli->FecharBanco();
?>
