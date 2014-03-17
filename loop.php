<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="postheader">
		<?php if( !is_single() && !is_page() ) { ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php } else { ?>
		<?php the_title(); ?>
		<?php } ?>
	</h2>

	<?php if( !is_page() ) { ?>
	<div class="post-head-meta">
		<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('j M Y'); ?></time>
		<div class="comments"><?php comments_popup_link('0', '1', '%'); ?></div>
	</div>
	<?php } ?>

	<div class="entry">
		<?php the_content('Read on &raquo;'); ?>
	</div>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

	<div class="clear"></div>

	<?php 
	if( !is_page() ) {
		include("postmeta.php"); 
		include("social_buttons.php");
	} 
	?>
</article><!-- /#post-<?php the_ID(); ?> -->
