<?php
// Creating the widget
class Aletheme_Photostream_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'Aletheme_Photostream_Widget',

            // Widget name will appear in UI
            __('Aletheme Photostream', 'aletheme'),

            // Widget description
            array( 'description' => __( 'A widget that displays the recent events.', 'aletheme' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>
        <!-- Photostream -->
        <?php wp_reset_query(); query_posts(
            array(
                'post_type' => array('post','events', 'news', 'gallery'),
                'post__not_in' => get_option('sticky_posts'),
                'orderby' => 'rand',
                'posts_per_page' => '18'
            )
        );
        global $post;
        if (have_posts()):
            ?>
            <div id="photostream">
                <h3>
                    <?php
                    if ( ! empty( $title ) ){
                        echo $args['before_title'] . $title . $args['after_title'];
                    } else{ echo'<div class="no-title"></div>';}
                    ?>
                    <span class="control">
                <span class="left"><span class="fa fa-angle-left"></span></span>
                <span class="right"><span class="fa fa-angle-right"></span></span>
            </span>
                </h3>

                <ul class="slides">
                    <?php $count = 0; while (have_posts()) : the_post(); $count++; ?>
                        <?php if($count % 9 == 1 ){ echo '<li>'; } ?>
                        <div class="col-4">
                            <a href="<?php the_permalink();?>">
                                <?php if(get_the_post_thumbnail($post->ID,'post-stream')): ?>
                                    <?php echo get_the_post_thumbnail($post->ID,'post-stream');?>
                                <?php else: echo '<img src="http://placehold.it/111x98/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                                <span class="mask"></span>
                            </a>
                        </div>
                        <?php if($count % 9 == 0 ){ echo '</li>'; } ?>
                    <?php endwhile; ?>
                </ul>

            </div>
        <?php endif; wp_reset_query(); ?>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'aletheme' );
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','aletheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }
} // Class wpb_widget ends here

// Register and load the widget
function aletheme_photostream_load_widget() {
    register_widget( 'Aletheme_Photostream_Widget' );
}
add_action( 'widgets_init', 'aletheme_photostream_load_widget' );