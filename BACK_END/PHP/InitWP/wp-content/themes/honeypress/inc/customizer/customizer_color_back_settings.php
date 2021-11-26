<?php
function honeypress_color_back_settings_customizer( $wp_customize ){

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

/* Home Page Panel */
	$wp_customize->add_panel( 'colors_back_settings', array(
		'priority'       => 111,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Color Settings ','honeypress'),
	) );

	/* ------------------------------------------------*/
	/* Header Color Settings */

	$wp_customize->add_section( 'header_color_settings', array(
		'title' => esc_html__('Header', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

   		// enable/disable
	$wp_customize->add_setting(
		'apply_hdr_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
		));

	$wp_customize->add_control(
		'apply_hdr_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => esc_html__('Click here to apply these settings','honeypress'),
			'section' => 'header_color_settings',
		)
	);

	class Honeypress_Sitetitle_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'site_title';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Site Title','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'site_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Sitetitle_Color_Customize_Control( $wp_customize, 'site_title_color', array(
			'section' => 'header_color_settings',
			'setting' => 'site_title_color',
	    ))
	);

	//Site title link color
	$wp_customize->add_setting('site_title_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_title_link_color',)
	) );

	//Site title link hover color
	$wp_customize->add_setting('site_title_link_hover_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_title_link_hover_color',)
	) );

	class Honeypress_Sitetagline_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'site_tagline';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Site Tagline','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'site_tagline_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Sitetagline_Color_Customize_Control( $wp_customize, 'site_tagline_color', array(
			'section' => 'header_color_settings',
			'setting' => 'site_tagline_color',
	    ))
	);

	//Site tagline text color
	$wp_customize->add_setting('site_tagline_text_color', array(
	'default' => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_tagline_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_tagline_text_color',)
	) );





	/* Primary Menu Color Settings */
	$wp_customize->add_section( 'primary_menu_color_settings', array(
		'title' => esc_html__('Primary Menu', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

	class Honeypress_Menus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'pri_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Menus','honeypress'); ?></h3>
	    <?php
	    }
	}

	$wp_customize->add_setting(
	    'menus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Menus_Color_Customize_Control( $wp_customize, 'menus_color', array(
			'section' => 'primary_menu_color_settings',
			'setting' => 'menus_color',
	    ))
	);


	// enable/disable
	$wp_customize->add_setting(
		'apply_menu_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
		));

	$wp_customize->add_control(
		'apply_menu_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => esc_html__('Click here to apply menu settings','honeypress'),
			'section' => 'primary_menu_color_settings',
		)
	);

	//Menus text/link color
	$wp_customize->add_setting('menus_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_color',)
	) );

	//Menus text/link hover color
	$wp_customize->add_setting('menus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_hover_color',)
	) );

	//Menus text/link active color
	$wp_customize->add_setting('menus_link_active_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_active_color', array(
		'label'      => esc_html__('Active Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_active_color',)
	) );

	class Honeypress_Submenus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'pri_sub_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Submenus','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'submenus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Submenus_Color_Customize_Control( $wp_customize, 'submenus_color', array(
			'section' => 'primary_menu_color_settings',
			'setting' => 'submenus_color',
	    ))
	);

	//Submenus Background color
	$wp_customize->add_setting('submenus_background_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_background_color',)
	) );

	//Submenus text/link color
	$wp_customize->add_setting('submenus_link_color', array(
	'default' => '#212529',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_link_color',)
	) );

	//Submenus text/link hover color
	$wp_customize->add_setting('submenus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_link_hover_color',)
	) );


	/* ------------------------------------------------*/
	/* Banner Color Settings */
	$wp_customize->add_section( 'banner_color_settings', array(
		'title' => esc_html__('Banner', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

	class Honeypress_Banner_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'banner_title';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Banner Title','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'banner_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Banner_Color_Customize_Control( $wp_customize, 'banner_title_color', array(
			'section' => 'banner_color_settings',
			'setting' => 'banner_title_color',
	    ))
	);

	//Banner title color
	$wp_customize->add_setting('banner_text_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'banner_text_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'banner_text_color',)
	) );


	class Honeypress_Breadcrumb_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'bread_title';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Breadcrumb Title','honeypress'); ?></h3>
	    <?php
	    }
	}
		// Image overlay
		$wp_customize->add_setting( 'enable_brd_link_clr_setting', array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox',
		) );

		$wp_customize->add_control('enable_brd_link_clr_setting', array(
			'label'    => esc_html__('Enable to apply below color settings', 'honeypress' ),
			'section'  => 'banner_color_settings',
			'type' => 'checkbox',
		) );
	$wp_customize->add_setting(
	    'breadcrumb_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new Honeypress_Breadcrumb_Color_Customize_Control( $wp_customize, 'breadcrumb_title_color', array(
			'section' => 'banner_color_settings',
			'setting' => 'breadcrumb_title_color',
	    ))
	);

	//Breadcrumb title link color
	$wp_customize->add_setting('breadcrumb_title_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'breadcrumb_title_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'breadcrumb_title_link_color',)
	) );

	//Breadcrumb title link hover color
	$wp_customize->add_setting('breadcrumb_title_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'breadcrumb_title_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'breadcrumb_title_link_hover_color',)
	) );


	/* ------------------------------------------------*/
	/* Content Color Settings */
	$wp_customize->add_section( 'content_color_settings', array(
		'title' => esc_html__('Content', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

  //H1 color
	$wp_customize->add_setting('h1_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h1_color', array(
		'label'      => esc_html__('H1 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h1_color',)
	) );

	//H2 color
	$wp_customize->add_setting('h2_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h2_color', array(
		'label'      => esc_html__('H2 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h2_color',)
	) );

	//H3 color
	$wp_customize->add_setting('h3_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h3_color', array(
		'label'      => esc_html__('H3 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h3_color',)
	) );

	//H4 color
	$wp_customize->add_setting('h4_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );


	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h4_color', array(
		'label'      => esc_html__('H4 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h4_color',)
	) );

	//H5 color
	$wp_customize->add_setting('h5_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h5_color', array(
		'label'      => esc_html__('H5 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h5_color',)
	) );

	//H6 color
	$wp_customize->add_setting('h6_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );


	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h6_color', array(
		'label'      => esc_html__('H6 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h6_color',)
	) );

	//P color
	$wp_customize->add_setting('p_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'p_color', array(
		'label'      => esc_html__('Paragraph Text Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'p_color',)
	) );


	/* ------------------------------------------------*/
	/* Sidebar Widget Color Settings */
	$wp_customize->add_section( 'sidebar_widget_color_settings', array(
		'title' => esc_html__('Sidebar', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

	//Sidebar widget title color
	$wp_customize->add_setting('sidebar_widget_title_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_title_color',)
	) );

	//Sidebar widget text color
	$wp_customize->add_setting('sidebar_widget_text_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_text_color',)
	) );

	//Sidebar widget link color
	$wp_customize->add_setting('sidebar_widget_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );


	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_link_color',)
	) );

	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_sibar_link_hover_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'honeypress_sanitize_checkbox'
		));

	$wp_customize->add_control(
		'apply_sibar_link_hover_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => esc_html__('Enable to apply this color setting','honeypress'),
			'section' => 'sidebar_widget_color_settings',
		)
	);

	//Sidebar widget link hover color
	$wp_customize->add_setting('sidebar_widget_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_link_hover_color',)
	) );


	/* ------------------------------------------------*/
	/* Footer Widget Color Settings */
	$wp_customize->add_section( 'footer_widget_color_settings', array(
		'title' => esc_html__('Footer Widget', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_ftrsibar_link_hover_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
		));

	$wp_customize->add_control(
		'apply_ftrsibar_link_hover_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => esc_html__('Enable to apply these color settings','honeypress'),
			'section' => 'footer_widget_color_settings',
		)
	);

	//Footer widget background color
	$wp_customize->add_setting('footer_widget_background_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_background_color',)
	) );

	//Footer widget title color
	$wp_customize->add_setting('footer_widget_title_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_title_color',)
	) );

	//Footer widget text color
	$wp_customize->add_setting('footer_widget_text_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_text_color',)
	) );

	//Footer widget link color
	$wp_customize->add_setting('footer_widget_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_link_color',)
	) );

	//Footer widget link hover color
	$wp_customize->add_setting('footer_widget_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_link_hover_color',)
	) );

}
add_action( 'customize_register', 'honeypress_color_back_settings_customizer' );
