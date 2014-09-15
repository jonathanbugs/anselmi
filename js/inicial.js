$(document).ready(function(){
	init();
	banner();
	//sliderInicial();
	filtroRadio();
	// $(window).load(colunasListaProduto(4));
	// $(window).resize(function() {
 //  		colunasListaProduto(4);
	// });
});


/* =========
   BANNER
   ========= */
function banner(){
	$('.banner').cycle();
}


/*---------
	BANNERS HOME
----------*/
// var intervalo;
// function sliderInicial(){
// 	$(".sliderUl")
// 	.after('<div id="sliderNav"><a class="sliderBt sliderBtPrev ir" href="javascript:;">Anterior</a><a class="sliderBt sliderBtNext ir" href="javascript:;">Proximo</a><div id="sliderNavBts">')
// 	.cycle({
// 		slideResize: true,
// 		containerResize: true,
// 		width: '100%',
// 		height: '100%',
// 		fx:     'fade',
// 		easing: 'linear',
// 		speed: 650,
// 		pager: '#sliderNavBts',

// 		pagerAnchorBuilder: function(idx, slide) {
// 			return '<div class="bgNav"><span class="sliderTime"></span><a class="sliderLink" href="#">'+(idx+1)+'</a></div>';
// 		},

// 		before: function(){
// 			$(".sliderTime").css("height", 0);
// 			clearInterval(intervalo);
// 		},
// 		after: function(){
// 			intervalo = window.setInterval(timerSlider, 240);
// 		}
// 	});

// 	$(".sliderBtPrev").on('click', function(){
// 		$(".sliderUl").cycle('prev');
// 	});

// 	$(".sliderBtNext").on('click', function(){
// 		$(".sliderUl").cycle('next');
// 	});
// }

// function timerSlider(){
// 	$(".sliderTime").css("height", $(".sliderTime").height()+1);
// 	if($(".sliderTime").height() >= 18){
// 		clearInterval(intervalo);
// 		$(".sliderUl").cycle('next');
// 	}
// }


/*---------
	FILTRO CADASTRO NEWS
----------*/
function filtroRadio(){
	$('.relativeSexo').on('click', function(){
		var verifica = $(this).hasClass("checked");
		if (verifica === false) {
			$('.relativeSexo label').removeClass("checked");
			$('.relativeSexo label input').removeAttr('checked');
			$(this).find('label').addClass("checked");
			$(this).find('input').attr('checked','checked');
		} else {
			$('.relativeSexo label').removeClass("checked");
			$(this).children('input').removeAttr('checked');
		}
	});
}

/*submit*/
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#newsForm').ajaxForm({ 

        // dataType identifies the expected content type of the server response 
       	dataType:  'json', 
        //target: '#erroFormNews',
        beforeSubmit:  validate,
 
        // success identifies the function to invoke when the server response 
        // has been received 
        success:   processJson 
      //   success: function() { 
      //   	$('#newsForm').resetForm();
      //       $('#erroFormNews').fadeIn();
    		// setTimeout(function(){$('#erroFormNews').fadeOut();},4000); 
      //   }
    }); 
 });

function processJson(data) {
	if(data.retorno == 'sucesso'){
		$('#erroFormNews').fadeIn().html(data.mensagem);
	} else {
		$('#erroFormNews').fadeIn().html(data.mensagem);
	}
}

function validate(formData, jqForm, options) { 
 
  var acao = formData[0].value;

  if(acao == 'cadastraNewsletter'){
  	var nome = $('input[name=nome]').fieldValue(); 
    var email = $('input[name=email]').fieldValue();
    if (!nome[0] || !email[0]) {
    	$('#erroFormNews').fadeIn().html('<font color="red">Os campos Nome e E-mail devem ser informados!</font>');
    	setTimeout(function(){$('#erroFormNews').fadeOut().html('');},4000);
    	return false;
    } else if ($.validateEmail(email[0]) == false){
    	$('#erroFormNews').fadeIn().html('<font color="red">Informe um E-mail válido!</font>');
    	setTimeout(function(){$('#erroFormNews').fadeOut().html('');},4000);
    	return false;
    }
  }
      
}
/**/
