<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
?>

<?php
// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<div class="item col-6">
    <?php
    if(get_the_post_thumbnail($post->ID,'product-mini')){
        echo get_the_post_thumbnail($post->ID,'product-mini');
    } else{
        echo'<img src="http://placehold.it/327x196/f2f2f2/414141&amp;text=No+image" alt>';
    }
    ?>
    <h3><a href="<?php  the_permalink(); ?>"><?php the_title();?><a></a></h3>
    <div class="starwrapper">
        <?php if ( $rating_html = $product->get_rating_html() ) : ?>
            <?php echo $rating_html; ?>
        <?php
        else:
            echo
            '<div class="star-rating" title="Rated 0 out of 5">
                <span style="width:0"><strong class="rating">0</strong> out of 5</span>
            </div>';
        endif; ?>
    </div>

    <div class="info">
        <div class="purchase">
            <?php wc_product_sold_count(); ?>
            <span><?php _e('Purchase','aletheme'); ?></span>
        </div>

        <div class="discount">
            <?php
            global $price;
            if ($product->is_on_sale() && $product->product_type == 'variable') : ?>

                <?php
                $available_variations = $product->get_available_variations();
                $maximumper = 0;
                for ($i = 0; $i < count($available_variations); ++$i) {
                    $variation_id=$available_variations[$i]['variation_id'];
                    $variable_product1= new WC_Product_Variation( $variation_id );
                    $regular_price = $variable_product1 ->regular_price;
                    $sales_price = $variable_product1 ->sale_price;
                    $percentage= round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
                    if ($percentage > $maximumper) {
                        $maximumper = $percentage;
                    }
                }
                echo $price . sprintf( __('%s', 'aletheme' ), $maximumper . '%' ); ?>

            <?php elseif($product->is_on_sale() && $product->product_type == 'simple') : ?>

                <?php
                $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
                echo $price . sprintf( __('%s', 'aletheme' ), $percentage . '%' ); ?>

            <?php else: echo '0%'; endif; ?>
            <span><?php _e('Discount','aletheme'); ?></span>
        </div>

        <div class="price">
            <?php woocommerce_template_single_price(); ?>
            <span><?php _e('Price','aletheme'); ?></span>
        </div>
    </div>
    <div class="add-to-cart">
        <?php if ( is_user_logged_in() ) : ?>
            <?php $current_user = wp_get_current_user();
            $add_to_cart = __('Add to cart','aletheme');
            ?>
            <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s mycred-points-link">'.$add_to_cart.'</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                    esc_attr( $product->product_type ),
                    esc_html( $product->add_to_cart_text('test') )
                ),
                $product );
            ?>
        <?php else : ?>
            <a href="<?php echo get_site_url(); ?>/wp-signup.php" class="add_to_cart_button"><?php _e('Add to cart','aletheme'); ?></a>
        <?php endif; ?>
    </div>
</div>