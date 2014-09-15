<?php
$paginaTit = 'Lista de Casamento';
$navegacao = 'Lista de Casamento';
$menu = 'lista-de-casamento';

$idPessoa = sqlvalue($_SESSION['sessionIdPessoa'], false);

$query = "SELECT TOP 1 ID_LISTA_CASAMENTO FROM e_LISTA_CASAMENTO WHERE PESS_ID_PESSOA = ".$idPessoa." AND ATIVO = 'S'";
$idListaCasamento = $mysqli->ConsultarSQL($query);

$idListaCasamento = $idListaCasamento[0]['ID_LISTA_CASAMENTO'];
$_SESSION['sessionIdListaCasamento'] = $idListaCasamento;
$smarty->assign('idListaCasamento', $idListaCasamento);

// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
