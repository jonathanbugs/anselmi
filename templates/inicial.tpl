<div class="container">
	{if $sessao eq 'inicial'}
	<div class="boxNews">
		<div class="boxNewsContent">
			<div class="table tableNews">
				<div class="tableCell">
					<form action="../actions/cadastro.php" method="post" name="newsForm" id="newsForm" class="newsForm clearfix" lang="pt">
						<input type="hidden" name="acao" value="cadastraNewsletter">
						<span class="receba">
							Receba ofertas por e-mail:
						</span>
						<div class="holder">
							<label class="label" for="nome">Nome</label>
							<input class="input" type="text" id="nome" name="nome" req='s' />
							<span id="erroFormNews"></span>
							<div id="teste"></div>
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o nome</span>
							</span>-->
						</div>
						<div class="holder">
							<label class="label" for="email">Email</label>
							<input class="input" type="text" id="email" name="email" req='s' />
						
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o e-mail</span>
							</span>-->
						</div>
						
						<button type="submit" class="btSubmit">OK</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	{/if}

	<div id="produtosContent" class="clearfix">

		<!-- SIDEBAR CATEGORIAS -->
		<!--div class="sidebarCategorias">
			{$menuSidebar}
		</div-->

		<!--LISTAGEM DE PRODUTO -->
		{include file="../templates/includes/_produtos.tpl"}


		<!--div class="blocoProdutos">
			<ul class="produtoUl produtoCategoriasUl clearfix">
				<li class="produtosTitulo">
					<div class="blocoTitulo">
						<h2 class="titulo">Lan&ccedil;amentos</h2>
					</div>
				</li>

				{for $foo=1 to 4}
				
				<li class="produtoLi produtoLiTabela">
					<div class="produtoContent clearfix">
						<div class="produtoInformacoes">
							<a href="{$LINK}{$valueProdutoSiteLancamento.URL_AMIGAVEL}.html" class="produtoLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="{$IMG_DIR}blusao.jpg" alt=""/>
									</span>
								</span>

								<span class="produtoTitulo">Maxi Pull Anselmi Listrado</span>
								<span class="produtoDescricao">
									Maxi Pull Anselmi Listrado
								</span>
							</a>

							<div class="produtosInfos"><br>
								<div class="produtoFavoritos">
									<ul class="favoritosUl">
										<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
										<li class="favoritosLi"><a class="favoritosLink favoritosLinkAtivo"></a></li>
										<li class="favoritosLi"><a class="favoritosLink"></a></li>
										<li class="favoritosLi"><a class="favoritosLink"></a></li>
										<li class="favoritosLi favoritosLiLast"><a class="favoritosLink"></a></li>
									</ul>
								</div>
								<a href="{$LINK}{$valueProdutoSiteLancamento.URL_AMIGAVEL}.html" class="produtoLink">
									<span class="produtoValorFinal">R$ 137,80</span>
									<span class="produtoValorParcelado">ou em at&eacute; 6x de R$ 22,97</span>
									<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
								</a>
							</div>
							<a href="javascript:;" class="produtoAddCarrinho">Adicionar ao Carrinho</a>
							<a href="javascript:;" class="produtoCategoria">+ blusas</a>
						</div>
					</div>
				</li>

				{/for}
				

				{*if $sessao neq 'produto-detalhe' and $valueProdutoSiteLancamento@iteration is div by 4}
				<li class="produtoLi produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li>
				{/if*}
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
		</div-->
	</div>
</div>
