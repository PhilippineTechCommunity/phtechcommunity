<?php
	$class = 'cactus-navigation';
	$display_custom_main_menu = cactus_option('display_custom_main_menu');
	$header_menu_hover_style = cactus_option('header_menu_hover_style');
	$header_menu_hover_style .= ' cactus-main-nav cactus-nav-left';
	$addClass = '';
?>

<?php if( (is_page_template('template-sections.php') && $display_custom_main_menu == '1') /*|| is_customize_preview()*/ ){
	$addClass .= ' frontpage_menu_left_selective split_header_left_menu_selective';
	//if(!is_page_template('template-sections.php') || $display_custom_main_menu != '1')
		//$addClass .= ' hide';
	?>

<nav class="<?php echo $class.$addClass;?>" role="navigation">
  <?php
	
			$frontpage_menu = cactus_option('split_header_left_menu');
			echo '<ul id="top-menu-left" class="'.$header_menu_hover_style.'">';
			if(is_array($frontpage_menu) && !empty($frontpage_menu)):
  				foreach($frontpage_menu as $item):
					$icon = '';
					if( isset($item['icon']) && trim( $item['icon'] )!='' )
						$icon = '<i class="fa '.esc_attr($item['icon']).'"></i>';
					if(trim($item['title'] )!='')
					echo '<li><a href="' . esc_url( $item['link'] ) . '"><span>' . $icon.' '  . esc_attr( $item['title'] ) . '</span></a></li>';
				endforeach;
			endif;
			echo '</ul>';

	?>
</nav>
<?php }	?>

  <?php if( !is_page_template('template-sections.php') || $display_custom_main_menu != '1' /*|| is_customize_preview()*/ ){
	  $addClass = ' cactus-wp-menu';
	  //if( is_page_template('template-sections.php') && $display_custom_main_menu == '1')
	  //	$addClass .= ' hide';
	  ?>
<nav class="<?php echo $class.$addClass;?>" role="navigation">
  <?php

		   wp_nav_menu( array(
			'theme_location' => 'top-left',
			'menu_id'        => 'top-menu-left',
			'menu_class' => $header_menu_hover_style,
			'fallback_cb'    => 'cactus_menu_fallback',
			'container' =>'',
			'link_before' => '<span>',
   			'link_after' => '</span>',
		) );
	?>
</nav>
<?php }	?>
