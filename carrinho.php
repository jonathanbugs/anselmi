<?php
$paginaTit = 'Carrinho de Compras';

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

$smarty->assign('valorPacotePresente', VALOR_PACOTE_PRESENTE);

$_SESSION['sessionIdPedido'] = "";

/*carrinho*/
if($idPessoaLogada){
	$idPessoaLogada = sqlvalue($_SESSION['sessionIdPessoa'], true);
	$where = "OR CARR.PESS_ID_PESSOA = ".$idPessoaLogada."";
	$where = "";
}

$whereListaCasamento = "";
if($idListaCasamento){
	$idListaCasamento = sqlvalue($idListaCasamento, false);
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$listaCasamento = $listaListaCasamento[0];

	$smarty->assign('idListaCasamento', $listaCasamento['ID_LISTA_CASAMENTO']);
	$smarty->assign('url', $listaCasamento['URL']);
	$smarty->assign('nomeConjuge1',  ucwords(strtolower($listaCasamento['CONJUGE1'])));
	$smarty->assign('nomeConjuge2',  ucwords(strtolower($listaCasamento['CONJUGE2'])));
	$smarty->assign('fotoCapa', $listaCasamento['FOTO_CAPA']);

	$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
} else {
	$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
}

$queryCarrinho = "SELECT
							TPSI.DESCRICAO_VENDA,
							TPSI.REFERENCIA,
							CARR.PRECO_UNITARIO_VENDA+IFNULL(CARR.VALOR_PACOTE_PRESENTE,0) PRECO_UNITARIO_VENDA,
							CARR.QUANTIDADE,
							TPSI.URL_AMIGAVEL,
							TPSI.IMAGEM_PRINCIPAL,
							TPSI.PRCO_ID_PRODUTO_COMBINACAO ID_PRODUTO_ATRIBUTO_VALOR,
							CARR.ID_CARRINHO,
							CARR.PACOTE_PRESENTE,
							CARR.VALOR_PACOTE_PRESENTE,
							CARR.COD_TEMP_CLIENTE,
							CASE IFNULL(CARR.LICA_ID_LISTA_CASAMENTO,0) WHEN 0 
							THEN fn_saldo_disponivel_produto(CARR.PRCO_ID_PRODUTO_COMBINACAO, now())
							ELSE IFNULL(LCPR.QTD_SOLICITADA,0)-IFNULL(LCPR.QTD_VENDIDA,0) END SALDO,
							TPSI.FRETE_GRATIS,
							CAST(CARR.DATA_INSERT AS DATE) DATA_INSERT,
							TPSI.PROD_ID_PRODUTO,
							LCPR.QTD_SOLICITADA,
							fn_atributo_produto_combinacao(CARR.PRCO_ID_PRODUTO_COMBINACAO) ATRIBUTO
						FROM
							e_CARRINHO CARR LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
												   ON CARR.LICA_ID_LISTA_CASAMENTO = LCPR.LICA_ID_LISTA_CASAMENTO
												  AND CARR.PRCO_ID_PRODUTO_COMBINACAO = LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR,
							".TABELA_PRODUTO_SITE." TPSI
						WHERE
							CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
						AND CARR.DATA_DELETE IS NULL
						AND IFNULL(CARR.FINALIZADO, 'N') = 'N'
						AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' ".$where.")
						AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
						".$whereListaCasamento."
						ORDER BY
							CARR.ID_CARRINHO DESC";

$queryProdutoCarrinho = $mysqli->ConsultarSQL($queryCarrinho);

foreach ($queryProdutoCarrinho as $valueProdutoCarrinho) {
	if(file_exists('midia/produtos/carrinho-de-compras/'.$valueProdutoCarrinho['IMAGEM_PRINCIPAL'])){
		$valueProdutoCarrinho['IMAGEM_PRINCIPAL'] = $valueProdutoCarrinho['IMAGEM_PRINCIPAL'];
	} else {
		$valueProdutoCarrinho['IMAGEM_PRINCIPAL'] = 'SEM_FOTO.jpg';
	}

	$listaProdutoCarrinho[] = $valueProdutoCarrinho;

}

