$(document).ready(function(){
	init();
	validarFormCadastro();
});

document.write(unescape("%3Cscript src='js/form-cadastro.js' type='text/javascript'%3E%3C/script%3E"));

function validarFormCadastro(){

	$("#formAlterarSenha").validate({
		// Define as regras
		rules:{
			iptSenha:{
				required: true
			},
			iptNovaSenha:{
				required: true,
				minlength: 3
			},
			iptNovaSenhaRepet:{
				required: true,
				equalTo: '#iptNovaSenha'
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			iptSenha:{
				required: 'Informe sua senha atual'
			},
			iptNovaSenha:{
				required: 'Informe sua nova senha',
				minlength: 'Sua senha deve ter de 6 a 8 caracteres'
			},
			iptNovaSenhaRepet:{
				required: 'Informe sua nova senha',
				equalTo: 'Certifique-se que as senhas informadas são idênticas'
			}
		}
	});
}

$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formAlterarSenha').ajaxForm({ 

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
	if(data.retorno == 'sucesso') {
		$('#retornoAlteraSenha').html('Senha alterada com sucesso!');
		$('#formAlterarSenha').resetForm();
	} else {
		$('#retornoAlteraSenha').html('Não foi possível alterar sua senha, verifique a senha atual e tente novamente');
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
