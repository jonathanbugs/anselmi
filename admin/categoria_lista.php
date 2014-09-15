<?php
$smarty->assign('titulo_pagina','Categoria Produto');

/**/
if($_REQUEST['idCategoria']){
	$idCategoria = sqlvalue($_REQUEST['idCategoria'], false);
	$where = "AND CATE.CATE_ID_CATEGORIA = ".$idCategoria."";
} else {
	$where = "AND CATE.CATEGORIA_INICIAL = 'S'";
}
$query = "SELECT CATE.ID_CATEGORIA
			      ,CATE.ID_CATEGORIA_INTEGRACAO
			      ,CATE.DESCRICAO_CATEGORIA
			      ,CATE.CATE_ID_CATEGORIA
			      ,CATE.ATIVO
			      ,CATE.ORDEM
			      ,CATE.CATEGORIA_INICIAL
			      ,CATE.URL_AMIGAVEL
			      ,CATE.META_TITLE
			      ,CATE.META_DESCRIPTION
			      ,CATE.META_KEYWORDS
			      ,CATE2.DESCRICAO_CATEGORIA CATEGORIA_MAE
  			FROM e_CATEGORIA CATE LEFT JOIN e_CATEGORIA CATE2 ON CATE.CATE_ID_CATEGORIA = CATE2.ID_CATEGORIA
  			WHERE 1=1
  			".$where."
";

$visualizaCategoriaProduto = $mysqli->ConsultarSQL($query);
$smarty->assign('visualizaCategoriaProduto',$visualizaCategoriaProduto);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'categoria.js');

#CSS
#$smarty->append('css_files', CSS_DIR.'categoria.css');

?>