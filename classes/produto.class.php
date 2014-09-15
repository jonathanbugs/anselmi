<?php

class Produto {

  private $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

	public function fnProduto($idProduto) {

        $query = "SELECT 
                        PROD.ID_PRODUTO,
                        PROD.ID_PRODUTO_INTEGRACAO,
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
                        date_format(PROD.DATA_INICIAL_LANCAMENTO, '%d/%m/%Y') DATA_INICIAL_LANCAMENTO,
                        date_format(PROD.DATA_FINAL_LANCAMENTO, '%d/%m/%Y') DATA_FINAL_LANCAMENTO,
                        PROD.DESCRICAO_CURTA,
                        PROD.DESCRICAO_LONGA,
                        PROD.META_TITLE,
                        PROD.META_DESCRIPTION,
                        PROD.META_KEYWORDS,
                        PROD.URL_AMIGAVEL,
                        (fn_valor_venda_produto (PROD.ID_PRODUTO, ".TABELA_PRECO_VENDA_PADRAO.", now())) PRECO_VENDA
                    FROM
                        e_PRODUTO PROD
                    WHERE
                        PROD.ID_PRODUTO = ".$idProduto."";

                        //printr($query);
        
        $retorno = $this->mysqli->ConsultarSQL($query);
			
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

        $retorno = $this->mysqli->ConsultarSQL($query);

        return $retorno;
    }

    public function fnAtributoProduto(){

        $query = "SELECT 
                        ATVA.ID_ATRIBUTO_VALOR,
                        ATVA.VALOR,
                        ATVA.ATRI_ID_ATRIBUTO
                    FROM
                        e_ATRIBUTO_VALOR ATVA";

        $retorno = $this->mysqli->ConsultarSQL($query);

        return $retorno;
    }

    public function fnEstoqueProduto($idProduto, $idPedido=null){

      $where = "";
      
        if(isset($idProduto)){
            $where .= "AND PROD.ID_PRODUTO = ".$idProduto."";
        } 
        
        if(isset($idPedido)){
          $where .= "AND PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR NOT IN (
                                             SELECT PEIT.PRCO_ID_PRODUTO_COMBINACAO 
                                             FROM e_PEDIDO_ITEM PEIT WHERE PEIT.PEDI_ID_PEDIDO = ".$idPedido."
                                             )";
        } 

        $query = "SELECT
                        
                        PRCO.ID_PRODUTO_COMBINACAO,
                        PRCO.CODIGO_UNICO,
                        fn_saldo_disponivel_produto(PRCO.ID_PRODUTO_COMBINACAO, NOW()) SALDO,
                        PCIM.IMAGEM,
                        PCIM.ORDEM,
                        IFNULL(PRCO.REFERENCIA, PROD.REFERENCIA) REFERENCIA
                    FROM
                        e_PRODUTO PROD,
                        e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                         ON PRCO.ID_PRODUTO_COMBINACAO = PCIM.PRCO_ID_PRODUTO_COMBINACAO
                                                  LEFT JOIN e_PRODUTO_COMBINACAO_ESTOQUE PCES
                                                         ON PRCO.ID_PRODUTO_COMBINACAO = PCES.PRCO_ID_PRODUTO_COMBINACAO,
                        e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
                        e_ATRIBUTO_VALOR ATVA
                    WHERE
                        PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
                    AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
                    AND PCAV.ATVA_ID_ATRIBUTO_VALOR = ATVA.ID_ATRIBUTO_VALOR
                    -- AND fn_valor_venda_produto(PROD.ID_PRODUTO,1,NOW()) > 0 
                    ".$where."
                    GROUP BY
                        PRCO.ID_PRODUTO_COMBINACAO,
                        PRCO.CODIGO_UNICO,
                        SALDO,
                        PCIM.IMAGEM,
                        PCIM.ORDEM,
                        IFNULL(PRCO.REFERENCIA, PROD.REFERENCIA)
                    ORDER BY ORDEM, ID_PRODUTO_COMBINACAO";

        //printr($query);
        $retorno = $this->mysqli->ConsultarSQL($query);

