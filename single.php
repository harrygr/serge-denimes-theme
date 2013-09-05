<?php get_header(); ?>
<div id="page_content">
<?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h2 class="postheader"><?php the_title(); ?></h2>
			
			<div class="dater">
				<?php the_time('j M Y'); ?><div class="comments"><?php comments_popup_link('0', '1', '%'); ?></div>
			</div>
				

		
		<div class="entry">
			
			<?php the_content('Read on &raquo;'); ?></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

			<div class="clear"></div>
	
	
	<?php include("postmeta.php"); ?>
	<?php include("social_buttons.php"); ?>
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php comments_template(); ?>
	<?php endwhile; ?>

	<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
	<?php endif; ?>
</div> <!-- /#page_content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>