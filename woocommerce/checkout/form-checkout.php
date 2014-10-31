<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
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

		<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

			<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div class="col2-set" id="customer_details">

					<div class="col-1">

						<?php do_action( 'woocommerce_checkout_billing' ); ?>

					</div>

					<div class="col-2">

						<?php do_action( 'woocommerce_checkout_shipping' ); ?>

					</div>

				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

			<?php endif; ?>

			<?php do_action( 'woocommerce_checkout_order_review' ); ?>

		</form>

	</div><!-- .inner-container -->
</div><!-- #content -->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>