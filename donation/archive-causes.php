<?php get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">

			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>

		</div>
	</section>


	<div class="center cf">
		<?php if(ale_get_option('causesvolountearstextarchive')): ?>
			<div class="top-text-block">
				<p><?php echo ale_get_option('causesvolountearstextarchive'); ?></p>
			</div>
		<?php endif; ?>

		<!-- Blog -->
		<section class="col-12 blog-page causes-page">
			<?php
			wp_reset_query();
			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			if ( get_query_var('page') ) $paged = get_query_var('page');
			$query_causes = new WP_Query(
				array(
					'post_type' => 'causes',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts'),
					'paged' => $paged
				)
			);
			if ($query_causes->have_posts()) : while ($query_causes->have_posts()) : $query_causes->the_post(); ?>
				<article class="clearfix">
					<div class="image">
						<?php if(get_the_post_thumbnail($post->ID,'causes-thumb')){
							echo get_the_post_thumbnail($post->ID,'causes-thumb');
						} else{
							echo '<img src="http://placehold.it/327x192/f2f2f2/414141&amp;text=No+image" alt>';
						}?>
					</div>
					<div class="text">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

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
									<span class="description"><?php _e('Acquis', 'aletheme'); ?></span>
								</div>
							<?php endif; ?>

							<?php if(ale_get_meta('causesdonors')): ?>
								<div class="item donors">
									<span class="value"><?php echo ale_get_meta('causesdonors'); ?></span>
									<span class="description"><?php _e('Donateurs', 'aletheme'); ?></span>
								</div>
							<?php endif; ?>

							<?php if(ale_get_meta('causesgoal')): ?>
								<div class="item">
									<span class="value"><?php echo  ale_get_meta('causesgoal'). ' '. ale_get_option('currencycurrent'); ?></span>
									<span class="description"><?php _e('But', 'aletheme'); ?></span>
								</div>
							<?php endif; ?>
						</div>

						<div class="string">
							<?php the_excerpt(); ?>
						</div>
						<a class="suite" href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'aletheme'); ?></a>
					</div>
				</article>
			<?php endwhile;  endif; wp_reset_query();?>

			<?php ale_page_links(); ?>
		</section>
	
	</div>
<?php get_footer(); ?>