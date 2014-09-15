<?php /* Smarty version Smarty-3.1.10, created on 2014-05-09 09:45:40
         compiled from "templates\checkout-pagamento-entrega.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2999536ccdf462df95-80999496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88f67e2d4320ca6242c41bf19a5002699dd75508' => 
    array (
      0 => 'templates\\checkout-pagamento-entrega.tpl',
      1 => 1399396263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2999536ccdf462df95-80999496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'tipoFreteSelecionado' => 0,
    'retornoCalculoFrete' => 0,
    'valueFrete' => 0,
    'descricaoTipoFrete' => 0,
    'valueDescricaoFrete' => 0,
    'freteGratis' => 0,
    'idPedido' => 0,
    'parcelamento' => 0,
    'foo' => 0,
    'totalPedidoFinal' => 0,
    'descontoAVista' => 0,
    'listaPessoaEndereco' => 0,
    'valueEnderecoPessoa' => 0,
    'idPessoaEnderecoEntrega' => 0,
    'listaPedidoEndereco' => 0,
    'valuePedidoEntrega' => 0,
    'listaPedido' => 0,
    'countPedidosItens' => 0,
    'MIDIA_DIR' => 0,
    'valuePedido' => 0,
    'subtotalPedido' => 0,
    'valorPedidoDesconto' => 0,
    'valorFretePedido' => 0,
    'precoAVista' => 0,
    'idPessoa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_536ccdf48d7379_55052751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ccdf48d7379_55052751')) {function content_536ccdf48d7379_55052751($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<div class="container" id="mainFinalizaPedido">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_navegacao_checkout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?>
			<input type="hidden" value="1" name="tipoFrete" id="tipoFrete">
		<?php }?>

		<div class="checkoutBlocoLeft" id="blocoTipoEntrega">
			<div class="checkoutBlocoEnvio checkoutBloco" <?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?>style="display:none;"<?php }?>>
				<span class="checkoutBlocoTitulo">Tipo de Entrega</span>
				
				<div class="pagamentoContent">
					<span class="txtIntro">Selecione a forma de envio:
						<span id="erroFinalizarPedido"><br><br>Selecione o Tipo de Entrega antes de escolher a Forma de Pagamento</span></span>
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['tipoFreteSelecionado']->value;?>
" name="tipoFrete" id="tipoFrete">
					<form id="entregaForm" class="pagamentoForm clearfix">
						<?php  $_smarty_tpl->tpl_vars['valueFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['retornoCalculoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueFrete']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueFrete']->key => $_smarty_tpl->tpl_vars['valueFrete']->value){
$_smarty_tpl->tpl_vars['valueFrete']->_loop = true;
 $_smarty_tpl->tpl_vars['valueFrete']->iteration++;
?>
						<?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Valor']>0||$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==2){?>
						<div class="entregaBloco <?php if ($_smarty_tpl->tpl_vars['valueFrete']->iteration==3){?>entregaBlocoLast<?php }?>">
							<label class="lblRadioEnvio">
								<input <?php if ($_smarty_tpl->tpl_vars['tipoFreteSelecionado']->value==$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']){?>checked="checked"<?php }?> type="radio" name="radTipoEntrega" value="<?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['Codigo'];?>
" class="radEntrega">
								<span class="entregaTitulo">
									<?php  $_smarty_tpl->tpl_vars['valueDescricaoFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueDescricaoFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['descricaoTipoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueDescricaoFrete']->key => $_smarty_tpl->tpl_vars['valueDescricaoFrete']->value){
$_smarty_tpl->tpl_vars['valueDescricaoFrete']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['valueDescricaoFrete']->value['TIFR_ID_TIPO_FRETE']==$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']){?>
											<?php echo $_smarty_tpl->tpl_vars['valueDescricaoFrete']->value['DESCRICAO_FRETE'];?>

										<?php }?>
									<?php } ?>
								</span>
								<span class="entregaDescricao entregaDescricaoBold">Previs&atilde;o de Entrega</span>
								<span class="entregaDescricao"><?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['PrazoEntrega'];?>
 <?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['PrazoEntrega']>1){?>dias &uacute;teis<?php }else{ ?>dia &uacute;til<?php }?>*</span>

								<span class="entregaDescricao entregaDescricaoBold">Valor do Frete</span>
								<span class="entregaDescricao"><?php if ($_smarty_tpl->tpl_vars['freteGratis']->value=='S'&&($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==41068||$_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1)){?>Frete Gr&aacute;tis<?php }else{ ?>R$ <?php if ($_smarty_tpl->tpl_vars['valueFrete']->value['Codigo']==1){?><?php echo number_format($_smarty_tpl->tpl_vars['valueFrete']->value['Valor'],2,",",".");?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['valueFrete']->value['Valor'];?>
<?php }?><?php }?></span>
							</label>
						</div>
						<?php }?>
						<?php } ?>
					</form>
					<div>*As previs&otilde;es de entrega s&atilde;o calculadas a partir do primeiro dia &uacute;til seguinte ao da postagem.</div>
				</div>
			</div>


			<div class="checkoutBlocoEntrega checkoutBloco">
				<span class="checkoutBlocoTitulo">Forma de Pagamento</span>
				<input type="hidden" name="idPedido" id="idPedido" value="<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
">
				<div class="pagamentoContent">
					<span class="txtIntro">Selecione a forma que deseja efetuar o pagamento:</span>

					<form id="pagamentoForm" name="pagamentoForm" method="post" class="pagamentoForm">
						<div class="pagamentoBloco pagamentoBlocoCartao">
							<div class="pagamentoSelecionar">
								<label class="lblRadio lblRadioCartao">
									<input type="radio" name="radTipoPagamento" id="cartao" value="cartao"/>
									<span>Cart&atilde;o de Cr&eacute;dito</span>
								</label>
								<span class="txtIntro">
									Selecione abaixo a bandeira do cart&atilde;o que deseja utilizar:
								</span>
								<div class="pagamentoIcones clearfix">
									<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;" id="Visa">
										<span class="icone iconeCartao iconeCartaoVisa"></span>
									</a>
									<!--<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;">
										<span class="icone iconeCartao iconeCartaoVisaElectron"></span>
									</a>-->
									<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;" id="Mastercard">
										<span class="icone iconeCartao iconeCartaoMastercard"></span>
									</a>
									<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;" id="Diners">
										<span class="icone iconeCartao iconeCartaoDiners"></span>
									</a>
									<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;" id="AmericanExpress">
										<span class="icone iconeCartao iconeCartaoAmerican"></span>
									</a>
									<a class="pagamentoIcone pagamentoIconesCartoes" href="javascript:;" id="Hipercard">
										<span class="icone iconeCartao iconeCartaoHipercard"></span>
									</a>
									<input type="hidden" value="" name="bandeiraCartao" id="bandeiraCartao">
								</div>

								<div id="MoipWidget"
						             data-token=""
						             callback-method-success="funcaoSucesso"
						             callback-method-error="funcaoFalha"></div>

								<div class="pagamentoFormDados">
									<ul class="pagamentoDadosUl">
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												Parcelamento:
											</label>
											<div class="styleCombobox">
												<span class="icone"></span>
												<select name="parcelamento" id="parcelamento">
												<option></option> 
													<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['parcelamento']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['parcelamento']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['foo']->value<10){?>0<?php }?><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
x de R$ <?php echo number_format(($_smarty_tpl->tpl_vars['totalPedidoFinal']->value/$_smarty_tpl->tpl_vars['foo']->value),2,",",".");?>
 sem juros</option>
												<?php }} ?> 
												</select> 
											</div>
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												N&uacute;mero do Cart&atilde;o:
											</label>
											<input type="text" class="pagamentoDadosInput" name="numeroCartao" id="numeroCartao" />
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												Nome do titular do cart&atilde;o:
											</label>
											<input type="text" class="pagamentoDadosInput" name="nomeCartao" id="nomeCartao" />
											<span class="pagamentoDadosTxt">* Nome que est&aacute; impresso no cart&atilde;o</span>
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												*CPF do titular do cart&atilde;o:
											</label>
											<input type="text" class="pagamentoDadosInput" name="cpfTitularCartao" id="cpfTitularCartao" />
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												*Data de Nascimento:
											</label>
											<input type="text" class="pagamentoDadosInput" name="dataNascimento" id="dataNascimento" />
											<span class="pagamentoDadosTxt">* Data de Nascimento do titular do cart&atilde;o</span>
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												*Telefone para contato:
											</label>
											<input type="text" class="pagamentoDadosInput" name="telefoneContato" id="telefoneContato" />
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												Validade do Cart&atilde;o:
											</label>
											<input type="text" class="pagamentoDadosInputValidade" name="mesCartao" id="mesCartao" maxlength="2" />
											<span class="pagamentoDadosLimiter">/</span>
											<input type="text" class="pagamentoDadosInputValidade" name="anoCartao" id="anoCartao" maxlength="2" />
											<span href="javascript:;" class="pagamentoTxtAdd">Formato: MM / AA</span>
										</li>
										<li class="pagamentoDadosLi clearfix">
											<label class="pagamentoDadosLabel">
												C&oacute;digo de seguran&ccedil;a:
											</label>
											<input type="text" class="pagamentoDadosInputCodigo" id="codigoCartao" name="codigoCartao" maxlength="4" />
											<a href="javascript:;" onmouseover="helpCodigoSeg(true);" onmouseout="helpCodigoSeg(false);" class="pagamentoTxtAdd pagamentoTxtAddLink">
												N&atilde;o sabe o que &eacute; o c&oacute;digo?
											</a>
											<div id="codigoSeguranca"><img src="../img/buttons/codigo-de-seguranca.png"></div>
										</li>
										<li>
											<label><br>*Informa&ccedil;&otilde;es do portador do cart&atilde;o. Estas informa&ccedil;&otilde;es s&atilde;o muito importantes para an&aacute;lise de risco.</label>
										</li>
									</ul>
									<a class="btFinalizar" href="javascript:pagarMoip('CartaoCredito');">
										finalizar compra no cart&atilde;o de cr&eacute;dito
										<span class="icone"></span>
									</a>
								</div>
							</div>
						</div>
						
						<div class="pagamentoBloco pagamentoBlocoBoleto">
							<div class="pagamentoSelecionar">
								<label class="lblRadio lblRadioBoleto">
									<input type="radio" name="radTipoPagamento" id="boleto" value="boleto" onclick="javascript:pagarMoip('BoletoBancario');"/>
									<span>Boleto Banc&aacute;rio <?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value){?><?php echo $_smarty_tpl->tpl_vars['descontoAVista']->value;?>
% de desconto<?php }?></span>
								</label>
								<span class="txtIntroHide"></span>
								<div class="pagamentoIcones clearfix">
									<a class="pagamentoIcone" href="javascript:pagarMoip('BoletoBancario');">
										<span class="icone iconeCartao iconeBoleto"></span>
									</a>
									<span class="txtBoleto">Imprima o boleto banc&aacute;rio ap&oacute;s a finaliza&ccedil;&atilde;o da compra</span>
									
								</div>

								<a class="btFinalizar" href="" target="_blank" onClick="redirectConfirma(); window.open(this.href, this.target, 'width=800,height=600'); return false;">
									finalizar compra no Boleto Banc&aacute;rio
									<span class="icone"></span>
								</a>
							</div>
						</div>
					
						<div class="pagamentoBloco pagamentoBlocoTranferencia pagamentoBlocoLast">
							<div class="pagamentoSelecionar">
								<input type="hidden" id="bancoTransferencia" name="bancoTransferencia">
								<label class="lblRadio lblRadioTransferencia">
									<input type="radio" name="radTipoPagamento" id="transferencia" value="transferencia"/>
									<span>Transfer&ecirc;ncia Online <?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value){?><?php echo $_smarty_tpl->tpl_vars['descontoAVista']->value;?>
% de desconto<?php }?></span>
								</label>
								<span class="txtIntro">
									Selecione o banco que deseja utilizar para fazer a tranfer&ecirc;ncia:
								</span>
								
								<div class="pagamentoIcones clearfix">
									<a class="pagamentoIconeTransferencia" href="javascript:pagarMoip('DebitoBancario');" id="Itau">
										<span class="icone iconeTransferencia iconeItau"></span>
									</a>
									<a class="pagamentoIconeTransferencia" href="javascript:pagarMoip('DebitoBancario');" id="Bradesco">
										<span class="icone iconeTransferencia iconeBradesco"></span>
									</a>
									<a class="pagamentoIconeTransferencia" href="javascript:pagarMoip('DebitoBancario');" id="BancoDoBrasil">
										<span class="icone iconeTransferencia iconeBancoBrasil"></span>
									</a>
									<a class="pagamentoIconeTransferencia pagamentoIconeTransferenciaBanrisul" href="javascript:pagarMoip('DebitoBancario');" id="Banrisul">
										<span class="icone iconeTransferencia iconeBanrisul"></span>
									</a>

									<div class="txtTransferencia">
										<span>V&aacute;lido apenas para correntistas dos bancos</span>
										<span>Ita&uacute;, Bradesco, Banco do Brasil, Banrisul</span>
									</div>
								</div>
								
								<span class="txtBanco">
									Voc&ecirc; selecionou o banco: <strong></strong>
								</span>

								<a class="btFinalizar" href="" target="_blank" onClick="redirectConfirma(); window.open(this.href, this.target, 'width=800,height=600'); return false;">
									finalizar compra com Transfer&ecirc;ncia Online
									<span class="icone"></span>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="checkoutBlocoRight">
			<div class="checkoutBlocoEndereco checkoutBloco" <?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?>style="display:none;"<?php }?>>
				<span class="checkoutBlocoTitulo">Endere&ccedil;o de Entrega</span>

				<div class="styleCombobox">
					<span class="icone"></span>
					<select name="enderecoPessoa" id="enderecoPessoa"> 
						<?php  $_smarty_tpl->tpl_vars['valueEnderecoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueEnderecoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPessoaEndereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueEnderecoPessoa']->key => $_smarty_tpl->tpl_vars['valueEnderecoPessoa']->value){
$_smarty_tpl->tpl_vars['valueEnderecoPessoa']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['valueEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" <?php if ($_smarty_tpl->tpl_vars['valueEnderecoPessoa']->value['ID_PESSOA_ENDERECO']==$_smarty_tpl->tpl_vars['idPessoaEnderecoEntrega']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['valueEnderecoPessoa']->value['APELIDO_ENDERECO'];?>
</option> 
						<?php } ?>
					</select> 
				</div>

				<span class="descricao">
					<?php  $_smarty_tpl->tpl_vars['valuePedidoEntrega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedidoEntrega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedidoEndereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedidoEntrega']->key => $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value){
$_smarty_tpl->tpl_vars['valuePedidoEntrega']->_loop = true;
?><br>
					<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['NUMERO'];?>

					<?php if ($_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['COMPLEMENTO']){?> - <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['COMPLEMENTO'];?>
<?php }?><br>
					BAIRRO <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['BAIRRO'];?>
<br>
					<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['NOME_MUNICIPIO'];?>
/<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['UF'];?>

					<br/>
					CEP.: <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['CEP'];?>

					<?php } ?>
				</span>	

				<a href="#modalEndereco" class="linkNovoEndereco linkModalEndereco">Entregar em outro endere&ccedil;o</a>	
			</div>

			<div class="checkoutBlocoCarrinho checkoutBloco">
				<span class="checkoutBlocoTitulo">Dados de Compra</span>
				<ul class="pedidosCarrinhoUl">
					<?php  $_smarty_tpl->tpl_vars['valuePedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valuePedido']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedido']->key => $_smarty_tpl->tpl_vars['valuePedido']->value){
$_smarty_tpl->tpl_vars['valuePedido']->_loop = true;
 $_smarty_tpl->tpl_vars['valuePedido']->iteration++;
?>
					<li class="pedidosCarrinhoLi <?php if ($_smarty_tpl->tpl_vars['valuePedido']->iteration==$_smarty_tpl->tpl_vars['countPedidosItens']->value){?>pedidosCarrinhoLast<?php }?>">
						<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
							<img class="carrinhoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['IMAGEM'];?>
" alt="" />
							<span class="carrinhoProdutoTitulo"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['DESCRICAO_VENDA'];?>
</span>
							<span class="carrinhoProdutoQuantidade">Qtde: <?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['QUANTIDADE']);?>
</span>
							<span class="carrinhoProdutoValor">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
</span>
						<!--</a>-->
					</li>
					<?php } ?>
					
					<li class="subTotalLi">
						<div class="tableCell">
							<div class="contentBlocos">
								<span class="subTotalBloco">
									<span class="subTotalTxt">Sub-Total</span>
									<span class="subTotalTxt">Desconto</span>
									<span class="subTotalTxt">Frete</span>
								</span>
								<span class="subTotalBloco">
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['subtotalPedido']->value,2,",",".");?>
</span>
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoDesconto']->value,2,",",".");?>
</span>
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorFretePedido']->value,2,",",".");?>
</span>
								</span>
							</div>
						</div>
					</li>

					<li class="totalLi">
						<div class="tableCell">
							<div class="contentBlocos">
								<span class="subTotalBloco">
									<span class="subTotalTxt">Total<?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value){?> no cart&atilde;o de cr&eacute;dito<?php }?></span>
									<?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value){?>
									<span class="subTotalTxt">Total no boleto ou transfer&ecirc;ncia</span>
									<?php }?>
								</span>
								<span class="subTotalBloco">
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['totalPedidoFinal']->value,2,",",".");?>
</span>
									<?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value){?>
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoAVista']->value,2,",",".");?>
</span>
									<?php }?>
								</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<!-- 
	MODAL DE ENDERECO - PARA SER EXIBIDA, DEVE SER COPIADA E COLADA SEMPRE NO FINAL DO TPL 

	O LINK QUE ABRE A MODAL DEVE TER A CLASSE "linkModalEndereco" E O href DEVE SER "#modalEndereco"

	CHAMAR A FUNCAO modalEndereco(); NO .JS DA RESPECTIVA PAGINA
-->

<div id="modalEndereco" class="modal">
	
	<span class="ttModal">Adicionar Novo Endere&ccedil;o</span>

	<form id="formEndereco" action="../actions/cadastro.php" method="post">
		<input type="hidden" value="checkout" name="pagina">
		<input type="hidden" value="insereNovoEndereco" name="acao">
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
" name="idPessoa">
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
" name="idPedido">
		<ul class="ulEndereco">
			<li>
				<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
				<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" />
				<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
			</li>
			
			<li>
				<label for="iptCep">*CEP</label>
				<input type="text" id="iptCep" name="iptCep" value="" />
				<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
			</li>
			
			<li class="liRadio">
				<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
				<label id="lblResidencial" class="lblRadio">
					<input type="radio" name="radTipoEndereco" id="radResidencial" value="Residencial" checked="checked" />
					<span>Residencial</span>
				</label>
				<label id="lblComercial" class="lblRadio">
					<input type="radio" name="radTipoEndereco" id="radComercial" value="Comercial"/>
					<span>Comercial</span>
				</label>
			</li>
			
			<li>
				<label for="iptEndereco">*Endere&ccedil;o</label>
				<input type="text" id="iptEndereco" name="iptEndereco" />
			</li>
			<li>
				<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
				<input type="text" id="iptNumero" name="iptNumero" />
			</li>

			<li>
				<label for="iptComplemento">Complemento</label>
				<input type="text" id="iptComplemento" name="iptComplemento" />
			</li>
			<li>
				<label id="lblBairro" for="iptBairro">*Bairro</label>
				<input type="text" id="iptBairro" name="iptBairro" />
			</li>

			<li>
				<label for="iptCidade">*Cidade</label>
				<input type="hidden" id="iptIdCidade" name="iptIdCidade"/>
				<input type="text" id="iptCidade" name="iptCidade" readonly />
			</li>
			<li>
				<label id="lblEstado" for="iptEstado">*Estado</label>
				<input type="text" id="iptEstado" name="iptEstado" readonly/>
			</li>
			<li class="liInformacoesReferencia">
				<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
				<textarea id="textAreaReferencia" name="textAreaReferencia"></textarea>
			</li>

			<li class="liBotaoSalvar">
				<input id="btSalvarEndereco" type="submit" value="Adicionar novo Endere&ccedil;o" />
			</li>
		</ul>
	</form>
</div>
<!-- FIM DA MODAL DE ENDERECO -->


<script type='text/javascript' src='https://www.moip.com.br/transparente/MoipWidget-v2.js' charset='ISO-8859-1'></script><?php }} ?>