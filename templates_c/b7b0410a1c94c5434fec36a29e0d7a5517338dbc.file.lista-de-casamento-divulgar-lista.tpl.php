<?php /* Smarty version Smarty-3.1.10, created on 2014-05-05 14:06:09
         compiled from "templates\lista-de-casamento-divulgar-lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4835367c501a37836-43825776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7b0410a1c94c5434fec36a29e0d7a5517338dbc' => 
    array (
      0 => 'templates\\lista-de-casamento-divulgar-lista.tpl',
      1 => 1389871237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4835367c501a37836-43825776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'idListaCasamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5367c501aacee8_88695871',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c501aacee8_88695871')) {function content_5367c501aacee8_88695871($_smarty_tpl) {?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Divulgar Lista de Casamento Divulgar Lista</title> -->

		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-divulgar-lista.css"/>
		
		<link href="../lista-casamento/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="../lista-casamento/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<!-- 	</head>
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
							<h2 class="tituloPagina">Divulgar Minha Lista</h2>

							<section class="sessao sessaoDivulgueLink">
								<span class="sessaoTitulo">Divulgue o link para seus amigos<!--  do facebook --></span>
								<div class="sessaoContent">
									<a class="link" href="/lc/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">www.comlines.com.br/lc/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</a>
									<!-- <div class="fb-share-button" data-href="http://www.comlines.com.br/lc/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" data-type="button"></div> -->
								</div>
							</section>

							<section class="sessao sessaoEnvie">
								<span class="sessaoTitulo">Envie sua lista para seus convidados por e-mail:</span>
								<div class="sessaoContent">
									<input name="tags" id="mySingleField" value="" disabled="true">
									<ul id="singleFieldTags"></ul>
									<p class="textoTags">
									Para adicionar um e-mail, digite-o e pressione enter. Para excluir da lista, basta clicar no bot&atilde;o "x".
									</p>
									<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
" name="idListaCasamento" id="idListaCasamento">
									<button type="buttom" id="btEnviarLista">
										Enviar
										<span class="btIcone btIconeBuscar"></span>
									</button>
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		<!-- </div> -->

		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		<!-- Scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8">
		</script>
		<script src="../lista-casamento/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
		<script src="../lista-casamento/js/lista-de-casamento-divulgar-lista.js" type="text/javascript" charset="utf-8"></script>
		
	<!-- </body>
</html> -->
<?php }} ?>