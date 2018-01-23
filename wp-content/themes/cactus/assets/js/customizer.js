jQuery(document).ready(function($) {
    'use strict';

    var customize = wp.customize;

    /*header style switch*/
    function header_style_switch(header_style) {

        $('#sub-accordion-section-section-navigation-bar > li[id^="customize-control-cactus-inline_header"').hide();
        $('#sub-accordion-section-section-navigation-bar > li[id^="customize-control-cactus-classic_header"').hide();
        $('#sub-accordion-section-section-navigation-bar > li[id^="customize-control-cactus-split_header"').hide();
        $('#sub-accordion-section-section-navigation-bar > li[id^="customize-control-cactus-' + header_style + '_header"').show();
    }
    var header_style = $('#customize-control-cactus-header_style input[type="radio"]:checked').val();
    header_style_switch(header_style);

    wp.customize('cactus[header_style]', function(value) {
        value.bind(function(to) {

            header_style_switch(to);

        });
    });

    /*banner type switch*/
    function banner_type_switch(type_banner) {

        if (type_banner === '2') {
            $('#customize-control-cactus-banner').hide();
            $('#customize-control-cactus-video_banner').show();
            $('#customize-control-cactus-video_title_banner').show();
            $('#customize-control-cactus-video_subtitle_banner').show();
            $('#customize-control-cactus-button_text_banner').show();
            $('#customize-control-cactus-button_link_banner').show();
			$('#customize-control-cactus-video_poster_banner').show();

        } else {

            $('#customize-control-cactus-banner').show();
            $('#customize-control-cactus-video_banner').hide();
            $('#customize-control-cactus-video_title_banner').hide();
            $('#customize-control-cactus-video_subtitle_banner').hide();
            $('#customize-control-cactus-button_text_banner').hide();
            $('#customize-control-cactus-button_link_banner').hide();
			$('#customize-control-cactus-video_poster_banner').hide();

        }
    }

    var type_banner = $('#customize-control-cactus-type_banner select').val();
    banner_type_switch(type_banner);
	
    wp.customize('cactus[type_banner]', function(value) {
        value.bind(function(to) {

            var video_url = $('#customize-control-cactus-video_banner input').val();
            customize.previewer.send('banner_video_customize', { video_url: video_url, type: to });
            banner_type_switch(to);

        });
    });

    wp.customize('cactus[video_banner]', function(value) {
        value.bind(function(to) {
            customize.previewer.send('banner_video_url_customize', to);

        });
    });

	/*icon type switch*/
    function icon_type_switch(icon_type,row) {
		if(!row.length)
			return false;
        if (icon_type === 'icon') {
			row.find('.repeater-field-image').hide();
			row.find('.repeater-field-iconpicker').show();
        } else {
			row.find('.repeater-field-image').show();
			row.find('.repeater-field-iconpicker').hide();

        }
    }
	$('select[data-field="icon_type"]').each(function(index, element) {
        var icon_type = $(this).val();
		var row = $(this).parents('li.repeater-row');
		icon_type_switch(icon_type,row);
    });
	$(document).on('change', 'select[data-field="icon_type"]', function(){
		var icon_type = $(this).val();
		var row = $(this).parents('li.repeater-row');
		icon_type_switch(icon_type,row);
    });
	
	$(document).on('click', 'button.repeater-add', function(){
		var newRow = $(this).parent('.customize-control-repeater').find('li.repeater-row:last'); 
		setTimeout(function(){
			var icon_type = newRow.find('select[data-field="icon_type"]').val();
			if(icon_type !== 'undefined'){
				icon_type_switch(icon_type,newRow);
			}
		 }, 100);
			
	 });
	
    /*Top Bar Left tpl*/
    function cactus_topbar_left_tpl() {

        var html = '';
        $('#customize-control-cactus-topbar_left .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var text = $(this).find('input[data-field="text"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<span class="cactus-microwidget"><a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + text + '</a></span>';

        });
        customize.previewer.send('topbar_left', html);

    }

    wp.customize('cactus[topbar_left]', function(value) {
        value.bind(function(to) {
            cactus_topbar_left_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-topbar_left .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_topbar_left_tpl();
    });

    /*Top Bar Icons tpl*/
    function cactus_topbar_icons_tpl() {

        var html = '';
        $('#customize-control-cactus-topbar_icons .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i></a>';

        });
        customize.previewer.send('topbar_icons', html);

    }

    wp.customize('cactus[topbar_icons]', function(value) {
        value.bind(function(to) {
            cactus_topbar_icons_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-topbar_icons .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_topbar_icons_tpl();
    });

    /*Top Bar Right tpl*/
    function cactus_topbar_right_tpl() {

        var html = '';
        $('#customize-control-cactus-topbar_right .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var text = $(this).find('input[data-field="text"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<span class="cactus-microwidget"><a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + text + '</a></span>';

        });
        customize.previewer.send('topbar_right', html);

    }

    wp.customize('cactus[topbar_right]', function(value) {
        value.bind(function(to) {
            cactus_topbar_right_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-topbar_right .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_topbar_right_tpl();
    });

    /*Logo Right tpl*/
    function cactus_logo_right_tpl() {

        var html = '';
        $('#customize-control-cactus-logo_right .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var text = $(this).find('input[data-field="text"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<span class="cactus-microwidget"><a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + text + '</a></span>';

        });
        customize.previewer.send('logo_right', html);

    }

    wp.customize('cactus[logo_right]', function(value) {
        value.bind(function(to) {
            cactus_logo_right_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-logo_right .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_logo_right_tpl();
    });

    /*Classic Logo Left tpl*/
    function cactus_classic_header_logo_left_tpl() {

        var html = '';
        $('#customize-control-cactus-classic_header_logo_left .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var text = $(this).find('input[data-field="text"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<span class="cactus-microwidget"><a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + text + '</a></span>';

        });
        customize.previewer.send('classic_header_logo_left', html);

    }

    wp.customize('cactus[classic_header_logo_left]', function(value) {
        value.bind(function(to) {
            cactus_classic_header_logo_left_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-classic_header_logo_left .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_classic_header_logo_left_tpl();
    });

    /*Classic Logo Right tpl*/
    function cactus_classic_header_logo_right_tpl() {

        var html = '';
        $('#customize-control-cactus-classic_header_logo_right .repeater-fields > li').each(function(index, element) {

            var icon = $(this).find('input[data-field="icon"]').val();
            var text = $(this).find('input[data-field="text"]').val();
            var link = $(this).find('input[data-field="link"]').val();
            var target = $(this).find('input[data-field="target"]').val();
            html += '<span class="cactus-microwidget"><a href="' + link + '" target="' + target + '"><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + text + '</a></span>';

        });
        customize.previewer.send('classic_header_logo_right', html);

    }

    wp.customize('cactus[classic_header_logo_right]', function(value) {
        value.bind(function(to) {
            cactus_classic_header_logo_right_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-classic_header_logo_right .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_classic_header_logo_right_tpl();
    });

    /*menu tpl*/
    function cactus_menu_tpl() {

        var html = '';
        $('#customize-control-cactus-frontpage_menu .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var link = $(this).find('input[data-field="link"]').val();
			var icon = $(this).find('input[data-field="icon"]').val();
			var icon_str = '';
			if(icon !=='')
				icon_str = '<i class="fa '+icon+'"></i> ' ;
            if (title !== '')
                html += '<li><a href="' + link + '"><span>'+icon_str+ title + '</span></a></li>';

        });
        customize.previewer.send('frontpage_menu_selective', html);

    }

    wp.customize('cactus[frontpage_menu]', function(value) {
        value.bind(function(to) {
            cactus_menu_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-frontpage_menu .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_menu_tpl();
    });

    /* left menu tpl */
    function cactus_left_menu_tpl() {

        var html = '';
        $('#customize-control-cactus-split_header_left_menu .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var link = $(this).find('input[data-field="link"]').val();
			var icon = $(this).find('input[data-field="icon"]').val();
			var icon_str = '';
			if(icon !=='')
				icon_str = '<i class="fa '+icon+'"></i> ';
            if (title !== '')
                html += '<li><a href="' + link + '"><span>'+icon_str+ title + '</span></a></li>';

        });
        customize.previewer.send('split_header_left_menu_selective', html);

    }

    wp.customize('cactus[split_header_left_menu]', function(value) {
        value.bind(function(to) {
            cactus_left_menu_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-split_header_left_menu .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_left_menu_tpl();
    });

    /* add menu item trigger */
    $(document).on('click', '#customize-control-cactus-split_header_left_menu .repeater-add', function() {
        var menuWrap = $(this).parent('li.customize-control');
        setTimeout(function() {
            var itemTitle = menuWrap.find('.repeater-fields > li:last .repeater-row-label').html();
            menuWrap.find('.repeater-fields li:last input[data-field="title"]').val(itemTitle).trigger('change');
        }, 300);
    });
	
    $(document).on('click', '#customize-control-cactus-frontpage_menu .repeater-add', function() {
        var menuWrap = $(this).parent('li.customize-control');
        setTimeout(function() {
            var itemTitle = menuWrap.find('.repeater-fields > li:last .repeater-row-label').html();
            menuWrap.find('.repeater-fields li:last input[data-field="title"]').val(itemTitle).trigger('change');
        }, 300);

    });
	
	wp.customize( 'cactus[sticky_header_background_color]', function( value ) {
		value.bind( function( to ) {
				var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
				var matches = patt.exec(to);
				var opacity = $('#customize-control-cactus-sticky_header_background_opacity select').val();
				var rgba = "rgba("+parseInt(matches[1], 16)+","+parseInt(matches[2], 16)+","+parseInt(matches[3], 16)+","+opacity+")";
				customize.previewer.send('sticky_header_background_color', rgba);
		} );
	} );
	
	wp.customize( 'cactus[sticky_header_background_opacity]', function( value ) {
		value.bind( function( to ) {
				var color = $('#customize-control-cactus-sticky_header_background_color input').val();
				var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
				var matches = patt.exec(color);
				var rgba = "rgba("+parseInt(matches[1], 16)+","+parseInt(matches[2], 16)+","+parseInt(matches[3], 16)+","+to+")";
				console.log(rgba);
				customize.previewer.send('sticky_header_background_color', rgba);
		} );
	} );

    /*banner tpl*/
    function cactus_banner_tpl() {

        var html = '';
        $('#customize-control-cactus-banner .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var subtitle = $(this).find('input[data-field="subtitle"]').val();
            var image = $(this).find('input[data-field="image"]').parents('.repeater-field-image').find('img').attr('src');
            var btn_text = $(this).find('input[data-field="btn_text"]').val();
            var btn_link = $(this).find('input[data-field="btn_link"]').val();

            html += '<div class="cactus-slider-item">';
            if (image !== '' && typeof image !== 'undefined') {
                html += '<img src="' + image + '" alt="' + title + '">';
            }
            html += '<div class="cactus-slider-caption-wrap">';
            html += '<div class="cactus-slider-caption">';
            html += '<div class="cactus-slider-caption-inner">';
            html += '<h2 class="cactus-slider-title">' + title + '</h2>';
            html += '<p class="cactus-slider-desc">' + subtitle + '</p>';
            if (btn_text !== '')
                html += '<div class="cactus-action"> <a href="' + btn_link + '"><span class="cactus-btn primary">' + btn_text + '</span></a> </div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

        });
        customize.previewer.send('banner_selective', html);

    }

    wp.customize('cactus[banner]', function(value) {
        value.bind(function(to) {
            cactus_banner_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-banner .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_banner_tpl();
    });

    $(document).on('click', '#customize-control-cactus-banner .remove-button', function() {
        cactus_banner_tpl();
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_banner_image', row);
    });
	
	
    /*service tpl*/
    function cactus_service_tpl() {

        var html = '';
        var style = $('#customize-control-cactus-style_service').find('input[type="radio"]:checked').val();
        var columns = $('#customize-control-cactus-columns_service').find('select').val();

        $('#customize-control-cactus-service .repeater-fields > li').each(function(index, element) {

            var icon_type = $(this).find('select[data-field="icon_type"]').val();
            var icon = $(this).find('input[data-field="icon"]').val();
            var image = $(this).find('input[data-field="image"]').parents('.repeater-field-image').find('img').attr('src');
            var title = $(this).find('input[data-field="title"]').val();
            var text = $(this).find('textarea[data-field="text"]').val();
            var title_link = $(this).find('input[data-field="title_link"]').val();

            if (typeof icon_type === 'undefined') {
                icon_type = 'icon';
            }

            if (icon !== '') {
                icon = icon.replace('fa ', '');
                icon = icon.replace('fa-', '');
            }

            title = '<h4>' + title + '</h4>';

            if (title_link !== '')
                title = '<a href="' + title_link + '" target="_blank">' + title + '</a>';

            html += '<li><div class="cactus-feature-item">';

            if (icon_type === 'image') {
                if (image !== '' && typeof image !== 'undefined') {
                    html += '<div class="cactus-feature-figure"><img src="' + image + '" alt=""></div>';
                }
            } else {
                html += '<div class="cactus-feature-figure"><i class="fa fa-' + icon + '" style="font-size: 50px;"></i></div>';
            }

            html += '<div class="cactus-feature-caption">' + title + '<p>' + text + '</p></div></div></li>';


        });
        customize.previewer.send('service_selective', html);

    }
	
    wp.customize('cactus[service]', function(value) {
        value.bind(function(to) {
            cactus_service_tpl();
        });
    });

    wp.customize('cactus[service]', function(value) {
        value.bind(function(to) {
            cactus_service_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-service .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_service_tpl();
    });

    $(document).on('click', '#customize-control-cactus-service .remove-button', function() {
        cactus_service_tpl();
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_service_image', row);
    });

    /* works tpl*/
    function cactus_works_tpl(style) {

        var html = '';
        var items = '';
        var filter = '';
        var tags = [];

		if(style=='')
        	style = $('#customize-control-cactus-style_works').find('input[type="radio"]:checked').val();
        var columns = $('#customize-control-cactus-columns_works').find('select').val();
        var worksID = 'works-' + Math.ceil(Math.random() * 10) + Math.ceil(Math.random() * 10);

        var ul_class = 'full';
        if (style == '2') {
            ul_class = '';
        }

        $('#customize-control-cactus-works .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var image = $(this).find('input[data-field="image"]').parents('.repeater-field-image').find('img').attr('src');
            var title_link = $(this).find('input[data-field="link"]').val();
            var tag = $(this).find('input[data-field="tag"]').val();
            var cssClass = '';;
            if (tag != '') {
                var slug = tag.toLowerCase().replace(' ', '-');
                cssClass = 'group-' + slug;
                tags[slug] = '<li><a href="javascript:;" class="control" data-filter=".' + cssClass + '">' + tag + '</a></li>';
            }
			if(style == '1'){
            items += '<li id="cactus-works-' + index + '" class="mix element-item grid-item ' + cssClass + '">';
            items += '<div class="cactus-gallery-item"><div class="cactus-gallery-figure"><img src="' + image + '" alt="' + title + '">';
            items += '<div class="cactus-overlay">';
            items += '<div class="cactus-overlay-content">';
            items += '<div>';
			
            items += '<h4><a href="' + title_link + '">' + title + '</a></h4>';
            items += '<a href="' + image + '" rel="prettyPhoto"><i class="fa fa-search-plus"></i></a>';
			if(title_link!=='')
				items += '<a href="'+title_link+'" ><i class="fa fa-link"></i></a>';
			items += '</div>';
            items += '</div>';
            items += '</div>';
			items += '</div>';
            items += '</div>';
            items += '</li>';
			
		    }else{
			
			items += '<li id="cactus-works-' + index + '" class="mix element-item grid-item ' + cssClass + '">';
			items += '<div class="cactus-gallery-item">';
			items += '<div class="cactus-gallery-figure">';
			items += '<img src="'+image+'" alt="'+title+'">';
			items += '<a href="'+title_link+'">';
			items += '<div class="cactus-overlay">';
			items += '<div class="cactus-overlay-content">';
			items += '<div>';
			items += '<a href="'+image+'"  rel="prettyPhoto"><i class="fa fa-search-plus"></i></a>';
			if(title_link!=='')
				items += '<a href="'+title_link+'" ><i class="fa fa-link"></i></a>';
			items += '</div>';
			items += '</div>';                
			items += '</div>';
			items += '</a>';
			items += '</div>';
			items += '<h4><a href="'+title_link+'">'+title+'</a></h4>';
			items += '</div>';
			items += '</li>';
		}
			
        });

        if (tags) {
            html += '<nav class="cactus-portfolio-filter">';
            html += '<ul>';
            html += '<li class="active"><a href="javascript:;" data-filter="*">All</a></li>';
            filter += '<li class="active"><a href="javascript:;" data-filter="*">All</a></li>';
            var x;
            for (x in tags) {
                html += tags[x];
                filter += tags[x];
            }
            html += '<li class="gap"></li><li class="gap"></li><li class="gap"></li>';
            html += '</ul>';
            html += '</nav>';
        }
        html += '<ul class="cactus-portfolio-list cactus-list-md-' + columns + ' cactus-list-sm-2 ' + ul_class + '" id="' + worksID + '">';
        html += items;
        html += '</ul>';

        customize.previewer.send('works_selective', { html: html, id: worksID, items: items, filter: filter });
    }
	
	 wp.customize('cactus[style_works]', function(value) {
        value.bind(function(to) {
            cactus_works_tpl(to);
        });
    });

    wp.customize('cactus[works]', function(value) {
        value.bind(function(to) {
            cactus_works_tpl('');
        });
    });

    $(document).on('click', '#customize-control-cactus-works .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_works_tpl('');
    });

    $(document).on('click', '#customize-control-cactus-works .remove-button', function() {
        cactus_works_tpl('');
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_works_image', row);
    });

    wp.customize('cactus[columns_works]', function(value) {
        value.bind(function(to) {
            customize.previewer.send('columns_works', to);
        });
    });

    /* team tpl*/
    function cactus_team_tpl(style) {

        var html = '';
        var items = '';
        var tags = [];
        var columns = $('#customize-control-cactus-columns_team').find('select').val();
		if(style == '')
			style = $('#customize-control-cactus-style_team').find('input[type="radio"]:checked').val();
		
        $('#customize-control-cactus-team .repeater-fields > li').each(function(index, element) {

            var name = $(this).find('input[data-field="name"]').val();
            var avatar = $(this).find('input[data-field="avatar"]').parents('.repeater-field-image').find('img').attr('src');
            var byline = $(this).find('input[data-field="byline"]').val();
            var link = $(this).find('input[data-field="link"]').val();
			
			if(style=='1'){
            html += '<li>';
            html += '<div class="cactus-team-item"><img src="' + avatar + '" alt="' + name + '">';
            if (link) {
                html += '<a href="' + link + '">';
            }

            html += '<div class="cactus-overlay">';
            html += '<div class="cactus-overlay-content">';
            html += '<div class="cactus-team-vcard">';
            html += '<h4 class="cactus-team-name">' + name + '</h4>';
            html += '<p class="cactus-team-title">' + byline + '</p>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            if (link != '') {
                html += '</a>';
            }
            html += '</div>';
            html += '</li>';
			}else{
			html += '<li>';
          	html += '<div class="cactus-team-item">';
              if(link!=''){
          	html += '<a href="'+link+'">';
           }
		    html += '<img src="'+avatar+'" alt="'+name+'">';
		  if(link!=''){
            html += '</a>';
             }
            html += '<div class="cactus-team-vcard">';
            html += '<h4 class="cactus-team-name">'+name+'</h4>';
            html += '<p class="cactus-team-title">'+byline+'</p>';
            html += '</div>';
          	html += '</div>';
    		html += '</li>';
				
				}

        });
        customize.previewer.send('team_selective', html);

    }
	
	wp.customize( 'cactus[style_team]', function( value ) {
		value.bind(function(to) {
            cactus_team_tpl(to);
        });
	});

    wp.customize('cactus[team]', function(value) {
        value.bind(function(to) {
            cactus_team_tpl('');
        });
    });

    $(document).on('click', '#customize-control-cactus-team .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_team_tpl('');
    });

    $(document).on('click', '#customize-control-cactus-team .remove-button', function() {
        cactus_team_tpl('');
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_team_image', row);
    });

    wp.customize('cactus[columns_team]', function(value) {
        value.bind(function(to) {
            customize.previewer.send('columns_team', to);
        });
    });

    /*counter tpl*/
    function cactus_counter_tpl() {

        var html = '';
        $('#customize-control-cactus-counter .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var icon = $(this).find('input[data-field="icon"]').val();
            var number = $(this).find('input[data-field="number"]').val();

            if (icon !== '') {
                icon = icon.replace('fa ', '');
                icon = icon.replace('fa-', '');
            }

            html += '<li>';
            html += '<div class="cactus-counter-item">';
            html += '<div class="cactus-counter-figure"> <i class="fa fa-' + icon + '" style="font-size: 50px;"></i> </div>';
            html += '<div class="cactus-counter-num counter">' + number + '</div>';
            html += '<h4 class="cactus-counter-title">' + title + '</h4>';
            html += '</div>';
            html += '</li>';

        });
        customize.previewer.send('counter_selective', html);
    }

    wp.customize('cactus[counter]', function(value) {
        value.bind(function(to) {
            cactus_counter_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-counter .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_counter_tpl();
    });

    /* testimonial tpl*/
    function cactus_testimonial_tpl() {

        var html = '';
        var style = $('#customize-control-cactus-style_testimonial').find('input[type="radio"]:checked').val();
        $('#customize-control-cactus-testimonial .repeater-fields > li').each(function(index, element) {
            console.log(style);
            var name = $(this).find('input[data-field="name"]').val();
            var avatar = $(this).find('input[data-field="avatar"]').parents('.repeater-field-image').find('img').attr('src');
            var byline = $(this).find('input[data-field="byline"]').val();
            var text = $(this).find('textarea[data-field="text"]').val();

            if (style == '2') {
                html += '<li>';
                html += '<div class="cactus-testimonial-item">';
                html += '<div class="cactus-testimonial-content">';
                html += text;
                html += '</div>';
                html += '<div class="cactus-testimonial-figure">';
                html += '<img src="' + avatar + '" alt="' + name + '">';
                html += '</div>';
                html += '<div class="cactus-testimonial-vcard">';
                html += '<h4 class="cactus-testimonial-name">' + name + '</h4>';
                html += '<p class="cactus-testimonial-title">' + byline + '</p>';
                html += '</div>';
                html += '</div>';
                html += '</li>';
            } else {
                html += '<div class="cactus-testimonial-item">';
                html += '<div class="cactus-testimonial-content">' + text + '</div>';
                html += '<div class="cactus-testimonial-figure"><img src="' + avatar + '" alt="' + name + '"> </div>';
                html += '<div class="cactus-testimonial-vcard">';
                html += '<h4 class="cactus-testimonial-name">' + name + '</h4>';
                html += '<p class="cactus-testimonial-title">' + byline + '</p>';
                html += '</div>';
                html += '</div>';
            }

        });
        if (style == '2') {
            html = '<ul class="cactus-testimonials style2 cactus-list-md-3">' + html + '</ul>';

        } else {
            html = '<div class="cactus-testimonials-carousel owl-carousel">' + html + '</div>';
        }
        customize.previewer.send('testimonial_selective', html);

    }

    wp.customize('cactus[testimonial]', function(value) {
        value.bind(function(to) {
            cactus_testimonial_tpl();
        });
    });

    wp.customize('cactus[style_testimonial]', function(value) {
        value.bind(function(to) {
            cactus_testimonial_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-testimonial .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_testimonial_tpl();
    });

    $(document).on('click', '#customize-control-cactus-testimonial .remove-button', function() {
        cactus_testimonial_tpl();
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_testimonial_image', row);
    });

    /* clients tpl */
    function cactus_clients_tpl() {

        var html = '';

        $('#customize-control-cactus-clients .repeater-fields > li').each(function(index, element) {

            var image = $(this).find('input[data-field="image"]').parents('.repeater-field-image').find('img').attr('src');
            var title = $(this).find('input[data-field="title"]').val();
            var link = $(this).find('input[data-field="link"]').val();

            html += '<div class="cactus-client-item"> <a href="' + link + '"><img src="' + image + '" alt="' + title + '" /></a> </div>';

        });
        customize.previewer.send('clients_selective', html);
    }

    wp.customize('cactus[clients]', function(value) {
        value.bind(function(to) {
            cactus_clients_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-clients .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_clients_tpl();
    });

    $(document).on('click', '#customize-control-cactus-clients .remove-button', function() {
        cactus_clients_tpl();
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_clients_image', row);
    });

    /* pricing tpl*/
    function cactus_pricing_tpl() {

        var html = '';
        $('#customize-control-cactus-pricing .repeater-fields > li').each(function(index, element) {

            var featured = $(this).find('input[data-field="featured"]').val();
            var icon = $(this).find('input[data-field="icon"]').val();
            var image = $(this).find('input[data-field="image"]').parents('.repeater-field-image').find('img').attr('src');
            var title = $(this).find('input[data-field="title"]').val();
            var currency = $(this).find('input[data-field="currency"]').val();
            var price = $(this).find('input[data-field="price"]').val();
            var unit = $(this).find('input[data-field="unit"]').val();
            var features = $(this).find('textarea[data-field="features"]').val();
            var button_text = $(this).find('input[data-field="button_text"]').val();
            var button_link = $(this).find('input[data-field="button_link"]').val();
            var button_target = $(this).find('input[data-field="button_target"]').val();

            var css_class = '';
            var button_class = 'cactus-dark';
            if (featured == '1' || featured == 'on') {
                css_class = 'cactus-featured';
                button_class = '';
            }

            icon = icon.replace('fa-', '');
            icon = icon.replace('fa ', '');
            var icon_str = '';
            var unit_str = '';

            if (image !== '' && typeof image !== 'undefined')
                icon_str = '<img src="' + image + '" alt="" />';
            else
                icon_str = ' <i class="fa fa-' + icon + '"></i>';

            if (unit != '')
                unit_str = '/ ' + unit;

            html += '<li>';
            html += '<div class="cactus-pricing-item ' + css_class + '">';
            html += '<div class="cactus-pricing-header">';
            html += '<div class="cactus-pricing-icon">';
            html += icon_str;
            html += '</div>';
            html += '<h4 class="cactus-pricing-title">';
            html += title;
            html += '</h4>';
            html += '</div>';
            html += '<div class="cactus-pricing-tag">';
            html += '<span class="cactus-currency">' + currency + '</span>';
            html += '<span class="cactus-price">' + price + '</span>';
            html += '<span class="cactus-unit">' + unit_str + '</span>';
            html += '</div>';
            html += '<div class="cactus-pricing-features">';
            html += '<ul class="cactus-pricing-list">';

            if (features) {
                var features_array = features.split("\n");
                $.each(features_array, function(index, value) {
                    html += '<li>' + value + '</li>';
                });
            }

            html += '</ul>';
            html += '</div>';
            html += '<div class="cactus-action">';
            html += '<a href="' + button_link + '" target="' + button_target + '" ><span class="cactus-btn primary cactus-btn-sm ' + button_class + '">' + button_text + '</span></a>';
            html += '</div>';
            html += '</div>';
            html += '</li>';

        });

        customize.previewer.send('pricing_selective', html);

    }

    wp.customize('cactus[pricing]', function(value) {
        value.bind(function(to) {
            cactus_pricing_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-pricing .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_pricing_tpl();
    });

    $(document).on('click', '#customize-control-cactus-pricing .remove-button', function() {
        cactus_pricing_tpl();
        var row = $(this).parents('li.repeater-row').data('row');
        customize.previewer.send('remove_pricing_image', row);
    });

    /*footer icons tpl*/
    function cactus_footer_icons_tpl() {

        var html = '';
        $('#customize-control-cactus-footer_icons .repeater-fields > li').each(function(index, element) {

            var title = $(this).find('input[data-field="title"]').val();
            var icon = $(this).find('input[data-field="icon"]').val();
            var link = $(this).find('input[data-field="link"]').val();

            if (icon !== '') {
                icon = icon.replace('fa ', '');
                icon = icon.replace('fa-', '');
            }
            if (icon != '')
                html += '<li><a href="' + link + '" title="' + title + '" target="_blank"><i class="fa fa-' + icon + '"></i></a></li>';
        });
        customize.previewer.send('footer_icons_selective', html);

    }
    wp.customize('cactus[footer_icons]', function(value) {
        value.bind(function(to) {
            cactus_footer_icons_tpl();
        });
    });

    $(document).on('click', '#customize-control-cactus-footer_icons .repeater-row-remove', function() {
        $(this).parents('li.repeater-row').remove();
        cactus_footer_icons_tpl();
    });
	
	/* pricing shop*/
	$(document).on('click', '#customize-control-cactus-categories_shop select', function() {
		customize.instance('cactus[categories_shop]').set($(this).val())
    	customize.instance('cactus[categories_shop]').previewer.refresh();
    });
	

    wp.customize('cactus[video_title_banner]', function(value) {
        value.bind(function(to) {
            $('.video_title_banner_selective').html(to);
        });
    });
    wp.customize('cactus[video_subtitle_banner]', function(value) {
        value.bind(function(to) {
            $('.banner_subtitle_banner_selective').html(to);
        });
    });
    wp.customize('cactus[button_text_banner]', function(value) {
        value.bind(function(to) {

            $('.button_text_banner_selective').html(to);
			customize.previewer.send('button_text_banner_selective', to);
        });
    });
    wp.customize('cactus[button_link_banner]', function(value) {
        value.bind(function(to) {
			customize.previewer.send('button_link_banner_selective', to);
            
        });
    });
	
	wp.customize('cactus[button_link_promo]', function(value) {
        value.bind(function(to) {
			customize.previewer.send('button_link_promo_selective', to);
            
        });
    });
	wp.customize('cactus[button_link_news]', function(value) {
        value.bind(function(to) {
			customize.previewer.send('button_link_news_selective', to);
            
        });
    });
	
	 wp.customize('cactus[button_text_shop]', function(value) {
        value.bind(function(to) {

            $('.button_text_shop_selective').html(to);
			customize.previewer.send('button_text_shop_selective', to);
        });
    });
	
	wp.customize('cactus[button_link_shop]', function(value) {
        value.bind(function(to) {
			customize.previewer.send('button_link_shop_selective', to);
            
        });
    });
	
	wp.customize('cactus[button_link_call_to_action]', function(value) {
        value.bind(function(to) {
			customize.previewer.send('button_link_call_to_action_selective', to);
            
        });
    });
	
	var cactusFooterstyle = function(style){
		
		if( style === '1' ){
			$('#customize-control-cactus-footer_left_icons').hide();
			$('#customize-control-cactus-footer_logo').show();
		}
		if( style === '2' ){
			$('#customize-control-cactus-footer_left_icons').show();
			$('#customize-control-cactus-footer_logo').hide();
		}
	}
	
	var footer_style = $('#customize-control-cactus-footer_style input[checked="checked"]').val();
	cactusFooterstyle(footer_style);
	$(document).on('click','#customize-control-cactus-footer_style input',function(){
		footer_style = $(this).val();
		cactusFooterstyle(footer_style);
	});


	$(document).on('click','#import-theme-options',function(){
			
		if(confirm( cactus_customize_params.confirm )){
			
		$('#accordion-section-importer .import-status').text(cactus_customize_params.loading);							
		$.ajax({type:"POST",dataType:"html",url:ajaxurl,data:{action:'cactus_otpions_restore'},
			success:function(data){
				$('#accordion-section-importer .import-status').text(cactus_customize_params.complete);
				location.reload() ;
			},error:function(e){
				$('#accordion-section-importer .import-status').text(cactus_customize_params.error);
		}});
		}
	});


    var cactus_customize_scroller = function($) {
        'use strict';

        $(function() {
            var customize = wp.customize;

            $('ul[id*="frontpage-sections"] .accordion-section').not('.panel-meta').each(function() {
                $(this).on('click', function() {
                    var section = $(this).attr('aria-owns').split('_').pop();
                    customize.previewer.send('clicked-customizer-section', section);
                });
            });

            $('#accordion-section-panel-footer').on('click', function() {
                customize.previewer.send('clicked-customizer-footer', '.site-footer');
            });

            $('#accordion-section-title_tagline').on('click', function() {
                customize.previewer.send('clicked-customizer-title_tagline', '.header-wrap');
            });

            $('#accordion-section-panel-frontpage-menu').on('click', function() {
                customize.previewer.send('clicked-customizer-frontpage_menu', '.frontpage_menu_selective');
            });

        });
    };

    cactus_customize_scroller(jQuery);

});