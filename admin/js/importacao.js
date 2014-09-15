$(document).ready(function() { 
	
	$("#loading").hide();
	
	$("#loading").ajaxStart(function () {
        $(this).show();
        $("button").attr("disabled", "disabled");
    });

	$("#loading").ajaxStop(function () {
        $(this).hide();
        $("button").removeAttr("disabled");
    });
	
    // bind form using ajaxForm 
    $('#importaArquivo').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        //dataType:  'json', 
        target: '#retorno',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        //success:   processJson 
        success: function() { 
            $('#retorno').fadeIn('slow'); 
        } 
    }); 
 
});

function processJson(data) {
	
	$("#loader").show();
	
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        setTimeout("document.location = '"+data.redirect+"'",2000);
    }
}