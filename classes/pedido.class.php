<?php

class Pedido {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnPedido($idPessoa=null) {
		
		if(isset($idPessoa)){
			$idPessoa = sqlvalue($idPessoa, false);
			$where = "AND PEDI.PESS_ID_PESSOA = ".$idPessoa."";
		} else {
			$where = "";
		}

		if(ID_LOJA <> 1){
			$whereIdLoja = "AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."";
		} else {
			$whereIdLoja = "";
		}

        $query = "SELECT
        				PEDI.ID_PEDIDO,
						PEDI.NUMERO_PEDIDO,
						date_format(PEDI.DATA_EMISSAO,'%d/%m/%Y %H:%i:%s') DATA_EMISSAO,
						SUM(((PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
						- (IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0)))
						+(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)) VALOR_TOTAL_PAGAMENTO,
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						IFNULL(PESS.CPF, PESS.CNPJ) CPF,
						PESS.NOME+' '+PESS.SOBRENOME NOME,
						PESS.EMAIL,
						rtrim(ltrim(date_format(ADDDATE(PEDI.DATA_EMISSAO, PEDI.PRAZO_ENTREGA_DIAS), '%d/%m/%Y'))) ETA,
						PEDI.PRAZO_ENTREGA_DIAS,
						TIFR.DESCRICAO_FRETE,
						PEDI.VALOR_FRETE
					FROM
						e_PEDIDO PEDI,
						e_PEDIDO_PAGAMENTO PEPA,
						e_FORMA_PAGAMENTO FOPA,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_PESSOA PESS,
						e_TIPO_FRETE TIFR,
						e_PEDIDO_ITEM PEIT
					WHERE
						PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
					AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
					AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
					AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
					".$whereIdLoja."
					AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
					AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					AND PEPA.ATIVO = 'S'
					".$where."
					GROUP BY
						PEDI.ID_PEDIDO,
						PEDI.NUMERO_PEDIDO,
						date_format(PEDI.DATA_EMISSAO,'%d/%m/%Y %H:%i:%s'),
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						IFNULL(PESS.CPF, PESS.CNPJ),
						PESS.NOME+' '+PESS.SOBRENOME,
						PESS.EMAIL,
						rtrim(ltrim(date_format(ADDDATE(PEDI.DATA_EMISSAO, PEDI.PRAZO_ENTREGA_DIAS), '%d/%m/%Y'))),
						PEDI.PRAZO_ENTREGA_DIAS,
						TIFR.DESCRICAO_FRETE,
						PEDI.VALOR_FRETE,
						PEPA.VALOR_TOTAL_PAGAMENTO,
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO
						";
        //printr($query);
       
        $retorno = $this->mysqli->ConsultarSQL($query);
			
        return $retorno;

    }
    
    public function fnNroParcelas(){
    	
	    $nroMaximoParcelas = NUMERO_MAXIMO_PARCELAS;
		for ($i=1; $i<=$nroMaximoParcelas; $i++) { 
			$nroParcelas[] = $i;
		}
		
		return $nroParcelas;
    	
    }
    
    public function fnTipoFrete(){
    	
    	$query = "SELECT ID_TIPO_FRETE, DESCRICAO_FRETE FROM e_TIPO_FRETE";
		$retorno = $this->mysqli->ConsultarSQL($query);
		return  $retorno;
    	
    }
    
    public function fnFormaPagamento(){
    	
    	$query = "SELECT 
						FPTI.ID_FORMA_PAGAMENTO_TIPO,
						FPTI.DESCRICAO TIPO_FORMA_PAGAMENTO,
						FOPA.ID_FORMA_PAGAMENTO,
						FOPA.DESCRICAO_FORMA_PAGAMENTO
					FROM
						e_FORMA_PAGAMENTO_TIPO FPTI,
						e_FORMA_PAGAMENTO FOPA
					WHERE
						FPTI.ID_FORMA_PAGAMENTO_TIPO = FOPA.FPTI_ID_FORMA_PAGAMENTO_TIPO
					AND FPTI.FORMA_PAGAMENTO_TIPO_ATIVO = 'S'
					AND FOPA.FORMA_PAGAMENTO_ATIVO = 'S'";

		$retorno = $this->mysqli->ConsultarSQL($query);
		
		return $retorno;
    	
    }
    
