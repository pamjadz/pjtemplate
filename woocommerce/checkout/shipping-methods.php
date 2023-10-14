<?php
/**
 * Display Shipping Methods on checkout
 *
 * @author 	Pouriya Amjadzadeh
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if( !$packages || empty($packages) ) return;

foreach ( $packages as $index => $package ) :
	$product_names = [];
	if ( count( $packages ) > 1 ) {
		foreach ( $package['contents'] as $item_id => $values ) {
			$product_names[ $item_id ] = $values['data']->get_name() . ' &times;' . $values['quantity'];
		}
		$product_names = apply_filters( 'woocommerce_shipping_package_details_array', $product_names, $package );
	}
	$available_methods			= $package['rates'];
	$chosen_method				= isset( WC()->session->chosen_shipping_methods[ $index ] ) ? WC()->session->chosen_shipping_methods[ $index ] : '';
	$show_package_details		= count( $packages ) > 1;
	$package_details			= implode( ', ', $product_names );
	$package_name				= apply_filters( 'woocommerce_shipping_package_name', ( ( $index + 1 ) > 1 ) ? sprintf( _x( 'Shipping %d', 'shipping packages', 'woocommerce' ), ( $index + 1 ) ) : _x( 'Shipping', 'shipping packages', 'woocommerce' ), $index, $package );
	$formatted_destination		= WC()->countries->get_formatted_address( $package['destination'], ', ' );
	$has_calculated_shipping	= WC()->customer->has_calculated_shipping();
	$calculator_text			= '';
	?>
	<div class="woocommerce-shipping-totals shipping">
		<p><?php echo wp_kses_post( $package_name ); ?></p>
		<?php if ( $available_methods ) : ?>
			<ul id="shipping_method" class="woocommerce-shipping-methods">
				<?php foreach ( $available_methods as $method ) : ?>
					<li>
						<?php
						if ( 1 < count( $available_methods ) ) {
							printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); // WPCS: XSS ok.
						} else {
							printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
						}
						printf( '<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr( sanitize_title( $method->id ) ), wc_cart_totals_shipping_method_label( $method ) ); // WPCS: XSS ok.
						do_action( 'woocommerce_after_shipping_rate', $method, $index );
						?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php
		if( ! $has_calculated_shipping || ! $formatted_destination ) :
			echo wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) );
		endif;
		?>

		<?php if ( $show_package_details ) : ?>
			<?php echo '<p class="woocommerce-shipping-contents"><small>' . esc_html( $package_details ) . '</small></p>'; ?>
		<?php endif; ?>
		
	</div> <?php
endforeach;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */