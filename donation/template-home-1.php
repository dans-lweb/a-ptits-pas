<?php
/**
 * Template Name: Template Home 1
 */
get_header(); ?>

    <?php if(ale_get_meta('sliderhome1')!="off"): ?>
        <div class="home-1-slider">
            <?php
            wp_reset_query();
            $count = ale_get_meta('home1slidercount');
            $query_gallery = new WP_Query(
                array(
                    'posts_per_page' => $count,
                    'post_type' => 'gallery',
                    'ignore_sticky_posts' => 1,
                    'post__not_in' => get_option('sticky_posts'),
                    'meta_query' => array(
                        array(
                            'key' => 'ale_galleryslider',
                            'value' => 'Enable'
                        )
                    ),
                )
            );
            if ($query_gallery->have_posts()) : ?>
                <ul class="slides">
                    <?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
                        <li>
                            <?php if(get_the_post_thumbnail($post->ID,'gallery-home1')){
                                echo get_the_post_thumbnail($post->ID,'gallery-home1');
                            } else{
                                echo '<img src="http://placehold.it/1920x649/f2f2f2/414141&amp;text=No+image" alt>';
                            }?>
                            <div class="wrapper text">
                                <h2><?php the_title(); ?></h2>
                                <a href="<?php the_permalink(); ?>" class="button"><?php _e('read more', 'aletheme'); ?></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; wp_reset_query(); ?>
        </div>
    <?php endif; ?>

    <?php if(ale_get_meta('eventshome1')!="off"): ?>
        <section class="home-1-events" <?php if(ale_get_meta('home1eventsbg')){echo 'style="background: url('.ale_get_meta('home1eventsbg').')"';} ?>>
            <div class="wrapper">
                <div class="top">
                    <h2><?php echo ale_get_meta('home1eventstitle'); ?></h2>
                    <p><?php echo ale_get_meta('home1eventsdesc'); ?></p>
                    <hr>
                </div>

                <?php
                wp_reset_query();
                $count = ale_get_meta('home1eventscount');
                $query_events = new WP_Query(
                    array(
                        'posts_per_page' => $count,
                        'post_type' => 'events',
                        'ignore_sticky_posts' => 1,
                        'post__not_in' => get_option('sticky_posts')
                    )
                );
                if ($query_events->have_posts()) : while ($query_events->have_posts()) : $query_events->the_post(); ?>
                    <article class="clearfix">
                        <div class="col-6">
                            <?php if(get_the_post_thumbnail($post->ID,'events-home1')){
                                echo get_the_post_thumbnail($post->ID,'events-home1');
                            } else{
                                echo '<img src="http://placehold.it/539x362/f2f2f2/414141&amp;text=No+image" alt>';
                            }?>
                        </div>

                        <div class="col-6">
                            <h3><?php the_title(); ?></h3>
                            <div class="string"><?php echo ale_trim_excerpt(10); ?></div>
                            <a href="<?php the_permalink(); ?>"><?php _e('Read more', 'aletheme'); ?></a>
                        </div>
                    </article>
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('donatehome1')!="off"): ?>
        <section class="home-1-donate" <?php if(ale_get_meta('home1donatebg')){echo 'style="background: url('.ale_get_meta('home1donatebg').')"';} ?>>
            <div class="wrapper clearfix">
                <div class="col-6">
                    <?php if(shortcode_exists('dgx-donate')): ?>
                        <a href="#" class="donate-button"><?php _e('Donate/pay in your money','aletheme'); ?></a>
                    <?php endif; ?>
                </div>

                <div class="col-6 text">
                    <h2><?php echo ale_get_meta('home1donatetitle'); ?></h2>
                    <p><?php echo ale_get_meta('home1donatetext'); ?></p>
                </div>

                <div class="share">
                    <span><?php _e('Share', 'aletheme'); ?>:</span>
                    <a href="<?php echo ale_get_share('twi'); ?>" onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="<?php echo ale_get_share('fb'); ?>" onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a href="<?php echo ale_get_share('pin'); ?>" onclick="window.open(this.href, 'Share on Pinterest', 'width=600,height=300'); return false">
                        <span class="fa fa-pinterest"></span>
                    </a>
                    <a href="<?php echo ale_get_share('goglp'); ?>" onclick="window.open(this.href, 'Share on Google+', 'width=600,height=300'); return false">
                        <span class="fa fa-google-plus"></span>
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('newshome1')!="off"): ?>
        <section class="home-1-news">
            <div class="wrapper clearfix">
                <h2>
                    <?php echo ale_get_meta('home1newstitle'); ?>
                    <span> / <a href="<?php echo get_post_type_archive_link('news');?>"><?php _e('All News', 'aletheme'); ?></a></span>
                </h2>
                <div class="col-4">
                    <?php
                    wp_reset_query();
                    $count = ale_get_meta('home1newscount');
                    $query_news = new WP_Query(
                        array(
                            'posts_per_page' => $count,
                            'post_type' => 'news',
                            'ignore_sticky_posts' => 1,
                            'post__not_in' => get_option('sticky_posts'),
                            'offset'=>1
                        )
                    );
                    if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); ?>
                        <article>
                            <div class="news-header">
                                <span class="date"><?php the_time('j M Y'); ?></span>
                                <span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
                                <?php the_tags('',''); ?>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                    <?php endwhile; endif; wp_reset_query();?>
                </div>

                <div class="col-8">
                    <?php
                    wp_reset_query();
                    $query_news = new WP_Query(
                        array(
                            'posts_per_page' => 1,
                            'post_type' => 'news',
                            'ignore_sticky_posts' => 1,
                            'post__not_in' => get_option('sticky_posts')
                        )
                    );
                    if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); ?>
                        <article>
                            <div class="text clearfix">
                                <?php if(get_the_post_thumbnail($post->ID,'news-home1')){
                                    echo get_the_post_thumbnail($post->ID,'news-home1');
                                } else{
                                    echo '<img src="http://placehold.it/336x246/f2f2f2/414141&amp;text=No+image" alt>';
                                }?>
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>"><?php _e('Read more', 'aletheme'); ?></a>
                                <div class="string">
                                    <?php echo ale_trim_excerpt(60); ?>
                                </div>
                            </div>

                            <?php $args = array(
                                'post_type' => 'attachment',
                                'numberposts' => 3,
                                'post_status' => null,
                                'order'				=> 'ASC',
                                'orderby'			=> 'menu_order ID',
                                'meta_query'		=> array(
                                    array(
                                        'key'		=> '_ale_hide_from_gallery',
                                        'value'		=> 0,
                                        'type'		=> 'DECIMAL',
                                    ),
                                ),
                                'post_parent' => $post->ID
                            );
                            $attachments = get_posts( $args );
                            if ( $attachments ) { ?>
                                <div class="image-block clearfix">
                                    <?php foreach ( $attachments as $attachment ) { ?>
                                        <?php echo wp_get_attachment_image( $attachment->ID, 'news-home1thumba' ); ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </article>
                    <?php endwhile; endif; wp_reset_query();?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('bloghome1')!="off"): ?>
        <div class="home-1-blog">
            <?php
            wp_reset_query();
            $count = ale_get_meta('home1blogcount');
            $li_count = 1;
            $query_post = new WP_Query(
                array(
                    'posts_per_page' => $count,
                    'post_type' => 'post',
                    'ignore_sticky_posts' => 1,
                    'post__not_in' => get_option('sticky_posts')
                )
            );
            if ($query_post->have_posts()) : ?>
                <ul class="slides">
                    <?php while ($query_post->have_posts()) : $query_post->the_post(); $li_count++;
                        if($li_count%2==0){echo '<li>';}?>
                            <article>
                                <?php if(get_the_post_thumbnail($post->ID,'post-home1')){
                                    echo get_the_post_thumbnail($post->ID,'post-home1');
                                } else{
                                    echo '<img src="http://placehold.it/320x242/f2f2f2/414141&amp;text=No+image" alt>';
                                }?>
                                <a href="<?php the_permalink(); ?>" class="text">
                                    <h2><?php the_title(); ?></h2>
                                    <span><?php $category = get_the_category(); echo $category[0]->cat_name;; ?></span>
                                </a>
                            </article>
                        <?php if($li_count%2==1){echo '</li>';} ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; wp_reset_query(); ?>
        </div>
    <?php endif; ?>

    <?php if(ale_get_meta('partnerhome1')!="off"): ?>
        <?php if(ale_get_meta('home1partnersimage1')||ale_get_meta('home1partnersimage2')||ale_get_meta('home1partnersimage3')||ale_get_meta('home1partnersimage4')||ale_get_meta('home1partnersimage5')): ?>
            <section class="home-1-partners">
                <div class="wrapper">
                    <h2><?php echo ale_get_meta('home1partnerstitle'); ?></h2>
                    <p><?php echo ale_get_meta('home1partnerstext'); ?></p>
                    <div class="items clearfix">
                        <?php if(ale_get_meta('home1partnersimage1')): ?>
                            <a href="<?php echo ale_get_meta('home1partnerslink1'); ?>">
                                <img src="<?php echo ale_get_meta('home1partnersimage1'); ?>" alt>
                            </a>
                        <?php endif; ?>

                        <?php if(ale_get_meta('home1partnersimage2')): ?>
                            <a href="<?php echo ale_get_meta('home1partnerslink2'); ?>">
                                <img src="<?php echo ale_get_meta('home1partnersimage2'); ?>" alt>
                            </a>
                        <?php endif; ?>

                        <?php if(ale_get_meta('home1partnersimage3')): ?>
                            <a href="<?php echo ale_get_meta('home1partnerslink3'); ?>">
                                <img src="<?php echo ale_get_meta('home1partnersimage3'); ?>" alt>
                            </a>
                        <?php endif; ?>

                        <?php if(ale_get_meta('home1partnersimage4')): ?>
                            <a href="<?php echo ale_get_meta('home1partnerslink4'); ?>">
                                <img src="<?php echo ale_get_meta('home1partnersimage4'); ?>" alt>
                            </a>
                        <?php endif; ?>

                        <?php if(ale_get_meta('home1partnersimage5')): ?>
                            <a href="<?php echo ale_get_meta('home1partnerslink5'); ?>">
                                <img src="<?php echo ale_get_meta('home1partnersimage5'); ?>" alt>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
<?php get_footer(); ?>