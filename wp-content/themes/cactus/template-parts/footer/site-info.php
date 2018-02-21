<?php
	global $allowedposttags;
	$footer_logo = cactus_option('footer_logo');
	$footer_icons = cactus_option('footer_icons');
	$display_footer_icons = cactus_option('display_footer_icons');
	$copyright = cactus_option('copyright');
	$footer_style = cactus_option('footer_style');
	$footer_left_icons = cactus_option('footer_left_icons');
	
	$hide1 = '';
	$hide2 = '';
	if( $footer_style=='' || $footer_style=='1' ){
		$hide2 = 'hide';
		}
	if( $footer_style=='2' ){
		$hide1 = 'hide';
		}
?>
<?php if($footer_style == '' || $footer_style == '1' || is_customize_preview() ):?>
<div class="footer-info-area style1 text-center <?php echo $hide1;?>">
      
	<?php 
	if ( $footer_logo != '' )
	echo '<div class="footer-logo cactus-footer-logo footer_logo_selective"><img src="'.esc_url($footer_logo).'" alt=""></div>';
	?>
    <?php 
	if (  $display_footer_icons == '1' || is_customize_preview()):
		$css_class = 'footer-sns cactus-footer-sns footer_icons_selective';
		if( $display_footer_icons !=1 && is_customize_preview() )
			$css_class  .= ' hide';
	
	?>
    
      <ul class="<?php echo $css_class; ?>">
       <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-footer-info-area"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      
      <?php 
	  if($footer_icons){
	  foreach ($footer_icons as $item ){
		  $item['icon'] = str_replace('fa-','',$item['icon']);
	  ?>
      <li><a href="<?php echo esc_url($item['link']);?>" title="<?php echo esc_attr($item['title']);?>" target="_blank"><i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i></a></li>
      <?php 
	  }
	  }
	  ?>
      </ul>
      <?php endif;	?>
      <div class="site-info"><span class="copyright_selective"><?php echo do_shortcode(wp_kses($copyright, $allowedposttags));?></span>
      </div>
    </div>
    
<?php endif; ?>
<?php if( $footer_style == '2'|| is_customize_preview()):?>
    <div class="footer-info-area style2 <?php echo $hide2;?>">
                    <div class="row">
                    
                      <?php 
								  if($footer_left_icons){
								  foreach ($footer_left_icons as $item ){
									  $item['icon'] = str_replace('fa-','',$item['icon']);
								  ?>
                           <div class="col-md-3 col-sm-6">
                            <div class="footer-contact-box">
                                <i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i>
                                <div class="footer-contact-info">
                                	<?php echo $item['link']!=''?'<a href="'.$item['link'].'">':'';?>
                                    <?php echo esc_attr($item['title']);?>
                                    <?php echo $item['link']!=''?'</a>':'';?>
                                </div>
                            </div>
                        </div>
								  <?php 
								  }
								  }
								  ?>
                        
                        
                        
                        <div class="col-md-3 col-sm-6">
                           <?php 
								if (  $display_footer_icons == '1' || is_customize_preview()):
									$css_class = 'footer-sns cactus-footer-sns footer_icons_selective';
									if( $display_footer_icons !=1 && is_customize_preview() )
										$css_class  .= ' hide';
								
								?>
								
								  <ul class="<?php echo $css_class; ?>">
								   <?php if( is_customize_preview() ):?>
								  <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-footer-info-area"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
								  <?php endif;?>
								  
								  <?php 
								  if($footer_icons){
								  foreach ($footer_icons as $item ){
									  $item['icon'] = str_replace('fa-','',$item['icon']);
								  ?>
								  <li><a href="<?php echo esc_url($item['link']);?>" title="<?php echo esc_attr($item['title']);?>" target="_blank"><i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i></a></li>
								  <?php 
								  }
								  }
								  ?>
								  </ul>
								  <?php endif;	?>
                            <div class="site-info"><span class="copyright_selective"><?php echo do_shortcode(wp_kses($copyright, $allowedposttags));?></span>
	
      </div>
                        </div>
                    </div>
                </div>
<?php endif; ?>