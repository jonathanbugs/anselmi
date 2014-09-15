<?php
require_once '../configs/config.php';

$acao = null;
if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

switch ($acao) {
	
	case 'cadastraNewsletter': 
		
		$nome = sqlvalue($_POST['nome'], true);
		$email = sqlvalue(strtolower($_POST['email']), true);
		$sexo = sqlvalue($_POST['sexo'], true);

		$query = "IF NOT EXISTS (SELECT 1 FROM e_NEWSLETTER WHERE EMAIL = ".$email.")
					BEGIN
						INSERT INTO e_NEWSLETTER (NOME, EMAIL, USUARIO_INSERT) VALUES (".$nome.", ".$email.", 'actions/cadastro.php');
					END
					SELECT @@ROWCOUNT RETORNO
					";

		$retorno = $mysqli->ConsultarSQL($query);

		if($retorno){
			if($retorno[0]['RETORNO'] > 0) {

				$codigoCupom = RandomString(10, time().removeCharSpecial($email));
				
				$query = "INSERT INTO e_PROMOCAO_CARRINHO
						           (DESCRICAO_PROMOCAO
						           ,CUPOM_PROMOCIONAL
						           ,PROMOCAO_ATIVA
						           ,EMAIL_CLIENTE_CONTEMPLADO
						           ,DATA_INICIAL_VALIDADE
						           ,DATA_FINAL_VALIDADE
						           ,VALOR_MINIMO_COMPRA
						           ,UTILIZACAO_UNICA
						           ,VALOR_DESCONTO
						           ,TIPO_DESCONTO
						           ,DATA_INSERT
						           ,USUARIO_INSERT)
							   SELECT 
									'Promocao Cadastro Newsletter'
								   ,'".strtoupper($codigoCupom)."'
								   ,PROMOCAO_ATIVA
								   ,".$email."
								   ,CONVERT(VARCHAR(10), now(), 120)
								   ,CONVERT(VARCHAR(10), now()+16, 120)
								   ,VALOR_MINIMO_COMPRA
								   ,UTILIZACAO_UNICA
								   ,VALOR_DESCONTO
								   ,TIPO_DESCONTO
								   ,now()
								   ,'actions/cadastro.php'
								FROM
									e_PROMOCAO_CARRINHO PRCA
								WHERE
									PRCA.ID_PROMOCAO_CARRINHO = 59";

				$result = $mysqli->ExecutarSQL($query);

				if($result){
					enviaEmail('cupomDesconto', NULL, strtolower($_POST['email']), NULL, NULL, NULL, strtoupper($codigoCupom));
				}
				
				$retorno = '{"retorno": "sucesso", "mensagem": "Obrigado por se cadastrar, voc&ecirc; receber&aacute; seu cupom por e-mail!"}';
				
			} else {
				$retorno = '{"retorno": "sucesso", "mensagem": "Seu e-mail j&aacute; consta para receber nossa newsletter!"}';
			}
		} else {
			$retorno = '{"retorno": "erro", "mensagem": "N&atilde;o foi poss&iacute;vel cadastrar, tente novamente mais tarde!"}';
		}

		echo $retorno;

		break;

	case 'cadastraPessoa':

		$iptEmail 				= sqlvalue($_POST['iptEmail'], true);
    	$pswSenha 				= sqlvalue(md5($_POST['pswSenha']), true);
    	if($_POST['checkboxReceberNews']){
    		$checkboxReceberNews 	= sqlvalue('S', true);
    	} else {
			$checkboxReceberNews 	= sqlvalue('N', true);
    	}
	    $radTipoPessoa 			= sqlvalue($_POST['radTipoPessoa'], true);
	    $iptApelido 			= sqlvalue($_POST['iptApelido'], true);
	    $iptNome 				= sqlvalue($_POST['iptNome'], true);
	    $iptNomeFantasia 		= sqlvalue($_POST['iptNomeFantasia'], true); 

	    if($_POST['iptRazaoSocial']){
	    	$iptNome 			= sqlvalue($_POST['iptRazaoSocial'], true); 
		} 

	    $iptSobrenome 			= sqlvalue($_POST['iptSobrenome'], true);
	    $radSexo 				= sqlvalue($_POST['radSexo'], true);
	    $iptCpf					= str_replace('.', '', $_POST['iptCpf']);
	    $iptCpf					= str_replace('-', '', $iptCpf);
	    $iptCpf 				= sqlvalue($iptCpf, true);
	    $iptCnpj				= str_replace('.', '', $_POST['iptCnpj']);
	    $iptCnpj				= str_replace('/', '', $iptCnpj);
	    $iptCnpj				= str_replace('-', '', $iptCnpj);
	    $iptCnpj 				= sqlvalue($iptCnpj, true); 
	    $iptIe 					= sqlvalue($_POST['iptIe'], true); 
	    $iptDataNascimento 		= sqlvalue(formataDataInsert($_POST['iptDataNascimento']), true);
	    $iptTelefoneResidencial = removeCharSpecial($_POST['iptTelefoneResidencial']);
	    $iptTelefoneCelular 	= removeCharSpecial($_POST['iptTelefoneCelular']);
	    $iptTelefoneComercial 	= removeCharSpecial($_POST['iptTelefoneComercial']);
	    $iptCep					= str_replace('-', '', $_POST['iptCep']);
	    $iptCep 				= sqlvalue($iptCep, true);
	    $radTipoEndereco 		= sqlvalue($_POST['radTipoEndereco'], true);
	    $iptEndereco 			= sqlvalue($_POST['iptEndereco'], true);
	    $iptNumero 				= sqlvalue($_POST['iptNumero'], true);
	    $iptComplemento 		= sqlvalue($_POST['iptComplemento'], true); 
	    $iptBairro 				= sqlvalue($_POST['iptBairro'], true);
	    $iptIdCidade 			= sqlvalue($_POST['iptIdCidade'], true);
	    $iptEstado 				= sqlvalue($_POST['iptEstado'], true);
	    $textAreaReferencia 	= sqlvalue($_POST['textAreaReferencia'], true);
	    $iptContato 			= sqlvalue($_POST['iptContato'], true);

	    $urlOrigem = sqlvalue($_COOKIE['urlOrigem'], true);

	    $arrayContatos = array();
	    if($iptTelefoneResidencial) $arrayContatos['1'] = $iptTelefoneResidencial; 
	    if($iptTelefoneCelular) $arrayContatos['2'] = $iptTelefoneCelular; 
	    if($iptTelefoneComercial) $arrayContatos['3'] = $iptTelefoneComercial;

	    $queryPessoa = "IF EXISTS (SELECT 1 FROM e_PESSOA WHERE EMAIL = ".$iptEmail.")
						BEGIN
							SELECT 'EMAIL' RETORNO
						END
						ELSE IF EXISTS (SELECT 1 FROM e_PESSOA WHERE IFNULL(CPF,0) = ".$iptCpf.")
						BEGIN
							SELECT 'CPF' RETORNO
						END
						ELSE IF EXISTS (SELECT 1 FROM e_PESSOA WHERE IFNULL(CNPJ,0) = ".$iptCnpj.")
						BEGIN
							SELECT 'CNPJ' RETORNO
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
									   ,URL_ORIGEM
									   ,DATA_INSERT
									   ,USUARIO_INSERT)
								 VALUES
									   (".ID_LOJA."
									   ,".$iptNome."
									   ,".$iptSobrenome."
									   ,".$iptApelido."
									   ,".$iptNomeFantasia."
									   ,".$iptCpf."
									   ,".$iptCnpj."
									   ,NULL
									   ,".$iptEmail."
									   ,".$pswSenha."
									   ,".$iptDataNascimento."
									   ,".$radSexo."
									   ,".$radTipoPessoa."
									   ,".$iptIe."
									   ,'".$_SERVER["REMOTE_ADDR"]."'
									   ,".$iptContato."
									   ,1
									   ,1
									   ,".ID_PESSOA_CATEGORIA_CLIENTE."
									   ,".$checkboxReceberNews."
									   ,".$urlOrigem."
									   ,now()
									   ,'actions/cadastro.php');
							
							SELECT 'CADASTRO' RETORNO, ID_PESSOA 
							FROM e_PESSOA WHERE EMAIL = ".$iptEmail." AND LOJA_ID_LOJA = ".ID_LOJA.";
						END";

			$rowPessoa = $mysqli->ConsultarSQL($queryPessoa);
			$idPessoa = $rowPessoa[0]['ID_PESSOA'];
			$retorno = $rowPessoa[0]['RETORNO'];

			$return = false;

			if($retorno == 'EMAIL'){
				$mensagem = 'EMAIL';
			} elseif($retorno == 'CPF'){
				$mensagem = 'CPF';
			} elseif($retorno == 'CNPJ'){
				$mensagem = 'CNPJ';
			} elseif($retorno == 'CADASTRO'){
				$return = true;
			} else {
				$mensagem = '(001) - Não foi possível cadastrar, tente novamente mais tarde.';
			}

			if($return){
				$queryEndereco = "INSERT INTO e_PESSOA_ENDERECO
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
									           ,".$iptEndereco."
									           ,".$iptNumero."
									           ,".$iptComplemento."
									           ,".$iptBairro."
									           ,".$iptIdCidade."
									           ,".$iptCep."
									           ,".$textAreaReferencia."
									           ,'ENDERECO FATURAMENTO'
									           ,'S'
									           ,now()
											   ,'actions/cadastro.php')";
				
				$resultEndereco = $mysqli->ExecutarSQL($queryEndereco);
				
				if($resultEndereco){
					$return = true;
				} else {
					$return = false;
					$mensagem = '(002) - Não foi possível cadastrar, tente novamente mais tarde';
				}

				if($return){

					foreach ($arrayContatos as $key => $value) {
						if($value){
							$value = sqlvalue($value, true);
							$queryContato .= "INSERT INTO e_PESSOA_CONTATO
												           (TICO_ID_TIPO_CONTATO
												           ,PESS_ID_PESSOA
												           ,DESCRICAO
												           ,DATA_INSERT
												           ,USUARIO_INSERT)
												     VALUES
												           (".$key."
												           ,".$idPessoa."
												           ,".$value."
												           ,now()
												           ,'actions/cadastro.php');
												";
						}
						
					}

					$resultContato = $mysqli->ExecutarSQL($queryContato);
					if($resultContato){
						$return = true;
					} else {
						$return = false;
						$mensagem = '(003) - Não foi possível cadastrar, tente novamente mais tarde';
					}
					

				} else{
					$mysqli->ExecutarSQL("DELETE FROM e_PESSOA WHERE ID_PESSOA = ".$idPessoa.";
								 DELETE FROM e_PESSOA_ENDERECO WHERE PESS_ID_PESSOA = ".$idPessoa."; ");
				}
			}

			if($return){
				$_SESSION['login'] = $iptEmail;
				$_SESSION['senha'] = $pswSenha;
				ValidarCliente(null, false, 'logar', $mysqli);
				echo '{"retorno": "sucesso", "mensagem": "CADASTRO"}';
			} else {
				echo '{"retorno": "erro", "mensagem": "'.$mensagem.'"}';
			}
						

		break;

	case 'alteraEmail':

		$senha = sqlvalue(md5($_POST['iptSenha']), true);
		$idPessoa = sqlvalue($_SESSION['sessionIdPessoa'], false);
		$email = sqlvalue($_POST['iptEmail'], true);

		$queryEmail = "SELECT 1 RETORNO FROM e_PESSOA WHERE EMAIL = ".$email." AND LOJA_ID_LOJA = ".ID_LOJA."";
		$resultEmail = $mysqli->ConsultarSQL($queryEmail);

		if($resultEmail[0]['RETORNO'] != 1){
			$query = "UPDATE e_PESSOA SET EMAIL = ".$email." WHERE ID_PESSOA = ".$idPessoa." AND SENHA = ".$senha.";";
			$result = $mysqli->ExecutarSQL($query);
			$nroLinhas = $mysqli->LinhasAfetadas();
			if($nroLinhas > 0){
				$retorno = '{"retorno": "sucesso"}';
			} else {
				$retorno = '{"retorno": "erro"}';	
			}
		} else {
			$retorno = '{"retorno": "email"}';
		}
					
		echo $retorno;

		break;

	case 'alteraSenha':

		$senha = sqlvalue(md5($_POST['iptSenha']), true);
		$novaSenha = sqlvalue(md5($_POST['iptNovaSenha']), true);
		$idPessoa = sqlvalue($_SESSION['sessionIdPessoa'], false);

		$query = "UPDATE e_PESSOA SET SENHA = ".$novaSenha." WHERE ID_PESSOA = ".$idPessoa." AND SENHA = ".$senha.";";
		$result = $mysqli->ExecutarSQL($query);
		$nroLinhas = $mysqli->LinhasAfetadas();
		if($nroLinhas > 0){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';	
		}
					
		echo $retorno;

		break;

	case 'alteraEndereco':

		$iptCep					= str_replace('-', '', $_POST['iptCep']);
	    $iptCep 				= sqlvalue($iptCep, true);
	    $radTipoEndereco 		= sqlvalue($_POST['radTipoEndereco'], true);
	    $iptEndereco 			= sqlvalue($_POST['iptEndereco'], true);
	    $iptNumero 				= sqlvalue($_POST['iptNumero'], true);
	    $iptComplemento 		= sqlvalue($_POST['iptComplemento'], true); 
	    $iptBairro 				= sqlvalue($_POST['iptBairro'], true);
	    $iptIdCidade 			= sqlvalue($_POST['iptIdCidade'], false);
	    $iptEstado 				= sqlvalue($_POST['iptEstado'], true);
	    $iptIdentificacaoEndereco 			= sqlvalue($_POST['iptIdentificacaoEndereco'], true);
	    $textAreaReferencia 	= sqlvalue($_POST['textAreaReferencia'], true);
	    $idPessoaEndereco 		= sqlvalue($_POST['idPessoaEndereco'], false);
	    $checkboxEnderecoPrincipal = sqlvalue($_POST['checkboxEnderecoPrincipal'], true);
	    $radTipoEndereco		= sqlvalue($_POST['radTipoEndereco'], true);


	    $query = "UPDATE e_PESSOA_ENDERECO
					 SET ENDERECO = ".$iptEndereco."
					      ,NUMERO = ".$iptNumero."
					      ,COMPLEMENTO = ".$iptComplemento."
					      ,BAIRRO = ".$iptBairro."
					      ,MUNI_ID_MUNICIPIO = ".$iptIdCidade."
					      ,CEP_ID_CEP = ".$iptCep."
					      ,REFERENCIA = ".$textAreaReferencia."
					      ,APELIDO_ENDERECO = ".$iptIdentificacaoEndereco."
					      ,ENDERECO_PRINCIPAL = ".$checkboxEnderecoPrincipal."
					      ,TIPO_ENDERECO = ".$radTipoEndereco."
					      ,DATA_UPDATE = now()
					      ,USUARIO_UPDATE = 'actions/cadastro.php'
					 WHERE ID_PESSOA_ENDERECO = ".$idPessoaEndereco."";

		$result = $mysqli->ExecutarSQL($query);

		if($result){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';	
		}

		echo $retorno;

		break;

	case 'enviaNovaSenha':

		$email = sqlvalue($_POST['email'], true);
		$emailPessoa = $_POST['email'];

		$query = "SELECT ID_PESSOA, NOME FROM e_PESSOA WHERE EMAIL = ".$email."";

			$result = $mysqli->ConsultarSQL($query);

			if($result[0]['ID_PESSOA']){

				$idPessoa = $result[0]['ID_PESSOA'];
				$nomePessoa = $result[0]['NOME'];

				$novaSenha1 = RandomString(8);
				$novaSenha = md5($novaSenha1);
				$novaSenha = sqlvalue($novaSenha, true);
				$query = "UPDATE e_PESSOA SET SENHA = ".$novaSenha." WHERE ID_PESSOA = ".$idPessoa."";
				$mysqli->ExecutarSQL($query);

				$enviaEmail = enviaEmail('novaSenha', $nomePessoa, $emailPessoa, $novaSenha1);

				if($enviaEmail){
					$retorno = '{"retorno": "sucesso", "mensagem": "<br>Um e-mail com sua nova senha foi enviado para '.$email.'"}';
				} else {
					$retorno = '{"retorno": "erroEmail", "mensagem": "<br>N&atilde;o foi poss&iacute;vel enviar nova senha, tente novamente mais tarde."}';
				}

			} else {
				$retorno = '{"retorno": "erro", "mensagem": "<br>E-mail informado n&atilde;o foi encontrado em nossos cadastros."}';
			}

		echo $retorno;

		break;

	case 'insereNovoEndereco':

		require_once CLASS_DIR.'pedido.class.php';
		$Pedido = new Pedido($mysqli);

	    $iptCep 					= sqlvalue($_POST['iptCep'], true);
	    $radTipoEndereco 			= sqlvalue($_POST['radTipoEndereco'], true);
	    $iptEndereco 				= sqlvalue($_POST['iptEndereco'], true);
	    $iptNumero 					= sqlvalue($_POST['iptNumero'], true);
	    $iptComplemento 			= sqlvalue($_POST['iptComplemento'], true); 
	    $iptBairro 					= sqlvalue($_POST['iptBairro'], true);
	    $iptCidade 					= sqlvalue($_POST['iptCidade'], true);
	    $iptPais 					= sqlvalue($_POST['iptPais'], true);
	    $iptEstado 					= sqlvalue($_POST['iptEstado'], true);
	    $iptIdentificacaoEndereco 	= sqlvalue($_POST['iptIdentificacaoEndereco'], true);
	    $textAreaReferencia 		= sqlvalue($_POST['textAreaReferencia'], true);
	    $idPessoaEndereco 			= sqlvalue($_POST['idPessoaEndereco'], false);
	    $pagina						= $_POST['pagina'];
	    $idPessoa 					= sqlvalue($_POST['idPessoa'], false);
	    $idPedido 					= sqlvalue($_POST['idPedido'], false);

	   	$queryEndereco = "INSERT INTO e_PESSOA_ENDERECO
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
									           ,ENDERECO_PRINCIPAL
									           ,DATA_INSERT
									           ,USUARIO_INSERT)
									     VALUES
									           (".$idPessoa."
									           ,".$iptEndereco."
									           ,".$iptNumero."
									           ,".$iptComplemento."
									           ,".$iptBairro."
									           ,".$iptCidade."
									           ,".$iptCep."
									           ,".$iptEstado."
									           ,".$iptPais."
									           ,".$textAreaReferencia."
									           ,".$iptIdentificacaoEndereco."
									           ,'N'
									           ,now()
											   ,'actions/cadastro.php');";

