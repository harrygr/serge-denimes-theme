<?php get_header(); ?>
<div id="page_content">
<!-- Snarf: using woocommerce2.php -->

<?php woocommerce_content(); ?>
</div> <!-- /#page_content -->

<?php 
if (function_exists("is_woocommerce")){
  if (is_woocommerce()){
    get_template_part("sidebar","shop");
  } else {
    get_sidebar();
  }
} else {
get_sidebar();
}
 ?>
<?php get_footer(); ?>