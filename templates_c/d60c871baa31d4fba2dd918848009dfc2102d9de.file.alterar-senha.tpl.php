<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 11:21:42
         compiled from "templates/alterar-senha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106972915154184776145324-82216858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd60c871baa31d4fba2dd918848009dfc2102d9de' => 
    array (
      0 => 'templates/alterar-senha.tpl',
      1 => 1404924249,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106972915154184776145324-82216858',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5418477614e695_65522904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418477614e695_65522904')) {function content_5418477614e695_65522904($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="mainMinhaConta">
			<span class="tituloMinhaConta">Alterar Senha</span>
			<div id="teste"></div>

			<form id="formAlterarSenha" class="formAlterarDadosCadastrais" action="actions/cadastro.php" method="post">
				<input type="hidden" value="alteraSenha" name="acao">
				<ul>
					<li>
						<label class="ttIpt" for="iptSenha">Digite sua senha atual</label>
						<input type="password" name="iptSenha" id="iptSenha" class="inputMenor" />
					</li>
					<li>
						<label class="ttIpt" for="iptNovaSenha">Digite sua nova senha</label>
						<input type="password" name="iptNovaSenha" id="iptNovaSenha" class="inputMenor" maxlength="8"/>
						<span class="auxIpt">Sua senha deve ter de 6 a 8 caracteres</span>
					</li>
					<li>
						<label class="ttIpt" for="iptNovaSenhaRepet">Digite sua nova senha novamente</label>
						<input type="password" name="iptNovaSenhaRepet" id="iptNovaSenhaRepet" class="inputMenor" />
					</li>
					<li id="retornoAlteraSenha"></li>
					<li class="liBtSalvarAlteracoes">
						<input type="submit" id="btSalvarAlteracoes" value="Salvar Altera&ccedil;&otilde;es" />	
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
<?php }} ?>