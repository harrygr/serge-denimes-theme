<?php 
add_filter( 'woocommerce_product_tabs', 'serge_new_product_tab' );
function serge_new_product_tab( $tabs ) {
	
	global $post; global $sa_settings;

	//The custom tab 1
	if ($tab_content = get_post_meta($post->ID, 'serge_tab_content', true)) {
		$tabs['custom_tab_1'] = array(
			'title' 	=> __( 'Details &amp; Care', 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> 'serge_custom_tab_content_1'
			);
	}

	//The custom tab 2
	if ( $tab_content = get_post_meta($post->ID, 'serge_tab_content_2', true) ){
		$tabs['custom_tab_2'] = array(
			'title' 	=> __( 'Size &amp; Fit', 'woocommerce' ),
			'priority' 	=> 55,
			'callback' 	=> 'serge_custom_tab_content_2'
			);
	}

	//The general tab
	if ( $tab_content = $sa_settings['sa_general_tab'] ){
		$tabs['general_tab'] = array(
			'title' 	=> __( 'Delivery/Returns', 'woocommerce' ),
			'priority' 	=> 60,
			'callback' 	=> 'serge_general_tab_content'
			);
	}

	return $tabs;
}

function  serge_general_tab_content() {

	global $post; global $sa_settings;
	if ($tab_content = $sa_settings['sa_general_tab'] ) {
		echo $tab_content;
	}
}
function  serge_custom_tab_content_2() {

	global $post;
	if ($tab_content = get_post_meta($post->ID, 'serge_tab_content_2', true)) {
		echo $tab_content;
	}
}

function serge_custom_tab_content_1() {

	global $post;
	if ($tab_content = get_post_meta($post->ID, 'serge_tab_content', true)) {
		echo $tab_content;
	}
}
 ?>
