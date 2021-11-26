<?php
// define function for custom color setting
function honeypress_custom_light() {

    $link_color = esc_attr(get_theme_mod('link_color'));
    list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;

    if ( $link_color != '#ff0000' ) :
    ?>
<style type="text/css">
blockquote {
    border-left: 4px solid <?php echo $link_color; ?> !important;
}
button,
input[type="button"],
input[type="submit"] {
    background-color: <?php echo $link_color; ?> !important;

}
input[type="submit"]:hover,
input[type="submit"]:focus {
    background: #061018 !important;
}

.btn-default { background: <?php echo $link_color; ?> !important; }
.btn-default:hover,.btn-default:focus { background: #ffffff !important;}
.btn-light:hover, .btn-light:focus { background: <?php echo $link_color; ?> !important; }
.btn-default-dark { background: <?php echo $link_color; ?> ;  }
.btn-border {  border: 2px solid <?php echo $link_color; ?> !important; }
.btn-border:hover, .btn-border:focus { background: <?php echo $link_color; ?> !important;  border: 2px solid <?php echo $link_color; ?> ; }

body .header-sidebar {
    background: <?php echo $link_color; ?> ;
}
body .head-contact-info li a:hover, body .head-contact-info li a:focus { color: #ffffff !important }

.cart-header > a .cart-total {
    background: <?php echo $link_color; ?> !important;
}

.section-separator {
    background: <?php echo $link_color; ?> !important;
}
.section-separator::before {
    background: <?php echo $link_color; ?> !important;
}

.section-separator::after {
    background: <?php echo $link_color; ?> !important;
}
.testimonial .section-separator {
    background: #ffffff !important;
}
.testimonial .section-separator::before {
    background: #ffffff !important;
}

.testimonial .section-separator::after {
    background: #ffffff !important;
}
/*===================================================================================*/
/*  Mixed Classes
/*===================================================================================*/



.text-default { color: <?php echo $link_color; ?> !important; }
.entry-header .entry-title a:hover,
.entry-header .entry-title a:focus {
    color: <?php echo $link_color; ?> !important;
}

.services .post-thumbnail a { position: relative; z-index: 1; color: <?php echo $link_color; ?> !important; }
.services .post-thumbnail i.fa {
    background: <?php echo $link_color; ?> !important;
    box-shadow: <?php echo $link_color; ?> 0px 0px 0px 1px !important;
}

.services .post:hover .post-thumbnail i.fa {
    color: <?php echo $link_color; ?> !important;
    background: #F5F6FA !important;
}

.funfact-icon { color: <?php echo $link_color; ?> ; }

.filter-tabs .nav-link:hover {
    color: <?php echo $link_color; ?> ;
}
.testmonial-block .avatar img {  box-shadow: <?php echo $link_color; ?> 0px 0px 0px 1px !important;  }

.testmonial-block .entry-content.quote:before {
    color: <?php echo $link_color; ?> ;
}

.blog .standard-view .entry-meta .author a,
.blog .list-view .entry-meta .author a {
    color: <?php echo $link_color; ?> !important;
}

.blog .standard-view .more-link,
.blog .list-view .more-link {
    border: 2px solid <?php echo $link_color; ?> !important ;
}

.blog .standard-view .more-link:hover,
.blog .standard-view .more-link:focus,
.blog .list-view .more-link:hover,
.blog .list-view .more-link:focus {
    background-color: <?php echo $link_color; ?> !important;
    border: 2px solid <?php echo $link_color; ?> !important;
    color: #ffffff !important;
}

.entry-meta a:hover, .entry-meta a:focus { color: <?php echo $link_color; ?> !important; }
body .entry-meta .cat-links a, body .entry-meta .tag-links a { color: <?php echo $link_color; ?>; }
.entry-meta .comment-links a::before { content: "\f0e5"; color: <?php echo $link_color; ?> !important; }
.entry-meta .tag-links a:hover, .entry-meta .tag-links a:focus {
    background-color: <?php echo $link_color; ?> !important;
    border: 1px solid <?php echo $link_color; ?> !important;
}

/*More Link*/
.more-link {
    border-bottom: 2px solid <?php echo $link_color; ?> !important;
}
.more-link:hover, .more-link:focus {
    color: <?php echo $link_color; ?> !important;
}


.pagination a:hover, .pagination a.active { background-color: <?php echo $link_color; ?> !important; border: 1px solid <?php echo $link_color; ?> !important ; }
.pagination .nav-links .page-numbers.current {background-color: <?php echo $link_color; ?> !important; border: 1px solid <?php echo $link_color; ?> !important; }

.reply a {
    color: <?php echo $link_color; ?> !important;
}

.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{
    background: <?php echo $link_color; ?>;
    border: 2px solid <?php echo $link_color; ?> !important;
    background-color: <?php echo $link_color; ?> !important;
}
.woocommerce .onsale{
    background: <?php echo $link_color; ?> !important;
}

.woocommerce ul.products li.product .button, .owl-item .item .cart .add_to_cart_button {
    background: <?php echo $link_color; ?> !important;
}

.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
    background-color: <?php echo $link_color; ?> !important;
}

.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, .woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, .woocommerce input.button:hover, .woocommerce input.button:focus, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
    background: <?php echo $link_color; ?> !important;
}
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
    background-color: <?php echo $link_color; ?> !important;
}
.woocommerce-message, .woocommerce-info {
    border-top-color: <?php echo $link_color; ?> !important;
}
.woocommerce-message::before, .woocommerce-info::before {
    color: <?php echo $link_color; ?> !important;
}
.woocommerce div.product .stock {
    color: <?php echo $link_color; ?> !important;
}
.woocommerce p.stars a {
    color: <?php echo $link_color; ?> !important;
}
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
    background-color: <?php echo $link_color; ?> !important;
}

