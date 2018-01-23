<?php
/**
 * Template Name: Full Width
 */
	get_header();

?>
<div class="page-wrap">
 <?php do_action('cactus_before_page_wrap');?>  
  <div class="container-fullwidth">
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
    </div>

<?php get_footer();