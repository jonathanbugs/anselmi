$(document).ready(function(){
	init();

	
	$("#formEndereco .lblRadio input, #formEndereco .lblCheckbox input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
	
	modalEndereco();
	formataCampos();
});

function editaEndereco(idEndereco){
	$(".boxEditaEndereco").css("display", "none");
	$("#edita-"+idEndereco).css("display", "block");

}

function formataCampos(){
	$("input[name=iptCep]").mask("99999-999");
}

function buscaEnderecoCep(idEndereco){

		var form = '.formEndereco-'+idEndereco;

		var cep = $(form+" input[name=iptCep]").val();
	    cep = cep.replace("_", "");
	    cep = cep.replace("-", "");

	    $('#loader').fadeIn();
	    
	    if(cep > 0){
	        $.post($BASE_DIR+"admin/actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
	            function(data){
	            if(data.cod == 'sucesso'){
	                $(form+" input[name=iptEndereco]").val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
	                $(form+" input[name=iptBairro]").val(data.bairroEnderecoPessoa);
	                $(form+" input[name=iptIdCidade]").val(data.idMunicipioEnderecoPessoa);
	                $(form+" input[name=iptCidade]").val(data.municipioEnderecoPessoa);
	                $(form+" input[name=iptEstado]").val(data.estadoEnderecoPessoa);
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

/**/
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('form[name=formEndereco]').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        /*success: function() { 
            $('#teste').fadeIn('slow'); 
        }*/
    }); 
 });

function processJson(data) {
   if(data.retorno == 'sucesso'){
   		location.href = '/endereco-de-entrega';
   } else {
	   	alert('Não foi possível alterar o endereço, verifique os campos e tente novamente.');
   } 
}
/**/

document.write(unescape("%3Cscript src='js/form-cadastro.js' charset='utf-8' type='text/javascript'%3E%3C/script%3E"));



