<?php
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'on' and $_SERVER['HTTP_HOST'] != '127.0.0.1'){
	$url = str_replace('http', 'https', $urlAtual);
	header("Location: $url");
	exit;
}

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=checkout-pagamento-entrega');
}

require_once CLASS_DIR.'pedido.class.php';
$Pedido = new Pedido($mysqli);

if($_SESSION['sessionIdPessoa'] and !$_SESSION['sessionIdPedido']){
	$retorno = $Pedido->fnGravaPedido();
	if(!$retorno){
		header('Location:carrinho');
	}
}


require_once CLASS_DIR.'pessoa.class.php';
$Pessoa = new Pessoa($mysqli);

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

if($idListaCasamento){
	$idListaCasamento = sqlvalue($idListaCasamento, false);
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$listaCasamento = $listaListaCasamento[0];

	$smarty->assign('idListaCasamento', $listaCasamento['ID_LISTA_CASAMENTO']);
	$smarty->assign('url', $listaCasamento['URL']);
	$smarty->assign('nomeConjuge1',  ucwords(strtolower($listaCasamento['CONJUGE1'])));
	$smarty->assign('nomeConjuge2',  ucwords(strtolower($listaCasamento['CONJUGE2'])));
	$smarty->assign('fotoCapa', $listaCasamento['FOTO_CAPA']);
	
}

$paginaTit = 'Pagamento e Entrega';
$navegacao = 'Pagamento e Entrega';
$menu = 'pagamento_entrega';

$smarty->assign('etapaPedido', 2);

$idPedido = $_SESSION['sessionIdPedido'];
$smarty->assign('idPedido', $idPedido);

//printr($_SESSION);

