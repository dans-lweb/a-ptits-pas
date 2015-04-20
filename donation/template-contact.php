<?php 
/**
 * Template Name: Template Contact
 */
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header();
?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">

			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>

		</div>
	</section>

	<!-- Google Maps -->
	<section class="map">
		<?php if(ale_get_meta('getintouchaddressmap')): ?>
			<?php $adre = ale_get_meta('getintouchaddressmap'); echo do_shortcode('[ale_map address="'.$adre.'" width="100%" height="284px"]'); ?>
		<?php else: echo '<img src="http://placehold.it/1200x284/f2f2f2/414141&amp;text=No+map" alt>'; endif; ?>
	</section>

	<!-- Contacts -->
	<section class="contacts cf">

		<div class="center">
			<div class="col-7 left">
				<h2><?php echo ale_get_meta('getintouchtitle'); ?></h2>
				<?php if(ale_get_meta('getintouchadress')): ?>
					<a href="<?php echo ale_get_meta('getintouchadress'); ?>" class="home">
					<span class="fa fa-home"></span>
					<?php echo ale_get_meta('getintouchadress'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchemail')): ?>
					<a href="<?php echo ale_get_meta('getintouchemail'); ?>" class="mail">
						<span class="fa fa-envelope"></span>
						<?php echo ale_get_meta('getintouchemail'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchskype')): ?>
					<a href="<?php echo ale_get_meta('getintouchskype'); ?>" class="skype">
						<span class="fa fa-skype"></span>
						<?php echo ale_get_meta('getintouchskype'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchtwitter')): ?>
					<a href="<?php echo ale_get_meta('getintouchtwitter'); ?>" class="twitt">
						<span class="fa fa-twitter"></span>
						<?php echo ale_get_meta('getintouchtwitter'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchphone')): ?>
					<a href="<?php echo ale_get_meta('getintouchphone'); ?>" class="phone">
						<span class="fa fa-phone"></span>
						<?php echo ale_get_meta('getintouchphone'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchflickr')): ?>
					<a href="<?php echo ale_get_meta('getintouchflickr'); ?>" class="flickr">
						<span class="fa fa-flickr"></span>
						<?php echo ale_get_meta('getintouchflickr'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchfacebook')): ?>
					<a href="<?php echo ale_get_meta('getintouchfacebook'); ?>" class="facebook">
						<span class="fa fa-facebook"></span>
						<?php echo ale_get_meta('getintouchfacebook'); ?>
					</a>
				<?php endif; ?>
				<?php if(ale_get_meta('getintouchvimeo')): ?>
					<a href="<?php echo ale_get_meta('getintouchvimeo'); ?>" class="vimeo">
						<span class="fa fa-vimeo-square"></span>
						?php echo ale_get_meta('getintouchvimeo'); ?>
					</a>
				<?php endif; ?>

				<p>
					<?php echo ale_get_meta('getintouchtext'); ?>
				</p>
			</div>

			<div class="col-5">
				<h2><?php echo ale_get_meta('leavereplytitle'); ?></h2>
				<form action="<?php the_permalink();?>" method="post">
					<?php if (isset($_GET['success'])) : ?>
						<p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
					<?php endif; ?>
					<?php if (isset($error) && isset($error['msg'])) : ?>
						<p class="error"><?php echo $error['msg']?></p>
					<?php endif; ?>
					<input name="contact[name]" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" placeholder="<?php _e('Name', 'aletheme')?>" class="name" type="text" required="required"/>
					<input name="contact[email]" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" placeholder="<?php _e('E-mail', 'aletheme')?>" class="email" type="text" required="required"/>
					<input name="contact[subject]" value="<?php echo isset($_POST['contact']['subject']) ? $_POST['contact']['subject'] : ''?>" placeholder="<?php _e('Subject', 'aletheme')?>" class="subject" type="text" required="required"/>
					<textarea name="contact[message]" placeholder="<?php _e('Message...', 'aletheme')?>" class="message" name="message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
					<span class="button-input">
						<span class="text"><input id="submit" type="submit" value="<?php _e('Send', 'aletheme')?>"/></span>
					<span class="shadow"></span>
				</span>
					<?php wp_nonce_field() ?>
				</form>

			</div>
		</div>

	</section>
<?php get_footer(); ?>