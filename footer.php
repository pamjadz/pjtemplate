<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

defined('ABSPATH') || exit;

get_template_part('parts/offcanvas', 'mmenu');

if( isset( $args['only_meta'] ) && TRUE === $args['only_meta'] ){
	wp_footer();
	echo '</body></html>';
	return;
}
?>

<footer id="siteFoot">
	Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio laborum ratione iusto velit esse quos porro molestias magni unde, non aliquid veritatis, vitae explicabo ducimus dignissimos, assumenda facere quo? Numquam.
</footer>

<?php wp_footer(); ?>

</body>
</html>