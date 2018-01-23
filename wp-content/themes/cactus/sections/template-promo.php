<?php
global $allowedposttags, $cactus_section_key;;

$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);
$style = absint(cactus_option('style_'.$cactus_section_key));
$image = cactus_option('image_'.$cactus_section_key);
$text = cactus_option('text_'.$cactus_section_key);
$button_text = cactus_option('button_text_'.$cactus_section_key);
$button_link = cactus_option('button_link_'.$cactus_section_key);
if (is_numeric($image)) {
	$image_attributes = wp_get_attachment_image_src($image, 'full');
	$image   = $image_attributes[0];
}

$hide1 = '';
$hide2 = '';
if( $style=='' || $style=='1' ){
	$hide2 = 'hide';
	}
if( $style=='2' ){
	$hide1 = 'hide';
	}
?>
<div class="cactus-section">
  <div class="cactus-section-content">
    <div class="cactus-container">
    
    <?php if( $style=='' || $style=='1' || is_customize_preview()):?>
      <div class="cactus-box left <?php echo $hide1;?>">
        <div class="cactus-box-inner">
          <div class="cactus-box-figure <?php echo 'image_'.$cactus_section_key.'_selective';?>"> <img src="<?php echo esc_url($image);?>" alt="<?php echo esc_attr($section_title);?>"> </div>
        </div>
        <div class="cactus-box-inner">
          <div class="cactus-box-content">
            <h2 class="cactus-section-title text-left <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
            <p class="cactus-section-desc text-left <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
            <div class="cactus-promo <?php echo 'text_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $text , $allowedposttags );?></div>
             <?php if($button_text!=''):?>
            <div class="cactus-action"> <a href="<?php echo esc_url($button_link);?>"><span class="cactus-btn primary <?php echo 'button_text_'.$cactus_section_key.'_selective';?>"><?php echo esc_attr($button_text);?></span></a> </div>
            <?php endif;?>
          </div>
        </div>
        </div>
        <?php endif;?>
         <?php if( $style=='2' || is_customize_preview()):?>
         
         <div class="cactus-box right <?php echo $hide2;?>">
        <div class="cactus-box-inner">
          <div class="cactus-box-content">
            <h2 class="cactus-section-title text-left <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
            <p class="cactus-section-desc text-left <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
            <div class="cactus-promo <?php echo 'text_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $text , $allowedposttags );?></div>
             <?php if($button_text!=''):?>
            <div class="cactus-action"> <a class="button_link_promo_selective" href="<?php echo esc_url($button_link);?>"><span class="cactus-btn primary <?php echo 'button_text_'.$cactus_section_key.'_selective';?>"><?php echo esc_attr($button_text);?></span></a> </div>
            <?php endif;?>
          </div>
        </div>
         <div class="cactus-box-inner">
          <div class="cactus-box-figure <?php echo 'image_'.$cactus_section_key.'_selective';?>"> <img src="<?php echo esc_url($image);?>" alt="<?php echo esc_attr($section_title);?>"> </div>
        </div>
        </div>
        <?php endif;?>
      
    </div>
  </div>
</div>
