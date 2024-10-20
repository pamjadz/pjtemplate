<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

defined('ABSPATH') || exit;
//TODO: change color meta

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="google" content="notranslate" />
<meta name="theme-color" content="COLOR">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="msapplication-navbutton-color" content="COLOR">
<meta name="apple-mobile-web-app-status-bar-style" content="COLOR">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php
wp_body_open();
if( isset($args['only_meta']) && TRUE === $args['only_meta'] ) return;
?>

<header id="siteHead" <?php header_class(); ?>>
	<div class="row g-0 h-100">
		<div id="logo" class="col-lg-auto d-flex align-items-center justify-content-center px-4 bg-card">TEST<?php //the_logo(); ?></div>
		<div class="col-lg px-4">
			<?php wp_nav_menu(['theme_location' => 'primary', 'container' => 'ul']); ?>
		</div>
		<div class="col-lg-auto d-flex">
			<button type="button" class="btn btn-icon bg-card h-100 btn-search p-0" data-bs-toggle="collapse" data-bs-target="#searchFormHead" aria-expanded="false" aria-controls="searchFormHead"><svg width="36" height="36"><use xlink:href="#icon-search" /></svg></button>
			<a href="#" class="btn btn-icon btn-primary h-100">پنل کاربری <svg width="20" height="20" class="ms-3"><use xlink:href="#icon-arrow-end" /></svg></a>
		</div>
	</div>
	<form class="collapse bg-body" id="searchFormHead" action="<?php echo esc_url( home_url() ); ?>">
		<div class="input-group h-100">
			<input type="search" class="form-control fsz-24 fw-700 h-100" placeholder="برای جستجو اینجا تایپ کنید&hellip;" value="<?php the_search_query(); ?>">
		</div>
	</form>
</header>

<ul id="sticked-menus" class="listunstyled">
	<li><a href="#" class="d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">T</span> <span class="px-3">TEST</span></a></li>
	<li><a href="#" class="d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">T</span> <span class="px-3">TEST</span></a></li>
	<li><a href="#" class="d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">T</span> <span class="px-3">TEST</span></a></li>
	<li><a href="#" class="d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">T</span> <span class="px-3">TEST</span></a></li>
	<li><a href="#" class="d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">T</span> <span class="px-3">TEST</span></a></li>
</ul>