$(document).ready(function(){
	init();
	checkboxRadioPersonalizado();
	formataCampos();
	alternaTipoPessoa();
	validarFormCadastro();
});

function checkboxRadioPersonalizado(){
	$(".lblRadio input, .liNews input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
}

function formataCampos(){
	$("#iptCnpj").mask("99.999.999/9999-99");
	$("#iptCpf").mask("999.999.999-99");
	$("#iptNascimento").mask("99/99/9999");
	$("#iptTelefoneResidencial").mask("(99)9999-9999?9");
	$("#iptTelefoneCelular").mask("(99)9999-9999?9");
	$("#iptTelefoneComercial").mask("(99)9999-9999?9");
}

function alternaTipoPessoa(){
	var tipoPessoa = $('#tipoPessoa').val();
	$('.'+tipoPessoa).show();
}

function validarFormCadastro(){

	$("#formAlterarDadosGerais").validate({
		// Define as regras
		rules:{
			iptNome:{
				requeridoF: true
			},
			iptSobrenome:{
				requeridoF: true
			},
			iptCpf:{
				verificaCPF: true
			},
			iptDataNascimento:{
				requeridoF: true
			},
			iptRazaoSocial:{
				requeridoJ: true
			},
			iptNomeFantasia:{
				requeridoJ: true
			},
			iptCnpj:{
				verificaCNPJ: true
			},
			iptContato:{
				requeridoJ: true
			},
			iptSenha:{
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			iptNome:{
				requeridoF: 'Informe seu nome'
			},
			iptSobrenome:{
				requeridoF: 'Informe seu sobrenome'
			},
			iptCpf:{
				verificaCPF: 'Informe um CPF válido'
			},
			iptDataNascimento:{
				requeridoF: 'Informe sua data de nascimento'
			},
			iptRazaoSocial:{
				requeridoJ: 'Informe a Razão Social'
			},
			iptNomeFantasia:{
				requeridoJ: 'Informe o Nome Fantasia'
			},
			iptCnpj:{
				verificaCNPJ: 'Informe um CNPJ válido'
			},
			iptContato:{
				requeridoJ: 'Informe um Contato'
			},
			iptSenha:{
				required: 'Informe sua senha'
			}
		}
	});
}

$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formAlterarDadosGerais').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        //dataType:  'json', 
        target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        //success:   processJson 
        success: function() { 
           $('#teste').fadeIn('slow'); 
        }
    }); 
 });

function processJson(data) {
   if(data.retorno == 'sucesso'){
   		if(data.mensagem == 'CADASTRO'){
   			$('#retornoAlteraDados').html('Cadastro alterado com sucesso!');
   		}
   } else {
	   	if (data.mensagem == 'CPF'){
	   		$('#iptCpf').css('border-color', '#FDCAC9');
			$('#iptCpf').next('span').fadeIn().html('CPF já consta em nosso cadastro');
			scrollAnimate('#iptCpf', 1000);
	   	} else if (data.mensagem == 'CNPJ'){
	   		$('#iptCnpj').css('border-color', '#FDCAC9');
			$('#iptCnpj').next('span').fadeIn().html('CNPJ já consta em nosso cadastro');
			scrollAnimate('#iptCnpj', 1000);
	   	}  else if(data.mensagem == 'SENHA'){
	   		$('#iptSenha').css('border-color', '#FDCAC9');
			$('#iptSenha').next('span').fadeIn().html('Senha inválida');
			scrollAnimate('#iptSenha', 1000);
	   	} else {
	   		alert(data.mensagem);
	   	}
   } 
}

document.write(unescape("%3Cscript src='js/form-cadastro.js' type='text/javascript'%3E%3C/script%3E"));
