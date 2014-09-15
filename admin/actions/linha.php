<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'gravaLinha':

		$descricaoLinha = sqlvalue($_POST['descricao'], true);
		$ordem = sqlvalue($_POST['ordem'], true);
		$tipo = sqlvalue($_POST['tipo'], false);

		if($_POST['exibeMenu'] == 'true'){
			$exibeMenu = 'S';
		} else {
			$exibeMenu = 'N';
		}
		
		$exibeMenu = sqlvalue($exibeMenu, true);
		
		$query = "INSERT INTO e_NIVEL_AUXILIAR_VALOR (VALOR, URL_AMIGAVEL, ORDEM, ATIVO, DATA_INSERT, USUARIO_INSERT, NIAU_ID_NIVEL_AUX) 
				  VALUES (".$descricaoLinha.", lower(fn_trata_caracter_especial(".$descricaoLinha.")), ".$ordem.", ".$exibeMenu.",  now(), '".USUARIO_LOGADO."', ".$tipo.");
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

	case "removeLinha":

		$id = sqlvalue($_POST["id"], false);

		$query = "DELETE FROM e_NIVEL_AUXILIAR_VALOR WHERE ID_NIVEL_AUX_VALOR = ".$id."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;
		
		break;

	case "editaLinha":

		$id = sqlvalue($_POST["id"], false);
		$descricaoLinha = sqlvalue($_POST['descricao'], true);
		$ordem = sqlvalue($_POST['ordem'], true);
		$tipo = sqlvalue($_POST['tipo'], false);
		if($_POST['exibeMenu'] == 'true'){
			$exibeMenu = 'S';
		} else {
			$exibeMenu = 'N';
		}
		
		$exibeMenu = sqlvalue($exibeMenu, true);

		$query = "UPDATE e_NIVEL_AUXILIAR_VALOR 
				SET VALOR = ".$descricaoLinha.", DATA_UPDATE = now(), 
				ORDEM = ".$ordem.", ATIVO = ".$exibeMenu.", NIAU_ID_NIVEL_AUX = ".$tipo.",
				URL_AMIGAVEL = lower(fn_trata_caracter_especial(".$descricaoLinha.")),
				USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_NIVEL_AUX_VALOR = ".$id."";
		

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