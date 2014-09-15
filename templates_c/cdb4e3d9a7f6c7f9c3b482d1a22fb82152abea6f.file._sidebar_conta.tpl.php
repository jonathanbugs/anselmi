<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 12:02:39
         compiled from "/Applications/MAMP/htdocs/anselmi/templates/includes/_sidebar_conta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1710100825416ff8fa9d555-82023862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdb4e3d9a7f6c7f9c3b482d1a22fb82152abea6f' => 
    array (
      0 => '/Applications/MAMP/htdocs/anselmi/templates/includes/_sidebar_conta.tpl',
      1 => 1406126333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1710100825416ff8fa9d555-82023862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'linkAtivo' => 0,
    'LINK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5416ff8faf7ff2_04963504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416ff8faf7ff2_04963504')) {function content_5416ff8faf7ff2_04963504($_smarty_tpl) {?><div class="sidebarCategorias">
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Meus pedidos</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='meusPedidos'){?>categoriasLinkAtivo<?php }?>" href="meus-pedidos">
				<span>Todos os Pedidos</span>
			</a>
		</li>
		<!--<li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Pedidos em Aberto</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Pedidos Entregues</span>
			</a>
		</li>-->
	</ul>
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Meus Dados</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarEmail'){?>categoriasLinkAtivo<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
alterar-email">
				<span>Alterar E-mail</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarSenha'){?>categoriasLinkAtivo<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
alterar-senha">
				<span>Alterar Senha</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarDadosCadastrais'){?>categoriasLinkAtivo<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
alterar-dados-cadastrais">
				<span>Alterar Dados Cadastrais</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='enderecoEntrega'){?>categoriasLinkAtivo<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
endereco-de-entrega">
				<span>Endere&ccedil;o de Entrega</span>
			</a>
		</li>
	</ul>
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Outros Servi&ccedil;os</a>
		</li>
		<!-- <li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst categoriasLinkAtivo" href="javascript:;">
				<span>2&ordf; via de boleto</span>
			</a>
		</li> -->
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='cuponsDesconto'){?>categoriasLinkAtivo<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
cupons-desconto">
				<span>Cupons de Desconto</span>
			</a>
		</li>
		<!-- <li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Central de Atendimento</span>
			</a>
		</li> -->
	</ul>
</div><?php }} ?>