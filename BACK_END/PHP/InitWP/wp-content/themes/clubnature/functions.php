<?php
/**
 * ClubNature functions and definitions
 *
 * @package ClubNature
 */

/**
 * ClubNature Theme Setup
 */
function clubnature_setup() {

	// Meta Title.
	add_theme_support( 'title-tag' );

	// Automatic Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// Logo Support.
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 215,
			'height'      => 38,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array(
				'site-title',
				'site-description',
			),
		)
	);

	// Featured Image.
	add_theme_support( 'post-thumbnails' );

	// Language Support.
	load_theme_textdomain( 'clubnature', get_template_directory() . '/languages' );

	// Header Image.
	$clubnature_args = array(
		'flex-width'         => true,
		'width'              => 1500,
		'flex-height'        => true,
		'height'             => 900,
		'default-text-color' => '#fff',
	);
	add_theme_support( 'custom-header', $clubnature_args );

	// Content Width.
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'after_setup_theme', 'clubnature_setup' );

/**
 * Color / Social Customizer
 *
 * @param array $clubnature_wp_customize Theme Colors & Social Media.
 */
function clubnature_customize_register( $clubnature_wp_customize ) {
	$clubnature_colors   = array();
	$clubnature_colors[] = array(
		'slug'    => 'default_color',
		'default' => '#b1a371',
		'label'   => __( 'Default Color ', 'clubnature' ),
	);

	foreach ( $clubnature_colors as $clubnature_color ) {
		$clubnature_wp_customize->add_setting(
			$clubnature_color['slug'],
			array(
				'default'           => $clubnature_color['default'],
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$clubnature_wp_customize->add_control(
			new WP_Customize_Color_Control(
				$clubnature_wp_customize,
				$clubnature_color['slug'],
				array(
					'label'    => $clubnature_color['label'],
					'section'  => 'colors',
					'settings' => $clubnature_color['slug'],
				)
			)
		);
	}

	$clubnature_wp_customize->add_panel(
		'widget_images',
		array(
			'priority'       => 70,
			'theme_supports' => '',
			'title'          => esc_html__( 'Widget Images', 'clubnature' ),
			'description'    => esc_html__( 'Set background images for certain widgets.', 'clubnature' ),
		)
	);

	$clubnature_wp_customize->add_section(
		'contact_background',
		array(
			'title'    => esc_html__( 'Contact Background', 'clubnature' ),
			'panel'    => 'widget_images',
			'priority' => 20,
		)
	);

	$clubnature_wp_customize->add_setting(
		'contact_bg',
		array(
			'flex-width'  => true,
			'width'       => 1500,
			'flex-height' => true,
			'height'      => 900,
		)
	);

	$clubnature_wp_customize->add_control(
		new WP_Customize_Image_Control(
			$clubnature_wp_customize,
			'contact_background_image',
			array(
				'label'    => esc_html__( 'Add Contact Background Here, the width should be approx 1500px', 'clubnature' ),
				'section'  => 'contact_background',
				'settings' => 'contact_bg',
			)
		)
	);

	$clubnature_wp_customize->add_section(
		'sociallinks',
		array(
			'title'       => __( 'Social Links', 'clubnature' ),
			'description' => __( 'Add Your Social Links Here.', 'clubnature' ),
			'priority'    => '900',
		)
	);

	$clubnature_wp_customize->add_setting(
		'clubnature_facebooklink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_facebooklink',
		array(
			'label'   => __( 'Facebook URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_twitterlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_twitterlink',
		array(
			'label'   => __( 'Twitter URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_pinterestlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_pinterestlink',
		array(
			'label'   => __( 'Pinterest URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_instagramlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_instagramlink',
		array(
			'label'   => __( 'Instagram URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_linkedinlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_linkedinlink',
		array(
			'label'   => __( 'LinkedIn URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_youtubelink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_youtubelink',
		array(
			'label'   => __( 'YouTube URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_vimeo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_vimeo',
		array(
			'label'   => __( 'Vimeo URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_tumblrlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_tumblrlink',
		array(
			'label'   => __( 'Tumblr URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
	$clubnature_wp_customize->add_setting(
		'clubnature_flickrlink',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$clubnature_wp_customize->add_control(
		'clubnature_flickrlink',
		array(
			'label'   => __( 'Flickr URL', 'clubnature' ),
			'section' => 'sociallinks',
		)
	);
}
add_action( 'customize_register', 'clubnature_customize_register' );

/**
 * Includes Plugin Admin
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Bootstrap
 */
function clubnature_bootstrap() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.css', array(), '1.0.4' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/fontawesome.min.css', array(), '1.0.4' );
	wp_enqueue_style( 'clubnature-googlefonts', clubnature_google_fonts_url(), array(), '1.0.4' );
	wp_enqueue_style( 'clubnature-style', get_stylesheet_uri(), array(), '1.0.4' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array( 'jquery' ), '1.0.4', true );
	wp_enqueue_script( 'clubnature-script', get_template_directory_uri() . '/js/script.min.js', array( 'jquery' ), '1.0.4', true );
}
add_action( 'wp_enqueue_scripts', 'clubnature_bootstrap' );

/**
 * Google Font
 */
function clubnature_google_fonts_url() {
	$font_families = array( 'Playfair Display:400,400i,700,700i,900,900i', 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
	$query_args    = array(
		'family' => rawurlencode( implode( '|', $font_families ) ),
		'subset' => rawurlencode( 'latin,latin-ext' ),
	);
	$fonts_url     = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	return apply_filters( 'clubnature_google_fonts_url', $fonts_url );
}

/**
 * Navigation
 */
function clubnature_register_menu() {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Top Primary Menu', 'clubnature' ),
		)
	);
}
add_action( 'init', 'clubnature_register_menu' );

/**
 * Bootstrap Navigation
 */
function clubnature_bootstrap_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'depth'          => 2,
			'menu_class'     => 'nav navbar-nav d-table',
			'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			'walker'         => new WP_Bootstrap_Navwalker(),
		)
	);
}
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * WooCommerce Support
 */
function clubnature_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'clubnature_woocommerce_support' );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

/**
 * WooCommerce Cart Count
 */
function clubnature_woocommerce_cart_count() {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		$clubnature_count = WC()->cart->cart_contents_count;
		?>
		<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr__( 'View your shopping cart', 'clubnature' ); ?>" class="w-100 h-100 rounded-circle d-block">
			<i class="fas fa-shopping-bag"></i>
		<?php if ( $clubnature_count > 0 ) { ?>
			<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubnature_count ); ?></span>
		<?php } ?>
		</a>
		<?php
	}
}
add_action( 'clubnature_header_top', 'clubnature_woocommerce_cart_count' );

/**
 * WooCommerce Cart Count
 *
 * @param array $clubnature_fragments Cart Count.
 */
function clubnatures_add_to_cart_fragment( $clubnature_fragments ) {
	ob_start();
	$clubnature_count = WC()->cart->cart_contents_count;
	?>
	<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr( 'View your shopping cart', 'clubnature' ); ?>" class="w-100 h-100 rounded-circle d-block">
		<i class="fas fa-shopping-bag"></i>
	<?php if ( $clubnature_count > 0 ) { ?>
		<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubnature_count ); ?></span>
	<?php } ?>
	</a>
	<?php
	$clubnature_fragments['.woocommerce-cart-contents a'] = ob_get_clean();
	return $clubnature_fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'clubnatures_add_to_cart_fragment' );

/**
 * Header Style
 */
function clubnature_header_style() {
	if ( ! display_header_text() ) {
		echo '
		<style type="text/css">
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style>
		';
	}
}
add_action( 'wp_head', 'clubnature_header_style' );

/**
 * Custom Colors
 */
function clubnature_customizer_css() {
	$clubnature_default_color     = get_theme_mod( 'default_color' );
	$clubnature_header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
		.site-header .site-header-info h1,
		.site-header .site-header-info p {
			color: #<?php echo esc_attr( $clubnature_header_text_color ); ?>;
		}

		.site-header .site-header-info h1 span {
			-webkit-text-stroke-color: #<?php echo esc_attr( $clubnature_header_text_color ); ?>;
		}

	<?php if ( $clubnature_default_color ) : ?>
		.btn-search,
		.btn-submit,
		.cursor.cursor-1,
		.navbar.navbar-scroll .navbar-toggler,
		.navbar.navbar-scroll .woocommerce-cart-contents,
		.site-header .site-header-extra .site-header-extra-arrow,
		.site-header .site-header-extra .site-header-extra-image .site-header-extra-image-overlay:before,
		.post-item .post-overlay:before,
		.post-item .post-message a.more-link span.more-link-arrow,
		.post-item .post-categories-list li a,
		.post-tags .tags a,
		.nav-links .page-numbers.current,
		.nav-links .page-numbers:hover,
		.nav-links .page-numbers:focus,
		.nav-links .prev.page-numbers,
		.nav-links .next.page-numbers,
		.comment .reply a,
		.woocommerce span.onsale,
		.woocommerce .products .product .button,
		.woocommerce .products .product a.added_to_cart,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce a.button.alt:hover,
		.woocommerce a.button.alt:focus,
		.woocommerce button.button.alt,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button.alt:focus,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.sidebar .sidebar-button .btn-sidebar {
			background-color: <?php echo esc_attr( $clubnature_default_color ); ?>;
		}

		.cursor.cursor-2 {
			border-color: <?php echo esc_attr( $clubnature_default_color ); ?>;
		}

		a:hover,
		a:focus,
		.post-item .post-title h2 a:hover,
		.post-item .post-title h2 a:focus,
		.post-item .post-message a.more-link:hover,
		.post-item .post-message a.more-link:focus {
			color: <?php echo esc_attr( $clubnature_default_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'clubnature_customizer_css' );

/**
 * Widgets
 */
function clubnature_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'clubnature' ),
			'id'            => 'primary_sidebar',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Header', 'clubnature' ),
			'id'            => 'header-sidebar',
			'before_widget' => '<div class="header">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Front page: Contact', 'clubnature' ),
			'id'            => 'contact_sidebar',
			'before_widget' => '<div class="sidebar-contact-main position-relative py-5">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'clubnature_widgets_init' );

/**
 * Post Read More
 *
 * @param array $link Show more link.
 */
function clubnature_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link fw-bold"><span class="more-link-arrow me-2 position-relative rounded-circle d-inline-block"></span> %2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: %s containing the title of the post or page.
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'clubnature' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'clubnature_excerpt_more' );

/**
 * Excerp length
 *
 * @param array $length Exerpt length.
 */
function clubnature_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'clubnature_excerpt_length', 999 );


/**
 * Bootstrap Images img-fluid
 *
 * @param array $html Html code for image with Bootstrap class.
 */
function clubnature_bootstrap_responsive_images( $html ) {
	$classes = 'img-fluid';
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html );
	}
	return $html;
}
add_filter( 'the_content', 'clubnature_bootstrap_responsive_images', 10 );
add_filter( 'post_thumbnail_html', 'clubnature_bootstrap_responsive_images', 10 );

/**
 * Comment Reply
 */
function clubnature_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clubnature_comment_reply' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubnature_fields Comment Form Fields.
 */
function clubnature_comment_form_fields( $clubnature_fields ) {
	$clubnature_commenter = wp_get_current_commenter();
	$clubnature_req       = get_option( 'require_name_email' );
	$clubnature_aria_req  = ( $clubnature_req ? " aria-required='true'" : '' );
	$clubnature_html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$clubnature_fields    = array(
		'author' => '<div class="form-group comment-form-author"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $clubnature_commenter['comment_author'] ) . '" placeholder="' . esc_attr( $clubnature_req ? '* ' : '' ) . esc_attr__( 'Name', 'clubnature' ) . '..." size="30"' . $clubnature_aria_req . ' /></div>',
		'email'  => '<div class="form-group comment-form-email"><input class="form-control" id="email" name="email" ' . ( $clubnature_html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $clubnature_commenter['comment_author_email'] ) . '" placeholder="' . esc_attr( $clubnature_req ? '* ' : '' ) . esc_attr__( 'Email', 'clubnature' ) . '..." size="30"' . $clubnature_aria_req . ' /></div>',
		'url'    => '<div class="form-group comment-form-url"><input class="form-control" id="url" name="url" ' . ( $clubnature_html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $clubnature_commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'clubnature' ) . '..." size="30" /></div>',
	);
	return $clubnature_fields;
}
add_filter( 'comment_form_default_fields', 'clubnature_comment_form_fields' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubnature_args Comment Form Fields.
 */
function clubnature_comment_form( $clubnature_args ) {
	$clubnature_args['comment_field'] = '<div class="form-group comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__( 'Comment', 'clubnature' ) . '..." aria-required="true"></textarea></div>';
	$clubnature_args['class_submit']  = 'btn btn-default btn-submit';
	return $clubnature_args;
}
add_filter( 'comment_form_defaults', 'clubnature_comment_form' );

?>
