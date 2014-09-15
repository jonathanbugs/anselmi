<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de Casamento Lista de Produtos</title>
 -->
		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-produtos.css"/>
<!-- 	</head>
	<body class="bgListaCasamento">
		<div id="wrapper">
 -->			<div class="containerGeral">
				<header id="topo"></header>
			
				<section id="sessaoListaCasamentoProdutos" class="sessaoListaCasamento">
					
					<div id="blocoLogo">
						<img class="logo" src="../lista-casamento/img/logo_produtos.png" alt="Lista de Casamento Comlines">
						{if $fotoCapa}
						<img class="imagemNoivos" src="../lista-casamento/fotos/{$fotoCapa}" alt="Noivos">
						{/if}
					</div>
					<div id="blocoCerinomina">
						<div id="blocoNomes">
							<span class="nome">{$nomeConjuge1}</span>
							<span class="divisor">&</span>
							<span class="nome">{$nomeConjuge2}</span>
						</div>

						<span class="linha"></span>
						<p class="cerimoniaTexto">
							<span>{$mensagem}</span>
						</p>
						<span class="linha"></span>

						<ul id="cermoniaInformacoesUl">
							<li class="cermoniaInformacoesLi">
								<div class="infomacoes">
									<span class="informacoesTitulo">CERIM&Ocirc;NIA</span>
									{foreach $enderecoCerimonia as $valueCerimonia}{/foreach}
									{if $valueCerimonia.DATA_EVENTO}
									<p class="informacoesDescricao">
										<span>Dia {$valueCerimonia.DATA_EVENTO} - {$valueCerimonia.HORA_EVENTO} horas</span>
										<span>{$valueCerimonia.LOCAL_EVENTO}, {$valueCerimonia.ENDERECO}, {$valueCerimonia.NUMERO}</span>
										<span>{$valueCerimonia.MUNICIPIO} - {$valueCerimonia.ESTADO}</span>
									</p>
									{/if}
								</div>
							</li>
							<li class="cermoniaInformacoesLi cermoniaInformacoesLiRecepcao">
								<div class="infomacoes">
									<span class="informacoesTitulo">RECEP&Ccedil;&Atilde;O</span>
									{foreach $enderecoRecepcao as $valueRecepcao}{/foreach}
									{if $valueRecepcao.DATA_EVENTO}
									<p class="informacoesDescricao">
										<span>Dia {$valueRecepcao.DATA_EVENTO} - {$valueRecepcao.HORA_EVENTO} horas</span>
										<span>{$valueRecepcao.LOCAL_EVENTO}, {$valueRecepcao.ENDERECO}, {$valueRecepcao.NUMERO}</span>
										<span>{$valueRecepcao.MUNICIPIO} - {$valueRecepcao.ESTADO}</span>
									</p>
									{/if}
								</div>
							</li>
						</ul>
					</div>
				</section>

				<section id="conteudoLista">
					<div class="container">
						<div id="produtosContent" class="clearfix">
							<div class="navegacaoContent">
								<ul class="navegacaoUl clearfix">
									<li class="navegacaoLi">
										<a class="navegacaoLink" href="{$BASE_DIR}">Inicial</a>
										{foreach $navegacaoCategoria as $valueNavegacaoCategoria}
											{if $valueNavegacaoCategoria@iteration eq $countCategorias}
											{break}
											{/if}
											/ <a class="navegacaoLink" href="{$valueNavegacaoCategoria.URL_AMIGAVEL}">{$valueNavegacaoCategoria.DESCRICAO_CATEGORIA}</a>
										{/foreach}
									</li>
								</ul>
								<h2 class="tituloCategoria">Lista de Casamento</h2>
							</div>


							<!-- SIDEBAR CATEGORIAS -->
							<!-- <div class="sidebarCategorias"> -->
								{*$menuSidebar*}

								<!-- SIDEBAR COM FILTROS --> 
								{*include file="../templates/includes/_sidebar_filtros.tpl"*}
								
								<div class="sidebarBanners">
									<ul class="bannersUl">
										<li class="bannersLi">
											<a href="/lista-de-casamento/"><img src="../../lista-casamento/img/banner_lista_casamento.png" border="0"></a>
										</li>
									</ul>
								</div>
								
							<!-- </div> -->

							{if $listaCasamentoVencida eq 'S'}
								A Lista de Casamento de {$nomeConjuge1} & {$nomeConjuge2} est&aacute; finalizada!
							{else}
								{include file="../templates/includes/_produtos.tpl"}
							{/if}
						</div>
					</div>
				</section>
			</div>
		<!-- </div> -->
	<!-- </body>
</html>
  -->