<?php /* Smarty version Smarty-3.1.10, created on 2013-11-20 10:17:01
         compiled from "templates\lista-de-casamento-excluir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26895528ca83d5802b0-31359546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '685f4c188fa4c254afd74f83573e69b232f9d879' => 
    array (
      0 => 'templates\\lista-de-casamento-excluir.tpl',
      1 => 1383668740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26895528ca83d5802b0-31359546',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_528ca83d597037_45236222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528ca83d597037_45236222')) {function content_528ca83d597037_45236222($_smarty_tpl) {?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Divulgar Lista de Casamento Divulgar Lista</title> -->

		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-divulgar-lista.css"/>
		
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
							<h2 class="tituloPagina">Excluir Minha Lista</h2>

							

							<section class="sessao sessaoEnvie">
								<div class="sessaoContent">
									Tem certeza que deseja excluir sua lista de casamento?<br><br>
									Se voc&ecirc; continuar, sua lista ser&aacute; exclu&iacute;da. Esta opera&ccedil;&atilde;o n&atilde;o pode ser desfeita.
								</div>
								<br><br>
								<div id="teste">123</div>
								<div class="sessaoContentTermosBt">
									<!-- <ul id="termos">
										<li class="liCheckbox">
											<label class="lblCheckbox inputRadioChecked" id="lblTermos">
												<input type="checkbox" checked="checked" name="checkboxTermos">
												<span>Li e aceito os termos e condi&ccedil;&otilde;es do servi&ccedil;o</span>
											</label>
										</li>
									</ul> -->
									<button type="submit" class="btContinuar" onclick="javasctipt: excluirListaCasamento(<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
);">
										Continuar
										<span class="btIcone"></span>
									</button>
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
<!-- 		</div> -->

		<script src="../lista-casamento/js/funcoes.js"></script>
	<!-- </body>
</html>
 --><?php }} ?>