<?php
/*
  * Template name: Home
  * */
get_header(); ?>
	<!-- Slider -->
	<?php if(ale_get_meta('sliderhome')!='off'): ?>
		<div id="slider">
			<ul class="slides">
				<?php $slider = ale_sliders_get_slider(ale_get_option('homeslugfull')); ?>
				<?php if($slider):?>
					<?php foreach ($slider['slides'] as $slide) : ?>
						<li>
							<img src="<?php echo $slide['image'] ?>" alt="" />
							<?php if($slide['title']){ ?>
								<div class="text1">
									<?php
									if($slide['url']){
										$slide_url = $slide['url'];
										echo '<a href="'.$slide_url.'">' ;
									}?>
									<?php echo $slide['title'] ?>
									<?php
									if($slide['url']){
										echo '</a>';
									}?>
								</div>
							<?php } ?>
							<?php if($slide['description']){ ?>
								<div class="text2"><?php echo $slide['description'] ?></div>
							<?php } ?>
						</li>
					<?php endforeach; ?>
				<?php endif;?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('informationhome')!='off'): ?>
		<!-- Info -->
		<section class="info">
			<div class="center cf">
				<div class="col-4 ">
					<span class="icon fa fa-plus"></span>
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle1'); ?></h3>
						<p><?php echo ale_get_meta('infotext1'); ?></p>
					</div>
				</div>
				<div class="col-4">
					<span class="icon fa fa-globe"></span>
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle2'); ?></h3>
						<p><?php echo ale_get_meta('infotext2'); ?></p>
					</div>

				</div>
				<div class="col-4">
					<span class="icon fa fa-tint"></span>
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle3'); ?></h3>
						<p><?php echo ale_get_meta('infotext3'); ?></p>
					</div>

				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('donationshome')!='off'): ?>
		<!-- Donate -->
		<section class="donate_ homedonate">
			<div class="cf">
				<div class="col-6 text">
					<h3><span class="fa fa-cubes"></span><?php _e('Thank you!','aletheme'); ?></h3>
					<h4><?php _e("You've helped us raise a staggering","aletheme"); ?></h4>
					<h5>
						<span>
							<?php
							if(ale_get_meta('donationcollam')){
								echo ale_get_meta('currency') . ale_get_meta('donationcollam');
							} else {
								echo ale_get_meta('currency');
								_e('0', 'aletheme');
							}
							?>
					   </span>
						<?php _e('so far!','aletheme'); ?>
					</h5>
				</div>

				<?php if(shortcode_exists('dgx-donate')): ?>
					<div class="col-6 but">
						<a href="#" class="button-big"><span class="text"><?php _e('Donate/pay in your money','aletheme'); ?></span><span class="shadow"></span></a>
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
					<span><?php _e('Share:','aletheme'); ?> </span>
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

	<?php if(ale_get_meta('latestdonationshome')!='off'): ?>
		<!-- Latest Donations -->
		<section class="latest-donations">
			<div class="center cf">
				<h2><?php echo ale_get_meta('lastdontitle'); ?></h2>

				<div class="peoples">
					<?php if(ale_get_meta('latestdonationshomebox')!='last_donors'): ?>
						<div class="col-2i">
							<div class="circle">
								<?php if(ale_get_meta('lastdonimage1')): ?>
									<img src="<?php echo ale_get_meta('lastdonimage1'); ?>" alt=""/>
								<?php else: echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>'; endif; ?>
							</div>
							<div class="name"><?php echo ale_get_meta('lastdonname1'); ?></div>
							<div class="state"><?php echo ale_get_meta('lastdonstate1'); ?></div>
							<div class="donated">
								<div class="left"><?php _e('Donated','aletheme'); ?></div>
								<div class="right"><?php echo ale_get_meta('lastdondon1'); ?></div>
							</div>
						</div>
						<div class="col-2i">
							<div class="circle">
								<?php if(ale_get_meta('lastdonimage2')): ?>
									<img src="<?php echo ale_get_meta('lastdonimage2'); ?>" alt=""/>
								<?php else: echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>'; endif; ?>
							</div>
							<div class="name"><?php echo ale_get_meta('lastdonname2'); ?></div>
							<div class="state"><?php echo ale_get_meta('lastdonstate2'); ?></div>
							<div class="donated">
								<div class="left"><?php _e('Donated','aletheme'); ?></div>
								<div class="right"><?php echo ale_get_meta('lastdondon2'); ?></div>
							</div>
						</div>
						<div class="col-2i">
							<div class="circle">
								<?php if(ale_get_meta('lastdonimage3')): ?>
									<img src="<?php echo ale_get_meta('lastdonimage3'); ?>" alt=""/>
								<?php else: echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>'; endif; ?>
							</div>
							<div class="name"><?php echo ale_get_meta('lastdonname3'); ?></div>
							<div class="state"><?php echo ale_get_meta('lastdonstate3'); ?></div>
							<div class="donated">
								<div class="left"><?php _e('Donated','aletheme'); ?></div>
								<div class="right"><?php echo ale_get_meta('lastdondon3'); ?></div>
							</div>
						</div>
						<div class="col-2i">
							<div class="circle">
								<?php if(ale_get_meta('lastdonimage4')): ?>
									<img src="<?php echo ale_get_meta('lastdonimage4'); ?>" alt=""/>
								<?php else: echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>'; endif; ?>
							</div>
							<div class="name"><?php echo ale_get_meta('lastdonname4'); ?></div>
							<div class="state"><?php echo ale_get_meta('lastdonstate4'); ?></div>
							<div class="donated">
								<div class="left"><?php _e('Donated','aletheme'); ?></div>
								<div class="right"><?php echo ale_get_meta('lastdondon4'); ?></div>
							</div>
						</div>
						<div class="col-2i">
							<div class="circle">
								<?php if(ale_get_meta('lastdonimage5')): ?>
									<img src="<?php echo ale_get_meta('lastdonimage5'); ?>" alt=""/>
								<?php else: echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>'; endif; ?>
							</div>
							<div class="name"><?php echo ale_get_meta('lastdonname5'); ?></div>
							<div class="state"><?php echo ale_get_meta('lastdonstate5'); ?></div>
							<div class="donated">
								<div class="left"><?php _e('Donated','aletheme'); ?></div>
								<div class="right"><?php echo ale_get_meta('lastdondon5'); ?></div>
							</div>
						</div>
					<?php else:
						$donor_list = get_post_meta($post->ID, 'ale_paypal_details', true);
						if($donor_list){
							$donors_count = 1; 
							foreach ($donor_list as $pp_stat){
								$donors_count ++;
								if($pp_stat['ale_payment_status']=='Completed') {?>
									<div class="col-2i">
										<div class="circle">
											<?php if(get_avatar( $pp_stat['ale_payer_email'], 86 )){ ?>
												<img src="<?php echo get_avatar( $pp_stat['ale_payer_email'], 86 ); ?>" alt=""/>
											<?php } else{
												echo '<img src="http://placehold.it/86x86/f2f2f2/414141" alt>';
											} ?>
										</div>
										<div class="name"><?php echo $pp_stat['ale_first_name']; ?></div>
										<div class="state"><?php echo $pp_stat['ale_last_name']; ?></div>
										<div class="donated">
											<div class="left"><?php _e('Donated','aletheme'); ?></div>
											<div class="right"><?php echo $pp_stat['ale_payment_gross']; ?></div>
										</div>
									</div>
								<?php } 
								if($donors_count==5){
									return false;
								}
							} 
						}
					endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('howhelphome')!='off'): ?>
		<!-- How can you help -->
		<section class="how-help">
			<div class="top-border"></div>

			<div class="center cf">
				<h2><?php echo ale_get_meta('howhelptitle'); ?></h2>

				<div class="col-6 left">
					<h3><?php echo ale_get_meta('howhelptitlesmall'); ?></h3>
					<p>
						<?php echo ale_get_meta('howhelptext'); ?>
					</p>
					<div class="col-6 item"><span class="fa fa-film"></span><?php echo ale_get_meta('howhelpmadia'); ?></div>
					<div class="col-6 item"><span class="fa fa-shield"></span><?php echo ale_get_meta('howhelppro'); ?></div>
					<div class="col-6 line"><div class="li"></div></div>
					<div class="col-6 line"><div class="li"></div></div>
					<div class="col-6 item"><span class="fa fa-users"></span><?php echo ale_get_meta('howhelpmob'); ?></div>
					<div class="col-6 item"><span class="fa fa-dot-circle-o"></span><?php echo ale_get_meta('howhelpsup'); ?></div>
					<a class="button" href="<?php echo ale_get_meta('howhelpurl'); ?>"><span class="text"><?php _e('Read More','aletheme'); ?></span><span class="shadow"></span></a>
				</div>
				<div class="col-6 right">
					<?php if(ale_get_meta('howhelpvideo')): ?>
						<?php echo wp_oembed_get(ale_get_meta('howhelpvideo'),array('width'=>'100%','height'=>'296px')); ?>
					<?php else: echo '<img src="http://placehold.it/500x296/f2f2f2/414141&amp;text=Place+for+video" alt>'; endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('newshome')!='off'): ?>
		<!-- How can you help -->
		<section class="news">
			<div class="center cf">
				<div class="col-3 news">
					<h3><?php echo ale_get_meta('newstitle'); ?></h3>
					<?php
					wp_reset_query();
					$query_news = new WP_Query(
						array(
							'posts_per_page' => 2,
							'post_type' => 'news',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); ?>
						<article>
							<div class="time"><span class="fa fa-clock-o"></span><?php echo ale_get_meta('starttime'); ?><?php if(ale_get_meta('endtime')){ _e(' - ','aletheme');} echo ale_get_meta('endtime'); ?></div>
							<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<?php echo ale_trim_excerpt(14); ?>

							<div class="info cf">
								<div class="reply"><span class="fa fa-mail-forward"></span><?php echo get_post_views(get_the_ID()); ?></div>
								<div class="comment"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></div>
								<?php
								$current_category = wp_get_post_terms($post->ID, 'news-category', array("fields" => "all"));
								foreach($current_category as $curcat){
									echo '<div class="tag">';
									echo $curcat->name.' ';
									echo '</div>';
								}
								?>
							</div>
						</article>
					<?php endwhile;  endif; wp_reset_query();?>

					<a class="button" href="<?php echo get_post_type_archive_link('news');?>"><span class="text"><?php _e('More news','aletheme'); ?></span><span class="shadow"></span></a>
				</div>
				<div class="col-6 about">
					<h3><?php echo ale_get_meta('aboutustitle'); ?></h3>
					<?php if(ale_get_meta('aboutusimage')): ?>
						<img src="<?php echo ale_get_meta('aboutusimage'); ?>" alt=""/>
					<?php else: echo '<img src="http://placehold.it/525x196/f2f2f2/414141" alt>'; endif; ?>
					<p>
						<?php echo ale_get_meta('aboutustext'); ?>
					</p>
				</div>
				<div class="col-3 photos">
					<h3>
						<?php echo ale_get_meta('photostitle'); ?>
						<span class="control">
							<span class="left"></span>
							<span class="right"></span>
						</span>
					</h3>
					<div id="photo-slider">
						<ul class="slides">
							<?php
							$count = 0;
							wp_reset_query();
							$query_gallery = new WP_Query(
								array(
									'posts_per_page' => 12,
									'post_type' => 'gallery',
									'ignore_sticky_posts' => 1,
									'post__not_in' => get_option('sticky_posts')
								)
							);
							if ($query_gallery->have_posts()) : while ($query_gallery->have_posts()) : $query_gallery->the_post(); $count++; ?>
								<?php if($count % 6 == 1){echo '<li>';} ?>
									<div class="col-6">
										<a href="<?php the_permalink();?>">
											<?php if(get_the_post_thumbnail($post->ID,'gallery-medium')): ?>
												<?php echo get_the_post_thumbnail($post->ID,'gallery-medium');?>
											<?php else: echo '<img src="http://placehold.it/117x104/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
											<span class="mask"></span>
										</a>
									</div>
								<?php if($count % 6 == 0){echo '</li>';} ?>
							<?php endwhile;  endif; wp_reset_query();?>
						</ul>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('eventshome')!='off'): ?>
		<!-- Section Bottom -->
		<section class="bottom">
			<div class="center cf">
				<?php
				wp_reset_query();
				$query_events = new WP_Query(
					array(
						'posts_per_page' => 3,
						'post_type' => 'events',
						'ignore_sticky_posts' => 1,
						'post__not_in' => get_option('sticky_posts')
					)
				);
				if ($query_events->have_posts()) : while ($query_events->have_posts()) : $query_events->the_post(); $count++; ?>
				<div class="col-4">
					<div class="img">
						<?php if(get_the_post_thumbnail($post->ID,'events-medium')): ?>
							<?php echo get_the_post_thumbnail($post->ID,'events-medium');?>
						<?php else: echo '<img src="http://placehold.it/330x194/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
						<div class="text">
							<h3><?php the_title();?></h3>
							<a href="<?php the_permalink();?>"><?php _e('Read more','aletheme'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile;  endif; wp_reset_query();?>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>

