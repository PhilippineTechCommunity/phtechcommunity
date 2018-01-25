( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			console.log(to);
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	wp.customize( 'cactus[header_full_width]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' )
				$( '.cactus-header' ).addClass( 'fullwidth' );
			else
				$( '.cactus-header' ).removeClass( 'fullwidth' );
		} );
	} );
	
	wp.customize( 'cactus[display_topbar]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.cactus-top-bar' ).removeClass( 'hide' );
			}
			else{
				$( '.cactus-top-bar' ).addClass( 'hide' );
			}
		} );
	} );
	
	wp.customize( 'cactus[display_footer_widgets]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.footer-widget-area' ).removeClass( 'hide' );
			}
			else{
				$( '.footer-widget-area' ).addClass( 'hide' );
			}
		} );
	} );
	
	wp.customize( 'cactus[display_scroll_to_top]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.back-to-top' ).removeClass( 'hide' );
			}
			else{
				$( '.back-to-top' ).addClass( 'hide' );
			}
		} );
	} );
	
	wp.customize( 'cactus[fullwidth_custom]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.fullwidth_custom_selective' ).removeClass( 'cactus-container' ).addClass('cactus-container-fullwidth');
			}
			else{
				$( '.fullwidth_custom_selective' ).addClass( 'cactus-container' ).removeClass('cactus-container-fullwidth');
			}
		} );
	} );
	
	
	
	wp.customize( 'cactus[display_footer_icons]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.cactus-footer-sns' ).removeClass( 'hide' );
			}
			else{
				$( '.cactus-footer-sns' ).addClass( 'hide' );
			}
		} );
	} );
	
	wp.customize( 'cactus[display_custom_main_menu]', function( value ) {
		value.bind( function( to ) {
			if( to == '1' ){
				$( '.cactus-wp-menu' ).addClass( 'hide' );
				$( '.frontpage_menu_left_selective' ).removeClass( 'hide' );
				$( '.frontpage_menu_selective' ).removeClass( 'hide' );
			}
			else{
				$( '.cactus-wp-menu' ).removeClass( 'hide' );
				$( '.frontpage_menu_left_selective' ).addClass( 'hide' );
				$( '.frontpage_menu_selective' ).addClass( 'hide' );
			}
		} );
	} );
	
	wp.customize( 'cactus[inline_header_menu_position]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-header' ).removeClass('left right center justify').addClass( to );
		} );
	} );
	
	wp.customize( 'cactus[header_menu_hover_style]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-main-nav' ).removeClass('hoverline-fromcenter hoveroutline hoverbg').addClass( to );
		} );
	} );
	
	wp.customize( 'cactus[transparent_header]', function( value ) {
		value.bind( function( to ) {
			if(to=='1')
				$( '.page-template-template-sections .cactus-header' ).addClass( 'transparent' );
			else
				$( '.page-template-template-sections .cactus-header' ).removeClass( 'transparent' );
		} );
	} );
	
	wp.customize( 'cactus[header_color_scheme]', function( value ) {
		value.bind( function( to ) {
			if(to=='text-light')
				$( '.page-template-template-sections .cactus-header' ).addClass( 'text-light' );
			else
				$( '.page-template-template-sections .cactus-header' ).removeClass( 'text-light' );
		} );
	} );
	
	wp.customize( 'cactus[classic_header_menu_position]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-header' ).removeClass('left center justify').addClass( to );
		} );
	} );
	
	wp.customize( 'cactus[classic_header_logo_position]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-header' ).removeClass('logoleft logocenter').addClass( 'logo'+to );
		} );
	} );
	
	wp.customize( 'cactus[split_header_menu_position]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-header' ).removeClass('justify inside outside').addClass( to );
		} );
	} );
	
	$.each(cactus_customizer.sections,function(index,key){
		
		 wp.customize( 'cactus[section_hide_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  if(to=='1')
				 		$( '.cactus-section-'+key).addClass('hide');
					else
						$( '.cactus-section-'+key).removeClass('hide');
			  } );
		  } );
		  
		  wp.customize( 'cactus[section_title_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.section_title_'+key+'_selective' ).text( to );
			  } );
		  } );
		  
		  wp.customize( 'cactus[section_subtitle_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.section_subtitle_'+key+'_selective' ).text( to );
			  } );
		  } );
		  
		  wp.customize( 'cactus[font_color_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  
				  if( to =='1' ){$( '.cactus-section-'+key+'').addClass('cactus-text-light');}else{$( '.cactus-section-'+key+'').removeClass('cactus-text-light');}
			  } );
		  } );
		  
		  wp.customize( 'cactus[background_color_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.cactus-section-'+key+'').css( {'background-color':to} );
			  } );
		  } );
		  
		  wp.customize( 'cactus[background_image_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.cactus-section-'+key+'').css( {'background-image':'url('+to+')'} );
			  } );
		  } );	
		  
		  wp.customize( 'cactus[background_parallax_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  if(to=='1'){
					  	$( '.cactus-section-'+key+'').removeClass( 'parallax-destroy' );
					  	$( '.cactus-section-'+key+'').addClass( 'cactus-parallax' );
				  		$('.cactus-parallax').parallax("50%", 0.1);
				  	}
					else{
						$( '.cactus-section-'+key+'').removeClass( 'cactus-parallax' );
						$( '.cactus-section-'+key+'').addClass( 'parallax-destroy' );
					}
				  
			  } );
		  } );
		  
		   wp.customize( 'cactus[section_padding_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.cactus-section-'+key+' .cactus-section-content').css( {'padding':to });
			  } );
		  } );
		  
		  wp.customize( 'cactus[section_id_'+key+']', function( value ) {
			  value.bind( function( to ) {
				  $( '.cactus-section-'+key+'').attr( 'id',to );
			  } );
		  } );

	});
	
	wp.customize( 'cactus[sticky_header]', function( value ) {
		value.bind( function( to ) {
			if(to=='1'){
				$('.cactus-fixed-header-wrap').removeClass('hide');
				}else{
					$('.cactus-fixed-header-wrap').addClass('hide');
					}
			} );
	} );
	
	wp.customize( 'cactus[columns_service]', function( value ) {
		value.bind( function( to ) {
		$( '.service_selective' ).attr('class',
           function(i, c){
              return c.replace(/(^|\s)cactus-list-md-\S+/g, '');
           }).addClass('cactus-list-md-'+to);
				
		} );
	} );
	
	wp.customize( 'cactus[style_service]', function( value ) {
		value.bind( function( to ) {
		$( '.service_selective' ).attr('class',
           function(i, c){
              return c.replace(/(^|\s)style\S+/g, '');
           }).addClass('style'+to);
				
		} );
	} );
	
	wp.customize( 'cactus[style_works]', function( value ) {
		value.bind( function( to ) {
			if( to == '2' ){
				$( '.works_container_selective' ).addClass('cactus-container').removeClass('cactus-container-fullwidth');
				$( '.works_selective .cactus-portfolio-list' ).removeClass('full');
			}else{
				$( '.works_selective .cactus-portfolio-list' ).addClass('full');
				$( '.works_container_selective' ).addClass('cactus-container-fullwidth').removeClass('cactus-container');
			}	
		});
	} );
	
	wp.customize( 'cactus[blog_list_style]', function( value ) {
		value.bind( function( to ) {
			switch(to){
				case '1':
					$( '.blog-list-wrap' ).removeClass('blog-aside-image blog-grid');
					$('.blog-list-wrap').isotope('destroy');
				break;
				case '2':
					$( '.blog-list-wrap' ).removeClass('blog-aside-image blog-grid').addClass('blog-aside-image');
					$('.blog-list-wrap').isotope('destroy');
				break;
				case '3':
					$( '.blog-list-wrap' ).removeClass('blog-aside-image blog-grid').addClass('blog-grid');
					if( cactus_params.isotope == '1' ){
						  var $container = $('.blog-list-wrap').imagesLoaded( function() {
							  $container.isotope({
								  itemSelector: '.entry-box-wrap',
								  //layoutMode: 'fitRows'
							  });
						  });
					  }
				break;
				
				}
					
			} );
	} );
	
	
	wp.customize( 'cactus[text_align_banner]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-section-banner .cactus-container' ).css({'text-align':to});
		} );
	} );
	
	wp.customize( 'cactus[separator_color_banner]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-section-banner .cactus-section-separator' ).css({'color':to});
		} );
	} );
	
	wp.customize( 'cactus[separator_height_banner]', function( value ) {
		value.bind( function( to ) {
				$( '.cactus-section-banner .cactus-section-separator' ).css({'height':parseInt(to)+'px'});
		} );
	} );
	
	$(document).on('click','.customize-partial-edit-shortcut-banner_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[banner]' );
		});

	$(document).on('click','.customize-partial-edit-shortcut-section_service_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[service]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-topbar_left_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[topbar_left]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-topbar_icons_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[topbar_icons]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-topbar_right_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[topbar_right]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-works_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[works]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-team_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[team]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-counter_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[counter]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-testimonial_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[testimonial]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-clients_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[clients]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-blog_selective',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[news_columns_news]' );
		});
	$(document).on('click','.customize-partial-edit-shortcut-footer-info-area',function(){
		wp.customize.preview.send( 'focus-control-for-setting', 'cactus[footer_icons]' );
		});	
		
	
	wp.customize( 'cactus[style_promo]', function( value ) {
		value.bind( function( to ) {
			if( to == '2' ){
				$( '.cactus-section-promo .cactus-box.right' ).removeClass('hide');
				$( '.cactus-section-promo .cactus-box.left' ).addClass('hide');
			}else{
				$( '.cactus-section-promo .cactus-box.right' ).addClass('hide');
				$( '.cactus-section-promo .cactus-box.left' ).removeClass('hide');
			}
					
			} );
	} );
	
	wp.customize( 'cactus[style_contact]', function( value ) {
		value.bind( function( to ) {
			if( to == '2' ){
				$( '.cactus-section-contact .cactus-box.right' ).removeClass('hide');
				$( '.cactus-section-contact .cactus-box.left' ).addClass('hide');
			}else{
				$( '.cactus-section-contact .cactus-box.right' ).addClass('hide');
				$( '.cactus-section-contact .cactus-box.left' ).removeClass('hide');
			}
					
		} );
	} );
	
	
	wp.customize( 'cactus[style_team]', function( value ) {
		value.bind( function( to ) {
			if( to == '2' ){
				$( '.team_container_selective' ).addClass('cactus-container').removeClass('cactus-container-fullwidth');
				$( '.team_selective' ).removeClass('full');
			}else{
				$( '.team_selective' ).addClass('full');
				$( '.team_container_selective' ).addClass('cactus-container-fullwidth').removeClass('cactus-container');
			}

			} );
	} );
	
	wp.customize( 'cactus[image_promo]', function( value ) {
		value.bind( function( to ) {
			$( '.image_promo_selective img' ).attr( 'src', to );
		} );
	} );
	
	wp.customize( 'cactus[image_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.image_contact_selective img' ).attr( 'src', to );
		} );
	} );
	
	wp.customize( 'cactus[button_text_news]', function( value ) {
		value.bind( function( to ) {
			$( '.button_text_news_selective' ).html( to );
		} );
	} );
	
	wp.customize( 'cactus[button_link_news]', function( value ) {
		value.bind( function( to ) {
			$( '.button_text_news_selective' ).parent( 'a' ).attr('href',to);
		} );
	} );
	
	wp.customize( 'cactus[button_link_call_to_action]', function( value ) {
		value.bind( function( to ) {
			$( '.button_text_call_to_action_selective' ).parent( 'a' ).attr('href',to);
		} );
	} );
	
	wp.customize( 'cactus[button_target_call_to_action]', function( value ) {
		value.bind( function( to ) {
			$( '.button_text_call_to_action_selective' ).parent( 'a' ).attr('target',to);
		} );
	} );
	
	wp.customize( 'cactus[section_title_font_size]', function( value ) {
		value.bind( function( to ) {
			$( '.cactus-section .cactus-section-title' ).css({'font-size':to+'px'});
		} );
	} );
	
	wp.customize( 'cactus[section_subtitle_font_size]', function( value ) {
		value.bind( function( to ) {
			$( '.cactus-section .cactus-section-desc' ).css({'font-size':to+'px'});
		} );
	} );
	wp.customize( 'cactus[section_item_title_font_size]', function( value ) {
		value.bind( function( to ) {
			$( '.cactus-section h4' ).css({'font-size':to+'px'});
		} );
	} );
	wp.customize( 'cactus[section_content_font_size]', function( value ) {
		value.bind( function( to ) {
			$( '.cactus-section, .cactus-section p, .cactus-section div' ).css({'font-size':to+'px'});
		} );
	} );
	
	
	wp.customize( 'cactus[footer_style]', function( value ) {
		value.bind( function( to ) {
			if( to == '2' ){
				$( '.footer-info-area.style2' ).removeClass('hide');
				$( '.footer-info-area.style1' ).addClass('hide');
			}else{
				$( '.footer-info-area.style2' ).addClass('hide');
				$( '.footer-info-area.style1' ).removeClass('hide');
			}
					
			} );
	} );


} )( jQuery );
