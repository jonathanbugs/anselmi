<div id="footer">
	<div class="container">
		<!-- BUSCAR PRODUTO -->
		<div class="boxBuscarRodape">
			<form action="{$LINK}busca" method="get" name="buscaForm" id="buscaForm" class="buscaForm" lang="pt">
				<div class="holder">
					<label class="label" for="busca">Buscar por um produto, marca ou c&oacute;digo</label>
					<input class="input" type="text" id="busca" name="q" />
					<button type="submit" class="btSubmit"><span class="icone"></span></button>
				</div>
			</form>
		</div>
	</div>

	<!-- INFORMACOES DUVIDAS -->
	<div class="boxDuvidas">
		<div class="container">
			<div class="contentDuvidas">
				<div class="boxTextDuvidas">
					<div class="boxIcone circulo">
						<span class="icone"></span>
					</div>
					<span class="duvidasTxt">Est&aacute; com d&uacute;vidas?</span>
					<span class="respostasTxt">
						Encontre a resposta das d&uacute;vidas mais frequentes ou fale com um de nossos atendentes no chat-online.
					</span>
				</div>
				<a class="btDuvidas" href="{$LINK}duvidas-frequentes">
					<span class="txtBt1">Esclare&ccedil;a suas d&uacute;vidas</span>
					<span class="txtBt2">Clique Aqui</span>
				</a>
				<div class="boxTelefone">
					<div class="boxIcone boxLigue circulo">
						<span class="icone"></span>
					</div>
					<div class="boxInfos">
						<a class="infosTxt infosTxtFone" href="tel:{$contato.FoneLink}"><span>{$contato.DDD}</span> {$contato.Fone}</a>
						<span class="infosTxt">Segunda-feira &agrave; Sexta-feira das 8h &agrave;s 18h</span>
						<span class="infosTxt">S&aacute;bados das 8h &agrave;s 12h</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- INSTITUCIONAL RODAPE -->
	<div class="boxInstitucionalRodape">
		<div class="contentInstitucionalRodape clearfix">
			<div class="container">
				<div class="boxInstitucional clearfix">
					<div class="bloco">
						<ul class="institucionalUl">
							<li class="institucionalTitulo">Ajuda e Suporte</li>

							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}como-comprar">Como Comprar</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}duvidas-frequentes">D&uacute;vidas Frequentes</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}politica-de-privacidade">Pol&iacute;tica de Privacidade</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}trocas-e-devolucoes">Trocas e Devolu&ccedil;&otilde;es</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="javascript:;">Garantia</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="javascript:;">Mapa do site</a>
							</li>
							<!--li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}central-atendimento">Central de Atendimento</a>
							</li>
							
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}seguranca">Seguran&ccedil;a</a>
							</li-->
						</ul>
					</div>

					<div class="bloco">
						<ul class="institucionalUl">
							<li class="institucionalTitulo">Institucional</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}sobre-nos">Sobre a Anselmi</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="javascript:;">Servi&ccedil;os</a>
							</li>
							<li class="institucionalLi">
								<a class="institucionalLink" href="{$LINK}termos-uso">Termos de uso</a>
							</li>
						</ul>
					</div>

					<div class="bloco">
						<ul class="institucionalUl pagamentoUl">
							<li class="institucionalTitulo">Formas de Pagamento</li>

							<!-- PARA OCULTAR ALGUMA FORMA DE PAGAMENTO ADICIONAR A CLASSE "pagamentoLiInativo" -->
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeVisa ir">Visa</span>
							</li>
							<!--<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeElectron ir">Visa Electron</span>
							</li>-->
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeMastercard ir">Mastercard</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeDiners ir">Diners Club</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeAmerican ir">American Express</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeHipercard ir">Hipercard</span>
							</li>
						
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeItau ir">Itaú</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeBradesco ir">Bradesco</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeBancoBrasil ir">Banco do Brasil</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeBanrisul ir">Banrisul</span>
							</li>
							<!--<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeOi ir">Oi</span>
							</li>-->
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeBoleto ir">Boleto</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeBndes ir">BNDES</span>
							</li>
							<li class="pagamentoLi">
								<span class="pagamentoIcone pagamentoIconeCaixa ir">Construcard</span>
							</li>
						</ul>
					</div>

					<div class="bloco">
						<div class="institucionalUl lojaSegura">
							<span class="institucionalTitulo">Loja Segura</span>
							<!--div id="armored_website">
							    <param id="aw_preload" value="true" />
							</div>
							<script type="text/javascript" src="//selo.siteblindado.com/aw.js"></script-->
							<div id="sslblindado">
								<param id="sslblindado_preload" value="true" />
							</div>
							<script type="text/javascript" src="//selo.siteblindado.com/sslblindado.js"></script>

							<a href="http://www.ebit.com.br/comlines-revendedor-tramontina" class="icone iconeEbit ir" target="_blank">E-bit</a>
							<a href="http://www.buscape.com.br/ferramentas-buscape/loja-reconhecida-selo-ebit?aba=como-adquirir?id_emp=907728" class="icone iconeBuscape ir" target="_blank">Empresa Reconhecida Buscap&eacute;</a>
							<span class="icone iconeBondfaro ir">Empresa Reconhecida Bondfaro</span>
						</div>
					</div>
				</div>

				<!--div class="boxDadosEmpresa">{$assinaturaRodape}</div-->
			</div>
		</div>

		<a class="spr ir" href="http://www.spr.com.br" target="_blank">SPR</a>
	</div>


