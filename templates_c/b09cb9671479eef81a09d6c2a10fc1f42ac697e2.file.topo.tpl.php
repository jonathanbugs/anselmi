<?php /* Smarty version Smarty-3.1.10, created on 2014-05-05 14:20:30
         compiled from "C:\wamp\www\lojas\comlines\lista-casamento\includes\topo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187045367c85e64b971-43227341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b09cb9671479eef81a09d6c2a10fc1f42ac697e2' => 
    array (
      0 => 'C:\\wamp\\www\\lojas\\comlines\\lista-casamento\\includes\\topo.tpl',
      1 => 1384949590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187045367c85e64b971-43227341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'fotoCapa' => 0,
    'nomeConjuge1' => 0,
    'nomeConjuge2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5367c85e670ab9_16100691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c85e670ab9_16100691')) {function content_5367c85e670ab9_16100691($_smarty_tpl) {?><section class="sessaoListaCasamento">
	<div id="blocoLogo">
		<img class="logo" src="../lista-casamento/img/logo_menor.png" alt="Lista de Casamento Comlines">
		<a class="btVoltar" href="/lc/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Voltar para a lista</a>
	</div>
	<div id="blocoImagem">
		<?php if ($_smarty_tpl->tpl_vars['fotoCapa']->value){?>
		<img class="imagemNoivos" src="../lista-casamento/fotos/<?php echo $_smarty_tpl->tpl_vars['fotoCapa']->value;?>
" alt="Noivos">
		<?php }?>
	</div>
	<div id="blocoNomes">
		<span class="nome"><?php echo $_smarty_tpl->tpl_vars['nomeConjuge1']->value;?>
</span>
		<span class="divisor">&</span>
		<span class="nome"><?php echo $_smarty_tpl->tpl_vars['nomeConjuge2']->value;?>
</span>
	</div>
</section><?php }} ?>