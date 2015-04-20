<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php wp_title("", true); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">

        <!-- Blog -->
        <section class="col-8 blog-page">
            <?php
            $stickies = get_option('sticky_posts');
            if( $stickies ) {
                $args = array( 'ignore_sticky_posts' => 1, 'post__not_in' => $stickies );
                global $wp_query;
                query_posts( array_merge($wp_query->query, $args));
            }
            ?>
            <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- -->
                <article class="big">

                    <div class="img-big">
                        <?php if(get_the_post_thumbnail($post->ID,'news-thumba')): ?>
                            <?php echo get_the_post_thumbnail($post->ID,'news-thumba');?>
                        <?php else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                        <?php if( function_exists('dot_irecommendthis') ) {?>
                            <div class="like">
                                <p class="heart">
                                    <?php dot_irecommendthis(); ?>
                                </p>
                            </div>
                        <?php } ?>
                        <div class="logo"></div>
                    </div>
                    <a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
                    <div class="cf">
                        <div class="info events">
                            <div class="calendar"><?php if(ale_get_meta('starttime')){ _e(' at ','aletheme');} echo ale_get_meta('starttime'); ?><?php if(ale_get_meta('endtime')){ _e(' - ','aletheme');} echo ale_get_meta('endtime'); ?></div>
                            <?php
                            $current_category = wp_get_post_terms($post->ID, 'news-category', array("fields" => "all"));
                            if($current_category):?>
                                <div class="category">
                                    <?php _e('Category:','aletheme'); ?>
                                    <span>
                                        <?php
                                        foreach($current_category as $curcat){
                                            echo $curcat->name.' ';
                                        }
                                        ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink();?>"><?php _e('Read more','aletheme'); ?> ›</a>
                </article>
                <!-- -->
            <?php endwhile;  endif; wp_reset_query();?>

            <?php ale_page_links(); ?>

        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>