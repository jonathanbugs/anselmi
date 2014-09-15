$(document).ready(function(){
	placeHolder();
});


/**************
	PLACEHOLDER
**************/
function placeHolder(){
	$('.input, .textarea').on('keyup',function(){
		if($(this).val()===''){ $(this).prev().show(); }
	}).on('keydown',function(){
		$(this).prev().hide();
	}).on('change',function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	}).on('focusout',function(){
		$(this).prev().fadeTo(0,1);
		if ($(this).val()===''){ $(this).prev().show(); $(this).parent().find('.erro').show(); } else { $(this).prev().hide(); $(this).parent().find('.erro').hide(); }
	}).on('focusin',function(){
		if ($(this).val()===''){ $(this).prev().show(); $(this).prev().fadeTo(0,0.3); } else { $(this).prev().hide(); }
	}).each(function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	});
}

function excluirListaCasamento(idListaCasamento){
	$('#loader').fadeIn();
	$.post('../actions/lista-casamento.php', { 'acao': 'exluirListaCasamento', 'idListaCasamento': idListaCasamento }, function(data) {
			if(data.retorno == 'sucesso'){
				location.href=urlSite();
			} else {
				alert('Não foi possível excluir sua lista de casamento.');
			}
			$('#loader').fadeOut();
		}, 'json');

}

function removerProdutoListaCasamento(idProduto){
	$.post($BASE_DIR+"actions/lista-casamento.php", { "acao": "removeProdutoListaCasamento", "idProduto": idProduto },
	  function(data){
	    if(data.retorno == 'sucesso'){
	    	$('#li-'+idProduto).fadeOut('slow');
	    	$('#loadProdutoDesejos').load(''+window.location+' #loadProdutoDesejos');
	    } 

	  }, "json");
}