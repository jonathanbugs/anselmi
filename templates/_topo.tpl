<div id="header">
	<div class="modalNewsletter">
		<a href="javascript:;" id="btnFecharModal" title="fechar"></a>
		<div class="modalConteudo">
			<div class="topoModal spriteModalNewsletter"></div>
			<div id="retornoNewsletter"></div>
			<input type="text" name="emailNewsletter" id="emailNewsletter" value="Insira aqui seu e-mail">
			<div id="buttons">
				<button class="newsletterFeminino spriteModalNewsletter" value="F"></button>
				<button class="newsletterMasculino spriteModalNewsletter" value="M"></button>
				<span>*Desconto v&aacute;lido por 15 dias para compras acima de R$ 200, somente na loja virtual</span>
			</div>
			<div class="beneficiosConteudo">
				<div class="beneficios spriteModalNewsletter"></div>
			</div>
			<div class="formaPagamentoConteudo">
				<div class="formaPagamento spriteModalNewsletter"></div>
			</div>
		</div>
	</div>
	<div id="topoLinks">
		<div class="containerGeral">
			<ul class="linksUl linksLeftUl clearfix">
				<li class="linksLi icone iconeFone">
					<span class="table linksTable">
						<span class="tableCell">
							<span class="linksTxt linksTxtFone">{$contato.DDD} {$contato.Fone}</span>
						</span>
					</span>
				</li>
				<li class="linksLi icone iconeChat">
					<a class="table linksTable" href="mailto:{$contato.Email}">
						<span class="tableCell">
							<span class="linksTxt">{$contato.Email}</span>
						</span>
					</a>
				</li>
				<li class="linksLi icone iconeCentral">
					<div class="table linksTable">
						<span class="tableCell">
							<span class="linksTxt">
								Ol&aacute; visitante, 
								<a href="{$LINK}logar/?redirect={$urlAtual}" class="topoIdentificacaoLink">fa&ccedil;a login</a>
								ou
								<a href="{$LINK}logar/?redirect={$urlAtual}" class="topoIdentificacaoLink">cadastre-se</a>
							</span>
						</span>
					</div>
				</li>
			</ul>
			<ul class="linksUl linksRightUl clearfix">
				<li class="linksLi icone iconePedidos">
					<a class="table linksTable" href="{$LINK}meus-pedidos" >
						<span class="tableCell">
							<span class="linksTxt">Meus Pedidos</span>
						</span>
					</a>
				</li>
				<li class="linksLi icone iconeDesejos">
					<a class="table linksTable" href="{$LINK}lista-desejos">
						<span class="tableCell">
							<span class="linksTxt">Lista de Desejos</span>
						</span>
					</a>
				</li>
			</ul>
		</div>			
	</div>
	
	<div class="container">
		<div class="topoCategorias">
			<div class="contentTopoCategorias">
				<div class="topoBloco clearfix">
					<h1 id="boxLogo"><a href="{$BASE_DIR}" class="logo ir">{$title}</a></h1>
					
					<div class="topoBuscaCarrinho">
						<!--span class="topoIdentificacao">
							{if $nomeCliente}
								Ol&aacute; {$nomeCliente}!
								<a href="{$LINK}logar/?redirect={$urlAtual}&acao=logout" class="topoIdentificacaoLink">N&atilde;o &eacute; voc&ecirc;?</a>
							{else}
								Ol&aacute; visitante,
								<a href="{$LINK}logar/?redirect={$urlAtual}" class="topoIdentificacaoLink">fa&ccedil;a login</a>
								ou
								<a href="{$LINK}logar/?redirect={$urlAtual}" class="topoIdentificacaoLink">cadastre-se</a>
							{/if}
						</span-->
						<div class="buscaTopo">
							<form action="{$LINK}busca" method="get" name="buscaForm" class="buscaForm" lang="pt">
								<div class="holder">
									<label class="label" for="buscaTopo">Buscar por um produto, marca ou c&oacute;digo</label>
									<input class="input" type="text" id="buscaTopo" name="q" />
									<button type="submit" class="btSubmit"><span class="icone"></span></button>
								</div>
							</form>
						</div>

						<!-- CARRINHO DE COMPRAS -->
						<div class="topoCarrinho">
							{if $sessao neq 'topo-carrinho'}
							<ul class="produtosCarrinhoUl" id="produtosCarrinhoUl">
								<li class="produtosCarrinhoLi">
									<a class="produtosCarrinhoLink" href="{$LINK}carrinho">
										<span class="carrinhoIcon"></span>
										<span class="carrinhoTxt">Meu Carrinho</span>
										<span class="carrinhoItens">({$quantidadeTotalCarrinhoTopo} itens)</span>
									</a>
									<ul class="carrinhoUl">
										<li>
											<ul class="carrinhoItensUl scroll">
												{foreach $listaProdutoCarrinhoTopo as $valueProdutoCarrinhoTopo}
												<li class="carrinhoLi">
													<a class="carrinhoLink" href="{$valueProdutoCarrinhoTopo.URL_AMIGAVEL}.html">
														<img class="carrinhoImg" src="{$MIDIA_DIR}produtos/carrinho/{$valueProdutoCarrinhoTopo.IMAGEM_PRINCIPAL}" alt="" />
														<span class="carrinhoProdutoTitulo">{$valueProdutoCarrinhoTopo.DESCRICAO_VENDA}</span>
														<span class="carrinhoProdutoQuantidade">Qtde: {$valueProdutoCarrinhoTopo.QUANTIDADE|number_format}</span>
														<span class="carrinhoProdutoValor">R$ {$valueProdutoCarrinhoTopo.PRECO_UNITARIO_VENDA|number_format:2:",":"."}</span>
													</a>
												</li>
												{/foreach}
												
											</ul>
										</li>
										<li class="finalizarCompraLi">
											<a href="{$LINK}carrinho" class="finalizarBt">Finalizar Compra</a>
											<span class="finalizarCompraTotal">R${$precoTotalVendaCarrinhoTopo|number_format:2:",":"."}</span>
										</li>
									</ul>
								</li>
							</ul>
							{/if}
						</div>
					</div>
				</div>
				{*if ($nomeConjuge1 eq '' or $idListaCasamento eq 0) and $sessao neq 'lista-de-casamento' and $sessao neq 'lista-de-casamento-formulario'}
					{$menuTopo}
				{/if*}

				<ul class="categoriasUl">
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Blusas</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Cal&ccedil;as</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Casacos</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Maxipulls</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Saias</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Shorts</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Vestidos</a>
					</li>
					<li class="categoriasLi">
						<a href="javascript:;" class="categoriasLink">Acess&oacute;rios</a>
					</li>
							
					<li class="categoriasLi categoriasLiOfertas">
						<a href="javascript:;" class="categoriasLink">Outlet</a>
					</li>
				</ul>			
			</div>
		</div>
		{if $idListaCasamento > 0 and $idListaCasamento eq $minhaIdListaCasamento and $sessao neq 'lista-de-casamento'}
		<div id="sairListaCasamento">
			<a href="javascript:sairListaCasamento();">Clique aqui</a> para sair da sua lista de casamento.
		</div>
		{elseif $nomeConjuge1 and $idListaCasamento > 0 and $sessao neq 'lista-de-casamento'}
		<div id="sairListaCasamento">
			J&aacute; viu a lista do sortudo casal? <a href="javascript:sairListaCasamento();">Clique aqui</a> para sair.
		</div>
		{/if}
	</div>
	{if $sessao eq 'inicial'}
	<div class="containerGeral">
		<div class="topoBanner">

			<a href="javascript:;" class="btBanner btBannerAnterior">Anterior</a>
			<a href="javascript:;" class="btBanner btBannerProximo">Próximo</a>

			<ul class="banner" 
				data-cycle-fx="fade"
				data-cycle-timeout="5000"
				data-cycle-prev=".btBannerAnterior"
				data-cycle-next=".btBannerProximo"
				data-cycle-slides=">li"
				data-cycle-speed="800"
				data-cycle-log="false"
				>
				<li class="sliderLi">
					<a class="sliderLink" href="javascript:;">
						<img class="sliderImg" src="{$IMG_DIR}banner1.jpg" alt=""/>
					</a>
				</li>
				<li class="sliderLi">
					<a class="sliderLink" href="javascript:;">
						<img class="sliderImg" src="{$IMG_DIR}banner2.jpg" alt=""/>
					</a>
				</li>
			</ul>
		</div>
	</div>
	{/if}
</div>


