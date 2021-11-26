<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Honeypress
 */
get_header();?>
<section class="error-page">
	<div class="container">			
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="text-center">
					<h2 class="title"><?php esc_html_e('4','honeypress');?><i class="fa fa-frown-o"></i><?php esc_html_e('4','honeypress');?></h2>
					<h3 class="sub-title"><?php esc_html_e("Oops! Page not found!","honeypress");?></h3>
					<p><?php esc_html_e("The page you are looking for can't be found","honeypress");?></p>
					<div class="mx-auto pt-4">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-small btn-border"><i class="fa fa-arrow-left pr-2"></i><?php esc_html_e('Go Back','honeypress');?></a>
					</div>
				</div>
			</div>
		</div>			
	</div>
</section>
<?php get_footer();?>