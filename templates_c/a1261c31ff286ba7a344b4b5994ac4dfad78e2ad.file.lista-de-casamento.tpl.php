<?php /* Smarty version Smarty-3.1.10, created on 2014-08-29 13:46:48
         compiled from "templates/lista-de-casamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:718010865400ae783d5131-93632465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1261c31ff286ba7a344b4b5994ac4dfad78e2ad' => 
    array (
      0 => 'templates/lista-de-casamento.tpl',
      1 => 1393340108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '718010865400ae783d5131-93632465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5400ae783efc18_97356243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5400ae783efc18_97356243')) {function content_5400ae783efc18_97356243($_smarty_tpl) {?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de Casamento</title>

		
	</head>
	<body class="bgListaCasamento">
		<div id="wrapper"> -->
			<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
			<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento.css"/>
			<div class="containerGeral">
				<section class="sessaoListaCasamento">
					<div class="containerLista clearfix">
						<div class="containerLeft">
							<div class="resultadoBuscaListaCasamento"></div>
							<img class="logoLista" src="../lista-casamento/img/logo.png" alt="Lista de Casamento Comlines">
							<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?>
							<a class="bt btCriar" href="/lista-de-casamento-divulgar-lista/">
								Acessar Minha Lista
								<span class="btIcone btIconeCriar"></span>
							</a>
							<?php }else{ ?>
							
							
							<p class="descricaoLista">
								<span>N&oacute;s queremos ajudar voc&ecirc; nesta data</span>
								<span>especial. Crie sua lista de casamento de</span>
								<span>uma maneira simples e r&aacute;pida.</span>
							</p>

							<div id="passos">
								<span class="divisor divisor1"></span>
								<span class="divisor divisor2"></span>

								<ul id="passosUl">
									<li class="passosLi passosLiPreencha">
										<div class="table tablePassos">
											<div class="table-cell">
												Preencha o formul&aacute;rio com o endere&ccedil;o e a data para a entrega dos presentes.
											</div>
										</div>
									</li>

									<li class="passosLi passosLiNavegue">
										<div class="table tablePassos">
											<div class="table-cell">
												Navegue pelas categorias e adicione produtos  a sua lista.
											</div>
										</div>
									</li>

									<li class="passosLi passosLiDivulgue">
										<div class="table tablePassos">
											<div class="table-cell">
												Divulgue a lista para seus convidados.
											</div>
										</div>
									</li>
								</ul>
							</div>
							<a class="bt btCriar" href="/lista-de-casamento-formulario/">
								Criar Lista
								<span class="btIcone btIconeCriar"></span>
							</a>
							<a class="bt btAcessar" href="/lista-de-casamento-divulgar-lista/">
								Acessar Minha Lista
								<span class="btIcone btIconeCriar"></span>
							</a>
							<!-- <a class="links" href="javascript:;">Ainda tem dúvidas? Clique aqui e entenda melhor</a> -->
							<?php }?>
						</div>

						<div class="containerRight">
							<div id="blocoForm">
								<form id="formProcura" action="javascript:;" method="post">
									<span class="formTitulo">Procurando a lista de casamento de um amigo?</span>
									<span class="formDescricao">Digite o nome dos noivos nos campos abaixo para encontr&aacute;-la:</span>
									
									<div class="relative">
										<label class="label" for="nome1">Nome do C&ocirc;njuge 01</label>
										<input class="input" type="text" id="nome1" name="nome1" />
									</div>
									<div class="relative">
										<label class="label" for="nome2">Nome do C&ocirc;njuge 02</label>
										<input class="input" type="text" id="nome2" name="nome2" />
									</div>
									<span class="loaderBuscaListaCasamento">buscando lista...</span>
									<span class="erroBusca"></span>
									<button type="submit" id="btEnviar" class="bt">
										Buscar Lista
										<span class="btIcone btIconeBuscar"></span>
									</button>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
		<!-- </div> -->

		<!-- Scripts -->
		<script src="../lista-casamento/js/jquery-1.9.1.min.js"></script>
		<script src="../lista-casamento/js/funcoes.js"></script>
		<script src="../lista-casamento/js/lista-de-casamento.js"></script>
	<!-- </body>
</html> -->
 <?php }} ?>