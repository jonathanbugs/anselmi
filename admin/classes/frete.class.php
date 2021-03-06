<?php

class Frete {

	public function fnFrete($tipoFrete=null, $idPedido=null) {
		
		$idPedido = sqlvalue($idPedido, false);
		$tipoFrete = sqlvalue($tipoFrete, false);
		
		if(isset($tipoFrete) and isset($idPedido)){
			
			
			$queryPeso = "SELECT 
							    ROUND((SUM((IFNULL(PROD.ALTURA_CM,0)*PEIT.QUANTIDADE))*SUM((IFNULL(PROD.LARGURA_CM,0)*PEIT.QUANTIDADE))*SUM((IFNULL(PROD.PROFUNDIDADE_CM,0)*PEIT.QUANTIDADE)))/6000,2) TOTAL_PESO_CUBICO,
							    ROUND(SUM((IFNULL(PROD.PESO_KG,0)*PEIT.QUANTIDADE)),2) TOTAL_PESO_KG,
							    ROUND(SUM((IFNULL(PROD.ALTURA_CM,0)*PEIT.QUANTIDADE)),2) TOTAL_ALTURA,
							    ROUND(SUM((IFNULL(PROD.LARGURA_CM,0)*PEIT.QUANTIDADE)),2) TOTAL_LARGURA,
							    ROUND(SUM((IFNULL(PROD.PROFUNDIDADE_CM,0)*PEIT.QUANTIDADE)),2) TOTAL_PROFUNDIDADE,
							    PEEN.CEP_ID_CEP							    
							FROM
							    e_PEDIDO PEDI,
							    e_PEDIDO_ITEM PEIT,
							    e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
							    e_PRODUTO_COMBINACAO PRCO,
							    e_PRODUTO PROD,
							    e_PEDIDO_ENDERECO PEEN
							WHERE
							    PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
							AND PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
							AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
							AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
							AND PEDI.ID_PEDIDO = ".$idPedido."
							AND PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
							GROUP BY
								PEEN.CEP_ID_CEP";
	       	
	        $resultQueryPeso = $mysqli->ExecutarSQL($queryPeso);
	        $rowQueryPeso = @mssql_fetch_array($resultQueryPeso);
	        
	        $totalPesoCubico = number_format($rowQueryPeso["TOTAL_PESO_CUBICO"],2,',','.');
	        $totalPesoKg = number_format($rowQueryPeso["TOTAL_PESO_KG"],2,',','.');
	        $totalAltura = number_format($rowQueryPeso["TOTAL_ALTURA"],2,',','.');
	        $totalLargura = number_format($rowQueryPeso["TOTAL_LARGURA"],2,',','.');
	        $totalProfundidade = number_format($rowQueryPeso["TOTAL_PROFUNDIDADE"],2,',','.');
	        $cepDestino = $rowQueryPeso["CEP_ID_CEP"];
	        
			if($totalAltura <= 105 or $totalLargura <= 105 or $totalProfundidade <= 105){
				/*WEBSERVICE CORREIOS*/
				$xml = simplexml_load_file("http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08132828&sDsSenha=02804744&sCepOrigem=93525240&sCepDestino=".$cepDestino."&nVlPeso=".$totalPesoKg."&nCdFormato=1&nVlComprimento=".$totalProfundidade."&nVlAltura=".$totalAltura."&nVlLargura=".$totalLargura."&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=".$tipoFrete."&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3");
				//printr($xml);
			} else {
				$xml = "";
				$tipoFrete = ID_TIPO_FRETE_TRANSP_PADRAO;
			}
			
			
		} 
		
		
		if($xml->cServico->Codigo){
			
			$valorFrete = formataPrecoInsert($xml->cServico->Valor);
			$codErro = $xml->cServico->Erro;
			$MsgErro = $xml->cServico->MsgErro;

			if($codErro == '0') {
				$retorno = array(array("VALOR_FRETE" => $valorFrete));
				$mysqli->ExecutarSQL("UPDATE e_PEDIDO SET VALOR_FRETE = ".$valorFrete.", TIFR_ID_TIPO_FRETE = ".$tipoFrete." WHERE ID_PEDIDO = ".$idPedido."");
			} else {
				$retorno = array(array("MENSAGEM_ERRO" => $MsgErro, "COD_ERRO" => $codErro));
				//printr($retorno);
			}
			
		} else {
			
			
	        if(isset($tipoFrete)){
	        	$tipoFrete = sqlvalue($tipoFrete, true);
	        } else {
	        	$tipoFrete = "PEDI.TIFR_ID_TIPO_FRETE";
	        }
	        
	        if($totalPesoCubico > $totalPesoKg){
	        	
	        	if($totalPesoCubico > PESO_MAXIMO_CORREIOS){
	        		$adicionalTotalPesoCubico = $totalPesoCubico/PESO_MAXIMO_CORREIOS;
	        		$peso = PESO_MAXIMO_CORREIOS;
	        		$coluna = "IFNULL(PRUF.VALOR_FRETE, 0)*".$adicionalTotalPesoCubico;
	        	} else {
	        		$peso = $totalPesoCubico;	
	        		$coluna = "IFNULL(PRUF.VALOR_FRETE, 0)";
	        	}
	        	
	        } else {
	        	$peso = $totalPesoKg;
	        	$coluna = "IFNULL(PRUF.VALOR_FRETE, 0)";
	        }
	        
	        $query = "DECLARE @FRETE_GRATIS VARCHAR(1),
								@VALOR_FRETE NUMERIC(14,4),
								@TIPO_FRETE VARCHAR(10),
								@PESO_TOTAL NUMERIC(14,4)
						
						SET @PESO_TOTAL = ".$peso."
						SET @TIPO_FRETE = ".$tipoFrete."
						
						IF(@TIPO_FRETE <> ".ID_TIPO_FRETE_TRANSP_PADRAO.")
						BEGIN
							SELECT 
								@FRETE_GRATIS = IFNULL(PRUF.FRETE_GRATIS, 'N'),
								@VALOR_FRETE = ROUND(".$coluna.",2),
								@TIPO_FRETE = ".$tipoFrete."  
							FROM
								e_PEDIDO PEDI,
								e_PEDIDO_ENDERECO PEEN,
								e_MUNICIPIO MUNI,
								e_CEP_PRECIFICACAO_UF PRUF
							WHERE
								PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
							AND PEDI.ID_PEDIDO = ".$idPedido."
							AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
							AND PRUF.TIFR_ID_TIPO_FRETE = ".$tipoFrete."
							AND MUNI.UNFE_ID_ESTADO = PRUF.UNFE_ID_ESTADO
							AND ".$peso." BETWEEN PRUF.PESO_INICIAL AND PRUF.PESO_FINAL
							AND PEEN.CEP_ID_CEP BETWEEN PRUF.CEP_INICIAL AND PRUF.CEP_FINAL
						END
						ELSE
						BEGIN
							IF EXISTS (
								SELECT 
									1
								FROM
									e_PEDIDO PEDI,
									e_PEDIDO_ENDERECO PEEN,
									e_MUNICIPIO MUNI,
									e_PRECIFICACAO_TRANSP PRUF
								WHERE
									PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
								AND PEDI.ID_PEDIDO = ".$idPedido."
								AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
								AND PRUF.TIFR_ID_TIPO_FRETE = ".$tipoFrete."
								AND MUNI.UNFE_ID_ESTADO = PRUF.UNFE_ID_ESTADO
								AND MUNI.ID_MUNICIPIO = IFNULL(PRUF.MUNI_ID_MUNICIPIO,0)
							)
							BEGIN
								SELECT 
									@FRETE_GRATIS = 'N',
									@VALOR_FRETE = ((@PESO_TOTAL*PRUF.FRETE_KG)+PRUF.TAXA_FRETE_KG)+IFNULL(PRUF.PEDAGIO,0)
													+ TIFR.TAS_VALOR
													+ CASE WHEN ((SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
																+SUM(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)
																-IFNULL(PEIT.VALOR_DESCONTO,0))*TIFR.GRIS_PERCENTUAL)/100 < TIFR.GRIS_MINIMO
															THEN TIFR.GRIS_MINIMO
															ELSE ((SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
																+SUM(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)
																-IFNULL(PEIT.VALOR_DESCONTO,0))*TIFR.GRIS_PERCENTUAL)/100
															END,
									@TIPO_FRETE = ".$tipoFrete."
								FROM
									e_PEDIDO PEDI,
									e_PEDIDO_ENDERECO PEEN,
									e_MUNICIPIO MUNI,
									e_PRECIFICACAO_TRANSP PRUF,
									e_TIPO_FRETE TIFR,
									e_PEDIDO_ITEM PEIT
								WHERE
									PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
								AND PEDI.ID_PEDIDO = ".$idPedido."
								AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
								AND PRUF.TIFR_ID_TIPO_FRETE = ".$tipoFrete."
								AND MUNI.UNFE_ID_ESTADO = PRUF.UNFE_ID_ESTADO
								AND PRUF.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
								AND PRUF.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
								AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
								GROUP BY
								((@PESO_TOTAL*PRUF.FRETE_KG)+PRUF.TAXA_FRETE_KG)+IFNULL(PRUF.PEDAGIO,0),
								TIFR.GRIS_MINIMO,
								TIFR.GRIS_PERCENTUAL,
								TIFR.TAS_VALOR,
								PEIT.VALOR_DESCONTO
							END
							ELSE
							BEGIN
								SELECT 
									@FRETE_GRATIS = 'N',
									@VALOR_FRETE = ((@PESO_TOTAL*PRUF.FRETE_KG)+PRUF.TAXA_FRETE_KG)+IFNULL(PRUF.PEDAGIO,0)
													+ TIFR.TAS_VALOR
													+ CASE WHEN ((SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
																+SUM(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)
																-IFNULL(PEIT.VALOR_DESCONTO,0))*TIFR.GRIS_PERCENTUAL)/100 < TIFR.GRIS_MINIMO
															THEN TIFR.GRIS_MINIMO
															ELSE ((SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE)
																+SUM(IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0)*PEIT.QUANTIDADE)
																-IFNULL(PEIT.VALOR_DESCONTO,0))*TIFR.GRIS_PERCENTUAL)/100
															END,
									@TIPO_FRETE = ".$tipoFrete."
								FROM
									e_PEDIDO PEDI,
									e_PEDIDO_ENDERECO PEEN,
									e_MUNICIPIO MUNI,
									e_PRECIFICACAO_TRANSP PRUF,
									e_TIPO_FRETE TIFR,
									e_PEDIDO_ITEM PEIT
								WHERE
									PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
								AND PEDI.ID_PEDIDO = ".$idPedido."
								AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
								AND PRUF.TIFR_ID_TIPO_FRETE = ".$tipoFrete."
								AND MUNI.UNFE_ID_ESTADO = PRUF.UNFE_ID_ESTADO
								AND PRUF.MUNI_ID_MUNICIPIO IS NULL
								AND PRUF.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
								AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
								GROUP BY
								((@PESO_TOTAL*PRUF.FRETE_KG)+PRUF.TAXA_FRETE_KG)+IFNULL(PRUF.PEDAGIO,0),
								TIFR.GRIS_MINIMO,
								TIFR.GRIS_PERCENTUAL,
								TIFR.TAS_VALOR,
								PEIT.VALOR_DESCONTO
							END
							
						END
						
						UPDATE e_PEDIDO SET VALOR_FRETE = @VALOR_FRETE, FRETE_GRATIS = @FRETE_GRATIS, TIFR_ID_TIPO_FRETE = @TIPO_FRETE 
						WHERE ID_PEDIDO = ".$idPedido.";
						
						SELECT @FRETE_GRATIS FRETE_GRATIS, @VALOR_FRETE VALOR_FRETE";
		    printr($query); 
		    $retorno = $mysqli->ConsultarSQL($query);
		    
		}//fim else xml
	
        return $retorno;

    }

    
}



?>