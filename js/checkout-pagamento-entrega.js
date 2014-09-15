$(document).ready(function(){
	init();
	tipoEnvio();
	tipoPagamento();
	selectEndereco();
	alteraEnderecoEntrega();
	alteraTipoFrete();
	pagamentoMoip();
	formataCampos();
	modalEndereco();
	$("#iptCep").live('blur', function(){
		buscaEnderecoCep();
	});
	validarFormCadastro();
});

function buscaEnderecoCep(){
	
		var cep = $("#iptCep").val();
	    
	    $('#loader').fadeIn();
	    
	    if(cep.length == 9){
	        $.post($BASE_DIR+"admin/actions/buscaEndereco.php", { "acao": "buscaEndereco", "cep": cep },
	            function(data){
	            if(data.cod == 'sucesso'){
	                $("#iptEndereco").val(data.tipoLogradouroEnderecoPessoa+' '+data.ruaEnderecoPessoa);
	                $("#iptBairro").val(data.bairroEnderecoPessoa);
	                $("#iptCidade").val(data.municipioEnderecoPessoa);
	                $("#iptEstado").val(data.estadoEnderecoPessoa);
	                $("#iptPais").val(data.paisEnderecoPessoa);
	            } else {
	                alert(htmlDecode(data.mensagem));
	            }
	            $('#loader').fadeOut();
	        }, "json");
    	} else {
    		$('#loader').fadeOut();
    	}
	
}

function formataCampos(){
	$("#numeroCartao, #codigoCartao").keypress(verificaNumero);
	$("#cpfTitularCartao").mask("999.999.999-99");
	$("#dataNascimento").mask("99/99/9999");
	$("#telefoneContato").mask("(99)9999-9999?9");
	$("#iptCep").mask("99999-999");
}

