<?php
require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

$paginaTit = 'Lista de Desejos';
$navegacao = 'Lista de Desejos';
$menu = 'lista_desejos';

$idPessoa;
if(isset($_SESSION["sessionIdPessoa"])){
	$idPessoa = $_SESSION["sessionIdPessoa"];
} else {
	$addProduto;
	if(isset($_GET['addProduto'])){
		$addProduto = '&addProduto='.$_GET['addProduto'].'&idProduto='.$_GET['idProduto'];
	}
	header('Location:logar/&redirect=lista-desejos'.$addProduto);
}

if(isset($_GET['addProduto']) and $_GET['addProduto'] == 'true'){
	if(isset($_GET['idProduto'])){
		
		$idProduto = sqlvalue($_GET['idProduto'], false);
		$idPessoa = sqlvalue($idPessoa, false);

		$queryValida = "SELECT 1 
						FROM e_PRODUTO_DESEJO
						WHERE PRCO_ID_PRODUTO_COMBINACAO = ".$idProduto."
						  AND PESS_ID_PESSOA = ".$idPessoa."
						  AND DATA_DELETE IS NULL";
		$resultValida = $mysqli->ConsultarSQL($queryValida);

		if(count($resultValida) <= 0){
			$mysqli->ExecutarSQL("INSERT INTO e_PRODUTO_DESEJO
						           (PRCO_ID_PRODUTO_COMBINACAO
						           ,PESS_ID_PESSOA
						           ,USUARIO_INSERT)
						     VALUES
						           (".$idProduto."
						           ,".$idPessoa."
						           ,'lista-desejos.php')");
		}
		
		header('Location:lista-desejos');
	}
}

$idCategoriaDesejo;
if(isset($_GET['idcate'])){
	$idCategoriaDesejo = $_GET['idcate'];
}

/**/
$listaProdutoDesejo = $Produto->fnProdutoDesejo($idPessoa, false, $idCategoriaDesejo);
$smarty->assign('listaProdutoDesejo', $listaProdutoDesejo);

$countProdutoDesejo = count($listaProdutoDesejo);
$smarty->assign('countProdutoDesejo', $countProdutoDesejo);

$listaCategoriaDesejo = $Produto->fnProdutoDesejo($idPessoa, true, null);
$arrayCategoriaDesejo = array();
foreach ($listaCategoriaDesejo as $value) {
	$arrayCategoriaDesejo[$value["ID_CATEGORIA"]] = $value["DESCRICAO_CATEGORIA"];
}
$smarty->assign('listaCategoriaDesejo', $arrayCategoriaDesejo);

/**/



$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
