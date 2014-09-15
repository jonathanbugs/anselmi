<?php
$smarty->assign('titulo_pagina','Cadastra Promo&ccedil;&atilde;o');

/**/
if(isset($_REQUEST["idPromocaoCarrinho"])){
	
	$idPromocaoCarrinho = sqlvalue($_REQUEST["idPromocaoCarrinho"], false);
	
	$queryPromocaoCarrinho = "SELECT 
								ID_PROMOCAO_CARRINHO
							    ,DESCRICAO_PROMOCAO
							    ,CUPOM_PROMOCIONAL
							    ,PROMOCAO_ATIVA
							    ,EMAIL_CLIENTE_CONTEMPLADO
							    ,date_format(DATA_INICIAL_VALIDADE,'%d/%m/%Y') DATA_INICIAL_VALIDADE
							    ,date_format(DATA_FINAL_VALIDADE,'%d/%m/%Y') DATA_FINAL_VALIDADE
							    ,VALOR_MINIMO_COMPRA
							    ,UTILIZACAO_UNICA
							    ,QUANTIDADE_PRODUTO_CARRINHO
							    ,FRETE_GRATIS
							    ,VALOR_DESCONTO
							    ,TIPO_DESCONTO
							    ,PACOTE_PRESENTE_GRATIS
							FROM 
								e_PROMOCAO_CARRINHO
							WHERE
								ID_PROMOCAO_CARRINHO = ".$idPromocaoCarrinho."";

	$listaPromocaoCarrinho = $mysqli->ConsultarSQL($queryPromocaoCarrinho);

	$smarty->assign('listaPromocaoCarrinho', $listaPromocaoCarrinho);

} 
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'promocao.js');

#CSS
$smarty->append('css_files', CSS_DIR.'promocao.css');
?>