<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 18:05:11
         compiled from "templates/inicial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152627480354175487888f62-89063094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7749c6834b669ba7ed8349d2f905ac1d61b7c3a' => 
    array (
      0 => 'templates/inicial.tpl',
      1 => 1410782781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152627480354175487888f62-89063094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessao' => 1,
    'menuSidebar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_541754878bde08_66365644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541754878bde08_66365644')) {function content_541754878bde08_66365644($_smarty_tpl) {?><div class="container">
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

	</div>
</div>
<?php }} ?>