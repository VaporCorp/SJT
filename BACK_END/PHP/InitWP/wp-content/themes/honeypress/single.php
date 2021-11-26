<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Honeypress
 */
get_header();?>
<section class="section-module blog">
	<div class="container">
		<div class="row">
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ):			
				echo '<div class="col-lg-8 col-md-7 col-sm-12 standard-view blog-single">';
			else: 
				echo '<div class="col-lg-12 col-md-12 col-sm-12 standard-view blog-single">';
			endif;		
				while(have_posts()): the_post();
					get_template_part('template-parts/content','single');	
				endwhile;
				if(get_theme_mod('honeypress_enable_single_post_admin_details',true)===true):
					get_template_part('template-parts/auth-details');
				endif;	

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) : comments_template(); endif;?>
			</div>	
			<?php get_sidebar();?>
		</div>
	</div>
</section>
<?php get_footer();?>