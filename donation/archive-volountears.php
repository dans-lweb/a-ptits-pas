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
			wp_reset_query();
			$query_volountears = new WP_Query(
				array(
					'post_type' => 'volountears',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_volountears->have_posts()) : while ($query_volountears->have_posts()) : $query_volountears->the_post(); ?>
				<!-- -->
				<article class="big">

					<div class="img-big">
						<?php if(get_the_post_thumbnail($post->ID,'volountears-thumba')): ?>
							<?php echo get_the_post_thumbnail($post->ID,'volountears-thumba');?>
						<?php else: echo '<img src="http://placehold.it/685x296/f2f2f2/414141&amp;text=No+image" alt>'; endif; ?>
						<div class="logo"></div>
					</div>
					<a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink();?>"><?php _e('Read more','aletheme'); ?> ›</a>
				</article>
				<!-- -->
			<?php endwhile;  endif;  wp_reset_query();?>

			<?php ale_page_links(); ?>

		</section>

		<?php get_sidebar(); ?>

	</div>
<?php get_footer(); ?>