<?php
/**
 * Template Name: Template Home 5
 */
get_header(); ?>
	<?php if(ale_get_meta('displaysliderhome5')!="off"): ?>
		<div class="home-5-slider">
			<?php
			wp_reset_query();
			$count = ale_get_meta('home5slidercount');
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
				<div class="slider">
					<ul class="slides">
						<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
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
				</div>
			<?php endif;
			if ($query_gallery->have_posts()) : ?>
				<div class="wrapper thumbnails">
					<ul class="slides">
						<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
							<li>
								<?php if(get_the_post_thumbnail($post->ID,'gallery-home4')){
									echo get_the_post_thumbnail($post->ID,'gallery-home4');
								} else{
									echo '<img src="http://placehold.it/270x117/f2f2f2/414141&amp;text=No+image" alt>';
								}?>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; wp_reset_query();?>1
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displaydonationhome5')!="off"): ?>
		<section class="home-5-donation <?php if(ale_get_meta('displaysliderhome5')!="off"){echo 'margin-top';} ?>" <?php if(ale_get_meta('home5donationbg')){echo 'style="background-image: url('.ale_get_meta('home5donationbg').');"';} ?>>
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home5donationtitle'); ?></h2>
					<p><?php echo ale_get_meta('home5donationtext'); ?></p>
				</div>

				<div class="items clearfix">
					<div class="item text">
						<h3><?php echo ale_get_meta('home5donationtitle1'); ?></h3>
						<p><?php echo ale_get_meta('home5donationtext1'); ?></p>
						<a href="#" class="donate-button"><?php _e('Donate', 'aletheme'); ?></a>
					</div>

					<div class="item round">
						<div class="circle">
							<?php
							$required = intval(ale_get_meta('home5donationreqam'));
							$collected = intval(ale_get_meta('home5donationcollam'));
							if($required>0 && $collected>0){
								$amount_total = $collected / $required * 100;
							} else{
								$amount_total = 0;
							}
						  	?>
							<div class="myStat" data-fontsize="42" data-icon="dzrgd" data-dimension="404" data-width="46" data-fgcolor="#ffd800" data-text="<?php echo ale_get_option('currencycurrent') . $collected ?>" data-percent="<?php echo $amount_total ?>" data-fill="#fff"></div>
							<div class="req">
								<?php echo '/ ' . $required; ?>
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
					</div>

					<div class="item last-don">
						<h3><?php echo ale_get_meta('home5donationtitle2'); ?></h3>
						<?php
						wp_reset_query();
						$query_causes = new WP_Query(
							array(
								'post_type' => 'causes',
								'ignore_sticky_posts' => 1,
								'post__not_in' => get_option('sticky_posts')
							)
						);
						if ($query_causes->have_posts()) : while ($query_causes->have_posts()) : $query_causes->the_post();
							$donor_list = get_post_meta($post->ID, 'ale_paypal_details', true);
							if($donor_list){
								echo '<div class="donors-list"><ul>';
									foreach ($donor_list as $pp_stat){
										if($pp_stat['ale_payment_status']=='Completed') {?>
											<li>
												<span><?php echo $pp_stat['ale_first_name'] . $pp_stat['ale_last_name']; ?></span>
												<?php echo $pp_stat['ale_payment_gross']; ?>
											</li>
										<?php } ?>
									<?php }
								echo "</ul></div>";
							}
						endwhile; endif; wp_reset_query();?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displayeventshome5')!="off"): ?>
		<div class="home-5-events clearfix">
			<?php
				wp_reset_query();
				$events_count = 0;
				$query_events = new WP_Query(
					array(
						'posts_per_page' => 5,
						'post_type' => 'events',
						'ignore_sticky_posts' => 1,
						'post__not_in' => get_option('sticky_posts')
					)
				);
				if ($query_events->have_posts()) : while ($query_events->have_posts()) : $query_events->the_post(); $events_count++;?>
					<article <?php if($events_count==1){echo 'class="big"';} else{echo 'class="col-3"';} ?>>
						<?php
						if($events_count==1){
						 if(get_the_post_thumbnail($post->ID,'events-home5')){
								echo get_the_post_thumbnail($post->ID,'events-home5');
							}else{
								echo '<img src="http://placehold.it/1920x735/f2f2f2/414141&amp;text=No+image" alt>';
							}
						} else{
						 if(get_the_post_thumbnail($post->ID,'events-home5small')){
								echo get_the_post_thumbnail($post->ID,'events-home5small');
							}else{
								echo '<img src="http://placehold.it/481x333/f2f2f2/414141&amp;text=No+image" alt>';
							}
						}?>
						<div class="text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="string">
								<?php if($events_count==1){
								 	echo ale_trim_excerpt(14);
							 	} else{
							 		echo ale_trim_excerpt(10);
						 		}?>
							</div>
						</div>
						<?php if($events_count>1){
							echo '<a href="'.get_the_permalink().'" class="overlay"></a>';
							}else{} ?>
					</article>
				<?php endwhile; endif; wp_reset_query();?>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displayhistoryhome5')!="off"):
		$history_meta = get_post_meta($post->ID, 'ale_history_details', true);
		if ( $history_meta ) : ?>
			<section class="home-5-history clearfix">
				<div class="top">
					<h2><?php echo ale_get_meta('home5historytitle'); ?></h2>
				</div>
				<div class="image" <?php if(ale_get_meta('home5historybg')){echo 'style="background-image: url('.ale_get_meta('home5historybg').')"';} ?>></div>
					<ul class="slides">
						<?php foreach ( $history_meta as $field ) {?>
							<li>
								<article class="clearfix">
									<div class="col-6 text">
										<p><?php if ($field['value'] != '') echo esc_attr( $field['value'] );  ?></p>
									</div>

									<div class="col-6 date">
										<h2><?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?></h2>
									</div>
									<div class="vert-line-1"></div>
									<div class="vert-line-2"></div>
								</article>
							</li>
						<?php } ?>
					</ul>
			</section>
		<?php endif;
	endif; ?>

	<?php if(ale_get_meta('displaybloghome5')!="off"): ?>
		<section class="home-5-blog">
			<div class="wrapper">
				<div class="top">
					<h2><?php echo ale_get_meta('home5blogtitle'); ?></h2>
					<a href="<?php $posts_page_url = get_page_uri(get_option( 'page_for_posts')); echo home_url().'/' .$posts_page_url; ?>">
						<?php _e('Open blog', 'aletheme'); ?>
						<span class="fa fa-angle-right"></span>
					</a>
				</div>

				<div class="items clearfix">
					<?php
					wp_reset_query();
					$query_post = new WP_Query(
						array(
							'posts_per_page' => 3,
							'post_type' => 'post',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_post->have_posts()) : while ($query_post->have_posts()) : $query_post->the_post(); ?>
					<article>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="string">
							<?php echo ale_trim_excerpt(16); ?>
						</div>
						<span class="date"><?php the_time('j M Y'); ?></span>
						<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
						<div class="tags">
							<?php the_tags('',''); ?>
						</div>
					</article>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displayprojectshome5')!="off"): ?>
		<section class="home-5-map">
			<div class="top">
				<h2><?php echo ale_get_meta('home5projectstitle'); ?></h2>
				<div class="arrow"></div>
			</div>
			
			<?php ale_part('causes-map'); ?>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>