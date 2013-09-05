<?php get_header(); ?>
<div id="page_content">


<?php if(have_posts()) : ?>
<h2 class="page-title"><?php printf( __( 'Search Results for "%s"', 'serge' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="border-bottom: 1px solid #CCCCCC;">
		
			<h2 class="postheader"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>

			
		
		<div class="entry">
			<?php
			if ( has_post_thumbnail() ) {
			the_post_thumbnail('thumbnail', array('class' => 'alignright'));
			} ?>
			<?php the_excerpt(); ?>
			
</div>
			<?php //wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '' ), 'after' => '</div>' ) ); ?>

			<div class="clear"></div>
	
	<p class="postmetadata">
	Published <?php the_time('j M Y'); ?>
	<?php edit_post_link('Edit', ' | ', ''); ?>
	</p>
	
	</div><!-- /#post-<?php the_ID(); ?> -->
	<?php endwhile; ?>
	<div class="pnavigation">
		<p class="alignleft"><?php next_posts_link('<span class="nav_arrow">&laquo;</span> Older Entries'); ?>
		</p>
		<p class="alignright"><?php previous_posts_link('Newer Entries <span class="nav_arrow">&raquo;</span>'); ?>
		</p>
	</div><!-- /.pnavigation -->
	<?php else : ?>
	<h2 class="center">Sorry</h2>
	<p class="center">No results found</p>
	<?php endif; ?>
</div> <!-- /#page_content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>