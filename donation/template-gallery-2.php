<?php
/**
 * Template Name: Template Gallery 2
 */
get_header(); ?>
	<!-- Top Page Nav -->
	<section class="top-page-nav">
		<div class="center cf">
			<h2><?php wp_title("", true); ?></h2>

			<?php echo get_breadcrumbs(); ?>
		</div>
	</section>

	<div class="wrapper template-gallery-2">
		<?php
		wp_reset_query();
		if ( get_query_var('paged') ) $paged = get_query_var('paged');
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$post_count = 0;
		$gallery_count = ale_get_meta('templategallery2count');
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
			<div class="items clearfix">
				<div class="grid-sizer"></div>
				<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); $post_count++;?>
					<article class="item <?php if($post_count==1 || $post_count==7 || $post_count==2 || $post_count==6){
							echo 'big';
						}elseif($post_count==5){
							echo 'wide';
						} else{
						}?>">
						<?php if($post_count==1 || $post_count==7){
							if(get_the_post_thumbnail($post->ID, 'gallery-gall21')){
								echo get_the_post_thumbnail($post->ID, 'gallery-gall21');
							}else{
								echo '<img src="http://placehold.it/540x540/f2f2f2/414141&amp;text=No+image" alt>';
							}
						} elseif($post_count==2 || $post_count==6){
							if(get_the_post_thumbnail($post->ID, 'gallery-gall22')){
								echo get_the_post_thumbnail($post->ID, 'gallery-gall22');
							}else{
								echo '<img src="http://placehold.it/540x270/f2f2f2/414141&amp;text=No+image" alt>';
							}
						} elseif($post_count==5){
							if(get_the_post_thumbnail($post->ID, 'gallery-gall23')){
								echo get_the_post_thumbnail($post->ID, 'gallery-gall23');
							}else{
								echo '<img src="http://placehold.it/1080x343/f2f2f2/414141&amp;text=No+image" alt>';
							}
						} else{
							if(get_the_post_thumbnail($post->ID, 'gallery-gall24')){
								echo get_the_post_thumbnail($post->ID, 'gallery-gall24');
							}else{
								echo '<img src="http://placehold.it/270x270/f2f2f2/414141&amp;text=No+image" alt>';
							}
						}?>

						<div class="text">
							<h2><?php the_title(); ?></h2>

							<div class="string">
							<?php 
						 	if($post_count==1 || $post_count==2 || $post_count==5 || $post_count==6 || $post_count==7){
								echo ale_trim_excerpt(30);
							} else{
								echo ale_trim_excerpt(10);
							} ?>
							</div>
						</div>
						<a href="<?php the_permalink(); ?>"></a>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query(); ?>

		<?php ale_custom_page_links($query_gallery); ?>
	</div>
<?php get_footer(); ?>