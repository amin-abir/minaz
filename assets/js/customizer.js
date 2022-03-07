/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  // Site title and description.
  wp.customize("blogname", function (value) {
    value.bind(function (to) {
      $(".site-title a").text(to);
    });
  });

  wp.customize("blogdescription", function (value) {
    value.bind(function (to) {
      $(".site-description").text(to);
    });
  });
  wp.customize("minaz_footer_color", function (value) {
    value.bind(function (to) {
      $(".footer").css("background-color", to);
    });
  });
 
  //Slider Bg
  wp.customize("minaz_slide_color", function (value) {
    value.bind(function (to) {
      $(".slick-nav, .blog-slider .post-slider .slide-wrapper .slide-text").css("background", to);
    });
  });

  // Header text color.
  wp.customize("header_textcolor", function (value) {
    value.bind(function (to) {
      if ("blank" === to) {
        $(".site-title, .site-description").css({
          clip: "rect(1px, 1px, 1px, 1px)",
          position: "absolute",
        });
      } else {
        $(".site-title, .site-description").css({
          clip: "auto",
          position: "relative",
        });
        $(".site-title a, .site-description").css({
          color: to,
        });
      }
    });
  });
  
wp.customize( 'social_color', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( '.social' ).css( 'color', newval );
	} );
} );

wp.customize( 'social_font_size', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( '.social' ).css( 'font-size', newval );
	} );
} );
wp.customize( 'minaz_body_color', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( 'body' ).css( 'background-color', newval );
	} );
} );


})(jQuery);