$subtotalCarrinho = 0;
$totalCarrinhoFinal = 0;
$valorFreteCarrinho = 0;
$qtdItensCarrinho = 0;
$arrayFreteGratis = array();
if(count($listaProdutoCarrinho) > 0){
	foreach ($listaProdutoCarrinho as $value) {

		$arrayFreteGratis[] = $value['FRETE_GRATIS'];
		
		$queryAdicional = "";
		if($value['COD_TEMP_CLIENTE'] != COD_TEMP_CLIENTE){
			$queryAdicional = "UPDATE e_CARRINHO SET COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' 
							   WHERE COD_TEMP_CLIENTE = '".$value['COD_TEMP_CLIENTE']."'
							   AND PESS_ID_PESSOA = ".$idPessoaLogada.";";
		}
		$subtotalCarrinho = $subtotalCarrinho+($value['PRECO_UNITARIO_VENDA']*$value['QUANTIDADE']);
		$totalCarrinhoFinal = $totalCarrinhoFinal+(($value['PRECO_UNITARIO_VENDA']*$value['QUANTIDADE'])+$valorFreteCarrinho);
		$qtdItensCarrinho = $qtdItensCarrinho+$value['QUANTIDADE'];
		$queryDeletaMovimento .= "DELETE FROM e_PRODUTO_COMBINACAO_ESTOQUE WHERE CARR_ID_CARRINHO = ".$value['ID_CARRINHO']."
								AND (PEIT_ID_PEDIDO_ITEM IS NULL OR
									 PEIT_ID_PEDIDO_ITEM IN (SELECT 
																	PEIT.ID_PEDIDO_ITEM
																FROM	
																	E_PEDIDO_ITEM PEIT
															   WHERE
																	PEIT.CARR_ID_CARRINHO = ".$value['ID_CARRINHO']."
																AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DIGITACAO."
															   )		
									 );
									 ".$queryAdicional;
	}
}

$mysqli->ExecutarSQL($queryDeletaMovimento);

if($_SESSION['sessionValorFreteCarrinho']){
	$valorFreteCarrinho = $_SESSION['sessionValorFreteCarrinho'];
}

if($_REQUEST['tipoFrete'] || $_REQUEST['valorFrete']){
	$tipoFreteSelecionado = $_REQUEST['tipoFrete'];
	$valorFreteSelecionado = $_REQUEST['valorFrete'];
	$_SESSION['sessionTipoFreteCarrinho'] = $tipoFreteSelecionado;
}

if(isset($valorFreteSelecionado)){
	$totalCarrinhoFinal = $totalCarrinhoFinal+$valorFreteSelecionado;
}
/**/

/*cupom*/
require_once CLASS_DIR.'promocao.class.php';
$Promocao = new Promocao($mysqli);

$codigoCupom = 'N';
$emailClienteContemplado = $_SESSION['login'];
$valorCompra = $subtotalCarrinho;
$qtdItensCarrinho = $qtdItensCarrinho;

if($_REQUEST['excluirCupom'] == 'S'){
	$_SESSION['sessionCupomDesconto'] = '';
	$_SESSION['sessionValorDescontoCarrinho'] = '';
}

if($_REQUEST['codigoCupom']){
	$codigoCupom = $_REQUEST['codigoCupom'];
	$_SESSION['sessionCupomDesconto'] = $codigoCupom;
} elseif($_SESSION['sessionCupomDesconto']){
	$codigoCupom = $_SESSION['sessionCupomDesconto'];
}

$promocaoCarrinho = $Promocao->fnPromocaoCarrinho($codigoCupom, $valorCompra, $qtdItensCarrinho, $emailClienteContemplado);
//printr($promocaoCarrinho);
$valorTotalDesconto = 0;
foreach ($promocaoCarrinho as $valuePromoCarrinho) {
	
	if($valuePromoCarrinho['CUPOM_PROMOCIONAL']){ 
		$_SESSION['sessionIdCupomDesconto'] = $valuePromoCarrinho['ID_PROMOCAO_CARRINHO'];
	}

	if($valuePromoCarrinho['TIPO_DESCONTO'] == 'P'){
		$valorTotalDesconto = $valorTotalDesconto+((($subtotalCarrinho-$valorTotalDesconto)*$valuePromoCarrinho['VALOR_DESCONTO'])/100);
	} else {
		$valorTotalDesconto = $valorTotalDesconto+$valuePromoCarrinho['VALOR_DESCONTO'];
	}
	//echo $subtotalCarrinho.'-'.$valorTotalDesconto."<br>";
}

if($valorTotalDesconto > 0){
	$_SESSION['sessionValorDescontoCarrinho'] = number_format($valorTotalDesconto, 2, '.', '');
}

$totalCarrinhoFinal = $totalCarrinhoFinal-$valorTotalDesconto;
$retornoPromo = $valuePromoCarrinho['RETORNO'];
if($retornoPromo == 'LOGAR'){
	$retornoPromo = 'Voc&ecirc; deve estar logado para utilizar este cupom';
} elseif($retornoPromo == 'VENCEU') {
	$retornoPromo = 'Cupom vencido';
} elseif($retornoPromo == 'NAOEXISTE' and $codigoCupom != 'N'){
	$retornoPromo = 'Cupom inv&aacute;lido';
} else {
	$retornoPromo = '';
}

if($valuePromoCarrinho['FRETE_GRATIS'] == 'S'){
	$arrayFreteGratis[] = 'S';
	$retornoPromo = 'Frete Gr&aacute;tis';
}
$smarty->assign('retornoPromo', $retornoPromo);
/**/

