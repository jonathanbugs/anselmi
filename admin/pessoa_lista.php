<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pessoa.class.php');
$Pessoa = new Pessoa($mysqli);

$smarty->assign('titulo_pagina','Lista Pessoa');



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pessoa.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pessoa.css');
?>