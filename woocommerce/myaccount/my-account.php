<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>
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

		<p class="myaccount_user">
			<?php
			printf(
				__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
				$current_user->display_name,
				wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
			);

			printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
				wc_customer_edit_account_url()
			);
			?>
		</p>

		<?php do_action( 'woocommerce_before_my_account' ); ?>

		<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

		<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

		<?php wc_get_template( 'myaccount/my-address.php' ); ?>

		<?php do_action( 'woocommerce_after_my_account' ); ?>

	</div><!-- .inner-container -->
</div><!-- #content -->