if($idPedido){

	if(isset($_REQUEST['idNovoEndereco'])){
		$Pedido->fnPedidoEnderecoUpdate($idPedido, $_REQUEST['idNovoEndereco']);
	}

	if(isset($_SESSION['sessionValorDescontoCarrinho']) and $_SESSION['sessionValorDescontoCarrinho'] > 0){
		$valorDescontoCarrinho = sqlvalue($_SESSION['sessionValorDescontoCarrinho'], true);
		$queryValorTotalPedido = "SELECT 
										SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE) VALOR_TOTAL
									FROM
										e_PEDIDO_ITEM PEIT
									WHERE
										PEIT.PEDI_ID_PEDIDO = ".$idPedido."";
		$valorTotalPedido = $mysqli->ConsultarSQL($queryValorTotalPedido);

		$mysqli->ExecutarSQL("UPDATE e_PEDIDO_ITEM
								 SET VALOR_DESCONTO = ROUND((".$valorDescontoCarrinho."/".$valorTotalPedido[0]['VALOR_TOTAL'].")*(PRECO_UNITARIO_VENDA*QUANTIDADE),2)
							   WHERE PEDI_ID_PEDIDO = ".$idPedido."");
	}

	if(isset($_SESSION['sessionIdCupomDesconto'])){
		$idPromocaoCarrinho = sqlvalue($_SESSION['sessionIdCupomDesconto'], true);
		$mysqli->ExecutarSQL("UPDATE e_PEDIDO SET PRCA_ID_PROMOCAO_CARRINHO = ".$idPromocaoCarrinho." WHERE ID_PEDIDO = ".$idPedido."");
	}

	/*ENDERECO PEDIDO*/
	$listaPedidoEndereco = $Pedido->fnPedidoEnderecoFinaliza($idPedido);
	$cepEnderecoEntrega = $listaPedidoEndereco[0]['CEP'];
	$idPessoaEnderecoEntrega = $listaPedidoEndereco[0]['PEEN_ID_PESSOA_ENDERECO'];
	$smarty->assign('idPessoaEnderecoEntrega', $idPessoaEnderecoEntrega);
	$smarty->assign('listaPedidoEndereco', $listaPedidoEndereco);

	if(isset($_REQUEST['tipoFrete'])){
		$tipoFreteSelecionado = $_REQUEST['tipoFrete'];
		$_SESSION['sessionTipoFreteCarrinho'] = $tipoFreteSelecionado;
	} else {
		$tipoFreteSelecionado = $_SESSION['sessionTipoFreteCarrinho'];
	}
	/**/

	/*ENDERECO PESSOA*/
	$listaPessoaEndereco = $Pessoa->fnEnderecoPessoa($_SESSION['sessionIdPessoa']);
	$smarty->assign('listaPessoaEndereco', $listaPessoaEndereco);
	$smarty->assign('idPessoa', $_SESSION['sessionIdPessoa']);
	/**/

	/*frete*/
	$freteCalculado = 'N';
		
	require_once CLASS_DIR.'frete.class.php';
	$Frete = new Frete($mysqli);

	$cepDestino = $cepEnderecoEntrega;
	$idPedido = sqlvalue($idPedido, false);
	
	$query = "SELECT
					SUM(TPSI.PESO_KG) PESO_KG,
					SUM(TPSI.ALTURA_CM) ALTURA,
					SUM(TPSI.LARGURA_CM) LARGURA,
					SUM(TPSI.PROFUNDIDADE_CM) PROFUNDIDADE,
					SUM(ROUND((TPSI.ALTURA_CM*TPSI.LARGURA_CM*TPSI.PROFUNDIDADE_CM)/6000,3)) PESO_CUBICO,
					SUM(((PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0))*PEIT.QUANTIDADE)-IFNULL(PEIT.VALOR_DESCONTO,0)) PRECO_VENDA,
					PTFR.TIFR_ID_TIPO_FRETE,
					TIFR.DESCRICAO_FRETE
				FROM
					e_PEDIDO_ITEM PEIT,
					".TABELA_PRODUTO_SITE." TPSI,
					e_PRODUTO_TIPO_FRETE PTFR,
					e_TIPO_FRETE TIFR
				WHERE
					PEIT.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
				AND TPSI.PROD_ID_PRODUTO = PTFR.PROD_ID_PRODUTO
				AND PTFR.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
				AND PEIT.PEDI_ID_PEDIDO = ".$idPedido."
				GROUP BY
					PTFR.TIFR_ID_TIPO_FRETE, TIFR.DESCRICAO_FRETE";

	$resultTipoFrete = $mysqli->ConsultarSQL($query);
	$row = $resultTipoFrete[0];

	$arrayTipoFrete = array();
	foreach ($resultTipoFrete as $value) {
		$arrayTipoFrete[] = $value['TIFR_ID_TIPO_FRETE'];
	}

	if(in_array(ID_TIPO_FRETE_TRANSP_PADRAO, $arrayTipoFrete)){
		$tipoFrete = array(ID_TIPO_FRETE_TRANSP_PADRAO);
	} else {
		$tipoFrete = $arrayTipoFrete;	
	}

	$retornoFrete = $Frete->fnCalculaFrete($cepDestino, $row['PESO_KG'], $row['PESO_CUBICO'], $row['ALTURA'], $row['LARGURA'], $row['PROFUNDIDADE'], $tipoFrete, $row['PRECO_VENDA']);

	if($retornoFrete){
		$freteCalculado = 'S';
		$retornoCalculoFrete = $retornoFrete;		
	} else {
		$freteCalculado = 'E';
		$retornoCalculoFrete = "erro";
	}

	$arrayTipoFretePossivel = array();
	if($retornoFrete){
		foreach ($retornoFrete as $valueFrete) {
			$arrayTipoFretePossivel[] = $valueFrete['Codigo'];
			if($valueFrete['Codigo'] == $tipoFreteSelecionado){
				if($_SESSION['sessionFreteGratis'] == 'S' and ($valueFrete['Codigo'] == 41068 or $valueFrete['Codigo'] == 1)){
					$valorFreteSelecionado = 0;
				} else {
					$valorFreteSelecionado = $valueFrete['Valor'];
				}
				$prazoEntregaFreteSelecionado = $valueFrete['PrazoEntrega'];
			}
		}
		$valorFreteSelecionado = str_replace(',', '.', $valorFreteSelecionado);
		$mysqli->ExecutarSQL("UPDATE e_PEDIDO SET TIFR_ID_TIPO_FRETE = ".$tipoFreteSelecionado.", VALOR_FRETE = ".$valorFreteSelecionado.", PRAZO_ENTREGA_DIAS = ".$prazoEntregaFreteSelecionado." WHERE ID_PEDIDO = ".$idPedido."");
	}
	
	if(!in_array($tipoFreteSelecionado, $arrayTipoFretePossivel)){
		$tipoFreteSelecionado = '';
	}
 
	$smarty->assign('retornoCalculoFrete', $retornoCalculoFrete);
	$smarty->assign('descricaoTipoFrete', $resultTipoFrete);
	$smarty->assign('tipoFreteSelecionado', $tipoFreteSelecionado);
	$smarty->assign('freteGratis', $_SESSION['sessionFreteGratis']);

	/**/

	$listaPedido = $Pedido->fnPedidoFinaliza($idPedido);
	$smarty->assign('listaPedido', $listaPedido);
	
	$subtotalPedido = 0;
	$totalPedidoFinal = 0;
	$valorPedidoDesconto = 0;
	foreach ($listaPedido as $value) {
		$subtotalPedido = $subtotalPedido+($value['PRECO_UNITARIO_VENDA']*$value['QUANTIDADE']);
		$valorPedidoDesconto = $valorPedidoDesconto+$value['VALOR_DESCONTO'];
	}

	$valorFretePedido = $listaPedido[0]['VALOR_FRETE'];
	$smarty->assign('valorFretePedido', $valorFretePedido);

	$totalPedidoFinal = $subtotalPedido;
	if($valorPedidoDesconto > 0){
		$totalPedidoFinal = $totalPedidoFinal-$valorPedidoDesconto;
	}
	if($valorFretePedido){
		$totalPedidoFinal = $totalPedidoFinal+$valorFretePedido;
	}

	/*desconto formapagamento*/

	$descontoAVista = DESCONTO_FORMA_PAGAMENTO_BOLETO;
	$precoAVista = ($subtotalPedido-(($subtotalPedido*$descontoAVista)/100))+$valorFretePedido;
	$precoAVista = (($subtotalPedido-$valorPedidoDesconto)*((100-$descontoAVista)/100))+$valorFretePedido;
	$smarty->assign('descontoAVista', $descontoAVista);
	$smarty->assign('precoAVista', $precoAVista);
	/**/

	$smarty->assign('subtotalPedido', $subtotalPedido);
	$smarty->assign('totalPedidoFinal', $totalPedidoFinal);
	$smarty->assign('valorPedidoDesconto', $valorPedidoDesconto);

	$arrayDescFopa['DESC_BOLETO'] = ($subtotalPedido-$valorPedidoDesconto)*((100-$descontoFopa[4])/100);
	$arrayDescFopa['DESC_TRANSFERENCIA'] = ($subtotalPedido-$valorPedidoDesconto)*((100-$descontoFopa[3])/100);
	$smarty->assign('descontoFopa', $arrayDescFopa);	
	
	$countPedidosItens = count($listaPedido);
	$smarty->assign('countPedidosItens', $countPedidosItens);

	$parcelamento = fnNroParcelas($totalPedidoFinal);
	$smarty->assign('parcelamento', $parcelamento);


} else {
	header('Location:carrinho');
}


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
