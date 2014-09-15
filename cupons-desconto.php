<?php
$paginaTit = 'Cupons de Desconto';
$navegacao = 'Cupons de Desconto';
$menu = 'cuposn_de_desconto';

if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	header('Location:logar/&redirect=cupons-desconto');
}

$smarty->assign('linkAtivo', 'cuponsDesconto');

$emailCliente = sqlvalue($_SESSION['login'], true);

$queryCupons = "SELECT
						PRCA.ID_PROMOCAO_CARRINHO,
						PRCA.CUPOM_PROMOCIONAL,
						PRCA.PROMOCAO_ATIVA,
						PRCA.EMAIL_CLIENTE_CONTEMPLADO,
						date_format(PRCA.DATA_INICIAL_VALIDADE, '%d/%m/%Y') DATA_INICIAL_VALIDADE,
						date_format(PRCA.DATA_FINAL_VALIDADE, '%d/%m/%Y') DATA_FINAL_VALIDADE,
						PRCA.FRETE_GRATIS,
						PRCA.TIPO_DESCONTO,
						PRCA.VALOR_DESCONTO,
						CASE WHEN PRCA.DATA_FINAL_VALIDADE < now() THEN 'S' ELSE 'N' END VENCIDO,
						DATEDIFF (now(), PRCA.DATA_FINAL_VALIDADE) DIAS_VENCIMENTO
					FROM
						e_PROMOCAO_CARRINHO PRCA
					WHERE
						PRCA.EMAIL_CLIENTE_CONTEMPLADO = ".$emailCliente."
					AND PRCA.PROMOCAO_ATIVA = 'S'
					ORDER BY
						PRCA.DATA_FINAL_VALIDADE DESC";

$listaCupons = $mysqli->ConsultarSQL($queryCupons);
$smarty->assign('listaCupons', $listaCupons);

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
