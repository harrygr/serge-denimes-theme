<?php if (!isset($sa_settings)){
global $sa_settings;
$sa_settings = get_option( 'sa_options' ); //gets the current value of all the settings as stored in the db
} ?>
<footer id="footer">
<?php //if (!is_page('home')){ ?>
<div id="footer-left" class="footer-widget"><ul><?php dynamic_sidebar(2); ?></ul></div>
<div id="footer-center" class="footer-widget"><ul><?php dynamic_sidebar(3); ?></ul></div>
<div id="footer-right" class="footer-widget"><ul><?php dynamic_sidebar(4); ?></ul></div>
<?php //} ?>
<div id="permfooter" class="clear">
<?php if (is_page() && !is_page('blog-list')){ include('social_buttons.php'); } ?>
<div class="alignright scopy">&copy; Copyright <?php echo bloginfo('title').' '.date('Y'); ?></div>
</div><!-- /#permfooter -->
</footer><!-- /#footer -->
</div><!-- /#content -->
<script type="text/javascript">
jQuery(document).ready(function ($) {
    //Fancybox activate
    $(".zoom").fancybox({
        padding: 0
        <?php if(is_page( 'lookbook' )){ ?>
        ,    
        margin     : 5,
        autoCenter : false,
        title      : false,
        afterLoad  : function () {
            $.extend(this, {
                aspectRatio : false,
                type    : 'html',
                width   : '100%',
                height  : '100%',
                content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
            });
        }
        <?php } ?>
    });
    $('a[rel=fancybox-media]').fancybox({
        padding: 0,
        helpers: {
            media: true
        }
    });

    //trigger fancybox popup
    <?php if(is_page( 'lookbook' )){ ?>
    $('.image-grid .sub-image:first a').trigger('click');
    <?php } ?>
});
</script>
<?php wp_footer(); ?>
</div><!-- /#wrapper -->
</body>
</html>