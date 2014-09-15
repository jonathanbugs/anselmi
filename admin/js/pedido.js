//abre pessoa
$(".listaPedidoPessoa").click(function(){
	location.href="pedido-visualiza&idPedido="+$(this).attr("id");
});

/**/
$(".checkbox-acao").click(function(){

	var idPedido = $("#idPedido").val();
	var valorCheckbox = $(this).is(':checked');
	var idCheckbox = $(this).attr('id');
	var idPedidoPagamento = $(this).val();

	$.post("actions/pedido.php", { "acao": "editar"+idCheckbox, "idPedido": idPedido, "valorCheckbox": valorCheckbox, "idPedidoPagamento": idPedidoPagamento },
		function(data){

		if(data.cod == 'sucesso'){
			if(data.retorno){
				$("#retorno"+idPedidoPagamento).html(data.retorno);
			}
			if(idCheckbox == "pedidoPagamentoAtivo"){
				if(valorCheckbox){ $("#tr"+idPedidoPagamento).removeAttr("class"); } else { $("#tr"+idPedidoPagamento).attr("class", "inativo"); }
			}
			alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
		} else {
			alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
		}
	}, "json");
});
/**/

/**/
function editarPedidoItem(idPedidoItem){

	var pacotePresente = $("#pacotePresente"+idPedidoItem).is(":checked");
	var valorDescontoPedidoItem = $("#valorDescontoPedidoItem"+idPedidoItem).val();
	var quantidadeItem = $("#quantidadeItem"+idPedidoItem).val();
	var situacaoItemPedido = $("#situacaoItemPedido"+idPedidoItem).val();

	$.post("actions/pedido.php", { "acao": "editarPedidoItem", "idPedidoItem": idPedidoItem, "pacotePresente": pacotePresente, "valorDescontoPedidoItem": valorDescontoPedidoItem, "quantidadeItem": quantidadeItem, "situacaoItemPedido": situacaoItemPedido },
		function(data){
		if(data.cod == 'sucesso'){
			alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
		} else {
			alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
		}
	}, "json");
}
/**/

$("#novo-pagamento").click(function(){
	$(".form-pedido-pagamento").fadeIn();
});
$(".form-pedido-pagamento .minia-icon-close").click(function(){
	$(".form-pedido-pagamento").fadeOut();
});

$("#novo-produto").click(function(){
	$(".form-produto-pedido").fadeIn();
});
$(".form-produto-pedido .minia-icon-close").click(function(){
	$(".form-produto-pedido").fadeOut();
});


/**/
$(document).ready(function() {
	// bind form using ajaxForm
	$('#editarPedido, #cadastrarPedidoPagamento, #pedidoItem, #cadastrarProdutoPedido, #cadastrarPedido, #atenderPedido, #despacharPedido, #formCadastraOcorrencia').ajaxForm({

		// dataType identifies the expected content type of the server response
		dataType:  'json',
		//target: '#teste',
		beforeSubmit: function() { 
            $('body').addClass('loadstate');
        },

		// success identifies the function to invoke when the server response
		// has been received
		success:   processJson
		// success: function() {
		//    $('#teste').fadeIn('slow');
		// }
	});
});

function processJson(data) {
	 $('body').removeClass('loadstate');
	// 'data' is the json object returned from the server
	if(data.cod == "existe" || data.cod == "erro") {
		alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
	} else {
		alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
		if(data.redirect){
			setTimeout("location.href='"+data.redirect+"'",2000);
		}
		if(data.ocorrencia == 'S'){
            $('#historicoOcorrenciaPessoa .dl-horizontal').append('<dt>'+data.dataOcorrencia+'</dt><dd>'+$('#ocorrenciaPedido').val()+'</dd>');
            $('#ocorrenciaPessoa').val('');
        }

	}
}

/**/

/**/
$("#tipoFrete").change(function(){

	var tipoFrete = $(this).val();
	var idPedido = $("#idPedido").val();

	$.post("actions/pedido.php", { "acao": "calcularFretePedido", "tipoFrete": tipoFrete, "idPedido": idPedido },
		function(data){
//alert(data);
		if(data.cod == 'sucesso'){

			if(data.mensagemErro){
				alertGeral("error", "Alerta!", data.mensagemErro, "picon icon16 iconic-icon-check-alt white", true);
			} else if(data.valorFrete){
				$("#valorFrete").val(data.valorFrete);
				alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
			}

		} else {
			alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
		}
	}, "json");
});
/**/

$('#idPessoa').select2({
	placeholder: 'Buscar',
	minimumInputLength: 4,
	ajax: {
		url: "actions/pessoa.php?acao=listaPessoa",
		dataType: 'json',
		quietMillis: 100,
		data: function (term, page) {
			return {
				term: term, //search term
				page_limit: 10 // page size
			};
		},
		results: function (data, page) {
			return { results: data.results };
		}

	},

});

$("#cupomPromocional").change(function(){
	var idPedido = $("#idPedido").val();
	var idCupom = $(this).val();

	$.post("actions/pedido.php", { "acao": "editarCupomPedido", "idPedido": idPedido, "idCupom": idCupom },
		function(data){

		if(data.cod == 'sucesso'){
			alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
		} else {
			alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
		}
	}, "json");

});

