<?php
$smarty->assign('titulo_pagina','Atributos');

/**/
$queryAtributo = "SELECT ID_ATRIBUTO, DESCRICAO_ATRIBUTO FROM e_ATRIBUTO";
$listaAtributoProduto = $mysqli->ConsultarSQL($queryAtributo);
$smarty->assign('listaAtributoProduto',$listaAtributoProduto);
/**/

/**/
$queryAtributoValor = "SELECT ID_ATRIBUTO_VALOR, VALOR, ATRI_ID_ATRIBUTO, HEXADECIMAL FROM e_ATRIBUTO_VALOR ORDER BY ATRI_ID_ATRIBUTO, VALOR";
$listaAtributoValor = $mysqli->ConsultarSQL($queryAtributoValor);
$smarty->assign('listaAtributoValor', $listaAtributoValor);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'atributo.js');

#CSS
$smarty->append('css_files', CSS_DIR.'atributo.css');

?>