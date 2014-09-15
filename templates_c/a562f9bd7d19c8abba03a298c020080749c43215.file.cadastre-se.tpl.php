<?php /* Smarty version Smarty-3.1.10, created on 2014-04-24 10:58:27
         compiled from "templates\cadastre-se.tpl" */ ?>
<?php /*%%SmartyHeaderCode:477653591883861964-16696692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a562f9bd7d19c8abba03a298c020080749c43215' => 
    array (
      0 => 'templates\\cadastre-se.tpl',
      1 => 1398346397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '477653591883861964-16696692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlRedirect' => 0,
    'email' => 0,
    'cep' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53591883885d26_86862084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53591883885d26_86862084')) {function content_53591883885d26_86862084($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Cadastre-se</h2>
		</div>


		<div class="mainCadastrese">
			<form action="../actions/cadastro.php" method="post" name="formCadastro" id="formCadastro" lang="pt" >
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urlRedirect']->value;?>
" name="redirect" id="redirect">
				<input type="hidden" value="cadastraPessoa" name="acao">
				<span class="subttCadastrese">Meus Dados de Acesso</span>
				<ul class="ulMeusDados ulGrupoForm">
					<li>*Campos de preechimento obrigat&oacute;rio.</li>
					<li>
						<label id="lblEmail" for="iptEmail">*E-mail</label>
						<input type="text" id="iptEmail" name="iptEmail" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" />
						<span class="erroFormCadastro"></span>
					</li>
					<li>
						<label id="lblConfirmacaoEmail" for="iptConfirmacaoEmail">*Digite seu e-mail novamente</label>
						<input type="text" id="iptConfirmacaoEmail" name="iptConfirmacaoEmail" />
						<span class="erroFormCadastro"></span>
					</li>
					<li>
						<label id="lblSenha" for="pswSenha">*Senha</label>
						<input type="password" id="pswSenha" name="pswSenha" />
						<span class="erroFormCadastro"></span>
					</li>
					<li>
						<label id="lblConfirmacaoSenha" for="pswConfirmacaoSenha">*Digite sua senha novamente</label>
						<input type="password" id="pswConfirmacaoSenha" name="pswConfirmacaoSenha" />
						<span class="erroFormCadastro"></span>
					</li>
					<li class="liCheckbox">
						<label id="lblReceberNews" class="lblCheckbox" class="checked">
							<input type="checkbox" name="checkboxReceberNews" checked="checked"/>
							<span>Desejo receber novidades e promo&ccedil;&otilde;es da loja por e-mail</span>
						</label>
					</li>
				</ul>

				<span class="subttCadastrese">Meus Dados Cadastrais</span>
				<ul class="ulMeusDadosCadastrais ulGrupoForm">
					<li>
						<label id="lblPessoaFisica" class="lblRadio checked">
							<input type="radio" name="radTipoPessoa" id="radPessoaFisica" value="F" checked="checked"/>
							<span>Pessoa f&iacute;sica</span>
						</label>
						<label id="lblPessoaJuridica" class="lblRadio">
							<input type="radio" name="radTipoPessoa" id="radPessoaJuridica" value="J"/>
							<span>Pessoa jur&iacute;dica</span>
						</label>
					</li>
					<li class="F">
						<label for="iptApelido">Como gostaria de ser chamado?</label>
						<input type="text" name="iptApelido" id="iptApelido" />
					</li>
					<li class="J">
						<label for="iptRazaoSocial">*Raz&atilde;o Social</label>
						<input type="text" name="iptRazaoSocial" id="iptRazaoSocial" />
					</li>
					<li class="J">
						<label for="iptNomeFantasia">*Nome Fantasia</label>
						<input type="text" name="iptNomeFantasia" id="iptNomeFantasia" />
					</li>
					<li class="F">
						<label for="iptNome">*Nome</label>
						<input type="text" name="iptNome" id="iptNome" />
					</li>
					<li class="F">
						<label for="iptSobrenome">*Sobrenome</label>
						<input type="text" name="iptSobrenome" id="iptSobrenome" />
					</li>
					<li class="F">
						<label>Sexo</label>
						<label id="lblFeminino" class="lblRadio checked">
							<input type="radio" id="radFeminino" name="radSexo" value="F" checked="checked"/>
							<span>Feminino</span>
						</label>
						<label id="lblMasculino" class="lblRadio">
							<input type="radio" id="radMasculino" name="radSexo" value="M" />
							<span>Masculino</span>
						</label>
					</li>
					<li class="F">
						<label for="iptCpf">*CPF</label>
						<input type="text" id="iptCpf" name="iptCpf" />
						<!--<a class="linkSobreCpf" href="javascript:;" title="Porque preciso informar meu CPF">Porque preciso informar meu CPF</a>-->
					</li>
					<li class="J">
						<label for="iptCnpj">*CNPJ</label>
						<input type="text" id="iptCnpj" name="iptCnpj" />
					</li>
					<li class="J">
						<label for="iptIe">IE</label>
						<input type="text" id="iptIe" name="iptIe" />
					</li>
					<li class="F">
						<label for="iptDataNascimento">*Data Nascimento</label>
						<input type="text" id="iptDataNascimento" name="iptDataNascimento" />
						<!--<span class="auxCampo">99/99/9999</span>-->
					</li>
					<li class="J">
						<label for="iptContato">*Contato</label>
						<input type="text" id="iptContato" name="iptContato"/>
					</li>
					<li>
						<label for="iptTelefoneResidencial">*Telefone principal</label>
						<input type="text" id="iptTelefoneResidencial" name="iptTelefoneResidencial" />
						<!--<span class="auxCampo">Ex.: (99) 7291-7000</span>-->
					</li>
					<li>
						<label for="iptTelefoneCelular">Telefone celular</label>
						<input type="text" id="iptTelefoneCelular" name="iptTelefoneCelular"/>
						<!--<span class="auxCampo">Ex.: (99) 7291-7000</span>-->
					</li>
					<li>
						<label for="iptTelefoneComercial">Telefone comercial</label>
						<input type="text" id="iptTelefoneComercial" name="iptTelefoneComercial"/>
						<!--<span class="auxCampo">Ex.: (99) 7291-7000</span>-->
					</li>
				</ul>

				<span class="subttCadastrese">Meu Endere&ccedil;o</span>

				<ul class="ulMeuEndereco ulGrupoForm">
					<li class="J">
						IMPORTANTE! Mercadorias vendidas para pessoa jur&iacute;dica, somente poder&atilde;o ser entregues no endere&ccedil;o que consta no CNPJ.
					</li>
					<li>
						<label for="iptCep">*CEP</label>
						<input type="text" id="iptCep" name="iptCep" value="<?php echo $_smarty_tpl->tpl_vars['cep']->value;?>
" />
						<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
					</li>
					
					<li>
						<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
						<label id="lblResidencial" class="lblRadio">
							<input type="radio" name="radTipoEndereco" id="radResidencial" value="R" />
							<span>Residencial</span>
						</label>
						<label id="lblComercial" class="lblRadio">
							<input type="radio" name="radTipoEndereco" id="radComercial" value="C"/>
							<span>Comercial</span>
						</label>
					</li>
					
					<li>
						<label for="iptEndereco">*Endere&ccedil;o</label>
						<input type="text" id="iptEndereco" name="iptEndereco" />
					</li>
					<li>
						<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
						<input type="text" id="iptNumero" name="iptNumero" />
					</li>

					<li>
						<label for="iptComplemento">Complemento</label>
						<input type="text" id="iptComplemento" name="iptComplemento" />
					</li>
					<li>
						<label id="lblBairro" for="iptBairro">*Bairro</label>
						<input type="text" id="iptBairro" name="iptBairro" />
					</li>

					<li>
						<label for="iptCidade">*Cidade</label>
						<input type="hidden" id="iptIdCidade" name="iptIdCidade"/>
						<input type="text" id="iptCidade" name="iptCidade" readonly />
					</li>
					<li>
						<label id="lblEstado" for="iptEstado">*Estado</label>
						<input type="text" id="iptEstado" name="iptEstado" readonly/>
					</li>
					<li class="liInformacoesReferencia">
						<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
						<textarea id="textAreaReferencia" name="textAreaReferencia"></textarea>
					</li>
				</ul>
<div id="teste"></div>
				<input id="btCadastrar" type="submit" value="Cadastrar" />
			</form>
		</div>
	</div>
</div>
<?php }} ?>