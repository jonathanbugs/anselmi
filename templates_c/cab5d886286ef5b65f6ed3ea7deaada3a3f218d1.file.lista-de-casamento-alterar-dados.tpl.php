<?php /* Smarty version Smarty-3.1.10, created on 2014-05-05 14:20:30
         compiled from "templates\lista-de-casamento-alterar-dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107075367c85e3c1d23-12644895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cab5d886286ef5b65f6ed3ea7deaada3a3f218d1' => 
    array (
      0 => 'templates\\lista-de-casamento-alterar-dados.tpl',
      1 => 1389871327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107075367c85e3c1d23-12644895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'nomeConjuge1' => 0,
    'emailConjuge1' => 0,
    'nomePaiConjuge1' => 0,
    'nomeMaeConjuge1' => 0,
    'nomeConjuge2' => 0,
    'emailConjuge2' => 0,
    'nomePaiConjuge2' => 0,
    'nomeMaeConjuge2' => 0,
    'mensagem' => 0,
    'enderecoCerimonia' => 0,
    'valueCerimonia' => 0,
    'enderecoRecepcao' => 0,
    'valueRecepcao' => 0,
    'enderecoEntrega' => 0,
    'valueEntrega' => 0,
    'valuePessoa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5367c85e52c960_66981577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c85e52c960_66981577')) {function content_5367c85e52c960_66981577($_smarty_tpl) {?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Divulgar Lista de Casamento Alterar Dados</title> -->

		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-alterar-dados.css"/>
		
		<link href="../lista-casamento/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="../lista-casamento/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
	<!-- </head>
	<body class="bgListaCasamento">
		<div id="wrapper"> -->
			<div class="containerGeral">
				
				<header id="topo"></header>
					
					<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				
				
				<section id="conteudoLista">
					<div id="produtosContent" class="clearfix">
						<div class="sidebarCategorias">
							<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/_sidebar_lista_casamento.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
						<div class="produtosListagem produtosListagemFull clearfix">
							<h2 class="tituloPagina">Alterar Meus Dados</h2>

							<!-- DADOS CONJUGES -->
							<form id="formCadastro" name="formCadastro" method="post" action="../actions/lista-casamento.php" enctype="multipart/form-data">
								<input type="hidden" name="acao" value="editaListaCasamento">
								<input type="hidden" name="idListaCasamento" value="<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
">
								<section class="sessao">
									<span class="sessaoTitulo">Dados do Casamento</span>
									<span>*Campos de preechimento obrigat&oacute;rio.</span>
									<div class="sessaoContent">
										<div class="blocoConjuge clearfix">
											<div class="blocoConjugeLeft">
												<div class="relativeInput">
													<span class="dadosTitulo">*Nome do c&ocirc;njuge 01</span>
													<label class="label labelForm" for="nome1"><!-- Nome do noivo --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nome1" name="nome1" value="<?php echo $_smarty_tpl->tpl_vars['nomeConjuge1']->value;?>
" />
												</div>
												<div class="relativeInput emailConjuge">
													<span class="dadosTitulo">*E-mail do c&ocirc;njuge 01</span>
													<label class="label labelForm" for="emailNome1"><!-- Nome do noiva --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="emailNome1" name="emailNome1" value="<?php echo $_smarty_tpl->tpl_vars['emailConjuge1']->value;?>
" />
												</div>
												<span class="divisorForm"></span>
											</div>

											<div class="blocoConjugeRight">
												<div class="relativeInput">
													<span class="dadosTitulo">Pai do c&ocirc;njuge 01</span>
													<label class="label labelForm" for="nomePai1"><!-- Nome do pai do noivo --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nomePai1" name="nomePai1" value="<?php echo $_smarty_tpl->tpl_vars['nomePaiConjuge1']->value;?>
" />
												</div>
												<div class="relativeInput relativeInputMargem">
													<span class="dadosTitulo">M&atilde;e do c&ocirc;njuge 01</span>
													<label class="label labelForm" for="nomeMae1"><!-- M&atilde;e do pai do noivo --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nomeMae1" name="nomeMae1" value="<?php echo $_smarty_tpl->tpl_vars['nomeMaeConjuge1']->value;?>
" />
												</div>
											</div>
										</div>

										<div class="blocoConjuge clearfix">
											<div class="blocoConjugeLeft">
												<div class="relativeInput">
													<span class="dadosTitulo">*Nome do c&ocirc;njuge 02</span>
													<label class="label labelForm" for="nome2"><!-- Nome do noiva --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nome2" name="nome2" value="<?php echo $_smarty_tpl->tpl_vars['nomeConjuge2']->value;?>
" />
												</div>
												<div class="relativeInput emailConjuge">
													<span class="dadosTitulo">*E-mail do c&ocirc;njuge 02</span>
													<label class="label labelForm" for="emailNome2"><!-- Nome do noiva --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="emailNome2" name="emailNome2" value="<?php echo $_smarty_tpl->tpl_vars['emailConjuge2']->value;?>
" />
												</div>
												<span class="divisorForm"></span>
											</div>

											<div class="blocoConjugeRight">
												<div class="relativeInput">
													<span class="dadosTitulo">Pai do c&ocirc;njuge 02</span>
													<label class="label labelForm" for="nomePai2"><!-- Nome do pai do noiva --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nomePai2" name="nomePai2" value="<?php echo $_smarty_tpl->tpl_vars['nomePaiConjuge2']->value;?>
" />
												</div>
												<div class="relativeInput relativeInputMargem">
													<span class="dadosTitulo">M&atilde;e do c&ocirc;njuge 02</span>
													<label class="label labelForm" for="nomeMae2"><!-- M&atilde;e do pai do noiva --></label>
													<input class="input inputForm inputFormDadosCasamento" type="text" id="nomeMae2" name="nomeMae2" value="<?php echo $_smarty_tpl->tpl_vars['nomeMaeConjuge2']->value;?>
" />
												</div>
											</div>
										</div>

										<div class="blocoConjuge clearfix">
											<div class="blocoConjugeTextarea">
												<div class="relativeInput">
													<span class="dadosTitulo">Deixe uma mensagem para seus convidados</span>
													<label class="label labelForm" for="mensagem">
														<!-- Estamos muito felizes com esta data. Obrigado por fazerem parte deste sonho -->
													</label>
													<textarea class="textarea textareaMensagem" id="mensagem" name="mensagem"><?php echo $_smarty_tpl->tpl_vars['mensagem']->value;?>
</textarea>
												</div>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput">
												<span class="dadosTitulo">Foto do Casal</span>
												<label class="fileContainer">
												    <span id="buscarFoto">Clique aqui para buscar o arquivo...</span>
												    <input type="file" id="fotoCasal" name="fotoCasal"/>
												</label>
											</div>
										</div>

									</div>

									
								</section>

								
								<?php  $_smarty_tpl->tpl_vars['valueCerimonia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCerimonia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enderecoCerimonia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCerimonia']->key => $_smarty_tpl->tpl_vars['valueCerimonia']->value){
$_smarty_tpl->tpl_vars['valueCerimonia']->_loop = true;
?><?php } ?>
								<!-- CERIMONIA -->
								<section class="sessao">
									<span class="sessaoTitulo">Dados da Cerim&ocirc;nia</span>
									<div class="sessaoContent">
										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Data</span>
												<label class="label labelForm" for="dataCerimonia"><!-- 22/10/1987 --></label>
												<input class="input inputForm inputFormData" type="text" id="dataCerimonia" name="dataCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['DATA_EVENTO'];?>
" />
												<span class="formato">DD/MM/AAAA</span>
											</div>

											<div class="relativeInput relativeInputFloat relativeInputHora">
												<span class="dadosTitulo">Hor&aacute;rio</span>
												<label class="label labelForm" for="horaCerimonia"><!-- 22:00 --></label>
												<input class="input inputForm inputFormHora" type="text" id="horaCerimonia" name="horaCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['HORA_EVENTO'];?>
" />
												<span class="formato">HH:MM</span>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput">
												<span class="dadosTitulo">Local</span>
												<label class="label labelForm" for="localCerimonia"><!-- Igreja Matriz --></label>
												<input class="input inputForm inputFormLocal" type="text" id="localCerimonia" name="localCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['LOCAL_EVENTO'];?>
" />
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">CEP</span>
												<label class="label labelForm" for="cepCerimonia"><!-- 93510-360 --></label>
												<input class="input inputForm inputFormCepEndereco" type="text" id="cepCerimonia" name="cepCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['CEP_ID_CEP'];?>
" />
												<span class="formato">
													<a class="linkCep" href="http://www.buscacep.correios.com.br/" target="_blank">N&atilde;o sabe o CEP?</a>
												</span>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Endere&ccedil;o</span>
												<label class="label labelForm" for="ruaCerimonia"><!-- Rua juiz de fora --></label>
												<input class="input inputForm inputFormCepEndereco" type="text" id="ruaCerimonia" name="ruaCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['ENDERECO'];?>
" />
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">N&uacute;mero</span>
												<label class="label labelForm" for="numeroCerimonia"><!-- 4464 --></label>
												<input class="input inputForm inputFormNumero" type="text" id="numeroCerimonia" name="numeroCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['NUMERO'];?>
" />
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Complemento</span>
												<label class="label labelForm" for="complementoCerimonia"><!-- Sala Comercial --></label>
												<input class="input inputForm inputFormComplementoBairro" type="text" id="complementoCerimonia" name="complementoCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['COMPLEMENTO'];?>
" />
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">Bairro</span>
												<label class="label labelForm" for="bairroCerimonia"><!-- Scharlau --></label>
												<input class="input inputForm inputFormComplementoBairro" type="text" id="bairroCerimonia" name="bairroCerimonia" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['BAIRRO'];?>
" />
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Estado</span>
												<label class="label labelForm" for="estadoDados"></label>
												<input class="input inputForm inputFormEstado" type="text" name="estadoCerimonia" id="estadoCerimonia" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['ESTADO'];?>
"> 
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">Cidade</span>
												<label class="label labelForm" for="cidadeCerimonia"><!-- São Leopoldo --></label>
												<input class="input inputForm inputFormCidade" type="text" id="cidadeCerimonia" name="cidadeCerimonia" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['MUNICIPIO'];?>
" />
											</div>
										</div>
									</div>
								</section>

								<?php  $_smarty_tpl->tpl_vars['valueRecepcao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueRecepcao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enderecoRecepcao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueRecepcao']->key => $_smarty_tpl->tpl_vars['valueRecepcao']->value){
$_smarty_tpl->tpl_vars['valueRecepcao']->_loop = true;
?><?php } ?>
								<!-- Recepcao -->
								<section class="sessao">
									<span class="sessaoTitulo">Dados da Recep&ccedil;ao</span>
									<div class="sessaoContent">
										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Data</span>
												<label class="label labelForm" for="dataRecepcao"><!-- 22/10/1987 --></label>
												<input class="input inputForm inputFormData" type="text" id="dataRecepcao" name="dataRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['DATA_EVENTO'];?>
" />
												<span class="formato">DD/MM/AAAA</span>
											</div>

											<div class="relativeInput relativeInputFloat relativeInputHora">
												<span class="dadosTitulo">Hor&aacute;rio</span>
												<label class="label labelForm" for="horaRecepcao"><!-- 22:00 --></label>
												<input class="input inputForm inputFormHora" type="text" id="horaRecepcao" name="horaRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['HORA_EVENTO'];?>
" />
												<span class="formato">HH:MM</span>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput">
												<span class="dadosTitulo">Local</span>
												<label class="label labelForm" for="localRecepcao"><!-- Igreja Matriz --></label>
												<input class="input inputForm inputFormLocal" type="text" id="localRecepcao" name="localRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['LOCAL_EVENTO'];?>
" />
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">CEP</span>
												<label class="label labelForm" for="cepRecepcao"><!-- 93510-360 --></label>
												<input class="input inputForm inputFormCepEndereco" type="text" id="cepRecepcao" name="cepRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['CEP_ID_CEP'];?>
" />
												<span class="formato">
													<a class="linkCep" href="javascript:;">N&atilde;o sabe o CEP?</a>
												</span>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Endere&ccedil;o</span>
												<label class="label labelForm" for="ruaRecepcao"><!-- Rua juiz de fora --></label>
												<input class="input inputForm inputFormCepEndereco" type="text" id="ruaRecepcao" name="ruaRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['ENDERECO'];?>
" />
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">N&uacute;mero</span>
												<label class="label labelForm" for="numeroRecepcao"><!-- 4464 --></label>
												<input class="input inputForm inputFormNumero" type="text" id="numeroRecepcao" name="numeroRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['NUMERO'];?>
" />
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Complemento</span>
												<label class="label labelForm" for="complementoRecepcao"><!-- Sala Comercial --></label>
												<input class="input inputForm inputFormComplementoBairro" type="text" id="complementoRecepcao" name="complementoRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['COMPLEMENTO'];?>
" />
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">Bairro</span>
												<label class="label labelForm" for="bairroRecepcao"><!-- Scharlau --></label>
												<input class="input inputForm inputFormComplementoBairro" type="text" id="bairroRecepcao" name="bairroRecepcao" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['BAIRRO'];?>
"/>
											</div>
										</div>

										<div class="blocoInput clearfix">
											<div class="relativeInput relativeInputFloat">
												<span class="dadosTitulo">Estado</span>
												<label class="label labelForm" for="estadoDados"></label>
												<input class="input inputForm inputFormEstado" type="text" name="estadoRecepcao" id="estadoRecepcao" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['ESTADO'];?>
"> 
											</div>

											<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
												<span class="dadosTitulo">Cidade</span>
												<label class="label labelForm" for="cidadeRecepcao"><!-- S&atilde;o Leopoldo --></label>
												<input class="input inputForm inputFormCidade" type="text" id="cidadeRecepcao" name="cidadeRecepcao" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['MUNICIPIO'];?>
" />
											</div>
										</div>
									</div>
								</section>

								<?php  $_smarty_tpl->tpl_vars['valueEntrega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueEntrega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enderecoEntrega']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueEntrega']->key => $_smarty_tpl->tpl_vars['valueEntrega']->value){
$_smarty_tpl->tpl_vars['valueEntrega']->_loop = true;
?><?php } ?>
								<section class="sessao">
									<span class="sessaoTitulo">Entrega dos Presentes</span>
									<div class="blocoEntrega">
										<span class="entregaTitulo">Data estimada para entrega dos presentes:</span>
										<div class="sessaoContent">
											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">*Data</span>
													<label class="label labelFormEntrega" for="dataEntrega"><!-- 22/10/1987 --></label>
													<input class="input inputFormDataEntrega" type="text" id="dataEntrega" name="dataEntrega" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['DATA_EVENTO'];?>
" />
													<span class="formatoEntrega">DD/MM/AAAA</span>
												</div>

												<div class="textoLista">
													<div class="contentTextoLista">
														<p class="descricaotextoLista">
															<span>
																A loja se reserva no direito de encerrar a compra dos produtos cadastrados na lista 7 (sete) dias &uacute;teis antes da data cadastrada ao lado, para tempo h&aacute;bil da entrega dos produtos. 
															</span>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="blocoEntrega">
										<span class="entregaTitulo">Dados para contato:</span>
										<div class="sessaoContent">
											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">*Telefone Principal</span>
													<label class="label labelForm" for="foneDados1"><!-- (51) 3581 3002 --></label>
													<input class="input inputForm inputFormFone" type="text" id="foneDados1" name="foneDados1" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['TELEFONE_PRINCIPAL'];?>
"/>
												</div>

												<!-- <div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
													<span class="dadosTitulo">Telefone Residencial</span>
													<label class="label labelForm" for="foneDados2">(51) 3581 3001</label>
													<input class="input inputForm inputFormFone" type="text" id="foneDados2" name="foneDados2" value="<?php echo $_smarty_tpl->tpl_vars['valuePessoa']->value['TELEFONE2'];?>
"/>
												</div> -->

												<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
													<span class="dadosTitulo">Telefone Celular</span>
													<label class="label labelForm" for="foneDados3"><!-- (51) 3581 3002 --></label>
													<input class="input inputForm inputFormFone" type="text" id="foneDados3" name="foneDados3" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['CELULAR'];?>
" />
												</div>
											</div>
										</div>
									</div>

									<div class="blocoEntrega">
										<span class="entregaTitulo">Dados para contato:</span>
										<div class="sessaoContent">
											<div class="blocoInput clearfix">
												<div class="relativeInput">
													<span class="dadosTitulo">*Nome do respons&aacute;vel pelo recebimento</span>
													<label class="label labelForm" for="nomeDados"><!-- Cláudia Leite --></label>
													<input class="input inputForm inputFormLocal" type="text" id="nomeDados" name="nomeDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['NOME_CONTATO'];?>
" />
												</div>
											</div>

											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">*CEP</span>
													<label class="label labelForm" for="cepDados"><!-- 93510-360 --></label>
													<input class="input inputForm inputFormCepEndereco" type="text" id="cepDados" name="cepDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['CEP_ID_CEP'];?>
" />
													<span class="formato">
														<a class="linkCep" href="http://www.buscacep.correios.com.br/" target="_blank">N&atilde;o sabe o CEP?</a>
													</span>
												</div>
											</div>

											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">*Endere&ccedil;o</span>
													<label class="label labelForm" for="ruaDados"><!-- Rua juiz de fora --></label>
													<input class="input inputForm inputFormCepEndereco" type="text" id="ruaDados" name="ruaDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['ENDERECO'];?>
" />
												</div>

												<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
													<span class="dadosTitulo">*N&uacute;mero</span>
													<label class="label labelForm" for="numeroDados"><!-- 4464 --></label>
													<input class="input inputForm inputFormNumero" type="text" id="numeroDados" name="numeroDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['NUMERO'];?>
"/>
												</div>
											</div>

											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">Complemento</span>
													<label class="label labelForm" for="complementoDados"><!-- Sala Comercial --></label>
													<input class="input inputForm inputFormComplementoBairro" type="text" id="complementoDados" name="complementoDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['COMPLEMENTO'];?>
" />
												</div>

												<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
													<span class="dadosTitulo">*Bairro</span>
													<label class="label labelForm" for="bairroDados"><!-- Scharlau --></label>
													<input class="input inputForm inputFormComplementoBairro" type="text" id="bairroDados" name="bairroDados" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['BAIRRO'];?>
"/>
												</div>
											</div>

											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">*Estado</span>
													<label class="label labelForm" for="estadoDados"></label>
													<input class="input inputForm inputFormEstado" type="text" name="estadoDados" id="estadoDados" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['ESTADO'];?>
" readonly="readonly"> 
												</div>

												<div class="relativeInput relativeInputFloat relativeInputMargemLeft2">
													<span class="dadosTitulo">*Cidade</span>
													<label class="label labelForm" for="cidadeDados"><!-- São Leopoldo --></label>
													<input class="input inputForm inputFormCidade" type="text" id="cidadeDados" name="cidadeDados" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['MUNICIPIO'];?>
" />
												</div>
											</div>

											<div class="blocoInput clearfix">
												<div class="relativeInput relativeInputFloat">
													<span class="dadosTitulo">Informa&ccedil;&otilde;es de Refer&ecirc;ncia</span>
													<label class="label labelForm" for="referenciaDados"><!-- Sala Comercial --></label>
													<textarea maxlenght="400" id="referenciaDados" name="referenciaDados"><?php echo $_smarty_tpl->tpl_vars['valueEntrega']->value['REFERENCIA'];?>
</textarea>
												</div>
											</div>

										</div>
									</div>
								</section>
								<div id="teste"></div>
								<div class="sessaoContentTermosBt">
									<!-- <ul id="termos">
										<li class="liCheckbox">
											<label class="lblCheckbox inputRadioChecked" id="lblTermos">
												<input type="checkbox" checked="checked" name="checkboxTermos">
												<span>Li e aceito os termos e condi&ccedil;&otilde;es do servi&ccedil;o</span>
											</label>
										</li>
									</ul> -->
									<button type="submit" class="btSalvar">
										Salvar Altera&ccedil;&otilde;es
										<span class="btIcone"></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		<!-- </div> -->

		<!-- Scripts -->
		<script src="../lista-casamento/js/jquery.styleCombobox.js"></script>
		<script src="../lista-casamento/js/funcoes.js" charset="utf-8"></script>
		<script src="../lista-casamento/js/formulario.js" charset="utf-8"></script>

		<noscript>
		<style type="text/css">
			.styleCombobox select {
				filter:alpha(opacity=1);
				opacity:1;
			}
		</style>
	</noscript>
	<!-- </body>
</html> -->
<?php }} ?>