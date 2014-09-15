		{if $listaCompreJunto neq 'S'}
		<div id="conteudo"></div>
		<!--CASO NAO HOUVER BANNERS LATERIAS ADICIONAR A CLASSE 'produtosListagemFull' NA DIV ABAIXO-->
		<div id="listagemProdutosAjax" class="produtosListagem {if $sessao eq 'lista-produtos-categorias' || $sessao eq 'design-collection' || $sessao eq 'lista-de-casamento-produtos'}produtosListagemFull{/if} clearfix">
			<div id="loaderListagemProdutosAjax">
				<img src="{$IMG_DIR}/backgrounds/loader_actions.gif">
			</div>
			{if $sessao eq 'lista-produtos-categorias' || $sessao eq 'design-collection' || $sessao eq 'lista-de-casamento-produtos'}
				<div class="auxiliarFiltros">
					
					<div class="contentAuxiliarFiltros">
						<div class="boxTipoLista">
							<a href="javascript:;" class="linkTipo linkTipoTabela ativo ir">Tabela</a>
							<a href="javascript:;" class="linkTipo linkTipoListagem ir">Listagem</a>
						</div>

						<!--FILTRO DE ORDENACAO -->
						<div class="boxOrdenar boxSelects">
							<a href="javascript:;" class="linkSelect linkSelectShowOrdenacao">
								<span class="linkSelectTxt">{$ordemInicialListaProduto}</span>
								<span class="seta"></span>
							</a>
							<ul class="listSelectUl">
								{foreach $ordemListaProduto as $key => $value}
								<li class="listSelectLi">
									<a href="{$value}" class="listSelectLink linkOrdenacao">{$key}</a>
								</li>
								{/foreach}
							</ul>
						</div>
					

						<!--FILTRO DE EXIBICAO -->
						<div class="boxExibir boxSelects">
							<a href="javascript:;" class="linkSelect linkSelectShowExibir">
								<span class="linkSelectTxt">exibir {$topListaProdutoCookie} produtos</span>
								<span class="seta"></span>
							</a>
							<ul class="listSelectUl">
								<li class="listSelectLi">
									<a href="{$linkPagina}&topListaProduto=20" class="listSelectLink nroProdutosLista">exibir 20 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="{$linkPagina}&topListaProduto=40" class="listSelectLink nroProdutosLista">exibir 40 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="{$linkPagina}&topListaProduto=60" class="listSelectLink nroProdutosLista">exibir 60 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="{$linkPagina}&topListaProduto=80" class="listSelectLink nroProdutosLista">exibir 80 produtos</a>
								</li>
							</ul>
						</div>

						<!--PAGINACAO FILTROS -->
						<div class="contentPaginacao contentPaginacaoFiltro table">
							<ul class="paginacaoUl clearfix">
								{if $ultimaPaginacaoBottom > 1}
								<li class="paginacaoLi">
									<a href="{$prevPaginacaoTop}" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">
										&lt;
									</a>
								</li>
								{/if}
								{foreach $paginacaoTop as $valuePagina}
								{if $valuePagina@iteration > 5} {break} {/if}
								<li class="paginacaoLi">
									<a href="{$linkPagina}&page={$valuePagina}" class="paginacaoLinks paginacaoLinksNumeros {if $valuePagina eq $paginaAtual}paginacaoLinksAtivo{/if}">{$valuePagina}</a>
								</li>
								{/foreach}
								{if $ultimaPaginacaoBottom > 1}
								<li class="paginacaoLi">
									<a href="{$nextPaginacaoTop}" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">
										&gt;
									</a>
								</li>
								{/if}
							</ul>
						</div>
					</div>

				</div>
				{if $topListaProduto < 0}{$produtoInicial = 1}{else}{$produtoInicial = $topListaProduto}{/if}
				<div class="contentNumeroPagina">Mostrando {$produtoInicial} - {($produtoInicial-1)+count($listaProdutoSite)} produto(s) do total de {$nroProdutos} distribu&iacute;do(s) em {$ultimaPaginacaoBottom} p&aacute;gina{if $ultimaPaginacaoBottom > 1}s{/if}</div>

			{/if}
		{/if}
			<ul class="produtoUl clearfix">
				{$cookieLista}
				{foreach $listaProdutoSite as $valueProdutoSite}
					<li class="produtoLi produtoLiTabela {if $sessao neq 'produto-detalhe' and $valueProdutoSite@iteration is div by 4}produtoLiLast{/if}">
						<div class="produtoContent clearfix">
							<div class="produtoHover">
								<!--<ul class="produtoThumbsUl clearfix">
									<li class="produtoThumbsLi">
										<a class="produtoThumbLink produtoThumbLinkAtivo" href="javascript:;">
											<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/1.jpg" alt="" />
										</a>
									</li>
									<li class="produtoThumbsLi">
										<a class="produtoThumbLink" href="javascript:;">
											<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/2.jpg" alt="" />
										</a>
									</li>
									<li class="produtoThumbsLi">
										<a class="produtoThumbLink" href="javascript:;">
											<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/3.jpg" alt="" />
										</a>
									</li>
									<li class="produtoThumbsLi">
										<a class="produtoThumbLink" href="javascript:;">
											<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/4.jpg" alt="" />
										</a>
									</li>
									<li class="produtoThumbsLi">
										<a class="produtoThumbLink" href="javascript:;">
											<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/5.jpg" alt="" />
										</a>
									</li>
								</ul>-->
								{if $valueProdutoSite.URL_AMIGAVEL_PNAUX}
								<a href="{$LINK}{$valueProdutoSite.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha {$valueProdutoSite.DESCRICAO_PRODUTO_NIVEL_AUXILI}</a>
								{/if}
								<a href="javascript:fnComprarProduto({$valueProdutoSite.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
							</div>
							<div class="produtoInformacoes">
								<a href="{$LINK}{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
									<span class="boxProdutoSelo">
										{if $valueProdutoSite.TIPO_PROMOCAO eq 'P' and $valueProdutoSite.VALOR_PROMOCAO}
										<span class="produtoSelo produtoSeloPorcentagem">{$valueProdutoSite.VALOR_PROMOCAO|number_format:0}% off</span>
										{elseif $valueProdutoSite.PRECO_PROMOCIONAL > 0}
										<span class="produtoSelo produtoSeloPorcentagem">oferta</span>
										{/if}
										{if $valueProdutoSite.LANCAMENTO eq 'S'}
										<span class="produtoSelo produtoSeloNovo">Novo</span>
										{/if}
									</span>

									<span class="blocoImagem table">	
										<span class="tableCell">
											<img class="produtoImg" src="{$MIDIA_DIR}produtos/listagem/{$valueProdutoSite.IMAGEM_PRINCIPAL}" alt="{$valueProdutoSite.DESCRICAO_VENDA}"/>
										</span>
									</span>

									<span class="produtoTitulo">{$valueProdutoSite.DESCRICAO_VENDA} {$valueProdutoSite.REFERENCIA}<br>{$valueProdutoSite.COR}</span>
									<span class="produtoDescricao">
										{$valueProdutoSite.DESCRICAO_CURTA}
									</span>
								</a>

								<div class="produtosInfos"><br>
									<!--<div class="produtoFavoritos">
										<ul class="favoritosUl">
											<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
											<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
											<li class="favoritosLi"><a class="favoritosLink"></a></li>
											<li class="favoritosLi"><a class="favoritosLink"></a></li>
											<li class="favoritosLi favoritosLiLast"><a class="favoritosLink"></a></li>
										</ul>
									</div>-->
									<a href="{$LINK}{$valueProdutoSite.URL_AMIGAVEL}.html" class="produtoLink">
										<span class="produtoValorFinal">
											{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
											<span class="produtoValorAntigo">De R$ {$valueProdutoSite.PRECO_VENDA|number_format:2:",":"."}</span>
											por R$ {$valueProdutoSite.PRECO_PROMOCIONAL|number_format:2:",":"."}
											{else}
											R$ {$valueProdutoSite.PRECO_VENDA|number_format:2:",":"."}
											{/if}
										</span>
										{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
											{$valueProdutoSite.PRECO_PROMOCIONAL|valor_parcelado}
										{else}
											{$valueProdutoSite.PRECO_VENDA|valor_parcelado}
										{/if}
										{if $descontoAVista > 0}
										<span class="produtoValorAVista">
											{if $valueProdutoSite.PRECO_PROMOCIONAL > 0}
												ou <strong>R$ {($valueProdutoSite.PRECO_PROMOCIONAL-(($valueProdutoSite.PRECO_PROMOCIONAL*$descontoAVista)/100))|number_format:2:",":"."}</strong> &agrave; vista
											{else}
												ou <strong>R$ {($valueProdutoSite.PRECO_VENDA-(($valueProdutoSite.PRECO_VENDA*$descontoAVista)/100))|number_format:2:",":"."}</strong> &agrave; vista
											{/if}
										</span>
										{/if}
										
										{if $valueProdutoSite.FRETE_GRATIS eq 'S'}
											<span class="produtoFrete">Frete gr&aacute;tis</span>
										{/if}
										
										
									</a>
									
									
								</div>

							</div>
						</div>
					</li>

					{if $sessao neq 'produto-detalhe' and $valueProdutoSite@iteration is div by 4}<li class="produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li>{/if}
					
				{/foreach}
			</ul>

		{if $listaCompreJunto neq 'S'}
			<!-- PRODUTOS LANCAMENTO -->
			{if $sessao eq 'inicial'}
			<div class="blocoProdutos">
				<ul class="produtoUl produtoCategoriasUl clearfix">
					<li class="produtosTitulo">
						<div class="blocoTitulo">
							<h2 class="titulo">Lan&ccedil;amentos</h2>
						</div>
					</li>
					{foreach $listaProdutoSiteLancamento as $valueProdutoSiteLancamento}

						<li class="produtoLi produtoLiTabela {if $sessao neq 'produto-detalhe' and $valueProdutoSiteLancamento@iteration is div by 4}produtoLiLast{/if}">
							<div class="produtoContent clearfix">
								<div class="produtoHover">
									<!--<ul class="produtoThumbsUl clearfix">
										<li class="produtoThumbsLi">
											<a class="produtoThumbLink produtoThumbLinkAtivo" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/1.jpg" alt="" />
											</a>
										</li>
										<li class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/2.jpg" alt="" />
											</a>
										</li>
										<li class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/3.jpg" alt="" />
											</a>
										</li>
										<li class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/4.jpg" alt="" />
											</a>
										</li>
										<li class="produtoThumbsLi">
											<a class="produtoThumbLink" href="javascript:;">
												<img class="produtoThumbImg" src="{$MIDIA_DIR}produtos/thumbs-hover/5.jpg" alt="" />
											</a>
										</li>
									</ul>-->
									{if $valueProdutoSiteLancamento.URL_AMIGAVEL_PNAUX}
									<a href="{$LINK}{$valueProdutoSiteLancamento.URL_AMIGAVEL_PNAUX}/" class="produtoCategoria">+ linha {$valueProdutoSiteLancamento.DESCRICAO_PRODUTO_NIVEL_AUXILI}</a>
									{/if}
									<a href="javascript:fnComprarProduto({$valueProdutoSiteLancamento.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
								</div>
								<div class="produtoInformacoes">
									<a href="{$LINK}{$valueProdutoSiteLancamento.URL_AMIGAVEL}.html" class="produtoLink">
										<span class="boxProdutoSelo">
											{if $valueProdutoSiteLancamento.TIPO_PROMOCAO eq 'P' and $valueProdutoSiteLancamento.VALOR_PROMOCAO > 0}
											<span class="produtoSelo produtoSeloPorcentagem">{$valueProdutoSiteLancamento.VALOR_PROMOCAO|number_format:0}% off</span>
											{elseif $valueProdutoSiteLancamento.PRECO_PROMOCIONAL > 0}
											<span class="produtoSelo produtoSeloPorcentagem">oferta</span>
											{/if}
											{if $valueProdutoSiteLancamento.LANCAMENTO eq 'S'}
											<span class="produtoSelo produtoSeloNovo">Novo</span>
											{/if}
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="{$MIDIA_DIR}produtos/listagem/{$valueProdutoSiteLancamento.IMAGEM_PRINCIPAL}" alt="{$valueProdutoSiteLancamento.DESCRICAO_VENDA}"/>
											</span>
										</span>

										<span class="produtoTitulo">{$valueProdutoSiteLancamento.DESCRICAO_VENDA} {$valueProdutoSiteLancamento.REFERENCIA}<br>
											{$valueProdutoSiteLancamento.COR}</span>
										<span class="produtoDescricao">
											{$valueProdutoSite.DESCRICAO_CURTA}
										</span>
									</a>

									<div class="produtosInfos"><br>
										<!--<div class="produtoFavoritos">
											<ul class="favoritosUl">
												<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
												<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
												<li class="favoritosLi"><a class="favoritosLink"></a></li>
												<li class="favoritosLi"><a class="favoritosLink"></a></li>
												<li class="favoritosLi favoritosLiLast"><a class="favoritosLink"></a></li>
											</ul>
										</div>-->
										<a href="{$LINK}{$valueProdutoSiteLancamento.URL_AMIGAVEL}.html" class="produtoLink">
											<span class="produtoValorFinal">
												{if $valueProdutoSiteLancamento.PRECO_PROMOCIONAL > 0}
												<span class="produtoValorAntigo">De R$ {$valueProdutoSiteLancamento.PRECO_VENDA|number_format:2:",":"."}</span>
												por R$ {$valueProdutoSiteLancamento.PRECO_PROMOCIONAL|number_format:2:",":"."}
												{else}
												R$ {$valueProdutoSiteLancamento.PRECO_VENDA|number_format:2:",":"."}
												{/if}
											</span>
											{if $valueProdutoSiteLancamento.PRECO_PROMOCIONAL > 0}
												{$valueProdutoSiteLancamento.PRECO_PROMOCIONAL|valor_parcelado}
											{else}
												{$valueProdutoSiteLancamento.PRECO_VENDA|valor_parcelado}
											{/if}
											{if $descontoAVista > 0}
											<span class="produtoValorAVista">
												{if $valueProdutoSiteLancamento.PRECO_PROMOCIONAL > 0}
													ou <strong>R$ {($valueProdutoSiteLancamento.PRECO_PROMOCIONAL-(($valueProdutoSiteLancamento.PRECO_PROMOCIONAL*$descontoAVista)/100))|number_format:2:",":"."}</strong> &agrave; vista
												{else}
													ou <strong>R$ {($valueProdutoSiteLancamento.PRECO_VENDA-(($valueProdutoSiteLancamento.PRECO_VENDA*$descontoAVista)/100))|number_format:2:",":"."}</strong> &agrave; vista
												{/if}
											</span>
											{/if}
											{if $valueProdutoSiteLancamento.FRETE_GRATIS eq 'S'}
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											{/if}
										</a>
									</div>
									<!-- <a href="javascript:;" class="produtoCategoria">+ {$valueProdutoSiteLancamento.DESCRICAO_CATEGORIA}</a> -->
								</div>
							</div>
						</li>
						{if $sessao neq 'produto-detalhe' and $valueProdutoSiteLancamento@iteration is div by 4}<li class="produtoLi produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li>{/if}
					{/foreach}
				</ul>

				<div class="blocoImagens clearfix">
					<div class="bloco">
						<a href="javascript:;">
							<img src="{$IMG_DIR}mais_cores.jpg" alt="mais cores no seu ver&atilde;o" />
						</a>
					</div>
					<div class="bloco">
						<a href="javascript:;">
							<img src="{$IMG_DIR}juliana_paes.jpg" alt="Juliana Paes" />
						</a>
					</div>
				</div>
			</div>

			{/if}

			
			{if $sessao eq 'lista-produtos-categorias' || $sessao eq 'design-collection'}
			{if $topListaProduto < 0}{$produtoInicial = 1}{else}{$produtoInicial = $topListaProduto}{/if}
			<div class="contentNumeroPagina">Mostrando {$produtoInicial} - {($produtoInicial-1)+count($listaProdutoSite)} produto(s) do total de {$nroProdutos} distribu&iacute;do(s) em {$ultimaPaginacaoBottom} p&aacute;gina{if $ultimaPaginacaoBottom > 1}s{/if}</div>
				<!--PAGINACAO RODAPE -->
				<div class="contentPaginacao contentPaginacaoFull table">
					<ul class="paginacaoUl clearfix">
						{if $ultimaPaginacaoBottom > 1}
						<li class="paginacaoLi">
							<a href="{$linkPagina}&page={$primeiraPaginacaoBottom}" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalFirst">primeira</a>
						</li>
						<li class="paginacaoLi">
							<a href="{$prevPaginacaoBottom}" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">&lt;</a>
						</li>
						{/if}
						{foreach $paginacaoBottom as $valuePagina}
							{if $valuePagina@iteration > 12} {break} {/if}
							<li class="paginacaoLi">
								<a href="{$linkPagina}&page={$valuePagina}" class="paginacaoLinks paginacaoLinksNumeros {if $valuePagina eq $paginaAtual}paginacaoLinksAtivo{/if}">{$valuePagina}</a>
							</li>
						{/foreach}
						{if $ultimaPaginacaoBottom > 1}
						<li class="paginacaoLi">
							<a href="{$nextPaginacaoBottom}" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">&gt;</a>
						</li>
						<li class="paginacaoLi">
							<a href="{$linkPagina}&page={$ultimaPaginacaoBottom}" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalLast">&uacute;ltima</a>
						</li>
						{/if}
					</ul>
				</div>
			{/if}
		</div>
		{/if}
