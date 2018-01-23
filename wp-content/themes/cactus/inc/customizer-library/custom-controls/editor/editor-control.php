<?php
/**
 * Customize for Editor, extend the WP customizer
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cactus_editor_customize_register() {

class Cactus_Customize_Editor_Control extends WP_Customize_Control {
	/**
	 * Constructor.
	 *
	 * Supplied `$args` override class property defaults.
	 *
	 * If `$args['settings']` is not defined, use the $id as the setting ID.
	 *
	 * @since 3.4.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['editor_settings'] ) ) {
			$this->input_attrs['data-editor'] = wp_json_encode( $args['editor_settings'] );
		}
	}
	/**
	 * Render the control's content.
	 *
	 * @since 3.4.0
	 */
	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<textarea type="hidden" <?php $this->link(); ?> style="display:none;" id="<?php echo esc_attr( $this->id ); ?>"class='editorfield' ><?php echo esc_textarea( $this->value() ); ?></textarea>
			<a onclick="javascript:WPEditorWidget.toggleEditor('<?php echo esc_attr($this->id); ?>');" class="button edit-content-button"><?php _e( '(Edit)', 'cactus' ); ?></a>
		</label>
 		<?php
	}
	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		wp_enqueue_style( 'cactus_editor_css', get_template_directory_uri() . '/inc/customizer-library/custom-controls/editor/assets/css/editor.css', array(), CACTUS_VERSION );
		wp_enqueue_script(
			'cactus_editor_js', get_template_directory_uri() . '/inc/customizer-library/custom-controls/editor/assets/js/editor.js', array(
				'jquery',
				'customize-preview',
			), CACTUS_VERSION, true
		);		
	}
}

}

add_action( 'customize_register', 'cactus_editor_customize_register' );
