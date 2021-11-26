jQuery( document ).ready(function($) {
	// Change the width of logo
	wp.customize('honeypress_logo_length', function(control) {
		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});
	});

	// Change button border radius
	wp.customize('after_menu_btn_border', function(control) {
		control.bind(function( borderRadius ) {
		$('.honeypress_header_btn').css('border-radius', borderRadius + 'px');
			
		});
	});

	// Change container width
	wp.customize('container_width', function(control) {
		control.bind(function( containerWidth ) {
		$('#wrapper .container').css('max-width', containerWidth + 'px');
		$("#wrapper .site-footer .container").css('max-width','1140px');
			
		});
	});

});
