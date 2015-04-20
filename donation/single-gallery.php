<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php wp_title("", true); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">

        <!-- Gallery -->
        <section class="col-8 blog-page cf">

            <div class="gallery">

                <div class="photos cf inside-photo">
                    <?php $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
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
                    if ( $attachments ) {
                        foreach ( $attachments as $attachment ) { ?>
                            <div class="col-6">
                                <a href="<?php echo $attachment->guid; ?>" data-lightbox="<?php echo $attachment->guid; ?>">
                                    <?php if(wp_get_attachment_image( $attachment->ID, 'gallery-thumba' )): ?>
                                        <?php echo wp_get_attachment_image( $attachment->ID, 'gallery-thumba' ); ?>
                                    <?php else: echo '<img src="http://placehold.it/331x306/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
                                    <span class="mask"></span>
                                </a>
                            </div>

                        <?php }
                    } else{
						if(get_the_post_thumbnail($post->ID,'ggallery-big')){
							echo get_the_post_thumbnail($post->ID,'gallery-big');
						} else{
							echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>';
						}
					} ?>
                </div>
                <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content();?>
                    <?php wp_link_pages(); ?>
                <?php endwhile; endif; ?>

            </div>


        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>