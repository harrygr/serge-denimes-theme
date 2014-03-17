<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

//Append a file's last modified time (mtime) to the url as a get parameter to prevent caching when it's updated.
//Feed it a file path string relative to the theme's root.
function serge_auto_version($file){
	if ($file[0] != "/"){$file = "/" . $file;}
	$file_url = get_template_directory_uri() . $file;
	$file_path = get_template_directory() . $file;

	if ( !file_exists($file_path)){
		echo "<!-- file: '$file_path' does not exist -->";
		return $file_url;
	}
	$mtime = filemtime($file_path);
	return $file_url . "?t=" . $mtime;
}
function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
		);
}
if ( !is_admin() ) {
	//enqueus jquery if needed
	wp_deregister_script('jquery');
        wp_register_script(
        	'jquery', 
        	'//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js', 
        	false, 
        	'2.0.2'
        	);
	wp_enqueue_script('jquery');

	//enqueue the twitter js file
	wp_register_script( 'twitter_widgets','//platform.twitter.com/widgets.js' );
	wp_enqueue_script('twitter_widgets');

	wp_register_script( 
		'serge-scripts',
		get_template_directory_uri() . '/js/serge-scripts-ck.js', 
		array('jquery'), 
		2.1,
		true
		 );
	wp_enqueue_script( 'serge-scripts');

	//load in the store page image flipper plugin
	require_once('functions/image-flipper.php');
}
global $sa_settings;
if (!isset($sa_settings)){
$sa_settings = get_option( 'sa_options' ); //gets the current value of all the settings as stored in the db
}
//pr($sa_settings);


//New options page
if (is_admin()){

	$functions_path = TEMPLATEPATH . '/options/';
//Theme Options
	require_once ($functions_path . 'options.php');
}
//END New options page

// Remove the links to the extra feeds such as category feeds if chosen
if($sa_settings['sa_cleanfeedurls'] !='' ) {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}

//register the custom header menu
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' )
			)
		);
}
add_action( 'init', 'register_my_menus' );

//disable the built-in woocommerce style
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//theme support for thumbnails and feeds
add_theme_support( 'post-thumbnails' );
add_custom_background();
add_image_size( 'homethumbs', 300, 300, true );//sets an image size for the home page - this will crop images if necessary.
//add_image_size( 'gridthumbs', 200, 300, true );
add_image_size( 'whowears-thumb', 313, 9999 ); //300 pixels wide (and unlimited height)
add_theme_support('automatic-feed-links');

//registers the widgetised sidebar and footer
if ( function_exists('register_sidebar') )
{
	register_sidebar(array('name' => 'Blog Sidebar'));
	
	$args = array('name' => 'Left Footer','before_title' => '<h4 class="widgettitle">','after_title' => "</h4>");
	register_sidebar($args);
	$args = array('name' => 'Center Footer','before_title' => '<h4 class="widgettitle">','after_title' => "</h4>");
	register_sidebar($args);
	$args = array('name' => 'Right Footer','before_title' => '<h4 class="widgettitle">','after_title' => "</h4>");
	register_sidebar($args);
	
	register_sidebar(array('name' => 'Shop Sidebar', 'id' => 'shop'));

}
//changes the excerpt more link to a raquo
function new_excerpt_more($more) {
	//return '...<a href="'. get_permalink($post->ID) . '">&raquo;</a>';
	return "&raquo;";
}
add_filter('excerpt_more', 'new_excerpt_more');

//Checks if a string is a url	
function is_url($url){
	$url = substr($url,-1) == "/" ? substr($url,0,-1) : $url;
	if ( !$url || $url=="" ) return false;
	if ( !( $parts = @parse_url( $url ) ) ) return false;
	else {
		if ( $parts[scheme] != "http" && $parts[scheme] != "https" && $parts[scheme] != "ftp" && $parts[scheme] != "gopher" ) return false;
		else if ( !eregi( "^[0-9a-z]([-.]?[0-9a-z])*.[a-z]{2,4}$", $parts[host], $regs ) ) return false;
		else if ( !eregi( "^([0-9a-z-]|[_])*$", $parts[user], $regs ) ) return false;
		else if ( !eregi( "^([0-9a-z-]|[_])*$", $parts[pass], $regs ) ) return false;
		else if ( !eregi( "^[0-9a-z/_.@~-]*$", $parts[path], $regs ) ) return false;
		else if ( !eregi( "^[0-9a-z?&=#,]*$", $parts[query], $regs ) ) return false;
	}
	return true;
}


    /**
    * add a default-gravatar to options
    */
    if ( !function_exists('fb_addgravatar') ) {
    	function fb_addgravatar( $avatar_defaults ) {
    		$myavatar = get_bloginfo('template_directory') . '/styles/img/avatar.png';
    		$avatar_defaults[$myavatar] = 'Serge Peacock';
    		return $avatar_defaults;
    	}
    	add_filter( 'avatar_defaults', 'fb_addgravatar' );
    }
    
    