/*frete*/
$freteCalculado = 'N';
if(isset($_REQUEST['acao']) and $_REQUEST['acao'] == 'calculaFrete'){
	
	require_once CLASS_DIR.'frete.class.php';
	$Frete = new Frete($mysqli);

	$cepDestino = $_REQUEST['cep'];
	
	$query = "SELECT
					SUM(ROUND(TPSI.PESO_KG*CARR.QUANTIDADE,2)) PESO_KG,
					SUM(TPSI.ALTURA_CM) ALTURA,
					SUM(TPSI.LARGURA_CM) LARGURA,
					SUM(TPSI.PROFUNDIDADE_CM) PROFUNDIDADE,
					SUM(ROUND((TPSI.ALTURA_CM*TPSI.LARGURA_CM*TPSI.PROFUNDIDADE_CM)/6000,3)) PESO_CUBICO,
					SUM(((CARR.PRECO_UNITARIO_VENDA+IFNULL(CARR.VALOR_PACOTE_PRESENTE,0))*CARR.QUANTIDADE)-IFNULL(CARR.VALOR_DESCONTO,0)) PRECO_VENDA,
					PTFR.TIFR_ID_TIPO_FRETE,
					TIFR.DESCRICAO_FRETE
				FROM
					e_CARRINHO CARR,
					".TABELA_PRODUTO_SITE." TPSI,
					e_PRODUTO_TIPO_FRETE PTFR,
					e_TIPO_FRETE TIFR
				WHERE
					CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
				AND CARR.DATA_DELETE IS NULL
				AND IFNULL(CARR.FINALIZADO, 'N') = 'N'
				AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' ".$where.")
				AND TPSI.PROD_ID_PRODUTO = PTFR.PROD_ID_PRODUTO
				AND PTFR.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
				GROUP BY
					PTFR.TIFR_ID_TIPO_FRETE, TIFR.DESCRICAO_FRETE";
//printr($query);
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

	
}
if(in_array('S', $arrayFreteGratis)){
	$freteGratis = 'S';
	$_SESSION['sessionFreteGratis'] = $freteGratis;
} else {
	$freteGratis = 'N';
	$_SESSION['sessionFreteGratis'] = $freteGratis;
}

/**/

/*DESCONTO BOLETO*/
$descontoBoleto = DESCONTO_FORMA_PAGAMENTO_BOLETO;
$precoNoBoleto = (($subtotalCarrinho-$valorTotalDesconto)*(100-$descontoBoleto)/100)+formataPrecoInsert($valorFreteSelecionado);
$smarty->assign('descontoBoleto', $descontoBoleto);
$smarty->assign('precoNoBoleto', $precoNoBoleto);
/**/

$smarty->assign('descricaoTipoFrete', $resultTipoFrete);
$smarty->assign('tipoFreteSelecionado', $tipoFreteSelecionado);
$smarty->assign('valorFreteSelecionado', $valorFreteSelecionado);
$smarty->assign('freteCalculado', $freteCalculado);
$smarty->assign('cepDestino', fnFormataCep($cepDestino));
$smarty->assign('retornoCalculoFrete', $retornoCalculoFrete);
$smarty->assign('freteGratis', $freteGratis);

$smarty->assign('valorTotalDesconto', $valorTotalDesconto);

if($codigoCupom == 'N'){ $codigoCupom = NULL; } 
$smarty->assign('codigoCupom', $codigoCupom);

$smarty->assign('subtotalCarrinho', $subtotalCarrinho);
$smarty->assign('totalCarrinhoFinal', $totalCarrinhoFinal);
$smarty->assign('listaProdutoCarrinho', $listaProdutoCarrinho);

//BTG//
$countProdutoCarrinho = count($queryProdutoCarrinho);
$i=0;
foreach ($queryProdutoCarrinho as $valueProdutoCarrinho) {
	$i++;
	if($i == $countProdutoCarrinho){
		$idsProdutoCarrinho .= $valueProdutoCarrinho['PROD_ID_PRODUTO'];
	} else {
		$idsProdutoCarrinho .= $valueProdutoCarrinho['PROD_ID_PRODUTO'].',';
	}
}

$queryCategoriaProduto = "SELECT
								CATE.ID_CATEGORIA,
								CATE.URL_AMIGAVEL,
								CATE.DESCRICAO_CATEGORIA,
								PROD.ID_PRODUTO
							FROM
								e_PRODUTO PROD,
								e_PRODUTO_CATEGORIA PRCA,
								e_CATEGORIA CATE
							WHERE
								PROD.ID_PRODUTO = PRCA.PROD_ID_PRODUTO
							AND PRCA.CATE_ID_CATEGORIA = CATE.ID_CATEGORIA
							AND PROD.ID_PRODUTO IN (".$idsProdutoCarrinho.")
							ORDER BY 
								CATE.ID_CATEGORIA";

$resultCategoriaProduto = $mysqli->ConsultarSQL($queryCategoriaProduto);

foreach ($resultCategoriaProduto as $valueCategoriaProduto) {
	$categoriaProduto[$valueCategoriaProduto['ID_PRODUTO']][] = $valueCategoriaProduto;
}
$smarty->assign('categoriaProduto', $categoriaProduto);
/**/


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
	
?>
