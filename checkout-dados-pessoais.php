<?php
$paginaTit = 'Dados Pessoais';
$navegacao = 'Dados Pessoais';
$menu = 'dados_pessoais';

/**/
$acao = null;
if (isset($_REQUEST["acao"])) {
	$acao = $_REQUEST["acao"];
}

$smarty->assign('etapaPedido', 1);

$urlRedirect = 'checkout-pagamento-entrega';

$smarty->assign('urlRedirect', $urlRedirect);

$smarty->assign('login', $_SESSION['login']);

//printr($_SESSION);

switch ($acao) {
	
	case 'logar':
		
		$login = $_POST["email"];
		$senha = md5($_POST["senha"]);
		$urlRedirect = $urlRedirect;

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;

		ValidarCliente($urlRedirect, true, 'checkout-dados-pessoais', $mysqli);

		break;

		
	default:
		ValidarCliente($urlRedirect, true, 'logar', $mysqli);
		break;

}
/**/


$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
