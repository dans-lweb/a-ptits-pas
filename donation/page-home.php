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
					<img class="icon_" src="http://preprod.aptitspas-asso.fr/wp-content/themes/donation/css/images/picto_bebe.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle1'); ?></h3>
						<p><?php echo ale_get_meta('infotext1'); ?></p>
					</div>
				</div>
				<div class="col-4">
					<img class="icon_" src="http://preprod.aptitspas-asso.fr/wp-content/themes/donation/css/images/picto_famille.png">
					<div class="text">
						<h3><?php echo ale_get_meta('infotitle2'); ?></h3>
						<p><?php echo ale_get_meta('infotext2'); ?></p>
					</div>

				</div>
				<div class="col-4">
					<img class="icon_" src="http://preprod.aptitspas-asso.fr/wp-content/themes/donation/css/images/picto_plus.png">
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
					<h4><?php _e("Gr&acircce &agrave vous nous avons r&eacutecolt&eacute","aletheme"); ?></h4>
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

	
	
	<section class="partenaires">
		<div class="center cf">
			
			<blockquote class="quote">"Soigner. Donner des soins, c'est aussi une politique.
 				Cela peut être fait avec une rigueur dont la douceur est l’enveloppe essentielle. Une attention exquise à la vie que l'on veille et surveille. Une précision constante.Une 
				sorte d'élégance dans les actes, une présence et une légèreté, une prévision et une sorte de perception très éveillée qui observe les moindres signes. C'est une sorte 	d'oeuvre, de poème (et qui n'a jamais été écrit), que la sollicitude intelligente compose."
			
			</blockquote>

      			<p class="ref"> <strong style="font-weight:bold;">Paul Valéry</strong>, <i>Œuvres </i>, tome 1, 1957, <i>Politique organo-psychique.			</i></p>
  			
		</div>
	</section>
	
	<?php if(ale_get_meta('howhelphome')!='off'): ?>
		<!-- How can you help -->
		<section class="how-help">
			

			<div class="center cf">
				<h2><img alt="aptitpas" src="http://preprod.aptitspas-asso.fr/wp-content/themes/donation/css/images/logo-blanc.png"><?php echo ale_get_meta('howhelptitle'); ?></h2>

				<div class="col-6 left">
					<h3><?php echo ale_get_meta('howhelptitlesmall'); ?></h3>
					<p>
						<?php echo ale_get_meta('howhelptext'); ?>
					</p>
					<a class="button" href="http://preprod.aptitspas-asso.fr/presentation/"><span class="text"><?php _e('En savoir plus','aletheme'); ?></span><span class="shadow"></span></a>
				</div>
				<div class="col-6 right">
					<div class="col-6 item"><a href="http://preprod.aptitspas-asso.fr/contact/" class="howhelplink"> Devenir Membre </a></div>
					<div class="col-6 item"><a href="http://preprod.aptitspas-asso.fr/contact/" class="howhelplink"> Devenir M&eacutec&egravene </a></div>
					<div class="col-6 item"><a href="http://preprod.aptitspas-asso.fr/contact/" class="howhelplink"> Devenir B&eacuten&eacutevole </a></div>
					
					
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

