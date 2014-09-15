$(document).ready(function(){
	init();
	filtroBuscaPedido();
	abrePedido();
});


/*---------
	FILTRO BUSCA PEDIDO
----------*/
function filtroBuscaPedido(){
	$('.relativeBusca').on('click', function(){
		var verifica = $(this).hasClass("checked");
		if (verifica === false) {
			$('.relativeBusca label').removeClass("checked");
			$('.relativeBusca label input').removeAttr('checked');
			$(this).find('label').addClass("checked");
			$(this).find('input').attr('checked','checked');
		} else {
			$('.relativeBusca label').removeClass("checked");
			$(this).children('input').removeAttr('checked');
		}
	});
}

function abrePedido(){
	$(".btVerMais").off().on('click', function(){
		var ele,
			pedidoAberto;

		ele = $(this);
		pedidoAberto = ele.parents('.tabelaListas').next();
		$('.pedidoAberto').slideUp(200);
		pedidoAberto.slideDown(500);

		pedidoAberto.find('.btFecharPedido').on('click', function(){
			pedidoAberto.slideUp(200);
		});
	});
}