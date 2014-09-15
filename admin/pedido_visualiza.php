<?php

require_once(PHP_ROOT.'/'.CLASS_DIR.'/produto.class.php');
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');

$Produto = new Produto($mysqli);
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Visualiza Pedido');

if(isset($_REQUEST["idPedido"])) $idPedido = sqlvalue($_REQUEST["idPedido"], false); 

if(ID_LOJA <> 1){
	$whereIdLoja = "AND PEDI.LOJA_ID_LOJA = ".ID_LOJA."";
} else {
	$whereIdLoja = "";
}

/**/
$queryPedido = "SELECT
                        PEDI.ID_PEDIDO,
                        date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y %H:%i') DATA_EMISSAO,
                        PEDI.PRCA_ID_PROMOCAO_CARRINHO,
                        IFNULL(PRCA.CUPOM_PROMOCIONAL, PRCA.DESCRICAO_PROMOCAO) CUPOM_PROMOCIONAL,
                        PEDI.FRETE_GRATIS,
                        PEDI.VALOR_FRETE,
                        PEDI.TIFR_ID_TIPO_FRETE,
                        TIFR.DESCRICAO_FRETE,
                        PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
                        PESS.NOME,
                        PESS.SOBRENOME,
                        PESS.ID_PESSOA,
                        PEDI.NUMERO_PEDIDO,
                        PECO.DESCRICAO TELEFONE1,
						PECO2.DESCRICAO CELULAR,
						PECO3.DESCRICAO TELEFONE2,
						PESS.EMAIL
                FROM
                        e_PEDIDO PEDI LEFT JOIN e_PROMOCAO_CARRINHO PRCA
                                                                 ON PEDI.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO,
                        e_PEDIDO_ITEM_SITUACAO PISI,
                        e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
											 ON PESS.ID_PESSOA = PECO.PESS_ID_PESSOA
											AND PECO.TICO_ID_TIPO_CONTATO = 1
									  LEFT JOIN e_PESSOA_CONTATO PECO2
											 ON PESS.ID_PESSOA = PECO2.PESS_ID_PESSOA
											AND PECO2.TICO_ID_TIPO_CONTATO = 2
									  LEFT JOIN e_PESSOA_CONTATO PECO3
											 ON PESS.ID_PESSOA = PECO3.PESS_ID_PESSOA
											AND PECO3.TICO_ID_TIPO_CONTATO = 3,
                        e_TIPO_FRETE TIFR
                WHERE
                        PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
                ".$whereIdLoja."
                AND fn_situacao_pedido(PEDI.ID_PEDIDO) = PISI.ID_PEDIDO_ITEM_SITUACAO
                AND PEDI.ID_PEDIDO = ".$idPedido."
                AND PEDI.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE";

$visualizaPedido = $mysqli->ConsultarSQL($queryPedido);
$smarty->assign('visualizaPedido',$visualizaPedido);
$idPedido = $visualizaPedido[0]['ID_PEDIDO'];
/**/

/**/
$queryPedidoPagamento = "SELECT
							PEPA.ID_PEDIDO_PAGAMENTO,
							FPTI.ID_FORMA_PAGAMENTO_TIPO,
							FPTI.DESCRICAO DESCRICAO_TIPO_FOPA,
							FOPA.ID_FORMA_PAGAMENTO,
							FOPA.DESCRICAO_FORMA_PAGAMENTO,
							PEPA.TRANSACAO_AUTORIZADA,
							date_format(PEPA.DATA_AUTORIZACAO, '%d/%m/%Y') DATA_AUTORIZACAO,
							PEPA.ATIVO,
							PEPA.VALOR_TOTAL_PAGAMENTO,
							CASE PEPA.TIPO_LANCAMENTO WHEN 'E' THEN 'ESTORNO' ELSE 'PAGAMENTO' END TIPO_LANCAMENTO,
							PEPA.NUMERO_PARCELAS
						FROM
							e_PEDIDO_PAGAMENTO PEPA,
							e_FORMA_PAGAMENTO FOPA,
							e_FORMA_PAGAMENTO_TIPO FPTI
						WHERE
							PEPA.PEDI_ID_PEDIDO = ".$idPedido."
						AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
						AND FOPA.FPTI_ID_FORMA_PAGAMENTO_TIPO = FPTI.ID_FORMA_PAGAMENTO_TIPO
						AND PEPA.ATIVO = 'S'
						ORDER BY
							PEPA.ID_PEDIDO_PAGAMENTO DESC";

