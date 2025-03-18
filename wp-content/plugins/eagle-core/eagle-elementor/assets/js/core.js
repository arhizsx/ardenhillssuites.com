/*=============================================================
  Theme Name:    Hotel Himara - Hotel WordPress Theme
  Author:        Eagle-Themes (Jomin Muskaj)
  Author URI:    http://eagle-themes.com
  Version:       1.0.0
=============================================================*/

(function($) {
  "use strict";


  /*Document is Ready */
  $(document).ready(function() {

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

    $('.image-gallery').each(function() {
      $(this).magnificPopup({
        delegate: '.owl-item:not(.cloned) a',
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
          enabled: true
        },
        removalDelay: 300,
        retina: {
          ratio: 1,
          replaceSrc: function(item, ratio) {
            return item.src.replace(/\.\w+$/, function(m) {
              return '@2x' + m;
            });
          }
        }

      });
    });

    $('.popup-video').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
    });


    // =============================================
    // ISOTOPE
    // =============================================
    $(function() {
      var $grid = $('.grid').isotope({
        itemSelector: '.isotope-item'
      });

      // filters
      $('.gallery-filters').on('click', 'a', function(e) {
        e.preventDefault();
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });

      // active class
      $('.gallery-filters').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'a', function() {
          $buttonGroup.find('.active').removeClass('active');
          $(this).addClass('active');
        });
      });

      // fix for isotope overlapping images imagesloaded.pkgd.js required
      if ($(".grid").length) {
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress(function() {
          $grid.isotope('layout');
        });
      }


    // Gallery Counter
	  function Gallery_Counter()  {

		// get filtered item elements
		var itemElems = $grid.isotope('getFilteredItemElements');
		var $itemElems = $( itemElems );

		$('.filter').each( function( i, button ) {

		  var button = $(this);

		  var filterValue = button.attr('data-filter');

		  if ( !filterValue ) {
			// do not update 'any' buttons
			return;
		  }
		  var count = $itemElems.filter( filterValue ).length;

		    if ( count == 0 ) {

				button.hide();

			} else if ( count < 10  ) {

        count = '0'+count;

      }

			// if ( count != 0 || count < 10 ) {

			// 	count = '0'+count;
			// }

			button.find('.filter-count').text(count);


		});

	  }

	  Gallery_Counter();

    });

    // =============================================
    // MASONRY
    // =============================================
    var masonry_container = $('.masonry-grid');
    masonry_container.masonry({
      itemSelector: '.masonry-grid-item'
    });



    // =============================================
    // COUNT UP
    // =============================================
    $('.countup-box').on('inview', function(event, visible) {
      if (visible) {

        $.each($('.number'), function() {
          var count = $(this).data('count'),
            numAnim = new CountUp(this, 0, count);
          numAnim.start();
        });

        $(this).unbind('inview');
      }
    });


  });
})(jQuery);
