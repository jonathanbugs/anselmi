<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 14:55:09
         compiled from "templates\_topo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2292539b3afdd552d9-81023221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c978e7058bbea607bb939a52d9db2bd8111128e0' => 
    array (
      0 => 'templates\\_topo.tpl',
      1 => 1400531474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2292539b3afdd552d9-81023221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contato' => 0,
    'BASE_DIR' => 0,
    'title' => 0,
    'nomeCliente' => 0,
    'urlAtual' => 0,
    'sessao' => 1,
    'quantidadeTotalCarrinhoTopo' => 1,
    'listaProdutoCarrinhoTopo' => 1,
    'valueProdutoCarrinhoTopo' => 1,
    'MIDIA_DIR' => 1,
    'precoTotalVendaCarrinhoTopo' => 1,
    'nomeConjuge1' => 1,
    'idListaCasamento' => 1,
    'menuTopo' => 1,
    'minhaIdListaCasamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539b3afde56be7_38551639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b3afde56be7_38551639')) {function content_539b3afde56be7_38551639($_smarty_tpl) {?><div id="header">
	<div class="container">
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
			<ul class="linksUl linksLeftUl clearfix">
				<li class="linksLi icone iconeFone">
					<span class="table linksTable">
						<span class="tableCell">
							<span class="linksTxt linksTxtFone"><?php echo $_smarty_tpl->tpl_vars['contato']->value['DDD'];?>
 <?php echo $_smarty_tpl->tpl_vars['contato']->value['Fone'];?>
</span>
							<span class="linksTxt linksTxtDias">Seg. &agrave; Sab. das 9:00 &agrave;s 18:00h</span>
						</span>
					</span>
				</li>
				<li class="linksLi icone iconeCentral">
					<a class="table linksTable" href="/central-atendimento">
						<span class="tableCell">
							<span class="linksTxt">Central de Atendimento</span>
						</span>
					</a>
				</li>
				<li class="linksLi icone iconeChat">
					<a class="table linksTable" href="mailto:<?php echo $_smarty_tpl->tpl_vars['contato']->value['Email'];?>
">
						<span class="tableCell">
							<span class="linksTxt"><?php echo $_smarty_tpl->tpl_vars['contato']->value['Email'];?>
</span>
						</span>
					</a>
				</li>
				<!-- <li class="linksLi icone iconeChat">
					<a class="table linksTable" href="https://comlines.webchatlw.com.br/clients/emailContact/0" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=600'); return false;">
						<span class="tableCell">
							<span class="linksTxt">Chat</span>
						</span>
					</a>
				</li> -->
			</ul>
			<ul class="linksUl linksRightUl clearfix">
				<li class="linksLi icone iconePedidos">
					<a class="table linksTable" href="/meus-pedidos" >
						<span class="tableCell">
							<span class="linksTxt">Meus Pedidos</span>
						</span>
					</a>
				</li>
				
				<li class="linksLi icone iconeCasamento">
					<a class="table linksTable" href="/lista-de-casamento">
						<span class="tableCell">
							<span class="linksTxt">Lista de Casamento</span>
						</span>
					</a>
				</li>
				<li class="linksLi icone iconeDesejos">
					<a class="table linksTable" href="/lista-desejos">
						<span class="tableCell">
							<span class="linksTxt">Lista de Desejos</span>
						</span>
					</a>
				</li>
			</ul>			
		</div>
		<div class="topoCategorias">
			<div class="contentTopoCategorias">
				<div class="topoBloco clearfix">
					<h1 id="boxLogo"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
" class="logo ir"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></h1>
					<div class="topoRevendedor">
						<span class="logoRevedendor"></span>
					</div>

					<div class="topoBuscaCarrinho">
						<span class="topoIdentificacao">
							<?php if ($_smarty_tpl->tpl_vars['nomeCliente']->value){?>
								Ol&aacute; <?php echo $_smarty_tpl->tpl_vars['nomeCliente']->value;?>
!
								<a href="/logar/?redirect=<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
&acao=logout" class="topoIdentificacaoLink">N&atilde;o &eacute; voc&ecirc;?</a>
							<?php }else{ ?>
								Ol&aacute; visitante,
								<a href="/logar/?redirect=<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
" class="topoIdentificacaoLink">fa&ccedil;a login</a>
								ou
								<a href="/logar/?redirect=<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
" class="topoIdentificacaoLink">cadastre-se</a>
							<?php }?>
						</span>
						<div class="buscaTopo">
							<form action="/busca" method="get" name="buscaForm" class="buscaForm" lang="pt">
								<div class="holder">
									<label class="label" for="buscaTopo">Buscar por um produto, marca ou c&oacute;digo</label>
									<input class="input" type="text" id="buscaTopo" name="q" />
									<button type="submit" class="btSubmit"><span class="icone"></span></button>
								</div>
							</form>
						</div>

						<!-- CARRINHO DE COMPRAS -->
						<div class="topoCarrinho">
							<?php if ($_smarty_tpl->tpl_vars['sessao']->value!='topo-carrinho'){?>
							<ul class="produtosCarrinhoUl" id="produtosCarrinhoUl">
								<li class="produtosCarrinhoLi">
									<a class="produtosCarrinhoLink" href="/carrinho">
										<span class="carrinhoIcon"></span>
										<span class="carrinhoTxt">Meu Carrinho</span>
										<span class="carrinhoItens">(<?php echo $_smarty_tpl->tpl_vars['quantidadeTotalCarrinhoTopo']->value;?>
 itens)</span>
									</a>
									<ul class="carrinhoUl">
										<li>
											<ul class="carrinhoItensUl scroll">
												<?php  $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoCarrinhoTopo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->key => $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value){
$_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->_loop = true;
?>
												<li class="carrinhoLi">
													<a class="carrinhoLink" href="<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['URL_AMIGAVEL'];?>
.html">
														<img class="carrinhoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['IMAGEM_PRINCIPAL'];?>
" alt="" />
														<span class="carrinhoProdutoTitulo"><?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['DESCRICAO_VENDA'];?>
</span>
														<span class="carrinhoProdutoQuantidade">Qtde: <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['QUANTIDADE']);?>
</span>
														<span class="carrinhoProdutoValor">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
</span>
													</a>
												</li>
												<?php } ?>
												
											</ul>
										</li>
										<li class="finalizarCompraLi">
											<a href="/carrinho" class="finalizarBt">Finalizar Compra</a>
											<span class="finalizarCompraTotal">R$<?php echo number_format($_smarty_tpl->tpl_vars['precoTotalVendaCarrinhoTopo']->value,2,",",".");?>
</span>
										</li>
									</ul>
								</li>
							</ul>
							<?php }?>
						</div>
					</div>
				</div>
				<?php if (($_smarty_tpl->tpl_vars['nomeConjuge1']->value==''||$_smarty_tpl->tpl_vars['idListaCasamento']->value==0)&&$_smarty_tpl->tpl_vars['sessao']->value!='lista-de-casamento'&&$_smarty_tpl->tpl_vars['sessao']->value!='lista-de-casamento-formulario'){?>
					<?php echo $_smarty_tpl->tpl_vars['menuTopo']->value;?>

				<?php }?>			
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0&&$_smarty_tpl->tpl_vars['idListaCasamento']->value==$_smarty_tpl->tpl_vars['minhaIdListaCasamento']->value&&$_smarty_tpl->tpl_vars['sessao']->value!='lista-de-casamento'){?>
		<div id="sairListaCasamento">
			<a href="javascript:sairListaCasamento();">Clique aqui</a> para sair da sua lista de casamento.
		</div>
		<?php }elseif($_smarty_tpl->tpl_vars['nomeConjuge1']->value&&$_smarty_tpl->tpl_vars['idListaCasamento']->value>0&&$_smarty_tpl->tpl_vars['sessao']->value!='lista-de-casamento'){?>
		<div id="sairListaCasamento">
			J&aacute; viu a lista do sortudo casal? <a href="javascript:sairListaCasamento();">Clique aqui</a> para sair.
		</div>
		<?php }?>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='inicial'){?>
	<div class="topoBanner">
		<ul class="sliderUl">
			<li class="sliderLi">
				<a class="sliderLink" href="/produtos/&ofertas=S">
					<img class="sliderImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/topo/COM-0039-14_DescontoDaSemana_Banner_13.jpg" alt=""/>
				</a>
			</li>
			<li class="sliderLi">
				<a class="sliderLink" href="/20599761-conjunto-de-panelas-vermelho-7-pecas-paris-tramontina.html">
					<img class="sliderImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/topo/Banners_Maio_1.jpg" alt=""/>
				</a>
			</li>

			<li class="sliderLi">
				<a class="sliderLink" href="/94804110-coifa-aco-inox-vidro-vetro-60---110v-tramontina.html">
					<img class="sliderImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/topo/Banners_Maio_2.jpg" alt=""/>
				</a>
			</li>

			<li class="sliderLi">
				<a class="sliderLink" href="/65650310-conjunto-de-panelas-em-inox-5-pecas-allegra-tramontina.html">
					<img class="sliderImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/topo/Banners_Maio_3-1.jpg" alt=""/>
				</a>
			</li>
		</ul>
	</div>
	<?php }?>
</div>


<?php }} ?>