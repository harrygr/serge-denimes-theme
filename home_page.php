<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<!-- This is Home Template 3 -->
<div id="page_content_full" class="full-width">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div <?php post_class(); ?>>
		<?php the_content('Read on &raquo;'); ?>
	</div><!-- /#page -->
<?php endwhile; endif; ?>
<div id="home-buttons">
	<!-- Row 1 -->
	<a href="<?php echo $sa_settings['sa_home_url1']; ?>" title="<?php echo $sa_settings['sa_home_text1']; ?>" id="homelink1" class="top_homelink">
		<img class="side-homethumb" title="<?php echo $sa_settings['sa_home_text1']; ?>" src="<?php echo $sa_settings['sa_home_image1']; ?>" alt="<?php echo $sa_settings['sa_home_text1']; ?>" height="308" width="308">
		<p class="home_text"><?php echo $sa_settings['sa_home_text1']; ?></p>
	</a>
	<a href="<?php echo $sa_settings['sa_home_url2']; ?>" rel="fancybox-media" title="Watch a Serge Video" id="homelink2" class="top_homelink">
		<img class="center-homethumb" title="" src="<?php echo $sa_settings['sa_home_image2']; ?>" alt="Serge Video" height="308" width="308">
		<p class="home_text"><?php echo $sa_settings['sa_home_text2']; ?></p>
	</a>
	<?php
	global $post;
	$args = array( 'numberposts' => 1, 'meta_key' => '_thumbnail_id' );
	$myposts = get_posts( $args );

	foreach( $myposts as $post ) :	setup_postdata($post); 
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'homethumbs' );
	?>
	<a href="<?php echo get_posts_page_url(); ?>" title="Visit the Serge Blog" id="homelink3" class="top_homelink">
		<img src="<?php echo $thumb[0]; ?>" width="308" height="308" id="home-blogthumb" class="side-homethumb wp-post-image" alt="The latest blog post image" />
		<p class="home_text">Blog<br/><span class="home_thumb_caption">Latest Post: <?php the_title(); ?></span></p>
	</a>
<?php endforeach; wp_reset_query(); ?>

<!-- Row 2 -->
<a class="middlerowimages" href="<?php echo $sa_settings['sa_home_url3']; ?>" title="<?php echo $sa_settings['sa_home_text3']; ?>">
	<img id="l-homethumb" class="wide-homethumb" title="<?php echo $sa_settings['sa_home_text3']; ?>" src="<?php echo $sa_settings['sa_home_image3']; ?>" alt="<?php echo $sa_settings['sa_home_text3']; ?>" height="338" width="150">
	<?php if($t3a = $sa_settings['sa_home_text3']) { ?>
	<p class="wide-home_text"><?php echo $t3a; ?></p>
	<?php } ?>
</a>

<!-- middle youtube vid -->
<div class="middlerowimages" id="middleyoutube">
	<?php if ( $sa_settings['sa_vid_source'] == 'youtube' ) { //output youtube embed ?>
	<iframe width="616" height="347" src="//www.youtube.com/embed/<?php echo stripslashes( $sa_settings['sa_home_vid_id'] ); ?>" frameborder="0" allowfullscreen></iframe>
	<?php } elseif ( $sa_settings['sa_vid_source'] == 'vimeo' ) { //output vimeo embed?>
<iframe src="//player.vimeo.com/video/<?php echo stripslashes( $sa_settings['sa_home_vid_id'] ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="616" height="347" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<?php } ?>
</div>

<a class="middlerowimages" id="middlerowimage2" href="<?php echo $sa_settings['sa_home_url3b']; ?>" title="<?php echo $sa_settings['sa_home_text3b']; ?>">
	<img id="l-homethumb" class="wide-homethumb" title="<?php echo $sa_settings['sa_home_text3b']; ?>" src="<?php echo $sa_settings['sa_home_image3b']; ?>" alt="<?php echo $sa_settings['sa_home_text3b']; ?>" height="338" width="150">
	<?php if($t3b = $sa_settings['sa_home_text3b']) { ?>
	<p class="wide-home_text"><?php echo $t3b; ?></p>
	<?php } ?>
</a>



<a href="<?php echo $sa_settings['sa_home_url5']; ?>" title="<?php echo $sa_settings['sa_home_text5']; ?>" id="his3container">
	<div id="display_area" style="position:absolute;">
		<ul id="scroller">
			<li><img style="margin: 0px 0 0px !important;" title="<?php echo $sa_settings['sa_home_text5']; ?>" src="<?php echo $sa_settings['sa_home_image5']; ?>" alt="<?php echo $sa_settings['sa_home_text5']; ?>" height="153" width="960" /></li>
		</ul>
	</div>
	<p class="wide-home_text" id="bottom-home-text"><?php echo $sa_settings['sa_home_text5']; ?></p>
</a>
</div><!-- /#home-buttons -->
<div class="clear"></div>
</div> <!-- /#page_content -->

<script type="text/javascript">
(function($) {
	$(function() {
		$("#scroller").simplyScroll();
	});
})(jQuery);
</script>

<?php get_footer(); ?>