<!-- MODAL - COMPRA SEGURA 
<div id="modalLoaderActions">
	<img src="../img/backgrounds/loader_actions.gif">
</div>
-->
{if $idBTG}
<script src="//i.btg360.com.br/bs.js" type="text/javascript"></script>
<script type="text/javascript">
    try{
        __bsd["id"]="{$idBTG}";
        //__bsd["expiraCarrinho"]=30;
        //__bsd["expiraCarrinhoTempo"] = TEMPOEMMINUTOS;
       {if $sessao eq 'lista-produtos-categorias' or $sessao eq 'produto-detalhe'}
       bs.setaPagina("{$nome}","{$categoria}","{$categoria_sub}","{$categoria_sub_sub}","{$id_produto}","{$valor}","{$oferta}","{$disponibilidade}","{$outra_oferta}","{if $desc_oferta > 0}{$desc_oferta}% de desconto &agrave; vista.{/if}", "{$ean13}", "{$marca}");
       {/if}
       {if $idPessoa}
       bs.setaCliente("{$idPessoa}","{$email}");
       {/if}
       {if $sessao eq 'carrinho'}
       {foreach $listaProdutoCarrinho as $valueProdutoCarrinho}
	   bs.addProdutoCarrinho("{$valueProdutoCarrinho.PROD_ID_PRODUTO}","{$valueProdutoCarrinho.DESCRICAO_VENDA}","{$valueProdutoCarrinho.PRECO_UNITARIO_VENDA|number_format:2}", "", "{$valueProdutoCarrinho.QUANTIDADE|number_format}","{$valueProdutoCarrinho.DATA_INSERT}","{$categoriaProduto[$valueProdutoCarrinho.PROD_ID_PRODUTO][0].DESCRICAO_CATEGORIA}", "{$categoriaProduto[$valueProdutoCarrinho.PROD_ID_PRODUTO][1].DESCRICAO_CATEGORIA}", "{$categoriaProduto[$valueProdutoCarrinho.PROD_ID_PRODUTO][2].DESCRICAO_CATEGORIA}", "{$valueProdutoCarrinho.REFERENCIA|trim}", "Tramontina", "", "", "", "", "");
	   {/foreach}
       {/if}
       {if $nm_etapa}
       bs.setEtapaCarrinho("{$nm_etapa}","","","","","");
       {/if}
       {if $sessao eq 'checkout-confirmacao'}
       bs.finalizaCompra("{$valor_total}","{$frete}","{$dt_prevista_para_entrega}","{$metodo_de_pagamento}","{$banco1}","","{$cod_compra}","","","","","");
       {foreach $listaPedido as $valuePedido}
       bs.addProdutoComprado("{$cod_compra}","{$valuePedido.ID_PRODUTO}","{$valuePedido.DESCRICAO_VENDA}","{$valuePedido.PRECO_UNITARIO_VENDA|number_format:2}", "", "{$valuePedido.QUANTIDADE|number_format}","{$valuePedido.DATA_INSERT}", "{$categoriaProduto[$valuePedido.ID_PRODUTO][0].DESCRICAO_CATEGORIA}", "{$categoriaProduto[$valuePedido.ID_PRODUTO][1].DESCRICAO_CATEGORIA}", "{$categoriaProduto[$valuePedido.ID_PRODUTO][2].DESCRICAO_CATEGORIA}", "{$valuePedido.REFERENCIA|trim}", "Tramontina", "", "", "", "", "");
       {/foreach}
       {/if}
       {if $utm_source}
       __bsd['utms'] = {  "utm_source" : "{$utm_source}",
						  "utm_medium": "{$utm_medium}",
						  "utm_term": "{$utm_term}",
						  "utm_content": "{$utm_content}",
						  "utm_campaign": "{$utm_campaign}",
						  "utm_uid": "{$utm_uid}",
						  "utm_email": "{$utm_email}"
						};
		{/if}

    }catch(e){
    }
</script>
{/if}

<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '168311620023539',                        // App ID from the app dashboard
      //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {
     	return;
     }
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/pt_BR/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

{if $analytics}
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '{$analytics}']);
	_gaq.push(['_setDomainName', 'comlines.com.br']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
{/if}

{if $google_conversion_id}
<!-- Código do Google para tag de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = {$google_conversion_id};
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/{$google_conversion_id}/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
{/if}

{*literal}
<script type="text/javascript">
adroll_adv_id = "TFYOR57GNJCXNBOEWEUKA5";
adroll_pix_id = "P77RLKQKCBBQBG4J7TLM5Y";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>
{/literal*}