.added_to_cart.wc-forward
{
background: <?php echo $link_color; ?> !important;
}
.product-price > .woocommerce-loop-product__title a:hover,
.product-price > .woocommerce-loop-product__title a:focus {
    color: <?php echo $link_color; ?> !important;
}

.navbar .nav .nav-item:hover .nav-link, .navbar .nav .nav-item.active .nav-link, .navbar .nav .nav-item.html:hover a, .navbar .nav .nav-item.html.active a ,  .navbar .nav .nav-item.radix-html:hover a{
    color: <?php echo $link_color; ?> !important;
}
body .navbar .nav .nav-item .search-icon:hover {color:<?php echo $link_color; ?> !important;}
.navbar .nav .dropdown-menu {
    border-bottom: 3px solid <?php echo $link_color; ?> !important;
    }
 .navbar .nav .dropdown-menu.search-panel{border-bottom: unset !important;}
 .hw .honeypress_header_btn:hover, .hw .honeypress_header_btn:focus {background-color: <?php echo $link_color; ?> !important;}
.widget .widget-title:after, .wp-block-search .wp-block-search__label:after, .widget h1:after, .widget h2:after, .widget h3:after, .widget h4:after, .widget h5:after, .widget h6:after {
    background: <?php echo $link_color; ?> !important;
}
.widget_archive li:before, .widget_categories li:before, .widget_links li:before, .widget_meta li:before, .widget_nav_menu li:before, .widget_pages li:before, .widget_recent_comments li:before, .widget_recent_entries li:before, .widget li::before {
    color: <?php echo $link_color; ?> !important;
}
.widget button[type="submit"] {
    background-color: <?php echo $link_color; ?> !important;
    border-color: <?php echo $link_color; ?> !important;
}
.widget .tagcloud a:hover, .widget .tagcloud a:focus {
    background-color: <?php echo $link_color; ?> !important;
    border: 1px solid <?php echo $link_color; ?> !important;
}

/*Address*/
address i {
    color: <?php echo $link_color; ?> !important;
}

.footer-social-links {
    background: <?php echo $link_color; ?> !important;
}

.footer-sidebar .widget a:focus {
    color: <?php echo $link_color; ?> !important;
}

.site-info a:hover, .site-info a:focus { color: <?php echo $link_color; ?> !important; }

.page-breadcrumb > li:first-child:before { color: <?php echo $link_color; ?> !important ; }

.trail-item.trail-end span {
    color: <?php echo $link_color; ?> !important;
}

.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color; ?> !important ; }

.company-info li:before { color: <?php echo $link_color; ?> !important; }


.contact-icon i.fa { color: <?php echo $link_color; ?> !important;  }
.contact-widget:hover .contact-icon i.fa { color: <?php echo $link_color; ?> !important ;  }

.contact-widget address a:hover { color: <?php echo $link_color; ?> !important; }

.error-page .title i { color: <?php echo $link_color; ?> !important; }


