<!-- JS FACEBOOK LIKE BUTTON 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=168311620023539";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
{if $idListaCasamento}
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	{include file="../lista-casamento/includes/topo.tpl"}
{/if}
<div class="container">
	<div id="produtosContent" class="clearfix">
		
		<!-- NAVEGACAO -->
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="{$BASE_DIR}">Inicial</a>
					{if !$idListaCasamento}
					{foreach $navegacaoCategoria as $valueNavegacaoCategoria}
						{if $valueNavegacaoCategoria@iteration eq $countCategorias}
						{break}
						{/if}
						/ <a class="navegacaoLink" href="{$valueNavegacaoCategoria.URL_AMIGAVEL}">{$valueNavegacaoCategoria.DESCRICAO_CATEGORIA}</a>
					{/foreach}
					{/if}
				</li>
			</ul>
			<span class="tituloCategoria">{$descricaoVenda}</span>
			<span class="referencia">REF {$referencia}</span>
		</div>

		<!-- DETALHE DO PRODUTO -->
		<div id="infoPrincipalProduto" class="clearfix">

			<!-- GALERIA PRODUTO -->
			<div id="galeriaProduto">
				<span class="boxProdutoSelo">
					{if $tipoPromocao eq 'P' and $valorPromocao > 0}
					<span class="produtoSelo produtoSeloPorcentagem"><span>{$valorPromocao|number_format}%</span>off</span>
					{/if}
					{if $lancamento eq 'S'}
					<span class="produtoSelo produtoSeloNovo">Novo</span>
					{/if}
				</span>
				<div class="imagemAmpliada">
					<a class="{$zoomImagem}" href="{if $zoomImagem neq ''}{$MIDIA_DIR}produtos/original/{$imagemPrincipal}{else}javascript:;{/if}" title="titulo">
						<img src="{$MIDIA_DIR}produtos/detalhe/{$imagemPrincipal}" alt="" />
					</a>
				</div>
				{if $countImagensProduto > 1}
				<div class="thumbsGaleria">
					<ul class="thumbsGaleriaUl">
						{foreach $listaImagensProduto as $valueImagensProduto}
						<li>
							<a href="javascript:;" title="" data-tipo="foto"  data-src="{$MIDIA_DIR}produtos/detalhe/{$valueImagensProduto.IMAGEM}" data-zoom="{$MIDIA_DIR}produtos/original/{$valueImagensProduto.IMAGEM}">
								<img src="{$MIDIA_DIR}produtos/carrinho-de-compras/{$valueImagensProduto.IMAGEM}" width="76px" height="76px" alt="" />
							</a>
						</li>
						{/foreach}
						<!--<li>
							<a href="javascript:;" title="" data-tipo="video" data-src="http://www.youtube.com/embed/z540gKVqypY">
								<img src="{$MIDIA_DIR}produtos/detalhe/thumb-produto.jpg" alt="" />
								<span class="iconPlayer ir">Assistir V&iacute;deo</span>
							</a>
						</li>-->
						
					</ul>
				</div>
				{/if}
			</div>

			<div id="infosProduto">
				<div class="infoGeralProduto">
					<h2 class="tituloProduto">{$descricaoVenda}</h2>
					<span class="referenciaProduto">REF: {$referencia}</span>
					{if $idProdutoNivelAuxiliar}
					<a class="linkLinha" href="/{$urlAmigavelPnaux}">+ LINHA {$descricaoProdutoNivelAuxiliar}</a>
					{/if}
					<!--a class="linkMaisDetalhes" href="javascript:scrollAnimate('#infosDetalhadasProduto', 2000);" title="+ ver mais detalhes sobre este produto">+ ver mais detalhes sobre este produto</a-->
					
					<div class="mediaAvaliacaoProduto clearfix" style="display:none;">
						<ul class="mediaAvaliacaoProdutoUl">
							<li class="ir ok">1</li>
							<li class="ir ok">2</li>
							<li class="ir ok">3</li>
							<li class="ir ok">4</li>
							<li class="ir">5</li>
						</ul>

						<ul class="ResumoMediaAvaliacao">
							<li class="ResumoMediaAvaliacaoLi">
								<a href="javascript:;" class="btResumoMediaAvaliacao"></a>

								<div class="dropDownResumoMediaAvaliacao">
									<span class="tituloTotalAvaliacoes">Total de 13 avalia&ccedil;&otilde;es</span>

									<ul>
										<li>
											<span class="qtdeEstrelas">5 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 80px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">4 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 30px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">3 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 10px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">2 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 5px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">1 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 20px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
									</ul>
								</div>
							</li>
						</ul>					
					</div>

					<!--<a class="linkAvaliarProduto linkModal" href="#modalAvalieProduto" title="Avaliar este produto">Avaliar este produto</a>-->
					
					{if $precoPromocional > 0}
					<!--span class="valorEconomia">Economize R$ {$valorEconomize|number_format:2:",":"."}</span-->
					{/if}
					<!--span class="valorDePor">
						{if $precoPromocional > 0}
							<del>De R$ {$precoVenda|number_format:2:",":"."}</del> 
							<ins>por R$ {$precoPromocional|number_format:2:",":"."}</ins>
						{else}
							<ins>R$ {$precoVenda|number_format:2:",":"."}</ins>
						{/if}
					</span-->


					<div class="blocoOpcpes">
						<div class="tituloOpcoes">Tamanhos</div>
						<ul class="listaOpcoes clearfix">
							{foreach $arrayAtributos[$idCor] as $valueAtributo}
							<li>
								<a href="#{$valueAtributo.VALOR_ATRIBUTO}" onClick="document.getElementById('idProdutoComprar').value={$valueAtributo.PRCO_ID_PRODUTO_COMBINACAO}">{$valueAtributo.VALOR_ATRIBUTO}</a>
							</li>
							{/foreach}
						</ul>
					</div>


					
					<!-- VARIACAO CASO FOR ATACADO -->
					<div class="blocoOpcpes">
						<div class="tituloOpcoes">Tamanhos</div>
						<p class="descricaoOpcoes">Insira a quantidade desejada de cada tamanho</p>
						
						<form id="quantidadeTamanhos" method="" action="">
							<ul class="listaOpcoes listaOpcoesAtacado clearfix">
								<li>
									<span class="tamanho">PP</span>
									<input class="inputTamanho" type="text" name="" id="" value="14" />
								</li>
								<li>
									<span class="tamanho">PP</span>
									<input class="inputTamanho" type="text" name="" id="" value="0" />
								</li>
								<li>
									<span class="tamanho">PP</span>
									<input class="inputTamanho" type="text" name="" id="" value="24" />
								</li>
								<li>
									<span class="tamanho">PP</span>
									<input class="inputTamanho" type="text" name="" id="" value="5" />
								</li>
								<li>
									<span class="tamanho">PP</span>
									<div class="esgotado">
										<span>esgo</span>
										<span>tado</span>
									</div>
								</li>
							</ul>
						</form>


						<!--ul class="listaOpcoes listaOpcoesAtacado clearfix">
							{foreach $arrayAtributos[$idCor] as $valueAtributo}
							<li>
								<a href="#{$valueAtributo.VALOR_ATRIBUTO}" onClick="document.getElementById('idProdutoComprar').value={$valueAtributo.PRCO_ID_PRODUTO_COMBINACAO}">{$valueAtributo.VALOR_ATRIBUTO}</a>
							</li>
							{/foreach}
						</ul-->
					</div>


					<div class="blocoOpcpes">
						<div class="tituloOpcoes">Cores</div>
						<ul class="listaOpcoes clearfix">
							<li>
								<a href="javascript:;">
									<span class="cor" style="background-color: #395384"></span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="cor" style="background-color: #2c7c63"></span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="cor" style="background-color: #d71d3b"></span>
								</a>
							</li>
						</ul>
					</div>

					<div class="blocoInformacoes">
						<ul class="links clearfix">
							<li>
								<a href="{$LINK}lista-desejos&addProduto=true&idProduto={$idProdutoCombinacao}" title="Adicionar a lista de desejos">	Adicionar a lista de desejos
								</a>
							</li>
							<li>
								<a class="linkTodasAvaliacoes" href="javascript:;" title="+ Veja todas as avalia&ccedil;&otilde;es">
									+ Veja todas as avalia&ccedil;&otilde;es
								</a>
							</li>
						</ul>

						<div class="bloco clearfix">
							<div class="blocoQuantidade">
								<li>
									<a href="javascript:;">
										<span class="icone icon_minus-06"></span>
									</a>
								</li>
								<li>
									<a class="quantidade" href="javascript:;">
										1
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<span class="icone icon_plus"></span>
									</a>
								</li>
							</div>

							<div class="infos">
								<div class="bloco clearfix">
									<div class="valor">
										<span class="valorDePor">
											{if $precoPromocional > 0}
												<del>De R$ {$precoVenda|number_format:2:",":"."}</del> 
												<ins>por R$ {$precoPromocional|number_format:2:",":"."}</ins>
											{else}
												<ins>R$ {$precoVenda|number_format:2:",":"."}</ins>
											{/if}
										</span>

										{if $precoPromocional > 0}
											{$precoPromocional|valor_parcelado:false}
										{else}
											{$precoVenda|valor_parcelado:false}
										{/if}
										
										{if $descontoBoleto > 0}
										<span class="valorVista">
											<strong>ou R$ {$precoNoBoleto|number_format:2:",":"."}</strong>
											<span>no boleto ou transfer&ecirc;ncia banc&aacute;ria</span>
											<span>({$descontoBoleto}% de desconto)</span>
										</span>
										{/if}
									</div>
								</div>

								<a class="btn" href="javascript:fnComprarProduto($('#idProdutoComprar').val(), 'true');" title="Comprar">
									Comprar
								</a>
								<a class="btn" href="javascript:fnComprarProduto($('#idProdutoComprar').val(), 'false');" title="">	Adicionar ao Carrinho e continuar comprando
								</a>
							</div>
						</div>
						
					</div>

					<!--select name="corProduto" id="corProduto" onchange="location = this.options[this.selectedIndex].value;">
					{foreach $arrayAtributos as $valueCor}
						<option {if $valueCor[0].ID_COR eq $idCor}selected="selected"{/if} value="/{$valueCor[0].URL_AMIGAVEL}-{$valueCor[0].URL_ATRIBUTO}.html">{$valueCor[0].VALOR_COR}</option>
					{/foreach}
					</select-->

					{*$arrayAtributos[$idCor][0].DESCRICAO_ATRIBUTO*}
					

					{*if $precoPromocional > 0}
						{$precoPromocional|valor_parcelado:false}
					{else}
						{$precoVenda|valor_parcelado:false}
					{/if*}

					<!--div class="opcoesParcelamento">
						<ul>
							<li>
								<a class="btOpcoesParcelas" href="javascript:;" title="Outras op&ccedil;&otilde;es de parcelamento">
									<span>Outras op&ccedil;&otilde;es de parcelamento</span>
								</a>
								
								<div>								
									<span class="tt">Nos cart&otilde;es:</span>
									<ul class="listaParcelamento">
										<li class="ir visa">Visa</li>
										<li class="ir masterCard">Master Card</li>
										<li class="ir dinersClubInternational">Diners Club International</li>
										<li class="ir americanExpress">American Express</li>
										<li class="ir hipercard">Hipercard</li>
									</ul>

									<span class="tt">em:</span>
									<ul class="listaParcelaseValores clearfix">
										
										<li class="col col1">
											<ul>
												{for $foo=1 to $parcelamento max=$colunasParcelamento}
													<li>{if $foo < 10}0{/if}{$foo}x de R$ {($precoFinalVenda/$foo)|number_format:2:",":"."} sem juros</li>
												{/for}
											</ul>	
										</li>
										{if $colunasParcelamento > 1}
											<li class="col col2">
												<ul>
													{for $foo=$colunasParcelamento+1 to $parcelamento max=12}
														<li>{if $foo < 10}0{/if}{$foo}x de R$ {($precoFinalVenda/$foo)|number_format:2:",":"."} sem juros</li>
													{/for}
												</ul>	
											</li>
										{/if}
									</ul>
								</div>
							</li>
						</ul>
					</div-->
					
					{*if $descontoBoleto > 0}
					<!--span class="valorVista">
						<strong>ou R$ {$precoNoBoleto|number_format:2:",":"."}</strong>
						<span>no boleto ou transfer&ecirc;ncia banc&aacute;ria</span>
						<span>({$descontoBoleto}% de desconto)</span>
					</span-->
					{/if*}
				

				</div>
				<div class="acoesProduto">
					<div id="armored_website_02">
					    <param id="aw_preload" value="true" />
					</div>
					<script type="text/javascript" src="//selo.siteblindado.com/aw.js"></script>
					
					<span class="linkCompraSegura linkModal" title="Compra 100% segura Comlines">Compra 100% segura Comlines</span>

					<!-- <a class="linkCompraSegura linkModal" href="#modalCompraSegura" title="Compra 100% segura Comlines">Compra 100% segura Comlines</a> -->

					{if $saldo > 0}<span class="disponibilidadeProduto">Dispon&iacute;vel para envio imediato</span>{/if}

					{if $saldo eq 1}<span class="restamPoucos">Resta apenas {$saldo} item.</span>{elseif $saldo <= 5 and $saldo > 0}<span class="restamPoucos">Restam apenas {$saldo} itens.</span>{/if}
					
					<input type="text" value="{$idProdutoCombinacao}" name="idProdutoComprar" id="idProdutoComprar" />

					
					<!--ul class="AdicionarListasUl">
						<li>
							<a class="btAdicionarListaCasamento" href="javascript:fnAdicionaListaCasamento('{$idPessoa}', '{$idProdutoCombinacao}','{$urlAmigavel}');" title="Adicionar a lista de casamento">Adicionar a lista de casamento</a>
						</li>
						<li>
							<a class="btAdicionarListaDesejos" href="{$LINK}lista-desejos&addProduto=true&idProduto={$idProdutoCombinacao}" title="Adicionar a lista de desejos">Adicionar a lista de desejos</a>
						</li>
					</ul-->
				</div>
				

				<div class="consultaPrazoEntrega" style="display:none;">
					<div class="blocoConsulta">
						<span class="tituloConsultePrazoEntrega">Consulte a previs&atilde;o de entrega e valor do frete:</span>

						<form id="formConsultaPrazoEntrega" method="" action="">
							<input type="text" id="iptConsultaCep" name="iptConsultaCep" maxlength="8" />
							<input type="button" id="btConsultar" value="Calcular" /> 
							<a class="linkNaoSabeCep linkModal" target="_blank" href="http://www.buscacep.correios.com.br/" title="N&atilde;o sabe seu CEP?">N&atilde;o sabe seu CEP?</a><!--#modalConsultarCep-->
						</form>
					</div>
					<div class="blocoConsultaLoader"><img src="../img/backgrounds/loader_actions.gif"></div>
					<div class="blocoResultadoConsulta">
						
						<!--<span class="statusProdutoCep">Produto em estoque</span>-->
					</div>
				</div>
			</div>
		</div>

		<div id="compartilheProduto">
			<span class="tituloCompartilhe">Gostou? Compartilhe!</span>

			<ul class="btsRedesSociais">
				<li>
					<div class="fb-like" data-href="{$urlAtual}" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://loja.comlines.com.br">Tweet</a>
					<script>!function(d,s,id){ var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){ js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</li>

				<!-- <li>
					<a href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
					<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
				</li> -->

				<!--<li>
					<a class="btEnvieAmigo linkModal" href="#modalEnviarAmigo" title=""><span>Envie para um amigo</span></a>
				</li>-->
			</ul>
		</div>

		{if count($listaProdutoSite) > 0}
		<div id="moduloCompreJunto">
			<span class="tituloModulo">Aproveite e Compre Junto</span>
			
			<a class="ir btModuloSlideAnterior" href="javascript:;" title="slide anterior">slide anterior</a>
			<a class="ir btModuloSlideProximo" href="javascript:;" title="pr&oacute;ximo slide">pr&oacute;ximo slide</a>

			
			<div class="slideCompreJunto">
				{include file="../templates/includes/_produtos.tpl"}
			</div>

		</div>
		{/if}

		<div id="infosDetalhadasProduto">
			<ul class="menuAbasProduto">
				<li class="selected">
					<a href="javascript:;" title="Detalhes sobre o Produto">
						Detalhes sobre o Produto
					</a>
				</li>
				<li>
					<a href="javascript:;" title="Detalhes sobre o Produto">
						Descri&ccedil;&atilde;o Geral / Orienta&ccedil;&otilde;es
					</a>
				</li>
				<!--<li>
					<a href="javascript:;" title="Avalia&ccedil;&otilde;es deste produto">
						Avalia&ccedil;&otilde;es deste produto
					</a>
				</li>-->
			</ul>

			<div class="conteudoAbasProduto">
				<div class="aba aba1 cmsLoja">
					{$descricaoCurta}
					<br><br>*as imagens s&atilde;o meramente ilustrativas e n&atilde;o se referem ao tamanho e quantidade do produto.
				</div>
				{if $descricaoLonga}
				<div class="aba aba2 cmsLoja">
					{$descricaoLonga}
				</div>
				{/if}
				<!--
				<div class="aba aba3">
					<div class="topo-aba3">
						<div class="avaliacaoGeral">
							<span class="titulo">Avalia&ccedil;&atilde;o Geral</span>
							<ul class="mediaGeral">
								<li class="ir ok">1</li>
								<li class="ir ok">2</li>
								<li class="ir ok">3</li>
								<li class="ir">4</li>
								<li class="ir">5</li>
							</ul>
							<span class="totalAvaliacoes">Total de 8 Avalia&ccedil;&otilde;es</span>
						</div>

						<div class="avalieProduto">
							<span class="titulo">J&aacute; tem este produto?</span>
							<span class="chamada">Compartilhe sua opini&atilde;o com a gente.</span>
							<a href="#modalAvalieProduto" class="btAvaliarProduto linkModal" title="Avaliar Produto">Avaliar Produto</a>
						</div>
					</div>

					<div class="detalheAvaliacoes">
						<ul>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>							
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
						</ul>
					</div>

				</div>-->

			</div>
			<a href="javascript:;" class="btVoltarTopo" title="voltar ao topo">Voltar ao topo</a>
		</div>
	</div>
</div>


<!-- MODAL - FEEDBACK AVALIACAO ENVIADA -->
<div id="modalFeedbackAvaliacao" class="modal">
	<span class="ttModal">Obrigado pela sua opini&atilde;o!</span>
	<p>
		Sua avalia&ccedil;&atilde;o passar&aacute; por uma aprova&ccedil;&atilde;o. <br/>
		Caso seja aceita, pode levar de 3 a 5 dias &uacute;teis para aparecer no site.
	</p>
</div>

<!-- MODAL - AVALIE ESTE PRODUTO -->
<div id="modalAvalieProduto" class="modal">
	<div class="divModal">
		<span class="ttModal">Avalie este produto</span>
		<p>
			Diga o que voc&ecirc; achou deste produto e ajude outras pessoas a fazerem a escolha certa.
		</p>
		
		<form id="formAvalieProduto" action="" method="">
			<ul class="ulForm">
				<li>
					<span class="ttCampo">Sua avalia&ccedil;&atilde;o</span>
					<ul class="avalieNotas">
						<li><a href="javascript:;" class="ir">1</a></li>
						<li><a href="javascript:;" class="ir">2</a></li>
						<li><a href="javascript:;" class="ir">3</a></li>
						<li><a href="javascript:;" class="ir">4</a></li>
						<li><a href="javascript:;" class="ir">5</a></li>
					</ul>
				</li>

				<li>
					<label class="ttCampo" for="iptTituloAvaliacao">T&iacute;tulo</label>
					<input type="text" name="iptTituloAvaliacao" id="iptTituloAvaliacao" />
				</li>

				<li>
					<label class="ttCampo" for="txtAreaAvaliacao">Avalia&ccedil;&atilde;o</label>
					<textarea type="text" name="txtAreaAvaliacao" id="txtAreaAvaliacao"></textarea>

				</li>

				<li>
					<label id="labelConcordoAvaliacao">
						<input type="checkbox" name="checkConcordoAvaliacao" id="checkConcordoAvaliacao" />
						<span class="ttConcordoAvaliacao">concordo com a pol&iacute;tica de avalia&ccedil;&atilde;o</span>
					</label>
				</li>

				<li class="last">
					<input type="submit" id="btSubmit" value="Enviar Avalia&ccedil;&atilde;o" />
				</li>
			</ul>
		</form>
	</div>
	<div class="msgSucessoModal">
		<span class="ttModal">Obrigado pela sua opini&atilde;o!</span>
		<p>
			Sua avalia&ccedil;&atilde;o passar&aacute; por uma aprova&ccedil;&atilde;o. <br/>
			Caso seja aceita, pode levar de 3 a 5 dias &uacute;teis para aparecer no site.
		</p>
	</div>

</div>

<!-- MODAL - ENVIAR AMIGO-->
<div id="modalEnviarAmigo" class="modal">
		<span class="ttModal">Enviar para um amigo</span>
		<p>Achou este produto a cara do seu amigo? Ent&atilde;o envie o link para ele conhecer o produto.</p>

		<form id="formEnviarAmigo" action="" method="">
			<ul class="ulForm ulFormInfosAmigo">
				<li>
					<label for="iptNomeAmigo">Nome do amigo</label>
					<input type="text" name="iptNomeAmigo" id="iptNomeAmigo" />
				</li>
				<li>
					<label for="iptEmailAmigo">E-mail do amigo</label>
					<input type="text" name="iptEmailAmigo" id="iptEmailAmigo" />
				</li>
				<li class="liMensagemAmigo">
					<label for="textAreaMensagemAmigo">Mensagem</label>
					<textarea id="textAreaMensagem"></textarea>
				</li>
			</ul>

			<ul class="ulFormSuasInfos">
				<li>
					<label for="iptSeuNome">Seu nome</label>
					<input type="text" name="iptSeuNome" id="iptSeuNome" />
				</li>
				<li>
					<label for="iptSeuEmail">Seu e-mail</label>
					<input type="text" name="iptSeuEmail" id="iptSeuEmail" />
				</li>
			</ul>

			<input type="submit" id="btEnviarAmigo" value="Enviar" />
		</form>
</div>

<!-- MODAL - CONSULTAR CEP-->
<div id="modalConsultarCep" class="modal">
	<span class="ttModal">Consulta de CEP</span>

	<div class="blocoConsulta">
		<div class="erroCepNaoEncontrado divErroForm">
			<span class="ttErro">CEP n&atilde;o encontrado. Tente Outro Endere&ccedil;o!</span>
			<p>
				N&atilde;o encontramos nenhum CEP referente ao endere&ccedil;o: <br/>
				Rua Juiz de Fora, S&atilde;o Leopoldo / RS
			</p>
		</div>

		<p>Para saber seu CEP,  informe seu endere&ccedil;o:</p>

		<form id="formConsultaCep" action="" method="">
			<ul class="ulForm">
				<li>
					<label for="iptRua">Endere&ccedil;o:<label>

					<div class="divSelectRua divSelectPersonalizado">
						<select id="selectRua" name="selectRua">
							<option>Rua</option>
						</select>
					</div>

					<input type="text" name="iptRua" id="iptRua" />
				</li>
				
				<li>
					<label for="iptCidade">Cidade:</label>
					<input type="text" name="iptCidade" id="iptCidade" />
				</li>
				
				<li>
					<label for="selectEstado">Estado:</label>
					<div class="divSelectEstado divSelectPersonalizado">
						<select id="selectEstado" name="selectEstado">
							<option>Selecione</option>
						</select>
					</div>
				</li>
				
				<li class="liBotaoConsulta">
					<input type="submit" id="btConsultarCep" value="Consultar CEP" />
				</li>
			</ul>
		</form>

	</div>

	<div class="blocoResultadoConsulta">
		<p>O CEP referente ao endere�o informado �:</p>
		<div class="resultadoCep">
			<span class="cep">93145-210</span>
			<span class="endereco">Rua Ju�z de Fora, S�o Leopoldo / RS</span>
		</div>

		<a class="btCalcularEntregaCep" title="Calcular" href="javascript:;">Calcular frete com este CEP</a>

		<a class="btConsultarOutroCep" title="Consultar outro CEP" href="javascript:;">Consultar outro CEP</a>	
	</div>
</div>

<!-- MODAL - COMPRA SEGURA -->
<div id="modalCompraSegura" class="modal">
	<span class="ttModal">Compra 100% Segura Comlines</span>
</div>
<!-- <a href="#modalListaCasamento" class="linkModal">asasas</a> -->

<!-- MODAL LISTA CASAMENTO -->
<div id="modalListaCasamento">
	<div id="modalContent">
		<a id="modalFechar" class="ir" href="javascript:fnFechaModalListaCasamento('N');">
			Fechar Modal
			<span class="icone"></span>
		</a>

		<span class="modalTitulo">
			<span>Produto adicionado a lista<br>
			de casamento com sucesso!</span>
		</span>
		<div class="modalProduto table">
			<div class="table-cell">
				<img class="produtoImagem" src="{$MIDIA_DIR}produtos/listagem/{$imagemPrincipal}" alt="{$descricaoVenda}" />
				<div class="produtoInformacoes">
					<span class="produtoTitulo">{$descricaoVenda}</span>
					<span class="produtoValor">
						{if $precoPromocional > 0}
							R$ {$precoPromocional|number_format:2:",":"."}
						{else}
							R$ {$precoVenda|number_format:2:",":"."}
						{/if}

						<div class="centerQuantidade clearfix">
							<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade" href="javascript:;">
								<span class="icone"></span>
							</a>
							<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto" value="{$qtdSolicitadaListaCasamento|number_format}" />
							<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade" href="javascript:;">
								<span class="icone"></span>
							</a>
						</div>
					
					</span>
				</div>
				<a title="Close" class="modalBt modalBtContinuar" href="javascript:fnFechaModalListaCasamento('{$valueNavegacaoCategoria.URL_AMIGAVEL}');">Adicionar mais produtos
					<span class="btIcone"></span>
				</a>
				<a class="modalBt modalBtIr" href="/lista-de-casamento-editar-produtos/">
					Ir para a Lista
					<span class="btIcone"></span>
				</a>
			</div>
		</div>
	</div>
</div>

