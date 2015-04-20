<?php 
/**
 * Template Name: Template About 2
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

	<!-- Contacts -->
	<div class="wrapper template-about-2 clearfix">
		<?php if(ale_get_meta('displayabout2slider')!="off"): ?>
			<?php if(ale_get_meta('about2sliderimage1')||ale_get_meta('about2sliderimage2')||ale_get_meta('about2sliderimage3')||ale_get_meta('about2sliderimage4')): ?>
				<div class="slider">
					<ul class="slides">
						<?php if(ale_get_meta('about2sliderimage1')): ?>
							<li><img src="<?php echo ale_get_meta('about2sliderimage1'); ?>" alt></li>
						<?php endif; ?>

						<?php if(ale_get_meta('about2sliderimage2')): ?>
							<li><img src="<?php echo ale_get_meta('about2sliderimage2'); ?>" alt></li>
						<?php endif; ?>

						<?php if(ale_get_meta('about2sliderimage3')): ?>
							<li><img src="<?php echo ale_get_meta('about2sliderimage3'); ?>" alt></li>
						<?php endif; ?>

						<?php if(ale_get_meta('about2sliderimage4')): ?>
							<li><img src="<?php echo ale_get_meta('about2sliderimage4'); ?>" alt></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if(ale_get_meta('displayabout2textblock')!="off"):
			if (have_posts()) :?>
				<article class="text-block">
					<h2><?php echo ale_get_meta('about2texttitle'); ?></h2>
					 <?php while (have_posts()) : the_post(); ?>
						<div class="content">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				</article>
			 <?php endif; wp_reset_query();?>
		<?php endif; ?>

		<?php if(ale_get_meta('displayabout2team')!="off"): ?>
			<?php
			wp_reset_query();
			$query_team = new WP_Query(
				array(
					'posts_per_page' => 4,
					'post_type' => 'team',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_team->have_posts()) : ?>
				<section class="team">
					<h2><?php echo ale_get_meta('about2teamtitle'); ?></h2>

					<div class="items clearfix">
						<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
							<article>
								<div class="image">
									<?php if(get_the_post_thumbnail($post->ID,'team-thumb')){ 
										echo get_the_post_thumbnail($post->ID,'team-thumb');
									} else{
										echo '<img src="http://placehold.it/246x305/f2f2f2/414141&amp;text=No+image" alt>';
									} ?>
								</div>

								<div class="text">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<span class="team-post"><?php echo ale_get_meta('teampost'); ?></span>
									<div class="string">
										<?php echo ale_trim_excerpt(12); ?>
									</div>
									<div class="media-links">
										<?php if(ale_get_meta('teamtwitter')): ?>
											<a href="<?php echo ale_get_meta('teamtwitter'); ?>"><span class="fa fa-twitter"></span></a>
										<?php endif; ?>

										<?php if(ale_get_meta('teamfacebook')): ?>
											<a href="<?php echo ale_get_meta('teamfacebook'); ?>"><span class="fa fa-facebook"></span></a>
										<?php endif; ?>
										
										<?php if(ale_get_meta('teampinterest')): ?>
											<a href="<?php echo ale_get_meta('teampinterest'); ?>"><span class="fa fa-pinterest"></span></a>
										<?php endif; ?>
										
										<?php if(ale_get_meta('teamskype')): ?>
											<a href="callto:<?php echo ale_get_meta('teamskype'); ?>"><span class="fa fa-skype"></span></a>
										<?php endif; ?>
									</div>
								</div>
							</article>
						<?php endwhile; ?>
					</div>
				</section>
			 <?php endif; wp_reset_query();
		endif; ?>

		<?php if(ale_get_meta('displayabout2map')!="off"): ?>
			<div class="map clearfix">
				<div class="map-item-1">
					<?php $adre = ale_get_meta('about2mapaddress'); echo do_shortcode('[ale_map address="'.$adre.'" width="100%" height="519px"]'); ?>
				</div>
				<div class="map-item-2">
					<div class="item">
						<div class="myStat" data-fontsize="29" data-dimension="160" data-width="29" data-fill="#fdf9eb" data-bgcolor="#ffffff" data-fgcolor="#7bae4e" data-text="<?php echo ale_get_meta('about2percentage1'); ?>%" data-percent="<?php echo ale_get_meta('about2percentage1'); ?>" data-fill="#fff"></div>
						<span class="description">
							<?php echo ale_get_meta('about2description1'); ?>
						</span>
					</div>

					<div class="item">
						<div class="myStat" data-fontsize="29" data-dimension="160" data-width="29" data-fill="#fdf9eb" data-bgcolor="#ffffff" data-fgcolor="#7bae4e" data-text="<?php echo ale_get_meta('about2percentage2'); ?>%" data-percent="<?php echo ale_get_meta('about2percentage2'); ?>" data-fill="#fff"></div>
						<span class="description">
							<?php echo ale_get_meta('about2description2'); ?>
						</span>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if(ale_get_meta('displayabout2textblock2')!="off"): ?>
			<div class="contact-form clearfix">
				<div class="col-8">
					<h2><?php echo ale_get_meta('about2textblock2title'); ?></h2>
					<p><?php echo ale_get_meta('about2textblock2text'); ?></p>
					<a href="<?php echo ale_get_meta('about2textblock2link'); ?>"><?php _e('Read more', 'aletheme'); ?><span class="fa fa-angle-right"></span></a>
				</div>
				
				<div class="col-4">
					<form action="<?php the_permalink();?>" method="post">
						<?php if (isset($_GET['success'])) : ?>
							<p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
						<?php endif; ?>
						<?php if (isset($error) && isset($error['msg'])) : ?>
							<p class="error"><?php echo $error['msg']?></p>
						<?php endif; ?>
						<input name="contact[email]" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" placeholder="<?php _e('E-mail', 'aletheme')?>" class="email" type="text" required="required"/>
						<textarea name="contact[message]" placeholder="<?php _e('Message...', 'aletheme')?>" class="message" name="message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
						<div class="send-email">
							<input id="submit" type="submit" value="<?php _e('Send', 'aletheme')?>"/>
						</div>
						<?php wp_nonce_field() ?>
					</form>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>