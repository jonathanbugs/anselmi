$(document).ready(function(){
	buscaListaCasamento();
});

function buscaListaCasamento(){
	$('#formProcura #btEnviar').click(function(){
		$('.loaderBuscaListaCasamento').css('display', 'block');
		$('.erroBusca').html('');
		var conjuge1 = $('#formProcura #nome1').val();
		var conjuge2 = $('#formProcura #nome2').val();

		if(conjuge1 == '' && conjuge2 == ''){
			$('.erroBusca').html('Informe pelo menos um c&ocirc;njuge');
			$('.loaderBuscaListaCasamento').css('display', 'none');
		} else {
			$.post($BASE_DIR+"actions/lista-casamento.php", { "acao": "buscaListaCasamento", "conjuge1": conjuge1, "conjuge2": conjuge2 },
		        function(data){
		        	$('.loaderBuscaListaCasamento').css('display', 'none');
					$('.resultadoBuscaListaCasamento').fadeIn().html(data);	        
		    });
		}
	});
}