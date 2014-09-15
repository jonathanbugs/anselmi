<?php

class CompreJunto {

  private $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

	public function fnCompreJunto($idProduto=null, $idCompreJunto=null) {

		if(isset($idProduto)){
			$idProduto = sqlvalue($idProduto, false);
      $tabelaAdicional = ",e_PRODUTO_COMPRE_JUNTO_COMBINACAO PCJC";
			$where = "AND PCJC.PROD_ID_PRODUTO = ".$idProduto."
                AND PCJU.ID_PRODUTO_COMPRE_JUNTO = PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO
                AND PCJC.DATA_DELETE IS NULL";
      $colunaAdicional = ",PCJC.FORCA_COMPRE_JUNTO";
		}

		if(isset($idCompreJunto)){
			$idCompreJunto = sqlvalue($idCompreJunto, false);
			$where = "AND PCJU.ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto."";
      $tabelaAdicional = "";
      $colunaAdicional = "";
		}

		$query = "SELECT
                        PCJU.ID_PRODUTO_COMPRE_JUNTO,
                        PCJU.DESCRICAO,
                        IFNULL(PCJU.TIPO_DESCONTO, 'N') TIPO_DESCONTO,
                        IFNULL(PCJU.VALOR_DESCONTO, 0) VALOR_DESCONTO,
                        PCJU.ATIVO
                        ".$colunaAdicional."
                    FROM
                        e_PRODUTO_COMPRE_JUNTO PCJU
                        ".$tabelaAdicional."
                    WHERE
                        PCJU.DATA_DELETE IS NULL
                        ".$where."";

        $result = $this->mysqli->ConsultarSQL($query);

        return $result;

	}


  public function fnCompreJuntoCombinacao($idCompreJunto=null, $idProduto=null, $idProdutoCombinacao=null){

    if(isset($idCompreJunto)){
        $idCompreJunto = implode(',', $idCompreJunto);
    }
    $where = "";
    if(isset($idProduto)){
      $idProduto = sqlvalue($idProduto, false);
      $idProdutoCombinacao = sqlvalue($idProdutoCombinacao, false);
      $where = "AND (TPSI.PROD_ID_PRODUTO <> ".$idProduto." OR TPSI.PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao.")";
    }

    $query = "SELECT
                TPSI.PROD_ID_PRODUTO,
                TPSI.PRCO_ID_PRODUTO_COMBINACAO,
                PCJU.ID_PRODUTO_COMPRE_JUNTO,
                CASE TPSI.PROD_ID_PRODUTO WHEN ".$idProduto." THEN 0 ELSE 1 END ORDEM
              FROM
                e_PRODUTO_COMPRE_JUNTO PCJU,
                e_PRODUTO_COMPRE_JUNTO_COMBINACAO PCJC,
                ".TABELA_PRODUTO_SITE." TPSI
              WHERE
                PCJU.ID_PRODUTO_COMPRE_JUNTO IN (".$idCompreJunto.")
              AND PCJU.ID_PRODUTO_COMPRE_JUNTO = PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO
              AND PCJU.DATA_DELETE IS NULL
              AND PCJC.DATA_DELETE IS NULL
              AND PCJC.PROD_ID_PRODUTO = TPSI.PROD_ID_PRODUTO
              ".$where."
              ORDER BY 
                ORDEM";

    $result = $this->mysqli->ConsultarSQL($query);

