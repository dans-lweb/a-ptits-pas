<?php
global $post, $product, $price;
?>
<div class="col-8 description">
    <div class="images">
        <?php
        if(get_the_post_thumbnail($post->ID,'product-thumba')){
            echo get_the_post_thumbnail($post->ID,'product-thumba');
        }
        else{
            echo '<img src="http://placehold.it/440x260/f2f2f2/414141&amp;text=No+image" alt>';
        }
        ?>

        <?php do_action( 'woocommerce_product_thumbnails' ); ?>
    </div>

    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<div class="col-4">
    <div class="info">
        <h1><?php the_title();?></h1>
        <div class="price">
            <?php woocommerce_template_single_price(); ?>
            <span><?php _e('Price','aletheme'); ?> </span>
        </div>
        <div class="discount">
            <?php
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
            <span><?php _e('Discount','aletheme'); ?> </span>
        </div>
        <?php if ( $product->is_in_stock() ) : ?>

        <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

        <form class="cart" method="post" enctype='multipart/form-data'>
            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

            <?php
            if ( ! $product->is_sold_individually() )
                woocommerce_quantity_input( array(
                    'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
                    'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
                ) );
            ?>

            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

            <button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        </form>

        <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

    <?php endif; ?>
    </div>
</div>