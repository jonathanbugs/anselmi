<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 09:44:22
         compiled from "templates/lista-produtos-categorias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:429834304541830a61cd097-86787474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b6931c4ad07ba80e54789f1a525c9b453ed2b17' => 
    array (
      0 => 'templates/lista-produtos-categorias.tpl',
      1 => 1397744226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '429834304541830a61cd097-86787474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_DIR' => 0,
    'navegacaoCategoria' => 0,
    'countCategorias' => 0,
    'valueNavegacaoCategoria' => 0,
    'tituloCategoria' => 0,
    'menuSidebar' => 0,
    'MIDIA_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_541830a6226524_92048691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541830a6226524_92048691')) {function content_541830a6226524_92048691($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">Inicial</a>
					<?php  $_smarty_tpl->tpl_vars['valueNavegacaoCategoria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navegacaoCategoria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->key => $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value){
$_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = true;
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration++;
?>
						<?php if ($_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration==$_smarty_tpl->tpl_vars['countCategorias']->value){?>
						<?php break 1?>
						<?php }?>
						/ <a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['URL_AMIGAVEL'];?>
"><?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['DESCRICAO_CATEGORIA'];?>
</a>
					<?php } ?>
				</li>
			</ul>
			<h2 class="tituloCategoria"><?php echo $_smarty_tpl->tpl_vars['tituloCategoria']->value;?>
</h2>
		</div>


		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			<?php echo $_smarty_tpl->tpl_vars['menuSidebar']->value;?>

			<br>
			<a href="/lista-de-casamento">
				<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
banners/laterais/banner_pequeno_vertical.jpg" border="0">
			</a>
			<!-- SIDEBAR COM FILTROS --> 
			
			
		</div>


		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
<?php }} ?>