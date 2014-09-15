<div class="container">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		{include file="../templates/includes/_navegacao_checkout.tpl"}

		<div class="ckeckoutContent clearfix">
			<div class="checkoutBloco checkoutBlocoLeft">
				<span class="checkoutBlocoTitulo">j&aacute; sou cadastrado</span>
				<form action="{$LINK}checkout-dados-pessoais" method="post" name="checkoutForm" id="checkoutForm" class="checkoutForm" lang="pt">
					<input name="acao" type="hidden" value="logar" />
					<input name="redirect" type="hidden" value="{$urlRedirect}" />
					<div class="holder">
						<label class="label" for="email">E-mail</label>
						<input class="input" type="text" id="email" name="email" value="{$login}" />
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
				<form action="{$LINK}cadastre-se" method="get" name="checkoutForm" class="checkoutForm" lang="pt">
					<input name="redirect" type="hidden" value="{$urlRedirect}"/>
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
</div>