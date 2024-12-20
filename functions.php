<?php
/**
 * Core Functions
 *
 * @author 	Pouriya Amjadzadeh
 * @version 1.0.0
 * @package https://arvandec.com
 */

defined('ABSPATH') || exit;

//TODO: Renmate txtdmn
define( 'txtdmn', 'txtdmn' );
define( 'THEMEDIR', trailingslashit( get_template_directory() ) );
define( 'THEMEURL', trailingslashit( get_template_directory_uri() ) );

add_action( 'after_switch_theme', function(){
	update_option('thumbnail_size_w', 0);
	update_option('thumbnail_size_h', 0);
	update_option('medium_size_w', 0);
	update_option('medium_size_h', 0);
	update_option('medium_crop', true);

	update_option('medium_large_size_w', 0);
	update_option('medium_large_size_h', 0);

	update_option('large_size_w', 0);
	update_option('large_size_h', 0);
	update_option('large_crop', true);
});

add_action( 'after_setup_theme', function(){
	//Wordpress Compatibility
	load_theme_textdomain( txtdmn, get_template_directory() . '/langs' );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 1320;

	add_theme_support( 'custom-logo', [
		'width'			=> '',
		'height'		=> '',
		'flex-height'	=> true,
		'flex-width'	=> true
	]);

	register_nav_menus([
		'primary'		=> __('Main Menu',txtdmn),
		'responsive'	=> __('Responsive Menu',txtdmn),
	]);

	add_action('widgets_init', function() {
		register_sidebar([
			'id'			=> 'sidebar',
			'name'			=> __('Sidebar'),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h4 class="widget-title">',
			'after_title'	=> '</h4>',
		]);
	});

	//Enqueue scripts
	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_style( 'bootstrap', THEMEURL.'assets/css/bootstrap.css' );
		wp_enqueue_script( 'bootstrap', THEMEURL.'assets/js/vendor/bootstrap.js', [], '5.1.2', true );

		wp_enqueue_style( 'stylesheet', THEMEURL.'assets/css/stylesheet.css' );

		if( !is_admin() ) {
			wp_deregister_script( 'jquery' );
			wp_enqueue_script( 'jquery', THEMEURL.'assets/js/vendor/jquery.min.js', [], '3.7.1', false );
		}

		wp_enqueue_script( 'splide', THEMEURL.'assets/js/vendor/splide.min.js', [], '4.1.3', true );

		if ( comments_open() ) wp_enqueue_script('comment-reply');

	}, 99 );

	add_filter( 'body_class', function( $classes ) {
		$classes = [];
		if( is_404() ) $classes[] = 'error404';
		$classes[] = ( is_rtl() ) ? 'rtl' : 'ltr';
		if( is_admin_bar_showing() ) $classes[] = 'admin_bar';
		return $classes;
	}, 99 );

	add_filter('header_class', function( $classes ) {
		$classes = [];
		return $classes;
	});

	add_action( 'wp_body_open', function(){
		get_template_part('parts/icons');
	}, 99);

	add_action( 'wp_footer', function(){
		printf('<script id="themejs" src="%s" data-ajax="%s" defer></script>', THEMEURL. 'assets/js/script.min.js', admin_url('admin-ajax.php') );
	}, 99);

	//includes
	foreach (glob(THEMEDIR.'inc/*.php') as $file) require_once $file;
});


//------Theme Functions
function header_class(){
	$classes = array_unique( apply_filters( 'header_class', [] ) );
	if( !empty( $classes ) ){
		printf(' class="%s"', esc_attr( implode(' ', $classes) ) );
	}
}

function the_logo(){
	if( has_custom_logo() ){
		the_custom_logo();
	} else {
		$logo = '';
		$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';
		printf('<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>', esc_url( home_url( '/' ) ), $aria_current, $logo);
	}
}
