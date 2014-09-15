$(document).ready(function(){
	init();
	checkboxPresente();
	/*produtosCompreJunto();*/
	calculaFretePrazoEntrega();
	calculaPromoCarrinho();
	tipoEnvio();
	
	$('#btFinalizarCompra').live('click', function(){
		finalizarCompra();
	});

	$('.iptQtdeProduto').live({
		blur: function(){
			var idCarrinho = $(this).attr("id");
			idCarrinho = idCarrinho.replace("iptQtdeProduto-", "");
			var quantidade = $(this).val();
			if(quantidade > 0){
				alteraQuantidadeProdutoCarrinho(idCarrinho, quantidade);
			}
		}, 
		keypress: function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				var idCarrinho = $(this).attr("id");
				idCarrinho = idCarrinho.replace("iptQtdeProduto-", "");
				var quantidade = $(this).val();
				if(quantidade > 0){
					alteraQuantidadeProdutoCarrinho(idCarrinho, quantidade);
				}
			}
		}
	});

	$('.btAddQuantidade').live('click', function(){
		var idCarrinho = $(this).attr('id');
		idCarrinho = idCarrinho.replace('btAddQuantidade-', '');
		var quantidade = $('#iptQtdeProduto-'+idCarrinho).val();
		quantidade = Number(quantidade)+1;
		if(quantidade >= 1){
			$('#iptQtdeProduto-'+idCarrinho).val(quantidade);
			alteraQuantidadeProdutoCarrinho(idCarrinho, quantidade);
		}
	});

	$('.btRemoverQuantidade').live('click', function(){
		var idCarrinho = $(this).attr('id');
		idCarrinho = idCarrinho.replace('btRemoverQuantidade-', '');
		var quantidade = $('#iptQtdeProduto-'+idCarrinho).val();
		quantidade = Number(quantidade)-1;
		if(quantidade >= 1){
			$('#iptQtdeProduto-'+idCarrinho).val(quantidade);
			alteraQuantidadeProdutoCarrinho(idCarrinho, quantidade);
		}
	});

	$('input[name=iptEmbalarPresente]').live('click', function(){
		var checked = $(this).is(':checked');
		var pacotePresente = '';
		if(checked){
			pacotePresente = 'S';
		} else {
			pacotePresente = 'N';
		}
		var idCarrinho = $(this).attr('id');
		idCarrinho = idCarrinho.replace('pacotePresente-', '');
		adicionaPacotePresente(idCarrinho, pacotePresente);
	});

});

function checkboxPresente(){
	$(".lblEmbalarPresente input").styleRadioCheckbox({
		classChecked:"inputEmbalarChecked",	
		classFocus:"inputFocus"
	});
}


/* --------------
	SLIDER COMPRE JUNTO
---------------*/
function produtosCompreJunto(){
	$('.produtosSlide').jCarouselLite({
		btnNext:'.btProdutosSlideNext',
		btnPrev:'.btProdutosSlidePrev',
		circular: true,
		visible: 6,
		scroll: 1,
		speed: 300
	});
}

/*excluir item do carrinho*/
function removeProdutoCarrinho(idCarrinho){
	$.post($BASE_DIR+"actions/carrinho.php", { "acao": "removeProdutoCarrinho", "idCarrinho": idCarrinho },
	  function(data){
	    if(data.retorno == 'sucesso'){
	    	$('#mainCarrinhoCompras').load('carrinho #mainCarrinhoCompras');
	    	loadTopoCarrinho();
	    }
	  }, "json");
}

/*adiciona item produto carrinho*/
function alteraQuantidadeProdutoCarrinho(idCarrinho, quantidade){

	$.post($BASE_DIR+"actions/carrinho.php", { "acao": "alteraQuantidadeProdutoCarrinho", "idCarrinho": idCarrinho, "quantidade": quantidade },
	  function(data){
	    if(data.retorno == 'sucesso'){
	    	$('#mainCarrinhoCompras').load('carrinho #mainCarrinhoCompras');
	    	loadTopoCarrinho();
	    }else if(data.retorno = 'saldoIndisponivel'){
	    	$('#erroQtdIndisponivel-'+idCarrinho).html('Quantidade Indisponível (Saldo atual:'+data.saldo+')');
	    }
	  }, "json");	
	
}

/*adiciona pacote de presente*/
function adicionaPacotePresente(idCarrinho, pacotePresente){
	$.post($BASE_DIR+"actions/carrinho.php", { "acao": "adicionaPacotePresente", "idCarrinho": idCarrinho, "pacotePresente": pacotePresente },
	  function(data){
	    if(data.retorno == 'sucesso'){
	    	$('#mainCarrinhoCompras').load('carrinho #mainCarrinhoCompras');
	    	loadTopoCarrinho();
	    }
	  }, "json");
}

function calculaFretePrazoEntrega(){
	
	$('#linkConsultarCep').live('click',function(){
		$('.resultadoCep').hide();
		$('.buscaCep').show();
	});

	$('#btConsultar').live('click', function(){

		var cep = $('#iptConsultaCep').val();
		cep = cep.replace('-', '');

		$('#loader').fadeIn();
		$('.buscaCep').hide();

		if(cep.length >= 8){
			$('#mainCarrinhoCompras').load('carrinho&acao=calculaFrete&cep='+cep+' #mainCarrinhoCompras');
			loadTopoCarrinho();
		} else {
			$('#loader').fadeOut();
			$('.erroCepNaoInformado').val('Informe um CEP válido!');
			$('.buscaCep').show();
		}

	});

	$("#mainCarrinhoCompras").on({
	    ajaxStart: function() { 
	        $('#loader').fadeIn();
	    },
	    ajaxStop: function() { 
	        $('#loader').fadeOut();
	        placeHolder();
			checkboxPresente();
			tipoEnvio();
	    }    
	});

	$('input[name=valorFrete]').live('click', function(){
		
		var valor = $(this).val();
		valor = valor.split("|");
		var valorFrete = valor[1];
		var tipoFrete = valor[0];
		var cep = $('#iptConsultaCep2').val();
		cep = cep.replace('-', '');
		$('#mainCarrinhoCompras').load('carrinho&acao=calculaFrete&cep='+cep+'&tipoFrete='+tipoFrete+'&valorFrete='+valorFrete+' #mainCarrinhoCompras');
		loadTopoCarrinho();
	});
}

function calculaPromoCarrinho(){
	$('#btCalcularCupom').live('click', function(){
		var codigoCupom = $('#iptCupom').val();
		$('#mainCarrinhoCompras').load('carrinho&codigoCupom='+codigoCupom+' #mainCarrinhoCompras');
	});
	$('#excluirCupom').live('click', function(){
		$('#mainCarrinhoCompras').load('carrinho&excluirCupom=S #mainCarrinhoCompras');
		loadTopoCarrinho();
	});
}

function finalizarCompra(){
	$.post($BASE_DIR+"actions/carrinho.php", { "acao": "finalizaCarrinho"},
	  function(data){
	  	if(data.retorno == 'sucesso'){
	    	location.href="checkout-dados-pessoais";
	    } else {
	    	scrollAnimate('#produtosContent', 1000);
	    }
	  }, "json");
}

function tipoEnvio(){
	$(".lblRadioFrete input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
}

