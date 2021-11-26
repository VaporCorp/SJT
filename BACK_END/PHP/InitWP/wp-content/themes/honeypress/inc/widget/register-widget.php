<?php
/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function honeypress_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'honeypress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add Sidebar widgets.', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', 'honeypress' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to show on footer 1.', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget widget_text sml-device %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'honeypress' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here to show on footer 2.', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget widget_text sml-device %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'honeypress' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here to show on footer 3.', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget widget_text sml-device %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'honeypress' ),
			'id'            => 'footer-sidebar-4',
			'description'   => esc_html__( 'Add widgets here to show on footer 4.', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget widget_text sml-device %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name' => esc_html__('WooCommerce sidebar widget area', 'honeypress' ),
			'id' => 'woocommerce',
			'description' => esc_html__( 'WooCommerce sidebar widget area', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			) );
		register_sidebar( array(
			'name' => esc_html__('Top header sidebar left area', 'honeypress' ),
			'id' => 'home-header-sidebar_left',
			'description' => esc_html__( 'Add contact info here to show on topbar', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			) );
		register_sidebar( array(
			'name' => esc_html__('Top header sidebar right area', 'honeypress' ),
			'id' => 'home-header-sidebar_right',
			'description' => esc_html__( 'Add social widgets here to show on topbar', 'honeypress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			) );

	}

	add_action( 'widgets_init', 'honeypress_widgets_init' );
