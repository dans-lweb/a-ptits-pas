<?php
/**
 * Template Name: Template Blog 1
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper template-blog-1 clearfix">
		<?php
		wp_reset_query();
		if ( get_query_var('paged') ) $paged = get_query_var('paged');
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$post_count = 1;
		$blog_count = ale_get_meta('templateblog1count');
		$query_blog = new WP_Query(
			array(
				'post_type' => 'post',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
				'posts_per_page'=> $blog_count
			)
		);
		if ($query_blog->have_posts()) : while ($query_blog->have_posts()) : $query_blog->the_post(); ?>
			<article>
				<div class="image">
					<?php
					if(get_the_post_thumbnail($post->ID, 'post-blog1')){
						echo get_the_post_thumbnail($post->ID, 'post-blog1');
					}else{
						echo '<img src="http://placehold.it/343x172/f2f2f2/414141&amp;text=No+image" alt>';
					}
				 	?>
				 	<a href="<?php the_permalink() ?>" class="overlay">
				 		<span class="fa fa-eye"></span>
				 	</a>
				</div>

				<div class="text">
					<h2><?php the_title(); ?></h2>

					<div class="string">
						<?php echo ale_trim_excerpt(20); ?>
					</div>
					
					<div class="post-info">
						<span class="date"><?php the_time('j M Y'); ?></span>
						<span class="com-count"><span class="fa fa-comment-o"></span><?php $comments_count = wp_count_comments($post->ID); echo $comments_count->total_comments; ?></span>
						<?php the_tags('',''); ?>
					</div>
				</div>
			</article>
		<?php
		if($post_count%3==0){echo '<hr class="hr">';} $post_count++;
		endwhile; endif; wp_reset_query(); ?>

		<?php ale_custom_page_links($query_blog); ?>
	</div>
<?php get_footer(); ?>