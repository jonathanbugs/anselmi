carregando = '<img alt="" src="images/loaders/circular/033.gif"></img>';

// prepare the form when the DOM is ready 
$(document).ready(function() {

    $('body')
        .ajaxStart(function() {
            $(this).addClass('loadstate');
        })
        .ajaxStop(function() {
            $(this).removeClass('loadstate');
        });

    // bind form using ajaxForm 
    $('#cadastrarDadosListaCasamento, #cadastrarEnderecoListaCasamento').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //     $('#teste').fadeIn('slow'); 
        // }
    }); 

    var oTable;

    $('#cadastrarProdutoListaCasamento').submit(function() {
        $('body').addClass('loadstate');
        var sData = oTable.$('input').serialize();
        var idListaCasamento = $('#idListaCasamento').val();
        $.post("actions/lista_casamento.php", { "acao": "editarProdutoListaCasamento", "idListaCasamento": idListaCasamento, "idsProdutos":  sData},
            function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);  
            }
        }, "json");
        
        $('body').removeClass('loadstate');
        return false;
    });
     
    oTable = $('.dynamicTableListaCasamento').dataTable({
                    "sPaginationType": "full_numbers",
                    "bJQueryUI": false,
                    "bAutoWidth": false,
                    "bLengthChange": false
                });

    /**/
    $("input[name=cepEnderecoListaCasamento]").mask("99999-999");
    $("input[name=telefoneCelularContatoListaCasamento]").mask("(99) 9999-9999?9");
    $("input[name=telefoneFixoContatoListaCasamento]").mask("(99) 9999-9999?9");
    /**/
    
});

function processJson(data) { 
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
       
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        if(data.id){
            $("input[name=idListaCasamento]").val(data.id);
        }
        if(data.redirect){
            location.href="lista-casamento-cadastra&idListaCasamento="+data.id;
        } else if(data.focus){
            $("#"+data.focus).focus();
        } else if(data.location){
            if(data.location == "topo"){
                $('html, body').animate({scrollTop:0}, 'fast');
            } else {
                location.href="#"+data.location;
            }
        }
        //setTimeout("document.location = '"+data.redirect+"'",2000);
    }
}



$("input[name=cepEnderecoListaCasamento]").blur(function(){

    var form = "#"+$(this).parents("form").attr("id");

    var cep = $(this).val();
    cep = cep.replace("_", "");
    cep = cep.replace("-", "");
    
    if(cep > 0){
        $.post("actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
            function(data){
            if(data.cod == 'sucesso'){
                $(form+" #ruaEnderecoListaCasamento").val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
                $(form+" #bairroEnderecoListaCasamento").val(data.bairroEnderecoPessoa);
                $(form+" #idMunicipioEnderecoListaCasamento").val(data.idMunicipioEnderecoPessoa);
                $(form+" #municipioEnderecoListaCasamento").val(data.municipioEnderecoPessoa);
                $(form+" #estadoEnderecoListaCasamento").val(data.estadoEnderecoPessoa);
                $(form+" #paisEnderecoListaCasamento").val(data.paisEnderecoPessoa);
            } else {
                //alert(data);
                alert(htmlDecode(data.mensagem));
            }
        }, "json");
    }

});

function Trim(str){
    return str.replace(/^\s+|\s+$/g,"");
}

