<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 11:58:50
         compiled from "/Applications/MAMP/htdocs/anselmi/templates/includes/_produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14477161495418502a009657-29391393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ed5139c9c9d67f026bccb99c0e06fd57441b85a' => 
    array (
      0 => '/Applications/MAMP/htdocs/anselmi/templates/includes/_produtos.tpl',
      1 => 1410878694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14477161495418502a009657-29391393',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaCompreJunto' => 0,
    'sessao' => 1,
    'IMG_DIR' => 1,
    'ordemInicialListaProduto' => 1,
    'ordemListaProduto' => 1,
    'value' => 1,
    'key' => 1,
    'topListaProdutoCookie' => 1,
    'linkPagina' => 1,
    'ultimaPaginacaoBottom' => 1,
    'prevPaginacaoTop' => 1,
    'paginacaoTop' => 1,
    'valuePagina' => 1,
    'paginaAtual' => 1,
    'nextPaginacaoTop' => 1,
    'topListaProduto' => 1,
    'produtoInicial' => 1,
    'listaProdutoSite' => 1,
    'nroProdutos' => 1,
    'cookieLista' => 0,
    'LINK' => 1,
    'valueProdutoSite' => 1,
    'MIDIA_DIR' => 1,
    'descontoAVista' => 1,
    'listaProdutoSiteLancamento' => 1,
    'valueProdutoSiteLancamento' => 1,
    'primeiraPaginacaoBottom' => 1,
    'prevPaginacaoBottom' => 1,
    'paginacaoBottom' => 1,
    'nextPaginacaoBottom' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5418502a6157f9_64449349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418502a6157f9_64449349')) {function content_5418502a6157f9_64449349($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include '/Applications/MAMP/htdocs/anselmi/smarty/plugins/modifier.valor_parcelado.php';
?>		<?php if ($_smarty_tpl->tpl_vars['listaCompreJunto']->value!='S'){?>
		<div id="conteudo"></div>
		<!--CASO NAO HOUVER BANNERS LATERIAS ADICIONAR A CLASSE 'produtosListagemFull' NA DIV ABAIXO-->
		<div id="listagemProdutosAjax" class="produtosListagem <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-produtos-categorias'||$_smarty_tpl->tpl_vars['sessao']->value=='design-collection'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-produtos'){?>produtosListagemFull<?php }?> clearfix">
			<div id="loaderListagemProdutosAjax">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
/backgrounds/loader_actions.gif">
			</div>
			<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-produtos-categorias'||$_smarty_tpl->tpl_vars['sessao']->value=='design-collection'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-produtos'){?>
				<div class="auxiliarFiltros">
					
					<div class="contentAuxiliarFiltros">
						<div class="boxTipoLista">
							<a href="javascript:;" class="linkTipo linkTipoTabela ativo ir">Tabela</a>
							<a href="javascript:;" class="linkTipo linkTipoListagem ir">Listagem</a>
						</div>

						<!--FILTRO DE ORDENACAO -->
						<div class="boxOrdenar boxSelects">
							<a href="javascript:;" class="linkSelect linkSelectShowOrdenacao">
								<span class="linkSelectTxt"><?php echo $_smarty_tpl->tpl_vars['ordemInicialListaProduto']->value;?>
</span>
								<span class="seta"></span>
							</a>
							<ul class="listSelectUl">
								<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ordemListaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
								<li class="listSelectLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" class="listSelectLink linkOrdenacao"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					

						<!--FILTRO DE EXIBICAO -->
						<div class="boxExibir boxSelects">
							<a href="javascript:;" class="linkSelect linkSelectShowExibir">
								<span class="linkSelectTxt">exibir <?php echo $_smarty_tpl->tpl_vars['topListaProdutoCookie']->value;?>
 produtos</span>
								<span class="seta"></span>
							</a>
							<ul class="listSelectUl">
								<li class="listSelectLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&topListaProduto=20" class="listSelectLink nroProdutosLista">exibir 20 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&topListaProduto=40" class="listSelectLink nroProdutosLista">exibir 40 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&topListaProduto=60" class="listSelectLink nroProdutosLista">exibir 60 produtos</a>
								</li>
								<li class="listSelectLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&topListaProduto=80" class="listSelectLink nroProdutosLista">exibir 80 produtos</a>
								</li>
							</ul>
						</div>

						<!--PAGINACAO FILTROS -->
						<div class="contentPaginacao contentPaginacaoFiltro table">
							<ul class="paginacaoUl clearfix">
								<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>
								<li class="paginacaoLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['prevPaginacaoTop']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">
										&lt;
									</a>
								</li>
								<?php }?>
								<?php  $_smarty_tpl->tpl_vars['valuePagina'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePagina']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paginacaoTop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valuePagina']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valuePagina']->key => $_smarty_tpl->tpl_vars['valuePagina']->value){
$_smarty_tpl->tpl_vars['valuePagina']->_loop = true;
 $_smarty_tpl->tpl_vars['valuePagina']->iteration++;
?>
								<?php if ($_smarty_tpl->tpl_vars['valuePagina']->iteration>5){?> <?php break 1?> <?php }?>
								<li class="paginacaoLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['valuePagina']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros <?php if ($_smarty_tpl->tpl_vars['valuePagina']->value==$_smarty_tpl->tpl_vars['paginaAtual']->value){?>paginacaoLinksAtivo<?php }?>"><?php echo $_smarty_tpl->tpl_vars['valuePagina']->value;?>
</a>
								</li>
								<?php } ?>
								<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>
								<li class="paginacaoLi">
									<a href="<?php echo $_smarty_tpl->tpl_vars['nextPaginacaoTop']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">
										&gt;
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>

				</div>
				<?php if ($_smarty_tpl->tpl_vars['topListaProduto']->value<0){?><?php $_smarty_tpl->tpl_vars['produtoInicial'] = new Smarty_variable(1, true, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['produtoInicial'] = new Smarty_variable($_smarty_tpl->tpl_vars['topListaProduto']->value, true, 0);?><?php }?>
				<div class="contentNumeroPagina">Mostrando <?php echo $_smarty_tpl->tpl_vars['produtoInicial']->value;?>
 - <?php echo ($_smarty_tpl->tpl_vars['produtoInicial']->value-1)+count($_smarty_tpl->tpl_vars['listaProdutoSite']->value);?>
 produto(s) do total de <?php echo $_smarty_tpl->tpl_vars['nroProdutos']->value;?>
 distribu&iacute;do(s) em <?php echo $_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value;?>
 p&aacute;gina<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>s<?php }?></div>

			<?php }?>
		<?php }?>
			<ul class="produtoUl clearfix">
				<?php echo $_smarty_tpl->tpl_vars['cookieLista']->value;?>

				<?php  $_smarty_tpl->tpl_vars['valueProdutoSite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoSite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoSite']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueProdutoSite']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoSite']->key => $_smarty_tpl->tpl_vars['valueProdutoSite']->value){
$_smarty_tpl->tpl_vars['valueProdutoSite']->_loop = true;
 $_smarty_tpl->tpl_vars['valueProdutoSite']->iteration++;
?>
					<li class="produtoLi produtoLiTabela <?php if ($_smarty_tpl->tpl_vars['sessao']->value!='produto-detalhe'&&!($_smarty_tpl->tpl_vars['valueProdutoSite']->iteration % 2)){?>produtoLiLast<?php }?>">
						<div class="produtoContent clearfix">
							<div class="produtoInformacoes">
								<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['URL_AMIGAVEL'];?>
.html" class="produtoLink">
									<span class="boxProdutoSelo">
										<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['TIPO_PROMOCAO']=='P'&&$_smarty_tpl->tpl_vars['valueProdutoSite']->value['VALOR_PROMOCAO']){?>
										<span class="produtoSelo produtoSeloPorcentagem">
											<span><?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSite']->value['VALOR_PROMOCAO'],0);?>
%</span> off</span>
										<?php }elseif($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']>0){?>
										<span class="produtoSelo produtoSeloPorcentagem">oferta</span>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['LANCAMENTO']=='S'){?>
										<span class="produtoSelo produtoSeloNovo">Novo</span>
										<?php }?>
									</span>

									<span class="blocoImagem table">	
										<span class="tableCell">
											<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['IMAGEM_PRINCIPAL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
										</span>
									</span>

									<span class="produtoTitulo"><?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
 <?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['REFERENCIA'];?>
<br><?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['COR'];?>
</span>
									<span class="produtoDescricao">
										<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_CURTA'];?>

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
									<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['URL_AMIGAVEL'];?>
.html" class="produtoLink">
										<span class="produtoValorFinal">
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']>0){?>
											<span class="produtoValorAntigo">De R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA'],2,",",".");?>
</span>
											por R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL'],2,",",".");?>

											<?php }else{ ?>
											R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA'],2,",",".");?>

											<?php }?>
										</span>
										<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']>0){?>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']);?>

										<?php }else{ ?>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value>0){?>
										<span class="produtoValorAVista">
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']>0){?>
												ou <strong>R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']-(($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']*$_smarty_tpl->tpl_vars['descontoAVista']->value)/100)),2,",",".");?>
