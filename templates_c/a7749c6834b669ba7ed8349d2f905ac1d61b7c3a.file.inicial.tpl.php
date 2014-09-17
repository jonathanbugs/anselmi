<?php /* Smarty version Smarty-3.1.10, created on 2014-09-17 17:00:54
         compiled from "templates/inicial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16498349745419e8762bad77-34834634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7749c6834b669ba7ed8349d2f905ac1d61b7c3a' => 
    array (
      0 => 'templates/inicial.tpl',
      1 => 1410878233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16498349745419e8762bad77-34834634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessao' => 1,
    'menuSidebar' => 0,
    'LINK' => 0,
    'valueProdutoSiteLancamento' => 0,
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5419e876303d76_47439989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5419e876303d76_47439989')) {function content_5419e876303d76_47439989($_smarty_tpl) {?><div class="container">
	<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='inicial'){?>
	<div class="boxNews">
		<div class="boxNewsContent">
			<div class="table tableNews">
				<div class="tableCell">
					<form action="../actions/cadastro.php" method="post" name="newsForm" id="newsForm" class="newsForm clearfix" lang="pt">
						<input type="hidden" name="acao" value="cadastraNewsletter">
						<span class="receba">
							Receba ofertas por e-mail:
						</span>
						<div class="holder">
							<label class="label" for="nome">Nome</label>
							<input class="input" type="text" id="nome" name="nome" req='s' />
							<span id="erroFormNews"></span>
							<div id="teste"></div>
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o nome</span>
							</span>-->
						</div>
						<div class="holder">
							<label class="label" for="email">Email</label>
							<input class="input" type="text" id="email" name="email" req='s' />
						
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o e-mail</span>
							</span>-->
						</div>
						
						<button type="submit" class="btSubmit">OK</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php }?>

	<div id="produtosContent" class="clearfix">

		<!-- SIDEBAR CATEGORIAS -->
		<!--div class="sidebarCategorias">
			<?php echo $_smarty_tpl->tpl_vars['menuSidebar']->value;?>

		</div-->

		<!--LISTAGEM DE PRODUTO -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



		<!--div class="blocoProdutos">
			<ul class="produtoUl produtoCategoriasUl clearfix">
				<li class="produtosTitulo">
					<div class="blocoTitulo">
						<h2 class="titulo">Lan&ccedil;amentos</h2>
					</div>
				</li>

				<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 4+1 - (1) : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
				
				<li class="produtoLi produtoLiTabela">
					<div class="produtoContent clearfix">
						<div class="produtoInformacoes">
							<a href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
<?php echo $_smarty_tpl->tpl_vars['valueProdutoSiteLancamento']->value['URL_AMIGAVEL'];?>
.html" class="produtoLink">
								<span class="boxProdutoSelo">
									<span class="produtoSelo produtoSeloNovo">Novo</span>
								</span>

								<span class="blocoImagem table">	
									<span class="tableCell">
										<img class="produtoImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
blusao.jpg" alt=""/>
									</span>
								</span>

								<span class="produtoTitulo">Maxi Pull Anselmi Listrado</span>
								<span class="produtoDescricao">
									Maxi Pull Anselmi Listrado
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
									<span class="produtoValorFinal">R$ 137,80</span>
									<span class="produtoValorParcelado">ou em at&eacute; 6x de R$ 22,97</span>
									<span class="produtoFrete">Frete gr&aacute;tis sul/sudeste</span>
								</a>
							</div>
							<a href="javascript:;" class="produtoAddCarrinho">Adicionar ao Carrinho</a>
							<a href="javascript:;" class="produtoCategoria">+ blusas</a>
						</div>
					</div>
				</li>

				<?php }} ?>
				

				
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
		</div-->
	</div>
</div>
<?php }} ?>