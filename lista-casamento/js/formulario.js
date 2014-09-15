$(document).ready(function(){
	selectPersonalizado();
	checkboxRadioPersonalizado();
	formataCampos();
	$("#cepDados, #cepRecepcao, #cepCerimonia").blur(function(){
		var este = $(this);
		buscaEnderecoCep(este);
	});
	validarFormCadastro();
});


/**************
	SELECT PERSONALIZADO
**************/
function selectPersonalizado(){
	$(".select select").styleCombobox({ 
		classFocus:"comboboxFocus" 
	}); 
}

$('#fotoCasal').change(function(){
    var ele = $(this);
    $('#buscarFoto').text(ele.val());
})

function checkboxRadioPersonalizado(){
	$("#termos .lblCheckbox input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
}

function formataCampos(){
	$("#cepDados, #cepRecepcao, #cepCerimonia").mask("99999-999");
	$("#foneDados1, #foneDados2, #foneDados3").mask("(99) 9999-9999?9");
	$(".inputFormData, .inputFormDataEntrega").mask("99/99/9999");
	$(".inputFormHora").mask("99:99");
}

function buscaEnderecoCep(este){
	
		var cep = este.val();
	    var input = este.attr('id');
	    input = input.replace("cep", "");
	    cep = cep.replace("_", "");
	    cep = cep.replace("-", "");
	    
	    $('#loader').fadeIn();
	    
	    if(cep > 0){
	        $.post($BASE_DIR+"admin/actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
	            function(data){
	            if(data.cod == 'sucesso'){
	                $("#rua"+input).val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
	                $("#bairro"+input).val(data.bairroEnderecoPessoa);
	                $("#idCidade"+input).val(data.idMunicipioEnderecoPessoa);
	                $("#cidade"+input).val(data.municipioEnderecoPessoa);
	                $("#estado"+input).val(data.estadoEnderecoPessoa);
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

$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formCadastro').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
        beforeSerialize: function() { 
		    $('#loader').fadeIn();               
		},
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //     $('#teste').fadeIn('slow'); 
        // }
    }); 
 });

 function processJson(data) {
 	if(data.retorno == 'sucesso'){
 		if(data.atualiza == 'S'){
 			alert('Dados editados com sucesso!');
 		} else if(data.redireciona){
 			location.href='/'+data.redireciona+'/';
 		}
 	} else {
 		alert('Não foi possível gravar, verifique os dados e tente novamente.');
 	}
 	$('#loader').fadeOut();
}

function validarFormCadastro(){
	$("#formCadastro").validate({
		// Define as regras
		rules:{
			nome1:{
				required: true
			},
		    nome2:{
				required: true
			},
			dataEntrega:{
				required: true
			},
		    foneDados1:{
		    	required: true
		    },
		    nomeDados:{
		    	required: true
		    },
		    cepDados:{
		    	required: true
		    },
		    ruaDados:{
		    	required: true
		    },
		    numeroDados:{
		    	required: true
		    },
		    bairroDados:{
		    	required: true
		    },
		    cidadeDados:{
		    	required: true
		    }
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome1:{
				required: 'Informe o nome do c&ocirc;njuge 01'
			},
		    nome2:{
				required: 'Informe o nome do c&ocirc;njuge 02'
			},
			dataEntrega:{
				required: 'Informe a data de entrega'
			},
		    foneDados1:{
		    	required: 'Informe o telefone principal'
		    },
		    nomeDados:{
		    	required: 'Informe o nome do respons&aacute;vel pelo recebimento'
		    },
		    cepDados:{
		    	required: 'Informe o CEP'
		    },
		    ruaDados:{
		    	required: 'Informe o endere&ccedil;o'
		    },
		    numeroDados:{
		    	required: 'Informe o n&uacute;mero'
		    },
		    bairroDados:{
		    	required: 'Informe o bairro'
		    },
		    cidadeDados:{
		    	required: 'Informe um CEP v&aacute;lido para que a cidade seja preenchida'
		    }
		}
	});
}

document.write(unescape("%3Cscript src='../js/form-cadastro.js' charset='utf-8' type='text/javascript'%3E%3C/script%3E"));