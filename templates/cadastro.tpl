<!-- TOPO -->
{include file='_topo2.tpl'}

<div class="container">
	<div class="conteudoCapa clearfix">
		<div class="blocoBanners blocoBannerClube">
			<div class="conteudoBanner clearfix">
				<div class="blocoLogo">
					<img src="{$IMG_DIR}logos/clube_anselmi2.png" alt="Clube Anselmi" />
				</div>

				<div class="blocoOpcoes">
					<p>
						O Clube ANSELMI &eacute; destinado para lojistas que queiram comprar nossos produtos e revender.
					</p>

					<ul class="opcoes">
						<li>
							<a href="javascript:;">fazer login</a>
						</li>
					</ul>
				</div>
			</div>
		</div>	
	</div>

	<div class="conteudoCapa clearfix">
		<div class="blocoFormulario">
			<form  id="formContato" class="formGeral clearfix" method="post" action="javascript:void(0);" lang="pt">
				<div class="blocoEngloba">
					<div class="blocoForm clearfix">
						<label class="label" for="email">E-mail</label>
						<div class="relative">
							<input type="email" id="email" name="email" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<div class="bloco">
							<label class="label" for="senha">Senha</label>
							<div class="relative">
								<input type="password" id="senha" name="senha" class="inputForm">
							</div>
						</div>

						<div class="bloco blocoDireita">
							<label class="label" for="confirmaSenha">Confirmar Senha</label>
							<div class="relative">
								<input type="password" id="confirmaSenha" name="confirmaSenha" class="inputForm">
							</div>
						</div>
					</div>
				</div>

				<div class="blocoEngloba">
					<div class="blocoForm clearfix">
						<label class="label" for="razaoSocial">Raz&atilde;o Social</label>
						<div class="relative">
							<input type="text" id="razaoSocial" name="razaoSocial" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<label class="label" for="nomeFantasia">Nome Fantasia</label>
						<div class="relative">
							<input type="text" id="nomeFantasia" name="nomeFantasia" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<label class="label" for="cnpj">CNPJ</label>
						<div class="relative">
							<input type="text" id="cnpj" name="cnpj" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<label class="label" for="inscricaoEstadual">Inscri&ccedil;&atilde;o Estadual</label>
						<div class="relative">
							<input type="text" id="inscricaoEstadual" name="inscricaoEstadual" class="inputForm">
						</div>
					</div>
				</div>

				<div class="blocoEngloba">
					<div class="blocoForm clearfix">
						<label class="label" for="nome">Nome Contato</label>
						<div class="relative">
							<input type="text" id="nome" name="nome" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<div class="bloco">
							<label class="label" for="telefone">Telefone</label>
							<div class="relative">
								<input type="text" id="telefone" name="telefone" class="inputForm">
							</div>
						</div>

						<div class="bloco blocoDireita">
							<label class="label" for="celular">Celular</label>
							<div class="relative">
								<input type="text" id="celular" name="celular" class="inputForm">
							</div>
						</div>
					</div>
				</div>

				<div class="blocoEngloba">
					<div class="blocoForm clearfix">
						<label class="label" for="cep">CEP</label>
						<div class="relative">
							<input type="text" id="cep" name="cep" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<label class="label" for="endereco">Endere&ccedil;o</label>
						<div class="relative">
							<input type="text" id="endereco" name="endereco" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<div class="bloco blocoMenor">
							<label class="label" for="numero">N&uacute;mero</label>
							<div class="relative">
								<input type="text" id="numero" name="numero" class="inputForm">
							</div>
						</div>

						<div class="bloco blocoDireita blocoMaior">
							<label class="label" for="complemento">Complemento</label>
							<div class="relative">
								<input type="text" id="complemento" name="complemento" class="inputForm">
							</div>
						</div>
					</div>

					<div class="blocoForm clearfix">
						<label class="label" for="bairro">Bairro</label>
						<div class="relative">
							<input type="text" id="bairro" name="bairro" class="inputForm">
						</div>
					</div>

					<div class="blocoForm clearfix">
						<div class="bloco blocoMaior">
							<label class="label" for="cidade">Cidade</label>
							<div class="relative">
								<input type="text" id="cidade" name="cidade" class="inputForm">
							</div>
						</div>

						<div class="bloco blocoDireita blocoMenor">
							<label class="label" for="uf">UF</label>
							<div class="relative">
								<input type="text" id="uf" name="uf" class="inputForm">
							</div>
						</div>
					</div>
				</div>

				<div class="blocoEngloba">
					<div class="bloco blocoReceber">
						<label class="checkboxPersonalizado" for="receberNews"> 
							<input type="checkbox" name="checkbox" id="receberNews" /> 
							Desejo receber novidades e promo&ccedil;&otilde;es da loja por e-mail
						</label>
					</div>
				</div>

				<div class="blocoEngloba">
					<button class="btn" type="submit">cadastrar</button>
				</div>
			</form>

		</div>

		<div class="blocoBanner">
			<img src="{$IMG_DIR}banner_cadastro.jpg" alt="" />
		</div>
	</div>
</div>

<!-- RODAPE -->
{include file='_rodape2.tpl'}
