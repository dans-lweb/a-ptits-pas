<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php _e('Error 404','aletheme'); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">
        <!-- Blog -->
        <section class="col-8 blog-page story">
                <!-- -->
                <article class="big">
                    <div class="h2" ><?php _e('Error 404','aletheme'); ?></div>

                    <div class="contact-content">

                        <h1 class="errorh1"><?php _e('Erreur, page introuvable','aletheme'); ?></h1>
                        <p class="errorh1"><?php _e('Désolé, mais la page que vous cherchez n\'existe pas. Verifiez l\'URL et raffraichissez la page. ','aletheme'); ?></p>

                    </div>


                    <div class="line"></div>

                    <div class="contact-footer">
                        <p class="errorh1">
                            <a href="<?php echo home_url();?>" class="gohomebut"><?php _e('Retour à l\'accueil','aletheme'); ?></a>
                        </p>
                    </div>
                </article>

        </section>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>