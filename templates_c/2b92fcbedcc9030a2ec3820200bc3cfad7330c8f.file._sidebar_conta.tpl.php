<?php /* Smarty version Smarty-3.1.10, created on 2014-07-11 14:16:08
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/www/lojas/lojapadrao/templates/includes/_sidebar_conta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141142212853bfd588a8ecb7-49685978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b92fcbedcc9030a2ec3820200bc3cfad7330c8f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/www/lojas/lojapadrao/templates/includes/_sidebar_conta.tpl',
      1 => 1381339770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141142212853bfd588a8ecb7-49685978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'linkAtivo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53bfd588aaadd8_79350168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bfd588aaadd8_79350168')) {function content_53bfd588aaadd8_79350168($_smarty_tpl) {?><div class="sidebarCategorias">
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
			<a class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarEmail'){?>categoriasLinkAtivo<?php }?>" href="/alterar-email">
				<span>Alterar E-mail</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarSenha'){?>categoriasLinkAtivo<?php }?>" href="/alterar-senha">
				<span>Alterar Senha</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='alterarDadosCadastrais'){?>categoriasLinkAtivo<?php }?>" href="/alterar-dados-cadastrais">
				<span>Alterar Dados Cadastrais</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='enderecoEntrega'){?>categoriasLinkAtivo<?php }?>" href="/endereco-de-entrega">
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
			<a class="categoriasLink categoriasLinkFirst <?php if ($_smarty_tpl->tpl_vars['linkAtivo']->value=='cuponsDesconto'){?>categoriasLinkAtivo<?php }?>" href="/cupons-desconto">
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