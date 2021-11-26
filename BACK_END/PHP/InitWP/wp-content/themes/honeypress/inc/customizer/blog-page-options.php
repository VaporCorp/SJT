<?php
/**
 * Single Blog Options Customizer
 *
 * @package Honeypress
 */
function honeypress_blog_page_options_customizer ( $wp_customize )
{
$wp_customize->add_section('honeypress_blog_page_options',
	array(
		'title' => esc_html__('Blog Page', 'honeypress'),
		'panel' => 'honeypress_theme_panel',
		'priority' => 1
	));

	// News section title
	$wp_customize->add_setting( 'blog_page_title_option',array(
		'capability'     => 'edit_theme_options',
		'default' => esc_html__('Home','honeypress'),
		'sanitize_callback' => 'honeypress_sanitize_text',
		));
	$wp_customize->add_control( 'blog_page_title_option',array(
		'label'   => esc_html__('Main Title','honeypress'),
		'section' => 'honeypress_blog_page_options',
		'type' => 'text',
		));

	/******************** Blog Excerpt *******************************/
	$wp_customize->add_setting('honeypress_blog_content',
		array(
			'default' 			=> esc_html__('excerpt','honeypress'),
			'sanitize_callback' => 'honeypress_sanitize_select'
			)
		);

	$wp_customize->add_control('honeypress_blog_content',
		array(
			'label' 	=> esc_html__('Choose Options', 'honeypress'),
			'section' 	=> 'honeypress_blog_page_options',
			'type' 		=> 'radio',
			'choices' 	=>  array(
				'excerpt' 	=> esc_html__('Excerpt', 'honeypress'),
				'content' 	=> esc_html__('Full Content', 'honeypress'),
				)
			)
		);

	/******************** Blog Excerpt Length *******************************/
	$wp_customize->add_setting( 'honeypress_blog_content_length',
		array(
			'default'           => 30,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',
			)
	);
	$wp_customize->add_control( 'honeypress_blog_content_length',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'honeypress' ),
			'section'     => 'honeypress_blog_page_options',
			'type'        => 'number',
			'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 1, 'style' => 'width: 200px;' ),
		)
	);

	/******************** Logo Length *******************************/
	$wp_customize->add_setting( 'honeypress_logo_length',
			array(
				'default' => '',
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'honeypress_logo_length',
			array(
				'label' => esc_html__( 'Logo Width', 'honeypress' ),
				'section' => 'title_tagline',
				'input_attrs' => array(
					'min' => 0,
					'max' => 500,
					'step' => 1,
				),
			)
		) );

	/************************* Blog Meta Rearrange*********************************/
	$default = array( 'blog_author', 'blog_date', 'blog_commment');

	$choices = array(
		'blog_author' => esc_html__( 'Author', 'honeypress' ),
		'blog_date' => esc_html__( 'Date', 'honeypress' ),
		'blog_commment' => esc_html__( 'Comment', 'honeypress' ),
	);

	$wp_customize->add_setting( 'honeypress_blog_meta_sort',
	array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'honeypress_sanitize_array',
        'default'     => $default
    ) );

	$wp_customize->add_control( new Honeypress_Control_Sortable( $wp_customize, 'honeypress_blog_meta_sort',
    array(
        'label' => esc_html__( 'Drag And Drop to Rearrange', 'honeypress' ),
        'section' => 'honeypress_blog_page_options',
        'settings' => 'honeypress_blog_meta_sort',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );

}
add_action( 'customize_register', 'honeypress_blog_page_options_customizer' );
