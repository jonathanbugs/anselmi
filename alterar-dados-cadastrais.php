<?php

if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'on' and $_SERVER['HTTP_HOST'] != '127.0.0.1'){
	$url = str_replace('http', 'https', $urlAtual);
	header("Location: $url");
	exit;
}

require_once CLASS_DIR.'pessoa.class.php';
$Pessoa = new Pessoa($mysqli);

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=altera-dados-cadastrais');
}

$smarty->assign('linkAtivo', 'alterarDadosCadastrais');

$listaPessoa = $Pessoa->fnPessoaDados($idPessoa);
$smarty->assign('listaPessoa', $listaPessoa);


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$paginaTit = 'Meus Dados - Dados Cadastrais';
?>
