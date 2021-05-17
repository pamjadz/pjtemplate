<?php
define('txtdmn', 'txtdmn');
define('THEMEDIR', trailingslashit(get_template_directory()) );
define('THEMEURL', trailingslashit(get_template_directory_uri()) );

add_action( 'after_setup_theme', function(){
	load_theme_textdomain( txtdmn, get_template_directory() . '/langs' );

	add_theme_support( 'custom-logo' , array(
		'height'      => 100,
		'width'       => 50,
		'flex-height' => true,
		'flex-width'  => true
	));

	add_action('wp_enqueue_scripts', function(){
		wp_enqueue_style( 'bootstrap', THEMEURL.'assets/css/bootstrap.css');
		wp_enqueue_style( 'stylesheet', THEMEURL.'assets/css/stylesheet.css');
		if(!is_user_logged_in()) wp_deregister_style( 'dashicons' );
		if(!is_admin()){
			wp_deregister_script( 'jquery');
			wp_enqueue_script('jquery', THEMEURL.'assets/js/vendor/jquery.min.js', array(), false);
		}
		if ( is_singular('post') && comments_open() ) wp_enqueue_script('comment-reply');
	}, 9999);

	add_filter('body_class', function($classes) {
		$classes = array();
		$classes[] = (is_rtl()) ? 'rtl' : 'ltr';
		if(is_front_page()) $classes[] = 'front-page';
		if(is_404()) $classes[] = 'error404';
		if(is_admin_bar_showing()) $classes[] ='admin_bar';
		return $classes;
	}, 1000);

	register_nav_menus(array(
		'primary'		=> __('Main Menu',txtdmn),
		'responsive'	=> __('Responsive Menu',txtdmn),
	));

	add_action('widgets_init', function() {
		register_sidebar(array(
			'name' => 'ستون وبلاگ',
			'id' => 'sidebar',
			'before_widget' => '<section class="widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar(array(
			'name' => 'پاورقی',
			'id' => 'footer',
			'before_widget' => '<section id="%1$s" class="widget col-lg-3 mb-3 mb-lg-0 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		));
	});

	foreach (glob(THEMEDIR.'inc/*.php') as $file) require_once $file;
});

function commentlisttemplate($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	get_template_part('content/comment', 'item');
}