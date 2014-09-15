<?php /* Smarty version Smarty-3.1.10, created on 2014-05-05 14:20:30
         compiled from "C:\wamp\www\lojas\comlines\lista-casamento\includes\_sidebar_lista_casamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112735367c85e6b9c56-39642522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fbce7ee257c0b2830eac07eb5047cc31661d3b8' => 
    array (
      0 => 'C:\\wamp\\www\\lojas\\comlines\\lista-casamento\\includes\\_sidebar_lista_casamento.tpl',
      1 => 1383666274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112735367c85e6b9c56-39642522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessao' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5367c85e6e9917_54399603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c85e6e9917_54399603')) {function content_5367c85e6e9917_54399603($_smarty_tpl) {?><ul class="categoriasUl">
	<li class="categoriasLi categoriaMae">
		<a href="javascript:;" class="categoriasLink">Minha Lista</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-editar-produtos/" class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-editar-produtos'){?>categoriasLinkAtivo<?php }?>">
			<span>Editar Produtos</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-divulgar-lista/" class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-divulgar-lista'){?>categoriasLinkAtivo<?php }?>">
			<span>Divulgar minha lista</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-alterar-dados/" class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-alterar-dados'){?>categoriasLinkAtivo<?php }?>">
			<span>Alterar meus dados</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-excluir/" class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-excluir'){?>categoriasLinkAtivo<?php }?>">
			<span>Excluir lista</span>
		</a>
	</li>
</ul><?php }} ?>