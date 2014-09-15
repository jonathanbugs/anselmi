<?php
require_once '../configs/config.php';

header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT 
               --top 1000
				TPSI.DESCRICAO_VENDA,
				CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) = 0
						THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END PRECO,
				TPSI.REFERENCIA,
				TPSI.URL_AMIGAVEL,
				TPSI.IMAGEM_PRINCIPAL,
				CATE.DESCRICAO_CATEGORIA,
				IFNULL(TPSI.FRETE_GRATIS, 'N') FRETE_GRATIS
	       FROM
	       		".TABELA_PRODUTO_SITE." TPSI,
	       		e_PRODUTO_CATEGORIA PRCA,
	       		e_CATEGORIA CATE
	      WHERE 
				fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0
			AND PRCA.PROD_ID_PRODUTO = TPSI.PROD_ID_PRODUTO
			AND PRCA.CATE_ID_CATEGORIA = CATE.ID_CATEGORIA
			AND CATE.ID_CATEGORIA = (SELECT MAX(PRCA2.CATE_ID_CATEGORIA) FROM e_PRODUTO_CATEGORIA PRCA2
										WHERE PRCA2.PROD_ID_PRODUTO = PRCA.PROD_ID_PRODUTO)
			--AND CATE.ID_CATEGORIA = '8943'";
 
$result = $mysqli->ConsultarSQL($query);

//printr($result);

$dom = new DOMDocument("1.0", "iso-8859-1");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
 
$root = $dom->createElement("PRODUTOS");


foreach ($result as $value) {

	$nroParcelas = fnNroParcelas($value['PRECO']);
	
	$nome_produto = utf8_encode($value['DESCRICAO_VENDA']);
	$url_detalhes = utf8_encode('http://'.$server.'/'.$value['URL_AMIGAVEL'].'.html?utm_source=ShoppingUol_cpc&utm_medium=ShoppingUol_cpc&utm_term=ShoppingUol_cpc&utm_content='.$value['URL_AMIGAVEL'].'&utm_campaign=ShoppingUol_cpc');
	$preco = number_format($value['PRECO'],2, '.', '');
	$forma_pagamento = $nroParcelas.'x sem juros';
	$valor_parcela = number_format($value['PRECO']/$nroParcelas, 2, '.', '');
	$codigo = trim($value['REFERENCIA']);
	$imagem = MIDIA_ROOT.'produtos/detalhe/'.trim(utf8_encode($value['IMAGEM_PRINCIPAL']));
	$categoria = utf8_encode($value['DESCRICAO_CATEGORIA']);
	if($value['FRETE_GRATIS'] == 'N'){
		$freteGratis = 'Não';
	} else {
		$freteGratis = 'Sim';
	}

 	$node = addProduto($dom, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo, $imagem, $categoria, $nroParcelas, $freteGratis);
 	$root->appendChild($node);
} 


$dom->appendChild($root);

$dom->save("comlines_uol.xml");
 
//header("Content-Type: text/xml");
print $dom->saveXML();


function addProduto($document, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo, $imagem, $categoria, $nroParcelas, $freteGratis)
{
 	$produto = $document->createElement("PRODUTO");

	$chave_codigo = $document->appendChild($document->createElement('CODIGO'));
	$codigo = $document->appendChild($document->createCDataSection($codigo));
	$produto->appendChild($chave_codigo);
	$chave_codigo->appendChild($codigo);

	$chave_nome_produto = $document->appendChild($document->createElement('DESCRICAO'));
	$nome_produto = $document->appendChild($document->createCDataSection($nome_produto));
	$produto->appendChild($chave_nome_produto);
	$chave_nome_produto->appendChild($nome_produto);

	$preco = $document->createElement("PRECO", $preco);
	$produto->appendChild($preco);

	$nroParcelas = $document->createElement("NParcela", $nroParcelas);
	$produto->appendChild($nroParcelas);

	$valor_parcela = $document->createElement("Vparcela", $valor_parcela);
	$produto->appendChild($valor_parcela);

	$chave_url_detalhes = $document->appendChild($document->createElement('URL'));
	$url_detalhes = $document->appendChild($document->createCDataSection($url_detalhes));
	$produto->appendChild($chave_url_detalhes);
	$chave_url_detalhes->appendChild($url_detalhes);

	$chave_imagem = $document->appendChild($document->createElement('URL_IMAGEM'));
	$imagem = $document->appendChild($document->createCDataSection($imagem));
	$produto->appendChild($chave_imagem);
	$chave_imagem->appendChild($imagem);

	$chave_freteGratis = $document->appendChild($document->createElement('Frete'));
	$freteGratis = $document->appendChild($document->createCDataSection($freteGratis));
	$produto->appendChild($chave_freteGratis);
	$chave_freteGratis->appendChild($freteGratis);

	$chave_categoria = $document->appendChild($document->createElement('DEPARTAMENTO'));
	$categoria = $document->appendChild($document->createCDataSection($categoria));
	$produto->appendChild($chave_categoria);
	$chave_categoria->appendChild($categoria);

	//$referencia_tramontina = $document->createElement("referencia_tramontina");
	//$produto->appendChild($referencia_tramontina);
	//$referencia_tramontina->appendChild($codigo);
	
	
	return $produto;
}
?>