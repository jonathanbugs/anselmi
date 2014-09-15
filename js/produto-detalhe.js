$(document).ready(function(){
	init();
	modais();
	galeriaProdutos();
	abasDetalhesProduto();
	calculaFretePrazoEntrega();
	estrelasAvaliarProduto();
	voltarTopo();
	checkboxRadioPersonalizado();
	slideCompreJunto();
	fnAlteraQuantidadeProdutoListaCasamento();
});

function galeriaProdutos(){

	$('.thumbsGaleria a').on('click', function(){
		$(".thumbsGaleria .selected").removeClass("selected");
		$(this).parent().addClass("selected");
		var src = $(this).attr('data-src');
		var tipo = $(this).attr("data-tipo");
		var zoom = $(this).attr("data-zoom");
		trocaImg(src, tipo, zoom);
		return false;
	});

	zoom();

	function trocaImg(src, tipo, zoom){
		$('.imagemAmpliada').addClass("loading");

		if (tipo == "video"){
			$("#galeriaProduto .boxProdutoSelo").fadeOut();
			$('.imagemAmpliada').children().fadeOut(function(){
				$(".imagemAmpliada *").remove();

				var novoVideo = '<iframe class"hidden" width="398" height="398" frameborder="0" allowfullscreen="" src="'+src+'"></iframe>'
				$('.imagemAmpliada').append(novoVideo);
				$('.imagemAmpliada iframe').hide().removeClass("hidden");
				$('.imagemAmpliada iframe').fadeIn();
				$('.loading').removeClass("loading");
			});
		} else {
			$('.imagemAmpliada').children().fadeOut(function(){
				$(".imagemAmpliada *").remove();

				var novaImagem = '<a class="jqzoom" href="'+zoom+'" title="titulo"><img class="hidden" src="'+src+'" /></a>';
				$('.imagemAmpliada').append(novaImagem);

				$('.jqzoom').jqzoom({
					zoomType		: "innerzoom",
					title			: false,
					zoomWidth		: 396,
					zoomHeight		: 396,
					preloadImages	: false
				});

				$('.imagemAmpliada img').load(function(){
					$(this).hide().removeClass("hidden");
					$(this).fadeIn();
					$("#galeriaProduto .boxProdutoSelo").fadeIn();
					$('.loading').removeClass("loading");
				});
			});
		}
	}

	function zoom(){
		$('.jqzoom').jqzoom({
			zoomType		: "innerzoom",
			title			: false,
			zoomWidth		: 396,
			zoomHeight		: 396,
			preloadImages	: false
		});
	}

	/* Seta tamanho para a Ul das thumbs e aplica rolagem */
	var qtdeThumbs = $(".thumbsGaleriaUl li").size();
	$(".thumbsGaleriaUl").width((80*qtdeThumbs));
	$('.thumbsGaleria').jScrollPane();
}

function abasDetalhesProduto(){
	$(".menuAbasProduto a").click(function(){
		$(".menuAbasProduto li").removeClass("selected");
		$(this).parent().addClass("selected");
		var aba = $(".menuAbasProduto .selected").index()+1;
		
		$(".conteudoAbasProduto .aba").hide();
		$(".conteudoAbasProduto .aba"+aba).show();
	});
}

function calculaFretePrazoEntrega(){
	$('.linkConsultarOutroCep').live('click',function(){
		$('.blocoResultadoConsulta').hide();
		$('.blocoConsulta').show();
	});

	$('#btConsultar').click(function(){

		var cep = $('#iptConsultaCep').val();
		var idProduto = $('#idProdutoComprar').val();
		cep = cep.replace('-', '');

		$('.blocoConsultaLoader').show();
		$('.blocoConsulta').hide();

		if(cep.length >= 8){
			$.post("actions/carrinho.php", { "acao": "calculaFrete", "cep": cep, "idProduto": idProduto },
			  function(data){
				$('.blocoConsultaLoader').hide();
				$('.blocoResultadoConsulta').html(data);
				$('.blocoConsulta').hide();
				$('.blocoResultadoConsulta').show();
			  }/*, "json"*/);
		} else {
			alert('Informe um CEP válido!');
			$('.blocoConsultaLoader').hide();
			$('.blocoConsulta').show();
		}

	});
}

