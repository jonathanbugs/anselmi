<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

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
