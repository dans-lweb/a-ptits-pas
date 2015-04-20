<?php
/**
 * Template Name: Template Gallery 1
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper template-gallery-1">
		<?php
		wp_reset_query();
		if ( get_query_var('paged') ) $paged = get_query_var('paged');
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$gallery_count = ale_get_meta('templategallery1count');
		$query_gallery = new WP_Query(
			array(
				'post_type' => 'gallery',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
				'posts_per_page'=> $gallery_count
			)
		);
		if ($query_gallery->have_posts()) :?>
			<div class="items clearfix">
				<?php while ($query_gallery->have_posts()) : $query_gallery->the_post();?>
					<article>
						<?php
						if(get_the_post_thumbnail($post->ID, 'gallery-gall1')){
							echo get_the_post_thumbnail($post->ID, 'gallery-gall1');
						}else{
							echo '<img src="http://placehold.it/270x399/f2f2f2/414141&amp;text=No+image" alt>';
						}
					 	?>

						<div class="text">
							<h2><?php the_title(); ?></h2>

							<div class="string">
								<?php echo ale_trim_excerpt(4); ?>
							</div>
						</div>
						<a href="<?php the_permalink(); ?>">
							<span class="overlay">
								<span class="gradient"></span>
								<span class="gradient"></span>
								<span class="gradient"></span>
								<span class="icon">
									<span class="fa fa-arrow-right"></span>
								</span>
							</span>
						</a>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>

		<?php ale_custom_page_links($query_gallery); ?>
	</div>
<?php get_footer(); ?>