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

    //Add the 'zoom' class to image links
    $('a[href*=".png"], a[href*=".gif"], a[href*=".jpeg"], a[href*=".jpg"]').each(function () {
        if (this.href.indexOf('?') < 0) {
            $(this).addClass('zoom');
        }
    });

    //Handler for the nav dropmenu
    $('#drop-nav').change(function () {
        window.location = $(this).find(':selected').val();
    });

    // Check the initial Poistion of the Sticky Header
    var stickyHeaderTop = $('#stickyMenu').offset().top;

    $(window).scroll(function () {

        if ($(window).width() > 639 && $(window).scrollTop() > stickyHeaderTop) {
            //$('#stickyMenu').css({position: 'fixed', top: '0px'});
            $('#stickyAlias').css('display', 'block');
            $('#stickyMenu').addClass('stuckMenu');
        } else {
            //$('#stickyMenu').css({position: 'static', top: '0px'});
            $('#stickyAlias').css('display', 'none');
            $('#stickyMenu').removeClass('stuckMenu');
        }
    });
    
    //Fancybox activate
    $(".zoom").fancybox({
        padding: 0
    });
    $('a[rel=fancybox-media]').fancybox({
        padding: 0,
        helpers: {
            media: true
        }
    });
});
</script>
<?php wp_footer(); ?>
</div><!-- /#wrapper -->
</body>
</html>