//printr($queryEndereco);	

		$resultEndereco = $mysqli->ExecutarSQL($queryEndereco);

		$query = "SELECT MAX(ID_PESSOA_ENDERECO) ID_PESSOA_ENDERECO
							FROM e_PESSOA_ENDERECO
							WHERE PESS_ID_PESSOA = ".$idPessoa.";";
		$idPessoaEndereco = $mysqli->ConsultarSQL($query);
		$idPessoaEndereco = $idPessoaEndereco[0]['ID_PESSOA_ENDERECO'];

		if($pagina == 'checkout'){
			$Pedido->fnPedidoEnderecoUpdate($idPedido, $idPessoaEndereco);
		}

		if($resultEndereco){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}

		echo $retorno;

		break;

	case 'alterarDadosGerais':

		if($_POST['checkNewsletter']){
    		$checkboxReceberNews = sqlvalue('S', true);
    	} else {
			$checkboxReceberNews = sqlvalue('N', true);
    	}

   		$idPessoa 				= sqlvalue($_POST['idPessoa'], false);

	    $iptNomeFantasia 		= sqlvalue($_POST['iptNomeFantasia'], true);
	    $iptIe 					= sqlvalue($_POST['iptIe'], true);
	    $iptContato 			= sqlvalue($_POST['iptContato'], true);
	    $iptApelido 			= sqlvalue($_POST['iptApelido'], true);
	    $iptNome 				= sqlvalue($_POST['iptNome'], true);
	    $iptSobrenome 			= sqlvalue($_POST['iptSobrenome'], true);
	    $iptSexo 				= sqlvalue($_POST['iptSexo'], true);

	    if($_POST['iptRazaoSocial']){
	    	$iptNome 			= sqlvalue($_POST['iptRazaoSocial'], true); 
		} 

		$iptCpf					= str_replace('.', '', $_POST['iptCpf']);
	    $iptCpf					= str_replace('-', '', $iptCpf);
	    $iptCpf 				= sqlvalue($iptCpf, true);
	    $iptCnpj				= str_replace('.', '', $_POST['iptCnpj']);
	    $iptCnpj				= str_replace('/', '', $iptCnpj);
	    $iptCnpj				= str_replace('-', '', $iptCnpj);
	    $iptCnpj 				= sqlvalue($iptCnpj, true); 
		$iptNascimento 			= sqlvalue(formataDataInsert($_POST['iptNascimento']), true);

		$iptSenha 				= sqlvalue(md5($_POST['iptSenha']), true);

		$queryValida = "SELECT 1 FROM e_PESSOA WHERE ID_PESSOA = ".$idPessoa." AND SENHA = ".$iptSenha.";";
		$resultValida = $mysqli->ConsultarSQL($queryValida);

		if(count($resultValida) > 0){

			$query = "UPDATE e_PESSOA
							SET NOME_FANTASIA = ".$iptNomeFantasia.",
								IE = ".$iptIe.",
								NOME_CONTATO = ".$iptContato.",
								APELIDO = ".$iptApelido.",
								NOME = ".$iptNome.",
								SOBRENOME = ".$iptSobrenome.",
								SEXO = ".$iptSexo.",
								CPF = ".$iptCpf.",
								CNPJ = ".$iptCnpj.",
								DATA_NASCIMENTO = ".$iptNascimento.",
								NEWSLETTER = ".$checkboxReceberNews."
					  WHERE ID_PESSOA = ".$idPessoa.";
					  ";

		    $iptTelefoneResidencial = removeCharSpecial($_POST['iptTelefoneResidencial']);
		    $iptTelefoneCelular 	= removeCharSpecial($_POST['iptTelefoneCelular']);

		    $arrayContatos = array();
		    if($iptTelefoneResidencial) $arrayContatos['1'] = $iptTelefoneResidencial; 
		    if($iptTelefoneCelular) $arrayContatos['2'] = $iptTelefoneCelular;

		    $query .= "DELETE FROM e_PESSOA_CONTATO WHERE PESS_ID_PESSOA = ".$idPessoa.";
		   			  ";
		    foreach ($arrayContatos as $key => $value) {
				if($value){
					$value = sqlvalue($value, true);
					$query .= "INSERT INTO e_PESSOA_CONTATO
								           (TICO_ID_TIPO_CONTATO
								           ,PESS_ID_PESSOA
								           ,DESCRICAO
								           ,DATA_INSERT
								           ,USUARIO_INSERT)
								     VALUES
								           (".$key."
								           ,".$idPessoa."
								           ,".$value."
								           ,now()
								           ,'actions/cadastro.php');
										";
				}
				
			}

			$result = $mysqli->ExecutarMultiSQL($query);
			
			if($result){
				$return = true;
			} else {
				$return = false;
				$mensagem = 'Não foi possível editar, tente novamente mais tarde';
			}

			if($return){
				echo '{"retorno": "sucesso", "mensagem": "CADASTRO"}';
			} else {
				echo '{"retorno": "erro", "mensagem": "'.$mensagem.'"}';
			}
		} else {
			echo '{"retorno": "sucesso", "mensagem": "SENHA"}';
		}

		break;
			
	default:
		# code...
		break;
}
?>