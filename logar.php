<?php
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'on' and $_SERVER['HTTP_HOST'] != '127.0.0.1'){
	$url = str_replace('http', 'https', $urlAtual);
	header("Location: $url");
	exit;
}

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

if($idListaCasamento){
	$idListaCasamento = sqlvalue($idListaCasamento, false);
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$listaCasamento = $listaListaCasamento[0];

	$smarty->assign('idListaCasamento', $listaCasamento['ID_LISTA_CASAMENTO']);
	$smarty->assign('url', $listaCasamento['URL']);
	$smarty->assign('fotoCapa', $listaCasamento['FOTO_CAPA']);
	$smarty->assign('nomeConjuge1',  ucwords(strtolower($listaCasamento['CONJUGE1'])));
	$smarty->assign('nomeConjuge2',  ucwords(strtolower($listaCasamento['CONJUGE2'])));
	
}

$paginaTit = 'Logar';
$navegacao = 'Logar';
$menu = 'logar';

/**/
$acao = null;
if (isset($_REQUEST["acao"])) {
	$acao = $_REQUEST["acao"];
}

$urlRedirect = $server;
if(isset($_REQUEST['redirect'])){
	$addProduto;
	if(isset($_GET['addProduto'])){
		$addProduto = '&addProduto='.$_GET['addProduto'].'&idProduto='.$_GET['idProduto'];
	}
	$urlRedirect = $_REQUEST['redirect'].$addProduto;
}

if($_SESSION["sessionErroLogar"] == 'S'){
	$erroLogar = 'S';
} else {
	$erroLogar = '';
}
$smarty->assign('erroLogar', $erroLogar);

$smarty->assign('urlRedirect', $urlRedirect);

switch ($acao) {
	
	case 'logar':
		
		$login = $_POST["email"];
		$senha = md5($_POST["senha"]);
		$urlRedirect = str_replace('httpss', 'http', $urlRedirect);

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;

		ValidarCliente($urlRedirect, true, 'logar', $mysqli);

		break;

	case 'logout':

		$_SESSION['login'] = NULL;
		$_SESSION['senha'] = NULL;
		$_SESSION['sessionNome'] = NULL;
		$_SESSION['sessionIdPessoa'] = NULL;

		$refresh = str_replace('&acao=logout', '', $urlAtual);
		header('Location: '.$refresh);

		break;
	
	default:
		# code...
		break;

}
/**/

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
