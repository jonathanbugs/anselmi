$(document).ready(function(){
	abreProduto();
	gerarRelatorio();
	imprimirRelatorio();
});

function abreProduto(){
	$('.linhaProdutoEstoque').click(function(){
		var idProduto = $(this).attr('id');
		location.href='produto-cadastra&idProduto='+idProduto+'#tab6';
	});
}

function gerarRelatorio(){
	$('#gerarRelatorio').click(function(){
		var qtd = $('#qtdEstoque').val();
		location.href='produto-estoque?qtd='+qtd
	});
}

function imprimirRelatorio(){
	$('#imprimirRelatorio').click(function(){
		$('#conteudoImprimir').printElement({
			leaveOpen:true, 
			printMode:'popup', 
			pageTitle: 'Relatorio de Estoque de Produto',
			overrideElementCSS:[
			    'css/main.css', 
			    'css/bootstrap/bootstrap.css', 
			    'css/bootstrap/bootstrap-responsive.css', 
			    'css/produto_estoque.css', {
			      href:'css/main.css', media:'print', 
			      href:'css/produto_estoque.css', media:'print',
			      href:'css/bootstrap.css', media:'print',
			      href:'css/bootstrap-responsive.css', media:'print'
			    }
			]
		});
	});
}

