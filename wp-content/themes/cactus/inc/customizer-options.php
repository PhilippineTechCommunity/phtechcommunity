<?php

function cactus_sanitize_woo_categories( $input )
{
    $valid = cactus_get_woo_categories();
    foreach ($input as $value) {
        if ( !array_key_exists( $value, $valid ) ) {
            return array();
        }
    }

    return $input;
}
function cactus_get_sections(){
	$imagepath = get_template_directory_uri().'/assets/images/';
	$cactus_sections = array(
		
		'banner' => array(
						'section_name' => __( 'Section Banner', 'cactus' ),
						'font_color' => '#ffffff',
						'menu_title' => __( 'Home', 'cactus' ),
						'hide' => '',
						'padding' => '0'
						),
		'service' => array(
						'section_name'=>__( 'Section Service', 'cactus' ),
						'section_title' => '',
						'section_subtitle' => '',
						'menu_title' => __( 'Service', 'cactus' ),
						'hide' => '',
						'padding' => '50px 0'
						),
		'works' => array(
						'section_name'=>__( 'Section Works', 'cactus' ),
						'section_title' => __( 'Our Works', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'menu_title' => __( 'Works', 'cactus' ),
						'hide' => '',
						'padding' => '0'
						),
		'promo' => array(
						'section_name'=>__( 'Section Promo', 'cactus' ),
						'section_title' => __( 'About', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'background_color' => '#f5f5f5',
						'menu_title' => __( 'About', 'cactus' ),
						'hide' => '',
						'padding' => '100px 0'
						),
		'team' => array(
						'section_name'=>__( 'Section Team', 'cactus' ),
						'section_title' => __( 'Meet Our Team', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'background_color' => '#f5f5f5',
						'menu_title' => __( 'Team', 'cactus' ),
						'hide' => '',
						'padding' => '50px 0 0'
						),
		'counter' => array(
						'section_name'=>__( 'Section Counter', 'cactus' ),
						'section_title' => '',
						'section_subtitle' => '',
						'background_image' => $imagepath.'bg-counter.jpg',
						'font_color' => '#ffffff',
						'menu_title' => __( 'Counter', 'cactus' ),
						'hide' => '',
						'padding' => '100px 0'
						),
		'testimonial' => array(
						'section_name'=>__( 'Section Testimonials', 'cactus' ),
						'section_title' => __( 'What Clients Say', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'background_color' => '#f5f5f5',
						'menu_title' => __( 'Testimonials', 'cactus' ),
						'hide' => '',
						'padding' => '100px 0 0'
						),
		'clients' => array(
						'section_name'=>__( 'Section Clients', 'cactus' ),
						'section_title' => '',
						'section_subtitle' => '',
						'background_color' => '#f5f5f5',
						'menu_title' => '',
						'hide' => '',
						'padding' => '30px 0 100px'
						),
						
		'news' => array(
						'section_name'=>__( 'Section News', 'cactus' ),
						'section_title' => __( 'Recent News', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'menu_title' => __( 'News', 'cactus' ),
						'hide' => '',
						'padding' => '30px 0 100px'
						),
		'contact' => array(
						'section_name'=>__( 'Section Contact', 'cactus' ),
						'section_title' => __( 'Keep in Touch', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'menu_title' => __( 'Contact', 'cactus' ),
						'hide' => '',
						'padding' => '100px 0'
						),
		'shop' => array(
						'section_name'=>__( 'Section Shop', 'cactus' ),
						'section_title' => __( 'Shop', 'cactus' ),
						'section_subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor',
						'menu_title' => __( 'Shop', 'cactus' ),
						'hide' => '1',
						'padding' => '50px 0'
						),
	);

	return apply_filters('cactus_get_sections',$cactus_sections);
	
	}
/**
 * Defines customizer options
 */

function cactus_customizer_library_options() {
	
	global $cactus_sections,  $cactus_default_sections, $cactus_customizer_options, $wp_version;

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$imagepath = get_template_directory_uri().'/assets/images/';
	
	$target = array(
		'_blank' => __( 'Blank', 'cactus' ),
		'_self'  => __( 'Self', 'cactus' )
	);
	
	$transport = '';
	if ( version_compare( $wp_version, '4.9' ) >= 0 ){
		$transport = 'postMessage';
	}
	
	// View PRO Features
	$section = 'view-pro-features';
	$sections[] = array(
		'id' => $section,
		'panel' => '',
		'title' => __( 'Cactus: About Theme', 'cactus' ),
		'priority' => '4'
	);
	
	$options['notice_000'] = array(
					'id' => 'notice_000',
					'label'   => '',
					'section' => $section,
					'type'    => 'content',
					'default' => '',
					'description' => '<div class="cactus-upsell">
					<ul class="cactus-upsell-features">
							<li>'.__( 'Check the step-by-step manual before building your site.', 'cactus' ).'</li>
					</ul>
							<a target="_blank" href="'.esc_url('https://velathemes.com/cactus-documentation/').'" class="button button-primary">'.__( 'Online Documententation', 'cactus' ).'</a>
							<div id="accordion-section-importer" class="accordion-section control-section control-section-importer" style="display:none;">
							<p><a href="#" id="import-theme-options" class="button">'.__( 'Restore Defaults', 'cactus' ).'</a></p><p class="import-status"></p>
							</div>

			</div>',
			);
			
	$options['notice_111'] = array(
					'id' => 'notice_111',
					'label'   => '',
					'section' => $section,
					'type'    => 'content',
					'default' => '',
					'description' => '<div class="cactus-upsell">
					<ul class="cactus-upsell-features">
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Section - Pricing', 'cactus' ).'
							</li>
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Section - Call to Action', 'cactus' ).'
							</li>
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Section - Jetpack Subscribe', 'cactus' ).'
							</li>
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Section - Video', 'cactus' ).'
							</li>
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Section Reordering', 'cactus' ).'
							</li>
							<li><span class="upsell-pro-label">'.__( 'PRO', 'cactus' ).'</span>'.__( 'Quality Support', 'cactus' ).'
							</li>
					</ul>
							<a target="_blank" href="'.esc_url('https://velathemes.com/cactus-pro-theme/').'" class="button button-primary">'.__( 'Get the PRO version!', 'cactus' ).'</a>

			</div>',
				);



	// Panel Header
	
	$panel = 'panel-header';
	
	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Cactus: Header Options', 'cactus' ),
		'priority' => '5'
	);
	
	$section = 'section-header-general-options';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Options', 'cactus' ),
		'priority' => '1',
		'panel' => $panel
	);
	
	$options['header_full_width'] = array(
			'id' => 'header_full_width',
			'label'   => __( 'Full-width Header', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'default' => '',
		);
		
	$options['header_menu_hover_style'] = array(
			'id' => 'header_menu_hover_style',
			'label'   => __( 'Hover Style', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			//'choices' => array(''=> __( 'None', 'cactus' ),'hoverline-fromcenter'=> __( 'Underline', 'cactus' ),'hoveroutline'=> __( 'Outline', 'cactus' ),'hoverbg'=> __( 'Background', 'cactus' )),
			'choices' => array(
				''=> array('label'=>__( 'None', 'cactus' ),'url'=> $imagepath.'customize/header-hover-none.png'),
				'hoverline-fromcenter'=> array('label'=>__( 'Underline', 'cactus' ),'url'=> $imagepath.'customize/header-hover-underline.png'),
				'hoveroutline'=> array('label'=>__( 'Outline', 'cactus' ),'url'=> $imagepath.'customize/header-hover-outline.png'),
				),
			'default' => '',
			'transport' => $transport,
		);
	
	$options['transparent_header'] = array(
			'id' => 'transparent_header',
			'label'   => __( 'Make Header Transparent in Frontpage', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
			'transport' => $transport,
		);
	
	$options['header_color_scheme'] = array(
			'id' => 'header_color_scheme',
			'label'   => __( 'Color Scheme', 'cactus' ),
			'section' => $section,
			'type'    => 'radio',
			'choices' => array(''=> __( 'Default', 'cactus' ),'text-light'=> __( 'Light', 'cactus' )),
			'default' => 'text-light',
			'transport' => $transport,
		);
	
	$section = 'section-header-topbar';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Top Bar', 'cactus' ),
		'priority' => '2',
		'panel' => $panel
	);
	
	$options['display_topbar'] = array(
			'id' => 'display_topbar',
			'label'   => __( 'Display Top Bar', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => $transport,
			'default' => '',
		);
	
	$options['topbar_left'] = array(
				'id' => 'topbar_left',
				'label'   => __( 'Top Bar Left', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Item', 'cactus' ),
							'field' => 'text',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'text'=>array('type'=>'text','default'=>'','label'=> __( 'Text', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> __( 'Link', 'cactus' )),
					'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'cactus' )),
				),
				'default' =>  array(
					array(
						"icon" => 'fa-envelope',
						"text" => "admin@domain.com",
						"link" => "",
						"target" => "_self",
						),
					array(
						"icon" => 'fa-phone',
						"text" => "011 322 44 56",
						"link" => "",
						"target" => "_self",
						),
					array(
						"icon" => 'fa-clock-o',
						"text" => "Monday – Friday 10 AM – 8 PM",
						"link" => "",
						"target" => "_self",
						),
					)
				);
		
		$options['topbar_icons'] = array(
				'id' => 'topbar_icons',
				'label'   => __( 'Top Bar Icons', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Icon', 'cactus' ),
							'field' => 'icon',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> __( 'Link', 'cactus' )),
					'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'cactus' )),
				),
				'default' =>  array(
					array(
						"icon" => 'fa-twitter',
						"link" => "#",
						"target" => "_self",
						),
					array(
						"icon" => 'fa-facebook',
						"link" => "#",
						"target" => "_self",
						),
					array(
						"icon" => 'fa-weibo',
						"link" => "#",
						"target" => "_self",
						),
					)
				);
	
		
	$options['topbar_right'] = array(
				'id' => 'topbar_right',
				'label'   => __( 'Top Bar Right', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Item', 'cactus' ),
							'field' => 'text',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'text'=>array('type'=>'text','default'=>'','label'=> __( 'Text', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> __( 'Link', 'cactus' )),
					'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'cactus' )),
				),
				'default' =>  array(
					array(
						"icon" => "",
						"text" => "Home",
						"link" => "#",
						"target" => "_self",
						),
					array(
						"icon" => "",
						"text" => "Blog",
						"link" => "#",
						"target" => "_self",
						),
					array(
						"icon" => "",
						"text" => "Contact",
						"link" => "#",
						"target" => "_self",
						),
					)
				);
				
	
				
	
	$section = 'section-navigation-bar';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Navigation Bar', 'cactus' ),
		'priority' => '2',
		'panel' => $panel
	);
	
	$options['sticky_header'] = array(
			'id' => 'sticky_header',
			'label'   => __( 'Sticky Navigation Bar', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
			'transport' => $transport,
		);
	
	$options['header_style'] = array(
			'id' => 'header_style',
			'label'   => __( 'Navigation Bar Style', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			//'choices' => array('inline'=> __( 'Inline Navigation Bar', 'cactus' ),'classic'=> __( 'Classic Navigation Bar', 'cactus' ),'split'=> __( 'Split Navigation Bar', 'cactus' )),
			'choices' => array(
				'inline'=> array('label'=>__( 'Inline Navigation Bar', 'cactus' ),'url'=> $imagepath.'customize/header-inline.png'),
				'classic'=> array('label'=>__( 'Classic Navigation Bar', 'cactus' ),'url'=> $imagepath.'customize/header-classic.png'),
				'split'=> array('label'=>__( 'Split Navigation Bar', 'cactus' ),'url'=> $imagepath.'customize/header-split.png'),
				),
			'default' => 'inline',
			
		);
	
	$options['display_custom_main_menu'] = array(
			'id' => 'display_custom_main_menu',
			'label'   => __( 'Display Main Menu Items on Frontpage', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'description' => __( 'Display main menu items on frontpage instead of primary menu.', 'cactus' ),
			'default' => '1',
		);
		
	$cactus_sections = cactus_get_sections();
		
	$default_menu_items = array();
	foreach( $cactus_sections as $key => $value ){
		if(isset($value['menu_title']) && $value['menu_title'] !='' ){
			if(!isset($value['hide']) || $value['hide'] != '1' )
				$default_menu_items[] = array('title'=>$value['menu_title'],'link'=>'#'.$key,'icon'=>'');
		}
	}
	
	$options['frontpage_menu'] = array(
				'id' => 'frontpage_menu',
				'label'   => __( 'Main Menu Items', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Menu Item', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				),
				'default' =>  $default_menu_items
				);
		
	/* Inline Header Options */
	$options['inline_header_menu_position'] = array(
			'id' => 'inline_header_menu_position',
			'label'   => __( 'Menu Position', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			'transport' => $transport,
			//'choices' => array('left'=> __( 'Left', 'cactus' ),'right'=> __( 'Right', 'cactus' ),'center'=> __( 'Center', 'cactus' ),'justify'=> __( 'Justified', 'cactus' )),
			'choices' => array(
				'left'=> array('label'=>__( 'Left', 'cactus' ),'url'=> $imagepath.'customize/header-inline-menuleft.png'),
				'right'=> array('label'=>__( 'Right', 'cactus' ),'url'=> $imagepath.'customize/header-inline-menuright.png'),
				'center'=> array('label'=>__( 'Center', 'cactus' ),'url'=> $imagepath.'customize/header-inline-menucenter.png'),
				'justify'=> array('label'=>__( 'Justified', 'cactus' ),'url'=> $imagepath.'customize/header-inline-menujustify.png'),
				),
			'default' => 'right',
		);
	
	/* Classic Header Options */
	$options['classic_header_logo_left'] = array(
				'id' => 'classic_header_logo_left',
				'label'   => __( 'Widgets: Logo Row(Left)', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Item', 'cactus' ),
							'field' => 'text',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'text'=>array('type'=>'text','default'=>'','label'=> __( 'Text', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> __( 'Link', 'cactus' )),
					'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'cactus' )),
				),
				'default' =>  array(
					/*array(
						"icon" => "",
						"text" => "",
						"link" => "",
						"target" => "_self",
						),*/
						)
				);
				
	$options['classic_header_logo_right'] = array(
				'id' => 'classic_header_logo_right',
				'label'   => __( 'Widgets: Logo Row(Right)', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Item', 'cactus' ),
							'field' => 'text',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'text'=>array('type'=>'text','default'=>'','label'=> __( 'Text', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> __( 'Link', 'cactus' )),
					'target'=>array('type'=>'select','default'=>'', 'choices'=> $target, 'label'=> __( 'Target', 'cactus' )),
				),
				'default' =>  array(
					array(
						"icon" => 'fa-envelope',
						"text" => "admin@domain.com",
						"link" => "",
						"target" => "_self",
						),
					array(
						"icon" => 'fa-phone',
						"text" => "011 322 44 56",
						"link" => "",
						"target" => "_self",
						),
					)
				);
	
	$options['classic_header_logo_position'] = array(
			'id' => 'classic_header_logo_position',
			'label'   => __( 'Logo Position', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			'transport' => $transport,
			//'choices' => array('left'=> __( 'Left', 'cactus' ),'center'=> __( 'Center', 'cactus' )),
			'choices' => array(
				'left'=> array('label'=>__( 'Left', 'cactus' ),'url'=> $imagepath.'customize/header-classic-logoleft.png'),
				'center'=> array('label'=>__( 'Center', 'cactus' ),'url'=> $imagepath.'customize/header-classic-logocenter.png'),
				),
			'default' => 'left',
		);
	
	$options['classic_header_menu_position'] = array(
			'id' => 'classic_header_menu_position',
			'label'   => __( 'Menu Position', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			'transport' => $transport,
			//'choices' => array('left'=> __( 'Left', 'cactus' ),'center'=> __( 'Center', 'cactus' ),'justify'=> __( 'Justified', 'cactus' )),
			'choices' => array(
				'left'=> array('label'=>__( 'Left', 'cactus' ),'url'=> $imagepath.'customize/header-classic-menuleft.png'),
				'center'=> array('label'=>__( 'Center', 'cactus' ),'url'=> $imagepath.'customize/header-classic-menucenter.png'),
				),
			'default' => 'left',
		);
		
	
	/* Split Header Options */

	$default_menu_items = array(
			array('title'=> 'Menu Item 1','link'=>'#','icon'=>''),
			array('title'=> 'Menu Item 2','link'=>'#','icon'=>''),
			array('title'=> 'Menu Item 3','link'=>'#','icon'=>''),
			array('title'=> 'Menu Item 4','link'=>'#','icon'=>''),
			);
	$options['split_header_left_menu'] = array(
			'id' => 'split_header_left_menu',
			'label'   => __( 'Left Menu Items', 'cactus' ),
			'section' => $section,
			'type'    => 'repeater',
			'transport' => $transport,
			'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('Menu Item', 'cactus' ),
					'field' => 'title',),
			'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				
				),
			'default' =>  $default_menu_items
		);
				
	$options['split_header_menu_position'] = array(
			'id' => 'split_header_menu_position',
			'label'   => __( 'Menu Position', 'cactus' ),
			'section' => $section,
			'type'    => 'radio-image',
			'transport' => $transport,
			//'choices' => array('justify'=> __( 'Justified', 'cactus' ),'inside'=> __( 'Inside', 'cactus' ),'outside'=> __( 'Outside', 'cactus' )),
			'choices' => array(
				'justify'=> array('label'=>__( 'Justified', 'cactus' ),'url'=> $imagepath.'customize/header-split-justify.png'),
				'inside'=> array('label'=>__( 'Inside', 'cactus' ),'url'=> $imagepath.'customize/header-split-inside.png'),
				'outside'=> array('label'=>__( 'Outside', 'cactus' ),'url'=> $imagepath.'customize/header-split-outside.png'),
				),
			'default' => 'outside',
		);
	
	// Panel Sections
	$panel = 'frontpage-sections';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Cactus: Frontpage Sections', 'cactus' ),
		'priority' => '6'
	);
	
	foreach( $cactus_sections as $key => $value ){
		
		$section_hide = cactus_option_saved('section_hide_'.$key);
		/**** Section ****/
		$section = 'section-'.$key;
	
		$sections[] = array(
			'id' => $section,
			'title' => $value['section_name'],
			'priority' => '10',
			'panel' => $panel
		);
		

		$options['section_hide_'.$key] = array(
				'id' => 'section_hide_'.$key,
				'label'   => __( 'Hide Section', 'cactus' ),
				'section' => $section,
				'type'    => 'checkbox',
				'default' => $value['hide'],
				'transport' => 'postMessage',
			);
			
	
			
		switch($key){
			
			case "service":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => $transport,
					//'choices' => array( 1=> sprintf(__('Style %s','cactus' ), 1), 2=> sprintf(__('Style %s','cactus' ), 2) ),
					'choices' => array(
						'1'=> array('label'=> sprintf(__('Style %s','cactus' ), 1),'url'=> $imagepath.'customize/services-style1.png'),
						'2'=> array('label'=> sprintf(__('Style %s','cactus' ), 2),'url'=> $imagepath.'customize/services-style2.png'),
					),
					'default' => '1'
				);
			break;
			case "works":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => $transport,
					//'choices' => array( 1 => sprintf(__('Style %s','cactus' ), 1), 2 => sprintf(__('Style %s','cactus' ), 2) ),
					'choices' => array(
						'1'=> array('label'=> sprintf(__('Style %s','cactus' ), 1),'url'=> $imagepath.'customize/works-style1.png'),
						'2'=> array('label'=> sprintf(__('Style %s','cactus' ), 2),'url'=> $imagepath.'customize/works-style2.png'),
					),
					'default' => '1'
				);
			break;
			
			case "promo":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => $transport,
					//'choices' => array( 1 => __('Image on Left','cactus' ), 2 => __('Image on Right','cactus' ) ),
					'choices' => array(
						'1'=> array('label'=>  __('Image on Left','cactus' ),'url'=> $imagepath.'customize/promo-imageleft.png'),
						'2'=> array('label'=> __('Image on Right','cactus' ),'url'=> $imagepath.'customize/promo-imageright.png'),
					),
					'default' => '1'
				);
				
			break;
			case "team":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => $transport,
					//'choices' => array( 1 => sprintf(__('Style %s','cactus' ), 1), 2 => sprintf(__('Style %s','cactus' ), 2) ),
					'choices' => array(
						'1'=> array('label'=> sprintf(__('Style %s','cactus' ), 1),'url'=> $imagepath.'customize/team-style1.png'),
						'2'=> array('label'=> sprintf(__('Style %s','cactus' ), 2),'url'=> $imagepath.'customize/team-style2.png'),
					),
					'default' => '1'
				);
			break;
			case "testimonial":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => $transport,
					//'choices' => array( 1 => sprintf(__('Style %s','cactus' ), 1), 2 => sprintf(__('Style %s','cactus' ), 2) ),
					'choices' => array(
						'1'=> array('label'=> sprintf(__('Style %s','cactus' ), 1),'url'=> $imagepath.'customize/testimonials-style1.png'),
						'2'=> array('label'=> sprintf(__('Style %s','cactus' ), 2),'url'=> $imagepath.'customize/testimonials-style2.png'),
					),
					'default' => '1'
				);
			break;
			case "contact":
			$options['style_'.$key] = array(
					'id' => 'style_'.$key,
					'label'   => __( 'Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio-image',
					'transport' => 'postMessage',
					//'choices' => array( 1 => __('Image on Left','cactus' ), 2 => __('Image on Right','cactus' ) ),
					'choices' => array(
						'1'=> array('label'=>  __('Image on Left','cactus' ),'url'=> $imagepath.'customize/contact-imageleft.png'),
						'2'=> array('label'=> __('Image on Right','cactus' ),'url'=> $imagepath.'customize/contact-imageright.png'),
					),
					'default' => '1'
				);
			break;
		}
		if( $key != 'banner' ){
			$options['section_title_'.$key] = array(
				'id' => 'section_title_'.$key,
				'label'   => __( 'Section Title', 'cactus' ),
				'section' => $section,
				'type'    => 'text',
				'description' =>'',
				'default' => $value['section_title'],
				'transport' => 'postMessage',
			);
			
			$options['section_subtitle_'.$key] = array(
				'id' => 'section_subtitle_'.$key,
				'label'   => __( 'Section SubTitle', 'cactus' ),
				'section' => $section,
				'type'    => 'textarea',
				'transport' => 'postMessage',
				'default' => $value['section_subtitle'],
			);
		}
		
		switch($key){
			
			case "banner":
				$options['type_'.$key] = array(
					'id' => 'type_'.$key,
					'label'   => __( 'Banner Type', 'cactus' ),
					'section' => $section,
					'type'    => 'select',
					'transport' => $transport,
					'choices' => array( 1=> sprintf(__('Slider','cactus' ), 1), 2=> sprintf(__('Video Background','cactus' ), 2) ),
					'default' => '1'
				);
				
				$options['banner'] = array(
				'id' => 'banner',
				'label'   => __( 'Slider', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Slide', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Big Title', 'cactus' )),
					'subtitle'=>array('type'=>'text','default'=>'','label'=> __( 'Sub-Title', 'cactus' )),
					'image'=>array('type'=>'image','default'=>'','label'=> __( 'Image', 'cactus' )),
					'btn_text'=>array('type'=>'text','default'=> __( 'Learn More', 'cactus' ),'label'=> __( 'Button Text', 'cactus' )),
					'btn_link'=>array('type'=>'text','default'=>'','label'=> __( 'Button Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						'title' => 'MODERN. CLEAN. ELEGANT.',
						"subtitle" => "Easy to Use. No Code or Design Skills Required.",
						"image" => $imagepath."bg.jpg",
						"btn_text" => "Learn More",
						"btn_link" => "",
						
						),
					) 
			);
			
			
			$options['video_poster_'.$key] = array(
				'id' => 'video_poster_'.$key,
				'label'   => __( 'Poster', 'cactus' ),
				'section' => $section,
				'type'    => 'image',
				'default' => '',
				'transport' => 'postMessage',
			);
			
			$options['video_'.$key] = array(
					'id' => 'video_'.$key,
					'label'   => __( 'YouTube/Vimeo Video URL', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => $transport,
					'default' => 'https://www.youtube.com/watch?v=0wCC3aLXdOw'
				);
			
			$options['video_title_'.$key] = array(
					'id' => 'video_title_'.$key,
					'label'   => __( 'Video Banner Title', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => 'CREATE WEBSITE IN MINUTES'
				);
				
			$options['video_subtitle_'.$key] = array(
					'id' => 'video_subtitle_'.$key,
					'label'   => __( 'Video Banner Subtitle', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => $transport,
					'default' => 'Just Drag & Drop. No Code or Design Skills Required.'
				);
				
			$options['button_text_'.$key] = array(
					'id' => 'button_text_'.$key,
					'label'   => __( 'Video Banner Button Text', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => __( 'Read More', 'cactus' ),
				);
				
			$options['button_link_'.$key] = array(
					'id' => 'button_link_'.$key,
					'label'   => __( 'Video Banner Button Link', 'cactus' ),
					'section' => $section,
					'transport' => 'postMessage',
					'type'    => 'text',
					'default' => ''
				);
			
			$options['text_align_'.$key] = array(
					'id' => 'text_align_'.$key,
					'label'   => __( 'Text Align', 'cactus' ),
					'section' => $section,
					'transport' => 'postMessage',
					'type'    => 'radio',
					'default' => 'center',
					'choices' => array( 'left'=>__( 'Align Left', 'cactus' ),'center'=>__( 'Align Center', 'cactus' ),'right'=>__( 'Align Right', 'cactus' ))
				);
				
			$options['bottom_separator_'.$key] = array(
					'id' => 'bottom_separator_'.$key,
					'label'   => __( 'Bottom Separator', 'cactus' ),
					'section' => $section,
					//'transport' => 'postMessage',
					'type'    => 'checkbox',
					'default' => ''
				);
			$options['separator_type_'.$key] = array(
					'id' => 'separator_type_'.$key,
					'label'   => __( 'Separator Type', 'cactus' ),
					'section' => $section,
					'type'    => 'select',
					//'transport' => $transport,
					'choices' => array( 'diagonal'=>__( 'Diagonal', 'cactus' ),
										'diagonal-reverse'=>__( 'Diagonal Reverse', 'cactus' ),
										'triangle-up'=>__( 'Triangle Up', 'cactus' ),
										'triangle-down'=>__( 'Triangle Down', 'cactus' ),
										'big-triangle-up'=>__( 'Big Triangle Up', 'cactus' ),
										'big-triangle-down'=>__( 'Big Triangle Down', 'cactus' ),
										'curve-up'=>__( 'Curve Up', 'cactus' ),
										'curve-down'=>__( 'Curve Down', 'cactus' ),
										'cloud'=>__( 'Cloud', 'cactus' ),
										),
					'default' => 'cloud'
				);
			$options['separator_color_'.$key] = array(
					'id' => 'separator_color_'.$key,
					'label'   => __( 'Separator Color', 'cactus' ),
					'section' => $section,
					'transport' => 'postMessage',
					'type'    => 'color',
					'default' => '#fff'
				);
			$options['separator_height_'.$key] = array(
					'id' => 'separator_height_'.$key,
					'label'   => __( 'Separator Height', 'cactus' ),
					'section' => $section,
					'transport' => 'postMessage',
					'type'    => 'text',
					'default' => '100'
				);
				
			break;
			
			case "service":
				
				$options['columns_'.$key] = array(
					'id' => 'columns_'.$key,
					'label'   => __( 'Columns', 'cactus' ),
					'section' => $section,
					'type'    => 'select',
					'transport' => $transport,
					'choices' => array( 2=>2,3=>3,4=>4 ),
					'default' => '2'
				);
				$options['service'] = array(
				'id' => 'service',
				'label'   => __( 'Service', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Service', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'icon_type'=>array('type'=>'select','default'=>'icon','choices'=>array('icon'=>esc_attr__( 'Font-awsome Icon', 'cactus' ),'image'=>esc_attr__( 'Image Icon', 'cactus' )),'label'=> esc_attr__( 'Icon Type', 'cactus' )),
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> esc_attr__( 'Font-awsome Icon', 'cactus' ),'description'=>  sprintf(__( 'Full list of FA icons could be found at <br />
<a href="%s" target="_blank">%s</a>', 'cactus' ),esc_url('http://fontawesome.io/icons/'),esc_url('http://fontawesome.io/icons/'))),
					'image'=>array('type'=>'image','default'=>'','label'=> esc_attr__( 'Image Icon', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> esc_attr__( 'Title', 'cactus' )),
					'text'=>array('type'=>'textarea','default'=> '','label'=> esc_attr__( 'Text', 'cactus' )),
					'title_link'=>array('type'=>'text','default'=>'','label'=> esc_attr__( 'Title Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"icon_type" => "icon",
						"icon" => "heart-o",
						"image" => "",
						"title" => 'Lorem ipsum',
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor, ut sollicitudin turpis. Aliquam in magna sodales, rutrum erat vel, sollicitudin quam.",
						"title_link" => "",
						),
					array(
						"icon_type" => "icon",
						"icon" => "plane",
						"image" => "",
						'title' => 'Lorem ipsum',
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor, ut sollicitudin turpis. Aliquam in magna sodales, rutrum erat vel, sollicitudin quam.",
						"title_link" => "",
						),
					array(
						"icon_type" => "icon",
						"icon" => "tree",
						"image" => "",
						'title' => 'Lorem ipsum',
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor, ut sollicitudin turpis. Aliquam in magna sodales, rutrum erat vel, sollicitudin quam.",
						"title_link" => "",
						),
					array(
						"icon_type" => "icon",
						"icon" => "home",
						"image" => "",
						'title' => 'Lorem ipsum',
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut egestas dolor, ut sollicitudin turpis. Aliquam in magna sodales, rutrum erat vel, sollicitudin quam.",
						"title_link" => "",
						),
		
					) 
			);
			
			break;
			
			case "works":

				$options['columns_'.$key] = array(
					'id' => 'columns_'.$key,
					'label'   => __( 'Columns', 'cactus' ),
					'section' => $section,
					'type'    => 'select',
					'transport' => 'postMessage',
					'choices' => array( 2=>2,3=>3,4=>4 ),
					'default' => '4'
				);
				
				$options['works'] = array(
				'id' => 'works',
				'label'   => __( 'Works', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => 'postMessage',
				'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('Work', 'cactus' ),
					'field' => 'title',),
				'fields' => array(
					'title'=>array('type'=>'text','default'=>'','label'=> esc_attr__( 'Title', 'cactus' )),
					'image'=>array('type'=>'image','default'=>'','label'=> esc_attr__( 'Image', 'cactus' )),
					'link'=>array('type'=>'text','default'=>'','label'=> esc_attr__( 'Title Link', 'cactus' )),
					'tag'=>array('type'=>'text','default'=>'','label'=> esc_attr__( 'Group Title', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery1.jpg",
						"link" => "",
						"tag" => "Design",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery2.jpg",
						"link" => "",
						"tag" => "Web",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery3.jpg",
						"link" => "",
						"tag" => "Design",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery4.jpg",
						"link" => "",
						"tag" => "Web",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery5.jpg",
						"link" => "",
						"tag" => "Design",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery6.jpg",
						"link" => "",
						"tag" => "Web",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery7.jpg",
						"link" => "",
						"tag" => "Design",
						),
					array(
						'title' => esc_attr__('Portfolio Title', 'cactus' ),
						"image" => $imagepath."gallery8.jpg",
						"link" => "",
						"tag" => "Web",
						),
		
					) 
			);
			break;
			
			case "promo":
		
				$options['image_'.$key] = array(
					'id' => 'image_'.$key,
					'label'   => __( 'Image', 'cactus' ),
					'section' => $section,
					'type'    => 'image',
					'default' => $imagepath.'promo1.jpg',
					'transport' => 'postMessage',
				);
				
				$options['text_'.$key] = array(
					'id' => 'text_'.$key,
					'label'   => __( 'Text', 'cactus' ),
					'section' => $section,
					'type'    => 'textarea',
					'transport' => 'postMessage',
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pretium, ante id semper congue, metus turpis ullamcorper libero, at fringilla augue leo sed neque. Suspendisse elementum et enim in cursus. Vestibulum eget nibh dapibus, commodo magna quis, posuere risus. Sed sit amet arcu neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis tempus finibus risus, bibendum rhoncus augue aliquam quis. Nulla urna turpis, porta eget tristique aliquam, suscipit fringilla sem. Duis volutpat metus non elit tempor sagittis.'
				);
				
				$options['button_text_'.$key] = array(
					'id' => 'button_text_'.$key,
					'label'   => __( 'Button Text', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => __( 'Read More', 'cactus' ),
				);
				
				$options['button_link_'.$key] = array(
					'id' => 'button_link_'.$key,
					'label'   => __( 'Button Link', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => ''
				);
			
			break;
			
			case "team":
				
				$options['columns_'.$key] = array(
					'id' => 'columns_'.$key,
					'label'   => __( 'Columns', 'cactus' ),
					'section' => $section,
					'transport' => $transport,
					'type'    => 'select',
					'choices' => array( 2=>2,3=>3,4=>4 ),
					'default' => '4'
				);
				
				$options['team'] = array(
				'id' => 'team',
				'label'   => __( 'Member', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Member', 'cactus' ),
							'field' => 'name',),
				'fields' => array(
					'avatar'=>array('type'=>'image','default'=>'','label'=> __( 'Avatar', 'cactus' )),
					'name'=>array('type'=>'text','default'=>'','label'=> __( 'Name', 'cactus' )),
					'byline'=>array('type'=>'text','default'=> '','label'=> __( 'Byline', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"avatar" => $imagepath.'team1.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"link" => "",
						),
					array(
						"avatar" => $imagepath.'team2.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"link" => "",
						),
					array(
						"avatar" => $imagepath.'team3.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"link" => "",
						),
					array(
						"avatar" => $imagepath.'team4.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"link" => "",
						),
					)
				);
			
			break;
			
			case "counter":
			
				$options['columns_'.$key] = array(
					'id' => 'columns_'.$key,
					'label'   => __( 'Columns', 'cactus' ),
					'section' => $section,
					'type'    => 'select',
					'choices' => array( 2=>2,3=>3,4=>4 ),
					'default' => '4'
				);
				
				$options['counter'] = array(
				'id' => 'counter',
				'label'   => __( 'Counter', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Item', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awsome Icon', 'cactus' ),'description'=>  sprintf(__( 'Full list of FA icons could be found at <br />
<a href="%s" target="_blank">%s</a>', 'cactus' ),esc_url('http://fontawesome.io/icons/'),esc_url('http://fontawesome.io/icons/'))),
					'number'=>array('type'=>'text','default'=> '100','label'=> __( 'Number', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						'title'=> 'Themes',
						'icon'=> 'heart-o',
						'number'=> '20',
						),
					array(
						'title'=> 'Developers',
						'icon'=> 'cogs',
						'number'=> '100',
						),
					array(
						'title'=> 'Projects',
						'icon'=> 'database',
						'number'=> '1360',
						),
					array(
						'title'=> 'Customers',
						'icon'=> 'user',
						'number'=> '80000',
						),
		
					) 
				);
			break;
			
			case "testimonial":
			
				$options['testimonial'] = array(
				'id' => 'testimonial',
				'label'   => __( 'Testimonial', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Testimonial', 'cactus' ),
							'field' => 'name',),
				'fields' => array(
					'avatar'=>array('type'=>'image','default'=>'','label'=> __( 'Avatar', 'cactus' )),
					'name'=>array('type'=>'text','default'=>'','label'=> __( 'Name', 'cactus' )),
					'byline'=>array('type'=>'text','default'=> '','label'=> __( 'Byline', 'cactus' )),
					'text'=>array('type'=>'textarea','default'=> '','label'=> __( 'Text', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"avatar" => $imagepath.'testimonial-img-1.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque ac sapien in imperdiet. Pellentesque eu venenatis erat. Nulla viverra lacus nibh. Vivamus lacinia sapien metus, non semper tortor ullamcorper non.",
						),
					array(
						"avatar" => $imagepath.'testimonial-img-2.jpg',
						"name" => "John Doe",
						"byline" => "Manager",
						"text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque ac sapien in imperdiet. Pellentesque eu venenatis erat. Nulla viverra lacus nibh. Vivamus lacinia sapien metus, non semper tortor ullamcorper non.",
						),
					)
				);
			break;
			
			case "clients":
			$options['clients'] = array(
				'id' => 'clients',
				'label'   => __( 'Clients', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Client', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'image'=>array('type'=>'image','default'=>'','label'=> __( 'Image', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"image" => $imagepath.'client1.png',
						"title" => "",
						"link" => "",
						),
					array(
						"image" => $imagepath.'client2.png',
						"title" => "",
						"link" => "",
						),
					array(
						"image" => $imagepath.'client3.png',
						"title" => "",
						"link" => "",
						),
					array(
						"image" => $imagepath.'client4.png',
						"title" => "",
						"link" => "",
						),
					array(
						"image" => $imagepath.'client1.png',
						"title" => "",
						"link" => "",
						),
					array(
						"image" => $imagepath.'client2.png',
						"title" => "",
						"link" => "",
						),
					
					)
				);
				
			break;
			
			case "news":
				$options['posts_num_'.$key] = array(
					'id' => 'posts_num_'.$key,
					'label'   => __( 'Posts Num', 'cactus' ),
					'section' => $section,
					'default' => '3',
					'type'    => 'text',
				);
			
				$options['news_column_'.$key] = array(
					'id' => 'news_columns_'.$key,
					'label'   => __( 'Columns', 'cactus' ),
					'section' => $section,
					'default' => '3',
					'type'    => 'select',
					'choices' => array(2=>2,3=>3,4=>4,),
				);
				
				$options['button_text_'.$key] = array(
					'id' => 'button_text_'.$key,
					'label'   => __( 'Button Text', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => __( 'View The Blog', 'cactus' ),
				);
				
				$options['button_link_'.$key] = array(
					'id' => 'button_link_'.$key,
					'label'   => __( 'Button Link', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => esc_url( home_url( '/blog/' ) )
				);
			break;
			
			case "contact":
				
				$options['address_'.$key] = array(
					'id' => 'address_'.$key,
					'label'   => __( 'Address', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => __( '49 Costa Street, New York City, USA', 'cactus' ),
					'transport' => 'postMessage',
				);
				$options['email_'.$key] = array(
					'id' => 'email_'.$key,
					'label'   => __( 'Email', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => 'support@domain.com',
					'transport' => 'postMessage',
				);
				$options['tel_'.$key] = array(
					'id' => 'tel_'.$key,
					'label'   => __( 'Tel', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => '595 12 34 567',
					'transport' => 'postMessage',
				);
				
				$options['image_'.$key] = array(
					'id' => 'image_'.$key,
					'label'   => __( 'Image', 'cactus' ),
					'section' => $section,
					'type'    => 'image',
					'default' => $imagepath.'promo1.jpg',
					'transport' => 'postMessage',
				);
				
				$options['google_map_address_'.$key] = array(
					'id' => 'google_map_address_'.$key,
					'label'   => __( 'Google Map Address', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => __( '49 Costa Street, New York City, USA', 'cactus' ),
				);
				
				$options['google_map_api_'.$key] = array(
					'id' => 'google_map_api_'.$key,
					'label'   => __( 'Google Map API Key', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => '',
				);
				
				$options['google_map_height_'.$key] = array(
					'id' => 'google_map_height_'.$key,
					'label'   => __( 'Google Map Height', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => '650px',
				);
				
				$options['google_map_zoom_'.$key] = array(
					'id' => 'google_map_zoom_'.$key,
					'label'   => __( 'Google Map Zoom', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default' => '15',
				);
				$plugin = 'cactus-companion';
				$plugin_status = Cactus_Plugin_Install_Helper::instance()->check_plugin_state($plugin);

				if ( $plugin_status == 'install' || $plugin_status == 'activate' ) {
				$description = __( 'Install & active plugin "Cactus Companion" to enable the contact form & google map.', 'cactus' ). Cactus_Plugin_Install_Helper::instance()->get_button_html( $plugin );
				
				$options['notice_'.$key] = array(
					'id' => 'notice_'.$key,
					'label'   => __( 'Contact From', 'cactus' ),
					'section' => $section,
					'type'    => 'content',
					'default' => '',
					'description' => $description,
				);
				
				}				
			break;
			
			case "shop":
				$options['items_'.$key] = array(
					'id' => 'items_'.$key,
					'label'   => __( 'Number of Items', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'default'     => '4',
					'transport' => 'postMessage',
				);
				
				$woo_categories = cactus_get_woo_categories();


				$options['categories_'.$key] = array(
					'id' => 'categories_'.$key,
					'label'   => __( 'Categories', 'cactus' ),
					'section' => $section,
					'type'    => 'multiple-select',
					'default'     => '',
					'transport' => ' postMessage', 
					'sanitize_callback' => 'cactus_sanitize_woo_categories',
					'choices' => $woo_categories,
				);
				

				$options['orderby_'.$key] = array(
					'id' => 'orderby_'.$key,
					'label'   => __( 'Order By', 'cactus' ),
					'section' => $section,
					'type'    => 'radio',
					'transport' => 'postMessage', 
					'default' => 'date',
					'choices' => array('date'=>__( 'Date', 'cactus' ), 'id'=>__( 'ID', 'cactus' ), 'id'=>__( 'ID', 'cactus' ), 'menu_order'=>__( 'Menu Order', 'cactus' ), 'popularity'=>__( 'Popularity', 'cactus' ) , 'rand'=>__( 'Rand', 'cactus' ), 'rating'=>__( 'Rating', 'cactus' ), 'title'=>__( 'Title', 'cactus' ))
				);
				
				$options['order_'.$key] = array(
					'id' => 'order_'.$key,
					'label'   => __( 'Order', 'cactus' ),
					'section' => $section,
					'type'    => 'radio',
					'transport' => 'postMessage', 
					'default' => 'DESC',
					'choices' => array('ASC'=>__( 'Ascending', 'cactus' ), 'DESC'=>__( 'Descending', 'cactus' ))
				);
				
				$options['shortcode_'.$key] = array(
					'id' => 'shortcode_'.$key,
					'label'   => __( 'WooCommerce shortcode', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage', 
					'default' => '',
				);
				
				$options['button_text_'.$key] = array(
					'id' => 'button_text_'.$key,
					'label'   => __( 'Button Text', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => __( 'More Products', 'cactus' ),
				);
				
				$options['button_link_'.$key] = array(
					'id' => 'button_link_'.$key,
					'label'   => __( 'Button Link', 'cactus' ),
					'section' => $section,
					'type'    => 'text',
					'transport' => 'postMessage',
					'default' => esc_url( home_url( '/shop/' ) )
				);
			break;
			}
		
		$background_color = isset($value['background_color'])?$value['background_color']:'#ffffff';
		$background_image = isset($value['background_image'])?$value['background_image']:'';
		$font_color = 0;
		if($key=='counter')
			$font_color = 1;
		
		if($font_color=='')
			$font_color = 0;
		if($key == 'banner')
			$font_color = '1';
		$options['font_color_'.$key] = array(
			'id' => 'font_color_'.$key,
			'label'   => __( 'Color Scheme', 'cactus' ),
			'section' => $section,
			'type'    => 'radio',
			'default' => $font_color,
			'choices' => array('0'=>__( 'Default Color', 'cactus' ), '1'=>__( 'Light Color', 'cactus' )),
			'transport' => 'postMessage',
		);
		
		if( $key != 'banner' ){
			$options['background_color_'.$key] = array(
				'id' => 'background_color_'.$key,
				'label'   => __( 'Background Color', 'cactus' ),
				'section' => $section,
				'type'    => 'color',
				'default' => $background_color,
				'transport' => 'postMessage',
			);
			$options['background_image_'.$key] = array(
				'id' => 'background_image_'.$key,
				'label'   => __( 'Background Image', 'cactus' ),
				'section' => $section,
				'type'    => 'image',
				'default' => $background_image,
				'transport' => 'postMessage',
			);
			
			$options['background_parallax_'.$key] = array(
				'id' => 'background_parallax_'.$key,
				'label'   => __( 'Parallax Scrolling', 'cactus' ),
				'section' => $section,
				'type'    => 'checkbox',
				'transport' => 'postMessage',
				'default' => '',
			);
		}
		$options['section_id_'.$key] = array(
			'id' => 'section_id_'.$key,
			'label'   => __( 'Section ID', 'cactus' ),
			'section' => $section,
			'type'    => 'text',
			'default' => $key,
			'transport' => 'postMessage',
		);

	}
	
				
	// Panel Footer
	$section = 'panel-footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Cactus: Footer Options', 'cactus' ),
		'priority' => '9'
	);
	
	$options['display_footer_widgets'] = array(
			'id' => 'display_footer_widgets',
			'label'   => __( 'Display Footer Widgets', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => 'postMessage', 
			'default' => '',
		);
	
	$options['display_scroll_to_top'] = array(
			'id' => 'display_scroll_to_top',
			'label'   => __( 'Enable Scroll to Top Button', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => 'postMessage', 
			'default' => '1',
		);
		
	$options['footer_style'] = array(
					'id' => 'footer_style',
					'label'   => __( 'Footer Style', 'cactus' ),
					'section' => $section,
					'type'    => 'radio',
					'default'     => '1',
					'transport' => $transport,
					'choices' => array('1' => sprintf(__( 'Style %s', 'cactus' ),1),'2' => sprintf(__( 'Style %s', 'cactus' ),2)),
				);
	
	
	$options['footer_left_icons'] = array(
				'id' => 'footer_left_icons',
				'label'   => __( 'Footer Left Icons', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				//'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Icon', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"icon" => 'map-marker',
						"title" => "Your address",
						"link" => "",
						),
					array(
						"icon" => 'envelope',
						"title" => "contact@domain.com",
						"link" => "",
						),
					array(
						"icon" => 'phone-square',
						"title" => "0 123 456 789",
						"link" => "",
						),
				
					)
				);
		
	$options['footer_logo'] = array(
			'id' => 'footer_logo',
			'label'   => __( 'Footer Logo', 'cactus' ),
			'section' => $section,
			'type'    => 'image',
			'default' => $imagepath.'logo.png',
		);
	$options['display_footer_icons'] = array(
			'id' => 'display_footer_icons',
			'label'   => __( 'Display Footer Icons', 'cactus' ),
			'section' => $section,
			'type'    => 'checkbox',
			'transport' => 'postMessage', 
			'default' => '1',
		);
	
	$options['footer_icons'] = array(
				'id' => 'footer_icons',
				'label'   => __( 'Footer Icons', 'cactus' ),
				'section' => $section,
				'type'    => 'repeater',
				'transport' => $transport,
				'row_label' => array(
							'type' => 'field',
							'value' => esc_attr__('Icon', 'cactus' ),
							'field' => 'title',),
				'fields' => array(
					'icon'=>array('type'=>'iconpicker','default'=>'','label'=> __( 'Font-awesome Icon', 'cactus' )),
					'title'=>array('type'=>'text','default'=>'','label'=> __( 'Title', 'cactus' )),
					'link'=>array('type'=>'text','default'=> '','label'=> __( 'Link', 'cactus' )),
				
				),
				'default' =>  array(
					array(
						"icon" => 'twitter',
						"title" => "",
						"link" => "",
						),
					array(
						"icon" => 'facebook',
						"title" => "",
						"link" => "",
						),
					array(
						"icon" => 'instagram',
						"title" => "",
						"link" => "",
						),
					array(
						"icon" => 'google-plus',
						"title" => "",
						"link" => "",
						),
					array(
						"icon" => 'youtube',
						"title" => "",
						"link" => "",
						),
					)
				);
	
	$options['copyright'] = array(
		'id' => 'copyright',
		'label'   => __( 'Copyright', 'cactus' ),
		'section' => $section,
		'type'    => 'cactus_editor',
		'transport' => 'postMessage',
		'default' => ''
		);
	
	
			

	// Panel Typography
	$panel = 'panel-typography';
	
	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Cactus: Typography', 'cactus' ),
		'priority' => '11'
	);
	
	$section = 'section-font-family';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Family', 'cactus' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['headings_font_family'] = array(
		'id' => 'headings_font_family',
		'label'   => __( 'Headings font family', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Montserrat'
	);
	
	$options['body_font_family'] = array(
		'id' => 'body_font_family',
		'label'   => __( 'Body font family', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Montserrat'
	);
	
	$section = 'section-font-size';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Font Size', 'cactus' ),
		'priority' => '11',
		'panel' => $panel
	);
	
	$options['body_font_size'] = array(
		'id' => 'body_font_size',
		'label'   => __( 'Body Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,30,1), range(8,30,1)),
		'default' => '14',
	);
	
	$options['h1_font_size'] = array(
		'id' => 'h1_font_size',
		'label'   => __( 'H1 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '36'
	);
	$options['h2_font_size'] = array(
		'id' => 'h2_font_size',
		'label'   => __( 'H2 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '30'
	);
	$options['h3_font_size'] = array(
		'id' => 'h3_font_size',
		'label'   => __( 'H3 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '24'
	);
	$options['h4_font_size'] = array(
		'id' => 'h4_font_size',
		'label'   => __( 'H4 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '20'
	);
	$options['h5_font_size'] = array(
		'id' => 'h5_font_size',
		'label'   => __( 'H5 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '18'
	);
	$options['h6_font_size'] = array(
		'id' => 'h6_font_size',
		'label'   => __( 'H6 Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,50,1), range(8,50,1)),
		'default' => '16'
	);
	
	$section = 'section-font-size-section';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section Font Size', 'cactus' ),
		'priority' => '11',
		'panel' => $panel
	);
	
	$options['section_title_font_size'] = array(
		'id' => 'section_title_font_size',
		'label'   => __( 'Section Title Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,60,1), range(8,60,1)),
		'default' => '40',
		'transport' => 'postMessage',
	);
	$options['section_subtitle_font_size'] = array(
		'id' => 'section_subtitle_font_size',
		'label'   => __( 'Section Subtitle Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,30,1), range(8,30,1)),
		'default' => '14',
		'transport' => 'postMessage',
	);
	
	$options['section_item_title_font_size'] = array(
		'id' => 'section_item_title_font_size',
		'label'   => __( 'Section Item Ttile Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,30,1), range(8,30,1)),
		'default' => '20',
		'transport' => 'postMessage',
	);
	
	$options['section_content_font_size'] = array(
		'id' => 'section_content_font_size',
		'label'   => __( 'Section Content Font Size', 'cactus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' =>  array_combine(range(8,30,1), range(8,30,1)),
		'default' => '14',
		'transport' => 'postMessage',
	);
	
	
	// Panel Pages & Posts Options
	$panel = 'panel-pages-posts-options';
	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Cactus: Pages & Posts Options', 'cactus' ),
		'priority' => '14'
	);
	$section = 'section-posts-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Posts Settings', 'cactus' ),
		'priority' => '10',
		'panel' => $panel
	);
	
	$options['blog_list_style'] = array(
		'id' => 'blog_list_style',
		'label'   => __( 'Posts Archive Layout', 'cactus' ),
		'section' => $section,
		'type'    => 'radio-image',
		'transport' => $transport,
		//'choices' => array( 1 => __('Full Width Image','cactus' ), 2 => __('Side Image','cactus' ), 3 => __('Grid','cactus' ) ),
		'choices' => array(
				'1'=> array('label'=>__( 'Full Width Image', 'cactus' ),'url'=> $imagepath.'customize/blog-style1.png'),
				'2'=> array('label'=>__( 'Side Image', 'cactus' ),'url'=> $imagepath.'customize/blog-style2.png'),
				'3'=> array('label'=>__( 'Grid', 'cactus' ),'url'=> $imagepath.'customize/blog-style3.png'),
				),
		'default' => '1'
	);
	
			
			
	$section = 'section-sidebar-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sidebar Settings', 'cactus' ),
		'priority' => '11',
		'panel' => $panel
	);
	// Sidebar
	
	$options['page_sidebar_layout'] = array(
		'id' => 'page_sidebar_layout',
		'label'   => __( 'Sidebar: Pages', 'cactus' ),
		'section' => $section,
		'type'    => 'radio-image',
		'default' => 'right',
		//'choices' => array('no' =>__( 'No Sidebar', 'cactus' ),'left'=>__( 'Left Sidebar', 'cactus' ),'right'=>__( 'Right Sidebar', 'cactus' )),
		'choices' => array(
				'no'=> array('label'=>__( 'No Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-none.png'),
				'left'=> array('label'=>__( 'Left Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-left.png'),
				'right'=> array('label'=>__( 'Right Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-right.png'),
				),
		);
	
	$options['blog_sidebar_layout'] = array(
		'id' => 'blog_sidebar_layout',
		'label'   => __( 'Sidebar: Single Post', 'cactus' ),
		'section' => $section,
		'type'    => 'radio-image',
		'default' => 'right',
		//'choices' => array('no' =>__( 'No Sidebar', 'cactus' ),'left'=>__( 'Left Sidebar', 'cactus' ),'right'=>__( 'Right Sidebar', 'cactus' )),
		'choices' => array(
				'no'=> array('label'=>__( 'No Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-none.png'),
				'left'=> array('label'=>__( 'Left Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-left.png'),
				'right'=> array('label'=>__( 'Right Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-right.png'),
				),
		);
	
	$options['blog_archives_sidebar_layout'] = array(
		'id' => 'blog_archives_sidebar_layout',
		'label'   => __( 'Sidebar: Posts Archive', 'cactus' ),
		'section' => $section,
		'type'    => 'radio-image',
		'default' => 'right',
		'choices' => array('no' =>__( 'No Sidebar', 'cactus' ),'left'=>__( 'Left Sidebar', 'cactus' ),'right'=>__( 'Right Sidebar', 'cactus' )),
		'choices' => array(
				'no'=> array('label'=>__( 'No Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-none.png'),
				'left'=> array('label'=>__( 'Left Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-left.png'),
				'right'=> array('label'=>__( 'Right Sidebar', 'cactus' ),'url'=> $imagepath.'customize/sidebar-right.png'),
				),
		);
	

	$cactus_customizer_options = $options;
	
	$new_options = array();
	foreach( $options as $option ){
		if( isset($option['default']) ){
			$cactus_default_sections[$option['id']] = $option['default'];
			$key = CACTUS_TEXTDOMAIN.'['.$option['id'].']';
			$option['id'] = $key;
			$new_options[$key] = $option;
			}

		}
	// Adds the sections to the $options array
	$new_options['sections'] = $sections;

	// Adds the panels to the $options array
	$new_options['panels'] = $panels;
	
	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $new_options );
	return $options;

}
add_action( 'init', 'cactus_customizer_library_options' );