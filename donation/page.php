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
        <section class="col-8 blog-page story">
            <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- -->
                <article class="big">
                    <?php the_content();?>
                    <?php wp_link_pages(); ?>
                </article>
            <?php endwhile;  endif; wp_reset_query();?>

        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>