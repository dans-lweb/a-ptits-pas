<?php
/**
 * Template Name: Template About
 */
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">

			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>

		</div>
	</section>

	<?php if(ale_get_meta('textlineabout')!='off'): ?>
		<!-- INFO-->
		<div class="linetext">
			<div class="center">
				<p>
					<?php echo ale_get_meta('abouttext'); ?>
				</p>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('informationabout')!='off'): ?>
		<section class="info i2">
			<div class="center cf">
				<div class="col-4 ">
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_bebe.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle1'); ?></h3>
						<p><?php echo ale_get_meta('infotext1'); ?></p>
					</div>
				</div>
				<div class="col-4 ">
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_famille.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle2'); ?></h3>
						<p><?php echo ale_get_meta('infotext2'); ?></p>
					</div>
				</div>
				<div class="col-4 ">
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_plus.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle3'); ?></h3>
						<p><?php echo ale_get_meta('infotext3'); ?></p>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('highermanabout')!='off'): ?>
		<!-- Management -->
		<section class="management">
			<div class="center">

				<h2><?php echo ale_get_meta('highermantitle'); ?></h2>

				<div class="peoples cf">

					<div class="col-3">
						<?php if(ale_get_meta('highermanphoto1')): ?>
							<img src="<?php echo ale_get_meta('highermanphoto1'); ?>" alt=""/>
						<?php else: echo '<img src="http://placehold.it/250x318/f2f2f2/414141" alt>'; endif; ?>
						<div class="name"><?php echo ale_get_meta('highermanname1'); ?></div>
						<div class="spec"><?php echo ale_get_meta('highermanspec1'); ?></div>
						<p><?php echo ale_get_meta('highermantext1'); ?></p>

						<div class="contacts">
							<?php if(ale_get_meta('highermantwitter1')): ?>
								<a class="twitter" href="<?php echo ale_get_meta('highermantwitter1'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanfacebook1')): ?>
								<a class="facebook" href="<?php echo ale_get_meta('highermanfacebook1'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanpinterest1')): ?>
								<a class="pinterest" href="<?php echo ale_get_meta('highermanpinterest1'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanskype1')): ?>
								<a class="skype" href="<?php echo ale_get_meta('highermanskype1'); ?>"></a>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-3">
						<?php if(ale_get_meta('highermanphoto2')): ?>
							<img src="<?php echo ale_get_meta('highermanphoto2'); ?>" alt=""/>
						<?php else: echo '<img src="http://placehold.it/250x318/f2f2f2/414141" alt>'; endif; ?>
						<div class="name"><?php echo ale_get_meta('highermanname2'); ?></div>
						<div class="spec"><?php echo ale_get_meta('highermanspec2'); ?></div>
						<p><?php echo ale_get_meta('highermantext2'); ?></p>

						<div class="contacts">
							<?php if(ale_get_meta('highermantwitter2')): ?>
								<a class="twitter" href="<?php echo ale_get_meta('highermantwitter2'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanfacebook2')): ?>
								<a class="facebook" href="<?php echo ale_get_meta('highermanfacebook2'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanpinterest2')): ?>
								<a class="pinterest" href="<?php echo ale_get_meta('highermanpinterest2'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanskype2')): ?>
								<a class="skype" href="<?php echo ale_get_meta('highermanskype2'); ?>"></a>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-3">
						<?php if(ale_get_meta('highermanphoto3')): ?>
							<img src="<?php echo ale_get_meta('highermanphoto3'); ?>" alt=""/>
						<?php else: echo '<img src="http://placehold.it/250x318/f2f2f2/414141" alt>'; endif; ?>
						<div class="name"><?php echo ale_get_meta('highermanname3'); ?></div>
						<div class="spec"><?php echo ale_get_meta('highermanspec3'); ?></div>
						<p><?php echo ale_get_meta('highermantext3'); ?></p>

						<div class="contacts">
							<?php if(ale_get_meta('highermantwitter3')): ?>
								<a class="twitter" href="<?php echo ale_get_meta('highermantwitter3'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanfacebook3')): ?>
								<a class="facebook" href="<?php echo ale_get_meta('highermanfacebook3'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanpinterest3')): ?>
								<a class="pinterest" href="<?php echo ale_get_meta('highermanpinterest3'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanskype3')): ?>
								<a class="skype" href="<?php echo ale_get_meta('highermanskype3'); ?>"></a>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-3">
						<?php if(ale_get_meta('highermanphoto4')): ?>
							<img src="<?php echo ale_get_meta('highermanphoto4'); ?>" alt=""/>
						<?php else: echo '<img src="http://placehold.it/250x318/f2f2f2/414141" alt>'; endif; ?>
						<div class="name"><?php echo ale_get_meta('highermanname4'); ?></div>
						<div class="spec"><?php echo ale_get_meta('highermanspec4'); ?></div>
						<p><?php echo ale_get_meta('highermantext4'); ?></p>

						<div class="contacts">
							<?php if(ale_get_meta('highermantwitter4')): ?>
								<a class="twitter" href="<?php echo ale_get_meta('highermantwitter4'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanfacebook4')): ?>
								<a class="facebook" href="<?php echo ale_get_meta('highermanfacebook4'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanpinterest4')): ?>
								<a class="pinterest" href="<?php echo ale_get_meta('highermanpinterest4'); ?>"></a>
							<?php endif; ?>
							<?php if(ale_get_meta('highermanskype4')): ?>
								<a class="skype" href="<?php echo ale_get_meta('highermanskype4'); ?>"></a>
							<?php endif; ?>
						</div>
					</div>

				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('organdetabout')!='off'): ?>
		<!-- Org Details -->
		<section class="org-details">
			<div class="center">

				<h2><?php echo ale_get_meta('orgdettitle'); ?></h2>

				<div class="items cf">
					<div class="col-4">
						<h3><?php echo ale_get_meta('orgdettitle1'); ?></h3>
						<p>
							<?php echo ale_get_meta('orgdettext1'); ?>
						</p>
						<!--<a href="<?php echo ale_get_meta('orgdetlink1'); ?>"><?php _e('Read more','aletheme'); ?> ›</a>-->
					</div>

					<div class="col-4">
						<h3><?php echo ale_get_meta('orgdettitle2'); ?></h3>
						<p>
							<?php echo ale_get_meta('orgdettext2'); ?>
						</p>
						<!--<a href="<?php echo ale_get_meta('orgdetlink2'); ?>"><?php _e('Read more','aletheme'); ?> ›</a>-->
					</div>

					<div class="col-4">
						<h3><?php echo ale_get_meta('orgdettitle3'); ?></h3>
						<p>
							<?php echo ale_get_meta('orgdettext3'); ?>
						</p>
						<!--<a href="<?php echo ale_get_meta('orgdetlink3'); ?>"><?php _e('Read more','aletheme'); ?> ›</a>-->
					</div>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('howcanyouhelpabout')!='off'): ?>
		<!-- How Can You Help -->
		<section class="you-help">
			<div class="center">

				<h2><?php echo ale_get_meta('howhelptitle'); ?></h2>

				<div class="cf">

					<div class="col-8">
						<p>
							<?php echo ale_get_meta('howhelptext'); ?>
						</p>
						<!--<a href="<?php echo ale_get_meta('howhelplink'); ?>"><?php _e('Read more','aletheme'); ?> ›</a>-->
					</div>

					<div class="col-4">
						<form action="<?php the_permalink();?>" method="post">
							<?php if (isset($_GET['success'])) : ?>
								<p class="success"><?php _e('Merci pour votre message!', 'aletheme')?></p>
							<?php endif; ?>
							<?php if (isset($error) && isset($error['msg'])) : ?>
								<p class="error"><?php echo $error['msg']?></p>
							<?php endif; ?>
							<input name="contact[email]" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" placeholder="<?php _e('E-mail', 'aletheme')?>" id="email" class="email" type="text" required="required"/>
							<textarea name="contact[message]" placeholder="<?php _e('Message...', 'aletheme')?>" class="message" name="message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
							
							<span class="button-input">
								<span class="text"><input id="submit" type="submit" value="<?php _e('Envoyer', 'aletheme')?>"/></span>
								<span class="shadow"></span>
							</span>
							<?php wp_nonce_field() ?>
						</form>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>
<?php get_footer(); ?>