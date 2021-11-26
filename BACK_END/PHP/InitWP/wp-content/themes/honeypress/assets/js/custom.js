( function ($) {

        /* ---------------------------------------------- /*
         * Page Loader
         /* ---------------------------------------------- */

    $(document).ready(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1500);


        jQuery(function(){
      jQuery(".video-player").mb_YTPlayer();
    });

    jQuery('#video-play').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-play')) {
      jQuery('.video-player').playYTP();
      } else {
      jQuery('.video-player').pauseYTP();
      }
      jQuery(this).toggleClass('fa-play fa-pause');
      return false;
    });

    jQuery('#video-volume').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-volume-off')) {
      jQuery('.video-player').YTPUnmute();
      } else {
      jQuery('.video-player').YTPMute();
      }
      jQuery(this).toggleClass('fa-volume-off fa-volume-up');
      return false;
    });
    });

		    jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                jQuery("li.dropdown ul").css("display", "none");
            }
       });

       jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length && !jQuery(this).closest(".search-box-outer").length ) {
                jQuery('.navbar-collapse').removeClass('show');
             }})


			 //Sticky Header
       jQuery(window).bind('scroll', function () {
 		      if (jQuery(window).scrollTop() > 100)
 		      {
 		            jQuery('.header-sticky').addClass('stickymenu');
 								jQuery('.header-sidebar').css('display','none');
 		      } else {
 		            jQuery('.header-sticky').removeClass('stickymenu');
 							 	jQuery('.header-sidebar').css('display','');
 		      }
       });

        //Scroll to top
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });

        $('a[href="#totop"]').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });

        $(".search-icon").click(function(e){
          e.preventDefault();
         });

          $('.custom-header-preset').click(function(e){
          e.preventDefault();
           $(".custom-header-preset-panel").toggle();
        });

        /* Preloader */
  $(window).on('load', function() {
    var preloaderFadeOutTime = 500;
    function hidePreloader() {
      var preloader = $('#preloader');
      setTimeout(function() {
        preloader.fadeOut(preloaderFadeOutTime);
      }, 500);
    }
    hidePreloader();
  });


}) ( jQuery);
