/* --------------
	FUNCOES PROJETO
---------------*/
function init(){
	showErros();
	placeHolder();
	trocaImagemHoverProdutos();
	//$('.scroll').jScrollPane({autoReinitialise: true});
	//loadTopoCarrinho();
	//modalNewsletter();
	$('.scroll').jScrollPane({autoReinitialise: true});

	$('.paginacaoLinks, .nroProdutosLista, .linkOrdenacao').live('click', function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		window.history.pushState(null, null, link);
		$('#loaderListagemProdutosAjax').show();
		$('#listagemProdutosAjax').load(link+' #listagemProdutosAjax');
		scrollAnimate('#produtosContent', 1000);
	});

}


function modalNewsletter(){

	var assinaturaNewsletter =  $.cookie("assinaturaNewsletter");

	if(assinaturaNewsletter != 'S'){
		$(".modalNewsletter").css('display', 'block');
		$('#bgModal').css('display', 'block');
	}

	$('#emailNewsletter').focus(function(){
		if($.validateEmail($(this).val()) == false){
			$(this).val('');
		}	
	});
	$('#emailNewsletter').blur(function(){
		if($.validateEmail($(this).val()) == false){
			$(this).val('Informe aqui seu e-mail');
		}	
	});
	$('#btnFecharModal').click(function(){
		$('.modalNewsletter').fadeOut();
		$('#bgModal').fadeOut();
		$.cookie("assinaturaNewsletter", "S", { expires: 1, path: '/' });
		//setCookie('assinaturaNewsletter','S',1);
	});
	$('.modalNewsletter button').click(function(){
		var sexo = $(this).val();
		var email = $('.modalNewsletter #emailNewsletter').val();
		if($.validateEmail(email) == false){
			alert('Informe um e-mail válido');
		} else {
			var url = urlSite();
			$('.modalNewsletter #retornoNewsletter').css('display', 'block').html('<img src="'+url+'/img/modal/ajax-loader-2.gif"> Aguarde...');
			$.post(url+"/actions/cadastro.php", { "acao": "cadastraNewsletter", "email": email, "sexo": sexo },
			  function(data){
					if(data.retorno == 'sucesso'){
						//setCookie('assinaturaNewsletter','S',365);
						$.cookie("assinaturaNewsletter", "S", { expires: 365, path: '/' });
						$('.modalNewsletter #retornoNewsletter').css('display', 'block').html(data.mensagem);
						var t=setTimeout(function(){
							$('.modalNewsletter').fadeOut();
							$('#bgModal').fadeOut();
						},5000);
					} else {
						$('.modalNewsletter #retornoNewsletter').css('display', 'block').html(data.mensagem);
					}
			  }, "json");

		}
	});
}

function showErros(){
	$('#boxErro').stop().animate({
		height: 220
	}, 500, 'linear');

	$('.btClose').on('click', function(){
		$('#boxErro').stop().animate({
			height: 0
		}, 200, 'linear');

		$('.containerErro').delay(50).hide();
	});

	$('.btFade').hover(function(){
		$(this).children('span').stop().fadeTo(200,1);
	}, function(){
		$(this).children('span').stop().fadeTo(200,0);
	});

	$('.boxAtualize').stop().animate({
		marginLeft: 0,
		opacity: 1
	}, 500, 'easeOutElastic');

	$('.boxTxtAtualize').stop().delay(220).animate({
		opacity: 1
	}, 500, 'linear');

	$('.btDownload').stop().delay(220).animate({
		right: 0,
		opacity: 1
	}, 500, 'easeInOutBack');

	$('.btClose').stop().delay(220).animate({
		top: 10,
		opacity: 1
	}, 500, 'easeInOutBack');
}


function tipoLista(){
	$('.linkTipo').live('click', function(){
		var ele = $(this),
			produtoLi = $('.produtoLi')

		$('.linkTipo').removeClass('ativo');
		ele.addClass('ativo');

		if(ele.hasClass('linkTipoTabela')){
			produtoLi.removeClass('produtoLiListagem');
			produtoLi.addClass('produtoLiTabela');
			//setCookie('tipoLista','tipoLista',365);
			$.cookie("tipoLista", "linkTipoTabela", { expires: 365 });
			$('.produtosLimiter').show();
			//colunasListaProduto(5);
			//document.location.reload(true);
		} else {
			produtoLi.removeClass('produtoLiTabela');
			produtoLi.addClass('produtoLiListagem');
			//setCookie('tipoLista','linkTipoListagem',365);
			$.cookie("tipoLista", "linkTipoListagem", { expires: 365 });
			$('.produtosLimiter').hide();
		}
	});

	cookieLista =  $.cookie("tipoLista");
	if(cookieLista){
		var ele = $('.'+cookieLista),
			produtoLi = $('.produtoLi');

		$('.linkTipo').removeClass('ativo');
		ele.addClass('ativo');
	
		if(ele.hasClass('linkTipoTabela')){
			produtoLi.removeClass('produtoLiListagem');
			produtoLi.addClass('produtoLiTabela');
			//setCookie('tipoLista','linkTipoTabela',365);
			$.cookie("tipoLista", "linkTipoTabela", { expires: 365 });
			$('.produtosLimiter').show();
		} else {
			produtoLi.removeClass('produtoLiTabela');
			produtoLi.addClass('produtoLiListagem');
			//setCookie('tipoLista','linkTipoListagem',365);
			$.cookie("tipoLista", "linkTipoListagem", { expires: 365 });
			$('.produtosLimiter').hide();
		}
	}
}


