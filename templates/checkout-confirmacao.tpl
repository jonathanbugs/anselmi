{if $idListaCasamento}
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	{include file="../lista-casamento/includes/topo.tpl"}
{/if}
<div class="container">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		{include file="../templates/includes/_navegacao_checkout.tpl"}


		<div class="pedidoConfirmacao">
			<div class="contentConfirmacao clearfix">
				<div class="dadosConfirmacao">
					<div class="circulo">
						<span class="icone"></span>
					</div>

					<div class="texto">
						<span class="sucessoTxt">Seu pedido {$numeroPedido} foi realizado com sucesso.</span>
						<span class="confirmacaosTxt">
							Sua transa&ccedil;&atilde;o foi processada pelo Moip Pagamentos S/A.<br>
							A situa&ccedil;&atilde;o da transa&ccedil;&atilde;o &eacute;: <strong>{$situacaoMoip}</strong> e o c&oacute;digo Moip &eacute; <strong>{$codMoip}</strong>.<br>
							Caso tenha alguma d&uacute;vida referente a transa&ccedil;&atilde;o, entre em contato com o Moip.<br>
							Uma confirma&ccedil;&atilde;o de pedido foi enviada para o e-mail {$emailPessoa}
						</span>
					</div>
				</div>

				<div class="confirmacaoOpcoes">
					<a href="/emails/imprime-pedido-checkout.php?idPedido={$idPedido}" class="btConfirmacaoOpcoes btConfirmacaoOpcoesImprimir" onClick="window.open(this.href, this.target); return false;" target="_blank">
						Imprimir
						<span class="icone"></span>
					</a>
					<!--<a href="javascript:;" class="btConfirmacaoOpcoes btConfirmacaoOpcoesPdf">
						Salvar em PDF
						<span class="icone"></span>
					</a>-->
				</div>
			</div>
		</div>

		<div class="checkoutBlocoCenter">
			<center>
			<a href="https://www.ebitempresa.com.br/bitrate/pesquisa1.asp?empresa=196835">
			<img border="0" name="banner" src="https://www.ebitempresa.com.br/bitrate/banners/b196835.gif" alt="O que você achou desta loja?" width="468" height="60">
			</a>
			</center>
		</div>

		{if $idListaCasamento}
		<div class="checkoutBlocoCenter">
			<div class="checkoutBlocoMensagemListaCasamento checkoutBloco">
				<span class="checkoutBlocoTituloListaCasamento">Deixe uma mensagem para o casal</span>
				<textarea name="mensagemListaCasamento" id="mensagemListaCasamento" maxlenght="3000"></textarea>
				<input id="btCadastrar" type="submit" value="Salvar" onClick="javascript: gravaMensagemListaCasamento({$idPedido});" />
			</div>
		</div>
		{/if}

		<div class="checkoutBlocoLeft">
			<div class="checkoutBlocoEnvio checkoutBloco">
				<span class="checkoutBlocoTitulo">Entrega</span>
				
				<div class="pagamentoContent">
					{if $idListaCasamento}
						O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.
					{else}
					<div class="entregaBloco entregaBlocoLimite">
						{foreach $listaPedidoEndereco as $valuePedidoEntrega}
						<span class="titulo">{$valuePedidoEntrega.APELIDO_ENDERECO}</span>
						<span class="descricao">
							{$valuePedidoEntrega.ENDERECO}, {$valuePedidoEntrega.NUMERO}
							{if $valuePedidoEntrega.COMPLEMENTO} - {$valuePedidoEntrega.COMPLEMENTO}{/if}<br>
							BAIRRO {$valuePedidoEntrega.BAIRRO}<br>
							{$valuePedidoEntrega.NOME_MUNICIPIO}/{$valuePedidoEntrega.UF}
							<br/>
							CEP.: {$valuePedidoEntrega.CEP}
						</span>
						{/foreach}
					</div>
					<div class="entregaBloco entregaBlocoLimite">
						<span class="titulo">Tipo de Entrega</span>
						<span class="descricao">
							<span class="descricaoBold">{$fretePedido}</span>
						</span>
					</div>
					<div class="entregaBloco entregaBlocoLast">
						<span class="titulo">Previs&atilde;o de Entrega</span>
						<span class="descricao">
							<span class="descricaoBold">{$prazoEntregaPedido} {if $prazoEntregaPedido > 1}dias &uacute;teis{else}dia &uacute;til{/if}</span>
							*As previs&otilde;es de entrega s&atilde;o calculados a partir do primeiro dia &uacute;til seguinte ao da postagem.
						</span>
					</div>
					{/if}
				</div>
			</div>


			<div class="checkoutBlocoEntrega checkoutBloco">
				<span class="checkoutBlocoTitulo">Forma de Pagamento</span>
				
				<div class="pagamentoContent">
					<div class="pedidoBlocos pedidoPagamento">
						{foreach $listaPedidoPagamento as $valuePedidoPagamento}
						<span class="txtIntro">Voc&ecirc; optou por pagar com {$valuePedidoPagamento.DESCRICAO}.</span>
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
								<span class="imgPagamento imgPagamento_{$valuePedidoPagamento.DESCRICAO_FORMA_PAGAMENTO}" ></span>
							</div>

							<div class="pagamentoBloco">
								<span class="tituloBlocos">Valor total da Compra</span>
								<span class="valorTotal">R$ {$valuePedidoPagamento.VALOR_TOTAL_PAGAMENTO|number_format:2:",":"."}</span>
								<span class="valorVezes">em {if $valuePedidoPagamento.NUMERO_PARCELAS < 10}0{/if}{$valuePedidoPagamento.NUMERO_PARCELAS}x de R$ {($valuePedidoPagamento.VALOR_TOTAL_PAGAMENTO/$valuePedidoPagamento.NUMERO_PARCELAS)|number_format:2:",":"."}</span>
							</div>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>

		<div class="checkoutBlocoRight">
			<div class="checkoutBlocoCarrinho checkoutBloco">
				<span class="checkoutBlocoTitulo">Carrinho de Compras</span>
				<ul class="pedidosCarrinhoUl">
					{foreach $listaPedido as $valuePedido}
					<li class="pedidosCarrinhoLi {if $valuePedido@iteration eq $countPedidosItens}pedidosCarrinhoLast{/if}">
						<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
							<img class="carrinhoImg" src="{$MIDIA_DIR}produtos/carrinho/{$valuePedido.IMAGEM}" alt="" />
							<span class="carrinhoProdutoTitulo">{$valuePedido.DESCRICAO_VENDA} {$valuePedido.REFERENCIA}<br>{$valuePedido.ATRIBUTO}</span>
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
									<span class="subTotalTxt">Total</span>
								</span>
								<span class="subTotalBloco">
									<span class="subTotalTxt">R$ {$totalPedidoFinal|number_format:2:",":"."}</span>
								</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

