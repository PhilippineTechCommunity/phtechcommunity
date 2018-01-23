<?php
	global $allowedtags;
	$header_style = cactus_option('header_style');
	$display_custom_main_menu = cactus_option('display_custom_main_menu');
	if($header_style=='')
		$header_style = 'default';
	$class = 'cactus-navigation';
	if($header_style=='classic')
		$class .= ' cactus-style-top-line-full';
	$header_menu_hover_style = cactus_option('header_menu_hover_style');
	$header_menu_hover_style .= ' cactus-main-nav cactus-nav-main';
	$addClass = '';
	
?>


<?php if( (is_page_template('template-sections.php') && $display_custom_main_menu == '1') /*|| is_customize_preview()*/ ){
	$addClass .= ' frontpage_menu_selective';
	//if(!is_page_template('template-sections.php') || $display_custom_main_menu != '1')
		//$addClass .= ' hide';
	?>
<nav class="<?php echo $class.$addClass;?>" role="navigation">
  <?php
	
			$frontpage_menu = cactus_option('frontpage_menu');
			echo '<ul id="top-menu" class="'.$header_menu_hover_style.'">';
			if(is_array($frontpage_menu) && !empty($frontpage_menu)):
  				foreach($frontpage_menu as $item):
					$icon = '';
					if( isset($item['icon']) && trim( $item['icon'] )!='')
						$icon = '<i class="fa '.esc_attr($item['icon']).'"></i>';
					if(trim( $item['title'] )!='')
					echo '<li><a href="' . esc_url( $item['link'] ) . '"><span>' . $icon.' '.wp_kses( $item['title'], $allowedtags ) . '</span></a></li>';
				endforeach;
			endif;
			echo '</ul>';

	?>
</nav>
<?php }	?>

  <?php if( !is_page_template('template-sections.php') || $display_custom_main_menu != '1' /*|| is_customize_preview()*/ ){
	  $addClass = ' cactus-wp-menu';
	 // if( is_page_template('template-sections.php') && $display_custom_main_menu == '1')
	  //	$addClass .= ' hide';
	  ?>
<nav class="<?php echo $class.$addClass;?>" role="navigation">
  <?php
	
		   wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'menu_class' => $header_menu_hover_style,
			'fallback_cb'    => 'cactus_menu_fallback',
			'container' =>'',
			'link_before' => '<span>',
   			'link_after' => '</span>',
		) );
	?>
</nav>
<?php }	?>

