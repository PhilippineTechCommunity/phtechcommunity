<?php
global $allowedposttags, $cactus_section_key;;
$team = cactus_option('team');
$style = absint(cactus_option('style_'.$cactus_section_key));
$columns = absint(cactus_option('columns_'.$cactus_section_key));
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);

$container = 'cactus-container-fullwidth';
$ul_class = 'full';
if( $style == '2' ){
	$container = 'cactus-container';
	$ul_class = '';
}
?>

  <div class="cactus-section-content">
    <div class="team_container_selective <?php echo $container;?>">
      <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
   	 <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
      <ul class="cactus-team cactus-list-md-<?php echo $columns;?> cactus-list-sm-2 team_selective <?php echo $ul_class;?>">
      <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-team_selective"><button style="left:30px; top:100px;" aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      <?php if(is_array($team)):?>
      <?php foreach($team as $item):
	  if (is_numeric($item['avatar'])) {
			$image_attributes = wp_get_attachment_image_src($item['avatar'], 'full');
			$item['avatar']    = $image_attributes[0];
		  }
	  ?>
      <?php if( $style == '1' ){?>
        <li>
          <div class="cactus-team-item"> <img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>">
          <?php if($item['link']!=''){?>
          <a href="<?php echo esc_url($item['link']);?>">
          <?php }?>
            <div class="cactus-overlay">
              <div class="cactus-overlay-content">
                <div class="cactus-team-vcard">
                  <h4 class="cactus-team-name"><?php echo esc_attr($item['name']);?></h4>
                  <p class="cactus-team-title"><?php echo esc_attr($item['byline']);?></p>
                </div>
              </div>
            </div>
            <?php if($item['link']!=''){?>
            </a>
             <?php }?>
            </div>
        </li>
        <?php }else{ ?>
        <li>
          <div class="cactus-team-item">
              <?php if($item['link']!=''){?>
          <a href="<?php echo esc_url($item['link']);?>">
          <?php }?><img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>">
		  <?php if($item['link']!=''){?>
            </a>
             <?php }?>
              <div class="cactus-team-vcard">
                  <h4 class="cactus-team-name"><?php echo esc_attr($item['name']);?></h4>
                  <p class="cactus-team-title"><?php echo esc_attr($item['byline']);?></p>
              </div>
          </div>
      </li>
                                                    
           <?php }?>                      
         <?php endforeach;?>
      <?php endif;?>
       
      </ul>
    </div>
  </div>

