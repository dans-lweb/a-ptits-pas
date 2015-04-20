<?php 
/**
 * Template Name: Template About 3
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
	<div class="template-about-3">
		<div class="wrapper">
			<?php if(ale_get_meta('displayabout3team')!="off"): ?>
				<section class="team-box">
					<h2><?php echo ale_get_meta('about3teamtitle'); ?></h2>

					<div class="items clearfix">
						<?php
						wp_reset_query();
						$query = new WP_Query(
							array(
								'posts_per_page' => 4,
								'post_type' => 'team',
								'ignore_sticky_posts' => 1,
								'post__not_in' => get_option('sticky_posts')
							)
						);
						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
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
						<?php endwhile; endif; wp_reset_query();?>
					</div>
				</section>
			<?php endif; ?>
		</div>

		<?php if(ale_get_meta('displayabout3events')!="off"): ?>
			<div class="events-box">
				<h2><?php echo ale_get_meta('about3eventstitle'); ?></h2>
				<div class="clearfix">
					<?php
					wp_reset_query();
					$query_events = new WP_Query(
						array(
							'posts_per_page' => 4,
							'post_type' => 'events',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts')
						)
					);
					if ($query_events->have_posts()) : while ($query_events->have_posts()) : $query_events->the_post();?>
						<article class="col-3">
							<?php 
							if(get_the_post_thumbnail($post->ID,'events-home5small')){
								echo get_the_post_thumbnail($post->ID,'events-home5small');
							} else{
								echo '<img src="http://placehold.it/481x333/f2f2f2/414141&amp;text=No+image" alt>';
							}?>
							<div class="text">
								<h2><?php the_title(); ?></h2>
								<div class="string">
								 	<?php echo ale_trim_excerpt(10); ?>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>" class="overlay"></a>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
			</div>
		<?php endif; ?>

		<?php if(ale_get_meta('displayabout3history')!="off"):
			$history_meta = get_post_meta($post->ID, 'ale_history_details', true);
			if ( $history_meta ) : ?>
				<section class="home-5-history clearfix">
					<div class="top">
						<h2><?php echo ale_get_meta('about3historytitle'); ?></h2>
					</div>
					<div class="image" <?php if(ale_get_meta('about3historybg')){echo 'style="background-image: url('.ale_get_meta('about3historybg').')"';} ?>></div>
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

    	<?php if(ale_get_meta('displayabout3information')!="off"): ?>
	        <section class="information-box">
	            <div class="wrapper">
	                <h2><?php echo ale_get_meta('about3infotitle'); ?></h2>
	                <div class="items clearfix">
	                    <article class="col-4 clearfix">
	                        <span class="fa fa-send"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle1'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext1'); ?></p>
	                    </article>

	                    <article class="col-4 clearfix">
	                        <span class="fa fa-bell"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle2'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext2'); ?></p>
	                    </article>

	                    <article class="col-4 clearfix">
	                        <span class="fa fa-dropbox"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle3'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext3'); ?></p>
	                    </article>

	                    <article class="col-4 clearfix">
	                        <span class="fa fa-briefcase"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle4'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext4'); ?></p>
	                    </article>

	                    <article class="col-4 clearfix">
	                        <span class="fa fa-book"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle5'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext5'); ?></p>
	                    </article>

	                    <article class="col-4 clearfix">
	                        <span class="fa fa-automobile"></span>
	                        <h3><?php echo ale_get_meta('about3infotitle6'); ?></h3>
	                        <p><?php echo ale_get_meta('about3infotext6'); ?></p>
	                    </article>
	                </div>
	            </div>
	        </section>
	    <?php endif; ?>

		<?php if(ale_get_meta('displayabout3partners')!="off"): ?>
	        <div class="partners-box">
	            <h2><?php echo ale_get_meta('about3partnerstitle'); ?></h2>
	            <div class="wrapper clearfix">
	                <div class="text">
	                    <h2><?php echo ale_get_meta('about3partnerstitle1'); ?></h2>
	                    <p><?php echo ale_get_meta('about3partnerstext'); ?></p>
	                </div>

	                <div class="items clearfix">
	                    <?php if(ale_get_meta('about3partnersimage1')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink1'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage1').'" alt>'; ?>
	                        </a>
	                    <?php } ?>

	                    <?php if(ale_get_meta('about3partnersimage2')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink2'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage2').'" alt>'; ?>
	                        </a>
	                    <?php } ?>

	                    <?php if(ale_get_meta('about3partnersimage3')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink3'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage3').'" alt>'; ?>
	                        </a>
	                    <?php } ?>

	                    <?php if(ale_get_meta('about3partnersimage4')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink4'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage4').'" alt>'; ?>
	                        </a>
	                    <?php } ?>

	                    <?php if(ale_get_meta('about3partnersimage5')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink5'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage5').'" alt>'; ?>
	                        </a>
	                    <?php } ?>

	                    <?php if(ale_get_meta('about3partnersimage6')){ ?>
	                        <a href="<?php echo ale_get_meta('about3partnerslink6'); ?>" class="item">
	                            <?php echo '<img src="'.ale_get_meta('about3partnersimage6').'" alt>'; ?>
	                        </a>
	                    <?php } ?>
	                </div>
	            </div>
	        </div>
	    <?php endif; ?>
	</div>
<?php get_footer(); ?>