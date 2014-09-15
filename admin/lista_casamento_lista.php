<?php
$smarty->assign('titulo_pagina','Lista de Casamento');

/**/
$query = "SELECT
				LICA.ID_LISTA_CASAMENTO,
				CONVERT(CHAR, LCEN.DATA_EVENTO, 103) DATA_EVENTO,
				LICA.ATIVO,
				LICA.CONJUGE1,
				LICA.CONJUGE2,
				CASE WHEN DESPACHADO IS NULL THEN 
					CASE WHEN LICA.ATIVO = 'S' THEN 'A' ELSE 'F' END
				ELSE 'D' END SITUACAO
			FROM
				e_LISTA_CASAMENTO LICA,
				e_LISTA_CASAMENTO_ENDERECO LCEN
			WHERE
				LICA.ID_LISTA_CASAMENTO = LCEN.LICA_ID_LISTA_CASAMENTO
			AND LCEN.TIPO_ENDERECO = 'ENTREGA'
			";

$listaCasamento = $mysqli->ConsultarSQL($query);
$smarty->assign('listaCasamento',$listaCasamento);
/**/

/**/
$queryCount = "SELECT 
					SUM(Q1.QTD_VENDIDO) QTD_VENDIDO, 
					SUM(Q1.QTD_PRODUTO) QTD_PRODUTO, 
					Q1.LICA_ID_LISTA_CASAMENTO
				FROM (
					SELECT
						COUNT(LCPR.VENDIDO) QTD_VENDIDO,
						0 QTD_PRODUTO,
						LCPR.LICA_ID_LISTA_CASAMENTO
					FROM
						e_LISTA_CASAMENTO_PRODUTO LCPR
					WHERE
						LCPR.VENDIDO = 'S'
					AND LCPR.ATIVO  = 'S'
					GROUP BY
						LCPR.LICA_ID_LISTA_CASAMENTO
					UNION
					SELECT
						0 QTD_VENDIDO,
						COUNT(LCPR.VENDIDO) QTD_PRODUTO,
						LCPR.LICA_ID_LISTA_CASAMENTO
					FROM
						e_LISTA_CASAMENTO_PRODUTO LCPR
					WHERE
						LCPR.ATIVO  = 'S'
					GROUP BY
						LCPR.LICA_ID_LISTA_CASAMENTO
					) Q1
				GROUP BY
					Q1.LICA_ID_LISTA_CASAMENTO";

$resultCount = $mysqli->ConsultarSQL($queryCount);
foreach ($resultCount as $valueCount) {
	$arrayCount[$valueCount['LICA_ID_LISTA_CASAMENTO']][] = $valueCount;
}
$smarty->assign('countProdutosVendidos', $arrayCount);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'lista_casamento.js');

#CSS
//$smarty->append('css_files', CSS_DIR.'lista_casamento.css');
?>