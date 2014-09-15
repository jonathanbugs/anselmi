<?php

class ListaCasamento {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnListaCasamento($idListaCasamento, $admin='N'){

		$idListaCasamento = sqlvalue($idListaCasamento, false);

		// if($admin == 'S'){
		// 	$ativo = "";
		// } else {
		// 	$ativo = "AND LICA.ATIVO = 'S'";
		// }

		$ativo = "";

		$query = "SELECT
						LICA.URL
					   ,LICA.CONJUGE1
					   ,LICA.EMAIL_CONJUGE1
					   ,LICA.NOME_PAI_CONJUGE1
					   ,LICA.NOME_MAE_CONJUGE1
					   ,LICA.CONJUGE2
					   ,LICA.EMAIL_CONJUGE2
					   ,LICA.NOME_PAI_CONJUGE2
					   ,LICA.NOME_MAE_CONJUGE2
					   ,LICA.FOTO_CAPA
					   ,LICA.MENSAGEM
					   ,LICA.PESS_ID_PESSOA
					   ,LCEN.NOME_CONTATO
					   ,LCEN.TIPO_ENDERECO
					   ,CONVERT(CHAR, LCEN.DATA_EVENTO, 103) DATA_EVENTO
					   ,LCEN.HORA_EVENTO
					   ,LCEN.LOCAL_EVENTO
					   ,LCEN.ENDERECO
					   ,LCEN.NUMERO
					   ,LCEN.COMPLEMENTO
					   ,LCEN.BAIRRO
					   ,LCEN.MUNICIPIO
					   ,LCEN.CEP_ID_CEP
					   ,LCEN.ESTADO
					   ,LCEN.REFERENCIA
					   ,LCEN.TELEFONE_PRINCIPAL
					   ,LCEN.CELULAR
					   ,LICA.ID_LISTA_CASAMENTO
					   ,LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO
					   ,LICA.ATIVO
					   ,CASE WHEN CAST(LICA.DESPACHADO AS VARCHAR) IS NULL THEN 'N' ELSE 'S' END DESPACHADO
					   ,LCPR.QTD_SOLICITADA
					FROM
						e_LISTA_CASAMENTO LICA LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
													  ON LICA.ID_LISTA_CASAMENTO = LCPR.LICA_ID_LISTA_CASAMENTO
													 AND IFNULL(LCPR.QTD_SOLICITADA,0) > IFNULL(LCPR.QTD_VENDIDA,0)
													 AND LCPR.ATIVO = 'S',
						e_LISTA_CASAMENTO_ENDERECO LCEN
						
					WHERE
						LICA.ID_LISTA_CASAMENTO = LCEN.LICA_ID_LISTA_CASAMENTO
					".$ativo."
					AND LICA.ID_LISTA_CASAMENTO = ".$idListaCasamento."";

		$result = $this->mysqli->ConsultarSQL($query);
//printr($query);
		return $result;

	}

	public function fnListaCasamentoProduto($idListaCasamento){
		
		$idListaCasamento = sqlvalue($idListaCasamento, false);
		
		$query = "
					SELECT
						TPSI.PRCO_ID_PRODUTO_COMBINACAO ID_PRODUTO,
						TPSI.DESCRICAO_VENDA,
						CASE WHEN TPSI.DATA_INICIAL_LANCAMENTO < now() 
							  AND TPSI.DATA_FINAL_LANCAMENTO > now() 
							 THEN 'S' ELSE 'N' END LANCAMENTO,
						TPSI.REFERENCIA,
						IFNULL(LCPR.ID_LISTA_CASAMENTO_PRODUTO,9999) ID_LISTA_CASA_PROD_ORDEM,
						LCPR.ID_LISTA_CASAMENTO_PRODUTO,
						IFNULL(LCPR.ATIVO, 'N') ATIVO
					FROM
						".TABELA_PRODUTO_SITE." TPSI LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
															ON TPSI.PRCO_ID_PRODUTO_COMBINACAO = LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
														   AND LCPR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."
															AND IFNULL(LCPR.QTD_SOLICITADA,0) > IFNULL(LCPR.QTD_VENDIDA,0)
									";

		//printr($query);
		$result = $this->mysqli->ConsultarSQL($query);

		return $result;
	}

}


?>