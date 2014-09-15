<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Lista de Desejos</h2>
		</div>

		
		<div id="loadProdutoDesejos">
		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			<ul class="categoriasUl categoriasUlListaDesejos">
				<li class="categoriasLi categoriaMae">
					<a href="javascript:;" class="categoriasLink">Categorias</a>
				</li>
				{foreach $listaCategoriaDesejo as $key => $value}
				<li class="categoriaFilha">
					<a class="categoriasLink categoriasLinkFirst" href="{$LINK}lista-desejos/&idcate={$key}">
						<span>{$value}</span>
					</a>
				</li>
				{/foreach}
			</ul>
		</div>

		<div class="produtosListagem produtosListagemFull clearfix">
			<div class="auxiliarFiltros">
				<div class="contentAuxiliarFiltros">
					<div class="boxTipoLista">
						<span class="visualizandoTxt">Mostrando <span>1</span> - <span>{$countProdutoDesejo}</span> de <span>{$countProdutoDesejo}</span> em <span>1</span> p&aacute;ginas</span>
					</div>

				<!-- PAGINACAO ANTES DA LISTAGEM 
					<div class="contentPaginacao contentPaginacaoFiltro table">
						<ul class="paginacaoUl clearfix">
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">
									&lt;
								</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">1</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">2</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksAtivo">3</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">4</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">5</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">
									&gt;
								</a>
							</li>
						</ul>
					</div>-->
				</div>
			</div>
			<ul class="produtoUl clearfix">
				{foreach $listaProdutoDesejo as $value}
				<li class="produtoLi clearfix {if $value@iteration eq 1}produtoLiFirst{/if}" id="li-{$value.ID_PRODUTO_DESEJO}">
					<div class="produtoImagem">
						<img src="{$MIDIA_DIR}produtos/listagem/{$value.IMAGEM}" alt="" />
					</div>
					<div class="produtoInformacoes">
						<span class="produtoTitulo">{$value.DESCRICAO_VENDA}</span>
						<span class="produtoValor">
							{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
							<span class="produtoValorAntigo">De R$ {$value.PRECO_VENDA|number_format:2:",":"."}</span>
							por R$ {$value.PRECO_PROMOCIONAL|number_format:2:",":"."}
							{else}
							R$ {$value.PRECO_VENDA|number_format:2:",":"."}
							{/if}
						</span>
						<span class="produtoValorParcelado">
							{$value.PRECO_VENDA|valor_parcelado}
						</span>
						<!--<span class="produtoValorVista">ou R$ 889,90 no boleto</span>-->
						<div class="produtoBts">
							<!--<a href="javascript:;" class="produtoBt produtoBtAdcionar">Adicionar a lista de casamento</a>-->
							<a href="javascript:removerProdutoDesejo({$value.ID_PRODUTO_DESEJO});" class="produtoBt produtoBtRemover">Remover produto da lista</a>
						</div>
					</div>
					<div class="produtoOpcoes">
						<a href="javascript:fnComprarProduto({$value.PRCO_ID_PRODUTO_COMBINACAO}, 'true');" class="btOpces btOpcesComprar">
							Comprar <span class="icone"></span>
						</a>
						<a href="javascript:fnComprarProduto({$value.PRCO_ID_PRODUTO_COMBINACAO}, 'false');" class="btOpces btOpcesAdicionar">
							Adicionar ao Carrinho e continuar comprando
						</a>
					</div>
				</li>
				{/foreach}				
			</ul>

			<!-- PAGINACAO DEPOIS DA LISTAGEM 
			<div class="contentPaginacao contentPaginacaoFull table">
				<ul class="paginacaoUl clearfix">
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalFirst">primeira</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">&lt;</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">1</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksAtivo">2</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">3</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">4</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">5</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">6</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">7</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">8</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">9</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">10</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">11</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">12</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">13</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">&gt;</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalLast">&uacute;ltima</a>
					</li>
				</ul>
			</div>-->
			<!--<span class="visualizandoTxtRodape">
				Mostrando <span>34</span> - <span>96</span> de <span>349</span> em <span>13</span> p&aacute;ginas
			</span>-->
		</div>
		</div>
	</div>
</div>
