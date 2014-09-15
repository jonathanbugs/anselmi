(function($) {

	$.fn.extend({

		// Combobox replace
		styleCombobox: function(options) {
			// Init
			var $selector = $(this),
				classFocus = options.classFocus;

			$selector.each(function() {
				var $combo = $(this),
					initialValue = $combo.attr("title") ? $combo.attr("title") : $combo.find("option:selected").text();

				$combo.css("position","relative").before('<span>'+ initialValue +'</span>');
			});

			$selector.bind("change keypress keydown keyup",function() {
				$(this).prev().html($(this).find("option:selected").text());
			});

			$selector.focus(function() {
				$(this).parent().addClass(classFocus);
			}).blur(function() {
				$(this).parent().removeClass(classFocus);
			});
		}
	});
})(jQuery);


/* styleRadioCheckbox 1.0 - Grifo */
(function($) {

	$.fn.extend({

		// Checkbox radiobutton replace
		styleRadioCheckbox: function(options) {
			// Init
			var $selector = $(this),
				classChecked = options.classChecked,
				classFocus = options.classFocus;

			var check = function($obj) {
				if ($obj.attr("checked")) {
					$obj.parent().addClass(classChecked);
				} else {
					$obj.parent().removeClass(classChecked);
				}
			}

			// Estado inicial
			$(document).ready(function() { // Document ready - IE fix
				$selector.each(function() {
					check($(this));
				});
			});

			// Checkbox
			$selector.filter(":checkbox").click(function() {
				check($(this));
			});

			// Radio
			$selector.filter(":radio").click(function() {
				var name = $(this).attr("name");

				$selector.filter("input[name='"+name+"']").each(function() {
					check($(this));
				});
			});

			$selector.focus(function() {
				$(this).parent().addClass(classFocus);
			}).blur(function() {
				$(this).parent().removeClass(classFocus);
			});
		}
	});
})(jQuery);