    public function fnPedidoManutencao($idSituacaoPedidoItem=null){
    	
    	if(isset($idSituacaoPedidoItem)){
    		$addWhere = "";
    		if($idSituacaoPedidoItem == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){
    			$addWhere = " OR PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_PROD_INDISPONIVEL."";
    		}
    		$idSituacaoPedidoItem = sqlvalue($idSituacaoPedidoItem, false);
    		$where = "AND (PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".$idSituacaoPedidoItem." ".$addWhere.")";
    	} else {
    		$where = "";
    	}
    	
    	$query = "SELECT
						PEDI.ID_PEDIDO,
						date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y') DATA_EMISSAO,
						PEIT.ID_PEDIDO_ITEM,
						PISI.ID_PEDIDO_ITEM_SITUACAO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						PEIT.PRECO_UNITARIO_VENDA,
						PEIT.QUANTIDADE,
						PEIT.QUANTIDADE_ATENDIDO,
						PROD.DESCRICAO_VENDA,
						PROD.REFERENCIA,
						PEDI.NUMERO_PEDIDO,
						fn_atributo_produto_combinacao(PRCO.ID_PRODUTO_COMBINACAO) ATRIBUTO
					FROM
						e_PEDIDO PEDI,
						e_PEDIDO_ITEM PEIT,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_PRODUTO_COMBINACAO PRCO,
						e_PRODUTO PROD
					WHERE
						PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					
					AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = PISI.ID_PEDIDO_ITEM_SITUACAO
					AND PEIT.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
					".$where."
					AND PISI.CONSIDERA_VENDIDO = 'S'";

    	$result = $this->mysqli->ConsultarSQL($query);
    	
    	$pedido = array();
    	foreach ($result as $value) {
    		$pedido[$value["ID_PEDIDO"]][] = $value;
    	}
    	//printr($pedido);
    	$retorno = $pedido;
		
		return $retorno;
    	
    }

    public function fnPedidoDespacho($idSituacaoPedidoItem=null){
    	
    	if(isset($idSituacaoPedidoItem)){
    		$addWhere = "";
    		if($idSituacaoPedidoItem == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){
    			$addWhere = " OR fn_situacao_pedido(PEDI.ID_PEDIDO) = ".ID_SITUACAO_PEDIDO_PROD_INDISPONIVEL."";
    		}
    		$idSituacaoPedidoItem = sqlvalue($idSituacaoPedidoItem, false);
    		$where = "AND (fn_situacao_pedido(PEDI.ID_PEDIDO) = ".$idSituacaoPedidoItem." ".$addWhere.")";
    	} else {
    		$where = "";
    	}
    	
    	$query = "SELECT
						PEDI.ID_PEDIDO,
						date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y') DATA_EMISSAO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						PEDI.NUMERO_PEDIDO,
						PESS.NOME,
						PESS.EMAIL
					FROM
						e_PEDIDO PEDI,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_PESSOA PESS
					WHERE
						PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
					AND PISI.ID_PEDIDO_ITEM_SITUACAO = fn_situacao_pedido(PEDI.ID_PEDIDO)
					".$where."
					AND PISI.CONSIDERA_VENDIDO = 'S'";
    	
    	$result = $this->mysqli->ConsultarSQL($query);
    	    	
		return $result;
    	
    }

