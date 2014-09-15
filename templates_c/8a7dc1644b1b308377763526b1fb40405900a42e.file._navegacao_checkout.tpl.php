<?php /* Smarty version Smarty-3.1.10, created on 2014-08-07 20:09:15
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/www/lojas/anselmi/templates/includes/_navegacao_checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186139606953e3c0cb9a3769-12274607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a7dc1644b1b308377763526b1fb40405900a42e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/www/lojas/anselmi/templates/includes/_navegacao_checkout.tpl',
      1 => 1399397282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186139606953e3c0cb9a3769-12274607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'etapaPedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e3c0cb9d72f9_97349742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e3c0cb9d72f9_97349742')) {function content_53e3c0cb9d72f9_97349742($_smarty_tpl) {?><div class="navegacaoContentCheckout">
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