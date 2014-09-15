<?php
//printr($_SESSION);
require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

require_once CLASS_DIR.'lista_casamento.class.php';
$ListaCasamento = new ListaCasamento($mysqli);

/**/
$urlAmigavel = $descricaoUrlAmigavel;

if($idListaCasamento){
	$idListaCasamento = sqlvalue($_SESSION['sessionIdListaCasamento'], false);
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$listaCasamento = $listaListaCasamento[0];

	$smarty->assign('idListaCasamento', $listaCasamento['ID_LISTA_CASAMENTO']);
	$smarty->assign('url', $listaCasamento['URL']);
	$smarty->assign('fotoCapa', $listaCasamento['FOTO_CAPA']);
	$smarty->assign('nomeConjuge1',  ucwords(strtolower($listaCasamento['CONJUGE1'])));
	$smarty->assign('nomeConjuge2',  ucwords(strtolower($listaCasamento['CONJUGE2'])));
}

function nl2br2($string) { 
//$string = nl2br($string);
$string = str_replace('&lt;br&gt;', "<br>", $string);
return $string; 
} 

$smarty->assign('minhaIdListaCasamento', $_SESSION['sessionMinhaIdListaCasamento']);

$produto = $Produto->fnProdutoSite($urlAmigavel);

if(count($produto) == 0){
	//header('Location:/');
}
/*$idProduto = $row["PROD_ID_PRODUTO"];*/
$valorProduto = $produto[0];
$idProduto 						= $valorProduto["PROD_ID_PRODUTO"];
$idProdutoCombinacao 			= $valorProduto["PRCO_ID_PRODUTO_COMBINACAO"];
$descricaoVenda 				= $valorProduto["DESCRICAO_VENDA"];
$referencia 					= $valorProduto["REFERENCIA"];
$descricaoLonga					= nl2br2($valorProduto["DESCRICAO_LONGA"]);
$descricaoCurta 				= nl2br2($valorProduto["DESCRICAO_CURTA"]);
$precoVenda 					= $valorProduto["PRECO_VENDA"];
$precoPromocional 				= $valorProduto["PRECO_PROMOCIONAL"];
$tipoPromocao 					= $valorProduto["TIPO_PROMOCAO"];
$valorPromocao 					= $valorProduto["VALOR_PROMOCAO"];
$dataInicialPromo 				= $valorProduto["DATA_INICIAL_VALIDADE_PROMO"];
$dataFinalPromo 				= $valorProduto["DATA_FINAL_VALIDADE_PROMO"];
$freteGratis 					= $valorProduto["FRETE_GRATIS"];
$dataInicialLancamento 			= $valorProduto["DATA_INICIAL_LANCAMENTO"];
$dataFinalLancamento 			= $valorProduto["DATA_FINAL_LANCAMENTO"];
$idProdutoNivelAuxiliar 		= $valorProduto["PNAU_ID_PRODUTO_NIVEL_AUXILIAR"];
$descricaoProdutoNivelAuxiliar 	= $valorProduto["DESCRICAO_PRODUTO_NIVEL_AUXILI"];
$urlAmigavelPnaux 				= $valorProduto["URL_AMIGAVEL_PNAUX"];
$tags 							= $valorProduto["TAGS"];
$urlAmigavel 					= $valorProduto["URL_AMIGAVEL"];
$metaTitle 						= $valorProduto["DESCRICAO_VENDA"].' '.trim($valorProduto['REFERENCIA']);
$metaDescription 				= trim($valorProduto['REFERENCIA']).' '.substr(str_replace('"', '', strip_tags($valorProduto["DESCRICAO_CURTA"], '<(.*?)>')), 0, 150);
$metaKeywords 					= strip_tags(trim($tags), '<(.*?)>');//$valorProduto["META_DESCRIPTION"];
$video 							= $valorProduto["VIDEO"];
$imagemPrincipal 				= $valorProduto["IMAGEM_PRINCIPAL"];
$lancamento 					= $valorProduto["LANCAMENTO"];
$saldo 							= $valorProduto["SALDO"];
$idCor 							= $valorProduto["ID_COR"];

$mysqli->ExecutarSQL("UPDATE e_PRODUTO SET VISUALIZACOES = IFNULL(VISUALIZACOES, 0)+1 WHERE ID_PRODUTO = ".$idProduto."");

if($valorProduto["QTD_SOLICITADA"] <= 0){
	$qtdSolicitadaListaCasamento = 1;
} else {
	$qtdSolicitadaListaCasamento	= $valorProduto["QTD_SOLICITADA"];
}

if($precoPromocional > 0){
	$precoFinalVenda = $precoPromocional;
} else {
	$precoFinalVenda = $precoVenda;
}

$valorEconomize = $precoVenda-$precoPromocional;

