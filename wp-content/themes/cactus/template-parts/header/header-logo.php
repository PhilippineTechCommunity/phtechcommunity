<?php
if ( get_theme_mod( 'custom_logo' ) ) {
			$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			$logo = '<a href="'.esc_url( home_url( '/' ) ).'"><img src="' . esc_url( $logo[0] ) . '"></a>';
			echo $logo;
		}else{
?>
<?php
	$header_text_color = get_header_textcolor();

?>
<?php if ( 'blank' != $header_text_color ) :?>

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
  <h1 class="site-name">
    <?php bloginfo( 'name' ); ?>
  </h1>
  </a>
<?php endif;?>

<?php	
		}		
?>