//Custom editor stylesheet
    add_editor_style( 'editor_style.css' );


//Add gallery attribute to galleries for lightbox
    add_filter( 'wp_get_attachment_link' , 'sa_add_gallery_rel' );
function sa_add_gallery_rel( $attachment_link ) {
	global $post;
	$attachment_link = str_replace('<a', '<a data-fancybox-group="group-' . $post->ID . '"', $attachment_link);
	return $attachment_link;
}


//Retrieve the Posts page URL
    function get_posts_page_url() {
    	if( 'page' == get_option( 'show_on_front' ) ) {
    		$posts_page_id = get_option( 'page_for_posts' );
    		$posts_page = get_page( $posts_page_id );
    		$posts_page_url = site_url( get_page_uri( $posts_page_id ) );
    	}
    	else {
    		$posts_page_url = site_url();
    	}
    	return $posts_page_url;
    }


//Function to get the URL of the blog page
    if ( ! function_exists( 'serge_get_posts_page' ) ) :

    	function serge_get_posts_page($info) {
    		if( get_option('show_on_front') == 'page') {
    			$posts_page_id = get_option( 'page_for_posts');
    			$posts_page = get_page( $posts_page_id);
    			$posts_page_title = $posts_page->post_title;
    			$posts_page_url = get_page_uri($posts_page_id  );
    		}
    		else $posts_page_title = $posts_page_url = '';

    		if ($info == 'url') {
    			return $posts_page_url;
    		} elseif ($info == 'title') {
    			return $posts_page_title;
    		} else {
    			return false;
    		}
    	}
    	endif;
    	/* WooCommerce Shizz */

    	add_theme_support( 'woocommerce' );

if(function_exists('is_woocommerce')): //only execute the following if woocommerce is running.

// Extra tab and panel for product pages

require_once('functions/tabs.php');

	//Hide the "add to cart button" on shop pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_woocommerce_loop_add_to_cart_link' );

function custom_woocommerce_loop_add_to_cart_link( $button ) {

	if ( $product->product_type == 'variable' )
		return '';

	return $button;
}

//hide the sales badge
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
	return false;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}


	// Change number or products per row to 3
add_filter('loop_shop_columns', 'serge_loop_columns');
if (!function_exists('serge_loop_columns')) {
	function serge_loop_columns() {
		return 3;
	}
}

	// Display chosen products per page.

if($_GET['showall']==1)
	{ $num_prods = 99;}
else
	{ $num_prods = 21;}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$num_prods.';' ), 20 );


	// Insert the social media buttons after the product description
add_action('woocommerce_after_single_product_summary', 'serge_insert_socmed');

function serge_insert_socmed( ) {
	include(get_template_directory() .'/social_buttons.php');
	echo "<br/>";
}

function wc_micro_cart(){
	if (!isset($woocommerce)) { global $woocommerce;} ?>
	<div id="micro-cart">
		<?php if ($woocommerce->cart->cart_contents_count > 0){ ?>

		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="visit the shop">
			<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
		</a>
		<span class="mc-price"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
		<?php } else { ?>
		<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" title="visit the shop">Basket Empty</a>
		<?php } ?>
	</div>
	<?php }


	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
	
	if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
		function woocommerce_output_upsells() {
woocommerce_upsell_display( 3,3 ); // Display 3 products in rows of 3
}
}

endif; //woocommerce exists

//Makes a dropdown for the main menu
class select_menu_walker extends Walker_Nav_Menu{
	
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "";
	}
	
	
	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "";
	}
	
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		//check if current page is selected page and add selected value to select element  
		$selc = '';
		$curr_class = 'current-menu-item';
		$is_current = strpos($class_names, $curr_class);
		if($is_current === false){
			$selc = "";
		}else{
			$selc = " selected ";
		}
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$sel_val =  ' value="'   . esc_attr( $item->url        ) .'"';
		
		//check if the menu is a submenu
		switch ($depth){
			case 0:
			$dp = "";
			break;
			case 1:
			$dp = "-";
			break;
			case 2:
			$dp = "--";
			break;
			case 3:
			$dp = "---";
			break;
			case 4:
			$dp = "----";
			break;
			default:
			$dp = "";
		}
		
		
		$output .= $indent . '<option'. $sel_val . $id . $value . $class_names . $selc . '>'.$dp;
		
		$item_output = $args->before;
		//$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		//$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function end_el(&$output, $item, $depth) {
		$output .= "</option>\n";
	}
	
}
?>