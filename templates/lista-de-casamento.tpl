<!-- <!DOCTYPE html>
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
							{if $idListaCasamento > 0}
							<a class="bt btCriar" href="/lista-de-casamento-divulgar-lista/">
								Acessar Minha Lista
								<span class="btIcone btIconeCriar"></span>
							</a>
							{else}
							
							
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
							{/if}
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
 