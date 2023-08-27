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

<!--HEADER HERE-->