<?php
/**
 * The main template file
 *
 * @package ClubNature
 */

get_header(); ?>

<section id="content" class="content content-index position-relative py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-12 col-xl-10 offset-xl-1">
				<h1 class="position-relative mb-4 text-uppercase fw-bold">The latest news</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-xl-10 offset-xl-1">
				<?php get_template_part( 'loop' ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
