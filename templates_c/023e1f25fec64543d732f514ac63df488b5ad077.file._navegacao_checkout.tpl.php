<?php /* Smarty version Smarty-3.1.10, created on 2014-05-09 09:55:55
         compiled from "C:\wamp\www\lojas\comlines\templates\includes\_navegacao_checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15023536cd05b95f822-95517348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023e1f25fec64543d732f514ac63df488b5ad077' => 
    array (
      0 => 'C:\\wamp\\www\\lojas\\comlines\\templates\\includes\\_navegacao_checkout.tpl',
      1 => 1399397280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15023536cd05b95f822-95517348',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'etapaPedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_536cd05ba14459_91072738',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536cd05ba14459_91072738')) {function content_536cd05ba14459_91072738($_smarty_tpl) {?><div class="navegacaoContentCheckout">
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