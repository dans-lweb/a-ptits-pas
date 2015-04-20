<?php
/**
 * Template Name: Template Home 2
 */
get_header(); ?>
    <?php if(ale_get_meta('displaysliderhome2')!="off"): ?>
        <div class="home-2-slider">
            <div class="wrapper">
                <?php
                wp_reset_query();
                $count = ale_get_meta('home2slidercount');
                $query = new WP_Query(
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
                if ($query->have_posts()) : ?>
                    <ul class="slides">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <li>
                                <?php if(get_the_post_thumbnail($post->ID,'gallery-home2')){
                                    echo get_the_post_thumbnail($post->ID,'gallery-home2');
                                } else{
                                    echo '<img src="http://placehold.it/1078x535/f2f2f2/414141&amp;text=No+image" alt>';
                                }?>
                                <div class="text">
                                    <span>
                                        <?php
                                        $current_category = wp_get_post_terms($post->ID, 'gallery-category', array("fields" => "all"));
                                        foreach($current_category as $curcat){
                                            echo $curcat->name.' ';
                                        }
                                        ?>
                                    </span>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(ale_get_meta('displayinfohome2')!="off"): ?>
        <section class="home-2-information" <?php if(ale_get_meta('home2infobg')){echo 'style="background-image: url('.ale_get_meta('home2infobg').')"';} ?>>
            <div class="wrapper">
                <h2><?php echo ale_get_meta('home2infotitle'); ?></h2>
                <p><?php echo ale_get_meta('home2infotext'); ?></p>
                <div class="items clearfix">
                    <article class="col-4 clearfix">
                        <span class="fa fa-send"></span>
                        <h3><?php echo ale_get_meta('home2infotitle1'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext1'); ?></p>
                    </article>

                    <article class="col-4 clearfix">
                        <span class="fa fa-bell"></span>
                        <h3><?php echo ale_get_meta('home2infotitle2'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext2'); ?></p>
                    </article>

                    <article class="col-4 clearfix">
                        <span class="fa fa-dropbox"></span>
                        <h3><?php echo ale_get_meta('home2infotitle3'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext3'); ?></p>
                    </article>

                    <article class="col-4 clearfix">
                        <span class="fa fa-briefcase"></span>
                        <h3><?php echo ale_get_meta('home2infotitle4'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext4'); ?></p>
                    </article>

                    <article class="col-4 clearfix">
                        <span class="fa fa-book"></span>
                        <h3><?php echo ale_get_meta('home2infotitle5'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext5'); ?></p>
                    </article>

                    <article class="col-4 clearfix">
                        <span class="fa fa-automobile"></span>
                        <h3><?php echo ale_get_meta('home2infotitle6'); ?></h3>
                        <p><?php echo ale_get_meta('home2infotext6'); ?></p>
                    </article>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('displaydonatehome2')!="off"): ?>
        <section class="home-2-donate">
            <?php if(ale_get_meta('home2donatebg')){
                echo '<img src="'.ale_get_meta('home2donatebg').'" alt>';
            } else{
                echo '<img src="http://placehold.it/1920x248/f2f2f2/414141" alt>';
            } ?>
            <div class="item">
                <div class="inner">
                    <div class="image" <?php if(ale_get_meta('home2donatebg2')){echo 'style="background-image: url('.ale_get_meta('home2donatebg2').')"';} ?>></div>

                    <div class="top clearfix">
                        <div class="col-6">
                            <h2><?php echo ale_get_meta('home2donatetitle'); ?></h2>
                        </div>
                        <div class="col-6">
                            <p><?php echo ale_get_meta('home2donatetext'); ?></p>
                        </div>
                    </div>
                    <h3>
                        <span>
                            <?php
                            if(ale_get_meta('home2donatecollam')){
                                echo ale_get_option('currencycurrent') . ale_get_meta('home2donatecollam');
                            } else {
                                echo ale_get_meta('home2donatecollam');
                                _e('0', 'aletheme');
                            }
                            ?>
                       </span>
                        <?php _e('so far!','aletheme'); ?>
                    </h3>
                    <?php
                    if(ale_get_meta('home2donatereqam') && ale_get_meta('home2donatecollam')){
                        $required = ale_get_meta('home2donatereqam');
                        $collected = ale_get_meta('home2donatecollam');
                        $total = 100 -(100 - ($collected / $required * 100));
                    } ?>
                    <!-- -->
                    <div id="line">
                        <div class="way">
                            <div class="bar"<?php if(isset($total) && $total != 0) echo 'style="width:'.$total.'%"' ?>></div>
                        </div>
                    </div>

                    <?php if(shortcode_exists('dgx-donate')): ?>
                        <div class="but">
                            <a class="button-big"><span class="text"><?php _e('Donate/pay in your money','aletheme'); ?></span><span class="shadow"></span></a>
                        </div>
                    <?php endif; ?>

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
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('displaydevhome2')!="off"): ?>
        <section class="home-2-development" <?php if(ale_get_meta('home2devbg')){echo 'style="background-image: url('.ale_get_meta('home2devbg').')"';} ?>>
            <h2><?php echo ale_get_meta('home2devtitle'); ?></h2>
            <hr>
            <a href="<?php echo ale_get_meta('home2devlink'); ?>"><?php _e('read more', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('displaybloghome2')!="off"): ?>
        <section class="home-2-blog">
            <div class="wrapper">
                <h2><?php echo ale_get_meta('home2blogtitle'); ?></h2>
                <p><?php echo ale_get_meta('home2blogtext'); ?></p>
                <?php
                wp_reset_query();
                $count = ale_get_meta('home2blogcount');
                $query = new WP_Query(
                    array(
                        'posts_per_page' => $count,
                        'post_type' => 'post',
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'comment_count',
                        'post__not_in' => get_option('sticky_posts')
                    )
                );
                if ($query->have_posts()) : ?>
                    <div class="slider">
                        <ul class="slides">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <li>
                                    <article>
                                        <div class="top">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <span class="date"><?php the_time('j M Y'); ?></span>
                                            <span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
                                            <?php the_tags('',''); ?>
                                        </div>

                                        <div class="bottom">
                                            <div class="string">
                                                <?php echo ale_trim_excerpt(30); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>"><?php _e('read more', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </article>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; wp_reset_query();?>
            </div>
        </section>
    <?php endif; ?>

    <?php if(ale_get_meta('displaypartnershome2')!="off"): ?>
        <div class="home-2-partners">
            <div class="wrapper clearfix">
                <div class="text">
                    <h2><?php echo ale_get_meta('home2partnerstitle'); ?></h2>
                    <p><?php echo ale_get_meta('home2partnerstext'); ?></p>
                </div>

                <div class="items clearfix">
                    <?php if(ale_get_meta('home2partnersimage1')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink1'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage1').'" alt>'; ?>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_meta('home2partnersimage2')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink2'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage2').'" alt>'; ?>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_meta('home2partnersimage3')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink3'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage3').'" alt>'; ?>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_meta('home2partnersimage4')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink4'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage4').'" alt>'; ?>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_meta('home2partnersimage5')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink5'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage5').'" alt>'; ?>
                        </a>
                    <?php } ?>

                    <?php if(ale_get_meta('home2partnersimage6')){ ?>
                        <a href="<?php echo ale_get_meta('home2partnerslink6'); ?>" class="item">
                            <?php echo '<img src="'.ale_get_meta('home2partnersimage6').'" alt>'; ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php get_footer(); ?>