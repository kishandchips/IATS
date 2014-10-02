<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<div id="single-product">
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

	<?php while ( have_posts() ) : the_post(); ?>
		<div id="content" class="section">
			<div class="inner-container">

				<?php wc_get_template_part( 'content', 'single-product' ); ?>
				
			</div><!-- .inner-container -->				
		</div>
	<?php endwhile; // end of the loop. ?>

</div><!-- #single-product -->
<?php get_footer( 'shop' ); ?>