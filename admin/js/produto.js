//abre produto
$(".gradeX").click(function(){
    location.href="produto-cadastra?idProduto="+$(this).attr("id");
});

$("#addAtributos").click(function(){
    var idsAtributo = $("#selectAtributos").val();

    $.post("actions/produto.php", { "acao": "gravaAtributo", "idsAtributo": idsAtributo },
        function(data){
        if(data.cod == 'sucesso'){
            alert('feito');
        } else {
            alert(data);
            alert(htmlDecode(data.mensagem));
        }
    }/*, "json"*/);
});


/*if($('#idProdutoCorrente').val() > 0){
    $(".inativo").removeAttr('class');
} 

$(".inativo").click(function(){
    if($(this).attr("class") == "inativo"){
        alertGeral("error", "Alerta!", "Salve o produto antes de seguir", "picon icon24 typ-icon-cancel white", true);        
    }
});*/


$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#uploadArquivo, #cadastroProduto, #gravaPrecoProduto, #gravaMetaProduto, #gravaCategoriaProduto, #gravaCombinacaoProduto, #gravaEstoqueProduto, #gravaProdutoTipoFrete').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        // dataType:  'json', 
        // beforeSubmit: function () { $('body').addClass('loadstate') },
        target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        //success:   processJson, 
        success: function() { 
           $('#teste').fadeIn('slow'); 
        } 
        
    }); 
 
});

function processJson(data) {
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        $('body').removeClass('loadstate');
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        if(data.redirect){
            setTimeout("window.location.href = '"+data.redirect+"'",1000);
        } else if(data.atualiza == 'S') {
            window.location.reload();    
        } else {
            $('body').removeClass('loadstate');
        }
        
    }
}

//------------- Input limiter -------------//
if ($('textarea').hasClass('limit')) {
    $('#descricaoCurtaProduto').inputlimiter({
        limit: 1000,
        remText: 'Você só tem %n caracteres restantes ...',
        limitText: 'Campo limitado a %n caracteres.'
    });
    $('#descricaoLongaProduto').inputlimiter({
        limit: 4000,
        remText: 'Você só tem %n caracteres restantes ...',
        limitText: 'Campo limitado a %n caracteres.'
    });
    $('#videoProduto').inputlimiter({
        limit: 4000,
        remText: 'Você só tem %n caracteres restantes ...',
        limitText: 'Campo limitado a %n caracteres.'
    });
    $('#metaDescriptionProduto').inputlimiter({
        limit: 160,
        remText: 'Você só tem %n caracteres restantes ...',
        limitText: 'Campo limitado a %n caracteres.'
    });
}

//$("#fabricanteProduto").select();


/*datatables*/
var oTable = $('#tableListaProduto').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "bLengthChange": false,
    "sAjaxSource": "actions/produto_lista.php",
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
        if ( aData[6] == "S" ){
            $('td:eq(6)', nRow).html( '<span class="icon-ok"></span>' );
        } else {
            $('td:eq(6)', nRow).html( '<span class="icon-remove"></span>' );
        }
        
    },
});

$('#tableListaProduto tbody tr').live('click', function () {
    var idProduto = $(this).find("td")[0].innerHTML;
    redirectPagina('produto-cadastra','idProduto', idProduto);
});
/**/





function removeCombinacao(cod){

    new PNotify({
        title: 'Confirmação Necessária',
        text: 'Você tem certeza que deseja excluir a combinação de produto?',
        icon: 'glyphicon glyphicon-question-sign',
        hide: false,
        confirm: {
            confirm: true
        },
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        }
    }).get().on('pnotify.confirm', function() {
        $.post("actions/produto.php", { "acao": "removeCombinacao", "cod": cod },
            function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                if(data.atualiza == 'S') {
                    window.location.reload();    
                }
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json"); 
    }).on('pnotify.cancel', function() { });

}

