<?php
/**
 * Template Name: Template Blog 3
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper template-blog-3">
		<?php
		wp_reset_query();
		if ( get_query_var('paged') ) $paged = get_query_var('paged');
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$blog_count = ale_get_meta('templateblog3count');
		$query_blog = new WP_Query(
			array(
				'post_type' => 'post',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
				'posts_per_page'=> $blog_count
			)
		);
		if ($query_blog->have_posts()) : ?>
			<div class="items clearfix">
				<?php while ($query_blog->have_posts()) : $query_blog->the_post();?>
					<article class="clearfix">
						<div class="image">
							<?php
							if(get_the_post_thumbnail($post->ID, 'post-blog3')){
								echo get_the_post_thumbnail($post->ID, 'post-blog3');
							}else{
								echo '<img src="http://placehold.it/515x277/f2f2f2/414141&amp;text=No+image" alt>';
							}
						 	?>
						</div>

						<div class="text clearfix">
							<div class="post-info">
								<span class="date"><?php the_time('j M Y'); ?></span>
								<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
								<?php the_tags('',''); ?>
							</div>

							<div class="post-body">
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

								<div class="string">
									<?php echo ale_trim_excerpt(30); ?>
								</div>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>

		<?php ale_custom_page_links($query_blog); ?>
	</div>
<?php get_footer(); ?>