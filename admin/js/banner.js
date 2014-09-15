$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#cadastraBanner').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
        beforeSubmit: function() { 
            $('body').addClass('loadstate');
        },
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //    $('#teste').fadeIn('slow'); 
        // } 
    }); 

});

function processJson(data) { 
    $('body').removeClass('loadstate');
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        if(data.redirect){
            setTimeout("document.location = '"+data.redirect+"'",2000);
        }
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
    }
}