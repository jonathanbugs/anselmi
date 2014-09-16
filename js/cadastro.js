$(document).ready(function(){
	init();
	formulario();
});



/* ============
   FOCUS INPUT
   ============ */
function formulario(){
	$('.formGeral .relative').on('click', function(){
		$(this).find('.inputForm').trigger("focus");
	});


	$('#formContato').validate({
		errorClass: 'erro',
		validClass: 'valido',
		highlight: function( element, errorClass, validClass ) {
			$(element).parents('.blocoForm, .relative').addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function( element, errorClass, validClass ) {
			$(element).parents('.blocoForm, .relative').removeClass(errorClass).addClass(validClass);
		},
		ignore: '',
		rules: {
			email: { required: true, email: true },
			senha: { required: true, minlength: 5 },
			confirmaSenha: { required: true, minlength: 5, equalTo: "#senha" }
		},

		submitHandler: function(form) {
			//
		}
	});

	$("input:checkbox").styleRadioCheckbox({ 
		classChecked:"inputCheckboxChecked", 
		classFocus:"inputFocus" 
	}); 
}