$visualizaPedidoPagamento = $mysqli->ConsultarSQL($queryPedidoPagamento);
$smarty->assign('visualizaPedidoPagamento',$visualizaPedidoPagamento);						
/**/

/**/
$queryPedidoItem = "SELECT 
						PEIT.ID_PEDIDO_ITEM,
						PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM,
						PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
						PROD.ID_PRODUTO,
						PROD.ID_PRODUTO_INTEGRACAO,
						--fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now()) PRECO_UNITARIO,
						PEIT.PRECO_UNITARIO_VENDA PRECO_UNITARIO,
						PROD.DESCRICAO_VENDA,
						PROD.REFERENCIA,
						PEIT.PACOTE_PRESENTE,
						PEIT.VALOR_PACOTE_PRESENTE,
						IFNULL(PEIT.VALOR_DESCONTO,0) VALOR_DESCONTO,
						PEIT.QUANTIDADE,
						PROD.PESO_KG,
						PCIM.IMAGEM,
						PEIT.COD_RASTREAMENTO,
						fn_atributo_produto_combinacao(PRCO.ID_PRODUTO_COMBINACAO) ATRIBUTO
					FROM
						e_PEDIDO_ITEM PEIT,
						e_PEDIDO_ITEM_SITUACAO PISI,
						e_PRODUTO_COMBINACAO PRCO LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
														 ON PCIM.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
													    AND PCIM.PRINCIPAL = 'S',
						e_PRODUTO PROD
					WHERE
						PEIT.PEDI_ID_PEDIDO = ".$idPedido."
					AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = PISI.ID_PEDIDO_ITEM_SITUACAO
					AND PEIT.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
					AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO";
				
$visualizaPedidoItem = $mysqli->ConsultarSQL($queryPedidoItem);
$smarty->assign('visualizaPedidoItem',$visualizaPedidoItem);					
/**/

/**/
foreach ($visualizaPedidoItem as $valueCodRastreamento) {
	$codRastreamento[] = $valueCodRastreamento['COD_RASTREAMENTO'];
}
$codRastreamento = array_unique($codRastreamento);
$smarty->assign('codRastreamento', $codRastreamento);
/**/

/**/
$queryHistoricoSituacaoPedido = "SELECT Q1.*
									FROM (
									SELECT
										PISI.DESCRICAO_PEDIDO_ITEM_SITUACAO,
										date_format(PSHI.DATA_INSERT, '%d/%m/%Y %H:%i:%s') DATA
									FROM
										e_PEDIDO_SITUACAO_HISTORICO PSHI,
										e_PEDIDO_ITEM_SITUACAO PISI
									WHERE
										PSHI.PEDI_ID_PEDIDO = ".$idPedido."
									AND PSHI.PESI_ID_PEDIDO_SITUACAO = PISI.ID_PEDIDO_ITEM_SITUACAO
									UNION
									SELECT
										'EMITIDO' DESCRICAO_PEDIDO_ITEM_SITUACAO,
										date_format(PEDI.DATA_EMISSAO, '%d/%m/%Y %H:%i:%s') DATA
									FROM
										e_PEDIDO PEDI
									WHERE
										PEDI.ID_PEDIDO = ".$idPedido."
									) Q1
									GROUP BY
										Q1.DESCRICAO_PEDIDO_ITEM_SITUACAO,
										Q1.DATA
									ORDER BY Q1.DATA";
