<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case 'ativaCategoria':
		$idCategoria = sqlvalue($_POST['idCategoria'], false);
		if($_POST['ativaCategoria'] == 'true'){
			$ativaCategoria = sqlvalue('S', true);
		} else {
			$ativaCategoria = sqlvalue('N', true);
		}
		
		$query = "UPDATE e_CATEGORIA SET ATIVO = ".$ativaCategoria." WHERE ID_CATEGORIA = ".$idCategoria."";
		
		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}
		
		echo $retorno;

		break;

	case 'editarCategoria':

		$idCategoria = sqlvalue($_POST['idCategoria'], false);
	    $descricaoCategoria = sqlvalue($_POST['descricaoCategoria'], true);
	    
	    if($_POST['ativo'] == 'S'){
	    	$ativo = sqlvalue($_POST['ativo'], true);
	    } else {
	    	$ativo = sqlvalue('N', true);
	    }
	    $ordem = sqlvalue($_POST['ordem'], true);
	    $metaTitle = sqlvalue($_POST['metaTitle'], true);
	    $metaDescription = sqlvalue($_POST['metaDescription'], true);
	    $metaKeywords = sqlvalue($_POST['metaKeywords'], true);
	    

	    $urlAmigavel = sqlvalue($descricaoCategoria, true);

	    if($_POST['categoria'][0] == 'I'){ 
	    	$categoriaInicial = 'S'; $categoria = null; 
	    } else { 
	    	$categoriaInicial = 'N'; $categoria = $_POST['categoria'][0]; 
	    }
	    
	    $categoria = sqlvalue($categoria, true);
	    
	    $query = "UPDATE e_CATEGORIA
				   SET DESCRICAO_CATEGORIA = ".$descricaoCategoria."
				      ,CATE_ID_CATEGORIA = ".$categoria."
				      ,ATIVO = ".$ativo."
				      ,ORDEM = ".$ordem."
				      ,CATEGORIA_INICIAL = '".$categoriaInicial."'
				      ,URL_AMIGAVEL = lower(fn_trata_caracter_especial(".$urlAmigavel."))
				      ,META_TITLE = ".$metaTitle."
				      ,META_DESCRIPTION = ".$metaDescription."
				      ,META_KEYWORDS = ".$metaKeywords."
				      ,DATA_UPDATE = NOW()
				      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				 WHERE ID_CATEGORIA = ".$idCategoria."";

		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "redirect": "categoria-lista" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}
		
		echo $retorno;

		break;

	case 'cadastrarCategoria':

	    $descricaoCategoria = sqlvalue($_POST['descricaoCategoria'], true);
	    $ativo = sqlvalue($_POST['ativo'], true);
	    $ordem = sqlvalue($_POST['ordem'], true);
	    $metaTitle = sqlvalue($_POST['metaTitle'], true);
	    $metaDescription = sqlvalue($_POST['metaDescription'], true);
	    $metaKeywords = sqlvalue($_POST['metaKeywords'], true);
	    

	    $urlAmigavel = sqlvalue($_POST['descricaoCategoria'], true);

	    if($_POST['categoria'][0] == 'I'){ 
	    	$categoriaInicial = 'S'; $categoria = null; 
	    } else { 
	    	$categoriaInicial = 'N'; $categoria = $_POST['categoria'][0]; 
	    }
	    
	    $categoria = sqlvalue($categoria, true);
	    
	    $query = "INSERT INTO e_CATEGORIA
				           (DESCRICAO_CATEGORIA
				           ,CATE_ID_CATEGORIA
				           ,ATIVO
				           ,ORDEM
				           ,CATEGORIA_INICIAL
				           ,URL_AMIGAVEL
				           ,META_TITLE
				           ,META_DESCRIPTION
				           ,META_KEYWORDS
				           ,DATA_INSERT
				           ,USUARIO_INSERT)
				     VALUES
				           (".$descricaoCategoria."
				           ,".$categoria."
				           ,".$ativo."
				           ,".$ordem."
				           ,'".$categoriaInicial."'
				           ,lower(fn_trata_caracter_especial(".$urlAmigavel."))
				           ,".$metaTitle."
				           ,".$metaDescription."
				           ,".$metaKeywords."
				           ,NOW()
				           ,'".USUARIO_LOGADO."')";

		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "redirect": "categoria-cadastra" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}
		
		echo $retorno;


		break;
	
	default:
		# code...
		break;
}

?>
