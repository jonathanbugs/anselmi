carregando = '<img alt="" src="images/loaders/circular/033.gif"></img>';

// prepare the form when the DOM is ready 
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#cadastroPessoa, #editaPessoa, #editaPessoaEndereco, #cadastraPessoaEndereco, #formCadastraOcorrencia').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        beforeSubmit: function() { 
            $('body').addClass('loadstate');
        },
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //     $('#teste').fadeIn('slow'); 
        // } 
    }); 

    
    //altera formulario pelo tipo de pessoa
    selecionaTipoPessoa($("input[@name=tipopessoa]:checked").val());
    $("input[name=tipoPessoa]").click(function(){
        selecionaTipoPessoa($(this).val());
    });

    $("input[name=telefoneFixoContatoPessoa]").mask("(99) 9999-9999?9");
    $("input[name=telefoneCelularContatoPessoa]").mask("(99) 9999-9999?9");

    //
    
});

function processJson(data) { 
    // 'data' is the json object returned from the server 
    $('body').removeClass('loadstate');
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        if(data.redirect){
            setTimeout("document.location = '"+data.redirect+"'",2000);
        }
        if(data.ocorrencia == 'S'){
            $('#historicoOcorrenciaPessoa .dl-horizontal').append('<dt>'+data.dataOcorrencia+'</dt><dd>'+$('#ocorrenciaPessoa').val()+'</dd>');
            $('#ocorrenciaPessoa').val('');
        }
    }
}

function iconeEditar(div){
    $("#dlEdita"+div).show();
    $("#dlVer"+div).hide();
}

function iconeEditarEndereco(idEndereco){
    
    $("#divEndereco").hide();
    $("#formEditaEndereco").show();
    $("#formNovoEndereco").hide();
    $("#editaPessoaEndereco #idEnderecoPessoa").val(idEndereco);
    $("#editaPessoaEndereco #apelidoEnderecoPessoa").val($("input[name=apelidoEndereco"+idEndereco+"]").val());
    $("#editaPessoaEndereco #ruaEnderecoPessoa").val($("input[name=endereco"+idEndereco+"]").val());
    $("#editaPessoaEndereco #numeroEnderecoPessoa").val($("input[name=numero"+idEndereco+"]").val());
    $("#editaPessoaEndereco #complementoEnderecoPessoa").val($("input[name=complemento"+idEndereco+"]").val());
    $("#editaPessoaEndereco #bairroEnderecoPessoa").val($("input[name=bairro"+idEndereco+"]").val());
    $("#editaPessoaEndereco #idMunicipioEnderecoPessoa").val($("input[name=idMunicipio"+idEndereco+"]").val());
    $("#editaPessoaEndereco #municipioEnderecoPessoa").val($("input[name=nomeMunicipio"+idEndereco+"]").val());
    $("#editaPessoaEndereco #estadoEnderecoPessoa").val($("input[name=estado"+idEndereco+"]").val());
    $("#editaPessoaEndereco #paisEnderecoPessoa").val($("input[name=pais"+idEndereco+"]").val());
    $("#editaPessoaEndereco input[name=cepEnderecoPessoa]").val($("input[name=cep"+idEndereco+"]").val());
    $("#editaPessoaEndereco #referenciaEnderecoPessoa").val($("input[name=referencia"+idEndereco+"]").val());
    $("#editaPessoaEndereco #peEnIdPessoa").val($("input[name=peEnIdPessoa"+idEndereco+"]").val());

}

function iconeNovoEndereco(){
    $("#divEndereco").hide();
    $("#formEditaEndereco").hide();
    $("#formNovoEndereco").show();
}

function btnCancelaEditar(div){
    $("#dlEdita"+div).hide();
    $("#dlVer"+div).show();

    if (div == "EnderecoPessoa") {
        $("#divEndereco").show();
        $("#formEditaEndereco").hide();
        $("#formNovoEndereco").hide();
    }
}

$("input[name=cepEnderecoPessoa]").blur(function(){

    var form = "#"+$(this).parents("form").attr("id");

    var cep = $(this).val();
    cep = cep.replace('_', '');
    
    if(cep.length == 9){
        $.post("actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
            function(data){
                //alert(data);
            if(data.cod == 'sucesso'){
                $(form+" #ruaEnderecoPessoa").val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
                $(form+" #bairroEnderecoPessoa").val(data.bairroEnderecoPessoa);
                $(form+" #municipioEnderecoPessoa").val(data.municipioEnderecoPessoa);
                $(form+" #estadoEnderecoPessoa").val(data.estadoEnderecoPessoa);
                $(form+" #paisEnderecoPessoa").val(data.paisEnderecoPessoa);
            } else {
                //alert(data);
                alert(htmlDecode(data.mensagem));
            }
        }, "json");
    }

});

