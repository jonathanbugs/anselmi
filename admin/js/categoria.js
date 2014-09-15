$('input[name=categoriaAtiva]').on('click', function(){
	var idCategoria = $(this).attr('id');
	var ativo = $(this).is(':checked');
	$.post('actions/categoria.php', { 'acao': 'ativaCategoria', 'idCategoria': idCategoria, 'ativaCategoria': ativo },
	  function(data){
	    if(data.cod == "sucesso") { 
	        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
	    } else { 
	        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
	    }
	  }, 'json');
});


$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#cadastroCategoria').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        beforeSubmit: function() { 
            $('body').addClass('loadstate');
        },
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        //success: function() { 
        //    $('#teste').fadeIn('slow'); 
        //} 
    }); 
 
});

function processJson(data) {
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        setTimeout("document.location = '"+data.redirect+"'",1000);
    }
}