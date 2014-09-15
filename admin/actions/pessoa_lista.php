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
     
    $aColumns = array( "ID_PESSOA", "NOME", "DATA_NASCIMENTO", "CPF", "EMAIL", "TIPO", "CATEGORIA", "NEWSLETTER" ); 
    
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
        
        $sWhere .= " PESS.ID_PESSOA LIKE (".$sSearch.") OR
					PESS.NOME LIKE (".$sSearch.") OR
					PESS.SOBRENOME LIKE (".$sSearch.") OR
					PESS.NOME_FANTASIA LIKE (".$sSearch.") OR
					CONVERT(CHAR,PESS.DATA_NASCIMENTO, 103) LIKE (".$sSearch.") OR
					PESS.CPF LIKE (".$sSearch.") OR
					PESS.CNPJ LIKE (".$sSearch.") OR
					PESS.EMAIL LIKE (".$sSearch.") OR
					PETC.DESCRICAO_TIPO_CATEGORIA LIKE (".$sSearch.")";
        
        $sWhere .= ")";
    }
     
    if(ID_LOJA <> 1){
        $whereIdLoja = "AND (PESS.LOJA_ID_LOJA = ".ID_LOJA." OR EXISTS (SELECT 1 FROM e_PEDIDO PEDI WHERE PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."))";
    } else {
        $whereIdLoja = "";
    }
    
    $sQuery = "SELECT
			    	PESS.ID_PESSOA,
                    CASE TIPO WHEN 'F' THEN concat(PESS.NOME, ' ', PESS.SOBRENOME) ELSE PESS.NOME_FANTASIA END NOME,
                    DATE_FORMAT(PESS.DATA_NASCIMENTO,'%d/%m/%Y') DATA_NASCIMENTO,
                    CASE TIPO WHEN 'F' THEN PESS.CPF ELSE PESS.CNPJ END CPF,
                    PESS.EMAIL,
                    PESS.TIPO,
                    PESS.NEWSLETTER,
                    PETC.DESCRICAO_TIPO_CATEGORIA CATEGORIA 
			    FROM e_PESSOA PESS,
			    	 e_PESSOA_TIPO_CATEGORIA PETC
			    WHERE
			    	PESS.PETC_ID_PESSOA_TIPO_CATEGORIA = PETC.ID_PESSOA_TIPO_CATEGORIA
                    $whereIdLoja
			    $sWhere
                $sOrder
                limit $sTop, $sLength
			";
        //printr($sQuery);
    $rResult = $mysqli->ExecutarSQL($sQuery);
     
    /* Data set length after filtering */
    $sQuery = "
        SELECT COUNT(ID_PESSOA)
        FROM e_PESSOA PESS,
             e_PESSOA_TIPO_CATEGORIA PETC
        WHERE
            PESS.PETC_ID_PESSOA_TIPO_CATEGORIA = PETC.ID_PESSOA_TIPO_CATEGORIA
            $whereIdLoja
        $sWhere
    ";
        //printr($sQuery);
    $rResultFilterTotal = $mysqli->ExecutarSQL($sQuery);
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(ID_PESSOA)
        FROM   e_PESSOA
        WHERE
        1=1
        ".$whereIdLoja."
    ";
    $rResultTotal = $mysqli->ExecutarSQL($sQuery);
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
        
        $output['aaData'][] = $row;
    }
    
  
    
     //printr($output);
    echo json_encode( $output );
?>