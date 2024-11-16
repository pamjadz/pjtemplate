<?php
defined('ABSPATH') || exit;

//Call This by <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">MENU</button>
?>

<div id="mobileMenu" class="offcanvas offcanvas-start" tabindex="-1" aria-labelledby="mobileMenuLabel">
	<div class="offcanvas-header">
		<div id="mobileMenuLabel" class="offcanvas-title">Offcanvas</div>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<nav class="offcanvas-body px-0">
		<?php wp_nav_menu( ['theme_location' => (has_nav_menu('responsive') ? 'responsive' : 'primary'),'container' => 'ul', 'menu_class' => 'collapse-menu'] ); ?>
	</nav>
</div>