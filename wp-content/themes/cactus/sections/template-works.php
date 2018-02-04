<?php
global $allowedposttags, $cactus_section_key, $cactus_animation;
$works = cactus_option('works');
$columns = absint(cactus_option('columns_'.$cactus_section_key));
$style = absint(cactus_option('style_'.$cactus_section_key));
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

  <div class="works_container_selective <?php echo $container;?>">
    <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
    <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective '.$cactus_animation;?>" data-animationduration="0.9" data-animationtype="fadeInUp"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
    <?php 
	$tags = array();
	$items = '';
	$id = uniqid('portfolio-');
	$index = 0;
	if(is_array($works)):
	$time = 0.6;
	foreach($works as $item):
      $large_image = $item['image'];
	  $image = $item['image'];
	if (is_numeric($item['image'])) {
		$image_attributes = wp_get_attachment_image_src($item['image'], 'cactus-works');
		$image   = $image_attributes[0];
		$large_image_attributes = wp_get_attachment_image_src($item['image'], 'full');
		$large_image    = $large_image_attributes[0];
	}
		  
	$link  = $item['link'];
	$tag   = isset($item['tag'])?$item['tag']:'';
	$class = '';
	if($tag!=''){
		$class = 'group-'.sanitize_title($item['tag']);
		$tags[sanitize_title($item['tag'])] ='<li><a href="javascript:;" class="control" data-filter=".'.$class.'">'.esc_attr($item['tag']).'</a></li>';
	}
		
	
	if($style=='1'):
	$items .= '<li id="cactus-work-'.$index.'" class="mix element-item grid-item '.$class.'">
        <div class="cactus-gallery-item '.$cactus_animation.'" data-animationduration="'.$time.'" data-animationtype="fadeInUp"> <div class="cactus-gallery-figure"><img src="'.esc_url($image).'" alt="'.esc_attr($item['title']).'">
          <div class="cactus-overlay">
            <div class="cactus-overlay-content">
              <div>';
	
	$items .= '<h4 class="gallery-item-title">'.(($link!='')?'<a href="'.esc_url($link).'">':'').''.esc_attr($item['title']).''.(($link!='')?'</a>':'').'</h4>';
	$items .= '<a href="'.esc_url($large_image).'" rel="prettyPhoto"><i class="fa fa-search-plus"></i></a>'.(($link!='')?'<a href="'.esc_url($link).'" ><i class="fa fa-link"></i></a>':'').'</div>
            </div>
			</div>
          </div>
        </div>
      </li>';
	  else:
	  $items .= ' <li id="cactus-work-'.$index.'" class="mix element-item grid-item '.$class.'" data-animationduration="'.$time.'" data-animationtype="fadeInUp">
					<div class="cactus-gallery-item '.$cactus_animation.'" data-animationduration="'.$time.'" data-animationtype="fadeInUp">
						<div class="cactus-gallery-figure">
							<img src="'.esc_url($image).'" alt="'.esc_attr($item['title']).'">
							'.(($link!='')?'<a href="'.esc_url($link).'">':'').'
								<div class="cactus-overlay">
									<div class="cactus-overlay-content">
										<div>
											<a href="'.esc_url($large_image).'"  rel="prettyPhoto"><i class="fa fa-search-plus"></i></a> 
											'.(($link!='')?'<a href="'.esc_url($link).'" ><i class="fa fa-link"></i></a>':''). '
										</div>
									</div>                   
								</div>
							'.(($link!='')?'</a>':'').'
						</div>
						<h4>'.(($link!='')?'<a href="'.esc_url($link).'">':'').''.esc_attr($item['title']).''.(($link!='')?'</a>':'').'</h4>
					</div>
				</li>';
	endif;
	
	$index++;
	$time += 0.1;
	endforeach;
	endif;
	?>
      <div class="works_selective">
      
      <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-works_selective"><button style="left:30px; top:100px;" aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      
    <nav class="cactus-portfolio-filter">
      <ul>
	  <?php if( !empty($tags) ):?>
        <li class="active"><a href="javascript:;" data-filter="*"><?php _e( 'All', 'cactus' );?></a></li>
        <?php foreach($tags as $tag){
				echo $tag;
			}
			?>
			<?php endif;?>
            <li class="gap"></li>
            <li class="gap"></li>
            <li class="gap"></li>
      </ul>
    </nav>
    
    <ul class="cactus-portfolio-list cactus-list-md-<?php echo $columns;?> cactus-list-sm-2 <?php echo $ul_class;?>" id="<?php echo $id;?>">
    
    <?php echo $items;?>
    </ul>
    </div>
    
  </div>
</div>
<script>
jQuery(window).load(function(e) {
	
	var containerEl = document.querySelector('#<?php echo $id;?>');
    var mixer = mixitup(containerEl);
	jQuery('.cactus-portfolio-filter').on( 'click', 'a', function() {
		jQuery(this).parents('.cactus-portfolio-filter').find('li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
	});

});

</script> 