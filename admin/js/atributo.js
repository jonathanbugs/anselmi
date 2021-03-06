$('input[name=categoriaAtiva]').on('click', function(){
	var idCategoria = $(this).attr('id');
	var ativo = $(this).is(':checked');
	$.post('actions/categoria.php', { 'acao': 'ativaCategoria', 'idCategoria': idCategoria, 'ativaCategoria': ativo },
	  function(data){
	    if(data.cod == "sucesso") { 
	        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
	    } else { 
	        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
	    }
	  }, 'json');
});

function iconeCadastrarAtributo(tabela){
    $("#nova"+tabela).show();
    $("#nova"+tabela+" input").focus();
}

function iconeAcaoCadastrar(input){

    var descricao = $("#descricao"+input).val();
    var tipo = $("#tipo"+input).val();
    var hexadecimal = $("#hexadecimal"+input).val();

    $.post("actions/atributo.php", { "acao": "gravaAtributo", "tabela": input, "descricao": descricao, "tipo": tipo, "hexadecimal": hexadecimal },
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                location.reload();
                //$("#"+input+"Table tr:last").after("<tr id=\"tr"+input+data.id+"\"><td>"+data.id+"</td><td><select text\" id=\""+input+data.id+"\" name=\""+input+data.id+"\"><option value=\""+tipo+"\"></option></select></td><td><input class=\"span12 text\" id=\""+input+data.id+"\" type=\"text\" name=\""+input+data.id+"\" value=\""+descricao+"\"/></td><td><input class=\"span4 text\" id=\""+input+data.id+"\" type=\"text\" name=\""+input+data.id+"\" value=\""+ordem+"\"/></td><td><input id=\""+input+data.id+"\" type=\"checkbox\" "+checked+" name=\""+input+data.id+"\" value=\"S\"/></td><td><div class=\"controls center\"><a href=\"javascript: iconeAcaoEditar("+data.id+", '"+input+"')\" title=\"Editar\" class=\"tip\"><span class=\"icon12 icomoon-icon-pencil\"></span></a><a href=\"javascript: iconeAcaoRemover("+data.id+", '"+input+"')\" title=\"Remover\" class=\"tip\"><span class=\"icon12 icomoon-icon-remove\"></span></a></div></td></tr>");
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");    

}

function iconeAcaoEditar(id, input){

    var descricao = $("#descricao"+input+id).val();
    var tipo = $("#tipo"+input+id).val();
    var hexadecimal = $("#hexadecimal"+input+id).val();
    var tabela = input;

    $.post("actions/atributo.php", { "acao": "editaAtributo", "tabela": tabela, "id": id, "descricao": descricao, "tipo": tipo, "hexadecimal": hexadecimal },
        
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");

}

function iconeAcaoRemover(id, tabela){

    $.post("actions/atributo.php", { "acao": "removeAtributo", "tabela": tabela, "id": id },
        function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                location.reload();
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");    

}

//------------- Colorpicker -------------//
if($('div').hasClass('picker')){
    $('.picker').each(function(){
        var id = $(this).attr('id');
        id = id.replace('picker', '');
        $(this).farbtastic('#hexadecimalAtributo'+id);
    });
}

$('.hexadecimal').focusin(function(){
    if(!$(this).val()){
        $(this).val('#ffffff');
    }
    var id = $(this).attr('id');
    id = id.replace('hexadecimalAtributo', '');
    $('#picker'+id).show();
}).blur(function(){
    var id = $(this).attr('id');
    id = id.replace('hexadecimalAtributo', '');
    $('#picker'+id).hide();
});