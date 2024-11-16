<?php

defined('ABSPATH') || exit;

if( !class_exists('woocommerce') ) return;

//----------------------BACKEND

add_theme_support( 'woocommerce', [
	'thumbnail_image_width'		=> 300,
	'single_image_width'    	=> 600,
]);

//Admin


//Enqueue assets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action( 'wp_enqueue_scripts', function() {
	//Block Editor
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'wc-blocks-packages-style' );
	$blocks = ['product-title','single-product','stock-filter','product-image','attribute-filter','cart','checkout','mini-cart-contents','product-sku','','product-details','reviews-by-product','reviews-by-category','rating-filter','product-summary','active-filters', 'add-to-cart-form', 'all-products','all-reviews', 'catalog-sorting',  'breadcrumbs', 'customer-account', 'featured-category', 'featured-product', 'mini-cart', 'price-filter', 'product-add-to-cart', 'product-button', 'product-categories', 'product-image-gallery', 'product-query', 'product-results-count', 'product-reviews', 'product-sale-badge', 'product-search', 'product-stock-indicator'];
	foreach( $blocks as $block ){
		wp_dequeue_style( "wc-blocks-style-{$block}" );	
	}


	wp_dequeue_script( 'woocommerce' );
	// wp_dequeue_script( 'wc-add-to-cart' );
	// wp_dequeue_script( 'wc-cart-fragments' );

	if( !is_product() ){
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
	}

	if( is_product_taxonomy() ){
		wp_dequeue_script( 'jqueryui' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'wc-chosen' );
	}

	if( !is_cart() ){
		wp_dequeue_script( 'wc-cart' );
	}
	if( !is_checkout() ) {
		wp_dequeue_script( 'wc-checkout' );
	}

}, 99);

add_action('init', function(){
	remove_action( 'wp_head', 'wc_gallery_noscript' );
});
add_filter( 'body_class', function(){
	remove_action( 'wp_footer', 'wc_no_js' );
});
add_action( 'wp_print_styles', function(){
	wp_style_add_data( 'woocommerce-inline', 'after', '' );
});


//Common
add_filter('woocommerce_product_get_rating_html', function($html, $rating, $count){
	$label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );

	$html = '<span class="star-rating" role="img" dir="ltr" aria-label="' . esc_attr( $label ) . '">';
	for ($i=0; $i < 5; $i++) {
		if( $i == floor($rating) && $rating < ceil($rating) ){
			$html .= '<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.425 9.133a1.538 1.538 0 0 0-1.369-1.07l-5.531-.355a.047.047 0 0 1-.038-.029l-2.062-5.203a1.528 1.528 0 0 0-2.85 0L8.512 7.68a.047.047 0 0 1-.037.029l-5.531.356a1.538 1.538 0 0 0-1.37 1.069 1.575 1.575 0 0 0 .488 1.696L6.3 14.354a.075.075 0 0 1 .019.075l-1.266 4.978a1.744 1.744 0 0 0 .656 1.838 1.687 1.687 0 0 0 1.885.056l4.397-2.784h.018l4.735 2.99c.242.158.526.243.815.244.32-.004.63-.105.89-.29a1.557 1.557 0 0 0 .591-1.66l-1.359-5.372a.075.075 0 0 1 .019-.075l4.237-3.525a1.575 1.575 0 0 0 .488-1.696Zm-1.444.543-4.247 3.525a1.575 1.575 0 0 0-.506 1.594l1.36 5.372c.009.037.009.047 0 .056a.066.066 0 0 1-.029.028h-.018l-4.726-3a1.5 1.5 0 0 0-.815-.234V3c.01 0 .019 0 .028.028L14.1 8.233a1.538 1.538 0 0 0 1.322.975l5.54.356c.01 0 .02 0 .029.037.009.038 0 .066-.01.075Z"/></svg>';
		} else {
			if( $i < $rating){
				$html .= '<svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.425 9.131a1.537 1.537 0 0 0-1.369-1.069l-5.569-.384-2.062-5.203A1.537 1.537 0 0 0 12 1.5a1.538 1.538 0 0 0-1.425.975l-2.1 5.231-5.531.356a1.547 1.547 0 0 0-1.369 1.07 1.575 1.575 0 0 0 .488 1.696l4.256 3.6-1.266 4.978a1.734 1.734 0 0 0 .656 1.838 1.688 1.688 0 0 0 1.885.056l4.397-2.784h.018l4.735 2.99c.243.158.526.243.815.244a1.546 1.546 0 0 0 1.482-1.95L17.7 14.353l4.238-3.525a1.575 1.575 0 0 0 .487-1.697Z"/></svg>';
			} else {
				$html .= '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z"/></svg>';
			}
		}
	}
	$html .= '</span>';
   return $html;
}, 10, 3);

