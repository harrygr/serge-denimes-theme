<?php
/*
Template Name: Team Page Template
*/
?>
<style>
.team-member {
	box-sizing: border-box;
	 -moz-box-sizing: border-box;
	float:left;
	position: relative;
	width: 300px;
	
	display: inline-block;
	    border: 1px solid #aaa;
	    margin: 18px 10px;
    box-shadow: 0px 0px 12px #aaa;
	background-image: url("http://sergedenimes.com/wp-content/themes/serge/img/polaroid-bg.png");
	
}
.team-member img{
	box-shadow: 0 0 3px #999;
	display: block;
	width:85%!important;
	height:auto;
	margin:26px auto!important;
}
.team-member p{
	margin:7.5%;
}
	@media only screen 
and (min-width:641px){
.team-member-text{
	box-sizing:border-box;
	 -moz-box-sizing: border-box;
	padding:10px;
	position:absolute;
	top:26px;
	left:7.5%;
	 font-size: 12px;
	 width:85%;
	 height:253px;
	opacity: 0;
	color: #fff!important;
	background-color: rgba(50, 50, 50, 0.6);
	-webkit-transition: opacity 220ms ease-in;
	-moz-transition: opacity 220ms ease-in;
	-ms-transition: opacity 220ms ease-in;
	-o-transition: opacity 220ms ease-in;
	transition: opacity 220ms ease-in;
}
.team-member:hover > .team-member-text{
	opacity:1;
	-webkit-transition: opacity 220ms ease-in;
	-moz-transition: opacity 220ms ease-in;
	-ms-transition: opacity 220ms ease-in;
	-o-transition: opacity 220ms ease-in;
	transition: opacity 220ms ease-in;
}
}
	@media only screen 
and (max-width:640px){
.team-member {
width:100%;
margin:18px auto;
}
.team-member-text{
	font-size:11px;
	margin:-19px 7.5% 19px 7.5%;

}
	}

</style>

<?php get_header(); ?>
<!-- Snarf: using team-template.php -->
<div id="page_content"  class="full-width">
	<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="postheader"><?php the_title(); ?></h1>
		<div class="entry">
			<div id="team-members">
				<?php
				if ($images = get_posts(
		array( // Check if there are any attachments
			'post_type' => 'attachment',
			'numberposts' => null,
			'post_status' => null,
			'numberposts' => -1,
			'orderby'	  => 'menu_order',
			'order'		  => 'ASC',
			'post_parent' => $post->ID)
		)){
					foreach($images as $image) {
						$attachment=wp_get_attachment_image_src($image->ID, 'homethumbs');
						?>
						<div class="team-member">
							
							<img src="<?php echo $attachment[0]; ?>" alt="<?php echo $image->post_title; ?>">
							<p><?php echo $image->post_content; ?></p>
							<div class="team-member-text"><?php echo $image->post_excerpt; ?></div>
						</div>

						<?php
					}
				} ?>
			</div>
		</div>
		<div class="clear"></div>

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