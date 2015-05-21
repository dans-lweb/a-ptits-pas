<?php get_header(); ?>
    <!-- Top Page Nav -->
    <section class="top-page-nav">
        <div class="center cf">

            <h2><?php wp_title("", true); ?></h2>

            <?php echo get_breadcrumbs(); ?>

        </div>
    </section>

    <div class="center cf">

		<!-- Blog -->
		<section class="col-8 blog-page">
			<?php
			$count = 0;
			$stickies = get_option('sticky_posts');
			if( $stickies ) {
				$args = array( 'ignore_sticky_posts' => 1, 'post__not_in' => $stickies );
				global $wp_query;
				query_posts( array_merge($wp_query->query, $args));
			}
			?>
			<?php  if (have_posts()) : while (have_posts()) : the_post(); $count++; ?>
		<?php if($count == 1): ?>
			<!-- -->
			<article class="big">

				<div class="img-big">
					<?php if(ale_get_meta('fvideourl')): ?>
						<?php echo wp_oembed_get(ale_get_meta('fvideourl'),array('width'=>'100%','height'=>'296px')); ?>
					<?php else: ?>
						<?php if(get_the_post_thumbnail($post->ID,'post-thumba')): ?>
							<?php echo get_the_post_thumbnail($post->ID,'post-thumba');?>
						<?php else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
					<?php endif; ?>
					<?php if( function_exists('dot_irecommendthis') ) {?>
						<div class="like">
							<p class="heart">
								<?php dot_irecommendthis(); ?>
							</p>
						</div>
					<?php } ?>
					<div class="logo"></div>
				</div>
				<a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
				<div class="cf">
					<div class="info">
						<div><span><?php _e('Par:','aletheme'); ?></span> <?php the_author();?></div>
						<div><span><?php _e('Dans:','aletheme'); ?></span> <?php the_category(', ');?></div>
						<div><?php the_tags('<span>Tag:</span> '); ?></div>
					</div>
					<div class="date"><?php the_time('j M Y');?></div>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink();?>"><?php _e('Lire la suite','aletheme'); ?> ›</a>
			</article>
		<!-- -->
			<div class="smalls grid-gutter cf">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<?php else: ?>
					<article class="col-6 small">
						<div class="img">
							<?php if(ale_get_meta('fvideourl')): ?>
								<?php echo wp_oembed_get(ale_get_meta('fvideourl'),array('width'=>'323px','height'=>'169px')); ?>
							<?php else: ?>
								<?php if(get_the_post_thumbnail($post->ID,'post-small')): ?>
									<?php echo get_the_post_thumbnail($post->ID,'post-small');?>
								<?php else: echo '<img src="http://placehold.it/323x169/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
							<?php endif; ?>
							<?php if( function_exists('dot_irecommendthis') ) {?>
								<div class="like">
									<p class="heart">
										<?php dot_irecommendthis(); ?>
									</p>
								</div>
							<?php } ?>
						</div>
						<a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
						<div class="info cf">
							<div><span><?php _e('Le:','aletheme'); ?></span> <?php the_time('j M Y');?></div>
							<div><span><?php _e('Par:','aletheme'); ?></span> <?php the_author();?></div>
							<div><span><?php _e('Dans:','aletheme'); ?></span> <?php the_category(', ');?></div>
						</div>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink();?>"><?php _e('Lire la suite','aletheme'); ?> ›</a>
						<div class="line"></div>
					</article>
				<?php endif; ?>
				<?php endwhile;  endif; wp_reset_query();?>
			</div>

			<?php ale_page_links(); ?>

		</section>

		<?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>