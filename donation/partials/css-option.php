<?php
if(isset($_COOKIE["background"])) {
	$ale_background = $_COOKIE["background"];
} else{
	$ale_background = ale_get_option('background');
}
if(isset($_COOKIE["maincolor"])) {
	$ale_maincolor = $_COOKIE["maincolor"];
} else{
	$ale_maincolor = ale_get_option('maincolor');
}
if(isset($_COOKIE["secondarycolor"])) {
	$ale_secondarycolor = $_COOKIE["secondarycolor"];
} else{
	$ale_secondarycolor = ale_get_option('secondarycolor');
}
if(isset($_COOKIE["tertiarycolor"])) {
	$ale_tertiarycolor = $_COOKIE["tertiarycolor"];
} else{
	$ale_tertiarycolor = ale_get_option('tertiarycolor');
}
$ale_headerfont = ale_get_option('headerfont');
$ale_mainfont = ale_get_option('mainfont');
$ale_secondaryfont = ale_get_option('secondaryfont');
$ale_font = ale_get_option('bodystyle');
$ale_h1 = ale_get_option('h1sty');
$ale_h2 = ale_get_option('h2sty');
$ale_h3 = ale_get_option('h3sty');
$ale_h4 = ale_get_option('h4sty');
$ale_h5 = ale_get_option('h5sty');
$ale_h6 = ale_get_option('h6sty');
?>
<?php
	if(ale_get_option('headerfontex')){ $headerfontex = ":".ale_get_option('headerfontex'); } else {$headerfontex =""; }
	if(ale_get_option('mainfontex')){ $mainfontex = ":".ale_get_option('mainfontex'); } else {$mainfontex = "";}
	if(ale_get_option('secondaryfontex')){ $secondaryfontex = ":".ale_get_option('secondaryfontex'); } else {$secondaryfontex = "";}
	if(ale_get_option('headerfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('headerfont').$headerfontex."' rel='stylesheet' type='text/css'>"; }
	if(ale_get_option('mainfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('mainfont').$mainfontex."' rel='stylesheet' type='text/css'>"; }
	if(ale_get_option('secondaryfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('secondaryfont').$secondaryfontex."' rel='stylesheet' type='text/css'>"; }
?>
<style type='text/css'>
	body {
		<?php
		if($ale_font['size']){ echo "font-size:".$ale_font['size'].";"; };
		if($ale_font['style']){ echo "font-style:".$ale_font['style'].";"; };
		if($ale_font['color']){ echo "color:".$ale_font['color'].";"; };
		if($ale_font['face']){ $fontfamily =  str_replace ('+',' ',$ale_font['face']); echo "font-family:".$fontfamily.";"; };
		if($ale_background['color']){ echo "background-color:".$ale_background['color'].";"; }
		if($ale_background['image']){ echo "background-image: url(".$ale_background['image'].");"; }
		if($ale_background['repeat']){ echo "background-repeat:".$ale_background['repeat'].";"; }
		if($ale_background['position']){ echo "background-position:".$ale_background['position'].";"; }
		if($ale_background['attachment']){ echo "background-attachment:".$ale_background['attachment'].";"; }
		?>
	}
	h1 {
		<?php
		if($ale_h1['size']){ echo "font-size:".$ale_h1['size'].";"; };
		if($ale_h1['style']){ echo "font-style:".$ale_h1['style'].";"; };
		if($ale_h1['color']){ echo "color:".$ale_h1['color'].";"; };
		if($ale_h1['face']){ $h1family =  str_replace ('+',' ',$ale_h1['face']); echo "font-family:".$h1family.";"; };
		?>
	}
	h2 {
		<?php
		if($ale_h2['size']){ echo "font-size:".$ale_h2['size'].";"; };
		if($ale_h2['style']){ echo "font-style:".$ale_h2['style'].";"; };
		if($ale_h2['color']){ echo "color:".$ale_h2['color'].";"; };
		if($ale_h2['face']){ $h2family =  str_replace ('+',' ',$ale_h2['face']); echo "font-family:".$h2family.";"; };
		?>
	}
	h3 {
		<?php
		if($ale_h3['size']){ echo "font-size:".$ale_h3['size'].";"; };
		if($ale_h3['style']){ echo "font-style:".$ale_h3['style'].";"; };
		if($ale_h3['color']){ echo "color:".$ale_h3['color'].";"; };
		if($ale_h3['face']){ $h3family =  str_replace ('+',' ',$ale_h3['face']); echo "font-family:".$h3family.";"; };
		?>
	}
	h4 {
		<?php
		if($ale_h4['size']){ echo "font-size:".$ale_h4['size'].";"; };
		if($ale_h4['style']){ echo "font-style:".$ale_h4['style'].";"; };
		if($ale_h4['color']){ echo "color:".$ale_h4['color'].";"; };
		if($ale_h4['face']){ $h4family =  str_replace ('+',' ',$ale_h4['face']); echo "font-family:".$h4family.";"; };
		?>
	}
	h5 {
		<?php
		if($ale_h5['size']){ echo "font-size:".$ale_h5['size'].";"; };
		if($ale_h5['style']){ echo "font-style:".$ale_h5['style'].";"; };
		if($ale_h5['color']){ echo "color:".$ale_h5['color'].";"; };
		if($ale_h5['face']){ $h5family =  str_replace ('+',' ',$ale_h5['face']); echo "font-family:".$h5family.";"; };
		?>
	}
	h6 {
		<?php
		if($ale_h6['size']){ echo "font-size:".$ale_h6['size'].";"; };
		if($ale_h6['style']){ echo "font-style:".$ale_h6['style'].";"; };
		if($ale_h6['color']){ echo "color:".$ale_h6['color'].";"; };
		if($ale_h6['face']){ $h6family =  str_replace ('+',' ',$ale_h6['face']); echo "font-family:".$h6family.";"; };
		?>
	}

	/*Header Font (PT Sans)*/
	header.main nav > ul > li > a, header.main nav > ul > li ul li > a, header.main #mobile-menu li a, section.info .col-4 h3,
	section.info .col-4 p, footer .footer p, footer .footer .twit .name, section.org-details h3, section.org-details p,
	.home-4-information .wrapper .myStat .circle-text,.home-4-information .wrapper .circle-info-half,.home-5-donation .circle .myStat .circle-text,
	.template-about-3 .information-box .wrapper .items article p{
	<?php if($ale_headerfont){ $headerfontname =  str_replace ('+',' ',$ale_headerfont); echo "font-family:".$headerfontname.";"; } ?>}

	/*Main Font (Open Sans)*/
	header.top .tel, header.top .tel span, header.top .right .email a, header.top .right .donate_ a, header.top .right .name,
	header.top .right .search input[type='search'], #slider .slides li .text1, #slider .slides li .text2, section.donate_ .col-6.text h3 ,
	section.donate_ .col-6.text h4, section.donate_ .col-6.text h5, section.donate_ .col-6.text h5 span, section.donate_ .col-6.but a,
	section.donate_ .share >span, section.latest-donations h2, section.latest-donations .peoples .name, section.latest-donations .peoples .state,
	section.latest-donations .peoples .donated, section.how-help h2, section.how-help .col-6 h3, section.how-help .col-6 p,
	section.how-help .c1, section.how-help .c2, section.how-help .c3, section.how-help .c4, section.how-help .more, section.news h3,
	section.news .news section .time, section.news .news section a, section.news .news section p, section.news .news .info .reply,
	section.news .news .info .comment, section.news .news .info .tag, section.news .news .more, section.news .about p, section.bottom .text h3,
	section.bottom .text a, footer .line .links li a, footer .line .copy, footer .line .copy span, footer .footer .contacts .phone,
	footer .footer .contacts .phone span, footer .footer .contacts .adress, footer .footer .contacts .adress span, footer .footer .contacts .email,
	footer .footer h3, section.top-page-nav h2, section.top-page-nav .navi a, section.top-page-nav .navi a.active, .linetext p,
	section.management h2, section.management .peoples .name, section.management .peoples .spec, section.management .peoples p,
	section.org-details h2, section.org-details a, section.you-help h2, section.you-help .col-8 p, section.you-help .col-8 a,
	section.you-help .col-4 form input#email, section.you-help .col-4 form textarea, section.you-help .col-4 form #submit, section.blog .img .like p,
	section.blog .frame .like p, section.blog .img-big .like p, section.blog article.big .title, section.blog article.big .info,
	section.blog article.big .info.events .category span, section.blog article.big .date, section.blog article.big p, section.blog article.big a,
	section.blog article.small .title, section.blog article.small .info, section.blog article.small p, section.blog article.small a,
	section.blog .page-numbers li a, section.blog .page-numbers li span, aside.blog form #search, aside.blog #aside-dynamic .menu > div, aside.blog #aside-dynamic .content .col-9 .title,
	aside.blog #aside-dynamic .content .col-9 p, aside.blog #aside-dynamic .content .col-9 .info .date, aside.blog #aside-dynamic .content .col-9 .info .comments,
	aside.blog .recent-events > h3, aside.blog .recent-events .title, aside.blog .recent-events .item .col-9 .title, aside.blog .recent-events .item .col-9 .info .calendar,
	aside.blog #photostream > h3, aside.blog .video > h3, .gallery .menu > a, .gallery .photos .col-6 > a .like p, section.contacts h2,
	section.contacts .col-7 > a, section.contacts .col-7 p, section.contacts .col-5 form .name, section.contacts .col-5 form .email,
	section.contacts .col-5 form .subject, section.contacts .col-5 form .message, section.contacts .col-5 form #submit, section.cause h2,
	section.cause .causes h3, section.cause .causes .percent .num, section.cause .causes .cols .back h4, section.cause .causes .cols .back p,
	section.donate-text h2, section.donate-text p, section.donate-text .col-4 form .name, section.donate-text .col-4 form .email,
	section.donate-text .col-4 form .message, section.donate-text .col-4 form #submit,aside.blog .widget .caption, section.top-page-nav .navi .current,
	.template-contact-2 .contact-form form .message {
	<?php if($ale_mainfont){ $mainfontname =  str_replace ('+',' ',$ale_mainfont); echo "font-family:".$mainfontname.";"; } ?>}

	/*Secondary Font (Raleway)*/
	.home-4-donation .wrapper .col-7 .string, .home-5-blog .items article .string{
	<?php if($ale_secondaryfont){ $secondaryfontname =  str_replace ('+',' ',$ale_secondaryfont); echo "font-family:".$secondaryfontname.";"; } ?>}

	/*Background*/
	<?php if($ale_background): ?>
		body,header.main{
			<?php echo 'background: url('. $ale_background .');'; ?>
		}
	<?php endif; ?>
	/*Main color (green)*/
	
	<?php if($ale_maincolor && $ale_maincolor != '#7bae4e'): ?>
		header.top,header.top .right .search input[type='search'],section.donate_,section.how-help,section.news .photos h3 .control .left,
		section.news .photos h3 .control .right,aside.blog #photostream > h3 .control span .left,aside.blog #photostream > h3 .control span .right,
		section.cause .causes .percent .active,section.cause .causes .percent .num,.home-2-donate .item .inner,.home-3-donation,
		.color-selector .colors-choose .colors .color.color1,.top-filter .top-cart{
			<?php echo 'background-color:' . $ale_maincolor . ';'; ?>
		}


		header.main nav > ul > li ul,header.main #mobile-menu,#slider .slides li .text1,section.latest-donations .peoples .donated .right,
		section.bottom .text h3,footer .line,.blog-page .img .like,.blog-page .frame .like,.blog-page .img-big .like,.blog-page .frame .like,
		.blog-page article.small .like,aside.blog #aside-dynamic .menu > div,aside.blog #photostream > h3 .control span,
		.gallery .menu > a,.gallery .photos .col-6 .like,.page-numbers .prev,.page-numbers .next,.home-1-slider .slides li .text .button:hover,
		.home-1-events article a:hover,.home-1-donate .donate-button:hover,.home-1-news .col-4 article:hover,.home-1-blog article:before,
		.home-1-blog .flex-direction-nav li a,.home-2-development a:hover,.home-2-blog .slides li article .top > a:hover,
		.home-2-blog .slides li article .bottom a:hover,.home-2-blog .slides li.flex-active-slide article .top,
		.home-3-causes .wrapper .items article .link:before,.home-3-news .items .col-6:first-child article,
		.home-3-news .items .col-6:last-child article .col-2 > a:hover,.home-3-subscribe,.home-4-slider .slides li .text a:hover,
		.home-4-tabs .ale-tab-inner .ale-nav li a:hover,.home-4-tabs .ale-tab-inner .ale-nav li.ui-tabs-active a,.home-4-events,
		.home-4-events .slider .slides li article .text .tags a:hover,.home-4-description .content .col-6:last-of-type a:hover,
		.home-5-donation .items .donate-button:hover,.home-5-blog .items article .tags a:hover,.home-5-blog .items article:hover .tags a:hover,
		.causes-page article .text .progress .line,.single-causes .progress .line,.template-blog-1 article .text .post-info a:hover,
		.template-blog-3 article:hover,.button-donate:hover,section.shop .big .info .quantity input[type="button"],
		section.shop .big .woocommerce-tabs ul li a,.woocommerce .quantity .plus,.woocommerce-page .quantity .plus,
		.woocommerce #content .quantity .plus,.woocommerce-page #content .quantity .plus,.woocommerce .quantity .minus,
		.woocommerce-page .quantity .minus,.woocommerce #content .quantity .minus,.woocommerce-page #content .quantity .minus,
		.color-selector .show-colors,.woocommerce nav.woocommerce-pagination .page-numbers .next,
		.woocommerce-page nav.woocommerce-pagination .page-numbers .next, .woocommerce #content nav.woocommerce-pagination .page-numbers .next,
		.woocommerce-page #content nav.woocommerce-pagination .page-numbers .next,.woocommerce nav.woocommerce-pagination .page-numbers .prev,
		.woocommerce-page nav.woocommerce-pagination .page-numbers .prev, .woocommerce #content nav.woocommerce-pagination .page-numbers .prev,
		.woocommerce-page #content nav.woocommerce-pagination .page-numbers .prev,.woocommerce .quantity .plus:hover,
		.woocommerce .quantity .minus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce #content .quantity .minus:hover,
		.woocommerce-page .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page #content .quantity .plus:hover,
		.woocommerce-page #content .quantity .minus:hover,.woocommerce .quantity .minus, .woocommerce-page .quantity .minus,
		.woocommerce #content .quantity .minus, .woocommerce-page #content .quantity .minus,.top-filter .top-cart .widget_shopping_cart_content,
		section.how-help .col-6.line .li,.map-info-window .text > a:hover,.page-numbers .prev span,.page-numbers .next span{
			<?php echo 'background:' . $ale_maincolor . ';'; ?>
		}

		section.donate_.page .col-6.text h5 span,section.news .news article h3 a,section.org-details a,section.you-help .col-8 a,
		.blog-page article.big .info.events .category span,.blog-page article.big a,.blog-page article.small a,aside.blog .widget a,
		aside.blog .widget_aletheme_best_sellers_widget .item .text h3 a,section.contacts .col-7 > a:hover,
		section.contacts .col-7 > a:hover span,.comments .comment .text a,.home-1-news .col-8 article .text a:hover,
		.home-2-blog .slides li article .top h3 a:hover,.home-3-causes .wrapper .items article .link span,
		.home-3-news .items .col-6:last-child article .col-10 h3 a:hover,.home-4-tabs .ale-tab-inner .ale-tab .col-6:first-child a:hover,
		.home-4-donation .wrapper .col-7 .share a:hover,.home-5-events article h2 a:hover,.template-gallery-1 article a .overlay .icon span,
		.template-about-2 .contact-form a,.template-about-3 .team-box .items article .text h3 a:hover,
		.template-about-3 .team-box .items article .text .media-links a:hover,section.shop .big .item .info > .purchase > span,
		section.shop .big .item .info > .discount > span,section.shop .big .item .info > .price > span,section.shop .big .info > .price > span,
		section.shop .big .info > .discount > span,.cross-sells .item .info > .purchase > span,.cross-sells .item .info > .discount > span,
		.cross-sells .item .info > .price > span,.home-1-blog article .text span{
			<?php echo 'color:' . $ale_maincolor . ';'; ?>
		}

		section.latest-donations .peoples .donated .right:before {
			<?php echo 'border-right: 4px solid ' . $ale_maincolor . ';'; ?>
		}

		.gallery .photos .col-6 > a .mask{
			<?php echo 'border: 2px solid ' . $ale_maincolor . ';'; ?>
		}

		header.main nav > ul > li ul:before{
			<?php echo 'border-bottom: 10px solid ' . $ale_maincolor . ';'; ?>
		}

		.home-1-blog article .text,.home-3-causes .wrapper .items article .link:after,.home-3-causes .wrapper .items article:hover:before,
		.template-gallery-1 article a .overlay .gradient{
			<?php
			echo 'background:' . $ale_maincolor . ';';
			echo 'background: -webkit-gradient(linear, left bottom, left top, color-stop(0, '. $ale_maincolor .'), color-stop(1, rgba(0, 0, 0, 0)));';
			echo 'background: -ms-linear-gradient(bottom, ' . $ale_maincolor . ', rgba(0, 0, 0, 0));';
			echo 'background: -moz-linear-gradient(center bottom, ' . $ale_maincolor . ' 0%, rgba(0, 0, 0, 0) 100%);';
			?>
		}

		.home-3-volountears .wrapper .items article:hover,.single-causes .story .assign-volountears .items article:hover{
			<?php
			echo '-webkit-box-shadow: inset -8px 0 0 0 ' . $ale_maincolor . ';';
			echo '-moz-box-shadow: inset -8px 0 0 0 ' . $ale_maincolor . ';';
			echo 'box-shadow: inset -8px 0 0 0 ' . $ale_maincolor . ';';
			?>
		}

		.home-4-description .wrapper blockquote{
			<?php
			echo '-webkit-box-shadow: inset 0 0 0 10px ' . $ale_maincolor . ';';
			echo '-moz-box-shadow: inset 0 0 0 10px ' . $ale_maincolor . ';';
			echo 'box-shadow: inset 0 0 0 10px ' . $ale_maincolor . ';';
			?>
		}
	<?php endif; ?>

	/*Secondary color (red)*/
	
	<?php if($ale_secondarycolor && $ale_secondarycolor != '#f65339'): ?>
		.story input[type="submit"],.top-filter .top-cart .widget_shopping_cart_content .buttons a,.top-filter .dropdown,
		.top-filter .dropdown div,.top-filter .dropdown:hover div,section.shop .big .item .add-to-cart .product_type_external,
		section.shop .big .item .add-to-cart .product_type_grouped,section.shop .big .item .add-to-cart .product_type_simple,
		section.shop .big .item .add-to-cart .add_to_cart_button,section.shop .big .item .add-to-cart .added_to_cart,
		section.shop .big .info button[type="submit"],.cross-sells .item .add-to-cart .product_type_simple,
		.cross-sells .item .add-to-cart .add_to_cart_button,.cross-sells .item .add-to-cart .added_to_cart,
		.woocommerce nav.woocommerce-pagination .page-numbers .current,.woocommerce-page nav.woocommerce-pagination .page-numbers .current,
		.woocommerce #content nav.woocommerce-pagination .page-numbers .current,.woocommerce-page #content nav.woocommerce-pagination .page-numbers .current,
		.woocommerce nav.woocommerce-pagination .page-numbers .current:hover,.woocommerce-page nav.woocommerce-pagination .page-numbers .current:hover,
		.woocommerce #content nav.woocommerce-pagination .page-numbers .current:hover,.woocommerce-page #content nav.woocommerce-pagination .page-numbers .current:hover,
		.woocommerce.widget_shopping_cart .buttons a,.woocommerce-page.widget_shopping_cart .buttons a,
		.woocommerce .widget_shopping_cart .buttons a,.woocommerce-page .widget_shopping_cart .buttons a,.woocommerce .widget_layered_nav_filters ul li a,
		.woocommerce-page .widget_layered_nav_filters ul li a,.woocommerce .widget_price_filter .price_slider_wrapper .button,
		.woocommerce-page .widget_price_filter .price_slider_wrapper .button,.widget_product_search input[type="submit"],
		.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt,
		.woocommerce #content input.button.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,
		.woocommerce-page #respond input#submit.alt,.woocommerce-page #content input.button.alt,.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce #respond input#submit.alt:hover,
		.woocommerce #content input.button.alt:hover,.woocommerce-page a.button.alt:hover,.woocommerce-page button.button.alt:hover,
		.woocommerce-page input.button.alt:hover,.woocommerce-page #respond input#submit.alt:hover,.woocommerce-page #content input.button.alt:hover,
		.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit:hover,
		.woocommerce #content input.button:hover,.woocommerce-page a.button:hover,.woocommerce-page button.button:hover,
		.woocommerce-page input.button:hover,.woocommerce-page #respond input#submit:hover,.woocommerce-page #content input.button:hover,
		.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,
		.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,
		.woocommerce-page #respond input#submit,.woocommerce-page #content input.button,.colorpicker_submit,header.main nav > ul > li:hover > a,
		header.main nav > ul > li.current-menu-item > a,section.contacts .col-5 form #submit,section.donate-text .col-4 form #submit,
		.comments .respond input[type="submit"],.get-news-form input[type="submit"],.page-numbers .current,.page-numbers .current:hover,
		.home-1-slider .slides li .text .button,.home-1-events .top > hr,.home-1-events article a,.home-1-donate .donate-button,
		.home-2-donate .item .inner .donate-button,.home-2-development a,.home-2-blog .slides li article .bottom a,
		.home-2-blog .flex-direction-nav li a,.home-2-partners .text,.home-3-subscribe form input[type="submit"],
		.home-4-donation .wrapper .flex-direction-nav li a:hover,.home-4-events .flex-direction-nav li a:hover,
		.home-4-description .content .col-6:last-of-type a,.home-5-donation .items .donate-button,.home-5-blog .items article:hover,
		.template-blog-2 article .text a,.template-about-2 .team .items article:hover,.button-big .text,.button-big .shadow,
		.button-input .shadow,.button-input .text,.template-about-3 .partners-box .text,.top-filter .dropdown:hover,.top-filter .dropdown:before,
		.top-filter .dropdown .selected, .top-filter .dropdown li,.top-filter .dropdown ul,section.shop .big .item .add-to-cart .product_type_external:before,
		section.shop .big .item .add-to-cart .product_type_grouped:before, section.shop .big .item .add-to-cart .product_type_simple:before,
		section.shop .big .item .add-to-cart .add_to_cart_button:before,section.shop .big .info button[type="submit"]:before,
		.top-filter .top-cart .widget_shopping_cart_content .buttons a:before,.cross-sells .item .add-to-cart .product_type_simple:before,
		.cross-sells .item .add-to-cart .add_to_cart_button:before,.home-2-donate .item .inner .donate-button:before,.button-donate,
		.button,.button .text,.button .shadow,.button-slider-donate,.template-about-2 .contact-form form .send-email #submit,
		.template-about-2 .contact-form form .send-email:after,.map-info-window .text > a{
			<?php echo 'background:' . $ale_secondarycolor . ';'; ?>
		}

		.color-selector .colors-choose .colors .color.color2{
			<?php echo 'background-color:' . $ale_secondarycolor . ';'; ?>
		}

		header.top .right .donate_ a:hover,section.info .col-4 .icon,.home-2-information .wrapper .items article span,
		.home-4-tabs .ale-tab-inner .ale-tab .col-6:first-child a,.home-4-donation .wrapper .col-7 .share a,.home-5-donation .circle .share a,
		.template-about-2 .map .map-item-2 .item .myStat .circle-text,.template-about-2 .contact-form a:hover,
		.template-about-3 .information-box .wrapper .items article span{
			<?php echo 'color:' . $ale_secondarycolor . ';'; ?>
		}

		.home-5-events article:hover .overlay,.template-about-3 .events-box article:hover .overlay{
			<?php echo '-webkit-box-shadow: inset 0 11px 0 0 ' . $ale_secondarycolor . ';'; ?>
			<?php echo '-moz-box-shadow: inset 0 11px 0 0 ' . $ale_secondarycolor . ';'; ?>
			<?php echo 'box-shadow: inset 0 11px 0 0 ' . $ale_secondarycolor . ';'; ?>
		}
	<?php endif; ?>

	/*Tertiary color (yellow)*/
	
	<?php if($ale_tertiarycolor && $ale_tertiarycolor != '#ffd800'): ?>
		section.shop .big .woocommerce-tabs ul li.active a,section.latest-donations .peoples .col-2i:hover > .donated .left,
		section.how-help .top-border,section.bottom .text a:hover,aside.blog #aside-dynamic .menu > div.active,
		aside.blog #aside-dynamic .menu > div.active:hover,.gallery .menu > a.active,.gallery .menu > a.active:hover,
		.home-1-news .col-4 article .news-header a,.home-2-partners .text h2:before,.home-3-donation:before,
		.home-3-volountears:before,.home-3-volountears:before,.home-3-news .items .col-6:first-child article .text .col-2 > a,
		.home-3-news .items .col-6:last-child article .col-2 > a,.template-blog-3 article .text .post-info a:hover,
		.template-about-3 .partners-box .text h2:before,.flex-control-paging li a.flex-active,.flex-control-paging li a:hover{
			<?php echo 'background:' . $ale_tertiarycolor . ';'; ?>
		}

		.color-selector .colors-choose .colors .color.color3,section.donate_ #line .way .bar{
			<?php echo 'background-color:' . $ale_tertiarycolor . ';'; ?>
		}

		header.top .right .donate_ a,section.how-help .item span,footer .footer .contacts .fa,section.top-page-nav .navi .current,
		.home-1-donate .share a:hover,.home-1-news .col-8 article .text a,.home-2-donate .item .inner .share a:hover,
		.home-3-donation .slider .slides li .col-4:nth-child(2) .share a:hover,.home-3-news .items .col-6:first-child article .text .col-10 h3 a:hover,
		.home-4-slider .flex-direction-nav li a,.home-5-slider .slider .flex-direction-nav li a,.home-5-donation .circle .share a:hover,
		.home-5-history .slides li article .date h2,.home-5-blog .items article:hover h3 a:hover,.template-blog-3 article:hover h2 a:hover,
		.template-about-2 .team .items article .text .media-links a:hover,.template-about-2 .team .items article:hover .text h3 a:hover,
		section.shop .big .item .starwrapper{
			<?php echo 'color:' . $ale_tertiarycolor . ';'; ?>
		}

		section.shop .big .woocommerce-tabs ul,aside.blog #aside-dynamic .menu > div,.gallery .menu > a{
			<?php echo 'border-bottom: 3px solid ' . $ale_tertiarycolor . ';'; ?>
		}

		section.shop .big .woocommerce-tabs ul,section.top-page-nav .navi .current{
			<?php echo 'border-bottom: 1px dotted ' . $ale_tertiarycolor . ';'; ?>
		}

		.home-3-causes .wrapper .items article:hover{
			<?php echo '-webkit-box-shadow: 0 7px 0 0 ' . $ale_tertiarycolor . ';'; ?>
			<?php echo '-moz-box-shadow: 0 7px 0 0 ' . $ale_tertiarycolor . ';'; ?>
			<?php echo 'box-shadow: 0 7px 0 0 ' . $ale_tertiarycolor . ';'; ?>
		}
	<?php endif; ?>


	<?php if(($ale_tertiarycolor && $ale_tertiarycolor != '#ffd800') &&  ($ale_maincolor && $ale_maincolor != '#7bae4e')): ?>
		.home-2-donate .item .inner #line .way .bar{
			<?php
			echo 'background:' . $ale_maincolor . ';';
			echo 'background: -webkit-gradient(linear, left bottom, left top, color-stop(0, '. $ale_maincolor .'), color-stop(1, ' . $ale_tertiarycolor . '));';
			echo 'background: -ms-linear-gradient(bottom, ' . $ale_maincolor . ', ' . $ale_tertiarycolor . ');';
			echo 'background: -moz-linear-gradient(center bottom, ' . $ale_maincolor . ' 0%, ' . $ale_tertiarycolor . ' 100%);';
			?>
		}
	<?php endif; ?>
</style>