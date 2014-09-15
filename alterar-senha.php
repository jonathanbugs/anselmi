<?php
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'on' and $_SERVER['HTTP_HOST'] != '127.0.0.1'){
	$url = str_replace('http', 'https', $urlAtual);
	header("Location: $url");
	exit;
}

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=alterar-senha');
}

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$smarty->assign('linkAtivo', 'alterarSenha');

$paginaTit = 'Meus Dados - Alterar Senha';
?>