var fb_param = {};
fb_param.pixel_id = '6010236710284';
fb_param.value = '{($subtotalPedido-$valorPedidoDesconto)|number_format:2:".":""}';
fb_param.currency = 'BRL';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '{$analytics}']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_addTrans',
    '{$numeroPedido}',           // transaction ID - required
    'Comlines Tramontina',  // affiliation or store name
    '{($subtotalPedido-$valorPedidoDesconto)|number_format:2:".":""}',          // total - required
    '',           // tax
    '{$valorFretePedido|number_format:2:".":""}',              // shipping
    '{$valuePedidoEntrega.NOME_MUNICIPIO}',       // city
    '{$valuePedidoEntrega.UF}',     // state or province
    'BRA'             // country
  ]);

   // add item might be called for every item in the shopping cart
   // where your ecommerce engine loops through each item in the cart and
   // prints out _addItem for each
  {foreach $listaPedido as $valuePedido}
  _gaq.push(['_addItem',
    '{$valuePedido.NUMERO_PEDIDO}',           // transaction ID - required
    '{$valuePedido.REFERENCIA}',           // SKU/code - required
    '{$valuePedido.DESCRICAO_VENDA}',        // product name
    '{$valuePedido.CATEGORIA}',   // category or variation
    '{$valuePedido.PRECO_UNITARIO_VENDA|number_format:2:".":""}',          // unit price - required
    '{$valuePedido.QUANTIDADE|number_format}'               // quantity - required
  ]);
  {/foreach}
  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6010236710284&amp;value=0&amp;currency=BRL" /></noscript>
