<?php
global $allowedposttags, $cactus_section_key;;
$posts_num   = cactus_option('posts_num_'.$cactus_section_key);
$news_column = cactus_option('news_columns_'.$cactus_section_key);
$section_title = cactus_option('section_title_'.$cactus_section_key);
$section_subtitle = cactus_option('section_subtitle_'.$cactus_section_key);
$button_text   = cactus_option('button_text_'.$cactus_section_key);
$button_link = cactus_option('button_link_'.$cactus_section_key);
?>

<div class="cactus-section-content">
  <div class="cactus-container">
    <h2 class="cactus-section-title text-center <?php echo 'section_title_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_title , $allowedposttags );?></h2>
      <p class="cactus-section-desc text-center <?php echo 'section_subtitle_'.$cactus_section_key.'_selective';?>"><?php echo wp_kses( $section_subtitle , $allowedposttags );?></p>
      
      <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-blog_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
      
    <ul class="cactus-blog-list cactus-list-md-<?php echo esc_attr($news_column);?>">
    <?php
	
	$paged =(get_query_var('paged'))? get_query_var('paged'): 1;
    $wp_query = new WP_Query();

	$wp_query -> query('showposts='.$posts_num.'&paged='.$paged.'&post_status=publish&ignore_sticky_posts=1'); 
	
	$i = 1 ;
	$html_item = '';
	if ($wp_query -> have_posts()) :
    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
	
	$featured_image = '';
	if( has_post_thumbnail() ){
	    
		$thumbnail_id     = get_post_thumbnail_id(get_the_ID());
		$image_attributes = wp_get_attachment_image_src( $thumbnail_id, "related-post" );
		
		$imageInfo     = get_post($thumbnail_id);
		$image_title   = get_the_title();
		if( isset( $imageInfo->post_title) )
			$image_title   = $imageInfo->post_title;
		

			$featured_image = '<div class="cactus-blog-feature-img"> <img src="'.$image_attributes[0].'" alt="'.$image_title.'"> <a href="'.get_permalink().'">
            <div class="cactus-overlay">
              <div class="cactus-overlay-content"> <i class="fa fa-link"></i> </div>
            </div>
            </a> </div>';
													
		}
	
	?>
      <li>
        <div class="cactus-blog-item">
          <?php echo $featured_image;?>
          <div class="cactus-entry-main">
            <div class="cactus-entry-header">
              <div class="entry-meta entry-category"> <?php echo get_the_category_list(', ');?> </div>
              <h4 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            </div>
            <div class="entry-summary"><?php the_excerpt();?></div>
          </div>
        </div>
      </li>
      <?php endwhile;?>
      <?php wp_reset_postdata();?>
    <?php endif;?>
    
    </ul>
    <div class="clearfix"></div>
    <?php if($button_text!=''):?>
    <div class="cactus-action text-center"> <a class="button_link_news_selective" href="<?php echo esc_url($button_link);?>"><span class="cactus-btn primary <?php echo 'button_text_'.$cactus_section_key.'_selective';?>"><?php echo esc_attr($button_text);?></span></a> </div>
    <?php endif;?>
  </div>
</div>
