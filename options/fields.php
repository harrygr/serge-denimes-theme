<?php

function sa_options_table(){
global $sa_settings;

	$shortname = "sa"; //important to prevent conflict between themes

// Create theme options
global $options;
$options = array (

	array( "type" => "open"),


	 

 
 array( "name" => "Custom Header Image",
 "desc" => "Put the URL of your custom header image here. Max width 960px. This will replace the blog title &amp; description.",
 "id" => $shortname."_header_image",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Number of images for WhoWears",
 "desc" => "The number of images to be shown of the Who Wears Serge page",
 "id" => $shortname."_whowears_quantity",
 "type" => "text",
 "std" => "",
 "class" => "small-text"),
 
 array( "name" => "Disable Comments in Page",
 "desc" => "Disable the comments feature in pages leaving comments only in blog posts",
 "id" => $shortname."_pagecommentdisable",
 "type" => "checkbox",
 "std" => ""),
 
  array( "name" => "Hide tags for posts",
 "desc" => "Hide the tags in the footers of posts leaving only categories and comments (and edit post link if you are logged in as admin)",
 "id" => $shortname."_hidetags",
 "type" => "checkbox",
 "std" => ""),

array( "name" => "Delete Extra Feeds",
 "desc" => "WordPress adds feeds for categories, tags, etc., by default. Check this box to remove them and reduce the clutter.",
 "id" => $shortname."_cleanfeedurls",
 "type" => "checkbox",
 "std" => ""),
	 
array( "name" => "Extra Styling Code",
 "desc" => "Put extra CSS styling code in here",
 "id" => $shortname."_custom_css",
 "type" => "textarea",
 "std" => ""),

array( "name" => "Extra Header Code",
 "desc" => "Put extra stuff for the header in here e.g. extra scripts etc",
 "id" => $shortname."_header_code",
 "type" => "textarea",
 "std" => ""),

array( "name" => "Analytics/Tracking Code",
 "desc" => "You can paste your Google Analytics or other website tracking code in this box. This will be automatically added to the header.",
 "id" => $shortname."_analytics_code",
 "type" => "textarea",
 "std" => ""),
 
  
 array("type" => "whole_width", "html" => "<h3>Home Page Images</h3>"),
 
  array( "name" => "Home Page Image URL 1",
 "desc" => "The top-left image",
 "id" => $shortname."_home_image1",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 1",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text1",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
    array( "name" => "Home Page Image Link 1",
 "desc" => "The URL that the image links to.",
 "id" => $shortname."_home_url1",
 "type" => "text",
 "std" => "",
 "class" => "regular-text",
 "after" => "<p><br/></p>"),
 
   array( "name" => "Home Page Image URL 2",
 "desc" => "The top-middle image.",
 "id" => $shortname."_home_image2",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 2",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text2",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Home Page Image Link 2",
 "desc" => "The URL that the image links to. If this is a youtube video it will open in a Lightbox",
 "id" => $shortname."_home_url2",
 "type" => "text",
 "std" => "",
 "class" => "regular-text",
 "after" => "<p><br/></p>"),
 
 array("type" => "whole_width", "html" => "<hr/><br/><b>The Home page will randonly load either 3a or 3b</b>"),
 
 //---
    array( "name" => "Home Page Image URL 3a",
 "desc" => "The bottom-left image.",
 "id" => $shortname."_home_image3",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 3a",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text3",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Home Page Image link 3a",
 "desc" => "The URL that the image links to.",
 "id" => $shortname."_home_url3",
 "type" => "text",
 "std" => "",
 "class" => "regular-text",
 "after" => "<p><br/></p>"),
 
     array( "name" => "Home Page Image URL 3b",
 "desc" => "The bottom-left image.",
 "id" => $shortname."_home_image3b",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 3b",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text3b",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Home Page Image link 3b",
 "desc" => "The URL that the image links to.",
 "id" => $shortname."_home_url3b",
 "type" => "text",
 "std" => "",
 "class" => "regular-text",
 "after" => "<p><br/></p>"),
 
  array("type" => "whole_width", "html" => "<hr/>"),
 //---
    array( "name" => "Home Page Image URL 4",
 "desc" => "The bottom-right image",
 "id" => $shortname."_home_image4",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 4",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text4",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Home Page Image link 4",
 "desc" => "The URL that the image links to.",
 "id" => $shortname."_home_url4",
 "type" => "text",
 "std" => "",
 "class" => "regular-text",
 "after" => "<p><br/></p>"),
 
  //---
    array( "name" => "Home Page Image URL 5",
 "desc" => "The bottom image",
 "id" => $shortname."_home_image5",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
   array( "name" => "Home Page Image Text 5",
 "desc" => "The text to be overlaid on the image.",
 "id" => $shortname."_home_text5",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),
 
  array( "name" => "Home Page Image link 5",
 "desc" => "The URL that the image links to.",
 "id" => $shortname."_home_url5",
 "type" => "text",
 "std" => "",
 "class" => "regular-text"),

    array("type" => "whole_width", "html" => "<hr/>"),
 //---
       array( "name" => "Blog Front Page Categories",
 "desc" => "The IDs or the slugs of the 6 categories to be displayed, separated by commas",
 "id" => $shortname."_blog_cats",
 "type" => "textarea",
 "std" => "",
 "class" => "regular-text"),

       array( "name" => "Blog Front Page Category Images",
 "desc" => "The URLs of the corresponding category images, spearated by commas. Images should be 300px by 300px",
 "id" => $shortname."_blog_cat_images",
 "type" => "textarea",
 "std" => "",
 "class" => "regular-text"),

array( "type" => "close")

); 

$sa_settings = get_option( 'sa_options' ); //gets the current value of all the settings as stored in the db

	foreach ($options as $value) {
	switch ( $value['type'] ) {


	case 'text':
	?>

		<tr valign="top" class="options_input options_text">
			
			<th><span class="labels"><label for="sa_options[<?php echo $value['id']; ?>]"><?php echo $value['name']; ?></label></th>
			<td><input type="<?php echo $value['type']; ?>" name="sa_options[<?php echo $value['id']; ?>]" id="sa_options[<?php echo $value['id']; ?>]" class="<?php echo $value['class']; ?>" value="<?php if ( $sa_settings[ $value['id'] ]  != "") { echo stripslashes( $sa_settings[ $value['id'] ] ); } else { echo $value[ 'std' ]; } ?>" /></span></td>
			<td><span class="description"><?php echo $value['desc']; ?></span><?php echo $value['after']; ?></td>
		</tr>

	<?php
	break;


	case 'textarea':
	?>
		<tr valign="top" class="options_input options_textarea">
			<th><label for="sa_options[<?php echo $value['id']; ?>]"><?php echo $value['name']; ?></label></th>
			<td colspan=2><p><span class="description"><?php echo $value['desc']; ?></span></p>
			<textarea name="sa_options[<?php echo $value['id']; ?>]" type="<?php echo $value['type']; ?>" class="large-text code" cols="50" rows="10"><?php if ( $sa_settings[ $value['id'] ]  != "") { echo stripslashes( $sa_settings[ $value['id'] ] ); } else { echo $value[ 'std' ]; } ?></textarea></td>
			
		</tr>

	<?php
	break;


	case 'select':
	?>
		<tr class="options_input options_select">
			
			<th><span class="labels"><label for="sa_options[<?php echo $value['id']; ?>]"><?php echo $value['name']; ?></label></span></th>
			<td><select name="sa_options[<?php echo $value['id']; ?>]" id="sa_options[<?php echo $value['id']; ?>]">
			<?php foreach ($value['options'] as $option) { ?>
					<option <?php if ( $sa_settings[ $value['id'] ] == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
			</select></td>
			<td><span class="description"><?php echo $value['desc']; ?></span></td>
		</tr>

	<?php
	break;


	case "radio":
	?>
		<tr class="options_input options_select">
			
			<td><span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span></td>
			  <?php foreach ($value['options'] as $key=>$option) {
				$radio_setting = get_option($value['id']);
				if($radio_setting != ''){
					if ($key == get_option($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
				<td><input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br /></td>
				<?php } ?>
				<td><span class="description"><?php echo $value['desc']; ?></span></td>
		</tr>

	<?php
	break;


	case "checkbox":
	?>
		<tr class="options_input options_checkbox">
			
			<?php if($sa_settings[ $value['id'] ]){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
			<td></td>
			<td><input type="checkbox" name="sa_options[<?php echo $value['id']; ?>]" id="sa_options[<?php echo $value['id']; ?>]" value="true" <?php echo $checked; ?> /> <label for="sa_options[<?php echo $value['id']; ?>]"><?php echo $value['name']; ?></label></td>
			<td><span class="description"><?php echo $value['desc']; ?></span></td>
		 </tr>

	<?php
	break;
	
	case "whole_width":
	?>
		<tr class="options_whole_width">
			<td colspan="3">
			<?php echo $value['html']; ?>
			</td>
		 </tr>

	<?php
	break;
	


	case "close":
	$i++;
	?>


	<?php
	}
	}
}



?>