<?php
$smarty->assign('titulo_pagina','Relat&oacute;rio de Estoque Produto');

$qtd = 0;
if($_GET['qtd']){
	$qtd = sqlvalue($_GET['qtd'], false);
} 

$query = "SELECT
				PROD.ID_PRODUTO,
				PROD.DESCRICAO_VENDA,
				IFNULL(PRCO.REFERENCIA, PROD.REFERENCIA) REFERENCIA,
				fn_atributo_produto_combinacao(PRCO.ID_PRODUTO_COMBINACAO) ATRIBUTO,
				fn_saldo_disponivel_produto(PRCO.ID_PRODUTO_COMBINACAO, NOW()) SALDO
			FROM
				e_PRODUTO PROD,
				e_PRODUTO_COMBINACAO PRCO
			WHERE
				PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
			AND fn_saldo_disponivel_produto(PRCO.ID_PRODUTO_COMBINACAO, NOW()) <= ".$qtd."";

$listaProdutoEstoque = $mysqli->ConsultarSQL($query);
//printr($listaProdutoEstoque);
$smarty->assign('listaProdutoEstoque', $listaProdutoEstoque);
$smarty->assign('qtdFiltro', $qtd);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'printElement/jquery.printElement.min.js');

#JS
$smarty->append('js_files', JS_DIR.'produto_estoque.js');

#CSS
$smarty->append('css_files', CSS_DIR.'produto_estoque.css');

?>