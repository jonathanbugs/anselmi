<?php

$smarty->assign('titulo_pagina','Importa&ccedil;&atilde;o de Arquivos');



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'importacao.js');

#CSS
$smarty->append('css_files', '');
?>