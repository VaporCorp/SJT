<?php
/**
 * The template for displaying categories
 *
 * @package ClubNature
 */

get_header(); ?>

<section class="content content-category py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php get_template_part( 'loop' ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
