<?php
$smarty->assign('titulo_pagina','Cadastra Promo&ccedil;&atilde;o');


$queryPromocao = "SELECT
						PROM.ID_PROMOCAO,
						PROM.NOME_PROMOCAO,
						date_format(PROM.DATA_INICIAL,'%d/%m/%Y') AS DATA_INICIAL,
						date_format(PROM.DATA_FINAL,'%d/%m/%Y') AS DATA_FINAL,
						PROM.OBS,
						PROM.TIPO_PROMOCAO,
						PROM.VALOR,
						PROM.PROMOCAO_ATIVA,
						PROM.FRETE_GRATIS
					FROM
						e_PROMOCAO PROM
					ORDER BY
						PROM.ID_PROMOCAO DESC";

$promocao = $mysqli->ConsultarSQL($queryPromocao);

$smarty->assign('promocao', $promocao);

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'promocao.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'promocao.css');
?>