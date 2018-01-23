<div id="post-<?php the_ID(); ?>" <?php post_class('entry-box-wrap'); ?>>
  <article class="entry-box">
    <div class="entry-main">
      <div class="entry-summary">
	<?php 
	the_content( );
	wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cactus' ),
				'after'  => '</div>',
			) );
	?>
      </div>
    </div>
  </article>
</div>
