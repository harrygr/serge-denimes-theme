<?php
/*
Template Name: Blog List
*/
?>
<!-- Using Blog List -->
<?php get_header(); ?>
<div id="page_content">
<!-- Snarf: using blog-list.php -->
<p class="clear"><a href="<?php echo serge_get_posts_page('url'); ?>">Show Posts in Grid View</a></p>
<?php
$the_query = new WP_Query(); 
$the_query->query( array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page')) );
?>
<?php if($the_query->have_posts()) : ?>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
	<?php include('loop.php'); ?>
	<?php endwhile; ?>
	<div class="pnavigation">
		<p class="alignleft"><?php next_posts_link('<span class="nav_arrow">&laquo;</span> Older Entries',$the_query->max_num_pages); ?>
		</p>
		<p class="alignright"><?php previous_posts_link('Newer Entries <span class="nav_arrow">&raquo;</span>'); ?>
		</p>
	</div><!-- /.pnavigation -->
	<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
	<?php endif; ?>
	<p class="clear"><a href="<?php echo serge_get_posts_page('url'); ?>">Show Posts in Grid View</a></p>
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