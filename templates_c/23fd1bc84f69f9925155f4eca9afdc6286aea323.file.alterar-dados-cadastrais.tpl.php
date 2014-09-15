<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 11:52:23
         compiled from "templates/alterar-dados-cadastrais.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21165530065416fd27945500-37039693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23fd1bc84f69f9925155f4eca9afdc6286aea323' => 
    array (
      0 => 'templates/alterar-dados-cadastrais.tpl',
      1 => 1404931213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21165530065416fd27945500-37039693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaPessoa' => 0,
    'valuePessoa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5416fd279d9702_21183331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416fd279d9702_21183331')) {function content_5416fd279d9702_21183331($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="mainMinhaConta">
			<span class="tituloMinhaConta">Alterar Dados Cadastrais</span>
			<div id="teste"></div>
			<form id="formAlterarDadosGerais" action="actions/cadastro.php" method="post" class="formAlterarDadosCadastrais">
				<input type="hidden" id="acao" name="acao" value="alterarDadosGerais">
				<?php  $_smarty_tpl->tpl_vars['valuePessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePessoa']->key => $_smarty_tpl->tpl_vars['valuePessoa']->value){
$_smarty_tpl->tpl_vars['valuePessoa']->_loop = true;
?>
				<input type="hidden" id="tipoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['TIPO'];?>
">
				<input type="hidden" id="idPessoa" name="idPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['ID_PESSOA'];?>
">
				<ul>
					<!-- PESSOA JURIDICA -->
					<li class="J">
						<label class="ttIpt" for="iptRazaoSocial">Raz&atilde;o Social</label>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['NOME'];?>
" name="iptRazaoSocial" id="iptRazaoSocial" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptNomeFantasia">Nome Fantasia</label>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['NOME_FANTASIA'];?>
" name="iptNomeFantasia" id="iptNomeFantasia" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptCnpj">CNPJ</label>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['CPF'];?>
" id="iptCnpj" name="iptCnpj" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptIe">IE</label>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['IE'];?>
" id="iptIe" name="iptIe" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptContato">Contato</label>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['NOME_CONTATO'];?>
" id="iptContato" name="iptContato"/>
					</li>
					<!-- PESSOA FISICA -->
					<li class="F">
						<label class="ttIpt" for="iptApelido">Apelido</label>
						<input type="text" name="iptApelido" id="iptApelido" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['APELIDO'];?>
" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptNome">Nome</label>
						<input type="text" name="iptNome" id="iptNome" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['NOME'];?>
" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptSobrenome">Sobrenome</label>
						<input type="text" name="iptSobrenome" id="iptSobrenome" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['SOBRENOME'];?>
" />
					</li>
					<li class="liSexo F">
						<span class="ttIpt">Sexo</span>
						<label class="lblRadio" id="lblFeminino">
							<input type="radio" name="iptSexo" value="F" <?php if ($_smarty_tpl->tpl_vars['valuePessoa']->value['SEXO']=='F'){?>checked<?php }?>/>
							<span>Feminino</span>
						</label>
						<label class="lblRadio" id="lblMasculino">
							<input type="radio" name="iptSexo" value="M" <?php if ($_smarty_tpl->tpl_vars['valuePessoa']->value['SEXO']=='M'){?>checked<?php }?>/>
							<span>Masculino</span>
						</label>
					</li>
					<li class="F">
						<label class="ttIpt" for="iptCpf">CPF</label>
						<input type="text" name="iptCpf" id="iptCpf" class="inputMenor" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['CPF'];?>
" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptNascimento">Data Nascimento</label>
						<input type="text" name="iptNascimento" id="iptNascimento" class="inputMenor" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['DATA_NASCIMENTO'];?>
" />
						
					</li>
					<li>
						<label class="ttIpt" for="iptTelefoneResidencial">Telefone residencial</label>
						<input type="text" name="iptTelefoneResidencial" id="iptTelefoneResidencial" class="inputMenor" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['TELEFONE1'];?>
"  />
						
					</li>
					<li>
						<label class="ttIpt" for="iptTelefoneCelular">Telefone celular</label>
						<input type="text" name="iptTelefoneCelular" id="iptTelefoneCelular" class="inputMenor" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['CELULAR'];?>
" />
						
					</li>

					<li class="liNews <?php if ($_smarty_tpl->tpl_vars['valuePessoa']->value['NEWSLETTER']=='S'){?>checked<?php }?>">
						<label>
							<input type="checkbox" name="checkNewsletter" id="checkNewsletter" <?php if ($_smarty_tpl->tpl_vars['valuePessoa']->value['NEWSLETTER']=='S'){?>checked<?php }?> />
							<span>Desejo receber e-mails de novidades e ofertas da loja.</span>
						</label>
					</li>

					<li>
						<label class="ttIpt" for="iptSenha">Digite sua senha</label>
						<input type="password" name="iptSenha" id="iptSenha" class="inputMenor" />
					</li>
					<li id="retornoAlteraDados">
					</li>
					
					<li class="liBtSalvarAlteracoes">
						<input type="submit" id="btSalvarAlteracoes" value="Salvar Altera&ccedil;&otilde;es" />	
					</li>
				</ul>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php }} ?>