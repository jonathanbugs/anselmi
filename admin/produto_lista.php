<?php
$smarty->assign('titulo_pagina','Lista Produto');

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'produto.js');

#CSS
$smarty->append('css_files', CSS_DIR.'produto.css');
?>