<?php add_action('admin_init', 'add_meta_boxes', 1);
function add_meta_boxes() {
	wp_reset_query();
	global $post;
	$query_page = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type' => 'page',
		)
	);
	if ($query_page->have_posts()) : while ($query_page->have_posts()) : $query_page->the_post();
		if(isset($_GET['post'])){
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post->ID'] ;
			$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
			if ($template_file == 'template-home-5.php'||$template_file == 'template-about-3.php') {
				add_meta_box( 'ale_history_details', 'Additional Details', 'ale_history_details_box_display', 'page', 'normal', 'high');
			}
		}
	endwhile; endif; wp_reset_query();
}

function ale_history_details_box_display() {
global $post;

$ale_history_details = get_post_meta($post->ID, 'ale_history_details', true);


wp_nonce_field( 'ale_history_details_box_nonce', 'ale_history_details_box_nonce' );
?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.metabox_submit').click(function(e) {
			e.preventDefault();
			$('#publish').click();
		});
		$('#add-row').on('click', function() {
			var row = $('.empty-row.screen-reader-text').clone(true);
			row.removeClass('empty-row screen-reader-text');
			row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
			return false;
		});
		$('.remove-row').on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});

		$('#repeatable-fieldset-one tbody').sortable({
			opacity: 0.6,
			revert: true,
			cursor: 'move',
			handle: '.sort'
		});
	});
</script>

<table id="repeatable-fieldset-one" width="100%">
	<thead>
	<tr>
		<th width="2%"></th>
		<th width="30%"><?php _e('Date', 'aletheme'); ?></th>
		<th width="60%"><?php _e('Description', 'aletheme'); ?></th>
		<th width="2%"></th>
	</tr>
	</thead>
	<tbody>
	<?php

	if ( $ale_history_details ) :

		foreach ( $ale_history_details as $field ) {
			?>
			<tr>
				<td><a class="button remove-row" href="#"><span class="dashicons dashicons-trash"></span></a></td>
				<td><input type="text" class="widefat" name="title[]" value="<?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?>" /></td>

				<td><input type="text" class="widefat" name="value[]" value="<?php if ($field['value'] != '') echo esc_attr( $field['value'] );  ?>" /></td>
				<td><a class="sort"><span class="dashicons dashicons-sort" title="<?php _e('Click and Drag','aletheme');?>"></span></a></td>

			</tr>
		<?php
		}
	else :
		// show a blank one
		?>
		<tr>
			<td><a class="button remove-row" href="#"><span class="dashicons dashicons-trash"></span></a></td>
			<td><input type="text" class="widefat" name="title[]" /></td>


			<td><input type="text" class="widefat" name="value[]" value="" /></td>
			<td><a class="sort"><span class="dashicons dashicons-sort" title="<?php _e('Click and Drag','aletheme');?>"></span></a></td>

		</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
		<td><a class="button remove-row" href="#"><span class="dashicons dashicons-trash"></span></a></td>
		<td><input type="text" class="widefat" name="title[]" /></td>


		<td><input type="text" class="widefat" name="value[]" value="" /></td>
		<td><a class="sort"><span class="dashicons dashicons-sort" title="<?php _e('Click and Drag','aletheme');?>"></span></a></td>

	</tr>
	</tbody>
</table>

<p><a id="add-row" class="button" href="#"><span class="dashicons dashicons-plus" style="line-height: 28px; font-size:14px;"></span> Add another</a>
	<input type="submit" class="metabox_submit" value="Save" />
</p>

<?php
}

add_action('save_post', 'ale_history_details_box_save');
function ale_history_details_box_save($post_id) {
	if ( ! isset( $_POST['ale_history_details_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['ale_history_details_box_nonce'], 'ale_history_details_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'ale_history_details', true);
	$new = array();


	$titles = $_POST['title'];
	$values = $_POST['value'];

	$count = count( $titles );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $titles[$i] != '' ) :
			$new[$i]['title'] = stripslashes( strip_tags( $titles[$i] ) );
			$new[$i]['value'] = stripslashes( $values[$i] );
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'ale_history_details', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'ale_history_details', $old );
}
