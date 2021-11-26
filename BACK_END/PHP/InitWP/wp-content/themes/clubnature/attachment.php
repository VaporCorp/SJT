<?php
/**
 * The template for displaying attachments
 *
 * @package ClubNature
 */

get_header(); ?>

<section class="content content-attachment py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php $clubnature_image_size = apply_filters( 'wporg_attachment_size', 'large' ); ?>
				<div class="entry-attachment mb-4">
				<?php
				echo wp_get_attachment_image(
					get_the_ID(),
					$clubnature_image_size,
					'',
					[
						'class' => 'img-fluid rounded shadow',
					]
				);
				?>
				</div>
			<?php if ( has_excerpt() ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
