<?php
class Carrinho {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnCarrinhoTopo($where, $whereListaCasamento){

		    $query = "SELECT
		                  TPSI.DESCRICAO_VENDA,
		                  CARR.PRECO_UNITARIO_VENDA,
		                  CARR.QUANTIDADE,
		                  TPSI.URL_AMIGAVEL,
		                  TPSI.IMAGEM_PRINCIPAL
		                FROM
		                  e_CARRINHO CARR,
		                  ".TABELA_PRODUTO_SITE." TPSI
		                WHERE
		                	CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
		                AND CARR.DATA_DELETE IS NULL
		                AND IFNULL(CARR.FINALIZADO, 'N') = 'N'
		                AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' ".$where.")
		                AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
		                ".$whereListaCasamento."
		                ORDER BY
		                  CARR.ID_CARRINHO DESC";

		    $result = $this->mysqli->ConsultarSQL($query);
		    $_SESSION['sessionCarrinhoTopo'] = $result;

    	return $result;

    }
}
?>