<?php
function honeypress_enqueue_script()
	{
		if(get_theme_mod('custom_color_enable') == true) {
				honeypress_custom_light();
		}
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	require_once('custom_style.php');
	wp_enqueue_style('bootstrap', HONEYPRESS_THEME_URI.'/assets/css/bootstrap' . $suffix . '.css',array(),'4.0.0');
        wp_style_add_data( 'bootstrap', 'rtl', 'replace' );
	wp_enqueue_style('honeypress-style', get_stylesheet_uri() );
        wp_style_add_data( 'honeypress-style', 'rtl', 'replace' );
	wp_enqueue_style('jquery-startmenu', HONEYPRESS_THEME_URI. '/assets/css/jquery.smartmenus.bootstrap-4.css');
        wp_style_add_data( 'jquery-startmenu', 'rtl', 'replace' );
	wp_enqueue_style('honeypress-font','https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i');
	wp_enqueue_style('font-awesome', HONEYPRESS_THEME_URI. '/assets/css/font-awesome/css/font-awesome' . $suffix . '.css',array(),'');
	wp_enqueue_style('owl', HONEYPRESS_THEME_URI. '/assets/css/owl.carousel.css');

	//js file
	wp_enqueue_script('bootstrap', get_template_directory_uri(). '/assets/js/bootstrap' . $suffix . '.js',array('jquery'), '', true);
	wp_enqueue_script('jquery-menu', get_template_directory_uri().'/assets/js/smartmenus/jquery.smartmenus.js',array('jquery'), '', true);
	wp_enqueue_script('jquery-menu-bootstrap', get_template_directory_uri().'/assets/js/smartmenus/jquery.smartmenus.bootstrap-4.js',array('jquery'), '', true);
	wp_enqueue_script('owl', get_template_directory_uri().'/assets/js/owl.carousel' . $suffix . '.js',array('jquery'), '', true);
	wp_enqueue_script('honeypress-custom-js', get_template_directory_uri().'/assets/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('honeypress-video-slider-js', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}

	}
	add_action('wp_enqueue_scripts','honeypress_enqueue_script');


	function honeypress_plus_enqueue_scripts(){
	wp_enqueue_style('honeypress-customize-css', HONEYPRESS_THEME_URI . '/assets/css/honeypress_customize.css');
	}
	add_action( 'admin_enqueue_scripts', 'honeypress_plus_enqueue_scripts' );

	/**
 	* Added skip link focus
 	*/
	function honeypress_skip_link_fn() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
	}
	add_action( 'wp_print_footer_scripts', 'honeypress_skip_link_fn' );

	//Load script at admin side
	function honeypress_admin_scripts() {
   	 	wp_enqueue_script( 'honeypress-admin-script', HONEYPRESS_THEME_URI . '/assets/js/admin.js', array('jquery'));
	}
	add_action( 'customize_controls_enqueue_scripts', 'honeypress_admin_scripts');
