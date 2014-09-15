<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>


		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

		<div id="mainEnderecoEntrega" class="mainMinhaConta">
			<span class="tituloMinhaConta">Endere&ccedil;os de Entrega</span>
			<!--<a class="btAdicionarNovoEndereco linkModalEndereco" href="#modalEndereco" title="Adicionar Novo Endere&ccedil;o">Adicionar Novo Endere&ccedil;o</a>-->
		
			{foreach $listaEndereco as $valueEndereco}
			{if $valueEndereco.ENDERECO_PRINCIPAL eq 'S'}
			<div class="divEnderecoPrincipal">
				<span class="ttTipoEndereco">Endere&ccedil;o Principal</span>
				<div class="boxEndereco">
					<div class="clearfix">
						<div class="endereco">
							<span class="ttIdentificacaoEndereco">{$valueEndereco.APELIDO_ENDERECO}</span>
							<address>
								<span>{$valueEndereco.ENDERECO}, {$valueEndereco.NUMERO} {$valueEndereco.COMPLEMENTO}</span>
								<span>{$valueEndereco.BAIRRO} - {$valueEndereco.NOME_MUNICIPIO}/{$valueEndereco.UNFE_ID_ESTADO}</span>
								<span>CEP.: {$valueEndereco.CEP_ID_CEP}</span>
							</address>
						</div>
						<ul class="btAcoesEndereco">
							<li>
								<a href="javascript:editaEndereco({$valueEndereco.ID_PESSOA_ENDERECO});" title="Editar" class="btEditarEndereco">Editar</a>
							</li>
							<li>
								<a href="javascript:removeEndereco({$valueEndereco.ID_PESSOA_ENDERECO});" title="Remover" class="btRemoverEndereco">Remover</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="boxEndereco boxEditaEndereco" id="edita-{$valueEndereco.ID_PESSOA_ENDERECO}">
					
					<form class="formEndereco-{$valueEndereco.ID_PESSOA_ENDERECO}" id="formEndereco" name="formEndereco" action="actions/cadastro.php" method="post">
						<input name="acao" value="alteraEndereco" type="hidden">
						<input name="idPessoaEndereco" value="{$valueEndereco.ID_PESSOA_ENDERECO}" type="hidden">
						<ul class="ulEndereco">
							<li class="liCheckbox">
								<label>Endere&ccedil;o Principal</label>
								<label id="lblEnderecoPrincipal" class="lblCheckbox">
									<input type="checkbox" value="S" name="checkboxEnderecoPrincipal" {if $valueEndereco.ENDERECO_PRINCIPAL}checked{/if}/>
									
								</label>
							</li>

							<li>
								<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
								<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" value="{$valueEndereco.APELIDO_ENDERECO}" />
								<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
							</li>
							
							<li>
								<label for="iptCep">*CEP</label>
								<input type="text" id="iptCep" name="iptCep" value="{$valueEndereco.CEP_ID_CEP}" onblur="buscaEnderecoCep({$valueEndereco.ID_PESSOA_ENDERECO});" />
								<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
							</li>
							
							<li class="liRadio">
								<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
								<label id="lblResidencial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" {if $valueEndereco.TIPO_ENDERECO eq 'R'}checked{/if} id="radResidencial" value="R" />
									<span>Residencial</span>
								</label>
								<label id="lblComercial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" {if $valueEndereco.TIPO_ENDERECO eq 'C'}checked{/if} id="radComercial" value="C"/>
									<span>Comercial</span>
								</label>
							</li>
							
							<li>
								<label for="iptEndereco">*Endere&ccedil;o</label>
								<input type="text" id="iptEndereco" name="iptEndereco" value="{$valueEndereco.ENDERECO}" />
							</li>
							<li>
								<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
								<input type="text" id="iptNumero" name="iptNumero" value="{$valueEndereco.NUMERO}"/>
							</li>

							<li>
								<label for="iptComplemento">Complemento</label>
								<input type="text" id="iptComplemento" name="iptComplemento" value="{$valueEndereco.COMPLEMENTO}"/>
							</li>
							<li>
								<label id="lblBairro" for="iptBairro">*Bairro</label>
								<input type="text" id="iptBairro" name="iptBairro" value="{$valueEndereco.BAIRRO}"/>
							</li>

							<li>
								<label for="iptCidade">*Cidade</label>
								<input type="hidden" id="iptIdCidade" name="iptIdCidade" value="{$valueEndereco.MUNI_ID_MUNICIPIO}"/>
								<input type="text" id="iptCidade" name="iptCidade" value="{$valueEndereco.NOME_MUNICIPIO}" readonly />
							</li>
							<li>
								<label id="lblEstado" for="iptEstado">*Estado</label>
								<input type="text" id="iptEstado" name="iptEstado" value="{$valueEndereco.UNFE_ID_ESTADO}" readonly/>
							</li>
							<li class="liInformacoesReferencia">
								<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
								<textarea id="textAreaReferencia" name="textAreaReferencia">{$valueEndereco.REFERENCIA}</textarea>
							</li>

							<li class="liBotaoSalvar">
								<input id="btSalvarEndereco" type="submit" value="Alterar Endere&ccedil;o" />
							</li>
						</ul>
					</form>

				</div>
			</div>
			{else}
			<div class="divOutrosEnderecos">
				{if $valueEndereco@iteration eq 2}
				<span class="ttTipoEndereco">Outros Endere&ccedil;os</span>
				{/if}
				<div class="boxEndereco">
					<div class="clearfix">
						<div class="endereco">
							<span class="ttIdentificacaoEndereco">{$valueEndereco.APELIDO_ENDERECO}</span>
							<address>
								<span>{$valueEndereco.ENDERECO}, {$valueEndereco.NUMERO} {$valueEndereco.COMPLEMENTO}</span>
								<span>{$valueEndereco.BAIRRO} - {$valueEndereco.NOME_MUNICIPIO}/{$valueEndereco.UNFE_ID_ESTADO}</span>
								<span>CEP.: {$valueEndereco.CEP_ID_CEP}</span>
							</address>
						</div>
						<ul class="btAcoesEndereco">
							<li>
								<a href="javascript:editaEndereco({$valueEndereco.ID_PESSOA_ENDERECO});" title="Editar" class="btEditarEndereco">Editar</a>
							</li>
							<li>
								<a href="javascript:removeEndereco({$valueEndereco.ID_PESSOA_ENDERECO});" title="Remover" class="btRemoverEndereco">Remover</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="boxEndereco boxEditaEndereco" id="edita-{$valueEndereco.ID_PESSOA_ENDERECO}">
					
					<form class="formEndereco-{$valueEndereco.ID_PESSOA_ENDERECO}" id="formEndereco" name="formEndereco" action="actions/cadastro.php" method="post">
						<input name="acao" value="alteraEndereco" type="hidden">
						<input name="idPessoaEndereco" value="{$valueEndereco.ID_PESSOA_ENDERECO}" type="hidden">
						<ul class="ulEndereco">
							<li class="liCheckbox">
								<label>Endere&ccedil;o Principal</label>
								<label id="lblEnderecoPrincipal" class="lblCheckbox">
									<input type="checkbox" value="S" name="checkboxEnderecoPrincipal" {if $valueEndereco.ENDERECO_PRINCIPAL}checked{/if}/>
									
								</label>
							</li>

							<li>
								<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
								<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" value="{$valueEndereco.APELIDO_ENDERECO}" />
								<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
							</li>
							
							<li>
								<label for="iptCep">*CEP</label>
								<input type="text" id="iptCep" name="iptCep" value="{$valueEndereco.CEP_ID_CEP}" onblur="buscaEnderecoCep({$valueEndereco.ID_PESSOA_ENDERECO});" />
								<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
							</li>
							
							<li class="liRadio">
								<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
								<label id="lblResidencial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" {if $valueEndereco.TIPO_ENDERECO eq 'R'}checked{/if} id="radResidencial" value="R" />
									<span>Residencial</span>
								</label>
								<label id="lblComercial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" {if $valueEndereco.TIPO_ENDERECO eq 'C'}checked{/if} id="radComercial" value="C"/>
									<span>Comercial</span>
								</label>
							</li>
							
							<li>
								<label for="iptEndereco">*Endere&ccedil;o</label>
								<input type="text" id="iptEndereco" name="iptEndereco" value="{$valueEndereco.ENDERECO}" />
							</li>
							<li>
								<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
								<input type="text" id="iptNumero" name="iptNumero" value="{$valueEndereco.NUMERO}"/>
							</li>

							<li>
								<label for="iptComplemento">Complemento</label>
								<input type="text" id="iptComplemento" name="iptComplemento" value="{$valueEndereco.COMPLEMENTO}"/>
							</li>
							<li>
								<label id="lblBairro" for="iptBairro">*Bairro</label>
								<input type="text" id="iptBairro" name="iptBairro" value="{$valueEndereco.BAIRRO}"/>
							</li>

							<li>
								<label for="iptCidade">*Cidade</label>
								<input type="hidden" id="iptIdCidade" name="iptIdCidade" value="{$valueEndereco.MUNI_ID_MUNICIPIO}"/>
								<input type="text" id="iptCidade" name="iptCidade" value="{$valueEndereco.NOME_MUNICIPIO}" readonly />
							</li>
							<li>
								<label id="lblEstado" for="iptEstado">*Estado</label>
								<input type="text" id="iptEstado" name="iptEstado" value="{$valueEndereco.UNFE_ID_ESTADO}" readonly/>
							</li>
							<li class="liInformacoesReferencia">
								<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
								<textarea id="textAreaReferencia" name="textAreaReferencia">{$valueEndereco.REFERENCIA}</textarea>
							</li>

							<li class="liBotaoSalvar">
								<input id="btSalvarEndereco" type="submit" value="Alterar Endere&ccedil;o" />
							</li>
						</ul>
					</form>

				</div>
			</div>
			{/if}
			{/foreach}
		</div>
	</div>
