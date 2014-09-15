<?php

class Promocao {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnPromocaoCarrinho($codidoCupom, $valorCompra, $qtdItensCarrinho, $emailClienteContemplado) {

		$codidoCupom = sqlvalue($codidoCupom, true);
		$valorCompra = sqlvalue($valorCompra, true);
		$qtdItensCarrinho = sqlvalue($qtdItensCarrinho, true);
		$emailClienteContemplado = sqlvalue($emailClienteContemplado, true);

		$query = "SELECT 
			 			PRCA.VALOR_DESCONTO,
			 			PRCA.TIPO_DESCONTO,
			 			PRCA.FRETE_GRATIS,
			 			PRCA.QUANTIDADE_PRODUTO_CARRINHO,
			 			PRCA.PACOTE_PRESENTE_GRATIS,
			 			PRCA.ID_PROMOCAO_CARRINHO,
			 			PRCA.CUPOM_PROMOCIONAL,
			 			PRCA.DATA_INICIAL_VALIDADE,
			 			PRCA.DATA_FINAL_VALIDADE,
			 			PRCA.EMAIL_CLIENTE_CONTEMPLADO
			 		FROM
			 			e_PROMOCAO_CARRINHO PRCA
			 		WHERE
			 			now() BETWEEN PRCA.DATA_INICIAL_VALIDADE AND PRCA.DATA_FINAL_VALIDADE
			 		AND PRCA.PROMOCAO_ATIVA = 'S'
			 		AND ".$valorCompra." >= IFNULL(PRCA.VALOR_MINIMO_COMPRA,0)
			 		AND PRCA.EMAIL_CLIENTE_CONTEMPLADO = ".$emailClienteContemplado."
			 		AND PRCA.CUPOM_PROMOCIONAL = ".$codidoCupom."
			 		AND (IFNULL(PRCA.QUANTIDADE_PRODUTO_CARRINHO,0) <= ".$qtdItensCarrinho." OR PRCA.QUANTIDADE_PRODUTO_CARRINHO IS NULL)
			 		AND NOT EXISTS (SELECT 1
			 						  FROM e_PEDIDO PEDI,
			 							   e_PEDIDO_ITEM_SITUACAO PISI
			 						 WHERE PEDI.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO
			 						   AND PRCA.UTILIZACAO_UNICA = 'S'
			 						   AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
			 						   AND PISI.CONSIDERA_VENDIDO = 'S' 
			 					   )
				UNION
				SELECT 
			 			PRCA.VALOR_DESCONTO,
			 			PRCA.TIPO_DESCONTO,
			 			PRCA.FRETE_GRATIS,
			 			PRCA.QUANTIDADE_PRODUTO_CARRINHO,
			 			PRCA.PACOTE_PRESENTE_GRATIS,
			 			PRCA.ID_PROMOCAO_CARRINHO,
			 			PRCA.CUPOM_PROMOCIONAL,
			 			PRCA.DATA_INICIAL_VALIDADE,
			 			PRCA.DATA_FINAL_VALIDADE,
			 			PRCA.EMAIL_CLIENTE_CONTEMPLADO
			 		FROM
			 			e_PROMOCAO_CARRINHO PRCA
			 		WHERE
			 			now() BETWEEN PRCA.DATA_INICIAL_VALIDADE AND PRCA.DATA_FINAL_VALIDADE
			 		AND PRCA.PROMOCAO_ATIVA = 'S'
			 		AND ".$valorCompra." >= IFNULL(PRCA.VALOR_MINIMO_COMPRA,0)
			 		AND PRCA.EMAIL_CLIENTE_CONTEMPLADO IS NULL
			 		AND PRCA.CUPOM_PROMOCIONAL IS NULL
			 		AND (IFNULL(PRCA.QUANTIDADE_PRODUTO_CARRINHO,0) <= ".$qtdItensCarrinho." OR PRCA.QUANTIDADE_PRODUTO_CARRINHO IS NULL)
			 		AND NOT EXISTS (SELECT 1
			 						  FROM e_PEDIDO PEDI,
			 							   e_PEDIDO_ITEM_SITUACAO PISI
			 						 WHERE PEDI.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO
			 						   AND PRCA.UTILIZACAO_UNICA = 'S'
			 						   AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
			 						   AND PISI.CONSIDERA_VENDIDO = 'S' 
			 					   )";

