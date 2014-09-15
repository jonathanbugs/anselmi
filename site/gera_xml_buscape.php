<?php
require_once '../configs/config.php';

header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT 
               --top 30
				TPSI.DESCRICAO_VENDA,
				CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) = 0
						THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END PRECO,
				TPSI.REFERENCIA,
				TPSI.URL_AMIGAVEL,
				TPSI.IMAGEM_PRINCIPAL,
				CATE.DESCRICAO_CATEGORIA
	       FROM
	       		e_TABELA_PRODUTO_SITE_2 TPSI,
	       		e_PRODUTO_CATEGORIA PRCA,
	       		e_CATEGORIA CATE
	      WHERE 
				fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0
			AND PRCA.PROD_ID_PRODUTO = TPSI.PROD_ID_PRODUTO
			AND PRCA.CATE_ID_CATEGORIA = CATE.ID_CATEGORIA
			AND CATE.ID_CATEGORIA = (SELECT MAX(PRCA2.CATE_ID_CATEGORIA) FROM e_PRODUTO_CATEGORIA PRCA2
										WHERE PRCA2.PROD_ID_PRODUTO = PRCA.PROD_ID_PRODUTO)
			AND CATE.ID_CATEGORIA = '8943'";
 
$result = $mysqli->ConsultarSQL($query);

//printr($result);

$dom = new DOMDocument("1.0", "UTF-8");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
 
$root = $dom->createElement("produtos");


foreach ($result as $value) {

	$nroParcelas = fnNroParcelas($value['PRECO']);
	
	$nome_produto = utf8_encode($value['DESCRICAO_VENDA']);
	$url_detalhes = utf8_encode('http://'.$server.'/'.$value['URL_AMIGAVEL'].'.html?utm_source=Buscape&utm_medium=Buscape_cpc&utm_term=Buscape_campanha_outubro&utm_content='.$value['URL_AMIGAVEL'].'&utm_campaign=Buscape_campanha_outubro');
	$preco = number_format($value['PRECO'],2, ',', '.');
	$forma_pagamento = $nroParcelas.'x sem juros';
	$valor_parcela = number_format($value['PRECO']/$nroParcelas, 2, ',', '.');
	$codigo = trim($value['REFERENCIA']);
	$imagem = trim($value['IMAGEM_PRINCIPAL']);
	$categoria = utf8_encode($value['DESCRICAO_CATEGORIA']);

 	$node = addProduto($dom, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo, $imagem, $categoria);
 	$root->appendChild($node);
} 


$dom->appendChild($root);

$dom->save("comlines_buscape.xml");
 
//header("Content-Type: text/xml");
print $dom->saveXML();


function addProduto($document, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo, $imagem, $categoria)
{
 	$produto = $document->createElement("produto");

	$chave_nome_produto = $document->appendChild($document->createElement('descricao'));
	$nome_produto = $document->appendChild($document->createCDataSection($nome_produto));
	$produto->appendChild($chave_nome_produto);
	$chave_nome_produto->appendChild($nome_produto);

	$chave_url_detalhes = $document->appendChild($document->createElement('link_prod'));
	$url_detalhes = $document->appendChild($document->createCDataSection($url_detalhes));
	$produto->appendChild($chave_url_detalhes);
	$chave_url_detalhes->appendChild($url_detalhes);

	$preco = $document->createElement("preco", $preco);
	$produto->appendChild($preco);

	// $chave_forma_pagamento = $document->appendChild($document->createElement('parcel'));
	// $forma_pagamento = $document->appendChild($document->createCDataSection($forma_pagamento));
	// $produto->appendChild($chave_forma_pagamento);
	// $chave_forma_pagamento->appendChild($forma_pagamento);

	$valor_parcela = $document->createElement("parcel", $valor_parcela);
	$produto->appendChild($valor_parcela);

	$imagem = $document->createElement("imagem", $imagem);
	$produto->appendChild($imagem);

	$categoria = $document->createElement("categ", $categoria);
	$produto->appendChild($categoria);

	//$referencia_tramontina = $document->createElement("referencia_tramontina");
	$codigo = $document->createElement("id_produto", $codigo);
	$produto->appendChild($codigo);
	//$produto->appendChild($referencia_tramontina);
	//$referencia_tramontina->appendChild($codigo);
	
	
	return $produto;
}
?>