</div>

<!-- 
	MODAL DE ENDERECO - PARA SER EXIBIDA, DEVE SER COPIADA E COLADA SEMPRE NO FINAL DO TPL 

	O LINK QUE ABRE A MODAL DEVE TER A CLASSE "linkModalEndereco" E O href DEVE SER "#modalEndereco"

	CHAMAR A FUNCAO modalEndereco(); NO .JS DA RESPECTIVA PAGINA
-->

<div id="modalEndereco" class="modal">
	<span class="ttModal">Adicionar Novo Endere&ccedil;o</span>

	<form id="formEndereco" action="javascript:;">
		<ul class="ulEndereco">
			<li>
				<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
				<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" />
				<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
			</li>
			
			<li>
				<label for="iptCep">*CEP</label>
				<input type="text" id="iptCep" name="iptCep" value="" />
				<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
			</li>
			
			<li class="liRadio">
				<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
				<label id="lblResidencial" class="lblRadio">
					<input type="radio" name="radTipoEndereco" id="radResidencial" value="Residencial" checked="checked" />
					<span>Residencial</span>
				</label>
				<label id="lblComercial" class="lblRadio">
					<input type="radio" name="radTipoEndereco" id="radComercial" value="Comercial"/>
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

			<li class="liBotaoSalvar">
				<input id="btSalvarEndereco" type="submit" value="Adicionar novo Endere&ccedil;o" />
			</li>
		</ul>
	</form>
</div>
<!-- FIM DA MODAL DE ENDERECO -->



