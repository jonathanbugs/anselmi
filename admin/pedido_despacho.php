<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Despacho de Pedido');

/**/
$listaPedido = $Pedido->fnPedidoDespacho(ID_SITUACAO_PEDIDO_ATENDIDO);
$smarty->assign('listaPedido',$listaPedido);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pedido.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pedido.css');
?>