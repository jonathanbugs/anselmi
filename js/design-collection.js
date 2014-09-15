$(document).ready(function(){
	init();
	checkTermos();
	tipoLista();
	showOrdenacao();
	showExibir();
});


/* --------------
	TABS PRODUTOS
---------------*/
function tabsProdutoDesign(){
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
function produtosSlidesDesign(){
	$('.produtosSlide').each(function(){
		$(this).jCarouselLite({
			btnNext: $(this).children()[1],
			btnPrev: $(this).children()[0],
			circular: true,
			visible: 4,
			scroll: 1,
			speed: 300
		});
	});
}
