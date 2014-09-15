<?php
require('configs/config.php');

$UrlAtual = UrlAtual();
ValidarUsuario($UrlAtual, $mysqli, $subdominio);

if( isset($_GET['pagina']) ){ $pagina = $_GET['pagina']; }
	else { $pagina = 'dashboard'; }

$pagina = str_replace("-", "_", $pagina);

require_once($pagina.'.php');


//limpa cache
//$smarty->clearCache($pagina.'.tpl');
$tipoBuscaTopo = 'pedido-lista';
$buscaGeralTopo = '';
if(isset($_POST['tipoBuscaTopo'])){
	$tipoBuscaTopo = $_POST['tipoBuscaTopo'];
}
if(isset($_POST['buscaGeralTopo'])){
	$buscaGeralTopo = $_POST['buscaGeralTopo'];
}
$smarty->assign('tipoBuscaTopo', $tipoBuscaTopo);
$smarty->assign('buscaGeralTopo', $buscaGeralTopo);

# TPLs #
$smarty->caching = 0; 
$smarty->display('header.tpl');
$smarty->display($pagina.'.tpl');
$smarty->display('footer.tpl');

$mysqli->FecharBanco();

?>