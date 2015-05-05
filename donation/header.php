<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

	<!-- Header Top -->
	<header id="Haut" class="top cf">
		<div class="center">
			<div class="tel"><?php echo ale_get_option('headerphone1'); ?> <span><?php echo ale_get_option('headerphone2'); ?></span></div>

			<div class="right">
				<div class="block email">
					<a href="#"> Contactez nous ! </a>
				</div>

				<?php if(shortcode_exists('dgx-donate')): ?>
					<div class="block donate_">
						<a><?php _e('Aidez nous','aletheme'); ?></a>
					</div>
				<?php endif; ?>
				
				<div class="block search">
					<?php include('searchform.php'); ?>
				</div>
			</div>
			<div class="get-news-form">
				<div class="exit">x</div>
				<form action="<?php the_permalink();?>" method="post">
					<?php if (isset($_GET['success'])) : ?>
						<p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
					<?php endif; ?>
					<?php if (isset($error) && isset($error['msg'])) : ?>
						<p class="error"><?php echo $error['msg']?></p>
					<?php endif; ?>
					<input name="contact[name]" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" placeholder="<?php _e('Name', 'aletheme')?>" class="name" type="text" required="required"/>
					<input name="contact[email]" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" placeholder="<?php _e('E-mail', 'aletheme')?>" class="email" type="text" required="required"/>
					<textarea name="contact[message]" placeholder="<?php _e('Message...', 'aletheme')?>" class="message" name="message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
					<input id="submit" type="submit" value="<?php _e('Send', 'aletheme')?>"/>
					<?php wp_nonce_field() ?>
				</form>
			</div>

			<div class="donate-form">
				<div class="exit">x</div>
				<?php
				if(shortcode_exists('dgx-donate')) {
					echo do_shortcode('[dgx-donate]');
					echo '';
				} else {
					echo '<div class="install">'.__('Please install plugin' , 'aletheme').'</div>';
				} ?>
			</div>
		</div>
	</header>

	<!-- Header Main -->
	<header class="main <?php if(ale_get_meta('sliderhome1')=="on"){echo 'absolute';} ?>">
		<div class="center">
			<div class="logo">
				<?php if(ale_get_option('sitelogo')){ ?>
					<a href="<?php echo home_url(); ?>/" class="customlogo"><img src="<?php echo ale_get_option('sitelogo'); ?>" /></a>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/" class="alelogo"><?php echo bloginfo('name'); ?></a>
				<?php } ?>
			</div>

			<!-- Navigation -->
			<nav>
				<?php
				if ( has_nav_menu( 'main_menu' ) ) {
					wp_nav_menu(array(
						'theme_location'=> 'main_menu',
						'menu'			=> 'Main Menu',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
					));
				}
				?>
			</nav>

			<div id="mobile-button"><span class="fa fa-th-list"></span></div>
			<div id="mobile-menu">
				<?php
				if ( has_nav_menu( 'main_menu' ) ) {
					wp_nav_menu(array(
						'theme_location'=> 'main_menu',
						'menu'			=> 'Main Menu',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
					));
				}
				?>
			</div>
		</div>
	</header>

	<?php if(ale_get_option('displaycolorselector')!="Disable"): ?>
        <div class="color-selector">
            <div class="show-colors"></div>
            <div class="colors-content">
                <h2><?php _e('Style selector', 'aletheme'); ?></h2>
                <hr>

                <h3><?php _e('Choose background pattern', 'aletheme'); ?>:</h3>
                <div class="background-choose clearfix">
                    <div class="backgrounds">
                        <div class="background background1" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/1.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background2" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/2.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background3" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/3.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background4" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/4.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background5" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/5.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background6" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/6.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background7" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/7.png"></div>
                    </div>

                    <div class="backgrounds">
                        <div class="background background8" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/8.png"></div>
                    </div>
                </div>
                <hr>

                <h3><?php _e('Choose color sheme', 'aletheme'); ?>:</h3>
            </div>

            <div class="colors-choose clearfix">
                <div class="colors">
                    <div class="color color1"><?php _e('Click here', 'aletheme'); ?></div>
                    <div class="colorSelector" id="colorpickerHolder"></div>
                </div>

                <div class="colors">
                    <div class="color color2"><?php _e('Click here', 'aletheme'); ?></div>
                    <div class="colorSelector" id="colorpickerHolder2"></div>
                </div>

                <div class="colors">
                    <div class="color color3"><?php _e('Click here', 'aletheme'); ?></div>
                    <div class="colorSelector" id="colorpickerHolder3"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>