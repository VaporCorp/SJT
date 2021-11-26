<?php
/************************* Footer Callback function *********************************/

 	function honeypress_footer_callback ( $control )
 	{
		if( true == $control->manager->get_setting ('footer_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}


/************************* Theme Customizer with Sanitize function *********************************/
function honeypress_theme_option( $wp_customize )
{
	$wp_customize->add_panel('honeypress_theme_panel',
		array(
			'priority' => 2,
			'capability' => 'edit_theme_options',
			'title' => esc_html__('HoneyPress theme options','honeypress')
		)
	);
}
add_action('customize_register','honeypress_theme_option');
