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
     
    $aColumns = array(  "ID_PEDIDO",
                        "NUMERO_PEDIDO",
						"DATA_EMISSAO",
    					"NOME",
						"CPF",
    					"EMAIL",
						"VALOR_TOTAL_PAGAMENTO",
    					"DESCRICAO_FORMA_PAGAMENTO",
    					"DESCRICAO_PEDIDO_ITEM_SITUACAO",
                        // "LICA_ID_LISTA_CASAMENTO",
                        "ID_PEDIDO"
						 ); 
    
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
        
        $sWhere .= "NUMERO_PEDIDO LIKE ".$sSearch." OR
                    DATA_EMISSAO LIKE ".$sSearch." OR
                    NOME LIKE ".$sSearch." OR
                    CPF LIKE ".$sSearch." OR
                    EMAIL LIKE ".$sSearch." OR
                    VALOR_TOTAL_PAGAMENTO LIKE ".$sSearch." OR
                    DESCRICAO_FORMA_PAGAMENTO LIKE ".$sSearch." OR
                    DESCRICAO_PEDIDO_ITEM_SITUACAO LIKE ".$sSearch."";
        
        $sWhere .= ")";
    }

    if(ID_LOJA <> 1){
        $whereIdLoja = "AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."";
    } else {
        $whereIdLoja = "";
    }

    $sQuery = "SELECT
					PEDI.ID_PEDIDO,
                    PEDI.NUMERO_PEDIDO,
                    date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y %h:%i:%s') DATA_EMISSAO,
                    CASE IFNULL(PESS.CPF, 'J') WHEN 'J' THEN 
                        PESS.NOME_FANTASIA
                    ELSE
                        concat(ifnull(PESS.NOME, ''), ' ', ifnull(PESS.SOBRENOME, ''))
                    END NOME,
                    IFNULL(PESS.CNPJ, PESS.CPF) CPF,
                    PESS.EMAIL,
                    (SUM(((PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
                    - (IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0)))
                    +(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE))+IFNULL(PEDI.VALOR_FRETE,0)) VALOR_TOTAL_PAGAMENTO,
                    PEPA.NUMERO_PARCELAS,
                    FOPA.DESCRICAO_FORMA_PAGAMENTO,
                    PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
                    rtrim(ltrim(date_format(ADDDATE(PEDI.DATA_EMISSAO, ifnull(PEDI.PRAZO_ENTREGA_DIAS,0)), '%d/%m/%Y'))) ETA,
                    PEDI.PRAZO_ENTREGA_DIAS,
                    TIFR.DESCRICAO_FRETE,
                    PEDI.VALOR_FRETE/*,
                    PEIT.LICA_ID_LISTA_CASAMENTO*/
				FROM
					e_PEDIDO PEDI,
					e_PEDIDO_PAGAMENTO PEPA,
					e_FORMA_PAGAMENTO FOPA,
					e_PEDIDO_ITEM_SITUACAO PISI,
					e_PESSOA PESS,
					e_TIPO_FRETE TIFR,
					e_PEDIDO_ITEM PEIT
				WHERE
					PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
				AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
				AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
				AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
				".$whereIdLoja."
				AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
				AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
                AND PEPA.ATIVO = 'S'
				$sWhere
				GROUP BY
                    PEDI.ID_PEDIDO,
                    PEDI.NUMERO_PEDIDO,
                    date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y %h:%i:%s'),
                    PEPA.NUMERO_PARCELAS,
                    FOPA.DESCRICAO_FORMA_PAGAMENTO,
                    PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
                    IFNULL(PESS.CNPJ, PESS.CPF),
                    CASE IFNULL(PESS.CPF, 'J') WHEN 'J' THEN 
                        PESS.NOME_FANTASIA
                    ELSE
                        concat(ifnull(PESS.NOME, ''), ' ', ifnull(PESS.SOBRENOME, ''))
                    END,
                    PESS.EMAIL,
                    rtrim(ltrim(date_format(ADDDATE(PEDI.DATA_EMISSAO, ifnull(PEDI.PRAZO_ENTREGA_DIAS,0)), '%d/%m/%Y'))),
                    PEDI.PRAZO_ENTREGA_DIAS,
                    TIFR.DESCRICAO_FRETE,
                    PEDI.VALOR_FRETE,
                    PEPA.VALOR_TOTAL_PAGAMENTO,
                    PEPA.NUMERO_PARCELAS,
                    FOPA.DESCRICAO_FORMA_PAGAMENTO,
                    PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO/*,
                    PEIT.LICA_ID_LISTA_CASAMENTO*/
                    ".$sOrder."
                    limit ".$sTop.", ".$sLength."";
        //printr($sQuery);
    $rResult = $mysqli->ExecutarSQL($sQuery);
     
    /* Data set length after filtering */
    $sQuery = "SELECT COUNT(PEDI.ID_PEDIDO)
                FROM
                    e_PEDIDO PEDI,
                    e_PEDIDO_PAGAMENTO PEPA,
                    e_FORMA_PAGAMENTO FOPA,
                    e_PEDIDO_ITEM_SITUACAO PISI,
                    e_PESSOA PESS,
                    e_TIPO_FRETE TIFR,
                    e_PEDIDO_ITEM PEIT
                WHERE
                    PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
                AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
                AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
                AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
                AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."
                AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
                AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
                AND PEPA.ATIVO = 'S'
                $sWhere
                GROUP BY
                    PEDI.ID_PEDIDO,
                    PEDI.NUMERO_PEDIDO,
                    date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y %h:%i:%s'),
                    PEPA.NUMERO_PARCELAS,
                    FOPA.DESCRICAO_FORMA_PAGAMENTO,
                    PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
                    IFNULL(PESS.CNPJ, PESS.CPF),
                    CASE IFNULL(PESS.CPF, 'J') WHEN 'J' THEN 
                        PESS.NOME_FANTASIA
                    ELSE
                        concat(ifnull(PESS.NOME, ''), ' ', ifnull(PESS.SOBRENOME, ''))
                    END,
                    PESS.EMAIL,
                    rtrim(ltrim(date_format(ADDDATE(PEDI.DATA_EMISSAO, ifnull(PEDI.PRAZO_ENTREGA_DIAS,0)), '%d/%m/%Y'))),
                    PEDI.PRAZO_ENTREGA_DIAS,
                    TIFR.DESCRICAO_FRETE,
                    PEDI.VALOR_FRETE,
                    PEPA.VALOR_TOTAL_PAGAMENTO,
                    PEPA.NUMERO_PARCELAS,
                    FOPA.DESCRICAO_FORMA_PAGAMENTO,
                    PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO/*,
                    PEIT.LICA_ID_LISTA_CASAMENTO*/";
        //printr($sQuery);
    $rResultFilterTotal = $mysqli->ExecutarSQL($sQuery);
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(ID_PEDIDO)
        FROM   
            e_PEDIDO PEDI,
            e_PEDIDO_PAGAMENTO PEPA,
            e_FORMA_PAGAMENTO FOPA,
            e_PEDIDO_ITEM_SITUACAO PISI,
            e_PESSOA PESS,
            e_TIPO_FRETE TIFR
        WHERE
            PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
        AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
        AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
        AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
        AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."
        AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
        AND PEPA.ATIVO = 'S'
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

        $row = str_replace($row[4], fnFormataCpfCnpj($row[4]), $row);

        $row = str_replace($row[6], fnFormataPreco($row[6]), $row);
        
        //printr($row);

        $output['aaData'][] = $row;
    }
    
    
    echo json_encode( $output );

?>