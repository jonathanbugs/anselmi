<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="{$BASE_DIR}">Inicial</a> / Ulitidades Dom&eacute;sticas
				</li>
			</ul>
			<h2 class="tituloCategoria">Ulitidades Dom&eacute;sticas</h2>
		</div>


		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			{$menuSidebar}
		</div>


		<div class="produtosListagem clearfix">
			<div class="destaquesBanner">
				<span class="txtDestaques"></span>

				<!-- BANNERS DESTAQUES -->
				<ul class="destaquesUl">
					<li class="destaqueLi clearfix">
						<a href="javascript:;" class="destaqueLink">
							<span class="destaqueImagem">
								<img src="{$MIDIA_DIR}produtos/banner-destaques/1.jpg" class="destaqueImg" alt="" />
							</span>
							<span class="destaqueInformacoes">
								<span class="destaqueTitulo">Conjunto churrasco Punk Rock 4 p&ccedil;s Rock&rsquo;n&rsquo;cook Tramontina</span>
								<span class="destaqueDescricao">
									Tenha um churrasco de acordo com o seu estilo! Com esse kit de churras punk rock, seus momentos de lazer ser&atilde;o mais aut&ecirc;nticos!
								</span>
								<span class="destaqueValorAntigo">De R$ 159,00 por</span>
								<span class="destaqueValor">
									10X R$ 10,59
									<span class="juros">sem juros</span>
								</span>
								<span class="destaqueBt">
									<span class="destaqueBtTxt">Clique e Confira</span>
									<span class="destaqueBtIcone"></span>
									<span class="destaqueBtSeta"></span>
								</span>
							</span>
						</a>
					</li>
					<li class="destaqueLi clearfix">
						<a href="javascript:;" class="destaqueLink">
							<span class="destaqueImagem">
								<img src="{$MIDIA_DIR}produtos/banner-destaques/1.jpg" class="destaqueImg" alt="" />
							</span>
							<span class="destaqueInformacoes">
								<span class="destaqueTitulo">Conjunto churrasco Punk Rock 4 p&ccedil;s Rock&rsquo;n&rsquo;cook Tramontina</span>
								<span class="destaqueDescricao">
									Tenha um churrasco de acordo com o seu estilo! Com esse kit de churras punk rock, seus momentos de lazer ser&atilde;o mais aut&ecirc;nticos!
								</span>
								<span class="destaqueValorAntigo">De R$ 159,00 por</span>
								<span class="destaqueValor">
									10X R$ 10,59
									<span class="juros">sem juros</span>
								</span>
								<span class="destaqueBt">
									<span class="destaqueBtTxt">Clique e Confira</span>
									<span class="destaqueBtIcone"></span>
									<span class="destaqueBtSeta"></span>
								</span>
							</span>
						</a>
					</li>
				</ul>
			</div>

			<div class="produtosCategorias clearfix">
				<!-- TABS PRODUTOS -->
				<div class="produtosTabs">
					<ul class="menuAbasProdutosUl">
						<li class="menuAbasProdutosLi selected">
							<a href="javascript:;" class="menuAbasProdutosLink menuAbasProdutosLinkFirst">
								Ofertas
							</a>
						</li>
						<li class="menuAbasProdutosLi">
							<a href="javascript:;" class="menuAbasProdutosLink">
								Lan&ccedil;amentos
							</a>
						</li>
						<li class="menuAbasProdutosLi menuAbasProdutosLast">
							<a href="javascript:;" class="menuAbasProdutosLink menuAbasProdutosLinkLast">
								Mais Vendidos
							</a>
						</li>
					</ul>

					<div class="conteudoAbasProduto">
						<!-- TABS PRODUTOS OFERTAS -->
						<div class="abaProdutos aba1">
							<ul class="produtosSlideUl produtoUl clearfix">
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/2.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/3.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/1.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>

						<!-- TABS PRODUTOS LANÇAMENTOS -->
						<div class="abaProdutos aba2">
							<ul class="produtosSlideUl produtoUl clearfix">
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/1.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/2.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>



						<!-- TABS PRODUTOS MAIS VENDIDOS -->
						<div class="abaProdutos aba3">
							<ul class="produtosSlideUl produtoUl clearfix">
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/2.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/3.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/1.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
														<span class="produtoFrete">Frete gr&aacute;tis</span>
													{/if}
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="produtoLi produtoLiTabela">
									<div class="produtoContent clearfix">
										<div class="produtoHover">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
										
										<div class="produtoInformacoes">
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="boxProdutoSelo">
													<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
													<span class="produtoSelo produtoSeloNovo">Novo</span>
												</span>

												<span class="blocoImagem table">	
													<span class="tableCell">
														<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
													</span>
												</span>

												<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
												<span class="produtoDescricao">
													descricao produto
												</span>
											</a>

											<div class="produtosInfos"><br>
												<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
													<span class="produtoValorFinal">
														<span class="produtoValorAntigo">De R$ 200,00</span>
														por R$ 190,00
													</span>

													{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
														{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
													{else}
														{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
													{/if}
													
													<span class="produtoValorAVista">
														ou <strong>R$ 198,00</strong> &agrave; vista
													</span>
													
													<span class="produtoFrete">Frete gr&aacute;tis</span>
												</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="produtosSlide">
					<a class="btProdutosSlide btProdutosSlidePrev" href="javascript:;">
						<span class="iconBt"></span>
					</a>
					<a class="btProdutosSlide btProdutosSlideNext" href="javascript:;">
						<span class="iconBt"></span>
					</a>

					<span class="tituloCategoria">Cozinha</span>

					<div class="conteudoSlider">
						<ul class="produtosSlideUl produtoUl clearfix">
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="produtosSlide produtosSlideLast">
					<a class="btProdutosSlide btProdutosSlidePrev" href="javascript:;">
						<span class="iconBt"></span>
					</a>
					<a class="btProdutosSlide btProdutosSlideNext" href="javascript:;">
						<span class="iconBt"></span>
					</a>

					<span class="tituloCategoria">Bar</span>

					<div class="conteudoSlider">
						<ul class="produtosSlideUl produtoUl clearfix">
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
							<li class="produtosSlideLi produtoLi produtoLiTabela">
								<div class="produtoContent clearfix">
									<div class="produtoInformacoes">
										<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="boxProdutoSelo">
												<span class="produtoSelo produtoSeloPorcentagem">30% off</span>
												<span class="produtoSelo produtoSeloNovo">Novo</span>
											</span>

											<span class="blocoImagem table">	
												<span class="tableCell">
													<img class="produtoImg" src="../midia/produtos/listagem/4.jpg" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
												</span>
											</span>

											<span class="produtoTitulo">Jogo de Foundae<br>02939</span>
											<span class="produtoDescricao">
												descricao produto
											</span>
										</a>

										<div class="produtosInfos"><br>
											<a href="/{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
												<span class="produtoValorFinal">
													<span class="produtoValorAntigo">De R$ 200,00</span>
													por R$ 190,00
												</span>

												{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
													{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
												{else}
													{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
												{/if}
												
												<span class="produtoValorAVista">
													ou <strong>R$ 198,00</strong> &agrave; vista
												</span>
												
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											</a>

											<a href="/{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha teste</a>
											<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- BANNERS -->
			<div class="listaBanners">
				<ul class="bannersUl clearfix">
					<li class="bannersLi">
						<a class="bannersLink" href="/4988-ferramentas-e-jardinagens/8914-jardinagem/&amp;ordem=precomaior">
							<img alt="" src="http://cdnimg.comlines.com.br/midia/banners/laterais/cuts_0000.jpg" class="bannersImg">
						</a>
					</li>
					
					<li class="bannersLi">
						<a class="bannersLink" href="/4987-utilidades-domesticas/8894-churrasco/&amp;ordem=precomaior">
							<img alt="" src="http://cdnimg.comlines.com.br/midia/banners/laterais/cuts_0001.jpg" class="bannersImg">
						</a>
					</li>
					<li class="bannersLi">
						<a class="bannersLink" href="/4987-utilidades-domesticas/8902-cozinhar/8903-panelas/">
							<img alt="" src="http://cdnimg.comlines.com.br/midia/banners/laterais/cuts_0002.jpg" class="bannersImg">
						</a>
					</li>
					<li class="bannersLi bannersLiLast">
						<a class="bannersLink" href="/4987-utilidades-domesticas/8888-servir/8901-faqueiros/">
							<img alt="" src="http://cdnimg.comlines.com.br/midia/banners/laterais/cuts_0003.jpg" class="bannersImg">
						</a>
					</li>
					<!--li class="bannersLi">
						<a href="/8928-moveis/" class="bannersLink">
							<img class="bannersImg" src="http://cdnimg.comlines.com.br/midia/banners/laterais/cuts_0004.jpg" alt="" />
						</a>
					</li-->
				</ul>
			</div>
		</div>
	</div>
</div>
