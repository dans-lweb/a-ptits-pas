<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php _e('Events', 'aletheme'); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">
        <!-- Blog -->
        <section class="col-8 blog-page story">
            <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- -->
                <article class="big">
                    <div class="img-big">
                        <?php if(get_the_post_thumbnail($post->ID,'events-thumba')): ?>
                            <?php echo get_the_post_thumbnail($post->ID,'events-thumba');?>
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
                    <span class="title"><?php the_title();?></span>
                    <div class="cf">
                        <div class="info">
                            <div><span><?php _e('By:','aletheme'); ?></span> <?php echo get_the_author(); ?></div>
                            <?php
                            $current_category = wp_get_post_terms($post->ID, 'events-category', array("fields" => "all"));
                            if($current_category):?>
                                <div>
                                    <span><?php _e('In:','aletheme'); ?></span>
                                    <?php
                                    foreach($current_category as $curcat){
                                        echo $curcat->name.' ';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php if(the_tags()): ?>
                                <div><span><?php the_tags(__('Tagged:','aletheme')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="date"><?php the_date('M j, Y');?></div>
                    </div>
                    <?php the_content();?>
                    <?php wp_link_pages(); ?>
                </article>
            <?php endwhile;  endif; wp_reset_query();?>

            <?php comments_template();?>

        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>