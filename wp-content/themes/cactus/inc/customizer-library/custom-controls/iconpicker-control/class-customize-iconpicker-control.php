<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action( 'customize_register', 'cactus_iconpicker_customize_register' );
function cactus_iconpicker_customize_register(){

	class Cactus_Customize_Iconpicker_Control extends WP_Customize_Control {

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
		
				<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			
			<?php
		}

		/**
		 * Enqueue required scripts and styles.
		 */
		public function enqueue() {
			wp_enqueue_script( 'cactus-fontawesome-iconpicker', get_stylesheet_directory_uri() . '/inc/customizer-library/custom-controls/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'cactus-iconpicker-control', get_stylesheet_directory_uri() . '/inc/customizer-library/custom-controls/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'cactus-fontawesome-iconpicker', get_stylesheet_directory_uri() . '/inc/customizer-library/custom-controls/iconpicker-control/assets/css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'cactus-fontawesome', get_stylesheet_directory_uri() . '/inc/customizer-library/custom-controls/iconpicker-control/assets/css/font-awesome.min.css' );
		}

	}
}