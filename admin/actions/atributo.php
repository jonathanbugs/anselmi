<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'gravaAtributo':

		$descricaoAtributo = sqlvalue($_POST['descricao'], true);
		$tipo = sqlvalue($_POST['tipo'], false);
		$hexadecimal = sqlvalue($_POST['hexadecimal'], true);

		$query = "INSERT INTO e_ATRIBUTO_VALOR (VALOR, HEXADECIMAL, ATRI_ID_ATRIBUTO, URL_AMIGAVEL, USUARIO_INSERT) 
				  VALUES (".$descricaoAtributo.", ".$hexadecimal.", ".$tipo.", lower(fn_trata_caracter_especial(".$descricaoAtributo.")), '".USUARIO_LOGADO."');
				  ";


		$resultQuery = $mysqli->ExecutarSQL($query);

		$id = $mysqli->insert_id;

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "id": "'.$id.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "removeAtributo":

		$id = sqlvalue($_POST["id"], false);

		$query = "DELETE FROM e_ATRIBUTO_VALOR WHERE ID_ATRIBUTO_VALOR = ".$id."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;
		
		break;

	case "editaAtributo":

		$id = sqlvalue($_POST["id"], false);
		$descricaoAtributo = sqlvalue($_POST['descricao'], true);
		$tipo = sqlvalue($_POST['tipo'], false);
		$hexadecimal = sqlvalue($_POST['hexadecimal'], true);
				
		$query = "UPDATE e_ATRIBUTO_VALOR 
				SET VALOR = ".$descricaoAtributo.", DATA_UPDATE = now(), 
				ATRI_ID_ATRIBUTO = ".$tipo.",
				HEXADECIMAL = ".$hexadecimal.",
				URL_AMIGAVEL = lower(fn_trata_caracter_especial(".$descricaoAtributo.")),
				USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_ATRIBUTO_VALOR = ".$id."";
		

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