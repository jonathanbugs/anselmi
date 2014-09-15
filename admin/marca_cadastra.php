<?php
$smarty->assign('titulo_pagina','Marca Produto');

/**/

$query = "SELECT ID_MARCA, DESCRICAO_MARCA FROM e_MARCA";

$visualizaMarcaProduto = ConsultarSQL($query);
$smarty->assign('visualizaMarcaProduto',$visualizaMarcaProduto);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'marca.js');

#CSS
#$smarty->append('css_files', CSS_DIR.'Marca.css');

?>