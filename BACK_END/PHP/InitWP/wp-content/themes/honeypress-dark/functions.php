<?php
// Global variables define
define('HONEYPRESS_DARK_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('HONEYPRESS_DARK_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('HONEYPRESS_DARK_CHILD_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
add_action('after_setup_theme', 'honeypress_dark_setup');

function honeypress_dark_setup() {
    load_theme_textdomain('honeypress-dark', HONEYPRESS_DARK_CHILD_TEMPLATE_DIR . '/languages');
}

add_action('wp_enqueue_scripts', 'honeypress_dark_enqueue_styles');

function honeypress_dark_enqueue_styles() {
    wp_enqueue_style('honeypress-dark-parent-style', HONEYPRESS_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));
    wp_style_add_data('honeypress-dark-parent-style', 'rtl', 'replace' );
    wp_style_add_data('honeypress-dark-style', 'rtl', 'replace' );
    if (get_theme_mod('custom_color_enable') == true) {
        honeypress_dark_custom_light();
    }
    else {
        wp_enqueue_style('honeypress-dark-default-style', HONEYPRESS_DARK_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
}

if (is_admin()) {
    require get_stylesheet_directory() . '/admin/admin-init.php';
}

function honeypress_dark_footer_section_hook() {
    ?>
    <footer class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3')): ?>
                <div class="seprator-line"></div>
                <?php
                get_template_part('sidebar', 'footer');
            endif;
            ?>
        </div>
        <div class="site-info text-center">
            <p><?php esc_html_e( 'Proudly powered by', 'honeypress-dark' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org', 'honeypress-dark' ) ); ?>"><?php esc_html_e( 'WordPress', 'honeypress-dark' ); ?> </a> <?php esc_html_e( '| Theme:', 'honeypress-dark' ); ?> <a href="<?php echo esc_url( __( 'https://spicethemes.com', 'honeypress-dark' ) ); ?>" rel="nofollow"> <?php esc_html_e( 'HoneyPress Dark', 'honeypress-dark' ); ?></a> <?php esc_html_e( 'by SpiceThemes', 'honeypress-dark' );?></p>
        </div>
    </footer>
    <?php
}
add_action('honeypress_dark_footer_section_hook', 'honeypress_dark_footer_section_hook');


function honeypress_dark_custom_light() {

    $link_color = esc_attr(get_theme_mod('link_color'));
    list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;
    if ( $link_color != '#ff0000' ) :
    ?>
    <style type="text/css">
        body.dark .navbar { background-color: #000000; }
        .dark p, .dark ul li, ol li, .wp-block-image figcaption, blockquote cite, .dark table th, .dark table td, .dark dl dt, .dark dl dd, address  { color: #c8c8c8; }
        .dark .blog .post.sticky { padding-top: 2.5rem; }
        .dark address i { color: <?php echo $link_color;?>; }
        .dark blockquote { border-left: 4px solid #F9004D; background-color: #1A1A1A; }
        body.dark a, body.dark label, body.dark h1, body.dark h2, body.dark h3, body.dark h4, body.dark h5, body.dark h6, .dark .navbar .nav .nav-item .nav-link, .dropdown-item:focus, .dropdown-item:hover, body.dark .site-title a, body.dark .section-module .section-header h2, body .services .entry-header .entry-title a, body .testi-5 .testmonial-block5:before, body .testi-5 .testmonial-block5 .name, body .testi-5 .testmonial-block5 figcaption, .dark .sidebar .widget-title, .dark .sidebar a, .dark p.comment-form-comment label, .comment-detail .comment-detail-title, body .cart-header > a.cart-icon, .dark .woocommerce #reviews #comments ol.commentlist li .meta strong, .dark .woocommerce table.shop_table th, body.dark .head-contact-info li, body.dark .navbar .nav .nav-item.html a, .dark .testi-5 .testmonial-block5 p { color: #ffffff; }
        body #wrapper, body .services, .dark .blog { background-color: #141414; }
        body.dark .dropdown-menu, .dark .blog .post, body .comment-section { background-color: #141414; }
        body.dark .site-description { color: #C8C8C8; }
        body.dark .dropdown-item:focus, body.dark .dropdown-item:hover { background: #000000; }
        body.dark .site-title a:hover { color: <?php echo $link_color;?> ; }
        body.dark .btn-light { color: #061018; }
        body .section-header .section-subtitle, .dark p, .dark ul li, ol li, .wp-block-image figcaption, blockquote cite { color: #c8c8c8; }
        body.dark .blog .list-view .post { border-bottom: 2px solid #363636; }
        body.dark .blog .standard-view .more-link, body.dark .blog .list-view .more-link { color: #ffffff;
            background: transparent;
        }
        body .testi-5 .testmonial-block5 .avatar { border: 5px solid #ffffff; }
        body .testi-5 .testmonial-block5 { border-top: 5px solid #ffffff; }
        body.dark .sidebar .widget { background-color: #1A1A1A; }
        body .widget .tagcloud a, body .site-footer .widget .tagcloud a { background-color: transparent;
            border: 1px solid #363636;
        }
        body.dark .blog-author { background-color: #141414; border: 1px solid #363636; }
        body.dark .blog .blog-author.media h5 { color: #878e94; }
        .dark input[type="text"], .dark input[type="email"], .dark input[type="url"], .dark input[type="password"], .dark input[type="search"], .dark input[type="number"], .dark input[type="tel"], .dark input[type="range"], .dark input[type="date"], .dark input[type="month"], .dark input[type="week"], input[type="time"], .dark input[type="datetime"], .dark input[type="datetime-local"], .dark input[type="color"], .dark textarea { color: #ffffff !important; background: #1A1A1A !important; border: 1px solid #141414 !important; }
        .dark input[type="submit"] {
            background-color: transparent !important;
            border: 2px solid <?php echo $link_color;?>;
        }
        .dark input[type="submit"]:hover { background-color: <?php echo $link_color;?> !important; }
        .navbar .nav .dropdown-menu.search-panel { border-bottom: 3px solid <?php echo $link_color;?> !important; }
        .dark .navbar .nav .nav-item .search-icon:hover { color: <?php echo $link_color;?> !important; }
        .navbar .nav .nav-item:hover .search-icon { color: #ffffff !important; }
        .honeypress_header_btn { background-color: <?php echo $link_color;?>; }
        body .honeypress_header_btn:hover, body .honeypress_header_btn:focus { background: #ffffff; color: #061018; }
        body.dark .navbar .search-box-outer .dropdown-menu { background-color: #141414 !important; }
        body.dark .navbar .search-box-outer .dropdown-menu input[type="submit"] { background: #ffffff; }
        body .navbar .nav .nav-item:hover .search-icon { color: #ffffff !important; }
        .dark .services .post-thumbnail i.fa { border: 4px solid #000; }
        .dark .products, .dark .woocommerce div.product div.summary, .dark .woocommerce div.product .woocommerce-tabs .panel, .dark .pagination a { background-color: #141414; }
        .dark .woocommerce nav.woocommerce-pagination ul li span.current, .dark .woocommerce nav.woocommerce-pagination ul li a:focus, .dark .woocommerce nav.woocommerce-pagination ul li a:hover { background: <?php echo $link_color;?>; }
        .dark .woocommerce nav.woocommerce-pagination ul li {
            background: transparent;
            border: 1px solid <?php echo $link_color;?>;
        }
        .dark .woocommerce div.product .woocommerce-tabs ul.tabs li.active { background: #141414; }
        .woocommerce-page .services .post {
            background-color: #141414 !important;
            border: 1px solid #363636;
        }
        .dark .woocommerce-checkout #payment { background: #ebe9eb12; }
        .dark .navigation.pagination .nav-links .page-numbers, .dark .navigation.pagination .nav-links a {
                border: 1px solid <?php echo $link_color;?>;
        }
        .dark .blog .post.sticky, .dark .blog .post.sticky:hover { background-color: rgba(<?php echo $r; ?>,<?php echo $g; ?>, <?php echo $b; ?>, 0.1) !important; }
        .dark blockquote:before { color: rgba(<?php echo $r; ?>, <?php echo $g; ?>, <?php echo $b; ?>, 0.15); }
        body.dark .head-contact-info li a:hover, body.dark .head-contact-info li a:focus { color: #ffffff !important }
        .navbar .nav .nav-item:hover .search-icon { color: #ffffff !important; background-color: transparent !important; }
        body.dark .header-module .nav-search a{
            color: #ffffff !important;
            background: transparent !important;
        }
        body.dark .navbar .nav .nav-item .bg-light.search-icon:hover, body.dark .navbar .nav .nav-item .bg-light.search-icon:focus { background-color: #000000 !important; }
        body.dark .dropdown-item:focus, body.dark .dropdown-item:hover {
            background: #000000 !important;
            color: <?php echo $link_color;?> !important;
        }
        .dark .navbar .bg-light {background-color: #000000 !important; color: #ffffff !important; }
        body.dark .blog-single .entry-meta .tag-links a { color: #061018 !important; }
        body.dark .blog-single .entry-meta .tag-links a:hover, body.dark .blog-single .entry-meta .tag-links a:focus { color: #ffffff !important; }
        @media (min-width: 992px) {
          body.dark .navbar .nav .nav-item.html a {
              display: inline-block;
          }
        }
        .dark .blog .standard-view .more-link:focus { outline-color: #ffffff !important; }
        .dark .blog .standard-view .more-link { margin: 2px; }
        .dark .reply a:focus, .dark .entry-meta .tag-links a:focus { color: #ffffff; }
        .dark .blog .post-thumbnail a:focus,.dark a:focus { outline-color: #ffffff; }
        .dark .section-module.blog .list-view .more-link:focus { outline-color: #ffffff !important; margin: 2px; }
        .dark .entry-meta a:focus { margin: 2px; }
        input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus  {
          border: 1px solid #ffffff !important;
        }
        .dark .btn-border {  background: transparent; }
        body.dark .page-title-section .overlay { background-color: rgba(0, 0, 0, 0.65); }
        body.dark .btn-light:hover, body.dark .btn-light:focus { color: #ffffff; }
        .dark .blog .list-view .right .post-thumbnail {
            margin-left: 2.188rem;
            margin-right: 0;
            float: right;
        }
        body .widget .tag-cloud-link { background-color: transparent; }
        body .widget .tag-cloud-link:hover, body .widget .tag-cloud-link:focus, body .site-footer .widget .tag-cloud-link:hover, body .site-footer .widget .tag-cloud-link:focus {
            background-color: <?php echo $link_color;?> ;
            border: 1px solid <?php echo $link_color;?> ;
        }
        body .site-footer .widget .tag-cloud-link:hover { color: #ffffff !important; }
        body .widget li {
          border-bottom: 1px solid #363636;
        }
    </style>
    <?php
endif; }


function honeypress_dark_color_back_settings_customizer( $wp_customize ) {
    //H1 color
  	$wp_customize->add_setting('h1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//H2 color
  	$wp_customize->add_setting('h2_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//H3 color
  	$wp_customize->add_setting('h3_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//H4 color
  	$wp_customize->add_setting('h4_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//H5 color
  	$wp_customize->add_setting('h5_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//H6 color
  	$wp_customize->add_setting('h6_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//P color
  	$wp_customize->add_setting('p_color', array(
        'default' => '#c8c8c8',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//Sidebar widget title color
  	$wp_customize->add_setting('sidebar_widget_title_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//Sidebar widget text color
  	$wp_customize->add_setting('sidebar_widget_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  	//Sidebar widget link color
  	$wp_customize->add_setting('sidebar_widget_link_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
}
add_action( 'customize_register', 'honeypress_dark_color_back_settings_customizer', 11);
