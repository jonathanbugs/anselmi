$(document).ready(function(){
	init();
	checkboxRadioPersonalizado();
	formataCampos();
	validarCamposForm();
	buscaEnderecoCep();
	validarFormCadastro();
	$("#iptCep").blur(function(){
		buscaEnderecoCep();
	});
});

function checkboxRadioPersonalizado(){
	$("#formCadastro .lblRadio input, #formCadastro .lblCheckbox input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
}

function formataCampos(){
	$("#iptDataNascimento").mask("99/99/9999");
	$("#iptCpf").mask("999.999.999-99");
	$("#iptCep").mask("99999-999");
	$("#iptCnpj").mask("99.999.999/9999-99");
	$("#iptTelefoneCelular, #iptTelefoneComercial, #iptTelefoneResidencial").mask("(99)9999-9999?9");
}

function validarCamposForm(){

	$('input').focus(function(){
		$(this).css('border-color', '#e6e6e6');
	});

	/*dados cadastrais*/
	$("input[name=radTipoPessoa]:checked").each(function(){
		$(".ulMeusDadosCadastrais input:text").val("");
		var c = $(this).val();
		$(".F, .J").hide();
		$("."+c).show();
	});
	$("input[name=radTipoPessoa]").on("click", function() {
		$(".ulMeusDadosCadastrais input:text").val("");
		var c = $(this).val();
		$(".F, .J").hide();
		$("."+c).show();
	});

	/*dados de acesso*/
	$('#iptEmail').blur(function(){
		var email = $(this).val();
		if($.validateEmail(email) == false){
			$('#iptEmail').css('border-color', '#FDCAC9');
			$('#iptEmail').next('span').fadeIn().html('Informe um e-mail válido');
		} else {
			$('#iptEmail').next('span').fadeIn().html('');
		}
	});
	$('#iptConfirmacaoEmail').blur(function(){
		var email = $('#iptEmail').val();
		if($(this).val() != email){
			$('#iptConfirmacaoEmail').css('border-color', '#FDCAC9');
			$('#iptConfirmacaoEmail').next('span').fadeIn().html('Certifique-se que os e-mails informados são idênticos');
		} else {
			$('#iptConfirmacaoEmail').next('span').html('');
		}
	});
	$('#pswConfirmacaoSenha').blur(function(){
		var email = $('#pswSenha').val();
		if($(this).val() != email){
			$('#pswConfirmacaoSenha').css('border-color', '#FDCAC9');
			$('#pswConfirmacaoSenha').next('span').fadeIn().html('Certifique-se que as senhas informadas são idênticas');
		} else {
			$('#pswConfirmacaoSenha').next('span').html('');
		}
	});
}

function buscaEnderecoCep(){
	
		var cep = $("#iptCep").val();
	    cep = cep.replace("_", "");
	    cep = cep.replace("-", "");
	    
	    $('#loader').fadeIn();
	    
	    if(cep > 0){
	        $.post($BASE_DIR+"admin/actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
	            function(data){
	            if(data.cod == 'sucesso'){
	                $("#iptEndereco").val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
	                $("#iptBairro").val(data.bairroEnderecoPessoa);
	                $("#iptIdCidade").val(data.idMunicipioEnderecoPessoa);
	                $("#iptCidade").val(data.municipioEnderecoPessoa);
	                $("#iptEstado").val(data.estadoEnderecoPessoa);
	                /*$("#paisEnderecoPessoa").val(data.paisEnderecoPessoa);*/
	            } else {
	                //alert(data);
	                alert(htmlDecode(data.mensagem));
	            }
	            $('#loader').fadeOut();
	        }, "json");
    	} else {
    		$('#loader').fadeOut();
    	}
	
}

function validarFormCadastro(){

	$("#formCadastro").validate({
		
		// Define as regras
		rules:{
			iptEmail:{
				required: true,
				email: true
			},
			iptConfirmacaoEmail:{
				required: true,
				email: true
			},
			pswSenha:{
				required: true
			},
			pswConfirmacaoSenha:{
				required: true
			},
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
			iptTelefoneResidencial:{
				required: true
			},
			iptCep:{
				required: true
			},
			iptEndereco:{
				required: true
			},
			iptNumero:{
				required: true
			},
			iptBairro:{
				required: true
			},
			iptCidade:{
				required: true
			},
			iptEstado:{
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			iptEmail:{
				required: 'Informe seu e-mail',
				email: 'Informe um e-mail válido'
			},
			iptConfirmacaoEmail:{
				required: 'Certifique-se que os e-mails informados são idênticos',
				email: 'Informe um e-mail válido'
			},
			pswSenha:{
				required: 'Informe uma senha',
			},
			pswConfirmacaoSenha:{
				required: 'Certifique-se que as senhas informadas são idênticas'
			},
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
			iptTelefoneResidencial:{
				required: 'Informe um telefone principal'
			},
			iptCep:{
				required: 'Informe seu CEP'
			},
			iptEndereco:{
				required: 'Informe seu endereço'
			},
			iptNumero:{
				required: 'Informe o numero do seu endereço'
			},
			iptBairro:{
				required: 'Informe o bairro'
			},
			iptCidade:{
				required: 'Informe o CEP para que a cidade seja preenchida'
			},
			iptEstado:{
				required: 'Informe o CEP para que o estado seja preenchido'
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
			}
		}
	});
}

/**/
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formCadastro').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //    $('#teste').fadeIn('slow'); 
        // }
    }); 
 });

function processJson(data) {
   if(data.retorno == 'sucesso'){
   		if(data.mensagem == 'CADASTRO'){
   			alert('Cadastro realizado com sucesso, boas compras!');
   			location.href = $('#redirect').val();
   		}
   } else {
	   	if(data.mensagem == 'EMAIL'){
	   		$('#iptEmail').css('border-color', '#FDCAC9');
			$('#iptEmail').next('span').fadeIn().html('E-mail já consta em nosso cadastro');
			scrollAnimate('#iptEmail', 1000);
	   	} else if (data.mensagem == 'CPF'){
	   		$('#iptCpf').css('border-color', '#FDCAC9');
			$('#iptCpf').next('span').fadeIn().html('CPF já consta em nosso cadastro');
			scrollAnimate('#iptCpf', 1000);
	   	} else if (data,mensagem == 'CNPJ'){
	   		$('#iptCnpj').css('border-color', '#FDCAC9');
			$('#iptCnpj').next('span').fadeIn().html('CNPJ já consta em nosso cadastro');
			scrollAnimate('#iptCnpj', 1000);
	   	} else if(data.mensagem == 'CADASTRO') {
	   		var redirect = $('#redirect').val();
	   		location.href = redirect;
	   	} else {
	   		alert(data.mensagem);
	   	}
   } 
}
/**/

document.write(unescape("%3Cscript src='js/form-cadastro.js' charset='utf-8' type='text/javascript'%3E%3C/script%3E"));