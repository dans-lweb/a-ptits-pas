<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2>
                <?php
                $current_category = wp_get_post_terms($post->ID, 'gallery-category', array("fields" => "all"));
                foreach($current_category as $curcat){
                    echo $curcat->name.' ';
                }
                ?>
            </h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">

        <!-- Gallery -->
        <section class="col-8 blog-page cf">

            <div class="gallery">

                <div class="menu cf">
                    <a href="<?php echo get_post_type_archive_link('gallery');?>"><?php _e('All','aletheme'); ?></a>
                    <?php $args = array(
                        'type'                     => 'gallery',
                        'child_of'                 => 0,
                        'parent'                   => '',
                        'orderby'                  => 'name',
                        'order'                    => 'ASC',
                        'hide_empty'               => 1,
                        'hierarchical'             => 1,
                        'exclude'                  => '',
                        'include'                  => '',
                        'number'                   => '',
                        'taxonomy'                 => 'gallery-category',
                        'pad_counts'               => false );

                    $categories = get_categories( $args ); ?>
                    <?php foreach($categories as $cat){
                        echo '<a href="'.home_url().'/gallery-category/'.$cat->slug.'"';
                        $current_category = wp_get_post_terms($post->ID, "gallery-category", array("fields" => "all"));
                        foreach($current_category as $curcat){
                            if($curcat->slug == $cat->slug){echo 'class="active"';}
                        }
                        echo '>'.$cat->name.'</a>';
                    }?>
                </div>

                <div class="photos cf">
                    <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-6">
                            <a href="<?php the_permalink();?>">
                                <?php if(get_the_post_thumbnail($post->ID,'gallery-thumba')): ?>
                                    <?php echo get_the_post_thumbnail($post->ID,'gallery-thumba');?>
                                <?php else: echo '<img src="http://placehold.it/331x306/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                                <span class="mask"></span>
                                <?php if( function_exists('dot_irecommendthis') ) {?>
                                    <div class="like">
                                        <p class="heart">
                                            <?php dot_irecommendthis(); ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php endwhile;  endif; ?>
                </div>

            </div>

            <?php ale_page_links(); ?>

        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>