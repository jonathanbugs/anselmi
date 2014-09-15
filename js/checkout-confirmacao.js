$(document).ready(function(){
	init();
});

function gravaMensagemListaCasamento(idPedido){

	var mensagem = $("#mensagemListaCasamento").val();
	$('#loader').fadeIn();

	if(idPedido > 0){
        $.post("actions/lista-casamento.php", { "acao": "gravaMensagemListaCasamento", "idPedido": idPedido, "mensagem": mensagem },
            function(data){
            if(data.retorno == 'sucesso'){
               alert('Obrigado por deixar sua mensagem!');
            } else {
                alert('Não foi possível gravar mensagem!');
            }
            $('#loader').fadeOut();
        }, "json");
	} else {
		$('#loader').fadeOut();
	}

}
