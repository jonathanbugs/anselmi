<?php
require_once '../configs/config.php';
require_once(CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido();

require_once(CLASS_DIR.'/lista_casamento.class.php');
$ListaCasamento = new ListaCasamento();

if(isset($_REQUEST['idPedido'])){
	$idPedido = $_REQUEST['idPedido'];
}


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
		<script type="text/javascript">
		window.print();
		</script>
		

	</head>
	<body onload="updateBarcode()">
		<table width="650" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#FFFFFF">
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td>
								<a href="http://www2.lojaspr.com.br"><img src="http://www2.lojaspr.com.br/emails/topo1.jpg" alt="Comlines - Revendedor Tramontina" border="0" /></a>  
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
			

			
			<!-- NUMERO DO PEDIDO -->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td valign="middle"align="left">
								
								<font face="arial" size="3"><strong>Pedido n&uacute;mero <?=$numeroPedido?></strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr> 

			<?php if($idListaCasamento){ ?>
			<!-- LISTA CASAMENTO -->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td valign="middle"align="left">
								
								<font face="arial" size="2"><strong>Lista de Casamento de <?=$valueListaCasamento['CONJUGE1']?> e <?=$valueListaCasamento['CONJUGE2']?></strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="37" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr> 

			<?php } ?>

			

			<!-- TABELA DO PEDIDO-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>INFORMA&Ccedil;&Otilde;ES DO PEDIDO</strong></font>
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


			

			<!--ENDERECO DE ENTREGA-->
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
								<?php if($idListaCasamento) { ?>
								<font face="arial" size="2" color="#333333">
									O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.
								</font>
								<?php } else { ?>
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
								 <?php } ?>
							</td>
							<td></td>
						</tr>
						<tr>
							<td height="25" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr>


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


			 

			<tr>
				<td colspan="3">
					<img src="http://www2.lojaspr.com.br/emails/bg-linha2.jpg" />
				</td>
			</tr>

			

			    
		</table>
	</body>
</html>


