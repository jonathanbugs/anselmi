<?php

if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'on' and $_SERVER['HTTP_HOST'] != '127.0.0.1'){
	$url = str_replace('http', 'https', $urlAtual);
	header("Location: $url");
	exit;
}

$paginaTit = 'Cadastre-se';

$email = '';
$cep = '';
if($_REQUEST['email']){
	$email = $_REQUEST['email'];
}
if($_REQUEST['cep']){
	$cep = $_REQUEST['cep'];
}

$urlRedirect = $server;
if(isset($_REQUEST['redirect'])){
	$urlRedirect = str_replace("http:/", "http://", $_REQUEST['redirect']);
}

$smarty->assign('urlRedirect', $urlRedirect);

$smarty->assign('cep', $cep);
$smarty->assign('email', $email);

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
	
?>
