<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Lista Pedido');



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');
$smarty->append('css_files', CSS_DIR.'supr-theme/jquery.ui.supr.css');
$smarty->append('css_files', PLUGINS_DIR.'elfinder/elfinder.css');
$smarty->append('js_files', PLUGINS_DIR.'elfinder/elfinder.min.js');

#JS
$smarty->append('js_files', JS_DIR.'pedido.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pedido.css');


// datas
$hoje = date('d/m/Y');
$passada = date('d/m/Y', (time()-(7*24*60*60)));
$smarty->assign('hoje', $hoje);
$smarty->assign('passada', $passada);

// pedidos
include_once('../classes/pedido.class.php');
$classPedido = new Pedido($mysqli);
$pedidos = $classPedido->fnPedidoSituacao();
$smarty->assign('pedidos', $pedidos);
//


?>
