<?php
/**
 * The header for our theme including the navigation and the photo header
 *
 * @package ClubNature
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ) : ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'clubnature' ); ?></a>

<div class="cursor cursor-1 position-fixed rounded-circle" id="cursor"></div>
<div class="cursor cursor-2 position-fixed rounded-circle" id="cursor2"></div>

<nav class="navbar fixed-top py-0">
	<a class="navbar-brand position-absolute" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	<?php
	$clubnature_custom_logo_id = get_theme_mod( 'custom_logo' );
	$clubnature_logo           = wp_get_attachment_image_src( $clubnature_custom_logo_id, 'full' );
	$clubnature_description    = get_bloginfo( 'description', 'display' );
	?>
	<?php if ( has_custom_logo() ) : ?>
		<img src="<?php echo esc_url( $clubnature_logo[0] ); ?>" class="img-fluid">
	<?php else : ?>
		<span class="site-title fw-bold"><?php bloginfo( 'name' ); ?></span>
		<?php if ( $clubnature_description || is_customize_preview() ) : ?>
			<span class="site-description d-table"><?php echo esc_html( $clubnature_description ); ?></span>
		<?php endif; ?>
	<?php endif; ?>
	</a>
	<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) : ?>
		<?php $clubnature_count = WC()->cart->cart_contents_count; ?>
		<div class="woocommerce-cart-contents position-absolute">
			<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr__( 'View your shopping cart', 'clubnature' ); ?>" class="w-100 h-100 rounded-circle d-block">
				<i class="fas fa-shopping-bag"></i>
			<?php if ( $clubnature_count > 0 ) : ?>
				<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubnature_count ); ?></span>
			<?php endif; ?>
			</a>
		</div>
	<?php endif; ?>
	<button class="navbar-toggler position-fixed border-0 rounded-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo esc_attr__( 'Toggle navigation', 'clubnature' ); ?>">
		<span class="navbar-toggler-line position-relative mx-auto mb-1 rounded d-block"></span>
		<span class="navbar-toggler-line position-relative mx-auto mb-1 rounded d-block"></span>
		<span class="navbar-toggler-line position-relative mx-auto rounded d-block"></span>
	</button>
	<div class="collapse navbar-collapse position-fixed" id="navbarSupportedContent">
		<div class="container h-100 d-flex align-items-center">
			<div class="row w-100">
				<div class="col-12 col-md-2 pt-3 text-uppercase fw-bold d-none d-md-block">
					<?php echo esc_html( 'Menu', 'clubnature' ); ?>
				</div>
				<div class="col-12 col-md-10">
					<?php clubnature_bootstrap_menu(); ?>
				</div>
			</div>
		</div>
	</div>
</nav>

<section class="site-header position-relative">
<?php if ( get_header_image() || has_post_thumbnail() ) : ?>
	<div class="site-header-image w-100 h-100 position-absolute rounded-circle">
	<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
		<img src="<?php echo esc_url( header_image() ); ?>" class="img-fluid img-cover w-100 h-100 position-relative">
	<?php elseif ( is_single() || is_page() ) : ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
			<img src="<?php echo esc_url( $backgroundimg[0] ); ?>" class="img-fluid img-cover w-100 h-100 position-relative">
		<?php else : ?>
			<img src="<?php echo esc_url( header_image() ); ?>" class="img-fluid img-cover w-100 h-100 position-relative">
		<?php endif; ?>
	<?php endif; ?>
	</div>
<?php endif; ?>
	<div class="site-header-lines w-100 h-100 position-absolute">
		<div class="site-header-line site-header-line-1 h-100 position-absolute"></div>
		<div class="site-header-line site-header-line-2 h-100 position-absolute"></div>
		<div class="site-header-line site-header-line-3 h-100 position-absolute d-none d-md-block"></div>
	</div>
	<div class="site-header-info h-100 position-relative">
		<div class="container h-100">
			<div class="row h-100">
			<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
				<div class="col-12 col-md-8 offset-md-2 d-flex align-items-center">
			<?php else : ?>
				<div class="col-12 d-flex align-items-center">
			<?php endif; ?>
					<div class="site-header-info-main w-100 position-relative text-white">
					<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
						<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'header-sidebar' ); ?>
						<?php endif; ?>
					<?php else : ?>
						<?php if ( is_single() || is_page() ) : ?>
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : ?>
									<?php the_post(); ?>
										<h1><?php the_title(); ?></h1>
										<?php get_template_part( 'inc/post', 'meta' ); ?>
								<?php endwhile; ?>
							<?php else : ?>
							<?php endif; ?>
						<?php elseif ( is_category() ) : ?>
							<h1><?php esc_html_e( 'Latest Posts Under:', 'clubnature' ); ?> <?php single_cat_title(); ?></h1>
						<?php elseif ( is_search() ) : ?>
							<h1><?php esc_html_e( 'Search Results For:', 'clubnature' ); ?> <strong><?php echo get_search_query(); ?></strong></h1>
						<?php elseif ( is_archive() ) : ?>
							<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) : ?>
								<?php if ( is_shop() ) : ?>
									<h1><?php woocommerce_page_title(); ?></h1>
								<?php else : ?>
									<h1><?php the_archive_title(); ?></h1>
								<?php endif; ?>
							<?php else : ?>
								<h1><?php the_archive_title(); ?></h1>
							<?php endif; ?>
						<?php elseif ( is_404() ) : ?>
							<h1><?php esc_html_e( 'The Page You Are Looking For Doesn&rsquo;t Exist.', 'clubnature' ); ?></h1>
						<?php endif; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<div class="site-header-scroll position-absolute d-none d-md-block">
		<div class="site-header-scrolling position-absolute"></div>
		<div class="site-header-name position-absolute text-white text-uppercase fw-bold">Scroll</div>
	</div>
<?php endif; ?>
	<div class="site-header-social">
		<?php get_template_part( 'inc/social' ); ?>
	</div>
<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( have_posts() ) : ?>
		<?php
		$args = array(
			'posts_per_page' => '1',
			'post__not_in'   => get_option( 'sticky_posts' ),
		);
		query_posts( $args );
		?>
		<div class="site-header-extra position-absolute">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<div class="row g-0 h-100">
				<div class="col-1 h-100">
					<div class="site-header-extra-arrow h-100 position-relative"></div>
				</div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-6 h-100">
			<?php else : ?>
				<div class="col-11 h-100">
			<?php endif; ?>
					<div class="site-header-extra-info h-100 ps-2 pe-4 d-flex align-items-center">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="text-uppercase fw-bold"><?php the_title(); ?></a>
					</div>
				</div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-5 h-100">
					<div class="site-header-extra-image h-100 position-relative">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'medium' ); ?>
							<div class="site-header-extra-image-overlay position-absolute">
								<div class="site-header-extra-image-overlay-arrow position-absolute"></div>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
</section>

<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
<section class="sidebar position-fixed">
	<div class="sidebar-button">
		<a class="btn btn-sidebar text-uppercase rounded-0"><?php esc_html_e( 'Sidebar', 'clubnature' ); ?></a>
	</div>
	<div class="sidebar-frame position-absolute bg-white border-left">
		<div class="sidebar-main p-3 p-sm-5">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php endif; ?>
