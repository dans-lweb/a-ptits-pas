<?php

// Google maps API
wp_print_scripts( 'google-maps-api' );

wp_reset_query();
//Query array to get all causes
$ale_map_causes = array(
	'post_type' => 'causes',
	'post_status' => 'publish',
	'posts_per_page' => -1
);

$ale_map_query = new WP_Query( $ale_map_causes );

$ale_causes_string = "";

if ( $ale_map_query->have_posts() ) :
	while ( $ale_map_query->have_posts() ) :
		$ale_map_query->the_post();

		if(empty($ale_causes_string)){
			$ale_causes_string .= '{';
		}else{
			$ale_causes_string .= ', {';
		}

		// The Title
		$ale_causes_string .= ' title:"'.get_the_title().'", ';

		// Title Link
		$ale_causes_string .= ' url:"'.get_permalink().'", ';

		// Thumbnail image
		if(has_post_thumbnail()){
			$image_id = get_post_thumbnail_id();
			$image_attributes = wp_get_attachment_image_src( $image_id, 'causes-thumb' );
			if(!empty($image_attributes[0])){
				$ale_causes_string .= ' thumb:"'.$image_attributes[0].'", ';
			}
		} else{
			$ale_causes_string .= ' thumb:"http://placehold.it/327x192/f2f2f2/414141&amp;text=No+image", ';
		}

		// The Location
		$cause_location = ale_get_meta('causesmapaddress');
		if(!empty($cause_location)){
			$coordinates = ale_map_get_coordinates( $cause_location );
			$ale_causes_string .= ' lat:'.$coordinates['lat'].', ';
			$ale_causes_string .= ' lng:'.$coordinates['lng'].', ';
		}

		$ale_causes_string .= ' icon:"'.get_template_directory_uri().'/css/images/map-icon.png", ';

		$ale_causes_string .= '} ';
	endwhile;
	wp_reset_query();
	?>
	<script type="text/javascript">
		function initializecausesMap() {

			var causes = [
				<?php echo  $ale_causes_string; ?>
			];
			var location_center = new google.maps.LatLng(causes[0].lat,causes[0].lng);
			var mapOptions = {
				zoom: 12,
				scrollwheel: false,
				styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]}]
			}
			var map = new google.maps.Map(document.getElementById("causes-map"), mapOptions);
			var bounds = new google.maps.LatLngBounds();
			var markers = new Array();
			var info_windows = new Array();

			for (var i=0; i < causes.length; i++) {

				markers[i] = new google.maps.Marker({
					position: new google.maps.LatLng(causes[i].lat,causes[i].lng),
					map: map,
					icon: causes[i].icon,
					title: causes[i].title,
					animation: google.maps.Animation.DROP
				});

				bounds.extend(markers[i].getPosition());

				info_windows[i] = new google.maps.InfoWindow({
					content:    '<div class="map-info-window cf"><div class="image col-6">'+
						'<a class="thumb-link" href="'+causes[i].url+'"><img class="thumba" src="'+causes[i].thumb+'" alt="'+causes[i].title+'"/></a>'+
						'</div><div class="text col-6">'+
						'<h3 class="title"><a class="title-link" href="'+causes[i].url+'">'+causes[i].title+'</a></h3>'+
						'<a class="more-link" href="'+causes[i].url+'"><?php _e('Take a look','aletheme'); ?></a>'+
						'</div></div>'
				});

				attachInfoWindowToMarker(map, markers[i], info_windows[i]);
			}

			map.fitBounds(bounds);

			function attachInfoWindowToMarker( map, marker, infoWindow ){
				google.maps.event.addListener( marker, 'click', function(){
					infoWindow.open( map, marker );
				});
			}

		}

		google.maps.event.addDomListener(window, 'load', initializecausesMap);
	</script>

	<div id="map-head">
		<div id="causes-map"></div>
	</div>
<?php endif; ?>