function showOrdenacao(){
	$('.linkSelectShowOrdenacao').live('click', function(){
		var ele = $(this),
			elementoNext = ele.next(),
			boxOrdenar = $('.boxOrdenar');

		var intDropOrdenacao;

		boxOrdenar.mouseenter(function() {
			clearTimeout(intDropOrdenacao);
		});

		boxOrdenar.mouseleave(function() {
			clearTimeout(intDropOrdenacao);
			intDropOrdenacao = setTimeout(function(){
				elementoNext.slideUp('fast');
				ele.removeClass('linkSelectBoder');
			}, 1000);
		});

		if ($(elementoNext).is(":hidden")) {
			ele.addClass('linkSelectBoder');
			$(elementoNext).slideDown(50);
		} else {
			ele.removeClass('linkSelectBoder');
			$(elementoNext).slideUp('fast');
		}
	});
}

function showExibir(){
	$('.linkSelectShowExibir').live('click', function(){
		var ele = $(this),
			elementoNext = ele.next(),
			boxExibir = $('.boxExibir');

		var intDropExibir;

		boxExibir.mouseenter(function() {
			clearTimeout(intDropExibir);
		});

		boxExibir.mouseleave(function() {
			clearTimeout(intDropExibir);
			intDropExibir = setTimeout(function(){
				elementoNext.slideUp('fast');
				ele.removeClass('linkSelectBoder');
			}, 1000);
		});

		if ($(elementoNext).is(":hidden")) {
			ele.addClass('linkSelectBoder');
			elementoNext.slideDown(50);
		} else {
			ele.removeClass('linkSelectBoder');
			elementoNext.slideUp('fast');
		}
	});
}




/* --------------
	FUNCOES GERAIS
---------------*/
function linkExterno(){
	$('a[rel=blank]').click(function(){
		window.open(this.href);
		return false;
	});
}

function placeHolder(){
	$('.input, .textarea').on('keyup',function(){
		if($(this).val()===''){ $(this).prev().show(); }
	}).on('keydown',function(){
		$(this).prev().hide();
	}).on('change',function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	}).on('focusout',function(){
		$(this).prev().fadeTo(0,1);
		if ($(this).val()===''){ $(this).prev().show(); $(this).parent().find('.erro').show(); } else { $(this).prev().hide(); $(this).parent().find('.erro').hide(); }
	}).on('focusin',function(){
		if ($(this).val()===''){ $(this).prev().show(); $(this).prev().fadeTo(0,0.3); } else { $(this).prev().hide(); }
	}).each(function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	});
}

function linguagem(){
	$('.btLang').on('click', function(){
		// <a href="javascript:;" class="btLang en" rel="en">EN</a>
		var lang = $(this).attr('rel');
		$.cookie($CLIENTE+'_linguagem', lang, { expires: 365, path: '/' });
		window.location.reload();
	});
}

function selectPersonalizado(){
	$('.selectPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var val = ele.find('option:selected').text();
		ele.prev().text(val);
	});
}

function checkTermos(ele){
	ele = $(ele);
	var parent = ele.parent();
	if(ele.is(':checked')){
		parent.removeClass('uncheck');
	} else {
		parent.addClass('uncheck');
	}
}

function radioPersonalizado(){
	$('.radioPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var eleName = ele.attr('name');
		if(ele.is(':checked')){
			$('input[name="'+eleName+'"]').parent().removeClass('checked');
			ele.parent().addClass('checked');
		} else {
			ele.parent().removeClass('checked');
		}
	});

	$('.labelRadio').on('click', function(){
		$(this).children('input').trigger('click');
		return false;
	});
}

function checkboxPersonalizado(){
	$('.checkPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		if(ele.is(':checked')){
			ele.parent().addClass('checked');
		} else {
			ele.parent().removeClass('checked');
		}
	});

	$('.labelCheck').on('click', function(){
		$(this).children('input').trigger('click');
		return false;
	});
}

function filePersonalizado(){
	$('.filePrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var val = ele.val();
		ele.prev().text(val);
	});
}

