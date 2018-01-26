<?php 
$display_topbar = cactus_option('display_topbar');
if($display_topbar==1 || is_customize_preview() ):
$css_class = 'cactus-top-bar';
if( $display_topbar !=1 && is_customize_preview() )
	$css_class  .= ' hide';
?>
            <div class="<?php echo $css_class; ?>">
           
                <div class="cactus-f-microwidgets topbar_left_selective">
                 <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_left_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
                <?php
				$topbar_left = cactus_option('topbar_left');
			
			if(is_array($topbar_left) && !empty($topbar_left)):
				$html = "";
  				foreach($topbar_left as $item):
					$html .= '<span class="cactus-microwidget">';
					if($item['link']!=''){
						$html .= '<a href="'.esc_url($item['link']).'" target="'.esc_attr($item['target']).'">';
					}
					if($item['icon']!=''){
						$html .= '<i class="fa '.esc_attr($item['icon']).'"></i>&nbsp;&nbsp;';
					}
					$html .= esc_attr($item['text']);
					if($item['link']!=''){
						$html .= '</a>';
					}
					$html .= '</span>';
				endforeach;
				echo $html;
			endif;
				?>
                </div>
                <div class="cactus-f-microwidgets ">
                <div class="cactus-microwidget cactus-microicons topbar_icons_selective">
                 <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_icons_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
                <?php
			$topbar_icons = cactus_option('topbar_icons');
			
			if(is_array($topbar_icons) && !empty($topbar_icons)):
				$html = "";
  				foreach($topbar_icons as $item):
					if($item['icon']!=''){
						$html .= '<a href="'.esc_url($item['link']).'" target="'.esc_attr($item['target']).'"><i class="fa '.esc_attr($item['icon']).'"></i></a>';
					}
				endforeach;
				echo $html;
			endif;
				?>
                    </div>
                <div class="cactus-microwidget cactus-micronav cactus-micronav-list topbar_right_selective">
                 <?php if( is_customize_preview() ):?>
      <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-topbar_right_selective"><button aria-label="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" title="<?php echo esc_html__( 'Click to edit this element.', 'cactus' );?>" class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>
      <?php endif;?>
            <?php
			$topbar_right = cactus_option('topbar_right');
			
			if(is_array($topbar_right) && !empty($topbar_right)):
			$html = "";
  				foreach($topbar_right as $item):
					$html .= '<span class="cactus-microwidget ">';
					if($item['link']!=''){
						$html .= '<a href="'.esc_url($item['link']).'" target="'.esc_attr($item['target']).'">';
					}
					if($item['icon']!=''){
						$html .= '<i class="fa '.esc_attr($item['icon']).'"></i>&nbsp;&nbsp;';
					}
					$html .= esc_attr($item['text']);
					if($item['link']!=''){
						$html .= '</a>';
					}
					$html .= '</span>';
				endforeach;
				echo $html;
			endif;
				?>
                </div>
                </div>
            </div>
    <?php endif;?>