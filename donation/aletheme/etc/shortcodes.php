<?php
/**
 * Removes inline styles printed when the gallery shortcode is used.
 */
add_filter( 'use_default_gallery_style', '__return_false' );

// Enable Shortcodes in excerpts and widgets
add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');

function ale_featured_video($atts, $content = null) {
    extract(shortcode_atts(array(
		'url'     	 => '',
    ), $atts));
	
	if (!$url) {
		return '';
	}
	
	return '<p class="video">' . wp_oembed_get($url, array(
		'width' => '900',
		'height' => '600',
	)) . '</p>';
}
add_shortcode('featured-video', 'ale_featured_video');