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
    					"REFERENCIA",
						"DESCRICAO_SITUACAO",
						"PCJU_ID_PRODUTO_COMPRE_JUNTO",
                        "FORCA_COMPRE_JUNTO"); 
    
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
					PROD.DESCRICAO_VENDA LIKE (".$sSearch.") OR
					--DESCRICAO_SITUACAO LIKE (".$sSearch.") OR
					PRCO.REFERENCIA LIKE (".$sSearch.")"; 
        
        $sWhere .= ")";
    }
     
    $idCompreJunto = sqlvalue($_GET['idCompreJunto'], true);

    $sQuery = "SELECT
                    PROD.ID_PRODUTO,
                    CASE WHEN PCIM.IMAGEM IS NULL THEN concat('<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">') ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END IMAGEM,
                    PROD.DESCRICAO_VENDA,
                    PROD.REFERENCIA,
                    PRSI.DESCRICAO_SITUACAO,
                    PROD.PRSI_ID_PRODUTO_SITUACAO,
                    PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO,
                    PCJC.FORCA_COMPRE_JUNTO
                FROM
                    e_PRODUTO PROD LEFT JOIN e_PRODUTO_COMPRE_JUNTO_COMBINACAO PCJC
                                          ON PROD.ID_PRODUTO = PCJC.PROD_ID_PRODUTO
                                         AND PCJC.DATA_DELETE IS NULL
                                         AND PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto.",
                    e_PRODUTO_SITUACAO PRSI,
                    e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                     ON PCIM.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
                                                    AND PCIM.PRINCIPAL = 'S'
                WHERE
                    PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
                AND PROD.PRSI_ID_PRODUTO_SITUACAO = 1
                AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
                AND PRCO.ID_PRODUTO_COMBINACAO = (SELECT MIN(PRCO2.ID_PRODUTO_COMBINACAO) FROM e_PRODUTO_COMBINACAO PRCO2 WHERE PRCO2.PROD_ID_PRODUTO = PROD.ID_PRODUTO)
                $sWhere
                ORDER BY PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO DESC, PROD.ID_PRODUTO ASC
                limit $sTop, $sLength";

    $rResult = $mysqli->ExecutarSQL($sQuery);
     
    /* Data set length after filtering */
    $aResultFilterTotal = $mysqli->NumeroLinhas($rResult);
    $iFilteredTotal = $aResultFilterTotal;
     
    /* Total data set length */
    $sQuery = "SELECT
                    PROD.ID_PRODUTO,
                    CASE WHEN PCIM.IMAGEM IS NULL THEN concat('<img src=\"../midia/produtos/carrinho/SEM_IMAGEM.JPG\">') ELSE concat('<img src=\"../midia/produtos/carrinho/', PCIM.IMAGEM, '\">') END IMAGEM,
                    PROD.DESCRICAO_VENDA,
                    PROD.REFERENCIA,
                    PRSI.DESCRICAO_SITUACAO,
                    PROD.PRSI_ID_PRODUTO_SITUACAO,
                    PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO,
                    PCJC.FORCA_COMPRE_JUNTO
                FROM
                    e_PRODUTO PROD LEFT JOIN e_PRODUTO_COMPRE_JUNTO_COMBINACAO PCJC
                                          ON PROD.ID_PRODUTO = PCJC.PROD_ID_PRODUTO
                                         AND PCJC.DATA_DELETE IS NULL
                                         AND PCJC.PCJU_ID_PRODUTO_COMPRE_JUNTO = ".$idCompreJunto.",
                    e_PRODUTO_SITUACAO PRSI,
                    e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
                                                     ON PCIM.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
                                                    AND PCIM.PRINCIPAL = 'S'
                WHERE
                    PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
                AND PROD.PRSI_ID_PRODUTO_SITUACAO = 1
                AND PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
                AND PRCO.ID_PRODUTO_COMBINACAO = (SELECT MIN(PRCO2.ID_PRODUTO_COMBINACAO) FROM e_PRODUTO_COMBINACAO PRCO2 WHERE PRCO2.PROD_ID_PRODUTO = PROD.ID_PRODUTO)
                ";
    $rResultTotal = $mysqli->ExecutarSQL($sQuery);
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