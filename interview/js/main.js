(function($) {
    "use strict";
    var youtube = {
        init: function() {
          this.menu();
          this.load_more();
        },
        load_more: function() {
          
            $('.watch-more').on('click', function(e) {
              var token = $(this).attr('data-token');
              $.ajax({
                url: base_url.ajaxurl,
                type: 'POST',
                data: {
                  action: 'interview_next_videos',
                  token: token
                },
                dataType: 'json',
                success: function(data) {
                    if (data.nextPageToken) {
                        $('.watch-more').attr('data-token', data.nextPageToken);
                    } else {
                        $('.watch-more').hide();
                    }
                    $('#video-list').append(data.content);
                }
              });

              return true;
            });  
        },
        menu: function(){
            var menuType = 'desktop';
            $(window).on('resize', function(event) {
                var logo_person = $('.logo_person').attr('class', 'logo_person');
                var ww=$(window).width();
                if(ww>767){
                    $('header .main-nav').find('.container').append(logo_person);
                }  
            });
            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 767px)' ).matches ) {
                    currMenuType = 'mobile';
                }
                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenu = $('#main-nav').attr('id', 'main-nav-mobi').hide();
                        var logo_person = $('.logo_person').attr('class', 'logo_person');
                        $('header').find('.main-header').append($mobileMenu);
                         $('header').find('.main-header').append(logo_person);
                    } else {
                        var $desktopMenu = $('#main-nav-mobi').attr('id', 'main-nav').removeAttr('style');

                        $desktopMenu.find('.sub-menu').removeAttr('style');
                        $('#header').find('.col-md-12').append($desktopMenu);
                        $('.btn-submenu').remove();
                    }
                }
            })
            $('.btn-menu').on('click', function() {
                $('#main-nav-mobi').slideToggle(300);
                $(this).toggleClass('active');
            });
        },
    };
    window.youtube = youtube;
    youtube.init();

})(jQuery);

