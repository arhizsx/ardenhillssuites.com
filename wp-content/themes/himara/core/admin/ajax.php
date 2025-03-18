<?php
/* --------------------------------------------------------------------------
 * Hide update notification and update theme version
 * @since  1.0.0
 ---------------------------------------------------------------------------*/

add_action('wp_ajax_himara_update_version', 'himara_update_version');

if(!function_exists('himara_update_version')):
function himara_update_version(){
	update_option('HIMARA_THEME_VERSION', HIMARA_THEME_VERSION);
	die();
}
endif;

/* --------------------------------------------------------------------------
 * Hide welcome notification
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action('wp_ajax_himara_hide_welcome', 'himara_hide_welcome');

if(!function_exists('himara_hide_welcome')):
function himara_hide_welcome(){
	update_option('himara_welcome_box_displayed', true);
	die();
}
endif;
