<?php
#-----------------------------------------------------------------#
# Default theme constants
#-----------------------------------------------------------------#
define('HIMARA_THEME_NAME', 'Himara');
define('HIMARA_THEME_VERSION', '1.0.1');

#-----------------------------------------------------------------#
# Localization
#-----------------------------------------------------------------#
load_theme_textdomain( 'himara', get_template_directory()  . '/languages' );

#-----------------------------------------------------------------#
# After Theme Setup
#-----------------------------------------------------------------#
add_action( 'after_setup_theme', 'himara_theme_setup' );

function himara_theme_setup() {

#-----------------------------------------------------------------#
# Add thumbnails support
#-----------------------------------------------------------------#
add_theme_support( 'post-thumbnails' );

#-----------------------------------------------------------------#
# Add image sizes
#-----------------------------------------------------------------#
$image_sizes = himara_get_image_sizes();
if ( !empty( $image_sizes ) ) {
	foreach ( $image_sizes as $id => $size ) {
		add_image_size( $id, $size['w'], $size['h'], $size['crop'] );
	}
}

#-----------------------------------------------------------------#
# Add theme support for title tag
#-----------------------------------------------------------------#
add_theme_support( 'title-tag' );

#-----------------------------------------------------------------#
# Support for HTML5
#-----------------------------------------------------------------#
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

#-----------------------------------------------------------------#
# Automatic Feed Links
#-----------------------------------------------------------------#
add_theme_support( 'automatic-feed-links' );

// Redirect to dashboard after theme activation
add_action('after_switch_theme', 'himara_after_activation_redirect');
function himara_after_activation_redirect () {
	wp_redirect( admin_url( '/admin.php?page=himara_dashboard' ) );
}

}

/* Load frontend scripts */
include_once get_template_directory() . '/core/enqueue.php';

/* Load helpers scripts */
include_once get_template_directory() . '/core/helpers.php';

/* Sidebars */
include_once get_template_directory() . '/core/sidebars.php';

/* Menus */
include_once get_template_directory() . '/core/menus.php';


#-----------------------------------------------------------------#
# Load admin scripts
#-----------------------------------------------------------------#
if ( is_admin() ) {
	//
	 include_once get_template_directory() . '/core/admin/enqueue.php';

	/* Dashboard */
	include_once get_template_directory() . '/core/admin/dashboard.php';

	// /* Theme Options */
	 include_once get_template_directory() . '/core/admin/theme-options.php';
	//
	// /* Load Metaboxes */
	include_once get_template_directory() . '/core/admin/metaboxes.php';
	//
	// /* Include plugins - TGM */
	include_once get_template_directory() . '/core/admin/install-plugins.php';
	//
	/* Demo importer Panel */
	include_once ( get_template_directory() . '/core/admin/demo-importer.php' );
	//
	// /* Include AJAX action handlers */
  include_once get_template_directory() . '/core/admin/ajax.php';

}
