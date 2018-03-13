<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<?php
	$body_class = 'page blog';
	if ( is_page_template('template-sections.php') )
		$body_class .= ' frontpage';
	
?>
<body <?php body_class( $body_class ); ?>>
  <div class="wrapper">
        <!--Header-->
        <?php
		$header_image = get_header_image();
		if ($header_image)
			echo '<img class="header-image" src="'.esc_url($header_image).'" alt="" />';
		
		?>
        <?php 
		$header_style = cactus_option('header_style');
		if($header_style=='' || $header_style=='default' )
			$header_style = 'inline';
		get_template_part( 'template-parts/header/header', $header_style ); 
		
		?>