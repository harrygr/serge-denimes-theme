
<?php get_header(); ?>
<section id="page_content">
	<?php 
	if( have_posts() ) : 

		while(have_posts()) : 
			the_post();

	include('loop.php');

	comments_template();
	endwhile; 
	else : 
		?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
<?php endif; ?>
</section> <!-- /#page_content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
