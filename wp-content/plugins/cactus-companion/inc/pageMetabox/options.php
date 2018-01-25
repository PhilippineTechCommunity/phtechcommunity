<?php

add_filter( 'cmb_meta_boxes', 'ccmb_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function ccmb_page_metaboxes( array $meta_boxes ) {

	$prefix = '_ccmb_';

	/**
	 * Metabox Slider
	 */
	$meta_boxes['cc_slideshow'] = array(
		'id'         => 'cc_slideshow',
		'title'      => __( 'Slider', 'cactus-companion' ),
		'pages'      => array( 'page' ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'slideshow',
				'type'        => 'group',
				'description' => '',
				'options'     => array(
					'group_title'   => __( 'Slide {#}', 'cactus-companion' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Slide', 'cactus-companion' ),
					'remove_button' => __( 'Remove Slide', 'cactus-companion' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => __( 'Big Title', 'cactus-companion' ),
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => __( 'Sub-Title', 'cactus-companion' ),
						'id'   => 'subtitle',
						'type' => 'text',
					),
					array(
						'name' => __( 'Image', 'cactus-companion' ),
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => __( 'Button Text', 'cactus-companion' ),
						'id'   => 'btn_text',
						'type' => 'text',
					),
					array(
						'name' => __( 'Button Link', 'cactus-companion' ),
						'id'   => 'btn_link',
						'type' => 'text',
					),
				),
			),
		),
	);



	/**
	 * Page options
	 */
	$meta_boxes['theme_options_metabox'] = array(
		'id'         => 'theme_options_metabox',
		'title'      => __( 'Page Options', 'cactus-companion' ),
		'pages'      => array( 'page', 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'fields'     => array(
			array(
				'name'    => __( 'Hide Page Title Bar', 'cactus-companion' ),
				'desc'    => '',
				'id'      => $prefix . 'hide_page_title_bar',
				'type'    => 'checkbox',
				'default' => ''
			),
			array(
				'name'    => __( 'Background Color', 'cactus-companion' ),
				'desc'    => '',
				'id'      => $prefix . 'bg_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
			array(
				'name' => __( 'Background Image', 'cactus-companion' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cactus-companion' ),
				'id'   => $prefix . 'bg_image',
				'type' => 'file',
			),
			array(
				'name'    => __( 'Sidebar', 'cactus-companion' ),
				'desc'    => '',
				'id'      => $prefix . 'sidebar',
				'type'    => 'radio',
				'default' => '',
				'options' => array(
					'' => __( 'Default', 'cactus-companion' ),
					'left' => __( 'Left Sidebar', 'cactus-companion' ),
					'right' => __( 'Right Sidebar', 'cactus-companion' ),
					'no' => __( 'No Sidebar', 'cactus-companion' ),
				),
			),
			
		)
	);

	return $meta_boxes;
}




add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
