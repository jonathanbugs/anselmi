<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {

	case 'adicionaProdutoCompreJunto':

		$idProduto = sqlvalue($_POST['idProduto'], false);
		$idCompreJunto = sqlvalue($_POST['idCompreJunto'], false);

		if($_POST['checked'] == 'S'){
			$queryValida = "SELECT 1 FROM e_PRODUTO_COMPRE_JUNTO_COMBINACAO 
									WHERE PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."
									AND PROD_ID_PRODUTO = ".$idProduto."";

			$resultValida = $mysqli->ExecutarSQL($queryValida);
			$nroLinhas = $mysqli->NumeroLinhas($resultValida);

			if($nroLinhas == 0){
				$query = "INSERT INTO e_PRODUTO_COMPRE_JUNTO_COMBINACAO
						           (PCJU_ID_PRODUTO_COMPRE_JUNTO
						           ,PROD_ID_PRODUTO
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (".$idCompreJunto."
						           ,".$idProduto."
						           ,now()
						           ,'".USUARIO_LOGADO."')";
			} else {
				$query = "UPDATE e_PRODUTO_COMPRE_JUNTO_COMBINACAO
							SET DATA_DELETE = NULL, DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."'
							WHERE PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."
							AND PROD_ID_PRODUTO = ".$idProduto."";
			}

		} else {
			$query = "UPDATE e_PRODUTO_COMPRE_JUNTO_COMBINACAO
						   SET DATA_UPDATE = now()
						      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
						      ,DATA_DELETE = now()
						 WHERE PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."
						   AND PROD_ID_PRODUTO = ".$idProduto."";
		}

		//printr($queryValida);

		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case 'forcaProdutoCompreJunto':

		$idProduto = sqlvalue($_POST['idProduto'], false);
		$idCompreJunto = sqlvalue($_POST['idCompreJunto'], false);

		if($_POST['checked'] == 'S'){
			$forcaCompreJunto = sqlvalue($_POST['checked'], true);
		} else {
			$forcaCompreJunto = sqlvalue('N', true);
		}

			$query = "UPDATE e_PRODUTO_COMPRE_JUNTO_COMBINACAO
						SET FORCA_COMPRE_JUNTO = ".$forcaCompreJunto."
							,USUARIO_UPDATE = '".USUARIO_LOGADO."'
					 WHERE PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."
					   AND PROD_ID_PRODUTO = ".$idProduto."";

		//printr($query);

		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case 'editaCompreJunto':

		$idCompreJunto = sqlvalue($_POST['idCompreJunto'], false);
	    $descricaoCompreJunto = sqlvalue($_POST['descricaoCompreJunto'], true);
	    $tipoDesconto = sqlvalue($_POST['tipoDesconto'], true);
	    $valorDesconto = sqlvalue(formataPrecoInsert($_POST['valorDesconto']), false);
	    if(isset($_POST['ativaCompreJunto'])){
	    	$ativaCompreJunto = sqlvalue($_POST['ativaCompreJunto'], true);
		} else {
			$ativaCompreJunto = sqlvalue('N', true);
		}

		$query = "UPDATE e_PRODUTO_COMPRE_JUNTO
					   SET DESCRICAO = ".$descricaoCompreJunto."
					      ,TIPO_DESCONTO = ".$tipoDesconto."
					      ,VALOR_DESCONTO = ".$valorDesconto."
					      ,ATIVO = ".$ativaCompreJunto."
					      ,DATA_UPDATE = now()
					      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
					 WHERE ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."";

		$resultQuery = $mysqli->ExecutarSQL($query);


		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case 'cadastraCompreJunto':

		$idCompreJunto = sqlvalue($_POST['idCompreJunto'], false);
	    $descricaoCompreJunto = sqlvalue($_POST['descricaoCompreJunto'], true);
	    $tipoDesconto = sqlvalue($_POST['tipoDesconto'], true);
	    $valorDesconto = sqlvalue(formataPrecoInsert($_POST['valorDesconto']), false);
	    if(isset($_POST['ativaCompreJunto'])){
	    	$ativaCompreJunto = sqlvalue($_POST['ativaCompreJunto'], true);
		} else {
			$ativaCompreJunto = sqlvalue('N', true);
		}
		
		$query = "INSERT INTO e_PRODUTO_COMPRE_JUNTO
				           (DESCRICAO
				           ,TIPO_DESCONTO
				           ,VALOR_DESCONTO
				           ,ATIVO
				           ,DATA_INSERT
				           ,USUARIO_INSERT)
				     VALUES
				           (".$descricaoCompreJunto."
				           ,".$tipoDesconto."
				           ,".$valorDesconto."
				           ,".$ativaCompreJunto."
				           ,now()
				           ,'".USUARIO_LOGADO."');
					";

		$resultQuery = $mysqli->ExecutarSQL($query);
		$idCompreJunto = $mysqli->InsertId();

		if ($idCompreJunto > 0) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "idCompreJunto": "'.$idCompreJunto.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case 'excluirCompreJunto':

		$idCompreJunto = sqlvalue($_POST['idCompreJunto'], false);

		$query = "UPDATE e_PRODUTO_COMPRE_JUNTO SET DATA_DELETE = now() WHERE ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;

		break;

	default:
		printr($_POST);
		break;
}

?>