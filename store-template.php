<?php
/*
Template Name: Store Page
*/
?>
<!-- Snarf: using store-template.php -->
<?php get_header(); ?>
<div id="page_content">
<?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1 class="postheader"><?php the_title(); ?></h1>
			
		
		<div class="entry">
			
			<?php the_content('Read on &raquo;'); ?></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

			<div class="clear"></div>
	
	
	<p class="postmetadata">
	<?php edit_post_link('Edit', '', ''); ?>
	</p>
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php endwhile; ?>
	<?php if ($sa_settings['sa_pagecommentdisable'] == '') { comments_template(); }?>
	<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
	<?php endif; ?>
</div> <!-- /#page_content -->
<?php get_template_part("sidebar","shop"); ?>
<?php get_footer(); ?>