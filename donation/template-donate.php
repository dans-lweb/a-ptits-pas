<?php
/**
 * Template Name: Template Donate
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

	<?php if(ale_get_meta('textlinedon')!='off'): ?>
		<!-- INFO-->
		<div class="linetext donate_">
			<div class="center">
				<p>
					<?php echo ale_get_meta('donatetext'); ?>
				</p>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('donatedon')!='off'): ?>
		<!-- Donate -->
		<section class="donate_ page">

			<div class="cf">
				<div class="col-6 text">
					<h3><?php _e('Merci!','aletheme'); ?></h3>
					<h4><?php _e("Gr&acircce &agrave vous nous avons r&eacutecolt&eacute","aletheme"); ?></h4>
					<h5>
						<span>
							<?php
							if(ale_get_meta('donationcollam')){
								echo ale_get_meta('donationcollam') . ale_get_meta('currency');
							} else {
							   echo ale_get_meta('currency');
								_e('0', 'aletheme');
							}
							?>
					   </span>
						<?php _e('pour nos projets!','aletheme'); ?>
					</h5>
				</div>

				<?php if(shortcode_exists('dgx-donate')): ?>
					<div class="col-6 but">
						<a class="button-big"><span class="text"><?php _e('Aidez nous','aletheme'); ?></span><span class="shadow"></span></a>
					</div>
				<?php endif; ?>
			</div>

			<?php
			if(ale_get_meta('donationreqam') && ale_get_meta('donationcollam')){
				$required = ale_get_meta('donationreqam');
				$collected = ale_get_meta('donationcollam');
				$total = 100 -(100 - ($collected / $required * 100));
			} ?>
			<!-- -->
			<div id="line">
				<div class="way">
					<div class="bar" <?php if(isset($total) && $total != 0) echo 'style="width:'.$total.'%"' ?>></div>
				</div>
			</div>

			<!-- -->
			<?php if(ale_get_option('twi')||ale_get_option('fb')||ale_get_option('pin')||ale_get_option('sky')): ?>
				<div class="share">
					<span><?php _e('Partager:','aletheme'); ?> </span>
					<?php if(ale_get_option('twi')): ?>
						<a class="twitter" href="<?php echo ale_get_option('twi'); ?>"><span class="fa fa-twitter"></span></a>
					<?php endif; ?>
					<?php if(ale_get_option('fb')): ?>
						<a class="facebook" href="<?php echo ale_get_option('fb'); ?>"><span class="fa fa-facebook"></span></a>
					<?php endif; ?>
					<?php if(ale_get_option('pin')): ?>
						<a class="pinterest" href="<?php echo ale_get_option('pin'); ?>"><span class="fa fa-pinterest"></span></a>
					<?php endif; ?>
					<?php if(ale_get_option('sky')): ?>
						<a class="skype" href="callto:<?php echo ale_get_option('sky'); ?>"><span class="fa fa-skype"></span></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('ourcausedon')!='off'): ?>
		<!-- Our Cause -->
		<section class="cause">
			<div class="center">

				<h2><?php echo ale_get_meta('donatetitle'); ?></h2>

				<div class="causes cf">

					<div class="col-4">
						<?php if(ale_get_meta('donateimage1')): ?>
							<img src="<?php echo ale_get_meta('donateimage1'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle1'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent1'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent1'); ?>"><?php echo ale_get_meta('donatepercent1'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised1'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors1'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal1'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p></p>'; endif; ?>
					</div>

					<div class="col-4">
						<?php if(ale_get_meta('donateimage2')): ?>
							<img src="<?php echo ale_get_meta('donateimage2'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle2'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent2'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent2'); ?>"><?php echo ale_get_meta('donatepercent2'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised2'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors2'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal2'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p></p>'; endif; ?>
					</div>

					<div class="col-4">
						<?php if(ale_get_meta('donateimage3')): ?>
							<img src="<?php echo ale_get_meta('donateimage3'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle3'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent3'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent3'); ?>"><?php echo ale_get_meta('donatepercent3'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised3'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors3'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal3'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p></p>'; endif; ?>
					</div>
					
					<div class="col-4">
						<?php if(ale_get_meta('donateimage4')): ?>
							<img src="<?php echo ale_get_meta('donateimage4'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle4'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent4'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent4'); ?>"><?php echo ale_get_meta('donatepercent4'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised4'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors4'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal4'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p><p/>'; endif; ?>
					</div>

					<div class="col-4">
						<?php if(ale_get_meta('donateimage5')): ?>
							<img src="<?php echo ale_get_meta('donateimage5'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle5'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent5'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent5'); ?>"><?php echo ale_get_meta('donatepercent5'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised5'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors5'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal5'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p></p>'; endif; ?>
					</div>

					<div class="col-4">
						<?php if(ale_get_meta('donateimage6')): ?>
							<img src="<?php echo ale_get_meta('donateimage6'); ?>" alt=""/>
						
						<h3><?php echo ale_get_meta('donatetitle6'); ?></h3>

						<div class="percent">
							<div class="active" style="width: <?php echo ale_get_meta('donatepercent6'); ?>"></div>
							<div class="num" style="margin-left:0;left: <?php echo ale_get_meta('donatepercent6'); ?>"><?php echo ale_get_meta('donatepercent6'); ?></div>
						</div>

						<div class="cols cf">
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donateraised6'); ?></h4>
									<p><?php _e('Acquis','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donatedonors6'); ?></h4>
									<p><?php _e('Donateurs','aletheme'); ?></p>
								</div>
							</div>
							<div class="col-4">
								<div class="back">
									<h4><?php echo ale_get_meta('donategoal6'); ?></h4>
									<p><?php _e('Objectif','aletheme'); ?></p>
								</div>
							</div>
						</div>
						<?php else: echo '<p></p>'; endif; ?>
					</div>

				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('donatetextdon')!='off'): ?>
		<!-- Donate text -->
		<section class="donate-text">
			<div class="center">
				<div class="text cf">

					<div class="col-8">
						<h2><?php echo ale_get_meta('donatetitlebottom'); ?></h2>
						<p>
							<?php echo ale_get_meta('donatetextbottom'); ?>
						</p>
					</div>

					<div class="col-4">
						<form action="<?php the_permalink();?>" method="post">
							<?php if (isset($_GET['success'])) : ?>
								<p class="success"><?php _e('Merci pour votre message!', 'aletheme')?></p>
							<?php endif; ?>
							<?php if (isset($error) && isset($error['msg'])) : ?>
								<p class="error"><?php echo $error['msg']?></p>
							<?php endif; ?>
							<input name="contact[name]" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" placeholder="<?php _e('Nom', 'aletheme')?>" id="name" class="name" type="text" required="required"/>
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