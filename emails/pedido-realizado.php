<?php

require(dirname(dirname(__FILE__)).'/configs/config.php');

if(isset($_POST['idPedido'])){
	$idPedido = $_POST['idPedido'];
}

if($_POST['despacho'] == 'S'){
	require_once dirname(dirname(__FILE__)).'/'.CLASS_DIR.'pedido.class.php';
} else {
	require_once CLASS_DIR.'/pedido.class.php';
	require_once(CLASS_DIR.'/lista_casamento.class.php');
	$ListaCasamento = new ListaCasamento($mysqli);
}
$Pedido = new Pedido($mysqli);

/*ENDERECO PEDIDO*/
$listaPedidoEndereco = $Pedido->fnPedidoEnderecoFinaliza($idPedido); 
/**/

/*PEDIDO PAGAMENTO*/
$listaPedidoPagamento = $Pedido->fnPedidoPagamento($idPedido);
/**/

/*PEDIDO*/
$listaPedido = $Pedido->fnPedidoFinaliza($idPedido);
$valuePedido = $listaPedido[0];
$idSituacaoPedido = $valuePedido['ID_PEDIDO_ITEM_SITUACAO'];
$numeroPedido = $valuePedido['NUMERO_PEDIDO'];
$codRastreamento = $valuePedido['COD_RASTREAMENTO'];
$idListaCasamento = $valuePedido['LICA_ID_LISTA_CASAMENTO'];
/**/

