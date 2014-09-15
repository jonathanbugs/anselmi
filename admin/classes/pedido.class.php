<?php

class Pedido {

	public function fnPedido($idPessoa=null) {
		
		if(isset($idPessoa)){
			$idPessoa = sqlvalue($idPessoa, false);
			$where = "AND PEDI.PESS_ID_PESSOA = ".$idPessoa."";
		} else {
			$where = "";
		}

        $query = "SELECT
						PEDI.ID_PEDIDO,
						CONVERT(CHAR,PEDI.DATA_EMISSAO, 103) DATA_EMISSAO,
						SUM(((PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
						- IFNULL(PEIT.VALOR_DESCONTO,0))
						+(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)) VALOR_TOTAL_PAGAMENTO,
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						IFNULL(PESS.CPF, PESS.CNPJ) CPF,
						PESS.NOME+' '+PESS.SOBRENOME NOME,
						PESS.EMAIL,
						rtrim(ltrim(CONVERT(CHAR,PEDI.DATA_EMISSAO+PEDI.PRAZO_ENTREGA_DIAS, 103))) ETA,
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
					AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."
					AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
					AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					GROUP BY
						PEDI.ID_PEDIDO,
						CONVERT(CHAR,PEDI.DATA_EMISSAO, 103),
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						IFNULL(PESS.CPF, PESS.CNPJ),
						PESS.NOME+' '+PESS.SOBRENOME,
						PESS.EMAIL,
						rtrim(ltrim(CONVERT(CHAR,PEDI.DATA_EMISSAO+PEDI.PRAZO_ENTREGA_DIAS, 103))),
						PEDI.PRAZO_ENTREGA_DIAS,
						TIFR.DESCRICAO_FRETE,
						PEDI.VALOR_FRETE,
						PEPA.VALOR_TOTAL_PAGAMENTO,
						PEPA.NUMERO_PARCELAS,
						FOPA.DESCRICAO_FORMA_PAGAMENTO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO
						".$where."";
        //printr($query);
       
        $retorno = $mysqli->ConsultarSQL($query);
			
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
		$retorno = $mysqli->ConsultarSQL($query);
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

		$retorno = $mysqli->ExecutarSQL($query);
		
		return $retorno;
    	
    }
    
    public function fnPedidoManutencao($filtro, $idSituacaoPedidoItem=null){
    	
    	if(isset($idSituacaoPedidoItem)){
    		$idSituacaoPedidoItem = sqlvalue($idSituacaoPedidoItem, false);
    		$where = "AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".$idSituacaoPedidoItem."";
    	} else {
    		$where = "";
    	}
    	
    	$query = "SELECT
						PEDI.ID_PEDIDO,
						CONVERT(CHAR, PEDI.DATA_EMISSAO, 103) DATA_EMISSAO,
						PEIT.ID_PEDIDO_ITEM,
						PISI.ID_PEDIDO_ITEM_SITUACAO,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						PEIT.PRECO_UNITARIO_VENDA,
						PEIT.QUANTIDADE,
						PEIT.QUANTIDADE_ATENDIDO,
						PROD.DESCRICAO_VENDA,
						PROD.REFERENCIA
					FROM
						e_PEDIDO PEDI,
						e_PEDIDO_ITEM PEIT,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
						e_PRODUTO_COMBINACAO PRCO,
						e_PRODUTO PROD
					WHERE
						PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
					AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."
					AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = PISI.ID_PEDIDO_ITEM_SITUACAO
					AND PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
					AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
					AND fn_situacao_pedido(PEDI.ID_PEDIDO) <> ".ID_SITUACAO_PEDIDO_ATENDIDO."";
    	
    	$result = $mysqli->ExecutarSQL($query);
    	
    	$pedido = array();
    	while($row = @mssql_fetch_assoc($result)){
    		$pedido[$row["ID_PEDIDO"]][] = $row;
    	}
    	//printr($pedido);
    	$retorno = $pedido;
		
		return $retorno;
    	
    }
    
 
}

?>