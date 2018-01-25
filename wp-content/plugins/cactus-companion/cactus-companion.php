<?php
/*
	Plugin Name: Cactus Companion
	Description: Cactus theme options.
	Author: VelaThemes
	Author URI: http://www.velathemes.com/
	Version: 1.0.5
	Text Domain: cactus-companion
	Domain Path: /languages
	License: GPL v2 or later
*/

defined('ABSPATH') or die("No script kiddies please!");

require_once 'inc/widget-recent-posts.php';
// Helper library for the page metabox.
require_once 'inc/pageMetabox/options.php';

if (!class_exists('CactusCompanion')){

	class CactusCompanion{	
		public $slider = array();
		
		public function __construct($atts = NULL)
		{

			register_activation_hook( __FILE__, array(&$this ,'plugin_activate') );
			add_action( 'plugins_loaded', array(&$this, 'init' ) );
			add_action( 'cactus-contact-form',  array(&$this , 'contact_form' ));
			add_action( 'admin_menu', array(&$this ,'plugin_menu') );
			add_action( 'wp_ajax_cactus_contact', array(&$this ,'send_email'));
			add_action( 'wp_ajax_nopriv_cactus_contact', array(&$this ,'send_email'));
			add_shortcode( 'cactus_map', array(&$this ,'map_shortcode') );
			add_action('switch_theme', array(&$this ,'plugin_activate'));
			add_action( 'cactus_before_page_wrap', array(&$this ,'page_slider') );
			add_filter( 'cactus_page_title_bar', array(&$this ,'page_title_bar'), 20, 2 );
			add_filter( 'cactus_page_sidebar_layout', array(&$this ,'page_sidebar_layout'), 20,1 );
			add_action( 'wp_enqueue_scripts',  array(&$this , 'enqueue_scripts' ));
			
		}
		
		
		function page_slider(){
			
			global $allowedposttags;
			$html = '';
				
			$slider = $this->slider;
				
			if(!empty($slider) && is_array($slider)){
				$this->has_slider = true;
				$html .= '<div class="banner_slider cactus-slider owl-carousel">';
				foreach($slider as $slide){
						
						$default = array(
										'image' => '',
										'title' => '',
										'subtitle' => '',
										'btn_text' => '',
										'btn_link' => '',
									);
						$slide = array_merge($default, $slide);
						$html .= '<div class="cactus-slider-item">';
						 if($slide['image'] !=''):
						if (is_numeric($slide['image'])) {
								$image_attributes = wp_get_attachment_image_src($slide['image'], 'full');
								$slide['image']    = $image_attributes[0];
							  }
						
						$html .= '<img src="'.esc_url($slide['image']).'" alt="'.esc_attr($slide['title']).'">';
						 endif;
						 
						$html .= '<div class="cactus-slider-caption-wrap">';
						$html .= '<div class="cactus-slider-caption">';
						$html .= '<div class="cactus-slider-caption-inner">';
						$html .= '<h2 class="cactus-slider-title">'.wp_kses( $slide['title'] , $allowedposttags ).'</h2>';
						$html .= '<p class="cactus-slider-desc">'.wp_kses( $slide['subtitle'] , $allowedposttags ).'</p>';
						
						if($slide['btn_text']!=''):
							$html .= '<div class="cactus-action"> <a href="'.esc_url($slide['btn_link']).'"><span class="cactus-btn primary">'.esc_attr($slide['btn_text']).'</span></a> </div>';
						endif;
						
						$html .= '</div>';
						$html .= '</div>';
						$html .= '</div>';
    					$html .= '</div>';
						}
					$html .= '</div>';
					
					}

			echo $html;
			
			}
			
		function page_title_bar($content){
			
			global $post;
			
			if(is_singular() && isset($post->ID) && $post->ID>0){
				$hide_page_title_bar = get_post_meta($post->ID, '_ccmb_hide_page_title_bar', true);
				if($hide_page_title_bar=='1' || $hide_page_title_bar=='on')
					return '';
			}
				return $content;
			
			
			}
		
		function page_sidebar_layout( $content ){
			global $post;
			if(is_singular() && isset($post->ID) && $post->ID>0){
				
				$sidebar_layout = get_post_meta($post->ID, '_ccmb_sidebar', true);
				
				if( $sidebar_layout != '' )
					return $sidebar_layout;
				}
				
				return $content;
			
			}
			
		function plugin_activate( $network_wide ) {
			
			$my_theme = wp_get_theme();
			$theme = $my_theme->get( 'Name' );
			
			if( !$theme == 'Cactus' && !$theme == 'Cactus Pro' )
				return;
				
			$homepage_title = 'Front Page';
			$posts_page_title='Blog';
			// Set reading options
			$homepage   = get_page_by_title( $homepage_title );
			$posts_page = get_page_by_title( $posts_page_title );
			
			
			if( !isset($homepage->ID) || (isset($homepage->post_status) && $homepage->post_status 
			!= 'publish' ) ){
				
				$post_data = array(
					  'post_title' => $homepage_title,
					  'post_content' => '',
					  'post_status'   => 'publish',
					  'post_type' => 'page',
				  );  
				$homepage_id = wp_insert_post( $post_data );
				
			}else{
				
				$homepage_id = $homepage->ID;
				}
				
				
			if( !isset($posts_page->ID) || (isset($posts_page->post_status) && $posts_page->post_status 
			!= 'publish')){
				
				$post_data = array(
					  'post_title' => $posts_page_title,
					  'post_content' => '',
					  'post_status'   => 'publish',
					  'post_type' => 'page',
				  );  
				$posts_page_id = wp_insert_post( $post_data );
				
			}else{
				
				$posts_page_id = $posts_page->ID;
				}
			
			if( $homepage_id && $posts_page_id ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage_id); // Front Page
				update_option('page_for_posts', $posts_page_id); // Blog Page
				update_post_meta( $homepage_id, '_wp_page_template', 'template-sections.php' );
			}
					
			}
		
		public static function init() {
			
			load_plugin_textdomain( 'cactus-companion', false,  basename( dirname( __FILE__ ) ) . '/languages' );
		}
		
		function enqueue_scripts()
		{
			global $post;
			$custom_css = '';
			if(isset($post->ID) && $post->ID>0){
				$this->slider = get_post_meta($post->ID, '_ccmb_slideshow', true);
				$bg_color = get_post_meta($post->ID, '_ccmb_bg_color', true);
				$bg_image = get_post_meta($post->ID, '_ccmb_bg_image', true);
				if($bg_color!=''){
					$custom_css .= '.page-id-'.$post->ID.' .page-wrap,.postid-'.$post->ID.' .page-wrap{background-color:'.$bg_color.';}';
					$custom_css .= '.page-id-'.$post->ID.' .page-inner, .postid-'.$post->ID.' .page-inner{padding-top: 30px;}';
					}
				if($bg_image!=''){
					$custom_css .= '.page-id-'.$post->ID.' .page-wrap, .postid-'.$post->ID.' .page-wrap{background-image:url('.$bg_image.');}';
					$custom_css .= '.page-id-'.$post->ID.' .page-inner, .postid-'.$post->ID.' .page-inner{padding-top: 30px;}';
					
					}
					
			}
			
			$i18n = array(
				'i1'=> __('Please fill out all required fields.','cactus-companion' ),
				'i2'=> __('Please enter your name.','cactus-companion' ),
				'i3'=> __('Please enter valid email.','cactus-companion' ),
				'i4'=> __('Please enter subject.','cactus-companion' ),
				'i5'=> __('Message is required.','cactus-companion' ),
				);
			
			if(!empty($this->slider))
				wp_enqueue_style( 'cactus-companion-frontpage', plugins_url('assets/css/frontpage.css', __FILE__));
			
			wp_enqueue_style( 'cactus-companion-front', plugins_url('assets/css/front.css', __FILE__));
			
			if($custom_css!='')
				wp_add_inline_style( 'cactus-companion-front', wp_filter_nohtml_kses($custom_css) );
			
			wp_enqueue_script( 'cactus-companion-front', plugins_url('assets/js/front.js', __FILE__),array('jquery'),'',true);
			wp_localize_script( 'cactus-companion-front', 'cactus_params', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'i18n' => $i18n,
			'plugins_url' => plugins_url('', __FILE__)
		)  );	
		}

		function plugin_menu() {
			add_options_page( 'Cactus Companion', 'Cactus Companion', 'manage_options', 'cactus-companion', array($this , 'plugin_options') );
			add_action( 'admin_init', array(&$this,'register_mysettings') );
		}
		
		function plugin_options() {
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			$tabs = array('cactus-contact-form'   => esc_html__( 'Contact Form', 'cactus-companion' ));
			$current = 'cactus-contact-form';
			if(isset($_GET['tab']))
				$current = $_GET['tab'];
		
			$html = '<h2 class="nav-tab-wrapper">';
			foreach( $tabs as $tab => $name ){
				$class = ( $tab == $current ) ? 'nav-tab-active' : '';
				$html .= '<a class="nav-tab ' . $class . '" href="?page=cactus-companion&tab=' . $tab . '">' . $name . '</a>';
			}
			$html .= '</h2>';
		
			?>
		<form method="post" action="options.php">
        <?php echo $html;?>
			<?php
				settings_fields( 'cactus-settings-group' );
				$options     = get_option('cactus_companion_options',CactusCompanion::default_options());
				$cactus_companion_options = wp_parse_args($options,CactusCompanion::default_options());
			?>
			<div class="wrap">
            <?php 
			$css1 = '';
			$css2 = '';
			if($current == 'cactus-contact-form'){
				$css1 = '';
				$css2 = 'display:none';
				}
			if($current == 'cactus-google-map'){
				$css1 = 'display:none';
				$css2 = '';
				}
			
			?>
            
            <div class="cactus-contact-form" style="<?php echo $css1;?>">
			<p><?php _e( 'Email', 'cactus-companion' );?>: <input name="cactus_companion_options[cactus_contact_form_email]" value="<?php echo $cactus_companion_options['cactus_contact_form_email'];?>" type="text" /></p>
			<p><?php _e( 'Used to receive mail from contact form.', 'cactus-companion' );?></p>
			 
               </div>
               
              <div class="cactus-google-map" style="<?php echo $css2;?>">
			<p><?php _e( 'Google Map API Key', 'cactus-companion' );?>: <input name="cactus_companion_options[cactus_google_api_key]" value="<?php echo $cactus_companion_options['cactus_google_api_key'];?>" type="text" /></p>
			<p></p>
			 
               </div>
                <p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes','cactus-companion');?>" />
				</p>
			</div>
            <?php
		}
		
		public static function default_options(){

			$return = array(
				'cactus_contact_form_email' => get_option('admin_email'),
				'cactus_google_api_key' => '',

			);
			
			return $return;
			
			}
			
		function text_validate($input)
		{
			
			$default_options = array(
				'cactus_contact_form_email' => get_option('admin_email'),
				'cactus_google_api_key' => '',
			);
			$input = wp_parse_args($input,$default_options);
			
			$input['cactus_contact_form_email'] = sanitize_text_field($input['cactus_contact_form_email']);
			$input['cactus_google_api_key'] = sanitize_text_field($input['cactus_google_api_key']);
			
			return $input;
		}
		
		function register_mysettings() {
			//register settings
			register_setting( 'cactus-settings-group', 'cactus_companion_options', array(&$this,'text_validate') );
		}
		
		function contact_form(){
			?>

			
			<form action="" class="cactus-contact-form">
            
            <ul class="cactus-list-md-3">
              <li>
                <div class="form-group">
                  <label for="name" class="control-label sr-only"> <?php _e( 'Name', 'cactus-companion' );?></label>
                  <input type="text" class="form-control" id="name" placeholder="<?php _e( 'Name', 'cactus-companion' );?> *">
                </div>
              </li>
              <li>
                <div class="form-group">
                  <label for="email" class="control-label sr-only"><?php _e( 'Email', 'cactus-companion' );?></label>
                  <input type="email" class="form-control" id="email" placeholder="<?php _e( 'Email', 'cactus-companion' );?> *">
                </div>
              </li>
              <li>
                <div class="form-group">
                  <label for="subject" class="control-label sr-only"><?php _e( 'Subject', 'cactus-companion' );?></label>
                  <input type="text" class="form-control" id="subject" placeholder="<?php _e( 'Subject', 'cactus-companion' );?> *">
                </div>
              </li>
            </ul>
            <div class="form-group">
              <label class="control-label sr-only" for="message">'.__( 'Message', 'cactus-companion' ).'</label>
              <textarea name="message" id="message" required="required" aria-required="true" rows="4" placeholder="<?php _e( 'Message', 'cactus-companion' );?> *" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label sr-only" for="submit"><?php _e( 'Submit', 'cactus-companion' );?></label>
              <input type="submit" value="<?php _e( 'SEND YOUR MESSAGE', 'cactus-companion' );?>" id="submit">&nbsp;&nbsp;&nbsp;&nbsp;<span class="noticefailed"></span>
            </div>
            
           
          </form>

			<?php
			
			}
			
			
			/*	
*	send email
*	---------------------------------------------------------------------
*/