</strong> &agrave; vista
											<?php }else{ ?>
												ou <strong>R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']-(($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']*$_smarty_tpl->tpl_vars['descontoAVista']->value)/100)),2,",",".");?>
</strong> &agrave; vista
											<?php }?>
										</span>
										<?php }?>
										
										<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['FRETE_GRATIS']=='S'){?>
											<span class="produtoFrete">Frete gr&aacute;tis</span>
										<?php }?>
									</a>
									<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>

									<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['URL_AMIGAVEL_PNAUX']){?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['URL_AMIGAVEL_PNAUX'];?>
/" class="produtoCategoria">+ linha <?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_PRODUTO_NIVEL_AUXILI'];?>
teste</a>
									<?php }?>
								</div>

							</div>
						</div>
					</li>

					<?php if ($_smarty_tpl->tpl_vars['sessao']->value!='produto-detalhe'&&!($_smarty_tpl->tpl_vars['valueProdutoSite']->iteration % 2)){?><li class="produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li><?php }?>
					
				<?php } ?>
			</ul>

		<?php if ($_smarty_tpl->tpl_vars['listaCompreJunto']->value!='S'){?>
			<!-- PRODUTOS LANCAMENTO -->
			<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='inicial'){?>
			<div class="blocoProdutos">
				<ul class="produtoUl produtoCategoriasUl clearfix">
					<li class="produtosTitulo">
						<div class="blocoTitulo">
							<h2 class="titulo">Lan&ccedil;amentos</h2>
						</div>
					</li>
					<?php  $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoSiteLancamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->key => $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value){
$_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->_loop = true;
 $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->iteration++;
?>

						<li class="produtoLi produtoLiTabela <?php if ($_smarty_tpl->tpl_vars['sessao']->value!='produto-detalhe'&&!($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->iteration % 3)){?>produtoLiLast<?php }?>">
							<div class="produtoContent clearfix">
								<div class="produtoInformacoes">
									<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['URL_AMIGAVEL'];?>
.html" class="produtoLink">
										<span class="boxProdutoSelo">
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['TIPO_PROMOCAO']=='P'&&$_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['VALOR_PROMOCAO']>0){?>
											<span class="produtoSelo produtoSeloPorcentagem"><span><?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['VALOR_PROMOCAO'],0);?>
