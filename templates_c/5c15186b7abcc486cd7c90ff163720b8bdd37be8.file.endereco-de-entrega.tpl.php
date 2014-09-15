<?php /* Smarty version Smarty-3.1.10, created on 2013-12-16 09:13:27
         compiled from "templates\endereco-de-entrega.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2931252aee0574659a4-59111642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c15186b7abcc486cd7c90ff163720b8bdd37be8' => 
    array (
      0 => 'templates\\endereco-de-entrega.tpl',
      1 => 1387192267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2931252aee0574659a4-59111642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaEndereco' => 0,
    'valueEndereco' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_52aee0576227e3_53128178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aee0576227e3_53128178')) {function content_52aee0576227e3_53128178($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Dados</h2>
		</div>


		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div id="mainEnderecoEntrega" class="mainMinhaConta">
			<span class="tituloMinhaConta">Endere&ccedil;os de Entrega</span>
			<!--<a class="btAdicionarNovoEndereco linkModalEndereco" href="#modalEndereco" title="Adicionar Novo Endere&ccedil;o">Adicionar Novo Endere&ccedil;o</a>-->
		
			<?php  $_smarty_tpl->tpl_vars['valueEndereco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueEndereco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaEndereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueEndereco']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueEndereco']->key => $_smarty_tpl->tpl_vars['valueEndereco']->value){
$_smarty_tpl->tpl_vars['valueEndereco']->_loop = true;
 $_smarty_tpl->tpl_vars['valueEndereco']->iteration++;
?>
			<?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO_PRINCIPAL']=='S'){?>
			<div class="divEnderecoPrincipal">
				<span class="ttTipoEndereco">Endere&ccedil;o Principal</span>
				<div class="boxEndereco">
					<div class="clearfix">
						<div class="endereco">
							<span class="ttIdentificacaoEndereco"><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['APELIDO_ENDERECO'];?>
</span>
							<address>
								<span><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['COMPLEMENTO'];?>
</span>
								<span><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['BAIRRO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NOME_MUNICIPIO'];?>
/<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['UNFE_ID_ESTADO'];?>
</span>
								<span>CEP.: <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['CEP_ID_CEP'];?>
</span>
							</address>
						</div>
						<ul class="btAcoesEndereco">
							<li>
								<a href="javascript:editaEndereco(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" title="Editar" class="btEditarEndereco">Editar</a>
							</li>
							<li>
								<a href="javascript:removeEndereco(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" title="Remover" class="btRemoverEndereco">Remover</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="boxEndereco boxEditaEndereco" id="edita-<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
">
					
					<form class="formEndereco-<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
" id="formEndereco" name="formEndereco" action="actions/cadastro.php" method="post">
						<input name="acao" value="alteraEndereco" type="hidden">
						<input name="idPessoaEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
" type="hidden">
						<ul class="ulEndereco">
							<li class="liCheckbox">
								<label>Endere&ccedil;o Principal</label>
								<label id="lblEnderecoPrincipal" class="lblCheckbox">
									<input type="checkbox" value="S" name="checkboxEnderecoPrincipal" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO_PRINCIPAL']){?>checked<?php }?>/>
									
								</label>
							</li>

							<li>
								<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
								<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['APELIDO_ENDERECO'];?>
" />
								<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
							</li>
							
							<li>
								<label for="iptCep">*CEP</label>
								<input type="text" id="iptCep" name="iptCep" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['CEP_ID_CEP'];?>
" onblur="buscaEnderecoCep(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" />
								<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
							</li>
							
							<li class="liRadio">
								<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
								<label id="lblResidencial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['TIPO_ENDERECO']=='R'){?>checked<?php }?> id="radResidencial" value="R" />
									<span>Residencial</span>
								</label>
								<label id="lblComercial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['TIPO_ENDERECO']=='C'){?>checked<?php }?> id="radComercial" value="C"/>
									<span>Comercial</span>
								</label>
							</li>
							
							<li>
								<label for="iptEndereco">*Endere&ccedil;o</label>
								<input type="text" id="iptEndereco" name="iptEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO'];?>
" />
							</li>
							<li>
								<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
								<input type="text" id="iptNumero" name="iptNumero" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NUMERO'];?>
"/>
							</li>

							<li>
								<label for="iptComplemento">Complemento</label>
								<input type="text" id="iptComplemento" name="iptComplemento" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['COMPLEMENTO'];?>
"/>
							</li>
							<li>
								<label id="lblBairro" for="iptBairro">*Bairro</label>
								<input type="text" id="iptBairro" name="iptBairro" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['BAIRRO'];?>
"/>
							</li>

							<li>
								<label for="iptCidade">*Cidade</label>
								<input type="hidden" id="iptIdCidade" name="iptIdCidade" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['MUNI_ID_MUNICIPIO'];?>
"/>
								<input type="text" id="iptCidade" name="iptCidade" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NOME_MUNICIPIO'];?>
" readonly />
							</li>
							<li>
								<label id="lblEstado" for="iptEstado">*Estado</label>
								<input type="text" id="iptEstado" name="iptEstado" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['UNFE_ID_ESTADO'];?>
" readonly/>
							</li>
							<li class="liInformacoesReferencia">
								<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
								<textarea id="textAreaReferencia" name="textAreaReferencia"><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['REFERENCIA'];?>
</textarea>
							</li>

							<li class="liBotaoSalvar">
								<input id="btSalvarEndereco" type="submit" value="Alterar Endere&ccedil;o" />
							</li>
						</ul>
					</form>

				</div>
			</div>
			<?php }else{ ?>
			<div class="divOutrosEnderecos">
				<?php if ($_smarty_tpl->tpl_vars['valueEndereco']->iteration==2){?>
				<span class="ttTipoEndereco">Outros Endere&ccedil;os</span>
				<?php }?>
				<div class="boxEndereco">
					<div class="clearfix">
						<div class="endereco">
							<span class="ttIdentificacaoEndereco"><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['APELIDO_ENDERECO'];?>
</span>
							<address>
								<span><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['COMPLEMENTO'];?>
</span>
								<span><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['BAIRRO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NOME_MUNICIPIO'];?>
/<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['UNFE_ID_ESTADO'];?>
</span>
								<span>CEP.: <?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['CEP_ID_CEP'];?>
</span>
							</address>
						</div>
						<ul class="btAcoesEndereco">
							<li>
								<a href="javascript:editaEndereco(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" title="Editar" class="btEditarEndereco">Editar</a>
							</li>
							<li>
								<a href="javascript:removeEndereco(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" title="Remover" class="btRemoverEndereco">Remover</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="boxEndereco boxEditaEndereco" id="edita-<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
">
					
					<form class="formEndereco-<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
" id="formEndereco" name="formEndereco" action="actions/cadastro.php" method="post">
						<input name="acao" value="alteraEndereco" type="hidden">
						<input name="idPessoaEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
" type="hidden">
						<ul class="ulEndereco">
							<li class="liCheckbox">
								<label>Endere&ccedil;o Principal</label>
								<label id="lblEnderecoPrincipal" class="lblCheckbox">
									<input type="checkbox" value="S" name="checkboxEnderecoPrincipal" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO_PRINCIPAL']){?>checked<?php }?>/>
									
								</label>
							</li>

							<li>
								<label for="iptIdentificacaoEndereco">*D&ecirc; um nome a este endere&ccedil;o</label>
								<input type="text" name="iptIdentificacaoEndereco" id="iptIdentificacaoEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['APELIDO_ENDERECO'];?>
" />
								<span class="auxCampo">Ex.: Trabalho, Casa dos pais...</span>
							</li>
							
							<li>
								<label for="iptCep">*CEP</label>
								<input type="text" id="iptCep" name="iptCep" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['CEP_ID_CEP'];?>
" onblur="buscaEnderecoCep(<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ID_PESSOA_ENDERECO'];?>
);" />
								<a class="linkConsultarCep" href="http://www.buscacep.correios.com.br/" target="_blank" title="N&atilde;o sei meu CEP">N&atilde;o sei meu CEP</a>
							</li>
							
							<li class="liRadio">
								<label>*Identifica&ccedil;&atilde;o de endere&ccedil;o</label>
								<label id="lblResidencial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['TIPO_ENDERECO']=='R'){?>checked<?php }?> id="radResidencial" value="R" />
									<span>Residencial</span>
								</label>
								<label id="lblComercial" class="lblRadio">
									<input type="radio" name="radTipoEndereco" <?php if ($_smarty_tpl->tpl_vars['valueEndereco']->value['TIPO_ENDERECO']=='C'){?>checked<?php }?> id="radComercial" value="C"/>
									<span>Comercial</span>
								</label>
							</li>
							
							<li>
								<label for="iptEndereco">*Endere&ccedil;o</label>
								<input type="text" id="iptEndereco" name="iptEndereco" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['ENDERECO'];?>
" />
							</li>
							<li>
								<label id="lblNumero" for="iptNumero">*N&uacute;mero</label>
								<input type="text" id="iptNumero" name="iptNumero" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NUMERO'];?>
"/>
							</li>

							<li>
								<label for="iptComplemento">Complemento</label>
								<input type="text" id="iptComplemento" name="iptComplemento" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['COMPLEMENTO'];?>
"/>
							</li>
							<li>
								<label id="lblBairro" for="iptBairro">*Bairro</label>
								<input type="text" id="iptBairro" name="iptBairro" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['BAIRRO'];?>
"/>
							</li>

							<li>
								<label for="iptCidade">*Cidade</label>
								<input type="hidden" id="iptIdCidade" name="iptIdCidade" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['MUNI_ID_MUNICIPIO'];?>
"/>
								<input type="text" id="iptCidade" name="iptCidade" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['NOME_MUNICIPIO'];?>
" readonly />
							</li>
							<li>
								<label id="lblEstado" for="iptEstado">*Estado</label>
								<input type="text" id="iptEstado" name="iptEstado" value="<?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['UNFE_ID_ESTADO'];?>
" readonly/>
							</li>
							<li class="liInformacoesReferencia">
								<label for="textAreaReferencia">Informa&ccedil;&otilde;es de refer&ecirc;ncia</label>
								<textarea id="textAreaReferencia" name="textAreaReferencia"><?php echo $_smarty_tpl->tpl_vars['valueEndereco']->value['REFERENCIA'];?>
</textarea>
							</li>

							<li class="liBotaoSalvar">
								<input id="btSalvarEndereco" type="submit" value="Alterar Endere&ccedil;o" />
							</li>
						</ul>
					</form>

				</div>
			</div>
			<?php }?>
			<?php } ?>
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



<?php }} ?>