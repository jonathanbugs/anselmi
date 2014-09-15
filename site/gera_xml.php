<?php
require_once '../configs/config.php';

header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT 
               --top 30
				TPSI.DESCRICAO_VENDA,
				TPSI.URL_AMIGAVEL,
				CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) = 0
						THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END PRECO,
				TPSI.REFERENCIA
	       FROM
	       		".TABELA_PRODUTO_SITE." TPSI
	      WHERE 
				fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0";
 
$result = $mysqli->ConsultarSQL($query);

$dom = new DOMDocument("1.0", "UTF-8");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
 
$root = $dom->createElement("produtos");


foreach ($result as $value) {

	$nroParcelas = fnNroParcelas($value['PRECO']);
	
	$nome_produto = utf8_encode($value['DESCRICAO_VENDA']);
	$url_detalhes = utf8_encode('http://'.$server.'/'.$value['URL_AMIGAVEL'].'.html?utm_source=Site+Tramontina&utm_medium='.$value['URL_AMIGAVEL'].'&utm_term=Tramontina&utm_content=Tramontina&utm_campaign=Site+Tramontina');
	$preco = number_format($value['PRECO'],2);
	$forma_pagamento = $nroParcelas.'x sem juros';
	$valor_parcela = number_format($value['PRECO']/$nroParcelas, 2);
	$codigo = trim($value['REFERENCIA']);

 	$node = addProduto($dom, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo);
 	$root->appendChild($node);
} 


$dom->appendChild($root);

$dom->save("comlines_novositetramontina.xml");
 
//header("Content-Type: text/xml");
print $dom->saveXML();


function addProduto($document, $nome_produto, $url_detalhes, $preco, $forma_pagamento, $valor_parcela, $codigo)
{
 	$produto = $document->createElement("produto");

	$chave_nome_produto = $document->appendChild($document->createElement('nome_produto'));
	$nome_produto = $document->appendChild($document->createCDataSection($nome_produto));
	$produto->appendChild($chave_nome_produto);
	$chave_nome_produto->appendChild($nome_produto);

	$chave_url_detalhes = $document->appendChild($document->createElement('url_detalhes'));
	$url_detalhes = $document->appendChild($document->createCDataSection($url_detalhes));
	$produto->appendChild($chave_url_detalhes);
	$chave_url_detalhes->appendChild($url_detalhes);

	$preco = $document->createElement("preco", $preco);
	$produto->appendChild($preco);

	$chave_forma_pagamento = $document->appendChild($document->createElement('forma_pagamento'));
	$forma_pagamento = $document->appendChild($document->createCDataSection($forma_pagamento));
	$produto->appendChild($chave_forma_pagamento);
	$chave_forma_pagamento->appendChild($forma_pagamento);

	$valor_parcela = $document->createElement("valor_parcela", $valor_parcela);
	$produto->appendChild($valor_parcela);

	$referencia_tramontina = $document->createElement("referencia_tramontina");
	$codigo = $document->createElement("codigo", $codigo);
	$produto->appendChild($referencia_tramontina);
	$referencia_tramontina->appendChild($codigo);
	
	
	return $produto;
}
?>