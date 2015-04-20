<?php
/**
 * Template Name: Template Gallery 3
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper clearfix">
		<div class="col-8 template-gallery-3">
			<?php
			wp_reset_query();
			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			if ( get_query_var('page') ) $paged = get_query_var('page');
			$post_count = 0;
			$gallery_count = ale_get_meta('templategallery3count');
			$query_gallery = new WP_Query(
				array(
					'post_type' => 'gallery',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts'),
					'paged' => $paged,
					'posts_per_page'=> $gallery_count
				)
			);
			if ($query_gallery->have_posts()) : ?>
			<div class="items">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
					<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); $post_count++;?>
						<article class="item">
							<div class="image">
								<?php
								if(get_the_post_thumbnail($post->ID, 'gallery-thumba')){
									echo get_the_post_thumbnail($post->ID, 'gallery-thumba');
								}else{
									echo '<img src="http://placehold.it/331x304/f2f2f2/414141&amp;text=No+image" alt>';
								}
							 	?>
							</div>
							<div class="text">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string">
									<?php echo ale_trim_excerpt(6); ?>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			<?php endif; wp_reset_query(); ?>

			<?php ale_custom_page_links($query_gallery); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>