<?php


use ColibriWP\Theme\Core\Hooks;
use ColibriWP\Theme\Translations;
use ColibriWP\Theme\View;

$teluro_tabs            = View::getData( 'tabs', array() );
$teluro_current_tab     = View::getData( 'current_tab', null );
$teluro_url             = View::getData( 'page_url', null );
$teluro_welcome_message = View::getData( 'welcome_message', null );
$teluro_tab_partial     = View::getData( "tabs.{$teluro_current_tab}.tab_partial", null );
Hooks::prefixed_do_action( "before_info_page_tab_{$teluro_current_tab}" );
$teluro_slug        = "colibri-wp-page-info";
$colibri_get_started = array(
    'plugin_installed_and_active' => Translations::escHtml( 'plugin_installed_and_active' ),
    'activate'                    => Translations::escHtml( 'activate' ),
    'activating'                  => __( 'Activating', 'teluro' ),
    'install_recommended'         => isset( $_GET['install_recommended'] ) ? $_GET['install_recommended'] : ''
);

wp_localize_script( $teluro_slug, 'colibri_get_started', $colibri_get_started );
?>
<div class="teluro-admin-page wrap about-wrap full-width-layout mesmerize-page">

    <div class="teluro-admin-page--hero">
        <div class="teluro-admin-page--hero-intro teluro-admin-page-spacing ">
            <div class="teluro-admin-page--hero-logo">
                <img src="<?php echo esc_url( teluro_theme()->getAssetsManager()->getBaseURL() . "/images/teluro-logo.png" ) ?>"
                     alt="logo"/>
            </div>
            <div class="teluro-admin-page--hero-text ">
                <?php if ( $teluro_welcome_message ): ?>
                    <h1><?php echo esc_html( $teluro_welcome_message ); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( count( $teluro_tabs ) ): ?>
            <nav class="nav-tab-wrapper wp-clearfix">
                <?php foreach ( $teluro_tabs as $teluro_tab_id => $teluro_tab ) : ?>
                    <a class="nav-tab <?php echo ( $teluro_current_tab === $teluro_tab_id ) ? 'nav-tab-active' : '' ?>"
                       href="<?php echo esc_url( add_query_arg( array( 'current_tab' => $teluro_tab_id ),
                           $teluro_url ) ); ?>">
                        <?php echo esc_html( $teluro_tab['title'] ); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </div>
    <?php if ( $teluro_tab_partial ): ?>
        <div class="teluro-admin-page--body teluro-admin-page-spacing">
            <div class="teluro-admin-page--content">
                <div class="teluro-admin-page--tab">
                    <div class="teluro-admin-page--tab-<?php echo esc_attr( $teluro_current_tab ); ?>">
                        <?php View::make( $teluro_tab_partial,
                            Hooks::prefixed_apply_filters( "info_page_data_tab_{$teluro_current_tab}",
                                array() ) ); ?>
                    </div>
                </div>

            </div>
            <div class="teluro-admin-page--sidebar">
                <?php View::make( 'admin/sidebar' ) ?>
            </div>
        </div>
    <?php endif; ?>
</div>


