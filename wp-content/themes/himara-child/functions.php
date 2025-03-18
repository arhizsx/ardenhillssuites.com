<?php

/*
	This is Himara Child Theme functions file
	You can use it to modify specific features and styling of Himara Theme
*/

add_action( 'after_setup_theme', 'himara_child_theme_setup', 99 );

function himara_child_theme_setup(){
	add_action('wp_enqueue_scripts', 'himara_child_load_scripts');
}

function himara_child_load_scripts() {
	wp_register_style('himara_child_style', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, HIMARA_THEME_VERSION, 'screen');
	wp_enqueue_style('himara_child_style');
}
