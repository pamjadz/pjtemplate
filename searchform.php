<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

defined('ABSPATH') || exit;
?>

<form action="<?php echo esc_url( home_url('/') ); ?>" method="get" class="search-form input-group" role="search">
	<input type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="btn"><?php echo esc_html_x( 'Search', 'submit button', txtdmn ); ?></button>
</form>