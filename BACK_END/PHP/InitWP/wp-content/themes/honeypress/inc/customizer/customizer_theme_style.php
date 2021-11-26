<?php
// Adding customizer home page setting
function honeypress_custom_color($wp_customize)
{

	if(wp_get_theme()=='HoneyBee')
	{
		$honeypress_layout_style=esc_html__('boxed','honeypress');
	}
	else
	{
		$honeypress_layout_style=esc_html__('wide','honeypress');
	}
	/* Theme Style setting */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => esc_html__('Theme Style Settings', 'honeypress'),
		'priority'   => 110,
   	) );


	/******************** Layout Setting *******************************/
	$wp_customize->add_setting(
	'honeypress_layout_style', array(
	'default' 			=> $honeypress_layout_style,
	'sanitize_callback' => 'honeypress_sanitize_select'
    ));

	$wp_customize->add_control('honeypress_layout_style',
		array(
			'label' 	=> esc_html__('Layout Style', 'honeypress'),
			'section' 	=> 'theme_style',
			'type' 		=> 'radio',
			'choices' 	=>  array(
				'wide' 	=> esc_html__('wide', 'honeypress'),
				'boxed' 	=> esc_html__('boxed', 'honeypress'),
				)
			)
		);

	// enable / disable Theme Style Setting
	$wp_customize->add_setting('custom_color_enable', array(
		'capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
		));
	$wp_customize->add_control('custom_color_enable',array(
			'type' => 'checkbox',
			'label' => esc_html__('Enable custom color skin','honeypress'),
			'section' => 'theme_style',
		)
	);

	// link color settings
	$wp_customize->add_setting('link_color', array(
		'capability'     => 'edit_theme_options',
		'default' => '#2d6ef8',
		'sanitize_callback' => 'sanitize_hex_color'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color',
	array(
		'label'      => esc_html__( 'Skin Color', 'honeypress' ),
		'section'    => 'theme_style',
		'settings'   => 'link_color',
	) ) );
}

add_action( 'customize_register', 'honeypress_custom_color' );
