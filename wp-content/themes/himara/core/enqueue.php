<?php

/* --------------------------------------------------------------------------
 * Load Frontend CSS, Fonts & JS
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'himara_load_scripts' );

function himara_load_scripts() {
	himara_load_fonts();
	himara_load_css();
	himara_load_js();
}

/* --------------------------------------------------------------------------
 * Load Frontend Fonts
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
function himara_load_fonts() {

	if ( $fonts_link = himara_generate_fonts_link()   ) {
		wp_enqueue_style( 'himara-fonts', $fonts_link, false, HIMARA_THEME_VERSION );
	}
}

/* --------------------------------------------------------------------------
 * Load Frontend CSS
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
function himara_load_css() {

	// CSS Libraries
	$styles = array(
		'mmenu' => 'jquery.mmenu.css',
		'bootstrap' => 'bootstrap.min.css',
		'magnific-popup' => 'magnific-popup.css',
		'owl-carousel' => 'owl.carousel.min.css',
		'animate' => 'animate.min.css',
		'default' => 'default.css',
		'main' => 'main.css',
		'responsive' => 'responsive.css'
	);

	// Font Icons
	$fonts = array(
		'fontawesome' => 'fontawesome.min.css'

	);

	// Required CSS
	foreach ( $styles as $id => $style ) {
		wp_enqueue_style( 'himara-' . $id, get_template_directory_uri() . '/assets/css/' . $style, false, HIMARA_THEME_VERSION );
	}

	// Required Fonts
	foreach ( $fonts as $id => $font ) {
		wp_enqueue_style( 'himara-font-' . $id, get_template_directory_uri() . '/assets/fonts/' . $font, false, HIMARA_THEME_VERSION );
	}

	wp_enqueue_style( 'simpleicons', get_template_directory_uri() . '/assets/fonts/simple-line-icons.css', false, HIMARA_THEME_VERSION );


	// Dynamic CSS
	wp_add_inline_style( 'himara-main', himara_generate_dynamic_css() );

}

/* --------------------------------------------------------------------------
 * Load Frontend JS
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
function himara_load_js() {

	// Comments JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    // JS Libraries
    $scripts = array(
        'bootstrap' => 'bootstrap.min.js',
        'isotope' => 'isotope.pkgd.min.js',
        'inview' => 'jquery.inview.min.js',
        'magnific-popup' => 'jquery.magnific-popup.min.js',
		'owl.carousel' => 'owl.carousel.min.js',
        'owlthumbs' => 'owl.carousel.thumbs.min.js',
        'wow' => 'wow.min.js',
        'parallax' => 'parallax.min.js',
		'mmneu' => 'jquery.mmenu.js',
        'main' => 'main.js'
    );

	// Smoothscroll only if is enabled
	if( himara_get_option('smoothscroll') ) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri().'/assets/js/smoothscroll.min.js', array( 'jquery' ), HIMARA_THEME_VERSION, true );
	}

	// Required JS
    foreach ( $scripts as $id => $script ) {
        wp_enqueue_script( 'himara-'.$id, get_template_directory_uri().'/assets/js/'. $script, array( 'jquery' ), HIMARA_THEME_VERSION, true );
    }

	// Google MAP enqueue only if the Google MaP API Key

	if ( !empty( himara_get_option('google_map_api_key') ) ) {

		wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key='.himara_get_option('google_map_api_key').'&callback=Function.prototype');

	}

	// Dynamic JS
	wp_localize_script( 'himara-main', 'himara_js_settings', himara_get_js_settings() );

}
