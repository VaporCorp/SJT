<?php
/**
 * Single Blog Options Customizer
 *
 * @package Honeypress
 */
function honeypress_single_blog_customizer ( $wp_customize )
{
$wp_customize->add_section('honeypress_single_blog_section',
	array(
		'title' => esc_html__('Single Post', 'honeypress'),
		'panel' => 'honeypress_theme_panel',
		'priority' => 5
	));


$wp_customize->add_setting('honeypress_enable_single_post_category',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_category',
	array(
		'label' => esc_html__('Hide/Show Categories', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 4,
	)
));

$wp_customize->add_setting('honeypress_enable_single_post_date',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_date',
	array(
		'label' => esc_html__('Hide/Show Date', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 6,
	)
));

$wp_customize->add_setting('honeypress_enable_single_post_comments',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_comments',
	array(
		'label' => esc_html__('Hide/Show Comments', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 7,
	)
));

$wp_customize->add_setting('honeypress_enable_single_post_comments',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_comments',
	array(
		'label' => esc_html__('Hide/Show Comments', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 6,
	)
));

$wp_customize->add_setting('honeypress_enable_single_post_admin',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_admin',
	array(
		'label' => esc_html__('Hide/Show Author Name', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 5,
	)
));

$wp_customize->add_setting('honeypress_enable_single_post_tag',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_tag',
	array(
		'label' => esc_html__('Hide/Show Tags', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 8,
	)
));
$wp_customize->add_setting('honeypress_enable_single_post_admin_details',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_single_post_admin_details',
	array(
		'label' => esc_html__('Hide/Show Author Details', 'honeypress'),
		'type' => 'ios',
		'section' => 'honeypress_single_blog_section',
		'priority' => 9,
	)
));

}
add_action( 'customize_register', 'honeypress_single_blog_customizer' );
