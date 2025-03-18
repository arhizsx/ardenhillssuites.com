/*=============================================================
  Theme Name:    Himara - Hotel WordPress Theme
  Author:        Eagle-Themes (Jomin Muskaj)
  Author URI:    http://eagle-themes.com
  Version:       1.0.0
=============================================================*/
(function($) {
  "use strict";

  // =============================================
  // Loader
  // =============================================
  $(window).on('load', function() {
    $(".loader").fadeOut(500);
  });

  /*Document is Ready */
  $(document).ready(function() {

    // =============================================
    // Header
    // =============================================
    $(window).on("scroll", function() {

      var header = $('header');
      var topbar = $('.topbar');
      var adminbar = $('#wpadminbar');
      var windowheight = $(this).scrollTop();
      var menuheight = header.outerHeight();
      var firstlogo = $('.first-logo');
      var secondlogo = $('.second-logo');
      var topbarheight = 0;
      var adminbarheight = 0;

      // WP ADMIN BAR
      adminbar.css('position', 'fixed');
      if (adminbar.length && adminbar.is(':visible')) {
        header.css('top', adminbar.height());
        var adminbarheight = adminbar.outerHeight();
      }

      if (topbar.length) {
        var topbarheight = topbar.outerHeight();
      }

      var fixedheight = topbarheight;
      var topbaradminbar = topbarheight + adminbarheight;

      if (header.length) {

        if ((windowheight > fixedheight) && header.hasClass("sticky-header")) {

          header.addClass('header-fixed-top').delay(200);
          if (!header.hasClass("transparent-header")) {
            header.next("*").css("margin-top", menuheight);
          }
          if (header.hasClass("sticky-header")) {
            header.addClass("scroll-header");
          }
          // Change Logo on scroll
          firstlogo.css("display", "none");
          secondlogo.css("display", "block");

        } else {

          header.removeClass("header-fixed-top");
          if (!header.hasClass("transparent-header")) {
            header.next("*").css("margin-top", "0");
          }

          if (header.hasClass("sticky-header")) {
            header.removeClass("scroll-header");
          }

          // Change logo on reverse scroll
          if ( !header.hasClass('mobile-header') ) {
            firstlogo.css("display", "block");
            secondlogo.css("display", "none");
          }

          // WP Admin Bar
          if (adminbar.length && adminbar.is(':visible')) {

            if ( header.hasClass('transparent-header') ) {
                header.css('top', topbaradminbar);
            } else {

            header.css('top', 0);
          }
        }

        }
      }
    });

    // WP Top Bar
    if ($('#wpadminbar').length && $('#wpadminbar').is(':visible'))  {
      $('.topbar').css('top', $('#wpadminbar').height());
    }

    // =============================================
    // Menu
    // =============================================
    function mmenuInit() {
      var screenwidth = $(window).width();
      var body = $('body');
      var header = $('header');
      var header_layout = himara_js_settings.header_layout;
      var header_state = himara_js_settings.header_state;
      var main_menu = $('#main-menu');
      var mobile_menu = $('#mobile-menu');
      var menu_toggler = $("#toggle-menu-button");
      var menubreakpoint = $('header').data("menutoggle");
      var dropdown = $('.dropdown');
      var biglogo = $('.big-logo');
      var mobilelogo = $('.mobile-logo');
      var menuside = 'right';
      var firstlogo = $('.first-logo');
      var secondlogo = $('.second-logo');

      // Mobile Menu
      if (screenwidth <= menubreakpoint) {

        // Clone Main Menu to be used for the mobile menu
        $("#main-menu ul").clone().addClass("mmenu-init").prependTo(mobile_menu).removeAttr('id').removeClass('navbar-nav mx-auto').find('a').siblings('ul.dropdown-menu').removeAttr('class');

        body.find('.wrapper').css({
          "margin-left": "0",
          "margin-right": "0",
        });

        header.addClass('mobile-header');
        header.removeClass('vertical-header , open-header');

        $('.header-content').css({
          "display": "none"
        })
        main_menu.css({
          "display": "none"
        });
        biglogo.css({
          "display": "none"
        });
        mobilelogo.css({
          "display": "block"
        });

        mobile_menu.mmenu({
          extensions: [
            'position-' + menuside,
            "fx-menu-slide",
          ],
        },

        {

          offCanvas: {
            pageSelector: ".wrapper"
        },

        classNames: {
          fixedElements: {
            fixed: [
              'himara-top-bar',
              'header',

            ]
          }
        }

        });

        var menu_API = mobile_menu.data("mmenu");
        menu_toggler.on("click", function() {
          menu_API.open();
          menu_API.close();
        });

        header.on("click", function() {
          menu_API.close();
        });

        menu_API.bind("open:finish", function() {
          setTimeout(function() {
            menu_toggler.addClass("open");
          });
        });

        menu_API.bind("close:finish", function() {
          setTimeout(function() {
            menu_toggler.removeClass("open");
          });
        });

        // Chage logo on mobile only if vertical header
        if ( ( body.hasClass('himara-vertical-header') ) && ( header.hasClass('mobile-header') ) ) {
          firstlogo.css("display", "none");
          secondlogo.css("display", "block");
        }

      // Desktop
      } else {

        if ( header_layout === 'vertical' ) {
          var header_class = 'vertical-header'
        } else {
          var header_class = 'horizontal-header'
        }

        header.addClass(header_class);
        header.removeClass('mobile-header');
        main_menu.css({
          "display": "block"
        });

        biglogo.css({
          "display": "block"
        });
        mobilelogo.css({
          "display": "none"
        });

        // Desktop Vertical Menu
        if ( body.hasClass('himara-vertical-header') ) {

          $('header').insertBefore('.wrapper');
          $('header > div').removeClass('container');

          if ( header_state === 'opened' ) menu_toggler.addClass('open');
          if ( header_state === 'opened' ) header.addClass('open-header');

          menu_toggler.on("click", function() {

            header.toggleClass('open-header');
            menu_toggler.toggleClass('open');

            $('body').toggleClass('opened');

          });
        }

        // Open Drop Down Menu on hover for horizontal & vertical header
        dropdown.on({
          mouseenter: function() {
            $(this).addClass("open");
          },
          mouseleave: function() {
            $(this).removeClass('open');
            $('.submenu').removeClass('submenu-left');
          }
        });

      }
      header.addClass("loaded-header");
    }

    mmenuInit();

    $(window).resize(function() {
      mmenuInit();
    });

    // =============================================
    // MAGNIFIC POPUP
    // =============================================
    $(".magnific-popup, a[data-rel^='magnific-popup']").magnificPopup({
      type: 'image',
      mainClass: 'mfp-with-zoom',
      zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
        opener: function(openerElement) {
          return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
      },
      retina: {
        ratio: 1,
        replaceSrc: function(item, ratio) {
          return item.src.replace(/\.\w+$/, function(m) {
            return '@2x' + m;
          });
        }
      }
    });

    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"]' ).each(function() {
      $(this).magnificPopup({
        // delegate: '.owl-item:not(.cloned) a',
        // delegate: 'a',
        type: 'image',
        mainClass: 'mfp-with-zoom',
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
          fixedContentPos: true,
          opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        },
        fixedContentPos: true,
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        removalDelay: 300,
        retina: {
          ratio: 1,
          replaceSrc: function(item, ratio) {
            return item.src.replace(/\.\w+$/, function(m) {
              return '@2x' + m;
            });
          }
        },

        image: {
          titleSrc: function(item) {

            var markup = '';

            if (item.el[0].hasAttribute("data-title")) {
              markup += '<span>' + item.el.attr('data-title') + '</span>';
            }

            return markup
          }

        },

      });
    });

    // =============================================
    // BACK TO TOP
    // =============================================
    var amountScrolled = 500;
    var backtotop = $('.back-to-top');
    $(window).on('scroll', function() {
      if ($(window).scrollTop() > amountScrolled) {
        backtotop.addClass('active');
      } else {
        backtotop.removeClass('active');
      }
    });
    backtotop.on('click', function() {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });

    /*========== Footer Language Switcher ==========*/
    $('.footer-language-switcher .selected-language').on('click', function () {
      $(this).parent().toggleClass('open');
    });

    $(window).click(function () {
      $('.footer-language-switcher').removeClass('open');
    });

    $('.footer-language-switcher').on('click', function (event) {
      event.stopPropagation();
    });

  });
})(jQuery);
