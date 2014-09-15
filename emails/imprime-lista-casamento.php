<?php
require_once '../configs/config.php';

require_once(CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido();

require_once(CLASS_DIR.'/pessoa.class.php');
$Pessoa = new Pessoa();

require_once(CLASS_DIR.'lista_casamento.class.php');
$ListaCasamento = new ListaCasamento();

if(isset($_REQUEST['idListaCasamento'])){
	$idListaCasamento = $_REQUEST['idListaCasamento'];
}

/**/
$listaCasamento = $ListaCasamento->fnListaCasamento($idListaCasamento);
$valueListaCasamento = $listaCasamento[0];
$idPessoa = $valueListaCasamento['PESS_ID_PESSOA'];

foreach ($listaCasamento as $key => $value) {
   	if($value['TIPO_ENDERECO'] == 'ENTREGA'){
   		$enderecoEntrega = array($value);
   	}
   	$arrayIdProduto[] = $value['ID_PRODUTO'];
}
/**/

/*DADOS PESSOA*/
$listaDadosPessoa = $Pessoa->fnPessoaDados($idPessoa);
$valueDadosPessoa = $listaDadosPessoa[0];
/**/

/*PEDIDO*/
$listaPedido = $Pedido->fnPedidoFinaliza(null, $idListaCasamento);
$valuePedido = $listaPedido[0];
$idSituacaoPedido = $valuePedido['ID_PEDIDO_ITEM_SITUACAO'];
$numeroPedido = $valuePedido['NUMERO_PEDIDO'];

//printr($listaPedido);
/**/



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
					<table width="650" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td align="center">
								<a href="http://www2.lojaspr.com.br"><img src="http://www2.lojaspr.com.br/emails/topo1_.jpg" alt="Comlines - Revendedor Tramontina" /></a>  
							</td>
						</tr>
						<!--<tr>
							<td>
								<img src="http://www2.lojaspr.com.br/emails/topo2.jpg" />              
							</td>
						</tr>-->
					</table>
				</td>
			</tr>
			
			<tr>
				<td>
					
				</td>
			</tr>

			
			<!-- NUMERO DO PEDIDO 
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td valign="middle"align="left" color="#333333">
								
								
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td height="10" colspan="3"></td>
						</tr>
					</table>
				</td>
			</tr> -->

			<!--ENDERECO DE ENTREGA-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<!--<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>ENDERE&Ccedil;OS</strong></font>
							</td>
							<td width="47"></td>
						</tr>-->
						<tr>
							<td height="15" colspan="3"></td>
						</tr>
						<tr>
							<td width="47"></td>
							<td>
								<table border="0">
									<tr>
										<td valign="top">
											<font face="arial" size="3" color="#333333"><strong>Lista de Casamento Nro: <?=$idListaCasamento?></strong></font><br>
											<font face="arial" size="2" color="#333333">Cliente: <?=$valueDadosPessoa['NOME'].' '.$valueDadosPessoa['SOBRENOME']?><br>
											CPF/CNPJ: <?=fnFormataCpfCnpj($valueDadosPessoa['CPF'])?><br>
											Email: <?=$valueDadosPessoa['EMAIL']?><br>
											Telefone: <?=fnFormataTelefone($valueDadosPessoa['TELEFONE1'])?> <?=fnFormataTelefone($valueDadosPessoa['CELULAR'])?> <?=fnFormataTelefone($valueDadosPessoa['TELEFONE2'])?></font><br>
										</td>
										<td width="50"></td>
										<td>
											<font face="arial" size="2" color="#333333">
											 	<strong>Endere&ccedil;o Entrega:</strong><br>
											 	<?php
											 		foreach ($enderecoEntrega as $valuePedidoEndereco) {
											 			echo 'Data Entrega: '.$valuePedidoEndereco['DATA_EVENTO'].'<br>';
											 			echo 'Contato: '.$valuePedidoEndereco['NOME_CONTATO'].'<br>';
											 			echo $valuePedidoEndereco['ENDERECO'].', '.$valuePedidoEndereco['NUMERO'].' '.$valuePedidoEndereco['COMPLEMENTO'].'<br>';
											 			echo $valuePedidoEndereco['BAIRRO'].' - '.$valuePedidoEndereco['MUNICIPIO'].'/'.$valuePedidoEndereco['ESTADO'].'<br>';
											 			echo 'CEP: '.$valuePedidoEndereco['CEP_ID_CEP'].'<br>';
											 			echo $valuePedidoEndereco['REFERENCIA'].'<br>';
											 			echo fnFormataTelefone($valuePedidoEndereco['TELEFONE_PRINCIPAL']).'<br>';
											 			echo fnFormataTelefone($valuePedidoEndereco['CELULAR']);
											 		}
											 	?>
											 </font>
										</td>
										
										
									</tr>
								</table>		
							</td>
							<td></td>
						</tr>
						
					</table>
				</td>
			</tr> 

			<tr>
				<td height="10" colspan="3"></td>
			</tr>


			<!-- TABELA DO PEDIDO-->
			<tr>
				<td>
					<table cellspacing="0" width="100%" cellpaging="0" border="0">
						<tr>
							<td width="47"></td>
							<td height="43" valign="middle" bgcolor="#005099" style="padding-left: 20px">
								<font face="arial" size="3" color="#FFF"><strong>PRODUTOS</strong></font>
							</td>
							<td width="47"></td>
						</tr>

						<tr>
							<td width="47"></td>
							<td valign="middle">
								<table cellspacing="0" width="100%" cellpaging="0" border="0">
									<thead bgcolor="#eeeeee">
										<tr>
											<th colspan="2" align="left" width="235" style="padding-left: 20px">
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
											<td style="border-left: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee; padding-left: 20px"><img src="../midia/produtos/carrinho/<?=$value['IMAGEM']?>"></td>
											<td style="border-bottom: 1px solid #eeeeee; padding-left: 20px">
												
												<font face="arial" size="2" color="#333333">
													<strong><?='Pedido: '.$value['NUMERO_PEDIDO'].'<br>'.$value['DESCRICAO_VENDA'].' - '.$value['REFERENCIA']?></strong>
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
										<td></td>
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
										<td>
											<font face="arial" size="2" color="#333333">
												Tipo Frete: <strong><?=$valuePedido['DESCRICAO_FRETE']?></strong>
											</font>
										</td>
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
										<td></td>
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
										<td>
											<font face="arial" size="2" color="#333333">
												<?php
											 		// foreach ($listaPedidoPagamento as $valueFormaPagamento) {
											 		// 	echo $valueFormaPagamento['DESCRICAO'].' - <strong>'.$valueFormaPagamento['DESCRICAO_FORMA_PAGAMENTO'].'</strong><br/>';
											 		// 	echo 'Condi&ccedil;&otilde;es de Pagamento - <strong>'.$valueFormaPagamento['NUMERO_PARCELAS'].'x R$'.number_format($valueFormaPagamento['VALOR_TOTAL_PAGAMENTO']/$valueFormaPagamento['NUMERO_PARCELAS'], 2, ',', '.').'</strong>';
											 		// }
											 	?>
											</font>
										</td>
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


			

			<!--FORMA DE PAGAMENTO
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
								 		/*foreach ($listaPedidoPagamento as $valueFormaPagamento) {
								 			echo $valueFormaPagamento['DESCRICAO'].' - <strong>'.$valueFormaPagamento['DESCRICAO_FORMA_PAGAMENTO'].'</strong><br/>';
								 			echo 'Condi&ccedil;&otilde;es de Pagamento - <strong>'.$valueFormaPagamento['NUMERO_PARCELAS'].'x R$'.number_format($valueFormaPagamento['VALOR_TOTAL_PAGAMENTO']/$valueFormaPagamento['NUMERO_PARCELAS'], 2, ',', '.').'</strong>';
								 		}*/
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

			
-->
			    
		</table>
	</body>
</html>


