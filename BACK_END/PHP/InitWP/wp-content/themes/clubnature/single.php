<?php
/**
 * The template for displaying all single posts
 *
 * @package ClubNature
 */

get_header(); ?>

<section id="content" class="content content-single py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-item">
						<div class="post-info">
							<div class="post-message">
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
							<div class="post-edit clearfix">
								<?php edit_post_link( __( 'Edit', 'clubnature' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<div class="post-tags mt-3">
								<?php the_tags( '<p class="tags">', ' ', '</p>' ); ?>
							</div>
						</div>
						<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
							<?php comments_template( '', true ); ?>
						<?php endif; ?>
						<div class="post-navigation mt-5">
							<div class="row">
								<div class="col-12 col-sm-6">
									<?php previous_post_link( '<i class="fas fa-angle-left"></i> %link' ); ?>
								</div>
								<div class="col-12 col-sm-6 text-end">
									<?php next_post_link( '%link <i class="fas fa-angle-right"></i>' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
