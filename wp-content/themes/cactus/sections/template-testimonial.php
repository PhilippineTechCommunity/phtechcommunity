<?php
global $allowedposttags, $cactus_section_key, $cactus_animation;
$testimonial = cactus_option('testimonial');
$style = cactus_option('style_'.$cactus_section_key);
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);

?>
<div class="cactus-section-content">
  <div class="cactus-container">
     <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
      <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
      <div class="testimonial_selective <?php echo $cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp" >
      <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-testimonial_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      
      <?php if($style=='' || $style==1):?>
		<div class="cactus-testimonials-carousel owl-carousel">
    <?php if(is_array($testimonial)):?>
  		<?php 
		foreach($testimonial as $item):
		
		 if (is_numeric($item['avatar'])) {
			$image_attributes = wp_get_attachment_image_src($item['avatar'], 'full');
			$item['avatar']    = $image_attributes[0];
		  }
		
		?>
      <div class="cactus-testimonial-item">
        <div class="cactus-testimonial-content"><?php echo wp_kses( $item['text'] , $allowedposttags );?></div>
        <div class="cactus-testimonial-figure"> <img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>"> </div>
        <div class="cactus-testimonial-vcard">
          <h4 class="cactus-testimonial-name"><?php echo esc_attr($item['name']);?></h4>
          <p class="cactus-testimonial-title"><?php echo esc_attr($item['byline']);?></p>
        </div>
      </div>
        <?php endforeach;?>
  		<?php endif;?>
        <?php endif;?>
        
        </div>
        <?php if($style==2):?>
        <ul class="cactus-testimonials style2 cactus-list-md-3">
        <?php if(is_array($testimonial)):?>
  		<?php 
		foreach($testimonial as $item):
		
		 if (is_numeric($item['avatar'])) {
			$image_attributes = wp_get_attachment_image_src($item['avatar'], 'full');
			$item['avatar']    = $image_attributes[0];
		  }
		
		?>
          <li>
              <div class="cactus-testimonial-item">
                  <div class="cactus-testimonial-content">
                     <?php echo wp_kses( $item['text'] , $allowedposttags );?>
                  </div>
                  <div class="cactus-testimonial-figure">
                      <img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>">
                  </div>
                  <div class="cactus-testimonial-vcard">
                      <h4 class="cactus-testimonial-name"><?php echo esc_attr($item['name']);?></h4>
                      <p class="cactus-testimonial-title"><?php echo esc_attr($item['byline']);?></p>
                  </div>
              </div>
          </li>
          <?php endforeach;?>
  		<?php endif;?>
      </ul>
      <?php endif;?>                                            
    </div>
  </div>
</div>
