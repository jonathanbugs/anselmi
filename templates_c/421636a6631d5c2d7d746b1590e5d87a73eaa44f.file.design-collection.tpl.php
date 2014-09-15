<?php /* Smarty version Smarty-3.1.10, created on 2014-05-06 15:29:09
         compiled from "templates\design-collection.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29624536929f5401a28-39901270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '421636a6631d5c2d7d746b1590e5d87a73eaa44f' => 
    array (
      0 => 'templates\\design-collection.tpl',
      1 => 1377794351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29624536929f5401a28-39901270',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_536929f544d060_27654542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536929f544d060_27654542')) {function content_536929f544d060_27654542($_smarty_tpl) {?><div class="container">
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
						/ <a class="navegacaoLink" href="/<?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['URL_AMIGAVEL'];?>
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


			<!-- SIDEBAR COM FILTROS --> 
			
			
		</div>


		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
<?php }} ?>