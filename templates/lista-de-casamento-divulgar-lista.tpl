<!-- <!DOCTYPE html>
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
			
					{include file="../lista-casamento/includes/topo.tpl"}
				
				<section id="conteudoLista">
					<div id="produtosContent" class="clearfix">
						<div class="sidebarCategorias">
							{include file="../lista-casamento/includes/_sidebar_lista_casamento.tpl"}
						</div>
						<div class="produtosListagem produtosListagemFull clearfix">
							<h2 class="tituloPagina">Divulgar Minha Lista</h2>

							<section class="sessao sessaoDivulgueLink">
								<span class="sessaoTitulo">Divulgue o link para seus amigos<!--  do facebook --></span>
								<div class="sessaoContent">
									<a class="link" href="/lc/{$url}">www2.lojaspr.com.br/lc/{$url}</a>
									<!-- <div class="fb-share-button" data-href="http://www2.lojaspr.com.br/lc/{$url}" data-type="button"></div> -->
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
									<input type="hidden" value="{$idListaCasamento}" name="idListaCasamento" id="idListaCasamento">
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
