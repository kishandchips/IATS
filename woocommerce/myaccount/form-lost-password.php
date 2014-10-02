<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>
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

        <form method="post" class="lost_reset_password">

        	<?php if( 'lost_password' == $args['form'] ) : ?>

                <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

                <p class="form-row form-row-first"><label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="user_login" id="user_login" /></p>

        	<?php else : ?>

                <p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>

                <p class="form-row form-row-first">
                    <label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password_1" id="password_1" />
                </p>
                <p class="form-row form-row-last">
                    <label for="password_2"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password_2" id="password_2" />
                </p>

                <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
                <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

            <?php endif; ?>

            <div class="clear"></div>

            <p class="form-row"><input type="submit" class="button" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" /></p>
        	<?php wp_nonce_field( $args['form'] ); ?>

        </form>
        
    </div><!-- .inner-container -->
</div><!-- #content -->