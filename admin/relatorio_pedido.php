<?php

$smarty->assign('titulo_pagina','Relat&oacute;rio de Pedidos');



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'relatorio_pedido.js');

#CSS
$smarty->append('css_files', '');


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

?>
