// prepare the form when the DOM is ready 
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#cadastraCompreJunto').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
        beforeSubmit: function () { $('body').addClass('loadstate') },
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        // success: function() { 
        //    $('#teste').fadeIn('slow'); 
        // } 
    }); 

    
    
});

function processJson(data) { 
    // 'data' is the json object returned from the server 
    if(data.cod == "existe" || data.cod == "erro") { 
        alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
    } else { 
        alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        if(data.idCompreJunto){
            $('#idCompreJunto').val(data.idCompreJunto);
            $('input[name=acao]').val('editaCompreJunto');
        }
        //setTimeout("document.location = '"+data.redirect+"'",2000);
    }
    $('body').removeClass('loadstate');
}


/*datatables*/
var oTable = $('#tableListaProdutoCombinacao').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    "bLengthChange": false,
    "sAjaxSource": "actions/produto_lista_compre_junto.php",
    "fnServerParams": function ( aoData ) {
        aoData.push( { "name": "idCompreJunto", "value": $('#idCompreJunto').val() } );
    },
    "bStateSave": true,
    "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0,1,2,3,4,5 ] }],
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

        if ( aData[5] > 0 ){
            $('td:eq(5)', nRow).html( '<input value="'+aData[0]+'" type="checkbox" checked="checked" class="c'+aData[0]+'" name="c'+aData[0]+'">' );
        } else {
            $('td:eq(5)', nRow).html( '<input value="'+aData[0]+'" type="checkbox" class="c'+aData[0]+'" name="c'+aData[0]+'">' );
        }

        if(aData[6] == 'S'){
            $('td:eq(6)', nRow).html( '<input value="'+aData[0]+'" type="checkbox" checked="checked" class="f'+aData[0]+'" name="f'+aData[0]+'">' );
        } else {
            if(aData[5] > 0){
                $('td:eq(6)', nRow).html( '<input value="'+aData[0]+'" type="checkbox" class="f'+aData[0]+'" name="f'+aData[0]+'">' );
            } else {
                $('td:eq(6)', nRow).html( '<input disabled value="'+aData[0]+'" type="checkbox" class="f'+aData[0]+'" name="f'+aData[0]+'">' );
            }
        }            
        
    },
});

$('#tableListaProdutoCombinacao tbody tr td input:checkbox').live('click', function () {
    $('body').addClass('loadstate');
    var acao = $(this).attr('class');
    acao = acao.substring(0,1);
    var classe = $('.'+$(this).attr('class'));
    var idProduto = classe.val();
    var idCompreJunto = $('#idCompreJunto').val();
    if(acao == 'c'){
        if($(this).is(":checked")){
            classe.attr("checked",true);
            adicionaProdutoCompreJunto(idProduto, 'S', idCompreJunto);
            $('.f'+idProduto).removeAttr('disabled');
        } else {
            classe.attr("checked",false);
            adicionaProdutoCompreJunto(idProduto, 'N', idCompreJunto);
            $('.f'+idProduto).attr('disabled');
        }
    } else if(acao == 'f'){
        if($(this).is(":checked")){
            classe.attr("checked",true);
            forcaProdutoCompreJunto(idProduto, 'S', idCompreJunto);
        } else {
            classe.attr("checked",false);
            forcaProdutoCompreJunto(idProduto, 'N', idCompreJunto);
        }
    }
    $('body').removeClass('loadstate');
});

/**/

function adicionaProdutoCompreJunto(idProduto, checked, idCompreJunto){
    $.post("actions/compre_junto.php", { "acao": "adicionaProdutoCompreJunto", "idProduto": idProduto, "checked": checked, "idCompreJunto": idCompreJunto },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json");
}

function forcaProdutoCompreJunto(idProduto, checked, idCompreJunto){
    $.post("actions/compre_junto.php", { "acao": "forcaProdutoCompreJunto", "idProduto": idProduto, "checked": checked, "idCompreJunto": idCompreJunto },
        function(data){
        if(data.cod == 'sucesso'){
            alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
        } else {
            alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
        }
    }, "json");
}



