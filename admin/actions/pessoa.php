<?php
require('../configs/config.php');

if(isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case 'cadastrarPessoa':

		$tipoPessoa 					= sqlvalue($_POST["tipoPessoa"],true);
		
		if($tipoPessoa == "'F'") { $nomePessoa = sqlvalue($_POST["nomePessoa"],true); } else { $nomePessoa = sqlvalue($_POST["razaoSocialPessoa"],true); } 

		$sobrenomePessoa 				= sqlvalue($_POST["sobrenomePessoa"],true);
		$nomeContatoPessoa 				= sqlvalue($_POST["nomeContatoPessoa"],true);
		$nomeFantasiaPessoa 			= sqlvalue($_POST["nomeFantasiaPessoa"],true);
		$apelidoPessoa 					= sqlvalue($_POST["apelidoPessoa"],true);
		$cpfPessoa						= sqlvalue(trataCpf($_POST["cpfPessoa"]),true);
		$cnpjPessoa						= sqlvalue(trataCnpj($_POST["cnpjPessoa"]),true);

		$pessoaSituacao					= sqlvalue($_POST["pessoaSituacao"],false);
		$pessoaCategoria				= sqlvalue($_POST["pessoaCategoria"],false);
		$pessoaConceito					= sqlvalue($_POST["pessoaConceito"],false);

		if($tipoPessoa == "'F'") { $docPessoa = $cpfPessoa; } else { $docPessoa = $cnpjPessoa; }

		$iePessoa						= sqlvalue($_POST["iePessoa"],true);
		$rgPessoa 						= sqlvalue($_POST["rgPessoa"],true);
		$sexoPessoa						= sqlvalue($_POST["sexoPessoa"],true);

		if($tipoPessoa == "'F'") { $nascimentoPessoa = sqlvalue(formataDataInsert($_POST["nascimentoPessoa"]),true); } else { $nascimentoPessoa = sqlvalue(formataDataInsert(date("d/m/Y")),true); }
		
		$emailPessoa 					= sqlvalue($_POST["emailPessoa"],true);
		$confirmaEmailPessoa 			= sqlvalue($_POST["confirmaEmailPessoa"],true);

		if(isset($_POST["newsletter"])){ $newsletter = sqlvalue("S",true); } else { $newsletter = sqlvalue("N",true); }

		
		if(sqlvalue($_POST["senhaPessoa"],true) == "NULL") { $senhaPessoa = sqlvalue($_POST["senhaPessoa"],true); } else { $senhaPessoa = sqlvalue(md5($_POST["senhaPessoa"]),true); }
		
		$cepEnderecoPessoa 				= sqlvalue($_POST["cepEnderecoPessoa"],true);
		$ruaEnderecoPessoa 				= sqlvalue($_POST["ruaEnderecoPessoa"],true);
		$numeroEnderecoPessoa 			= sqlvalue($_POST["numeroEnderecoPessoa"],true);
		$complementoEnderecoPessoa 		= sqlvalue($_POST["complementoEnderecoPessoa"],true);
		$bairroEnderecoPessoa 			= sqlvalue($_POST["bairroEnderecoPessoa"],true);
		$municipioEnderecoPessoa 		= sqlvalue($_POST["municipioEnderecoPessoa"],true);
		$idMunicipioEnderecoPessoa 		= sqlvalue($_POST["idMunicipioEnderecoPessoa"],false);
		$estadoEnderecoPessoa 			= sqlvalue($_POST["estadoEnderecoPessoa"],true);
		$paisEnderecoPessoa 			= sqlvalue($_POST["paisEnderecoPessoa"],true);
		$referenciaEnderecoPessoa 		= sqlvalue($_POST["referenciaEnderecoPessoa"],true);
		$apelidoEnderecoPessoa 			= sqlvalue($_POST["apelidoEnderecoPessoa"],true);
		$telefoneFixoContatoPessoa 		= $arrayContatos[] = sqlvalue(trataInsertTelefone($_POST["telefoneFixoContatoPessoa"]),true);
		$telefoneCelularContatoPessoa 	= $arrayContatos[] = sqlvalue(trataInsertTelefone($_POST["telefoneCelularContatoPessoa"]),true);

		if(ID_LOJA <> 1){
			$whereIdLoja = "AND PESS.LOJA_ID_LOJA = ".ID_LOJA."";
		} else {
			$whereIdLoja = "";
		}
		
		$queryValidaPessoa = "SELECT
									CASE ".$tipoPessoa." WHEN 'F' THEN PESS.CPF ELSE PESS.CNPJ END DOC,
									PESS.EMAIL
								FROM
									e_PESSOA PESS
								WHERE
									(PESS.EMAIL = ".$emailPessoa." OR
									 CASE ".$tipoPessoa." WHEN 'F' THEN PESS.CPF ELSE PESS.CNPJ END = ".$docPessoa.")
								".$whereIdLoja.";";

		$resultValidaPessoa = $mysqli->ConsultarSQL($queryValidaPessoa);

		if(sqlvalue($resultValidaPessoa[0]['DOC'], true) == $docPessoa){
			echo $retorno = '{ "cod": "existe", "mensagem": "'.CPF_JA_CADASTRADO.'" }';
			exit;	
		} elseif(sqlvalue($resultValidaPessoa[0]['EMAIL'], true) == $emailPessoa){
			echo $retorno = '{ "cod": "existe", "mensagem": "'.EMAIL_JA_CADASTRADO.'" }';
			exit;	
		} else {
		
			$query_pessoa = "
							INSERT INTO e_PESSOA
										(LOJA_ID_LOJA
										,NOME
										,SOBRENOME
										,APELIDO
										,NOME_FANTASIA
										,CPF
										,CNPJ
										,RG
										,EMAIL
										,SENHA
										,DATA_NASCIMENTO
										,SEXO
										,TIPO
										,IE
										,IP
										,NOME_CONTATO
										,PECO_ID_PESSOA_CONCEITO
										,PESI_ID_PESSOA_SITUACAO
										,PETC_ID_PESSOA_TIPO_CATEGORIA
										,NEWSLETTER
										,DATA_INSERT
										,USUARIO_INSERT)
									VALUES
										(".ID_LOJA."
										,".$nomePessoa."
										,".$sobrenomePessoa."
										,".$apelidoPessoa."
										,".$nomeFantasiaPessoa."
										,".$cpfPessoa."
										,".$cnpjPessoa."
										,".$rgPessoa."
										,".$emailPessoa."
										,".$senhaPessoa."
										,".$nascimentoPessoa."
										,".$sexoPessoa."
										,".$tipoPessoa."
										,".$iePessoa."
										,'".IP_USUARIO."'
										,".$nomeContatoPessoa."
										,".$pessoaConceito."
										,".$pessoaSituacao."
										,".$pessoaCategoria."
										,".$newsletter."
										,now()
										,'".USUARIO_LOGADO."');";

			$resultQuery = $mysqli->ExecutarSQL($query_pessoa);

			$queryPessoa = "SELECT ID_PESSOA FROM e_PESSOA WHERE EMAIL = ".$emailPessoa." AND ifnull(CNPJ, CPF) = ".$docPessoa."";
			$resultPessoa = $mysqli->ConsultarSQL($queryPessoa);

			$idPessoa = $resultPessoa[0]['ID_PESSOA'];

			if($idPessoa > 0){
				$retorno = "cadastroPessoaOk";
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_GRAVAR_PESSOA.'" }';	
			}
			
			if($retorno == "cadastroPessoaOk"){

				$query = "INSERT INTO e_PESSOA_ENDERECO
						           (PESS_ID_PESSOA
						           ,ENDERECO
						           ,NUMERO
						           ,COMPLEMENTO
						           ,BAIRRO
						           ,MUNICIPIO
						           ,CEP
						           ,UF
						           ,PAIS
						           ,REFERENCIA
						           ,APELIDO_ENDERECO
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
						     VALUES
						           (".$idPessoa."
						           ,".$ruaEnderecoPessoa."
						           ,".$numeroEnderecoPessoa."
						           ,".$complementoEnderecoPessoa."
						           ,".$bairroEnderecoPessoa."
						           ,".$municipioEnderecoPessoa."
						           ,".$cepEnderecoPessoa."
						           ,".$estadoEnderecoPessoa."
						           ,".$paisEnderecoPessoa."
						           ,".$referenciaEnderecoPessoa."
						           ,".$apelidoEnderecoPessoa."
						           ,now()
						           ,'".USUARIO_LOGADO."')";
				
				$resultQuery = $mysqli->ExecutarSQL($query);

				if($resultQuery){

					$query_contato = "";	
					$key=0;
					
					foreach($arrayContatos as $values){
						$key++;
						if($values != 'NULL'){
							$query_contato .= "INSERT INTO e_PESSOA_CONTATO
											           (TICO_ID_TIPO_CONTATO
											           ,PESS_ID_PESSOA
											           ,DESCRICAO
											           ,OPERADORA
											           ,DATA_INSERT
											           ,USUARIO_INSERT)
											     VALUES
											           (".$key."
											           ,".$idPessoa."
											           ,".$values."
											           ,NULL
											           ,now()
											           ,'".USUARIO_LOGADO."');
												";

						}
									
					}

					$resultQuery = $mysqli->ExecutarMultiSQL($query_contato);

					if($resultQuery){
						$retorno = '{ "cod": "'.$idPessoa.'", "mensagem": "'.CADASTRO_REALIZADO.'", "redirect": "pessoa-lista" }';	
					} else {
						$resultQuery = $mysqli->ExecutarMultiSQL("DELETE FROM e_PESSOA_ENDERECO WHERE PESS_ID_PESSOA = ".$idPessoa."; 
												   				  DELETE FROM e_PESSOA WHERE ID_PESSOA = ".$idPessoa."; ");
						$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_GRAVAR_PESSOA_CONTATO.'" }';	
					} 

				} else {
					$mysqli->ExecutarSQL("DELETE FROM e_PESSOA WHERE ID_PESSOA = ".$idPessoa.";");
					$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_GRAVAR_PESSOA_ENDERECO.'" }';
				}

			}

		} 
			
		echo $retorno;
		
		break;

	case "editarPessoa":

		$idPessoa 						= sqlvalue($_POST["idPessoa"],false);
		$tipoPessoa 					= sqlvalue($_POST["tipoPessoa"],true);

		if($_POST['senhaPessoa']){
			$senhaPessoa = sqlvalue(md5($_POST['senhaPessoa']), true);
			$setSenha = " ,SENHA = ".$senhaPessoa." ";
		} else {
			$setSenha = "";
		}
		
		if($tipoPessoa == "'F'") { $nomePessoa = sqlvalue($_POST["nomePessoa"],true); } else { $nomePessoa = sqlvalue($_POST["razaoSocialPessoa"],true); } 

		$sobrenomePessoa 				= sqlvalue($_POST["sobrenomePessoa"],true);
		$nomeContatoPessoa 				= sqlvalue($_POST["nomeContatoPessoa"],true);
		$nomeFantasiaPessoa 			= sqlvalue($_POST["nomeFantasiaPessoa"],true);
		$apelidoPessoa 					= sqlvalue($_POST["apelidoPessoa"],true);
		$cpfPessoa						= sqlvalue(trataCpf($_POST["cpfPessoa"]),true);
		$cnpjPessoa						= sqlvalue(trataCnpj($_POST["cnpjPessoa"]),true);
		
		$idCategoriaPessoa				= sqlvalue($_POST["categoriaPessoa"],true);

		if($tipoPessoa == "'F'") { $docPessoa = $cpfPessoa; } else { $docPessoa = $cnpjPessoa; }

		$iePessoa						= sqlvalue($_POST["iePessoa"],true);
		$rgPessoa 						= sqlvalue($_POST["rgPessoa"],true);
		$sexoPessoa						= sqlvalue($_POST["sexoPessoa"],true);

		if($tipoPessoa == "'F'") { $nascimentoPessoa = sqlvalue(formataDataInsert($_POST["nascimentoPessoa"]),true); } else { $nascimentoPessoa = sqlvalue(formataDataInsert(date("d/m/Y")),true); }
		
		$emailPessoa 					= sqlvalue($_POST["emailPessoa"],true);
		
		$telefoneFixoContatoPessoa 		= $arrayContatos[] = sqlvalue(trataInsertTelefone($_POST["telefoneFixoContatoPessoa"]),true);
		$telefoneCelularContatoPessoa 	= $arrayContatos[] = sqlvalue(trataInsertTelefone($_POST["telefoneCelularContatoPessoa"]),true);

		$query = "UPDATE e_PESSOA
				   SET NOME = ".$nomePessoa."
				      ,SOBRENOME = ".$sobrenomePessoa."
				      ,APELIDO = ".$apelidoPessoa."
				      ,NOME_FANTASIA = ".$nomeFantasiaPessoa."
				      ,CPF = ".$cpfPessoa."
				      ,CNPJ = ".$cnpjPessoa."
				      ,RG = ".$rgPessoa."
				      ,EMAIL = ".$emailPessoa."
				      ,DATA_NASCIMENTO = ".$nascimentoPessoa."
				      ,SEXO = ".$sexoPessoa."
				      ,TIPO = ".$tipoPessoa."
				      ,IE = ".$iePessoa."
				      ,NOME_CONTATO = ".$nomeContatoPessoa."
				      ,PETC_ID_PESSOA_TIPO_CATEGORIA = ".$idCategoriaPessoa."
				      ,DATA_UPDATE = now()
				      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				      ".$setSenha."
				 WHERE ID_PESSOA = ".$idPessoa."; ";

		if(isset($telefoneFixoContatoPessoa)){
			$query .= "DELETE FROM e_PESSOA_CONTATO WHERE PESS_ID_PESSOA = ".$idPessoa."; ";

				$key=0;
				
				foreach($arrayContatos as $values){
					$key++;
					if($values != 'NULL'){
						$query .= "INSERT INTO e_PESSOA_CONTATO
										           (TICO_ID_TIPO_CONTATO
										           ,PESS_ID_PESSOA
										           ,DESCRICAO
										           ,OPERADORA
										           ,DATA_INSERT
										           ,USUARIO_INSERT)
										     VALUES
										           (".$key."
										           ,".$idPessoa."
										           ,".$values."
										           ,NULL
										           ,now()
										           ,'".USUARIO_LOGADO."'); ";
					}
								
				}

		}

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "redirect": "pessoa-visualiza&idPessoa='.$idPessoa.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

		
	case "cadastrarPessoaEndereco":

		$idPessoa 						= sqlvalue($_POST["peEnIdPessoa"],false);
		$cepEnderecoPessoa 				= sqlvalue($_POST["cepEnderecoPessoa"],true);
		$ruaEnderecoPessoa 				= sqlvalue($_POST["ruaEnderecoPessoa"],true);
		$numeroEnderecoPessoa 			= sqlvalue($_POST["numeroEnderecoPessoa"],true);
		$complementoEnderecoPessoa 		= sqlvalue($_POST["complementoEnderecoPessoa"],true);
		$bairroEnderecoPessoa 			= sqlvalue($_POST["bairroEnderecoPessoa"],true);
		$municipioEnderecoPessoa 		= sqlvalue($_POST["municipioEnderecoPessoa"],true);
		$estadoEnderecoPessoa 			= sqlvalue($_POST["estadoEnderecoPessoa"],true);
		$paisEnderecoPessoa 			= sqlvalue($_POST["paisEnderecoPessoa"],true);
		$referenciaEnderecoPessoa 		= sqlvalue($_POST["referenciaEnderecoPessoa"],true);
		$apelidoEnderecoPessoa 			= sqlvalue($_POST["apelidoEnderecoPessoa"],true);

		$query = "INSERT INTO e_PESSOA_ENDERECO
					           (PESS_ID_PESSOA
					           ,ENDERECO
					           ,NUMERO
					           ,COMPLEMENTO
					           ,BAIRRO
					           ,MUNICIPIO
					           ,CEP
					           ,PAIS
					           ,UF
					           ,REFERENCIA
					           ,APELIDO_ENDERECO
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$idPessoa."
					           ,".$ruaEnderecoPessoa."
					           ,".$numeroEnderecoPessoa."
					           ,".$complementoEnderecoPessoa."
					           ,".$bairroEnderecoPessoa."
					           ,".$municipioEnderecoPessoa."
					           ,".$cepEnderecoPessoa."
					           ,".$paisEnderecoPessoa."
					           ,".$estadoEnderecoPessoa."
					           ,".$referenciaEnderecoPessoa."
					           ,".$apelidoEnderecoPessoa."
					           ,now()
					           ,'".USUARIO_LOGADO."')";
//echo "<pre>".$query."</pre>";
		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "redirect": "pessoa-visualiza&idPessoa='.$idPessoa.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case "editarEnderecoPessoa":

		$idPessoa 						= sqlvalue($_POST["peEnIdPessoa"],false);
		$idEnderecoPessoa 				= sqlvalue($_POST["idEnderecoPessoa"],false);
		$cepEnderecoPessoa 				= sqlvalue($_POST["cepEnderecoPessoa"],true);
		$ruaEnderecoPessoa 				= sqlvalue($_POST["ruaEnderecoPessoa"],true);
		$numeroEnderecoPessoa 			= sqlvalue($_POST["numeroEnderecoPessoa"],true);
		$complementoEnderecoPessoa 		= sqlvalue($_POST["complementoEnderecoPessoa"],true);
		$bairroEnderecoPessoa 			= sqlvalue($_POST["bairroEnderecoPessoa"],true);
		$municipioEnderecoPessoa 		= sqlvalue($_POST["municipioEnderecoPessoa"],true);
		$estadoEnderecoPessoa 			= sqlvalue($_POST["estadoEnderecoPessoa"],true);
		$paisEnderecoPessoa 			= sqlvalue($_POST["paisEnderecoPessoa"],true);
		$referenciaEnderecoPessoa 		= sqlvalue($_POST["referenciaEnderecoPessoa"],true);
		$apelidoEnderecoPessoa 			= sqlvalue($_POST["apelidoEnderecoPessoa"],true);

		$query = "UPDATE e_PESSOA_ENDERECO
				   SET ENDERECO = ".$ruaEnderecoPessoa."
				      ,NUMERO = ".$numeroEnderecoPessoa."
				      ,COMPLEMENTO = ".$complementoEnderecoPessoa."
				      ,BAIRRO = ".$bairroEnderecoPessoa."
				      ,MUNICIPIO = ".$municipioEnderecoPessoa."
				      ,UF = ".$estadoEnderecoPessoa."
				      ,PAIS = ".$paisEnderecoPessoa."
				      ,CEP = ".$cepEnderecoPessoa."
				      ,REFERENCIA = ".$referenciaEnderecoPessoa."
				      ,APELIDO_ENDERECO = ".$apelidoEnderecoPessoa."
				      ,DATA_UPDATE = now()
				      ,USUARIO_UPDATE = '".USUARIO_LOGADO."'
				 WHERE ID_PESSOA_ENDERECO = ".$idEnderecoPessoa."";
//echo "<pre>".$query."</pre>";
		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'", "redirect": "pessoa-visualiza&idPessoa='.$idPessoa.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;

		break;

	case "enviaNovaSenha":

		$idPessoa = $_POST["idPessoa"];
		$novaSenha1 = RandomString(8);
		$novaSenha = md5($novaSenha1);
		$senhaPessoa = sqlvalue($novaSenha,true);

		$query = "SELECT EMAIL, NOME FROM e_PESSOA WHERE ID_PESSOA = ".$idPessoa."";
		$result = $mysqli->ConsultarSQL($query);
		$emailPessoa = $result[0]['EMAIL'];
		$nomePessoa = $result[0]['NOME'];

		$query = "UPDATE e_PESSOA SET SENHA = ".$senhaPessoa." WHERE ID_PESSOA = ".$idPessoa."";
		$resultQuery = $mysqli->ExecutarSQL($query);

		if($resultQuery){
			$enviaEmail = enviaEmail('novaSenha', $nomePessoa, $emailPessoa, $novaSenha1);
			$retorno = '{ "cod": "sucesso", "mensagem": "'.SENHA_ENVIADA_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_ENVIAR_SENHA.'" }';	
		}

		echo $retorno;

		break;

	case "editaTabelasPessoa":

		$id = $_POST["id"];
		$descricao = sqlvalue($_POST["descricao"],true);
		$tabela = str_replace("descricao", "", $_POST["tabela"]);

		if ($tabela == "PessoaConceito") {
			$query = "UPDATE e_PESSOA_CONCEITO SET DESCRICAO = ".$descricao.", DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_PESSOA_CONCEITO = ".$id."";
		} elseif($tabela == "PessoaSituacao") {
			$query = "UPDATE e_PESSOA_SITUACAO SET DESCRICAO_SITUACAO = ".$descricao.", DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_PESSOA_SITUACAO = ".$id."";
		} elseif($tabela == "PessoaCategoria") { 
			$query = "UPDATE e_PESSOA_TIPO_CATEGORIA SET DESCRICAO_TIPO_CATEGORIA = ".$descricao.", DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."' WHERE ID_PESSOA_TIPO_CATEGORIA = ".$id."";
		} else {
			$query = "";
		}

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EDITADO_COM_SUCESSO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EDITAR.'" }';	
		}

		echo $retorno;
		
		break;

	case "gravaTabelasPessoa":

		$descricao = sqlvalue($_POST["descricao"],true);
		$tabela = str_replace("descricao", "", $_POST["tabela"]);

		if ($tabela == "PessoaConceito") {
			$query = "INSERT INTO e_PESSOA_CONCEITO
					           (DESCRICAO
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$descricao.",
					           now(),
					           '".USUARIO_LOGADO."')
					SELECT IDENT_CURRENT('e_PESSOA_CONCEITO') AS 'ID';";
		} elseif($tabela == "PessoaSituacao") {
			$query = "INSERT INTO e_PESSOA_SITUACAO
					           (DESCRICAO_SITUACAO
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$descricao.",
					           now(),
					           '".USUARIO_LOGADO."')
					    SELECT IDENT_CURRENT('e_PESSOA_SITUACAO') AS 'ID';";
		} elseif($tabela == "PessoaCategoria") { 
			$query = "INSERT INTO e_PESSOA_TIPO_CATEGORIA
					           (DESCRICAO_TIPO_CATEGORIA
					           ,DATA_INSERT
					           ,USUARIO_INSERT)
					     VALUES
					           (".$descricao.",
					           now(),
					           '".USUARIO_LOGADO."')
					SELECT IDENT_CURRENT('e_PESSOA_TIPO_CATEGORIA') AS 'ID';";
		} else {
			$query = "";
		}

		$resultQuery = $mysqli->ExecutarSQL($query);

		$rowQuery = @mssql_fetch_array($resultQuery);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "id": "'.$rowQuery["ID"].'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';	
		}

		echo $retorno;
		
		break;

	case "removeTabelasPessoa":

		$id = $_POST["id"];
		$tabela = str_replace("descricao", "", $_POST["tabela"]);

		if ($tabela == "PessoaConceito") {
			$query = "DELETE FROM e_PESSOA_CONCEITO WHERE ID_PESSOA_CONCEITO = ".$id."";
		} elseif($tabela == "PessoaSituacao") {
			$query = "DELETE FROM e_PESSOA_SITUACAO WHERE ID_PESSOA_SITUACAO = ".$id."";
		} elseif($tabela == "PessoaCategoria") { 
			$query = "DELETE FROM e_PESSOA_TIPO_CATEGORIA WHERE ID_PESSOA_TIPO_CATEGORIA = ".$id."";
		} else {
			$query = "";
		}

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.EXCLUIDO.'" }';	
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_EXCLUIR.'" }';	
		}

		echo $retorno;
		
		break;
		
	case "listaPessoa":
		
		require_once(PHP_ROOT.'/'.PROJETO.'/classes/pessoa.class.php');
		$Pessoa = new Pessoa($mysqli);
		
		$filtro = $_GET["term"];
		
		$listaPessoa = $Pessoa->fnPessoa($filtro);
		
		
		$arrayListaPessoa = array();
		foreach ($listaPessoa as $value) {
			$arrayListaPessoa[] = array("id" => $value["ID_PESSOA"], "text" => utf8_encode($value["NOME"]." | ".$value["CPF"]));
		}
		
		$ret['results'] = $arrayListaPessoa;
				
		echo json_encode($ret);
		
		break;

	case "cadastraOcorrenciaPessoa":
		
		$idPessoa = sqlvalue($_POST['idPessoa'], false);
		$ocorrenciaPessoa = sqlvalue($_POST['ocorrenciaPessoa'], true);
		$data = sqlvalue(date('Y-m-d H:i:s'), true);

		$query = "INSERT INTO e_OCORRENCIA
				           (PESS_ID_PESSOA
				           ,PEDI_ID_PEDIDO
				           ,DESCRICAO
				           ,DATA
				           ,DATA_INSERT
				           ,USUARIO_INSERT)
				     VALUES
				           (".$idPessoa."
				           ,NULL
				           ,".$ocorrenciaPessoa."
				           ,".$data."
				           ,now()
				           ,'".USUARIO_LOGADO."')";
		
		$resultQuery = $mysqli->ExecutarSQL($query);
				
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "ocorrencia": "S", "dataOcorrencia": "'.date('d/m/Y H:i').'" }';	
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