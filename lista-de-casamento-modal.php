<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de Casamento Carrinho de Compras</title>

		<link rel="stylesheet" href="lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="lista-casamento/css/lista-de-casamento-modal.css"/>
	</head>
	<body class="bgListaCasamento">
		<div id="wrapper">
			<div class="containerGeral">
				<header id="topo"></header>
			
				<? include "lista-casamento/includes/topo.php"; ?>

				<section id="conteudoLista"></section>
			</div>

			<div id="modal">
				<div id="modalContent">
					<a id="modalFechar" class="ir" href="javascript:;">
						Fechar Modal
						<span class="icone"></span>
					</a>

					<span class="modalTitulo">
						<span>Produto adicionado a lista</span>
						<span>de casamento com sucesso!</span>
					</span>
					<div class="modalProduto table">
						<div class="table-cell">
							<img class="produtoImagem" src="lista-casamento/img/produto.jpg" alt="Titulo Produto" />
							<div class="produtoInformacoes">
								<span class="produtoTitulo">Chaleira sem tampa com apito aço inox 2 litros Tramontina</span>
								<span class="produtoValor">R$ 269,00</span>
							</div>
							<a class="modalBt modalBtContinuar" href="javascript:;">
								Continuar Comprando
								<span class="btIcone"></span>
							</a>
							<a class="modalBt modalBtIr" href="javascript:;">
								Ir para a Lista
								<span class="btIcone"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
 