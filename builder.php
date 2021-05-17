<?php
/**
 * Template Name: Page Builder
 */
__( 'Page Builder', txtdmn);

get_header();

while(have_posts()) :
	the_post();
	the_title('<h1 class="sr-only">','</h1>');
	the_content();
endwhile;

get_footer();
?>