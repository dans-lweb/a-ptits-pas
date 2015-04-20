jQuery(function($) {
	"use strict";

	//Map
	$('.home-5-map').hover(function(){
		$('.home-5-map .top').fadeOut('slow');
	}, function(){
		$('.home-5-map .top').fadeIn('slow');
	});

	$('.single-causes .donation-result .item.donors, .button-slider-donate, .home-4-donation .wrapper .col-7 .donate-button-form .button-big').toggle(function(){
		$('.single-causes .donors-list,.home-3-donation .slider .slides li .col-4:nth-child(2) .donate-button-form .donation-amount-block,.home-4-donation .wrapper .col-7 .donate-button-form .donation-amount-block').slideDown('slow');
	}, function(){
		$('.single-causes .donors-list,.home-3-donation .slider .slides li .col-4:nth-child(2) .donate-button-form .donation-amount-block,.home-4-donation .wrapper .col-7 .donate-button-form .donation-amount-block').slideUp('slow');
	});

	//Donate button
	$('.button-donate').on('click', function(){
		$('.donation-amount-block').slideDown('slow');
	});

	//Tabs
	$('.ale-tab-inner').tabs();

	/* DROP MENU */
	$('#mobile-menu > ul > li').click(function(){
		$(this).children('ul').toggle({display: "toggle"});
	});

	$('#mobile-button').click(function(){
		$('#mobile-menu').toggle({display: "toggle"});
	});

	//Donate form
	$('.right .donate_ a, .home-1-donate .donate-button, .home-2-donate .donate-button, .home-5-donation .donate-button,.home-2-donate .button-big').click(function(){
		$('.donate-form').fadeIn(200);
	});

	$('.donate_ .but a').click(function(){
		$('.donate-form').fadeIn(200);
	});

	$('.donate-form .exit').click(function(){
		$('.donate-form').fadeOut(200);
	});

	//Get email form
	$('.email a').click(function(){
		$('.get-news-form').fadeIn(200);
	});
	$('.get-news-form .exit').click(function(){
		$('.get-news-form').fadeOut(200);
	});
	//Home
	$('#slider,.home-2-blog .slider,.home-3-donation .slider, .template-about-2 .slider').flexslider({
		animation: "slide",
		animationLoop: true,
		prevText: '',
		nextText: '',
		controlNav: false,
		pauseOnHover: true
	});

	$(' .home-4-donation .wrapper, .home-4-events .slider').flexslider({
		animation: "slide",
		animationLoop: true,
		prevText: '',
		nextText: '',
		pauseOnHover: true
	});

	$('.home-5-slider .thumbnails').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: false,
		slideshow: false,
		maxItems: 4,
		minItems: 4,
		itemWidth: 270,
		asNavFor: '.home-5-slider .slider'
	});

	$('.home-5-slider .slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		prevText: "",
		nextText: "",
		sync: ".home-5-slider .thumbnails"
	});
	$('.home-1-blog').flexslider({
		animation: "slide",
		animationLoop: true,
		prevText: '',
		nextText: '',
		maxItems: 6,
		minItems: 1,
		itemWidth: 320,
		controlNav: false,
		pauseOnHover: true,
		move: 1
	});

	var windowWidth = $( window ).width();
	if(windowWidth > 1000){
		var maxItemsCount = 3;
	} else if(windowWidth <= 1000 && windowWidth > 680){
		var maxItemsCount = 2;
	} else{
		var maxItemsCount = 1;
	}
	$('.home-5-history').flexslider({
		animation: "slide",
		maxItems: maxItemsCount,
		minItems: 1,
		itemWidth: 333,
		controlNav: false,
		directionNav: false,
		pauseOnHover: true,
		move: 1,
		slideshowSpeed: 3000
	});
	$('#photo-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		prevText: '',
		nextText: '',
		itemMargin: 10
	});

	$('section.news .photos h3 .control .left').click(function() {
		var slider = $('#photo-slider').data('flexslider');
		slider.flexslider("prev");
	});

	$('section.news .photos h3 .control .right').click(function() {
		var slider = $('#photo-slider').data('flexslider');
		slider.flexslider("next");
	});

	$('#photostream, .home-4-slider,.home-1-slider, .home-2-slider .wrapper, .home-3-slider').flexslider({
		animation: "slide",
		animationLoop: true,
		prevText: '',
		nextText: ''
	});

	$('aside.blog #photostream h3 .control .left').click(function() {
		var slider = $('#photostream').data('flexslider');
		slider.flexslider("prev");
	});

	$('aside.blog #photostream h3 .control .right').click(function() {
		var slider = $('#photostream').data('flexslider');
		slider.flexslider("next");
	});

	//Blog
	$('#aside-dynamic .menu > div').click(function() {
		var attr = $(this).attr('data-attr');

		$('#aside-dynamic .menu > div').removeClass('active');
		$(this).addClass('active');


		$('#aside-dynamic .content').css('display','none');
		$('#aside-dynamic .content.' + attr).css('display','block');
	});


	$(window).load(function(){
		// MASONRY
		if($(".grid").length){
			$(".grid").masonry({
				columnWidth: ".grid-sizer",
				itemSelector: ".col-6"
			});
		}

		if($(".grid-shop").length){
			$(".grid-shop").masonry({
				columnWidth: ".grid-sizer",
				itemSelector: ".item",
				gutter: ".gutter-sizer"
			});
		}

		if($(".grid-gutter").length){
			$('.grid-gutter').isotope({
				layoutMode: 'packery',
				packery: {
					columnWidth: ".grid-sizer",
					gutter: ".gutter-sizer",
				},
				itemSelector: "article.small"
			});
		}

		if($(".template-gallery-2 .items").length){
			$('.template-gallery-2 .items').isotope({
				layoutMode: 'packery',
				packery: {
					columnWidth: ".grid-sizer"
				},
				itemSelector: ".item"
			});
		}

		if($(".template-gallery-3 .items").length){
			$('.template-gallery-3 .items').isotope({
				layoutMode: 'packery',
				packery: {
					columnWidth: ".grid-sizer",
					gutter: ".gutter-sizer",
				},
				itemSelector: ".item"
			});
		}
	});


	//POPUP GALLERY
	$('.inside-photo').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},

		image: {
			markup: '<div class="mfp-figure">'+
				'<div class="mfp-close"></div>'+
				'<div class="mfp-img"></div>'+
				'<div class="mfp-bottom-bar">'+
				'<div class="mfp-counter"></div>'+
				'</div>'+
				'</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

			cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor.

			titleSrc: 'title', // Attribute of the target element that contains caption for the slide.
			// Or the function that should return the title. For example:
			// titleSrc: function(item) {
			//   return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			// }

			verticalFit: true, // Fits image in area vertically

			tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
		}
	});
	/* END: POPUP */

	//Cart
	$('.top-cart').click(function(){
		$('.widget_shopping_cart_content').toggle();
	});

	//Select
	$('.dropdown select').easyDropDown();

	//Cart
	$('.cart-box').append('Cart');
	$('.cart-box2').append('Your cart is empty');
	$('.add_to_cart_button').click(function(){
		$('.cart-box2').remove('.cart-box2');
		$('.top-cart').append('<span class="cart-box">Cart</span>');
	});
});

