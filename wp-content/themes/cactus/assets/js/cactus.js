jQuery(document).ready(function($) {

    $(".site-nav-toggle").click(function() {
        $(".cactus-main-nav").toggle();
    });
	
	$(".cactus-menu-toggle").click(function() {
        $(".cactus-mobile-drawer-header").toggle();
    });
	
	$(".cactus-wp-menu li").mouseenter(function(){
  		$(this).addClass("menu-item-hovered");
	});
	$(".cactus-wp-menu li").mouseleave(function(){
  		$(this).removeClass("menu-item-hovered");
	});
	

    var stickyTop = function() {

        var stickyTop;
        if ($("body.admin-bar").length) {

            if ($(window).width() < 765) {
                stickyTop = 46;
            } else {
                stickyTop = 32;
            }
        } else {
            stickyTop = 0;
        }

        return stickyTop;
    }

    $('.page_item_has_children').addClass('menu-item-has-children');
	
	var page_min_height = $(window).height() - $('.site-footer').outerHeight()- stickyTop();
	
	if($('.header-wrap').length)
		page_min_height = page_min_height - $('.header-wrap').outerHeight();
		
	if($('.page-title-bar').length)
		page_min_height = page_min_height - $('.page-title-bar').outerHeight();
		
	$('.page-wrap').css({'min-height':page_min_height});
	
	function onScroll(event){
    var scrollPos = $(document).scrollTop()+$(".cactus-header").height();
	
	$('.cactus-nav-main a[href^="#"]').each(function () {
        var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		if(refElement.length){
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.cactus-nav-main li').removeClass("active");
            currLink.parent('li').addClass("active");
        }else{
            currLink.parent('li').removeClass("active");
        }
		}
    });
	
	$('.cactus-nav-left a[href^="#"]').each(function () {
        var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		if(refElement.length){
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.cactus-nav-left li').removeClass("active");
            currLink.parent('li').addClass("active");
        }else{
            currLink.parent('li').removeClass("active");
        }
		}
    });

	}


    function cactusFxdHeader() {
        var stickyHeight = stickyTop();

        var headerPosition = $(document).scrollTop();
		
		if(headerPosition>400)
			$('#back-to-top, .back-to-top').fadeIn();
		else
			$('#back-to-top, .back-to-top').fadeOut();

        var headerHeight = $(".cactus-header").height();
        if (headerPosition < headerHeight) $(".cactus-fixed-header-wrap").hide();
        else $(".cactus-fixed-header-wrap").show().css({ 'top': stickyHeight });
    }
    $(window).scroll(function() {
        cactusFxdHeader();
		onScroll();
    })
	
	// hide animation items
	  if($().waypoint && $(window).width() > 919 ) {
		  jQuery('.cactus-animation').each(function(){
			  if($(this).data('imageanimation')==="yes"){
				  $(this).find("img,i.fa").css("visibility","hidden");
			  }else{
				  $(this).css("visibility","hidden");
			  }
		  });
	  }
	// home page animation
	var cactus_animation = function (e){
	
		e.css({'visibility':'visible'});
		e.find("img,i.fa").css({'visibility':'visible'});
	
		// this code is executed for each appeared element
		var animation_type       = e.data('animationtype');
		var animation_duration   = e.data('animationduration');
		var image_animation      = e.data('imageanimation');
		if(image_animation === "yes"){
							 
		e.find("img,i.fa").addClass("animated "+animation_type);
	
		if(animation_duration) {
			e.find("img,i.fa").css('-moz-animation-duration', animation_duration+'s');
			e.find("img,i.fa").css('-webkit-animation-duration', animation_duration+'s');
			e.find("img,i.fa").css('-ms-animation-duration', animation_duration+'s');
			e.find("img,i.fa").css('-o-animation-duration', animation_duration+'s');
			e.find("img,i.fa").css('animation-duration', animation_duration+'s');
			}
	
		}else{
			e.addClass("animated "+animation_type);
	
			if(animation_duration) {
				e.css('-moz-animation-duration', animation_duration+'s');
				e.css('-webkit-animation-duration', animation_duration+'s');
				e.css('-ms-animation-duration', animation_duration+'s');
				e.css('-o-animation-duration', animation_duration+'s');
				e.css('animation-duration', animation_duration+'s');
				}
			}
		}
		
		$('.cactus-animation').each(function(index, element) {
			var el = $(this);
			el.waypoint(function() {cactus_animation(el);},{ triggerOnce: true, offset: '90%' });
		});

    /* smooth scroll*/
    $(document).on('click', "a.scroll,.site-nav a[href^='#'],.cactus-main-nav a[href^='#']", function(e) {

        var selectorHeight = 0;
        if (!$('.fxd-header').length)
            selectorHeight = $('.cactus-main-header').outerHeight();
        else
            selectorHeight = $('.fxd-header').outerHeight();

        e.preventDefault();
        var id = $(this).attr('href');

        if (typeof $(id).offset() !== 'undefined') {
            var goTo = $(id).offset().top - selectorHeight - stickyTop() + 1;
            $("html, body").animate({ scrollTop: goTo }, 500);
        }
    });

    $('.comment-form #submit').addClass('btn-normal');
    $('.comment-reply-link').addClass('pull-right btn-reply');

    $('#back-to-top, .back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, '800');
        return false;
    });

    if ($(window).width() < 920) {
        $('li.menu-item-has-children').prepend('<div class="menu-expand"></div>');
    } else {
        $('.site-nav .menu-expand').remove();
    }

    $(window).resize(function() {

        if ($(window).width() < 920) {
            $('li.menu-item-has-children').prepend('<div class="menu-expand"></div>');
        } else {
            $('.site-nav .menu-expand').remove();
        }

    });

    $(document).on('click', '.site-nav .menu-expand,.cactus-main-nav .menu-expand', function() {
        $(this).siblings('ul').slideToggle();
    });

    $(".top-carousel").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
	/*counter up*/
	if($('.counter').length)
		$('.counter').counterUp({delay: 10, time: 3500});
	/*testimonials*/
    $(".cactus-testimonials-carousel").owlCarousel({
        items: 1,
        nav: true
    });
	/*clients*/
    $(".cactus-clients-carousel").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2
            },
            700: {
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            }
        },
        dots: true
    });
	/*slider*/
    $(".cactus-slider").owlCarousel({
        items: 1,
        onRefreshed: adjustStretchHeader,
		nav: true,
		dots: true
    });

    function adjustStretchHeader() {
        var slideHeight = [];
        var sliderHeight = 0;
        $('.banner_selective .cactus-slider-item').each(function(index, element) {
            if ($(this).height() > 0)
                slideHeight[index] = $(this).height();

        });
        if (slideHeight.length > 0)
            sliderHeight = Math.min.apply(null, slideHeight);
        if (sliderHeight > 0)
            $('.banner_selective .cactus-slider-item').css({ 'height': sliderHeight });
    }

    /* counter Up */
    if (typeof(counterUp) == 'function') {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }

    /* prettyPhoto */
    $("a[rel^='prettyPhoto']").prettyPhoto();
    /* section background parallax */
    $('.cactus-parallax').parallax("50%", 0.1);

    $('button.single_add_to_cart_button').prepend('<i class="fa fa-shopping-cart"></i> ');
    $('body.admin-bar').addClass('cactus-adminbar');
    /*blog grid*/
    if (cactus_params.isotope == '1') {
        var $container = $('.blog-list-wrap').imagesLoaded(function() {
            $container.isotope({
                itemSelector: '.entry-box-wrap',
                //layoutMode: 'fitRows'
            });
        });
    }
    /*video background*/
    function cactus_bg_video_type(video_url) {

        if (/youtube.com/.test(video_url)) {
            return "youtube";
        } else if (/vimeo.com/.test(video_url)) {
            return "vimeo"
        }
    }

    function cactus_bg_video(video_url) {
		
        $(".banner_video_background").height($(window).height()).show();
        var video_type = cactus_bg_video_type(video_url);
        if (video_type === 'youtube') {
            jQuery(".banner_video_background").YTPlayer({ autoPlay: true });
			jQuery('.banner_video_background').on("YTPStart",function(e){
				$(".banner_video_background").css({'background-image':'none'});
			});
        } else if (video_type === 'vimeo') {
            jQuery(".banner_video_background").vimeo_player({ autoPlay: true });
			jQuery('.banner_video_background').on("VPStart",function(e){
				$(".banner_video_background").css({'background-image':'none'});
			});
        }
        $(".banner_video_background").height($(window).height()).show();
		
		
    }
    if (cactus_params.video_background == '1') {

        var property = $('.banner_video_background').data("property") && typeof $('.banner_video_background').data("property") == "string" ? eval('(' + $('.banner_video_background').data("property") + ')') :
            $('.banner_video_background').data("property");

        video_url = property.videoURL;
        cactus_bg_video(video_url);
    }


});