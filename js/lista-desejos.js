$(document).ready(function(){
	init();

});

function removerProdutoDesejo(idProdutoDesejo){
	$.post($BASE_DIR+"actions/lista-desejos.php", { "acao": "removeProdutoDesejo", "idProdutoDesejo": idProdutoDesejo },
	  function(data){
	    if(data.retorno == 'sucesso'){
	    	$('#li-'+idProdutoDesejo).fadeOut('slow');
	    	$('#loadProdutoDesejos').load(''+window.location+' #loadProdutoDesejos');
	    } 
	  }, "json");
}
