<?php
/**
 * Show messages
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

if( !$notices ) return;

foreach ( $notices as $notice ) : ?>
	<div class="wc-alert alert alert-dismissible fade show"<?php echo wc_get_notice_data_attr( $notice ); ?> role="alert">
		<div class="progress text-info"></div>
		<?php echo wc_kses_notice( $notice['notice'] ); ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div> <?php
endforeach;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */