<?php /* Smarty version Smarty-3.1.10, created on 2013-10-15 15:08:52
         compiled from "templates\lista-produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15225525d84b400fe26-65932088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4987bf9c8a2a03e40956261eca948ac1ebe78e6d' => 
    array (
      0 => 'templates\\lista-produtos.tpl',
      1 => 1377794351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15225525d84b400fe26-65932088',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_DIR' => 0,
    'menuSidebar' => 0,
    'MIDIA_DIR' => 0,
    'valueProdutoSite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_525d84b42a1e94_20395711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525d84b42a1e94_20395711')) {function content_525d84b42a1e94_20395711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include 'C:\\wamp\\www\\lojas\\comlines\\smarty\\plugins\\modifier.valor_parcelado.php';
?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">Inicial</a> / Ulitidades Dom&eacute;sticas
				</li>
			</ul>
			<h2 class="tituloCategoria">Ulitidades Dom&eacute;sticas</h2>
		</div>


		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			<?php echo $_smarty_tpl->tpl_vars['menuSidebar']->value;?>

		</div>


		<div class="produtosListagem produtosListagemFull clearfix">
			<div class="destaquesBanner">
				<span class="txtDestaques"></span>

				<!-- BANNERS DESTAQUES -->
				<ul class="destaquesUl">
					<li class="destaqueLi clearfix">
						<a href="javascript:;" class="destaqueLink">
							<span class="destaqueImagem">
								<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/banner-destaques/1.jpg" class="destaqueImg" alt="" />
							</span>
							<span class="destaqueInformacoes">
								<span class="destaqueTitulo">Conjunto churrasco Punk Rock 4 p&ccedil;s Rock&rsquo;n&rsquo;cook Tramontina</span>
								<span class="destaqueDescricao">
									Tenha um churrasco de acordo com o seu estilo! Com esse kit de churras punk rock, seus momentos de lazer ser&atilde;o mais aut&ecirc;nticos!
								</span>
								<span class="destaqueValorAntigo">De R$ 159,00 por</span>
								<span class="destaqueValor">
									10X R$ 10,59
									<span class="juros">sem juros</span>
								</span>
								<span class="destaqueBt">
									<span class="destaqueBtTxt">Clique e Confira</span>
									<span class="destaqueBtIcone"></span>
									<span class="destaqueBtSeta"></span>
								</span>
							</span>
						</a>
					</li>
					<li class="destaqueLi clearfix">
						<a href="javascript:;" class="destaqueLink">
							<span class="destaqueImagem">
								<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/banner-destaques/1.jpg" class="destaqueImg" alt="" />
							</span>
							<span class="destaqueInformacoes">
								<span class="destaqueTitulo">Conjunto churrasco Punk Rock 4 p&ccedil;s Rock&rsquo;n&rsquo;cook Tramontina</span>
								<span class="destaqueDescricao">
									Tenha um churrasco de acordo com o seu estilo! Com esse kit de churras punk rock, seus momentos de lazer ser&atilde;o mais aut&ecirc;nticos!
								</span>
								<span class="destaqueValorAntigo">De R$ 159,00 por</span>
								<span class="destaqueValor">
									10X R$ 10,59
									<span class="juros">sem juros</span>
								</span>
								<span class="destaqueBt">
									<span class="destaqueBtTxt">Clique e Confira</span>
									<span class="destaqueBtIcone"></span>
									<span class="destaqueBtSeta"></span>
								</span>
							</span>
						</a>
					</li>
				</ul>
			</div>

			<div class="produtosCategorias clearfix">
				<!-- TABS PRODUTOS -->
				<div class="produtosTabs">
					<ul class="menuAbasProdutosUl">
						<li class="menuAbasProdutosLi selected">
							<a href="javascript:;" class="menuAbasProdutosLink menuAbasProdutosLinkFirst">
								Ofertas
							</a>
						</li>
						<li class="menuAbasProdutosLi">
							<a href="javascript:;" class="menuAbasProdutosLink">
								Lan&ccedil;amentos
							</a>
						</li>
						<li class="menuAbasProdutosLi menuAbasProdutosLast">
							<a href="javascript:;" class="menuAbasProdutosLink menuAbasProdutosLinkLast">
								Mais Vendidos
							</a>
						</li>
					</ul>

					<div class="conteudoAbasProduto">
						<!-- TABS PRODUTOS OFERTAS -->
						<div class="abaProdutos aba1">
							<ul class="produtosSlideUl clearfix">
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
							</ul>
						</div>



						<!-- TABS PRODUTOS LANÇAMENTOS -->
						<div class="abaProdutos aba2">
							<ul class="produtosSlideUl clearfix">
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
							</ul>
						</div>



						<!-- TABS PRODUTOS MAIS VENDIDOS -->
						<div class="abaProdutos aba3">
							<ul class="produtosSlideUl clearfix">
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/3.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/3.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/3.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
								<li class="produtosSlideLi">
									<a href="javascript:;" class="produtosSlideLink">
										<span class="boxProdutoSelo">
											<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
											<span class="produtoSelo produtoSeloNovo">Novo</span>
										</span>

										<span class="blocoImagem table">	
											<span class="tableCell">
												<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/3.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
											</span>
										</span>

										<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
										<span class="produtoDescricao">
											descricao curta
										</span>

										<span class="produtosInfos">
											<span class="produtoFavoritos"></span>
											<span class="produtoValorFinal">
												<span class="produtoValorAntigo">De R$ 1.950,00</span>
												por R$ 1.650,00
											</span>
											<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

										</span>

										<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
									</a>
									<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="produtosSlide">
					<a class="btProdutosSlide btProdutosSlidePrev" href="javascript:;">
						<span class="iconBt"></span>
					</a>
					<a class="btProdutosSlide btProdutosSlideNext" href="javascript:;">
						<span class="iconBt"></span>
					</a>

					<span class="tituloCategoria">Cozinha</span>

					<ul class="produtosSlideUl clearfix">
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
					</ul>
				</div>

				<div class="produtosSlide produtosSlideLast">
					<a class="btProdutosSlide btProdutosSlidePrev" href="javascript:;">
						<span class="iconBt"></span>
					</a>
					<a class="btProdutosSlide btProdutosSlideNext" href="javascript:;">
						<span class="iconBt"></span>
					</a>

					<span class="tituloCategoria">Bar</span>

					<ul class="produtosSlideUl clearfix">
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/3.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/1.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
						<li class="produtosSlideLi">
							<a href="javascript:;" class="produtosSlideLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloPorcentagem">33% off</span>
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/2.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['valueProdutoSite']->value['DESCRICAO_VENDA'];?>
"/>
									</span>
								</span>

								<span class="produtoTitulo">Concha para molho cabo polywood Tramontina</span>
								<span class="produtoDescricao">
									descricao curta
								</span>

								<span class="produtosInfos">
									<span class="produtoFavoritos"></span>
									<span class="produtoValorFinal">
										<span class="produtoValorAntigo">De R$ 1.950,00</span>
										por R$ 1.650,00
									</span>
									<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_VENDA']);?>

								</span>

								<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
							</a>
							<a href="javascript:;" class="produtoCategoria">+ Assadeiras e Formas</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- SIDEBAR BANNERS -->
			<div class="sidebarBanners">
				<ul class="bannersUl">
					<li class="bannersLi">
						<a href="javascript:;" class="bannersLink">
							<img class="bannersImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/1.jpg" alt="" />
						</a>
					</li>
					<li class="bannersLi">
						<a href="javascript:;" class="bannersLink">
							<img class="bannersImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/2.jpg" alt="" />
						</a>
					</li>
					<li class="bannersLi">
						<a href="javascript:;" class="bannersLink">
							<img class="bannersImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/3.jpg" alt="" />
						</a>
					</li>
					<li class="bannersLi">
						<a href="javascript:;" class="bannersLink">
							<img class="bannersImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/4.jpg" alt="" />
						</a>
					</li>
					<li class="bannersLi">
						<a href="javascript:;" class="bannersLink">
							<img class="bannersImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/5.jpg" alt="" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php }} ?>