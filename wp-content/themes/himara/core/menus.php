<?php

/* --------------------------------------------------------------------------
 * Register Menus
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action('init', 'himara_register_menus');

if (!function_exists('himara_register_menus')) :
    function himara_register_menus() {
      register_nav_menus(
        array(
          'himara_main_menu' => __('Main Menu', 'himara'),
          'himara_subfooter_menu' => __('Sub Footer Menu', 'himara'),
        )
      );
    }
endif;