    public function fnGravaPedido(){

    	$idPessoa = sqlvalue($_SESSION['sessionIdPessoa'], false);
    	$idPromocaoCarrinho = sqlvalue($_SESSION['sessionIdPromocaoCarrinho'], true);
    	$valorFrete = sqlvalue($_SESSION['sessionValorFreteCarrinho'], true);
    	$tipoFrete = sqlvalue($_SESSION['sessionTipoFreteCarrinho'], true);

    	//verifica se existe lista de casamento
    	if($_SESSION['sessionIdListaCasamento']){
			$idListaCasamento = sqlvalue($_SESSION['sessionIdListaCasamento'], false);
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";

			$tipoFrete = sqlvalue(ID_TIPO_FRETE_TRANSP_PADRAO, true);
		} else {
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
		}

    	$queryCarrinho = "SELECT
					           CARR.ID_CARRINHO
					      FROM 
					      		e_CARRINHO CARR,
					      		".TABELA_PRODUTO_SITE." TPSI
					     WHERE 
					     		CARR.DATA_DELETE IS NULL
					     	AND CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
					     	AND IFNULL(CARR.FINALIZADO,'N') = 'N'
							AND CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' 
							AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
							".$whereListaCasamento."
							-- AND CARR.PESS_ID_PESSOA = ".$idPessoa."";

		$resultCarrinho = $this->mysqli->ConsultarSQL($queryCarrinho);

		foreach ($resultCarrinho as $value) {
			//cancela pedidos do mesmo carrinho em uma nova tentativa de compra
			$queryCancelaPedido .= "UPDATE e_PEDIDO_ITEM SET SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_TIMEOUT." 
									WHERE CARR_ID_CARRINHO = ".$value['ID_CARRINHO'].";
									";
		}
		
		$this->mysqli->ExecutarMultiSQL($queryCancelaPedido);

    	$queryPedido = "INSERT INTO e_PEDIDO
						           (NUMERO_PEDIDO
						           ,LOJA_ID_LOJA
						           ,PESS_ID_PESSOA
						           ,TIFR_ID_TIPO_FRETE
						           ,VALOR_FRETE
						           ,FRETE_GRATIS
						           ,PRCA_ID_PROMOCAO_CARRINHO
						           ,PRAZO_ENTREGA_DIAS
						           ,USUARIO_INSERT)
						     VALUES
						           (NULL
						           ,".ID_LOJA."
						           ,".$idPessoa."
						           ,".$tipoFrete."
						           ,".$valorFrete."
						           ,'N'
						           ,".$idPromocaoCarrinho."
						           ,NULL
						           ,'classes/pedido.class.php');";

    	$resultPedido = $this->mysqli->ExecutarSQL($queryPedido);

    	$idPedido = $this->mysqli->InsertId();

    	if($idPedido){

    		$_SESSION['sessionIdPedido'] = $idPedido;

    		$queryItemEnderecoPedido = "INSERT INTO e_PEDIDO_ITEM
										           (SPIT_ID_SITUACAO_PEDIDO_ITEM
										           ,PEDI_ID_PEDIDO
										           ,CARR_ID_CARRINHO
										           ,COD_TEMP_CLIENTE
										           ,PRCO_ID_PRODUTO_COMBINACAO
										           ,QUANTIDADE
										           ,PRECO_UNITARIO_VENDA
										           ,PACOTE_PRESENTE
										           ,VALOR_PACOTE_PRESENTE
										           ,LICA_ID_LISTA_CASAMENTO
										           ,USUARIO_INSERT)
										     SELECT
										           ".ID_SITUACAO_PEDIDO_DIGITACAO."
										           ,".$idPedido."
										           ,CARR.ID_CARRINHO
										           ,CARR.COD_TEMP_CLIENTE
										           ,CARR.PRCO_ID_PRODUTO_COMBINACAO
										           ,CARR.QUANTIDADE
										           ,CARR.PRECO_UNITARIO_VENDA
										           ,CARR.PACOTE_PRESENTE
										           ,CARR.VALOR_PACOTE_PRESENTE
										           ,CARR.LICA_ID_LISTA_CASAMENTO
										           ,'classes/pedido.class.php'
										      FROM 
										      		e_CARRINHO CARR,
										      		".TABELA_PRODUTO_SITE." TPSI
										     WHERE 
										     		CARR.DATA_DELETE IS NULL
										     	AND CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
										     	AND IFNULL(CARR.FINALIZADO,'N') = 'N'
												AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' 
												-- OR CARR.PESS_ID_PESSOA = ".$idPessoa."
												)
												AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
												".$whereListaCasamento.";
											";

			if($_SESSION['sessionIdListaCasamento']){
				$whereEndereco = "SELECT
									   ".$idPedido."
									   ,NULL
									   ,LCEN.ENDERECO
									   ,LCEN.NUMERO
									   ,LCEN.COMPLEMENTO
									   ,LCEN.BAIRRO
									   ,MUNI.ID_MUNICIPIO
									   ,LCEN.CEP_ID_CEP
									   ,LCEN.REFERENCIA
									   ,'classes/pedido.class.php'
									FROM
										e_LISTA_CASAMENTO_ENDERECO LCEN,
										e_CEP CEP,
										e_BAIRRO BAIR,
										e_MUNICIPIO MUNI
									WHERE
										LCEN.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."
									AND LCEN.TIPO_ENDERECO = 'ENTREGA'
									AND CEP.BAIR_ID_BAIRRO = BAIR.ID_BAIRRO
									AND BAIR.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
									LIMIT 1;
									";
			} else {
				$whereEndereco = "SELECT
							           ".$idPedido."
							           ,PEEN.ID_PESSOA_ENDERECO
							           ,PEEN.ENDERECO
							           ,PEEN.NUMERO
							           ,PEEN.COMPLEMENTO
							           ,PEEN.BAIRRO
							           ,PEEN.MUNICIPIO
							           ,PEEN.UF
							           ,PEEN.PAIS
							           ,PEEN.CEP
							           ,PEEN.REFERENCIA
							           ,PEEN.APELIDO_ENDERECO
							           ,PEEN.TIPO_ENDERECO
							           ,'classes/pedido.class.php'
							      FROM
							      		e_PESSOA_ENDERECO PEEN
							      WHERE
							      		PEEN.PESS_ID_PESSOA = ".$idPessoa."
							      	AND IFNULL(PEEN.ENDERECO_PRINCIPAL,'S') = 'S'
							      	LIMIT 1;
							      	";
			}

			$queryItemEnderecoPedido .= "INSERT INTO e_PEDIDO_ENDERECO
										           (PEDI_ID_PEDIDO
										           ,PEEN_ID_PESSOA_ENDERECO
										           ,ENDERECO
										           ,NUMERO
										           ,COMPLEMENTO
										           ,BAIRRO
										           ,MUNICIPIO
										           ,UF
										           ,PAIS
										           ,CEP
										           ,REFERENCIA
										           ,APELIDO_ENDERECO
										           ,TIPO_ENDERECO
										           ,USUARIO_INSERT)
										     ".$whereEndereco."
										";

			$queryItemEnderecoPedido .= "UPDATE e_PRODUTO_COMBINACAO_ESTOQUE PCES INNER JOIN e_PEDIDO_ITEM PEIT
																					  	  ON PEIT.CARR_ID_CARRINHO = PCES.CARR_ID_CARRINHO
																					     AND PEIT.PEDI_ID_PEDIDO = ".$idPedido."
										SET PCES.PEIT_ID_PEDIDO_ITEM = PEIT.ID_PEDIDO_ITEM;
										";
//printr($queryItemEnderecoPedido);
			$resultItemEnderecoPedido = $this->mysqli->ExecutarMultiSQL($queryItemEnderecoPedido);

			if($resultItemEnderecoPedido){
				$retorno = true;
			} else {
				$retorno = false;
			}

			
			if(!$retorno){
				
				$_SESSION['sessionIdPedido'] = '';

				$this->mysqli->ExecutarMultiSQL("DELETE FROM e_PEDIDO_ITEM WHERE PEDI_ID_PEDIDO = ".$idPedido.";
							 DELETE FROM e_PEDIDO_ENDERECO WHERE PEDI_ID_PEDIDO = ".$idPedido.";
							 DELETE FROM e_PEDIDO WHERE ID_PEDIDO = ".$idPedido.";");
			}

    	} else {
    		$_SESSION['sessionIdPedido'] = '';
    		$retorno = false;
    	}

    	return $retorno;

    }

