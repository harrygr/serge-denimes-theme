<?php
/*
Template Name: SoSerge
*/
?>
<?php get_header(); ?>
<div id="page_content" class="full-width">

	<?php if (!$sa_settings['sa_soserge_hoverlink'] == '') { ?>
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
	display:none;
    position: relative;
    text-align: left;
    width: 293px;
    margin-bottom:-40px;
    line-height: 38px;
    padding:0 10px;
    color:#fff;
	}
.hover a{color:#fff!important;
}
.hover a:hover{
color:#ccc!important;
}
.hoverparent:hover > .hover{
	display:block;
}
</style>
<?php } ?>	

<?php
if ($sa_settings['sa_soserge_quantity'] == '') {$maxquant = 20;} else {$maxquant = $sa_settings['sa_soserge_quantity'];}
?>
	<?php // The Query
	  $args=array(
		  'post_type' => 'sosergeposts',
		  );
	$the_query = new WP_Query( $args );
	
	?>
	
	
		<?php if(have_posts()) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<div id="post-<?php the_ID(); ?>" class="aligncenter">
	
	
	<?php
	//Call a post image attachment
	$pargs = array( 'post_type' => 'attachment', 'post_status' => null, 'post_parent' => $post->ID ); 
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
		
		
		$n = 0;
		$i = 1;
		$column = 1;
		$colmax[1] = $quantity/3;
		$colmax[2] = $quantity*2/3;
		$colmax[3] = $quantity;
		
	$column = 0;
	for($n=0; $n<$quantity; $n++){ $SoSergePic = $SoSergePics[$n];
	//foreach ($SoSergePics as $SoSergePic){
				$lastcolumn = $column;
	
				if 		($i <= $colmax[1]){$column = 1;}
				elseif	($i <= $colmax[2] && $i > $colmax[1]){$column = 2;}
				elseif	($i <= $colmax[3] && $i > $colmax[2]){$column = 3;}
				
				$imageID = $SoSergePic['attachment']->ID;
				$image = wp_get_attachment_image_src($imageID,'whowears-thumb');
				$fullimage = wp_get_attachment_image_src($imageID,'full');
				$title = $SoSergePic['post-title'];
				$postlink = $SoSergePic['post-link'];
				
		if ($column != $lastcolumn || $i == 1){
			if ($column != 1){echo "</div>";}?>
		<div class="whowears-column" id="column-<?php echo $column; ?>">
		<?php
		} 	?>
				<div class="hoverparent">
				<a href="<?php echo $fullimage[0]; ?>" title="<?php echo $title; ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" alt="<?php echo $title;; ?>" width="313" height="<?php echo $image[2]; ?>" /><!--<p class="whowears-title"><?php echo $title; ?></p>--></a>
				<?php if (!$sa_settings['sa_soserge_hoverlink'] == '') { ?>
				<div class="hover">
				<a href="<?php echo $postlink; ?>" title="<?php echo $title; ?>"><?php echo $sa_settings['sa_soserge_hovertext']; ?></a>
				</div>
				<?php } ?>
				</div>
				
				<?php
				
				
				
				$i++;
				if($i > $quantity)break;
	}
?>
</div> <!-- /#page_content -->

<?php get_footer(); ?>