<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo "\n" . __( 'Billing address', 'aletheme' ) . ":\n";
echo preg_replace( '#<br\s*/?>#i', ', ', $order->get_formatted_billing_address() ) . "\n\n";

if ( get_option( 'woocommerce_ship_to_billing_address_only' ) == 'no' && ( $shipping = $order->get_formatted_shipping_address() ) ) {

	echo __( 'Shipping address', 'aletheme' ) . ":\n";

	echo preg_replace( '#<br\s*/?>#i', ', ', $shipping ) . "\n\n";
}