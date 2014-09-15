<?php
//print_r($_POST);
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case "editarProduto":

		$idProduto 							= sqlvalue($_POST["idProduto"],false);
		$situacaoProduto 					= sqlvalue($_POST["situacaoProduto"],false);
		$nomeProduto 						= sqlvalue($_POST["nomeProduto"],true);
		$referenciaProduto 					= sqlvalue($_POST["referenciaProduto"],true);
		$ncmProduto 						= sqlvalue($_POST["ncmProduto"],true);
		$codeanProduto 						= sqlvalue($_POST["codeanProduto"],true);
		$pesoProduto						= sqlvalue(formataValorInsert($_POST["pesoProduto"]),false);
		$alturaProduto 						= sqlvalue(formataValorInsert($_POST["alturaProduto"]),false);
		$larguraProduto 					= sqlvalue(formataValorInsert($_POST["larguraProduto"]),false);
		$profundidadeProduto 				= sqlvalue(formataValorInsert($_POST["profundidadeProduto"]),false);
		$videoProduto						= sqlvalue(formataVideo($_POST['videoProduto']), true);
		$nivelAuxProduto					= sqlvalue($_POST['nivelAuxProduto'], false);
		
		if($_POST["fabricanteProduto"] > 0){
			$fabricanteProduto 					= sqlvalue($_POST["fabricanteProduto"],false);
		} else {
			$fabricanteProduto 					= sqlvalue(NULL,true);	
		}
		
		if(isset($_POST["dataInicialLancamentoProduto"])){
			$dataInicialLancamentoProduduto 	= sqlvalue(formataDataInsert($_POST["dataInicialLancamentoProduto"]),true);
		} else {
			$dataInicialLancamentoProduduto 	= sqlvalue(NULL,true);	
		}
		if(isset($_POST["dataFinalLancamentoProduto"])){
			$dataFinalLancamentoProduduto 		= sqlvalue(formataDataInsert($_POST["dataFinalLancamentoProduto"]),true);
		} else {
			$dataFinalLancamentoProduduto 	= sqlvalue(NULL,true);	
		}
		
		$descricaoCurtaProduto 				= sqlvalue($_POST["descricaoCurtaProduto"],true);
		$descricaoLongaProduto 				= sqlvalue($_POST["descricaoLongaProduto"],true);

		$query = "UPDATE e_PRODUTO
				        SET PRSI_ID_PRODUTO_SITUACAO = ".$situacaoProduto."
				           ,NOME = ".$nomeProduto."
				           ,DESCRICAO_VENDA = ".$nomeProduto."
				           ,REFERENCIA = ".$referenciaProduto."
				           ,NCM = ".$ncmProduto."
				           ,COD_EAN = ".$codeanProduto."
				           ,PESO_KG = ".$pesoProduto."
				           ,ALTURA_CM = ".$alturaProduto."
				           ,LARGURA_CM = ".$larguraProduto."
				           ,PROFUNDIDADE_CM = ".$profundidadeProduto."
				           ,PESS_ID_PESSOA_FABRICANTE = ".$fabricanteProduto."
				           ,DATA_INICIAL_LANCAMENTO = ".$dataInicialLancamentoProduduto."
				           ,DATA_FINAL_LANCAMENTO = ".$dataFinalLancamentoProduduto."
				           ,DESCRICAO_CURTA = ".$descricaoCurtaProduto."
				           ,DESCRICAO_LONGA = ".$descricaoLongaProduto."
				           ,VIDEO = ".$videoProduto."
				           ,URL_AMIGAVEL = LOWER(concat(RTRIM(LTRIM(".$referenciaProduto.")),'-',fn_trata_caracter_especial(".$nomeProduto.")))
				           ,DATA_UPDATE = now()
				           ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				      WHERE ID_PRODUTO = ".$idProduto."";
				     
		$resultQuery = $mysqli->ExecutarSQL($query);

		/**/
		if($_POST["precoVendaProduto"]){
			$precoVenda = sqlvalue(formataPrecoInsert($_POST["precoVendaProduto"]),false);
			$dataInicialValidade = sqlvalue(formataDataInsert($_POST["precoVendaProdutoDataInicialValidade"]).' '.date('H:i:s'),true);

			$queryValidaPreco = "SELECT fn_valor_venda_produto(".$idProduto.", ".TABELA_PRECO_VENDA_PADRAO.", now()) PRECO_VENDA";
			$resultValidaPreco = $mysqli->ConsultarSQL($queryValidaPreco);
			if($precoVenda != $resultValidaPreco[0]['PRECO_VENDA']){
				$queryPreco = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
									VALUES (".TABELA_PRECO_VENDA_PADRAO.", ".$idProduto.", ".$precoVenda.", ".$dataInicialValidade.", now(), '".USUARIO_LOGADO."')
									";

				$mysqli->ExecutarSQL($queryPreco);	
			}
		}
		
		/**/

		/**/
		$queryNivelAux = "DELETE FROM e_PRODUTO_NIVEL_AUXILIAR_VALOR WHERE PROD_ID_PRODUTO = ".$idProduto."; ";
		foreach ($nivelAuxProduto as $value) {
			$idNivelAux = sqlvalue($value, false);
			$queryNivelAux .= "INSERT INTO e_PRODUTO_NIVEL_AUXILIAR_VALOR (PROD_ID_PRODUTO, NAVA_ID_NIVEL_AUX_VALOR, DATA_INSERT, USUARIO_INSERT)
								VALUES (".$idProduto.", ".$idNivelAux.", now(), '".USUARIO_LOGADO."'); ";
		}
		$mysqli->ExecutarMultiSQL($queryNivelAux);
		/**/

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "gravaPrecoProduto":

		if(isset($_POST["idProdutoCorrente"])){

			$retornoArray[] = true;
			
			$idProduto = sqlvalue($_POST["idProdutoCorrente"],false);

			// if(isset($_POST["precoCompraProduto"])){

			// 	$precoCompra = sqlvalue(formataPrecoInsert($_POST["precoCompraProduto"]),false);
			// 	$dataInicialValidade = sqlvalue(formataDataInsert($_POST["precoCompraProdutoDataInicialValidade"]),true);

			// 	$query = "IF EXISTS (SELECT 1 FROM e_PRODUTO_PRECO_COMPRA PPCO WHERE PPCO.VALOR = ".$precoCompra." AND PPCO.DATA_INICIAL_VALIDADE < now() AND PPCO.PROD_ID_PRODUTO = ".$idProduto.")
			// 				BEGIN
			// 					SELECT 'EXISTE' RETORNO
			// 				END
			// 				ELSE
			// 				BEGIN
			// 					INSERT INTO e_PRODUTO_PRECO_COMPRA (TPCO_ID_TABELA_PRECO_COMPRA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
			// 					VALUES (".TABELA_PRECO_COMPRA_PADRAO.", ".$idProduto.", ".$precoCompra.", ".$dataInicialValidade.", now(), '".USUARIO_LOGADO."')
			// 					SELECT 'GRAVOU' RETORNO
			// 				END";
			// 	$rowQuery = $mysqli->ConsultarSQL($query);

			// 	if($rowQuery[0]["RETORNO"]){
			// 		$retornoArray[] = true;		
			// 	} else {
			// 		$retornoArray[] = false;	
			// 	}

			// } else {
			// 	$retornoArray[] = false;
			// }

			if(isset($_POST["precoVendaProduto"])){

				$precoVenda = sqlvalue(formataPrecoInsert($_POST["precoVendaProduto"]),false);
				$dataInicialValidade = sqlvalue(formataDataInsert($_POST["precoVendaProdutoDataInicialValidade"]),true);

				$queryValida = "SELECT 1 FROM e_PRODUTO_PRECO_VENDA PPVE WHERE PPVE.VALOR = ".$precoVenda." AND PPVE.DATA_INICIAL_VALIDADE < now() AND PPVE.PROD_ID_PRODUTO = ".$idProduto."";
				$resultValida = $mysqli->ExecutarSQL($queryValida);
				$nroLinhasValida = $mysqli->NumeroLinhas($resultValida);
				
				if($nroLinhasValida == 0){
					$query = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
							  VALUES (".TABELA_PRECO_VENDA_PADRAO.", ".$idProduto.", ".$precoVenda.", ".$dataInicialValidade.", now(), '".USUARIO_LOGADO."')
							 ";
					$rowQuery = $mysqli->ExecutarSQL($query);

					if($mysqli->LinhasAfetadas() > 0){
						$retornoArray[] = true;		
					} else {
						$retornoArray[] = false;	
					}
				}	
			
			} else {
				$retornoArray[] = false;
			}

			if(isset($_POST['precoVendaMarkup']) and $_POST['precoVendaMarkup'] > 0){
				$markup = sqlvalue(formataValorInsert($_POST['precoVendaMarkup']), false);
				$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_MARKUP WHERE PROD_ID_PRODUTO = ".$idProduto."");
				$query = "INSERT INTO e_PRODUTO_MARKUP
									(PROD_ID_PRODUTO,
									LOJA_ID_LOJA,
									MARKUP,
									USUARIO_INSERT)
								VALUES
									(".$idProduto.",
									".ID_LOJA.",
									".$markup.",
									'".USUARIO_LOGADO."');
									";
				$mysqli->ExecutarSQL($query);
			} else {
				$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_MARKUP WHERE PROD_ID_PRODUTO = ".$idProduto."");
			}

			if(isset($_POST["precoPromocionalProduto"])){

				if($_POST["precoPromocionalProduto"] > 0){
				
					$precoVendaPromocional = sqlvalue(formataPrecoInsert($_POST["precoPromocionalProduto"]),false);
					$dataInicialValidade = sqlvalue(formataDataInsert($_POST["precoPromocionalProdutoDataInicialValidade"]),true);
					$dataFinalValidade = sqlvalue(formataDataInsert($_POST["precoPromocionalProdutoDataFinalValidade"]),true);

					$queryValida = "SELECT 1 FROM e_PRODUTO_PRECO_VENDA PPVE 
									WHERE PPVE.VALOR = ".$precoVendaPromocional." 
									AND PPVE.DATA_FINAL_VALIDADE > now()
									AND PPVE.PROD_ID_PRODUTO = ".$idProduto."";
					$resultValida = $mysqli->ExecutarSQL($queryValida);
					$nroLinhasValida = $mysqli->NumeroLinhas($resultValida);

					if($nroLinhasValida == 0){
						$query = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_FINAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
								  VALUES (".TABELA_PRECO_VENDA_PROMOCIONAL.", ".$idProduto.", ".$precoVendaPromocional.", ".$dataInicialValidade.", ".$dataFinalValidade.", now(), '".USUARIO_LOGADO."')
								 ";
						$rowQuery = $mysqli->ExecutarSQL($query);

						if($mysqli->LinhasAfetadas() > 0){
							$retornoArray[] = true;		
						} else {
							$retornoArray[] = false;	
						}
					}
				} else {
					$retornoArray[] = true;
				}
				
			} else {
				$retornoArray[] = false;
			}

			if(in_array(true, $retornoArray)){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.PRECO_PRODUTO_NAO_INFORMADO.'" }';
			}
					
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';
		}

		echo $retorno;		

		break;	

	case "removeProdutoPreco":
		//printr($_POST);
    	if(isset($_POST["idProdutoPreco"])){
			
			$idProdutoPreco = sqlvalue($_POST["idProdutoPreco"],false);
						
			$query = "DELETE FROM e_PRODUTO_PRECO_VENDA WHERE ID_PRODUTO_PRECO_VENDA = ".$idProdutoPreco."";

			$resultQuery = $mysqli->ExecutarSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;
		
		break;

	case "editaMetaProduto":

		if(isset($_POST["idProduto"])){
			//print_r($_POST);

			$idProduto 				= sqlvalue($_POST["idProduto"],false);
			$metaDescriptionProduto = sqlvalue($_POST["metaDescriptionProduto"],true);
			$metaKeywordsProduto 	= sqlvalue($_POST["metaKeywordsProduto"],true);
			$metaTitleProduto 		= sqlvalue($_POST["metaTitleProduto"],true);
			//$urlAmigavelProduto 	= sqlvalue($_POST["urlAmigavelProduto"],true);
		
			$query = "UPDATE e_PRODUTO SET META_DESCRIPTION = ".$metaDescriptionProduto.", META_KEYWORDS = ".$metaKeywordsProduto.", 
					META_TITLE = ".$metaTitleProduto.", DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."_META' 
					WHERE ID_PRODUTO = ".$idProduto."";
			$resultQuery = $mysqli->ExecutarSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "editarCategoriaProduto":

		if(isset($_POST["idProduto"])){
			
			$idProduto = sqlvalue($_POST["idProduto"],false);

			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_CATEGORIA WHERE PROD_ID_PRODUTO = ".$idProduto."; ");
			
			$query = "";
			foreach($_POST["categoria"] as $value){

				$idCategoria = sqlvalue($value, false);
				
				$query .= "INSERT INTO e_PRODUTO_CATEGORIA (CATE_ID_CATEGORIA, PROD_ID_PRODUTO, DATA_INSERT, USUARIO_INSERT) 
						   VALUES (".$idCategoria.", ".$idProduto.", now(), '".USUARIO_LOGADO."'); ";
			}
			$resultQuery = $mysqli->ExecutarMultiSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "gravaCombinacaoProduto":

		if(isset($_POST["idProdutoCorrente"])){
			
			$idProduto = sqlvalue($_POST["idProdutoCorrente"],false);

			foreach($_POST["atributos"] as $value){

				$atributo = explode(".", $value);

				$chaveAtributo = $atributo[0];
				$valorAtributo = $atributo[1];

				$arrayAtributo[$chaveAtributo][] = $valorAtributo;
				
			}
			

			$combinar = array();
			foreach( $arrayAtributo as $k => $v ){
				$combinar[] = $v;
			}

			$texto = combinacao( '', $combinar, 0 );
			$texto = preg_split( '/\n/', $texto, -1, PREG_SPLIT_NO_EMPTY );

			$combinacoes = array();
			foreach( $texto as $k => $v ){
				$combinacoes[] = preg_split( '/##/', $v, -1, PREG_SPLIT_NO_EMPTY );
			}
			
			$i=0;
			$queryProdutoCombinacaoAtributo = "";
			foreach($combinacoes as $value){

				$i++;
				$codigoUnico = sqlvalue(RandomString($length = 10, $letters = date('U').$i), true);
				$queryProdutoCombinacao = "INSERT INTO e_PRODUTO_COMBINACAO (CODIGO_UNICO, PROD_ID_PRODUTO, DATA_INSERT, USUARIO_INSERT)
										  VALUES (".$codigoUnico.", ".$idProduto.", now(), '".USUARIO_LOGADO."');
										  ";
				$rowQueryProdutoCombinacao = $mysqli->ExecutarSQL($queryProdutoCombinacao);

				$queryIdProdutoCombinacao = "SELECT ID_PRODUTO_COMBINACAO FROM e_PRODUTO_COMBINACAO WHERE CODIGO_UNICO = ".$codigoUnico."";
				$resultIdProdutoCombinacao = $mysqli->ConsultarSQL($queryIdProdutoCombinacao);
				
				$idProdutoCombinacao = sqlvalue($resultIdProdutoCombinacao[0]["ID_PRODUTO_COMBINACAO"], false);

				
				foreach($value as $idAtributo){

					$idAtributo = sqlvalue($idAtributo, true);
					
					$queryProdutoCombinacaoAtributo .= "INSERT INTO e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
														           (PRCO_ID_PRODUTO_COMBINACAO
														           ,ATVA_ID_ATRIBUTO_VALOR
														           ,DATA_INSERT
														           ,USUARIO_INSERT)
														     VALUES
														           (".$idProdutoCombinacao."
														           ,".$idAtributo."
														           ,now()
														           ,'".USUARIO_LOGADO."');
														";
					
				}

			}
			
			$resultQuery = $mysqli->ExecutarMultiSQL($queryProdutoCombinacaoAtributo);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "atualiza": "S" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;

	case "removeCombinacao":

		$codigoUnico = sqlvalue($_POST['cod'], true);

		$query = "DELETE FROM e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR WHERE PRCO_ID_PRODUTO_COMBINACAO IN (".$codigoUnico.");
				  DELETE FROM e_PRODUTO_COMBINACAO WHERE ID_PRODUTO_COMBINACAO IN (".$codigoUnico.");";

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'", "atualiza": "S" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;

		break;

	case "editarCombinacao":

		$codigoUnico = sqlvalue($_POST['cod'], true);
		$referenciaCombinacao = sqlvalue($_POST['referenciaCombinacao'], true);
		$precoCombinacao = formataPrecoInsert($_POST['precoCombinacao']);
		$precoCombinacao = sqlvalue($precoCombinacao, false);
		$produtoPrincipal = sqlvalue($_POST['produtoPrincipal'], true);
		

		$query = "UPDATE e_PRODUTO_COMBINACAO SET REFERENCIA = ".$referenciaCombinacao.", 
		PRECO_VENDA = ".$precoCombinacao.", PRODUTO_PRINCIPAL = ".$produtoPrincipal.",
		USUARIO_UPDATE = '".USUARIO_LOGADO."',
		DATA_UPDATE = now() 
		WHERE ID_PRODUTO_COMBINACAO = ".$codigoUnico."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "atualiza": "S" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case "produtoCombinacaoPrincipal":

		$idProduto = sqlvalue($_POST['idProdutoCorrente'], false);
		$codigoUnico = sqlvalue($_POST['cod'], true);
		$produtoPrincipal = sqlvalue($_POST['produtoPrincipal'], true);

		$query = "UPDATE e_PRODUTO_COMBINACAO SET PRODUTO_PRINCIPAL = 'N' 
		WHERE PROD_ID_PRODUTO = ".$idProduto.";
		UPDATE e_PRODUTO_COMBINACAO SET PRODUTO_PRINCIPAL = ".$produtoPrincipal.",
		USUARIO_UPDATE = '".USUARIO_LOGADO."',
		DATA_UPDATE = now() 
		WHERE ID_PRODUTO_COMBINACAO = ".$codigoUnico.";";

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "atualiza": "S" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case "editarEstoqueProduto":


		if(isset($_POST["idProduto"])){
			
			$idProduto 			= sqlvalue($_POST["idProduto"],false);
			$operacaoDeposito 	= sqlvalue($_POST["operacaoDeposito"],false);
			$deposito 			= sqlvalue($_POST["deposito"],false);
			$quantidadeEstoque 	= $_POST["quantidadeEstoque"];

			$query = "";

			foreach ($quantidadeEstoque as $key => $value) {

				$idProdutoCombinacao = sqlvalue($key, false);
				$quantidade = sqlvalue($value, false);
				
				if($quantidade > 0){
					$query .= "INSERT INTO e_PRODUTO_COMBINACAO_ESTOQUE
							           (PRCO_ID_PRODUTO_COMBINACAO
							           ,QUANTIDADE
							           ,DATA_MOVIMENTO
							           ,OPDE_ID_OPERACAO_DEPOSITO
							           ,DEPO_ID_DEPOSITO
							           ,USUARIO_INSERT)
							     VALUES
							           (".$idProdutoCombinacao."
							           ,".$quantidade."
							           ,now()
							           ,".$operacaoDeposito."
							           ,".$deposito."
							           ,'".USUARIO_LOGADO."');
								";
				}

			}
			//printr($query);
			
			$resultQuery = $mysqli->ExecutarMultiSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "atualiza": "S" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;
		
	case "cadastrarProduto":
		
		//printr($_POST);

		//$idProduto 							= sqlvalue($_POST["idProduto"],false);
		$situacaoProduto 					= sqlvalue($_POST["situacaoProduto"],false);
		$nomeProduto 						= sqlvalue($_POST["nomeProduto"],true);
		$referenciaProduto 					= sqlvalue($_POST["referenciaProduto"],true);
		$ncmProduto 						= sqlvalue($_POST["ncmProduto"],true);
		$codeanProduto 						= sqlvalue($_POST["codeanProduto"],true);
		$pesoProduto						= sqlvalue(formataValorInsert($_POST["pesoProduto"]),false);
		$alturaProduto 						= sqlvalue(formataValorInsert($_POST["alturaProduto"]),false);
		$larguraProduto 					= sqlvalue(formataValorInsert($_POST["larguraProduto"]),false);
		$profundidadeProduto 				= sqlvalue(formataValorInsert($_POST["profundidadeProduto"]),false);
		$videoProduto						= sqlvalue(formataVideo($_POST['videoProduto']), true);
		$nivelAuxProduto					= $_POST['nivelAuxProduto'];
		
		if($_POST["fabricanteProduto"] > 0){
			$fabricanteProduto 					= sqlvalue($_POST["fabricanteProduto"],false);
		} else {
			$fabricanteProduto 					= sqlvalue(NULL,true);	
		}
		
		if(isset($_POST["dataInicialLancamentoProduto"])){
			$dataInicialLancamentoProduduto 	= sqlvalue(formataDataInsert($_POST["dataInicialLancamentoProduto"]),true);
		} else {
			$dataInicialLancamentoProduduto 	= sqlvalue(NULL,true);	
		}
		if(isset($_POST["dataFinalLancamentoProduto"])){
			$dataFinalLancamentoProduduto 		= sqlvalue(formataDataInsert($_POST["dataFinalLancamentoProduto"]),true);
		} else {
			$dataFinalLancamentoProduduto 	= sqlvalue(NULL,true);	
		}
		
		$descricaoCurtaProduto 				= sqlvalue($_POST["descricaoCurtaProduto"],true);
		$descricaoLongaProduto 				= sqlvalue($_POST["descricaoLongaProduto"],true);
		$metaTitleProduto					= sqlvalue(substr($_POST["nomeProduto"], 0, 70), true);
		$metaDescriptionProduto				= sqlvalue(substr($_POST["descricaoCurtaProduto"], 0, 160), true);

		$query = "INSERT INTO e_PRODUTO (PRSI_ID_PRODUTO_SITUACAO
							           ,NOME
							           ,DESCRICAO_VENDA
							           ,REFERENCIA
							           ,NCM
							           ,COD_EAN
							           ,PESO_KG
							           ,ALTURA_CM
							           ,LARGURA_CM
							           ,PROFUNDIDADE_CM
							           ,PESS_ID_PESSOA_FABRICANTE
							           ,DATA_INICIAL_LANCAMENTO
							           ,DATA_FINAL_LANCAMENTO
							           ,DESCRICAO_CURTA
							           ,DESCRICAO_LONGA
							           ,VIDEO
							           ,URL_AMIGAVEL
							           ,META_TITLE
							           ,META_DESCRIPTION
							           ,DATA_INSERT
							           ,USUARIO_INSERT)
						        VALUES (".$situacaoProduto."
							           ,".$nomeProduto."
							           ,".$nomeProduto."
							           ,".$referenciaProduto."
							           ,".$ncmProduto."
							           ,".$codeanProduto."
							           ,".$pesoProduto."
							           ,".$alturaProduto."
							           ,".$larguraProduto."
							           ,".$profundidadeProduto."
							           ,".$fabricanteProduto."
							           ,".$dataInicialLancamentoProduduto."
							           ,".$dataFinalLancamentoProduduto."
							           ,".$descricaoCurtaProduto."
							           ,".$descricaoLongaProduto."
							           ,".$videoProduto."
							           ,LOWER(concat(RTRIM(LTRIM(".$referenciaProduto.")),'-',fn_trata_caracter_especial(".$nomeProduto.")))
							           ,".$metaTitleProduto."
							           ,".$metaDescriptionProduto."
							           ,now()
							           ,'".USUARIO_LOGADO."'
							      		);";
				     
		$resultQuery = $mysqli->ExecutarSQL($query);

		$idProduto = $mysqli->InsertId();

		/**/
		if($_POST["precoVendaProduto"]){
			$precoVenda = sqlvalue(formataPrecoInsert($_POST["precoVendaProduto"]),false);
			$dataInicialValidade = sqlvalue(formataDataInsert($_POST["precoVendaProdutoDataInicialValidade"]).' '.date('H:i:s'),true);

			$queryPreco = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
									VALUES (".TABELA_PRECO_VENDA_PADRAO.", ".$idProduto.", ".$precoVenda.", ".$dataInicialValidade.", now(), '".USUARIO_LOGADO."')
									";

			$rowQueryPreco = $mysqli->ExecutarSQL($queryPreco);	
			
		}
		/**/

		/**/
		foreach ($nivelAuxProduto as $value) {
			$idNivelAux = sqlvalue($value, false);
			$queryNivelAux .= "INSERT INTO e_PRODUTO_NIVEL_AUXILIAR_VALOR (PROD_ID_PRODUTO, NAVA_ID_NIVEL_AUX_VALOR, DATA_INSERT, USUARIO_INSERT)
								VALUES (".$idProduto.", ".$idNivelAux.", now(), '".USUARIO_LOGADO."');
								";
		}
		$mysqli->ExecutarMultiSQL($queryNivelAux);
		/**/

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "redirect": "produto-cadastra?idProduto='.$idProduto.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;
		
	case "editaProdutoTipoFrete":
		//printr($_POST);
    	if(isset($_POST["idProduto"])){
			
			$idProduto = sqlvalue($_POST["idProduto"],false);
			$query = "";
			
			$mysqli->ExecutarSQL("DELETE FROM e_PRODUTO_TIPO_FRETE WHERE PROD_ID_PRODUTO = ".$idProduto."");
			
			foreach ($_POST["tipoFrete"] as $value){
			
				$query .= "INSERT INTO e_PRODUTO_TIPO_FRETE
						           (PROD_ID_PRODUTO
						           ,TIFR_ID_TIPO_FRETE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (".$idProduto."
						           ,".$value."
						           ,now()
						           ,'".USUARIO_LOGADO."');";
			}
			//printr($query);
			$resultQuery = $mysqli->ExecutarSQL($query);

			if($resultQuery){
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;
		
		break;

	case 'geraProdutoSite':

		//$query = "exec proc_atualiza_produto_site ".ID_LOJA."";

		//$resultQuery = $mysqli->ExecutarSQL($query);

		//if($resultQuery){
			fnGeraProdutoSite(ID_LOJA, $mysqli);
			$retorno = '{ "cod": "sucesso", "mensagem": "Loja atualizada com Sucesso!" }';
		// } else {
		// 	$retorno = '{ "cod": "erro", "mensagem": "N&atilde;o foi poss&iacute;vel atualizar a loja" }';	
		// }

		echo $retorno;

		break;

	case 'excluirArquivoDownload':

		$idProduto = sqlvalue($_POST["idProduto"],false);

		$query = "UPDATE e_PRODUTO SET ARQUIVO_DOWNLOAD = NULL WHERE ID_PRODUTO = ".$idProduto."";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;

		break;

	case 'uploadArquivo':

		$arquivoDownload = $_FILES['arquivoDownload'];
		$idProduto = sqlvalue($_POST["idProdutoCorrente"],false);
		$chave = $_POST["idProdutoCorrente"];

		preg_match("/\.(pdf|doc|docx){1}$/i", $arquivoDownload["name"], $ext);

		$extensoes = array('doc', 'docx', 'pdf');

		if (array_search($ext[1], $extensoes) === false) {
			$error[1] = "Arquivo em formato inv&aacute;lido! O documento deve ser pdf ou doc. Envie outro arquivo";
		}

		if (count($error) == 0) {
			$nomeArquivo = str_replace($ext[0], '', $arquivoDownload["name"]);
			$nomeArquivo = $chave.'-'.trataUrlAmigavel($nomeArquivo) . '.' . $ext[1];
			$caminhoArquivo = "../../manuais/" . $nomeArquivo;
			$upload_sucesso = @move_uploaded_file($arquivoDownload["tmp_name"], $caminhoArquivo);
		}

		if (count($error) != 0) {
			foreach ($error as $erro) {
				$msn = $erro . "";
			}
			$retorno = '{ "cod": "erro", "mensagem": "'.$msn.'" }';
		} else {
			if($upload_sucesso){
				$nomeArquivo = sqlvalue($nomeArquivo, true);
				$query = "UPDATE e_PRODUTO SET ARQUIVO_DOWNLOAD = ".$nomeArquivo." WHERE ID_PRODUTO = ".$idProduto."";
				$resultQuery = $mysqli->ExecutarSQL($query);
				$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "atualiza": "S" }';	
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';
			}
		}

		echo $retorno;

		break;

	case 'ordenaImagem':

		$idProdutoCombinacao = sqlvalue($_POST['idProdutoCombinacao'], false);
		$ordemImagem = $_POST['ordemImagem'];

		foreach ($ordemImagem as $value) {
			$arrayValue = explode('|', $value);
			$query .= "UPDATE e_PRODUTO_COMBINACAO_IMAGEM SET ORDEM = ".$arrayValue[1]." WHERE IMAGEM = '".$arrayValue[0]."' AND PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao."; ";
		}
		
		$query .= "UPDATE e_PRODUTO_COMBINACAO_IMAGEM SET PRINCIPAL = 'N' WHERE PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao.";
				   UPDATE e_PRODUTO_COMBINACAO_IMAGEM SET PRINCIPAL = 'S' WHERE PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao." AND ORDEM = 0; "; 

		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "atualiza": "S" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	
	
	default:
		printr($_POST);
		break;
}

function formataVideo($url){
		
		if ($url=='')
			return false;
		
		$aUrl = parse_url($url);
            $aUrl['query_params'] = array();
            $aPairs = explode('&', $aUrl['query']);
            foreach($aPairs as $sPair) {
                if (trim($sPair) == '') { continue; }
                list($sKey, $sValue) = explode('=', $sPair);
                $aUrl['query_params'][$sKey] = urldecode($sValue);
            }
			$qUrl=$aUrl['query_params'];
			
			$v=$qUrl['v'];
			
			if ($v=="")
				return false;		
            return $v;	
}


?>