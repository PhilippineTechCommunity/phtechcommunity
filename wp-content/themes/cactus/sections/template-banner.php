<?php
global $allowedposttags, $cactus_section_key;
$banner = cactus_option('banner');
$type_banner = cactus_option('type_banner');
$video_banner = cactus_option('video_banner');
$css_class = '';
if(is_array($banner) && count($banner)>1)
	$css_class = 'cactus-slider owl-carousel';

$hide1 = '';
$hide2 = '';
if( $type_banner=='' || $type_banner=='1' ){
	$hide2 = 'hide';
	}
if( $type_banner=='2' ){
	$hide1 = 'hide';
	}
?>
<div class="cactus-section">
<?php if($type_banner=='1'|| $type_banner=='' || is_customize_preview() ):?>
   <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-banner_selective"><button style="left:30px; top:100px;" aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
  <div class="banner_selective banner_slider <?php echo $css_class ;?> <?php echo $hide1;?>">
 
  <?php if(is_array($banner)):?>
  <?php foreach($banner as $item):?>
    <div class="cactus-slider-item">
    <?php if($item['image'] !=''):
	if (is_numeric($item['image'])) {
			$image_attributes = wp_get_attachment_image_src($item['image'], 'full');
			$item['image']    = $image_attributes[0];
		  }
	?>
    <img src="<?php echo esc_url($item['image']);?>" alt="<?php echo esc_attr($item['title']);?>">
    <?php endif;?>
      <div class="cactus-slider-caption-wrap">
        <div class="cactus-slider-caption">
          <div class="cactus-slider-caption-inner">
            <h2 class="cactus-slider-title"><?php echo wp_kses( $item['title'] , $allowedposttags );?></h2>
            <p class="cactus-slider-desc"><?php echo wp_kses( $item['subtitle'] , $allowedposttags );?></p>
            <?php if($item['btn_text']!=''):?>
            <div class="cactus-action"> <a href="<?php echo esc_attr($item['btn_link']);?>"><span class="cactus-btn primary"><?php echo esc_attr($item['btn_text']);?></span></a> </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;?>
  <?php endif;?>
  </div>
  <?php endif;?>
  
  <?php if($type_banner=='2' || is_customize_preview()):?>
  <div class="banner_selective banner_video_background <?php echo $hide2;?>" data-property="{videoURL:'<?php echo esc_url($video_banner);?>',containment:'.cactus-section-banner',autoPlay:true, mute:false, startAt:0, opacity:1, showYTLogo: false, stopMovieOnBlur: false}">
  <div class="cactus-slider-item">
      <div class="cactus-slider-caption-wrap">
        <div class="cactus-slider-caption">
          <div class="cactus-slider-caption-inner">
            <h2 class="cactus-slider-title video_title_banner_selective"><?php echo wp_kses( cactus_option('video_title_'.$cactus_section_key) , $allowedposttags );?></h2>
            <p class="cactus-slider-desc video_subtitle_banner_selective"><?php echo wp_kses( cactus_option('video_subtitle_'.$cactus_section_key) , $allowedposttags );?></p>
            <?php if(cactus_option('button_text_'.$cactus_section_key)!=''):?>
            <div class="cactus-action"> <a class="button_link_banner_selective" href="<?php echo esc_attr(cactus_option('button_link_'.$cactus_section_key));?>"><span class="cactus-btn primary button_text_banner_selective"><?php echo esc_attr(cactus_option('button_text_'.$cactus_section_key));?></span></a> </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    </div>
  <?php endif;?>
</div>