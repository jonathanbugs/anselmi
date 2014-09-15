<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/compre_junto.class.php');
$CompreJunto = new CompreJunto($mysqli);

$smarty->assign('titulo_pagina','Cadastra Compre Junto');

$listaCompreJunto = array();
$idCompreJunto = null;
if($_GET['idCompreJunto']){
    $idCompreJunto = $_GET['idCompreJunto'];
    $listaCompreJunto = $CompreJunto->fnCompreJunto(null, $idCompreJunto);
}
$smarty->assign('listaCompreJunto', $listaCompreJunto);
$smarty->assign('idCompreJunto', $idCompreJunto);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'compre_junto.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'compre_junto.css');
?>

