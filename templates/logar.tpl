{if $idListaCasamento}
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	{include file="../lista-casamento/includes/topo.tpl"}
{/if}
<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Identifica&ccedil;&atilde;o</h2>
		</div>

		<div class="ckeckoutContent clearfix">
			<div class="checkoutBloco checkoutBlocoLeft">
				<span class="checkoutBlocoTitulo">j&aacute; sou cadastrado</span>
				<form action="{$LINK}logar" method="post" name="checkoutForm" id="checkoutForm" class="checkoutForm" lang="pt">
					<input name="acao" type="hidden" value="logar" />
					<input name="redirect" type="hidden" value="{$urlRedirect}" />
					<div class="holder">
						<label class="label" for="email">E-mail</label>
						<input class="input" type="text" id="email" name="email" />
					</div>
					<div class="holder">
						<label class="label" for="senha">Senha</label>
						<input class="input" type="password" id="senha" name="senha" />
					</div>
					{if $erroLogar eq 'S'}
					<div class="erroLogar">Usu&aacute;rio ou senha inv&aacute;lidos</div>
					{/if}

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
				<form action="{$LINK}cadastre-se" method="get" name="checkoutForm" class="checkoutForm" lang="pt">
					<input name="redirect" type="hidden" value="{$urlRedirect}" />
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