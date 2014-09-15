$(document).ready(function(){
	fnAlteraQuantidadeProdutoListaCasamento();	
});

function fnAlteraQuantidadeProdutoListaCasamento(){

	$('.iptQtdeProduto').live('blur', function(){
		var idProduto = $(this).attr('id');
		idProduto = idProduto.replace('iptQtdeProduto-', '');
		var quantidade = $(this).val();
		if(quantidade > 0){
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		} 
	});

	$('.btAddQuantidade').live('click', function(){
		var idProduto = $(this).attr('id');
		idProduto = idProduto.replace('btAddQuantidade-', '');
		var quantidade = $('#iptQtdeProduto-'+idProduto).val();
		quantidade = Number(quantidade)+1;
		if(quantidade >= 1){
			$('#iptQtdeProduto-'+idProduto).val(quantidade);
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		}
	});

	$('.btRemoverQuantidade').live('click', function(){
		var idProduto = $(this).attr('id');
		idProduto = idProduto.replace('btRemoverQuantidade-', '');
		var quantidade = $('#iptQtdeProduto-'+idProduto).val();
		quantidade = Number(quantidade)-1;
		if(quantidade >= 1){
			$('#iptQtdeProduto-'+idProduto).val(quantidade);
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		}
	});
}

function alteraQuantidadeProdutoListaCasamento(idProduto, quantidade){
	var url = urlSite();
	$.post(url+"/actions/lista-casamento.php", { "acao": "alteraQuantidadeProduto", "idProduto": idProduto, "quantidade": quantidade },
		function(data){
			if(data.retorno == 'erro'){
				alert('Não foi possível alterar a quantidade do produto!');
			}
		},'json');	
}