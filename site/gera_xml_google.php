<?php
require_once '../configs/config.php';

header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT 
			  -- top 30
			    TPSI.PROD_ID_PRODUTO,
				TPSI.DESCRICAO_VENDA+' '+rtrim(TPSI.REFERENCIA) DESCRICAO_VENDA,
				TPSI.URL_AMIGAVEL,
				TPSI.DESCRICAO_CURTA,
				TPSI.IMAGEM_PRINCIPAL,
				TPSI.PRECO_VENDA,
				CASE TPSI.PRECO_PROMOCIONAL WHEN 0 THEN NULL ELSE TPSI.PRECO_PROMOCIONAL END PRECO_PROMOCIONAL,
				CONVERT(CHAR, TPSI.DATA_INICIAL_VALIDADE_PROMO, 126) DATA_INICIAL_PROMO,
				CONVERT(CHAR, TPSI.DATA_FINAL_VALIDADE_PROMO, 126) DATA_FINAL_PROMO,
				CATE.DESCRICAO_CATEGORIA,
				fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) QUANTIDADE	
			FROM
				".TABELA_PRODUTO_SITE." TPSI,
				e_PRODUTO_CATEGORIA PRCA,
				e_CATEGORIA CATE
			WHERE 
				fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0
			AND TPSI.PROD_ID_PRODUTO = PRCA.PROD_ID_PRODUTO
			AND PRCA.CATE_ID_CATEGORIA = CATE.ID_CATEGORIA";
 
$result = $mysqli->ConsultarSQL($query);

$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;



$root = $dom->createElement("rss");
$root->setAttribute( "version", "2.0" );
$root->setAttribute( "xmlns:g", "http://base.google.com/ns/1.0" );

$channel = $dom->createElement("channel");


foreach ($result as $value) {

	$arrayProduto[$value['PROD_ID_PRODUTO']] = $value;

	$arrayCategoriaProduto[$value['PROD_ID_PRODUTO']][] = $value['DESCRICAO_CATEGORIA'];


	// $id_produto = $value['PROD_ID_PRODUTO'];
	// $nome_produto = utf8_encode($value['DESCRICAO_VENDA']);
	// $url_detalhes = utf8_encode('http://'.$server.'/'.$value['URL_AMIGAVEL'].'.html');
	// $preco = 'R$ '.number_format($value['PRECO_VENDA'],2);

	// $descricao_curta = utf8_encode($value['DESCRICAO_CURTA']);

	// $imagem = utf8_encode('http://'.$server.'/midia/produtos/detalhe/'.trim($value['IMAGEM_PRINCIPAL']));
	
	// if($value['PRECO_PROMOCIONAL']){
	// 	$preco_promocional = 'R$ '.number_format($value['PRECO_PROMOCIONAL'],2);
	// } else {
	// 	$preco_promocional = NULL;
	// }
	
	// if($value['PRECO_PROMOCIONAL'] and $value['PRECO_PROMOCIONAL'] < $value['PRECO_VENDA']){
	// 	$valorFinal = $value['PRECO_PROMOCIONAL'];
	// } else {
	// 	$valorFinal = $value['PRECO_VENDA'];
	// }

	// if($value['PRECO_PROMOCIONAL']){
	// 	$data_preco_promocional = trim($value['DATA_INICIAL_PROMO']).'/'.trim($value['DATA_FINAL_PROMO']);
	// } else {
	// 	$data_preco_promocional = NULL;	
	// }
	
	// $nroParcelas = fnNroParcelas($valorFinal);
	// $nro_parcelas = $nroParcelas;
	// $valor_parcela = 'R$ '.number_format($valorFinal/$nroParcelas, 2);

 // 	$node = addProduto($dom, $id_produto, $imagem, $data_preco_promocional, $descricao_curta, $nome_produto, $url_detalhes, $preco, $preco_promocional, $nro_parcelas, $valor_parcela);
 // 	$channel->appendChild($node);

} 


