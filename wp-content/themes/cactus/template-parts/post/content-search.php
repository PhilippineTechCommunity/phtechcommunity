<div id="post-<?php the_ID(); ?>" <?php post_class('entry-box-wrap'); ?>>
  <article class="entry-box">
    <div class="entry-header no-img">
      <div class="entry-category"><?php echo get_the_category_list(', ');?></div>
      <?php 
		  if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			}
			
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						cactus_posted_on();
					else :
						echo cactus_time_link();
						cactus_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

		  ?>
    </div>
    <div class="entry-main">
      <div class="entry-summary">
        <?php 
			if ( is_single() ) {
			the_content( );
		} else {
			the_excerpt();
		}
			?>
        <?php
		  
	$args  = array(
		'before'           => '<p>' . __( 'Pages:', 'cactus' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'cactus' ),
		'previouspagelink' => __( 'Previous page', 'cactus' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
	wp_link_pages( $args  );
		
	?>
      </div>
    </div>
    <?php if ( !is_single() ) { ?>
    <div class="entry-footer clearfix">
      <div class="pull-left">
        <div class="entry-more"><a href="<?php the_permalink(); ?>">
          <?php _e('Continue Reading...', 'cactus');?>
          </a></div>
      </div>
      <div class="pull-right">
        <div class="entry-comments">
          <?php
		  if ( comments_open() ) :
			
			comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', '');
			
		  endif;
		  ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </article>
</div>

<!-- #post-## --> 