function editaCombinacao(cod){
    var referenciaCombinacao = $('#refeCombinacao'+cod).val();
    var precoCombinacao = $('#precoCombinacao'+cod).val();
    var produtoPrincipal = 'N';
    if($('#produtoPrincipal'+cod).is(':checked')){
        produtoPrincipal = 'S';
    }
    $.post("actions/produto.php", { "acao": "editarCombinacao", "cod": cod, "referenciaCombinacao": referenciaCombinacao, "precoCombinacao": precoCombinacao, "produtoPrincipal": produtoPrincipal },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            if(data.atualiza == 'S') {
                //window.location.reload();    
            }
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json");   
}

$('input[name=produtoPrincipal]').click(function(){
    var idProdutoCorrente = $('input[name=idProdutoCorrente]').val();
    var cod = $(this).val();
    var produtoPrincipal = 'N';
    if($(this).is(':checked')){
        produtoPrincipal = 'S';
    }
    $.post("actions/produto.php", { "acao": "produtoCombinacaoPrincipal", "idProdutoCorrente": idProdutoCorrente, "cod": cod, "produtoPrincipal": produtoPrincipal },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            if(data.atualiza == 'S') {
                //window.location.reload();    
            }
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json"); 
});


$(document).ready(function(){
    var hash = window.location.hash;
   $('#myTab a').each(function(e){
        if($(this).attr('href') == hash){
            $(this).tab('show');
        }
   });

   /**/
   $('#precoVendaMarkup, #precoVendaProduto').keyup(function(event){
        var preco1 = $('#precoVendaProduto').val();
        var preco2 = $('#precoVendaMarkup').val();
        preco1 = preco1.replace('.', '');
        preco1 = preco1.replace(',', '.');
        preco2 = preco2.replace('.', '');
        preco2 = preco2.replace(',', '.');

        var precoCalculado = preco1*preco2;
        precoCalculado = precoCalculado.toFixed(2);
        precoCalculado = precoCalculado.replace('.', ',');

        $('#precoVendaProdutoVarejo').val(precoCalculado);
   });
   $('#precoVendaMarkup, #precoPromocionalProduto').keyup(function(event){
        var preco1 = $('#precoPromocionalProduto').val();
        var preco2 = $('#precoVendaMarkup').val();
        preco1 = preco1.replace('.', '');
        preco1 = preco1.replace(',', '.');
        preco2 = preco2.replace('.', '');
        preco2 = preco2.replace(',', '.');

        var precoCalculado = preco1*preco2;
        precoCalculado = precoCalculado.toFixed(2);
        precoCalculado = precoCalculado.replace('.', ',');

        $('#precoPromocionalProdutoVarejo').val(precoCalculado);
   });
   /**/
});


function fnOrdenaImagem(idProdutoCombinacao){
    var inputs = new Array();
    $('input[name=ordemImagem'+idProdutoCombinacao+']').each(function(){
        inputs.push($(this).attr('id')+'|'+$(this).val());
    });
    $.post("actions/produto.php", { "acao": "ordenaImagem", "idProdutoCombinacao": idProdutoCombinacao, "ordemImagem": inputs },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            if(data.atualiza == 'S') {
                window.location.reload();    
            }
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json"); 
}

function excluirArquivoDownload(idProduto){
    $.post("actions/produto.php", { "acao": "excluirArquivoDownload", "idProduto": idProduto },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
            $('.'+idProduto).hide();
            if(data.atualiza == 'S') {
                window.location.reload();    
            }
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json");    
}

(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('#uploadImagem').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete;
        bar.width(percentVal)
        percent.html(percentVal);
        //console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    complete: function(xhr) {
        status.html(xhr.responseText);
        //window.location.reload(); 
    }
}); 

})();

function fnExcluirCompreJunto(idCompreJunto){
    var decisao = confirm("Tem certeza que deseja excluir!");
    if (decisao){
        $.post("actions/compre_junto.php", { "acao": "excluirCompreJunto", "idCompreJunto": idCompreJunto },
            function(data){
            if(data.cod == 'sucesso'){
                alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
                $('#tr'+idCompreJunto).remove();
            } else {
                alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
            }
        }, "json");   
    }
}

/**/
function removeProdutoPreco(idProdutoPreco){
    $.post("actions/produto.php", { "acao": "removeProdutoPreco", "idProdutoPreco": idProdutoPreco },
        function(data){
        if(data.cod == 'sucesso'){
            $('#tr' + idProdutoPreco).remove();
        } else {
            alert(htmlDecode(data.mensagem));
        }
    }, "json");   
}
/**/


