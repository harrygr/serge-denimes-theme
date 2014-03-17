<?php
/*
Template Name: One Column
*/
?>
<?php $wide = true; ?>
<?php get_header(); ?>
<div id="page_content" class="full-width">
	<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>
	<?php include('loop.php'); ?>
<?php endwhile; ?>

<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
<?php endif; ?>
</div> <!-- /#page_content -->

<?php get_footer(); ?>