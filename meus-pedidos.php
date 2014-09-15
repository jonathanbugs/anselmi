<?php
$paginaTit = 'Meus Pedidos';
$navegacao = 'Meus Pedidos';
$menu = 'meus_pedidos';

require_once CLASS_DIR.'pedido.class.php';
$Pedido = new Pedido($mysqli);

$smarty->assign('linkAtivo', 'meusPedidos');

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=meus-pedidos');
}

/**/
$listaPedido = $Pedido->fnMeusPedidos($idPessoa);

$pedido = array();
foreach ($listaPedido as $valuePedido) {
	$pedido[$valuePedido['ID_PEDIDO']][] = $valuePedido;
}

$smarty->assign('pedido', $pedido);
$smarty->assign('itemPedido', $itemPedido);
/**/

/**/
$statusPedido = $Pedido->fnStatusPedido($idPessoa, null);
$listaStatusPedido = array();
foreach ($statusPedido as $valueStatusPedido) {
	$listaStatusPedido[$valueStatusPedido['ID_PEDIDO']][$valueStatusPedido['ID_SITUACAO']] = $valueStatusPedido;
}
$smarty->assign('listaStatusPedido', $listaStatusPedido);
/**/

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
