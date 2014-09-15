<?php
$smarty->assign('titulo_pagina','Listar Banners');

$query = "SELECT ID_BANNER,
			    LEGENDA,
			    LINK,
			    IMAGEM,
			    DATA_INICIAL,
			    DATA_FINAL,
			    ATIVO,
			    CLIQUES
			FROM e_BANNER;";

$result = $mysqli->ConsultarSQL($query);

$listaBanner = array();
foreach ($result as $key => $value) {
	$value['DATA_INICIAL'] = date('d/m/Y', strtotime($value['DATA_INICIAL']));
	$value['DATA_FINAL'] = date('d/m/Y', strtotime($value['DATA_FINAL']));
	$value['IMAGEM'] = '../midia/banners/topo/'.$value['IMAGEM'];
	$listaBanner[] = $value;
}

$smarty->assign('listaBanner', $listaBanner);
	

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'banner.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'promocao.css');
?>