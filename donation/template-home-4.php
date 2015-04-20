<?php
/**
 * Template Name: Template Home 4
 */
get_header(); ?>
	<?php if(ale_get_meta('displaysliderhome4')!="off"): ?>
		<div class="home-4-slider">
			<?php
			wp_reset_query();
			$count = ale_get_meta('home4slidercount');
			$query_gallery = new WP_Query(
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
			if ($query_gallery->have_posts()) : ?>
				<ul class="slides">
					<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
						<li>
							<?php if(get_the_post_thumbnail($post->ID,'gallery-home3')){
								echo get_the_post_thumbnail($post->ID,'gallery-home3');
							} else{
								echo '<img src="http://placehold.it/1920x550/f2f2f2/414141&amp;text=No+image" alt>';
							}?>
							<div class="text">
								<h2><?php the_title(); ?></h2>
								<div class="string"><?php echo ale_trim_excerpt(8); ?></div>
								<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'aletheme'); ?></a>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; wp_reset_query(); ?>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displaytabshome4')!="off"): ?>
		<div class="home-4-tabs">
			<div class="wrapper">
				<div class="ale-tab-inner">
					<ul class="ale-nav clearfix">
						<?php
						wp_reset_query();
						$news_count=1;
						$query_news = new WP_Query(
							array(
								'posts_per_page' => 3,
								'post_type' => 'news',
								'ignore_sticky_posts' => 1,
								'post__not_in' => get_option('sticky_posts')
							)
						);
						if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); $news_count++; ?>
							<li><a href="#ale-tab-title<?php echo $news_count; ?>" class="tab-title"><?php the_title(); ?></a></li>
						<?php endwhile; endif; wp_reset_query();?>
					</ul>
					<?php
					wp_reset_query();
					$news_count=1;
					$query_news = new WP_Query(
						array(
							'posts_per_page' => 3,
							'post_type' => 'news',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); $news_count++; ?>
						<article id="ale-tab-title<?php echo $news_count; ?>" class="ale-tab ui-tabs-panel ui-widget-content ui-corner-bottom clearfix">
							<div class="col-6">
								<h2><?php echo ale_get_meta('shortdescription'); ?></h2>
								<a href="<?php the_permalink(); ?>"><?php _e('Read details', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
							</div>
							<div class="col-6">
								<div class="string"><?php echo ale_trim_excerpt(40); ?></div>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displaydonationhome4')!="off"): ?>
		<?php
		wp_reset_query();
		$query_causes = new WP_Query(
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
		if ($query_causes->have_posts()) :?>
			<div class="home-4-donation" <?php if(ale_get_meta('home4donbg')){echo 'style="background: url('.ale_get_meta('home4donbg').')"';} ?>>
				<div class="wrapper">
					<ul class="slides">
						<?php while ($query_causes->have_posts()) : $query_causes->the_post(); ?>
							<li class="clearfix">
								<div class="col-5">
									<?php if(get_the_post_thumbnail($post->ID,'causes-home4')){
										echo get_the_post_thumbnail($post->ID,'causes-home4');
									} else{
										echo '<img src="http://placehold.it/255x312/f2f2f2/414141&amp;text=No+image" alt>';
									}?>
								</div>
								<div class="col-7">
									<h2><?php the_title(); ?></h2>
									<div class="string">
										<?php echo ale_trim_excerpt(40); ?>
									</div>

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
												<span class="button-big">
													<span class="text"><?php _e('Donate/pay in your money','aletheme'); ?></span>
													<span class="shadow"></span>
												</span>
												
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
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if(ale_get_meta('displayinfohome4')!="off"): ?>
		<section class="home-4-information">
			<div class="wrapper">
				<h2><?php echo ale_get_meta('home4infotitle'); ?></h2>
				<p><?php echo ale_get_meta('home4infotext'); ?></p>
				<div class="myStat" data-fontsize="67" data-icon="dzrgd" data-dimension="216" data-width="12" data-fgcolor="#f65339" data-text="<?php echo ale_get_meta('home4infopercent1'); ?>" data-info="<?php echo ale_get_meta('home4infotitle1'); ?>" data-percent="<?php echo ale_get_meta('home4infopercent1'); ?>" data-fill="#fff"></div>
				<div class="myStat" data-fontsize="117" data-dimension="330" data-width="17" data-fgcolor="#f65339" data-text="<?php echo ale_get_meta('home4infopercent2'); ?>" data-info="<?php echo ale_get_meta('home4infotitle2'); ?>" data-percent="<?php echo ale_get_meta('home4infopercent2'); ?>" data-fill="#fff"></div>
				<div class="myStat" data-fontsize="67" data-dimension="216" data-width="12" data-fgcolor="#f65339" data-text="<?php echo ale_get_meta('home4infopercent3'); ?>" data-info="<?php echo ale_get_meta('home4infotitle3'); ?>" data-percent="<?php echo ale_get_meta('home4infopercent3'); ?>" data-fill="#fff"></div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displayeventshome4')!="off"): ?>
		<section class="home-4-events">
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home4eventstitle'); ?></h2>
					<p><?php echo ale_get_meta('home4eventstext'); ?></p>
				</div>
				<div class="slider">
					<?php
					wp_reset_query();
					$event_count = ale_get_meta('home4eventsslider');
					$item_count = 1;
					$query_events = new WP_Query(
						array(
							'posts_per_page' => $event_count,
							'post_type' => 'events',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_events->have_posts()) : ?>
						<ul class="slides">
							<?php while ($query_events->have_posts()) : $query_events->the_post();
							if($item_count%3==1){
								echo '<li class="clearfix">';
							}?>
								<article>
									<div class="image">
									 	<?php if(get_the_post_thumbnail($post->ID,'events-home4')){
									 		echo get_the_post_thumbnail($post->ID,'events-home4');
									 	} else{
											echo '<img src="http://placehold.it/343x172/f2f2f2/414141&amp;text=No+image" alt>';
									 	}?>
										<a href="<?php the_permalink(); ?>">
										 	<span class="fa fa-eye"></span>
									 	</a>
								 	</div>
								 	<div class="text">
										<h3><?php the_title(); ?></h3>
										<span class="date"><?php the_time('j M Y'); ?></span>
										<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
										<div class="tags">
											<?php the_tags('',''); ?>
										</div>
									</div>
								</article>
							<?php if($item_count%3==0){
								echo '</li>';
							}
						 	$item_count++;
							endwhile;?>
						</ul>
					<?php endif; wp_reset_query();?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displaydescriptionhome4')!="off"): ?>
		<section class="home-4-description">
			<div class="bg-image" <?php if(ale_get_meta('home4descriptionbg')){echo 'style="background-image: url('.ale_get_meta('home4descriptionbg').')"';} ?>></div>
			<div class="content clearfix">
				<div class="col-6">
					<?php if(ale_get_meta('home4descriptionimage')){
						echo '<img src="'.ale_get_meta('home4descriptionimage').'" alt>';
					} else{
						echo '<img src="http://placehold.it/960x385/f2f2f2/414141" alt>';
					} ?>
				</div>
				<div class="col-6">
					<h2><?php echo ale_get_meta('home4descriptiontitle'); ?></h2>
					<p><?php echo ale_get_meta('home4descriptiontext'); ?></p>
					<a href="<?php echo ale_get_meta('home4descriptionlink'); ?>"><?php _e('read more', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
				</div>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="wrapper">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; wp_reset_query();?>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>