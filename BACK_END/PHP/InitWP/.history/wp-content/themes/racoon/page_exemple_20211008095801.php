<?php
/* Template Name : Page exemple */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Racoon
 */

get_header('gege');
?>

	<main id="primary" class="site-main">

		<h2><?php the_title(); ?></h2>
		<h3>Page d'exemple</h3>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
