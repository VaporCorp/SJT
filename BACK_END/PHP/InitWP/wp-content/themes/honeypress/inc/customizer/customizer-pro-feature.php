<?php //Pro Details
function honeypress_pro_feature_customizer( $wp_customize ) {
    class Honeypress_WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
        <div class="honeypress-pro-features-customizer">
            <ul class="honeypress-pro-features">
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Advanced Hook Settings','honeypress' ); ?>
                </li>
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Multiple Page Templates','honeypress' ); ?>
                </li>
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Portfolio Management','honeypress' ); ?>
                </li>
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Slide Variations','honeypress' ); ?>
                </li>
              <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Create Unlimited Services','honeypress' ); ?>
                </li>
                 <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Multiple Sections Variations','honeypress' ); ?>
                </li>
              <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Manage Contact Details','honeypress' ); ?>
                </li>
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Client Section','honeypress' ); ?>
                </li>
              <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Team Section','honeypress' ); ?>
                </li>
              <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Predefined Color Schemes','honeypress' ); ?>
                </li>
              <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Section Reordering','honeypress' ); ?>
                </li>
                <li>
                    <span class="honeypress-pro-label"><?php esc_html_e( 'PRO','honeypress' ); ?></span>
                    <?php esc_html_e( 'Quality Support','honeypress' ); ?>
                </li>
            </ul>
            <a target="_blank" href="<?php echo esc_url('https://spicethemes.com/honeypress-pro');?>" class="honeypress-pro-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','honeypress' ); ?></a>
            <hr>
        </div>
        <?php
        }
    }
    $wp_customize->add_section( 'honeypress_pro_feature_section' , array(
    		'title'      => esc_html__('View PRO Details', 'honeypress'),
    		'priority'   => 1,
       	) );
    $wp_customize->add_setting(
        'upgrade_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new Honeypress_WP_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
    		'section' => 'honeypress_pro_feature_section',
    		'setting' => 'upgrade_pro_feature',
        ))
    );
    class Honeypress_WP_Feature_document_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>

         <div class="honeypress-pro-content">
            <ul class="honeypress-pro-des">
                    <li> <?php esc_html_e('With individual hook settings, you can insert html or php code according to your needs.','honeypress');?></li>
                    <li> <?php esc_html_e('Theme comes with multiple page settings like multiple blog, portfolio 2/3/4 column, about us etc.','honeypress');?></li>
                    <li> <?php esc_html_e('Create a professional-looking portfolio.','honeypress');?></li>
                    <li> <?php esc_html_e('PRO version comes with slide variation options, so you can adjust your content through text alignment.','honeypress');?></li>
                    <li> <?php esc_html_e('Add as many services as you like. You can even display each service on a separate page.','honeypress');?></li>
                     <li> <?php esc_html_e('There are multiple sections variations.','honeypress');?></li>
                    <li> <?php esc_html_e('Theme comes with a beautifully designed section where you can manage your contact details.','honeypress');?></li>
                    <li> <?php esc_html_e('Show all your team members, clients, testimonials on front page.','honeypress');?></li>
                    <li> <?php esc_html_e('You can select amongst predefined color skins, or you can create your own without writing any CSS code.','honeypress');?></li>
                    <li> <?php esc_html_e('The layout manager will help you rearrange all sections.','honeypress');?></li>
                    <li> <?php esc_html_e('Translation-ready, the theme supports popular plugins WPML and Polylang','honeypress');?></li>
                    <li> <?php esc_html_e('24/7 professional support for Google Maps','honeypress');?></li>
                    <li> <?php esc_html_e('Dedicated support, widget and sidebar management.','honeypress');?></li>
                </ul>
         </div>
        <?php
        }
    }

    $wp_customize->add_setting(
        'honeypress_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new Honeypress_WP_Feature_document_Customize_Control( $wp_customize, 'honeypress_pro_feature', array(
    		'section' => 'honeypress_pro_feature_section',
    		'setting' => 'honeypress_pro_feature',
        ))
    );

}
add_action( 'customize_register', 'honeypress_pro_feature_customizer' );
?>
