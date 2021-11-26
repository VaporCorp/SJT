<?php


use ColibriWP\Theme\Core\Hooks;
use ColibriWP\Theme\Translations;
use ColibriWP\Theme\View;

$brite_tabs            = View::getData( 'tabs', array() );
$brite_current_tab     = View::getData( 'current_tab', null );
$brite_url             = View::getData( 'page_url', null );
$brite_welcome_message = View::getData( 'welcome_message', null );
$brite_tab_partial     = View::getData( "tabs.{$brite_current_tab}.tab_partial", null );
Hooks::prefixed_do_action( "before_info_page_tab_{$brite_current_tab}" );
$brite_slug        = "colibri-wp-page-info";
$colibri_get_started = array(
    'plugin_installed_and_active' => Translations::escHtml( 'plugin_installed_and_active' ),
    'activate'                    => Translations::escHtml( 'activate' ),
    'activating'                  => __( 'Activating', 'brite' ),
    'install_recommended'         => isset( $_GET['install_recommended'] ) ? $_GET['install_recommended'] : ''
);

wp_localize_script( $brite_slug, 'colibri_get_started', $colibri_get_started );
?>
<div class="brite-admin-page wrap about-wrap full-width-layout mesmerize-page">

    <div class="brite-admin-page--hero">
        <div class="brite-admin-page--hero-intro brite-admin-page-spacing ">
            <div class="brite-admin-page--hero-logo">
                <img src="<?php echo esc_url( brite_theme()->getAssetsManager()->getBaseURL() . "/images/brite-logo.png" ) ?>"
                     alt="logo"/>
            </div>
            <div class="brite-admin-page--hero-text ">
                <?php if ( $brite_welcome_message ): ?>
                    <h1><?php echo esc_html( $brite_welcome_message ); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( count( $brite_tabs ) ): ?>
            <nav class="nav-tab-wrapper wp-clearfix">
                <?php foreach ( $brite_tabs as $brite_tab_id => $brite_tab ) : ?>
                    <a class="nav-tab <?php echo ( $brite_current_tab === $brite_tab_id ) ? 'nav-tab-active' : '' ?>"
                       href="<?php echo esc_url( add_query_arg( array( 'current_tab' => $brite_tab_id ),
                           $brite_url ) ); ?>">
                        <?php echo esc_html( $brite_tab['title'] ); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </div>
    <?php if ( $brite_tab_partial ): ?>
        <div class="brite-admin-page--body brite-admin-page-spacing">
            <div class="brite-admin-page--content">
                <div class="brite-admin-page--tab">
                    <div class="brite-admin-page--tab-<?php echo esc_attr( $brite_current_tab ); ?>">
                        <?php View::make( $brite_tab_partial,
                            Hooks::prefixed_apply_filters( "info_page_data_tab_{$brite_current_tab}",
                                array() ) ); ?>
                    </div>
                </div>

            </div>
            <div class="brite-admin-page--sidebar">
                <?php View::make( 'admin/sidebar' ) ?>
            </div>
        </div>
    <?php endif; ?>
</div>


