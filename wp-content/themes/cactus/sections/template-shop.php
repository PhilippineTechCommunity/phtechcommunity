<?php
global $allowedposttags, $cactus_section_key;;
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);
$button_text   = cactus_option('button_text_'.$cactus_section_key);
$button_link = cactus_option('button_link_'.$cactus_section_key);
?>

<div class="cactus-section-content">
  <div class="cactus-container">
    <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
      <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
      
      <div class="section_shop_selective woocommerce">
      
      <?php cactus_shop_content();?>
      
      </div>

    <div class="clearfix"></div>
    <?php if($button_text!=''):?>
    <div class="cactus-action text-center"> <a class="button_link_shop_selective" href="<?php echo esc_url($button_link);?>"><span class="cactus-btn primary <?php echo 'button_text_'.$cactus_section_key.'_selective';?>"><?php echo esc_attr($button_text);?></span></a> </div>
    <?php endif;?>
  </div>
</div>
