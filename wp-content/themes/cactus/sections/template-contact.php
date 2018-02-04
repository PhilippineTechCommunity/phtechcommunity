<?php
global $allowedposttags, $cactus_section_key, $cactus_animation;

$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);
$style = absint(cactus_option('style_'.$cactus_section_key));
$image = cactus_option('image_'.$cactus_section_key);
$address = cactus_option('address_'.$cactus_section_key);
$email = cactus_option('email_'.$cactus_section_key);
$tel = cactus_option('tel_'.$cactus_section_key);
$google_map_address = cactus_option('google_map_address_'.$cactus_section_key);
$google_map_api = cactus_option('google_map_api_'.$cactus_section_key);
$google_map_height = cactus_option('google_map_height_'.$cactus_section_key);
$google_map_zoom = cactus_option('google_map_zoom_'.$cactus_section_key);

$hide1 = '';
$hide2 = '';
if( $style=='' || $style=='1' ){
	$hide2 = 'hide';
	}
if( $style=='2' ){
	$hide1 = 'hide';
	}
?>
<div class="cactus-section-content">
  <div class="cactus-container">
   <?php if( $style=='' || $style=='1' || is_customize_preview()):?>
    <div class="cactus-box left <?php echo $hide1;?>">
      <div class="cactus-box-inner">
        <div class="cactus-box-figure <?php echo 'image_'.$cactus_section_key.'_selective';?>"> 
        <?php if($image!=''):?>
        <img src="<?php echo esc_url($image);?>" alt="">
        <?php else:?>
        <?php
		echo do_shortcode('[cactus_map address="'.esc_attr($google_map_address).'" key="'.esc_attr($google_map_api).'"  height="'.esc_attr($google_map_height).'"  zoom="'.absint($google_map_zoom).'"]');
		?>
        <?php endif;?>
        </div>
      </div>
      <div class="cactus-box-inner">
        <div class="cactus-box-content">
          <h2 class="cactus-section-title <?php echo 'section_title_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
   		 <p class="cactus-section-desc <?php echo 'section_subtitle_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>                          
                                            
          <ul class="cactus-contact-info cactus-list-md-3">
          <?php if($address!=''):?>
            <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.4" data-animationtype="fadeInUp">
              <div class="cactus-feature-item">
                <div class="cactus-feature-figure"> <i class="fa fa-map-marker" style="font-size: 14px;"></i> </div>
                <div class="cactus-feature-caption <?php echo 'address_'.$cactus_section_key.'_selective';?>"> <?php echo esc_attr($address);?> </div>
              </div>
            </li>
             <?php endif;?>
             <?php if($email!=''):?>
            <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.6" data-animationtype="fadeInUp">
              <div class="cactus-feature-item">
                <div class="cactus-feature-figure"> <i class="fa fa-envelope-o" style="font-size: 14px;"></i> </div>
                <div class="cactus-feature-caption"> <a href="mailto:<?php echo esc_attr($email);?>" class="<?php echo 'email_'.$cactus_section_key.'_selective';?>"> <?php echo esc_attr($email);?></a> </div>
              </div>
            </li>
            <?php endif;?>
            <?php if($tel!=''):?>
            <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp">
              <div class="cactus-feature-item">
                <div class="cactus-feature-figure"> <i class="fa fa-mobile" style="font-size: 14px;"></i> </div>
                <div class="cactus-feature-caption <?php echo 'tel_'.$cactus_section_key.'_selective';?>">  <?php echo esc_attr($tel);?> </div>
              </div>
            </li>
            <?php endif;?>
          </ul>
          <div class="<?php echo $cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp">
          <?php do_action('cactus-contact-form');?>
         </div>
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
                <ul class="cactus-contact-info cactus-list-md-3">
                 <?php if($address!=''):?>
                    <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.4" data-animationtype="fadeInUp">
                        <div class="cactus-feature-item">
                            <div class="cactus-feature-figure">
                                <i class="fa fa-map-marker" style="font-size: 14px;"></i>
                            </div>
                            <div class="cactus-feature-caption <?php echo 'address_'.$cactus_section_key.'_selective';?>"> <?php echo esc_attr($address);?> </div>
                        </div>
                    </li>
                     <?php endif;?>
                     <?php if($email!=''):?>
                    <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.6" data-animationtype="fadeInUp">
                        <div class="cactus-feature-item">
                            <div class="cactus-feature-figure">
                                <i class="fa fa-envelope-o" style="font-size: 14px;"></i>
                            </div>
                            <div class="cactus-feature-caption">
                                <a href="mailto:<?php echo esc_attr($email);?>" class="<?php echo 'email_'.$cactus_section_key.'_selective';?>"> <?php echo esc_attr($email);?></a>
                            </div>
                        </div>
                    </li>
                     <?php endif;?>
                     <?php if($tel!=''):?>
                    <li  class="<?php echo $cactus_animation;?>" data-animationduration="0.8" data-animationtype="fadeInUp">
                        <div class="cactus-feature-item">
                            <div class="cactus-feature-figure">
                                <i class="fa fa-mobile" style="font-size: 14px;"></i>
                            </div>
                            <div class="cactus-feature-caption <?php echo 'tel_'.$cactus_section_key.'_selective';?>">  <?php echo esc_attr($tel);?> </div>
                        </div>
                    </li>
                     <?php endif;?>
                </ul>
                <div class="<?php echo $cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp">
                 <?php do_action('cactus-contact-form');?>
                 </div>
            </div>
        </div>
        <div class="cactus-box-inner">
            <div class="cactus-box-figure <?php echo 'image_'.$cactus_section_key.'_selective';?>"> 
<?php if($image!=''):?>
<img src="<?php echo esc_url($image);?>" alt="">
<?php else:?>
<?php
echo do_shortcode('[cactus_map address="'.esc_attr($google_map_address).'" key="'.esc_attr($google_map_api).'"  height="'.esc_attr($google_map_height).'"  zoom="'.absint($google_map_zoom).'"]');
?>
<?php endif;?>
</div>
        </div>
    </div>
                                                
      <?php endif;?>                                          
                                                
                                                
  </div>
</div>
