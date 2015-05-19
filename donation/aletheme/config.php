<?php
/**
 * Get current theme options
 * 
 * @return array
 */
function aletheme_get_options() {
	$comments_style = array(
		'wp'  => 'Alethemes Comments',
		'fb'  => 'Facebook Comments',
		'dq'  => 'DISQUS',
		'lf'  => 'Livefyre',
		'off' => 'Disable All Comments',
	);

	$analytics = array(
		'classic'  => 'Classic Analytics',
		'universal'  => 'Universal Analytics',
	);

	$headerfont = array_merge(ale_get_safe_webfonts(), ale_get_google_webfonts());

	$background_defaults = array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll'
	);

	
	$imagepath =  ALETHEME_URL . '/assets/images/';
	
	$options = array();
		
	$options[] = array(	"name" => "Theme",
						"type" => "heading");

	$options[] = array( "name" => "Logo",
						"desc" => "Charger une image ou copier le lien du logo(Taille par defaut: 254-50px)",
						"id" => "ale_sitelogo",
						"std" => "",
						"type" => "upload");

	$options[] = array( 'name' => "Gerer le Background",
						'desc' => "Selectionner la couleur du fond ou charger une image. Couleur par defaut: #f5f5f5",
						'id' => 'ale_background',
						'std' => $background_defaults,
						'type' => 'background');

    $options[] = array( 'name' => "Changer la couleur principale",
                        'desc' => "Selectionner la couleur.",
                        'id' => 'ale_maincolor',
                        'std' => '#7bae4e',
                        'type' => 'color');

    $options[] = array( 'name' => "Changer la couleur secondaire",
                        'desc' => "Selectionner la couleur.",
                        'id' => 'ale_secondarycolor',
                        'std' => '#f65339',
                        'type' => 'color');

    $options[] = array( 'name' => "Changer la couleur tertiaire",
                        'desc' => "Selectionner la couleur.",
                        'id' => 'ale_tertiarycolor',
                        'std' => '#ffd800',
                        'type' => 'color');

    $options[] = array( 'name' => 'Montrer le selecteur de couleurs aux Utilisateurs?',
                        'desc' => 'Choisir "Activer" pour montrer le selecteur',
                        'id'   => 'ale_displaycolorselector',
                        'std'  => 'Enable',
                        'type'    => 'select',
                        'options' => array(
                            'Enable' => 'Activer',
                            'Disable' => 'Desactiver',
                        ), );

	// $options[] = array( "name" => "Background Size Cover",
						// "desc" => "Check if you want to select cover background size",
						// "id" => "ale_backcover",
						// "std" => "1",
						// "type" => "checkbox");

	$options[] = array( "name" => "Charger une favicon",
						"desc" => "Charger la favicon ou copier le lien",
						"id" => "ale_favicon",
						"std" => "",
						"type" => "upload");

	$options[] = array( "name" => "Style de commentaires",
						"desc" => "Choisir le type de commentaires",
						"id" => "ale_comments_style",
						"std" => "wp",
						"type" => "select",
						"options" => $comments_style);

	$options[] = array( "name" => "Commentaires AJAX",
						"desc" => "Laisser coché si Aletheme est choisi",
						"id" => "ale_ajax_comments",
						"std" => "1",
						"type" => "checkbox");

	// $options[] = array( "name" => "Copyrights",
						// "desc" => "Your copyright message.",
						// "id" => "ale_copyrights",
						// "std" => "",
						// "type" => "editor");

	$options[] = array( "name" => "Slider de Page d'accueil",
						"desc" => "Inserer le nom du slider defini dans la section slider",
						"id" => "ale_homeslugfull",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Typographie",
						"type" => "heading");

	$options[] = array( "name" => "Choisir la police de titre depuis Google Library",
						"desc" => "La police par defaut est - PT sans",
						"id" => "ale_headerfont",
						"std" => "PT+Sans",
						"type" => "select",
						"options" => $headerfont);

	// $options[] = array( /* "name" => "Choisir la police de titre depuis Google Library",
						// "desc" => "La police par defaut est - 400,700", */
						// "id" => "ale_headerfontex",
						// "std" => "400,700",
						// "type" => "text");

	$options[] = array( "name" => "Choisir la police principale depuis Google Library",
						"desc" => "La police par defaut est - Open Sans",
						"id" => "ale_mainfont",
						"std" => "Open+Sans",
						"type" => "select",
						"options" => $headerfont);

	// $options[] = array( "name" => "Select the main Font (Extended) from Google Library",
						// "desc" => "The default Font (extended) is - 300,400,600,700,800",
						// "id" => "ale_mainfontex",
						// "std" => "300,400,600,700,800",
						// "type" => "text");

	$options[] = array( "name" => "Choisir la police secondaire depuis Google Library",
						"desc" => "La police par defaut est - Raleway",
						"id" => "ale_secondaryfont",
						"std" => "Raleway",
						"type" => "select",
						"options" => $headerfont);

	// $options[] = array( "name" => "Select the secondary Font (Extended) from Google Library",
						// "desc" => "The default Font (extended) is - 400",
						// "id" => "ale_secondaryfontex",
						// "std" => "400",
						// "type" => "text");

	$options[] = array( 'name' => "Style H1",
						'desc' => "Changer le style du H1",
						'id' => 'ale_h1sty',
						'std' => array('size' => '28px','face' => 'Open+Sans','style' => 'normal','color' => '#1e1d1c'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style H2",
						'desc' => "Changer le style du H2",
						'id' => 'ale_h2sty',
						'std' => array('size' => '22px','face' => 'Open+Sans','style' => 'normal','color' => '#1e1d1c'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style H3",
						'desc' => "Changer le style du h3",
						'id' => 'ale_h3sty',
						'std' => array('size' => '18px','face' => 'Open+Sans','style' => 'normal','color' => '#ffffff'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style H4",
						'desc' => "Changer le style du h4",
						'id' => 'ale_h4sty',
						'std' => array('size' => '14px','face' => 'Open+Sans','style' => 'normal','color' => '#ffffff'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style H5",
						'desc' => "Changer le style du h5",
						'id' => 'ale_h5sty',
						'std' => array('size' => '12px','face' => 'Open+Sans','style' => 'normal','color' => '#ffffff'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style H6",
						'desc' => "Changer le style du h6",
						'id' => 'ale_h6sty',
						'std' => array('size' => '10px','face' => 'Open+Sans','style' => 'normal','color' => '#1e1d1c'),
						'type' => 'typography');

	$options[] = array( 'name' => "Style du Body",
						'desc' => "Change the body font style",
						'id' => 'ale_bodystyle',
						'std' => array('size' => '12px','face' => 'Open+Sans','style' => 'normal','color' => '#7c7c7b'),
						'type' => 'typography');

	$options[] = array( "name" => "Social",
						"type" => "heading");

	$options[] = array( "name" => "Twitter",
						"desc" => "URL du profil twitter.",
						"id" => "ale_twi",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Facebook",
						"desc" => "URL du profil facebook.",
						"id" => "ale_fb",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Google+",
						"desc" => "URL du profil google+.",
						"id" => "ale_gog",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Flickr",
						"desc" => "URL du profil flickr.",
						"id" => "ale_flickr",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "YouTube",
						"desc" => "URL du profil youtube.",
						"id" => "ale_you",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Pinterest",
						"desc" => "URL du profil pinterest.",
						"id" => "ale_pin",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Skype",
						"desc" => "URL du profil skype.",
						"id" => "ale_sky",
						"std" => "",
						"type" => "text");

	// $options[] = array( "name" => "Show RSS",
						// "desc" => "Check if you want to show the RSS icon on your site",
						// "id" => "ale_rssicon",
						// "std" => "1",
						// "type" => "checkbox");

	
	// $options[] = array( "name" => "Facebook Application ID",
						// "desc" => "If you have Application ID you can connect the blog to your Facebook Profile and monitor statistics there.",
						// "id" => "ale_fb_id",
						// "std" => "",
						// "type" => "text");
						
	// $options[] = array( "name" => "Enable Open Graph",
						// "desc" => "The <a href=\"http://www.ogp.me/\">Open Graph</a> protocol enables any web page to become a rich object in a social graph.",
						// "id" => "ale_og_enabled",
						// "std" => "",
						// "type" => "checkbox");


	
	$options[] = array( "name" => "Options avancées",
						"type" => "heading");

	$options[] = array( "name" => "Type Google Analytics",
						"desc" => "Selectionner le code type de google analytics. Universal ou Classic",
						"id" => "ale_analyticstype",
						"std" => "classic",
						"type" => "select",
						"options" => $analytics);
						
	$options[] = array( "name" => "Google Analytics",
						"desc" => "Inserer le code Google Analytics ici. Exemple: <strong>UA-22231623-1</strong>",
						"id" => "ale_ga",
						"std" => "",
						"type" => "text");

	// $options[] = array( "name" => "Footer Code",
						// "desc" => "If you have anything else to add in the footer - please add it here.",
						// "id" => "ale_footer_info",
						// "std" => "",
						// "type" => "textarea");

	// $options[] = array( "name" => "Custom CSS Styles",
						// "desc" => "You can add here your styles. ex. .boxclass { padding:10px; }",
						// "id" => "ale_customcsscode",
						// "std" => "",
						// "type" => "textarea");

	$options[] = array( "name" => "Header",
						"type" => "heading");

	// $options[] = array( "name" => "Name",
						// "desc" => "Insert your name",
						// "id" => "ale_headername",
						// "std" => "Jon Millers",
						// "type" => "text");


	$options[] = array( "name" => "Telephone normal",
						"desc" => "Inserer les 4 premiers chiffres du telephone",
						"id" => "ale_headerphone1",
						"std" => "05 55",
						"type" => "text");

	$options[] = array( "name" => "Telephone gras",
						"desc" => "Inserer la suite du numero",
						"id" => "ale_headerphone2",
						"std" => "00 00 00",
						"type" => "text");

	$options[] = array( "name" => "Footer",
						"type" => "heading");

	$options[] = array( "name" => "Mentions légales",
						"desc" => "",
						"id" => "ale_footerinfo",
						"type" => "title");

	$options[] = array( "name" => "Titre",
						"desc" => "Insert the title",
						"id" => "ale_footerinfotitle",
						"std" => "Company information",
						"type" => "text");

	$options[] = array( "name" => "Texte",
						"desc" => "Inserer le texte",
						"id" => "ale_footerinfotext",
						"std" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here",
						"type" => "textarea");

	$options[] = array( "name" => "Derniers twits",
						"desc" => "",
						"id" => "ale_twitter",
						"type" => "title");

	$options[] = array( "name" => "Titre",
						"desc" => "Inserer le titre",
						"id" => "ale_footertwittertitle",
						"std" => "Latest twits",
						"type" => "text");

	$options[] = array(	'name' => 'Login Twitter',
						'desc' => 'Inserer le login',
						'id'   => 'ale_tweetlogin',
						'std'  => '',
						'type' => 'text');

	$options[] = array(	'name' => 'Clé Client',
						'desc' => 'Inserer la clé client. Obtenir la clé (avec votre compte)- https://dev.twitter.com/apps/',
						'id'   => 'ale_consumerkey',
						'std'  => '',
						'type' => 'text');

	$options[] = array(	'name' => 'Consumer Secret',
						'desc' => 'Insert the consumer secret. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_consumersecret',
						'std'  => '',
						'type' => 'text');

	$options[] = array(	'name' => 'Access Token',
						'desc' => 'Insert the access token. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_accesstoken',
						'std'  => '',
						'type' => 'text');

	$options[] = array(	'name' => 'Access Token Secret',
						'desc' => 'Insert the access token secret. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_accesstokensecret',
						'std'  => '',
						'type' => 'text');

	$options[] = array(	'name' => 'Temps de mise en cache',
						'desc' => 'Inserer un nombre (en heures)',
						'id'   => 'ale_cachetime',
						'std'  => '3',
						'type' => 'text');

	$options[] = array(	'name' => 'Compteur de Tweets',
						'desc' => 'Inserer le compteur',
						'id'   => 'ale_tweetstoshow',
						'std'  => '2',
						'type' => 'text',);

	$options[] = array( "name" => "Contacts",
						"desc" => "",
						"id" => "ale_footercontac",
						"type" => "title");

	$options[] = array( "name" => "Titre",
						"desc" => "Inserer le titre",
						"id" => "ale_footercontacttitle",
						"std" => "Contacts",
						"type" => "text");

	$options[] = array( "name" => "Telephone normal",
						"desc" => "Inserer les 4 premiers chiffres du numero de telephone",
						"id" => "ale_footercontacthone1",
						"std" => "05 55",
						"type" => "text");

	$options[] = array( "name" => "Telephone gras",
						"desc" => "Inserer la fin du numero",
						"id" => "ale_footercontacthone2",
						"std" => "00 00 00",
						"type" => "text");

	$options[] = array( "name" => "Adresse gras",
						"desc" => "Inserer adresse",
						"id" => "ale_footercontactaddress1",
						"std" => "United States",
						"type" => "text");

	$options[] = array( "name" => "Adresse normal",
						"desc" => "Inserer le complément d'adresse'",
						"id" => "ale_footercontactaddress2",
						"std" => "New York, Wall st. 25/1",
						"type" => "text");

	$options[] = array( "name" => "Email",
						"desc" => "Inserer votre adresse email",
						"id" => "ale_footercontactemail",
						"std" => "info@donacion.cm",
						"type" => "text");

	$options[] = array( "name" => "Monnaie",
						"desc" => "",
						"id" => "ale_currency",
						"type" => "title");

	$options[] = array( "name" => "Monnaie",
						"desc" => "Inserer la monnaie",
						"id" => "ale_currencycurrent",
						"std" => "$",
						"type" => "text");

	$options[] = array( "name" => "PayPal",
						"type" => "heading");

	$options[] = array( 'name' => 'Activer PayPal pour les nouvelles causes',
						'desc' => 'Cochez si vous voulez activer le module paypal pour les nouvelles causes',
						'id'   => 'ale_enable_paypal',
						'std'  => '',
						'type' => 'checkbox');

	$options[] = array( 'name' => 'Marchant PayPal',
						'desc' => 'Inserer email ou ID de compte marchant PayPal',
						'id'   => 'ale_merchant_email',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'PayPal Sandbox for Testing ?',
						'desc' => 'Cochez pour activer le PayPal Sandbox for Testing.',
						'id'   => 'ale_enable_sandbox',
						'std'  => '',
						'type' => 'checkbox');

	$options[] = array( 'name' => 'Desactiver la sécurité SSL',
						'desc' => 'Cochez si vous voulez desactiver la connection sécurisée SSL.',
						'id'   => 'ale_ssl_disable',
						'std'  => '',
						'type' => 'checkbox');

	$options[] = array( 'name' => 'Publish on Payment',
						'desc' => 'Check if you want to publish automatically the submitted cause on payment',
						'id'   => 'ale_paypal_auto_publish',
						'std'  => '',
						'type' => 'checkbox');

	$options[] = array( 'name' => 'Email pour les rapport de verification IPN valides',
						'desc' => 'Tapez ici l\'email pour les rapport de verification IPN valides. <i> Les rapports IPN(Instant Payment Notification) contiennent des informations de transaction.</i>',
						'id'   => 'ale_merchant_verified_email',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Email pour les rapport de verification IPN invalides',
						'desc' => 'Tapez ici l\'email pour les rapport de verification IPN invalides. <i> Les rapports IPN(Instant Payment Notification) contiennent des informations de transaction.</i>',
						'id'   => 'ale_merchant_invalid_email',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Monnaie',
						'desc' => 'Tapez le code monnaie. <i>Exemple: EUR</i>',
						'id'   => 'ale_paypal_currency',
						'std'  => 'EUR',
						'type' => 'text');

	// $options[] = array( "name" => "Causes",
						// "type" => "heading");

	// $options[] = array( "name" => "Volountears title",
						// "desc" => "Insert the title",
						// "id" => "ale_causesvolountearstitle",
						// "std" => "Our volountears",
						// "type" => "text");

	// $options[] = array( "name" => "Volountears text",
						// "desc" => "Insert the text",
						// "id" => "ale_causesvolountearstext",
						// "std" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummnny text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make",
						// "type" => "textarea");


	// $options[] = array( "name" => "Volountears text on causes arhive",
						// "desc" => "Insert the text",
						// "id" => "ale_causesvolountearstextarchive",
						// "std" => "Aenean vitae condimentum velit. Praesent dapibus euismod accumsan. Sed ut ante leo. Maecenas conidime etum pretium odio at porta. Pellentesque et tellus odio. Quisqu es lorem ipsum dolor sit amet vivamus egestas vestibulum id arcu sapien praesent dapibus euismod accumsan. Sed ut ante leo maecenas conidime.",
						// "type" => "textarea");


	return $options;
}

/**
 * Add custom scripts to Options Page
 */
function aletheme_options_custom_scripts() {
 ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#ale_commentongallery').click(function() {
		jQuery('#section-ale_gallerycomments_style').fadeToggle(400);
	});
	if (jQuery('#ale_commentongallery:checked').val() !== undefined) {
		jQuery('#section-ale_gallerycomments_style').show();
	}
});
</script>

<?php
}


