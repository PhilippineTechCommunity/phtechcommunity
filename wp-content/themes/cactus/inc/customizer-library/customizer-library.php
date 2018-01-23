<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
$path = str_replace( wp_normalize_path( WP_CONTENT_DIR ), WP_CONTENT_URL, wp_normalize_path( dirname( dirname( __FILE__ ) ) ) );

define( 'CUSTOMIZER_LIB_URI', $path.'/customizer-library');

// Continue if the Customizer_Library isn't already in use.
if ( ! class_exists( 'Customizer_Library' ) ) :

	// Helper functions to output the customizer controls.
	require plugin_dir_path( __FILE__ ) . 'extensions/interface.php';

	// Helper functions for customizer sanitization.
	require plugin_dir_path( __FILE__ ) . 'extensions/sanitization.php';

	// Helper functions to build the inline CSS.
	require plugin_dir_path( __FILE__ ) . 'extensions/style-builder.php';

	// Helper functions for fonts.
	require plugin_dir_path( __FILE__ ) . 'extensions/fonts.php';

	// Utility functions for the customizer.
	require plugin_dir_path( __FILE__ ) . 'extensions/utilities.php';

	// Customizer preview functions.
	require plugin_dir_path( __FILE__ ) . 'extensions/preview.php';

	// Textarea control
	if ( version_compare( $GLOBALS['wp_version'], '4.0', '<' ) ) {
		require plugin_dir_path( __FILE__ ) . 'custom-controls/textarea.php';
	}

	// Arbitrary content controls
	require plugin_dir_path( __FILE__ ) . 'custom-controls/content.php';

	require plugin_dir_path( __FILE__ ) . 'custom-controls/repeater/class-control-repeater.php';
	
	require plugin_dir_path( __FILE__ ) . 'custom-controls/iconpicker-control/class-customize-iconpicker-control.php';
	require plugin_dir_path( __FILE__ ) . 'custom-controls/customizer-radio-image/class-customize-control-radio-image.php';
	require plugin_dir_path( __FILE__ ) . 'custom-controls/select-multiple/class-select-multiple.php';
	require plugin_dir_path( __FILE__ ) . 'custom-controls/editor/editor-control.php';

	/**
	 * Class wrapper with useful methods for interacting with the theme customizer.
	 */
	class Customizer_Library {

		/**
		 * The one instance of Customizer_Library.
		 *
		 * @var   Customizer_Library_Styles    The one instance for the singleton.
		 */
		private static $instance;

		/**
		 * The array for storing $options.
		 *
		 * @var   array    Holds the options array.
		 */

		public $options = array();

		/**
		 * Instantiate or return the one Customizer_Library instance.
		 *
		 * @return Customizer_Library
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_options( $options = array() ) {
			$this->options = array_merge( $options, $this->options );
		}

		public function get_options() {
			return $this->options;
		}

	}

endif;