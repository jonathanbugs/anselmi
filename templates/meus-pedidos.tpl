<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Pedidos</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

		<div class="meusPedidosContent">
			<span class="titulo">Todos os pedidos</span><br>
			<!--<div class="filtroPedidos">
				<form action="javascript:;" method="get" name="pedidoForm" class="pedidoForm clearfix" lang="pt">
					<span class="txtIntro">
						Buscar por
					</span>
					<div class="holder holderTipoBusca">
						<div class="relativeBusca">
							<label for="numero" class="checked">
								<input type="radio" id="numero" name="buscaPedido" value="numero" checked="checked" />
								n&uacute;mero do pedido
							</label>
						</div>
						<div class="relativeBusca">
							<label for="periodo">
								<input type="radio" id="periodo" name="buscaPedido" value="periodo" />
								por per&iacute;odo
							</label>
						</div>
					</div>
					<div class="holderBusca">
						<label class="label" for="buscaPedido">Digite o n&uacute;mero do pedido</label>
						<input class="input" type="text" id="buscaPedido" name="buscaPedido" />
						<button type="submit" class="btSubmit"><span class="icone"></span></button>
					</div>
				</form>
			</div>-->	

			<div class="blocoServicos">
				<div class="tabelaServicos">
					<div class="tabelaTitulos clearfix">
						<div class="table tableTitulo table1">
							<div class="tableCell">N&uacute;mero do Pedido</div>
						</div>
						<div class="table tableTitulo table2">
							<div class="tableCell">Data</div>
						</div>
						<div class="table tableTitulo table3">
							<div class="tableCell">Status</div>
						</div>
						<div class="table tableTitulo table4">
							<div class="tableCell"></div>
						</div>
					</div>


					<!-- LISTAGEM DE PEDIDOS -->


					<!-- PEDIDO 1 -->
					{foreach $pedido as $valuePedido}
					<div class="tabelaListas clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell">{$valuePedido[0].NUMERO_PEDIDO}</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell">{$valuePedido[0].DATA_EMISSAO}</div>
						</div>
						<div class="table tableInfos table3">
							<div class="tableCell">{$valuePedido[0].DESCRICAO_SITUACAO_CLIENTE}{if $valuePedido[0].DESCRICAO_SITUACAO_CLIENTE eq 'DESPACHADO'}<br>Rastreamento do pedido: <a href="http://websro.correios.com.br/sro_bin/txect01$.QueryList?P_LINGUA=001&P_TIPO=001&P_COD_UNI={$listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].COD_RASTREAMENTO}" target="_blank">{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].COD_RASTREAMENTO}</a>{/if}</div>
						</div>
						<div class="table tableInfos table4">
							<div class="tableCell">
								<a class="btVerMais" href="javascript:;"><span class="icon"></span></a>
							</div>
						</div>
					</div>

					<div class="pedidoAberto clearfix">
						<div class="pedidoInfos">
							<table class="pedidoTable">
								<tr class="pedidoTableTr">
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">N&uacute;mero do Pedido</span></td>
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">Data</span></td>
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">Status</span></td>
								</tr>
								<tr class="pedidoTableTr">
									<td class="pedidoTableTd">{$valuePedido[0].NUMERO_PEDIDO}</td>
									<td class="pedidoTableTd">{$valuePedido[0].DATA_EMISSAO}</td>
									<td class="pedidoTableTd">{$valuePedido[0].DESCRICAO_SITUACAO_CLIENTE}</td>
								</tr>
							</table> 
							<a class="btFecharPedido" href="javascript:;"><span class="icon"></span></a>
						</div>

						<div class="pedidoStatus">
							<span class="tituloBloco tituloBlocoStatus">Status</span>
							<div class="status">
								<ul class="statusUl clearfix">
									<li class="statusLi">
										<span class="iconStatus {if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][2].ID_SITUACAO eq 2}iconStatusConcluido{/if}"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Pedido recebido</span>
											<span class="dataStatus">{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][2].DATA}</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										<span class="iconStatus {if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].ID_SITUACAO eq 3}iconStatusConcluido{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][4].ID_SITUACAO eq 4}iconStatusErro{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][7].ID_SITUACAO eq 7}iconStatusErro{/if}"></span>
										<span class="tituloStatus">
											<span class="statusTxt">{if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].ID_SITUACAO eq 3}Pagamento Aprovado{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][4].ID_SITUACAO eq 4}Pagamento Negado{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][7].ID_SITUACAO eq 7}Cancelado{else}Pagamento Aprovado{/if}</span>
											<span class="dataStatus">{if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].ID_SITUACAO eq 3}{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][3].DATA}{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][4].ID_SITUACAO eq 4}{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][4].DATA}{elseif $listaStatusPedido[$valuePedido[0].ID_PEDIDO][7].ID_SITUACAO eq 7}{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][7].DATA}{/if}</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										
										<span class="iconStatus {if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][5].ID_SITUACAO eq 5}iconStatusConcluido{/if}"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Preparando para envio</span>
											<span class="dataStatus">{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][5].DATA}</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										<span class="iconStatus {if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][10].ID_SITUACAO eq 10}iconStatusConcluido{/if}"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Despacho</span>
											<!--<span class="dataStatus">Data estimada</span>-->
											<span class="dataStatus">{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][10].DATA}</span>
										</span>
									</li>

									<!--<li class="statusLi"><span class="statusLinha"></span></li>

									<li class="statusLi">
										<span class="iconStatus"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Em transporte</span>
											<span class="dataStatus">Data estimada</span>
											<span class="dataStatus">15/12/2013</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha"></span></li>
								
									<li class="statusLi">
										<span class="iconStatus {if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][16].ID_SITUACAO eq 16}iconStatusConcluido{/if}"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Pedido entregue</span>
											{if $listaStatusPedido[$valuePedido[0].ID_PEDIDO][10].ID_SITUACAO eq 10 and $listaStatusPedido[$valuePedido[0].ID_PEDIDO][16].ID_SITUACAO neq 16}
											<span class="dataStatus">Data estimada</span>
											{/if}
											<span class="dataStatus">{$listaStatusPedido[$valuePedido[0].ID_PEDIDO][16].DATA}</span>
										</span>
									</li>
								-->
								</ul>
							</div>
						</div>

						<div class="pedidoLeft">
							<div class="pedidoBlocos pedidoCarrinho">
								<span class="tituloBloco tituloBlocoCarrinho">Carrinho de Compras</span>

								<ul class="pedidosCarrinhoUl">
									{$subtotalPedido = 0}
									{$descontoPedido = 0}
									{foreach $valuePedido as $valueItemPedido}
									{$subtotalPedido = $subtotalPedido+($valueItemPedido.PRECO_UNITARIO_VENDA*$valueItemPedido.QUANTIDADE)}
									{$descontoPedido = $descontoPedido+$valueItemPedido.VALOR_DESCONTO}
									<li class="pedidosCarrinhoLi">
										<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
											<img class="carrinhoImg" src="{$MIDIA_DIR}produtos/carrinho/{$valueItemPedido.IMAGEM}" alt="" />
											<span class="carrinhoProdutoTitulo">{$valueItemPedido.DESCRICAO_VENDA}</span>
											<span class="carrinhoProdutoQuantidade">Qtde: {$valueItemPedido.QUANTIDADE|number_format}</span>
											<span class="carrinhoProdutoValor">R$ {$valueItemPedido.PRECO_UNITARIO_VENDA|number_format:2:",":"."}</span>
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
													<span class="subTotalTxt">R$ {$descontoPedido|number_format:2:",":"."}</span>
													<span class="subTotalTxt">R$ {$valuePedido[0].VALOR_FRETE|number_format:2:",":"."}</span>
												</span>
											</div>
										</div>
									</li>

									<li class="totalLi">
										<div class="tableCell">
											<div class="contentBlocos">
												<span class="subTotalBloco">
													<span class="subTotalTxt">Total</span>
												</span>
												<span class="subTotalBloco">
													<span class="subTotalTxt">R$ {(($subtotalPedido-$descontoPedido)+$valuePedido[0].VALOR_FRETE)|number_format:2:",":"."}</span>
												</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="pedidoRight">
							<div class="pedidoBlocos pedidoEntrega">
								<span class="tituloBloco tituloBlocoEntrega">Entrega</span>
								{if $valuePedido[0].LICA_ID_LISTA_CASAMENTO}
									O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.
								{else}
								<div class="entregaBloco entregaBlocoLimite">
									<span class="titulo">{$valuePedido[0].APELIDO_ENDERECO}</span>
									<span class="descricao">
										{$valuePedido[0].ENDERECO}, {$valuePedido[0].NUMERO} {$valuePedido[0].COMPLEMENTO}<br/>
										{$valuePedido[0].BAIRRO}, {$valuePedido[0].NOME_MUNICIPIO}/{$valuePedido[0].UF}
										<br/>
										CEP.: {$valuePedido[0].CEP}
									</span>
								</div>
								<div class="entregaBloco entregaBlocoLimite">
									<span class="titulo">Tipo de Entrega</span>
									<span class="descricao">
										<span class="descricaoBold">{$valuePedido[0].DESCRICAO_FRETE}</span>
									</span>
								</div>
								<div class="entregaBloco entregaBlocoLast">
									<span class="titulo">Previs&atilde;o de Entrega</span>
									<span class="descricao">
										<span class="descricaoBold">{$valuePedido[0].PRAZO_ENTREGA_DIAS} {if $valuePedido[0].PRAZO_ENTREGA_DIAS > 1}dias &uacute;teis{else}dia &uacute;til{/if}</span>
										* Previs&atilde;o v&aacute;lida somente ap&oacute;s o despacho do pedido.
									</span>
								</div>
								{/if}
							</div>
							<div class="pedidoBlocos pedidoPagamento">
								<span class="tituloBloco tituloBlocoPagamento">Forma de Pagamento</span>
								<span class="txtIntro">Voc&ecirc; optou por pagar por {$valuePedido[0].TIPO_FORMA_PAGAMENTO}.</span>
								<!--span class="txtIntro">Voc&ecirc; optou por pagar no Boleto Banc&aacute;rio.</span-->
								<!--span class="txtIntro">Voc&ecirc; optou por Transferência Online</span-->

								<div class="pagamentoContent clearfix">
									<div class="pagamentoBloco">
										<!--<span class="tituloBlocos">Cart&atilde;o Utilizado</span>-->
										<!--
										PASSAR A FORMA DE PAGAMENTO ESCOLHIDA
										EX: 
										visa
										visa_electron
										mastercard
										diners
										american
										hipercard

										itau
										bradesco
										banco-do-brasil
										banrisul
										-->
										<!--<img class="imgPagamento imgPagamento_{$valuePedido[0].DESCRICAO_FORMA_PAGAMENTO}" src="{$MIDIA_DIR}" alt=""/>-->
									</div>

									<div class="pagamentoBloco">
										<span class="tituloBlocos">Valor total da Compra</span>
										<span class="valorTotal">R$ {(($subtotalPedido-$descontoPedido)+$valuePedido[0].VALOR_FRETE)|number_format:2:",":"."}</span>
										<span class="valorVezes">em {$valuePedido[0].NUMERO_PARCELAS}x de R$ {((($subtotalPedido-$descontoPedido)+$valuePedido[0].VALOR_FRETE)/$valuePedido[0].NUMERO_PARCELAS)|number_format:2:",":"."}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					{/foreach}

				</div>
			</div>	
		</div>
	</div>
</div>
