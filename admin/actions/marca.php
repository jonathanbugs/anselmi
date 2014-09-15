<?php
require('../configs/config.php');

if(isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'gravaMarca':

		$descricaoMarca = sqlvalue($_POST['descricao'], true);
		
		$mysqli->ExecutarSQL("INSERT INTO e_MARCA (DESCRICAO_MARCA, DATA_INSERT, USUARIO_INSERT) 
				  VALUES (".$descricaoMarca.", NOW(), '".USUARIO_LOGADO."');");
		$query("SELECT ID_MARCA ID FROM e_MARCA WHERE ID_MARCA = LAST_INSERT_ID();");
		$resultQuery = $mysqli->ConsultarSQL($query);

		$rowQuery = $resultQuery;

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "id": "'.$rowQuery["ID"].'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "removeMarca":

		$id = $_POST["id"];

		$query = "DELETE FROM e_MARCA WHERE ID_MARCA = ".$id."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;
		
		break;

	case "editaMarca":

		$id = sqlvalue($_POST["id"], false);
		$descricao = sqlvalue($_POST["descricao"],true);

		$query = "UPDATE e_MARCA SET DESCRICAO_MARCA = ".$descricao.", DATA_UPDATE = NOW(), 
				USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_MARCA = ".$id."";
		

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;
		
		break;
										
	default:
		# code...
		break;
}

?>