<?php
/**
 * Template Name: Template Blog 2
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper template-blog-2 clearfix">
		<?php
		wp_reset_query();
		if ( get_query_var('paged') ) $paged = get_query_var('paged');
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$post_count = 1;
		$blog_count = ale_get_meta('templateblog2count');
		$query_blog = new WP_Query(
			array(
				'post_type' => 'news',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
				'posts_per_page'=> $blog_count
			)
		);
		if ($query_blog->have_posts()) : ?>
			<div class="items">
				<?php  while ($query_blog->have_posts()) : $query_blog->the_post(); $post_count++; ?>
					<article class="clearfix">
						<div class="col-6 image">
							<?php
							if(get_the_post_thumbnail($post->ID, 'post-blog2')){
								echo get_the_post_thumbnail($post->ID, 'post-blog2');
							}else{
								echo '<img src="http://placehold.it/540x362/f2f2f2/414141&amp;text=No+image" alt>';
							}
						 	?>
						</div>

						<div class="col-6 text">
							<h2><?php the_title(); ?></h2>

							<div class="string">
								<?php the_excerpt(); ?>
							</div>
							
							<a class="suite" href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'aletheme'); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>

		<?php ale_custom_page_links($query_blog); ?>
	</div>
<?php get_footer(); ?>