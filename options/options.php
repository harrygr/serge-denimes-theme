<?php
include('fields.php');

function sa_register_settings() {
    register_setting( 'sa_theme_options', 'sa_options', 'sa_validate_options' );
}
 
add_action( 'admin_init', 'sa_register_settings' );



//Create the options page
function sa_theme_options() {
    add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'sa_theme_options_page' );
}
 
add_action( 'admin_menu', 'sa_theme_options' );



//The Actual Page
function sa_theme_options_page() {

 
    if ( ! isset( $_REQUEST['updated'] ) )
    $_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>
 
    <div class="wrap">
 
    <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>";
    // This shows the page's name and an icon if one has been provided ?>
 
    <?php if ( false !== $_REQUEST['updated'] ) : ?>
    <p><strong><?php _e( 'Options saved' ); ?></strong></p>
    <?php endif; // If the form has just been submitted, this shows the notification ?>

    <form method="post" action="options.php">
	

    <?php settings_fields( 'sa_theme_options' );
    /* This function outputs some hidden fields required by the form,
    including a nonce, a unique number used to ensure the form has been submitted from the admin page
    and not somewhere else, very important for security */ ?>
	
	<table class="form-table">
	
	<?php sa_options_table(); //This will generate the table of fields to make up the options?>
	
	</table>
	<p><input type="submit" value="Save Options" class="button-primary"/></p>
	</form>
 
    </div>
 
    <?php
}

function sa_validate_options($input){
return $input;
}



?>