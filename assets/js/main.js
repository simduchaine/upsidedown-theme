
// Wait for window load and show spinner
jQuery(window).load(function() {
		// Animate loader off screen
		jQuery(".spinner").fadeOut("slow");;
	});

// SmoothScroll
// $fn.scrollSpeed(step, speed, easing);
jQuery.scrollSpeed(100, 800);



// Mobile menu button (add class for animation and menu open)
jQuery(document).ready(function ($) {
    $.fn.menumaker = function (options) {
        var flexmenu = $(this), settings = $.extend({
                format: 'dropdown',
                sticky: false
            }, options);
        return this.each(function () {
            $(this).find('.menu-button').on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === 'dropdown') {
                        mainmenu.find('ul').show();
                    }
                }
            });
            flexmenu.find('li ul').parent().addClass('has-sub');
            subToggle = function () {
                flexmenu.find('.has-sub').prepend('<span class="submenu-button"></span>');
                flexmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                subToggle();
            else
                flexmenu.addClass('dropdown');
            if (settings.sticky === true)
                flexmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 1280;
                if ($(window).width() >= mediasize) {
                    flexmenu.find('ul').show();
                }
                if ($(window).width() < mediasize) {
                    flexmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };

   $('#flexmenu').menumaker({ format: 'multitoggle' });
  
});


// Search Popup

jQuery(function ($) {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    /*$('form').submit(function(event) {
        event.preventDefault();
        return false;
    })*/
});


// Change Post style header on mobile

jQuery(function ($) {
    $(window).resize(function() {
        if ($(window).width() < 640 ) {
            $('#title-section').removeClass('article-meta absolute-center').addClass('mobile-title')
        } else {
            $('#title-section').removeClass('mobile-title').addClass('article-meta absolute-center')
        }
    });
});