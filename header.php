<!DOCTYPE html>
<html>
<head>
	<?php global $sa_settings; //gets the current value of all the settings as stored in the db ?>
<!--[if lt IE 9]>
<script>
document.createElement('header');
document.createElement('nav');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('hgroup');
</script>
<![endif]-->
<meta charset="UTF-8" /> 
<meta name="viewport" content="width=device-width">
<title><?php
global $page, $paged, $post;

wp_title( '|', true, 'right' );

bloginfo( 'name' );

$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'serge' ), max( $paged, $page ) );

?></title>

<?php if(is_front_page()) { ?>
<meta name="description" content="Serge DeNimes is a contemporary, relevant and multi-faceted Brand founded by Oliver Proudlock comprising a high-quality, urban, on-trend fashion label." />
<?php } elseif ( (is_page() || is_single() ) && $meta_desc = get_post_meta( get_the_ID(), 'serge_meta_desc', true) ) { ?>
<meta name="description" content="<?php echo $meta_desc; ?>" />
<?php }?>

<link href='http://fonts.googleapis.com/css?family=Oswald|Lato:400' rel='stylesheet' type='text/css'> 
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<?php $stylesheet = serge_auto_version('styles/main.css'); ?>
<link href="<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" />

<style type="text/css">
<?php 
if ($wide)  { ?> 
	#page_content img{max-width:920px!important;}
	<?php }

	if ( ( is_page() || is_single() ) && $styles = get_post_meta($post->ID, 'Styles', true) ) {
		echo $styles; 
	}

if ( $sa_settings['sa_custom_css'] ){ //<!-- Here is the custom css -->
	echo stripcslashes($sa_settings['sa_custom_css']); 
	} ?>
	</style>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 

	if ($sa_settings['sa_header_code'] != ''){
		echo stripcslashes($sa_settings['sa_header_code']);
	} 
	if ($sa_settings['sa_analytics_code'] != ''){
		echo stripcslashes($sa_settings['sa_analytics_code']);
	} ?>
	<!-- Loaded by wp_head() -->
	<?php wp_head(); ?>
	<!-- /Loaded by wp_head() -->
</head>
<body <?php body_class(); ?>>

<!-- Facebook Like script -->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128433107227477";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- /Facebook Like script -->

	<div id='wrapper'>
		<header id='header'>
			<!-- Social Media Links -->

			<div class="social socmed" id="socmed1">
				<a title="Serge DeNimes Facebook Page" href="http://www.facebook.com/pages/Serge-DeNimes/197436926939967"><i class="icon-facebook"></i></a>
				<a title="Serge DeNimes Twitter" href="http://www.twitter.com/sergedenimes"><i class="icon-twitter"></i></a>
				<a title="So Serge Tumblr" href="http://soserge.com/"><i class="icon-tumblr"></i></a>
				<a title="Serge DeNimes YouTube Channel" href="http://www.youtube.com/sdnimes"><i class="icon-youtube"></i></a>
				<a title="Serge Songs of the Week on Spotify" href="http://open.spotify.com/user/1163287097/playlist/1ztfJ8Z9278J7AVPtRSMg5"><i class="icon-spotify"></i></a>
				<a title="Serge DeNimes Pinterest" href="http://pinterest.com/sergedenimes/"><i class="icon-pinterest"></i></a>
			</div>
			<!-- /Social Media Links -->
			<?php get_search_form(); ?> 
			<?php if (is_url($sa_settings['sa_header_image'])){ ?>
			<a id="home_link" href="<?php bloginfo("url"); ?>"><img src="<?php echo $sa_settings['sa_header_image']; ?>" alt="<?php bloginfo('name'); ?>" height="175" width="565"/></a>
			<h1 style="display:none;"><?php bloginfo('name'); ?></h1>
			<h2 style="display:none;"><?php bloginfo('description'); ?></h2>
			<?php } else { ?>
			<h1><a href="<?php echo home_url();  ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			<?php } ?>
			<?php 
			$args = array(
				'container' => 'nav',
				'container_class' => 'menu',
				'container_id' => 'stickyMenu',
				'menu' =>'header-menu'
				);
			$args2 = array(
				'show_description' => false,
				'menu' => 'main-nav', 
				'items_wrap'     => '<select id="drop-nav"><option value="">Select a page...</option>%3$s</select>',
				'container' => false,
				'walker'  => new select_menu_walker(),
				'menu' =>'header-menu'
				);

			wp_nav_menu($args); 
wp_nav_menu( $args2 ); //This is the dropdown menu.
?>
<div id="stickyAlias"></div>
<div class="clear"></div>
</header><!-- /#header -->
<div id="main-content">