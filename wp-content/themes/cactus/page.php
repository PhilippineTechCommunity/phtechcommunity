<?php
	get_header();
	$page_sidebar_layout = apply_filters('cactus_page_sidebar_layout',cactus_option('page_sidebar_layout'));
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
<?php echo apply_filters('cactus_page_title_bar','','page');?>  
<div class="page-wrap">
<?php do_action('cactus_before_page_wrap');?>  
  <div class="container">
    <div class="page-inner row <?php echo $aside_class; ?>">
      <div class="col-main">
        <section class="post-main" role="main" id="content">
          <article class="post-entry text-left">
            <?php do_action('cactus_before_page_content');?>
            <?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content' );

					the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'cactus' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'cactus' ) . '</span><i class="fa fa-arrow-right"></i>' ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cactus' ) . ' </span>',
				) );

				endwhile; // End of the loop.
			?>
           <?php do_action('cactus_after_page_content');?>         
          </article>
          <div class="post-attributes">
         <!--Comments Area-->
            <div class="comments-area text-left">
              <?php
			  // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
			  ?>
            </div>            
          </div>
        </section>
      </div>
      <?php cactus_get_sidebar($page_sidebar_layout,'page');?>
    </div>
  </div>
</div>

<?php get_footer();