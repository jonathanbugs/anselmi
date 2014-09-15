<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case 'editaPromocao':

		$idPromocao 			= sqlvalue($_POST["idPromocao"], false);
	    $nomePromocao 			= sqlvalue($_POST["nomePromocao"], true);
	    $dataInicialPromocao 	= sqlvalue(formataDataInsert($_POST["dataInicialPromocao"]), true);
	    $dataFinalPromocao 		= sqlvalue(formataDataInsert($_POST["dataFinalPromocao"]), true);
	    $tipoPromocao 			= sqlvalue($_POST["tipoPromocao"], true);
	    $valorPromocao 			= sqlvalue(formataPrecoInsert($_POST["valorPromocao"]), false);
	    
	    if(isset($_POST["ativaPromocao"])){
	    	$ativaPromocao 			= sqlvalue($_POST["ativaPromocao"], true);
	    } else {
	    	$ativaPromocao 			= sqlvalue("N", true);
	    }

	    if(isset($_POST["freteGratis"])){
	    	$freteGratis 			= sqlvalue($_POST["freteGratis"], true);
	    } else {
	    	$freteGratis 			= sqlvalue("N", true);
	    }
	    
	    $obsPromocao 			= sqlvalue($_POST["obsPromocao"], true);
		
		$query = "UPDATE e_PROMOCAO
				   SET NOME_PROMOCAO = ".$nomePromocao."
				      ,DATA_INICIAL = ".$dataInicialPromocao."
				      ,DATA_FINAL = ".$dataFinalPromocao."
				      ,OBS = ".$obsPromocao."
				      ,TIPO_PROMOCAO = ".$tipoPromocao."
				      ,FRETE_GRATIS = ".$freteGratis."
				      ,VALOR = ".$valorPromocao."
				      ,PROMOCAO_ATIVA = ".$ativaPromocao."
				      ,DATA_UPDATE = now()
				      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				 WHERE ID_PROMOCAO = ".$idPromocao."";

		$resultQuery = $mysqli->ExecutarSQL($query);



		if(isset($_POST["categoriaPromocaoSelect"])){

			$arrayCategoria = explode(',', $_POST["categoriaPromocaoSelect"]);

			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_PROMOCAO WHERE PROM_ID_PROMOCAO = ".$idPromocao."");
		
			$query = "";
			foreach ($arrayCategoria as $value) {
				
				$query .= "INSERT INTO e_PRODUTO_PROMOCAO
						           (PROD_ID_PRODUTO
						           ,CATE_ID_CATEGORIA
						           ,PROM_ID_PROMOCAO
						           ,LOJA_ID_LOJA
						           ,PRIORIDADE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (NULL
						           ,".$value."
						           ,".$idPromocao."
						           ,".ID_LOJA."
						           ,1
						           ,now()
						           ,'".USUARIO_LOGADO."');
							";

			}
		
		} 
		if($_POST['produtoPromocaoSelect']) {
			$arrayCategoria = explode(',', $_POST["produtoPromocaoSelect"]);

			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_PROMOCAO WHERE PROM_ID_PROMOCAO = ".$idPromocao."");
		
			$query = "";
			foreach ($arrayCategoria as $value) {
				
				$query .= "INSERT INTO e_PRODUTO_PROMOCAO
						           (PROD_ID_PRODUTO
						           ,CATE_ID_CATEGORIA
						           ,PROM_ID_PROMOCAO
						           ,LOJA_ID_LOJA
						           ,PRIORIDADE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (".$value."
						           ,NULL
						           ,".$idPromocao."
						           ,".ID_LOJA."
						           ,1
						           ,now()
						           ,'".USUARIO_LOGADO."');
							";

			}
		}

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case 'cadastraPromocao':

	//printr($_POST);

	    $nomePromocao 			= sqlvalue($_POST["nomePromocao"], true);
	    $dataInicialPromocao 	= sqlvalue(formataDataInsert($_POST["dataInicialPromocao"]), true);
	    $dataFinalPromocao 		= sqlvalue(formataDataInsert($_POST["dataFinalPromocao"]), true);
	    $tipoPromocao 			= sqlvalue($_POST["tipoPromocao"], true);
	    $valorPromocao 			= sqlvalue(formataPrecoInsert($_POST["valorPromocao"]), false);
	    
	    if(isset($_POST["ativaPromocao"])){
	    	$ativaPromocao 			= sqlvalue($_POST["ativaPromocao"], true);
	    } else {
	    	$ativaPromocao 			= sqlvalue("N", true);
	    }

		if(isset($_POST["freteGratis"])){
	    	$freteGratis 			= sqlvalue($_POST["freteGratis"], true);
	    } else {
	    	$freteGratis 			= sqlvalue("N", true);
	    }	    
	    
	    $obsPromocao 			= sqlvalue($_POST["obsPromocao"], true);
		
		$query = "INSERT INTO e_PROMOCAO
						           (NOME_PROMOCAO
						           ,DATA_INICIAL
						           ,DATA_FINAL
						           ,OBS
						           ,TIPO_PROMOCAO
						           ,VALOR
						           ,PROMOCAO_ATIVA
						           ,FRETE_GRATIS
						           ,IMAGEM
						           ,DATA_INSERT
						           ,USUARIO_INSERT
						           )
					     VALUES
					           (".$nomePromocao."
					           ,".$dataInicialPromocao."
					           ,".$dataFinalPromocao."
					           ,".$obsPromocao."
					           ,".$tipoPromocao."
					           ,".$valorPromocao."
					           ,".$ativaPromocao."
					           ,".$freteGratis."
					           ,NULL
					           ,now()
					           ,'".USUARIO_LOGADO."'
					           );
						";

		$rowQueryPromocao = $mysqli->ExecutarSQL($query);

		$idPromocaoNovo = $mysqli->InsertId();


		if(isset($_POST["categoriaPromocaoSelect"])){

			$arrayCategoria = explode(',', $_POST["categoriaPromocaoSelect"]);

			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_PROMOCAO WHERE PROM_ID_PROMOCAO = ".$idPromocao."");
		
			$query = "";
			foreach ($arrayCategoria as $value) {
				
				$query .= "INSERT INTO e_PRODUTO_PROMOCAO
						           (PROD_ID_PRODUTO
						           ,CATE_ID_CATEGORIA
						           ,PROM_ID_PROMOCAO
						           ,LOJA_ID_LOJA
						           ,PRIORIDADE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (NULL
						           ,".$value."
						           ,".$idPromocao."
						           ,".ID_LOJA."
						           ,1
						           ,now()
						           ,'".USUARIO_LOGADO."');
							";

			}
		
		} 
		if($_POST['produtoPromocaoSelect']) {
			$arrayCategoria = explode(',', $_POST["produtoPromocaoSelect"]);

			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_PROMOCAO WHERE PROM_ID_PROMOCAO = ".$idPromocao."");
		
			$query = "";
			foreach ($arrayCategoria as $value) {
				
				$query .= "INSERT INTO e_PRODUTO_PROMOCAO
						           (PROD_ID_PRODUTO
						           ,CATE_ID_CATEGORIA
						           ,PROM_ID_PROMOCAO
						           ,LOJA_ID_LOJA
						           ,PRIORIDADE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (".$value."
						           ,NULL
						           ,".$idPromocao."
						           ,".ID_LOJA."
						           ,1
						           ,now()
						           ,'".USUARIO_LOGADO."');
							";

			}
		}

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "editaPromocaoCarrinho":

		$idPromocaoCarrinho 		= sqlvalue($_POST["idPromocaoCarrinho"], false);
		$descricaoPromocao 			= sqlvalue($_POST["descricaoPromocao"], true);
      	$cupomPromocional 			= sqlvalue($_POST["cupomPromocional"], true);
      	$promocaoAtiva 				= sqlvalue($_POST["promocaoAtiva"], true);
      	$emailClienteContemplado 	= sqlvalue($_POST["emailClienteContemplado"], true);
      	$dataInicialValidade 		= sqlvalue(formataDataInsert($_POST["dataInicialValidade"]), true);
      	$dataFinalValidade 			= sqlvalue(formataDataInsert($_POST["dataFinalValidade"]), true);
      	$valorMinimoCompra 			= sqlvalue(formataPrecoInsert($_POST["valorMinimoCompra"]), false);
      	$utilizacaoUnica 			= sqlvalue($_POST["utilizacaoUnica"], true);
      	$quantidadeProdutoCarrinho 	= sqlvalue($_POST["quantidadeProdutoCarrinho"], true);
      	$freteGratis 				= sqlvalue($_POST["freteGratis"], true);
      	$valorDesconto 				= sqlvalue(formataPrecoInsert($_POST["valorDesconto"]), false);
      	$tipoDesconto 				= sqlvalue($_POST["tipoDesconto"], true);
      	$pacotePresenteGratis 		= sqlvalue($_POST["pacotePresenteGratis"], true);


      	$queryValida = "SELECT 1 FROM e_PROMOCAO_CARRINHO WHERE CUPOM_PROMOCIONAL = ".$cupomPromocional." AND ID_PROMOCAO_CARRINHO <> ".$idPromocaoCarrinho."";
      	$resultValida = $mysqli->ConsultarSQL($queryValida);

      	if(!$resultValida[0]['1']){
			$query = "UPDATE e_PROMOCAO_CARRINHO
						   SET DESCRICAO_PROMOCAO = ".$descricaoPromocao."
						      ,CUPOM_PROMOCIONAL = ".$cupomPromocional."
						      ,PROMOCAO_ATIVA = ".$promocaoAtiva."
						      ,EMAIL_CLIENTE_CONTEMPLADO = ".$emailClienteContemplado."
						      ,DATA_INICIAL_VALIDADE = ".$dataInicialValidade."
						      ,DATA_FINAL_VALIDADE = ".$dataFinalValidade."
						      ,VALOR_MINIMO_COMPRA = ".$valorMinimoCompra."
						      ,UTILIZACAO_UNICA = ".$utilizacaoUnica."
						      ,QUANTIDADE_PRODUTO_CARRINHO = ".$quantidadeProdutoCarrinho."
						      ,FRETE_GRATIS = ".$freteGratis."
						      ,VALOR_DESCONTO = ".$valorDesconto."
						      ,TIPO_DESCONTO = ".$tipoDesconto."
						      ,PACOTE_PRESENTE_GRATIS = ".$pacotePresenteGratis."
						      ,DATA_UPDATE = now()
						      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
						 WHERE ID_PROMOCAO_CARRINHO = ".$idPromocaoCarrinho."
						 ";

					 //printr($query);

			$resultQuery = $mysqli->ExecutarSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
			}
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "Cupom informado já existe" }';		
		}

		echo $retorno;

		break;

	case "cadastraPromocaoCarrinho":

		$descricaoPromocao 			= sqlvalue($_POST["descricaoPromocao"], true);
      	$cupomPromocional 			= sqlvalue($_POST["cupomPromocional"], true);
      	$promocaoAtiva 				= sqlvalue($_POST["promocaoAtiva"], true);
      	$emailClienteContemplado 	= sqlvalue($_POST["emailClienteContemplado"], true);
      	$dataInicialValidade 		= sqlvalue(formataDataInsert($_POST["dataInicialValidade"]), true);
      	$dataFinalValidade 			= sqlvalue(formataDataInsert($_POST["dataFinalValidade"]), true);
      	$valorMinimoCompra 			= sqlvalue(formataPrecoInsert($_POST["valorMinimoCompra"]), false);
      	$utilizacaoUnica 			= sqlvalue($_POST["utilizacaoUnica"], true);
      	$quantidadeProdutoCarrinho 	= sqlvalue($_POST["quantidadeProdutoCarrinho"], true);
      	$freteGratis 				= sqlvalue($_POST["freteGratis"], true);
      	$valorDesconto 				= sqlvalue(formataPrecoInsert($_POST["valorDesconto"]), false);
      	$tipoDesconto 				= sqlvalue($_POST["tipoDesconto"], true);
      	$pacotePresenteGratis 		= sqlvalue($_POST["pacotePresenteGratis"], true);

      	$queryValida = "SELECT 1 FROM e_PROMOCAO_CARRINHO WHERE CUPOM_PROMOCIONAL = ".$cupomPromocional."";
      	$resultValida = $mysqli->ConsultarSQL($queryValida);

      	if(!$resultValida[0]['1']){
	      	$query = "INSERT INTO e_PROMOCAO_CARRINHO
					           (DESCRICAO_PROMOCAO
					           ,CUPOM_PROMOCIONAL
					           ,PROMOCAO_ATIVA
					           ,EMAIL_CLIENTE_CONTEMPLADO
					           ,DATA_INICIAL_VALIDADE
					           ,DATA_FINAL_VALIDADE
					           ,VALOR_MINIMO_COMPRA
					           ,UTILIZACAO_UNICA
					           ,QUANTIDADE_PRODUTO_CARRINHO
					           ,FRETE_GRATIS
					           ,VALOR_DESCONTO
					           ,TIPO_DESCONTO
					           ,PACOTE_PRESENTE_GRATIS
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$descricaoPromocao."
					           ,".$cupomPromocional."
					           ,".$promocaoAtiva."
					           ,".$emailClienteContemplado."
					           ,".$dataInicialValidade."
					           ,".$dataFinalValidade."
					           ,".$valorMinimoCompra."
					           ,".$utilizacaoUnica."
					           ,".$quantidadeProdutoCarrinho."
					           ,".$freteGratis."
					           ,".$valorDesconto."
					           ,".$tipoDesconto."
					           ,".$pacotePresenteGratis."
					           ,now()
					           ,'".USUARIO_LOGADO."');";
	//printr($query);
	      	$resultQuery = $mysqli->ExecutarSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "Cupom informado já existe" }';	
		}
		
		echo $retorno;

		break;
	
	default:
		# code...
		break;
}

?>