$("#enderecoEntrega").focus(function(){

	var idPessoa = $("#idPessoa").select2("val");


	$("#load-endereco-entrega").show();

	$.post("actions/pedido.php",{"idPessoa": idPessoa, "acao": 'enderecoEntrega'}, function(data){

		if(data){
			var options = '';
			for (var i = 0; i < data.length; i++) {

				options += '<option value="' + data[i].optionValue + '">' + data[i].optionDisplay + '</option>';
			}
			$("select#enderecoEntrega").html(options);
			$("#load-endereco-entrega").hide();
		} else {
			alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
			$("#load-endereco-entrega").hide();
		}
	},"json");

});

/**/
$(".idProduto").click(function(){

	var checkbox = $(this).is(':checked');
	var valorCheckbox = $(this).val();
	var idsProdutos = $("#idsProdutos").val();
	var idsProdutosTirar = idsProdutos.replace(valorCheckbox+",","");
	var idsProdutosAdicionar = idsProdutos+valorCheckbox+",";

	if(checkbox){
		$("#idsProdutos").val(idsProdutosAdicionar);
	} else {
		$("#idsProdutos").val(idsProdutosTirar);
	}

});
/**/

/**/
$(".atenderPedido").click(function(){
	var idPedidoItem = $(this).attr("id");
	idPedidoItem = idPedidoItem.replace("atenderPedido", "");
	var qtdPedidoItem = $("#qtdPedidoItem"+idPedidoItem).val();
	$("#qtdAtendido"+idPedidoItem).val(qtdPedidoItem);
	$('#idSituacaoPedidoItem'+idPedidoItem).val(5);
	//$('#idSituacaoPedidoItem'+idPedidoItem+' option[value="' + 5 + '"]').attr("selected","selected");

});

$(".idSituacaoPedidoItem").each(function(){
	var idPedidoItem = $(this).attr("id");
	idPedidoItem = idPedidoItem.replace("idSituacaoPedidoItem", "");
	if($(this).val() != idSituacaoPedidoAprovadoCredito){
		$("#atenderPedido"+idPedidoItem).attr("disabled","disabled");
	}
});

$(".idSituacaoPedidoItem").change(function(){

	var idPedidoItem = $(this).attr("id");
	idPedidoItem = idPedidoItem.replace("idSituacaoPedidoItem", "");
	if($(this).val() == idSituacaoPedidoAtendido)  {
		$("#qtdAtendido"+idPedidoItem).val($("#qtdPedidoItem"+idPedidoItem).val());
	} else if($(this).val() != idSituacaoPedidoAprovadoCredito){
		$("#atenderPedido"+idPedidoItem).attr("disabled","disabled");
		$("#qtdAtendido"+idPedidoItem).val(0);
	} else {
		$("#atenderPedido"+idPedidoItem).removeAttr("disabled");
		$("#qtdAtendido"+idPedidoItem).val(0);
	}
});
/**/

/**/
if($("#idPedidoDespacho").length){
	$("#idPedidoDespacho").focus();
}
$("#idPedidoDespacho").keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13') {
		if($("#codRastreamento"+$(this).val()).length){
			$("#codRastreamento"+$(this).val()).focus();
			$("#tr"+$(this).val()).attr("class", "selecionado");
			$("#idPedido"+$(this).val()).attr("checked",true);
		} else {
			$("#pedidoNaoEncontrados").val($("#pedidoNaoEncontrados").val()+$(this).val()+",");
			$(this).val('');
		}
	}
});
$(".codRastreamento").keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13') {
		$("#idPedidoDespacho").focus();
		if($(this).val().length < 4){
			$("#tr"+$("#idPedidoDespacho").val()).attr("class", "falta-cod");
		}
		$("#idPedidoDespacho").val('');
	}
});

/**/

if($('#tableListaProduto').length){
	/*datatables*/
	var oTable = $('#tableListaProduto').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bLengthChange": false,
		"sAjaxSource": "actions/produto_combinacao_lista.php",
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

			var idsProdutos = $("#idsProdutos").val();
			idsProdutos = idsProdutos.substr(0,(idsProdutos.length -1));
			var arrayIdsProdutos = idsProdutos.split(",");

			if (jQuery.inArray(aData[0]+'', arrayIdsProdutos) >= 0){
				$('td:eq(3)', nRow).html( '<input type="checkbox" value="'+aData[0]+'" checked="checked">' );
			} else {
				$('td:eq(3)', nRow).html( '<input type="checkbox" value="'+aData[0]+'">' );
			}

		},
	});
}



$('#tableListaProduto tbody tr input:checkbox').live('click', function () {
	var checkbox = $(this).is(':checked');
	var valorCheckbox = $(this).val();
	var idsProdutos = $("#idsProdutos").val();
	var idsProdutosTirar = idsProdutos.replace(valorCheckbox+",","");
	var idsProdutosAdicionar = idsProdutos+valorCheckbox+",";

	if(checkbox){
		$("#idsProdutos").val(idsProdutosAdicionar);
	} else {
		$("#idsProdutos").val(idsProdutosTirar);
	}
});


