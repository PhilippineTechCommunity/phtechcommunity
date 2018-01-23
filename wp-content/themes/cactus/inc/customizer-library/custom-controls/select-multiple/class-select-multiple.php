<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function cactus_multiple_select_register() {
class Cactus_Customize_Control_Multiple_Select extends WP_Customize_Control {

/**
 * The type of customize control being rendered.
 */
public $type = 'multiple-select';


/**
	 * Loads the framework scripts/styles.
	 *
	 */
	public function enqueue() {
		wp_enqueue_script( 'cactus-customizer-select-multiple', get_template_directory_uri() . '/inc/customizer-library/custom-controls/select-multiple/js/script-select-multiple.js', array( 'jquery' ), '', true );

	}
/**
 * Displays the multiple select on the customize screen.
 */
public function render_content() {

if ( empty( $this->choices ) )
    return;
?>
    <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
            <?php
                foreach ( $this->choices as $value => $label ) {
                    $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                    echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                }
            ?>
        </select>
    </label>
<?php }

}
}

add_action( 'customize_register', 'cactus_multiple_select_register' );