<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

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
