<?php
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customizer_library_customize_preview_js() {
	
	$sections = cactus_get_sections();
	$sectionNames = array();
	foreach($sections as $key=>$section ){
		$sectionNames[] = $key;
		}
	
	wp_enqueue_script( 'customizer_library_customizer', CUSTOMIZER_LIB_URI . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
	
	wp_localize_script( 'customizer_library_customizer', 'cactus_customizer', array(
			
			'sections' => $sectionNames,

		)  );

}
add_action( 'customize_preview_init', 'customizer_library_customize_preview_js' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customizer_library_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'customizer_library_customize_register' );
