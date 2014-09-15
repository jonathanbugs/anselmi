<?php
require_once '../configs/config.php';

$acao = null;
if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

switch ($acao) {
	case 'removeProdutoDesejo':
		$idProdutoDesejo = sqlvalue($_POST['idProdutoDesejo']);
		$query = "UPDATE e_PRODUTO_DESEJO SET DATA_DELETE = now() WHERE ID_PRODUTO_DESEJO = ".$idProdutoDesejo."";
		if($mysqli->ExecutarSQL($query)){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "sucesso"}';
		}
		echo $retorno;
		break;
	
	default:
		$retorno = '{"retorno": "erro"}';
		echo $retorno;
		break;
}

?>