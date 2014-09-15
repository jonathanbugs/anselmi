<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Atendimento de Pedido');

/**/
$listaPedido = $Pedido->fnPedidoManutencao(ID_SITUACAO_PEDIDO_APROVADO_CREDITO);
$smarty->assign('listaPedido',$listaPedido);
/**/

/**/
$smarty->assign('idSituacaoPedidoProdIndisponivel', ID_SITUACAO_PEDIDO_PROD_INDISPONIVEL);
$smarty->assign('idSituacaoPedidoAtendido', ID_SITUACAO_PEDIDO_ATENDIDO);
$smarty->assign('idSituacaoPedidoAprovadoCredito', ID_SITUACAO_PEDIDO_APROVADO_CREDITO);

/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pedido.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pedido.css');
?>