%</span> off</span>
											<?php }elseif($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']>0){?>
											<span class="produtoSelo produtoSeloPorcentagem">oferta</span>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['LANCAMENTO']=='S'){?>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
											<?php }?>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['IMAGEM_PRINCIPAL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo"><?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['DESCRICAO_VENDA'];?>
 <?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['REFERENCIA'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['COR'];?>
</span>
										<span class="produtoDescricao">
											<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_CURTA'];?>

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
										<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['URL_AMIGAVEL'];?>
.html" class="produtoLink">
											<span class="produtoValorFinal">
												<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']>0){?>
												<span class="produtoValorAntigo">De R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_VENDA'],2,",",".");?>
</span>
												por R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL'],2,",",".");?>

												<?php }else{ ?>
												R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_VENDA'],2,",",".");?>

												<?php }?>
											</span>
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']>0){?>
												<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']);?>

											<?php }else{ ?>
												<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_VENDA']);?>

											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['descontoAVista']->value>0){?>
											<span class="produtoValorAVista">
												<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']>0){?>
													ou <strong>R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']-(($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_PROMOCIONAL']*$_smarty_tpl->tpl_vars['descontoAVista']->value)/100)),2,",",".");?>
</strong> &agrave; vista
												<?php }else{ ?>
													ou <strong>R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_VENDA']-(($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PRECO_VENDA']*$_smarty_tpl->tpl_vars['descontoAVista']->value)/100)),2,",",".");?>
