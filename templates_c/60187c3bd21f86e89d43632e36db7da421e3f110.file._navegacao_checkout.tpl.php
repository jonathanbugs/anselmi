<?php /* Smarty version Smarty-3.1.10, created on 2014-07-15 19:07:59
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/www/lojas/lojapadrao/templates/includes/_navegacao_checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36864441653c55fefa4b298-75379387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60187c3bd21f86e89d43632e36db7da421e3f110' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/www/lojas/lojapadrao/templates/includes/_navegacao_checkout.tpl',
      1 => 1399397282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36864441653c55fefa4b298-75379387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'etapaPedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53c55fefa7e101_53792859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c55fefa7e101_53792859')) {function content_53c55fefa7e101_53792859($_smarty_tpl) {?><div class="navegacaoContentCheckout">
	<ul class="checkoutOrdemUl">
		<!-- NO PASSO ATIVO COLOCAR AS CLASSES "numeroPassoAtivo e tituloPassoAtivo" COMO ABAIXO -->
		<li class="checkoutOrdemLi">
			<span class="numeroPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==1||$_smarty_tpl->tpl_vars['etapaPedido']->value==2||$_smarty_tpl->tpl_vars['etapaPedido']->value==3){?>numeroPassoAtivo<?php }?>">1</span>
			<span class="tituloPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==1||$_smarty_tpl->tpl_vars['etapaPedido']->value==2||$_smarty_tpl->tpl_vars['etapaPedido']->value==3){?>tituloPassoAtivo<?php }?>">dados pessoais</span>
		</li>

		<!-- NO PASSO ATIVO COLOCAR A CLASSE "checkoutLinhaAtiva" PARA A LINHA FICAR ATIVA COMO ABAIXO -->
		<span class="checkoutLinha checkoutLinha1 checkoutLinhaAtiva"></span>

		<li class="checkoutOrdemLi">
			<span class="numeroPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==3||$_smarty_tpl->tpl_vars['etapaPedido']->value==2){?>numeroPassoAtivo<?php }?>">2</span>
			<span class="tituloPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==3||$_smarty_tpl->tpl_vars['etapaPedido']->value==2){?>tituloPassoAtivo<?php }?>">pagamento e entrega</span>
		</li>

		<span class="checkoutLinha checkoutLinha2 <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==3){?>checkoutLinhaAtiva<?php }?>"></span>

		<li class="checkoutOrdemLi checkoutOrdemLiLast">
			<span class="numeroPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==3){?>numeroPassoAtivo<?php }?>">3</span>
			<span class="tituloPasso <?php if ($_smarty_tpl->tpl_vars['etapaPedido']->value==3){?>tituloPassoAtivo<?php }?>">confirma&ccedil;&atilde;o</span>
		</li>
	</ul>
</div>
<?php }} ?>