$resultHistoricoSituacaoPedido = $mysqli->ConsultarSQL($queryHistoricoSituacaoPedido);
$smarty->assign('historicoSituacaoPedido', $resultHistoricoSituacaoPedido);
/**/

/**/
$nroParcelas = $Pedido->fnNroParcelas();
$smarty->assign('listaNroParcelas',$nroParcelas);
/**/

/**/
$listaFormaPagamento = $Pedido->fnFormaPagamento();
foreach ($listaFormaPagamento as $valueFormaPagamento) {
	$listaTipoFormaPagamento[$valueFormaPagamento["TIPO_FORMA_PAGAMENTO"]][$valueFormaPagamento["ID_FORMA_PAGAMENTO"]] = $valueFormaPagamento["DESCRICAO_FORMA_PAGAMENTO"];
}

$smarty->assign('listaTipoFormaPagamento',$listaTipoFormaPagamento);
/**/

/**/
$listaTipoFrete = $Pedido->fnTipoFrete();
$smarty->assign('listaTipoFrete',$listaTipoFrete);
/**/

/**/
$listaSituacaoPedido = $Pedido->fnPedidoSituacao();
$smarty->assign('listaSituacaoPedido',$listaSituacaoPedido);
/**/

/**/
//$listaEstoqueProduto = $Produto->fnEstoqueProduto($idProduto, $idPedido);
//$smarty->assign('listaEstoqueProduto',$listaEstoqueProduto);
/**/

/**/
$queryCupomPromocional = "SELECT
                                    IFNULL(PRCA.CUPOM_PROMOCIONAL, PRCA.DESCRICAO_PROMOCAO) CUPOM_PROMOCIONAL,
                                    PRCA.ID_PROMOCAO_CARRINHO,
                                    PRCA.VALOR_DESCONTO,
                                    PRCA.TIPO_DESCONTO
                            FROM
                                    e_PROMOCAO_CARRINHO PRCA,
                                    e_PEDIDO PEDI,
                                    e_PEDIDO_ITEM PEIT,
                                    e_PESSOA PESS
                            WHERE
                                    PRCA.PROMOCAO_ATIVA = 'S'
                            AND PEDI.ID_PEDIDO = ".$idPedido."
                            AND now() BETWEEN PRCA.DATA_INICIAL_VALIDADE AND PRCA.DATA_FINAL_VALIDADE
                            AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
                            AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
                            AND (PESS.EMAIL = PRCA.EMAIL_CLIENTE_CONTEMPLADO OR PRCA.EMAIL_CLIENTE_CONTEMPLADO IS NULL)
                            AND NOT EXISTS (SELECT 
                                                                    1
                                                              FROM 
                                                                    e_PEDIDO PEDI2,
                                                                    e_PEDIDO_ITEM PEIT2,
                                                                    e_PEDIDO_ITEM_SITUACAO PISI
                                                             WHERE 
                                                                    PEDI2.PRCA_ID_PROMOCAO_CARRINHO = PRCA.ID_PROMOCAO_CARRINHO
                                                            AND PEDI2.ID_PEDIDO = PEIT2.PEDI_ID_PEDIDO
                                                            AND PEIT2.SPIT_ID_SITUACAO_PEDIDO_ITEM = PISI.ID_PEDIDO_ITEM_SITUACAO
                                                            AND PISI.CONSIDERA_VENDIDO = 'S'
                                                            AND PRCA.UTILIZACAO_UNICA = 'S'
                                                            )

                            GROUP BY
                                    IFNULL(PRCA.CUPOM_PROMOCIONAL, PRCA.DESCRICAO_PROMOCAO),
                                    PRCA.ID_PROMOCAO_CARRINHO,
                                    PRCA.VALOR_DESCONTO,
                                    PRCA.TIPO_DESCONTO,
                                    PRCA.VALOR_MINIMO_COMPRA
                            HAVING
                                    SUM(PEIT.PRECO_UNITARIO_VENDA*PEIT.QUANTIDADE) >= PRCA.VALOR_MINIMO_COMPRA";

