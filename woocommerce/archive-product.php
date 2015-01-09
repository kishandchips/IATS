<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<div id="shop">
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

		<?php do_action( 'woocommerce_archive_description' ); ?>

	<?php if ( have_posts() ) : ?>

		<div id="content" class="section">
			<div class="inner-container">

				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					// do_action( 'woocommerce_before_shop_loop' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>		
			</div><!-- .inner-container -->		
		</div><!-- #content -->

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>	
</div><!-- #shop -->

<?php get_footer( 'shop' ); ?>