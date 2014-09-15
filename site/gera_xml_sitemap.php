<?php
require_once '../configs/config.php';

header('Content-Type: text/html; charset=UTF-8');

$query = "SELECT
				URL_AMIGAVEL+'.html' URL_AMIGAVEL
			FROM
				e_TABELA_PRODUTO_SITE_1
			UNION
			SELECT
				CATE1.URL_AMIGAVEL
			FROM
				e_CATEGORIA CATE1
			WHERE
				CATE1.ATIVO = 'S'
			AND CATE1.CATE_ID_CATEGORIA IS NULL
			UNION
			SELECT
				CATE1.URL_AMIGAVEL+'/'+CATE2.URL_AMIGAVEL URL_AMIGAVEL
			FROM
				e_CATEGORIA CATE1,
				e_CATEGORIA CATE2
			WHERE
				CATE1.ATIVO = 'S'
			AND CATE1.CATE_ID_CATEGORIA IS NULL
			AND CATE2.ATIVO = 'S'
			AND CATE1.ID_CATEGORIA = CATE2.CATE_ID_CATEGORIA
			UNION
			SELECT
				CATE1.URL_AMIGAVEL+'/'+CATE2.URL_AMIGAVEL+'/'+CATE3.URL_AMIGAVEL URL_AMIGAVEL
			FROM
				e_CATEGORIA CATE1,
				e_CATEGORIA CATE2,
				e_CATEGORIA CATE3
			WHERE
				CATE1.ATIVO = 'S'
			AND CATE1.CATE_ID_CATEGORIA IS NULL
			AND CATE2.ATIVO = 'S'
			AND CATE1.ID_CATEGORIA = CATE2.CATE_ID_CATEGORIA
			AND CATE3.ATIVO = 'S'
			AND CATE2.ID_CATEGORIA = CATE3.CATE_ID_CATEGORIA";
 
$result = $mysqli->ConsultarSQL($query);

$dom = new DOMDocument("1.0", "UTF-8");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
 
$root = $dom->createElement("urlset");
$root->setAttribute( "xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9" );


foreach ($result as $value) {

	$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.utf8_encode($value['URL_AMIGAVEL']);
	
 	$node = addProduto($dom, $url);
 	$root->appendChild($node);
} 


$dom->appendChild($root);

$dom->save("sitemap.xml");
 
//header("Content-Type: text/xml");
print $dom->saveXML();


function addProduto($document, $url)
{
 	$produto = $document->createElement("url");

	$url = $document->createElement("loc", $url);
	$produto->appendChild($url);

	$priority = $document->createElement("priority", "0.8");
	$produto->appendChild($priority);

	return $produto;
}
?>