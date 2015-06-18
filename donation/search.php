<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php _e('Recherche', 'aletheme'); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">

        <!-- Blog -->
        <section class="col-8">
            <?php
            $count = 0;
            $stickies = get_option('sticky_posts');
            if( $stickies ) {
                $args = array( 'ignore_sticky_posts' => 1, 'post__not_in' => $stickies );
                global $wp_query;
                query_posts( array_merge($wp_query->query, $args));
            }
            ?>
            <div class="blog-page clearfix">
            <?php  if (have_posts()) : while (have_posts()) : the_post(); $count++; ?>
                <?php if($count == 1): ?>
                    <!-- -->
                    <article class="big">

                        <div class="img-big">
                            <?php
                            $post_type = get_post_type( $post->ID );
                            if($post_type == 'post'){
                                if(get_the_post_thumbnail($post->ID,'post-thumba')):
                                    echo get_the_post_thumbnail($post->ID,'post-thumba');
                                else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>';
                                endif;
                            }elseif($post_type == 'news'){
                                if(get_the_post_thumbnail($post->ID,'news-thumba')):
                                    echo get_the_post_thumbnail($post->ID,'news-thumba');
                                else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>';
                                endif;
                            }elseif($post_type == 'events'){
                                if(get_the_post_thumbnail($post->ID,'events-thumba')):
                                    echo get_the_post_thumbnail($post->ID,'events-thumba');
                                else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>';
                                endif;
                            }elseif($post_type == 'gallery'){
                                if(get_the_post_thumbnail($post->ID,'gallery-big')):
                                    echo get_the_post_thumbnail($post->ID,'gallery-big');
                                else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>';
                                endif;
                            }
                            ?>
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
                            <div class="info">
                                <div><span><?php _e('Par:','aletheme'); ?></span> <?php the_author();?></div>
                                <div><span><?php _e('Dans:','aletheme'); ?></span> <?php the_category(', ');?></div>
                                <div><?php the_tags('<span>Tag:</span> '); ?></div>
                            </div>
                            <div class="date"><?php the_time('j M Y');?></div>
                        </div>
                        <?php the_excerpt(); ?>
                        <a class="suite" href="<?php the_permalink();?>"><?php _e('Lire la suite','aletheme'); ?> ›</a>
                    </article>
                    <!-- -->
                    <div class="smalls grid cf">
                <?php else: ?>
                        <div class="grid-sizer"></div>
                        <!-- -->
                        <article class="col-6 small">
                            <div class="img">
                                <?php if(get_the_post_thumbnail($post->ID,'post-small')): ?>
                                    <?php echo get_the_post_thumbnail($post->ID,'post-small');?>
                                <?php else: echo '<img src="http://placehold.it/323x169/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                                <?php if( function_exists('dot_irecommendthis') ) {?>
                                    <div class="like">
                                        <p class="heart">
                                            <?php dot_irecommendthis(); ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                            <a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
                            <div class="info cf">
                                <div><span><?php _e('Le:','aletheme'); ?></span> <?php the_time('j M Y');?></div>
                                <div><span><?php _e('Par:','aletheme'); ?></span> <?php the_author();?></div>
                                <div><span><?php _e('Dans:','aletheme'); ?></span> <?php the_category(', ');?></div>
                            </div>
                        <?php the_excerpt(); ?>
                            <a class="suite" href="<?php the_permalink();?>"><?php _e('Lire la suite','aletheme'); ?> ›</a>
                            <div class="line"></div>
                        </article>
                    <?php endif; ?>
                <?php endwhile;  else: ?>
                    <!-- // <?php ale_part('notfound')?> -->
                    <p> Aucun r&eacutesultat trouv&eacute pour la recherche </p>
                <?php endif; wp_reset_query();?>
            </div>
            <?php echo ale_page_links(); ?>
        </section>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>