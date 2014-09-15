<?php
class Menu {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnMenu($nivel=null, $cateIdCategoria=null, $idCategoria=null, $top=null, $filtroOfertas=null, $idProdutoCombinacaoAtributoValor=null) {
		
		if($nivel == 1){
			$where = "AND CATE.CATE_ID_CATEGORIA IS NULL";
		} elseif($nivel == 2) {
			$where = "AND CATE.CATE_ID_CATEGORIA IS NOT NULL";
		} else {
			$where = "";
		}

		$top_ = '';
		if(isset($top)){
			$top_ = " TOP ".$top;
		}

		if(isset($filtroOfertas)){
	    	$where .= " AND IFNULL(TPSI.PRECO_PROMOCIONAL, 0) > 0 ";
	    }
		
		if(isset($cateIdCategoria)){
			$where .= "AND CATE.CATE_ID_CATEGORIA IN (".$cateIdCategoria.")";
		}
		
		if(isset($idCategoria)){
			$where .= " AND IFNULL(CATE.CATE_ID_CATEGORIA, CATE.ID_CATEGORIA) = ".$idCategoria[0]["ID_CATEGORIA"]." ";
		}

		if(isset($idProdutoCombinacaoAtributoValor)){
	        $idsProdutos = implode(',', $idProdutoCombinacaoAtributoValor);
	        $where .= " AND TPSI.PRCO_ID_PRODUTO_COMBINACAO IN (".$idsProdutos.") ";
	    }
		
		$query = "SELECT
						".$top_."
						CATE.ID_CATEGORIA,
						CATE.DESCRICAO_CATEGORIA,
						CATE.URL_AMIGAVEL,
						IFNULL(CATE.CATE_ID_CATEGORIA,0) CATE_ID_CATEGORIA
					FROM 
						e_CATEGORIA CATE,
						e_PRODUTO_CATEGORIA PRCA,
						".TABELA_PRODUTO_SITE." TPSI
					WHERE
						CATE.ATIVO = 'S'
					AND CATE.ID_CATEGORIA = PRCA.CATE_ID_CATEGORIA
					AND PRCA.PROD_ID_PRODUTO = TPSI.PROD_ID_PRODUTO
					".$where."
					GROUP BY
						CATE.ID_CATEGORIA,
						CATE.DESCRICAO_CATEGORIA,
						CATE.URL_AMIGAVEL,
						IFNULL(CATE.CATE_ID_CATEGORIA,0),
						CATE.ORDEM
					ORDER BY CATE.ORDEM ASC, CATE.DESCRICAO_CATEGORIA ASC";

        //$retorno = $this->mysqli->ConsultarSQL($query);
			
        return $retorno;

    }

    
    public function _fnMenu($nivel=null, $cateIdCategoria=null, $idCategoria=null, $top=null, $filtroOfertas=null, $idProdutoCombinacaoAtributoValor=null) {
		
		if($nivel == 1){
			$where = "AND CATE1.CATE_ID_CATEGORIA IS NULL";
		} elseif($nivel == 2) {
			$where = "AND CATE1.CATE_ID_CATEGORIA IS NOT NULL";
		} else {
			$where = "";
		}

		$top_ = '';
		if(isset($top)){
			$top_ = " TOP ".$top;
		}

		if(isset($filtroOfertas)){
	    	$where .= " AND IFNULL(TPSI.PRECO_PROMOCIONAL, 0) > 0 ";
	    }
		
		if(isset($cateIdCategoria)){
			$where .= "AND CATE1.CATE_ID_CATEGORIA IN (".$cateIdCategoria.")";
		}
		
		if(isset($idCategoria)){
			$where .= " AND IFNULL(CATE1.CATE_ID_CATEGORIA, CATE1.ID_CATEGORIA) = ".$idCategoria[0]["ID_CATEGORIA"]." ";
		}

		if(isset($idProdutoCombinacaoAtributoValor)){
	        $idsProdutos = implode(',', $idProdutoCombinacaoAtributoValor);
	        $where .= " AND TPSI.PRCO_ID_PRODUTO_COMBINACAO IN (".$idsProdutos.") ";
	    }
		
		$query = "SELECT
						CATE1.ID_CATEGORIA ID_CATE1,
						CATE1.DESCRICAO_CATEGORIA DESC_CATE1,
						CATE1.URL_AMIGAVEL URL_CATE1,
						IFNULL(CATE1.CATE_ID_CATEGORIA,0) CATE_ID_CATE1,
						CATE2.ID_CATEGORIA ID_CATE2,
						CATE2.DESCRICAO_CATEGORIA DESC_CATE2,
						CATE2.URL_AMIGAVEL URL_CATE2,
						IFNULL(CATE2.CATE_ID_CATEGORIA,0) CATE_ID_CATE2,
						CATE3.ID_CATEGORIA ID_CATE3,
						CATE3.DESCRICAO_CATEGORIA DESC_CATE3,
						CATE3.URL_AMIGAVEL URL_CATE3,
						IFNULL(CATE3.CATE_ID_CATEGORIA,0) CATE_ID_CATE3
					FROM
						e_CATEGORIA CATE1 LEFT JOIN e_CATEGORIA CATE2 
										  LEFT JOIN e_CATEGORIA CATE3
												 ON CATE2.ID_CATEGORIA = CATE3.CATE_ID_CATEGORIA
												 ON CATE1.ID_CATEGORIA = CATE2.CATE_ID_CATEGORIA,
						e_PRODUTO PROD,
						e_PRODUTO_CATEGORIA PRCA
					WHERE
						CATE1.CATE_ID_CATEGORIA IS NULL
					AND	CATE1.ATIVO = 'S'
					AND PROD.ID_PRODUTO = PRCA.PROD_ID_PRODUTO
					AND PRCA.CATE_ID_CATEGORIA = CATE1.ID_CATEGORIA
					GROUP BY
						CATE1.ID_CATEGORIA,
						CATE1.DESCRICAO_CATEGORIA,
						CATE1.URL_AMIGAVEL,
						IFNULL(CATE1.CATE_ID_CATEGORIA,0),
						CATE2.ID_CATEGORIA,
						CATE2.DESCRICAO_CATEGORIA,
						CATE2.URL_AMIGAVEL,
						IFNULL(CATE2.CATE_ID_CATEGORIA,0),
						CATE3.ID_CATEGORIA,
						CATE3.DESCRICAO_CATEGORIA,
						CATE3.URL_AMIGAVEL,
						IFNULL(CATE3.CATE_ID_CATEGORIA,0),
						CATE1.ORDEM, CATE2.ORDEM, CATE3.ORDEM
					ORDER BY
						CATE1.ORDEM ASC, CATE1.DESCRICAO_CATEGORIA ASC,
						CATE2.ORDEM ASC, CATE2.DESCRICAO_CATEGORIA ASC,
						CATE3.ORDEM ASC, CATE3.DESCRICAO_CATEGORIA ASC";

        $retorno = $this->mysqli->ConsultarSQL($query);

        return $retorno;

    }

        
    
}
?>