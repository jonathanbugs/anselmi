<?php
$paginaTit = 'Lista de Casamento Excluir';
$navegacao = 'Lista de Casamento Excluir';
$menu = 'lista-de-casamento-excluir';

if(isset($_SESSION["sessionIdPessoa"])){
	
	$idPessoa = $_SESSION["sessionIdPessoa"];
	
	if(!$_SESSION['sessionMinhaIdListaCasamento']){
		$query = "SELECT TOP 1 ID_LISTA_CASAMENTO FROM e_LISTA_CASAMENTO WHERE PESS_ID_PESSOA = ".$idPessoa." AND ATIVO = 'S'";
		$idListaCasamento = $mysqli->ConsultarSQL($query);
		$idListaCasamento = $idListaCasamento[0]['ID_LISTA_CASAMENTO'];
		$_SESSION['sessionMinhaIdListaCasamento'] = $idListaCasamento;
		if(!$idListaCasamento){
			header('Location:/lista-de-casamento');
			exit;
		}
	} 

} else {
	header('Location:/logar/&redirect=lista-de-casamento-divulgar-lista');
	exit;
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
