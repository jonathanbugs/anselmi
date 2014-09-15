<?php
$paginaTit = 'Lista de Casamento Cadastro';
$navegacao = 'Lista de Casamento Cadastro';
$menu = 'lista-de-casamento-formulario';

require_once CLASS_DIR.'pessoa.class.php';
$Pessoa = new Pessoa($mysqli);

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:/logar/&redirect=lista-de-casamento-formulario');
}

$listaPessoa = $Pessoa->fnPessoaDados($idPessoa);
$smarty->assign('listaPessoa', $listaPessoa);

$listaEndereco = $Pessoa->fnEnderecoPessoa($idPessoa);
$smarty->assign('listaEndereco', $listaEndereco);

// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
