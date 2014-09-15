<?php /* Smarty version Smarty-3.1.10, created on 2014-08-07 19:56:20
         compiled from "templates/checkout-dados-pessoais.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205726007153e3bdc417d524-76893706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e274de16a25a3418f3562da54473aed7370b6119' => 
    array (
      0 => 'templates/checkout-dados-pessoais.tpl',
      1 => 1406126429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205726007153e3bdc417d524-76893706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINK' => 0,
    'urlRedirect' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e3bdc41e7564_96048682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e3bdc41e7564_96048682')) {function content_53e3bdc41e7564_96048682($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_navegacao_checkout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="ckeckoutContent clearfix">
			<div class="checkoutBloco checkoutBlocoLeft">
				<span class="checkoutBlocoTitulo">j&aacute; sou cadastrado</span>
				<form action="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
checkout-dados-pessoais" method="post" name="checkoutForm" id="checkoutForm" class="checkoutForm" lang="pt">
					<input name="acao" type="hidden" value="logar" />
					<input name="redirect" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urlRedirect']->value;?>
" />
					<div class="holder">
						<label class="label" for="email">E-mail</label>
						<input class="input" type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" />
					</div>
					<div class="holder">
						<label class="label" for="senha">Senha</label>
						<input class="input" type="password" id="senha" name="senha" />
					</div>

					<a href="#modalEsqueciSenha" class="btSenha linkModal">&bull; Esqueci minha senha</a>

					<button type="submit" class="btSubmit">
						Entrar
						<span class="icone"></span>
					</button>
				</form>
			</div>

			<div class="checkoutBloco checkoutBlocoRight">
				<span class="checkoutBlocoTitulo">sou um novo cliente</span>
				<span class="checkoutBlocoTxt">
					Em apenas 2 passos, crie sua conta e finalize sua compra. &Eacute; r&aacute;pido e seguro!
				</span>
				<form action="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
cadastre-se" method="get" name="checkoutForm" class="checkoutForm" lang="pt">
					<input name="redirect" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urlRedirect']->value;?>
"/>
					<div class="holder">
						<label class="label" for="email">E-mail</label>
						<input class="input" type="text" id="email" name="email" />
					</div>
					<div class="holder">
						<label class="label" for="cep">Informe seu CEP</label>
						<input class="input" type="text" id="cep" name="cep" />
					</div>
					<button type="submit" class="btSubmit">
						Criar Conta
						<span class="icone"></span>
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- MODAL ESQUECI MINHA SENHA -->
<div id="modalEsqueciSenha" class="modal">
	<span class="ttModal">Esqueci minha senha</span>
	<p>Sua senha ser&aacute; enviada para o seu e-mail cadastrado.</p>
	
	<form id="formEsqueciSenha">
		<ul>
			<li>
				<label for="iptEmailCadastrado">E-mail</label>
				<input type="text" name="iptEmailCadastrado" id="iptEmailCadastrado" />
			</li>
			<li id="msnRetorno"></li>
		</ul>
		<input type="button" id="btEnviarSenha" value="Enviar senha" />
	</form>
</div><?php }} ?>