    return $result;

  }

  public function fnCompreJuntoProduto($idCompreJunto, $idProduto=null, $idProdutoCombinacao=null) {

        if(isset($idCompreJunto)){
            $idCompreJunto = implode(',', $idCompreJunto);
        }

        $where = "";
      if(isset($idProduto)){
        $idProduto = sqlvalue($idProduto, false);
        $idProdutoCombinacao = sqlvalue($idProdutoCombinacao, false);
        $where = "AND (TPSI.PROD_ID_PRODUTO <> ".$idProduto." OR TPSI.PRCO_ID_PRODUTO_COMBINACAO = ".$idProdutoCombinacao.")";
      }

        $query = "SELECT 
                        TPSI.PRCO_ID_PRODUTO_COMBINACAO ID_PRODUTO_ATRIBUTO_VALOR
                       ,TPSI.PROD_ID_PRODUTO
                       ,TPSI.PRCO_ID_PRODUTO_COMBINACAO
                       ,TPSI.DESCRICAO_VENDA
                       ,TPSI.REFERENCIA
                       ,CAST(TPSI.DESCRICAO_LONGA AS VARCHAR(4000)) DESCRICAO_LONGA
                       ,CAST(TPSI.DESCRICAO_CURTA AS VARCHAR(4000)) DESCRICAO_CURTA
                       ,TPSI.PRECO_VENDA
                       ,CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) > TPSI.PRECO_VENDA
                              THEN NULL
                              ELSE TPSI.PRECO_PROMOCIONAL
                              END PRECO_PROMOCIONAL
                       ,TPSI.TIPO_PROMOCAO
                       ,TPSI.VALOR_PROMOCAO
                       ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                       ,TPSI.DATA_FINAL_VALIDADE_PROMO
                       ,TPSI.FRETE_GRATIS
                       ,TPSI.DATA_INICIAL_LANCAMENTO
                       ,TPSI.DATA_FINAL_LANCAMENTO
                       ,TPSI.PNAU_ID_PRODUTO_NIVEL_AUXILIAR
                       ,TPSI.DESCRICAO_PRODUTO_NIVEL_AUXILIAR
                       ,TPSI.TAGS
                       ,TPSI.URL_AMIGAVEL
                       ,TPSI.META_TITLE
                       ,TPSI.META_DESCRIPTION
                       ,TPSI.META_KEYWORDS
                       ,TPSI.VIDEO
                       ,TPSI.IMAGEM_PRINCIPAL
                       ,TPSI.ARQUIVO_DOWNLOAD
                       ,PCJU.ID_PRODUTO_COMPRE_JUNTO
                       ,PCJU.TIPO_DESCONTO
                       ,PCJU.VALOR_DESCONTO
                       ,fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, GETDATE()) SALDO
                       ,CASE WHEN GETDATE() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                                THEN 'S' ELSE 'N' END LANCAMENTO
                    FROM
                        ".TABELA_PRODUTO_SITE." TPSI,
                        e_PRODUTO_COMPRE_JUNTO_COMBINACAO PCJC,
                        e_PRODUTO_COMPRE_JUNTO PCJU
                    WHERE
                        TPSI.PROD_ID_PRODUTO = PCJC.PROD_ID_PRODUTO
                    AND PCJC.DATA_DELETE IS NULL
                    AND PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO = PCJU.ID_PRODUTO_COMPRE_JUNTO
                    AND PCJU.ID_PRODUTO_COMPRE_JUNTO IN (".$idCompreJunto.")
                    ".$where."
                    GROUP BY
                      TPSI.PRCO_ID_PRODUTO_COMBINACAO
                     ,TPSI.PROD_ID_PRODUTO
                     ,TPSI.PRCO_ID_PRODUTO_COMBINACAO
                     ,TPSI.DESCRICAO_VENDA
                     ,TPSI.REFERENCIA
                     ,CAST(TPSI.DESCRICAO_LONGA AS VARCHAR(4000))
                     ,CAST(TPSI.DESCRICAO_CURTA AS VARCHAR(4000))
                     ,TPSI.PRECO_VENDA
                     ,CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) > TPSI.PRECO_VENDA
                            THEN NULL
                            ELSE TPSI.PRECO_PROMOCIONAL
                            END
                     ,TPSI.TIPO_PROMOCAO
                     ,TPSI.VALOR_PROMOCAO
                     ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                     ,TPSI.DATA_FINAL_VALIDADE_PROMO
                     ,TPSI.FRETE_GRATIS
                     ,TPSI.DATA_INICIAL_LANCAMENTO
                     ,TPSI.DATA_FINAL_LANCAMENTO
                     ,TPSI.PNAU_ID_PRODUTO_NIVEL_AUXILIAR
                     ,TPSI.DESCRICAO_PRODUTO_NIVEL_AUXILIAR
                     ,TPSI.TAGS
                     ,TPSI.URL_AMIGAVEL
                     ,TPSI.META_TITLE
                     ,TPSI.META_DESCRIPTION
                     ,TPSI.META_KEYWORDS
                     ,TPSI.VIDEO
                     ,TPSI.IMAGEM_PRINCIPAL
                     ,TPSI.ARQUIVO_DOWNLOAD
                     ,PCJU.ID_PRODUTO_COMPRE_JUNTO
                     ,PCJU.TIPO_DESCONTO
                     ,PCJU.VALOR_DESCONTO
                     ,fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, GETDATE())
                     ,CASE WHEN GETDATE() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                              THEN 'S' ELSE 'N' END
                    ORDER BY
                        PROD_ID_PRODUTO";

        $result = $this->mysqli->ConsultarSQL($query);

        return $result;

    }

}
?>