        return $retorno;

    }
    
    public function fnProdutoAtributoValor($idListaCasamento=null){
    	
    	if(isset($idListaCasamento)){
    		$leftJoin = "LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
							ON TPSI.PRCO_ID_PRODUTO_COMBINACAO = LCPR.PRCO_ID_PRODUTO_COMBINACAO
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
						TPSI.PRCO_ID_PRODUTO_COMBINACAO ID_PRODUTO,
						TPSI.DESCRICAO_VENDA,
						--TPSI.DESCRICAO_SITUACAO,
						--PROD.PRSI_ID_PRODUTO_SITUACAO,
						CASE WHEN TPSI.DATA_INICIAL_LANCAMENTO < now() 
							  AND TPSI.DATA_FINAL_LANCAMENTO > now() 
							 THEN 'S' ELSE 'N' END LANCAMENTO,
						TPSI.REFERENCIA
						".$colunaAdicional."
					FROM
						".TABELA_PRODUTO_SITE." TPSI ".$leftJoin."
		
					".$orderBy."";
    	
    	//printr($query);

		$retorno = $this->mysqli->ConsultarSQL($query);
		
		return $retorno;
    	
    }
    
    public function fnProdutoSite($urlAmigavel=null, $topListaProduto=null, $order=null, $busca=null, $filtroCategoria=null, $count=null, $lengthListaProduto=null, $filtroLinha=null, $filtroOfertas=null, $idProdutoCombinacaoAtributoValor=null){
    	
    	$tabelaAdicional = "";
    	$where = "";
    	$top = "";

      $colunaAdicionalListaCasamento = "";
      $leftJoinListaCasamento = "";

      if($_SESSION['sessionMinhaIdListaCasamento'] or $_SESSION['sessionIdListaCasamento']){
        $minhaIdListaCasamento = sqlvalue($_SESSION['sessionMinhaIdListaCasamento'], true);
        $leftJoinListaCasamento = ", LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
                    ON LCPR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
                     AND LCPR.LICA_ID_LISTA_CASAMENTO = ".$minhaIdListaCasamento." ";
        $colunaAdicionalListaCasamento = ",LCPR.QTD_SOLICITADA";
        $where .= "1=1";
      } else {
        $where .= "fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0 ";
      }
    	
    	if(isset($urlAmigavel)){
    		$urlAmigavel = sqlvalue($urlAmigavel, true);
    		$where = "TPSI.URL_AMIGAVEL = ".$urlAmigavel."";
    	}
    	
    	if(isset($topListaProduto)){
            if($topListaProduto > $lengthListaProduto){
                $length = ($topListaProduto+$lengthListaProduto);
                $topListaProduto = $topListaProduto;
            } else {
                $length = $lengthListaProduto;
                $topListaProduto = 0;
            }
    	}

      

    	if(isset($order)){
    		if($order == "precomenor"){
                $orderby = "ORDER BY CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) = 0 
                                            THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END ASC";
            } elseif($order == "precomaior"){
                $orderby = "ORDER BY CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) = 0 
                                            THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END DESC";
            } elseif($order == "asc"){
                $orderby = "ORDER BY TPSI.DESCRICAO_VENDA ASC";
            } elseif($order == "desc"){
                $orderby = "ORDER BY TPSI.DESCRICAO_VENDA DESC";
            } elseif($order == "visualizacao") {
                $orderby = "ORDER BY IFNULL(TPSI.VISUALIZACOES,0) DESC";
            } elseif($order == "maiorpromocao") {
                $orderby = "ORDER BY IFNULL(TPSI.VALOR_PROMOCAO,0) DESC";
            } else {
                $orderby = "ORDER BY TPSI.DATA_INICIAL_LANCAMENTO DESC";
            }
    	}
    	
    	if(isset($busca)){
    		$arrayBusca = explode(" ", $busca);
    		$countBusca = count($arrayBusca);
    		$where .= "AND ("; 
    		$i=1;
    		foreach ($arrayBusca as $value) {
    			$where .= "(TPSI.DESCRICAO_VENDA collate Latin1_General_CI_AI LIKE '%".$value."%' OR 
                      TPSI.REFERENCIA collate Latin1_General_CI_AI LIKE '%".$value."%' OR 
						          TPSI.DESCRICAO_LONGA collate Latin1_General_CI_AI LIKE '%".$value."%' OR 
                      TPSI.DESCRICAO_CURTA collate Latin1_General_CI_AI LIKE '%".$value."%' OR
    					        TPSI.DESCRICAO_CATEGORIA collate Latin1_General_CI_AI LIKE '%".$value."%' OR 
                      TPSI.DESCRICAO_PRODUTO_NIVEL_AUXILIAR collate Latin1_General_CI_AI LIKE '%".$value."%')";
    			if($i < $countBusca){
    				$where .= " AND ";
    			}
    			$i++;
    		}
    		
    		
        if($countBusca > 1){
          $where .= "OR TPSI.DESCRICAO_VENDA collate Latin1_General_CI_AI LIKE '%".$busca."%' OR 
                     TPSI.REFERENCIA collate Latin1_General_CI_AI LIKE '%".$busca."%' OR 
                     TPSI.DESCRICAO_LONGA collate Latin1_General_CI_AI LIKE '%".$busca."%' OR 
                     TPSI.DESCRICAO_CURTA collate Latin1_General_CI_AI LIKE '%".$busca."%' OR
                     TPSI.DESCRICAO_CATEGORIA collate Latin1_General_CI_AI LIKE '%".$busca."%' OR 
                     TPSI.DESCRICAO_PRODUTO_NIVEL_AUXILIAR collate Latin1_General_CI_AI LIKE '%".$busca."%'";
        }

        $where .= ")";
    		
    		//$order = "ORDER BY TPSI.DESCRICAO_VENDA, ";
    		
    	}

      if(isset($idProdutoCombinacaoAtributoValor)){
        $idsProdutos = implode(',', $idProdutoCombinacaoAtributoValor);
        $where .= " AND TPSI.PRCO_ID_PRODUTO_COMBINACAO IN (".$idsProdutos.") ";
      }

      if(isset($filtroOfertas)){
        $where .= " AND IFNULL(TPSI.PRECO_PROMOCIONAL, 0) > 0 ";
      }
    	
    	if(isset($filtroCategoria)){
    		$i=0;
    		$idsCategorias = "";
    		
    		/*foreach ($filtroCategoria as $idCategoria) {
    			$i++;
    			if($i == count($filtroCategoria)){
    				$idsCategorias .= $idCategoria["ID_CATEGORIA"];
    			} else {
    				$idsCategorias .= $idCategoria["ID_CATEGORIA"].",";
    			}
    		}*/
    		$where .= " AND PRCA.CATE_ID_CATEGORIA IN (".$filtroCategoria[count($filtroCategoria)-1]["ID_CATEGORIA"].") AND PRCA.PROD_ID_PRODUTO = TPSI.PROD_ID_PRODUTO ";
    		$tabelaAdicional .= ",e_PRODUTO_CATEGORIA PRCA";
    	}

      if(count($filtroLinha) > 0){
        $i=0;
        $idsLinhas = "";
        
        $where .= " AND TPSI.PNAU_ID_PRODUTO_NIVEL_AUXILIAR IN (".$filtroLinha[count($filtroLinha)-1]["ID_LINHA"].") ";
      }

    	if(isset($count) and $count != ""){

            $query = "SELECT COUNT(1) NRO_PRODUTOS
                        FROM
                            ".TABELA_PRODUTO_SITE." TPSI
                            ".$tabelaAdicional."
                      WHERE 
                      ".$where."
                      GROUP BY
                          TPSI.PROD_ID_PRODUTO
                         ,TPSI.DESCRICAO_VENDA
                         ,TPSI.REFERENCIA
                         ,TPSI.DESCRICAO_LONGA
                         ,TPSI.DESCRICAO_CURTA
                         ,TPSI.PRECO_VENDA
                         ,TPSI.PRECO_PROMOCIONAL
                         ,TPSI.TIPO_PROMOCAO
                         ,TPSI.VALOR_PROMOCAO
                         ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                         ,TPSI.DATA_FINAL_VALIDADE_PROMO
                         ,TPSI.FRETE_GRATIS
                         ,TPSI.DATA_INICIAL_LANCAMENTO
                         ,TPSI.DATA_FINAL_LANCAMENTO
                         ,TPSI.TAGS
                         ,TPSI.URL_AMIGAVEL
                         ,TPSI.META_TITLE
                         ,TPSI.META_DESCRIPTION
                         ,TPSI.META_KEYWORDS
                         ,TPSI.VIDEO
                         ,TPSI.IMAGEM_PRINCIPAL
                         ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                                  THEN 'S' ELSE 'N' END,
                          TPSI.COR";
        
        } elseif(isset($urlAmigavel)) {

            $query = "SELECT 
                            TPSI.PROD_ID_PRODUTO
                           ,TPSI.PRCO_ID_PRODUTO_COMBINACAO
                           ,TPSI.DESCRICAO_VENDA
                           ,TPSI.REFERENCIA
                           ,TPSI.DESCRICAO_LONGA
                           ,TPSI.DESCRICAO_CURTA
                           ,TPSI.PRECO_VENDA
                           ,TPSI.PRECO_PROMOCIONAL
                           ,TPSI.TIPO_PROMOCAO
                           ,TPSI.VALOR_PROMOCAO
                           ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                           ,TPSI.DATA_FINAL_VALIDADE_PROMO
                           ,TPSI.FRETE_GRATIS
                           ,TPSI.DATA_INICIAL_LANCAMENTO
                           ,TPSI.DATA_FINAL_LANCAMENTO
                           ,TPSI.TAGS
                           ,TPSI.URL_AMIGAVEL
                           ,TPSI.META_TITLE
                           ,TPSI.META_DESCRIPTION
                           ,TPSI.META_KEYWORDS
                           ,TPSI.VIDEO
                           ,TPSI.IMAGEM_PRINCIPAL
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                                    THEN 'S' ELSE 'N' END LANCAMENTO,
                            TPSI.COR
                           ,TPSI.ID_COR
                           ,fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) SALDO
                            ".$colunaAdicionalListaCasamento."
                       FROM
                            ".TABELA_PRODUTO_SITE." TPSI ".$leftJoinListaCasamento."
                      WHERE
                            ".$where."";

        } else {
        	
            $query = "SELECT 
                           TPSI.PROD_ID_PRODUTO
                           ,max(TPSI.PRCO_ID_PRODUTO_COMBINACAO) PRCO_ID_PRODUTO_COMBINACAO
                           ,TPSI.DESCRICAO_VENDA
                           ,TPSI.REFERENCIA
                           ,TPSI.DESCRICAO_LONGA
                           ,TPSI.DESCRICAO_CURTA
                           ,TPSI.PRECO_VENDA
                           ,TPSI.PRECO_PROMOCIONAL
                           ,TPSI.TIPO_PROMOCAO
                           ,TPSI.VALOR_PROMOCAO
                           ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                           ,TPSI.DATA_FINAL_VALIDADE_PROMO
                           ,TPSI.FRETE_GRATIS
                           ,TPSI.DATA_INICIAL_LANCAMENTO
                           ,TPSI.DATA_FINAL_LANCAMENTO
                           ,TPSI.TAGS
                           ,TPSI.URL_AMIGAVEL
                           ,TPSI.META_TITLE
                           ,TPSI.META_DESCRIPTION
                           ,TPSI.META_KEYWORDS
                           ,TPSI.VIDEO
                           ,TPSI.IMAGEM_PRINCIPAL
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                                    THEN 'S' ELSE 'N' END LANCAMENTO,
                            TPSI.COR
                           
    			       FROM
    			       		".TABELA_PRODUTO_SITE." TPSI
    			       		".$tabelaAdicional."
    			      WHERE 
    			      ".$where."
                GROUP BY
                    TPSI.PROD_ID_PRODUTO
                   ,TPSI.DESCRICAO_VENDA
                   ,TPSI.REFERENCIA
                   ,TPSI.DESCRICAO_LONGA
                   ,TPSI.DESCRICAO_CURTA
                   ,TPSI.PRECO_VENDA
                   ,TPSI.PRECO_PROMOCIONAL
                   ,TPSI.TIPO_PROMOCAO
                   ,TPSI.VALOR_PROMOCAO
                   ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                   ,TPSI.DATA_FINAL_VALIDADE_PROMO
                   ,TPSI.FRETE_GRATIS
                   ,TPSI.DATA_INICIAL_LANCAMENTO
                   ,TPSI.DATA_FINAL_LANCAMENTO
                   ,TPSI.TAGS
                   ,TPSI.URL_AMIGAVEL
                   ,TPSI.META_TITLE
                   ,TPSI.META_DESCRIPTION
                   ,TPSI.META_KEYWORDS
                   ,TPSI.VIDEO
                   ,TPSI.IMAGEM_PRINCIPAL
                   ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                            THEN 'S' ELSE 'N' END,
                    TPSI.COR
                    ".$orderby."
                limit ".$topListaProduto.", ".$length."";
        }
    //printr($query);
    	$retorno = $this->mysqli->ConsultarSQL($query);
    	
    	return $retorno;
    	
    }


    public function fnProdutoDesejo($idPessoa, $menuDesejo=null, $idCategoriaDesejo=null) {

      $idPessoa = sqlvalue($idPessoa, false);

      $colunaAdicional = "";
      if(isset($menuDesejo)){
        $colunaAdicional = ", MAX(PRDE.PRCO_ID_PRODUTO_COMBINACAO) PRCO_ID_PRODUTO_COMBINACAO,
                            PRDE.ID_PRODUTO_DESEJO,
                            fn_saldo_disponivel_produto(MAX(PRDE.PRCO_ID_PRODUTO_COMBINACAO), NOW()) SALDO,
                            TPSI.PRECO_VENDA,
                            TPSI.PRECO_PROMOCIONAL,
                            TPSI.DESCRICAO_VENDA,
                            TPSI.PROD_ID_PRODUTO ID_PRODUTO,
                            TPSI.IMAGEM_PRINCIPAL IMAGEM,
                            TPSI.TIPO_PROMOCAO TIPO_PROMOCAO,
                            TPSI.VALOR_PROMOCAO,
                            TPSI.DATA_INICIAL_VALIDADE_PROMO DATA_INICIAL_PROMO,
                            TPSI.DATA_FINAL_VALIDADE_PROMO DATA_FINAL_PROMO,
                            TPSI.FRETE_GRATIS";
      }

      $where = "";
      if(isset($idCategoriaDesejo)){
        $idCategoriaDesejo = sqlvalue($idCategoriaDesejo, false);
        $where = " AND PRCA.CATE_ID_CATEGORIA = ".$idCategoriaDesejo." ";
      }

      $query = "SELECT
                    CATE.DESCRICAO_CATEGORIA,
                    CATE.ID_CATEGORIA
                    ".$colunaAdicional."
                  FROM
                    e_PRODUTO_DESEJO PRDE,
                    ".TABELA_PRODUTO_SITE." TPSI,
                    e_PRODUTO_CATEGORIA PRCA,
                    e_CATEGORIA CATE
                  WHERE
                    PRDE.PESS_ID_PESSOA = ".$idPessoa."
                  AND PRDE.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
                  AND TPSI.PROD_ID_PRODUTO = PRCA.PROD_ID_PRODUTO
                  AND PRDE.DATA_DELETE IS NULL
                  ".$where."
                  AND CATE.ID_CATEGORIA = (
                                            SELECT
                                            MAX(CATE2.ID_CATEGORIA)
                                            FROM
                                            e_CATEGORIA CATE2,
                                            e_PRODUTO PROD2,
                                            e_PRODUTO_CATEGORIA PRCA2
                                            WHERE
                                            CATE2.ID_CATEGORIA = PRCA2.CATE_ID_CATEGORIA
                                            AND PRCA2.PROD_ID_PRODUTO = PROD2.ID_PRODUTO
                                            AND TPSI.PROD_ID_PRODUTO = PROD2.ID_PRODUTO
                                          )
                GROUP BY
                      PRDE.ID_PRODUTO_DESEJO,
                      TPSI.PRECO_VENDA,
                      TPSI.PRECO_PROMOCIONAL,
                      TPSI.DESCRICAO_VENDA,
                      TPSI.PROD_ID_PRODUTO,
                      TPSI.IMAGEM_PRINCIPAL,
                      TPSI.TIPO_PROMOCAO,
                      TPSI.VALOR_PROMOCAO,
                      TPSI.DATA_INICIAL_VALIDADE_PROMO,
                      TPSI.DATA_FINAL_VALIDADE_PROMO,
                      TPSI.FRETE_GRATIS;";
     
        $retorno = $this->mysqli->ConsultarSQL($query);

        return $retorno;

    }

    public function fnCategoriaProduto(){

      $query = "SELECT
                    CATE.DESCRICAO_CATEGORIA,
                    CATE.CATE_ID_CATEGORIA,
                    CATE.ID_CATEGORIA,
                    lower(fn_trata_caracter_especial(CATE.DESCRICAO_CATEGORIA)) URL_AMIGAVEL
                  FROM
                    e_CATEGORIA CATE";

      $result = $mysqli->ExecutarSQL($query);
      
      $menuItens = array();
      while($row = mssql_fetch_array($result)){
        $menuItens[$row['CATE_ID_CATEGORIA']][$row['ID_CATEGORIA']] = array('link' => $row['URL_AMIGAVEL'],'name' => $row['DESCRICAO_CATEGORIA']);
      }
      
      return $menuItens;
    
    }

    public function fnProdutoPreco($idProduto){

      $query = "SELECT
                    PPVE1.TPVE_ID_TABELA_PRECO_VENDA,
                    PPVE1.VALOR,
                    date_format(PPVE1.DATA_INICIAL_VALIDADE, '%d/%m/%Y') DATA_INICIAL_VALIDADE,
                    date_format(PPVE1.DATA_FINAL_VALIDADE, '%d/%m/%Y') DATA_FINAL_VALIDADE,
                    PRMA.MARKUP,
                    fn_valor_parametro_loja('MARKUP', ".ID_LOJA.") MARKUP_GERAL
                  FROM
                    e_PRODUTO_PRECO_VENDA PPVE1,
                    e_PRODUTO_MARKUP PRMA
                  WHERE
                    PPVE1.PROD_ID_PRODUTO = ".$idProduto."
                    AND PPVE1.PROD_ID_PRODUTO = PRMA.PROD_ID_PRODUTO
                    AND PPVE1.TPVE_ID_TABELA_PRECO_VENDA  IN (".TABELA_PRECO_VENDA_PADRAO.")
                    AND PPVE1.DATA_INICIAL_VALIDADE = (SELECT
                                            MAX(PPVE.DATA_INICIAL_VALIDADE)
                                          FROM
                                            e_PRODUTO_PRECO_VENDA PPVE
                                          WHERE
                                            now() BETWEEN PPVE.DATA_INICIAL_VALIDADE AND IFNULL(PPVE.DATA_FINAL_VALIDADE, now()+1)
                                            AND PPVE.TPVE_ID_TABELA_PRECO_VENDA IN (".TABELA_PRECO_VENDA_PADRAO.")
                                            AND PPVE.PROD_ID_PRODUTO = ".$idProduto."
                                           )
            
                UNION
                SELECT
                  PPVE1.TPVE_ID_TABELA_PRECO_VENDA,
                  PPVE1.VALOR,
                  date_format(PPVE1.DATA_INICIAL_VALIDADE, '%d/%m/%Y') DATA_INICIAL_VALIDADE,
                  date_format(PPVE1.DATA_FINAL_VALIDADE, '%d/%m/%Y') DATA_FINAL_VALIDADE,
                  PRMA.MARKUP,
                  fn_valor_parametro_loja('MARKUP', ".ID_LOJA.") MARKUP_GERAL
                FROM
                  e_PRODUTO_PRECO_VENDA PPVE1,
                  e_PRODUTO_MARKUP PRMA
                WHERE
                  PPVE1.PROD_ID_PRODUTO = ".$idProduto."
                  AND PPVE1.PROD_ID_PRODUTO = PRMA.PROD_ID_PRODUTO
                  AND PPVE1.TPVE_ID_TABELA_PRECO_VENDA IN (".TABELA_PRECO_VENDA_PROMOCIONAL.")
                  AND PPVE1.DATA_INICIAL_VALIDADE = (SELECT
                                          MAX(PPVE.DATA_INICIAL_VALIDADE)
                                        FROM
                                          e_PRODUTO_PRECO_VENDA PPVE
                                        WHERE
                                          now() BETWEEN PPVE.DATA_INICIAL_VALIDADE AND IFNULL(PPVE.DATA_FINAL_VALIDADE, now()+1)
                                          AND PPVE.TPVE_ID_TABELA_PRECO_VENDA IN (".TABELA_PRECO_VENDA_PROMOCIONAL.")
                                          AND PPVE.PROD_ID_PRODUTO = ".$idProduto."
                                         )
                ";

      $result = $this->mysqli->ConsultarSQL($query);

      return $result;

    }

    public function fnProdutoPrecoTodos($idProduto){

      $query = "SELECT
                    TPVE.DESCRICAO,
                    PPVE.VALOR,
                    date_format(PPVE.DATA_INICIAL_VALIDADE, '%d/%m/%Y') DATA_INICIAL_VALIDADE,
                    date_format(PPVE.DATA_FINAL_VALIDADE, '%d/%m/%Y') DATA_FINAL_VALIDADE,
                    date_format(PPVE.DATA_INSERT, '%d/%m/%Y') DATA_INSERT,
                    PPVE.ID_PRODUTO_PRECO_VENDA,
                    CASE IFNULL(PRMA.MARKUP, 0)
                    WHEN 0 THEN fn_valor_parametro_loja('MARKUP', ".ID_LOJA.")
                    ELSE PRMA.MARKUP END MARKUP
                  FROM
                    e_PRODUTO_PRECO_VENDA PPVE,
                    e_TABELA_PRECO_VENDA TPVE,
                    e_PRODUTO_MARKUP PRMA
                  WHERE
                    PPVE.PROD_ID_PRODUTO = ".$idProduto."
                  AND PPVE.PROD_ID_PRODUTO = PRMA.PROD_ID_PRODUTO
                  AND PPVE.TPVE_ID_TABELA_PRECO_VENDA = TPVE.ID_TABELA_PRECO_VENDA 
                  AND PPVE.DATA_INSERT > NOW()-INTERVAL 1 DAY
                  ORDER BY
                    PPVE.DATA_INSERT DESC";

      $result = $this->mysqli->ConsultarSQL($query);

      return $result;

    }

    public function fnProdutoSiteListaCasamento($idProdutoCombinacaoAtributoValor=null){

      if(isset($idProdutoCombinacaoAtributoValor)){
        $idsProdutos = implode(',', $idProdutoCombinacaoAtributoValor);
        $where .= " AND TPSI.PRCO_ID_PRODUTO_COMBINACAO IN (".$idsProdutos.") ";
      }

      $query = "SELECT 
                            TPSI.PRCO_ID_PRODUTO_COMBINACAO
                           ,TPSI.PROD_ID_PRODUTO
                           ,TPSI.PRCO_ID_PRODUTO_COMBINACAO
                           ,TPSI.DESCRICAO_VENDA
                           ,TPSI.REFERENCIA
                           ,TPSI.DESCRICAO_LONGA
                           ,TPSI.DESCRICAO_CURTA
                           ,TPSI.PRECO_VENDA
                           ,CASE WHEN now() BETWEEN IFNULL(TPSI.DATA_INICIAL_VALIDADE_PROMO, now()) AND IFNULL(TPSI.DATA_FINAL_VALIDADE_PROMO, now())
                           THEN 
                           CASE WHEN IFNULL(TPSI.PRECO_PROMOCIONAL,0) > TPSI.PRECO_VENDA
                                  THEN NULL
                                  ELSE TPSI.PRECO_PROMOCIONAL
                                  END
                            ELSE NULL END PRECO_PROMOCIONAL
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_VALIDADE_PROMO AND TPSI.DATA_FINAL_VALIDADE_PROMO
                           THEN TPSI.TIPO_PROMOCAO ELSE NULL END TIPO_PROMOCAO
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_VALIDADE_PROMO AND TPSI.DATA_FINAL_VALIDADE_PROMO
                           THEN TPSI.VALOR_PROMOCAO ELSE NULL END VALOR_PROMOCAO
                           ,TPSI.DATA_INICIAL_VALIDADE_PROMO
                           ,TPSI.DATA_FINAL_VALIDADE_PROMO
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_VALIDADE_PROMO AND TPSI.DATA_FINAL_VALIDADE_PROMO
                           THEN TPSI.FRETE_GRATIS ELSE 'N' END FRETE_GRATIS
                           ,TPSI.DATA_INICIAL_LANCAMENTO
                           ,TPSI.DATA_FINAL_LANCAMENTO
                           ,TPSI.PNAU_ID_PRODUTO_NIVEL_AUXILIAR
                           ,TPSI.DESCRICAO_PRODUTO_NIVEL_AUXILIAR
                           ,TPSI.URL_AMIGAVEL_PNAUX
                           ,TPSI.TAGS
                           ,TPSI.URL_AMIGAVEL
                           ,TPSI.META_TITLE
                           ,TPSI.META_DESCRIPTION
                           ,TPSI.META_KEYWORDS
                           ,TPSI.VIDEO
                           ,TPSI.IMAGEM_PRINCIPAL
                           ,CASE WHEN now() BETWEEN TPSI.DATA_INICIAL_LANCAMENTO AND TPSI.DATA_FINAL_LANCAMENTO
                                    THEN 'S' ELSE 'N' END LANCAMENTO
                           
                 FROM
                    ".TABELA_PRODUTO_SITE." TPSI
                WHERE 
                fn_saldo_disponivel_produto(TPSI.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0
                ".$where."";

      $result = $this->mysqli->ConsultarSQL($query);

      return $result;

    }


}

?>