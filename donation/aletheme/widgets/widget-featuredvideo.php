<?php
// Creating the widget
class Aletheme_Feautured_Video_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'Aletheme_Feautured_Video_Widget',

            // Widget name will appear in UI
            __('Aletheme Featured Video', 'aletheme'),

            // Widget description
            array( 'description' => __( 'A widget that displays the featured video.', 'aletheme' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $video = apply_filters( 'widget_video', $instance['video'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<div class="widget video">';
        if ( ! empty( $title ) ){
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if(!empty($video)){
            echo wp_oembed_get($video,array('width'=>'100%','height'=>'200px'));
        }
        echo '</div>';
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
        if ( isset( $instance[ 'video' ] ) ) {
            $video = $instance[ 'video' ];
        }
        else {
            $video = 'https://www.youtube.com/watch?v=4mEbABPtTv8';
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','aletheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'video' ); ?>"><?php _e( 'Video Url:','aletheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'video' ); ?>" name="<?php echo $this->get_field_name( 'video' ); ?>" type="text" value="<?php echo esc_attr( $video ); ?>" />
        </p>
    <?php
    }
} // Class wpb_widget ends here

// Register and load the widget
function aletheme_featured_video_load_widget() {
    register_widget( 'Aletheme_Feautured_Video_Widget' );
}
add_action( 'widgets_init', 'aletheme_featured_video_load_widget' );