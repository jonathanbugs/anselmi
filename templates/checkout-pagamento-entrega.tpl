{if $idListaCasamento}
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	{include file="../lista-casamento/includes/topo.tpl"}
{/if}
<div class="container" id="mainFinalizaPedido">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		{include file="../templates/includes/_navegacao_checkout.tpl"}

		{if $idListaCasamento > 0}
			<input type="hidden" value="1" name="tipoFrete" id="tipoFrete">
		{/if}

		<div class="checkoutBlocoLeft" id="blocoTipoEntrega">
			<div class="checkoutBlocoEnvio checkoutBloco" {if $idListaCasamento > 0}style="display:none;"{/if}>
				<span class="checkoutBlocoTitulo">Tipo de Entrega</span>
				
				<div class="pagamentoContent">
					<span class="txtIntro">Selecione a forma de envio:
						<span id="erroFinalizarPedido"><br><br>Selecione o Tipo de Entrega antes de escolher a Forma de Pagamento</span></span>
					<input type="text" value="{$tipoFreteSelecionado}" name="tipoFrete" id="tipoFrete">
					<form id="entregaForm" class="pagamentoForm clearfix">
						{foreach $retornoCalculoFrete as $valueFrete}
						{if $valueFrete.Valor > 0 or $valueFrete.Codigo eq 2}
						<div class="entregaBloco {if $valueFrete@iteration eq 3}entregaBlocoLast{/if}">
							<label class="lblRadioEnvio">
								<input {if $tipoFreteSelecionado eq $valueFrete.Codigo}checked="checked"{/if} type="radio" name="radTipoEntrega" value="{$valueFrete.Codigo}" class="radEntrega">
								<span class="entregaTitulo">
									{foreach $descricaoTipoFrete as $valueDescricaoFrete}
										{if $valueDescricaoFrete.TIFR_ID_TIPO_FRETE eq $valueFrete.Codigo}
											{$valueDescricaoFrete.DESCRICAO_FRETE}
										{/if}
									{/foreach}
								</span>
								<span class="entregaDescricao entregaDescricaoBold">Previs&atilde;o de Entrega</span>
								<span class="entregaDescricao">{$valueFrete.PrazoEntrega} {if $valueFrete.PrazoEntrega > 1}dias &uacute;teis{else}dia &uacute;til{/if}*</span>

								<span class="entregaDescricao entregaDescricaoBold">Valor do Frete</span>
								<span class="entregaDescricao">{if $freteGratis eq 'S' and ($valueFrete.Codigo eq 41068 or $valueFrete.Codigo eq 1)}Frete Gr&aacute;tis{else}R$ {if $valueFrete.Codigo == 1}{$valueFrete.Valor|number_format:2:",":"."}{else}{$valueFrete.Valor}{/if}{/if}</span>
							</label>
						</div>
						{/if}
						{/foreach}
					</form>
					<div>*As previs&otilde;es de entrega s&atilde;o calculadas a partir do primeiro dia &uacute;til seguinte ao da postagem.</div>
				</div>
			</div>


			<div class="checkoutBlocoEntrega checkoutBloco">
				<span class="checkoutBlocoTitulo">Forma de Pagamento</span>
				<input type="hidden" name="idPedido" id="idPedido" value="{$idPedido}">
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
													{for $foo=1 to $parcelamento}
													<option value="{$foo}">{if $foo < 10}0{/if}{$foo}x de R$ {($totalPedidoFinal/$foo)|number_format:2:",":"."} sem juros</option>
												{/for} 
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
									<span>Boleto Banc&aacute;rio {if $descontoAVista}{$descontoAVista}% de desconto{/if}</span>
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
									<span>Transfer&ecirc;ncia Online {if $descontoAVista}{$descontoAVista}% de desconto{/if}</span>
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
			<div class="checkoutBlocoEndereco checkoutBloco" {if $idListaCasamento > 0}style="display:none;"{/if}>
				<span class="checkoutBlocoTitulo">Endere&ccedil;o de Entrega</span>

				<div class="styleCombobox">
					<span class="icone"></span>
					<select name="enderecoPessoa" id="enderecoPessoa"> 
						{foreach $listaPessoaEndereco as $valueEnderecoPessoa}
						<option value="{$valueEnderecoPessoa.ID_PESSOA_ENDERECO}" {if $valueEnderecoPessoa.ID_PESSOA_ENDERECO eq $idPessoaEnderecoEntrega}selected="selected"{/if}>{$valueEnderecoPessoa.APELIDO_ENDERECO}</option> 
						{/foreach}
					</select> 
				</div>

				<span class="descricao">
					{foreach $listaPedidoEndereco as $valuePedidoEntrega}<br>
					{$valuePedidoEntrega.ENDERECO}, {$valuePedidoEntrega.NUMERO}
					{if $valuePedidoEntrega.COMPLEMENTO} - {$valuePedidoEntrega.COMPLEMENTO}{/if}<br>
					BAIRRO {$valuePedidoEntrega.BAIRRO}<br>
					{$valuePedidoEntrega.NOME_MUNICIPIO}/{$valuePedidoEntrega.UF}
					<br/>
					CEP.: {$valuePedidoEntrega.CEP}
					{/foreach}
				</span>	

				<a href="#modalEndereco" class="linkNovoEndereco linkModalEndereco">Entregar em outro endere&ccedil;o</a>	
			</div>

			<div class="checkoutBlocoCarrinho checkoutBloco">
				<span class="checkoutBlocoTitulo">Dados da Compra</span>
				<ul class="pedidosCarrinhoUl">
					{foreach $listaPedido as $valuePedido}
					<li class="pedidosCarrinhoLi {if $valuePedido@iteration eq $countPedidosItens}pedidosCarrinhoLast{/if}">
						<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
							<img class="carrinhoImg" src="{$MIDIA_DIR}produtos/carrinho/{$valuePedido.IMAGEM}" alt="" />
							<span class="carrinhoProdutoTitulo">{$valuePedido.DESCRICAO_VENDA}</span>
							<span class="carrinhoProdutoAtributo">{$valuePedido.ATRIBUTO}</span>
							<span class="carrinhoProdutoQuantidade">Qtde: {$valuePedido.QUANTIDADE|number_format}</span>
							<span class="carrinhoProdutoValor">R$ {$valuePedido.PRECO_UNITARIO_VENDA|number_format:2:",":"."}</span>
						<!--</a>-->
					</li>
					{/foreach}
					
					<li class="subTotalLi">
						<div class="tableCell">
							<div class="contentBlocos">
								<span class="subTotalBloco">
									<span class="subTotalTxt">Sub-Total</span>
									<span class="subTotalTxt">Desconto</span>
									<span class="subTotalTxt">Frete</span>
								</span>
								<span class="subTotalBloco">
									<span class="subTotalTxt">R$ {$subtotalPedido|number_format:2:",":"."}</span>
									<span class="subTotalTxt">R$ {$valorPedidoDesconto|number_format:2:",":"."}</span>
									<span class="subTotalTxt">R$ {$valorFretePedido|number_format:2:",":"."}</span>
								</span>
							</div>
						</div>
					</li>

					<li class="totalLi">
						<div class="tableCell">
							<div class="contentBlocos">
								<span class="subTotalBloco">
									<span class="subTotalTxt">Total{if $descontoAVista} no cart&atilde;o de cr&eacute;dito{/if}</span>
									{if $descontoAVista}
									<span class="subTotalTxt">Total no boleto ou transfer&ecirc;ncia</span>
									{/if}
								</span>
								<span class="subTotalBloco">
									<span class="subTotalTxt">R$ {$totalPedidoFinal|number_format:2:",":"."}</span>
									{if $descontoAVista}
									<span class="subTotalTxt">R$ {$precoAVista|number_format:2:",":"."}</span>
									{/if}
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
	<div id="teste"></div>
	<form id="formEndereco" action="../actions/cadastro.php" method="post">
		<input type="hidden" value="checkout" name="pagina">
		<input type="hidden" value="insereNovoEndereco" name="acao">
		<input type="hidden" value="{$idPessoa}" name="idPessoa">
		<input type="hidden" value="{$idPedido}" name="idPedido">
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
			<li>
				<label id="lblPais" for="iptPais">*Pa&iacute;s</label>
				<input type="text" id="iptPais" name="iptPais" readonly/>
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

<!-- <script type='text/javascript' src='https://desenvolvedor.moip.com.br/sandbox/transparente/MoipWidget-v2.js' charset='ISO-8859-1'></script> -->
<script type='text/javascript' src='https://www.moip.com.br/transparente/MoipWidget-v2.js' charset='ISO-8859-1'></script>