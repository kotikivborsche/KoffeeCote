jQuery(document).ready(function($) {

	// switch toggle

	$.fn.tzCheckbox = function(options){
		
		// Default On / Off labels:
		
		options = $.extend({
			labels : ['ON','OFF']
		},options);
		
		return this.each(function(){
			var originalCheckBox = $(this),
				labels = [];

			// Checking for the data-on / data-off HTML5 data attributes:
			if(originalCheckBox.data('on')){
				labels[0] = originalCheckBox.data('on');
				labels[1] = originalCheckBox.data('off');
			}
			else labels = options.labels;

			// Creating the new checkbox markup:
			var checkBox = $('<span>',{
				class:'tzCheckBox '+(this.checked?'checked':''),
				html:	'<span class="tzCBContent">'+labels[this.checked?0:1]+
						'</span><span class="tzCBPart"></span>'
			});

			// Inserting the new checkbox, and hiding the original:
			checkBox.insertAfter(originalCheckBox.hide());

			//
			$(window).on('load', function() {
				var isChecked = checkBox.hasClass('checked');
				originalCheckBox.attr('checked',isChecked);

				if (originalCheckBox.attr('checked')) {
					$(originalCheckBox).val('1');
				} else {
					$(originalCheckBox).val('0');
				}
			})

			checkBox.click(function(){
				checkBox.toggleClass('checked');
				
				var isChecked = checkBox.hasClass('checked');
				
				// Synchronizing the original checkbox:
				originalCheckBox.attr('checked',isChecked);
				if (originalCheckBox.attr('checked')) {
					$(originalCheckBox).val('1');
				} else {
					$(originalCheckBox).val('0');
				}
				checkBox.find('.tzCBContent').html(labels[isChecked?0:1]);
				// 1.1.4 Update
				TrigggerIT(originalCheckBox);
				// end of 1.1.4
			});
			
			// 1.1.5 Update
			function TrigggerIT(x) {
				x.prop( "checked", true );
			}
			// end of1.1.5
		});
	};

	$('input[type=checkbox].ck').tzCheckbox({labels:['Yes','No']});

	// range slider
	var rangeSlider = function(){
	  var slider = $('.range-slider.rs1'),
	      range = $('.range-slider__range.rsr1'),
	      value = $('.range-slider__value.rsv1');
	    
	  slider.each(function(){

	    value.each(function(){
	      var value = $(this).prev().attr('value');
	      $(this).html(value + '%');
	      
	    });

	    range.on('input', function(){
	      $(this).attr('value', this.value);
	      $(this).next(value).html(this.value + '%');
	    });
	  });
	};

	// button max width
	var rangeSlider2 = function(){
	  var slider2 = $('.range-slider.rs2'),
	      range2 = $('.range-slider__range.rsr2'),
	      value2 = $('.range-slider__value.rsv2');
	    
	  slider2.each(function(){

	    value2.each(function(){
	      var value2 = $(this).prev().attr('value');
	      $(this).html(value2 + '%');
	      
	    });

	    range2.on('input', function(){
	      $(this).attr('value', this.value);
	      $(this).next(value2).html(this.value + '%');
	    });
	  });
	};

	rangeSlider();
	rangeSlider2();

	// hex color pallete

    $("#preferredHex").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true    });

    $("#form-bgcolor-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#label-fc-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#field-bg-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#border-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#field-fc-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#pl-fc-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#bt-border-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#bt-field-bg-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#bt-fc-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#vali-fc-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#vali-b-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

    $("#vali-font-color-icf7s").spectrum({
        preferredFormat: "hex",
        allowEmpty:true,
    	showInitial: true,
        showInput: true
    });

});