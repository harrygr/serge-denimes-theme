    jQuery(document).ready(function($) {
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
});

