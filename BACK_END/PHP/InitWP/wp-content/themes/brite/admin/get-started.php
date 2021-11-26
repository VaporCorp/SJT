<?php

use ColibriWP\Theme\PluginsManager;
use ColibriWP\Theme\Translations;

$brite_is_builder_installed = apply_filters( 'brite_page_builder/installed', false );

wp_enqueue_script( 'updates' );

function brite_get_setting_link( $setting ) {
    return esc_attr( brite_theme()->getCustomizer()->getSettingQuickLink( $setting ) );
}

?>

<div class="brite-get-started__container brite-admin-panel">
    <div class="brite-get-started__section">
        <h2 class="col-title brite-get-started__section-title">
            <span class="brite-get-started__section-title__icon dashicons dashicons-admin-plugins"></span>
            <?php Translations::escHtmlE( 'get_started_section_1_title' ); ?>
        </h2>
        <div class="brite-get-started__content">


            <?php foreach ( brite_theme()->getPluginsManager()->getPluginData() as $brite_recommended_plugin_slug => $brite_recommended_plugin_data ): ?>
                <?php
                $brite_plugin_state = brite_theme()->getPluginsManager()->getPluginState( $brite_recommended_plugin_slug );
                $brite_notice_type  = $brite_plugin_state === PluginsManager::ACTIVE_PLUGIN ? 'blue' : '';
                if ( isset( $brite_recommended_plugin_data['internal'] ) && $brite_recommended_plugin_data['internal'] ) {
                    continue;
                }
                ?>
                <div 
				
					class="brite-notice <?php echo esc_attr( $brite_notice_type ); ?> plugin-card-<?php echo $brite_recommended_plugin_slug;?>">
                    <div class="brite-notice__header">
                        <h3 class="brite-notice__title"><?php echo esc_html( brite_theme()->getPluginsManager()->getPluginData( "{$brite_recommended_plugin_slug}.name" ) ); ?></h3>
                        <div class="brite-notice__action">
                            <?php if ( $brite_plugin_state === PluginsManager::ACTIVE_PLUGIN ): ?>
                                <p class="brite-notice__action__active"><?php Translations::escHtmlE( 'plugin_installed_and_active' ); ?> </p>
                            <?php else: ?>
                                <?php if ( $brite_plugin_state === PluginsManager::INSTALLED_PLUGIN ): ?>
                                    <a class="button button-large colibri-plugin activate-now" 
										data-slug="<?php echo $brite_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( brite_theme()->getPluginsManager()->getActivationLink( $brite_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'activate' ); ?>
                                    </a>
                                <?php else: ?>
                                    <a class="button button-large colibri-plugin install-now"
									   data-slug="<?php echo $brite_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( brite_theme()->getPluginsManager()->getInstallLink( $brite_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'install' ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="brite-notice__description"><?php echo esc_html( brite_theme()->getPluginsManager()->getPluginData( "{$brite_recommended_plugin_slug}.description" ) ); ?></p>


                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="brite-get-started__section">
        <h2 class="brite-get-started__section-title">
            <span class="brite-get-started__section-title__icon dashicons dashicons-admin-appearance"></span>
            <?php Translations::escHtmlE( 'get_started_section_2_title' ); ?>
        </h2>
        <div class="brite-get-started__content">
            <div class="brite-customizer-option__container">
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'logo' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_set_logo' ); ?>
                    </a>
                </div>
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'hero_background' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_hero_image' ); ?>
                    </a>
                </div>
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'navigation' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_navigation' ); ?>
                    </a>
                </div>
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-layout"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'hero_layout' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_hero' ); ?>
                    </a>
                </div>
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-admin-appearance"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'footer' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_customize_footer' ); ?>
                    </a>
                </div>
                <?php if ( $brite_is_builder_installed ): ?>
                    <div class="brite-customizer-option">
                        <span class="brite-customizer-option__icon dashicons dashicons-art"></span>
                        <a class="brite-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( brite_get_setting_link( 'color_scheme' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_change_color_settings' ); ?>
                        </a>
                    </div>
                    <div class="brite-customizer-option">
                        <span class="brite-customizer-option__icon dashicons dashicons-editor-textcolor"></span>
                        <a class="brite-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( brite_get_setting_link( 'general_typography' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_customize_fonts' ); ?>
                        </a>
                    </div>

                <?php endif; ?>
                <div class="brite-customizer-option">
                    <span class="brite-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="brite-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( brite_get_setting_link( 'menu' ) ); ?>">
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
