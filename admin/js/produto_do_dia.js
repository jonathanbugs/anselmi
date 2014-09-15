$(document).ready(function() { 
	
		
    // bind form using ajaxForm 
    $('#produtoDoDia').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
        beforeSubmit: function() { 
            $('body').addClass('loadstate');
        },
 
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
        $('#tabelaProdutoDoDia').load('produto_do_dia #tabelaProdutoDoDia'); 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
    }

    $('body').removeClass('loadstate');
}