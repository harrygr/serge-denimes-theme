<?php
/*
Template Name: Blog Grid
*/
?>

<!-- Using Blog Grid -->

<?php get_header(); ?>
<style type='text/css'>
.excerpt_box, .lower_box {
    -moz-box-sizing: border-box;
	box-sizing: border-box;
    background-color: rgba(20, 20, 20, 0.6);
    color: #eee;
    font-size: 13px;
    padding: 5px;
    position: absolute;
    width: 300px;

    opacity: 0;

}
.excerpt_box a, .lower_box a{
    color: #eee!important;
}
.lower_box .comments{
	display: inline-block;
	float: right;
	width:14px;
	height:18px;
	font-size: 9px;
	line-height: 15px;
	text-align: center;
	background: transparent url('<?php bloginfo('stylesheet_directory'); ?>/img/speech2.png') center center no-repeat;
}
.excerpt_box{
	height:58px;
    top:-58px;
    -webkit-transition: top .25s ease-in-out,opacity 0.75s;
	   -moz-transition: top .25s ease-in-out,opacity 0.75s;
	    -ms-transition: top .25s ease-in-out,opacity 0.75s;
	     -o-transition: top .25s ease-in-out,opacity 0.75s;
	        transition: top .25s ease-in-out,opacity 0.75s;
}
.lower_box{
	height:30px;
	bottom:-30px;
	-webkit-transition: bottom .25s ease-in-out,opacity 0.75s;
	   -moz-transition: bottom .25s ease-in-out,opacity 0.75s;
	    -ms-transition: bottom .25s ease-in-out,opacity 0.75s;
	     -o-transition: bottom .25s ease-in-out,opacity 0.75s;
	        transition: bottom .25s ease-in-out,opacity 0.75s;
}
.pic-box:hover > .excerpt_box{
		top:0!important;
}
.pic-box:hover > .lower_box{
		bottom:0;
}
.pic-box:hover > .excerpt_box,.pic-box:hover > .lower_box{

	-webkit-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	   -moz-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	    -ms-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	     -o-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	        transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	 opacity:1;      

}
.blog_grid_box div.pic-box{
	display: block;
	    overflow: hidden;
    position: relative;
}
div.pic-box a{
	display: inline-block;
}
.first-col {
    margin-right: 30px;
}
.blog_grid_box {
    float: left;
    height: 400px;
    margin-top: 30px;
    width: 300px;

}
.blog_grid_box img {
    height: 300px !important;
    width: 300px;
    margin-bottom:0!important;
}
.blog_grid_box h2 {
text-align:center;
color:#000;
font-size:14px;
margin-top:0;
}
.blog_grid_box h2:before, .blog_grid_box h2:after{
	content:"";
	width:40%;
	border-top: 1px #bbb solid;
	display: block;
	margin:10px auto;
}
.blog-subheading{
	text-align: center;
	font-weight: normal;
	font-size: 30px;
	margin-bottom: 0;
	border-style: solid none;
	border-width: 1px;
	border-color: #ddd;
	padding: 10px 0;
	clear:both;
}
</style>
<!-- Snarf: using blog_grid.php -->

<section id="page_content" class="full-width">
	<p><a href="<?php echo get_permalink( get_page_by_path( 'blog-list' ) ); ?>">Show Posts in List View</a></p>

	<h2 class="blog-subheading">Recent Posts</h2>
	<?php 
//First we will query blog posts with featured images
	$args = array(
		'post_type'  => 'post',
		'posts_per_page' => 3,
		'meta_key' => '_thumbnail_id'
		);
	$query = new WP_Query($args);

	if( $query->have_posts() ) {
		$count = 1;
		while($query->have_posts()) : $query->the_post(); 
		if( $count%3 == 0 ){ $endClass = "last-col"; } else { $endClass = "first-col"; }
		?>
		<div class='blog_grid_box <?php echo $endClass; ?>' id="post-<?php the_ID(); ?>">
			
			<?php 
			if ( has_post_thumbnail() ) { 
		// only print out the thumbnail if it actually has one
				?>
				<div class="pic-box">
					<?php
					$my_excerpt = get_the_excerpt();
					if ( $my_excerpt != '' ) {
						?>
						<div class="excerpt_box">
							<a href="<?php the_permalink(); ?>" title="Go to <?php the_title( ); ?>">
								<?php the_excerpt_max_charlength(140); ?>
							</a>
						</div>
						<div class="lower_box">
							<em><a href="<?php the_permalink(); ?>" title="Go to <?php the_title( ); ?>">Read more &raquo;</a></em>
							<div class="comments"><?php comments_popup_link('0', '1', '%'); ?></div>
						</div>	
						<?php } ?>
						<a href="<?php the_permalink(); ?>" title="Go to <?php the_title( ); ?>">	
							<?php the_post_thumbnail('homethumbs'); ?>
						</a>
					</div><!-- /.pic-box -->
					<?php } else {
						echo '<p>this post does not have a featured image</p>';
					} ?>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
				</div><!-- /#post-<?php the_ID(); ?> -->
				<?php 
				$count++;
				endwhile; 
			} else {
	//no posts found
			} ?>

			<h2 class="blog-subheading">Blog Categories</h2>
			<?php 
			$grid_cats = explode(',',str_replace(" ", "", $sa_settings['sa_blog_cats']));
			$cat_imgs = explode(',',str_replace(" ", "", $sa_settings['sa_blog_cat_images']));

			$count = 1;
			foreach ($grid_cats as $cat) {
	if ( is_integer(intval($cat)) && intval($cat) ){ 
	//Distinguish between an ID and a slug
		$idObj = get_category($cat); 
	} else {
		$idObj = get_category_by_slug($cat); 
	}
	if(is_object($idObj) && $count < 10){ //Make sure we've got an object
	if($count%3 == 0){$endClass = "last-col";}else{$endClass = "first-col";}

	$cat_link = esc_url(get_category_link( $idObj->term_id ));
	?>
	<div class="blog_grid_box <?php echo $endClass; ?>">
		<a class="pic_link" href="<?php echo $cat_link; ?>">
			<?php if(($idObj->description)!=''){ ?>
			<div class="excerpt_box"><?php echo $idObj->description; ?></div>
			<?php } ?>
			<img src="<?php echo $cat_imgs[$count-1]; ?>" width="300" height="300"/>
		</a>
		<a href="<?php echo $cat_link; ?>">
			<h2><?php echo $idObj->name; ?></h2>
		</a>
	</div>
	<?php  $count++;
}
}


function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}
?>

<p><a href="<?php echo get_permalink( get_page_by_path( 'blog-list' ) ); ?>">Show Posts in List View</a></p>
</section> <!-- /#page_content -->
<?php get_footer(); ?>
