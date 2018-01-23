<?php
	get_header();
	$page_sidebar_layout = cactus_option('blog_archives_sidebar_layout');
	switch($page_sidebar_layout){
		case 'left':
			$aside_class = 'left-aside';
		break;
		case 'right':
			$aside_class = 'right-aside';
		break;
		default:
			$aside_class = 'no-aside';
		break;
		
		};
?>

 <!--Main Area-->
        
        <section class="page-title-bar title-left">
            <div class="container">
              <?php cactus_breadcrumbs();?>
                    
                <div class="clearfix"></div>            
            </div>
        </section>
        <div class="page-wrap">
            <div class="container">
                <div class="page-inner row <?php echo $aside_class; ?>">
                    <div class="col-main">
                        <section class="page-main" role="main" id="content">
                            <div class="page-content">
                                <!--blog list begin-->
                                <div class="blog-list-wrap">
                                
             <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'search' );

				endwhile;

				the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'cactus' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'cactus' ) . '</span><i class="fa fa-arrow-right"></i>' ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cactus' ) . ' </span>',
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>         
                                    
                                    
                                </div>
                                <!--blog list end-->
                 
                            </div>
                            <div class="post-attributes"></div>
                        </section>
                    </div>
                     <?php cactus_get_sidebar($page_sidebar_layout,'archives');?>
                </div>
            </div>  
        </div>

<?php get_footer();
