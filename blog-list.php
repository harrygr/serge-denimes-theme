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
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="postheader"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="dater"><?php the_time('j M Y'); ?><div class="comments"><?php comments_popup_link('0', '1', '%'); ?></div>
			</div>	
		<div class="entry">
			<?php the_content('Read on <span class="nav_arrow">&raquo;</span>'); ?></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>
			<div class="clear"></div>
	<?php include("postmeta.php"); ?>
	<?php get_template_part("social_buttons"); ?>
	</div><!-- /#post-<?php the_ID(); ?> -->
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
} ?>
<?php get_footer(); ?>