/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

	$prefix = "ale_";

	/* Get Causes List */
	$causes_args = array(
		'post_type' => 'causes',
	);
	$ale_causes = new WP_Query( $causes_args );
	$cause_list[] = array('name' => 'Disable Causes', 'value' =>  '');
	if ( $ale_causes->have_posts() ) {
		while ( $ale_causes->have_posts() ) {
			$ale_causes->the_post();
			$cause_list[]= array('name' => $ale_causes->post->post_title, 'value' =>  $ale_causes->post->ID);
		}
	} else {
		$cause_list = array(
			array( 'name' => 'No Cause in DataBase' , 'value' => '', ),
		);
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			// array(
				// 'name' => 'Display or hide Boxes on Home page',
				// 'desc' => '',
				// 'id'   => $prefix . 'display',
				// 'type'    => 'title',
			// ),
			// array(
				// 'name' => 'Show The Slider Box?',
				// 'desc' => 'Select enable to show the Slider box',
				// 'id'   => $prefix . 'sliderhome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The Information Box?',
				// 'desc' => 'Select enable to show the Information box',
				// 'id'   => $prefix . 'informationhome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The "Donation" Box?',
				// 'desc' => 'Select enable to show the Donations box',
				// 'id'   => $prefix . 'donationshome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The "Latest donations" Box?',
				// 'desc' => 'Select enable to show the "Latest donations" box',
				// 'id'   => $prefix . 'latestdonationshome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The "How can you help" Box?',
				// 'desc' => 'Select enable to show the "How can you help" box',
				// 'id'   => $prefix . 'howhelphome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The "News, About us, Photos" Box?',
				// 'desc' => 'Select enable to show the "News, About us, Photos" box',
				// 'id'   => $prefix . 'newshome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			// array(
				// 'name' => 'Show The Events Box?',
				// 'desc' => 'Select enable to show the Events box',
				// 'id'   => $prefix . 'eventshome',
				// 'std'  => 'on',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Enable', 'value' => 'on', ),
					// array( 'name' => 'Disable', 'value' => 'off', ),
				// ),
			// ),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'info',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre №1 ',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle1',
				'std' => 'Titre 1 ',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №1',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext1',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Titre №2',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle2',
				'std' => 'Healthcare solutions',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №2',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext2',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Titre №3',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle3',
				'std' => '24/7 Availability',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №3',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext3',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Donation',
				'desc' => 'Donations pour le projet en cours',
				'id'   => $prefix . 'donation',
				'type'    => 'title',
			),
			array(
				'name' => 'Projet en avant',
				'desc' => 'Nom du projet. Exemple: Projet XXX',
				'id'   => $prefix . 'donationproject',
				'std' => 'Projet XXX',
				'type'    => 'text',
			),
			array(
				'name' => 'Montant requis',
				'desc' => 'Inserer le montant. Exemple: 100.000',
				'id'   => $prefix . 'donationreqam',
				'std' => '100.000',
				'type'    => 'text',
			),
			array(
				'name' => 'Montant récolté',
				'desc' => 'Inserer le montant. Exemple: 70.000€',
				'id'   => $prefix . 'donationcollam',
				'std' => '70.000',
				'type'    => 'text',
			),
			// array(
				// 'name' => 'Currency',
				// 'desc' => 'Insert the currency. Example: £',
				// 'id'   => $prefix . 'currency',
				// 'std' => '£',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Latest donations',
				// 'desc' => '',
				// 'id'   => $prefix . 'lastdon',
				// 'type'    => 'title',
			// ),
			// array(
				// 'name' => 'Show The "Last donors" or metaboxes?',
				// 'desc' => 'Select "Last donors" to show the "Latest donors" box',
				// 'id'   => $prefix . 'latestdonationshomebox',
				// 'std'  => 'metaboxes',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Metaboxes', 'value' => 'metaboxes', ),
					// array( 'name' => 'Last donors', 'value' => 'last_donors', ),
				// ),
			// ),
			// array(
				// 'name' => 'Title',
				// 'desc' => 'Insert the title',
				// 'id'   => $prefix . 'lastdontitle',
				// 'std' => 'Latest donations',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№1 Name',
				// 'desc' => 'Insert the name',
				// 'id'   => $prefix . 'lastdonname1',
				// 'std' => 'Jack Daniels',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№1 State',
				// 'desc' => 'Insert the state',
				// 'id'   => $prefix . 'lastdonstate1',
				// 'std' => 'Manager',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№1 Donation',
				// 'desc' => 'Insert the donation',
				// 'id'   => $prefix . 'lastdondon1',
				// 'std' => '$3,200',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№1 Image',
				// 'desc' => 'Upload an image. Size: 86x86',
				// 'id'   => $prefix . 'lastdonimage1',
				// 'type'    => 'file',
			// ),
			// array(
				// 'name' => '№2 Name',
				// 'desc' => 'Insert the name',
				// 'id'   => $prefix . 'lastdonname2',
				// 'std' => 'Mark Ougust',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№2 State',
				// 'desc' => 'Insert the state',
				// 'id'   => $prefix . 'lastdonstate2',
				// 'std' => 'Entrepreneur',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№2 Donation',
				// 'desc' => 'Insert the donation',
				// 'id'   => $prefix . 'lastdondon2',
				// 'std' => '$3,200',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№2 Image',
				// 'desc' => 'Upload an image. Size: 86x86',
				// 'id'   => $prefix . 'lastdonimage2',
				// 'type'    => 'file',
			// ),
			// array(
				// 'name' => '№3 Name',
				// 'desc' => 'Insert the name',
				// 'id'   => $prefix . 'lastdonname3',
				// 'std' => 'Jack Daniels',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№3 State',
				// 'desc' => 'Insert the state',
				// 'id'   => $prefix . 'lastdonstate3',
				// 'std' => 'Director of the Bank',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№3 Donation',
				// 'desc' => 'Insert the donation',
				// 'id'   => $prefix . 'lastdondon3',
				// 'std' => '$3,200',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№3 Image',
				// 'desc' => 'Upload an image. Size: 86x86',
				// 'id'   => $prefix . 'lastdonimage3',
				// 'type'    => 'file',
			// ),
			// array(
				// 'name' => '№4 Name',
				// 'desc' => 'Insert the name',
				// 'id'   => $prefix . 'lastdonname4',
				// 'std' => 'Marey Weeli',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№4 State',
				// 'desc' => 'Insert the state',
				// 'id'   => $prefix . 'lastdonstate4',
				// 'std' => 'Historian',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№4 Donation',
				// 'desc' => 'Insert the donation',
				// 'id'   => $prefix . 'lastdondon4',
				// 'std' => '$3,200',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№4 Image',
				// 'desc' => 'Upload an image. Size: 86x86',
				// 'id'   => $prefix . 'lastdonimage4',
				// 'type'    => 'file',
			// ),
			// array(
				// 'name' => '№5 Name',
				// 'desc' => 'Insert the name',
				// 'id'   => $prefix . 'lastdonname5',
				// 'std' => 'Jack Daniels',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№5 State',
				// 'desc' => 'Insert the state',
				// 'id'   => $prefix . 'lastdonstate5',
				// 'std' => 'Entrepreneur',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№5 Donation',
				// 'desc' => 'Insert the donation',
				// 'id'   => $prefix . 'lastdondon5',
				// 'std' => '$3,200',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => '№5 Image',
				// 'desc' => 'Upload an image. Size: 86x86',
				// 'id'   => $prefix . 'lastdonimage5',
				// 'type'    => 'file',
			// ),
			array(
				'name' => 'Comment participer',
				'desc' => '',
				'id'   => $prefix . 'howhelp',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'howhelptitle',
				'std' => 'How can you help?',
				'type'    => 'text',
			),
			array(
				'name' => 'Sous titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'howhelptitlesmall',
				'std' => 'Help for cause',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'howhelptext',
				'std' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.',
				'type'    => 'textarea',
			),
			// array(
				// 'name' => 'Media',
				// 'desc' => 'Insert the media',
				// 'id'   => $prefix . 'howhelpmadia',
				// 'std' => 'Media',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Mobilization',
				// 'desc' => 'Insert the mobilization',
				// 'id'   => $prefix . 'howhelpmob',
				// 'std' => 'Mobilization',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Projection',
				// 'desc' => 'Insert the projection',
				// 'id'   => $prefix . 'howhelppro',
				// 'std' => 'Projection',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Support',
				// 'desc' => 'Insert the support',
				// 'id'   => $prefix . 'howhelpsup',
				// 'std' => 'Support',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Link',
				// 'desc' => 'Insert the url',
				// 'id'   => $prefix . 'howhelpurl',
				// 'std' => '',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'Video',
				// 'desc' => 'Insert the video url',
				// 'id'   => $prefix . 'howhelpvideo',
				// 'std' => '',
				// 'type'    => 'text',
			// ),
			// array(
				// 'name' => 'News',
				// 'desc' => '',
				// 'id'   => $prefix . 'news',
				// 'type'    => 'title',
			// ),
			// array(
				// 'name' => 'Title',
				// 'desc' => 'Insert the title',
				// 'id'   => $prefix . 'newstitle',
				// 'std' => 'News',
				// 'type'    => 'text',
			// ),
			array(
				'name' => 'Qui sommes nous?',
				'desc' => '',
				'id'   => $prefix . 'aboutus',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'aboutustitle',
				'std' => 'About us',
				'type'    => 'text',
			),
			array(
				'name' => 'Image',
				'desc' => 'Charger une image. Taille: 250x196',
				'id'   => $prefix . 'aboutusimage',
				'type'    => 'file',
			),
			array(
				'name' => 'Texte',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'aboutustext',
				'std' => 'Lorem Ipsum is simply dummy text of the printing and...typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
				'type'    => 'textarea',
			),
			array(
				'name' => 'Photos',
				'desc' => '',
				'id'   => $prefix . 'photos',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'photostitle',
				'std' => 'Photos',
				'type'    => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'sliderhome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Events Box?',
				'desc' => 'Select enable to show the Events box',
				'id'   => $prefix . 'eventshome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Donate Box?',
				'desc' => 'Select enable to show the Donate box',
				'id'   => $prefix . 'donatehome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The News Box?',
				'desc' => 'Select enable to show the News box',
				'id'   => $prefix . 'newshome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Blog Box?',
				'desc' => 'Select enable to show the Blog box',
				'id'   => $prefix . 'bloghome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Box?',
				'desc' => 'Select enable to show the Partners box',
				'id'   => $prefix . 'partnerhome1',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home1slider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home1slidercount',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Events',
				'desc' => '',
				'id'   => $prefix . 'home1events',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home1eventstitle',
				'std'  => 'Welcome',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home1eventsdesc',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer',
				'type' => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home1eventscount',
				'std'  => '2',
				'type' => 'text',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size: 1920x800px',
				'id'   => $prefix . 'home1eventsbg',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'Donate',
				'desc' => '',
				'id'   => $prefix . 'home1donate',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home1donatetitle',
				'std'  => 'There are many variations of passages',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home1donatetext',
				'std'  => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when ',
				'type' => 'text',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size: 1920x730px',
				'id'   => $prefix . 'home1donatebg',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'News',
				'desc' => '',
				'id'   => $prefix . 'home1news',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home1newstitle',
				'std'  => 'News',
				'type' => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of news',
				'id'   => $prefix . 'home1newscount',
				'std'  => '3',
				'type' => 'text',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'home1blog',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of news',
				'id'   => $prefix . 'home1blogcount',
				'std'  => '28',
				'type' => 'text',
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'home1partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home1partnerstitle',
				'std'  => 'Our partners',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home1partnerstext',
				'std'  => 'Dummy text here',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home1partnerslink1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size: 216x100px',
				'id'   => $prefix . 'home1partnersimage1',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home1partnerslink2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size: 216x100px',
				'id'   => $prefix . 'home1partnersimage2',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home1partnerslink3',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size: 216x100px',
				'id'   => $prefix . 'home1partnersimage3',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home1partnerslink4',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size: 216x100px',
				'id'   => $prefix . 'home1partnersimage4',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home1partnerslink5',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size: 216x100px',
				'id'   => $prefix . 'home1partnersimage5',
				'std'  => '',
				'type' => 'file',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displaysliderhome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information box',
				'id'   => $prefix . 'displayinfohome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Donation Box?',
				'desc' => 'Select enable to show the Donation box',
				'id'   => $prefix . 'displaydonatehome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Development Box?',
				'desc' => 'Select enable to show the Development box',
				'id'   => $prefix . 'displaydevhome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Blog Box?',
				'desc' => 'Select enable to show the Blog box',
				'id'   => $prefix . 'displaybloghome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Box?',
				'desc' => 'Select enable to show the Partners box',
				'id'   => $prefix . 'displaypartnershome2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home2slider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home2slidercount',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'home2info',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x680px',
				'id'   => $prefix . 'home2infobg',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle',
				'std'  => 'Help for cause',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',
				'type' => 'textarea',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle1',
				'std'  => 'There are many',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext1',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle2',
				'std'  => 'Variations of passages',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext2',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle3',
				'std'  => 'Lorem ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext3',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle4',
				'std'  => 'Another title',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext4',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle5',
				'std'  => 'Title here',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext5',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2infotitle6',
				'std'  => 'Dummy text',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2infotext6',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley.',
				'type' => 'text',
			),
			array(
				'name' => 'Donation',
				'desc' => '',
				'id'   => $prefix . 'home2donate',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Background',
				'desc' => 'Upload an image. Size: 1920x248px',
				'id'   => $prefix . 'home2donatebg',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Background',
				'desc' => 'Upload an image. Size: 820x490px',
				'id'   => $prefix . 'home2donatebg2',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2donatetitle',
				'std'  => 'Donation',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2donatetext',
				'std'  => 'There are many variations of passages of Lorem Ipsum available',
				'type' => 'text',
			),
			array(
				'name' => 'The required amount',
				'desc' => 'Insert the amount. Example: 65.000',
				'id'   => $prefix . 'home2donatereqam',
				'std' => '65,000',
				'type'    => 'text',
			),
			array(
				'name' => 'The amount collected',
				'desc' => 'Insert the amount. Example: 53.370',
				'id'   => $prefix . 'home2donatecollam',
				'std' => '53,370',
				'type'    => 'text',
			),
			array(
				'name' => 'Development',
				'desc' => '',
				'id'   => $prefix . 'home2dev',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x736px',
				'id'   => $prefix . 'home2devbg',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2devtitle',
				'std'  => 'Development charities in India',
				'type' => 'text',
			),
			array(
				'name' => 'Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2devlink',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'home2blog',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2blogtitle',
				'std'  => 'Popular Articles',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2blogtext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
				'type' => 'textarea',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home2blogcount',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'home2partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home2partnerstitle',
				'std'  => 'These cases are perfectly simple',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home2partnerstext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'type' => 'textarea',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink1',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage1',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink2',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage2',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink3',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage3',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink4',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage4',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink5',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage5',
				'type' => 'file',
			),
			array(
				'name' => 'No.6 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'home2partnerslink6',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.6 Image',
				'desc' => 'Upload an image. Size: 214x182',
				'id'   => $prefix . 'home2partnersimage6',
				'type' => 'file',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-3.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displaysliderhome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Couses Box?',
				'desc' => 'Select enable to show the Couses box',
				'id'   => $prefix . 'displaycouseshome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Donation Box?',
				'desc' => 'Select enable to show the Donation box',
				'id'   => $prefix . 'displaydonationhome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Voloutears Box?',
				'desc' => 'Select enable to show the Voloutears box',
				'id'   => $prefix . 'displayvoloutearshome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The News Box?',
				'desc' => 'Select enable to show the News box',
				'id'   => $prefix . 'displaynewshome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Subscribe Box?',
				'desc' => 'Select enable to show the Subscribe box',
				'id'   => $prefix . 'displaysubscribehome3',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home3slider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home3slidercount',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Causes',
				'desc' => '',
				'id'   => $prefix . 'home3events',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home3eventstitle',
				'std'  => 'Help for cause',
				'type'  => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home3eventsdesc',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'type'  => 'textarea',
			),
			array(
				'name' => 'Donation',
				'desc' => '',
				'id'   => $prefix . 'home3donation',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home3eventstitle',
				'std'  => 'Help for cause',
				'type'  => 'text',
			),
			array(
				'name' => 'Volountears',
				'desc' => '',
				'id'   => $prefix . 'home3volountears',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home3volountearstitle',
				'std'  => 'Our volountears',
				'type'  => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home3volountearstext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',
				'type'  => 'textarea',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x580px',
				'id'   => $prefix . 'home3volountearsbg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'News',
				'desc' => '',
				'id'   => $prefix . 'home3news',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home3newstitle',
				'std'  => 'Recent news',
				'type'  => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home3newstext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
				'type'  => 'textarea',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-4.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displaysliderhome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Tabs Box?',
				'desc' => 'Select enable to show the Tabs box',
				'id'   => $prefix . 'displaytabshome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Donation Box?',
				'desc' => 'Select enable to show the Donation box',
				'id'   => $prefix . 'displaydonationhome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information box',
				'id'   => $prefix . 'displayinfohome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Events Box?',
				'desc' => 'Select enable to show the Events box',
				'id'   => $prefix . 'displayeventshome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Description Box?',
				'desc' => 'Select enable to show the Description box',
				'id'   => $prefix . 'displaydescriptionhome4',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home4slider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home4slidercount',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Donation',
				'desc' => '',
				'id'   => $prefix . 'home4don',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x614px',
				'id'   => $prefix . 'home4donbg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'home4info',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4infotitle',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing',
				'type'  => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4infotext',
				'std'  => 'These cases are perfectly simple and easy to distinguish.',
				'type'  => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4infotitle1',
				'std'  => 'On the other',
				'type'  => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4infotext1',
				'std'  => 'There are many',
				'type'  => 'text',
			),
			array(
				'name' => 'No.1 Precent',
				'desc' => 'Insert the number. Example: 10',
				'id'   => $prefix . 'home4infopercent1',
				'std'  => '10',
				'type'  => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4infotitle2',
				'std'  => 'On the other hand',
				'type'  => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4infotext2',
				'std'  => 'There are many variations',
				'type'  => 'text',
			),
			array(
				'name' => 'No.2 Precent',
				'desc' => 'Insert the number. Example: 56',
				'id'   => $prefix . 'home4infopercent2',
				'std'  => '56',
				'type'  => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4infotitle3',
				'std'  => 'On the other',
				'type'  => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4infotext3',
				'std'  => 'There are many',
				'type'  => 'text',
			),
			array(
				'name' => 'No.3 Precent',
				'desc' => 'Insert the number. Example: 24',
				'id'   => $prefix . 'home4infopercent3',
				'std'  => '24',
				'type'  => 'text',
			),
			array(
				'name' => 'Events',
				'desc' => '',
				'id'   => $prefix . 'home4events',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4eventstitle',
				'std'  => 'Recent events',
				'type'  => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4eventstext',
				'std'  => 'These cases are perfectly simple and easy',
				'type'  => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'home4eventsslider',
				'std'  => '6',
				'type'  => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => '',
				'id'   => $prefix . 'home4description',
				'type' => 'title',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image. Size: 960x385px',
				'id'   => $prefix . 'home4descriptionimage',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x700px',
				'id'   => $prefix . 'home4descriptionbg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home4descriptiontitle',
				'std'  => 'There are many variations of passages',
				'type'  => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home4descriptiontext',
				'std'  => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when',
				'type'  => 'textarea',
			),
			array(
				'name' => 'Link',
				'desc' => 'Insert the url',
				'id'   => $prefix . 'home4descriptionlink',
				'std'  => 'https://www.google.com',
				'type'  => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-5.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displaysliderhome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Donation Box?',
				'desc' => 'Select enable to show the Donation box',
				'id'   => $prefix . 'displaydonationhome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Events Box?',
				'desc' => 'Select enable to show the Events box',
				'id'   => $prefix . 'displayeventshome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The History Box?',
				'desc' => 'Select enable to show the History box',
				'id'   => $prefix . 'displayhistoryhome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Blog Box?',
				'desc' => 'Select enable to show the Blog box',
				'id'   => $prefix . 'displaybloghome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Projects Box?',
				'desc' => 'Select enable to show the Projects box',
				'id'   => $prefix . 'displayprojectshome5',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home5lider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home5slidercount',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Donation',
				'desc' => '',
				'id'   => $prefix . 'home5donation',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x700px',
				'id'   => $prefix . 'home5donationbg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5donationtitle',
				'std'  => 'There aremany variations of passages',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home5donationtext',
				'std'  => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their',
				'type' => 'textarea',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5donationtitle1',
				'std'  => 'Donations',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home5donationtext1',
				'std'  => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue',
				'type' => 'textarea',
			),
			array(
				'name' => 'The required amount',
				'desc' => 'Insert the amount. Example: 1000000',
				'id'   => $prefix . 'home5donationreqam',
				'std'  => '1000000',
				'type' => 'text',
			),
			array(
				'name' => 'The amount collected',
				'desc' => 'Insert the amount. Example: 250000',
				'id'   => $prefix . 'home5donationcollam',
				'std'  => '250000',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5donationtitle2',
				'std'  => 'Latest donations',
				'type' => 'text',
			),
			array(
				'name' => 'History',
				'desc' => '',
				'id'   => $prefix . 'home5history',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x476px',
				'id'   => $prefix . 'home5historybg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5historytitle',
				'std'  => 'Our history',
				'type' => 'text',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'home5blog',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5blogtitle',
				'std'  => 'Recent from blog',
				'type' => 'text',
			),
			array(
				'name' => 'Projects',
				'desc' => '',
				'id'   => $prefix . 'home5projects',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home5projectstitle',
				'std'  => 'Our projects',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'events_metabox',
		'title'      => 'Options d\'évenement',
		'pages'      => array( 'events', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Adresse',
				'desc' => 'Inserer l\'adresse.',
				'id'   => $prefix . 'address',
				'type' => 'text',
			),
			array(
				'name' => 'Date',
				'desc' => 'Inserer la date. Exemple: 1er Juin 2014',
				'id'   => $prefix . 'date',
				'type' => 'text',
			),
			array(
				'name' => 'Heure de début',
				'desc' => 'Insérer l\'heure.',
				'id'   => $prefix . 'starttime',
				'type' => 'text',
			),
			array(
				'name' => 'Heure de fin',
				'desc' => 'Insérer l\'heure.',
				'id'   => $prefix . 'endtime',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'news_metabox',
		'title'      => 'Option de l\'article',
		'pages'      => array( 'news', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			// array(
				// 'name' => 'Starting time',
				// 'desc' => 'Insert the time. Example: 9:00 am',
				// 'id'   => $prefix . 'starttime',
				// 'type' => 'text',
			// ),
			// array(
				// 'name' => 'End time events',
				// 'desc' => 'Insert the time. Example: 9:00 am',
				// 'id'   => $prefix . 'endtime',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Description courte',
				'desc' => 'Insérer le texte',
				'id'   => $prefix . 'shortdescription',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_metabox',
		'title'      => 'Option de gallerie',
		'pages'      => array( 'gallery', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Ajouter au slider',
				'desc' => 'Sectionner ajouter pour ajouter la gallerie au slider',
				'id'   => $prefix . 'galleryslider',
				'std'  => '',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'Ajouter', ),
					array( 'name' => 'Disable', 'value' => 'Ne pas Ajouter', ),
				),
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'contact_metabox',
		'title'      => 'Options de contact',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Get in Touch',
				'desc' => '',
				'id'   => $prefix . 'getintouch',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Insérer le titre',
				'id'   => $prefix . 'getintouchtitle',
				'std'  => 'Contactez nous',
				'type' => 'text',
			),
			array(
				'name' => 'Adresse',
				'desc' => 'Insérer l\'adresse',
				'id'   => $prefix . 'getintouchadress',
				'std'  => '5512 Lorem Ipsum Vestibulum Molesqu, Dolor Sit Amet, Egestas 666 69',
				'type' => 'text',
			),
			array(
				'name' => 'Email',
				'desc' => 'Insérer votre email',
				'id'   => $prefix . 'getintouchemail',
				'std'  => 'mail@compname.com',
				'type' => 'text',
			),
			// array(
				// 'name' => 'Skype',
				// 'desc' => 'Insérer votre nom de profil skype',
				// 'id'   => $prefix . 'getintouchskype',
				// 'std'  => 'companyname',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Twitter',
				'desc' => 'Votre URL de profil twitter',
				'id'   => $prefix . 'getintouchtwitter',
				'std'  => 'twitter.com/companyname',
				'type' => 'text',
			),
			array(
				'name' => 'Telephone',
				'desc' => 'Insérer votre numero de telephone',
				'id'   => $prefix . 'getintouchphone',
				'std'  => '',
				'type' => 'text',
			),
			// array(
				// 'name' => 'Flickr',
				// 'desc' => 'Votre URL de profil flickr',
				// 'id'   => $prefix . 'getintouchflickr',
				// 'std'  => 'flickr.com/photos/companyname',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Facebook',
				'desc' => 'Votre URL de profil facebook',
				'id'   => $prefix . 'getintouchfacebook',
				'std'  => 'facebook.com/companyname',
				'type' => 'text',
			),
			// array(
				// 'name' => 'Vimeo',
				// 'desc' => 'Votre URL de profil vimeo',
				// 'id'   => $prefix . 'getintouchvimeo',
				// 'std'  => 'vimeo.com/companyname',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Texte',
				'desc' => 'Insérer le texte',
				'id'   => $prefix . 'getintouchtext',
				'std'  => 'We are very approachable and would love to speak to you. Feel free to call, send us an email, Tweet us or simply complete the enquiry form',
				'type' => 'text',
			),
			array(
				'name' => 'Carte',
				'desc' => 'Insérer l\'address',
				'id'   => $prefix . 'getintouchaddressmap',
				'std'  => 'New york',
				'type' => 'text',
			),
			array(
				'name' => 'Laisser un message',
				'desc' => '',
				'id'   => $prefix . 'leavereply',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Insérer le titre',
				'id'   => $prefix . 'leavereplytitle',
				'std'  => 'Leave Reply',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'Options a propos',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on About page',
				'desc' => '',
				'id'   => $prefix . 'displayabout',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displayabout2slider',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The "Text block" Box?',
				'desc' => 'Select enable to show the "Text block" box',
				'id'   => $prefix . 'displayabout2textblock',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Team Box?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'displayabout2team',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Map Box?',
				'desc' => 'Select enable to show the Map box',
				'id'   => $prefix . 'displayabout2map',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The "Text block 2 & Form" Box?',
				'desc' => 'Select enable to show the "Text block 2 & Form" box',
				'id'   => $prefix . 'displayabout2textblock2',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'about2slider',
				'type'    => 'title',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size: 1080x296px',
				'id'   => $prefix . 'about2sliderimage1',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size: 1080x296px',
				'id'   => $prefix . 'about2sliderimage2',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size: 1080x296px',
				'id'   => $prefix . 'about2sliderimage3',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size: 1080x296px',
				'id'   => $prefix . 'about2sliderimage4',
				'type' => 'file',
			),
			array(
				'name' => 'Text block',
				'desc' => '',
				'id'   => $prefix . 'about2text',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about2texttitle',
				'std'  => 'In California, child education plans were introduced',
				'type' => 'text',
			),
			array(
				'name' => 'Our team',
				'desc' => '',
				'id'   => $prefix . 'about2team',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about2teamtitle',
				'std'  => 'Our team',
				'type' => 'text',
			),
			array(
				'name' => 'Map',
				'desc' => '',
				'id'   => $prefix . 'about2map',
				'type' => 'title',
			),
			array(
				'name' => 'Address',
				'desc' => 'Insert the address',
				'id'   => $prefix . 'about2mapaddress',
				'std'  => 'Paris',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Percentage',
				'desc' => 'Insert the number. Example: 81',
				'id'   => $prefix . 'about2percentage1',
				'std'  => '81',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about2description1',
				'std'  => 'Donation 2014',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Percentage',
				'desc' => 'Insert the number. Example: 67',
				'id'   => $prefix . 'about2percentage2',
				'std'  => '67',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about2description2',
				'std'  => 'Our development in 2015',
				'type' => 'text',
			),
			array(
				'name' => 'Text block No. 2',
				'desc' => '',
				'id'   => $prefix . 'about2textblock2',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about2textblock2title',
				'std'  => 'How can you help',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about2textblock2text',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
				'type' => 'textarea',
			),
			array(
				'name' => 'Link',
				'desc' => 'Insert the url',
				'id'   => $prefix . 'about2textblock2link',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'About Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about-3.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on About page',
				'desc' => '',
				'id'   => $prefix . 'displayabout',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Team Box?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'displayabout3team',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Events Box?',
				'desc' => 'Select enable to show the Events box',
				'id'   => $prefix . 'displayabout3events',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The History Box?',
				'desc' => 'Select enable to show the History box',
				'id'   => $prefix . 'displayabout3history',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information box',
				'id'   => $prefix . 'displayabout3information',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Box?',
				'desc' => 'Select enable to show the Partners box',
				'id'   => $prefix . 'displayabout3partners',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Meet our team',
				'desc' => '',
				'id'   => $prefix . 'about3team',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3teamtitle',
				'std'  => 'Meet our team',
				'type' => 'text',
			),
			array(
				'name' => 'Events',
				'desc' => '',
				'id'   => $prefix . 'about3events',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3eventstitle',
				'std'  => 'Some words about us',
				'type' => 'text',
			),
			array(
				'name' => 'History',
				'desc' => '',
				'id'   => $prefix . 'about3history',
				'type' => 'title',
			),
			array(
				'name' => 'Background',
				'desc' => 'Upload an image. Size: 1920x476px',
				'id'   => $prefix . 'about3historybg',
				'std'  => '',
				'type'  => 'file',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3historytitle',
				'std'  => 'Our history',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'about3info',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle',
				'std'  => 'We do the best',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle1',
				'std'  => 'There are many',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext1',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle2',
				'std'  => 'Variations of passages',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext2',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle3',
				'std'  => 'Lorem ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext3',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle4',
				'std'  => 'Another title',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext4',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle5',
				'std'  => 'Title here',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext5',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3infotitle6',
				'std'  => 'Dummy text',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3infotext6',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'text',
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'about3partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3partnerstitle',
				'std'  => 'These cases are perfectly simple',
				'type' => 'text',
			),
			array(
				'name' => 'Second Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about3partnerstitle1',
				'std'  => 'These cases are perfectly simple',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about3partnerstext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'type' => 'textarea',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink1',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage1',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink2',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage2',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink3',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage3',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink4',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage4',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink5',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage5',
				'type' => 'file',
			),
			array(
				'name' => 'No.6 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about3partnerslink6',
				'std'  => '',
				'type'    => 'text',
			),
			array(
				'name' => 'No.6 Image',
				'desc' => 'Upload an image. Size: 214x182px',
				'id'   => $prefix . 'about3partnersimage6',
				'type' => 'file',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'Option Team',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Montrer ou cacher les elements de la page Team',
				'desc' => '',
				'id'   => $prefix . 'display',
				'type'    => 'title',
			),
			array(
				'name' => 'Montrer le texte intro?',
				'desc' => 'Selectionner Activer pour montrer',
				'id'   => $prefix . 'textlineabout',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer les informations?',
				'desc' => 'Selectionner Activer pour montrer',
				'id'   => $prefix . 'informationabout',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer la team?',
				'desc' => 'Selectionner Activer pour montrer',
				'id'   => $prefix . 'highermanabout',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer les details de l association?',
				'desc' => 'Selectionner Activer pour montrer',
				'id'   => $prefix . 'organdetabout',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer "comment aider?"',
				'desc' => 'Selectionner Activer pour montrer',
				'id'   => $prefix . 'howcanyouhelpabout',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Texte introductif',
				'desc' => '',
				'id'   => $prefix . 'abouttextline',
				'type'    => 'title',
			),
			array(
				'name' => 'Texte',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'abouttext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and. Typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'type' => 'textarea',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'info',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre №1',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle1',
				'std' => 'Advanced technology',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №1',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext1',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Titre №2 ',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle2',
				'std' => 'Healthcare solutions',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №2 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext2',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Titre №3 ',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'infotitle3',
				'std' => '24/7 Availability',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №3 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'infotext3',
				'std' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and',
				'type'    => 'text',
			),
			array(
				'name' => 'Team',
				'desc' => '',
				'id'   => $prefix . 'higherman',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'highermantitle',
				'std' => 'Higher Management',
				'type'    => 'text',
			),
			array(
				'name' => 'Nom №1 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname1',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №1',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto1',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №1 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec1',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №1 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext1',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №1 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter1',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №1 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook1',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №1 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest1',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №1 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype1',
				'type' => 'text',
			),
			array(
				'name' => 'Nom №2 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname2',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №2',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto2',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №2 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec2',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №2 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext2',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №2 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter2',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №2 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook2',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №2 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest2',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №2 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype2',
				'type' => 'text',
			),			
			
			array(
				'name' => 'Nom №3 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname3',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №3',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto3',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №3 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec3',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №3 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext3',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №3 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter3',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №3 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook3',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №3 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest3',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №3 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype3',
				'type' => 'text',
			),
			array(
				'name' => 'Nom №4 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname4',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №4',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto4',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №4 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec4',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №4 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext4',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №4 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter4',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №4 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook4',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №4 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest4',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №4 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype4',
				'type' => 'text',
			),
			array(
				'name' => 'Nom №5 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname5',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №5',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto5',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №5 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec5',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №5 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext5',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №5 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter5',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №5 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook5',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №5',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest5',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №5 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype5',
				'type' => 'text',
			),
			array(
				'name' => 'Nom №6 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname6',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №6',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto6',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №6 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec6',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №6 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext6',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №6 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter6',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №6 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook6',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №6 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest6',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №6 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype6',
				'type' => 'text',
			),
			array(
				'name' => 'Nom №7 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname7',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №7',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto7',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №7 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec7',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №7 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext7',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №7 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter7',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №7 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook7',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №7 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest7',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №7 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype7',
				'type' => 'text',
			),			
			
			array(
				'name' => 'Nom №8 ',
				'desc' => 'Inserer le nom',
				'id'   => $prefix . 'highermanname8',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Photo №8',
				'desc' => 'Upload an image. Size: 250x318',
				'id'   => $prefix . 'highermanphoto8',
				'type'    => 'file',
			),
			array(
				'name' => 'Specialité №8 ',
				'desc' => 'Inserer la specialité',
				'id'   => $prefix . 'highermanspec8',
				'std' => 'Adrian Steve',
				'type'    => 'text',
			),
			array(
				'name' => 'Texte №8 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'highermantext8',
				'std' => 'Mauris ac gravida tellus. Vestibulum adipiscing laoreet arcu in egestas.',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter №8 ',
				'desc' => 'Nom du profil twitter',
				'id'   => $prefix . 'highermantwitter8',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook №8 ',
				'desc' => 'URL du profil Facebook',
				'id'   => $prefix . 'highermanfacebook8',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest №8 ',
				'desc' => 'Nom du profil Pinterest',
				'id'   => $prefix . 'highermanpinterest8',
				'type' => 'text',
			),
			array(
				'name' => 'Skype №8 ',
				'desc' => 'URL du profil skype',
				'id'   => $prefix . 'highermanskype8',
				'type' => 'text',
			),
			array(
				'name' => 'Détails de l association',
				'desc' => '',
				'id'   => $prefix . 'orgdet',
				'type' => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'orgdettitle',
				'std'  => 'Organization Details',
				'type' => 'text',
			),
			array(
				'name' => 'Titre №1 ',
				'desc' => 'Organization Details',
				'id'   => $prefix . 'orgdettitle1',
				'std'  => 'Why work with Our NGO?',
				'type' => 'text',
			),
			array(
				'name' => 'Text №1 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'orgdettext1',
				'std'  => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'textarea',
			),
			// array(
				// 'name' => 'Lien №1 ',
				// 'desc' => 'Insert your Url',
				// 'id'   => $prefix . 'orgdetlink1',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Titre №2 ',
				'desc' => 'Organization Details',
				'id'   => $prefix . 'orgdettitle2',
				'std'  => 'Why work with Our NGO?',
				'type' => 'text',
			),
			array(
				'name' => 'Text №2 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'orgdettext2',
				'std'  => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'textarea',
			),
			// array(
				// 'name' => 'Lien №2 ',
				// 'desc' => 'Insert your Url',
				// 'id'   => $prefix . 'orgdetlink2',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Titre №3 ',
				'desc' => 'Organization Details',
				'id'   => $prefix . 'orgdettitle3',
				'std'  => 'Why work with Our NGO?',
				'type' => 'text',
			),
			array(
				'name' => 'Text №3 ',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'orgdettext3',
				'std'  => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, printer took a galley. of type and scrambled it to make',
				'type' => 'textarea',
			),
			// array(
				// 'name' => 'Lien №3 ',
				// 'desc' => 'Insert your Url',
				// 'id'   => $prefix . 'orgdetlink3',
				// 'type' => 'text',
			// ),
			array(
				'name' => 'Comment participer?',
				'desc' => '',
				'id'   => $prefix . 'howhelp',
				'type' => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'howhelptitle',
				'std'  => 'How can you help',
				'type' => 'text',
			),
			array(
				'name' => 'Texte',
				'desc' => 'Inserer le texte',
				'id'   => $prefix . 'howhelptext',
				'std'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
				'type' => 'textarea',
			),
			// array(
				// 'name' => 'Lien',
				// 'desc' => 'Inserer le Lien',
				// 'id'   => $prefix . 'howhelplink',
				// 'type' => 'text',
			// ),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'donate_metabox',
		'title'      => 'Options Dons en ligne',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-donate.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Montrer ou cacher les boites de dialogues',
				'desc' => '',
				'id'   => $prefix . 'display',
				'type'    => 'title',
			),
			array(
				'name' => 'Montrer boite texte introductif?',
				'desc' => '',
				'id'   => $prefix . 'textlinedon',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer boite de donation?',
				'desc' => '',
				'id'   => $prefix . 'donatedon',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer boite "notre cause"?',
				'desc' => '',
				'id'   => $prefix . 'ourcausedon',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Montrer la boite de texte de donation?',
				'desc' => '',
				'id'   => $prefix . 'donatetextdon',
				'std'  => 'on',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Activer', 'value' => 'on', ),
					array( 'name' => 'Desactiver', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Texte introductif',
				'desc' => '',
				'id'   => $prefix . 'donatetextline',
				'type'    => 'title',
			),
			array(
				'name' => 'Texte',
				'desc' => 'Insérer le texte',
				'id'   => $prefix . 'donatetext',
				'std'  => 'Aenean vitae condimentum velit. Praesent dapibus euismod accumsan. Sed ut ante leo. Maecenas conidime etum pretium odio at porta. Pellentesque et tellus odio. Quisqu es lorem ipsum dolor sit amet vivamus egestas vestibulum id arcu sapien praesent dapibus euismod accumsan. Sed ut ante leo maecenas conidime',
				'type' => 'textarea',
			),
			array(
				'name' => 'Donation',
				'desc' => '',
				'id'   => $prefix . 'donation',
				'type'    => 'title',
			),
			array(
				'name' => 'Montant requis',
				'desc' => 'Inserer le montant. Exemple: 100.000',
				'id'   => $prefix . 'donationreqam',
				'std' => '100.000',
				'type'    => 'text',
			),
			array(
				'name' => 'Montant acquis',
				'desc' => 'Inserer le montant. Exemple: 70.000',
				'id'   => $prefix . 'donationcollam',
				'std' => '70.000',
				'type'    => 'text',
			),
			array(
				'name' => 'Monnaie',
				'desc' => 'Inserer la monnaie. Example: €',
				'id'   => $prefix . 'currency',
				'std' => '€',
				'type'    => 'text',
			),
			array(
				'name' => 'Notre cause',
				'desc' => '',
				'id'   => $prefix . 'donateourcause',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle',
				'std'  => 'Our Cause',
				'type' => 'text',
			),
			array(
				'name' => 'Image №1 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage1',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №1',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle1',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №1',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent1',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №1',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised1',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №1',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors1',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №1',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal1',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Image №2 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage2',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №2',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle2',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №2',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent2',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №2',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised2',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №2',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors2',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №2',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal2',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Image №3 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage3',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №3',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle3',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №3',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent3',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №3',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised3',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №3',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors3',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №3',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal3',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Image №4 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage4',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №4',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle4',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №4',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent4',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №4',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised4',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №4',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors4',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №4',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal4',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Image №5 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage5',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №5',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle5',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №5',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent5',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №5',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised5',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №5',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors5',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №5',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal5',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Image №6 ',
				'desc' => 'Charger une image. Taille: 330x194',
				'id'   => $prefix . 'donateimage6',
				'type' => 'file',
			),
			array(
				'name' => 'Titre №6',
				'desc' => 'Inserer le titre',
				'id'   => $prefix . 'donatetitle6',
				'std'  => 'Cults and alternative religions',
				'type' => 'text',
			),
			array(
				'name' => 'Pourcentage №6',
				'desc' => 'Inserer le pourcentage. Exemple: 88%',
				'id'   => $prefix . 'donatepercent6',
				'std'  => '88%',
				'type' => 'text',
			),
			array(
				'name' => 'Montant acquis №6',
				'desc' => 'Inserer le montant acquis. Exemple: 2,200€',
				'id'   => $prefix . 'donateraised6',
				'std'  => '2,200€',
				'type' => 'text',
			),
			array(
				'name' => 'Nbr donneurs №6',
				'desc' => 'Exemle: 5',
				'id'   => $prefix . 'donatedonors6',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'But №6',
				'desc' => 'Inserer le but à atteindre Exemple: 2,500€',
				'id'   => $prefix . 'donategoal6',
				'std'  => '2,500€',
				'type' => 'text',
			),
			array(
				'name' => 'Texte de donation',
				'desc' => '',
				'id'   => $prefix . 'donatetext2',
				'type'    => 'title',
			),
			array(
				'name' => 'Titre',
				'desc' => '',
				'id'   => $prefix . 'donatetitlebottom',
				'std'  => 'Lorem ipsum dolor sit amet egestas mauris iridiculus semper',
				'type' => 'text',
			),
			array(
				'name' => 'Texte',
				'desc' => '',
				'id'   => $prefix . 'donatetextbottom',
				'std'  => 'Integer pretium metus in turpis tristique semper. Pellentesque gravida auctor sapiense, at iaculis nisl tincidunt vel. Duis aliquam consectetur orci non pretium. Pellentesque sed quam eu urna congue blandit. Proin laoreet venenatis augue, eu commodo ligula fermentum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curaesti Suspendisse tempor leo at massa laoreet vel tincidunt leo molestie. Proin tristique accumsan nisl, quis sollicitudin urna ullamcorper vel. In consectetur purus eu mauris pellentesque tincidunt. Suspendisse hendrerit pretium tellus. Sit amet elementum sapien mollis nec. Etiam sit amet hendrerit enim.',
				'type' => 'textarea',
			),
		)
	);

	// $meta_boxes[] = array(
		// 'id'         => 'volountear_metabox',
		// 'title'      => 'Volountear Options',
		// 'pages'      => array( 'volountears', ), // Post type
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'fields' => array(
			// array(
				// 'name' => 'Address',
				// 'desc' => 'Insert the address',
				// 'id'   => $prefix . 'volountearsaddress',
				// 'std'  => '',
				// 'type' => 'text',
			// ),
			// array(
				// 'name' => 'Assign Volountear',
				// 'desc' => 'Select an assigned volountear',
				// 'id'   => $prefix . 'assigned_volountear',
				// 'std'  => '',
				// 'type'    => 'select',
				// 'options' => $cause_list,
			// ),
		// )
	// );

	$meta_boxes[] = array(
		'id'         => 'cause_metabox',
		'title'      => 'Options de Projet',
		'pages'      => array( 'causes', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'But',
				'desc' => 'Montant requis. Exemple: 2500',
				'id'   => $prefix . 'causesgoal',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Montant Acquis',
				'desc' => 'Ce champ sera modifié automatiquement lorsque des payment paypal seront acceptés.',
				'id'   => $prefix . 'causesdonated',
				'std'  => '0',
				'type' => 'text',
			),
			array(
				'name' => 'Nopmbre de donateurs',
				'desc' => 'Ce champ sera modifié automatiquement lorsque des payment paypal seront acceptés.',
				'id'   => $prefix . 'causesdonors',
				'std'  => '0',
				'type' => 'text',
			),
			// array(
				// 'name' => 'Show in The Slider?',
				// 'desc' => 'Select enable to show in the slider',
				// 'id'   => $prefix . 'causesshowinslider',
				// 'std'  => 'off',
				// 'type'    => 'select',
				// 'options' => array(
					// array( 'name' => 'Disable', 'value' => 'off', ),
					// array( 'name' => 'Enable', 'value' => 'on', ),
				// ),
			// ),
			// array(
				// 'name' => 'Location',
				// 'desc' => 'Insert the address',
				// 'id'   => $prefix . 'causesmapaddress',
				// 'std'  => '',
				// 'type' => 'text',
			// ),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'blog_metabox',
		'title'      => 'Option de Blog',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-blog-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templateblog1count',
				'std'  => '9',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'blog_metabox',
		'title'      => 'Option de Blog',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-blog-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templateblog2count',
				'std'  => '3',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'blog_metabox',
		'title'      => 'Option de Blog',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-blog-3.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templateblog3count',
				'std'  => '4',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_metabox',
		'title'      => 'Options de Gallerie',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-gallery-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templategallery1count',
				'std'  => '12',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_metabox',
		'title'      => 'Options de Gallerie',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-gallery-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templategallery2count',
				'std'  => '9',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_metabox',
		'title'      => 'Options de Gallerie',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-gallery-3.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Compteur',
				'desc' => 'Inserer le nombre de post à afficher',
				'id'   => $prefix . 'templategallery3count',
				'std'  => '6',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'team_metabox',
		'title'      => 'Options d\'équipe',
		'pages'      => array( 'team', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Poste',
				'desc' => 'Inserer le poste',
				'id'   => $prefix . 'teampost',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Twitter',
				'desc' => 'Insérer l\'URL du profil',
				'id'   => $prefix . 'teamtwitter',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook',
				'desc' => 'Insérer l\'URL du profil',
				'id'   => $prefix . 'teamfacebook',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest',
				'desc' => 'Insérer l\'URL du profil',
				'id'   => $prefix . 'teampinterest',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => 'Skype',
				'desc' => 'Insérer le nom du profil',
				'id'   => $prefix . 'teamskype',
				'std'  => '',
				'type' => 'text',
			),
		)
	);


	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function aletheme_get_images_sizes() {
	return array(

		'gallery' => array(
			array(
				'name'      => 'gallery-home1',
				'width'     => 1920,
				'height'    => 649,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home2',
				'width'     => 1078,
				'height'    => 535,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home3',
				'width'     => 1920,
				'height'    => 550,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home4',
				'width'     => 270,
				'height'    => 117,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-big',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-thumba',
				'width'     => 331,
				'height'    => 304,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-medium',
				'width'     => 117,
				'height'    => 104,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-mini',
				'width'     => 108,
				'height'    => 95,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-gall1',
				'width'     => 270,
				'height'    => 399,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-gall21',
				'width'     => 540,
				'height'    => 540,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-gall22',
				'width'     => 540,
				'height'    => 270,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-gall23',
				'width'     => 1080,
				'height'    => 343,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-gall24',
				'width'     => 270,
				'height'    => 270,
				'crop'      => true,
			),
		),
		'post' => array(
			array(
				'name'      => 'post-thumba',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
			array(
				'name'      => 'post-medium',
				'width'     => 330,
				'height'    => 194,
				'crop'      => true,
			),
			array(
				'name'      => 'post-small',
				'width'     => 323,
				'height'    => 169,
				'crop'      => true,
			),
			array(
				'name'      => 'post-mini',
				'width'     => 80,
				'height'    => 80,
				'crop'      => true,
			),
			array(
				'name'      => 'post-video',
				'width'     => 340,
				'height'    => 200,
				'crop'      => true,
			),
			array(
				'name'      => 'post-stream',
				'width'     => 108,
				'height'    => 95,
				'crop'      => true,
			),
			array(
				'name'      => 'post-home1',
				'width'     => 320,
				'height'    => 242,
				'crop'      => true,
			),
			array(
				'name'      => 'post-blog1',
				'width'     => 343,
				'height'    => 172,
				'crop'      => true,
			),
			array(
				'name'      => 'post-blog2',
				'width'     => 540,
				'height'    => 362,
				'crop'      => true,
			),
			array(
				'name'      => 'post-blog3',
				'width'     => 515,
				'height'    => 277,
				'crop'      => true,
			),
		),
		'events' => array(
			array(
				'name'      => 'events-home1',
				'width'     => 539,
				'height'    => 362,
				'crop'      => true,
			),
			array(
				'name'      => 'events-home4',
				'width'     => 343,
				'height'    => 172,
				'crop'      => true,
			),
			array(
				'name'      => 'events-home5',
				'width'     => 1920,
				'height'    => 735,
				'crop'      => true,
			),
			array(
				'name'      => 'events-home5small',
				'width'     => 481,
				'height'    => 333,
				'crop'      => true,
			),
			array(
				'name'      => 'events-thumba',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
			array(
				'name'      => 'events-medium',
				'width'     => 330,
				'height'    => 194,
				'crop'      => true,
			),
			array(
				'name'      => 'events-small',
				'width'     => 80,
				'height'    => 80,
				'crop'      => true,
			),
		),
		'news' => array(
			array(
				'name'      => 'news-home3',
				'width'     => 539,
				'height'    => 277,
				'crop'      => true,
			),
			array(
				'name'      => 'news-thumba',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
			array(
				'name'      => 'news-medium',
				'width'     => 330,
				'height'    => 194,
				'crop'      => true,
			),
			array(
				'name'      => 'news-small',
				'width'     => 80,
				'height'    => 80,
				'crop'      => true,
			),
			array(
				'name'      => 'news-home1',
				'width'     => 336,
				'height'    => 246,
				'crop'      => true,
			),
			array(
				'name'      => 'news-home1thumba',
				'width'     => 234,
				'height'    => 103,
				'crop'      => true,
			),
		),
		'product' => array(
			array(
				'name'      => 'product-thumba',
				'width'     => 440,
				'height'    => 260,
				'crop'      => true,
			),
			array(
				'name'      => 'product-mini',
				'width'     => 327,
				'height'    => 196,
				'crop'      => true,
			),
			array(
				'name'      => 'product-small',
				'width'     => 100,
				'height'    => 80,
				'crop'      => true,
			),
			array(
				'name'      => 'product-bestsellers',
				'width'     => 58,
				'height'    => 34,
				'crop'      => true,
			),
		),
		'volountears' => array(
			array(
				'name'      => 'volountears-home3',
				'width'     => 70,
				'height'    => 70,
				'crop'      => true,
			),
			array(
				'name'      => 'volountears-thumba',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
		),
		'causes' => array(
			array(
				'name'      => 'causes-thumb',
				'width'     => 327,
				'height'    => 192,
				'crop'      => true,
			),
			array(
				'name'      => 'causes-image',
				'width'     => 862,
				'height'    => 294,
				'crop'      => true,
			),
			array(
				'name'      => 'causes-home3',
				'width'     => 269,
				'height'    => 399,
				'crop'      => true,
			),
			array(
				'name'      => 'causes-home4',
				'width'     => 255,
				'height'    => 312,
				'crop'      => true,
			),
		),
		'team' => array(
			array(
				'name'      => 'team-thumb',
				'width'     => 246,
				'height'    => 305,
				'crop'      => true,
			),
			array(
				'name'      => 'team-image',
				'width'     => 685,
				'height'    => 296,
				'crop'      => true,
			),
		),
	);
}

/**
 * Add post types that are used in the theme 
 * 
 * @return array
 */
function aletheme_get_post_types() {
	return array(
		'gallery' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Gallerie',
			'multiple' => 'Galleries',
			'columns'    => array(
				'first_image',
			)
		),
		'events' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 21,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'taxonomies' => array('post_tag'),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Evenement',
			'multiple' => 'Evenements',
			'columns'    => array(
				'first_image',
			),
		),
		'news' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 22,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'taxonomies' => array('post_tag'),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Blog',
			'multiple' => 'Blog',
			'columns'    => array(
				'first_image',
			)
		),
		'volountears' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 22,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'taxonomies' => array('post_tag'),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Volontaire',
			'multiple' => 'Volontaires',
			'columns'    => array(
				'first_image',
			)
		),
		'causes' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 22,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'taxonomies' => array('post_tag'),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Projet',
			'multiple' => 'Projets',
			'columns'    => array(
				'first_image',
			)
		),
		'team' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 22,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'taxonomies' => array('post_tag'),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Equipe',
			'multiple' => 'Equipe',
			'columns'    => array(
				'first_image',
			)
		),
	);
}

/**
 * Add taxonomies that are used in theme
 * 
 * @return array
 */
function aletheme_get_taxonomies() {
	return array(

		'gallery-category'    => array(
			'for'        => array('gallery'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Gallerie Category',
			'multiple'    => 'Gallerie Categories',
		),

		'events-category'    => array(
			'for'        => array('events'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Evenement Category',
			'multiple'    => 'Evenement Categories',
		),

		'news-category'    => array(
			'for'        => array('news'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Blog Category',
			'multiple'    => 'Blog Categories',
		),
	);
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function aletheme_get_post_formats() {
	return array();
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function aletheme_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Predefine custom sliders
 * @return array
 */
function aletheme_get_sliders() {
	return array(
		'sneak-peek' => array(
			'title'		=> 'Sneak Peek',
		),
	);
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function aletheme_get_post_types_with_gallery() {
	return array('gallery', 'news');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function aletheme_media_custom_fields() {
	return array();
}