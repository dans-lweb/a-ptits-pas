<?php
// Creating the widget
class Aletheme_Best_Sellers_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'Aletheme_Best_Sellers_Widget',

            // Widget name will appear in UI
            __('Aletheme Best Sellers', 'aletheme'),

            // Widget description
            array( 'description' => __( 'A widget that displays the best sellers', 'aletheme' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        global $post;

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
        );

        $products = new WP_Query( $args );

        if ( $products->have_posts() && function_exists('woocommerce_template_single_price') ) : ?>

            <p class="caption"><?php if ( ! empty( $title ) ) echo  $title; ?></p>
            <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                <div class="item">
                    <div class="text">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                        <?php woocommerce_template_single_price(); ?>
                    </div>
                    <?php
                    if(get_the_post_thumbnail($post->ID,'product-bestsellers')){
                        echo get_the_post_thumbnail($post->ID,'product-bestsellers');
                    }else{
                        echo '<img src="http://placehold.it/58x34/f2f2f2/414141&amp;text=No+image" alt>';
                    }

                    ?>
                </div>
            <?php endwhile; // end of the loop.
            else: echo 'No product found';

         endif; wp_reset_postdata();
        do_shortcode('best_selling_products per_page');

    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Best Sellers', 'aletheme' );
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','aletheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function aletheme_best_sellers_load_widget() {
    register_widget( 'Aletheme_Best_Sellers_Widget' );
}
add_action( 'widgets_init', 'aletheme_best_sellers_load_widget' );