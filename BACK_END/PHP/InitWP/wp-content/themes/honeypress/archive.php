<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Honeypress
 */
get_header();?>
<section class="section-module blog">
	<div class="container">
		<div class="row">
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ):
				echo '<div class="col-lg-8 col-md-7 col-sm-12 standard-view">';
			else:
				echo '<div class="col-lg-12 col-md-12 col-sm-12 standard-view">';
			endif;			
				 if(have_posts()): while(have_posts()): the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;		
				do_action('honeypress_post_navigation');?>		
			</div>	
			<?php get_sidebar();?>
		</div>
	</div>
</section>
<?php get_footer();?>