function send_email(){
	if(trim($_POST['name']) === '') {
		$Error = __('Please enter your name.','cactus-companion');
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	if(trim($_POST['email']) === '')  {
		$Error = __('Please enter your email address.','cactus-companion');
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$Error = __('You entered an invalid email address.','onetone');
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	
	if(trim($_POST['subject']) === '') {
		$Error = __('Please enter subject.','cactus-companion');
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}

	if(trim($_POST['message']) === '') {
		$Error =  __('Please enter a message.','cactus-companion');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	if(!isset($hasError)) {
		$options = get_option('cactus_companion_options');
		
	   if (isset($options['cactus_contact_form_email']) && preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($options['cactus_contact_form_email']))) {
	     $emailTo = $options['cactus_contact_form_email']; ;
	   }
	   else{
	 	 $emailTo = get_option('admin_email');
		}
		
	   if($emailTo !=""){
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
		echo json_encode(array("msg"=>__("Your message has been successfully sent!","cactus-companion"),"error"=>0));
		
	}
	else
	{
		echo json_encode(array("msg"=>$Error,"error"=>1));
	}
	die() ;
}


/**
 * Displays the map
 *
 * @access      private
 * @return      void
*/
function map_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'address'           => false,
			'width'             => '100%',
			'height'            => '650px',
			'enablescrollwheel' => 'true',
			'zoom'              => 15,
			'disablecontrols'   => 'false',
			'key'               => ''
		),
		$atts
	);

	$address = $atts['address'];

	wp_enqueue_script( 'google-maps-api', '//maps.google.com/maps/api/js?key=' . sanitize_text_field( $atts['key'] ) );

	if( $address  ) :

		wp_print_scripts( 'google-maps-api' );

		$coordinates = $this->map_get_coordinates( $address, false, sanitize_text_field( $atts['key'] ) );

		if( ! is_array( $coordinates ) ) {			
			return;
		}

		$map_id = uniqid( 'cactus_map_' ); // generate a unique ID for this map

		ob_start(); ?>
		<div class="cactus_map_canvas" id="<?php echo esc_attr( $map_id ); ?>" style="height: <?php echo esc_attr( $atts['height'] ); ?>; width: <?php echo esc_attr( $atts['width'] ); ?>"></div>
		<script type="text/javascript">
			var map_<?php echo $map_id; ?>;
			function cactus_run_map_<?php echo $map_id ; ?>(){
				var location = new google.maps.LatLng("<?php echo $coordinates['lat']; ?>", "<?php echo $coordinates['lng']; ?>");
				var map_options = {
					zoom: <?php echo $atts['zoom']; ?>,
					center: location,
					scrollwheel: <?php echo 'true' === strtolower( $atts['enablescrollwheel'] ) ? '1' : '0'; ?>,
					disableDefaultUI: <?php echo 'true' === strtolower( $atts['disablecontrols'] ) ? '1' : '0'; ?>,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				map_<?php echo $map_id ; ?> = new google.maps.Map(document.getElementById("<?php echo $map_id ; ?>"), map_options);
				var marker = new google.maps.Marker({
				position: location,
				map: map_<?php echo $map_id ; ?>
				});
			}
			cactus_run_map_<?php echo $map_id ; ?>();
		</script>
		<?php
		return ob_get_clean();
	else :
		return __( 'This Google Map cannot be loaded because the maps API does not appear to be loaded', 'cactus-companion' );
	endif;
}


/**
 * Retrieve coordinates for an address
 *
 * Coordinates are cached using transients and a hash of the address
 *
 * @access      private
 * @return      void
*/
function map_get_coordinates( $address, $force_refresh = false,$api_key='' ) {

	$address_hash = md5( $address );

	$coordinates = get_transient( $address_hash );

	if ( $force_refresh || $coordinates === false ) {

		$args       = apply_filters( 'cactus_map_query_args', array( 'key' => $api_key, 'address' => urlencode( $address ), 'sensor' => 'false' ) );
		$url        = add_query_arg( $args, 'https://maps.googleapis.com/maps/api/geocode/json' );
		$response 	= wp_remote_get( $url );

		if( is_wp_error( $response ) ) {
			return;
		}

		$data = wp_remote_retrieve_body( $response );

		if( is_wp_error( $data ) ) {
			return;
		}

		if ( $response['response']['code'] == 200 ) {

			$data = json_decode( $data );

			if ( $data->status === 'OK' ) {

				$coordinates = $data->results[0]->geometry->location;

				$cache_value['lat'] 	= $coordinates->lat;
				$cache_value['lng'] 	= $coordinates->lng;
				$cache_value['address'] = (string) $data->results[0]->formatted_address;

				// cache coordinates for 3 months
				set_transient($address_hash, $cache_value, 3600*24*30*3);
				$data = $cache_value;

			} elseif ( $data->status === 'ZERO_RESULTS' ) {
				return __( 'No location found for the entered address.', 'cactus-companion' );
			} elseif( $data->status === 'INVALID_REQUEST' ) {
				return __( 'Invalid request. Did you enter an address?', 'cactus-companion' );
			} else {
				return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'cactus-companion' );
			}

		} else {
			return __( 'Unable to contact Google API service.', 'cactus-companion' );
		}

	} else {
	   // return cached results
	   $data = $coordinates;
	}

	return $data;
}
	
	}
	
	new CactusCompanion;
}