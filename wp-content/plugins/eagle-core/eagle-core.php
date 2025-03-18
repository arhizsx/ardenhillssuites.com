<?php
/**
 * Plugin Name:     Eagle Core
 * Description:     Plugin that adds all features needed by our theme.
 * Author:          Eagle-Themes
 * Author URI:      http://eagle-themes.com/
 * Version:         1.0.1
 * Text Domain:     eagle
 */

// include all required plugins
foreach ( glob ( plugin_dir_path( __FILE__ ) . "*/index.php" ) as $file ){
    include_once $file;
}

// Include Elementor Custom Widgets
include_once "eagle-elementor/elementor-widgets.php";
