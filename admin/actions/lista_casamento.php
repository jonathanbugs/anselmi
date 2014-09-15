<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case 'cadastrarDadosListaCasamento':

	    $listaCasamentoAtivo		= sqlvalue($_POST["listaCasamentoAtivo"],true);
	    $nomeConjuge1 				= sqlvalue($_POST["nomeConjuge1"],true);
	    $emailConjuge1 				= sqlvalue($_POST["emailConjuge1"],true);
	    $maeConjuge1 				= sqlvalue($_POST["maeConjuge1"],true);
	    $paiConjuge1 				= sqlvalue($_POST["paiConjuge1"],true);
	    $nomeConjuge2 				= sqlvalue($_POST["nomeConjuge2"],true);
	    $emailConjuge2 				= sqlvalue($_POST["emailConjuge2"],true);
	    $maeConjuge2 				= sqlvalue($_POST["maeConjuge2"],true);
	    $paiConjuge2 				= sqlvalue($_POST["paiConjuge2"],true);
	    $despachado 				= sqlvalue($_POST["despachado"], true);
	    
	    $dataEvento 			= sqlvalue(formataDataInsert($_POST["dataEvento"]),true);
	    $localCerimonia 		= sqlvalue($_POST["localCerimonia"],true);
	    $enderecoCerimonia 		= sqlvalue($_POST["enderecoCerimonia"],true);
	    $horaCerimonia 			= sqlvalue($_POST["horaCerimonia"],true);
	    $localFesta 			= sqlvalue($_POST["localFesta"],true);
	    $enderecoFesta 			= sqlvalue($_POST["enderecoFesta"],true);
	    $horaFesta 				= sqlvalue($_POST["horaFesta"],true);
	    $urlAmigavel 			= sqlvalue($_POST["urlAmigavel"],true);
	    $fotoCapa 				= sqlvalue($_POST["fotoCapa"],true);


		$query = "	DECLARE @ID_LISTA_CASAMENTO INT,
							@ID_PESSOA INT;

					SELECT @ID_PESSOA = ID_PESSOA FROM e_PESSOA WHERE EMAIL = ".$emailConjuge1.";

					IF (IFNULL(@ID_PESSOA, 0) > 0)
					BEGIN
						INSERT INTO e_LISTA_CASAMENTO
					           (ATIVO
					           ,URL
					           ,CONJUGE1
					           ,EMAIL_CONJUGE1
					           ,NOME_PAI_CONJUGE1
					           ,NOME_MAE_CONJUGE1
					           ,CONJUGE2
					           ,EMAIL_CONJUGE2
					           ,NOME_PAI_CONJUGE2
					           ,NOME_MAE_CONJUGE2
					           ,DESPACHADO
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$listaCasamentoAtivo."
					           ,".$urlAmigavel."
					           ,".$nomeConjuge1."
					           ,".$emailConjuge1."
					           ,".$paiConjuge1."
					           ,".$maeConjuge1."
					           ,".$nomeConjuge2."
					           ,".$emailConjuge2."
					           ,".$paiConjuge2."
					           ,".$maeConjuge2."
					           ,".$despachado."
					           ,now()
					           ,'".USUARIO_LOGADO."');

					SELECT @ID_LISTA_CASAMENTO = IDENT_CURRENT('e_LISTA_CASAMENTO');

					INSERT INTO e_LISTA_CASAMENTO_ENDERECO
						           (LICA_ID_LISTA_CASAMENTO
						           ,NOME_CONTATO
						           ,ENDERECO
						           ,NUMERO
						           ,COMPLEMENTO
						           ,BAIRRO
						           ,MUNICIPIO
						           ,ESTADO
						           ,CEP_ID_CEP
						           ,REFERENCIA
						           ,TELEFONE_PRINCIPAL
						           ,CELULAR
						           ,TIPO_ENDERECO
						           ,DATA_EVENTO
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     
						SELECT
								TOP 1
								@ID_LISTA_CASAMENTO,
								PESS.NOME 
								,PEEN.ENDERECO
								,PEEN.NUMERO
								,PEEN.COMPLEMENTO
								,PEEN.BAIRRO
								,MUNI.NOME_MUNICIPIO
								,MUNI.UNFE_ID_ESTADO
								,PEEN.CEP_ID_CEP
								,PEEN.REFERENCIA
								,PECO.DESCRICAO
								,PECO2.DESCRICAO,
								'ENTREGA',
					           	".$dataEvento.",
					           	now(),
					           	'".USUARIO_LOGADO."'
							FROM
								e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
													 ON PESS.ID_PESSOA = PECO.PESS_ID_PESSOA
													AND PECO.TICO_ID_TIPO_CONTATO = 1
											  LEFT JOIN e_PESSOA_CONTATO PECO2
													 ON PESS.ID_PESSOA = PECO2.PESS_ID_PESSOA
													AND PECO2.TICO_ID_TIPO_CONTATO = 2,
								e_PESSOA_ENDERECO PEEN,
								e_MUNICIPIO MUNI
							WHERE
								PESS.ID_PESSOA = PEEN.PESS_ID_PESSOA
							AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
							AND PESS.ID_PESSOA = @ID_PESSOA;

						SELECT @ID_LISTA_CASAMENTO ID_LISTA_CASAMENTO, 'SUCESSO' RETORNO
					END
					ELSE
					BEGIN
						SELECT 'ERRO_PESSOA' RETORNO
					END
					";

		$resultQuery = $mysqli->ExecutarSQL($query);
		
		$rowQuery = @mssql_fetch_array($resultQuery);

		if ($rowQuery["RETORNO"] == 'SUCESSO') {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "id": "'.$rowQuery["ID_LISTA_CASAMENTO"].'", "redirect": "S" }';	
		} elseif ($rowQuery["RETORNO"] == 'ERRO_PESSOA') {
			$retorno = '{ "cod": "erro", "mensagem": "'.EMAIL_CONJUGE1_CADASTRO_PESSOA.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;
		
		break;


// 	case "cadastrarEnderecoListaCasamento":

// 		if(isset($_POST["idListaCasamento"])){

// 			$idListaCasamento						= sqlvalue($_POST["idListaCasamento"],false);
// 			$nomeContatoListaCasamento 				= sqlvalue(str_replace("-", "", $_POST["nomeContatoListaCasamento"]),true);
// 		    $cepEnderecoListaCasamento 				= sqlvalue(str_replace("-", "", $_POST["cepEnderecoListaCasamento"]),true);
// 			$ruaEnderecoListaCasamento 				= sqlvalue($_POST["ruaEnderecoListaCasamento"],true);
// 			$numeroEnderecoListaCasamento 			= sqlvalue($_POST["numeroEnderecoListaCasamento"],true);
// 			$complementoEnderecoListaCasamento 		= sqlvalue($_POST["complementoEnderecoListaCasamento"],true);
// 			$bairroEnderecoListaCasamento 			= sqlvalue($_POST["bairroEnderecoListaCasamento"],true);
// 			$municipioEnderecoListaCasamento 		= sqlvalue($_POST["municipioEnderecoListaCasamento"],true);
// 			$idMunicipioEnderecoListaCasamento 		= sqlvalue($_POST["idMunicipioEnderecoListaCasamento"],false);
// 			$estadoEnderecoListaCasamento 			= sqlvalue($_POST["estadoEnderecoListaCasamento"],true);
// 			$paisEnderecoListaCasamento 			= sqlvalue($_POST["paisEnderecoListaCasamento"],true);
// 			$referenciaEnderecoListaCasamento 		= sqlvalue($_POST["referenciaEnderecoListaCasamento"],true);
// 			$telefoneFixoContatoListaCasamento 		= sqlvalue(trataInsertTelefone($_POST["telefoneFixoContatoListaCasamento"]),true);
// 			$telefoneCelularContatoListaCasamento 	= sqlvalue(trataInsertTelefone($_POST["telefoneCelularContatoListaCasamento"]),true);

// 			if(!$_POST['tipoEnderecoListaCasamento']){
// 				$tipoEnderecoListaCasamento = sqlvalue('ENTREGA', true);
// 			}
		    
// 			$query = "INSERT INTO e_LISTA_CASAMENTO_ENDERECO
// 					           (LICA_ID_LISTA_CASAMENTO
// 					           ,NOME_CONTATO
// 					           ,ENDERECO
// 					           ,NUMERO
// 					           ,COMPLEMENTO
// 					           ,BAIRRO
// 					           ,MUNICIPIO
// 					           ,ESTADO
// 					           ,CEP_ID_CEP
// 					           ,REFERENCIA
// 					           ,TELEFONE_PRINCIPAL
// 					           ,CELULAR
// 					           ,TIPO_ENDERECO
// 					           ,DATA_INSERT
// 					           ,USUARIO_INSERT)
// 					     VALUES
// 					           (".$idListaCasamento.",
// 					           	".$nomeContatoListaCasamento.",
// 					           	".$ruaEnderecoListaCasamento.",
// 					           	".$numeroEnderecoListaCasamento.",
// 					           	".$complementoEnderecoListaCasamento.",
// 					           	".$bairroEnderecoListaCasamento.",
// 					           	".$municipioEnderecoListaCasamento.",
// 					           	".$estadoEnderecoListaCasamento.",
// 					           	".$cepEnderecoListaCasamento.",
// 					           	".$referenciaEnderecoListaCasamento.",
// 					           	".$telefoneFixoContatoListaCasamento.",
// 					           	".$telefoneCelularContatoListaCasamento.",
// 					           	".$tipoEnderecoListaCasamento.",
// 					           	now(),
// 					           	'".USUARIO_LOGADO."'
// 					           	)";

// printr($query);
			
// 			$resultQuery = $mysqli->ExecutarSQL($query);

// 			if ($resultQuery) {
// 				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "id": "'.$idListaCasamento.'", "location": "produtoListaCasamento" }';	
// 			} else {
// 				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
// 			}

// 		} else {
// 			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
// 		}

// 		echo $retorno;

// 		break;

// 	case 'cadastrarProdutoListaCasamento':

// 	    if(isset($_POST["idListaCasamento"])){
			
// 			$idListaCasamento = sqlvalue($_POST["idListaCasamento"],false);

// 		    $query = "";

// 		    foreach ($_POST["idProdutoListaCasamento"] as $value) {

// 		    	$idProdutoListaCasamento = sqlvalue($value,false);
		    	
// 		    	$query .= "INSERT INTO e_LISTA_CASAMENTO_PRODUTO
// 						           (LICA_ID_LISTA_CASAMENTO
// 						           ,ATIVO
// 						           ,PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
// 						           ,VENDIDO
// 						           ,DATA_INSERT
// 						           ,USUARIO_INSERT
// 						           )
// 						     VALUES
// 						           (".$idListaCasamento.",
// 						           'S',
// 						           ".$idProdutoListaCasamento.",
// 						           'N',
// 						           now(),
// 						           '".USUARIO_LOGADO."'); ";
// 		    }

// //printr($query);
			
// 			$resultQuery = $mysqli->ExecutarSQL($query);

// 			if ($resultQuery) {
// 				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "location": "topo" }';	
// 			} else {
// 				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
// 			}

// 		} else {
// 			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
// 		}

// 		echo $retorno;
		
// 		break;

	case 'editarDadosListaCasamento':

	    $idListaCasamento = sqlvalue($_POST['idListaCasamento'], false);
	    if($_POST['listaCasamentoAtivo'] == 'S'){
	    	$listaCasamentoAtivo = sqlvalue($_POST['listaCasamentoAtivo'], true);
	    } else {
			$listaCasamentoAtivo = sqlvalue('N', true);	    	
	    }
	    if($_POST['listaCasamentoDespachado'] == 'S'){
	    	$listaCasamentoDespachado = sqlvalue('now()', false);
	    } else {
	    	$listaCasamentoDespachado = sqlvalue('NULL', false);
	    }
	    $nomeConjuge1 = sqlvalue($_POST['nomeConjuge1'], true);
	    $emailConjuge1 = sqlvalue($_POST['emailConjuge1'], true);
	    $maeConjuge1 = sqlvalue($_POST['maeConjuge1'], true);
	    $paiConjuge1 = sqlvalue($_POST['paiConjuge1'], true);
	    $nomeConjuge2 = sqlvalue($_POST['nomeConjuge2'], true);
	    $emailConjuge2 = sqlvalue($_POST['emailConjuge2'], true);
	    $maeConjuge2 = sqlvalue($_POST['maeConjuge2'], true);
	    $paiConjuge2 = sqlvalue($_POST['paiConjuge2'], true);
	    $dataEvento = sqlvalue(formataDataInsert($_POST['dataEvento']), true);
	    $urlAmigavel = sqlvalue($_POST['urlAmigavel'], true);

	    $query = "UPDATE e_LISTA_CASAMENTO
				           SET ATIVO = ".$listaCasamentoAtivo."
				           ,URL = ".$urlAmigavel."
				           ,CONJUGE1 = ".$nomeConjuge1."
				           ,EMAIL_CONJUGE1 = ".$emailConjuge1."
				           ,NOME_PAI_CONJUGE1 = ".$paiConjuge1."
				           ,NOME_MAE_CONJUGE1 = ".$maeConjuge1."
				           ,CONJUGE2 = ".$nomeConjuge2."
				           ,EMAIL_CONJUGE2 = ".$emailConjuge2."
				           ,NOME_PAI_CONJUGE2 = ".$paiConjuge2."
				           ,NOME_MAE_CONJUGE2 = ".$maeConjuge2."
				           ,DESPACHADO = ".$listaCasamentoDespachado."
				           ,DATA_UPDATE = now()
				           ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				      WHERE ID_LISTA_CASAMENTO = ".$idListaCasamento.";
				      UPDATE e_LISTA_CASAMENTO_ENDERECO SET DATA_EVENTO = ".$dataEvento."
				      WHERE LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." AND TIPO_ENDERECO = 'ENTREGA';
				     ";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;
		
		break;


	case "editarEnderecoListaCasamento":

		if(isset($_POST["idListaCasamento"])){
			
			$idListaCasamento						= sqlvalue($_POST["idListaCasamento"],false);
			$tipoEnderecoListaCasamento				= sqlvalue($_POST["tipoEnderecoListaCasamento"],true);
			$nomeContatoListaCasamento 				= sqlvalue(str_replace("-", "", $_POST["nomeContatoListaCasamento"]),true);
		    $cepEnderecoListaCasamento 				= sqlvalue(str_replace("-", "", $_POST["cepEnderecoListaCasamento"]),true);
			$ruaEnderecoListaCasamento 				= sqlvalue($_POST["ruaEnderecoListaCasamento"],true);
			$numeroEnderecoListaCasamento 			= sqlvalue($_POST["numeroEnderecoListaCasamento"],true);
			$complementoEnderecoListaCasamento 		= sqlvalue($_POST["complementoEnderecoListaCasamento"],true);
			$bairroEnderecoListaCasamento 			= sqlvalue($_POST["bairroEnderecoListaCasamento"],true);
			$municipioEnderecoListaCasamento 		= sqlvalue($_POST["municipioEnderecoListaCasamento"],true);
			$idMunicipioEnderecoListaCasamento 		= sqlvalue($_POST["idMunicipioEnderecoListaCasamento"],false);
			$estadoEnderecoListaCasamento 			= sqlvalue($_POST["estadoEnderecoListaCasamento"],true);
			$paisEnderecoListaCasamento 			= sqlvalue($_POST["paisEnderecoListaCasamento"],true);
			$referenciaEnderecoListaCasamento 		= sqlvalue($_POST["referenciaEnderecoListaCasamento"],true);
			$telefoneFixoContatoListaCasamento 		= sqlvalue(trataInsertTelefone($_POST["telefoneFixoContatoListaCasamento"]),true);
			$telefoneCelularContatoListaCasamento 	= sqlvalue(trataInsertTelefone($_POST["telefoneCelularContatoListaCasamento"]),true);
		    
			$query = "UPDATE e_LISTA_CASAMENTO_ENDERECO
					        SET 
					           NOME_CONTATO = ".$nomeContatoListaCasamento."
					           ,ENDERECO = ".$ruaEnderecoListaCasamento."
					           ,NUMERO = ".$numeroEnderecoListaCasamento."
					           ,COMPLEMENTO = ".$complementoEnderecoListaCasamento."
					           ,BAIRRO = ".$bairroEnderecoListaCasamento."
					           ,MUNICIPIO = ".$municipioEnderecoListaCasamento."
					           ,CEP_ID_CEP = ".$cepEnderecoListaCasamento."
					           ,REFERENCIA = ".$referenciaEnderecoListaCasamento."
					           ,TELEFONE_PRINCIPAL = ".$telefoneFixoContatoListaCasamento."
					           ,CELULAR = ".$telefoneCelularContatoListaCasamento."
					           ,DATA_UPDATE = now()
					           ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
					     WHERE LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."
					     AND TIPO_ENDERECO = ".$tipoEnderecoListaCasamento."";

//printr($query);
			
			$resultQuery = $mysqli->ExecutarSQL($query);

			if ($resultQuery) {
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;

		break;


	case 'editarProdutoListaCasamento':

	    if(isset($_POST["idListaCasamento"])){
			
			$idListaCasamento = sqlvalue($_POST["idListaCasamento"],false);
			$stringIdsProdutoListaCasamento = str_replace('idProdutoListaCasamento=', '', $_POST['idsProdutos']);
			$stringIdsProdutoListaCasamento = str_replace('&amp;', ',', $stringIdsProdutoListaCasamento);
			$arrayIdsProdutoListaCasamento = explode(',', $stringIdsProdutoListaCasamento);

		    $query = "";

		    foreach ($arrayIdsProdutoListaCasamento as $value) {

		    	$idProdutoListaCasamento = sqlvalue($value, false);

		    	$query .= " IF NOT EXISTS (SELECT 1 FROM e_LISTA_CASAMENTO_PRODUTO WHERE LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."
						      				AND PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$idProdutoListaCasamento.")
							BEGIN
		    				INSERT INTO e_LISTA_CASAMENTO_PRODUTO
						           (LICA_ID_LISTA_CASAMENTO
						           ,ATIVO
						           ,PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
						           ,QTD_SOLICITADA
						           ,DATA_INSERT
						           ,USUARIO_INSERT
						           )
						     VALUES
						           (".$idListaCasamento.",
						           'S',
						           ".$idProdutoListaCasamento.",
						           1,
						           now(),
						           '".USUARIO_LOGADO."');
							END
							";

			}
		    

		    $query .= "UPDATE e_LISTA_CASAMENTO_PRODUTO
						 SET ATIVO = 'N'
					   WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR NOT IN (".$stringIdsProdutoListaCasamento.")
					     AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento.";
		    		  UPDATE e_LISTA_CASAMENTO_PRODUTO
						 SET ATIVO = 'S'
					   WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR IN (".$stringIdsProdutoListaCasamento.")
					     AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento.";";

			$resultQuery = $mysqli->ExecutarSQL($query);

			if ($resultQuery) {
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'" }';	
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;
		
		break;

		
	default:
		echo '{ "cod": "erro", "mensagem": "" }';
		break;
}
?>