<?php
/**
 * The template for displaying all pages
 *
 * @package ClubNature
 */

get_header(); ?>

<section id="content" class="content content-page py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<div class="page-message">
					<?php the_content(); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-link">' . __( 'Pages:', 'clubnature' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<div class="page-edit clearfix">
					<?php edit_post_link( __( 'Edit', 'clubnature' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
