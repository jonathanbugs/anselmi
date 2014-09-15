<?php
$smarty->assign('titulo_pagina','Painel Inicial');

/**/
$query = "SELECT SUM(Q1.PEDIDOS) PEDIDOS, SUM(Q1.PESSOAS) PESSOAS, SUM(Q1.LISTA_CASAMENTO) LISTA_CASAMENTO
FROM (
SELECT COUNT(1) PEDIDOS, 0 PESSOAS, 0 LISTA_CASAMENTO FROM e_PEDIDO WHERE fn_situacao_pedido(ID_PEDIDO) = 2
UNION
SELECT 0 PEDIDOS, COUNT(1) PESSOAS, 0 LISTA_CASAMENTO FROM e_PESSOA WHERE DATA_INSERT > now()-1
UNION
SELECT 0 PEDIDOS, 0 PESSOAS, COUNT(1) LISTA_CASAMENTO FROM e_LISTA_CASAMENTO_ENDERECO, e_LISTA_CASAMENTO WHERE ID_LISTA_CASAMENTO = LICA_ID_LISTA_CASAMENTO AND TIPO_ENDERECO = 'ENTREGA' AND now()-7 > DATA_EVENTO AND IFNULL(DESPACHADO, 'N') = 'N'
) Q1
";
$countPedidoPessoa = $mysqli->ConsultarSQL($query);
$smarty->assign('countPedidoPessoa',$countPedidoPessoa);
/**/



$xDias = 30;
$smarty->assign('xDias',$xDias);
$hoje = date('Y-m-d', (time()+(1*24*60*60)));
$passada = date('Y-m-d', (time()-($xDias*24*60*60)));
$queryGraficoPedido = "SELECT COUNT(1) NRO_PEDIDOS, date_format(DATA_EMISSAO,'%d/%m/%Y') DATA_EMISSAO, CONSIDERA_VENDIDO, DESCRICAO_PEDIDO_ITEM_SITUACAO
						FROM e_PEDIDO, e_PEDIDO_ITEM_SITUACAO
						WHERE fn_situacao_pedido(ID_PEDIDO) = ID_PEDIDO_ITEM_SITUACAO
						AND DATA_EMISSAO BETWEEN '$passada' AND '$hoje'
						GROUP BY date_format(DATA_EMISSAO,'%d/%m/%Y'), CONSIDERA_VENDIDO, DESCRICAO_PEDIDO_ITEM_SITUACAO";

$rowGraficoPedido = $mysqli->ConsultarSQL($queryGraficoPedido);

$pedidos = array();
$pedidosDetalhe = array();
for ($x=0; $x < count($rowGraficoPedido); $x++) {
	$dia = substr($rowGraficoPedido[$x]['DATA_EMISSAO'], 0, 2);
	$key = str_replace(' ', '_', RemoveAcentos($rowGraficoPedido[$x]['DESCRICAO_PEDIDO_ITEM_SITUACAO']));
	if(!is_array($pedidos[$key])){
		$pedidos[$key] = array(
			'label' => utf8_encode($rowGraficoPedido[$x]['DESCRICAO_PEDIDO_ITEM_SITUACAO']),
			'data' => 0,
			'color' => ($rowGraficoPedido[$x]['CONSIDERA_VENDIDO']=='S') ? '#88bbc8' : '#ed7a53'
		);
	}
	$pedidos[$key]['data'] += $rowGraficoPedido[$x]['NRO_PEDIDOS'] ;

	if(!is_array($pedidosDetalhe[$key])){
		$pedidosDetalhe[$key] = array(
			'label' => utf8_encode($rowGraficoPedido[$x]['DESCRICAO_PEDIDO_ITEM_SITUACAO']),
			'data' => array(),
			'color' => ($rowGraficoPedido[$x]['CONSIDERA_VENDIDO']=='S') ? '#88bbc8' : '#ed7a53',
			'lines' => array( 'fillColor' => ($rowGraficoPedido[$x]['CONSIDERA_VENDIDO']=='S') ? '#f2f7f9' : '#fff8f2' ),
			'points' => array( 'fillColor' => ($rowGraficoPedido[$x]['CONSIDERA_VENDIDO']=='S') ? '#88bbc8' : '#ed7a53' )
		);
	}

	$pedidosDetalhe[$key]['data'][] = array(
		$dia,
		$rowGraficoPedido[$x]['NRO_PEDIDOS']
	);
}
$smarty->assign('pedidos', $pedidos);
$smarty->assign('pedidosDetalhe', $pedidosDetalhe);
$pedidos = array_values($pedidos);
$pedidosDetalhe = array_values($pedidosDetalhe);
$smarty->assign('JSONpedidos', json_encode($pedidos));
$smarty->assign('JSONpedidosDetalhe', json_encode($pedidosDetalhe));


$queryManutencao = "UPDATE e_PEDIDO_ITEM SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_TIMEOUT." WHERE PEDI_ID_PEDIDO IN (
SELECT 
	PEDI.ID_PEDIDO
FROM
	e_PEDIDO PEDI
WHERE
	NOT EXISTS (SELECT 
					1
				FROM
					e_RETORNO_PAGAMENTO_MOIP RPMO
				WHERE
					RPMO.ID_TRANSACAO = PEDI.NUMERO_PEDIDO)
AND fn_situacao_pedido(PEDI.ID_PEDIDO) = ".ID_SITUACAO_PEDIDO_ANALISE_CREDITO."
AND PEDI.DATA_EMISSAO < now()-1
);

delete from e_PRODUTO_COMBINACAO_ESTOQUE where ID_PRODUTO_COMBINACAO_ESTOQUE in (
SELECT 
	ID_PRODUTO_COMBINACAO_ESTOQUE
FROM
	e_PEDIDO_ITEM PEIT,
	e_PRODUTO_COMBINACAO_ESTOQUE PCES
WHERE
	PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM in (".ID_SITUACAO_PEDIDO_TIMEOUT.", ".ID_SITUACAO_PEDIDO_CANCELADO.")
AND PEIT.ID_PEDIDO_ITEM = PCES.PEIT_ID_PEDIDO_ITEM
);";
$mysqli->ExecutarMultiSQL($queryManutencao);


/**/
#plugins
#$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'dashboard.js');

#CSS
#$smarty->append('css_files', '');
?>
