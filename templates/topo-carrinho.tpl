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


