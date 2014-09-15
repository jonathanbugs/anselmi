<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 12:02:59
         compiled from "templates/logar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17783179805416ffa36cc263-35762903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '810b27d0e1cce1b8a8f12daeb559098187bc1944' => 
    array (
      0 => 'templates/logar.tpl',
      1 => 1406126122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17783179805416ffa36cc263-35762903',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'LINK' => 0,
    'urlRedirect' => 0,
    'erroLogar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5416ffa3710e24_54041928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416ffa3710e24_54041928')) {function content_5416ffa3710e24_54041928($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Identifica&ccedil;&atilde;o</h2>
		</div>

		<div class="ckeckoutContent clearfix">
			<div class="checkoutBloco checkoutBlocoLeft">
				<span class="checkoutBlocoTitulo">j&aacute; sou cadastrado</span>
				<form action="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
logar" method="post" name="checkoutForm" id="checkoutForm" class="checkoutForm" lang="pt">
					<input name="acao" type="hidden" value="logar" />
					<input name="redirect" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urlRedirect']->value;?>
" />
					<div class="holder">
						<label class="label" for="email">E-mail</label>
						<input class="input" type="text" id="email" name="email" />
					</div>
					<div class="holder">
						<label class="label" for="senha">Senha</label>
						<input class="input" type="password" id="senha" name="senha" />
					</div>
					<?php if ($_smarty_tpl->tpl_vars['erroLogar']->value=='S'){?>
					<div class="erroLogar">Usu&aacute;rio ou senha inv&aacute;lidos</div>
					<?php }?>

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
					Informe seu E-mail e CEP para iniciar o cadastro.<br>&Eacute; r&aacute;pido e seguro!
				</span>
				<form action="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
cadastre-se" method="get" name="checkoutForm" class="checkoutForm" lang="pt">
					<input name="redirect" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urlRedirect']->value;?>
" />
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