<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Adds Ninja Forms widget.
 */
class NF_FormBlock {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		add_action( 'ninja_forms_loaded', array($this, 'nf_form_block_load' ) );
	}

	function nf_form_block_load() {
		// wait for Gutenberg to enqueue it's block assets
		add_action( 'enqueue_block_editor_assets', array ( $this, 'nf_form_block' ) );
	}

	function nf_form_block() {

		$js_dir  = Ninja_Forms::$url . 'assets/js/min/';

		// Once we have Gutenberg block javascript, we can enqueue our assets
		wp_enqueue_script(
			'nf-block',
			$js_dir . 'block.js',
			array( 'wp-blocks', 'wp-element' )
		);

		// we need to get our forms so that the block can build a dropdown
		// with the forms
		$forms = Ninja_Forms()->form()->get_forms();

		$nf_forms = array();

		// We only need form title and ID
		foreach ( $forms as $nf_form ) {
			$tmpArray = array( 'id' => $nf_form->get_id(), 'title' =>
				$nf_form->get_setting( 'title' ) );
			$nf_forms[] = $tmpArray;
		}
		$block_logo = NF_PLUGIN_URL . 'assets/img/nf-logo-dashboard.png';
		$thumbnail_logo = NF_PLUGIN_URL . 'assets/img/ninja-forms-app-header-logo.png';
		// Pass form id and title data to the javascript
		wp_localize_script( 'nf-block', 'ninja_forms', array(
			'nf_forms' => $nf_forms,
			'block_logo'     => $block_logo,
			'thumbnail_logo' => $thumbnail_logo
		) );
	}
}
