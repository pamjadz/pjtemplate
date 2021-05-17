
<nav id="mmenu" class="mm-ocd" data-mm-spn-title="<?php bloginfo('name'); ?>">
	<?php wp_nav_menu(array('theme_location' => (has_nav_menu('responsive') ? 'responsive' : 'primary'),'container' => 'ul')); ?>
</nav>

<?php wp_footer(); ?>

<script id="requirejs" src="<?php echo THEMEURL.'assets/js/vendor/require.js'; ?>" data-main="<?php echo THEMEURL.'assets/js/script'; ?>" data-ajax="<?php echo admin_url('admin-ajax.php'); ?>"></script>

</body>
</html>