function setCookie(c_name,value,exdays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name){
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1){
		c_start = c_value.indexOf(c_name + "=");
	}
	if (c_start == -1){
		c_value = null;
	} else {
		c_start = c_value.indexOf("=", c_start) + 1;
		var c_end = c_value.indexOf(";", c_start);
	
		if (c_end == -1){
			c_end = c_value.length;
		}
		c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
}

function modais(){
	$(".linkModal").fancybox({
		padding	 	: 45,
		margin 		: 40,
		autoSize	: true,
		fitToView 	: false,
		title 		: "",
		minHeight	: 70
	});
}

function modalEndereco(){
	$(".linkModalEndereco").fancybox({
		padding	 	: 45,
		margin 		: 40,
		autoSize	: false,
		width	 	: 700,
		height		: "auto",
		fitToView 	: false,
		title 		: "",
		minHeight	: 70
	});
}

function fnComprarProduto(idProduto, redirecionar){

	if(idProduto){
		$.post($BASE_DIR+"actions/carrinho.php", { "acao": "gravaProduto", "idProduto": idProduto },
		  function(data){
			if(data.retorno == 'existe' || data.retorno == 'sucesso'){
				if(redirecionar == 'true'){
					location.href="carrinho";
				} else {
					loadTopoCarrinho(true);
					scrollAnimate('#boxLogo', 1000);
					
				}
			}
		  }, "json");
	}

}

function scrollAnimate(id, vel){
	$('html, body').animate({
		scrollTop: $(id).offset().top
	}, vel);
}





/* --------------
	HOVER PRODUTOS
---------------*/
function trocaImagemHoverProdutos(){
	var link,
		novoLink;

	$('.produtoThumbLink').on('click', function(){
		$(this).parents('.produtoThumbsUl').find('.produtoThumbLink').removeClass('produtoThumbLinkAtivo')
		$(this).addClass('produtoThumbLinkAtivo');

		link = $(this).children().attr('src');
		novoLink = link.replace('thumbs-hover', 'listagem');

		$(this).parents('.produtoHover').next().find('.produtoImg').attr('src', novoLink);
	});
}

/*----------------
MOSTRA CARRINHO TOPO
------------------*/
function loadTopoCarrinho(addCarrinho){
	$('.topoCarrinho').html('<img src="../img/backgrounds/loader_actions.gif">').load('topo-carrinho #produtosCarrinhoUl', function(){
		$('.scroll').jScrollPane({autoReinitialise: true});
		if(addCarrinho == true){
			$('.topoCarrinho').find('.produtosCarrinhoUl').addClass('hoverCarrinho');
			$('.produtosCarrinhoUl').bind('mouseout', function() { 
				$('.produtosCarrinhoUl').removeClass('hoverCarrinho');
			});
		}
	});
	
}

$.validateEmail = function (str){
	er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(str))
		return true;
	else
		return false;
};

function verificaNumero(e) {
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
}

// function colunasListaProduto(colunas) {

// 	if($(window).width() <= 1024){
// 		if(colunas == 5){
// 			colunas = colunas-1;
// 		} else {
// 			colunas = colunas;
// 		}
// 	}
	
// 	$('.produtoLiTabela').each(function(){
// 		$(this).removeClass('produtoLiLast');
// 		$('.produtoLiTabelaSeparador').hide(); 
// 	}); 

// 	var i = 0;
// 	$('.produtoLiTabela').each(function(){
// 		i++;
// 		if(i == colunas){
// 			$(this).addClass('produtoLiLast');
// 			$(this).after('<li class="produtoLi produtoLiTabelaSeparador"><span class="produtosLimiter"></span></li>'); 
// 			i = 0;
// 		}
// 	});
	
//  }

 function solicitaNovaSenha(){
	$('#btEnviarSenha').on('click', function(){
		$('#msnRetorno').html('<img src="../img/backgrounds/ajax-loader.gif">');
		$(this).attr('disabled', 'disabled');
		var email = $('#iptEmailCadastrado').val();
		$.post($BASE_DIR+"actions/cadastro.php", { "email": email, "acao": "enviaNovaSenha" },
		  function(data){
			$("#btEnviarSenha").removeAttr('disabled');
			$('#msnRetorno').html(data.mensagem);
			if(data.retorno == 'sucesso'){
				var t=setTimeout(function(){location.reload()},3000);
			}
		  }, "json");
	});
}

function urlSite(){
	var url = window.location;
	url = url.toString()
	url = url.split(".");
	urlCont = url[3].split("/");
	return url = url[0]+'.'+url[1]+'.'+url[2]+'.'+urlCont[0];   
}

function sairListaCasamento(){
	$.post($BASE_DIR+"actions/lista-casamento.php", { "acao": "sairListaCasamento" },
	  function(data){
		$("#loader").fadeIn();
		if(data.retorno == 'sucesso'){
			location.href=urlSite();
		}
	  }, "json");	
}

function htmlDecode(value) {
	if (value) {
		return $('<div />').html(value).text();
	} else {
		return '';
	}
}
