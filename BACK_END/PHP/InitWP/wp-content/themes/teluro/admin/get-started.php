<?php

use ColibriWP\Theme\PluginsManager;
use ColibriWP\Theme\Translations;

$teluro_is_builder_installed = apply_filters( 'teluro_page_builder/installed', false );

wp_enqueue_script( 'updates' );

function teluro_get_setting_link( $setting ) {
    return esc_attr( teluro_theme()->getCustomizer()->getSettingQuickLink( $setting ) );
}

?>

<div class="teluro-get-started__container teluro-admin-panel">
    <div class="teluro-get-started__section">
        <h2 class="col-title teluro-get-started__section-title">
            <span class="teluro-get-started__section-title__icon dashicons dashicons-admin-plugins"></span>
            <?php Translations::escHtmlE( 'get_started_section_1_title' ); ?>
        </h2>
        <div class="teluro-get-started__content">


            <?php foreach ( teluro_theme()->getPluginsManager()->getPluginData() as $teluro_recommended_plugin_slug => $teluro_recommended_plugin_data ): ?>
                <?php
                $teluro_plugin_state = teluro_theme()->getPluginsManager()->getPluginState( $teluro_recommended_plugin_slug );
                $teluro_notice_type  = $teluro_plugin_state === PluginsManager::ACTIVE_PLUGIN ? 'blue' : '';
                if ( isset( $teluro_recommended_plugin_data['internal'] ) && $teluro_recommended_plugin_data['internal'] ) {
                    continue;
                }
                ?>
                <div 
				
					class="teluro-notice <?php echo esc_attr( $teluro_notice_type ); ?> plugin-card-<?php echo $teluro_recommended_plugin_slug;?>">
                    <div class="teluro-notice__header">
                        <h3 class="teluro-notice__title"><?php echo esc_html( teluro_theme()->getPluginsManager()->getPluginData( "{$teluro_recommended_plugin_slug}.name" ) ); ?></h3>
                        <div class="teluro-notice__action">
                            <?php if ( $teluro_plugin_state === PluginsManager::ACTIVE_PLUGIN ): ?>
                                <p class="teluro-notice__action__active"><?php Translations::escHtmlE( 'plugin_installed_and_active' ); ?> </p>
                            <?php else: ?>
                                <?php if ( $teluro_plugin_state === PluginsManager::INSTALLED_PLUGIN ): ?>
                                    <a class="button button-large colibri-plugin activate-now" 
										data-slug="<?php echo $teluro_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( teluro_theme()->getPluginsManager()->getActivationLink( $teluro_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'activate' ); ?>
                                    </a>
                                <?php else: ?>
                                    <a class="button button-large colibri-plugin install-now"
									   data-slug="<?php echo $teluro_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( teluro_theme()->getPluginsManager()->getInstallLink( $teluro_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'install' ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="teluro-notice__description"><?php echo esc_html( teluro_theme()->getPluginsManager()->getPluginData( "{$teluro_recommended_plugin_slug}.description" ) ); ?></p>


                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="teluro-get-started__section">
        <h2 class="teluro-get-started__section-title">
            <span class="teluro-get-started__section-title__icon dashicons dashicons-admin-appearance"></span>
            <?php Translations::escHtmlE( 'get_started_section_2_title' ); ?>
        </h2>
        <div class="teluro-get-started__content">
            <div class="teluro-customizer-option__container">
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'logo' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_set_logo' ); ?>
                    </a>
                </div>
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'hero_background' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_hero_image' ); ?>
                    </a>
                </div>
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'navigation' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_navigation' ); ?>
                    </a>
                </div>
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-layout"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'hero_layout' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_hero' ); ?>
                    </a>
                </div>
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-admin-appearance"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'footer' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_customize_footer' ); ?>
                    </a>
                </div>
                <?php if ( $teluro_is_builder_installed ): ?>
                    <div class="teluro-customizer-option">
                        <span class="teluro-customizer-option__icon dashicons dashicons-art"></span>
                        <a class="teluro-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( teluro_get_setting_link( 'color_scheme' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_change_color_settings' ); ?>
                        </a>
                    </div>
                    <div class="teluro-customizer-option">
                        <span class="teluro-customizer-option__icon dashicons dashicons-editor-textcolor"></span>
                        <a class="teluro-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( teluro_get_setting_link( 'general_typography' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_customize_fonts' ); ?>
                        </a>
                    </div>

                <?php endif; ?>
                <div class="teluro-customizer-option">
                    <span class="teluro-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="teluro-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( teluro_get_setting_link( 'menu' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_set_menu_links' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php



wp_print_request_filesystem_credentials_modal();
wp_print_admin_notice_templates();
