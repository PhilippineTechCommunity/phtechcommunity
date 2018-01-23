<?php
	$header_text_color = get_header_textcolor();

?>
<?php if ( 'blank' != $header_text_color ) :?>

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
  <h1 class="site-name">
    <?php bloginfo( 'name' ); ?>
  </h1>
  </a>
<?php else:?>
<?php the_custom_logo(); ?>
<?php endif;?>
