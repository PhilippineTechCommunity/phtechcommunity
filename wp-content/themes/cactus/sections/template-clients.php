<?php
global $allowedposttags, $cactus_section_key;
$clients = cactus_option('clients');
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);

?>

<div class="cactus-section-content">
  <div class="cactus-container">
     <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
      <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>   
      
      <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-clients_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?> 
    <div class="cactus-clients-carousel owl-carousel clients_selective">
    
    <?php if(is_array($clients)):?>
  		<?php foreach($clients as $item):
		
		 if (is_numeric($item['image'])) {
			$image_attributes = wp_get_attachment_image_src($item['image'], 'full');
			$item['image']    = $image_attributes[0];
		  }
		  
		?>
      <div class="cactus-client-item"> <a href="<?php echo esc_url($item['link']);?>"><img src="<?php echo esc_url($item['image']);?>" alt="<?php echo esc_attr($item['title']);?>"></a> </div>
      <?php endforeach;?>
  		<?php endif;?>
    </div>
  </div>
</div>
