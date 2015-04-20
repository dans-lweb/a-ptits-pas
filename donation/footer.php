    <!-- Section Bottom -->
    <footer>
        <div class="line">
            <div class="center cf">
                <?php
                if ( has_nav_menu( 'footer_menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                        'depth'         => 1,
                        'menu_class'    => 'links'
                    ));
                }
                ?>
                <?php if (ale_get_option('copyrights')) : ?>
                    <div class="copy"><?php echo ale_get_option('copyrights'); ?></div>
                <?php else: ?>
                    <div class="copy">© <?php _e('2014  All rights reserved.','aletheme'); ?> <span><?php echo bloginfo('name'); ?></span> </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer">
            <div class="center cf">
                <div class="col-4">
                    <h3><?php echo ale_get_option('footerinfotitle'); ?></h3>
                    <p>
                        <?php echo ale_get_option('footerinfotext'); ?>
                    </p>
                    <div class="social">
                        <?php if(ale_get_option('twi')){ ?>
                        <a href="<?php echo ale_get_option('twi'); ?>" class="twitter"><span class="fa fa-twitter"></span></a>
                        <?php } ?>
                        <?php if(ale_get_option('fb')){ ?>
                        <a href="<?php echo ale_get_option('fb'); ?>" class="facebook"><span class="fa fa-facebook"></span></a>
                        <?php } ?>
                        <?php if(ale_get_option('gog')){ ?>
                        <a href="<?php echo ale_get_option('gog'); ?>" class="google"><span class="fa fa-google-plus"></span></a>
                        <?php } ?>
                        <?php if(ale_get_option('flickr')){ ?>
                        <a href="<?php echo ale_get_option('flickr'); ?>" class="flickr"><span class="fa fa-flickr"></span></a>
                        <?php } ?>
                        <?php if(ale_get_option('you')){ ?>
                        <a href="<?php echo ale_get_option('you'); ?>" class="youtube"><span class="fa fa-youtube-play"></span></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-4 twits">
                    <h3><span class="fa fa-twitter"></span><?php echo ale_get_option('footertwittertitle'); ?></h3>
                    <?php if(class_exists('tp_widget_recent_tweets')): twitt(); else: echo 'Install Recent Tweets Widget'; endif; ?>
                </div>
                <div class="col-4 contacts">
                    <h3><?php echo ale_get_option('footercontacttitle'); ?></h3>
                    <div class="phone"><span class="fa fa-mobile"></span><span><?php echo ale_get_option('footercontacthone1'); ?></span> <?php echo ale_get_option('footercontacthone2'); ?></div>
                    <div class="adress">
                        <span class="fa fa-globe"></span>
                        <span><?php echo ale_get_option('footercontactaddress1'); ?></span><br>
                        <?php echo ale_get_option('footercontactaddress2'); ?>
                    </div>
                    <div class="email"><span class="fa fa-envelope"></span><?php echo ale_get_option('footercontactemail'); ?></div>
                </div>
                <?php if(ale_get_option('footer_info')):?>
                    <div class="footer-info col-12">
                        <?php echo ale_get_option('footer_info'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <?php wp_footer(); ?>
</body>
</html>