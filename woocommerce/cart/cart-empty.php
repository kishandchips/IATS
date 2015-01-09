<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();
?>
<div id="cart-bar">
    <?php global $woocommerce; ?> 
    <a href="<?php bloginfo('url'); ?>/cart">
        <i class="icon-shop"></i>
        <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
    </a>
</div>
    
<header id="page-header" class="shop">
    
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    <h1 class="title">
        <i class="icon-shop"></i>
        <?php woocommerce_page_title(); ?>
    </h1>   
    <?php endif; ?>
    
</header><!-- #page-header -->

<div id="content" class="section">
    <div class="inner-container">

	<p class="cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

	<?php do_action( 'woocommerce_cart_is_empty' ); ?>

	<p class="return-to-shop"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php _e( 'Return To Shop', 'woocommerce' ) ?></a></p>

	</div><!-- .inner-container -->
</div><!-- #content -->