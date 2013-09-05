<?php
/*
Template Name: Who Wears Template
*/
?>
<?php get_header(); ?>

<div id="page_content" class="full-width">
	<?php 
	function shortString($string, $maxChars = 30){
		if (strlen($string) <= $maxChars){
			return $string;
		} else {
			return substr($string,0,$maxChars) . "...";
		}
	}
	function array_random($arr, $num = 1) {
		shuffle($arr);

		$r = array();
		for ($i = 0; $i < $num; $i++) {
			$r[] = $arr[$i];
		}
		return $num == 1 ? $r[0] : $r;
	}
	?>
	<?php
	if (!$sa_settings['sa_whowears_quantity']) {$maxquant = 20;} else {$maxquant = $sa_settings['sa_whowears_quantity'];}
	?>
	<?php // The Query
	$args=array(
		'cat'=>1,
		'posts_per_page'=>$maxquant
		);
	$the_query = new WP_Query( $args );
	
	?>
	
	
	<?php if(have_posts()) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
	<?php
	//Call a post image attachment
	$pargs = array( 'post_type' => 'attachment', 'post_status' => null, 'post_parent' => $post->ID,'posts_per_page'=>1 ); 
	$attachments = get_posts($pargs);
	
	if ($attachments) {
		foreach ( $attachments as $attachment ) {
			//$attachment=wp_get_attachment_image_src($attachment->ID, 'whowears-thumb');
			$SoSergePics[] = array('attachment'=>$attachment, 'post-title'=>get_the_title(), 'post-link'=>get_permalink() );

		}
	}
	?>
<?php endwhile; ?>

<?php endif; ?>
<?php 	if($maxquant < count($SoSergePics))$quantity = $maxquant; else $quantity = count($SoSergePics);

$sumHeight = array(1=>15,2=>15,3=>15);
$column = 1;	
?>		
<div id="DynContainer" style="position:relative">
	<?php	
	
	for($n=0; $n<$quantity; $n++){ $SoSergePic = $SoSergePics[$n];
	//foreach ($SoSergePics as $SoSergePic){

		$imageID = $SoSergePic['attachment']->ID;
		$image = wp_get_attachment_image_src($imageID,'whowears-thumb');
		$fullimage = wp_get_attachment_image_src($imageID,'full');
		$title = $SoSergePic['post-title'];
		$postlink = $SoSergePic['post-link'];

		$topPos = $sumHeight[$column];
		$leftPos = array(
			1=>0,
			2=>330,
			3=>660);
			?>

			<div class="hoverparent" style="top:<?php echo $topPos; ?>px; left: <?php echo $leftPos[$column]; ?>px;">
				<a href="<?php echo $fullimage[0]; ?>" title="<?php echo $title; ?>" rel="lightbox" class="zoom"><img src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>" width="313" height="<?php echo $image[2]; ?>" style="height:<?php echo $image[2]; ?>px;" /><!--<p class="whowears-title"><?php echo $title; ?></p>--></a>
				<?php //if (!$sa_settings['sa_soserge_hoverlink'] == '') { ?>
				<div class="hover">
					<a href="<?php echo $postlink; ?>" title="<?php echo $title; ?>"><?php echo shortString($title); ?></a>
					<!--<span><?php //comments_popup_link('0', '1', '%'); ?></span> -->
				</div>
				<?php //} ?>
			</div>

			<?php
				//add on the image height to the column so we know how high each one is
			$sumHeight[$column] = $sumHeight[$column] + $image[2] + 15;

				//FInd the best column to put the next image into
				if ($sumHeight[1] < $sumHeight[2] && $sumHeight[1] < $sumHeight[3]) //Column 1 is the smallest
				{$column = 1;}
				elseif ($sumHeight[2] < $sumHeight[1] && $sumHeight[2] < $sumHeight[3])//Column 2 is the smallest
				{$column = 2;}
				elseif ($sumHeight[3] < $sumHeight[1] && $sumHeight[3] < $sumHeight[2])//Column 3 is the smallest
				{$column = 3;}
				elseif($sumHeight[1] == $sumHeight[2] && $sumHeight[1] == $sumHeight[3]) //if 2 or more columns are the same height then choose one of them randomly...
				{$column =  array_random(array(1,2,3));}
				elseif($sumHeight[1] == $sumHeight[2])
					{$column =  array_random(array(1,2));}
				elseif($sumHeight[2] == $sumHeight[3])
					{$column =  array_random(array(2,3));}
				elseif($sumHeight[1] == $sumHeight[3])
					{$column =  array_random(array(1,3));}	
				
				$i++;
				if($i > $quantity)break;
			} 

			$containerHeight = max($sumHeight);
			?></div>
			<script type="text/javascript">
			// jQuery(document).ready(function () {
			// 	var containerHeight = "<?php echo $containerHeight; ?>px";
			// 	jQuery("#DynContainer").css({height: containerHeight})
			// });
</script>
<style type="text/css">
#column-2 .hover{
	margin-right: auto;
	margin-left: auto;
}
#column-3 .hover{
	margin-left: auto;
}
.hover{
	top: -52px;
	background-color: rgba(0,0,0,0.7);
	height: 40px;
	position: relative;
	text-align: left;
	width: 293px;
	margin-bottom:-40px;
	line-height: 38px;
	padding:0 10px;
	color:#fff;
	visibility:hidden;
	transition:visibility 0s linear 0.3s,opacity 0.3s linear;
	-webkit-transition:visibility 0s linear 0.3s,opacity 0.3s linear;
	-moz-transition:visibility 0s linear 0.3s,opacity 0.3s linear;
	opacity:0;
	
}
.hover a{color:#fff!important;
}
.hover a:hover{
	color:#ccc!important;
}
.hoverparent:hover > .hover{
	visibility:visible;
	opacity:1;
	transition:opacity 0.3s linear;
	-webkit-transition:opacity 0.3s linear;
	-moz-transition:opacity 0.3s linear;
	
}

@media only screen 
and (min-width:641px){
	.hoverparent{
		width:330px; 
		position:absolute;
	}
	#DynContainer{
		height: <?php echo $containerHeight; ?>px;
	}
}

</style>


</div> <!-- /#page_content -->

<?php get_footer(); ?>