function estrelasAvaliarProduto(){
	$("#formAvalieProduto .avalieNotas a").hover(function(){
		$("#formAvalieProduto .avalieNotas li").removeClass("hover");
		$(this).parent().addClass("hover").prevAll().addClass("hover");
	},	function(){
		$("#formAvalieProduto .avalieNotas li").removeClass("hover");
	});

	$("#formAvalieProduto .avalieNotas a").click(function(){
		$("#formAvalieProduto .avalieNotas li").removeClass("selected").removeClass("marcacao");
		$(this).parent().prevAll().addClass("marcacao");
		$(this).parent().addClass("selected");
	});
}

function voltarTopo(){
	$(".btVoltarTopo").click(function(){
		scrollAnimate("html", 2000);
	})
}

function checkboxRadioPersonalizado(){
	$("#labelConcordoAvaliacao input").styleRadioCheckbox({
		classChecked:"inputRadioChecked",	
		classFocus:"inputFocus"
	});
}

function retornoFormModais(){
	$(".divModal").hide();
	$(".msgSucessoModal").show();
}

function slideCompreJunto(){
	jQuery(".slideCompreJunto").jcarousel({
		scroll: 5,
		initCallback: mycarousel_initCallback,
		buttonNextHTML: null,
		buttonPrevHTML: null,
		wrap: "circular"
	});
}

function mycarousel_initCallback(carousel) {
	jQuery('.btModuloSlideProximo').bind('click', function() {
		carousel.next();
		return false;
	});

	jQuery('.btModuloSlideAnterior').bind('click', function() {
		carousel.prev();
		return false;
	});
}	

function fnAdicionaListaCasamento(idPessoa, idProduto, urlRedireciona){
	$('#loader').css('display', 'block');
	if(!idPessoa){
		location.href='logar/?redirect='+urlSite()+'/'+urlRedireciona+'.html';
	} else {
		$.post("actions/lista-casamento.php", { "acao": "adicionaProduto", "idPessoa": idPessoa, "idProduto": idProduto },
		  function(data){
			$('#loader').css('display', 'none');
			if(data.retorno == 'naoexiste'){
				location.href='/lista-de-casamento';
			} else if(data.retorno == 'sucesso'){
				$('.modalTitulo').html('<span>Produto adicionado a lista<br>de casamento com sucesso!</span>');
				$("#modalListaCasamento").css('display', 'block');
			} else if(data.retorno == 'existe'){
				$('.modalTitulo').html('<span>Este produto já foi adicionado<br>a sua lista de casamento!</span>');
				$("#modalListaCasamento").css('display', 'block');
			} else {
				$('.modalTitulo').html('<span>Não foi possível adicionar o produto</span>');
				$("#modalListaCasamento").css('display', 'block');
			}
		  }, 'json');	
	}
}

function fnFechaModalListaCasamento(redireciona){
	if(redireciona == 'N'){
		$('#modalListaCasamento').css('display', 'none');
	} else {
		location.href=redireciona;
	}
	
}

function fnAlteraQuantidadeProdutoListaCasamento(){

	$('.iptQtdeProduto').live('blur', function(){
		var idProduto = $('#idProdutoComprar').val();
		var quantidade = $(this).val();
		if(quantidade > 0){
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		} 
	});

	$('.btAddQuantidade').live('click', function(){
		var idProduto = $('#idProdutoComprar').val();
		var quantidade = $('#iptQtdeProduto').val();
		quantidade = Number(quantidade)+1;
		if(quantidade >= 1){
			$('#iptQtdeProduto').val(quantidade);
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		}
	});

	$('.btRemoverQuantidade').live('click', function(){
		var idProduto = $('#idProdutoComprar').val();
		var quantidade = $('#iptQtdeProduto').val();
		quantidade = Number(quantidade)-1;
		if(quantidade >= 1){
			$('#iptQtdeProduto').val(quantidade);
			alteraQuantidadeProdutoListaCasamento(idProduto, quantidade);
		}
	});
}

function alteraQuantidadeProdutoListaCasamento(idProduto, quantidade){
	var url = urlSite();
	$.post(url+"/actions/lista-casamento.php", { "acao": "alteraQuantidadeProduto", "idProduto": idProduto, "quantidade": quantidade },
		function(data){
			if(data.retorno == 'erro'){
				alert('Não foi possível alterar a quantidade do produto!');
			}
		},'json');	
}