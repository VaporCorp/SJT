<?php
function honeypress_type_color_setting() {
// Typography
$honeypress_enable_header_typography = get_theme_mod('enable_header_typography',false);
$honeypress_enable_section_title_typography = get_theme_mod('enable_section_title_typography',false);
$honeypress_enable_slider_title_typography = get_theme_mod('enable_slider_title_typography',false);
$honeypress_enable_content_typography = get_theme_mod('enable_content_typography',false);
$honeypress_enable_post_typography = get_theme_mod('enable_post_typography',false);
$honeypress_enable_shop_page_typography = get_theme_mod('enable_shop_page_typography',false);
$honeypress_enable_sidebar_typography = get_theme_mod('enable_sidebar_typography',false);
$honeypress_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);

/* Site title and tagline */
if($honeypress_enable_header_typography == true)
{
?>
<style>
body .site-title, body .header-logo.index6 .site-title , body .navbar.navbar7 .site-title{
	font-size:<?php echo intval(get_theme_mod('site_title_fontsize','36')).'px'; ?> ;
	font-family:<?php echo esc_attr(get_theme_mod('site_title_fontfamily','Open Sans')); ?> ;
    line-height:<?php echo intval(get_theme_mod('site_title_line_height','46')).'px'; ?> ;
}
body .site-description {
	font-size:<?php echo intval(get_theme_mod('site_tagline_fontsize','20')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('site_tagline_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('site_tagline_line_height','37')).'px'; ?>;
}
body .navbar .nav > li > a {
	font-size:<?php echo intval(get_theme_mod('menu_title_fontsize','16')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('menu_title_fontfamily','Open Sans')); ?> ;
    line-height:<?php echo intval(get_theme_mod('menu_line_height','30')).'px'; ?>;
}
body .dropdown-menu .dropdown-item{
	font-size:<?php echo intval(get_theme_mod('submenu_title_fontsize','16')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('submenu_title_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('submenu_line_height','30')).'px'; ?>;
}
</style>
<?php }

/* Slider Title Typography*/
if($honeypress_enable_slider_title_typography == true)
{
?>
<style>
body .slider-caption h1.title  {
	font-size:<?php echo intval(get_theme_mod('slider_title_fontsize','65')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('slider_title_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('slider_line_height','85')).'px'; ?>;
}
</style>
<?php }


/* Home Page Section Title */
if($honeypress_enable_section_title_typography == true)
{
?>
<style>
 body .section-header p {
	font-size:<?php echo intval(get_theme_mod('section_description_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('section_description_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('section_description_line_height','30')).'px'; ?>;
}

body .section-header h2, body .contact .section-header h2 {
    font-size:<?php echo intval(get_theme_mod('section_title_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('section_title_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('section_title_line_height','54')).'px'; ?>;
}
</style>
<?php }


/* Content */
if($honeypress_enable_content_typography == true)
{
?>
<style>
/* Heading H1 */
body .about h1, body .entry-content h1, body .service h1, body .contact h1, body .error-page h1, body .navbar .nav > li > h1  {
	font-size:<?php echo intval(get_theme_mod('h1_typography_fontsize','36')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h1_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h1_line_height','54')).'px'; ?> !important;
}

/* Heading H2 */
body .entry-content h2, body .cta-block h2, body .error-page h2, body .about h2, body .service h2, body .contact h2, body .navbar .nav > li > h2{
	font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize','30')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h2_line_height','45')).'px'; ?> !important;
}

/* Heading H3 */
body .entry-content h3, body .related-posts h3, body .entry-header h3, body .about h3, body .service h3, body .contact h3, body .contact-form-map .title h3, body .error-page .sub-title, body .navbar .nav > li > h3 {
	font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize','24')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?> !important;
}
body .comment-title h3, body .comment-reply-title{
	font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize','24')) + 4 .'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?> !important;
}

/* Heading H4 */
body .entry-content h4, body .entry-header h4, body .team-grid h4, body .entry-header h4 a, body .contact-widget h4, body .about h4, body .testimonial .testmonial-block .name, body .service h4, body .contact h4, body .blog-author .name, body .navbar .nav > li > h4 {
	font-size:<?php echo intval(get_theme_mod('h4_typography_fontsize','20')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h4_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h4_line_height','30')).'px'; ?> !important;
}

/* Heading H5 */
body .product-price h5, body .blog-author h5, body .comment-detail h5, body .entry-content h5, body .about h5, body .service h5, body .contact h5, body .navbar .nav > li > h5 {
	font-size:<?php echo intval(get_theme_mod('h5_typography_fontsize','18')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h5_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h5_line_height','24')).'px'; ?> !important;
}

/* Heading H6 */
body .entry-content h6, body .about h6, body .service h6, body .contact h6 , body .navbar .nav > li > h6{
	font-size:<?php echo intval(get_theme_mod('h6_typography_fontsize','14')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('h6_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('h6_line_height','21')).'px'; ?> !important;
}

/* Paragraph */
body .entry-content p, body .cta-block p, body .about-content p, body .funfact p, body .woocommerce-product-details__short-description p, body .wpcf7 .wpcf7-form p label, body .testimonial .testmonial-block .designation, body .about p, body .entry-content li, body .contact address, body .contact p, body .service p, body .contact p, body .error-page p, body .logged-in-as, body .comment-form-comment label, body .comment-form-comment #comment, body .comment-detail p, body .navbar .nav > li > p{
	font-size:<?php echo intval(get_theme_mod('p_typography_fontsize','16')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
}
body .slider-caption p, body .slider-caption .description{
	font-size:<?php echo intval(get_theme_mod('p_typography_fontsize','16')) + 2 .'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
}
body .portfolio .tab a, body .portfolio .nav-item a{
	font-size:<?php echo intval(get_theme_mod('p_typography_fontsize','16')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
}

/* Button Text */
body .btn-combo a, body .mx-auto a, body .pt-3 a, body .wpcf7-form .wpcf7-submit,  body .woocommerce .button, body .form-submit #submit, body .wp-block-button__link, body .honeypress_header_btn, body .navbar .nav > li > a.honeypress_header_btn{
	font-size:<?php echo intval(get_theme_mod('button_text_typography_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('button_text_typography_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('button_line_height','30')).'px'; ?> !important;
}
</style>
<?php }

/* Blog / Archive / Single Post */
if($honeypress_enable_post_typography == true)
{
?>
<style>
.entry-header h2{
	font-size:<?php echo intval(get_theme_mod('post-title_fontsize','36')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('post-title_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('post-title_line_height','54')).'px'; ?>;
}
</style>
<?php }

/* Shop Page */
if($honeypress_enable_shop_page_typography == true)
{
?>
<style>
/* Shop Page H1 */
 body .woocommerce div.product .product_title{
	font-size:<?php echo intval(get_theme_mod('shop_h1_typography_fontsize','36')).'px'; ?>;
	font-family:<?php echo esc_attr(get_theme_mod('shop_h1_typography_fontfamily','Open Sans')); ?>;
    line-height:<?php echo intval(get_theme_mod('shop_h1_line_height','54')).'px'; ?>;
}

/* Shop Page H2 */
.woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2, body #wrapper .cross-sells h2.woocommerce-loop-product__title,body .woocommerce-Tabs-panel h2{
	font-size:<?php echo intval(get_theme_mod('shop_h2_typography_fontsize','18')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('shop_h2_typography_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('shop_h2_line_height','30')).'px'; ?> !important;
}

/* Shop Page H3 */
 .woocommerce .checkout h3 {
	font-size:<?php echo intval(get_theme_mod('shop_h3_typography_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('shop_h3_typography_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('shop_h3_line_height','36')).'px'; ?> !important;
}
</style>
<?php }


/* Sidebar widgets */
if($honeypress_enable_sidebar_typography == true)
{
?>
<style>
.sidebar .widget-title, .sidebar .wp-block-search .wp-block-search__label, .sidebar .widget h1, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6 {
	font-size:<?php echo intval(get_theme_mod('sidebar_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('sidebar_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('sidebar_line_height','36')).'px'; ?> !important;
}
/* Sidebar Widget Content */
.sidebar .widget_recent_entries a, .sidebar a, .sidebar p, .sidebar .address {
	font-size:<?php echo intval(get_theme_mod('sidebar_widget_content_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('sidebar_widget_content_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('sidebar_widget_content_line_height','30')).'px'; ?> !important;
}
.sidebar .btn.btn-success, .sidebar .form-control{font-family:<?php echo esc_attr(get_theme_mod('sidebar_widget_content_fontfamily','Open Sans')); ?> !important;}
</style>
<?php }


/* Footer Widget */
if($honeypress_enable_footer_widget_typography == true)
{
?>
<style>
/* Footer Widget Title */
.site-footer .widget-title, .site-footer .wp-block-search .wp-block-search__label, .site-footer .widget h1, .site-footer .widget h2, .site-footer .widget h3, .site-footer .widget h4, .site-footer .widget h5, .site-footer .widget h6  {
	font-size:<?php echo intval(get_theme_mod('footer_widget_title_fontsize','24')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('footer_widget_title_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('footer_widget_title_line_height','36')).'px'; ?> !important;
}
/* Footer Widget Content */
.footer-sidebar .widget_recent_entries a, .footer-sidebar a, .footer-sidebar p, .footer-sidebar address {
	font-size:<?php echo intval(get_theme_mod('footer_widget_content_fontsize','16')).'px'; ?> !important;
	font-family:<?php echo esc_attr(get_theme_mod('footer_widget_content_fontfamily','Open Sans')); ?> !important;
    line-height:<?php echo intval(get_theme_mod('footer_widget_content_line_height','30')).'px'; ?> !important;
}
</style>
<?php }

    if(get_theme_mod('apply_hdr_clr_enable',false)==true) :?>
	<style>
	body .site-title a, body .header-logo.index6 .site-title, body .navbar.navbar7 .site-title-name, body .header-logo.index6 .site-title-name, .dark .site-title a {
		color: <?php echo esc_attr(get_theme_mod('site_title_link_color','#061018')); ?>;
	}
	body .site-title a:hover, body .header-logo.index6 .site-title, body .navbar.navbar7 .site-title-name:hover, body .navbar.navbar7 .site-title-name:focus, body .header-logo.index6 .site-title-name:hover, body .header-logo.index6 .site-title-name:focus, .dark .site-title a:hover {
		color: <?php echo esc_attr(get_theme_mod('site_title_link_hover_color','#061018')); ?>;
	}
	body .site-description, body .navbar.navbar7 .site-description, body .header-logo.index6 .site-description, .dark .site-description {
		color: <?php echo esc_attr(get_theme_mod('site_tagline_text_color','#333333')); ?>;
	}
    </style>
    <?php endif;
		/* Primary Menu */
	if(get_theme_mod('apply_menu_clr_enable',false)==true) :?>
     <style>
	.navbar.custom .nav .nav-item .nav-link, .navbar .nav .nav-item .nav-link {
    	color: <?php echo esc_attr(get_theme_mod('menus_link_color','#061018')); ?> !important;
    }
    .navbar.custom .nav .nav-item:hover .nav-link, .navbar.custom .nav .nav-item.active .nav-link:hover, .navbar .nav .nav-item:hover .nav-link , body .navbar .nav .nav-item.html:hover a{
    	color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color','#2d6ef8')); ?> !important;
    }
    .navbar.custom .nav .nav-item.active .nav-link, .navbar .nav .nav-item.active .nav-link {
    	color: <?php echo esc_attr(get_theme_mod('menus_link_active_color','#2d6ef8')); ?> !important;
    	display: block;
    }
    /* Submenus */
    .nav.navbar-nav .dropdown-item, .nav.navbar-nav .dropdown-menu {
    	background-color: <?php echo esc_attr(get_theme_mod('submenus_background_color','#ffffff')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item {
    	color: <?php echo esc_attr(get_theme_mod('submenus_link_color','#212529')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item:hover {
    	color: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color','#2d6ef8')); ?> !important;
    }
    .nav.navbar-nav .dropdown-item:focus, .nav.navbar-nav .dropdown-item:hover
    {
    	    background-color: transparent !important;
    }
    @media (min-width: 992px){
body .navbar .nav .dropdown-menu {
    border-bottom: unset !important;
}}
</style>
<?php endif;

    /* Banner */
    ?>
    <style>
    .page-title h1{
    	color: <?php echo esc_attr(get_theme_mod('banner_text_color','#fff')); ?> !important;
    }
    </style>
    <?php
    $enable_brd_link_clr_setting=get_theme_mod('enable_brd_link_clr_setting',false);
    if($enable_brd_link_clr_setting==true): ?>
        <style>
    .page-breadcrumb.text-center span a {
    	color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_color','#ffffff'));?> !important;
    }
    .page-breadcrumb.text-center span a:hover {
    	color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_hover_color','#2d6ef8')); ?> !important;
    }
</style>
<?php endif;?>

<style>
  body h1 {
    	color: <?php echo esc_attr(get_theme_mod('h1_color','#061018')); ?> ;
    }
		body.dark h1 {
				color: <?php echo esc_attr(get_theme_mod('h1_color','#ffffff')); ?> ;
			}
    body .section-header h2, body .funfact h2, body h2{
    	color: <?php echo esc_attr(get_theme_mod('h2_color','#061018')); ?>;
    }
		body.dark .section-header h2, body.dark h2, body.dark h2.text-white {
    	color: <?php echo esc_attr(get_theme_mod('h2_color','#ffffff')); ?>;
    }
    body h3 {
    	color: <?php echo esc_attr(get_theme_mod('h3_color','#061018')); ?>;
    }
		body.dark h3, body.dark h3 a {
    	color: <?php echo esc_attr(get_theme_mod('h3_color','#ffffff')); ?>;
    }
    body .entry-header h4 > a, body h4 {
    	color: <?php echo esc_attr(get_theme_mod('h4_color','#061018')); ?>;
    }
	  .dark .entry-header h4 > a, .dark h4, .dark .services .entry-header .entry-title a {
    	color: <?php echo esc_attr(get_theme_mod('h4_color','#ffffff')); ?>;
    }
    body .product-price h5 > a, body .blog-author h5, body .comment-detail h5, body h5, body .blog .blog-author.media h5{
    	color: <?php echo esc_attr(get_theme_mod('h5_color','#061018')); ?>;
    }
		body.dark .product-price h5 > a, body.dark .blog-author h5, body.dark .comment-detail h5, body.dark h5, body.dark .blog .blog-author.media h5{
    	color: <?php echo esc_attr(get_theme_mod('h5_color','#ffffff')); ?>;
    }
    body h6 {
    	color: <?php echo esc_attr(get_theme_mod('h6_color','#061018')); ?>;
    }
		body.dark h6 {
    	color: <?php echo esc_attr(get_theme_mod('h6_color','#ffffff')); ?>;
    }
    p,body .services5 .post .entry-content p, p.comment-form-comment label, .navbar7 .menu-html p{
    	color: <?php echo esc_attr(get_theme_mod('p_color','#061018')); ?>;
    }
		.dark p:not(.testmonial-block5 p, .section-header .section-subtitle, .textwidget p, p.description, p.site-description), body.dark .services5 .post .entry-content p, .dark p.comment-form-comment label {
    	color: <?php echo esc_attr(get_theme_mod('p_color','#c8c8c8')); ?>;
    }
    .site-footer .site-info p{color: #bec3c7;}


    /* Sidebar */
    body .sidebar .widget-title, body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget h1, body .sidebar .widget h2, body .sidebar .widget h3, body .sidebar .widget h4, body .sidebar .widget h5, body .sidebar .widget h6 {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_title_color','#061018')); ?>;
    }
		body.dark .sidebar .widget-title, body.dark .sidebar .wp-block-search .wp-block-search__label, body.dark .sidebar .widget h1, body.dark .sidebar .widget h2, body.dark .sidebar .widget h3, body.dark .sidebar .widget h4, body.dark .sidebar .widget h5, body.dark .sidebar .widget h6 {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_title_color','#ffffff')); ?>;
    }
    body .sidebar p, body .sidebar .woocommerce-Price-amount.amount,.sidebar .quantity, body .sidebar #wp-calendar, body .sidebar #wp-calendar caption, body .sidebar .wp-block-latest-posts__post-excerpt, body .sidebar .wp-block-latest-posts__post-author, body .sidebar .wp-block-latest-posts__post-date, body .sidebar .wp-block-latest-comments__comment-date  {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_text_color','#061018')); ?>;
    }
		body.dark .sidebar p, body.dark .sidebar .woocommerce-Price-amount.amount,.sidebar .quantity, body.dark .sidebar #wp-calendar, body.dark .sidebar #wp-calendar caption, body.dark .sidebar .wp-block-latest-posts__post-excerpt, body.dark .sidebar .wp-block-latest-posts__post-author, body.dark .sidebar .wp-block-latest-posts__post-date, body.dark .sidebar .wp-block-latest-comments__comment-date {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_text_color','#c8c8c8 ')); ?> !important;
    }
    body .sidebar a, body #wrapper .sidebar .woocommerce a {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color','#061018')); ?>;
    }
		body.dark .sidebar a, body.dark #wrapper .sidebar .woocommerce a {
			color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color','#ffffff')); ?>;
		}
</style>
    <?php
    if(get_theme_mod('apply_sibar_link_hover_clr_enable',false)==true):?>
        <style>
    body  .sidebar a:hover, body .sidebar .widget a:hover, body.dark .sidebar a:hover, body.dark .sidebar .widget a:hover {
    	color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_hover_color','#2d6ef8')); ?> !important;
    }
</style>
	<?php endif;?>


    <?php
    /* Footer Widgets */
    if(get_theme_mod('apply_ftrsibar_link_hover_clr_enable',false)==true){?>
        <style>
    body .site-footer {
    	background-color: <?php echo esc_attr(get_theme_mod('footer_widget_background_color','#061018')); ?>;
    }
     body .site-footer .widget-title, body .site-footer .wp-block-search .wp-block-search__label, body .site-footer .widget h1, body .site-footer .widget h2, body .site-footer .widget h3, body .site-footer .widget h4, body .site-footer .widget h5, body .site-footer .widget h6 {
    	color: <?php echo esc_attr(get_theme_mod('footer_widget_title_color','#ffffff')); ?>;
    }
    body .footer-sidebar p,  body .footer-sidebar .widget, body .footer-sidebar .wp-block-latest-posts__post-author, body .footer-sidebar .wp-block-latest-posts__post-date  {
    	color: <?php echo esc_attr(get_theme_mod('footer_widget_text_color','#ffffff')); ?>;
    }
    body.dark .footer-sidebar p, body.dark .footer-sidebar .wp-block-latest-comments__comment-date{
    	color: <?php echo esc_attr(get_theme_mod('footer_widget_text_color','#ffffff')); ?> !important;
    }
    body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date , body #wrapper .footer-sidebar .product_list_widget li a {
    	color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color','#ffffff')); ?>;
    }
    body .footer-sidebar .widget a:hover, body #wrapper .footer-sidebar .product_list_widget li a:hover, body .site-footer .widget .tag-cloud-link:hover{
    	color: <?php echo esc_attr(get_theme_mod('footer_widget_link_hover_color','#2d6ef8')); ?> !important;
    }
    </style>
	<?php } else { ?>
        <style>
		.site-footer p {
			color: #ffffff;
		}
        </style>
<?php	} ?>
<style type="text/css">
    .custom-logo{width: <?php echo intval(get_theme_mod('honeypress_logo_length',''));?>px; height: auto;}
    .honeypress_header_btn{ -webkit-border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;}
   #wrapper .container{max-width: <?php echo intval(get_theme_mod('container_width','1140'));?>px;}
   #wrapper .site-footer .container{max-width: 1140px;}
</style>
<?php
}
add_action('wp_head', 'honeypress_type_color_setting');
