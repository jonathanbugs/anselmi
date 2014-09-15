<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Divulgar Lista de Casamento Divulgar Lista</title> -->

		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-divulgar-lista.css"/>
		
		<link href="../lista-casamento/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="../lista-casamento/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
	<!-- </head>
	<body class="bgListaCasamento">
		<div id="wrapper"> -->
			<div class="containerGeral">
				<header id="topo"></header>
			
				{include file="../lista-casamento/includes/topo.tpl"}
				
				<section id="conteudoLista">
					<div id="produtosContent" class="clearfix">
						<div class="sidebarCategorias">
							{include file="../lista-casamento/includes/_sidebar_lista_casamento.tpl"}
						</div>
						<div class="produtosListagem produtosListagemFull clearfix">
							<h2 class="tituloPagina">Editar Produtos</h2>
							<section class="sessao sessaoEnvie">
								<ul class="produtoUl clearfix">
									{foreach $listaProdutoSite as $value}
									<li class="produtoLi clearfix {if $value@iteration eq 1}produtoLiFirst{/if}" id="li-{$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}">
										<div class="produtoImagem">
											<img src="{$MIDIA_DIR}produtos/listagem/{$value.IMAGEM_PRINCIPAL}" alt="" />
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
												<a href="javascript:removerProdutoListaCasamento({$value.PCAV_ID_PRODUTO_COMBINACAO_ATR});" class="produtoBt produtoBtRemover">Remover produto da lista</a>
											</div>
											
										</div>

										<div class="produtoOpcoes">
											<a href="javascript:fnComprarProduto({$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'true');" class="btOpces btOpcesComprar">
												Comprar <span class="icone"></span>
											</a>
											<a href="javascript:fnComprarProduto({$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}, 'false');" class="btOpces btOpcesAdicionar">
												Adicionar ao Carrinho e continuar comprando
											</a>
										</div>
										<div class="produtoQuantidade">
											<div class="centerQuantidade clearfix">
												<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade-{$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}" href="javascript:;">
													<span class="icone"></span>
												</a>
												<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto-{$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}" value="{$produtoQuantidade[$value.PCAV_ID_PRODUTO_COMBINACAO_ATR].QTD_SOLICITADA|number_format}" />
												<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade-{$value.PCAV_ID_PRODUTO_COMBINACAO_ATR}" href="javascript:;">
													<span class="icone"></span>
												</a>
											</div>
											<div class="produtoVendido">{$produtoQuantidade[$value.PCAV_ID_PRODUTO_COMBINACAO_ATR].QTD_VENDIDA|number_format} vendido(s)</div>
										</div>
									</li>
									{/foreach}				
								</ul>
							</section>
						</div>
					</div>
				</section>
			</div>
			<script type="text/javascript" src="../lista-casamento/js/funcoes.js"></script>
			<script type="text/javascript" src="../lista-casamento/js/lista-de-casamento-produto-editar.js"></script>
			
		<!-- </div>

	
		
	</body>
</html>
 -->