<?php
if(!class_exists('CactusPosts_Widget')){
 class CactusPosts_Widget extends WP_Widget {
    
	public function __construct() {
		
		parent::__construct(
			'cactus_recent_posts', // Base ID
			__( 'Cactus: Recent Posts', 'cactus-companion' ), // Name
			array( 'description' => __( 'Recent Posts.', 'cactus-companion' ), ) // Args
		);
		
	}
 	function form( $instance ) {
 	    $defaults = array('list_num' => '4','style' => '1', 'title' => __( 'Recent Posts', 'cactus-companion' ));
 		$instance = wp_parse_args( (array) $instance, $defaults );
 	
	?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
    <?php _e('Title', 'cactus-companion'); ?>
    :</label>
  <br />
  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'list_num' ); ?>">
    <?php _e('Recent Posts List Num', 'cactus-companion'); ?>
    :</label>
  <br />
  <input id="<?php echo $this->get_field_id( 'list_num' ); ?>" name="<?php echo $this->get_field_name( 'list_num' ); ?>" value="<?php echo absint($instance['list_num']); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'style' ); ?>">
    <?php _e('Style', 'cactus-companion'); ?>
    :</label>
  <br />
  <select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" >
    <option value="1" <?php selected('1',absint($instance['style']),true); ?>>
    <?php _e('List', 'cactus-companion'); ?>
    </option>
    <option value="2" <?php selected('2',absint($instance['style']),true); ?>>
    <?php _e('Grid', 'cactus-companion'); ?>
    </option>
  </select>
</p>
<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
			$instance['list_num']  = absint($new_instance['list_num']);
			$instance['style']     = absint($new_instance['style']);
			$instance['title']     = esc_attr($new_instance['title']);

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 	    $title    = apply_filters(__('Recent Posts', 'cactus-companion'), esc_attr($instance['title']) );
		$style    = absint($instance['style']);
		$list_num = absint($instance['list_num']);
		
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		
		$my_query = new WP_Query( 'showposts='.absint($list_num).'&ignore_sticky_posts=1');
		?>
<?php if ( $style== 2 ):?>
<div class="widget-project">
  <div class="row">
    <?php while ($my_query->have_posts() ) : $my_query->the_post();  ?>
    
     <?php 
   if ( has_post_thumbnail() ) {
         $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'cactus-widget-post-image');
		 $source = get_site_url();
		 if($featured_image[0] !=""){
			$thumb = $featured_image[0]; 
			echo '<div class="col-xs-4"> <a href="'.esc_url(get_permalink()).'" class="widget-img"><img src="'.esc_url($thumb).'" alt="'.esc_attr(get_the_title()).'" /></a></div>';
			 }
		} 
			?>
    <?php 
        endwhile;
        wp_reset_postdata();
        ?>
  </div>
</div>
<?php else:?>
<ul>
  <?php while ($my_query->have_posts() ) : $my_query->the_post();  ?>
  <li>
    <?php 
   if ( has_post_thumbnail() ) {
         $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
		 $source = get_site_url();
		 if($featured_image[0] !=""){
			$thumb = $featured_image[0]; 
			echo '<a href="'.esc_url(get_permalink()).'" class="widget-img"><img src="'.esc_url($thumb).'" alt="'.esc_attr(get_the_title()).'" /></a>';
			 }
		} 
			?>
    <a href="<?php the_permalink();?>">
    <?php the_title();?>
    </a><br>
    <?php echo get_the_date();?>
    </li>
  <?php 
        endwhile;
        wp_reset_postdata();
        ?>
</ul>
<?php endif;?>
<?php 
		echo $after_widget;
 	}
 }
 
function cactus_companion_recent_posts(){
	
	register_widget('CactusPosts_Widget');
						
}
add_action( 'widgets_init', 'cactus_companion_recent_posts' );
 
}

