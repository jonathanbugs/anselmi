{if $idListaCasamento}
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	{include file="../lista-casamento/includes/topo.tpl"}
{/if}
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
						{foreach $listaProdutoCarrinho as $valueProdutoCarrinho}
						<tr>
							<td class="tdItem">
								<a class="imgProduto" href="{$valueProdutoCarrinho.URL_AMIGAVEL}.html">
									<img src="{$MIDIA_DIR}produtos/carrinho-de-compras/{$valueProdutoCarrinho.IMAGEM_PRINCIPAL}" alt="" />
								</a>

								<div class="produtoInfos">
									<a class="linkNomeReferencia" href="{$valueProdutoCarrinho.URL_AMIGAVEL}.html">
										<span class="ttNomeProduto">{$valueProdutoCarrinho.DESCRICAO_VENDA} - {$valueProdutoCarrinho.REFERENCIA}</span>
										<span class="ttReferenciaProduto">
											{$valueProdutoCarrinho.ATRIBUTO}
										</span>
									</a>

									<ul class="acoesProduto">
										<li>
											<a class="linkAcoes linkRemoverCarrinho" href="javascript:removeProdutoCarrinho({$valueProdutoCarrinho.ID_CARRINHO});" title="Remover do carrinho">
												Remover do carrinho
											</a>
										</li>
										<li>
											<a class="linkAcoes linkMoverListaDesejos" href="lista-desejos&addProduto=true&idProduto={$valueProdutoCarrinho.ID_PRODUTO_ATRIBUTO_VALOR}" title="Mover para a lista de desejos">
												Mover para a lista de desejos
											</a>
										</li>
									</ul>
								</div>
							</td>
							<td class="tdEmbalarPresente">
								<label class="lblEmbalarPresente">
									<input type="checkbox" {if $valueProdutoCarrinho.PACOTE_PRESENTE eq 'S'}checked="checked"{/if} name="iptEmbalarPresente" id="pacotePresente-{$valueProdutoCarrinho.ID_CARRINHO}" />
									<span>Embalar para presente {if $valueProdutoCarrinho.PACOTE_PRESENTE eq 'S'}+R${$valueProdutoCarrinho.VALOR_PACOTE_PRESENTE|number_format:2:",":"."}{/if}</span>
								</label>
							</td>
							<td class="tdValorUnitario">
								R$ {$valueProdutoCarrinho.PRECO_UNITARIO_VENDA|number_format:2:",":"."}
							</td>
							<td class="tdQuantidade">
								<div class="centerQuantidade clearfix">
									<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade-{$valueProdutoCarrinho.ID_CARRINHO}" href="javascript:;">
										<span class="icone"></span>
									</a>
									<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto-{$valueProdutoCarrinho.ID_CARRINHO}" value="{$valueProdutoCarrinho.QUANTIDADE|number_format}" />
									<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade-{$valueProdutoCarrinho.ID_CARRINHO}" href="javascript:;">
										<span class="icone"></span>
									</a>
									{if $idListaCasamento}<span class="qtdDesejada">Qtde Desejada: {$valueProdutoCarrinho.QTD_SOLICITADA|number_format}</span>{/if}
									<span class="erroQtdIndisponivel" id="erroQtdIndisponivel-{$valueProdutoCarrinho.ID_CARRINHO}">
										{if $valueProdutoCarrinho.SALDO <= 0}Quantidade Indispon&iacute;vel (Saldo atual: {$valueProdutoCarrinho.SALDO|number_format}){/if}
									</span>
								</div>
							</td>
							<td class="tdValorTotal">
								R$ {($valueProdutoCarrinho.PRECO_UNITARIO_VENDA*$valueProdutoCarrinho.QUANTIDADE)|number_format:2:",":"."}
								
							</td>
						</tr>
						{/foreach}
						<tr>
							<td class="tdItem"></td>
							<td class="tdEmbalarPresente"></td>
							<td class="tdValorUnitario"></td>
							<td class="tdSubTotal">Sub-Total</td>
							<td class="tdValorTotalFinal">R$ {$subtotalCarrinho|number_format:2:",":"."}</td>
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
										<input id="iptCupom" class="input" type="text" maxlength="100" name="iptCupom" value="{$codigoCupom}" />
										<input id="btCalcularCupom" type="button" value="Inserir" />
									</form>
									<a class="linkExcluir" href="javascript:;" id="excluirCupom">Excluir Cupom</a>
									<span class="erroCepNaoInformado">{$retornoPromo}</span>
								</div>
							</td>
							<td class="td2">Desconto</td>
							<td class="td3">{if $valorTotalDesconto > 0}R$ {$valorTotalDesconto|number_format:2:",":"."}{else}------------------{/if}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div id="blocoCep" {if $idListaCasamento > 0} style="display:none;" {/if}>
				<table id="tabelaCep">
					<tbody>
						<tr class="buscaCep" {if $freteCalculado neq 'N'} style="display:none;" {/if}>
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
						{if $freteCalculado eq 'S' || $freteCalculado eq 'E'}
						<tr class="resultadoCep">
							<td class="td1">
								<span class="icone"></span>
								<div class="resultadoBoxValorFrete">
									<span class="ttFrete">Frete</span>
									<ul class="ulResultadoFrete">
										<li class="ulResultadoFreteFirst">
											<span class="txtBold">CEP {$cepDestino}</span>
											<input id="iptConsultaCep2" type="hidden" value="{$cepDestino}" name="iptConsultaCep2" />
											<a href="javascript:;" id="linkConsultarCep" title="Consultar outro CEP">(Consultar outro CEP)</a>
										</li>
										{foreach $retornoCalculoFrete as $valueFrete}
											{if $valueFrete.Valor > 0 or $valueFrete.Codigo eq 2}
											<li>
												<span class="txtBold">
													<label class="lblRadioFrete">
														<input {if $tipoFreteSelecionado eq $valueFrete.Codigo}checked="checked"{/if} type="radio" name="valorFrete" value="{$valueFrete.Codigo}|{if $freteGratis eq 'S' and ($valueFrete.Codigo eq 41068 or $valueFrete.Codigo eq 1)}0,00{else}{if $valueFrete.Codigo eq 1}{$valueFrete.Valor|number_format:2:",":"."}{else}{$valueFrete.Valor}{/if}{/if}">

														<span class="txtValorFrete">
															{foreach $descricaoTipoFrete as $valueDescricaoFrete}
																{if $valueDescricaoFrete.TIFR_ID_TIPO_FRETE eq $valueFrete.Codigo}
																	{$valueDescricaoFrete.DESCRICAO_FRETE}
																{/if}
															{/foreach}
															
															{if $freteGratis eq 'S' and ($valueFrete.Codigo eq 41068 or $valueFrete.Codigo eq 1)}
															Frete Gr&aacute;tis
															{else}
															R$ {if $valueFrete.Codigo eq 1}{$valueFrete.Valor|number_format:2:",":"."}{else}{$valueFrete.Valor}{/if}
															{/if}
															
														</span>
													</label>
													<span class="txtPrazo">
													{if $valueFrete.Codigo eq 2}
														<span id="informacoesRetiraLoja">+informa&ccedil;&otilde;es</span>
													{else}
														Previs&atilde;o de entrega em at&eacute; {$valueFrete.PrazoEntrega} {if $valueFrete.PrazoEntrega > 1}dias &uacute;teis{else}dia &uacute;til{/if} ap&oacute;s o envio.
													{/if}
													</span>
												</span>
											</li>
											{else}
											<li><span>N&atilde;o foi poss&iacute;vel calcular o frete para o CEP informado.</span></li>
											{/if}
										{/foreach}
									</ul>
								</div>
							</td>
							<td class="td2">Valor do Frete</td>
							<td class="td3">{if $valorFreteSelecionado > 0}R$ {$valorFreteSelecionado}{elseif $freteGratis eq 'S' and $valorFreteSelecionado}R$ {$valorFreteSelecionado}{else}------------------{/if}</td>
						</tr>
						{/if}
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
										{if $descontoBoleto > 0}
										<p>- O desconto do boleto ou transfer&ecirc;ncia banc&aacute;ria aplica-se apenas ao valor dos produtos, n&atilde;o inclu&iacute;ndo no c&aacute;lculo o valor do frete.</p>
										{/if}
										<p>- A op&ccedil;&atilde;o de retirar na loja &eacute; gratuita. Aguarde o e-mail de confirma&ccedil;&atilde;o do pedido faturado para realizar a retirada. Pedidos ficam dispon&iacute;veis para retirada de segunda &agrave; sexta das 9:00 &agrave;s 19:00h na loja da Comlines em Novo Hamburgo/RS que fica no endere&ccedil;o:<br>BR-116, 2451, Km 237 - Bairro Rinc&atilde;o, Novo Hamburgo/RS</p>
									</span>
								</div>
								<br><br>
								{if $idListaCasamento}
								<div class="boxInformacoes clearfix">
									<span class="tt">Frete Gr&aacute;tis</span>
									<span class="txtDescricao">
										<p>- O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.</p>
									</span>
								</div>
								{/if}
							</td>
							<td class="td2">
								<span class="txtTotal">Total</span>
							</td>
							<td class="td3">
								<span class="txtValorTotal">R$ {$totalCarrinhoFinal|number_format:2:",":"."}</span>
								<span class="txtVezes">Em at&eacute; {$totalCarrinhoFinal|valor_parcelado:false}</span>
								{if $descontoBoleto > 0}
								<span class="txtVezes">
									<strong>ou R$ {$precoNoBoleto|number_format:2:",":"."} no boleto</strong>
									<span>ou transfer&ecirc;ncia banc&aacute;ria</span>
									<span>({$descontoBoleto}% de desconto)</span>
								</span>
								{/if}
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
						{for $compre=1 to 12}
						<li class="produtosSlideLi produtosSlideLiCaurossel produtoLiTabela">
							<div class="produtoContent clearfix">
								<div class="produtoHover">
									<div class="produtoThumbsUl clearfix">
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink produtoThumbLinkAtivo" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/1.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/2.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/3.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/4.jpg" alt="" />
											</a>
										</div>
										<div class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/5.jpg" alt="" />
											</a>
										</div>
									</div>
								</div>
								<div class="produtoInformacoes">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="{$MIDIA_DIR}produtos/design-collection/{$compre}.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
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
						{/for}
					</ul>
				</div>
			</div>
			<br>
			<ul class="ulAcoesCarrinho clearfix">
				<li class="liContinuarComprando">
					<a class="btAcao btContinuarComprando" href="{$LINK}">
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
