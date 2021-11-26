<?php
/**
 * The template for displaying comments
 *
 * @package ClubNature
 */

if ( post_password_required() ) :
	return;
endif;
?>

<div class="comments-area">
	<?php if ( have_comments() ) : ?>
	<h4><?php comments_number( __( 'No Comments', 'clubnature' ), __( '1 Comment', 'clubnature' ), __( '% Comments', 'clubnature' ) ); ?></h4>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'clubnature' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'clubnature' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'clubnature' ) ); ?></div>
		</nav>
		<?php endif; ?>
	<ul class="list-unstyled"><?php wp_list_comments( array() ); ?></ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'clubnature' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'clubnature' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'clubnature' ) ); ?></div>
		</nav>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( ! comments_open() && '0' !== get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p><?php esc_html_e( 'Comments are closed.', 'clubnature' ); ?></p>
	<?php endif; ?>
</div>

<?php comment_form(); ?>
