<?php
/**
 * The template for displaying social media icons
 *
 * @package ClubNature
 */

?>
<?php if ( get_theme_mod( 'clubnature_facebooklink' ) || get_theme_mod( 'clubnature_twitterlink' ) || get_theme_mod( 'clubnature_pinterestlink' ) || get_theme_mod( 'clubnature_instagramlink' ) || get_theme_mod( 'clubnature_linkedinlink' ) || get_theme_mod( 'clubnature_youtubelink' ) || get_theme_mod( 'clubnature_vimeo' ) || get_theme_mod( 'clubnature_tumblrlink' ) || get_theme_mod( 'clubnature_flickrlink' ) ) : ?>
<div class="social-icons position-absolute">
	<ul class="list-unstyled d-table mb-2">
<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_facebooklink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_facebooklink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_twitterlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_twitterlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-twitter"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_pinterestlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_pinterestlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_instagramlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_instagramlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-instagram"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_linkedinlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_linkedinlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_youtubelink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_youtubelink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-youtube"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_vimeo' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_vimeo' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_tumblrlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_tumblrlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-tumblr"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubnature_flickrlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubnature_flickrlink' ) ); ?>" class="py-2 text-center d-block" target="_blank"><i class="fab fa-flickr"></i></a></li>
		<?php endif; ?>
<?php if ( get_theme_mod( 'clubnature_facebooklink' ) || get_theme_mod( 'clubnature_twitterlink' ) || get_theme_mod( 'clubnature_pinterestlink' ) || get_theme_mod( 'clubnature_instagramlink' ) || get_theme_mod( 'clubnature_linkedinlink' ) || get_theme_mod( 'clubnature_youtubelink' ) || get_theme_mod( 'clubnature_vimeo' ) || get_theme_mod( 'clubnature_tumblrlink' ) || get_theme_mod( 'clubnature_flickrlink' ) ) : ?>
	</ul>
</div>
<?php endif; ?>
