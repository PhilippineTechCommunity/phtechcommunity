 <div class="cactus-mobile-main-header">
                <div class="cactus-logo">
                     <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                </div>

                <div class="cactus-menu-toggle">
                    <div class="cactus-toggle-icon">
                        <span class="cactus-line"></span>
                    </div>
                </div>
            </div>
<div class="cactus-mobile-drawer-header" style="display: none;">
<?php 
  

		  wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
				'menu_class' => 'cactus-mobile-main-nav',
				'fallback_cb'    => 'cactus_menu_fallback',
				'container' =>'',
				'link_before' => '<span>',
   				'link_after' => '</span>',
			) ); 

	?>
             
</div>