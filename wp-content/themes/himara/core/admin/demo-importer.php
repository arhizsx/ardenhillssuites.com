<?php

/* Include Demo Importer */
include_once get_template_directory() . '/core/admin/inc/importer/importer.php';

#-----------------------------------------------------------------#
# Demo Importer Dashboard Menu
#-----------------------------------------------------------------#
function ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'admin.php';
    $default_settings['page_title']  = esc_html__( 'Himara One Click Demo Import' , 'himara' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'himara' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'himara_demo_importer';

    return $default_settings;
}

add_filter( 'ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );


#-----------------------------------------------------------------#
# Demo Content
#-----------------------------------------------------------------#
function ocdi_import_files() {

  return [

    // Modern
    [
      'import_file_name'           => __('Modern', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/modern.zip',
          'slider_name' => 'modern',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/modern/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/?ref=demo-importer',
    ],


    // City
    [
      'import_file_name'           => __('City', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/city.zip',
          'slider_name' => 'city',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/city/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/city/?ref=demo-importer',
    ],


    // Island
    [
      'import_file_name'           => __('Island', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/island.zip',
          'slider_name' => 'island',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/island/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/island/?ref=demo-importer',
    ],


    // Bed & Breakfast
    [
      'import_file_name'           => __('Bed & Breakfast', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/bedbreakfast.zip',
          'slider_name' => 'bedbreakfast',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/bedbreakfast/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/bedbreakfast/?ref=demo-importer',
    ],


    // Summer
    [
      'import_file_name'           => __('Summer', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/summer.zip',
          'slider_name' => 'summer',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/summer/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/summer/?ref=demo-importer',
    ],


    // Classic
    [
      'import_file_name'           => __('Classic', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/classic.zip',
          'slider_name' => 'classic',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/classic/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/classic/?ref=demo-importer',
    ],


    // Boutique
    [
      'import_file_name'           => __('Boutique', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/boutique.zip',
          'slider_name' => 'boutique',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/boutique/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/boutique/?ref=demo-importer',
    ],


    // Lodge
    [
      'import_file_name'           => __('Lodge', 'himara'),
      'import_file_url'            => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/content.xml',
      'import_widget_file_url'     => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/widgets.json',
      'import_redux'               => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/theme-options.json',
          'option_name' => 'himara_settings',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/eb-options.json',
          'option_name' => 'eagle_booking_settings',
        ],

      ],

      'import_rev' => [
        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/lodge.zip',
          'slider_name' => 'lodge',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/restaurant.zip',
          'slider_name' => 'restaurant',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/spa.zip',
          'slider_name' => 'spa',
        ],

        [
          'file_url'    => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/gallery.zip',
          'slider_name' => 'gallery',
        ],

      ],

      'import_preview_image_url'   => 'https://api.eagle-themes.com/download/himara/h13anjo16/content/lodge/screenshot.jpg',
      'preview_url'                => 'https://demo.himaratheme.com/lodge/?ref=demo-importer',
    ],


  ];

}

add_filter( 'ocdi/import_files', 'ocdi_import_files' );

#-----------------------------------------------------------------#
# Required Plugins
#-----------------------------------------------------------------#
function ocdi_register_plugins( $plugins ) {

  $theme_plugins = [

    [
      'name'        => 'Eagle Core',
      'slug'        => 'eagle-core',
      'source'      => 'https://api.eagle-themes.com/download/himara/h13anjo16/eagle-core.zip',
      'preselected' => true,
      'required' => true,
    ],

    [
      'name'        => 'Eagle Booking',
      'slug'        => 'eagle-booking',
      'source'      => 'https://api.eagle-themes.com/download/himara/h13anjo16/eagle-booking.zip',
      'preselected' => true,
      'required' => true,
    ],

    [
      'name'        => 'Elementor',
      'slug'        => 'elementor',
      'preselected' => true,
      'required' => true,
    ],

    [
      'name'        => 'Revolution Slider',
      'slug'        => 'revslider',
      'source'      => 'https://api.eagle-themes.com/download/himara/h13anjo16/revslider.zip',
      'preselected' => true,
      'required' => true,
    ],

    [
      'name'        => 'Envato Market',
      'slug'        => 'envato-market',
      'source'      => 'https://api.eagle-themes.com/download/himara/h13anjo16/envato-market.zip',
      'preselected' => true,
      'required' => true,
    ],

    [
      'name'        => 'Contact Form 7',
      'slug'        => 'contact-form-7',
      'preselected' => true,
      'required' => true,
    ],

  ];

  return array_merge( $plugins, $theme_plugins );
}

add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );

#-----------------------------------------------------------------#
# Before Demo Content Import
#-----------------------------------------------------------------#
function ocdi_before_content_import( $selected_import ) {

  $sidebars_widgets = get_option('sidebars_widgets');

    if ( !empty( $sidebars_widgets ) ) foreach ($sidebars_widgets as $key => $value) {
        if ( is_array($value) ) foreach ($value as $widget_id) {
            $pieces = explode('-', $widget_id);
            $multi_number = array_pop($pieces);
            $id_base = implode('-', $pieces);
            $widget = get_option('widget_' . $id_base);

            unset($widget[$multi_number]);

            update_option('widget_' . $id_base, $widget);
        }

        $sidebars_widgets[$key] = array();
    }

  update_option('sidebars_widgets', $sidebars_widgets);

  // Enable SVG upload only during/before the import process
  function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    return $upload_mimes;
  }

  add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );

}

add_action( 'ocdi/before_content_import', 'ocdi_before_content_import' );

#-----------------------------------------------------------------#
# After Import Set Home Page & Permalinks Settings
#-----------------------------------------------------------------#
function ocdi_after_import_setup(  $selected_import ) {

  // Set Menus
  $main_menu_name = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  $sub_footer_menu_name = get_term_by( 'name', 'Sub Footer Menu', 'nav_menu' );
  $main_menu_id = $main_menu_name->term_id;
  $sub_footer_menu_id = $sub_footer_menu_name->term_id;

  set_theme_mod( 'nav_menu_locations', [
          'himara_main_menu' => $main_menu_id,
          'himara_subfooter_menu' => $sub_footer_menu_id
      ]
  );

  $front_page_id = get_page_by_title( 'Home Page' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

  // Set EB button on Menu after import
  $data = get_option( 'eagle_booking_settings' );
  $data['button_menu'] = $main_menu_id;
  update_option( 'eagle_booking_settings', $data );

  // Set Permalinks to postname
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure('/%postname%/');
  update_option( "rewrite_rules", FALSE );
  $wp_rewrite->flush_rules( true );


  // Update Elementor Options
  update_option( 'elementor_disable_color_schemes', 'yes' );
  update_option( 'elementor_disable_typography_schemes', 'yes' );

  $active_kit = get_option( 'elementor_active_kit' );
  if ( empty( $active_kit ) && class_exists( '\Elementor\Plugin' ) ) {
    $active_kit = \Elementor\Plugin::$instance->kits_manager->get_active_id();
  }

  if ( !empty( $active_kit ) ) {
    $settings = get_post_meta( $active_kit, '_elementor_page_settings' );
    if ( empty( $settings ) ) {
      $settings = [];
    }

    $settings['container_width'] = [ 'unti' => 'px', 'size' => '1300' ];
    $settings['space_between_widgets'] = [ 'unti' => 'px', 'size' => '0' ];

    update_post_meta( $active_kit, '_elementor_page_settings', $settings );
  }

}

add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );

// Delete transient & prevent redirection after plugin activation
delete_transient('_revslider_welcome_screen_activation_redirect', true, 90);
delete_transient( 'elementor_activation_redirect' );
