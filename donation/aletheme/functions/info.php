<?php
//Theme Information Data
function aletheme_information_page(){ ?>
    <div class="wrap" id="aletheme-edit-slider-page">
        <h2><?php echo _e('Theme Information','aletheme'); ?></h2>
        <div id="optionsframework-metabox" class="metabox-holder">
            <div id="optionsframework" class="postbox">
                <h3><?php _e('General Information','aletheme'); ?></h3>
                <div class="page">
                    <ul>
                        <li><?php _e('WordPress Version','aletheme'); ?>: <b><?php echo get_bloginfo('version'); ?></b></li>
                        <li><?php _e('URL','aletheme'); ?>: <b><a href="<?php echo site_url(); ?>" target="_blank"><?php echo site_url(); ?></a></b></li>
                        <li><?php _e('Theme Version','aletheme'); ?>: <b><?php $ale_theme = wp_get_theme(); echo $ale_theme->get( 'Version' ); ?></b></li>
                        <li><?php _e('PHP Version','aletheme'); ?>: <b><?php echo phpversion(); ?></b></li>
                        <li><?php _e('MySQL server version','aletheme'); ?>: <b><?php echo  mysql_get_server_info(); ?></b></li>
                        <li><?php _e('Theme created date','aletheme'); ?>: <b>4 July 14</b></li>
                        <li><?php _e('Support Forum','aletheme'); ?>: <a href="http://alethemes.com/docs/forums" target="_blank"><b>http://alethemes.com/docs/forums</b></a></li>
                        <li><?php _e('Online Documentation','aletheme'); ?>: <a href="http://alethemes.com/docs" target="_blank"><b>http://alethemes.com/docs</b></a></li>
                    </ul>
                </div>
                <h3><?php _e('Installed Plugins','aletheme'); ?></h3>
                <div class="page">
                    <ul>
                        <?php foreach(get_option( 'active_plugins' ) as $plugin) { echo '<li>'.$plugin.'</li>'; } ?>
                    </ul>
                </div>
                <h3><?php _e('Changelog','aletheme'); ?></h3>
                <div class="page">
                    <b><i>Version 1.2 - 5 January 2015</i></b><br />
                    <p class="greycolor">
                        - Fixed Child Theme support<br />
                        - Added new template: Home Style 1<br/>
                        - Added new template: Home Style 2<br/>
                        - Added new template: Home Style 3<br/>
                        - Added new template: Home Style 4<br/>
                        - Added new template: Home Style 5<br/>
                        - Added new post type: Causes<br/>
                        - Added new post type: Volountears<br />
                        - Added option to change color schemes from admin panel (now you can use unlimited colors)<br/>
                        - Added new template: About Style 1<br />
                        - Added new template: About Style 2<br />
                        - Added new template: Gallery Style 1<br />
                        - Added new template: Gallery Style 2<br />
                        - Added new template: Gallery Style 3<br />
                        - Added new template: Blog Style 1<br />
                        - Added new template: Blog Style 2<br />
                        - Added new template: Blog Style 3<br />
                        - Added option for causes to donate via PayPal for each post<br/>
                    </p>
                    <b><i>Version 1.1 - 5 August 14</i></b><br />
                    <p class="greycolor">
                        - Fixed the responsive issue with the slider on mobile devices<br />
                        - Fixed the issue with progress bar<br />
                        - Added option to change the currency<br />
                        - Fixed the plugin Featured Video<br />
                        - Fixed the slider shortcode plugin<br />
                    </p>
                    <b><i>Version 1.0 - 4 July 14</i></b><br />
                    <p class="greycolor">
                        - Initial Release
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php }