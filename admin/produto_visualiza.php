<?php
$smarty->assign('titulo_pagina','Visualiza Produto');

if(isset($_REQUEST["idProduto"])) $idProduto = $_REQUEST["idProduto"]; 

/**/
$query = "SELECT ID_PRODUTO
		      ,PRSI_ID_PRODUTO_SITUACAO
		      ,DESCRICAO_VENDA
		      ,COD_EAN
		      ,PESO_KG
		      ,ALTURA_CM
		      ,LARGURA_CM
		      ,PROFUNDIDADE_CM
		      ,PESS_ID_PESSOA_FABRICANTE
		      ,DATA_INICIAL_LANCAMENTO
		      ,DATA_FINAL_LANCAMENTO
		  FROM 
			e_PRODUTO PROD
		 WHERE
		 	PROD.ID_PRODUTO = ".$idProduto."";

$visualizaDadosProduto = $mysqli->ConsultarSQL($query);
$smarty->assign('idProduto', $visualizaDadosProduto[0]["ID_PRODUTO"]);
$smarty->assign('visualizaDadosProduto',$visualizaDadosProduto);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'produto.js');

#CSS
$smarty->append('css_files', CSS_DIR.'produto.css');

?>