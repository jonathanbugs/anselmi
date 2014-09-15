<?php /* Smarty version Smarty-3.1.10, created on 2014-05-21 11:53:17
         compiled from "templates\carrinho.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18374537cbddd7ef293-81089911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee5e3835c8a2b8fce15fd4870e292bd8a43d8fa7' => 
    array (
      0 => 'templates\\carrinho.tpl',
      1 => 1399402577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18374537cbddd7ef293-81089911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'listaProdutoCarrinho' => 0,
    'valueProdutoCarrinho' => 0,
    'MIDIA_DIR' => 0,
    'subtotalCarrinho' => 0,
    'codigoCupom' => 0,
    'retornoPromo' => 0,
    'valorTotalDesconto' => 0,
    'freteCalculado' => 0,
    'cepDestino' => 0,
    'retornoCalculoFrete' => 0,
    'valueFrete' => 0,
    'tipoFreteSelecionado' => 0,
    'freteGratis' => 0,
    'descricaoTipoFrete' => 0,
    'valueDescricaoFrete' => 0,
    'valorFreteSelecionado' => 0,
    'descontoBoleto' => 0,
    'totalCarrinhoFinal' => 0,
    'precoNoBoleto' => 0,
    'compre' => 0,
    'valueProdutoSite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_537cbdddbb49b3_69090158',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537cbdddbb49b3_69090158')) {function content_537cbdddbb49b3_69090158($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include 'C:\\wamp\\www\\lojas\\comlines\\smarty\\plugins\\modifier.valor_parcelado.php';
?><?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Carrinho de Compras</h2>
		</div>
		<div class="mainCarrinhoCompras" id="mainCarrinhoCompras">
			<div id="formCarinhoCompras">
				<table id="tabelaCarrinho" cellpadding="0" cellspacing="0" >
					<thead>
						<tr>
							<td>&Iacute;tem</td>
							<td>Embalagem</td>
							<td>Valor Unit&aacute;rio</td>
							<td class="penultimo">Quantidade</td>
							<td class="last">Valor Total</td>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['valueProdutoCarrinho'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoCarrinho']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->key => $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value){
$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->_loop = true;
?>
						<tr>
							<td class="tdItem">
								<a class="imgProduto" href="<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['URL_AMIGAVEL'];?>
.html">
									<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho-de-compras/<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['IMAGEM_PRINCIPAL'];?>
" alt="" />
								</a>

								<div class="produtoInfos">
									<a class="linkNomeReferencia" href="<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['URL_AMIGAVEL'];?>
.html">
										<span class="ttNomeProduto"><?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['DESCRICAO_VENDA'];?>
</span>
										<span class="ttReferenciaProduto">REF.: <?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['REFERENCIA'];?>
</span>
									</a>

									<ul class="acoesProduto">
										<li>
											<a class="linkAcoes linkRemoverCarrinho" href="javascript:removeProdutoCarrinho(<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
);" title="Remover do carrinho">
												Remover do carrinho
											</a>
										</li>
										<li>
											<a class="linkAcoes linkMoverListaDesejos" href="/lista-desejos&addProduto=true&idProduto=<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_PRODUTO_ATRIBUTO_VALOR'];?>
" title="Mover para a lista de desejos">
												Mover para a lista de desejos
											</a>
										</li>
									</ul>
								</div>
							</td>
							<td class="tdEmbalarPresente">
								<label class="lblEmbalarPresente">
									<input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PACOTE_PRESENTE']=='S'){?>checked="checked"<?php }?> name="iptEmbalarPresente" id="pacotePresente-<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
" />
									<span>Embalar para presente <?php if ($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PACOTE_PRESENTE']=='S'){?>+R$<?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['VALOR_PACOTE_PRESENTE'],2,",",".");?>
<?php }?></span>
								</label>
							</td>
							<td class="tdValorUnitario">
								R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>

							</td>
							<td class="tdQuantidade">
								<div class="centerQuantidade clearfix">
									<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade-<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
" href="javascript:;">
										<span class="icone"></span>
									</a>
									<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto-<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['QUANTIDADE']);?>
" />
									<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade-<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
" href="javascript:;">
										<span class="icone"></span>
									</a>
									<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?><span class="qtdDesejada">Qtde Desejada: <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['QTD_SOLICITADA']);?>
</span><?php }?>
									<span class="erroQtdIndisponivel" id="erroQtdIndisponivel-<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['ID_CARRINHO'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['SALDO']<=0){?>Quantidade Indispon&iacute;vel (Saldo atual: <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['SALDO']);?>
)<?php }?>
									</span>
								</div>
							</td>
							<td class="tdValorTotal">
								R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PRECO_UNITARIO_VENDA']*$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['QUANTIDADE']),2,",",".");?>

								
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td class="tdItem"></td>
							<td class="tdEmbalarPresente"></td>
							<td class="tdValorUnitario"></td>
							<td class="tdSubTotal">Sub-Total</td>
							<td class="tdValorTotalFinal">R$ <?php echo number_format($_smarty_tpl->tpl_vars['subtotalCarrinho']->value,2,",",".");?>
</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- CUMPOM DE DESCONTO-->
			<div id="blocoCupomDesconto">
				<table id="tabelaDesconto">
					<tbody>
						<tr>
							<td class="td1">
								<div class="boxCupom clearfix">
									<span class="ttCupom">Cupom de desconto</span>
									<form id="formCupom" action="" method="">
										<label class="label" for="iptCupom">Digite o cupom aqui</label>
										<input id="iptCupom" class="input" type="text" maxlength="100" name="iptCupom" value="<?php echo $_smarty_tpl->tpl_vars['codigoCupom']->value;?>
" />
										<input id="btCalcularCupom" type="button" value="Inserir" />
									</form>
									<a class="linkExcluir" href="javascript:;" id="excluirCupom">Excluir Cupom</a>
									<span class="erroCepNaoInformado"><?php echo $_smarty_tpl->tpl_vars['retornoPromo']->value;?>
</span>
								</div>
							</td>
							<td class="td2">Desconto</td>
							<td class="td3"><?php if ($_smarty_tpl->tpl_vars['valorTotalDesconto']->value>0){?>R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorTotalDesconto']->value,2,",",".");?>
<?php }else{ ?>------------------<?php }?></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div id="blocoCep" <?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?> style="display:none;" <?php }?>>
				<table id="tabelaCep">
					<tbody>
						<tr class="buscaCep" <?php if ($_smarty_tpl->tpl_vars['freteCalculado']->value!='N'){?> style="display:none;" <?php }?>>
							<td class="td1">
								<span class="icone"></span>
								<div class="boxInformeCep">
									<span class="ttInformeCep">Calcule o frete e a previs&atilde;o de entrega do seu pedido</span>
									<form id="formConsultaPrazoEntrega" action="" method="">
										<label class="label" for="iptConsultaCep">Informe apenas n&uacute;meros</label>
										<input id="iptConsultaCep" class="input" type="text" maxlength="8" name="iptConsultaCep" />
										<span class="erroCepNaoInformado"></span>
										<input id="btConsultar" type="button" value="Calcular" />
										<a class="linkNaoSabeCep linkModal" href="http://www.buscacep.correios.com.br/" target="_blank">N&atilde;o sabe seu CEP?</a>
									</form>
								</div>
							</td>
							<td class="td2">Frete</td>
							<td class="td3">------------------</td>
						</tr>
						
						<!-- LOADER CONSULTA CEP -->
						<tr class="buscaCepLoader">
							<td class="td1">
								<span class="icone"></span>
								<div class="loader">
									<img src="../img/backgrounds/loader_actions.gif">
								</div>
							</td>
							<td class="td2"></td>
							<td class="td3"></td>
						</tr>

						<!-- RESULTADO DA BUSCA DE CEP -->
						<?php if ($_smarty_tpl->tpl_vars['freteCalculado']->value=='S'||$_smarty_tpl->tpl_vars['freteCalculado']->value=='E'){?>
						<tr class="resultadoCep">
							<td class="td1">
								<span class="icone"></span>
								<div class="resultadoBoxValorFrete">
									<span class="ttFrete">Frete</span>
									<ul class="ulResultadoFrete">
										<li class="ulResultadoFreteFirst">
											<span class="txtBold">CEP <?php echo $_smarty_tpl->tpl_vars['cepDestino']->value;?>
</span>
											<input id="iptConsultaCep2" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cepDestino']->value;?>
" name="iptConsultaCep2" />
											<a href="javascript:;" id="linkConsultarCep" title="Consultar outro CEP">(Consultar outro CEP)</a>
										</li>
										<?php  $_smarty_tpl->tpl_vars['valueFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['retornoCalculoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueFrete']->key => $_smarty_tpl->tpl_vars['valueFrete']->value){
$_smarty_tpl->tpl_vars['valueFrete']->_loop = true;
?>
											<?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Valor']>0||$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==2){?>
											<li>
												<span class="txtBold">
													<label class="lblRadioFrete">
														<input <?php if ($_smarty_tpl->tpl_vars['tipoFreteSelecionado']->value==$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']){?>checked="checked"<?php }?> type="radio" name="valorFrete" value="<?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['Codigo'];?>
|<?php if ($_smarty_tpl->tpl_vars['freteGratis']->value=='S'&&($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==41068||$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1)){?>0,00<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1){?><?php echo number_format($_smarty_tpl->tpl_vars['valueFrete']->value['Valor'],2,",",".");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['Valor'];?>
<?php }?><?php }?>">

														<span class="txtValorFrete">
															<?php  $_smarty_tpl->tpl_vars['valueDescricaoFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueDescricaoFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['descricaoTipoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueDescricaoFrete']->key => $_smarty_tpl->tpl_vars['valueDescricaoFrete']->value){
$_smarty_tpl->tpl_vars['valueDescricaoFrete']->_loop = true;
?>
																<?php if ($_smarty_tpl->tpl_vars['valueDescricaoFrete']->value['TIFR_ID_TIPO_FRETE']==$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']){?>
																	<?php echo $_smarty_tpl->tpl_vars['valueDescricaoFrete']->value['DESCRICAO_FRETE'];?>

																<?php }?>
															<?php } ?>
															
															<?php if ($_smarty_tpl->tpl_vars['freteGratis']->value=='S'&&($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==41068||$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1)){?>
															Frete Gr&aacute;tis
															<?php }else{ ?>
															R$ <?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1){?><?php echo number_format($_smarty_tpl->tpl_vars['valueFrete']->value['Valor'],2,",",".");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['Valor'];?>
<?php }?>
															<?php }?>
															
														</span>
													</label>
													<span class="txtPrazo">
													<?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==2){?>
														<span id="informacoesRetiraLoja">+informa&ccedil;&otilde;es</span>
													<?php }else{ ?>
														Previs&atilde;o de entrega em at&eacute; <?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['PrazoEntrega'];?>
 <?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['PrazoEntrega']>1){?>dias &uacute;teis<?php }else{ ?>dia &uacute;til<?php }?> ap&oacute;s o envio.
													<?php }?>
													</span>
												</span>
											</li>
											<?php }else{ ?>
											<li><span>N&atilde;o foi poss&iacute;vel calcular o frete para o CEP informado.</span></li>
											<?php }?>
										<?php } ?>
									</ul>
								</div>
							</td>
							<td class="td2">Valor do Frete</td>
							<td class="td3"><?php if ($_smarty_tpl->tpl_vars['valorFreteSelecionado']->value>0){?>R$ <?php echo $_smarty_tpl->tpl_vars['valorFreteSelecionado']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['freteGratis']->value=='S'&&$_smarty_tpl->tpl_vars['valorFreteSelecionado']->value){?>R$ <?php echo $_smarty_tpl->tpl_vars['valorFreteSelecionado']->value;?>
<?php }else{ ?>------------------<?php }?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
				
			

			<!-- INFORMACOES-->
			<div id="blocoInformacoes">
				<table id="tabelaDesconto">
					<tbody>
						<tr>
							<td class="td1">
								<div class="boxInformacoes clearfix">
									<span class="tt">Informa&ccedil;&otilde;es importantes</span>
									<span class="txtDescricao">
										<p>- As previs&otilde;es de entrega s&atilde;o calculadas a partir do primeiro dia &uacute;til seguinte ao da postagem.</p>
										<?php if ($_smarty_tpl->tpl_vars['descontoBoleto']->value>0){?>
										<p>- O desconto do boleto ou transfer&ecirc;ncia banc&aacute;ria aplica-se apenas ao valor dos produtos, n&atilde;o inclu&iacute;ndo no c&aacute;lculo o valor do frete.</p>
										<?php }?>
										<p>- A op&ccedil;&atilde;o de retirar na loja &eacute; gratuita. Aguarde o e-mail de confirma&ccedil;&atilde;o do pedido faturado para realizar a retirada. Pedidos ficam dispon&iacute;veis para retirada de segunda &agrave; sexta das 9:00 &agrave;s 19:00h na loja da Comlines em Novo Hamburgo/RS que fica no endere&ccedil;o:<br>BR-116, 2451, Km 237 - Bairro Rinc&atilde;o, Novo Hamburgo/RS</p>
									</span>
								</div>
								<br><br>
								<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
								<div class="boxInformacoes clearfix">
									<span class="tt">Frete Gr&aacute;tis</span>
									<span class="txtDescricao">
										<p>- O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.</p>
									</span>
								</div>
								<?php }?>
							</td>
							<td class="td2">
								<span class="txtTotal">Total</span>
							</td>
							<td class="td3">
								<span class="txtValorTotal">R$ <?php echo number_format($_smarty_tpl->tpl_vars['totalCarrinhoFinal']->value,2,",",".");?>
</span>
								<span class="txtVezes">Em at&eacute; <?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['totalCarrinhoFinal']->value,false);?>
</span>
								<?php if ($_smarty_tpl->tpl_vars['descontoBoleto']->value>0){?>
								<span class="txtVezes">
									<strong>ou R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoNoBoleto']->value,2,",",".");?>
 no boleto</strong>
									<span>ou transfer&ecirc;ncia banc&aacute;ria</span>
									<span>(<?php echo $_smarty_tpl->tpl_vars['descontoBoleto']->value;?>
% de desconto)</span>
								</span>
								<?php }?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div id="moduloCompreJunto" class="clearfix" style="display:none;">

				<div class="produtosSlide produtosSlideElegante">
					<a class="btProdutosSlide btProdutosSlidePrev" href="javascript:;">
						<span class="iconBt"></span>
					</a>
					<a class="btProdutosSlide btProdutosSlideNext" href="javascript:;">
						<span class="iconBt"></span>
					</a>

					<span class="tituloModulo">Economize no frete, Aproveite e compra tamb&eacute;m</span>

					<ul class="produtosSlideUl clearfix">
						<?php $_smarty_tpl->tpl_vars['compre'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['compre']->step = 1;$_smarty_tpl->tpl_vars['compre']->total = (int)ceil(($_smarty_tpl->tpl_vars['compre']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['compre']->step));
if ($_smarty_tpl->tpl_vars['compre']->total > 0){
for ($_smarty_tpl->tpl_vars['compre']->value = 1, $_smarty_tpl->tpl_vars['compre']->iteration = 1;$_smarty_tpl->tpl_vars['compre']->iteration <= $_smarty_tpl->tpl_vars['compre']->total;$_smarty_tpl->tpl_vars['compre']->value += $_smarty_tpl->tpl_vars['compre']->step, $_smarty_tpl->tpl_vars['compre']->iteration++){
$_smarty_tpl->tpl_vars['compre']->first = $_smarty_tpl->tpl_vars['compre']->iteration == 1;$_smarty_tpl->tpl_vars['compre']->last = $_smarty_tpl->tpl_vars['compre']->iteration == $_smarty_tpl->tpl_vars['compre']->total;?>
						<li class="produtosSlideLi produtosSlideLiCaurossel produtoLiTabela">
							<div class="produtoContent clearfix">
								<div class="produtoHover">
									<div class="produtoThumbsUl clearfix">
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink produtoThumbLinkAtivo" href="javascript:;">
												<img class="produtoThumbImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/thumbs-hover/1.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/thumbs-hover/2.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/thumbs-hover/3.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/thumbs-hover/4.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/thumbs-hover/5.jpg" alt="" />
											</a>
										</div>
									</div>
								</div>
								<div class="produtoInformacoes">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/design-collection/<?php echo $_smarty_tpl->tpl_vars['compre']->value;?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
									</a>
									<div class="produtosInfos">
										<a href="javascript:;" class="produtosSlideLink">
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<span class="produtoParcelado">
												<span class="produtoVezes">12x R$</span>
												88,90
												<span class="produtoJuros">sem juros</span>
											</span>
										</a>
									</div>
									<a href="javascript:;" class="btAdicionarCarrinho">Adicionar ao Carrinho</a>
								</div>
							</div>
						</li>
						<?php }} ?>
					</ul>
				</div>
			</div>
			<br>
			<ul class="ulAcoesCarrinho clearfix">
				<li class="liContinuarComprando">
					<a class="btAcao btContinuarComprando" href="/">
						<span class="icone"></span>
						Continuar comprando
					</a>
				</li>

				<li class="liFinalizarCompras">
					<a class="btAcao btFinalizarCompra" id="btFinalizarCompra" href="javascript:;">
						<span class="icone"></span>
						Finalizar compra
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php }} ?>