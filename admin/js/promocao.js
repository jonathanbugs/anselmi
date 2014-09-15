// prepare the form when the DOM is ready 
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#cadastraPromocao, #editaPromocao, #editaPromocaoCarrinho, #cadastraPromocaoCarrinho').ajaxForm({ 

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
        //    $('#teste').fadeIn('slow'); 
        // } 
    }); 

    $("#produtoPromocaoSelect").select2({
        placeholder: "Selecione os Produtos...",
        formatNoMatches: function () { return "Nenhum resultado encontrado"; },
        formatInputTooShort: function (input, min) { var n = min - input.length; return "Digite mais " + n + " caracter" + (n == 1? "" : "es"); },
        formatInputTooLong: function (input, max) { var n = input.length - max; return "Apague " + n + " caracter" + (n == 1? "" : "es"); },
        formatSelectionTooBig: function (limit) { return "Só é possível selecionar " + limit + " elemento" + (limit == 1 ? "" : "s"); },
        formatLoadMore: function (pageNumber) { return "Carregando mais resultados…"; },
        formatSearching: function () { return "Buscando..."; },
        multiple: true,
        ajax: {
            url: "actions/select2_produto_promocao.php",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return {
                    term: term, //search term
                    page_limit: 50 // page size
                };
            },
            results: function (data, page) {
                return { results: data.results };
            }

        },
        initSelection: function(element, callback) {
            return $.getJSON("actions/select2_produto_promocao.php?id=" + (element.val()), null, function(data) {

                    return callback(data.results);

            });
        }
    });

    $("#categoriaPromocaoSelect").select2({
        placeholder: "Selecione as Categorias...",
        formatNoMatches: function () { return "Nenhum resultado encontrado"; },
        formatInputTooShort: function (input, min) { var n = min - input.length; return "Digite mais " + n + " caracter" + (n == 1? "" : "es"); },
        formatInputTooLong: function (input, max) { var n = input.length - max; return "Apague " + n + " caracter" + (n == 1? "" : "es"); },
        formatSelectionTooBig: function (limit) { return "Só é possível selecionar " + limit + " elemento" + (limit == 1 ? "" : "s"); },
        formatLoadMore: function (pageNumber) { return "Carregando mais resultados…"; },
        formatSearching: function () { return "Buscando..."; },
        multiple: true,
        ajax: {
            url: "actions/select2_categoria_promocao.php",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return {
                    term: term, //search term
                    page_limit: 50 // page size
                };
            },
            results: function (data, page) {
                return { results: data.results };
            }

        },
        initSelection: function(element, callback) {
            return $.getJSON("actions/select2_categoria_promocao.php?id=" + (element.val()), null, function(data) {

                    return callback(data.results);

            });
        }
    });

});

function processJson(data) { 
    $('body').removeClass('loadstate');
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        //setTimeout("document.location = '"+data.redirect+"'",2000);
    }
}

/*$(document).ready(function(){
    
    $('#checkedTodos').click(function(){
        if($(this).is(':checked')){
            alert('1'); 
            $('input[name=categoria]').attr('checked', true);
        }else{ 
            $('input[name=categoria]').attr('checked', false);
            alert('2');
        } 
    });

});*/

/*datatables*/
var oTable = $('#tableListaPromocaoCarrinho').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "bLengthChange": false,
    "sAjaxSource": "actions/carrinho_promocao_lista.php",
    "bStateSave": true,
    "aaSorting": [[ 0, "desc" ]],
        "iDisplayLength": 50,
        "oLanguage": {
        /*"sLengthMenu": "_MENU_ entradas por pÃ¡gina",*/
        "sZeroRecords": "Vazio!",
        "sInfo": "Exibindo de _START_ até _END_. Total de: _TOTAL_ entradas",
        "sInfoEmpty": "Nenhuma entrada",
        "sInfoFiltered": "(total de _MAX_ entradas)",
        'sSearch' : "Busca"
        },
    "bPaginate": true,
    "sPaginationType": "full_numbers",
    "bFilter": true,
//    "bRetrieve": true,
//    "bDestroy" : true,
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        // Bold the grade for all 'A' grade browsers
        if ( aData[3] == "S" ){
            $('td:eq(3)', nRow).html( '<span class="icon-ok"></span>' );
        } else {
            $('td:eq(3)', nRow).html( '<span class="icon-remove"></span>' );
        }
        if ( aData[7] == "S" ){
            $('td:eq(7)', nRow).html( '<span class="icon-ok"></span>' );
        } else {
            $('td:eq(7)', nRow).html( '<span class="icon-remove"></span>' );
        }
        if ( aData[8] == "S" ){
            $('td:eq(8)', nRow).html( '<span class="icon-ok"></span>' );
        } else {
            $('td:eq(8)', nRow).html( '<span class="icon-remove"></span>' );
        }
        if ( aData[10] == "P" ){
            $('td:eq(10)', nRow).html( '%' );
        } else {
            $('td:eq(10)', nRow).html( 'R$' );
        }
        $('td:eq(11)', nRow).html( '<a href="carrinho_promocao?idPromocaoCarrinho='+aData[11]+'"><span class="icon-file"></span></a>' );
        
    },
});