$listaCupomPromocional = $mysqli->ConsultarSQL($queryCupomPromocional);
$smarty->assign('listaCupomPromocional',$listaCupomPromocional);
/**/

/**/
$queryPedidoEndereco = "SELECT
								PEEN.CEP CEP_ID_CEP,
								PEEN.ENDERECO,
								PEEN.NUMERO,
								PEEN.COMPLEMENTO,
								PEEN.BAIRRO,
								PEEN.MUNICIPIO NOME_MUNICIPIO,
								PEEN.UF UNFE_ID_ESTADO,
								PEEN.REFERENCIA,
								'ENDEREÇO ENTREGA' APELIDO,
								PEEN.APELIDO_ENDERECO
							FROM
								e_PEDIDO PEDI,
								e_PEDIDO_ENDERECO PEEN
							WHERE
								PEDI.ID_PEDIDO = ".$idPedido."
							AND PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
							
							UNION
							
							SELECT
								PEEN.CEP CEP_ID_CEP,
								PEEN.ENDERECO,
								PEEN.NUMERO,
								PEEN.COMPLEMENTO,
								PEEN.BAIRRO,
								PEEN.MUNICIPIO NOME_MUNICIPIO,
								PEEN.UF UNFE_ID_ESTADO,
								PEEN.REFERENCIA,
								'ENDEREÇO FATURAMENTO' APELIDO,
								PEEN.APELIDO_ENDERECO
							FROM
								e_PEDIDO PEDI,
								e_PESSOA_ENDERECO PEEN
							WHERE
								PEDI.ID_PEDIDO = ".$idPedido."
							AND PEDI.PESS_ID_PESSOA = PEEN.PESS_ID_PESSOA
							AND PEEN.ENDERECO_PRINCIPAL = 'S'";

$listaPedidoEndereco = $mysqli->ConsultarSQL($queryPedidoEndereco);
$smarty->assign('listaPedidoEndereco',$listaPedidoEndereco);
/**/

/*
$queryListaCasamento = "SELECT
							LICA.ID_LISTA_CASAMENTO,
							LICA.CONJUGE1+' & '+LICA.CONJUGE2 CASAL,
							PEDI.MENSAGEM_LISTA_CASAMENTO
						FROM
							e_LISTA_CASAMENTO LICA,
							e_PEDIDO PEDI,
							e_PEDIDO_ITEM PEIT
						WHERE
							LICA.ID_LISTA_CASAMENTO = PEIT.LICA_ID_LISTA_CASAMENTO
						AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
						AND PEDI.ID_PEDIDO = ".$idPedido."";
$listaListaCasamento = $mysqli->ConsultarSQL($queryListaCasamento);
$smarty->assign('idListaCasamento', $listaListaCasamento[0]['ID_LISTA_CASAMENTO']);
$smarty->assign('casalListaCasamento', $listaListaCasamento[0]['CASAL']);
$smarty->assign('mensagemListaCasamento', $listaListaCasamento[0]['MENSAGEM_LISTA_CASAMENTO']);
*/

/*ocorrencias*/
$queryOcorrencia = "SELECT ID_OCOCRRENCIA
					      ,PESS_ID_PESSOA
					      ,PEDI_ID_PEDIDO
					      ,DESCRICAO
					      ,date_format(DATA, '%d/%m/%Y %H:%i:%s') DATA
					  FROM e_OCORRENCIA
					  WHERE PEDI_ID_PEDIDO = ".$idPedido."";
$listaOcorrencia = $mysqli->ConsultarSQL($queryOcorrencia);
$smarty->assign('listaOcorrencia', $listaOcorrencia);
/**/

$smarty->assign('urlAtual', 'http://'.$_SERVER['HTTP_HOST']);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pedido.js');
#$smarty->append('js_files', 'plugins/modal/jquery.modal.min.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pedido.css');
#$smarty->append('css_files', 'plugins/modal/jquery.modal.css');

?>