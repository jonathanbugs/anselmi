<?php

$smarty->assign('titulo_pagina','Produto do Dia');

require_once(PHP_ROOT.'/'.CLASS_DIR.'/produto.class.php');
$Produto = new Produto($mysqli);

if(ID_LOJA <> 1){
	$whereIdLoja = "AND LOJA_ID_LOJA = ".ID_LOJA."";
} else {
	$whereIdLoja = "";
}

$query = "SELECT VALOR_PARAMETRO FROM e_PARAMETRO_LOJA 
WHERE NOME_PARAMETRO = 'URL_AMIGAVEL_PROMO_DIA' 
".$whereIdLoja."";
$resultQuery = $mysqli->ConsultarSQL($query);

$urlAmigavelPromoDia = $resultQuery[0]['VALOR_PARAMETRO'];

$produtoPromoDia = $Produto->fnProdutoSite($urlAmigavelPromoDia);
$smarty->assign('produtoPromoDia', $produtoPromoDia);

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'produto_do_dia.js');

#CSS
//$smarty->append('css_files', '');
?>