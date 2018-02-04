<?php
global $allowedposttags, $cactus_section_key, $cactus_animation;
$service = cactus_option('service');
$columns = absint(cactus_option('columns_'.$cactus_section_key));
$style = absint(cactus_option('style_'.$cactus_section_key));
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);

function cactus_get_service( $service = '' ){
	global $allowedposttags, $cactus_animation;
	  $html  = '';
	  if(!$service)
	  	$service = cactus_option('service');
	  if(is_array($service)):
	  
	  	$time = 0.6;
  		foreach($service as $item):
       
		$icon  = str_replace('fa-','',$item['icon']);
		$icon  = str_replace('fa ','',$icon);
		
		$title = '<h4>'.esc_attr($item['title']).'</h4>';
		if($item['title_link'] !='' )
			$title = '<a href="'.esc_url($item['title_link']).'" target="_blank">'.$title.'</a>';
		$image     = isset($item['image'])?$item['image']:'';
		$icon_type = isset($item['icon_type'])?$item['icon_type']:'icon';
		
		if (is_numeric($image)) {
			$image_attributes = wp_get_attachment_image_src($image, 'full');
			$image   = $image_attributes[0];
		  }
		
      		$html .= '<li class="'.$cactus_animation.'" data-animationduration="'.$time.'" data-animationtype="fadeInUp"><div class="cactus-feature-item">';
            
             if($icon_type == 'image'){
             if($image !='' ){
         	 $html .= '<div class="cactus-feature-figure">
            <img src="'.esc_url($image).'" alt="'.esc_attr($item['title']).'">
            </div>';
             }
			 }else{
           $html .= '<div class="cactus-feature-figure">
            <i class="fa fa-'.esc_attr($icon).'" style="font-size: 50px;"></i>
            </div>';
			 }
            
            $html .= '<div class="cactus-feature-caption">
              '.$title.'
              <p>'.wp_kses( $item['text'] , $allowedposttags ).'</p>
            </div>
          </div>
        </li>';
		$time += 0.1;
         endforeach;
  		 endif;
		 return $html;
        
}
?>
  <div class="cactus-section-content">
    <div class="cactus-container">
      <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
      <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
      <ul class="cactus-services cactus-list-md-<?php echo $columns;?> <?php echo 'service_selective style'.$style;?>"> 
       <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-section_service_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
     <?php echo cactus_get_service($service);?>
      </ul>
    </div>
  </div>
