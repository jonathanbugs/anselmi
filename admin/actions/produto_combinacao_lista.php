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
     
    $aColumns = array(  "ID_PRODUTO_COMBINACAO",
						"DESCRICAO_VENDA",
    					"REFERENCIA",
    					"ID_PRODUTO"); 
    
    //$_GET['iDisplayStart'] = 1;
    //$_GET['iDisplayLength'] = 25;
    $sTop = "";
    $sLength = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sTop = $_GET['iDisplayStart']+1;
        $sLength = $_GET['iDisplayLength']-1;
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
    
    function mssql_escape($str)
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
					PROD.REFERENCIA LIKE (".$sSearch.")"; 
        
        $sWhere .= ")";
    }
     
      
    $sQuery = "WITH PRODUTO AS
							(
							SELECT
								PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO_COMBINACAO,
								PROD.DESCRICAO_VENDA,
								PROD.REFERENCIA,
								PROD.ID_PRODUTO,
								ROW_NUMBER() OVER ($sOrder) INDICE
							FROM
								e_PRODUTO PROD,
								e_PRODUTO_COMBINACAO PRCO,
								e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV
							WHERE
								PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
							AND PROD.PRSI_ID_PRODUTO_SITUACAO = 1
							AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
                            AND (SELECT VALOR FROM fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now())) > ".VALOR_MINIMO_LIBERA_PRODUTO_VENDA."
								$sWhere
							)
							SELECT *
							FROM PRODUTO
							WHERE INDICE BETWEEN $sTop AND $sTop+$sLength
							";
        //printr($sQuery);
    $rResult = mssql_query($sQuery);
     
    /* Data set length after filtering */
    $sQuery = "
        SELECT COUNT(ID_PRODUTO)
        FROM
			e_PRODUTO PROD,
			e_PRODUTO_SITUACAO PRSI
		WHERE
			PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
        AND (SELECT VALOR FROM fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now())) > ".VALOR_MINIMO_LIBERA_PRODUTO_VENDA."
        
        $sWhere
    ";
        //printr($sQuery);
    $rResultFilterTotal = mssql_query( $sQuery);
    $aResultFilterTotal = mssql_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(ID_PRODUTO)
        FROM
			e_PRODUTO PROD,
			e_PRODUTO_SITUACAO PRSI
		WHERE
			PROD.PRSI_ID_PRODUTO_SITUACAO = PRSI.ID_PRODUTO_SITUACAO
        AND (SELECT VALOR FROM fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now())) > ".VALOR_MINIMO_LIBERA_PRODUTO_VENDA."
    ";
    $rResultTotal = mssql_query( $sQuery);
    $aResultTotal = mssql_fetch_array($rResultTotal);
    $iTotal = $aResultTotal[0];
     
     
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
     
    while ( $aRow = mssql_fetch_array( $rResult ) )
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