if($('#tableListaPedido').length){
	var oTable2 = $('#tableListaPedido').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bLengthChange": false,
		"sAjaxSource": "actions/pedido_lista.php",
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

			$('td:eq(9)', nRow).html( '<a href="pedido-visualiza&idPedido='+aData[9]+'"><span class="icon-file"></span></a>   <a href="/emails/imprime-pedido.php?idPedido='+aData[9]+'" target="_blank"><span class="icon-print"></span></a>' );

			// if (aData[9]){
			// 	$('td:eq(9)', nRow).html( '<a href="lista-casamento-cadastra&idListaCasamento='+aData[9]+'"><span class="icon-heart"></span></a>');
			// }

			if(aData[8] == 'DIGITAÇÃO'){
				$(nRow).addClass('DIGITACAO');
			} else
			if(aData[8] == 'ANÁLISE CRÉDITO'){
				$(nRow).addClass('ANALISE-CREDITO');
			} else
			if(aData[8] == 'APROVADO CRÉDITO'){
				$(nRow).addClass('APROVADO-CREDITO');
			} else
			if(aData[8] == 'NEGADO CRÉDITO'){
				$(nRow).addClass('NEGADO-CREDITO');
			} else
			if(aData[8] == 'ATENDIDO'){
				$(nRow).addClass('ATENDIDO');
			} else
			if(aData[8] == 'FATURADO'){
				$(nRow).addClass('FATURADO');
			} else
			if(aData[8] == 'CANCELADO'){
				$(nRow).addClass('CANCELADO');
			} else
			if(aData[8] == 'AGUARDANDO FATURAMENTO'){
				$(nRow).addClass('AGUARDANDO-FATURAMENTO');
			} else
			if(aData[8] == 'TIMEOUT DE SESSAO'){
				$(nRow).addClass('TIMEOUT-DE-SESSAO');
			} else
			if(aData[8] == 'DESPACHADO'){
				$(nRow).addClass('DESPACHADO');
			} else
			if(aData[8] == 'DEVOLVIDO'){
				$(nRow).addClass('DEVOLVIDO');
			} else
			if(aData[8] == 'CONTESTADO'){
				$(nRow).addClass('CONTESTADO');
			} else
			if(aData[8] == 'PROD INDISPONIVEL'){
				$(nRow).addClass('PROD-INDISPONIVEL');
			} else
			if(aData[8] == 'AGUARDANDO ESTOQUE'){
				$(nRow).addClass('AGUARDANDO-ESTOQUE');
			} else
			if(aData[8] == 'AGUARDANDO PAGAMENTO'){
				$(nRow).addClass('AGUARDANDO-PAGAMENTO');
			} else
			if(aData[8] == 'ENTREGUE'){
				$(nRow).addClass('ENTREGUE');
			} else
			if(aData[8] == 'AGUARDANDO DEVOLUÇÃO PARA TROCA'){
				$(nRow).addClass('AGUARDANDO-DEVOLUCAO-PARA-TROCA');
			} else
			if(aData[8] == 'ESTORNADO'){
				$(nRow).addClass('ESTORNADO');
			} else
			if(aData[8] == 'REEMBOLSADO'){
				$(nRow).addClass('REEMBOLSADO');
			} else
			if(aData[8] == 'EXPEDIÇÃO'){
				$(nRow).addClass('EXPEDICAO');
			}
		},
	});

	oTable2.fnFilter(
	    $('#buscaGeralTopo').val(),
	    null
	);
}

/*$('#tableListaPedido tbody tr').live('click', function () {

	var idPedido = $(this).find("td")[0].innerHTML;
	redirectPagina('pedido-visualiza','idPedido', idPedido);


});*/
/**/







$(document).ready(function(){
	$('#exportaArquivo').ajaxForm({
		dataType:  'json',
		success:    processJsonDownload
	});
	$('.dialog').dialog({
		autoOpen: false,
		modal: true,
		dialogClass: 'dialog',
		buttons: {
			"Exportar": function() {
				$('#exportaArquivo').submit();
				$(this).dialog("close");
			},
			"Cancelar": function() {
				$(this).dialog("close");
			}
		}
	});
	$('.modal-toggle').click(function(){
		$('#exportaArquivo').dialog('open');
		$('#busca').val($('input[aria-controls$="tableListaPedido"]').val());
		return false;
	});
});

function processJsonDownload(data) {
	// 'data' is the json object returned from the server
	if(data.cod == "existe" || data.cod == "erro") {
		alertGeral("error", "Alerta!", data.mensagem, "picon icon24 typ-icon-cancel white", true);
	} else {
		alertGeral("success", "Sucesso!", data.mensagem, "picon icon16 iconic-icon-check-alt white", true);
		window.open(data.nomeArquivo,'Download');
	}
	return false;
}


//------------- Input limiter -------------//
if ($('textarea').hasClass('limit')) {
    $('#ocorrenciaPedido').inputlimiter({
        limit: 4000,
        remText: 'Você só tem %n caracteres restantes...',
        limitText: 'Campo limitado em %n caracteres.'
    });
}
