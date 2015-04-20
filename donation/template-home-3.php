<?php
/**
 * Template Name: Template Home 3
 */
get_header(); ?>
	<?php if(ale_get_meta('displaysliderhome3')!="off"): ?>
		<div class="home-3-slider">
			<?php
			wp_reset_query();
			$count = ale_get_meta('home3slidercount');
			$query = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'gallery',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts'),
					'meta_query' => array(
						array(
							'key' => 'ale_galleryslider',
							'value' => 'Enable'
						)
					),
				)
			);
			if ($query->have_posts()) : ?>
				<ul class="slides">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<li>
							<?php if(get_the_post_thumbnail($post->ID,'gallery-home3')){
							 		echo get_the_post_thumbnail($post->ID,'gallery-home3');
							 	} else{
									echo '<img src="http://placehold.it/1920x550/f2f2f2/414141&amp;text=No+image" alt>';
							 	}?>
							<div class="text">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string"><?php echo ale_trim_excerpt(3); ?></div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; wp_reset_query(); ?>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displaycouseshome3')!="off"): ?>
		<section class="home-3-causes">
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home3eventstitle'); ?></h2>
					<p><?php echo ale_get_meta('home3eventsdesc'); ?></p>
				</div>

				<div class="items clearfix">
					<?php
					wp_reset_query();
					$query_causes = new WP_Query(
						array(
							'posts_per_page' => 4,
							'post_type' => 'causes',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_causes->have_posts()) : while ($query_causes->have_posts()) : $query_causes->the_post(); ?>
						<article class="col-3">
							<?php if(get_the_post_thumbnail($post->ID,'causes-home3')){
								echo get_the_post_thumbnail($post->ID,'causes-home3');
							} else{
								echo '<img src="http://placehold.it/269x399/f2f2f2/414141&amp;text=No+image" alt>';
							}?>
							<div class="text">
								<h3><?php the_title(); ?></h3>
								<div class="string">
									<?php echo ale_trim_excerpt(3); ?>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>" class="link">
								<span class="fa fa-arrow-right"></span>
							</a>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displaydonationhome3')!="off"):
		wp_reset_query();
		$query_couses = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_type' => 'causes',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'meta_query' => array(
					array(
						'key' => 'ale_causesshowinslider',
						'value' => 'on'
					)
				),
			)
		);
		if ($query_couses->have_posts()) :?> 
			<div class="home-3-donation">
				<div class="bg"></div>
				<h2><?php _e('Donation', 'aletheme'); ?></h2>
				<div class="slider">
					<ul class="slides">
					<?php while ($query_couses->have_posts()) : $query_couses->the_post(); ?>
						<li>
							<div class="wrapper clearfix">
								<div class="col-4">
									<span class="collected-amount"><span><?php echo ale_get_option('currencycurrent'); ?></span><?php echo ale_get_meta('causesdonated'); ?></span>
									<span class="required-amount">/<span><?php echo ale_get_option('currencycurrent'); ?></span><?php echo ale_get_meta('causesgoal'); ?></span>
								</div>

								<div class="col-4">
									<img src="<?php echo get_template_directory_uri(); ?>/css/images/donate-image.png" alt>
									<div class="donate-button-form">
										<?php
										//PayPal
										$payments_enabled = ale_get_option('enable_paypal');
										$paypal_merchant_id = ale_get_option('merchant_email');
										$enable_sandbox = ale_get_option('enable_sandbox');
										$currency_code = ale_get_option('paypal_currency');

										if (($payments_enabled == "1") && (!empty($paypal_merchant_id)) && (!empty($currency_code))) {
											$payment_status = ale_get_meta('payment_status', true, $post->ID);
												?>
												<span class="button-slider-donate"><?php _e('Donate', 'aletheme'); ?></span>
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
														>
													</script>
												</div>
											<?php
										} ?>
									</div>

									<div class="share">
										<span><?php _e('Share', 'aletheme'); ?>:</span>
										<a href="<?php echo ale_get_share('twi'); ?>" onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false">
											<span class="fa fa-twitter"></span>
										</a>
										<a href="<?php echo ale_get_share('fb'); ?>" onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false">
											<span class="fa fa-facebook"></span>
										</a>
										<a href="<?php echo ale_get_share('pin'); ?>" onclick="window.open(this.href, 'Share on Pinterest', 'width=600,height=300'); return false">
											<span class="fa fa-pinterest"></span>
										</a>
										<a href="<?php echo ale_get_share('goglp'); ?>" onclick="window.open(this.href, 'Share on Google+', 'width=600,height=300'); return false">
											<span class="fa fa-google-plus"></span>
										</a>
									</div>
								</div>

								<div class="col-4">
								<h3><?php the_title(); ?></h3>
								<div class="string">
									<?php echo ale_trim_excerpt(30); ?>
								</div>
							</div>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('displayvoloutearshome3')!="off"): ?>
		<section class="home-3-volountears" <?php if(ale_get_meta('home3volountearsbg')){echo 'style="background-image: url('.ale_get_meta('home3volountearsbg').')"';} ?>>
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home3volountearstitle'); ?></h2>
					<p><?php echo ale_get_meta('home3volountearstext'); ?></p>
				</div>
				<div class="items clearfix">
					<?php
					wp_reset_query();
					$query_volountears = new WP_Query(
						array(
							'posts_per_page' => 6,
							'post_type' => 'volountears',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
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
							<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'aletheme'); ?></a>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displaynewshome3')!="off"): ?>
		<section class="home-3-news">
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home3newstitle'); ?></h2>
					<p><?php echo ale_get_meta('home3newstext'); ?></p>
				</div>

				<div class="items clearfix">
					<?php
					wp_reset_query();
					$news_count = 0;
					$query_news = new WP_Query(
						array(
							'posts_per_page' => 6,
							'post_type' => 'news',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); $news_count++;
					if($news_count==1) :?>
						<div class="col-6">
							<article>
								<?php if(get_the_post_thumbnail($post->ID,'news-home3')){
									echo get_the_post_thumbnail($post->ID,'news-home3');
								} else{
									echo '<img src="http://placehold.it/539x277/f2f2f2/414141&amp;text=No+image" alt>';
								}?>
								<div class="text clearfix">
									<div class="col-2">
										<span class="date"><?php the_time('j M Y'); ?></span>
										<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
										<?php the_tags('',''); ?>
									</div>

									<div class="col-10">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="string">
											<?php echo ale_trim_excerpt(40); ?>
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php endif;
					if($news_count==1) {?>
						<div class="col-6">
					<?php } ?>
							<article class="clearfix">
								<div class="col-2">
									<span class="date"><?php the_time('j M Y'); ?></span>
									<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
									<?php the_tags('',''); ?>
								</div>

								<div class="col-10">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</article>
					<?php if($news_count==6) {?>
							<a href="<?php echo get_post_type_archive_link('news');?>" class="more"><?php _e('See more news', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
						</div>
					<?php }
					 endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(shortcode_exists('sbscrbr_form') && ale_get_meta('displaysubscribehome3') != "off"): ?>
		<div class="home-3-subscribe">
			<div class="wrapper">
				<p><?php _e('Subscribe to our news', 'aletheme'); ?>:</p>
				<?php echo strip_tags(do_shortcode('[sbscrbr_form]'), '<form><input>'); ?>
			</div>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>