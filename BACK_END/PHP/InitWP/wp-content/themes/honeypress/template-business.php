<?php 
// Template Name: Business Template
	get_header();

	do_action( 'spiceb_honeypress_sections', false );
	get_template_part('index','news');

    get_footer();	