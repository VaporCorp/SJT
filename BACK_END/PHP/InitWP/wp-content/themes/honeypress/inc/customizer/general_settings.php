<?php
/**
 * General Settings Customizer
 *
 * @package honeypress
 */
function honeypress_general_settings_customizer ( $wp_customize )
{
	if(wp_get_theme()=='Tromas')
	{
		$honeypress_sticky_default_val=true;
	}
	else
	{
		$honeypress_sticky_default_val=false;
	}

	$wp_customize->add_panel('honeypress_general_settings',
		array(
			'priority' => 110,
			'capability' => 'edit_theme_options',
			'title' => esc_html__('General Settings','honeypress')
		)
	);
	
	// Preloader
	$wp_customize->add_section(
        'preloader_section',
        array(
            'title' =>esc_html__('Preloader','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 1,
			
			)
    );

     $wp_customize->add_setting('preloader_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'preloader_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Preloader', 'honeypress' ),
			'section'  => 'preloader_section',
			'type'     => 'ios',
			'priority' => 1,
		)
	));

	// Sticky Header 
	$wp_customize->add_section(
        'sticky_header_section',
        array(
            'title' =>esc_html__('Sticky Header','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 1,
			
			)
    );

     $wp_customize->add_setting('sticky_header_enable',
		array(
			'default' => $honeypress_sticky_default_val,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'sticky_header_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Sticky Header', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'ios',
			'priority' => 1,
		)
	));


	// Scroll to top
	$wp_customize->add_section(
        'scrolltotop_setting_section',
        array(
            'title' =>esc_html__('Scroll to Top','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 3,
			
			)
    );
	
    $wp_customize->add_setting('scrolltotop_setting_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'scrolltotop_setting_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Scroll to Top', 'honeypress' ),
			'section'  => 'scrolltotop_setting_section',
			'type'     => 'ios',
			'priority' => 1,
		)
	));

	// After Menu
	$wp_customize->add_section(
        'after_menu_setting_section',
        array(
            'title' =>esc_html__('After Menu','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 3,
			)
    );

	//Dropdown button or html option
	$wp_customize->add_setting(
    'after_menu_multiple_option',
    array(
        'default'           =>  'none',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_select',
    ));
	$wp_customize->add_control('after_menu_multiple_option', array(
		'label' => esc_html__('After Menu','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_multiple_option',
		'type'    =>  'select',
		'choices' =>  array(
			'none'		=>	esc_html__('None', 'honeypress'),
			'menu_btn' 	=> esc_html__('Button', 'honeypress'),
			'html' 		=> esc_html__('HTML', 'honeypress'),
			)
	));

	//After Menu Button Text
	$wp_customize->add_setting(
    'after_menu_btn_txt',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_text',
    ));
	$wp_customize->add_control('after_menu_btn_txt', array(
		'label' => esc_html__('Button Text','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_txt',
		'type' => 'text',
	));

	//After Menu Button Link
	$wp_customize->add_setting(
    'after_menu_btn_link',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'esc_url_raw',
    ));
	$wp_customize->add_control('after_menu_btn_link', array(
		'label' => esc_html__('Button Link','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_link',
		'type' => 'text',
	));

	//Open in new tab
	$wp_customize->add_setting(
    'after_menu_btn_new_tabl',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_checkbox',
    ) );
	
	$wp_customize->add_control('after_menu_btn_new_tabl', array(
		'label' => esc_html__('Open link in a new tab','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_new_tabl',
		'type'    =>  'checkbox'
	));	

	//Border Radius
	$wp_customize->add_setting( 'after_menu_btn_border',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'after_menu_btn_border',
			array(
				'label' => esc_html__( 'Button Border Radius', 'honeypress' ),
				'section' => 'after_menu_setting_section',
				'input_attrs' => array(
					'min' => 0,
					'max' => 30,
					'step' => 1,),)
		));

	//After Menu HTML section
	$wp_customize->add_setting('after_menu_html', 
		array(
		'default'=>	'',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback'=> 'honeypress_sanitize_text',
		)
	);

	$wp_customize->add_control('after_menu_html', 
		array(
			'label'=> __('HTML','honeypress'),
			'section'=> 'after_menu_setting_section',
			'type'=> 'textarea',
		)
	);

	//Enable / Disable Search Icon
    $wp_customize->add_setting('search_btn_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'search_btn_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Search Icon', 'honeypress' ),
			'section'  => 'after_menu_setting_section',
			'type'     => 'ios',
		)
	));

	//Enable / Disable Cart Icon
    $wp_customize->add_setting('cart_btn_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'cart_btn_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Cart Icon', 'honeypress' ),
			'section'  => 'after_menu_setting_section',
			'type'     => 'ios',
		)
	));	

	// Container Width
	$wp_customize->add_section(
        'container_width_section',
        array(
            'title' =>esc_html__('Container Width','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 5,
			
			)
    );

    $wp_customize->add_setting( 'container_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_width',
			array(
				'label' => esc_html__( 'Container Width', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1920,
					'step' => 1,),)
		));

	/******************** Footer Widgets *******************************/
	$wp_customize->add_section(
        'fwidgets_setting_section',
        array(
            'title' =>esc_html__('Footer Widgets','honeypress'),
			'panel'  => 'honeypress_general_settings',
			)
    );

	$wp_customize->add_setting( 'footer_widgets_section',
	array(
		'default' => 3,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_select'
	));
	$wp_customize->add_control( new Honeypress_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_widgets_section',
	array(
		'label' => esc_html__( 'Footer Widgets', 'honeypress' ),
		'section' => 'fwidgets_setting_section',
		'choices' => array(
			2 => array( 
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/2-col.png',
			),
			3 => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/3-col.png',
			),
			4 => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/4-col.png',
			)
		)
	)
) );

	}
add_action( 'customize_register', 'honeypress_general_settings_customizer' );