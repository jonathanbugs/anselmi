<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 11:21:17
         compiled from "templates/alterar-email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12789085715418475d9e43c6-32840215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee0dd63b8ef71f21a18a5c4e13a09e7a128f0133' => 
    array (
      0 => 'templates/alterar-email.tpl',
      1 => 1404924314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12789085715418475d9e43c6-32840215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5418475d9ef4a9_52962791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418475d9ef4a9_52962791')) {function content_5418475d9ef4a9_52962791($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="mainMinhaConta">
			<span class="tituloMinhaConta">Alterar Email</span>
			<div id="teste"></div>

			<form id="formAlterarEmail" class="formAlterarDadosCadastrais" action="actions/cadastro.php" method="post">
				<input type="hidden" value="alteraEmail" name="acao">
				<ul>
					<li>
						<label class="ttIpt" for="iptEmail">Digite seu novo e-mail</label>
						<input type="text" name="iptEmail" id="iptEmail" class="inputMenor" />
					</li>
					<li>
						<label class="ttIpt" for="iptEmailRepet">Digite seu novo e-mail novamente</label>
						<input type="text" name="iptEmailRepet" id="iptEmailRepet" class="inputMenor" />
					</li>
					<li>
						<label class="ttIpt" for="iptSenha">Digite sua senha</label>
						<input type="password" name="iptSenha" id="iptSenha" class="inputMenor" />
					</li>
					<li id="retornoAlteraEmail">
					</li>
					<li class="liBtSalvarAlteracoes">
						<input type="submit" id="btSalvarAlteracoes" value="Salvar Altera&ccedil;&otilde;es" />	

					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
<?php }} ?>