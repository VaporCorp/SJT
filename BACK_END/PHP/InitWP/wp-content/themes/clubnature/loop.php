<?php
/**
 * The template for displaying all the posts
 *
 * @package ClubNature
 */

?>

<div class="posts position-relative">
	<div class="row g-0">
<?php $clubnature_i = 1; ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php if ( 1 === $clubnature_i || 4 === $clubnature_i ) : ?>
			<div class="col-12 mb-4 mb-md-2">
		<?php else : ?>
			<div class="col-12 col-md-6 mb-4 mb-md-0">
		<?php endif; ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'h-100' ); ?>>
					<div class="post-item post-item-<?php echo esc_attr( $clubnature_i ); ?> h-100 position-relative">
						<div class="row g-0 h-100">
						<?php if ( 1 === $clubnature_i ) : ?>
							<div class="col-12 col-md-5 offset-md-1 order-2 order-md-1 pe-md-5 text-md-end d-flex align-items-center">
						<?php elseif ( 2 === $clubnature_i ) : ?>
							<div class="col-12 order-2 px-md-5">
						<?php elseif ( 3 === $clubnature_i ) : ?>
							<div class="col-12 col-md-7 order-2 ps-md-5 d-flex align-items-center">
						<?php elseif ( 4 === $clubnature_i ) : ?>
							<div class="col-12 col-md-5 order-2 ps-md-5 d-flex align-items-center">
						<?php elseif ( 5 === $clubnature_i ) : ?>
							<div class="col-12 order-2 order-md-1 col-md-7 pe-md-5 text-md-end d-flex align-items-center">
						<?php elseif ( 6 === $clubnature_i ) : ?>
							<div class="col-12 order-2 px-md-5">
						<?php else : ?>
							<div class="col-12">
						<?php endif; ?>
								<div class="post-info w-100 position-relative">
								<?php if ( 'post' === get_post_type() ) : ?>
									<div class="post-meta mb-3">
										<span class="post-date">
											<?php echo esc_html( the_time( get_option( 'date_format' ) ) ); ?>
										</span>
									<?php if ( post_password_required() !== true ) : ?>
										<span class="post-comments ms-2">
											<i class="far fa-comment me-1"></i><?php comments_number( __( '0 Comments', 'clubnature' ), __( '1 Comment', 'clubnature' ), __( '% Comments', 'clubnature' ) ); ?>
										</span>
									<?php endif; ?>
									</div>
								<?php endif; ?>
									<div class="post-title position-relative">
										<h2 class="mb-4"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="post-message">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>
						<?php if ( 1 === $clubnature_i ) : ?>
							<div class="col-12 col-md-6 order-1 order-md-2 mb-4 mb-md-0 ps-md-1">
						<?php elseif ( 2 === $clubnature_i ) : ?>
							<div class="col-12 order-1 mb-4 pe-md-1">
						<?php elseif ( 3 === $clubnature_i ) : ?>
							<div class="col-12 col-md-5 order-1 mb-4 mb-md-0 ps-md-1">
						<?php elseif ( 4 === $clubnature_i ) : ?>
							<div class="col-12 col-md-6 order-1 mb-4 mb-md-0 pe-md-1">
						<?php elseif ( 5 === $clubnature_i ) : ?>
							<div class="col-12 col-md-5 order-1 mb-4 mb-md-0 order-md-2 pe-md-1">
						<?php elseif ( 6 === $clubnature_i ) : ?>
							<div class="col-12 order-1 mb-4 ps-md-1">
						<?php else : ?>
							<div class="col-12">
						<?php endif; ?>
								<div class="post-image h-100 position-relative">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="h-100 d-block">
										<?php the_post_thumbnail( 'medium_large' ); ?>
										<div class="post-overlay position-absolute">
											<div class="post-overlay-arrow position-absolute"></div>
										</div>
									</a>
									<div class="post-categories-list position-absolute">
										<?php echo wp_kses_post( get_the_category_list() ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php if ( 6 === $clubnature_i ) : ?>
			<?php $clubnature_i = 1; ?>
		<?php else : ?>
			<?php $clubnature_i++; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'no-results' ); ?>
<?php endif; ?>
	</div>
</div>
<div class="page-nav mt-5">
	<?php the_posts_pagination(); ?>
</div>