.business .entry-header .entry-title a:hover, .entry-header .entry-title a:focus, .footer-sidebar .widget a:hover, .footer-sidebar .widget a:focus, .filter-tabs .nav-item.show .nav-link, .filter-tabs .nav-link.active, .filter-tabs .nav-link:hover,  .widget a:hover, .widget a:focus , .standard-view.blog-single a:hover{
    color: <?php echo $link_color;?> !important;
}
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
    background-color: <?php echo $link_color;?> !important ;
}
.dropdown-item:focus, .dropdown-item:hover {
    color: <?php echo $link_color;?> !important ;
}

.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color;?> !important; }

.page-breadcrumb > li:first-child:before { color: <?php echo $link_color; ?> !important; font-family: fontAwesome; content: "\f015"; padding: 0 0.625rem 0 0; }
.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color; ?> !important; }
.page-breadcrumb.text-center span a:hover {
    color: <?php echo $link_color; ?> !important;

}
body .page-breadcrumb.text-center span.breadcrumb_last
{
    color: <?php echo $link_color; ?> !important;
}
.woocommerce-loop-product__title:hover
{
    color: <?php echo $link_color; ?> !important;
}
.widget_layered_nav li a:before,.widget_product_categories li:before{
    color: <?php echo $link_color;?> !important;
   }
.woocommerce .star-rating span::before {
    color: <?php echo $link_color;?> !important;
}
.woocommerce .star-rating::before {
    color: <?php echo $link_color;?> !important;
  }
 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
    background-color: <?php echo $link_color;?> !important;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
    background-color: <?php echo $link_color;?> !important;
}

.woocommerce ul.products li.product .onsale, .products span.onsale
{
   background: <?php echo $link_color;?> !important;
    border: 2px solid <?php echo $link_color;?> !important;
}
.woocommerce ul.product_list_widget li a:hover, .woocommerce ul.product_list_widget li a:focus, .woocommerce .posted_in a:hover, .woocommerce .posted_in a:focus {
   color: <?php echo $link_color;?> !important;
}
body .woocommerce #respond input#submit, body .woocommerce a.button, body .woocommerce button.button, body .woocommerce input.button
{
background-color: <?php echo $link_color;?> !important;
}
body .woocommerce #respond input#submit:hover, body .woocommerce a.button:hover, body .woocommerce button.button:hover, body .woocommerce input.button:hover
{
background-color: <?php echo $link_color;?> !important;
}
.navbar-nav .show .dropdown-menu > .active > a, .navbar-nav .show .dropdown-menu > .active > a:hover, .navbar-nav .show .dropdown-menu > .active > a:focus {
    background-color: transparent;
    color: <?php echo $link_color;?>;
}
.search-form input[type="submit"]
{
    background: <?php echo $link_color;?> none repeat scroll 0 0;
}
.entry-content a:hover, .entry-content a:focus {
    color: <?php echo $link_color;?> !important;
}
body .scroll-up a {
    background: <?php echo $link_color;?>;
}
body .scroll-up a:hover, body .scroll-up a:active {
    background: <?php echo $link_color;?>;
}
body .honeypress_header_btn {
    background-color: <?php echo $link_color;?>;
    }
body .tromas.honeypress_header_btn:hover{background-color: <?php echo $link_color;?>;}
body .hp-preloader-cube .hp-cube:before { background: <?php echo $link_color;?>;}

body .custom-social-icons li a.facebook-f:hover, .custom-social-icons li a.facebook:hover { color: #3b5998 !important; }
.custom-social-icons li a.twitter:hover { color: #15b4c9 !important; }
.custom-social-icons li a.linkedin:hover { color: #006599 !important; }
.custom-social-icons li a.instagram:hover { color: #8a3ab9 !important; }
.custom-social-icons li a.youtube:hover { color: #cc2423 !important; }
.custom-social-icons li a.skype:hover { color: #40beee !important; }
.custom-social-icons li a.vimeo:hover { color: #aad450 !important; }
.custom-social-icons li a.dribbble:hover { color: #c7366f !important; }

.widget .wp-block-tag-cloud a:hover, .widget .wp-block-tag-cloud a:focus {
    background-color: <?php echo $link_color; ?> !important;
    border: 1px solid <?php echo $link_color; ?> !important;
    color: #fff !important;
}

</style>

<?php
endif; } ?>
