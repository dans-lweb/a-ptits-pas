<?php
// Creating the widget
class Aletheme_Recent_Events_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'Aletheme_Recent_Events_Widget',

            // Widget name will appear in UI
            __('Aletheme Recent Events', 'aletheme'),

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
        if ( ! empty( $title ) )
            echo '<h3>';
            echo $args['before_title'] . $title . $args['after_title'];
            echo '</h3>';
        ?>
        <!-- Recent Events -->
        <?php wp_reset_query(); query_posts(
            array(
                'post_type' => 'events',
                'post__not_in' => get_option('sticky_posts'),
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => '3'
            )
        );
        if (have_posts()):
            ?>
            <div class="recent-events">

                <?php wp_reset_query(); query_posts(
                    array(
                        'post_type' => 'events',
                        'post__not_in' => get_option('sticky_posts'),
                        'orderby' => 'name',
                        'order' => 'DESC',
                        'posts_per_page' => '3'
                    )
                );
                global $post;
                ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="item cf">
                        <div class="col-3">
                            <?php if(get_the_post_thumbnail($post->ID,'event-small')): ?>
                                <?php echo get_the_post_thumbnail($post->ID,'events-small');?>
                            <?php else: echo '<img src="http://placehold.it/80x80/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                        </div>
                        <div class="col-9">
                            <a class="title" href="<?php the_permalink();?>"><?php the_title();?></a>
                            <div class="info">
                                <div class="calendar">
									<span class="fa fa-calendar"></span>
                                    <?php echo ale_get_meta('date'); ?><?php if(ale_get_meta('starttime')){ _e(' at ','aletheme');} echo ale_get_meta('starttime'); ?><?php if(ale_get_meta('endtime')){ _e(' - ','aletheme');} echo ale_get_meta('endtime'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_query();?>
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
function aletheme_recent_events_load_widget() {
    register_widget( 'Aletheme_Recent_Events_Widget' );
}
add_action( 'widgets_init', 'aletheme_recent_events_load_widget' );