<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby dropdown">
		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => __( 'Default sorting', 'aletheme' ),
				'popularity' => __( 'Sort by popularity', 'aletheme' ),
				'rating'     => __( 'Sort by average rating', 'aletheme' ),
				'date'       => __( 'Sort by newness', 'aletheme' ),
				'price'      => __( 'Sort by price: low to high', 'aletheme' ),
				'price-desc' => __( 'Sort by price: high to low', 'aletheme' )
			) );

			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
				unset( $catalog_orderby['rating'] );

			foreach ( $catalog_orderby as $id => $name )
				echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
		?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key )
				continue;
			
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
<div class="top-cart col-4">
    <?php
    if(!sizeof( $woocommerce->cart->cart_contents ) == 0){?>
        <span class="cart-box"></span>
    <?php } else { ?>
        <span class="cart-box2"></span>
    <?php } ?>
    <div class="widget_shopping_cart_content"></div>
</div>