		$result = $this->mysqli->ConsultarSQL($query);
		$cupom = $result[0];
		$dataAtual = date('Y-m-d');
		
		if("'".$cupom['EMAIL_CLIENTE_CONTEMPLADO']."'" == $emailClienteContemplado or $cupom['EMAIL_CLIENTE_CONTEMPLADO'] == NULL){
			if(count($result) <= 0){
				$retorno = array(array('RETORNO' => 'NAOEXISTE'));
			} elseif(strtotime($dataAtual) >= strtotime($cupom['DATA_INICIAL_VALIDADE']) and strtotime($dataAtual) <= strtotime($cupom['DATA_FINAL_VALIDADE'])) {
				$retorno = $result;
			} else {
				$retorno = array(array('RETORNO' => 'VENCEU'));
			}
		} else {
			$retorno = array(array('RETORNO' => 'LOGAR'));
		}
		

        
      //   $query = "DECLARE 	@EMAIL_CLIENTE_CONTEMPLADO VARCHAR(100),
						// 	@DATA_INICIAL_VALIDADE DATETIME,
						// 	@DATA_FINAL_VALIDADE DATETIME,
						// 	@CUPOM_PROMOCIONAL VARCHAR(50)

						
							
						// IF (@EMAIL_CLIENTE_CONTEMPLADO = ".$emailClienteContemplado." OR @EMAIL_CLIENTE_CONTEMPLADO IS NULL)
						// BEGIN
						// 	IF(now() BETWEEN @DATA_INICIAL_VALIDADE AND @DATA_FINAL_VALIDADE)
						// 	BEGIN
						// 	SELECT 
						// 			PRCA.VALOR_DESCONTO,
						// 			PRCA.TIPO_DESCONTO,
						// 			PRCA.FRETE_GRATIS,
						// 			PRCA.QUANTIDADE_PRODUTO_CARRINHO,
						// 			PRCA.PACOTE_PRESENTE_GRATIS,
						// 			PRCA.ID_PROMOCAO_CARRINHO,
						// 			PRCA.CUPOM_PROMOCIONAL
						// 		FROM
						// 			e_PROMOCAO_CARRINHO PRCA
						// 		WHERE
						// 			now() BETWEEN PRCA.DATA_INICIAL_VALIDADE AND PRCA.DATA_FINAL_VALIDADE
						// 		AND PRCA.PROMOCAO_ATIVA = 'S'
						// 		AND ".$valorCompra." >= IFNULL(PRCA.VALOR_MINIMO_COMPRA,0)
						// 		AND (PRCA.EMAIL_CLIENTE_CONTEMPLADO = ".$emailClienteContemplado." OR PRCA.EMAIL_CLIENTE_CONTEMPLADO IS NULL)
						// 		AND (PRCA.CUPOM_PROMOCIONAL = ".$codidoCupom." OR PRCA.CUPOM_PROMOCIONAL IS NULL)
						// 		AND (IFNULL(PRCA.QUANTIDADE_PRODUTO_CARRINHO,0) <= ".$qtdItensCarrinho." OR PRCA.QUANTIDADE_PRODUTO_CARRINHO IS NULL)
						// 		AND NOT EXISTS (SELECT 1
						// 						  FROM e_PEDIDO PEDI,
						// 							   e_PEDIDO_ITEM_SITUACAO PISI
						// 						 WHERE PEDI.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO
						// 						   AND PRCA.UTILIZACAO_UNICA = 'S'
						// 						   AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
						// 						   AND PISI.CONSIDERA_VENDIDO = 'S' 
						// 					   )
						// 	END
						// 	ELSE
						// 	BEGIN
						// 		IF(@CUPOM_PROMOCIONAL IS NULL)
						// 		BEGIN
						// 		SELECT 'NAOEXISTE' RETORNO
						// 		END
						// 		ELSE
						// 		BEGIN
						// 		SELECT 'VENCEU' RETORNO
						// 		END
						// 	END
						// END
						// ELSE
						// BEGIN
						// 	SELECT 'LOGAR' RETORNO
						// END";
        //printr($query);
        //$retorno = $this->mysqli->ConsultarSQL($query);
        return $retorno;

    }
}
?>