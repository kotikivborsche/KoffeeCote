jQuery(document).ready(function($) {

	// add custom class to frontend

		// var str = $('.wpcf7').attr('id');
		$( ".wpcf7" ).each(function() {
		  str = $( this ).attr( 'id' );
		
		if (str.indexOf('-p') > -1 ) {
			var exrt = str.match("wpcf7-f(.*)-p");
		} else {
			var exrt = str.match("wpcf7-f(.*)-o");
		}
		
		$( '#'+ str ).addClass( "icf7s-" + exrt[1] );

		});

	$( ".wpcf7 label span").has("textarea").parent().addClass('text-area-full');
	$( ".wpcf7 .wpcf7-submit").wrap("<div class='icf7s-button'></div>");
	$(".wpcf7 br").remove();

});