<?php
// Creating the widget
class Aletheme_Tab_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'Aletheme_Tab_Widget',

        // Widget name will appear in UI
        __('Aletheme Tab Widget', 'aletheme'),

        // Widget description
        array( 'description' => __( 'A widget that displays the popular, latest and recent comment posts in tabs.', 'aletheme' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ){
            echo '<h3>';
            echo $args['before_title'] . $title . $args['after_title'];
            echo '</h3>';
        }
        ?>
        <!-- ASIDE DYNAMIC -->
        <div id="aside-dynamic">

            <div class="menu cf">
                <div class="active" data-attr="m1"><?php _e('Popular','aletheme'); ?></div>
                <div data-attr="m2"><?php _e('Latest','aletheme'); ?></div>
                <div data-attr="m3"><?php _e('Comments','aletheme'); ?></div>
            </div>

            <div class="content m1">
                <?php wp_reset_query(); query_posts(
                    array(
                        'post__not_in' => get_option('sticky_posts'),
                        'orderby' => 'comment_count',
                        'order' => 'DESC',
                        'posts_per_page' => '3'
                    )
                );
                global $post;
                ?>
                <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="item cf">
                        <div class="col-3">
                            <?php if(get_the_post_thumbnail($post->ID,'post-mini')): ?>
                                <?php echo get_the_post_thumbnail($post->ID,'post-mini');?>
                            <?php else: echo '<img src="http://placehold.it/80x80/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                        </div>
                        <div class="col-9">
                            <a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
                            <p>
                                <?php echo ale_trim_excerpt(10); ?>
                            </p>
                            <div class="info">
                                <div class="date"><?php the_time('M j, Y');?></div>
                                <div class="comments"><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?> <?php _e('comments','aletheme'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  endif; wp_reset_query();?>
            </div>

            <div class="content m2" style="display: none">

                <?php wp_reset_query(); query_posts(
                    array(
                        'post__not_in' => get_option('sticky_posts'),
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => '3'
                    )
                )
                ?>
                <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="item cf">
                        <div class="col-3">
                            <?php if(get_the_post_thumbnail($post->ID,'post-mini')): ?>
                                <?php echo get_the_post_thumbnail($post->ID,'post-mini');?>
                            <?php else: echo '<img src="http://placehold.it/80x80/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                        </div>
                        <div class="col-9">
                            <a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
                            <p>
                                <?php echo ale_trim_excerpt(10); ?>
                            </p>
                            <div class="info">
                                <div class="date"><?php the_time('M j, Y');?></div>
                                <div class="comments"><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?> <?php _e('comments','aletheme'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  endif; wp_reset_query();?>
            </div>

            <div class="content m3" style="display: none">
                <?php /* Get recent comments */
                global $wpdb;

                $sql = "SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND post_type='post' ORDER BY comment_date_gmt DESC LIMIT 3";

                $comments = $wpdb->get_results($sql);

                foreach ($comments as $comment) {?>
                    <div class="item cf">
                        <div class="col-3">
                            <?php if(get_the_post_thumbnail($comment->ID,'post-mini')): ?>
                                <?php echo get_the_post_thumbnail($comment->ID,'post-mini'); ?>
                            <?php else: echo '<img src="http://placehold.it/80x80/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                        </div>
                        <div class="col-9">
                            <a href="<?php echo get_permalink($comment->ID);?>" class="title"><?php echo $comment->post_title?></a>
                            <p>
                                <?php
                                $explicit_excerpt = $comment->post_content;
                                if ( '' == $explicit_excerpt ) {
                                    $text = get_the_content('');
                                    $text = apply_filters('the_content', $text);
                                    $text = str_replace(']]>', ']]>', $text);
                                }
                                else {
                                    $text = apply_filters('the_content', $explicit_excerpt);
                                }
                                $text = strip_shortcodes( $text ); // optional
                                $text = strip_tags($text);
                                $excerpt_length = 10;
                                $words = explode(' ', $text, $excerpt_length + 1);
                                if (count($words)> $excerpt_length) {
                                    array_pop($words);
                                    $text = implode(' ', $words);
                                    $text = apply_filters('the_excerpt',$text);
                                }
                                echo $text;
                                ?>
                            </p>
                            <div class="info">
                                <div class="date"><?php the_time('M j, Y');?></div>
                                <div class="comments"><?php $comments_count = wp_count_comments($comment->ID); echo $comments_count->total_comments; ?> <?php _e('comments','aletheme'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
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
    function aletheme_load_widget() {
        register_widget( 'Aletheme_Tab_Widget' );
}
add_action( 'widgets_init', 'aletheme_load_widget' );