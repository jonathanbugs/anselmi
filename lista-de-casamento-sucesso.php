<?php
$paginaTit = 'Lista de Casamento Sucesso';
$navegacao = 'Lista de Casamento Sucesso';
$menu = 'lista-de-casamento-sucesso';

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:/logar/&redirect=lista-de-casamento');
}

$idListaCasamento = $_SESSION['sessionMinhaIdListaCasamento'];
$smarty->assign('idListaCasamento', $idListaCasamento);

$query = "SELECT
				CONJUGE1,
				CONJUGE2,
				URL,
				FOTO_CAPA
			FROM
				e_LISTA_CASAMENTO LICA
			WHERE
				LICA.PESS_ID_PESSOA = ".$idPessoa."
			AND LICA.ID_LISTA_CASAMENTO = ".$idListaCasamento."";

$result = $mysqli->ConsultarSQL($query);

$result = $result[0];

$nomeConjuge1 = ucwords(strtolower($result['CONJUGE1']));
$nomeConjuge2 = ucwords(strtolower($result['CONJUGE2']));
$url = $result['URL'];
$fotoCapa = $result['FOTO_CAPA'];

$smarty->assign('nomeConjuge1', $nomeConjuge1);
$smarty->assign('nomeConjuge2', $nomeConjuge2);
$smarty->assign('url', $url);
$smarty->assign('fotoCapa', $fotoCapa);

// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