function selecionaTipoPessoa(tipoPessoa){
    //alert(tipoPessoa);
    if(tipoPessoa == 'F'){
        $(".divPessoaFisica").show();
        $(".divPessoaJuridica").hide();
        $('.divPessoaJuridica').find(':input').removeAttr('required', true);
    } else {
        $(".divPessoaJuridica").show();
        $(".divPessoaFisica").hide();
        $('.divPessoaFisica').find(':input').removeAttr('required', true);
    }
}

function enviarNovaSenha(idPessoa){
    $.post("actions/pessoa.php", { "acao": "enviaNovaSenha", "idPessoa": idPessoa },
            function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            } else {
                //alert(data);
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");
}

function iconeCadastrarTabelasPessoa(tabela){
    $("#novaLinha"+tabela).show();
    $("#novaLinha"+tabela+" input").focus();
}

function iconeAcaoEditar(id, input){
    
    var descricao = $("#"+input+id).val();
    var tabela = input;

    $.post("actions/pessoa.php", { "acao": "editaTabelasPessoa", "tabela": tabela, "id": id, "descricao": descricao },
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");

}

function iconeAcaoCadastrar(input){

    var descricao = $("#"+input).val();
    
    $.post("actions/pessoa.php", { "acao": "gravaTabelasPessoa", "tabela": input, "descricao": descricao },
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                $("#"+input).val("");
                $("#"+input+"Table tr:last").after("<tr id=\"tr"+input+data.id+"\"><td>"+data.id+"</td><td><input class=\"span12 text\" id=\""+input+data.id+"\" type=\"text\" name=\""+input+data.id+"\" value=\""+descricao+"\"/></td><td><div class=\"controls center\"><a href=\"javascript: iconeAcaoEditar("+data.id+", '"+input+"')\" title=\"Editar\" class=\"tip\"><span class=\"icon12 icomoon-icon-pencil\"></span></a><a href=\"javascript: iconeAcaoRemover("+data.id+", '"+input+"')\" title=\"Remover\" class=\"tip\"><span class=\"icon12 icomoon-icon-remove\"></span></a></div></td></tr>");
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");    

}

function iconeAcaoRemover(id, tabela){

    $.post("actions/pessoa.php", { "acao": "removeTabelasPessoa", "tabela": tabela, "id": id },
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                $("#tr"+tabela+id).hide();
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");    

}


if($("#tableListaPessoa").length){
    /*datatables*/
    var oTable = $('#tableListaPessoa').dataTable( {
    	"bProcessing": true,
    	"bServerSide": true,
    	"bLengthChange": false,
    	"sAjaxSource": "actions/pessoa_lista.php",
    	"bStateSave": true,
    	"aaSorting": [[ 0, "asc" ]],
          "iDisplayLength": 50,
          "oLanguage": {
            /*"sLengthMenu": "_MENU_ entradas por página",*/
            "sZeroRecords": "Vazio!",
            "sInfo": "Exibindo de _START_ até _END_. Total de: _TOTAL_ entradas",
            "sInfoEmpty": "Nenhuma entrada",
            "sInfoFiltered": "(total de _MAX_ entradas)",
            'sSearch' : "Busca"
    		},
    	"bPaginate": true,
    	"sPaginationType": "full_numbers",
    	"bFilter": true,
    	"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    		// Bold the grade for all 'A' grade browsers
    		if ( aData[7] == "S" ){
    			$('td:eq(7)', nRow).html( '<span class="icon-ok"></span>' );
    		} else {
    			$('td:eq(7)', nRow).html( '<span class="icon-remove"></span>' );
    		}
    		
    	},
    });

    oTable.fnFilter(
        $('#buscaGeralTopo').val(),
        null
    );


    $('#tableListaPessoa tbody tr').live('click', function () {
    	
    	var idPessoa = $(this).find("td")[0].innerHTML;
    	redirectPagina('pessoa-visualiza','idPessoa', idPessoa);
    	
    	
    });

    
}

$('.trPedidoPessoa').live('click', function(){
    var idPedido = $(this).attr('id');
    redirectPagina('pedido-visualiza','idPedido', idPedido);
});

//var oSettings = oTable.fnSettings();
//alert( oSettings._iDisplayStart );

/**/


//------------- Input limiter -------------//
if ($('textarea').hasClass('limit')) {
    $('#ocorrenciaPessoa').inputlimiter({
        limit: 4000,
        remText: 'Você só tem %n caracteres restantes...',
        limitText: 'Campo limitado em %n caracteres.'
    });
}

/**/



