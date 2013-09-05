<?php get_header(); ?>
<div id="page_content">

<?php
	if ( have_posts() )
		the_post();
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						
						<div id="author-description" class="entry">
							<h2><?php printf( __( 'About %s', '' ), get_the_author() ); ?></h2>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 72 ) ); ?>
							<p><?php the_author_meta( 'description' ); ?></p>
							
							
						<div class="clear"></div>
						</div><!-- #author-description	-->
					</div><!-- #entry-author-info -->
					
					
<?php endif; ?>

<h2 class="page-title author clear"><?php printf( __( 'Posts by %s', '' ), "<span class='vcard'>" . get_the_author() . "</span>" ); ?></h2>

<?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h2 class="postheader"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="dater">
<?php the_time('j M Y'); ?><div class="comments"><?php comments_popup_link('0', '1', '%'); ?></div>

			</div>
			
		<div class="entry">
			
			<?php the_content('Read on <span class="nav_arrow">&raquo;</span>'); ?></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

			<div class="clear"></div>
	
	
	<?php include("postmeta.php"); ?>
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php endwhile; ?>
	<div class="pnavigation">
		<p class="alignleft"><?php next_posts_link('<span class="nav_arrow">&laquo;</span> Older Entries'); ?>
		</p>
		<p class="alignright"><?php previous_posts_link('Newer Entries <span class="nav_arrow">&raquo;</span>'); ?>
		</p>
	</div><!-- /.pnavigation -->
	<?php else : ?>
	<h4 class="center">Not Found</h4>
	<p class="center">Sorry, but you are looking for something that isn&#39;t here.</p>
	<?php endif; ?>
</div> <!-- /#page_content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>