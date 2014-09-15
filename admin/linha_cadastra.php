<?php
$smarty->assign('titulo_pagina','N&iacute;vel Auxiliar');

/**/

$query = "SELECT
				NIAU.ID_NIVEL_AUXILIAR,
				NIAU.DESCRICAO_NIVEL_AUXILIAR,
				NAVA.ID_NIVEL_AUX_VALOR
			   ,NAVA.VALOR DESC_PRODUTO_NIVEL_AUXILIAR
			   ,NAVA.ORDEM
			   ,NAVA.ATIVO EXIBE_MENU
			FROM
				e_NIVEL_AUXILIAR NIAU,
				e_NIVEL_AUXILIAR_VALOR NAVA
			WHERE
				NIAU.ID_NIVEL_AUXILIAR = NAVA.NIAU_ID_NIVEL_AUX
			ORDER BY NAVA.ID_NIVEL_AUX_VALOR desc";

$visualizaLinhaProduto = $mysqli->ConsultarSQL($query);
$smarty->assign('visualizaLinhaProduto',$visualizaLinhaProduto);


$queryNivelAux = "SELECT
						NIAU.ID_NIVEL_AUXILIAR,
						NIAU.DESCRICAO_NIVEL_AUXILIAR
					FROM
						e_NIVEL_AUXILIAR NIAU";
$listaNivelAux = $mysqli->ConsultarSQL($queryNivelAux);
$smarty->assign('listaNivelAux', $listaNivelAux);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'linha.js');

#CSS
#$smarty->append('css_files', CSS_DIR.'Linha.css');

?>