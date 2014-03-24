<hgroup id="micro-cart">
	<?php global $woocommerce; ?>


	<i class="fa fa-shopping-cart"></i>&nbsp;
	<span class="cart_totals">
		<a href="" class="cart_link"></a>&nbsp;
		<span class="cart_amount"></span>
	</span>

</hgroup>

<script>
$(function(){
	// use the custom woocommerce cookie to determine if the empty cart icon should show in the header or the full cart icon should show
// *NOTE: I'm using the jQuery cookie plugin for convenience https://github.com/carhartl/jquery-cookie
var cartCount = $.cookie("woocommerce_cart_count");
var cartTotal = $.cookie("woocommerce_cart_total");
if ( typeof(cartTotal) === "undefined") cartTotal = "£0.00";

var cart_url = "<?php echo $woocommerce->cart->get_cart_url(); ?>";
var shop_url = "<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>";

if (typeof(cartCount) !== "undefined" && parseInt(cartCount, 10) > 0) {
	$('#micro-cart .cart_link').html(cartCount + ' items');
	$('#micro-cart .cart_link').attr('href', cart_url);
} else {
	$('#micro-cart .cart_link').html('Basket Empty');
	$('#micro-cart .cart_link').attr('href', shop_url);
}
$('#micro-cart .cart_amount').html(cartTotal);
});

</script>