Modernizr.addTest('ipad', function () {
	return !!navigator.userAgent.match(/iPad/i);
});

Modernizr.addTest('iphone', function () {
	return !!navigator.userAgent.match(/iPhone/i);
});

Modernizr.addTest('ipod', function () {
	return !!navigator.userAgent.match(/iPod/i);
});

Modernizr.addTest('appleios', function () {
	return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});

Modernizr.addTest('positionfixed', function () {
	var test    = document.createElement('div'),
		control = test.cloneNode(false),
		fake = false,
		root = document.body || (function () {
			fake = true;
			return document.documentElement.appendChild(document.createElement('body'));
		}());

	var oldCssText = root.style.cssText;
	root.style.cssText = 'padding:0;margin:0';
	test.style.cssText = 'position:fixed;top:42px';
	root.appendChild(test);
	root.appendChild(control);

	var ret = test.offsetTop !== control.offsetTop;

	root.removeChild(test);
	root.removeChild(control);
	root.style.cssText = oldCssText;

	if (fake) {
		document.documentElement.removeChild(root);
	}

	/* Uh-oh. iOS would return a false positive here.
	 * If it's about to return true, we'll explicitly test for known iOS User Agent strings.
	 * "UA Sniffing is bad practice" you say. Agreeable, but sadly this feature has made it to
	 * Modernizr's list of undectables, so we're reduced to having to use this. */
	return ret && !Modernizr.appleios;
});


// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
	{
		// Let's see if we need to load selectivizr
		test : Modernizr.borderradius,
		// Modernizr.load loads selectivizr and Respond.js for IE6-8
		nope : [ale.template_dir + '/js/libs/selectivizr.min.js', ale.template_dir + '/js/libs/respond.min.js']
	},{
		test: Modernizr.touch,
		yep:ale.template_dir + '/css/touch.css'
	}
]);



jQuery(function($) {
	var is_single = $('#post').length;
	var posts = $('article.post');
	var is_mobile = parseInt(ale.is_mobile);

	var slider_settings = {
		animation: "slide",
		slideshow: false,
		controlNav: false
	}

	$(document).ajaxComplete(function(){
		try{
			if (!posts.length) {
				return;
			}
			FB.XFBML.parse();
			gapi.plusone.go();
			twttr.widgets.load();
			pin_load();
		}catch(ex){}
	});

	// open external links in new window
	$("a[rel$=external]").each(function(){
		$(this).attr('target', '_blank');
	});

	$.fn.init_posts = function() {
		var init_post = function(data) {
			// close other posts
			data.post.siblings('.open-post').find('a.toggle').trigger('click', {
				hide:true
			});

			var loading = data.post.find('span.loading');

			if (data.more.is(':empty')) {
				data.post.addClass('post-loading');
				loading.css('visibility', 'visible');
				data.more.load(ale.ajax_load_url, {
					'action':'aletheme_load_post',
					'id':data.post.data('post-id')
				}, function(){
					loading.remove();
					data.more.slideDown(400, function(){
						data.post.addClass('open-post');
						data.toggler.text('Close Post');
						$('.video', data.more).fitVids();
						if (data.scroll) {
							data.scroll.scrollTo('fast');
						}
					});
					init_comments(data.post);
				});
			} else {
				data.more.slideDown(400, function(){
					data.post.addClass('open-post');
					data.toggler.text('Close Post');
					if (data.scroll) {
						data.scroll.scrollTo('fast');
					}
				});
			}
		}

		var load_post = function(e, _opts) {
			e.preventDefault();
			var data  = {
				toggler:$(this),
				scroll:false
			};
			var opts = $.extend({
				comments:false,
				hide:false,
				add_comment:false
			}, _opts);
			data.post = data.toggler.parents('article.post');
			data.more = data.post.find('.full');

			if (data.more.is(':visible')) {
				if (opts.hide == true) {
					// quick hide for multiple posts
					data.more.hide();
				} else {
					data.more.slideUp(400);
				}
				data.toggler.text('Open Post');
				data.post.removeClass('open-post');
			} else {
				if (typeof(e.originalEvent) != 'undefined' ) {
					data.scroll = data.post;
				}
				init_post(data);
			}
		}

		var init_comments = function(post) {
			var respond = $('section.respond', post);
			var respond_form = $('form', respond);
			var respond_form_error = $('p.error', respond_form);
			//var respond_cancel = $('.cancel-comment-reply a', respond);
			var comments = $('section.comments', post);

			/*$('a.comment-reply-link', post).on('click', function(e){
			 e.preventDefault();
			 var comment = $(this).parents('li.comment');
			 comment.find('>div').append(respond);
			 respond_cancel.show();
			 respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
			 respond.find('input[name=comment_parent]').val(comment.data('comment-id'));
			 respond.find('input:first').focus();
			 }).attr('onclick', '');

			 respond_cancel.on('click', function(e){
			 e.preventDefault();
			 comments.after(respond);
			 respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
			 respond.find('input[name=comment_parent]').val(0);
			 $(this).hide();
			 });
			 */
			respond_form.ajaxForm({
				'beforeSubmit':function(){
					respond_form_error.text('').hide();
				},
				'success':function(_data){
					var data = $.parseJSON(_data);
					if (data.error) {
						respond_form_error.html(data.msg).slideDown('fast');
						return;
					}
					var comment_parent_id = respond.find('input[name=comment_parent]').val();
					var _comment = $(data.html);
					var list;
					_comment.hide();

					if (comment_parent_id == 0) {
						list = comments.find('ol');
						if (!list.length) {
							list = $('<ol class="commentlist "></ol>');
							comments.find('.scrollbox .jspContainer .jspPane').append(list);
						}
					} else {
						list = $('#comment-' + comment_parent_id).parent().find('ul');
						if (!list.length) {
							list = $('<ul class="children"></ul>');
							$('#comment-' + comment_parent_id).parent().append(list);
						}
						respond_cancel.trigger('click');
					}
					list.append(_comment);
					_comment.fadeIn('fast');
					//.scrollTo();

					respond.find('textarea').clearFields();
				},
				'error':function(response){
					var error = response.responseText.match(/\<p\>(.*)<\/p\>/)[1];
					if (typeof(error) == 'undefined') {
						error = 'Something went wrong. Please reload the page and try again.';
					}
					respond_form_error.html(error).slideDown('fast');
				}
			});
		}
		$(this).each(function(){
			var post = $(this);
			// init post galleries
			$(window).load(function(){
				$('.preview .flexslider', post).flexslider(slider_settings);
			});
			// do not init ajax posts & comments for mobile
			if (!is_mobile) {
				// ajax posts enabled
				if (ale.ajax_posts) {
					$('a.toggle', post).click(load_post);
					$('.video', post).fitVids();
					$('.preview figure a', post).click(function(e){
						e.preventDefault();
						$(this).parents('article.post').find('a.toggle').trigger('click');
					});
				}
			}
		});
		// init ajax comments on a single post if ajax comments are enabled
		if (is_single && parseInt(ale.ajax_comments)) {
			init_comments(posts);
		}
		// open single post on page
		if (parseInt(ale.ajax_open_single) && !is_single && posts.length == 1) {
			posts.find('a.toggle').trigger('click');
		}
	}
	posts.init_posts();

	$.fn.init_gallery = function() {
		$(this).each(function(){
			var gallery = $(this);
			$(window).load(function(){
				$('.flexslider', gallery).flexslider(slider_settings);
			});

		})
	}
	$('#gallery').init_gallery();

	$.fn.init_archives = function()
	{
		$(this).each(function(){
			var archives = $(this);
			var year = $('#archives-active-year');
			var months = $('div.months div.year-months', archives);
			var arrows = $('a.up, a.down', archives);
			var activeMonth;
			var current, active;
			var animated = false;
			if (months.length == 1) {
				arrows.remove();
				activeMonth = months.filter(':first').addClass('year-active').show();
				year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
				return;
			}
			arrows.click(function(e){
				e.preventDefault();
				if (animated) {
					return;
				}
				var fn = $(this);
				animated = true;
				arrows.css('visibility', 'visible');
				var current = months.filter('.year-active');
				if (fn.hasClass('up')) {
					active = current.prev();
					if (!active.length) {
						active = months.filter(':last');
					}
				} else {
					active = current.next();
					if (!active.length) {
						active = months.filter(':first');
					}
				}
				current.removeClass('year-active').fadeOut(150, function(){
					active.addClass('year-active').fadeIn(150, function(){
						animated = false;
					});
					year.text(active.attr('id').replace(/[^0-9]*/, ''));

					if (fn.hasClass('up')) {
						if (!active.prev().length) {
							arrows.filter('.up').css('visibility', 'hidden');
						}
					} else {
						if (!active.next().length) {
							arrows.filter('.down').css('visibility', 'hidden');
						}
					}
				});
			});
			activeMonth = months.filter(':first').addClass('year-active').show();
			year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
			arrows.filter('.up').css('visibility', 'hidden');
		});
	}
	$('#archives .ale-archives').init_archives();






});

// HTML5 Fallbacks for older browsers
jQuery(function($) {
	// check placeholder browser support
	if (!Modernizr.input.placeholder) {
		// set placeholder values
		$(this).find('[placeholder]').each(function() {
			$(this).val( $(this).attr('placeholder') );
		});

		// focus and blur of placeholders
		$('[placeholder]').focus(function() {
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).val('');
				$(this).removeClass('placeholder');
			}
		}).blur(function() {
				if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
					$(this).val($(this).attr('placeholder'));
					$(this).addClass('placeholder');
				}
			});

		// remove placeholders on submit
		$('[placeholder]').closest('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				if ($(this).val() == $(this).attr('placeholder')) {
					$(this).val('');
				}
			});
		});
	}
});