#parcelamento
$parcelamento = fnNroParcelas($precoFinalVenda);
if($parcelamento == 2){
	$colunasParcelamento = 2;	
} else {
	$colunasParcelamento = ceil($parcelamento/2);
}
$smarty->assign('imagemPrincipal', $imagemPrincipal);
$smarty->assign('parcelamento', $parcelamento);
$smarty->assign('colunasParcelamento', $colunasParcelamento);
$smarty->assign('precoFinalVenda', $precoFinalVenda);
/**/

$idPessoa = $_SESSION['sessionIdPessoa'];

$smarty->assign('idPessoa', $idPessoa);
$smarty->assign('idProduto', $idProduto);
$smarty->assign('idProdutoCombinacao', $idProdutoCombinacao);
$smarty->assign('descricaoVenda', $descricaoVenda);
$smarty->assign('referencia', $referencia);
$smarty->assign('descricaoLonga', $descricaoLonga);
$smarty->assign('descricaoCurta', $descricaoCurta);
$smarty->assign('precoVenda', $precoVenda);
$smarty->assign('precoPromocional', $precoPromocional);
$smarty->assign('tipoPromocao', $tipoPromocao);
$smarty->assign('valorPromocao', $valorPromocao);
$smarty->assign('dataInicialPromo', $dataInicialPromo);
$smarty->assign('dataFinalPromo', $dataFinalPromo);
$smarty->assign('freteGratis', $freteGratis);
$smarty->assign('dataInicialLancamento', $dataInicialLancamento);
$smarty->assign('dataFinalLancamento', $dataFinalLancamento);
$smarty->assign('idProdutoNivelAuxiliar', $idProdutoNivelAuxiliar);
$smarty->assign('descricaoProdutoNivelAuxiliar', $descricaoProdutoNivelAuxiliar);
$smarty->assign('urlAmigavelPnaux', $urlAmigavelPnaux);
$smarty->assign('tags', $tags);
$smarty->assign('urlAmigavel', $urlAmigavel);
$smarty->assign('metaTitle', $metaTitle);
$smarty->assign('metaDescription', $metaDescription);
$smarty->assign('metaKeywords', $metaKeywords);
$smarty->assign('video', $video);
$smarty->assign('imagemPrincipal', $imagemPrincipal);
$smarty->assign('lancamento', $lancamento);
$smarty->assign('valorEconomize', $valorEconomize);
$smarty->assign('saldo', $saldo);
$smarty->assign('idCor', $idCor);

$smarty->assign('qtdSolicitadaListaCasamento', $qtdSolicitadaListaCasamento);

/**/

/**/
$queryCategoriaProduto = "SELECT
								CATE.DESCRICAO_CATEGORIA,
								CATE.URL_AMIGAVEL,
								IFNULL(CATE.CATE_ID_CATEGORIA, 0) ORDEM
							FROM
								e_CATEGORIA CATE,
								e_PRODUTO_CATEGORIA PRCA
							WHERE
								CATE.ID_CATEGORIA = PRCA.CATE_ID_CATEGORIA
							AND PRCA.PROD_ID_PRODUTO = ".$idProduto."
							ORDER BY ORDEM ASC";

$listaCategoriaProduto = $mysqli->ConsultarSQL($queryCategoriaProduto);
$countCategorias = count($listaCategoriaProduto);
$smarty->assign('countCategorias',$countCategorias);

$navegacaoCategoria = array();
$urlAmigavel = '';
foreach ($listaCategoriaProduto as $value) {
	$urlAmigavel .= '/'.$value['URL_AMIGAVEL'];
	$descricaoCategoria = $value['DESCRICAO_CATEGORIA']; 
	$navegacaoCategoria[] = array('DESCRICAO_CATEGORIA'=>$descricaoCategoria, 'URL_AMIGAVEL'=>$urlAmigavel);
	$categoriaCoifaDescBoleto[] = $value['URL_AMIGAVEL'];
}

$smarty->assign('navegacaoCategoria',$navegacaoCategoria);

$smarty->assign('tituloCategoria',$listaCategoriaProduto[$countCategorias-1]["DESCRICAO_CATEGORIA"]);
/**/

/*DESCONTO BOLETO*/
$descontoBoleto = DESCONTO_FORMA_PAGAMENTO_BOLETO;
$precoNoBoleto = $precoFinalVenda-(($precoFinalVenda*$descontoBoleto)/100);
$smarty->assign('descontoBoleto', $descontoBoleto);
$smarty->assign('precoNoBoleto', $precoNoBoleto);
/**/

/**/
$idProdutoCombinacao = sqlvalue($idProdutoCombinacao, false);
$queryImagensProduto = "SELECT MAX(ID_PRODUTO_COMBINACAO_IMAGEM), IMAGEM 
						FROM e_PRODUTO_COMBINACAO_IMAGEM 
						WHERE PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao."
						GROUP BY IMAGEM, ORDEM
						ORDER BY ORDEM";