</strong> &agrave; vista
												<?php }?>
											</span>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['FRETE_GRATIS']=='S'){?>
												<span class="produtoFrete">Frete gr&aacute;tis</span>
											<?php }?>
										</a>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['URL_AMIGAVEL_PNAUX']){?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['URL_AMIGAVEL_PNAUX'];?>
/" class="produtoCategoria">+ linha <?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['DESCRICAO_PRODUTO_NIVEL_AUXILI'];?>
</a>
									<?php }?>
									<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
, 'false');" class="produtoAddCarrinho">Adicionar ao Carrinho</span></a>
								</div>
							</div>
						</li>
						<?php if ($_smarty_tpl->tpl_vars['sessao']->value!='produto-detalhe'&&!($_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->iteration % 3)){?><li class="produtoLi produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li><?php }?>
					<?php } ?>
				</ul>

				<div class="blocoImagens clearfix">
					<div class="bloco">
						<a href="javascript:;">
							<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
mais_cores.jpg" alt="mais cores no seu ver&atilde;o" />
						</a>
					</div>
					<div class="bloco">
						<a href="javascript:;">
							<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
juliana_paes.jpg" alt="Juliana Paes" />
						</a>
					</div>
				</div>
			</div>

			<?php }?>

			
			<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-produtos-categorias'||$_smarty_tpl->tpl_vars['sessao']->value=='design-collection'){?>
			<?php if ($_smarty_tpl->tpl_vars['topListaProduto']->value<0){?><?php $_smarty_tpl->tpl_vars['produtoInicial'] = new Smarty_variable(1, true, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['produtoInicial'] = new Smarty_variable($_smarty_tpl->tpl_vars['topListaProduto']->value, true, 0);?><?php }?>
			<div class="contentNumeroPagina">Mostrando <?php echo $_smarty_tpl->tpl_vars['produtoInicial']->value;?>
 - <?php echo ($_smarty_tpl->tpl_vars['produtoInicial']->value-1)+count($_smarty_tpl->tpl_vars['listaProdutoSite']->value);?>
 produto(s) do total de <?php echo $_smarty_tpl->tpl_vars['nroProdutos']->value;?>
 distribu&iacute;do(s) em <?php echo $_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value;?>
 p&aacute;gina<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>s<?php }?></div>
				<!--PAGINACAO RODAPE -->
				<div class="contentPaginacao contentPaginacaoFull table">
					<ul class="paginacaoUl clearfix">
						<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>
						<li class="paginacaoLi">
							<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['primeiraPaginacaoBottom']->value;?>
" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalFirst">primeira</a>
						</li>
						<li class="paginacaoLi">
							<a href="<?php echo $_smarty_tpl->tpl_vars['prevPaginacaoBottom']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">&lt;</a>
						</li>
						<?php }?>
						<?php  $_smarty_tpl->tpl_vars['valuePagina'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePagina']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paginacaoBottom']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valuePagina']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valuePagina']->key => $_smarty_tpl->tpl_vars['valuePagina']->value){
$_smarty_tpl->tpl_vars['valuePagina']->_loop = true;
 $_smarty_tpl->tpl_vars['valuePagina']->iteration++;
?>
							<?php if ($_smarty_tpl->tpl_vars['valuePagina']->iteration>12){?> <?php break 1?> <?php }?>
							<li class="paginacaoLi">
								<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['valuePagina']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros <?php if ($_smarty_tpl->tpl_vars['valuePagina']->value==$_smarty_tpl->tpl_vars['paginaAtual']->value){?>paginacaoLinksAtivo<?php }?>"><?php echo $_smarty_tpl->tpl_vars['valuePagina']->value;?>
</a>
							</li>
						<?php } ?>
						<?php if ($_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value>1){?>
						<li class="paginacaoLi">
							<a href="<?php echo $_smarty_tpl->tpl_vars['nextPaginacaoBottom']->value;?>
" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">&gt;</a>
						</li>
						<li class="paginacaoLi">
							<a href="<?php echo $_smarty_tpl->tpl_vars['linkPagina']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['ultimaPaginacaoBottom']->value;?>
" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalLast">&uacute;ltima</a>
						</li>
						<?php }?>
					</ul>
				</div>
			<?php }?>
		</div>
		<?php }?>
<?php }} ?>