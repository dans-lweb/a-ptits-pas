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
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_bebe.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle1'); ?></h3>
						<p><?php echo ale_get_meta('infotext1'); ?></p>
					</div>
				</div>
				<div class="col-4">
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_famille.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle2'); ?></h3>
						<p><?php echo ale_get_meta('infotext2'); ?></p>
					</div>

				</div>
				<div class="col-4">
					<img class="icon_" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/picto_plus.png">
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
					<h3><?php _e('Merci!','aletheme'); ?></h3>
					<h4><?php _e("Grace &agrave vous nous avons r&eacutecolt&eacute","aletheme"); ?></h4>
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
						<?php _e('pour notre ','aletheme'); ?><?php echo ale_get_meta('donationproject'); ?>
					</h5>
				</div>

				<?php if(shortcode_exists('dgx-donate')): ?>
					<div class="col-6 but">
						<a href="#" class="button-big"><span class="text"><?php _e('Aidez nous','aletheme'); ?></span><span class="shadow"></span></a>
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
	
<section class="partenaires">
		<div class="center cf">
			<h2>Nos partenaires</h2>
			<div >
				<div class="col-2i">
					<div class="partner-logo">
						<a  target=blank href="http://www.sosprema.com"><img class="sosprema" alt="sosprema" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/logo-sosprema.png"></a>
					</div>
				</div>
				<div class="col-2i">
					<div class="partner-logo">
						<a  target=blank href="http://www.lactalis.fr"><img class="lactalis"alt="lactalis" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/logo-lactalis.png"></a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	<?php if(ale_get_meta('howhelphome')!='off'): ?>
		<!-- How can you help -->
		<section class="how-help">
			<div class="top-border"></div>

			<div class="center cf">
				<h2><img alt="aptitpas" src="http://localhost/aptitspas/wordpress/wp-content/themes/donation/css/images/logo-blanc.png"><?php echo ale_get_meta('howhelptitle'); ?></h2>

				<div class="col-6 left">
					<h3><?php echo ale_get_meta('howhelptitlesmall'); ?></h3>
					<p>
						<?php echo ale_get_meta('howhelptext'); ?>
					</p>
					<a class="button" href="<?php echo ale_get_meta('howhelpurl'); ?>"><span class="text"><?php _e('En savoir plus','aletheme'); ?></span><span class="shadow"></span></a>
				</div>
				<div class="col-6 right">
					<div class="col-6 item"><a href="" class="howhelplink"> Devenir Membre </a></div>
					<div class="col-6 item"><a href="" class="howhelplink"> Devenir M&eacutec&egravene </a></div>
					<div class="col-6 item"><a href="" class="howhelplink"> Devenir B&eacuten&eacutevole </a></div>
					
					
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('newshome')!='off'): ?>
		<!-- About and Gallery -->
		<section class="news">
			<div class="center cf">
				<div class="col-4 about">
					<h3><?php echo ale_get_meta('aboutustitle'); ?></h3>
					<p>
						<?php echo ale_get_meta('aboutustext'); ?>
					</p>
				</div>
				<div class="col-4 about">
					
					<?php if(ale_get_meta('aboutusimage')): ?>
						<img src="<?php echo ale_get_meta('aboutusimage'); ?>" alt=""/>
					<?php else: echo '<img src="http://placehold.it/525x196/f2f2f2/414141" alt>'; endif; ?>
					
				</div>
				<div class="col-4 photos">
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
				$query_news = new WP_Query(
					array(
						'posts_per_page' => 3,
						'post_type' => 'news',
						'ignore_sticky_posts' => 1,
						'post__not_in' => get_option('sticky_posts')
					)
				);
				if ($query_news->have_posts()) : while ($query_news->have_posts()) : $query_news->the_post(); $count++; ?>
				<div class="col-4">
					<div class="img">
						<?php if(get_the_post_thumbnail($post->ID,'news-medium')): ?>
							<?php echo get_the_post_thumbnail($post->ID,'news-medium');?>
						<?php else: echo '<img src="http://placehold.it/330x194/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
						<div class="text">
							<h3><?php the_title();?></h3>
							<a href="<?php the_permalink();?>"><?php _e('Lire la suite','aletheme'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile;  endif; wp_reset_query();?>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>

