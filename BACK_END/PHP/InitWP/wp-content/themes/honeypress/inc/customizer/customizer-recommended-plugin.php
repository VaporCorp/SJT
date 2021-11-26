<?php
/* Notifications in customizer */
require HONEYPRESS_THEME_DIR . '/inc/customizer-notify/honeypress-customizer-notify.php';
$honeypress_config_customizer = array(
	'recommended_plugins'       => array(
		'spicebox' => array(
			'recommended' => true,
			'description' => sprintf( esc_html__( 'Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'honeypress' ), sprintf( '<strong>%s</strong>', 'Spicebox' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'honeypress' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'honeypress' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'honeypress' ),
	'activate_button_label'     => esc_html__( 'Activate', 'honeypress' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'honeypress' ),
);
Honeypress_Customizer_Notify::init( apply_filters( 'honeypress_customizer_notify_array', $honeypress_config_customizer ) );