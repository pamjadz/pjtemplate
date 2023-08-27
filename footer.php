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

if( !isset($args['only_meta']) || FALSE === $args['only_meta'] ) : ?>
	<div id="offcanvasMobileMenu" class="offcanvas offcanvas-start" tabindex="-1" aria-labelledby="offcanvasMobileMenuLabel">
		<div class="offcanvas-header">
			<div id="offcanvasMobileMenuLabel" class="offcanvas-title">Offcanvas</div>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<nav class="offcanvas-body px-0">
			<?php wp_nav_menu( ['theme_location' => (has_nav_menu('responsive') ? 'responsive' : 'primary'),'container' => 'ul', 'menu_class' => 'collapse-menu'] ); ?>
		</nav>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>