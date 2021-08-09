<?php

define( 'txtdmn', 'txtdmn' );
define( 'THEMEDIR', trailingslashit(get_template_directory()) );
define( 'THEMEURL', trailingslashit(get_template_directory_uri()) );

add_action('after_switch_theme', function() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if(!is_plugin_active('arvand/arvand.php') && !is_admin()):
		wp_die(sprintf('<p>%s</p>', esc_html__('Please Active <a href="https://wordpress.org/plugins/arvandec" target="_blank">Arvand Plugin</a> for use this theme', txtdmn)),'Arvand Core');
	endif;
});

add_action( 'after_setup_theme', function(){
	load_theme_textdomain( txtdmn, get_template_directory() . '/langs' );

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
		if( is_admin_bar_showing() ) $classes[] ='admin_bar';
		if( is_404() ) $classes[] = 'error404';
		$classes[] = ( is_rtl() ) ? 'rtl' : 'ltr';
		return $classes;
	}, 1000);

	add_theme_support( 'custom-logo' , array(
		// 'height'      => ,
		// 'width'       => ,
		'flex-height' => true,
		'flex-width'  => true
	));

	register_nav_menus(array(
		'primary'		=> __('Main Menu',txtdmn),
		'responsive'	=> __('Responsive Menu',txtdmn),
	));

	add_action('widgets_init', function() {
		register_sidebar(array(
			'id'			=> 'sidebar',
			'name'			=>  __('Sidebar', txtdmn),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		));
		register_sidebar(array(
			'id'			=> 'footer',
			'name'			=> __('Footer', txtdmn),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h4 class="widget-title">',
			'after_title'	=> '</h4>',
		));
	});

	//Thumbnails
	set_post_thumbnail_size(80 ,80 ,true);
	update_option('medium_size_w', 400);
	update_option('medium_size_h', 300);
	add_filter( 'intermediate_image_sizes', function( $sizes ) {
		$sizes = array();
		if( isset($_REQUEST['post_id']) && 'post' === get_post_type( $_REQUEST['post_id'] ) ) $sizes = array('thumbnail','medium');
		return $sizes;
	}, 999);

	foreach (glob(THEMEDIR.'inc/*.php') as $file) require_once $file;
});

function commentlisttemplate($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	get_template_part('content/comment', 'item', array($comment, $args, $depth));
}