<header class="header-wrap">
<?php
	$sticky_header = cactus_option('sticky_header');
	$class = 'cactus-header cactus-split-header ';
	$sticky_class = 'cactus-header cactus-split-header shadow';
	$split_header_menu_position = cactus_option('split_header_menu_position');
	$header_full_width = cactus_option('header_full_width');
	$transparent_header = cactus_option('transparent_header');
	$header_color_scheme = cactus_option('header_color_scheme');
	
	$class .= ' '.$split_header_menu_position;
	$sticky_class .= ' '.$split_header_menu_position;
	
	if($header_full_width == '1'){
		$class .= ' fullwidth';
		$sticky_class .= ' fullwidth';
	}
	if( is_page_template('template-sections.php') && $transparent_header == '1'){
		$class .= ' transparent';
		$class .= ' '.$header_color_scheme;
	}
?>
<div class="<?php echo $class; ?>">
            <?php get_template_part( 'template-parts/header/header', 'top-bar' ); ?>
            <div class="cactus-main-header">
                
                <div class="cactus-logo">
           		<?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                </div>
               
                  <?php get_template_part( 'template-parts/navigation/navigation', 'top-left' ); ?>
               
                 <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            </div>
             <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
        </div>
         <?php if($sticky_header=='1' || is_customize_preview() ):
				$fixedheaderclass = 'cactus-fixed-header-wrap';
				if($sticky_header!='1' && is_customize_preview()){
					$fixedheaderclass .= ' hide';
				}
		?>
        <div class="<?php echo $fixedheaderclass; ?>" style="display: none;">
            <div class="<?php echo $sticky_class; ?>">
                <div class="cactus-main-header">
   
        <div class="cactus-logo">
            <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                </div>
                        <?php get_template_part( 'template-parts/navigation/navigation', 'top-left' ); ?>
                        <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                </div>
                 <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
            </div>
        </div>
         <?php endif;?>  
     </header>