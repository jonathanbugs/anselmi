<?php
$smarty->assign('titulo_pagina','Cadastra Banner');

$banner = array();
if(isset($_GET['idBanner'])){
	$idBanner = sqlvalue($_GET['idBanner'], false);
	$query = "SELECT ID_BANNER,
				    LEGENDA,
				    LINK,
				    IMAGEM,
				    DATA_INICIAL,
				    DATA_FINAL,
				    ATIVO,
				    CLIQUES
				FROM e_BANNER
				WHERE 
					ID_BANNER = ".$idBanner.";";
	$banner = $mysqli->ConsultarSQL($query);
	$banner = $banner[0];
}

$idBanner = $banner['ID_BANNER'];
$legenda = $banner['LEGENDA'];
$link = $banner['LINK'];
$imagem = $banner['IMAGEM'];
if(isset($banner['DATA_INICIAL'])) {
	$dataInicial = date('d/m/Y', strtotime($banner['DATA_INICIAL']));
} else {
	$dataInicial = null;
}
if(isset($banner['DATA_INICIAL'])) {
	$dataFinal = date('d/m/Y', strtotime($banner['DATA_FINAL']));
} else {
	$dataFinal = null;
}
$ativo = $banner['ATIVO'];
$cliques = $banner['CLIQUES'];

$smarty->assign('idBanner', $idBanner);
$smarty->assign('legenda', $legenda);
$smarty->assign('link', $link);
$smarty->assign('imagem', $imagem);
$smarty->assign('dataInicial', $dataInicial);
$smarty->assign('dataFinal', $dataFinal);
$smarty->assign('ativo', $ativo);
$smarty->assign('cliques', $cliques);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'banner.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'promocao.css');
?>