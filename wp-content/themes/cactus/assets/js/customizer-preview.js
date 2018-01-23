var cactus_customizer_sections = function ( $ ) {
    'use strict';
    $( function () {
        var customize = wp.customize;

        customize.preview.bind( 'clicked-customizer-section', function( data ) {
			data = data.replace('sub-accordion-section-section-','');
            var sectionId = '';
            switch (data) {
				case 'banner':
                    sectionId = 'div.cactus-section-banner';
                    break;
                case 'works':
                    sectionId = 'div.cactus-section-works';
                    break;
                case 'service':
                    sectionId = 'div.cactus-section-service';
                    break;
                case 'promo':
                    sectionId = 'div.cactus-section-promo';
                    break;
                case 'team':
                    sectionId = 'div.cactus-section-team';
                    break;
                case 'counter':
                    sectionId = 'div.cactus-section-counter';
                    break;
				case 'testimonial':
                    sectionId = 'div.cactus-section-testimonial';
                    break;
				case 'news':
                    sectionId = 'div.cactus-section-news';
                    break;
				case 'contact':
                    sectionId = 'div.cactus-section-contact';
                    break;
                default:
                    sectionId = 'div.cactus-section-' + data;
                    break;
            }
            if ( $(sectionId).length > 0) {
                $('html, body').animate({
                    scrollTop: $(sectionId).offset().top - 100
                }, 1000);
            }
        } );
		
		customize.preview.bind( 'clicked-customizer-footer', function( data ) {
			 $('html, body').animate({
                    scrollTop: $(data).offset().top - 100
                }, 1000);
			 } );
		customize.preview.bind( 'clicked-customizer-title_tagline', function( data ) {
			 $('html, body').animate({
                    scrollTop: $(data).offset().top - 100
                }, 1000);
			 } );
		
		customize.preview.bind( 'clicked-customizer-frontpage_menu', function( data ) {
			 $('html, body').animate({
                    scrollTop: $(data).offset().top
                }, 1000);
			 } );
		
		
		customize.preview.bind( 'topbar_left', function( data ) {
			 $( '.topbar_left_selective' ).html( data );
			 $('.topbar_left_selective').prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_left_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'topbar_icons', function( data ) {
			 $( '.topbar_icons_selective' ).html( data );
			 $('.topbar_icons_selective').prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_icons_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'topbar_right', function( data ) {
			 $( '.topbar_right_selective' ).html( data );
			 $('.topbar_right_selective' ).prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_right_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		
		customize.preview.bind( 'logo_right', function( data ) {
			 $( '.logo_right_selective' ).html( data );
		} );
		
		customize.preview.bind( 'classic_header_logo_left', function( data ) {
			 $( '.classic_header_logo_left_selective' ).html( data );
		} );
		
		customize.preview.bind( 'classic_header_logo_right', function( data ) {
			 $( '.classic_header_logo_right_selective' ).html( data );
		} );
		
		customize.preview.bind( 'frontpage_menu_selective', function( data ) {
			 $( '.frontpage_menu_selective ul.menu,.frontpage_menu_selective ul.cactus-main-nav' ).html( data );
		} );
		
		customize.preview.bind( 'split_header_left_menu_selective', function( data ) {
			 $( '.split_header_left_menu_selective ul.menu,.split_header_left_menu_selective ul.cactus-main-nav' ).html( data );
		} );
		
		customize.preview.bind( 'sticky_header_background_color', function( data ) {
			 $( 'header .cactus-fixed-header-wrap,header .cactus-fixed-header-wrap .cactus-header' ).css('background-color',data);
		} );
		
		customize.preview.bind( 'banner_selective', function( data ) {
			
			 $( '.banner_slider' ).html( data ).addClass('cactus-slider owl-carousel');
			 $( '.cactus-slider' ).trigger('destroy.owl.carousel');
			
			 var $owl = $( '.cactus-slider' );
			  $owl.owlCarousel({items: 1,onRefreshed: adjustStretchHeader });
				
		} );
		
		customize.preview.bind( 'button_text_banner_selective', function( data ) {
			
			 if(data === '')
			 	$('.button_text_banner_selective').hide();
			else
				$('.button_text_banner_selective').show();
				
		} );
		
		customize.preview.bind( 'button_link_banner_selective', function( data ) {
			 $('.button_link_banner_selective').attr('href', data);
				
		} );
		customize.preview.bind( 'button_link_promo_selective', function( data ) {
			 $('.button_link_promo_selective').attr('href', data);
				
		} );
		
		customize.preview.bind( 'button_link_news_selective', function( data ) {
			 $('.button_link_news_selective').attr('href', data);
				
		} );
		
		customize.preview.bind( 'button_text_shop_selective', function( data ) {
			
			 if(data === '')
			 	$('.button_text_shop_selective').hide();
			else
				$('.button_text_shop_selective').show();
				
		} );
		
		customize.preview.bind( 'button_link_shop_selective', function( data ) {
			 $('.button_link_shop_selective').attr('href', data);
				
		} );
		customize.preview.bind( 'button_link_call_to_action_selective', function( data ) {
			 $('.button_link_call_to_action_selective').attr('href', data);
				
		} );
		
		
		
		function adjustStretchHeader () {
			var slideHeight = [];
			var sliderHeight = 0;
    		$('.banner_selective .cactus-slider-item').each(function(index, element) {
                slideHeight[index] = $(this).height();
				
            });
			if(slideHeight.length>0)
				sliderHeight = Math.min.apply(null, slideHeight);
			if(sliderHeight>0)
				$( '.banner_selective .cactus-slider-item' ).css({'height':sliderHeight});
		}

		customize.preview.bind( 'remove_banner_image', function( data ) {
			var slideHeight = [];
			var sliderHeight = 0;
			$('.banner_selective .cactus-slider-item').each(function(index, element) {
                slideHeight[index] = $(this).height();
            });
			
			if(slideHeight.length>0)
				sliderHeight = Math.min.apply(null, slideHeight);
				
			 $( '.banner_selective .cactus-slider-item:eq('+data+')' ).find('img').attr('src', '' ).css({'max-width':'100%'});
			 if(sliderHeight>0)
			 	$( '.banner_selective .cactus-slider-item:eq('+data+')' ).css({'height':sliderHeight});
		} );
		
		
		customize.preview.bind( 'banner_video_customize', function( data ) {

			 var video_url = data.video_url;
			 
				 if( data.type == '1' ){
					$( '.cactus-section-banner .banner_slider,.cactus-section-banner .owl-stage-outer' ).removeClass('hide');
					
					$( '.cactus-section-banner .banner_video_background' ).addClass('hide');
					var slideHeight = [];
					var sliderHeight = 0;
					$('.banner_slider .cactus-slider-item').each(function(index, element) {
						if($(this).height()>0)
							slideHeight[index] = $(this).height();
					});
		
					if(slideHeight.length>0)
						sliderHeight = Math.min.apply(null, slideHeight);
					if(sliderHeight>0){
						$( '.banner_slider .cactus-slider-item' ).css({'height':sliderHeight});
						$( '.cactus-section-banner' ).css({'height':sliderHeight});
					}

				}else{
					
					$( '.cactus-section-banner .banner_slider,.cactus-section-banner .owl-stage-outer' ).addClass('hide');
					$( '.cactus-section-banner .banner_video_background' ).removeClass('hide').show();
					$( '.cactus-section-banner' ).css({'height':$(window).height()});
					$( '.cactus-section-banner .banner_video_background .cactus-slider-item' ).css({'height':$(window).height()});
					
				}
				
				var bgvideo = $('.banner_video_background');
				
				if( data.type == '1' ){
				
				if (/youtube.com/.test(video_url)){
					//bgvideo.on("YTPReady",function(e){
						bgvideo.YTPStop();
					//});
				  
				} else if (/vimeo.com/.test(video_url)) {
				//	bgvideo.on("VPReady",function(e){
					   bgvideo.v_pause();
				//	});
				}				
			}else{
				
				if (/youtube.com/.test(video_url)){
				 	bgvideo.YTPlayer({ autoPlay: true });
					bgvideo.YTPPlay();
					jQuery('.banner_video_background').on("YTPStart",function(e){
						$(".banner_video_background").css({'background-image':'none'});
					});
				} else if (/vimeo.com/.test(video_url)) {
				  	bgvideo.vimeo_player({ autoPlay: true });
					bgvideo.v_play();
					jQuery('.banner_video_background').on("VPStart",function(e){
						$(".banner_video_background").css({'background-image':'none'});
					});
				}
				$( '.cactus-section-banner .banner_video_background' ).removeClass('hide').show();
			}
			
		} );
		
		customize.preview.bind( 'banner_video_url_customize', function( data ) {
			var bgvideo = $('.banner_video_background');
			console.log(data);
			if (/youtube.com/.test(data)){
				bgvideo.YTPChangeMovie({videoURL:data,startAt:0});
			} else if (/vimeo.com/.test(data)) {
				bgvideo.v_change_movie({videoURL:videoURL,startAt:0});
			}	
		} );
		
		customize.preview.bind( 'service_selective', function( data ) {
			 $( '.service_selective' ).html( data );
			 $('.service_selective').prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-section_service_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'remove_service_image', function( data ) {
			 $( '.service_selective >li:eq('+data+')' ).find('img').attr('src', '' );
		} );
		
		customize.preview.bind( 'works_selective', function( data ) {
	
			 $( '.works_selective' ).html( data.html );
	
		 	 var containerEl = document.querySelector('#'+data.id);
    		 var mixer = mixitup(containerEl);
			 $('.cactus-portfolio-filter').on( 'click', 'a', function() {
				$(this).parents('.cactus-portfolio-filter').find('li').removeClass('active');
				$(this).parent('li').addClass('active');
			});
			
			 $('.works_selective').prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-works_selective"><button  style="left:30px; top:100px;" aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');

		} );
		
		customize.preview.bind( 'columns_works', function( data ) {

			$( '.works_selective .cactus-portfolio-list' ).attr('class',
			function(i, c){
              return c.replace(/(^|\s)cactus-list-md-\S+/g, '');
			}).addClass('cactus-list-md-'+data);
		} );
		
		customize.preview.bind( 'columns_team', function( data ) {

			$( '.team_container_selective .cactus-team' ).attr('class',
			function(i, c){
              return c.replace(/(^|\s)cactus-list-md-\S+/g, '');
			}).addClass('cactus-list-md-'+data);
		   

		} );
		
		customize.preview.bind( 'remove_works_image', function( data ) {
			 $( '.works_selective #cactus-works-'+data+'' ).find('img').attr('src', '' );
		} );
		
		customize.preview.bind( 'team_selective', function( data ) {
			 $( '.team_selective' ).html( data );
			 $('.team_selective' ).prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-team_selective"><button style="left:30px; top:100px;" aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'remove_team_image', function( data ) {
			 $( '.team_selective >li:eq('+data+')' ).find('img').attr('src', '' );
		} );
		
		customize.preview.bind( 'counter_selective', function( data ) {
			 $( '.counter_selective' ).html( data );
			 $('.counter_selective' ).prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-counter_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'testimonial_selective', function( data ) {
			 $( '.testimonial_selective' ).html( data );
			 $('.cactus-testimonials-carousel').trigger('destroy.owl.carousel');
			 $('.cactus-testimonials-carousel').owlCarousel({items: 1,nav: true });
			 $('.testimonial_selective' ).prepend('<span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-testimonial_selective"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>');
		} );
		
		customize.preview.bind( 'clients_selective', function( data ) {
			 $( '.clients_selective' ).html( data );
			 $( '.cactus-clients-carousel' ).trigger('destroy.owl.carousel');
			 $( '.cactus-clients-carousel' ).owlCarousel({
				  responsive:{
					  0:{
						  items:1
					  },
					  400:{
						  items:2
					  },
					  700:{
						  items:3
					  },
					  1000:{
						  items:4
					  },
					  1200:{
						  items:5
					  }
				  },
				  dots: true
			  });
			  
			  
		} );
		customize.preview.bind( 'remove_clients_image', function( data ) {
			 $( '.clients_selective .cactus-client-item:eq('+data+')' ).find('img').attr('src', '' );
		} );
		
		customize.preview.bind( 'footer_icons_selective', function( data ) {
			 $( '.footer_icons_selective' ).html( data );
		} );
		
		
    } );
};

cactus_customizer_sections( jQuery );