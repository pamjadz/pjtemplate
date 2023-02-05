<?php if( !isset($args['only_meta']) || FALSE === $args['only_meta'] ) : ?>
	
	<nav id="mmenu" class="mm-ocd" data-mm-spn-title="<?php bloginfo('name'); ?>">
		<?php wp_nav_menu(array('theme_location' => (has_nav_menu('responsive') ? 'responsive' : 'primary'),'container' => 'ul')); ?>
	</nav>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>