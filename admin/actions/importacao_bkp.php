<?php
require('../configs/config.php');
//header('Content-Type: text/html; charset=utf-8');

set_time_limit(0);

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'importaArquivo':
		
		//print_r($_POST);
		
		if(isset($_FILES['arquivo'])){
			//printr($_FILES);
			
			$upload = uploadImportaArquivos();

			if($upload == "sucesso"){

				$arquivo = @fopen("../uploads/".$nome_final."", "r");
				if ($arquivo) {
					
					//$nro_linhas = count(explode(";", fgets($arquivo)));
										
					if($_POST["tipoArquivo"] == "cliente"){
						
						while (!feof($arquivo)) {
							$linha = fgets($arquivo, 4096);
							$arrayLinha = explode(";", $linha);
							if(count($arrayLinha) == 31){
								$insereLinha = insereLinhaArquivo(trataPost($arrayLinha), "cliente");
							}
						}

					} elseif($_POST["tipoArquivo"] == "produto"){
						
						while (!feof($arquivo)) {
							$linha = fgets($arquivo, 4096);
							$arrayLinha = explode(";", $linha);
							if(count($arrayLinha) == 23){
								$insereLinha = insereLinhaArquivo($arrayLinha, "produto");
							}
						}

						echo "<font color='green'>Importa&ccedil;&atilde;o realizada com sucesso!</font>";

					} elseif($_POST["tipoArquivo"] == "preco"){
						
						while (!feof($arquivo)) {
							$linha = fgets($arquivo, 4096);
							$arrayLinha = explode(";", $linha);
							if(count($arrayLinha) == 7){
								$insereLinha = insereLinhaArquivo($arrayLinha, "preco");
							}
						}

						echo "<font color='green'>Importa&ccedil;&atilde;o realizada com sucesso!</font>";

					} elseif($_POST["tipoArquivo"] == "imagem"){
						
						while (!feof($arquivo)) {
							$linha = fgets($arquivo, 4096);
							$arrayLinha = explode(";", $linha);
							//printr($arrayLinha);
							if(count($arrayLinha) == 4){
								$insereLinha = insereLinhaArquivo($arrayLinha, "imagem");
							}
						}

						echo "<font color='green'>Importa&ccedil;&atilde;o realizada com sucesso!</font>";

					} else {
						printr($_POST);
						echo "erro";
					}
					
					fclose($arquivo);
				}

			} else {
				$retorno = $upload;
			}

		} else {
			echo $retorno = "erro";
		}

		break;
	
	default:
		# code...
		break;
}

function uploadImportaArquivos(){

	global $nome_final;

	// Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '../uploads/';

	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 1024* 2; // 2Mb

	// Array com as extensões permitidas
	$_UP['extensoes'] = array('txt');

	// Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
	$_UP['renomeia'] = false;

	// Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'N&atilde;o houve erro';
	$_UP['erros'][1] = 'O arquivo no upload &eacute; maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'N&atilde;o foi feito o upload do arquivo';

	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	if ($_FILES['arquivo']['error'] != 0) {
	die("N&atilde;o foi poss&iacute;vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; // Para a execução do script
	}

	// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

	// Faz a verificação da extensão do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if (array_search($extensao, $_UP['extensoes']) === false) {
	$return = "Por favor, envie arquivos com as seguintes extens&otilde;es: txt";
	}

	// Faz a verificação do tamanho do arquivo
	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
	$return = "O arquivo enviado &eacute; muito grande, envie arquivos de at&eacute; 2Mb.";
	}

	// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	else {
		// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeia'] == true) {
			// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = time().'.txt';
		} else {
			// Mantém o nome original do arquivo
			$nome_final = $_FILES['arquivo']['name'];
		}

		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (@move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			$return = "sucesso";

		} else {
			// Não foi possível fazer o upload, provavelmente a pasta está incorreta
			$return = "N&atilde;o foi poss&iacute;vel enviar o arquivo, tente novamente";
		}

	}

	return $return;
}

