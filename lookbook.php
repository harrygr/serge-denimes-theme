<?php
/*
Template Name: Lookbook
*/
?>
<?php $wide = true; ?>
<?php get_header(); ?>
<div id="page_content" class="full-width">
<?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1 class="postheader"><?php the_title(); ?></h1>
			
		
		<div class="entry">
			
			<?php the_content('Read on &raquo;'); ?></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

			<div class="clear"></div>
			<div class="image-grid">
	<?php
	if ($images = get_children(
		array( // Check if there is any attachments
			'post_type' => 'attachment',
			'numberposts' => 99,
			'post_status' => null,
			'post_parent' => $post->ID)
		)){
		//pr($images);
		foreach($images as $image) {
			$medium=wp_get_attachment_image_src($image->ID, 'homethumbs');
			$full = wp_get_attachment_image_src($image->ID, 'full');
			//pr($attachment);
			?>
			<div class="sub-image">
			<a href="<?= $full[0]; ?>" rel="prettyPhoto[lookbook]" title="<?= $image->post_title; ?>">
			<img src="<?= $medium[0]; ?>" alt="<?= $image->post_title; ?>">
			</a>
			</div>
			<?php
		}
	}
	?>
	</div>
	<p class="postmetadata">
	<?php edit_post_link('Edit', '', ''); ?>
	</p>
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php endwhile; ?>
	
	<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
	<?php endif; ?>
</div> <!-- /#page_content -->

<?php get_footer(); ?>