foreach ($arrayProduto as $value) {
	$id_produto = $value['PROD_ID_PRODUTO'];

	$categoria1 = utf8_encode($arrayCategoriaProduto[$value['PROD_ID_PRODUTO']][0]);
	$categoria2 = utf8_encode($arrayCategoriaProduto[$value['PROD_ID_PRODUTO']][1]);
	$categoria3 = utf8_encode($arrayCategoriaProduto[$value['PROD_ID_PRODUTO']][2]);

	$categoriaProduto = $categoria1.' &gt; '.$categoria2;
	if($categoria3){
		$categoriaProduto .= ' &gt; '.$categoria3;
	}

	$trans = get_html_translation_table(HTML_ENTITIES);

	$nome_produto = strtr($value['DESCRICAO_VENDA'], $trans);
	$nome_produto = utf8_encode($nome_produto);

	$url_detalhes = utf8_encode('http://'.$server.'/'.htmlentities($value['URL_AMIGAVEL'], ENT_QUOTES).'.html');
	$preco = 'R$ '.number_format($value['PRECO_VENDA'],2);

	$descricao_curta = utf8_encode(strip_tags(strtr($value['DESCRICAO_CURTA'], $trans), '<(.*?)>'));

	$imagem = utf8_encode('http://'.$server.'/midia/produtos/detalhe/'.trim($value['IMAGEM_PRINCIPAL']));
	
	if($value['PRECO_PROMOCIONAL']){
		$preco_promocional = 'R$ '.number_format($value['PRECO_PROMOCIONAL'],2);
	} else {
		$preco_promocional = NULL;
	}
	
	if($value['PRECO_PROMOCIONAL'] and $value['PRECO_PROMOCIONAL'] < $value['PRECO_VENDA']){
		$valorFinal = $value['PRECO_PROMOCIONAL'];
	} else {
		$valorFinal = $value['PRECO_VENDA'];
	}

	if($value['PRECO_PROMOCIONAL']){
		$data_preco_promocional = trim($value['DATA_INICIAL_PROMO']).'/'.trim($value['DATA_FINAL_PROMO']);
	} else {
		$data_preco_promocional = NULL;	
	}
	
	$nroParcelas = fnNroParcelas($valorFinal);
	$nro_parcelas = $nroParcelas;
	$valor_parcela = 'R$ '.number_format($valorFinal/$nroParcelas, 2);

	$quantidade = $value['QUANTIDADE'];

 	$node = addProduto($dom, $id_produto, $quantidade, $imagem, $data_preco_promocional, $descricao_curta, $nome_produto, $url_detalhes, $preco, $preco_promocional, $nro_parcelas, $valor_parcela, $categoriaProduto);
 	$channel->appendChild($node);	
}

$root->appendChild($channel);

$dom->appendChild($root);


$dom->save("comlines_google.xml");
 
//header("Content-Type: text/xml");
print $dom->saveXML();


function addProduto($document, $id_produto, $quantidade, $imagem, $data_preco_promocional, $descricao_curta, $nome_produto, $url_detalhes, $preco, $preco_promocional, $nro_parcelas, $valor_parcela, $categoria_produto)
{
 	$produto = $document->createElement("item");

	$id_produto = $document->createElement("g:id", $id_produto);
	$produto->appendChild($id_produto);

	$chave_nome_produto = $document->appendChild($document->createElement('title'));
	$nome_produto = $document->appendChild($document->createCDataSection($nome_produto));
	$produto->appendChild($chave_nome_produto);
	$chave_nome_produto->appendChild($nome_produto);

	$chave_url_detalhes = $document->appendChild($document->createElement('link'));
	$url_detalhes = $document->appendChild($document->createCDataSection($url_detalhes));
	$produto->appendChild($chave_url_detalhes);
	$chave_url_detalhes->appendChild($url_detalhes);

	$chave_descricao_curta = $document->appendChild($document->createElement('description'));
	$descricao_curta = $document->appendChild($document->createCDataSection($descricao_curta));
	$produto->appendChild($chave_descricao_curta);
	$chave_descricao_curta->appendChild($descricao_curta);

	//product_type
	$chave_categoria_produto = $document->appendChild($document->createElement('g:product_type'));
	$categoria_produto = $document->appendChild($document->createCDataSection($categoria_produto));
	$produto->appendChild($chave_categoria_produto);
	$chave_categoria_produto->appendChild($categoria_produto);

	$chave_imagem = $document->appendChild($document->createElement('image_link'));
	$imagem = $document->appendChild($document->createCDataSection($imagem));
	$produto->appendChild($chave_imagem);
	$chave_imagem->appendChild($imagem);

	$disponibilidade = $document->createElement("g:availability", 'in stock');
	$produto->appendChild($disponibilidade);

	$preco = $document->createElement("g:price", $preco);
	$produto->appendChild($preco);

	$quantidade = $document->createElement("g:quantity", $quantidade);
	$produto->appendChild($quantidade);

	$condicao = $document->createElement("g:condition", 'new');
	$produto->appendChild($condicao);

	$preco_promocional = $document->createElement("g:sale_price", $preco_promocional);
	$produto->appendChild($preco_promocional);

	$data_preco_promocional = $document->createElement("g:sale_price_effective_date", $data_preco_promocional);
	$produto->appendChild($data_preco_promocional);

	$marca = $document->createElement("g:brand", 'Tramontina');
	$produto->appendChild($marca);

	$gtin = $document->createElement("g:gtin", '');
	$produto->appendChild($gtin);

	$mpn = $document->createElement("g:mpn", '');
	$produto->appendChild($mpn);

	$parcelamento = $document->createElement("g:installment");
	$nro_parcelas = $document->createElement("g:months", $nro_parcelas);
	$parcelamento->appendChild($nro_parcelas);
	$valor_parcela = $document->createElement("g:amount", $valor_parcela);
	$produto->appendChild($parcelamento);
	$parcelamento->appendChild($valor_parcela);
		
	return $produto;
}
?>