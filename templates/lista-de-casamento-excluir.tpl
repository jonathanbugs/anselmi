<!-- <!DOCTYPE html>
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
				{include file="../lista-casamento/includes/topo.tpl"}
				
				<section id="conteudoLista">
					<div id="produtosContent" class="clearfix">
						<div class="sidebarCategorias">
							{include file="../lista-casamento/includes/_sidebar_lista_casamento.tpl"}
						</div>
						<div class="produtosListagem produtosListagemFull clearfix">
							<h2 class="tituloPagina">Excluir Minha Lista</h2>

							

							<section class="sessao sessaoEnvie">
								<div class="sessaoContent">
									Tem certeza que deseja excluir sua lista de casamento?<br><br>
									Se voc&ecirc; continuar, sua lista ser&aacute; exclu&iacute;da. Esta opera&ccedil;&atilde;o n&atilde;o pode ser desfeita.
								</div>
								<br><br>
								<div class="sessaoContentTermosBt">
									<!-- <ul id="termos">
										<li class="liCheckbox">
											<label class="lblCheckbox inputRadioChecked" id="lblTermos">
												<input type="checkbox" checked="checked" name="checkboxTermos">
												<span>Li e aceito os termos e condi&ccedil;&otilde;es do servi&ccedil;o</span>
											</label>
										</li>
									</ul> -->
									<button type="submit" class="btContinuar" onclick="javasctipt: excluirListaCasamento({$idListaCasamento});">
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
 -->