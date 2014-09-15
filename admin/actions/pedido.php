<?php

require_once('../configs/config.php');
require_once(PHP_ROOT.'/'.CLASS_DIR.'/frete.class.php');
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pessoa.class.php');

$Frete = new Frete($mysqli);
$Pessoa = new Pessoa($mysqli);

if (isset($_POST['acao'])) {
	$acao = $_POST['acao'];
} else {
	$acao = '';
}


switch ($acao) {

	case 'editartransacaoAutorizada':

		$idPedido = sqlvalue($_POST["idPedido"], true);
		$idPedidoPagamento = sqlvalue($_POST["idPedidoPagamento"], true);

		if ($_POST["valorCheckbox"] == 'true') {
			$valorCheckbox = sqlvalue("S", true);
			$updateAdicional = " ,DATA_AUTORIZACAO = now() ";
			$dataUpdate = date("d/m/Y");
		} else {
			$valorCheckbox = sqlvalue("N", true);
			$updateAdicional = " ,DATA_AUTORIZACAO = NULL ";
			$dataUpdate = false;
		}

		$query = "UPDATE e_PEDIDO_PAGAMENTO SET TRANSACAO_AUTORIZADA = " . $valorCheckbox . "" . $updateAdicional . " , USUARIO_UPDATE = '" . USUARIO_LOGADO . "', DATA_UPDATE = now()
				  WHERE PEDI_ID_PEDIDO = " . $idPedido . " AND ID_PEDIDO_PAGAMENTO = " . $idPedidoPagamento . "";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '", "retorno": "' . $dataUpdate . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case 'editarfreteGratis':

		$idPedido = sqlvalue($_POST["idPedido"], true);

		if ($_POST["valorCheckbox"] == 'true') {
			$valorCheckbox = sqlvalue("S", true);
		} else {
			$valorCheckbox = sqlvalue("N", true);
		}

		$query = "UPDATE e_PEDIDO SET FRETE_GRATIS = " . $valorCheckbox . ", USUARIO_UPDATE = '" . USUARIO_LOGADO . "', DATA_UPDATE = now()
				  WHERE ID_PEDIDO = " . $idPedido . "";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '", "retorno": "' . $dataUpdate . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case 'editarpedidoPagamentoAtivo':

		$idPedido = sqlvalue($_POST["idPedido"], true);
		$idPedidoPagamento = sqlvalue($_POST["idPedidoPagamento"], true);

		if ($_POST["valorCheckbox"] == 'true') {
			$valorCheckbox = sqlvalue("S", true);
		} else {
			$valorCheckbox = sqlvalue("N", true);
		}

		$query = "UPDATE e_PEDIDO_PAGAMENTO SET ATIVO = " . $valorCheckbox . ", USUARIO_UPDATE = '" . USUARIO_LOGADO . "', DATA_UPDATE = now()
				  WHERE PEDI_ID_PEDIDO = " . $idPedido . " AND ID_PEDIDO_PAGAMENTO = " . $idPedidoPagamento . "";

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case 'editarPedidoItem':

		$idPedidoItem = sqlvalue($_POST["idPedidoItem"], false);

		$idSituacaoPedido = sqlvalue($_POST["situacaoItemPedido"], false);
		$where = "SPIT_ID_SITUACAO_PEDIDO_ITEM = " . $idSituacaoPedido . "";

		$pacotePresente = sqlvalue($_POST["pacotePresente"], true);
		if ($_POST["pacotePresente"] == "true") {
			$where .= ", VALOR_PACOTE_PRESENTE = " . VALOR_PACOTE_PRESENTE . "";
		} else {
			$where .= ", VALOR_PACOTE_PRESENTE = NULL";
		}

		$quantidadeItem = sqlvalue($_POST["quantidadeItem"], false);
		$where .= ", QUANTIDADE = " . $quantidadeItem . "";

		if (isset($_POST["valorDescontoPedidoItem"])) {
			$valorDescontoPedidoItem = sqlvalue(formataValorInsert($_POST["valorDescontoPedidoItem"]), false);
			$where .= ", VALOR_DESCONTO = " . $valorDescontoPedidoItem . "";
		} else {
			$where .= ", VALOR_DESCONTO = NULL";
		}


		$query = "UPDATE e_PEDIDO_ITEM SET " . $where . " , USUARIO_UPDATE = '" . USUARIO_LOGADO . "', DATA_UPDATE = now()
				  WHERE ID_PEDIDO_ITEM = " . $idPedidoItem . "";


		//print_r($query);

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case "editarPedido":

		$idPedido = sqlvalue($_POST["idPedido"], false);
		$cupomPromocional = sqlvalue($_POST["cupomPromocional"], true);
		$tipoFrete = sqlvalue($_POST["tipoFrete"], true);
		$valorFrete = sqlvalue(formataValorInsert($_POST["valorFrete"]), false);

		if(isset($_POST["freteGratis"])){
			$freteGratis = sqlvalue('S', true);
		} else {
			$freteGratis = sqlvalue('N', true);
		}


		$query = "UPDATE e_PEDIDO SET TIFR_ID_TIPO_FRETE = " . $tipoFrete . ", VALOR_FRETE = " . $valorFrete . ", FRETE_GRATIS = " . $freteGratis . ", USUARIO_UPDATE = '" . USUARIO_LOGADO . "', DATA_UPDATE = now()
				  WHERE ID_PEDIDO = " . $idPedido . "";

		//printr($query);

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case "cadastrarPedidoPagamento":

		$nroParcelas = sqlvalue($_POST["nroParcelas"], true);
		$formaPagamento = sqlvalue($_POST["formaPagamento"], false);
		$tipoLancamento = sqlvalue($_POST["tipoLancamento"], true);
		$valorPagamento = sqlvalue(formataValorInsert($_POST["valorPagamento"]), false);
		$idPedido = sqlvalue($_POST["idPedido"], false);

		$query = "INSERT INTO e_PEDIDO_PAGAMENTO
				           (FOPA_ID_FORMA_PAGAMENTO
				           ,PEDI_ID_PEDIDO
				           ,FINAL_CARTAO
				           ,NUMERO_CARTAO
				           ,CODIGO_SEGURANCA
				           ,DATA_VALIDADE_CARTAO
				           ,NOME_TITULAR_CARTAO
				           ,CPF_TITULAR_CARTAO
				           ,TRANSACAO_AUTORIZADA
				           ,DATA_AUTORIZACAO
				           ,USUARIO_AUTORIZACAO
				           ,ATIVO
				           ,VALOR_TOTAL_PAGAMENTO
				           ,NUMERO_PARCELAS
				           ,TIPO_LANCAMENTO
				           ,USUARIO_INSERT
				           ,DATA_INSERT)
				     VALUES
				           (" . $formaPagamento . "
				           ," . $idPedido . "
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,NULL
				           ,'S'
				           ," . $valorPagamento . "
				           ," . $nroParcelas . "
				           ," . $tipoLancamento . "
				           ,'" . USUARIO_LOGADO . "'
				           ,now())";

		//printr($query);

		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . CADASTRO_REALIZADO . '", "redirect": "pedido-visualiza&idPedido=' . $idPedido . '#pedidoPagamentoTable" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_CADASTRAR . '" }';
		}

		echo $retorno;

		break;

	case "cadastrarProdutoPedido":

		$idPedido = sqlvalue($_POST["idPedido"], false);

		$arrayProduto = explode("|", $_POST["listaEstoqueProduto"]);
		$idProdutoAtributoValor = sqlvalue($arrayProduto[1], false);
		$idProduto = sqlvalue($arrayProduto[0], false);

		$query = "INSERT INTO e_PEDIDO_ITEM
				           (SPIT_ID_SITUACAO_PEDIDO_ITEM
				           ,PEDI_ID_PEDIDO
				           ,CARR_ID_CARRINHO
				           ,COD_TEMP_CLIENTE
				           ,PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
				           ,QUANTIDADE
				           ,PRECO_UNITARIO_VENDA
				           ,PACOTE_PRESENTE
				           ,VALOR_PACOTE_PRESENTE
				           ,PACOTE_PRESENTE_GRATIS
				           ,QUANTIDADE_ATENDIDO
				           ,VALOR_DESCONTO
				           ,USUARIO_INSERT
				           ,DATA_INSERT)
				     VALUES
				           (" . ID_SITUACAO_PEDIDO_ANALISE_CREDITO . "
				           ," . $idPedido . "
				           ,NULL
				           ,NULL
				           ," . $idProdutoAtributoValor . "
				           ,1
				           ,(select VALOR from fn_valor_venda_produto(" . $idProduto . ",1,now()))
				           ,'N'
				           ,NULL
				           ,'N'
				           ,NULL
				           ,NULL
				           ,'" . USUARIO_LOGADO . "'
				           ,now())";
		//printr($query);
		$resultQuery = $mysqli->ExecutarSQL($query);

		if ($resultQuery) {

			$frete = $Frete->fnFrete(NULL, $idPedido);

			$retorno = '{ "cod": "sucesso", "mensagem": "' . CADASTRO_REALIZADO . '", "redirect": "pedido-visualiza" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_CADASTRAR . '" }';
		}

		echo $retorno;

		break;

	case "calcularFretePedido":

		$tipoFrete = $_POST["tipoFrete"];
		$idPedido = $_POST["idPedido"];

		$frete = $Frete->fnFrete($tipoFrete, $idPedido);

		if ($frete) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . NOVO_CALCULO_FRETE . '", "valorFrete": "' . number_format($frete[0]["VALOR_FRETE"], 2, ',', '.') . '", "freteGratis": "' . $frete[0]["FRETE_GRATIS"] . '", "mensagemErro": "'.$frete[0]["MENSAGEM_ERRO"].'" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_GRAVAR . '" }';
		}

		echo $retorno;

		break;

	case 'editarCupomPedido':

		$idPedido = sqlvalue($_POST["idPedido"], false);
		$idCupom = sqlvalue($_POST["idCupom"], false);

		$queryDesconto = "SELECT
								PRCA.VALOR_DESCONTO,
								PRCA.TIPO_DESCONTO,
								PRCA.FRETE_GRATIS FRETE_GRATIS
							FROM
								e_PROMOCAO_CARRINHO PRCA
							WHERE
								PRCA.ID_PROMOCAO_CARRINHO = ".$idCupom."";

		$resultDesconto = $mysqli->ExecutarSQL($queryDesconto);
		$rowDesconto = @mssql_fetch_array($resultDesconto);

		$valorDesconto = $rowDesconto["VALOR_DESCONTO"];
		$tipoDesconto = $rowDesconto["TIPO_DESCONTO"];
		$freteGratis = $rowDesconto["FRETE_GRATIS"];

		$queryValorTotalPedido = "SELECT
										SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)+
										SUM(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE) VALOR_TOTAL_PEDIDO
									FROM
										e_PEDIDO_ITEM PEIT
									WHERE
										PEIT.PEDI_ID_PEDIDO = ".$idPedido."";

		$resultValorTotalPedido = $mysqli->ExecutarSQL($queryValorTotalPedido);
		$rowValorTotalPedido = @mssql_fetch_array($resultValorTotalPedido);

		$valorTotalPedido = $rowValorTotalPedido["VALOR_TOTAL_PEDIDO"];

		if($tipoDesconto == "P"){
			$valorDesconto = ($valorTotalPedido*$valorDesconto)/100;
		} else {
			$valorDesconto = $valorDesconto;
		}

		$valorDescontoCalculo = $valorDesconto/$valorTotalPedido;

		$queryAplicaDescontoItem = "IF EXISTS (SELECT 1 FROM e_PEDIDO WHERE IFNULL(PRCA_ID_PROMOCAO_CARRINHO,0) > 0 AND ID_PEDIDO = ".$idPedido.")
									BEGIN
										UPDATE e_PEDIDO_ITEM SET VALOR_DESCONTO = ROUND(((PRECO_UNITARIO_VENDA*QUANTIDADE)*".$valorDescontoCalculo."),2)
									    WHERE PEDI_ID_PEDIDO = ".$idPedido."
									END
									ELSE 
									BEGIN
										UPDATE e_PEDIDO_ITEM SET VALOR_DESCONTO = ROUND(((PRECO_UNITARIO_VENDA*QUANTIDADE)*".$valorDescontoCalculo.")+VALOR_DESCONTO,2)
									    WHERE PEDI_ID_PEDIDO = ".$idPedido."
									END";

		if(isset($freteGratis)){
			$queryUpdatePedido = "UPDATE e_PEDIDO SET FRETE_GRATIS = '".$freteGratis."' WHERE ID_PEDIDO = ".$idPedido." AND IFNULL(FRETE_GRATIS,'N') = 'N'; ";
		} else {
			$queryUpdatePedido = "";
		}
		//printr($queryUpdatePedido.$queryAplicaDescontoItem);
		$resultQueryAplicaCupom = $mysqli->ExecutarSQL($queryUpdatePedido.$queryAplicaDescontoItem);

		if($resultQueryAplicaCupom){
			$resultQuery = $mysqli->ExecutarSQL("UPDATE e_PEDIDO SET PRCA_ID_PROMOCAO_CARRINHO = ".$idCupom." WHERE ID_PEDIDO = ".$idPedido."");
		}

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '", "retorno": "' . $dataUpdate . '" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;

		break;

	case 'enderecoEntrega':
			
		$idPessoa = $_POST["idPessoa"];
			
		$enderecoEntrega = $Pessoa->fnEnderecoPessoa($idPessoa);
			
		foreach ($enderecoEntrega as $key => $value){
			$cidades[] = array(
				'optionValue' => $value['ID_PESSOA_ENDERECO'],
				'optionDisplay'	=> $value['APELIDO_ENDERECO']. " " .$value['CEP_ID_CEP']. " " .$value['ENDERECO'],
			);
		}
			
		echo( json_encode( $cidades ) );
			
		break;
			
	case 'cadastrarPedido':
			
		//printr($_POST);
			
		if(isset($_POST["idsProdutos"])){

			$idPessoa = sqlvalue($_POST["idPessoa"], false);
			$enderecoEntrega = sqlvalue($_POST["enderecoEntrega"], false);
			$tipoFreteCadastra = sqlvalue($_POST["tipoFreteCadastra"], false);
			$nroParcelas = sqlvalue($_POST["nroParcelas"], false);
			$formaPagamento = sqlvalue($_POST["formaPagamento"], false);
			$tipoLancamento = sqlvalue($_POST["tipoLancamento"], true);
			$idProduto = substr($_POST["idsProdutos"], 0, -1);
			$idProduto = explode(",", $idProduto);
			
			
			$queryPedido = "INSERT INTO e_PEDIDO
									           (LOJA_ID_LOJA
									           ,PESS_ID_PESSOA
									           ,DATA_EMISSAO
									           ,FRETE_GRATIS
									           ,VALOR_FRETE
									           ,USUARIO_INSERT
									           ,DATA_INSERT)
									     VALUES
									           (".ID_LOJA."
									           ,".$idPessoa."
									           ,now()
									           ,'N'
									           ,0
									           ,'".USUARIO_LOGADO."'
									           ,now());
							SELECT IDENT_CURRENT('e_PEDIDO') AS 'ID_PEDIDO';";
			
			$rowPedido = $mysqli->ConsultarSQL($queryPedido);
			$idPedido = $rowPedido[0]["ID_PEDIDO"];
			
			if($idPedido){
				
				$queryPedidoEndereco = "INSERT INTO e_PEDIDO_ENDERECO
											           (PEDI_ID_PEDIDO
											           ,PEEN_ID_PESSOA_ENDERECO
											           ,ENDERECO
											           ,NUMERO
											           ,COMPLEMENTO
											           ,BAIRRO
											           ,MUNI_ID_MUNICIPIO
											           ,CEP_ID_CEP
											           ,REFERENCIA
											           ,DATA_INSERT
											           ,USUARIO_INSERT)
											    SELECT 
														".$idPedido.",
														PEEN.ID_PESSOA_ENDERECO,
														PEEN.ENDERECO,
														PEEN.NUMERO,
														PEEN.COMPLEMENTO,
														PEEN.BAIRRO,
														PEEN.MUNI_ID_MUNICIPIO,
														PEEN.CEP_ID_CEP,
														PEEN.REFERENCIA,
														now(),
														'".USUARIO_LOGADO."'
													FROM
														e_PESSOA_ENDERECO PEEN
													WHERE
														PEEN.ID_PESSOA_ENDERECO = ".$enderecoEntrega."";
				
				if($mysqli->ExecutarSQL($queryPedidoEndereco)){
					
					$queryPedidoItem = "";
					foreach($idProduto as $value){
						
						$queryPedidoItem .= "INSERT INTO e_PEDIDO_ITEM
											           (SPIT_ID_SITUACAO_PEDIDO_ITEM
											           ,PEDI_ID_PEDIDO
											           ,COD_TEMP_CLIENTE
											           ,PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
											           ,QUANTIDADE
											           ,PRECO_UNITARIO_VENDA
											           ,USUARIO_INSERT
											           ,DATA_INSERT)
											     SELECT  
											           ".ID_SITUACAO_PEDIDO_ANALISE_CREDITO."
											           ,".$idPedido."
											           ,NULL
											           ,".$value."
											           ,1
											           ,(SELECT VALOR FROM fn_valor_venda_produto(PRCO.PROD_ID_PRODUTO,1,now()))
											           ,'".USUARIO_LOGADO."'
											           ,now()
											       FROM
														e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
														e_PRODUTO_COMBINACAO PRCO
													WHERE
														PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$value."
													AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO; ";
					}
					
					if($mysqli->ExecutarSQL($queryPedidoItem)){
						
						$calculaFrete = $Frete->fnFrete($tipoFreteCadastra, $idPedido);
						
						if($calculaFrete[0]["COD_ERRO"] == 0){
						
							$queryPedidoPagamento = "INSERT INTO e_PEDIDO_PAGAMENTO
														           (FOPA_ID_FORMA_PAGAMENTO
														           ,PEDI_ID_PEDIDO
														           ,ATIVO
														           ,VALOR_TOTAL_PAGAMENTO
														           ,NUMERO_PARCELAS
														           ,TIPO_LANCAMENTO
														           ,USUARIO_INSERT
														           ,DATA_INSERT)
														     SELECT 
																	".$formaPagamento."
														           ,".$idPedido."
														           ,'S'
														           ,SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)-SUM(IFNULL(PEIT.VALOR_DESCONTO,0))+IFNULL(PEDI.VALOR_FRETE,0)
														           ,".$nroParcelas."
														           ,".$tipoLancamento."
														           ,'".USUARIO_LOGADO."'
														           ,now()
																FROM
																	e_PEDIDO PEDI,
																	e_PEDIDO_ITEM PEIT
																WHERE
																	PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
																AND PEDI.ID_PEDIDO = ".$idPedido."
																GROUP BY
																	IFNULL(PEDI.VALOR_FRETE,0)
														           ";
							$mysqli->ExecutarSQL($queryPedidoPagamento);
							
							$retorno = '{ "cod": "sucesso", "mensagem": "' . CADASTRO_REALIZADO . '", "redirect": "pedido-visualiza?idPedido=' . $idPedido . '" }';
							
						} else {
							$mysqli->ExecutarSQL("DELETE FROM e_PEDIDO_ITEM WHERE PEDI_ID_PEDIDO = ".$idPedido.";
									     DELETE FROM e_PEDIDO_PAGAMENTO WHERE PEDI_ID_PEDIDO = ".$idPedido."
									     DELETE FROM e_PEDIDO WHERE ID_PEDIDO = ".$idPedido."");
							$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_GRAVAR . '-Frete" }';	
						}	
						
					} else {
						$mysqli->ExecutarSQL("DELETE FROM e_PEDIDO_ITEM WHERE PEDI_ID_PEDIDO = ".$idPedido.";
									 DELETE FROM e_PEDIDO_PAGAMENTO WHERE PEDI_ID_PEDIDO = ".$idPedido."
									 DELETE FROM e_PEDIDO WHERE ID_PEDIDO = ".$idPedido."");
						$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_GRAVAR_VERIFIQUE . '" }';
					}
						
				} else {
					$mysqli->ExecutarSQL("DELETE FROM e_PEDIDO_ITEM WHERE PEDI_ID_PEDIDO = ".$idPedido.";
								 DELETE FROM e_PEDIDO_PAGAMENTO WHERE PEDI_ID_PEDIDO = ".$idPedido."
								 DELETE FROM e_PEDIDO_ENDERECO WHERE PEDI_ID_PEDIDO = ".$idPedido."
								 DELETE FROM e_PEDIDO WHERE ID_PEDIDO = ".$idPedido."");
					$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_GRAVAR_VERIFIQUE . '" }';	
				}
				
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_GRAVAR . '" }';
			}

		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . FALTOU_SELECIONAR_PRODUTO . '" }';
		}
			
		echo $retorno;
			
		break;
		
	case 'atenderPedido':
		
		$qtdAtendidoPedidoItem = $_POST["qtdAtendido"];
		$query = "";
		foreach ($_POST["idSituacaoPedidoItem"] as $key => $value){
			
			$value = sqlvalue($value, false);
			$qtdAtendido = sqlvalue($qtdAtendidoPedidoItem[$key], false);
			
			if($qtdAtendido > 0){
				$updateAdicional = "QUANTIDADE_ATENDIDO = ".$qtdAtendido.", ";
			} else {
				$updateAdicional = "";
			}
			
			$query .= "UPDATE e_PEDIDO_ITEM SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".$value.", ".$updateAdicional." DATA_UPDATE = now(), USUARIO_UPDATE = '".USUARIO_LOGADO."'
					  WHERE ID_PEDIDO_ITEM = ".$key." AND ".$value." <> SPIT_ID_SITUACAO_PEDIDO_ITEM; ";
		}
		
		//printr($query);
		$resultQuery = $mysqli->ExecutarSQL($query);
		
		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '", "redirect": "pedido-atendimento" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}

		echo $retorno;
		
		break;
		
	case 'despacharPedido':

		set_time_limit(60);

		foreach ($_POST["idPedido"] as $idPedido){

			$codRastreamento = sqlvalue($_POST['codRastreamento'][$idPedido], true);
			$idPedido = sqlvalue($idPedido, false);
						
			$query .= "UPDATE e_PEDIDO_ITEM 
						SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DESPACHADO."
					   ,COD_RASTREAMENTO = ".$codRastreamento."
					   WHERE PEDI_ID_PEDIDO = ".$idPedido." 
					   AND SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_ATENDIDO.";
					   ";

		}
		
		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		$query = "SELECT
						PEDI.ID_PEDIDO,
						PESS.EMAIL,
						PESS.NOME
					FROM
						e_PEDIDO PEDI,
						e_PEDIDO_ITEM PEIT,
						e_PESSOA PESS
					WHERE
						PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DESPACHADO."
					AND PEIT.AVISADO_DESPACHO = 'N'
					AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
					GROUP BY
						PEDI.ID_PEDIDO,
						PESS.EMAIL,
						PESS.NOME";

		$result = $mysqli->ConsultarSQL($query);

		foreach ($result as $value) {
			
			$idPedido = $value['ID_PEDIDO'];
			$nomePessoa = $value['NOME'];
			$emailPessoa = $value['EMAIL'];
			
			$enviaEmail = enviaEmail('situacaoPedido', $nomePessoa, $emailPessoa, null, $idPedido, 'S');

			if($enviaEmail){
				$query = "UPDATE e_PEDIDO_ITEM SET AVISADO_DESPACHO = 'S' 
						  WHERE PEDI_ID_PEDIDO = ".$idPedido." 
						  AND SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DESPACHADO.";
						  ";
				$mysqli->ExecutarSQL($query);
			}
		}

		if ($resultQuery) {
			$retorno = '{ "cod": "sucesso", "mensagem": "' . EDITADO_COM_SUCESSO . '", "redirect": "pedido-despacho" }';
		} else {
			$retorno = '{ "cod": "erro", "mensagem": "' . ERRO_AO_EDITAR . '" }';
		}		
		
		echo $retorno;
		
		break;

	case "cadastraOcorrenciaPedido":
		
		$idPedido = sqlvalue($_POST['idPedido'], false);
		$idPessoa = sqlvalue($_POST['idPessoa'], false);
		$ocorrenciaPedido = sqlvalue($_POST['ocorrenciaPedido'], true);
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
				           ,".$idPedido."
				           ,".$ocorrenciaPedido."
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
		# code...
		break;
}
?>