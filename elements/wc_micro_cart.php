<?php 
if (!isset($woocommerce))  global $woocommerce?>
<?php //var_dump($woocommerce); ?>
<hgroup id="micro-cart">
	<i class="fa fa-shopping-cart"></i>&nbsp;
	<?php if ($woocommerce->cart->cart_contents_count > 0){ ?>

	<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="View your cart">
		<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
	</a>
	<span class="mc-price"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
	<?php } else { ?>
	<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" title="Visit the shop">Basket Empty</a>
	<?php } ?>
</hgroup>