    public function fnPedidoFinaliza($idPedido=null, $idListaCasamento=null){

    	if(isset($idPedido)){
    		$idPedido = sqlvalue($idPedido, false);
    		$where = "PEDI.ID_PEDIDO = ".$idPedido."";
    	}

    	if(isset($idListaCasamento)){
    		$idListaCasamento = sqlvalue($idListaCasamento, false);
    		$where = "PEIT.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." 
    				  AND PISI.ID_PEDIDO_ITEM_SITUACAO = 3 ";
    	}

    	$query = "SELECT 
						PEDI.TIFR_ID_TIPO_FRETE,
						PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0) PRECO_UNITARIO_VENDA,
						PEIT.QUANTIDADE,
						PEDI.VALOR_FRETE,
						IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0) VALOR_DESCONTO,
						PROD.NOME DESCRICAO_VENDA,
						PEIT.PACOTE_PRESENTE,
						PEIT.VALOR_PACOTE_PRESENTE,
						PEDI.VALOR_FRETE,
						PEDI.FRETE_GRATIS,
						TIFR.DESCRICAO_FRETE,
						PEDI.PRAZO_ENTREGA_DIAS,
						PEDI.NUMERO_PEDIDO,
						PESS.EMAIL,
						PCIM.IMAGEM,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						PISI.ID_PEDIDO_ITEM_SITUACAO,
						PESS.NOME,
						PESS.ID_PESSOA,
						PESS.SOBRENOME,
						PROD.REFERENCIA,
						PEIT.COD_RASTREAMENTO,
						fn_produto_categoria_final(PROD.ID_PRODUTO) CATEGORIA,
						CAST(PEIT.DATA_INSERT AS DATE) DATA_INSERT,
						PROD.ID_PRODUTO,
						PEIT.LICA_ID_LISTA_CASAMENTO,
						PEDI.MENSAGEM_LISTA_CASAMENTO,
						fn_atributo_produto_combinacao(PEIT.PRCO_ID_PRODUTO_COMBINACAO) ATRIBUTO
					FROM
						e_PEDIDO PEDI LEFT JOIN e_TIPO_FRETE TIFR
											 ON TIFR.ID_TIPO_FRETE = PEDI.TIFR_ID_TIPO_FRETE,
						e_PEDIDO_ITEM PEIT,
						e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
														 ON PRCO.ID_PRODUTO_COMBINACAO = PCIM.PRCO_ID_PRODUTO_COMBINACAO
														AND PCIM.PRINCIPAL = 'S',
						e_PRODUTO PROD,
						e_PESSOA PESS,
						e_PEDIDO_ITEM_SITUACAO PISI
					WHERE
					".$where."	
					AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					AND PEIT.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
					AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
					AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
					";
		
		$result = $this->mysqli->ConsultarSQL($query);

		//printr($query);

		return $result;

    }

    public function fnPedidoEnderecoFinaliza($idPedido){

    	$idPedido = sqlvalue($idPedido, false);

    	$query = "SELECT
						PEEN.ID_PEDIDO_ENDERECO,
						PEEN.ENDERECO,
						PEEN.NUMERO,
						PEEN.COMPLEMENTO,
						PEEN.BAIRRO,
						PEEN.MUNICIPIO NOME_MUNICIPIO,
						PEEN.UF,
						PEEN.CEP,
						PEEN.PEEN_ID_PESSOA_ENDERECO,
						PEEN.APELIDO_ENDERECO,
						PEEN.REFERENCIA
					FROM
						e_PEDIDO_ENDERECO PEEN
					WHERE
						PEEN.PEDI_ID_PEDIDO = ".$idPedido."
					";

		$result = $this->mysqli->ConsultarSQL($query);

		return $result;

    }

    public function fnPedidoEnderecoUpdate($idPedido, $idPessoaEndereco){

    	$idPessoaEndereco = sqlvalue($idPessoaEndereco, false);
    	$idPedido = sqlvalue($idPedido, false);

    	$query = "	DELETE FROM e_PEDIDO_ENDERECO WHERE PEDI_ID_PEDIDO = ".$idPedido.";
    				INSERT INTO e_PEDIDO_ENDERECO
					           (PEDI_ID_PEDIDO
					           ,PEEN_ID_PESSOA_ENDERECO
					           ,ENDERECO
					           ,NUMERO
					           ,COMPLEMENTO
					           ,BAIRRO
					           ,MUNICIPIO
					           ,UF
					           ,PAIS
					           ,CEP
					           ,REFERENCIA
					           ,APELIDO_ENDERECO
					           ,TIPO_ENDERECO
					           ,USUARIO_INSERT)
						SELECT
					           ".$idPedido."
					           ,PEEN.ID_PESSOA_ENDERECO
					           ,PEEN.ENDERECO
					           ,PEEN.NUMERO
					           ,PEEN.COMPLEMENTO
					           ,PEEN.BAIRRO
					           ,PEEN.MUNICIPIO
					           ,PEEN.UF
					           ,PEEN.PAIS
					           ,PEEN.CEP
					           ,PEEN.REFERENCIA
					           ,PEEN.APELIDO_ENDERECO
					           ,PEEN.TIPO_ENDERECO
					           ,'classes/pedido.class.php'
					      FROM
					      		e_PESSOA_ENDERECO PEEN
					      WHERE
					      		PEEN.ID_PESSOA_ENDERECO = ".$idPessoaEndereco."";

		$result = $this->mysqli->ExecutarMultiSQL($query);

		return $result;
    }

    public function fnPedidoPagamento($idPedido){

    	$idPedido = sqlvalue($idPedido, false);

    	$query = "SELECT 
						FPTI.DESCRICAO,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PEPA.VALOR_TOTAL_PAGAMENTO,
						PEPA.NUMERO_PARCELAS
					FROM
						e_PEDIDO_PAGAMENTO PEPA,
						e_FORMA_PAGAMENTO FOPA,
						e_FORMA_PAGAMENTO_TIPO FPTI
					WHERE
						PEPA.PEDI_ID_PEDIDO = ".$idPedido."
					AND PEPA.ATIVO = 'S'
					AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
					AND FOPA.FPTI_ID_FORMA_PAGAMENTO_TIPO = FPTI.ID_FORMA_PAGAMENTO_TIPO";

    	$result = $this->mysqli->ConsultarSQL($query);

		return $result;

    }


    public function fnMeusPedidos($idPessoa){

    	$idPessoa = sqlvalue($idPessoa, false);

    	$query = "SELECT 
						PEDI.TIFR_ID_TIPO_FRETE,
						PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0) PRECO_UNITARIO_VENDA,
						PEIT.QUANTIDADE,
						PEDI.VALOR_FRETE,
						IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0) VALOR_DESCONTO,
						PROD.DESCRICAO_VENDA,
						PEIT.PACOTE_PRESENTE,
						PEIT.VALOR_PACOTE_PRESENTE,
						PEDI.VALOR_FRETE,
						PEDI.FRETE_GRATIS,
						TIFR.DESCRICAO_FRETE,
						PEDI.PRAZO_ENTREGA_DIAS,
						PEDI.NUMERO_PEDIDO,
						PESS.EMAIL,
						PISI.DESCRICAO_SITUACAO_CLIENTE,
						CONVERT(CHAR,PEDI.DATA_EMISSAO, '%d/%m/%Y') DATA_EMISSAO,
						FPTI.DESCRICAO TIPO_FORMA_PAGAMENTO,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PEPA.NUMERO_PARCELAS,
						PEEN.ENDERECO,
						PEEN.NUMERO,
						PEEN.COMPLEMENTO,
						PEEN.BAIRRO,
						PEEN.REFERENCIA,
						MUNI.NOME_MUNICIPIO,
						MUNI.UNFE_ID_ESTADO UF,
						PEEN.CEP_ID_CEP CEP,
						PEDI.ID_PEDIDO,
						PEPA.VALOR_TOTAL_PAGAMENTO,
						PCIM.IMAGEM,
						PEIT.LICA_ID_LISTA_CASAMENTO
					FROM
						e_PEDIDO PEDI LEFT JOIN e_TIPO_FRETE TIFR
											 ON TIFR.ID_TIPO_FRETE = PEDI.TIFR_ID_TIPO_FRETE,
						e_PEDIDO_ITEM PEIT,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
																		ON PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCIM.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
																		AND PCIM.PRINCIPAL = 'S',
						e_PRODUTO_COMBINACAO PRCO,
						e_PRODUTO PROD,
						e_PESSOA PESS,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_FORMA_PAGAMENTO FOPA,
						e_FORMA_PAGAMENTO_TIPO FPTI,
						e_PEDIDO_PAGAMENTO PEPA,
						e_PEDIDO_ENDERECO PEEN,
						e_MUNICIPIO MUNI
					WHERE
						PEDI.PESS_ID_PESSOA = ".$idPessoa."
					AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					AND PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
					AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
					AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
					AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
					--AND PISI.CONSIDERA_VENDIDO = 'S'
					AND fn_situacao_pedido(PEDI.ID_PEDIDO) <> ".ID_SITUACAO_PEDIDO_TIMEOUT."
					AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
					AND FOPA.FPTI_ID_FORMA_PAGAMENTO_TIPO = FPTI.ID_FORMA_PAGAMENTO_TIPO
					AND PEPA.ATIVO = 'S'
					AND PEPA.PEDI_ID_PEDIDO = PEDI.ID_PEDIDO
					AND PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
					AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
					ORDER BY PEDI.DATA_EMISSAO DESC";

    	$result = $this->mysqli->ConsultarSQL($query);

    	return $result;

    }

    public function fnStatusPedido($idPessoa=null, $idPedido=null){

    	$where = "";
    	if($idPedido){
    		$idPedido = sqlvalue($idPedido, false);
    		$where = "AND PEDI.ID_PEDIDO = ".$idPedido."";
    	}
    	if($idPessoa){
    		$idPessoa = sqlvalue($idPessoa, false);
    		$where = "AND PEDI.PESS_ID_PESSOA = ".$idPessoa."";
    	}

    	$query = "SELECT
						Q1.ID_PEDIDO,
						Q1.ID_SITUACAO,
						Q1.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						date_format(Q1.DATA, '%d/%m/%Y') DATA,
						Q1.COD_RASTREAMENTO
					FROM (SELECT
								PEDI.ID_PEDIDO,
								PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
								MIN(PSHI.DATA_INSERT) DATA,
								PSHI.PESI_ID_PEDIDO_SITUACAO ID_SITUACAO,
								PEIT.COD_RASTREAMENTO
							FROM
								e_PEDIDO_ITEM_SITUACAO PISI,
								e_PEDIDO_SITUACAO_HISTORICO PSHI,
								e_PEDIDO PEDI,
								e_PEDIDO_ITEM PEIT
							WHERE
								PISI.ID_PEDIDO_ITEM_SITUACAO = PSHI.PESI_ID_PEDIDO_SITUACAO
							AND PSHI.PEDI_ID_PEDIDO = PEDI.ID_PEDIDO
							AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
							".$where."
							GROUP BY
								PEDI.ID_PEDIDO,
								PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
								PSHI.PESI_ID_PEDIDO_SITUACAO,
								PEIT.COD_RASTREAMENTO
						) Q1";

		$result = $this->mysqli->ConsultarSQL($query);

    	return $result;

    }

    public function fnPedidoSituacao(){
    	$query = "SELECT ID_PEDIDO_ITEM_SITUACAO, DESCRICAO_PEDIDO_ITEM_SITUACAO FROM e_PEDIDO_ITEM_SITUACAO 
				  WHERE ATIVO = 'S'";
		$result = $this->mysqli->ConsultarSQL($query);
    	return $result;
    }


}

?>