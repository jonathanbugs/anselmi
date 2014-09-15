<?php
    /*
     * Local functions
     */
    function fatal_error ( $sErrorMessage = '' )
    {
        header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
        die( $sErrorMessage );
    }
 
     
    require('../configs/config.php');
     
    $aColumns = array(  "ID_PRODUTO",
                        "IMAGEM",
						"DESCRICAO_VENDA",
                        "ATRIBUTO",
    					"REFERENCIA",
						"DESCRICAO_SITUACAO",
						"LANCAMENTO"); 
    
    //$_GET['iDisplayStart'] = 1;
    //$_GET['iDisplayLength'] = 25;
    $sTop = "";
    $sLength = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sTop = $_GET['iDisplayStart'];
        $sLength = $_GET['iDisplayLength'];
    } 
     
     
    /*
     * Ordering
     */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
    
    function mysqli_escape($str)
	{
	    if(get_magic_quotes_gpc())
	    {
	        $str= stripslashes($str);
	    }
	    return str_replace("'", "''", $str);
	}
     
     
       
    $sWhere = "";
    //$_GET['sSearch'] = 'paul';
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
    	$sSearch = sqlvalue("%".$_GET["sSearch"]."%", true);
        $sWhere = "AND (";
        
        $sWhere .= "PROD.ID_PRODUTO LIKE (".$sSearch.") OR
                    ATVA.VALOR LIKE (".$sSearch.") OR
					PROD.DESCRICAO_VENDA LIKE (".$sSearch.") OR
					PRSI.DESCRICAO_SITUACAO LIKE (".$sSearch.") OR
					PROD.REFERENCIA LIKE (".$sSearch.")"; 
        
        $sWhere .= ")";
    }
     
      
    $sQuery = "
							SELECT
								PROD.ID_PRODUTO,
                                CASE WHEN PCIM.IMAGEM IS NULL THEN '<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">'
                                     ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END IMAGEM,
								PROD.DESCRICAO_VENDA,
                                ATVA.VALOR ATRIBUTO,
								PROD.REFERENCIA,
								PRSI.DESCRICAO_SITUACAO,
								PROD.PRSI_ID_PRODUTO_SITUACAO,
								CASE WHEN PROD.DATA_INICIAL_LANCAMENTO < now() 
									  AND PROD.DATA_FINAL_LANCAMENTO > now() 
									 THEN 'S' ELSE 'N' END LANCAMENTO     
							FROM
								e_PRODUTO PROD,
								e_PRODUTO_SITUACAO PRSI,
                                e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                                                ON PRCO.ID_PRODUTO_COMBINACAO = PCIM.PRCO_ID_PRODUTO_COMBINACAO
                                                                               AND PCIM.PRINCIPAL = 'S',
                                e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
                                e_ATRIBUTO_VALOR ATVA 
							WHERE
								PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
                            AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
                            AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
                            AND PCAV.ATVA_ID_ATRIBUTO_VALOR = ATVA.ID_ATRIBUTO_VALOR
                            AND ATVA.ATRI_ID_ATRIBUTO = 1
								$sWhere
                            GROUP BY
                                PROD.ID_PRODUTO,
                                CASE WHEN PCIM.IMAGEM IS NULL THEN '<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">'
                                     ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END,
                                PROD.DESCRICAO_VENDA,
                                ATVA.VALOR,
                                PROD.REFERENCIA,
                                PRSI.DESCRICAO_SITUACAO,
                                PROD.PRSI_ID_PRODUTO_SITUACAO,
                                CASE WHEN PROD.DATA_INICIAL_LANCAMENTO < now() 
                                      AND PROD.DATA_FINAL_LANCAMENTO > now() 
                                     THEN 'S' ELSE 'N' END
                                $sOrder
							limit $sTop, $sLength
							";
        //printr($sQuery);
    $rResult = $mysqli->ExecutarSQL($sQuery);
     
    /* Data set length after filtering */
  //   $sQuery = "
  //       SELECT COUNT(ID_PRODUTO)
  //       FROM
		// 	e_PRODUTO PROD,
		// 	e_PRODUTO_SITUACAO PRSI
		// WHERE
		// 	PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
        
  //       $sWhere
  //   ";
        //printr($sQuery);
    //$rResultFilterTotal = $mysqli->ExecutarSQL( $sQuery);
    //$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    //$iFilteredTotal = $aResultFilterTotal[0];

    $aResultFilterTotal = $mysqli->NumeroLinhas($rResult);
    $iFilteredTotal = $aResultFilterTotal;
     
    /* Total data set length */
    $sQuery = "
        SELECT
                PROD.ID_PRODUTO,
                CASE WHEN PCIM.IMAGEM IS NULL THEN '<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">'
                     ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END IMAGEM,
                PROD.DESCRICAO_VENDA,
                ATVA.VALOR ATRIBUTO,
                PROD.REFERENCIA,
                PRSI.DESCRICAO_SITUACAO,
                PROD.PRSI_ID_PRODUTO_SITUACAO,
                CASE WHEN PROD.DATA_INICIAL_LANCAMENTO < now() 
                      AND PROD.DATA_FINAL_LANCAMENTO > now() 
                     THEN 'S' ELSE 'N' END LANCAMENTO     
            FROM
                e_PRODUTO PROD,
                e_PRODUTO_SITUACAO PRSI,
                e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                                ON PRCO.ID_PRODUTO_COMBINACAO = PCIM.PRCO_ID_PRODUTO_COMBINACAO
                                                               AND PCIM.PRINCIPAL = 'S',
                e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
                e_ATRIBUTO_VALOR ATVA 
            WHERE
                PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
            AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
            AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
            AND PCAV.ATVA_ID_ATRIBUTO_VALOR = ATVA.ID_ATRIBUTO_VALOR
            AND ATVA.ATRI_ID_ATRIBUTO = 1
            GROUP BY
                PROD.ID_PRODUTO,
                CASE WHEN PCIM.IMAGEM IS NULL THEN '<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">'
                     ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END,
                PROD.DESCRICAO_VENDA,
                ATVA.VALOR,
                PROD.REFERENCIA,
                PRSI.DESCRICAO_SITUACAO,
                PROD.PRSI_ID_PRODUTO_SITUACAO,
                CASE WHEN PROD.DATA_INICIAL_LANCAMENTO < now() 
                      AND PROD.DATA_FINAL_LANCAMENTO > now() 
                     THEN 'S' ELSE 'N' END
    ";
    $rResultTotal = $mysqli->ExecutarSQL( $sQuery);
    $aResultTotal = $mysqli->NumeroLinhas($rResultTotal);
    $iTotal = $aResultTotal;
     
     
    /*
     * Output
     */
    //$_GET['sEcho'] = 1;
    //if(isset($_GET['sEcho'])) $_GET['sEcho'] = $_GET['sEcho']; else $_GET['sEcho'] = 1;
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $aRow[ $aColumns[$i] ];
            }
        }
        
        $row = array_map("utf8_encode", $row);
	    
        $output['aaData'][] = $row;
    }
    
  
    
     //printr($output);
    echo json_encode( $output );
?>