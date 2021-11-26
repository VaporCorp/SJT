<?php
/**
* Theme functions and definitions.
* @package Honeypress WordPress theme
*/

if( ! defined( 'ABSPATH' ) )
{
	exit;
}

define('HONEYPRESS_THEME_DIR', get_template_directory());
define('HONEYPRESS_THEME_URI', get_template_directory_uri() );

if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}

/**
 * Implement the Custom Header feature.
 */
require( HONEYPRESS_THEME_DIR . '/inc/theme-setup.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function honeypress_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'honeypress_content_width', 696 );
}
add_action( 'after_setup_theme', 'honeypress_content_width', 0 );

//About Theme
$honeypress_theme = wp_get_theme(); // gets the current theme
if ( 'HoneyPress' == $honeypress_theme->name)
{
	if ( is_admin() )
	{
        require HONEYPRESS_THEME_DIR . '/admin/admin-init.php';
	}
}

//Admin customizer preview
if ( ! function_exists( 'honeypress_customizer_preview_scripts' ) ) {
	function honeypress_customizer_preview_scripts() {
		wp_enqueue_script( 'honeypress-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
	}
}
add_action( 'customize_preview_init', 'honeypress_customizer_preview_scripts' );

//Alpha Color Control
require( HONEYPRESS_THEME_DIR .'/inc/customizer/customizer-alpha-color-picker/class-honeypress-customize-alpha-color-control.php');

/**
* Register Widget
*/
require( HONEYPRESS_THEME_DIR . '/inc/widget/register-widget.php');
require( HONEYPRESS_THEME_DIR . '/inc/widget/wdl_social_icon.php');
require( HONEYPRESS_THEME_DIR . '/inc/widget/wdl_topbar_info.php');

/**
* Breadcrumb setting
*/
require( HONEYPRESS_THEME_DIR . '/inc/breadcrumbs/breadcrumbs.php');

/**
* Register css and js
*/
require( HONEYPRESS_THEME_DIR . '/inc/script/scripts.php');

/**
* Nav walker
*/
require( HONEYPRESS_THEME_DIR . '/inc/menu/default_menu_walker.php');
require( HONEYPRESS_THEME_DIR . '/inc/menu/honeypress_nav_walker.php');


/**
* helder function
*/
require( HONEYPRESS_THEME_DIR . '/inc/custom-style/custom-css.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/helper-function.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer-slider/customizer-slider.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer-image-radio/customizer-image-radio.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer-toggle/customizer-toggle.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer-text-radio/customizer-text-radio.php');
/**
* Customizer functionality
*/
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer_sections_settings.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer_typography.php' );
require( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer_color_back_settings.php');
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer_theme_style.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/blog-page-options.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/single-blog-options.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer-pro-feature.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/general_settings.php' );
require ( HONEYPRESS_THEME_DIR . '/inc/customizer/customizer-recommended-plugin.php');
require_once HONEYPRESS_THEME_DIR . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'honeypress_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function honeypress_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		 // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_html__('Contact Form 7','honeypress'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Spice Box','honeypress'),
            'slug'      => 'spicebox',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Unique Headers','honeypress'),
            'slug'      => 'unique-headers',
            'required'  => false,
        ),
         array(
            'name'      => esc_html__('Yoast SEO','honeypress'),
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

//Set for old user before 1.3.8
if (!get_option('honeypress_user_before_1_3_8', false)) {
    //detect old user and set value
    $honeypress_service_title=get_theme_mod('home_service_section_title');
    $honeypress_service_discription=get_theme_mod('home_service_section_discription');
    $honeypress_blog_title=get_theme_mod('home_news_section_title');
    $honeypress_blog_discription=get_theme_mod('home_news_section_discription');
    $honeypress_slider_title=get_theme_mod('home_slider_title');
    $honeypress_slider_discription=get_theme_mod('home_slider_discription');
    $honeypress_testimonial_title=get_theme_mod('home_testimonial_section_title');
    $honeypress_testimonial__discription=get_theme_mod('home_testimonial_section_discription');
    $honeypress_footer_credit=get_theme_mod('footer_copyright');

    if ($honeypress_service_title !=null || $honeypress_service_discription !=null || $honeypress_blog_title !=null || $honeypress_blog_discription !=null || $honeypress_slider_title !=null || $honeypress_slider_discription !=null || $honeypress_testimonial_title !=null || $honeypress_testimonial__discription !=null || $honeypress_footer_credit !=null )  {
        add_option('honeypress_user_before_1_3_8', 'old');

    } else {
        add_option('honeypress_user_before_1_3_8', 'new');
    }
}

//Remove Footer section
function honeypress_remove_customize_register( $wp_customize ) {

   $wp_customize->remove_section( 'footer_section');

}
add_action( 'customize_register', 'honeypress_remove_customize_register',11);



/* Typography Fonts */
if (!function_exists('honeypress_typo_fonts')) {

    function honeypress_typo_fonts() {
        return array('ABeeZee' => 'ABeeZee', 'Abel' => 'Abel', 'Abril Fatface' => 'Abril Fatface', 'Aclonica' => 'Aclonica', 'Acme'=> 'Acme', 'Actor'=>'Actor', 'Adamina' => 'Adamina', 'Advent Pro' => 'Advent Pro', 'Aguafina Script' => 'Aguafina Script', 'Akronim' => 'Akronim', 'Aladin'=> 'Aladin', 'Aldrich'=>'Aldrich', 'Alef' => 'Alef', 'Alegreya' => 'Alegreya', 'Alegreya SC' => 'Alegreya SC', 'Alegreya Sans' => 'Alegreya Sans', 'Alegreya Sans SC'=>'Alegreya Sans SC', 'Alex Brush' => 'Alex Brush', 'Alfa Slab One' => 'Alfa Slab One', 'Alice' => 'Alice', 'Alike' => 'Alike', 'Alike Angular' => 'Alike Angular', 'Allan' => 'Allan', 'Allerta' => 'Allerta', 'Allerta Stencil' => 'Allerta Stencil', 'Allura' => 'Allura', 'Almendra' => 'Almendra', 'Almendra Display' => 'Almendra Display', 'Almendra SC' => 'Almendra SC', 'Amarante' => 'Amarante', 'Amaranth' => 'Amaranth', 'Amatic SC' => 'Amatic SC', 'Amatica SC' => 'Amatica SC', 'Amethysta' => 'Amethysta', 'Amiko' => 'Amiko', 'Amiri' => 'Amiri', 'Amita' => 'Amita', 'Anaheim' => 'Anaheim', 'Andada' => 'Andada', 'Andika' =>  'Andika', 'Angkor' => 'Angkor', 'Annie Use Your Telescope' => 'Annie Use Your Telescope', 'Anonymous Pro' => 'Anonymous Pro', 'Antic' => 'Antic', 'Antic Didone' => 'Antic Didone', 'Antic Slab' => 'Antic Slab', 'Anton' => 'Anton', 'Arapey' => 'Arapey', 'Arbutus' => 'Arbutus', 'Arbutus Slab' => 'Arbutus Slab', 'Architects Daughter' => 'Architects Daughter', 'Archivo Black' => 'Archivo Black', 'Archivo Narrow' => 'Archivo Narrow', 'Aref Ruqaa' => 'Aref Ruqaa', 'Arima Madurai' => 'Arima Madurai', 'Arimo' => 'Arimo', 'Arizonia' => 'Arizonia', 'Armata' => 'Armata', 'Artifika' => 'Artifika', 'Arvo'=>'Arvo', 'Arya'=>'Arya', 'Asap'=>'Asap', 'Asar'=>'Asar', 'Asset'=>'Asset', 'Assistant'=>'Assistant', 'Astloch'=>'Astloch', 'Asul'=>'Asul', 'Athiti'=>'Athiti', 'Atma'=>'Atma', 'Atomic Age'=>'Atomic Age', 'Aubrey'=>'Aubrey', 'Audiowide'=>'Audiowide', 'Autour One'=>'Autour One', 'Average'=>'Average', 'Average Sans'=>'Average Sans', 'Averia Gruesa Libre'=>'Averia Gruesa Libre', 'Averia Libre'=>'Averia Libre', 'Averia Sans Libre'=> 'Averia Sans Libre', 'Averia Serif Libre'=>'Averia Serif Libre', 'Bad Script'=>'Bad Script', 'Baloo'=>'Baloo', 'Baloo Bhai'=>'Baloo Bhai', 'Baloo Da'=>'Baloo Da', 'Baloo Thambi'=>'Baloo Thambi', 'Balthazar'=>'Balthazar', 'Bangers'=>'Bangers', 'Basic'=>'Basic', 'Battambang'=>'Battambang', 'Baumans'=>'Baumans', 'Bayon'=>'Bayon', 'Belgrano'=>'Belgrano', 'Belleza'=>'Belleza', 'BenchNine'=>'BenchNine', 'Bentham'=>'Bentham', 'Berkshire Swash'=>'Berkshire Swash', 'Bevan'=>'Bevan', 'Bigelow Rules'=>'Bigelow Rules', 'Bigshot One'=>'Bigshot One', 'Bilbo'=>'Bilbo', 'Bilbo Swash Caps'=>'Bilbo Swash Caps', 'BioRhyme'=>'BioRhyme', 'BioRhyme Expanded'=>'BioRhyme Expanded', 'Biryani'=>'Biryani', 'Bitter'=>'Bitter', 'Black Ops One'=>'Black Ops One', 'Bokor'=>'Bokor', 'Bonbon'=>'Bonbon', 'Boogaloo'=>'Boogaloo', 'Bowlby One'=>'Bowlby One', 'Bowlby One SC'=>'Bowlby One SC', 'Brawler'=>'Brawler', 'Bree Serif'=>'Bree Serif', 'Bubblegum Sans'=>'Bubblegum Sans', 'Bubbler One'=>'Bubbler One', 'Buda'=>'Buda', 'Buenard'=>'Buenard', 'Bungee'=>'Bungee', 'Bungee Hairline'=>'Bungee Hairline', 'Bungee Inline'=>'Bungee Inline', 'Bungee Outline'=>'Bungee Outline', 'Bungee Shade'=>'Bungee Shade', 'Butcherman'=>'Butcherman', 'Butterfly Kids'=>'Butterfly Kids', 'Cabin'=>'Cabin', 'Cabin Condensed'=>'Cabin Condensed', 'Cabin Sketch'=>'Cabin Sketch', 'Caesar Dressing'=>'Caesar Dressing', 'Cagliostro'=>'Cagliostro', 'Cairo'=>'Cairo', 'Calligraffitti'=>'Calligraffitti', 'Cambay'=>'Cambay', 'Cambo'=>'Cambo', 'Candal'=>'Candal', 'Cantarell'=>'Cantarell', 'Cantata One'=>'Cantata One', 'Cantora One'=>'Cantora One', 'Capriola'=>'Capriola', 'Cardo'=>'Cardo', 'Carme'=>'Carme', 'Carrois Gothic'=>'Carrois Gothic', 'Carrois Gothic SC'=>'Carrois Gothic SC', 'Carter One'=>'Carter One', 'Catamaran'=>'Catamaran', 'Caudex'=>'Caudex', 'Caveat'=>'Caveat', 'Caveat Brush'=>'Caveat Brush', 'Cedarville Cursive'=>'Cedarville Cursive', 'Ceviche One'=>'Ceviche One', 'Changa'=>'Changa', 'Changa One'=>'Changa One', 'Chango'=>'Chango', 'Chathura'=>'Chathura', 'Chau Philomene One'=>'Chau Philomene One', 'Chela One'=>'Chela One', 'Chelsea Market'=>'Chelsea Market', 'Chenla'=>'Chenla', 'Cherry Cream Soda'=>'Cherry Cream Soda', 'Cherry Swash'=>'Cherry Swash', 'Chewy'=>'Chewy', 'Chicle'=>'Chicle', 'Chivo'=>'Chivo', 'Chonburi'=>'Chonburi', 'Cinzel'=>'Cinzel', 'Cinzel Decorative'=>'Cinzel Decorative', 'Clicker Script'=>'Clicker Script', 'Coda'=>'Coda', 'Coda Caption'=>'Coda Caption', 'Codystar'=>'Codystar', 'Coiny'=>'Coiny', 'Combo'=>'Combo', 'Comfortaa'=>'Comfortaa', 'Coming Soon'=>'Coming Soon', 'Concert One'=>'Concert One', 'Condiment'=>'Condiment', 'Content'=>'Content', 'Contrail One'=>'Contrail One', 'Convergence'=>'Convergence', 'Cookie'=>'Cookie', 'Copse'=>'Copse', 'Corben'=>'Corben', 'Cormorant'=>'Cormorant', 'Cormorant Garamond'=>'Cormorant Garamond', 'Cormorant Infant'=>'Cormorant Infant', 'Cormorant SC'=>'Cormorant SC', 'Cormorant Unicase'=>'Cormorant Unicase', 'Cormorant Upright'=>'Cormorant Upright', 'Courgette'=>'Courgette', 'Cousine'=>'Cousine', 'Coustard'=>'Coustard', 'Covered By Your Grace'=>'Covered By Your Grace', 'Crafty Girls'=>'Crafty Girls', 'Creepster'=>'Creepster', 'Crete Round'=>'Crete Round', 'Crimson Text'=>'Crimson Text', 'Croissant One'=>'Croissant One', 'Crushed'=>'Crushed', 'Cuprum'=>'Cuprum', 'Cutive'=>'Cutive', 'Cutive Mono'=>'Cutive Mono', 'Damion'=>'Damion', 'Dancing Script'=>'Dancing Script', 'Dangrek'=>'Dangrek', 'David Libre'=>'David Libre', 'Dawning of a New Day'=>'Dawning of a New Day', 'Days One'=>'Days One', 'Dekko'=>'Dekko', 'Delius'=>'Delius', 'Delius Swash Caps'=>'Delius Swash Caps', 'Delius Unicase'=>'Delius Unicase', 'Della Respira'=>'Della Respira', 'Denk One'=>'Denk One', 'Devonshire'=>'Devonshire', 'Dhurjati'=>'Dhurjati', 'Didact Gothic'=>'Didact Gothic', 'Diplomata'=>'Diplomata', 'Diplomata SC'=>'Diplomata SC', 'Domine'=>'Domine', 'Donegal One'=>'Donegal One', 'Doppio One'=>'Doppio One', 'Dorsa'=>'Dorsa', 'Dosis'=>'Dosis', 'Dr Sugiyama'=>'Dr Sugiyama', 'Droid Sans'=>'Droid Sans', 'Droid Sans Mono'=>'Droid Sans Mono', 'Droid Serif'=>'Droid Serif', 'Duru Sans'=>'Duru Sans', 'Dynalight'=>'Dynalight', 'EB Garamond'=>'EB Garamond', 'Eagle Lake'=>'Eagle Lake', 'Eater'=>'Eater', 'Economica'=>'Economica', 'Eczar'=>'Eczar', 'Ek Mukta'=>'Ek Mukta', 'El Messiri'=>'El Messiri', 'Electrolize'=>'Electrolize', 'Elsie'=>'Elsie', 'Elsie Swash Caps'=>'Elsie Swash Caps', 'Emblema One'=>'Emblema One', 'Emilys Candy'=>'Emilys Candy', 'Engagement'=>'Engagement', 'Englebert'=>'Englebert', 'Enriqueta'=>'Enriqueta', 'Erica One'=>'Erica One', 'Esteban'=>'Esteban', 'Euphoria Script'=>'Euphoria Script', 'Ewert'=>'Ewert', 'Exo'=>'Exo', 'Exo 2'=>'Exo 2', 'Expletus Sans'=>'Expletus Sans', 'Fanwood Text'=>'Fanwood Text', 'Farsan'=>'Farsan', 'Fascinate'=>'Fascinate', 'Fascinate Inline'=>'Fascinate Inline', 'Faster One'=>'Faster One', 'Fasthand'=>'Fasthand', 'Fauna One'=>'Fauna One', 'Federant'=>'Federant', 'Federo'=>'Federo', 'Felipa'=>'Felipa', 'Fenix'=>'Fenix', 'Finger Paint'=>'Finger Paint', 'Fira Mono'=>'Fira Mono', 'Fira Sans'=>'Fira Sans', 'Fjalla One'=>'Fjalla One', 'Fjord One'=>'Fjord One', 'Flamenco'=>'Flamenco', 'Flavors'=>'Flavors', 'Fondamento'=>'Fondamento', 'Fontdiner Swanky'=>'Fontdiner Swanky', 'Forum'=>'Forum', 'Francois One'=>'Francois One', 'Frank Ruhl Libre'=>'Frank Ruhl Libre', 'Freckle Face'=>'Freckle Face', 'Fredericka the Great'=>'Fredericka the Great', 'Fredoka One'=>'Fredoka One', 'Freehand'=>'Freehand', 'Fresca'=>'Fresca', 'Frijole'=>'Frijole', 'Fruktur'=>'Fruktur', 'Fugaz One'=>'Fugaz One', 'GFS Didot'=>'GFS Didot', 'GFS Neohellenic'=>'GFS Neohellenic', 'Gabriela'=>'Gabriela', 'Gafata'=>'Gafata', 'Galada'=>'Galada', 'Galdeano'=>'Galdeano', 'Galindo'=>'Galindo', 'Gentium Basic'=>'Gentium Basic', 'Gentium Book Basic'=>'Gentium Book Basic','Geo' =>'Geo', 'Geostar'=>'Geostar', 'Geostar Fill'=>'Geostar Fill', 'Germania One'=>'Germania One','Gidugu' =>'Gidugu', 'Gilda Display'=>'Gilda Display', 'Give You Glory'=>'Give You Glory', 'Glass Antiqua'=>'Glass Antiqua', 'Glegoo'=>'Glegoo', 'Gloria Hallelujah'=>'Gloria Hallelujah', 'Goblin One'=>'Goblin One', 'Gochi Hand'=>'Gochi Hand', 'Gorditas'=>'Gorditas', 'Goudy Bookletter 1911'=>'Goudy Bookletter 1911', 'Graduate'=>'Graduate', 'Grand Hotel'=>'Grand Hotel', 'Gravitas One'=>'Gravitas One', 'Great Vibes'=>'Great Vibes', 'Griffy'=>'Griffy', 'Gruppo'=>'Gruppo', 'Gudea'=>'Gudea', 'Gurajada'=>'Gurajada', 'Habibi' => 'Habibi', 'Halant' => 'Halant', 'Hammersmith One' => 'Hammersmith One', 'Hanalei' => 'Hanalei', 'Hanalei Fill' =>  'Hanalei Fill', 'Handlee' => 'Handlee', 'Hanuman' => 'Hanuman', 'Happy Monkey' => 'Happy Monkey', 'Harmattan' => 'Harmattan', 'Headland One' => 'Headland One', 'Heebo' => 'Heebo', 'Henny Penny' => 'Henny Penny', 'Herr Von Muellerhoff' => 'Herr Von Muellerhoff', 'Hind' => 'Hind', 'Hind Guntur' => 'Hind Guntur', 'Hind Madurai' => 'Hind Madurai', 'Hind Siliguri' => 'Hind Siliguri', 'Hind Vadodara' => 'Hind Vadodara', 'Holtwood One SC' => 'Holtwood One SC', 'Homemade Apple' => 'Homemade Apple', 'Homenaje' => 'Homenaje', 'IM Fell DW Pica' => 'IM Fell DW Pica', 'IM Fell DW Pica SC' => 'IM Fell DW Pica SC', 'IM Fell Double Pica' => 'IM Fell Double Pica', 'IM Fell Double Pica SC' => 'IM Fell Double Pica SC', 'IM Fell English' => 'IM Fell English', 'IM Fell English SC' => 'IM Fell English SC', 'IM Fell French Canon' => 'IM Fell French Canon', 'IM Fell French Canon SC' => 'IM Fell French Canon SC', 'IM Fell Great Primer' => 'IM Fell Great Primer', 'IM Fell Great Primer SC' => 'IM Fell Great Primer SC', 'Iceberg' => 'Iceberg', 'Iceland' => 'Iceland', 'Imprima' => 'Imprima', 'Inconsolata' => 'Inconsolata', 'Inder' => 'Inder', 'Indie Flower' => 'Indie Flower', 'Inika' => 'Inika', 'Inknut Antiqua' => 'Inknut Antiqua', 'Irish Grover' => 'Irish Grover', 'Istok Web' => 'Istok Web', 'Italiana' => 'Italiana', 'Italianno' => 'Italianno', 'Itim' => 'Itim', 'Jacques Francois' => 'Jacques Francois', 'Jacques Francois Shadow' => 'Jacques Francois Shadow', 'Jaldi' => 'Jaldi', 'Jim Nightshade' => 'Jim Nightshade', 'Jockey One' => 'Jockey One', 'Jolly Lodger' => 'Jolly Lodger', 'Jomhuria' => 'Jomhuria', 'Josefin Sans' => 'Josefin Sans', 'Josefin Slab' => 'Josefin Slab', 'Joti One' => 'Joti One', 'Judson' => 'Judson', 'Julee' => 'Julee', 'Julius Sans One' => 'Julius Sans One', 'Junge' => 'Junge', 'Jura' => 'Jura', 'Just Another Hand' => 'Just Another Hand', 'Just Me Again Down Here' => 'Just Me Again Down Here', 'Kadwa' => 'Kadwa', 'Kalam' => 'Kalam', 'Kameron' => 'Kameron', 'Kanit' => 'Kanit', 'Kantumruy' => 'Kantumruy', 'Karla' => 'Karla', 'Karma' => 'Karma', 'Katibeh' => 'Katibeh', 'Kaushan Script' => 'Kaushan Script', 'Kavivanar' => 'Kavivanar', 'Kavoon' => 'Kavoon', 'Kdam Thmor' => 'Kdam Thmor', 'Keania One' => 'Keania One', 'Kelly Slab' => 'Kelly Slab', 'Kenia' => 'Kenia', 'Khand' => 'Khand', 'Khmer' => 'Khmer', 'Khula' => 'Khula', 'Kite One' => 'Kite One', 'Knewave' => 'Knewave', 'Kotta One' => 'Kotta One', 'Koulen' => 'Koulen', 'Kranky' => 'Kranky', 'Kreon' => 'Kreon', 'Kristi' => 'Kristi', 'Krona One' => 'Krona One', 'Kumar One' => 'Kumar One', 'Kumar One Outline' => 'Kumar One Outline', 'Kurale' => 'Kurale', 'La Belle Aurore' => 'La Belle Aurore', 'Laila' => 'Laila', 'Lakki Reddy' => 'Lakki Reddy', 'Lalezar' => 'Lalezar', 'Lancelot' => 'Lancelot', 'Lateef' => 'Lateef', 'Lato' => 'Lato', 'League Script' => 'League Script', 'Leckerli One' => 'Leckerli One', 'Ledger' =>'Ledger', 'Lekton' => 'Lekton', 'Lemon' => 'Lemon', 'Lemonada' => 'Lemonada', 'Libre Baskerville' => 'Libre Baskerville', 'Libre Franklin' => 'Libre Franklin', 'Life Savers' => 'Life Savers', 'Lilita One' => 'Lilita One', 'Lily Script One' => 'Lily Script One', 'Limelight' => 'Limelight', 'Linden Hill' => 'Linden Hill', 'Lobster' => 'Lobster', 'Lobster Two' => 'Lobster Two', 'Londrina Outline' => 'Londrina Outline', 'Londrina Shadow' => 'Londrina Shadow', 'Londrina Sketch' => 'Londrina Sketch', 'Londrina Solid' => 'Londrina Solid', 'Lora' => 'Lora', 'Love Ya Like A Sister' => 'Love Ya Like A Sister', 'Loved by the King' => 'Loved by the King', 'Lovers Quarrel' => 'Lovers Quarrel', 'Luckiest Guy' => 'Luckiest Guy', 'Lusitana' => 'Lusitana', 'Lustria' => 'Lustria', 'Macondo' => 'Macondo', 'Macondo Swash Caps' => 'Macondo Swash Caps', 'Mada' => 'Mada', 'Magra' => 'Magra', 'Maiden Orange' => 'Maiden Orange', 'Maitree' => 'Maitree', 'Mako' => 'Mako', 'Mallanna' => 'Mallanna', 'Mandali' => 'Mandali', 'Marcellus' => 'Marcellus', 'Marcellus SC' => 'Marcellus SC', 'Marck Script' => 'Marck Script', 'Margarine' => 'Margarine', 'Marko One' => 'Marko One', 'Marmelad' => 'Marmelad', 'Martel' => 'Martel', 'Martel Sans' => 'Martel Sans', 'Marvel' => 'Marvel', 'Mate' => 'Mate', 'Mate SC' => 'Mate SC', 'Maven Pro' => 'Maven Pro', 'McLaren' => 'McLaren', 'Meddon' => 'Meddon', 'MedievalSharp' => 'MedievalSharp', 'Medula One' => 'Medula One', 'Meera Inimai' => 'Meera Inimai', 'Megrim' => 'Megrim', 'Meie Script' => 'Meie Script', 'Merienda' => 'Merienda', 'Merienda One' => 'Merienda One', 'Merriweather' => 'Merriweather', 'Merriweather Sans' => 'Merriweather Sans', 'Metal' => 'Metal', 'Metal Mania' => 'Metal Mania', 'Metamorphous', 'Metrophobic' => 'Metrophobic', 'Michroma' => 'Michroma', 'Milonga' => 'Milonga', 'Miltonian' => 'Miltonian', 'Miltonian Tattoo' => 'Miltonian Tattoo', 'Miniver' => 'Miniver', 'Miriam Libre' => 'Miriam Libre', 'Mirza' => 'Mirza', 'Miss Fajardose' => 'Miss Fajardose', 'Mitr' => 'Mitr', 'Modak' => 'Modak', 'Modern Antiqua' => 'Modern Antiqua', 'Mogra' => 'Mogra', 'Molengo' => 'Molengo', 'Molle' => 'Molle', 'Monda' => 'Monda', 'Monofett' => 'Monofett', 'Monoton' => 'Monoton', 'Monsieur La Doulaise' => 'Monsieur La Doulaise', 'Montaga' => 'Montaga', 'Montez' => 'Montez', 'Montserrat' => 'Montserrat', 'Montserrat Alternates' => 'Montserrat Alternates', 'Montserrat Subrayada' => 'Montserrat Subrayada', 'Moul' => 'Moul', 'Moulpali' => 'Moulpali', 'Mountains of Christmas' => 'Mountains of Christmas', 'Mouse Memoirs' => 'Mouse Memoirs', 'Mr Bedfort' => 'Mr Bedfort', 'Mr Dafoe' => 'Mr Dafoe', 'Mr De Haviland' => 'Mr De Haviland', 'Mrs Saint Delafield' => 'Mrs Saint Delafield', 'Mrs Sheppards' => 'Mrs Sheppards', 'Mukta Vaani' => 'Mukta Vaani', 'Muli' => 'Muli', 'Mystery Quest' => 'Mystery Quest', 'NTR' => 'NTR', 'Neucha' => 'Neucha', 'Neuton' => 'Neuton', 'New Rocker' => 'New Rocker', 'News Cycle' => 'News Cycle', 'Niconne' => 'Niconne', 'Nixie One' => 'Nixie One', 'Nobile' => 'Nobile', 'Nokora' => 'Nokora', 'Norican' => 'Norican', 'Nosifer' => 'Nosifer', 'Nothing You Could Do' => 'Nothing You Could Do', 'Noticia Text' => 'Noticia Text', 'Noto Sans' => 'Noto Sans', 'Noto Serif' => 'Noto Serif', 'Nova Cut' => 'Nova Cut', 'Nova Flat' => 'Nova Flat', 'Nova Mono' => 'Nova Mono', 'Nova Oval' => 'Nova Oval', 'Nova Round' => 'Nova Round', 'Nova Script' => 'Nova Script', 'Nova Slim' => 'Nova Slim', 'Nova Square' => 'Nova Square', 'Numans' => 'Numans', 'Nunito' => 'Nunito', 'Odor Mean Chey' => 'Odor Mean Chey', 'Offside' => 'Offside', 'Old Standard TT' => 'Old Standard TT', 'Oldenburg' => 'Oldenburg', 'Oleo Script' => 'Oleo Script', 'Oleo Script Swash Caps' => 'Oleo Script Swash Caps', 'Open Sans' => 'Open Sans', 'Open Sans Condensed' =>'Open Sans Condensed', 'Oranienbaum' => 'Oranienbaum', 'Orbitron' => 'Orbitron', 'Oregano' => 'Oregano', 'Orienta' => 'Orienta', 'Original Surfer' => 'Original Surfer', 'Oswald' => 'Oswald', 'Over the Rainbow' => 'Over the Rainbow', 'Overlock' => 'Overlock', 'Overlock SC' => 'Overlock SC', 'Ovo' => 'Ovo', 'Oxygen' => 'Oxygen', 'Oxygen Mono' => 'Oxygen Mono', 'PT Mono' => 'PT Mono', 'PT Sans' => 'PT Sans', 'PT Sans Caption' => 'PT Sans Caption', 'PT Sans Narrow' => 'PT Sans Narrow', 'PT Serif' => 'PT Serif', 'PT Serif Caption' => 'PT Serif Caption', 'Pacifico' => 'Pacifico', 'Palanquin' => 'Palanquin', 'Palanquin Dark' => 'Palanquin Dark', 'Paprika' => 'Paprika', 'Parisienne' => 'Parisienne', 'Passero One' => 'Passero One', 'Passion One' => 'Passion One', 'Pathway Gothic One' => 'Pathway Gothic One', 'Patrick Hand' => 'Patrick Hand', 'Patrick Hand SC' => 'Patrick Hand SC', 'Pattaya' => 'Pattaya', 'Patua One' => 'Patua One', 'Pavanam' => 'Pavanam', 'Paytone One' => 'Paytone One', 'Peddana' => 'Peddana', 'Peralta' => 'Peralta', 'Permanent Marker' => 'Permanent Marker', 'Petit Formal Script' => 'Petit Formal Script', 'Petrona' => 'Petrona', 'Philosopher' => 'Philosopher', 'Piedra' => 'Piedra', 'Pinyon Script' => 'Pinyon Script', 'Pirata One' => 'Pirata One', 'Plaster' => 'Plaster', 'Play' => 'Play', 'Playball' => 'Playball', 'Playfair Display' => 'Playfair Display', 'Playfair Display SC' => 'Playfair Display SC', 'Podkova' => 'Podkova', 'Poiret One' => 'Poiret One', 'Poller One' => 'Poller One', 'Poly' => 'Poly', 'Pompiere' => 'Pompiere', 'Pontano Sans' => 'Pontano Sans', 'Poppins' => 'Poppins', 'Port Lligat Sans' => 'Port Lligat Sans', 'Port Lligat Slab' => 'Port Lligat Slab', 'Pragati Narrow' => 'Pragati Narrow', 'Prata' => 'Prata', 'Preahvihear' => 'Preahvihear', 'Press Start 2P' => 'Press Start 2P', 'Pridi' => 'Pridi', 'Princess Sofia' => 'Princess Sofia', 'Prociono' => 'Prociono', 'Prompt' => 'Prompt', 'Prosto One' => 'Prosto One', 'Proza Libre' => 'Proza Libre', 'Puritan' => 'Puritan', 'Purple Purse' => 'Purple Purse', 'Quando' => 'Quando', 'Quantico' => 'Quantico', 'Quattrocento' => 'Quattrocento', 'Quattrocento Sans' => 'Quattrocento Sans', 'Questrial' => 'Questrial', 'Quicksand' => 'Quicksand', 'Quintessential' => 'Quintessential', 'Qwigley' => 'Qwigley', 'Racing Sans One' => 'Racing Sans One', 'Radley' => 'Radley', 'Rajdhani'=> 'Rajdhani', 'Rakkas' => 'Rakkas', 'Raleway' => 'Raleway', 'Raleway Dots' => 'Raleway Dots', 'Ramabhadra' => 'Ramabhadra', 'Ramaraja' => 'Ramaraja', 'Rambla' => 'Rambla', 'Rammetto One' => 'Rammetto One', 'Ranchers' => 'Ranchers', 'Rancho' => 'Rancho', 'Ranga' => 'Ranga', 'Rasa' => 'Rasa', 'Rationale' => 'Rationale', 'Redressed' => 'Redressed', 'Reem Kufi' => 'Reem Kufi', 'Reenie Beanie' => 'Reenie Beanie', 'Revalia' => 'Revalia', 'Rhodium Libre' => 'Rhodium Libre', 'Ribeye' => 'Ribeye', 'Ribeye Marrow' => 'Ribeye Marrow', 'Righteous' => 'Righteous', 'Risque' => 'Risque', 'Roboto' => 'Roboto', 'Roboto Condensed' => 'Roboto Condensed', 'Roboto Mono' => 'Roboto Mono', 'Roboto Slab' => 'Roboto Slab', 'Rochester' => 'Rochester', 'Rock Salt' => 'Rock Salt', 'Rokkitt' => 'Rokkitt', 'Romanesco' => 'Romanesco', 'Ropa Sans' => 'Ropa Sans', 'Rosario' => 'Rosario', 'Rosarivo' => 'Rosarivo', 'Rouge Script' => 'Rouge Script', 'Rozha One' => 'Rozha One', 'Rubik' => 'Rubik', 'Rubik Mono One' => 'Rubik Mono One', 'Rubik One' => 'Rubik One', 'Ruda' => 'Ruda', 'Rufina' => 'Rufina', 'Ruge Boogie' => 'Ruge Boogie', 'Ruluko' => 'Ruluko', 'Rum Raisin' => 'Rum Raisin', 'Ruslan Display' => 'Ruslan Display', 'Russo One => Russo One', 'Ruthie' => 'Ruthie', 'Rye' => 'Rye', 'Sacramento' => 'Sacramento', 'Sahitya' => 'Sahitya', 'Sail' => 'Sail', 'Salsa' => 'Salsa', 'Sanchez' => 'Sanchez', 'Sancreek' => 'Sancreek', 'Sansita One' => 'Sansita One', 'Sarala' => 'Sarala', 'Sarina' => 'Sarina', 'Sarpanch' => 'Sarpanch', 'Satisfy' => 'Satisfy', 'Scada' => 'Scada', 'Scheherazade' => 'Scheherazade', 'Schoolbell' => 'Schoolbell', 'Scope One' => 'Scope One', 'Seaweed Script' => 'Seaweed Script', 'Secular One' => 'Secular One', 'Sevillana' => 'Sevillana', 'Seymour One' => 'Seymour One', 'Shadows Into Light' => 'Shadows Into Light', 'Shadows Into Light Two' => 'Shadows Into Light Two', 'Shanti' => 'Shanti', 'Share' => 'Share', 'Share Tech' => 'Share Tech', 'Share Tech Mono' => 'Share Tech Mono', 'Shojumaru' => 'Shojumaru', 'Short Stack' => 'Short Stack', 'Shrikhand' => 'Shrikhand', 'Siemreap' => 'Siemreap' , 'Sigmar One' => 'Sigmar One', 'Signika' => 'Signika', 'Signika Negative' => 'Signika Negative', 'Simonetta' => 'Simonetta', 'Sintony' => 'Sintony', 'Sirin Stencil' => 'Sirin Stencil', 'Six Caps' => 'Six Caps', 'Skranji' => 'Skranji', 'Slabo 13px' => 'Slabo 13px', 'Slabo 27px' => 'Slabo 27px', 'Slackey' => 'Slackey', 'Smokum' => 'Smokum', 'Smythe' => 'Smythe', 'Sniglet' => 'Sniglet', 'Snippet' => 'Snippet', 'Snowburst One' =>'Snowburst One', 'Sofadi One' => 'Sofadi One', 'Sofia' => 'Sofia', 'Sonsie One' => 'Sonsie One', 'Sorts Mill Goudy' => 'Sorts Mill Goudy', 'Source Code Pro' => 'Source Code Pro', 'Source Sans Pro' => 'Source Sans Pro', 'Source Serif Pro' => 'Source Serif Pro', 'Space Mono' => 'Space Mono', 'Special Elite' => 'Special Elite', 'Spicy Rice' => 'Spicy Rice', 'Spinnaker' => 'Spinnaker', 'Spirax' => 'Spirax', 'Squada One' => 'Squada One', 'Sree Krushnadevaraya' => 'Sree Krushnadevaraya', 'Sriracha' => 'Sriracha', 'Stalemate' => 'Stalemate', 'Stalinist One' => 'Stalinist One', 'Stardos Stencil' => 'Stardos Stencil', 'Stint Ultra Condensed' => 'Stint Ultra Condensed', 'Stint Ultra Expanded' => 'Stint Ultra Expanded', 'Stoke' => 'Stoke', 'Strait' => 'Strait', 'Sue Ellen Francisco' => 'Sue Ellen Francisco', 'Suez One' => 'Suez One', 'Sumana' => 'Sumana', 'Sunshiney' => 'Sunshiney', 'Supermercado One' => 'Supermercado One', 'Sura' => 'Sura', 'Suranna' => 'Suranna', 'Suravaram' => 'Suravaram', 'Suwannaphum' => 'Suwannaphum', 'Swanky and Moo Moo' => 'Swanky and Moo Moo', 'Syncopate' => 'Syncopate', 'Tangerine' => 'Tangerine', 'Taprom' => 'Taprom', 'Tauri' => 'Tauri', 'Taviraj' => 'Taviraj', 'Teko' => 'Teko', 'Telex' => 'Telex', 'Tenali Ramakrishna' => 'Tenali Ramakrishna', 'Tenor Sans' => 'Tenor Sans', 'Text Me One' => 'Text Me One', 'The Girl Next Door' => 'The Girl Next Door', 'Tienne' => 'Tienne', 'Tillana' => 'Tillana', 'Timmana' => 'Timmana', 'Tinos' => 'Tinos', 'Titan One' => 'Titan One', 'Titillium Web' => 'Titillium Web', 'Trade Winds' => 'Trade Winds', 'Trirong' => 'Trirong', 'Trocchi' => 'Trocchi', 'Trochut' =>'Trochut', 'Trykker' => 'Trykker', 'Tulpen One' => 'Tulpen One', 'Ubuntu' => 'Ubuntu', 'Ubuntu Condensed' => 'Ubuntu Condensed', 'Ubuntu Mono' => 'Ubuntu Mono', 'Ultra' => 'Ultra', 'Uncial Antiqua' => 'Uncial Antiqua', 'Underdog' => 'Underdog', 'Unica One' => 'Unica One', 'UnifrakturCook' => 'UnifrakturCook', 'UnifrakturMaguntia' => 'UnifrakturMaguntia', 'Unkempt' => 'Unkempt', 'Unlock' => 'Unlock', 'Unna' => 'Unna', 'VT323' => 'VT323', 'Vampiro One' => 'Vampiro One', 'Varela' => 'Varela', 'Varela Round' => 'Varela Round', 'Vast Shadow' => 'Vast Shadow', 'Vesper Libre' => 'Vesper Libre', 'Vibur' => 'Vibur', 'Vidaloka' => 'Vidaloka', 'Viga' => 'Viga', 'Voces' => 'Voces', 'Volkhov' => 'Volkhov', 'Vollkorn' => 'Vollkorn', 'Voltaire' => 'Voltaire', 'Waiting for the Sunrise' => 'Waiting for the Sunrise', 'Wallpoet' => 'Wallpoet', 'Walter Turncoat' => 'Walter Turncoat', 'Warnes' => 'Warnes', 'Wellfleet' => 'Wellfleet', 'Wendy One' => 'Wendy One', 'Wire One' => 'Wire One', 'Work Sans' => 'Work Sans', 'Yanone Kaffeesatz' => 'Yanone Kaffeesatz', 'Yantramanav' => 'Yantramanav', 'Yatra One' => 'Yatra One', 'Yellowtail' => 'Yellowtail' , 'Yeseva One' => 'Yeseva One', 'Yesteryear' => 'Yesteryear', 'Yrsa' => 'Yrsa', 'Zeyada' => 'Zeyada');
    }

}


function honeypress_google_fonts_url() {
    $fonts_url = '';
    $font_families = array();
	$font_families = honeypress_typo_fonts();
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    return $fonts_url;
}
function honeypress_google_font_scripts_styles() {
    wp_enqueue_style( 'honeypress-google-fonts', honeypress_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'honeypress_google_font_scripts_styles');


/* Sanitization functions */
function honeypress_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

function honeypress_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function honeypress_sanitize_array( $value ){
		if ( is_array( $value ) ) {
				foreach ( $value as $key => $subvalue ) {
		 				$value[ $key ] = esc_attr( $subvalue );
				}
				return $value;
		}
		return esc_attr( $value );
}

function honeypress_sanitize_select( $input, $setting ) {
		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);
		//get the list of possible radio box options
		$choices = $setting->manager->get_control( $setting->id )->choices;
		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
