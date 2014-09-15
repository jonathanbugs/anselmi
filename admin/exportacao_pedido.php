<?php

$smarty->assign('titulo_pagina','Exporta&ccedil;&atilde;o de Arquivos');



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'exportacao.js');

#CSS
$smarty->append('css_files', '');
?>