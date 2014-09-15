$(document).ready(function(){
	init();
	sliderDestaques();
	tabsProduto();
	produtosSlides();
});


/* --------------
	BANNERS DESTAQUE
---------------*/
var intervalo;
function sliderDestaques(){
	$(".destaquesUl")
	.after('<div id="sliderNav"><div id="sliderNavBts">')
	.cycle({
		fx:     'fade',
		easing: 'linear',
		speed: 650,
		pager: '#sliderNavBts',

		pagerAnchorBuilder: function(idx, slide) {
			return '<div class="bgNav"><span class="sliderTime"></span><a class="sliderLink" href="#">'+(idx+1)+'</a></div>';
		},

		before: function(){
			$(".sliderTime").css("height", 0);
			clearInterval(intervalo);
		},
		after: function(){
			intervalo = window.setInterval(timerSlider, 240);
		}
	});

	$(".sliderBtPrev").on('click', function(){
		$(".destaquesUl").cycle('prev');
	});

	$(".sliderBtNext").on('click', function(){
		$(".destaquesUl").cycle('next');
	});
}

function timerSlider(){
	$(".sliderTime").css("height", $(".sliderTime").height()+1);
	if($(".sliderTime").height() >= 18){
		clearInterval(intervalo);
		$(".sliderUl").cycle('next');
	}
}




/* --------------
	TABS PRODUTOS
---------------*/
function tabsProduto(){
	$('.menuAbasProdutosLink').on('click', function(){
		$(".menuAbasProdutosLi").removeClass("selected");
		$(this).parent().addClass("selected");
		var aba = $(".menuAbasProdutosUl .selected").index()+1;

		$(".conteudoAbasProduto .abaProdutos").hide();
		$(".conteudoAbasProduto .aba"+aba).show();
	});
}


/* --------------
	SLIDER PRODUTOS
---------------*/
function produtosSlides(){
	$('.produtosSlide').each(function(){
		$(this).jCarouselLite({
			btnNext: $(this).children()[1],
			btnPrev: $(this).children()[0],
			circular: true,
			visible: 4,
			scroll: 1,
			speed: 300,
		});
	});
}

