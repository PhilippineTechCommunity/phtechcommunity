<?php
global $allowedposttags, $cactus_section_key;;
$counter = cactus_option('counter');
$columns = absint(cactus_option('columns_'.$cactus_section_key));
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);
?>
<div class="cactus-section-content">
  <div class="cactus-container"> 
   <?php if($section_title!='' || is_customize_preview()){?>
    <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
     <?php }?>
     <?php if($section_subtitle!='' || is_customize_preview()){?>
   	 <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
     <?php }?>
     
    <ul class="cactus-counter cactus-list-md-<?php echo $columns;?> cactus-list-sm-2 full counter_selective">
    <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-counter_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      
     <?php if(is_array($counter)):?>
      <?php foreach($counter as $item):?>
        <?php
		$icon  = str_replace('fa-','',$item['icon']);
		?>
      <li>
        <div class="cactus-counter-item">
          <div class="cactus-counter-figure"> <i class="fa fa-<?php echo esc_attr($icon);?>" style="font-size: 50px;"></i> </div>
          <div class="cactus-counter-num counter" data-counterup-nums="<?php echo esc_attr($item['number']);?>"><?php echo esc_attr($item['number']);?></div>
          <h4 class="cactus-counter-title"><?php echo esc_attr($item['title']);?></h4>
        </div>
      </li>
     <?php endforeach;?>
      <?php endif;?>
    </ul>
  </div>
</div>
