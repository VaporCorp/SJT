<?php 
function honeypress_typography_customizer( $wp_customize ) {
$wp_customize->add_panel( 'honeypress_typography_setting', array(
		'priority'       => 112,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Typography Settings','honeypress'),
	) );

$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$line_height = array();
for($i=1; $i<=100; $i++)
{           
    $line_height[$i] = $i;
}

$font_family = honeypress_typo_fonts();

// Header typography section
$wp_customize->add_section( 'honeypress_header_typography' , array(
		'title'      => esc_html__('Header', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 2,
   	) );
// Enable/Disable Header typography section
$wp_customize->add_setting(
    'enable_header_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_checkbox',
    ) );
	
$wp_customize->add_control('enable_header_typography', array(
		'label' => esc_html__('Enable Header Typography','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'enable_header_typography',
		'type'    =>  'checkbox'
));	
class Honeypress_Sitetitle_Customize_Control extends WP_Customize_Control {
    public $type = 'site_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3 class="customizer_heading"><?php esc_html_e('Site Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'site_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Sitetitle_Customize_Control( $wp_customize, 'site_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'site_title',
    ))
);
$wp_customize->add_setting(
    'site_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'site_title_fontsize',
    array(
        'default'           =>  30,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('site_title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'site_title_line_height',
    array(
        'default'           =>  39,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('site_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'site_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class Honeypress_Sitetagline_Customize_Control extends WP_Customize_Control {
    public $type = 'site_tagline';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Site Tagline','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'site_tagline',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Sitetagline_Customize_Control( $wp_customize, 'site_tagline', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline',
    ))
);
$wp_customize->add_setting(
    'site_tagline_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'site_tagline_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('site_tagline_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'site_tagline_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('site_tagline_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'site_tagline_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class Honeypress_Menus_Typo_Customize_Control extends WP_Customize_Control {
    public $type = 'prim_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Menus','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'menus_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Menus_Typo_Customize_Control( $wp_customize, 'menus_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'menus_title',
    ))
);
$wp_customize->add_setting(
    'menu_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'menu_title_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('menu_title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'menu_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('menu_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'menu_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class Honeypress_SubMenus_Typo_Customize_Control extends WP_Customize_Control {
    public $type = 'prim_submenu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Submenus','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'submenus_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_SubMenus_Typo_Customize_Control( $wp_customize, 'submenus_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'submenus_title',
    ))
);
$wp_customize->add_setting(
    'submenu_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'submenu_title_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('submenu_title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'submenu_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('submenu_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'submenu_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Slider title typography section
$wp_customize->add_section( 'honeypress_slider_typography' , array(
		'title'      => esc_html__('Slider', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 4,
   	) );
// Enable/Disable Slider title typography section
$wp_customize->add_setting(
    'enable_slider_title_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
$wp_customize->add_control('enable_slider_title_typography', array(
		'label' => esc_html__('Enable Slider Typography','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'enable_slider_title_typography',
		'type'    =>  'checkbox'
));	
class Honeypress_Slider_title_Customize_Control extends WP_Customize_Control {
    public $type = 'honeypress_slide_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <h3 class="customizer_heading"><?php esc_html_e('Slider Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'honeypress_slide_title',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )   
);
$wp_customize->add_control( new Honeypress_Slider_title_Customize_Control( $wp_customize, 'honeypress_slide_title', array( 
        'section' => 'honeypress_slider_typography',
        'setting' => 'honeypress_slide_title',
    ))
);
$wp_customize->add_setting(
    'slider_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'slider_title_fontsize',
    array(
        'default'           =>  65,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('slider_title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'slider_line_height',
    array(
        'default'           =>  85,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('slider_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_slider_typography',
        'setting' => 'slider_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Section title typography section
$wp_customize->add_section( 'honeypress_section_typography' , array(
		'title'      => esc_html__('Homepage Sections', 'honeypress'),
		'panel' 	 => 'honeypress_typography_setting',
		'priority'   => 5,
   	) );
// Enable/Disable Section title typography section
$wp_customize->add_setting(
    'enable_section_title_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_section_title_typography', array(
		'label' => esc_html__('Enable Homepage Sections Typography','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'enable_section_title_typography',
		'type'    =>  'checkbox'
));	

class Honeypress_Section_Title_Customize_Control extends WP_Customize_Control {
    public $type = 'sec_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Section Title','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'section_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Section_Title_Customize_Control( $wp_customize, 'section_title', array(	
		'section' => 'honeypress_section_typography',
		'setting' => 'section_title',
    ))
);




$wp_customize->add_setting(
    'section_description_fontfamily',
    array(
        'default'           =>  'Open Sans',
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('section_description_fontfamily', array(
        'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_description_fontfamily',
        'type'    =>  'select',
        'choices'=>$font_family,
));
$wp_customize->add_setting(
    'section_description_fontsize',
    array(
        'default'           =>  16,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('section_description_fontsize', array(
        'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_description_fontsize',
        'type'    =>  'select',
        'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'section_description_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('section_description_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_description_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));
class Honeypress_Section_Description_Customize_Control extends WP_Customize_Control {
    public $type = 'sec_subtitle';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Section Description','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'section_description',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Section_Description_Customize_Control( $wp_customize, 'section_description', array(	
		'section' => 'honeypress_section_typography',
		'setting' => 'section_description',
    ))
);
$wp_customize->add_setting(
    'section_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('section_title_fontfamily', array(
        'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_title_fontfamily',
        'type'    =>  'select',
        'choices'=>$font_family,
));
$wp_customize->add_setting(
    'section_title_fontsize',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('section_title_fontsize', array(
        'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_title_fontsize',
        'type'    =>  'select',
        'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'section_title_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('section_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Content typography section
$wp_customize->add_section( 'honeypress_content_typography' , array(
		'title'      => esc_html__('Content','honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 6,
   	) );
// Enable/Disable Content typography section
$wp_customize->add_setting(
    'enable_content_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_content_typography', array(
		'label' => esc_html__('Enable Content Typography','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'enable_content_typography',
		'type'    =>  'checkbox'
));

// h1 typography settings
class Honeypress_Content_H1_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_1';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 1 (H1)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h1',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H1_Customize_Control( $wp_customize, 'content_h1', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h1',
    ))
);
$wp_customize->add_setting(
    'h1_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h1_typography_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h1_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h1_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h1_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h1_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// h2 typography settings
class Honeypress_Content_H2_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_2';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 2 (H2)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h2',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H2_Customize_Control( $wp_customize, 'content_h2', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h2',
    ))
);
$wp_customize->add_setting(
    'h2_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h2_typography_fontsize',
    array(
        'default'           =>  30,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h2_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h2_line_height',
    array(
        'default'           =>  45,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h2_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h2_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));



// h3 typography settings
class Honeypress_Content_H3_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_3';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 3 (H3)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h3',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H3_Customize_Control( $wp_customize, 'content_h3', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h3',
    ))
);
$wp_customize->add_setting(
    'h3_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h3_typography_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h3_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h3_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h3_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h3_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h4 typography settings
class Honeypress_Content_H4_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_4';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 4 (H4)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h4',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H4_Customize_Control( $wp_customize, 'content_h4', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h4',
    ))
);
$wp_customize->add_setting(
    'h4_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h4_typography_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h4_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h4_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h4_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h4_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h5 typography settings
class Honeypress_Content_H5_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_5';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 5 (H5)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h5',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H5_Customize_Control( $wp_customize, 'content_h5', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h5',
    ))
);
$wp_customize->add_setting(
    'h5_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h5_typography_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h5_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h5_line_height',
    array(
        'default'           =>  24,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h5_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h5_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h6 typography settings
class Honeypress_Content_H6_Customize_Control extends WP_Customize_Control {
    public $type = 'heading_6';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 6 (H6)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h6',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_H6_Customize_Control( $wp_customize, 'content_h6', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h6',
    ))
);
$wp_customize->add_setting(
    'h6_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));

$wp_customize->add_setting(
    'h6_typography_fontsize',
    array(
        'default'           =>  14,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('h6_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'h6_line_height',
    array(
        'default'           =>  21,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('h6_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h6_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Paragraph typography settings
class Honeypress_Content_p_Customize_Control extends WP_Customize_Control {
    public $type = 'p_tag';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Paragraph','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_p',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_p_Customize_Control( $wp_customize, 'content_p', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_p',
    ))
);
$wp_customize->add_setting(
    'p_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'p_typography_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('p_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'p_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('p_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'p_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Button text typography settings
class Honeypress_Content_button_text_Customize_Control extends WP_Customize_Control {
    public $type = 'button_txt';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Button Text','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_button_text',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Content_button_text_Customize_Control( $wp_customize, 'content_button_text', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_button_text',
    ))
);
$wp_customize->add_setting(
    'button_text_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));

$wp_customize->add_setting(
    'button_text_typography_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('button_text_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,	
    ));
$wp_customize->add_setting(
    'button_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('button_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'button_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Blog Page/Archive/Single Post typography 
$wp_customize->add_section( 'honeypress_post_typography' , array(
		'title'      => esc_html__('Blog / Archive / Single Post', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 7,
   	) );
// Enable/Disable Blog/Archive/Single Post typography
$wp_customize->add_setting(
    'enable_post_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_post_typography', array(
		'label' => esc_html__('Enable Blog / Archive / Single Post Typography','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'enable_post_typography',
		'type'    =>  'checkbox'
));	
class Honeypress_blogtitle_Customize_Control extends WP_Customize_Control {
    public $type = 'honeypress_post_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <h3 class="customizer_heading"><?php esc_html_e('Post Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'honeypress_post_title',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )   
);
$wp_customize->add_control( new Honeypress_blogtitle_Customize_Control( $wp_customize, 'honeypress_post_title', array( 
        'section' => 'honeypress_post_typography',
        'setting' => 'honeypress_post_title',
    ))
);
$wp_customize->add_setting(
    'post-title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'post-title_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('post-title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'post-title_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('post-title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_post_typography',
        'setting' => 'post-title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Shop Page typography 
$wp_customize->add_section( 'honeypress_shop_page_typography' , array(
		'title'      => esc_html__('Shop Page','honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 9,
   	) );
// Enable/Disable Shop Page typography
$wp_customize->add_setting(
    'enable_shop_page_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_shop_page_typography', array(
		'label' => esc_html__('Enable Shop Page Typography','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'enable_shop_page_typography',
		'type'    =>  'checkbox'
));
// h1 typography settings
class Honeypress_Shop_Content_H1_Customize_Control extends WP_Customize_Control {
    public $type = 'shop_h1';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 1 (H1)','honeypress'); ?></h3>
	 <p><?php esc_html_e('Only for product detail page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h1',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Shop_Content_H1_Customize_Control( $wp_customize, 'shop_content_h1', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h1',
    ))
);
$wp_customize->add_setting(
    'shop_h1_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h1_typography_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'shop_h1_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('shop_h1_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h1_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// h2 typography settings
class Honeypress_Shop_Content_H2_Customize_Control extends WP_Customize_Control {
    public $type = 'shop_h2';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 2 (H2)','honeypress'); ?></h3>
	 <p><?php esc_html_e('Only for product title in shop page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h2',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Shop_Content_H2_Customize_Control( $wp_customize, 'shop_content_h2', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h2',
    ))
);
$wp_customize->add_setting(
    'shop_h2_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h2_typography_fontsize',
    array(
        'default'           =>  18,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'shop_h2_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('shop_h2_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h2_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// h3 typography settings
class Honeypress_Shop_Content_H3_Customize_Control extends WP_Customize_Control {
    public $type = 'shop_h3';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 3 (H3)','honeypress'); ?></h3>
	 <p><?php esc_html_e('Only for product checkout page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h3',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Shop_Content_H3_Customize_Control( $wp_customize, 'shop_content_h3', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h3',
    ))
);
$wp_customize->add_setting(
    'shop_h3_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h3_typography_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'shop_h3_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('shop_h3_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h3_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));



// Sidebar typography section
$wp_customize->add_section( 'honeypress_sidebar_typography' , array(
		'title'      => esc_html__('Sidebar Widgets', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 10,
   	) );	
// Enable/Disable Sidebar typography section
$wp_customize->add_setting(
    'enable_sidebar_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_sidebar_typography', array(
		'label' => esc_html__('Enable Sidebar Widgets Typography','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'enable_sidebar_typography',
		'type'    =>  'checkbox'
));	
class Honeypress_Sidebar_Widget_title_Customize_Control extends WP_Customize_Control {
    public $type = 'sidebar_wid_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Sidebar Widget Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'sidebar_widget_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Sidebar_Widget_title_Customize_Control( $wp_customize, 'sidebar_widget_title', array(	
		'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_title',
    ))
);
$wp_customize->add_setting(
    'sidebar_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'sidebar_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('sidebar_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'sidebar_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('sidebar_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
        'setting' => 'sidebar_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class Honeypress_Sidebar_Widget_content_Customize_Control extends WP_Customize_Control {
    public $type = 'side_wid_content';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Sidebar Widget Content','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'sidebar_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Sidebar_Widget_content_Customize_Control( $wp_customize, 'sidebar_widget_content', array(	
		'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content',
    ))
);
$wp_customize->add_setting(
    'sidebar_widget_content_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'sidebar_widget_content_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'sidebar_widget_content_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('sidebar_widget_content_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
        'setting' => 'sidebar_widget_content_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Footer Widgets typography section
$wp_customize->add_section( 'honeypress_widget_typography' , array(
		'title'      => esc_html__('Footer Widgets', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 11,
   	) );	
// Enable/Disable Footer Widgets typography section
$wp_customize->add_setting(
    'enable_footer_widget_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_footer_widget_typography', array(
		'label' => esc_html__('Enable Footer Widget Typography','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'enable_footer_widget_typography',
		'type'    =>  'checkbox'
));



class Honeypress_Footer_Widget_title_Customize_Control extends WP_Customize_Control {
    public $type = 'foot_wid_title';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Footer Widget Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'footer_widget_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Footer_Widget_title_Customize_Control( $wp_customize, 'footer_widget_title', array(	
		'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title',
    ))
);
$wp_customize->add_setting(
    'footer_widget_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'footer_widget_title_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('footer_widget_title_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'footer_widget_title_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('footer_widget_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
        'setting' => 'footer_widget_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class Honeypress_Footer_Widget_content_Customize_Control extends WP_Customize_Control {
    public $type = 'foot_widget_content';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Footer Widget Content','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'footer_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Honeypress_Footer_Widget_content_Customize_Control( $wp_customize, 'footer_widget_content', array(	
		'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content',
    ))
);
$wp_customize->add_setting(
    'footer_widget_content_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_fontfamily', array(
		'label' => esc_html__('Font family','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'footer_widget_content_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'absint',
    )	
);
$wp_customize->add_control('footer_widget_content_fontsize', array(
		'label' => esc_html__('Font size (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'footer_widget_content_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'absint',
    )   
);
$wp_customize->add_control('footer_widget_content_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
        'setting' => 'footer_widget_content_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

}
add_action( 'customize_register', 'honeypress_typography_customizer' );