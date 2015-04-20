<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php wp_title("", true); ?></h2>

            <?php echo get_shop_breadcrumb(); ?>

        </div>
    </section>
    <div class="center cf">
        <?php while ( have_posts() ) : the_post(); ?>
            <section class="col-8 shop story">
                <!-- -->
                <article class="big">
                    <?php wc_get_template_part( 'content', 'single-product' ); ?>

                    <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
                </article>
            </section>
        <?php endwhile; // end of the loop. ?>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>