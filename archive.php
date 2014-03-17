<?php get_header(); ?>
<div id="page_content">
	<?php if(have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2 class="pagetitle"><?php single_cat_title(); ?></h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('F jS Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('F Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2 class="pagetitle">Posts by <?php echo get_the_author(); ?></h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="pagetitle">Blog Archives</h2>
	<?php } ?>
	
	<?php while(have_posts()) : the_post(); ?>

	<?php include('loop.php'); ?>
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