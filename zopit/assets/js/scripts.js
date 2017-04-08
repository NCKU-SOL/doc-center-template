jQuery(function ($) {

    'use strict';


    /* === Preloader === */
    (function () {
        $(window).load(function () {
            $('#pre-status').fadeOut();
            $('#st-preloader').delay(350).fadeOut('slow');
        });
    }());


    /* === Back To Top === */

    (function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });
        $('.scroll-up a').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    }());


    /* === Menu === */

    (function () {
        $('.header .top-menu').slicknav({
            prependTo: '.menu-mobile',
            label: ''
        })
    }());

    /* === Fitvids js === */
    (function () {
        $(".wpb_wrapper").fitVids();
        $(".entry-content").fitVids();
        $(".entry-video").fitVids();
        $(".entry-audio").fitVids();
    }());


    /* === Masonery post === */
    (function () {
        var masonry = $('.masonry_area');
        $(window).load(function () {
            masonry.masonry();//Masonry
        });
    }());

});