add_filter( 'woocommerce_get_stock_html', function( $html, $product ){
	if( !$product->get_manage_stock() ) return;
	$no_stock_amount = absint( get_option( 'woocommerce_notify_no_stock_amount', 0 ) );
	$stock_amount = $product->get_stock_quantity();
	$display = false;
	$html = '';
	if( 'outofstock' === $product->get_stock_status() || $stock_amount == $no_stock_amount){
		// return sprintf('<p class="product-stock d-flex align-items-center text-muted"><svg width="20" height="20"><use xlink:href="#icon-flag" /></svg> %s</p>', 'محصول موجود نمی‌باشد' );
	} else {
		switch ( get_option( 'woocommerce_stock_format' ) ) {
			case 'low_amount':
				if ( $stock_amount <= wc_get_low_stock_amount( $product ) ) {
					$display = sprintf( __( 'Only %s left in stock', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_amount, $product ) );
				}
				break;
			case 'no_amount':
				$display = false;
				break;
		}
	}

	if ( $product->backorders_allowed() && $product->backorders_require_notification() ) {
		$display = __( '(can be backordered)', 'woocommerce' );
	}

	if( $display ){
		$html = sprintf('<p class="product-stock d-flex align-items-center text-danger"><svg width="20" height="20"><use xlink:href="#icon-flag" /></svg> %s</p>', $display );
	}
	return $html;
}, 99, 2);

add_filter( 'woocommerce_get_price_html', function($price, $product){
	if( is_admin() ) return $price;

	$args = [
		'decimals'				=> wc_get_price_decimals(),
		'decimal_separator'		=> wc_get_price_decimal_separator(),
		'thousand_separator'	=> wc_get_price_thousand_separator(),
		'symbol'				=> get_woocommerce_currency_symbol(),
		'regular_price'			=> $product->get_regular_price() ? : 0,
		'sale_price'			=> $product->get_sale_price() ? : 0,
		'is_on_sale'			=> $product->is_on_sale(),
	];

	$price = '<span class="woocommerce-Price">';
	if( $product->is_type( 'variable' ) ){			
		$args['regular_price'] = $product->get_variation_regular_price( 'min', true );
		$args['sale_price'] = $product->get_variation_sale_price('min', true);
		$args['is_on_sale'] = $args['regular_price'] > $args['sale_price'] ? true : false;
	}
	if ( '' === $product->get_price() || 0 === $args['regular_price'] ) {
		$price .= apply_filters( 'woocommerce_empty_price_html', '', $product );
	} else {
		if ( $args['is_on_sale'] ) {
			$sale = number_format( $args['sale_price'], $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] );
			$regular = number_format( $args['regular_price'], $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] );
			$percentage = round( 100 - ($args['sale_price'] / $args['regular_price'] * 100) );
			$price .= '<span class="flex-fill">';
			$price .= sprintf('<del aria-hidden="true" class="d-block"><bdi class="woocommerce-Price-amount">%s</bdi></del>', $regular);
			$price .= '<ins>';
			$price .= '<span class="woocommerce-Price-currencySymbol">'.$args['symbol'].'</span>';
			$price .= sprintf('<bdi class="woocommerce-Price-amount">%s</bdi>', $sale);
			$price .= '</ins>';
			$price .= '</span>';
			$price .= sprintf('<span class="woocommerce-Price-discount">-%s%%</span>', esc_html( $percentage ) );
		} else {
			$price .= '<ins>';
			$price .= '<span class="woocommerce-Price-currencySymbol">'.$args['symbol'].'</span>';
			$regular = number_format( $args['regular_price'], $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] );
			$price .= sprintf('<bdi class="woocommerce-Price-amount">%s</bdi>', $regular);
			$price .= '</ins>';
		}
	}
	$price .= '</span>';
	return $price;
}, 99, 2);



//Archive & Loop
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_filter('woocommerce_catalog_orderby', function( $catalog_orders ) {
	$catalog_orders = [
		'menu_order'	=> __( 'Default sorting', 'woocommerce' ),
		'date'			=> __( 'Sort by latest', 'woocommerce' ),
		'popularity'	=> __( 'Sort by popularity', 'woocommerce' ),
		'rating'		=> __( 'Sort by average rating', 'woocommerce' ),
		'price'			=> __( 'Sort by price: low to high', 'woocommerce' ),
		'price-desc'	=> __( 'Sort by price: high to low', 'woocommerce' ),
	];
	return $catalog_orders;
}, 99);

//Single Product
add_filter('woocommerce_show_variation_price', function( $display ) {
	if( is_product() ) $display = true;
	return $display;
}, 99);

//Cart & Checkout
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
	$cart_contents = WC()->cart->get_cart_contents_count();
	$fragments['.wc-cart-total'] = sprintf('<span class="wc-cart-total">%s</span></a>', ( $cart_contents > 0 ? $cart_contents : '') );
	
	ob_start();
	woocommerce_mini_cart();
	$mini_cart = ob_get_clean();

	$fragments['div.widget_shopping_cart_content'] = sprintf('<div class="widget_shopping_cart_content">%s</div>', $mini_cart);

	return $fragments;
});

add_filter( 'default_checkout_billing_country', function(){
	return 'IR';
}, 99);


add_filter('woocommerce_update_order_review_fragments', function($arr) {
	ob_start();
	echo '<div class="checkout-shipping-methods">';
	if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) :
		do_action( 'woocommerce_review_order_before_shipping' );
		$packages = WC()->shipping()->get_packages();
		wc_get_template( 'checkout/shipping-methods.php', ['packages' => $packages]);
		do_action( 'woocommerce_review_order_after_shipping' );
	endif;
	echo '</div>';
    $shipping_methods = ob_get_clean();
    $arr['.checkout-shipping-methods'] = $shipping_methods;
	
	return $arr;
});

//Account
add_action('template_redirect', function(){
	if( is_checkout() && WC()->checkout->is_registration_required() && !is_user_logged_in() ){
		$url = add_query_arg('return', wc_get_checkout_url(), wc_get_page_permalink('myaccount') );
		wp_redirect( $url );
		exit;
	}
});