if($idListaCasamento){
	$listaListaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
	$valueListaCasamento = $listaListaCasamento[0];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<style>
			img,
			a{
				display:block;
			}
		</style>

	</head>
	<body style="background:#282828">
		<table width="650" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#FFFFFF">
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td>
								<a href="http://www2.lojaspr.com.br"><img src="http://www2.lojaspr.com.br/emails/topo1.jpg" alt="Comlines - Revendedor Tramontina" /></a>  
							</td>
						</tr>
						<tr>
							<td>
								<img src="http://www2.lojaspr.com.br/emails/topo2.jpg" />              
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" cellpaging="0" border="0">
						<tr>
							<td height="18" colspan="3" align="center"><font face="arial" size="1" color="#333333">*** Esse &eacute; um e-mail autom&aacute;tico. N&atilde;o &eacute; necess&aacute;rio respond&ecirc;-lo ***</font></td>
						</tr>
						<tr>
							<td height="32" colspan="3" align="center"></td>
						</tr>
						
						<tr>
							<td width="47"></td>
							<td>
								<font face="arial" size="3" color="#333333">Ol&aacute; <strong><?=$valuePedido['NOME']?></strong>,</font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="37" colspan="3"></td>
						</tr>

						

						<tr>
							<td width="47"></td>
							<td>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_ANALISE_CREDITO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/recebemos-pedido.png" alt="Recebemos seu pedido" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/pedido_aprovado.png" alt="Pedido Aprovado" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_NEGADO_CREDITO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/erro_recebimento_pagamento.png" alt="Erro no recebimento de pagamento" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_CANCELADO) { ?>
								<img src="http://www2.lojaspr.com.br/emails/pedido_cancelado.png" alt="Pedido Cancelado" />
								<? } ?>
							</td>
							<td></td>
						</tr>

						<?php if($idListaCasamento){ ?>
						<tr>
							<td height="37" colspan="3"></td>
						</tr>
						<tr>
							<td width="47"></td>
							<td align="center">
								<font face="arial" size="3" color="#CA3C4A"><strong>Lista de Casamento de <?=$valueListaCasamento['CONJUGE1']?> e <?=$valueListaCasamento['CONJUGE2']?></strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="10" colspan="3"></td>
						</tr>

						<tr>
							<td height="37" colspan="3" align="center"><img src="http://www2.lojaspr.com.br/lista-casamento/fotos/<?=$valueListaCasamento['FOTO_CAPA']?>" alt="Comlines - Revendedor Tramontina" /></td>
						</tr>
						<tr>
							<td height="10" colspan="3"></td>
						</tr>
						<?php } ?>

						<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_ANALISE_CREDITO){ ?>
						<tr>
							<td height="37" colspan="3"></td>
						</tr>
						
						
						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#333333">A partir  de  agora voc&ecirc; ser&aacute; informado(a)  por e-mail  sobre o andamento do  seu  pedido<?php if(!$idListaCasamento) { ?> at&eacute; o seu envio para o endere&ccedil;o escolhido<?php } ?>.</font>
							</td>
							<td></td>
						</tr>
						<? } ?>
						<tr>
							<td colspan="3">
								<img src="http://www2.lojaspr.com.br/emails/bg-linha.jpg" />
							</td>
						</tr>
					</table>
				</td>
			</tr>

			
			<!-- NUMERO DO PEDIDO -->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="83" bgcolor="#eeeeee" valign="middle"align="center">
								
								<font face="arial" size="3" color="#7b7b7b"><strong>Pedido n&uacute;mero <?=$numeroPedido?></strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr> 

			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="61"></td>
							<td height="84" valign="middle" align="center">
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_ANALISE_CREDITO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/passo-1.png" alt="Pedido Realizado" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/passo-2.png" alt="Aprovado Crédito" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_NEGADO_CREDITO or $idSituacaoPedido == ID_SITUACAO_PEDIDO_CANCELADO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/passo-2-erro.png" alt="Pagamento Negado" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_FATURADO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/passo-3-erro.png" alt="Pedido Faturado" />
								<? } ?>
								<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_DESPACHADO){ ?>
								<img src="http://www2.lojaspr.com.br/emails/passo-4.png" alt="Pedido em Transporte" />
								<? } ?>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="37" colspan="3"></td>
						</tr>

						<!--<tr>
							<td width="47"></td>
							<td>
								<font face="arial" size="3" color="#9d9d9d"><strong>Pagamento com Cart&atilde;o de Cr&eacute;dito</strong></font>
							</td>
							<td width="47"></td>
						</tr>-->

						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#9d9d9d">
								 	<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_ANALISE_CREDITO){ ?>
								 	<!--PEDIDO REALIZADO-->
								 	A conclus&atilde;o da compra e a cobran&ccedil;a ficar&aacute; condicionada &agrave; exist&ecirc;ncia de estoque das mercadorias. Voc&ecirc; receber&aacute; uma nova comunica&ccedil;&atilde;o quando essa verifica&ccedil;&atilde;o for conclu&iacute;da. A previs&atilde;o de entrega come&ccedil;a a contar ap&oacute;s a confirma&ccedil;&atilde;o do pagamento pela institui&ccedil;&atilde;o financeira e despacho do mesmo.<br>
								 	<? } ?>
								 	<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_APROVADO_CREDITO){ ?>
								 	<!--CONFIRMACAO DO PEDIDO-->
								 	Recebemos da institui&ccedil;&atilde;o financeira, nesta data, a confirma&ccedil;&atilde;o de recebimento do pagamento do seu pedido.</p>
								 	<? } ?>
								 	<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_NEGADO_CREDITO or $idSituacaoPedido == ID_SITUACAO_PEDIDO_CANCELADO){ ?>
									<!--PEDIDO NEGADO-->
									Recebemos da institui&ccedil;&atilde;o financeira, nesta data, a <strong>n&atilde;o confirma&ccedil;&atilde;o</strong> ou <strong>n&atilde;o aprova&ccedil;&atilde;o</strong> do pagamento do seu pedido, voc&ecirc; pode refazer o pedido tentando uma outra forma de pagamento.</p>
									<? } ?>
									<? if($idSituacaoPedido == ID_SITUACAO_PEDIDO_DESPACHADO){ ?>
									<!--PEDIDO DESPACHADO-->
									Seu pedido foi despachado dia <?=date('d/m/Y')?>, <!--o prazo de entrega s&atilde;o 10 dias &uacute;teis e-->voc&ecirc; pode acompanhar a entrega do seu pedido acessando o link abaixo.
									<p><a href="http://websro.correios.com.br/sro_bin/txect01$.QueryList?P_LINGUA=001&P_TIPO=001&P_COD_UNI=<?=$codRastreamento?>"><?=$codRastreamento?></a></p>
									<? } ?>
										
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>


			<!-- TABELA DO PEDIDO-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>INFORMA&Ccedil;&Otilde;ES DO DEU PEDIDO</strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td width="47"></td>
							<td valign="middle">
								<table cellspacing="0" width="100%" cellpaging="0" border="0">
									<thead bgcolor="#eeeeee">
										<tr>
											<th align="left" width="235" style="padding-left: 20px">
												<font face="arial" size="2" color="#333333">
													<strong>Produto</strong>
												</font>
											</th>
											<th align="center" width="134">
												<font face="arial" size="2" color="#333333">
													<strong>Presente</strong>
												</font>
											</th>
											<th align="center">
												<font face="arial" size="2" color="#333333">
													<strong>Qtd.</strong>
												</font>
											</th>
											<th align="center"  width="85">
												<font face="arial" size="2" color="#333333">
													<strong>Pre&ccedil;o R$</strong>
												</font>
											</th>
										</tr>
									</thead>

									<tbody>
										<!-- LISTA DE PRODUTOS -->
										<? 
										$subtotalPedido = 0;
										$totalPedido = 0;
										$descontoPedido = 0;
										foreach ($listaPedido as $value) { 
											$subtotalPedido = $subtotalPedido+($value['PRECO_UNITARIO_VENDA']*$value['QUANTIDADE']);
											$descontoPedido = $descontoPedido+$value['VALOR_DESCONTO'];
										?>
										<tr>
											<td style="border-left: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; padding-left: 20px">
												<font face="arial" size="2" color="#333333">
													<strong><?=$value['DESCRICAO_VENDA']?></strong>
													<br><?=$value['ATRIBUTO']?>
												</font>
											</td>
											<td align="center" style="border-left: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee;">
												<? if($value['PACOTE_PRESENTE'] == 'S') { ?>
												<img src="http://www2.lojaspr.com.br/emails/presente-1.jpg" />
												<? } else { ?>
												<img src="http://www2.lojaspr.com.br/emails/presente-2.jpg" />
												<? } ?>
											</td>
											<td align="center" style="border-left: 1px solid #eeeeee;  border-bottom: 1px solid #eeeeee;">
												<font face="arial" size="2" color="#333333">
													<strong><?=number_format($value['QUANTIDADE'])?></strong>
												</font>
											</td>
											<td align="center" style="border-left: 1px solid #eeeeee; border-right: 1px solid #eeeeee;  border-bottom: 1px solid #eeeeee;">
												<font face="arial" size="2" color="#333333">
													<strong><?=number_format($value['PRECO_UNITARIO_VENDA'], 2, ',', '.');?></strong>
												</font>
											</td>
										</tr>
										<? } ?>
										
									</tbody>
								</table>

								<!-- INFORMACOES EXTRAS -->
								<table cellspacing="0" width="100%" cellpaging="0" border="0">
									<tr height="40">
										<td align="right" style="border-left: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												Subtotal
											</font>
										</td>
										<td align="center"  width="85" style="border-right: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												<?=number_format($subtotalPedido, 2, ',', '.');?>
											</font>
										</td>
									</tr>
									<tr height="40">
										<td align="right" style="border-top: 1px solid #eeeeee; border-left: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												Valor do frete
											</font>
										</td>
										<td align="center"  width="85" style="border-top: 1px solid #eeeeee; border-right: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												<?=number_format($valuePedido['VALOR_FRETE'], 2, ',', '.')?>
											</font>
										</td>
									</tr>
									<tr height="40">
										<td align="right" style="border-top: 1px solid #eeeeee; border-left: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												Desconto
											</font>
										</td>
										<td align="center"  width="85" style="border-top: 1px solid #eeeeee; border-right: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												<?=number_format($descontoPedido, 2, ',', '.');?>
											</font>
										</td>
									</tr>
									<tr height="40">
										<td align="right" style="border-top: 1px solid #eeeeee; border-left: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												<strong>Total R$</strong>
											</font>
										</td>
										<td align="center"  width="85" style="border-top: 1px solid #eeeeee; border-right: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee;">
											<font face="arial" size="2" color="#333333">
												<strong><?=number_format(($subtotalPedido-$descontoPedido)+$valuePedido['VALOR_FRETE'], 2, ',', '.')?></strong>
											</font>
										</td>
									</tr>
								</table>
							</td>

							<td width="47"></td>
						</tr>
						
						<tr>
							<td height="40" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>

			<? if($idSituacaoPedido != ID_SITUACAO_PEDIDO_NEGADO_CREDITO or $idSituacaoPedido != ID_SITUACAO_PEDIDO_CANCELADO){ ?>
			<!-- PRAZO DE ENTREGA -->
			<?php if(!$idListaCasamento){ ?>
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td>
								<font face="arial" size="3" color="#9d9d9d"><strong>Entenda a previs&atilde;o de entrega</strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#9d9d9d">
								 	&bull; A previs&atilde;o de entrega &eacute; contado em dias &uacute;teis, ou seja, nao inclui s&aacute;bados, domingos e feriados. <br/>
									&bull; &Eacute; considerado dia &uacute;til para entregas: de 2&ordf; a 6&ordf; feira, das 8h &agrave;s 20h. <br/>
									&bull; Ap&oacute;s a confirma&ccedil;&atilde;o do pagamento pela institui&ccedil;&atilde;o financeira, voc&ecirc; ir&aacute; receber um e-mail <br/>
									  com a data final de entraga.<br/>
									&bull; Excepcionalmente entregas podem ocorrer aos s&aacute;bados, domingos e feriados.
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>

			<!-- POLITICA DE TROCA -->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td>
								<font face="arial" size="3" color="#9d9d9d"><strong>Pol&iacute;tica de troca e cancelamento</strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#9d9d9d">
								 	Em caso de troca ou cancelamento do seu pedido, os seguintes pr&eacute;-requisitos dever&atilde;o ser respeitados:<p>
									
									&bull; A troca ou devolu&ccedil;&atilde;o poder&aacute; ser solicitada dentro de um prazo de no m&aacute;ximo 30 dias corridos ap&oacute;s o recebimento;<br />
									&bull; O produto dever&aacute; estar na embalagem original;<br />
									&bull; N&atilde;o poder&aacute; haver ind&iacute;cios de avaria por mau uso;<br />
									&bull; O produto deve estar acompanhado de Nota Fiscal, e todos os acess&oacute;rios que o acompanham;<br />
									&bull; Para solicitar o procedimento de troca ou devolu&ccedil;&atilde;o basta entrar em contato com nosso Atendimento ao Consumidor pelo email contato@comlines.com.br. <br /></p>
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>
			<? } ?>
			<? } ?>

			<!--ENDERECO DE ENTREGA-->
			<?php if(!$idListaCasamento){ ?>
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>ENDERE&Ccedil;O DE ENTREGA</strong></font>
							</td>
							<td width="47"></td>
						</tr>
						<tr>
							<td height="15" colspan="3"></td>
						</tr>
						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#333333">
								 	<?php
								 		foreach ($listaPedidoEndereco as $valuePedidoEndereco) {
								 			echo $valuePedidoEndereco['APELIDO_ENDERECO'].'<br>';
								 			echo $valuePedidoEndereco['ENDERECO'].', '.$valuePedidoEndereco['NUMERO'].' '.$valuePedidoEndereco['COMPLEMENTO'].'<br>';
								 			echo $valuePedidoEndereco['BAIRRO'].' - '.$valuePedidoEndereco['NOME_MUNICIPIO'].'/'.$valuePedidoEndereco['UF'].'<br>';
								 			echo 'CEP: '.$valuePedidoEndereco['CEP'];
								 		}
								 	?>
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="25" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>
			<? } ?>


			<!--FORMA DE PAGAMENTO-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>FORMA DE PAGAMENTO</strong></font>
							</td>
							<td width="47"></td>
						</tr>
						<tr>
							<td height="15" colspan="3"></td>
						</tr>
						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2" color="#333333">
								 	<?php
								 		foreach ($listaPedidoPagamento as $valueFormaPagamento) {
								 			echo $valueFormaPagamento['DESCRICAO'].' - <strong>'.$valueFormaPagamento['DESCRICAO_FORMA_PAGAMENTO'].'</strong><br/>';
								 			echo 'Condi&ccedil;&otilde;es de Pagamento - <strong>'.$valueFormaPagamento['NUMERO_PARCELAS'].'x R$'.number_format($valueFormaPagamento['VALOR_TOTAL_PAGAMENTO']/$valueFormaPagamento['NUMERO_PARCELAS'], 2, ',', '.').'</strong>';
								 		}
								 	?>
								 	
									
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="25" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>


			<!--INFORMACOES IMPORTANTES-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>INFORMA&Ccedil;&Otilde;ES IMPORTANTES</strong></font>
							</td>
							<td width="47"></td>
						</tr>
						<tr>
							<td height="15" colspan="3"></td>
						</tr>
						<tr>
							<td width="47"></td>
							<td>
								 <font face="arial" size="2"  color="#333333">
									&bull; A partir deste momento, n&atilde;o &eacute; poss&iacute;vel a inclus&atilde;o ou exclus&atilde;o de itens ou altera&ccedil;&atilde;o  de endere&ccedil;o do seu pedido.<br/>
									<span style="float:left; margin-right: 6px">
										&bull; Para obter mais informa&ccedil;&otilde;es sobre sua compra e acompanhar o status do pedido,
									</span>

									<a href="http://www2.lojaspr.com.br/meus-pedidos/" target="_blank">
										<font color="#104575">
											<strong>Clique Aqui.</strong>
										</font>
									</a>

									<span style="float:left; margin-right: 6px">&bull; Se houver alguma d&uacute;vida,</span>
									<a href="http://www2.lojaspr.com.br/fale-conosco/" target="_blank">
										<font color="#104575">
											<strong>Fale Conosco.</strong>
										</font>
									</a>
								 </font>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="20" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr> 

			<tr>
				<td colspan="3">
					<img src="http://www2.lojaspr.com.br/emails/bg-linha2.jpg" />
				</td>
			</tr>

			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="130">
								<img src="http://www2.lojaspr.com.br/emails/ouvidoria.jpg" />
							</td>
							<td height="30">
								<font face="arial" size="2" color="#333333"> 
									<span style="float:left; margin-right: 6px">Atendimento ao Consumidor</span>
									<a href="http://www2.lojaspr.com.br" target="_blank">
										<font face="arial" size="2" color="#104575">
											<strong>www.comlines.com</strong>
										</font>
									</a>
									51 3582.0035
								</font>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td colspan="3">
					<img src="http://www2.lojaspr.com.br/emails/bg-linha2.jpg" />
				</td>
			</tr> 

			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td height="30" valign="middle" align="center" style="letter-spacing:0.2em">
								<a style="text-decoration:none" href="http://www.comline.com.br" target="_blank">
									<font face="arial" size="2" color="#104575">
										www2.lojaspr.com.br
									</font>
								</a>
							</td>
						</tr>
						<tr>
							<td height="10" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>     
		</table>
	</body>
</html>