$listaImagensProduto = $mysqli->ConsultarSQL($queryImagensProduto);
$countImagensProduto = count($listaImagensProduto);
$smarty->assign('listaImagensProduto', $listaImagensProduto);
$smarty->assign('countImagensProduto', $countImagensProduto);
if(file_exists('midia/produtos/original/'.$imagemPrincipal)){
	$zoomImagem = 'jqzoom';
} else {
	$zoomImagem = '';
}
$smarty->assign('zoomImagem', $zoomImagem);
/**/

$paginaTit = $metaTitle;
$navegacao = 'Produto Detalhe';
$menu = 'produto_detalhe';

$smarty->assign('description',strip_tags($metaDescription));
$smarty->assign('keywords',strip_tags($metaKeywords));

/*compre junto*/
$getLinhas = array(array('ID_LINHA' => $idProdutoNivelAuxiliar,
            	   'DESCRICAO_LINHA' => $descricaoProdutoNivelAuxiliar,
            	   'URL_AMIGAVEL' => $urlAmigavelPnaux));
$listaProdutoSite = $Produto->fnProdutoSite(null,50,'visualizacao',null,null,false,50,$getLinhas);
$smarty->assign('listaProdutoSite', $listaProdutoSite);
$smarty->assign('listaCompreJunto', 'S');
/**/

/*facebook*/
$smarty->assign('ogImage', MIDIA_DIR.'produtos/detalhe/'.$imagemPrincipal);
/**/

/*desc boleto*/
$smarty->assign('descontoAVista', DESCONTO_FORMA_PAGAMENTO_BOLETO);
/**/

/*Atributo Produto*/
$queryAtributos = "SELECT
						ATRI.DESCRICAO_ATRIBUTO ATRIBUTO_COR,
						ATVA.ID_ATRIBUTO_VALOR ID_COR,
						ATVA.VALOR VALOR_COR,
						ATVA.HEXADECIMAL,
						PCAV.PRCO_ID_PRODUTO_COMBINACAO,
						ATRI2.DESCRICAO_ATRIBUTO,
						ATVA2.ID_ATRIBUTO_VALOR,
						ATVA2.VALOR VALOR_ATRIBUTO,
						fn_saldo_disponivel_produto(PRCO.ID_PRODUTO_COMBINACAO, NOW()) SALDO,
						PROD.URL_AMIGAVEL,
						ATVA.URL_AMIGAVEL URL_ATRIBUTO
					FROM
						e_ATRIBUTO ATRI,
						e_ATRIBUTO_VALOR ATVA,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
						e_PRODUTO_COMBINACAO PRCO,
						e_ATRIBUTO ATRI2,
						e_ATRIBUTO_VALOR ATVA2,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV2,
						e_PRODUTO_COMBINACAO PRCO2,
						e_PRODUTO PROD
					WHERE
						ATRI.ID_ATRIBUTO = ATVA.ATRI_ID_ATRIBUTO
					AND ATVA.ID_ATRIBUTO_VALOR = PCAV.ATVA_ID_ATRIBUTO_VALOR
					AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND ATRI.ID_ATRIBUTO = 1
					AND ATRI2.ID_ATRIBUTO = ATVA2.ATRI_ID_ATRIBUTO
					AND ATVA2.ID_ATRIBUTO_VALOR = PCAV2.ATVA_ID_ATRIBUTO_VALOR
					AND PCAV2.PRCO_ID_PRODUTO_COMBINACAO = PRCO2.ID_PRODUTO_COMBINACAO
					AND ATRI2.ID_ATRIBUTO <> 1
					AND PRCO.ID_PRODUTO_COMBINACAO = PRCO2.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
					AND PROD.ID_PRODUTO = ".$idProduto."
					";

$resultAtributos = $mysqli->ConsultarSQL($queryAtributos);
$arrayAtributos = array();
foreach ($resultAtributos as $valueAtributos) {
	$arrayAtributos[$valueAtributos['ID_COR']][] = $valueAtributos; 
}
$smarty->assign('arrayAtributos', $arrayAtributos);
/**/

/*BTG*/
$smarty->assign('nome', $descricaoVenda);
$smarty->assign('categoria', $listaCategoriaProduto[0]['DESCRICAO_CATEGORIA']);
$smarty->assign('categoria_sub', $listaCategoriaProduto[1]['DESCRICAO_CATEGORIA']);
$smarty->assign('categoria_sub_sub', $listaCategoriaProduto[2]['DESCRICAO_CATEGORIA']);
$smarty->assign('desc_oferta', DESCONTO_FORMA_PAGAMENTO_BOLETO);
$smarty->assign('marca', 'Tramontina');
$smarty->assign('id_produto', $idProduto);
$smarty->assign('valor', number_format($precoVenda,2));
$smarty->assign('oferta', number_format($precoFinalVenda,2));
$smarty->assign('disponibilidade', 1);
$smarty->assign('outra_oferta', $parcelamento.'x'.number_format($precoFinalVenda/$parcelamento,2));
$smarty->assign('ean13', rtrim(ltrim($referencia)));
/**/


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js?v=1');
?>
