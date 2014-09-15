<?php
$smarty->assign('titulo_pagina','Cadastra Promo&ccedil;&atilde;o');


// $queryPromocaoCarrinho = "SELECT 
// 								ID_PROMOCAO_CARRINHO
// 							    ,DESCRICAO_PROMOCAO
// 							    ,CUPOM_PROMOCIONAL
// 							    ,PROMOCAO_ATIVA
// 							    ,EMAIL_CLIENTE_CONTEMPLADO
// 							    ,CONVERT(CHAR,DATA_INICIAL_VALIDADE,103) DATA_INICIAL_VALIDADE
// 							    ,CONVERT(CHAR,DATA_FINAL_VALIDADE,103) DATA_FINAL_VALIDADE
// 							    ,VALOR_MINIMO_COMPRA
// 							    ,UTILIZACAO_UNICA
// 							    ,QUANTIDADE_PRODUTO_CARRINHO
// 							    ,FRETE_GRATIS
// 							    ,VALOR_DESCONTO
// 							    ,TIPO_DESCONTO
// 							    ,PACOTE_PRESENTE_GRATIS
// 							FROM 
// 								e_PROMOCAO_CARRINHO";

// $promocaoCarrinho = $mysqli->ConsultarSQL($queryPromocaoCarrinho);

// $smarty->assign('promocaoCarrinho', $promocaoCarrinho);

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'promocao.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'promocao.css');
?>