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
     
    $aColumns = array( 'ID_PROMOCAO_CARRINHO'
                        ,'DESCRICAO_PROMOCAO'
                        ,'CUPOM_PROMOCIONAL'
                        ,'PROMOCAO_ATIVA'
                        ,'EMAIL_CLIENTE_CONTEMPLADO'
                        ,'DATA_INICIAL_VALIDADE'
                        ,'DATA_FINAL_VALIDADE'
                        ,'UTILIZACAO_UNICA'
                        ,'FRETE_GRATIS'
                        ,'VALOR_DESCONTO'
                        ,'TIPO_DESCONTO'
                        ,'ID_PROMOCAO_CARRINHO' ); 
    
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
        $sWhere = "WHERE (";
        
        $sWhere .= " ID_PROMOCAO_CARRINHO LIKE (".$sSearch.") OR
					DESCRICAO_PROMOCAO LIKE (".$sSearch.") OR
					CUPOM_PROMOCIONAL LIKE (".$sSearch.") OR
					EMAIL_CLIENTE_CONTEMPLADO LIKE (".$sSearch.") OR
					FRETE_GRATIS LIKE (".$sSearch.")
					";
        
        $sWhere .= ")";
    }
     
     
    
    $sQuery = "SELECT 
                    ID_PROMOCAO_CARRINHO
                    ,DESCRICAO_PROMOCAO
                    ,CUPOM_PROMOCIONAL
                    ,PROMOCAO_ATIVA
                    ,EMAIL_CLIENTE_CONTEMPLADO
                    ,date_format(DATA_INICIAL_VALIDADE,'%d/%m/%Y') DATA_INICIAL_VALIDADE
                    ,date_format(DATA_FINAL_VALIDADE,'%d/%m/%Y') DATA_FINAL_VALIDADE
                    ,UTILIZACAO_UNICA
                    ,FRETE_GRATIS
                    ,VALOR_DESCONTO
                    ,TIPO_DESCONTO
                FROM 
                    e_PROMOCAO_CARRINHO
				    $sWhere
				    $sOrder
              limit $sTop, $sLength
							";
       // printr($sQuery);
    $rResult = $mysqli->ExecutarSQL($sQuery);
     
    /* Data set length after filtering */
    $sQuery = "
        SELECT 
            COUNT(ID_PROMOCAO_CARRINHO)
        FROM 
            e_PROMOCAO_CARRINHO
        $sWhere
    ";
        //printr($sQuery);
    $rResultFilterTotal = $mysqli->ExecutarSQL( $sQuery);
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT 
            COUNT(ID_PROMOCAO_CARRINHO)
        FROM 
            e_PROMOCAO_CARRINHO
    ";
    $rResultTotal = $mysqli->ExecutarSQL( $sQuery);
    $aResultTotal = mysqli_fetch_array($rResultTotal);
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

        if($row[10] == 'P'){
            $row = str_replace($row[9], number_format($row[9]), $row);
        } elseif($row[10] == 'V') {
            $row = str_replace($row[9], fnFormataPreco($row[9]), $row);   
        } else {
            $row = $row;
        }
        
        $output['aaData'][] = $row;
    }
    
  
    
     //printr($output);
    echo json_encode( $output );
?>