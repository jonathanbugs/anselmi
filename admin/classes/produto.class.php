<?php

class Produto {

	public function fnProduto($idProduto) {

        $query = "SELECT 
                        PROD.ID_PRODUTO,
                        PROD.PESS_ID_PESSOA_FABRICANTE,
                        PROD.PRSI_ID_PRODUTO_SITUACAO,
                        PROD.NOME,
                        PROD.DESCRICAO_VENDA,
                        PROD.REFERENCIA,
                        PROD.COD_EAN,
                        PROD.NCM,
                        PROD.PESO_KG,
                        PROD.ALTURA_CM,
                        PROD.LARGURA_CM,
                        PROD.PROFUNDIDADE_CM,
                        CONVERT(CHAR,PROD.DATA_INICIAL_LANCAMENTO, 103) DATA_INICIAL_LANCAMENTO,
                        CONVERT(CHAR,PROD.DATA_FINAL_LANCAMENTO, 103) DATA_FINAL_LANCAMENTO,
                        PROD.DESCRICAO_CURTA,
                        PROD.DESCRICAO_LONGA,
                        PROD.META_TITLE,
                        PROD.META_DESCRIPTION,
                        PROD.META_KEYWORDS,
                        PROD.URL_AMIGAVEL,
                        (SELECT VALOR FROM fn_valor_venda_produto (PROD.ID_PRODUTO, 1, now())) PRECO_VENDA,
                        (SELECT CONVERT(CHAR,DATA_INICIAL_VALIDADE, 103) FROM fn_valor_venda_produto (PROD.ID_PRODUTO, 1, now())) DATA_INICIAL_VALIDADE
                    FROM
                        e_PRODUTO PROD
                    WHERE
                        PROD.ID_PRODUTO = ".$idProduto."";
        
        $retorno = $mysqli->ConsultarSQL($query);
			
        return $retorno;

    }

    public function fnAtributo(){

        $query = "SELECT 
                        ATRI.ID_ATRIBUTO,
                        ATRI.DESCRICAO_ATRIBUTO
                    FROM
                        e_ATRIBUTO ATRI
                    WHERE
                        EXISTS (SELECT 1 FROM e_ATRIBUTO_VALOR ATVA WHERE ATRI.ID_ATRIBUTO = ATVA.ATRI_ID_ATRIBUTO)";

        $retorno = $mysqli->ConsultarSQL($query);

        return $retorno;
    }

    public function fnAtributoProduto(){

        $query = "SELECT 
                        ATVA.ID_ATRIBUTO_VALOR,
                        ATVA.VALOR,
                        ATVA.ATRI_ID_ATRIBUTO
                    FROM
                        e_ATRIBUTO_VALOR ATVA";

        $retorno = $mysqli->ConsultarSQL($query);

        return $retorno;
    }

    public function fnEstoqueProduto($idProduto, $idPedido=null){

    	$where = "";
    	
        if(isset($idProduto)){
            $where .= "AND PROD.ID_PRODUTO = ".$idProduto."";
        } 
        
        if(isset($idPedido)){
        	$where .= "AND PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR NOT IN (
													        			     SELECT PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR 
													        			     FROM e_PEDIDO_ITEM PEIT WHERE PEIT.PEDI_ID_PEDIDO = ".$idPedido."
													        			     )";
        } 

        $query = "SELECT
                        DISTINCT
                        PROD.ID_PRODUTO,
                        PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_ATRIBUTO,
                        ATVA.VALOR ATRIBUTO,
                        fn_saldo_disponivel_produto(PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, now()) SALDO,
                        PCIM.IMAGEM,
                        PROD.DESCRICAO_VENDA,
                        PROD.REFERENCIA
                    FROM
                        e_PRODUTO PROD,
                        e_PRODUTO_COMBINACAO PRCO,
                        e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                                        ON PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCIM.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR,
                        e_PRODUTO_COMBINACAO_ESTOQUE PCES,
                        e_ATRIBUTO_VALOR ATVA
                    WHERE
                        PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
                    AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
                    AND PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCES.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
                    AND PCAV.ATVA_ID_ATRIBUTO_VALOR = ATVA.ID_ATRIBUTO_VALOR
                    AND (SELECT VALOR FROM fn_valor_venda_produto(PROD.ID_PRODUTO,1,now())) > 0 
                    ".$where."";

        $retorno = $mysqli->ConsultarSQL($query);

        return $retorno;

    }
    
    public function fnProdutoAtributoValor($idListaCasamento=null){
    	
    	if(isset($idListaCasamento)){
    		$leftJoin = "LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
							ON PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
						   AND LCPR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."";
    		$colunaAdicional = ",
						LCPR.VENDIDO,
						IFNULL(LCPR.ID_LISTA_CASAMENTO_PRODUTO,9999) ID_LISTA_CASAMENTO_PRODUTO_ORDEM,
						LCPR.ID_LISTA_CASAMENTO_PRODUTO,
						LCPR.ATIVO ";
    		$orderBy = "ORDER BY IFNULL(LCPR.ID_LISTA_CASAMENTO_PRODUTO,9999) ASC";
    	} else {
    		$leftJoin = "";
    		$colunaAdicional = "";
    		$orderBy = "";
    	}
    	
    	$query = "SELECT
						PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO,
						PROD.DESCRICAO_VENDA,
						PRSI.DESCRICAO_SITUACAO,
						PROD.PRSI_ID_PRODUTO_SITUACAO,
						CASE WHEN PROD.DATA_INICIAL_LANCAMENTO < now() 
							  AND PROD.DATA_FINAL_LANCAMENTO > now() 
							 THEN 'S' ELSE 'N' END LANCAMENTO,
						PROD.REFERENCIA
						".$colunaAdicional."
					FROM
						e_PRODUTO PROD,
						e_PRODUTO_SITUACAO PRSI,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV ".$leftJoin.",
						e_PRODUTO_COMBINACAO PRCO
					WHERE
						PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
					AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
					AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
		
					".$orderBy."";
    	
    	//printr($query);

		$retorno = $mysqli->ConsultarSQL($query);
		
		return $retorno;
    	
    }
    
}

?>