function insereLinhaArquivo($arrayLinha, $tipoArquivo){

	//header('Content-Type: text/html; charset=ISO-8859-1');

	switch ($tipoArquivo) {
		
		case 'cliente':

			$nomeCompleto = trataNomeImport($arrayLinha[1]);
			$nome = sqlvalue(trim($nomeCompleto[0]), true);
			$sobrenome = sqlvalue(trim($nomeCompleto[1]), true);
			$apelido = sqlvalue(NULL, true);
			$nomeFantasia = sqlvalue($arrayLinha[2], true);
			$idSituacaoPessoa = sqlvalue($arrayLinha[7], false);
			$tipo = sqlvalue($arrayLinha[3], true);
			if(strlen($arrayLinha[4]) > 12){
				$cpf = sqlvalue(NULL, true);
				$cnpj = sqlvalue($arrayLinha[4], true);
			} else {
				$cpf = sqlvalue($arrayLinha[4], true);
				$cnpj = sqlvalue(NULL, true);
			}
			$email = sqlvalue($arrayLinha[21], true);
			$senha = sqlvalue(md5($arrayLinha[0]), true);
			$dataNascimento = $arrayLinha[6];
			$ano = substr($dataNascimento, 0,4);
			$mes = substr($dataNascimento, 4,2);
			$dia = substr($dataNascimento, 6,2);
			$dataNascimento = sqlvalue($ano."-".$mes."-".$dia, true);
 			
			$queryCliente = "	IF EXISTS (SELECT 1 FROM e_PESSOA WHERE CPF = '".$arrayLinha[4]."' OR CNPJ = '".$arrayLinha[4]."')
									BEGIN
										SELECT 'EXISTE' RETORNO
									END
								ELSE
								BEGIN
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
							           ,".$nome."
							           ,".$sobrenome."
							           ,".$apelido."
							           ,".$nomeFantasia."
							           ,".$cpf."
							           ,".$cnpj."
							           ,NULL
							           ,".$email."
							           ,".$senha."
							           ,".$dataNascimento."
							           ,'F'
							           ,".$tipo."
							           ,NULL
							           ,NULL
							           ,NULL
							           ,1
							           ,".$idSituacaoPessoa."
							           ,11
							           ,'S'
							           ,now()
							           ,'".USUARIO_LOGADO."')
							SELECT ID_PESSOA RETORNO FROM e_PESSOA WHERE CPF = '".$arrayLinha[4]."' OR CNPJ = '".$arrayLinha[4]."' AND LOJA_ID_LOJA = ".ID_LOJA."; 
							END
							";
			
			//printr($queryCliente);
			
			$rowQueryCliente = $mysqli->ConsultarSQL($queryCliente);

			$idPessoa = sqlvalue($rowQueryCliente[0]["RETORNO"], false);

			if($rowQueryCliente[0]["RETORNO"] == "EXISTE"){
				echo "<font color='red'>cliente ".$arrayLinha[4]." j� existe</font><br>";
			} else {
				echo "<font color='green'>cliente ".$arrayLinha[4]." cadastrado</font><br>";

				$contatos = array('1'=>$arrayLinha[16], '3'=>$arrayLinha[17], '2'=>$arrayLinha[18]);

				foreach($contatos as $key => $value){
					if($value != "0000000000" and $value != ""){
						$mysqli->ExecutarSQL("INSERT INTO e_PESSOA_CONTATO (TICO_ID_TIPO_CONTATO, PESS_ID_PESSOA, DESCRICAO, DATA_INSERT, USUARIO_INSERT) VALUES (".$key.", ".$idPessoa.", '".$value."', now(), '".USUARIO_LOGADO."')");
					}
				}
				
				$enderecos = array("end_faturamento" => array($arrayLinha[8], $arrayLinha[9], $arrayLinha[10], $arrayLinha[11], $arrayLinha[12],
					$arrayLinha[13], $arrayLinha[14], $arrayLinha[15]), "end_entrega" => array($arrayLinha[22], $arrayLinha[23], $arrayLinha[24], 
					$arrayLinha[25], $arrayLinha[26], $arrayLinha[27], $arrayLinha[28], $arrayLinha[29]));

				foreach($enderecos as $key => $value){

					$endereco = sqlvalue($value[0], true);
					$numero = sqlvalue($value[1], true);
					$complemento = sqlvalue($value[2], true);
					$bairro = sqlvalue($value[3], true);
					$municipio = sqlvalue($value[4], true);
					$estado = sqlvalue($value[5], true);
					$cep = sqlvalue($value[6], true);
					$pais = sqlvalue($value[7], true);
					

					if($key == "end_faturamento"){
						$apelidoEndereco = "ENDERECO FATURAMENTO";
						$enderecoPrincipal = "S";
					} elseif($key == "end_entrega") {
						$apelidoEndereco = "ENDERECO ENTREGA";
						$enderecoPrincipal = "N";
					}

					$queryEndereco = "DECLARE @ID_MUNICIPIO INT
											SELECT @ID_MUNICIPIO = BAIR.MUNI_ID_MUNICIPIO 
											FROM e_CEP CEP, e_BAIRRO BAIR WHERE CEP.CEP = ".$cep." 
											AND CEP.BAIR_ID_BAIRRO = BAIR.ID_BAIRRO
											INSERT INTO e_PESSOA_ENDERECO
										           (PESS_ID_PESSOA
										           ,ENDERECO
										           ,NUMERO
										           ,COMPLEMENTO
										           ,BAIRRO
										           ,MUNI_ID_MUNICIPIO
										           ,CEP_ID_CEP
										           ,REFERENCIA
										           ,APELIDO_ENDERECO
										           ,ENDERECO_PRINCIPAL
										           ,DATA_INSERT
										           ,USUARIO_INSERT)
										     VALUES
										           (".$idPessoa."
										           ,".$endereco."
										           ,".$numero."
										           ,".$complemento."
										           ,".$bairro."
										           ,@ID_MUNICIPIO
										           ,".$cep."
										           ,NULL
										           ,'".$apelidoEndereco."'
										           ,'".$enderecoPrincipal."'
										           ,now()
										           ,'".USUARIO_LOGADO."')
										SELECT @ID_MUNICIPIO RETORNO";
					
					$rowEndereco = $mysqli->ConsultarSQL($queryEndereco);

					if(@$rowEndereco[0]["RETORNO"] > 0){
						echo "<font color='green'>".$apelidoEndereco." cadastrado</font><br>"; 	
					} else {
						echo "<font color='red'>erro ao cadastrar ".$apelidoEndereco."</font><br>";	
					}
				}
				echo "<br>";
			}

			break;

		case "produto":

			$arrayLinha = array_map("trataImportacao", $arrayLinha);
			
			
			/*padrao comlines*/
			$arraySubcategoriaUtilidadesDomesticas = array(4,5,6,7,8,9,10);
			$arraySubcategoriaFerramentaJardinagem = array(14,15);
			/**/

			$idCategoria = sqlvalue((int)$arrayLinha[4],false);
			$idSubcategoria = sqlvalue((int)$arrayLinha[6],false);
			
			if($arrayLinha[8] > 0){
				$idLinha = sqlvalue((int)$arrayLinha[8],false);
			} else {
				$idLinha = sqlvalue(NULL,true);
			}
			$descricaoCategoria = sqlvalue($arrayLinha[5],true);
			$descricaoSubcategoria = sqlvalue($arrayLinha[7],true);
			$descricaoLinha = sqlvalue($arrayLinha[9],true);

			$descricaoCategoriaUrlAmigavel = sqlvalue(trataUrlAmigavel($idCategoria.' '.$descricaoCategoria), true);
			$descricaoSubcategoriaUrlAmigavel = sqlvalue(trataUrlAmigavel($idSubcategoria.' '.$descricaoSubcategoria), true);
			$descricaoLinhaUrlAmigavel = sqlvalue(trataUrlAmigavel($idLinha.' '.$descricaoLinha), true);
			
			$queryCategorias = "";
			if(isset($idCategoria)){
				
				if(in_array($idCategoria, $arraySubcategoriaUtilidadesDomesticas)){
					
					$queryCategoria = "
										IF NOT EXISTS (SELECT 1 FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO = ".$idCategoria.")
										BEGIN
										INSERT INTO e_CATEGORIA
										           (ID_CATEGORIA_INTEGRACAO
										           ,DESCRICAO_CATEGORIA
										           ,CATE_ID_CATEGORIA
										           ,ATIVO
										           ,ORDEM
										           ,URL_AMIGAVEL
										           ,USUARIO_INSERT)
										     VALUES
										           (".$idCategoria."
										           ,".$descricaoCategoria."
										           ,".ID_CATEGORIA_PADRAO_1."
										           ,'S'
										           ,1
										           ,".$descricaoCategoriaUrlAmigavel."
										           ,'".USUARIO_LOGADO."')
										END
										";
					
					
				} elseif(in_array($idCategoria, $arraySubcategoriaFerramentaJardinagem)){
					
					$queryCategoria = "
										IF NOT EXISTS (SELECT 1 FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO = ".$idCategoria.")
										BEGIN
										INSERT INTO e_CATEGORIA
										           (ID_CATEGORIA_INTEGRACAO
										           ,DESCRICAO_CATEGORIA
										           ,CATE_ID_CATEGORIA
										           ,ATIVO
										           ,ORDEM
										           ,URL_AMIGAVEL
										           ,DATA_INSERT
										           ,USUARIO_INSERT)
										     VALUES
										           (".$idCategoria."
										           ,".$descricaoCategoria."
										           ,".ID_CATEGORIA_PADRAO_2."
										           ,'S'
										           ,1
										           ,".$descricaoCategoriaUrlAmigavel."
										           ,now()
										           ,'".USUARIO_LOGADO."')
										END
										";
					
									
				} else {
				
					if($descricaoCategoria != NULL){
					$queryCategoria = "
										IF NOT EXISTS (SELECT 1 FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO = ".$idCategoria.")
										BEGIN
										INSERT INTO e_CATEGORIA
										           (ID_CATEGORIA_INTEGRACAO
										           ,DESCRICAO_CATEGORIA
										           ,CATE_ID_CATEGORIA
										           ,ATIVO
										           ,ORDEM
										           ,URL_AMIGAVEL
										           ,DATA_INSERT
										           ,USUARIO_INSERT)
										     VALUES
										           (".$idCategoria."
										           ,".$descricaoCategoria."
										           ,NULL
										           ,'S'
										           ,1
										           ,".$descricaoCategoriaUrlAmigavel."
										           ,now()
										           ,'".USUARIO_LOGADO."')
										END
										";
					}
								
				}
					//printr($queryCategoria);
					//$mysqli->ExecutarSQL($queryCategoria);
					$queryCategorias .= $queryCategoria;
				
			
			}
			
			if(isset($idSubcategoria) and $idSubcategoria > 0){
				
				$querySubcategoria = "
									DECLARE @CATE_ID_CATEGORIA INT
									SELECT @CATE_ID_CATEGORIA = ID_CATEGORIA FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO = ".$idCategoria."
									IF NOT EXISTS (SELECT 1 FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO = ".$idSubcategoria.")
									BEGIN
									INSERT INTO e_CATEGORIA
									           (ID_CATEGORIA_INTEGRACAO
									           ,DESCRICAO_CATEGORIA
									           ,CATE_ID_CATEGORIA
									           ,ATIVO
									           ,ORDEM
									           ,URL_AMIGAVEL
									           ,DATA_INSERT
									           ,USUARIO_INSERT)
									     VALUES
									           (".$idSubcategoria."
									           ,".$descricaoSubcategoria."
									           ,@CATE_ID_CATEGORIA
									           ,'S'
									           ,1
									           ,".$descricaoSubcategoriaUrlAmigavel."
									           ,now()
									           ,'".USUARIO_LOGADO."')
									END";
				
				//$mysqli->ExecutarSQL($querySubcategoria);
				$queryCategorias .= $querySubcategoria;
				
			}
			
			if(isset($idLinha) and  $idLinha > 0){
				$queryLinha = "
								IF NOT EXISTS (SELECT 1 FROM e_PRODUTO_NIVEL_AUXILIAR WHERE ID_PRODUTO_NIVEL_AUXILIAR = ".$idLinha.")
									BEGIN
										INSERT INTO e_PRODUTO_NIVEL_AUXILIAR
									           (ID_PRODUTO_NIVEL_AUXILIAR
									           ,DESCRICAO_PRODUTO_NIVEL_AUXILIAR
									           ,ORDEM
									           ,EXIBE_MENU
									           ,DATA_INSERT
									           ,USUARIO_INSERT)
									     VALUES
									           (".$idLinha."
									           ,".$descricaoLinhaUrlAmigavel."
									           ,1
									           ,'N'
									           ,now()
									           ,'".USUARIO_LOGADO."')
									END";
				//$mysqli->ExecutarSQL($queryLinha);
				$queryCategorias .= $queryLinha;
			}


			$idProdutoIntegracao = sqlvalue($arrayLinha[0],false);
			$nomeProduto = sqlvalue($arrayLinha[2],true);
			$referenciaProduto = sqlvalue($arrayLinha[1],true);
			$descricaoVenda = sqlvalue($arrayLinha[3],true);
			if(trataMedidasImport($arrayLinha[10]) >= 0){
				$pesoProduto = sqlvalue(trataMedidasImport($arrayLinha[10]),false);
			} else {
				$pesoProduto = PESO_MINIMO_INSERT_PRODUTO;
			}
			$alturaProduto = sqlvalue(trataMedidasImport($arrayLinha[11]),false);
			$larguraProduto = sqlvalue(trataMedidasImport($arrayLinha[13]),false);
			$profundidadeProduto = sqlvalue(trataMedidasImport($arrayLinha[12]),false);
			$descricaoCurta = sqlvalue($arrayLinha[15],true);
			$descricaoLonga = sqlvalue($arrayLinha[16].$arrayLinha[17], true);
            $tags = sqlvalue($arrayLinha[22],true);
            $urlAmigavelProduto = sqlvalue($arrayLinha[18],true);
            $metaTitleProduto = sqlvalue($arrayLinha[19],true);
            $metaDescriptionProduto = sqlvalue($arrayLinha[20],true);
            $metaKeywordsProduto = sqlvalue($arrayLinha[21],true);

			$queryProduto = $queryCategorias."
						IF NOT EXISTS (SELECT 1 FROM e_PRODUTO WHERE ID_PRODUTO_INTEGRACAO = ".$idProdutoIntegracao.")
							BEGIN
								INSERT INTO e_PRODUTO
							           (ID_PRODUTO_INTEGRACAO
							           ,PRSI_ID_PRODUTO_SITUACAO
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
							           ,TAGS
							           ,URL_AMIGAVEL
							           ,META_TITLE
							           ,META_DESCRIPTION
							           ,META_KEYWORDS
							           ,VIDEO
							           ,PNAU_ID_PRODUTO_NIVEL_AUXILIAR
							           ,DATA_INSERT
							           ,USUARIO_INSERT)
							     VALUES
							           (".$idProdutoIntegracao."
							           ,1
							           ,".$nomeProduto."
							           ,".$descricaoVenda."
							           ,".$referenciaProduto."
							           ,NULL
							           ,NULL
							           ,".$pesoProduto."
							           ,".$alturaProduto."
							           ,".$larguraProduto."
							           ,".$profundidadeProduto."
							           ,NULL
							           ,NULL
							           ,NULL
							           ,".$descricaoCurta."
							           ,".$descricaoLonga."
							           ,".$tags."
							           ,".$urlAmigavelProduto."
							           ,".$metaTitleProduto."
							           ,".$metaDescriptionProduto."
							           ,".$metaKeywordsProduto."
							           ,NULL
							           ,".$idLinha."
							           ,now()
							           ,'".USUARIO_LOGADO."');
							
							END
							ELSE
							BEGIN
							UPDATE e_PRODUTO SET 	 PRSI_ID_PRODUTO_SITUACAO = 1
										            ,NOME = ".$nomeProduto."
										            ,DESCRICAO_VENDA = ".$descricaoVenda."
												    ,REFERENCIA = ".$referenciaProduto."
												 	,NCM = NULL
												 	,COD_EAN = NULL
												 	,PESO_KG = ".$pesoProduto."
												 	,ALTURA_CM = ".$alturaProduto."
												 	,LARGURA_CM = ".$larguraProduto."
												 	,PROFUNDIDADE_CM = ".$profundidadeProduto."
												 	,PESS_ID_PESSOA_FABRICANTE = NULL
												 	,DATA_INICIAL_LANCAMENTO = NULL
												 	,DATA_FINAL_LANCAMENTO = NULL
												 	,DESCRICAO_CURTA = ".$descricaoCurta."
												 	,DESCRICAO_LONGA = ".$descricaoLonga."
												 	,TAGS = ".$tags."
												 	,URL_AMIGAVEL = ".$urlAmigavelProduto."
												 	,META_TITLE = ".$metaTitleProduto."
												 	,META_DESCRIPTION = ".$metaDescriptionProduto."
												 	,META_KEYWORDS = ".$metaKeywordsProduto."
												 	,VIDEO = NULL
												 	,PNAU_ID_PRODUTO_NIVEL_AUXILIAR = ".$idLinha."
												 	,DATA_UPDATE = now()
												 	,USUARIO_UPDATE = '".USUARIO_LOGADO."'
							WHERE ID_PRODUTO_INTEGRACAO = ".$idProdutoIntegracao."
							END";
							
										
			
			$mysqli->ExecutarSQL($queryProduto);
			
			$idProdutoNovo = $mysqli->ConsultarSQL("SELECT ID_PRODUTO FROM e_PRODUTO WHERE ID_PRODUTO_INTEGRACAO = ".$idProdutoIntegracao);
			
			/*if($idProdutoNovo){ echo "foi"; } else {echo "erro";}
			echo $idProdutoIntegracao."<br>";*/
			//printr($queryProduto);

			if($idProdutoNovo){
				
				if($alturaProduto >= 105 or $larguraProduto >= 105 or $profundidadeProduto >= 105 or $pesoProduto > 30){
					$arrayTipoFrete = array(1);
				} else {
					$arrayTipoFrete = array(40436, 41068, 81019);
				}
				
				$queryProdutoTipoFrete = "";
				foreach ($arrayTipoFrete as $value){
					$queryProdutoTipoFrete .= "IF NOT EXISTS (SELECT 1 FROM e_PRODUTO_TIPO_FRETE WHERE TIFR_ID_TIPO_FRETE = ".$value."
																AND PROD_ID_PRODUTO = ".$idProdutoNovo[0]["ID_PRODUTO"].")
												BEGIN
													INSERT INTO e_PRODUTO_TIPO_FRETE (PROD_ID_PRODUTO, TIFR_ID_TIPO_FRETE, DATA_INSERT, USUARIO_INSERT) 
											   		VALUES (".$idProdutoNovo[0]["ID_PRODUTO"].", ".$value.", now(), '".USUARIO_LOGADO."'); 
											   END
											   ";
				}
				
				
				if(in_array($idCategoria, $arraySubcategoriaUtilidadesDomesticas)){
					$queryAdicionalProdutoCategoria = "INSERT INTO e_PRODUTO_CATEGORIA (CATE_ID_CATEGORIA, PROD_ID_PRODUTO, DATA_INSERT, USUARIO_INSERT)
														 VALUES (".ID_CATEGORIA_PADRAO_1.", ".$idProdutoNovo[0]["ID_PRODUTO"].", now(), '".USUARIO_LOGADO."')";
				} elseif(in_array($idCategoria, $arraySubcategoriaFerramentaJardinagem)){
					$queryAdicionalProdutoCategoria = "INSERT INTO e_PRODUTO_CATEGORIA (CATE_ID_CATEGORIA, PROD_ID_PRODUTO, DATA_INSERT, USUARIO_INSERT)
														 VALUES (".ID_CATEGORIA_PADRAO_2.", ".$idProdutoNovo[0]["ID_PRODUTO"].", now(), '".USUARIO_LOGADO."')";
				} else {
					$queryAdicionalProdutoCategoria = "";
				}
				
				
				$queryProdutoCategoria = "INSERT INTO e_PRODUTO_LOJA (PROD_ID_PRODUTO, LOJA_ID_LOJA, DATA_INSERT, USUARIO_INSERT) 
															  VALUES (".$idProdutoNovo[0]["ID_PRODUTO"].", ".ID_LOJA.", now(), '".USUARIO_LOGADO."');
										
										".$queryProdutoTipoFrete."
										
 										DELETE FROM e_PRODUTO_CATEGORIA WHERE PROD_ID_PRODUTO = ".$idProdutoNovo[0]["ID_PRODUTO"].";
 										
 										".$queryAdicionalProdutoCategoria."

											DECLARE @ID_CATEGORIA INT

											DECLARE CURSOR_CATEGORIA CURSOR FOR
												
												SELECT ID_CATEGORIA FROM e_CATEGORIA WHERE ID_CATEGORIA_INTEGRACAO IN (".$idCategoria.", ".$idSubcategoria.")
												
												OPEN CURSOR_CATEGORIA
												
												FETCH NEXT FROM CURSOR_CATEGORIA INTO @ID_CATEGORIA
												
												WHILE @@FETCH_STATUS = 0
												BEGIN
													
													INSERT INTO e_PRODUTO_CATEGORIA (CATE_ID_CATEGORIA, PROD_ID_PRODUTO, DATA_INSERT, USUARIO_INSERT)
														 VALUES (@ID_CATEGORIA, ".$idProdutoNovo[0]["ID_PRODUTO"].", now(), '".USUARIO_LOGADO."')
													
													FETCH NEXT FROM CURSOR_CATEGORIA INTO @ID_CATEGORIA
													
												END
												CLOSE CURSOR_CATEGORIA  
											    DEALLOCATE CURSOR_CATEGORIA";
				//echo $idProdutoIntegracao;
				//printr($queryProdutoCategoria);
				
				$mysqli->ExecutarSQL($queryProdutoCategoria);
			}

			break;

		case "preco":

			$arrayLinha = array_map("trataImportacao", $arrayLinha);

			$referencia = sqlvalue($arrayLinha[1],true);
			$precoVenda = sqlvalue(trataPrecoImport($arrayLinha[2]),false);
			$precoPromocional = sqlvalue(trataPrecoImport($arrayLinha[3]),false);
			$dataInicialValidade = sqlvalue($arrayLinha[4],true);
			$dataFinalValidade = sqlvalue($arrayLinha[5],true);
			$estoqueProduto = sqlvalue(trataEstoqueImport($arrayLinha[6]),false);

			$codigoUnico = sqlvalue(RandomString($length = 10, $letters = date('U').$arrayLinha[0]), true);

			$queryCombinacaoPreco = "";
			$queryCombinacaoPrecoPromo = "";

			if($precoVenda > 0){
				$queryCombinacaoPreco = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
											  VALUES (1, @ID_PRODUTO, ".$precoVenda.", now(), now(), '".USUARIO_LOGADO."')";
			}

			if($precoPromocional > 0){
				$queryCombinacaoPrecoPromo = "INSERT INTO e_PRODUTO_PRECO_VENDA (TPVE_ID_TABELA_PRECO_VENDA, PROD_ID_PRODUTO, VALOR, DATA_INICIAL_VALIDADE, DATA_FINAL_VALIDADE, DATA_INSERT, USUARIO_INSERT)
											       VALUES (2, @ID_PRODUTO, ".$precoPromocional.", ".$dataInicialValidade.", ".$dataFinalValidade.", now(), '".USUARIO_LOGADO."')";
			}


			$queryCombinacao = "DECLARE @ID_PRODUTO_COMBINACAO INT, @ID_PRODUTO INT, @ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR INT, @SALDO NUMERIC(14,4)

								SELECT @ID_PRODUTO = ID_PRODUTO FROM e_PRODUTO WHERE REFERENCIA = ".$referencia."
								IF (@ID_PRODUTO > 0)
								BEGIN
									
									".$queryCombinacaoPreco."

									".$queryCombinacaoPrecoPromo."

								END
								IF NOT EXISTS(SELECT
													TOP 1
													1
												FROM
													e_PRODUTO PROD,
													e_PRODUTO_COMBINACAO PRCO,
													e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
													e_PRODUTO_COMBINACAO_ESTOQUE PCES
												WHERE
													PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
												AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
												AND PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCES.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
												AND PROD.REFERENCIA = ".$referencia.")
								BEGIN
									INSERT INTO e_PRODUTO_COMBINACAO (CODIGO_UNICO, PROD_ID_PRODUTO ,DATA_INSERT ,USUARIO_INSERT)
										 VALUES (".$codigoUnico.", @ID_PRODUTO, now(), '".USUARIO_LOGADO."');

									SELECT @ID_PRODUTO_COMBINACAO = ID_PRODUTO_COMBINACAO 
									  FROM e_PRODUTO_COMBINACAO 
									 WHERE CODIGO_UNICO = ".$codigoUnico.";

									INSERT INTO e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR (PRCO_ID_PRODUTO_COMBINACAO ,ATVA_ID_ATRIBUTO_VALOR ,DATA_INSERT ,USUARIO_INSERT)
     								VALUES (@ID_PRODUTO_COMBINACAO ,".ID_ATRIBUTO_VALOR_PADRAO." ,now() ,'".USUARIO_LOGADO."')
     								SELECT @ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = IDENT_CURRENT('e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR');

									INSERT INTO e_PRODUTO_COMBINACAO_ESTOQUE (PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, QUANTIDADE, DATA_MOVIMENTO, OPDE_ID_OPERACAO_DEPOSITO, DEPO_ID_DEPOSITO ,DATA_INSERT ,USUARIO_INSERT)
										 VALUES (@ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, ".$estoqueProduto.", now(), ".ID_OPERACAO_DEPOSITO_INICIAL.", ".ID_DEPOSITO_INICIAL.", now(), '".USUARIO_LOGADO."');
								END
								ELSE
								BEGIN
									SELECT
										@ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR,
										@SALDO = ".$estoqueProduto."-fn_saldo_disponivel_produto(PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, now())
									FROM
										e_PRODUTO PROD,
										e_PRODUTO_COMBINACAO PRCO,
										e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV
									WHERE
										PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
									AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
									AND PROD.REFERENCIA = ".$referencia."
									
									IF (@SALDO > 0)
									BEGIN
									INSERT INTO e_PRODUTO_COMBINACAO_ESTOQUE (PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, QUANTIDADE, DATA_MOVIMENTO, OPDE_ID_OPERACAO_DEPOSITO, DEPO_ID_DEPOSITO ,DATA_INSERT ,USUARIO_INSERT)
										 VALUES (@ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, @SALDO, now(), ".ID_OPERACAO_DEPOSITO_INICIAL.", ".ID_DEPOSITO_INICIAL.", now(), '".USUARIO_LOGADO."');
									END

								END
								";

								//printr($queryCombinacao);
			$mysqli->ExecutarSQL($queryCombinacao);

			break;

		case "imagem":

			$arrayLinha = array_map("trataImportacao", $arrayLinha);

			$referencia = sqlvalue($arrayLinha[1],true);
			$_imagem = explode("\\", $arrayLinha[2]);
			$imagem = sqlvalue($_imagem[3],true);

			$ordem = sqlvalue(trim($arrayLinha[3]), true);

			if($ordem == "'01'"){
				$principal = 'S';
			} else {
				$principal = 'N';
			}

			$chave = explode('\\', $_FILES['arquivo']['tmp_name']);
			$countChave = count($chave);
			$chave = $chave[$countChave-1];

			$query = "DELETE 
						FROM e_PRODUTO_COMBINACAO_IMAGEM 
					   WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR IN (SELECT
																				PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
																			FROM
																				e_PRODUTO PROD,
																				e_PRODUTO_COMBINACAO PRCO,
																				e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV
																			WHERE
																				PROD.REFERENCIA = ".$referencia."
																			AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
																			AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
																			)
							AND CHAVE != '".$chave."';
						
						INSERT INTO e_PRODUTO_COMBINACAO_IMAGEM
						           (PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
						           ,IMAGEM
						           ,ORDEM
						           ,PRINCIPAL
						           ,CHAVE
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
							(SELECT
								PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR,
								".$imagem.",
								".$ordem.",
								'".$principal."',
								'".$chave."',
								now(),
								'".USUARIO_LOGADO."'
							FROM
								e_PRODUTO PROD,
								e_PRODUTO_COMBINACAO PRCO,
								e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV
							WHERE
								PROD.REFERENCIA = ".$referencia."
							AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
							AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO)
						
					SELECT @@ROWCOUNT RETORNO";

			$resultQuery = $mysqli->ExecutarSQL($query);
			$rowQuery = @mssql_fetch_array($resultQuery);
			$linhasAfetadas = $rowQuery["RETORNO"];

			if($linhasAfetadas > 0){
				echo "<font color='green'>".$referencia." - Imagem Importada com sucesso!</font><br>";
			} else {
				echo "<font color='red'>".$referencia." - N&atilde;o foi encontrado produto para a imagem.</font><br>";
			}
			//printr($query);

			break;
		
		default:
			# code...
			break;
	}

}

FecharBanco();

function trataNomeImport($str){
	$nomeCompleto = explode(" ", $str);
	$nome = $nomeCompleto[0];
	unset($nomeCompleto[0]);
	$sobrenome = implode(" ", $nomeCompleto);
	return array($nome,$sobrenome);
}

function trataImportacao($valor){
	
	$valor = str_replace( 'þþ', '<br>', utf8_encode($valor));
	$valor = utf8_decode($valor);
		
	return $valor;
}

function trataUrlAmigavel($str){
	$str = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
	$str = RemoveAcentos($str);
	$str = str_replace(" ", "-", $str);
	return $str;
}

function trataMedidasImport($valor){
	$valorInt = (int)substr($valor, 0, 4);
	$valorDec = substr($valor, 4, 4);
	return $valorInt.".".$valorDec;
}

function trataPrecoImport($valor){
	$valorInt = (int)substr($valor, 0, 8);
	$valorDec = substr($valor, 8, 4);
	return $valorInt.".".$valorDec;
}

function trataEstoqueImport($valor){
	$valorInt = (int)substr($valor, 0, 7);
	//$valorDec = substr($valor, 7, 3);
	return $valorInt;
}


?>