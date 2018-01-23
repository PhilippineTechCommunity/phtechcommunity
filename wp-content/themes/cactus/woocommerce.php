<?php
get_header();

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//add_action( 'cactus_show_product_sale_flash', 'woocommerce_show_product_sale_flash', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'cactus_before_shop_loop_item', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'cactus_after_shop_loop_item', 5 );

add_action( 'woocommerce_before_shop_loop_item_title', 'cactus_before_shop_loop_item_title', 10);

add_action( 'woocommerce_shop_loop_item_title', 'cactus_template_loop_product_title', 10 );

add_action( 'cactus_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );

//add_filter( 'woocommerce_product_add_to_cart_text', 'cactus_product_single_add_to_cart_text', 100 );

add_action( 'cactus_template_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'cactus_template_loop_rating', 'woocommerce_template_loop_rating', 5 );


function cactus_woocommerce_show_page_title( ) {
    return false;
}
add_filter( 'woocommerce_show_page_title', 'cactus_woocommerce_show_page_title' );


function cactus_before_shop_loop_item() 
{
    $return = '<div class="product-inner">';
    echo $return;
}
	
function cactus_after_shop_loop_item()
{
    $return = '</div>';
    echo $return;
}
	
function cactus_product_single_add_to_cart_text()
{
    return '<i class="fa fa-shopping-cart"></i><i class="fa fa-check"></i>';
}

function cactus_wcwl_add_wishlist_on_loop()
{
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
	
if (defined('YITH_WCWL')) {
    add_action( 'cactus_add_to_wishlist', 'cactus_wcwl_add_wishlist_on_loop', 15 );
}

function cactus_before_shop_loop_item_title()
{
    global $post, $product, $woocommerce, $wishlists;

	$id               = get_the_ID();
	$size             = 'shop_catalog';
	$gallery          = get_post_meta($id, '_product_image_gallery', true);
	$attachment_image = '';

	if (!empty($gallery)) {
		$gallery          = explode( ',', $gallery );
		$first_image_id   = $gallery[0];
		$attachment_image = wp_get_attachment_image( $first_image_id, $size, false, array( 'class' => 'hover-image' ) );
	}
	
	if (has_post_thumbnail()) {
		$thumb = get_the_post_thumbnail(get_the_ID(), "shop_catalog"); 

		$product_image = $thumb.$attachment_image;
	} else {
		$product_image = '<img src="'. wc_placeholder_img_src() .'" alt="Placeholder" />';
	}
	
	$onsale = '';
	if ($product->is_on_sale()) : 
		$onsale = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'cactus' ) . '</span>', $post, $product ); 
	endif; 

	echo  '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'.$onsale.'
					  '.$product_image.'
					  <h2 class="woocommerce-loop-product__title">'.get_the_title().'</h2>';
											 do_action( 'cactus_template_loop_rating' );
										echo '<span class="price">';
                                              do_action( 'cactus_template_loop_price' );
                                        echo '</span>
	
				  </a>';
}
	
function cactus_template_loop_product_title()
{
	
	global $post, $product, $woocommerce, $wishlists;
	
	$add_to_cart_link_class =  implode( ' ', array_filter( array(
					//	'product_type_' . $product->product_type,
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
				) ) );
				
    do_action( 'cactus_template_loop_add_to_cart',array('class'=> 'button '.$add_to_cart_link_class) );
    
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="page-title-bar title-left">
            <div class="container">
                <header class="woocommerce-products-header">
                <?php if (is_shop()):?>
			    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <?php elseif ( is_product_category() || is_product_tag() ):?>
                <h1 class="woocommerce-products-header__title page-title"><?php single_term_title();?></h1>
                <?php else:?>
                <h1 class="woocommerce-products-header__title page-title"><?php the_title(); ?></h1>
                <?php endif; ?>                
                </header>
                <nav class="woocommerce-breadcrumb">
                   <?php woocommerce_breadcrumb(array('wrap_before' => '<i class="fa fa-home"></i> ',));?>
                </nav>   
                <div class="clearfix"></div>            
            </div>
        </section>
        
<div class="post-wrap">
<div class="container">
<div class="page-inner row no-aside">
<div class="col-main">
	<section class="page-main" role="main" id="content">
	<div class="page-content">
	<?php woocommerce_content(); ?>
	</div>
</div>
</div>
</div>
</div>
</div>
</article>
<?php
get_footer();