<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

		<div class="mainMinhaConta">
			<span class="tituloMinhaConta">Alterar Dados Cadastrais</span>
			<div id="teste"></div>
			<form id="formAlterarDadosGerais" action="actions/cadastro.php" method="post" class="formAlterarDadosCadastrais">
				<input type="hidden" id="acao" name="acao" value="alterarDadosGerais">
				{foreach $listaPessoa as $valuePessoa}
				<input type="hidden" id="tipoPessoa" value="{$valuePessoa.TIPO}">
				<input type="hidden" id="idPessoa" name="idPessoa" value="{$valuePessoa.ID_PESSOA}">
				<ul>
					<!-- PESSOA JURIDICA -->
					<li class="J">
						<label class="ttIpt" for="iptRazaoSocial">Raz&atilde;o Social</label>
						<input type="text" value="{$valuePessoa.NOME}" name="iptRazaoSocial" id="iptRazaoSocial" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptNomeFantasia">Nome Fantasia</label>
						<input type="text" value="{$valuePessoa.NOME_FANTASIA}" name="iptNomeFantasia" id="iptNomeFantasia" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptCnpj">CNPJ</label>
						<input type="text" value="{$valuePessoa.CPF}" id="iptCnpj" name="iptCnpj" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptIe">IE</label>
						<input type="text" value="{$valuePessoa.IE}" id="iptIe" name="iptIe" />
					</li>
					<li class="J">
						<label class="ttIpt" for="iptContato">Contato</label>
						<input type="text" value="{$valuePessoa.NOME_CONTATO}" id="iptContato" name="iptContato"/>
					</li>
					<!-- PESSOA FISICA -->
					<li class="F">
						<label class="ttIpt" for="iptApelido">Apelido</label>
						<input type="text" name="iptApelido" id="iptApelido" value="{$valuePessoa.APELIDO}" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptNome">Nome</label>
						<input type="text" name="iptNome" id="iptNome" value="{$valuePessoa.NOME}" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptSobrenome">Sobrenome</label>
						<input type="text" name="iptSobrenome" id="iptSobrenome" value="{$valuePessoa.SOBRENOME}" />
					</li>
					<li class="liSexo F">
						<span class="ttIpt">Sexo</span>
						<label class="lblRadio" id="lblFeminino">
							<input type="radio" name="iptSexo" value="F" {if $valuePessoa.SEXO eq 'F'}checked{/if}/>
							<span>Feminino</span>
						</label>
						<label class="lblRadio" id="lblMasculino">
							<input type="radio" name="iptSexo" value="M" {if $valuePessoa.SEXO eq 'M'}checked{/if}/>
							<span>Masculino</span>
						</label>
					</li>
					<li class="F">
						<label class="ttIpt" for="iptCpf">CPF</label>
						<input type="text" name="iptCpf" id="iptCpf" class="inputMenor" value="{$valuePessoa.CPF}" />
					</li>
					<li class="F">
						<label class="ttIpt" for="iptNascimento">Data Nascimento</label>
						<input type="text" name="iptNascimento" id="iptNascimento" class="inputMenor" value="{$valuePessoa.DATA_NASCIMENTO}" />
						
					</li>
					<li>
						<label class="ttIpt" for="iptTelefoneResidencial">Telefone residencial</label>
						<input type="text" name="iptTelefoneResidencial" id="iptTelefoneResidencial" class="inputMenor" value="{$valuePessoa.TELEFONE1}"  />
						
					</li>
					<li>
						<label class="ttIpt" for="iptTelefoneCelular">Telefone celular</label>
						<input type="text" name="iptTelefoneCelular" id="iptTelefoneCelular" class="inputMenor" value="{$valuePessoa.CELULAR}" />
						
					</li>

					<li class="liNews {if $valuePessoa.NEWSLETTER eq 'S'}checked{/if}">
						<label>
							<input type="checkbox" name="checkNewsletter" id="checkNewsletter" {if $valuePessoa.NEWSLETTER eq 'S'}checked{/if} />
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
				{/foreach}
			</form>
		</div>
	</div>
</div>
