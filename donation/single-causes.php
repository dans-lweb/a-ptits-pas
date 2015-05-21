<?php get_header();
 ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">

			<h2><?php _e('Projet', 'aletheme'); ?></h2>

			<?php echo get_breadcrumbs(); ?>

		</div>
	</section>

	<div class="center cf">
		<!-- Blog -->
		<div class="col-10 blog-page story single-causes">
			<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- -->
				<article>
					<?php if(get_the_post_thumbnail($post->ID, 'causes-image')){
						echo get_the_post_thumbnail($post->ID, 'causes-image');
					} else{
						echo '<img src="http://placehold.it/862x294/f2f2f2/414141&amp;text=No+image" alt>';
					} ?>

					<div class="information clearfix">
						<div class="author">
							<span><?php _e('Par', 'aletheme'); ?>:</span>
							<?php the_author(); ?>
						</div>

						<div class="tags">
							<span><?php _e('Tag', 'aletheme'); ?>:</span>
							<?php the_tags('',', '); ?>
						</div>

						<div class="date">
							<span class="fa fa-calendar"></span>
							<?php the_time('j F Y'); ?>
						</div>
					</div>

					<h1><?php the_title(); ?></h1>

					<?php
					$goal = intval(ale_get_meta('causesgoal'));
					$donated = intval(ale_get_meta('causesdonated'));
					if($goal>0 && $donated>0){
						$total_procent = $donated / $goal * 100;
					} else{
						$total_procent = 0;
					}
					?>
					<div class="progress">
						<div class="line" style="width: <?php echo $total_procent; ?>%"></div>
					</div>

					<div class="donation-result clearfix">
						<?php if(ale_get_meta('causesdonated')): ?>
							<div class="item">
								<span class="value"><?php echo ale_get_meta('causesdonated'); ?></span>
								<span class="description"><?php _e('Dons', 'aletheme'); ?></span>
							</div>
						<?php endif; ?>

						<?php if(ale_get_meta('causesdonors')): ?>
							<div class="item donors">
								<span class="value"><?php echo ale_get_meta('causesdonors'); ?></span>
								<span class="description"><?php _e('Donneurs', 'aletheme'); ?></span>
							</div>
						<?php endif; ?>

						<?php if(ale_get_meta('causesgoal')): ?>
							<div class="item">
								<span class="value"><?php echo ale_get_option('causesgoal') . ' '. ale_get_meta('currencycurrent'); ?></span>
								<span class="description"><?php _e('But', 'aletheme'); ?></span>
							</div>
						<?php endif; ?>
					</div>

					<?php
					//PayPal
					$payments_enabled = ale_get_option('enable_paypal');
					$paypal_merchant_id = ale_get_option('merchant_email');
					$enable_sandbox = ale_get_option('enable_sandbox');
					$currency_code = ale_get_option('paypal_currency');

					if (($payments_enabled == "1") && (!empty($paypal_merchant_id)) && (!empty($currency_code))) {
						$payment_status = ale_get_meta('payment_status', true, $post->ID);
							?>
							<span class="button-donate" style="top:0px;"><?php _e('Donner', 'aletheme'); ?></span>
							<div class="donation-amount-block clearfix <?php if(isset($payment_amount)&&!empty($payment_amount)){echo 'visible';} ?>">
								<script src="<?php echo get_template_directory_uri() . "/js/libs/paypal-button.min.js?merchant=$paypal_merchant_id"; ?>"
									<?php if ($enable_sandbox == "1"){ ?>
									data-env="sandbox"
									<?php } ?>
									data-button="donate"
									data-callback="<?php echo get_template_directory_uri() . "/aletheme/paypal/ipn.php"; ?>"
									data-tax="0"
									data-shipping="0"
									data-currency="<?php echo $currency_code; ?>"
									data-amount-editable="<?php echo $payment_amount; ?>"
									data-quantity="1"
									data-name="<?php the_title(); ?>"
									data-number="<?php echo $post->ID; ?>"
									data-lc="fr_FR"
									>
								</script>
							</div>
						<?php
					}

					//Get Donors List
					$donor_list = get_post_meta($post->ID, 'ale_paypal_details', true);
					if(isset($donor_list) && !empty($donor_list)){
						echo '<div class="donors-list"><ul>';
							foreach ($donor_list as $pp_stat){
								if($pp_stat['ale_payment_status']=='Completed') {?>
									<!--<li>
										 <span> <?php _e('Date', 'aletheme'); ?>: <?php echo $pp_stat['ale_payment_date'] ?></span>
										<span> <?php _e('Name', 'aletheme'); ?>: <?php echo $pp_stat['ale_first_name']; ?></span>
										<span> <?php _e('Surname', 'aletheme'); ?>: <?php echo $pp_stat['ale_last_name']; ?></span>
										<span> <?php _e('Offered', 'aletheme'); ?>: <?php echo $pp_stat['ale_payment_gross']; ?></span>
										<span> <?php _e('in', 'aletheme'); ?> <?php echo $pp_stat['ale_mc_currency']; ?></span>  
									</li>-->
								<?php } ?>
							<?php } 
						echo "</ul></div>";
					}
					?>
					<hr class="hr">
					<?php the_content();?>
					<?php wp_link_pages(); ?>
					<hr class="hr">
				</article>
			<?php endwhile; endif; wp_reset_query();?>
			
			<p style="margin-left:150px; margin-top:10px; font-size:20px; font-weight:bold"> Pour nous aider à financer ce projet</p>
							<span class="button-donate"><?php _e('Donner', 'aletheme'); ?></span>
							<div class="donation-amount-block clearfix <?php if(isset($payment_amount)&&!empty($payment_amount)){echo 'visible';} ?>">
								<script src="<?php echo get_template_directory_uri() . "/js/libs/paypal-button.min.js?merchant=$paypal_merchant_id"; ?>"
									<?php if ($enable_sandbox == "1"){ ?>
									data-env="sandbox"
									<?php } ?>
									data-button="donate"
									data-callback="<?php echo get_template_directory_uri() . "/aletheme/paypal/ipn.php"; ?>"
									data-tax="0"
									data-shipping="0"
									data-currency="<?php echo $currency_code; ?>"
									data-amount-editable="<?php echo $payment_amount; ?>"
									data-quantity="1"
									data-name="<?php the_title(); ?>"
									data-number="<?php echo $post->ID; ?>"
									data-lc="fr_FR"
									>
								</script>
							</div>
						
					
			<div class="assign-volountears">
				<h3><?php echo ale_get_option('causesvolountearstitle'); ?></h3>
				<p><?php echo ale_get_option('causesvolountearstext'); ?></p>

				<div class="items">
					<?php $query_volountears = new WP_Query(
						array(
							'posts_per_page' => 4,
							'post_type' => 'volountears',
							'meta_query' => array(
							array(
									'key' => 'ale_assigned_volountear',
									'value' => get_the_ID()
								),
							),
						)
					);
					if ($query_volountears->have_posts()) : while ($query_volountears->have_posts()) : $query_volountears->the_post(); ?>
						<article class="clearfix">
							<div class="image">
								<?php if(get_the_post_thumbnail($post->ID,'volountears-home3')){
									echo get_the_post_thumbnail($post->ID,'volountears-home3');
								} else{
									echo '<img src="http://placehold.it/70x70/f2f2f2/414141&amp;text=No+image" alt>';
								}?>
							</div>

							<div class="text">
								<h3><?php the_title(); ?></h3>
								<p><?php echo ale_get_meta('volountearsaddress'); ?></p>
							</div>
							<a href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'aletheme'); ?></a>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		</div>
		<?php comments_template();?>
	</div>
<?php get_footer(); ?>