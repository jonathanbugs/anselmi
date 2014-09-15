<?php

require_once CLASS_DIR.'pessoa.class.php';
$Pessoa = new Pessoa($mysqli);

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=endereco-de-entrega');
}

$smarty->assign('linkAtivo', 'enderecoEntrega');

$listaEndereco = $Pessoa->fnEnderecoPessoa($idPessoa);
$smarty->assign('listaEndereco', $listaEndereco);

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$paginaTit = 'Meus Dados - Endere&ccedil;o Entrega';
?>
