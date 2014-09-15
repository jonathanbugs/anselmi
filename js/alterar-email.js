$(document).ready(function(){
	init();
	validarFormCadastro();
});

document.write(unescape("%3Cscript src='js/form-cadastro.js' type='text/javascript'%3E%3C/script%3E"));

function validarFormCadastro(){

	$("#formAlterarEmail").validate({
		// Define as regras
		rules:{
			iptEmail:{
				required: true,
				email: true
			},
			iptEmailRepet:{
				required: true,
				email: true,
				equalTo: '#iptEmail'
			},
			iptSenha:{
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			iptEmail:{
				required: 'Informe seu novo e-mail',
				email: 'Informe um e-mail válido'
			},
			iptEmailRepet:{
				required: 'Informe seu novo e-mail',
				email: 'Informe um e-mail válido',
				equalTo: 'Certifique-se que os e-mails informados são idênticos'
			},
			iptSenha:{
				required: 'Informe sua senha',
			}
		}
	});
}

$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formAlterarEmail').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
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
	if(data.retorno == 'email'){
		$('#retornoAlteraEmail').html('E-mail já consta em nossos cadastros');
	} else if(data.retorno == 'sucesso') {
		$('#retornoAlteraEmail').html('E-mail alterado com sucesso!');
		$('#formAlterarEmail').resetForm();
	} else {
		$('#retornoAlteraEmail').html('Não foi possível alterar seu e-mail, verifique a senha e tente novamente');
	}
}

$(document).on({
    ajaxStart: function() { 
        $('#loader').fadeIn();
    },
    ajaxStop: function() { 
        $('#loader').fadeOut();
    }    
});