function tipoEnvio(){
	$(".lblRadioEnvio input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});

	$('#entregaForm .lblRadioEnvio').live('click', function(){
		$('.entregaBloco').removeClass('entregaBlocoAtivo');
		$(this).parents('.entregaBloco').addClass('entregaBlocoAtivo');
	});
}


function tipoPagamento(){
		$(".lblRadio input").styleRadioCheckbox({
			classChecked:"inputRadioChecked",	
			classFocus:"inputFocus"
		});

		$('#pagamentoForm .lblRadio').on('click', function(){
			var tipoFreteSelecionado = $("#tipoFrete").val();

			if(tipoFreteSelecionado == ""){
				$("#erroFinalizarPedido").show();
				scrollAnimate('#blocoTipoEntrega', 1000);
			} else {
				var ele = $(this);
				$('.pagamentoBlocoBoleto, .pagamentoBlocoTranferencia').find('.btFinalizar').css('display', 'none');

				if(ele.is('.lblRadioBoleto, .lblRadioTransferencia')){
					$('.pagamentoFormDados').slideUp(300);
				}

				//if(ele.is('.lblRadioBoleto')){
					
					//ele.parents('.pagamentoBloco').find('.btFinalizar').css('display', 'block');
				//}

				$('.pagamentoBloco').removeClass('pagamentoBlocoSelecionado');
				$(this).parents('.pagamentoBloco').addClass('pagamentoBlocoSelecionado');
				$('.pagamentoIcone').removeClass('pagamentoIconesCartoesAtivo');
			}
		});


		$('.pagamentoIcone').on('click', function(){

			var tipoFreteSelecionado = $("#tipoFrete").val();

			if(tipoFreteSelecionado == ""){
				$("#erroFinalizarPedido").show();
				scrollAnimate('#blocoTipoEntrega', 1000);
			} else {
				var ele = $(this);
				var valor = ele.attr('id');
				
				$('#bandeiraCartao').val(valor);

				$('.pagamentoBlocoBoleto, .pagamentoBlocoTranferencia').find('.btFinalizar').css('display', 'none');
				$('.pagamentoIcone').removeClass('pagamentoIconesCartoesAtivo');

				if(ele.hasClass('pagamentoIconesCartoes')){
					ele.addClass('pagamentoIconesCartoesAtivo');
					$('.pagamentoFormDados').slideDown(600);
				} else {
					//$('.pagamentoFormDados').slideUp(300);
				}

				$('.pagamentoBloco').removeClass('pagamentoBlocoSelecionado');
				ele.parents('.pagamentoBloco').addClass('pagamentoBlocoSelecionado');

				var elePrev,
					radioInput;

				elePrev = ele.parents('.pagamentoIcones');

				$('.lblRadio').removeClass('inputRadioChecked').removeClass('inputFocus');
				radioInput = elePrev.prev().prev().addClass('inputRadioChecked').addClass('inputFocus').find('input').attr('checked', true);
			}
		});

		$('.pagamentoIconeTransferencia').on('click', function(){

			var tipoFreteSelecionado = $("#tipoFrete").val();

			if(tipoFreteSelecionado == ""){
				$("#erroFinalizarPedido").show();
				scrollAnimate('#blocoTipoEntrega', 1000);
			} else {
				var ele = $(this);
				var valor = ele.attr("id");
				 
				 $('#bancoTransferencia').val(valor);
				 $('.txtBanco strong').html(valor);

				ele.parents('.pagamentoBloco').find('.txtBanco').css('display', 'block');

				$('.pagamentoBloco').removeClass('pagamentoBlocoSelecionado');
				ele.parents('.pagamentoBloco').addClass('pagamentoBlocoSelecionado');
				//$('.pagamentoFormDados').slideUp(300);

				var elePrev,
					radioInput;

				elePrev = ele.parents('.pagamentoIcones');

				$('.lblRadio').removeClass('inputRadioChecked').removeClass('inputFocus');
				radioInput = elePrev.prev().prev().addClass('inputRadioChecked').addClass('inputFocus').find('input').attr('checked', true);
			}
		});
	
}

function selectEndereco(){
	$(".styleCombobox select").styleCombobox({ 
		classFocus:"comboboxFocus" 
	});
}

function alteraEnderecoEntrega(){
	$("#enderecoPessoa").live('change', function(){
		var idEndereco = $(this).val();
		$('#mainFinalizaPedido').load('checkout-pagamento-entrega&idNovoEndereco='+idEndereco+' #produtosContent');
	});

	$("#mainFinalizaPedido").on({
	    ajaxStart: function() { 
	        $('#loader').fadeIn();
	    },
	    ajaxStop: function() { 
	        $('#loader').fadeOut();
	        tipoEnvio();
			selectEndereco();
			tipoPagamento();
			formataCampos();
			modalEndereco();
			validarFormCadastro();

	    }    
	});
}

function alteraTipoFrete(){
	$('input[name=radTipoEntrega]').live('click', function(){
		var tipoFrete = $(this).val();
		$('#mainFinalizaPedido').load('checkout-pagamento-entrega&tipoFrete='+tipoFrete+' #produtosContent');
	});
}


function pagamentoMoip(){

	function validaPagamentoCartaoCredito(){

		var dataNascimento = $("#dataNascimento").val();
		var telefoneContato = $("#telefoneContato").val();
		var parcelamento = $("#parcelamento").val();
		var numeroCartao = $("#numeroCartao").val();
		var mesCartao = $("#mesCartao").val();
		var anoCartao = $("#anoCartao").val();
		var codigoCartao = $("#codigoCartao").val();
		var nomeCartao = $("#nomeCartao").val();
		var cpfTitularCartao = $("#cpfTitularCartao").val();

		if(dataNascimento.length > 0 && telefoneContato.length > 0 && parcelamento.length > 0 && numeroCartao.length > 0 && mesCartao.length > 0 && anoCartao.length > 0 && codigoCartao.length > 0 && nomeCartao.length > 0 && cpfTitularCartao.length > 0){
			return true;
		} else {
			return false;
		}
	}

	pagarMoip = function(FormaPagamento) {

		var tipoFreteSelecionado = $("#tipoFrete").val();

		if(tipoFreteSelecionado == ""){
			
			$("#erroFinalizarPedido").show();
			scrollAnimate('#blocoTipoEntrega', 1000);

		} else {

			$('.btFinalizar').bind('click', function(e){
			        e.preventDefault();
			});

			if((FormaPagamento == "CartaoCredito" && validaPagamentoCartaoCredito()) || FormaPagamento == "DebitoBancario" || FormaPagamento == "BoletoBancario"){

		    	if(FormaPagamento == "CartaoCredito"){
		    		var formaPagamento = $("#bandeiraCartao").val();
		    	} else if(FormaPagamento == "DebitoBancario"){
		    		var formaPagamento = $("#bancoTransferencia").val();
		    	} else if(FormaPagamento == "BoletoBancario"){
		    		var formaPagamento = "BoletoBancario";
		    	}

		    	

		      	$.post("modulo-moip/moip.php", { "idPedido": $("#idPedido").val(), "nroParcelas": $("#parcelamento").val(), "formaPagamento": formaPagamento },
			        function(data){

			        if(data.cod == 'sucesso'){

			        	var retorno = data.cod; 

			        	$("#MoipWidget").attr('data-token', data.token);
			        	
			        	if(FormaPagamento == "CartaoCredito"){
				        	var settings = {
											    "Forma": FormaPagamento,
											    "Instituicao": $("#bandeiraCartao").val(),
											    "Parcelas": $("#parcelamento").val(),
											    "Recebimento": "Parcelado",
											    "CartaoCredito": {
											        "Numero": $("#numeroCartao").val(),
											        "Expiracao": $("#mesCartao").val()+"/"+$("#anoCartao").val(),
											        "CodigoSeguranca": $("#codigoCartao").val(),
											        "Portador": {
											            "Nome": $("#nomeCartao").val(),
											            "DataNascimento": $("#dataNascimento").val(),
											            "Telefone": $("#telefoneContato").val(),
											            "Identidade": $("#cpfTitularCartao").val()
											        }
											    }
											}
						} else if (FormaPagamento == "DebitoBancario"){
							var settings = {
												"Forma": FormaPagamento,
		    									"Instituicao": $("#bancoTransferencia").val()
							}

						} else if (FormaPagamento == "BoletoBancario"){
							var settings = {
												"Forma": FormaPagamento
							}
						}
		                
		                if(retorno == "sucesso"){
		                	MoipWidget(settings);
		                }   
			        
			        } else {
			        	$('.btFinalizar').unbind('click');
			            alert('Não foi possível processar pagamento, verifique os dados e tente novamente!');
			        }
			    }, "json");
			} else {
				$('.btFinalizar').unbind('click');
				alert('Todos os campos são obrigatórios, verifique os dados e tente novamente!');
			}
		}

    }
}

var funcaoSucesso = function(data){
    //alert('Sucesso\n' + JSON.stringify(data));
    if($("input[name=radTipoPagamento]:checked").val() == 'transferencia'){
    	$('.btFinalizar').unbind('click');
    	$(".pagamentoBlocoTranferencia .btFinalizar").attr('href',data.url);
    	$(".pagamentoBlocoTranferencia .btFinalizar").css('display', 'block');
	} else if($("input[name=radTipoPagamento]:checked").val() == 'cartao'){
    	if(data.StatusPagamento == "Sucesso"){
    		$('#loader').fadeIn();
    		$.post("actions/grava-sessao.php", { 'CodigoMoIP': data.CodigoMoIP, 'Status': data.Status },
				function(data){
					var redirect = "checkout-confirmacao";
					$(window.document.location).attr('href',redirect);
			});
    	} else {
    		$('#loader').fadeOut();
    		$('.btFinalizar').unbind('click');
    		alert(data.Mensagem);
    	}
    } else if($("input[name=radTipoPagamento]:checked").val() == 'boleto'){
    	$('.btFinalizar').unbind('click');
    	$(".pagamentoBlocoBoleto .btFinalizar").attr('href',data.url);
    	$(".pagamentoBlocoBoleto .btFinalizar").css('display', 'block');
	}
};

var funcaoFalha = function(data) {
	//alert('Sucesso\n' + JSON.stringify(data));
    if(data.StatusPagamento == "Falha"){
    	alert(data.Mensagem);
    } else {
    	var json_string = JSON.stringify(data);
    	var mensagem = eval(json_string);
    	alert(mensagem[0].Mensagem);
    }
    $('.btFinalizar').unbind('click');
    
};

function validarFormCadastro(){
	$("#formEndereco").validate({
		// Define as regras
		rules:{
			
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
			},
			iptIdentificacaoEndereco:{
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			
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
			iptIdentificacaoEndereco:{
				required: 'Dê um nome ao seu endereço'
			}
		}
	});
}

/**/
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formEndereco').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
        dataType:  'json', 
        //target: '#teste',
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
        //success: function() { 
        //    $('#teste').fadeIn('slow'); 
        //}
    }); 
 });

function processJson(data) {
   if(data.retorno == 'sucesso'){
   		$.fancybox.close();
   		$('#mainFinalizaPedido').load('checkout-pagamento-entrega #produtosContent');
   } else {
	   	alert('Não foi possível alterar o endereço, verifique os campos e tente novamente.');
   } 
}
/**/

function helpCodigoSeg(valor){
	if(valor){
		$('#codigoSeguranca').css('display', 'block');
	} else {
		$('#codigoSeguranca').css('display', 'none');
	}
}

function redirectConfirma(){
	var t=setTimeout(function(){window.location.href='checkout-confirmacao'},3000);
}


document.write(unescape("%3Cscript src='js/form-cadastro.js' charset='utf-8' type='text/javascript'%3E%3C/script%3E"));