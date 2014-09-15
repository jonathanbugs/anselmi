<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 14:55:10
         compiled from "templates\_rodape.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16480539b3afe6f5d10-72660589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15dd0f473a59f1a2f02661f409689d0a6598be32' => 
    array (
      0 => 'templates\\_rodape.tpl',
      1 => 1400779684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16480539b3afe6f5d10-72660589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contato' => 0,
    'idBTG' => 0,
    'sessao' => 1,
    'nome' => 1,
    'categoria' => 1,
    'categoria_sub' => 1,
    'categoria_sub_sub' => 1,
    'id_produto' => 1,
    'valor' => 1,
    'oferta' => 1,
    'disponibilidade' => 1,
    'outra_oferta' => 1,
    'desc_oferta' => 1,
    'ean13' => 1,
    'marca' => 1,
    'idPessoa' => 0,
    'email' => 0,
    'listaProdutoCarrinho' => 1,
    'valueProdutoCarrinho' => 1,
    'categoriaProduto' => 1,
    'nm_etapa' => 0,
    'valor_total' => 1,
    'frete' => 1,
    'dt_prevista_para_entrega' => 1,
    'metodo_de_pagamento' => 1,
    'banco1' => 1,
    'cod_compra' => 1,
    'listaPedido' => 1,
    'valuePedido' => 1,
    'utm_source' => 0,
    'utm_medium' => 0,
    'utm_term' => 0,
    'utm_content' => 0,
    'utm_campaign' => 0,
    'utm_uid' => 0,
    'utm_email' => 0,
    'analytics' => 0,
    'google_conversion_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539b3afe8c9592_64738748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b3afe8c9592_64738748')) {function content_539b3afe8c9592_64738748($_smarty_tpl) {?><div id="footer">
	<div class="container">

		<!-- INFORMACOES DUVIDAS -->
		<div class="boxDuvidas">
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
				<a class="btDuvidas" href="/duvidas-frequentes">
					<span class="txtBt1">Esclare&ccedil;a suas d&uacute;vidas</span>
					<span class="txtBt2">Clique Aqui</span>
				</a>
				<div class="boxTelefone">
					<div class="boxLigue circulo table">
						<div class="tableCell">
							<span class="txtLigue txtLigue1">ou</span>
							<span class="txtLigue">ligue</span>
						</div>
					</div>
					<div class="boxInfos">
						<a class="infosTxt infosTxtFone" href="tel:<?php echo $_smarty_tpl->tpl_vars['contato']->value['FoneLink'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['contato']->value['DDD'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['contato']->value['Fone'];?>
</a>
						<span class="infosTxt">de Segunda-feira &agrave;&nbsp; S&aacute;bado,</span>
						<span class="infosTxt">das 9h &agrave;s 18h</span>
					</div>
				</div>

			</div>
		</div>

		<!-- BUSCAR PRODUTO -->
		<div class="boxBuscarRodape">
			<form action="/busca" method="get" name="buscaForm" id="buscaForm" class="buscaForm" lang="pt">
				<div class="holder">
					<label class="label" for="busca">Buscar por um produto, marca ou c&oacute;digo</label>
					<input class="input" type="text" id="busca" name="q" />
					<button type="submit" class="btSubmit"><span class="icone"></span></button>
				</div>
			</form>
		</div>

		<!-- INSTITUCIONAL RODAPE -->
		<div class="boxInstitucionalRodape">
			<div class="contentInstitucionalRodape clearfix">
				<div class="boxInstitucional boxInstitucionalLeft">
					<ul class="institucionalUl">
						<li class="institucionalTitulo">Ajuda e Suporte</li>
						<li class="institucionalLi"><a class="institucionalLink" href="/duvidas-frequentes">D&uacute;vidas Frequentes</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="/central-atendimento">Central de Atendimento</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="/politica-de-privacidade">Pol&iacute;tica de Privacidade</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="/trocas-e-devolucoes">Trocas e Devolu&ccedil;&otilde;es</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="/seguranca">Seguran&ccedil;a</a></li>

						<!--<li class="institucionalLi"><a class="institucionalLink" href="javascript:;">Garantia</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="javascript:;">Mapa do site</a></li>-->
					</ul>

					<ul class="institucionalUl">
						<li class="institucionalTitulo">Institucional</li>
						<li class="institucionalLi"><a class="institucionalLink" href="/sobre-nos">Sobre a Comlines</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="/termos-uso">Termos de uso</a></li>
						<!--<li class="institucionalLi"><a class="institucionalLink" href="javascript:;">Neg&oacute;cios</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="javascript:;">Trabalhe Conosco</a></li>
						<li class="institucionalLi"><a class="institucionalLink" href="javascript:;">Termos de Uso</a></li>-->
					</ul>
				</div>
				<div class="boxInstitucional boxInstitucionalCentro">
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

					<div class="institucionalUl lojaSegura">
						<span class="institucionalTitulo">Loja Segura</span>
						<div id="armored_website">
						    <param id="aw_preload" value="true" />
						</div>
						<script type="text/javascript" src="//selo.siteblindado.com/aw.js"></script>
						<div id="sslblindado">
							<param id="sslblindado_preload" value="true" />
						</div>
						<script type="text/javascript" src="//selo.siteblindado.com/sslblindado.js"></script>

						<a href="http://www.ebit.com.br/comlines-revendedor-tramontina" class="icone iconeEbit ir" target="_blank">E-bit</a>
						<a href="http://www.buscape.com.br/ferramentas-buscape/loja-reconhecida-selo-ebit?aba=como-adquirir?id_emp=907728" class="icone iconeBuscape ir" target="_blank">Empresa Reconhecida Buscap&eacute;</a>
						<span class="icone iconeBondfaro ir">Empresa Reconhecida Bondfaro</span>
						
					</div>
				</div>

				<div class="boxFacebook">
					<div class="fb-like-box" data-href="https://www.facebook.com/ComlinesTramontina" data-width="232" data-height="325" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
				</div>

				<div class="boxDadosEmpresa">COMLINE'S COMERCIAL LTDA / CNPJ: 02.804.744/0001-94 / Endere&ccedil;o: BR-116, 2451, Km 237 - Novo Hamburgo/RS</div>
			</div>

			<a class="spr ir" href="http://www.spr.com.br" target="_blank">SPR</a>
		</div>
	</div>
</div>

<!-- MODAL - COMPRA SEGURA 
<div id="modalLoaderActions">
	<img src="../img/backgrounds/loader_actions.gif">
</div>
-->
<?php if ($_smarty_tpl->tpl_vars['idBTG']->value){?>
<script src="//i.btg360.com.br/bs.js" type="text/javascript"></script>
<script type="text/javascript">
    try{
        __bsd["id"]="<?php echo $_smarty_tpl->tpl_vars['idBTG']->value;?>
";
        //__bsd["expiraCarrinho"]=30;
        //__bsd["expiraCarrinhoTempo"] = TEMPOEMMINUTOS;
       <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-produtos-categorias'||$_smarty_tpl->tpl_vars['sessao']->value=='produto-detalhe'){?>
       bs.setaPagina("<?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['categoria_sub']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['categoria_sub_sub']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['id_produto']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['oferta']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['disponibilidade']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['outra_oferta']->value;?>
","<?php if ($_smarty_tpl->tpl_vars['desc_oferta']->value>0){?><?php echo $_smarty_tpl->tpl_vars['desc_oferta']->value;?>
% de desconto &agrave; vista.<?php }?>", "<?php echo $_smarty_tpl->tpl_vars['ean13']->value;?>
", "<?php echo $_smarty_tpl->tpl_vars['marca']->value;?>
");
       <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['idPessoa']->value){?>
       bs.setaCliente("<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
");
       <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='carrinho'){?>
       <?php  $_smarty_tpl->tpl_vars['valueProdutoCarrinho'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoCarrinho']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->key => $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value){
$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->_loop = true;
?>
	   bs.addProdutoCarrinho("<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PROD_ID_PRODUTO'];?>
","<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['DESCRICAO_VENDA'];?>
","<?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PRECO_UNITARIO_VENDA'],2);?>
", "", "<?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['QUANTIDADE']);?>
","<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['DATA_INSERT'];?>
","<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PROD_ID_PRODUTO']][0]['DESCRICAO_CATEGORIA'];?>
", "<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PROD_ID_PRODUTO']][1]['DESCRICAO_CATEGORIA'];?>
", "<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['PROD_ID_PRODUTO']][2]['DESCRICAO_CATEGORIA'];?>
", "<?php echo trim($_smarty_tpl->tpl_vars['valueProdutoCarrinho']->value['REFERENCIA']);?>
", "Tramontina", "", "", "", "", "");
	   <?php } ?>
       <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['nm_etapa']->value){?>
       bs.setEtapaCarrinho("<?php echo $_smarty_tpl->tpl_vars['nm_etapa']->value;?>
","","","","","");
       <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='checkout-confirmacao'){?>
       bs.finalizaCompra("<?php echo $_smarty_tpl->tpl_vars['valor_total']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['frete']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['dt_prevista_para_entrega']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['metodo_de_pagamento']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['banco1']->value;?>
","","<?php echo $_smarty_tpl->tpl_vars['cod_compra']->value;?>
","","","","","");
       <?php  $_smarty_tpl->tpl_vars['valuePedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedido']->key => $_smarty_tpl->tpl_vars['valuePedido']->value){
$_smarty_tpl->tpl_vars['valuePedido']->_loop = true;
?>
       bs.addProdutoComprado("<?php echo $_smarty_tpl->tpl_vars['cod_compra']->value;?>
","<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['ID_PRODUTO'];?>
","<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['DESCRICAO_VENDA'];?>
","<?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['PRECO_UNITARIO_VENDA'],2);?>
", "", "<?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['QUANTIDADE']);?>
","<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['DATA_INSERT'];?>
", "<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valuePedido']->value['ID_PRODUTO']][0]['DESCRICAO_CATEGORIA'];?>
", "<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valuePedido']->value['ID_PRODUTO']][1]['DESCRICAO_CATEGORIA'];?>
", "<?php echo $_smarty_tpl->tpl_vars['categoriaProduto']->value[$_smarty_tpl->tpl_vars['valuePedido']->value['ID_PRODUTO']][2]['DESCRICAO_CATEGORIA'];?>
", "<?php echo trim($_smarty_tpl->tpl_vars['valuePedido']->value['REFERENCIA']);?>
", "Tramontina", "", "", "", "", "");
       <?php } ?>
       <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['utm_source']->value){?>
       __bsd['utms'] = {  "utm_source" : "<?php echo $_smarty_tpl->tpl_vars['utm_source']->value;?>
",
						  "utm_medium": "<?php echo $_smarty_tpl->tpl_vars['utm_medium']->value;?>
",
						  "utm_term": "<?php echo $_smarty_tpl->tpl_vars['utm_term']->value;?>
",
						  "utm_content": "<?php echo $_smarty_tpl->tpl_vars['utm_content']->value;?>
",
						  "utm_campaign": "<?php echo $_smarty_tpl->tpl_vars['utm_campaign']->value;?>
",
						  "utm_uid": "<?php echo $_smarty_tpl->tpl_vars['utm_uid']->value;?>
",
						  "utm_email": "<?php echo $_smarty_tpl->tpl_vars['utm_email']->value;?>
"
						};
		<?php }?>

    }catch(e){
    }
</script>
<?php }?>

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

<?php if ($_smarty_tpl->tpl_vars['analytics']->value){?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['analytics']->value;?>
']);
	_gaq.push(['_setDomainName', 'comlines.com.br']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['google_conversion_id']->value){?>
<!-- Código do Google para tag de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = <?php echo $_smarty_tpl->tpl_vars['google_conversion_id']->value;?>
;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/<?php echo $_smarty_tpl->tpl_vars['google_conversion_id']->value;?>
/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }?>



<?php }} ?>