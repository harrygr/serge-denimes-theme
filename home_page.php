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
<a href="<?php echo $sa_settings['sa_home_url1']; ?>" title="<?php echo $sa_settings['sa_home_text1']; ?>" id="homelink1" class="top_homelink"><img class="side-homethumb" title="<?php echo $sa_settings['sa_home_text1']; ?>" src="<?php echo $sa_settings['sa_home_image1']; ?>" alt="<?php echo $sa_settings['sa_home_text1']; ?>" height="308" width="308"><p class="home_text"><?php echo $sa_settings['sa_home_text1']; ?></p></a>
<a href="<?php echo $sa_settings['sa_home_url2']; ?>" rel="fancybox-media" title="Watch a Serge Video" id="homelink2" class="top_homelink"><img class="center-homethumb" title="" src="<?php echo $sa_settings['sa_home_image2']; ?>" alt="Serge Video" height="308" width="308"><p class="home_text"><?php echo $sa_settings['sa_home_text2']; ?></p></a>
<?php
global $post;
$args = array( 'numberposts' => 1, 'meta_key' => '_thumbnail_id' );
$myposts = get_posts( $args );

foreach( $myposts as $post ) :	setup_postdata($post); 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'homethumbs' );
?>
<a href="<?php echo get_posts_page_url(); ?>" title="Visit the Serge Blog" id="homelink3" class="top_homelink"><img src="<?php echo $thumb[0]; ?>" width="308" height="308" id="home-blogthumb" class="side-homethumb wp-post-image" alt="The latest blog post image" /> <p class="home_text">Blog<br/><span class="home_thumb_caption">Latest Post: <?php the_title(); ?></span></p></a>
<?php endforeach; ?>
<?php $now_seconds = date("s"); 

if(($now_seconds - (2 * floor($now_seconds/2))) == 0)
{ ?>
<a class="middlerowimages" href="<?php echo $sa_settings['sa_home_url3']; ?>" title="<?php echo $sa_settings['sa_home_text3']; ?>"><img id="l-homethumb" class="wide-homethumb" title="<?php echo $sa_settings['sa_home_text3']; ?>" src="<?php echo $sa_settings['sa_home_image3']; ?>" alt="<?php echo $sa_settings['sa_home_text3']; ?>" height="210" width="471"><p class="wide-home_text"><?php echo $sa_settings['sa_home_text3']; ?></p></a>
<?php } else { ?>
<a class="middlerowimages" href="<?php echo $sa_settings['sa_home_url3b']; ?>" title="<?php echo $sa_settings['sa_home_text3b']; ?>"><img id="l-homethumb" class="wide-homethumb" title="<?php echo $sa_settings['sa_home_text3b']; ?>" src="<?php echo $sa_settings['sa_home_image3b']; ?>" alt="<?php echo $sa_settings['sa_home_text3b']; ?>" height="210" width="471"><p class="wide-home_text"><?php echo $sa_settings['sa_home_text3b']; ?></p></a>
<?php } wp_reset_query(); ?>
<a class="middlerowimages" id="middlerowimage2" href="<?php echo $sa_settings['sa_home_url4']; ?>" title="<?php echo $sa_settings['sa_home_text4']; ?>"><img id="r-homethumb" class="wide-homethumb" title="<?php echo $sa_settings['sa_home_text4']; ?>" src="<?php echo $sa_settings['sa_home_image4']; ?>" alt="<?php echo $sa_settings['sa_home_text4']; ?>" height="210" width="471"><p class="wide-home_text">
<?php echo $sa_settings['sa_home_text4']; ?></p></a>

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