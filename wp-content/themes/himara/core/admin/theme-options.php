<?php
/* --------------------------------------------------------------------------
* Theme Options.
* @since  1.0.0
---------------------------------------------------------------------------*/
if (! class_exists('Redux')) {
    return;
}

$opt_name = 'himara_settings';

$theme = wp_get_theme();

//Load demo importer
if ( class_exists('himara_demo_importer' )) {

    add_action('redux/extensions/'. $opt_name .'/before', array('himara_demo_importer', 'himara_register_extension_loader'), 0);
}

/*-----------------------------------------------------------------------------------*/
//  Redux Framework options
/*-----------------------------------------------------------------------------------*/
$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => HIMARA_THEME_NAME,
    'display_version'      => HIMARA_THEME_VERSION,
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => esc_html__('Himara', 'himara'),
    'page_title'           => esc_html__('Himara Options', 'himara'),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'himara-icon',
    'admin_bar_priority'   => '100',
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'allow_tracking'       => false,
    'ajax_save'            => true,
    'page_priority'        => '75',
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            =>  get_template_directory_uri().'/assets/images/admin/menu_icon.png',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'himara_options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => false,
    'output_tag'           => true,
    'database'             => '',
    'system_info'          => false,
    'footer_credit'        => ' ',
);

$GLOBALS['redux_notice_check'] = 1;

/*-----------------------------------------------------------------------------------*/
//  Footer social icons
/*-----------------------------------------------------------------------------------*/
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/eaglethemescom/',
    'title' => 'Like us on Facebook',
    'icon'  => 'el-icon-facebook'
);

$args['share_icons'][] = array(
    'url'   => 'https://www.instagram.com/eaglethemes/',
    'title' => 'eagle-themes.com',
    'icon'  => 'el el-instagram'
);

$args['share_icons'][] = array(
    'url'   => 'https://eagle-themes.com/',
    'title' => 'eagle-themes.com',
    'icon'  => 'el el-link'
);

$args['intro_text'] = '';
$args['footer_text'] = '';

/*-----------------------------------------------------------------------------------*/
//  Initialize Redux
/*-----------------------------------------------------------------------------------*/
Redux::setArgs($opt_name, $args);

/*-----------------------------------------------------------------------------------*/
//  Load Custom CSS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('himara_redux_custom_css')) :
    function himara_redux_custom_css()
    {
        wp_register_style('himara-redux-custom', get_template_directory_uri().'/assets/css/admin/options.css', array( 'redux-admin-css' ), HIMARA_THEME_VERSION, 'all');
        wp_enqueue_style('himara-redux-custom');
    }
endif;

add_action('redux/page/himara_settings/enqueue', 'himara_redux_custom_css');

/*-----------------------------------------------------------------------------------*/
// Remove redux framework admin page
/*-----------------------------------------------------------------------------------*/
if (!function_exists('himara_remove_redux_page')) :
    function himara_remove_redux_page()
    {
        remove_submenu_page('tools.php', 'redux-about');
    }
endif;

add_action('admin_menu', 'himara_remove_redux_page', 99);

/*-----------------------------------------------------------------------------------*/
// Add Sidebar generator custom field to redux
/*-----------------------------------------------------------------------------------*/
if (!function_exists('himara_sidgen_field_path')) :
    function himara_sidgen_field_path($field)
    {
        return get_template_directory() . '/include/custom-fields/field_sidgen.php';
    }
endif;

add_filter("redux/himara_settings/field/class/sidgen", "himara_sidgen_field_path");

/*-----------------------------------------------------------------------------------*/
// Remove plugin redirect
/*-----------------------------------------------------------------------------------*/
if (! function_exists('remove_redux_plugin_redirect')) {
    function remove_redux_plugin_redirect()
    {
        ReduxFramework::$_as_plugin = false;
    }
}

add_action('redux/construct', 'remove_redux_plugin_redirect');

/*-----------------------------------------------------------------------------------*/
// Start Options Fields
/*-----------------------------------------------------------------------------------*/
/* Header */
Redux::setSection(
    $opt_name,
    array(
    'icon'             => ' el-icon-lines',
    'title'            => esc_html__('Header', 'himara'),
    'fields'           => array(

    array(
        'id'         => 'header_layout',
        'type'       => 'button_set',
        'title'      => esc_html__('Layout', 'himara'),
        'subtitle'   => esc_html__('Choose the header layout', 'himara'),
        'multi'      => false,
        'options'    => array(
            'horizontal'   => 'Horizontal',
            'vertical'  => 'Vertical',
            ),
        'default'    => 'horizontal'
    ),

    array(
        'id'         => 'header_state',
        'type'       => 'button_set',
        'title'      => esc_html__('State', 'himara'),
        'subtitle'   => esc_html__('Choose the vertical header state', 'himara'),
        'multi'      => false,
        'options'    => array(
            'opened'   => 'Opened',
            'closed'  => 'Closed',
            ),
        'default'    => 'opened',
        'required'    => array( 'header_layout', '=', 'vertical' ),
    ),

    array(
        'id'          => 'logo',
        'type'        => 'media',
        'url'         => false,
        'title'       => esc_html__('Logo', 'himara'),
        'default'     => array( 'url' => esc_url( get_template_directory_uri().'/assets/images/logo.svg') ),
    ),

    array(
        'id'          => 'logo_height',
        'type'        => 'text',
        'class'       => 'small-text',
        'title'       => esc_html__('Logo Height', 'himara'),
        'desc'        => esc_html__('Note: Logo Height value is in px.', 'himara'),
        'default'     => '24',
      ),

    array(
        'id'          => 'second_logo',
        'type'        => 'media',
        'url'         => false,
        'title'       => esc_html__('Second Logo (Optional)', 'himara'),
        'subtitle'    => esc_html__('Logo used for the transparent header and for the mobile header when the vertical header is selected', 'himara'),
        'default'     => array( 'url' => esc_url( get_template_directory_uri().'/assets/images/logo-white.svg') ),
    ),

    array(
        'id'          => 'second_logo_height',
        'type'        => 'text',
        'class'       => 'small-text',
        'title'       => esc_html__('Second Logo Height', 'himara'),
        'desc'        => esc_html__('Note: Logo Height value is in px.', 'himara'),
        'default'     => '24',
    ),

    array(
      'id'          => 'header_sticky',
      'type'        => 'switch',
      'title'       => esc_html__('Sticky Header', 'himara'),
      'subtitle'    => esc_html__("This option can be overridden on each page's layout option.", 'himara'),
      'default'     => true,
      'required'    => array( 'header_layout', '=', 'horizontal' ),
    ),

    array(
      'id'          => 'header_transparent',
      'type'        => 'switch',
      'title'       => esc_html__('Enable Transparent Header', 'himara'),
      'subtitle'    => esc_html__("This option can be overridden on each page's layout option.", 'himara'),
      'default'     => false,
      'required'    => array( 'header_layout', '=', 'horizontal' ),
    ),

    array(
      'id'          => 'logo_margin_top',
      'type'        => 'text',
      'class'       => 'small-text',
      'title'       => esc_html__('Logo Margin Top', 'himara'),
      'desc'        => esc_html__('Note: Logo margin value is in px.', 'himara'),
      'default'     => '',
    ),

    array(
      'id'          => 'header_bg',
      'type'        => 'color',
      'title'       => esc_html__('Background Color', 'himara'),
      'transparent' => false,
      'default'     => '',
    ),

    array(
      'id'          => 'header_border_bottom',
      'type'        => 'color',
      'title'       => esc_html__('Border Color Bottom', 'himara'),
      'transparent' => true,
      'default'     => '',
      'required'    => array( 'header_layout', '=', 'horizontal' ),
    ),

    array(
      'id'          => 'header_border_vertical',
      'type'        => 'color',
      'title'       => esc_html__('Border Color Right', 'himara'),
      'transparent' => true,
      'default'     => '',
      'required'    => array( 'header_layout', '=', 'vertical' ),
    ),

    array(
      'id'          => 'menu_color',
      'type'        => 'link_color',
      'title'       => esc_html__('Main Menu Color', 'himara'),
      'default'     => array(
          'regular' => '#32353c',
          'hover'   => '',
          'active'  => '',
      ),
    ),

    array(
      'id'          => 'sub_menu_bg',
      'type'        => 'color',
      'title'       => esc_html__('Sub Menu Background Color', 'himara'),
      'transparent' => false,
      'default'     => '',
    ),

    array(
      'id'          => 'sub_menu_hover_bg',
      'type'        => 'color',
      'title'       => esc_html__('Sub Menu Hover Background Color', 'himara'),
      'transparent' => false,
      'default'     => '',
    ),

    array(
      'id'          => 'sub_menu_border',
      'type'        => 'color',
      'title'       => esc_html__('Sub Menu Border Color', 'himara'),
      'transparent' => false,
      'default'     => '',
    ),

    array(
      'id'          => 'sub_menu_color',
      'type'        => 'link_color',
      'title'       => esc_html__('Sub Menu Color', 'himara'),
      'default'     => array(
          'regular' => '',
          'hover'   => '',
          'active'  => '',
      ),

    ),

    array(
        'id'          => 'menu_toggle_button_color',
        'type'        => 'color',
        'title'       => __('Toggle Menu Color', 'himara'),
        'transparent' => false,
        'default'     => '#ccb28d',
    ),

    array(
        'id'          => 'menu_toggle_button_color_transparent',
        'type'        => 'color',
        'title'       => __('Toggle Menu Color on Transparent Header', 'himara'),
        'transparent' => false,
        'default'     => '#ccb28d',
        'required'    => array( 'header_layout', '=', 'horizontal' ),
    ),

    array(
        'id'          => 'menu_toggle_button_color_scroll',
        'type'        => 'color',
        'title'       => __('Toggle Menu Color on Scroll', 'himara'),
        'transparent' => false,
        'default'     => '#606060',
    ),

    array(
        'id'         => 'vertical_header_content',
        'type'       => 'button_set',
        'title'      => esc_html__('Vertical Header Content', 'himara'),
        'multi'      => false,
        'options'    => array(
            'text'   => 'Text',
            'social_media'  => 'Social Media',
            ),
        'default'    => 'text',
    ),

    array(
        'id'          => 'header_mssg',
        'type'        => 'text',
        'title'       => esc_html__('Vertical Header Message', 'himara'),
        'subtitle'    => esc_html__('Please enter the vertical menu message', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'text' ),
    ),

    array(
        'id'          => 'header_facebook_url',
        'type'        => 'text',
        'title'       => esc_html__('Facebook Link', 'himara'),
        'subtitle'    => esc_html__('Εnter your Facebook URL', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'social_media' ),
    ),

    array(
        'id'          => 'header_instagram_url',
        'type'        => 'text',
        'title'       => esc_html__('Instagram Link', 'himara'),
        'subtitle'    => esc_html__('Εnter your Instagram URL', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'social_media' ),
    ),

    array(
        'id'          => 'header_booking_com_url',
        'type'        => 'text',
        'title'       => esc_html__('Booking.com Link', 'himara'),
        'subtitle'    => esc_html__('Εnter your Booking.com URL', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'social_media' ),
    ),

    array(
        'id'          => 'header_airbnb_url',
        'type'        => 'text',
        'title'       => esc_html__('Airbnb Link', 'himara'),
        'subtitle'    => esc_html__('Εnter your Airbnb URL', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'social_media' ),
    ),

    array(
        'id'          => 'header_pinterest_url',
        'type'        => 'text',
        'title'       => esc_html__('Pinterest Link', 'himara'),
        'subtitle'    => esc_html__('Εnter your Pinterest URL', 'himara'),
        'required'    => array( 'vertical_header_content', '=', 'social_media' ),
    ),

    array(
        'id'          => 'topbar',
        'type'        => 'switch',
        'title'       => esc_html__('Enable Top Bar', 'himara'),
        'subtitle'    => esc_html__("This option can be overridden on each page's layout option", 'himara'),
        'default'     => false,
        'required'    => array( 'header_layout', '=', 'horizontal' ),
    ),

    array(
        'id'          => 'topbar_transparent',
        'type'        => 'switch',
        'title'       => esc_html__('Transparent Top Bar', 'himara'),
        'subtitle'    => esc_html__("This option can be overridden on each page's layout option", 'himara'),
        'default'     => false,
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_bg',
        'type'        => 'color',
        'title'       => esc_html__('Top Bar Background Color', 'himara'),
        'default'     => '',
        'transparent' => false,
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_border',
        'type'        => 'color',
        'title'       => esc_html__('Top Bar Border Color', 'himara'),
        'default'     => '',
        'transparent' => false,
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_color',
        'type'        => 'link_color',
        'title'       => esc_html__('Top Bar Color', 'himara'),
        'default'     => array(
            'regular' => '',
            'hover'   => '',
            'active'  => '',
        ),
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_welcome_mssg',
        'type'        => 'text',
        'title'       => esc_html__('Welcome Message', 'himara'),
        'subtitle'    => esc_html__('Please enter your welcome message', 'himara'),
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_phone',
        'type'        => 'text',
        'title'       => esc_html__('Phone', 'himara'),
        'subtitle'    => esc_html__('Please enter your phone number', 'himara'),
        'required'    => array( 'topbar', '=', true ),
    ),
    array(
        'id'          => 'topbar_phone_link',
        'type'        => 'text',
        'title'       => esc_html__('Phone Link', 'himara'),
        'subtitle'    => esc_html__('Please enter your phone number link', 'himara'),
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'          => 'topbar_email',
        'type'        => 'text',
        'title'       => esc_html__('Email', 'himara'),
        'subtitle'    => esc_html__('Please enter your Email', 'himara'),
        'required'    => array( 'topbar', '=', true ),
    ),

    array(
        'id'         => 'topbar_mobile_elements',
        'type'       => 'checkbox',
        'multi'      => true,
        'title'      => esc_html__('Hide on Mobile', 'himara'),
        'subtitle'   => esc_html__('Hide or show top bar elements when viewing on a mobile device.', 'himara'),
        'options'    => array(
            'topbar_welcome_mssg_mobile' => esc_html__('Welcome Message', 'himara'),
            'topbar_phone_mobile'     => esc_html__('Phone', 'himara'),
            'topbar_email_mobile'   => esc_html__('Email', 'himara'),
        ),
        'required'    => array( 'topbar', '=', true ),
        'default' => array(
            'topbar_welcome_mssg_mobile' => '1',
            'topbar_phone_mobile' => '0',
            'topbar_email_mobile' => '0'
        )

        ),

     )

    )
);

/* Typography */
Redux::setSection(
    $opt_name,
    array(

    'icon'             => 'el-icon-fontsize',
    'title'            => esc_html__('Typography', 'himara'),
    'desc'             => esc_html__('Manage fonts and typography settings', 'himara'),
    'fields'           => array(

        array(
            'id'          => 'himara_main_font',
            'type'        => 'typography',
            'title'       => esc_html__('Main text font', 'himara'),
            'google'      => true,
            'font-backup' => false,
            'font-size'   => false,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'units'       =>'px',
            'subtitle'    => esc_html__('This is your main font, used for standard text', 'himara'),
            'default'     => array(
                'google'       => true,
                'font-weight'  => '400',
                'font-family'  => 'Roboto',
                'subsets'      => 'latin-ext'
            ),
            'preview'     => array(
                'always_display' => true,
                'font-size'      => '14px',
                'line-height'    => '26px',
                'text'           => 'This is an example of how a simple paragraph of text will look like on your website.'
            )
        ),

        array(
            'id'          => 'himara_h_font',
            'type'        => 'typography',
            'title'       => esc_html__('Headings font', 'himara'),
            'google'      => true,
            'font-backup' => false,
            'font-size'   => false,
            'all_styles'  => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'units'       =>'px',
            'subtitle'    => esc_html__('This is a font used for titles and headings', 'himara'),
            'default'     => array(
                'google'       => true,
                'font-weight'  => '700',
                'font-family'  => 'Oswald',
                'subsets'      => 'latin-ext',
            ),
            'preview'     => array(
                'always_display' => true,
                'font-size'      => '14px',
                'line-height'    => '50px',
                'text'           => 'THIS IS AN EXAMPLE OF HOW A TITLES AND HEADINGS WILL LOOK LIKE ON YOUR SITE'
            )

        ),

        array(
            'id'          => 'himara_nav_font',
            'type'        => 'typography',
            'title'       => esc_html__('Navigation font', 'himara'),
            'google'      => true,
            'font-backup' => false,
            'font-size'   => false,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'units'       =>'px',
            'subtitle'    => esc_html__('This is a font used for main website navigation', 'himara'),
            'default'     => array(
                'font-weight'  => '900',
                'font-family'  => 'Roboto',
                'subsets'      => 'latin-ext'
            ),

            'preview'     => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => 'HOME &nbsp;&nbsp; ROOMS &nbsp;&nbsp; ABOUT &nbsp;&nbsp;BLOG &nbsp;&nbsp;CONTACT'
            )

            ),

        array(
            'id'          => 'font_size',
            'type'        => 'spinner',
            'title'       => esc_html__('Main text font size', 'himara'),
            'subtitle'    => esc_html__('This is your default text font size', 'himara'),
            'default'     => '15',
            'min'         => '10',
            'step'        => '1',
            'max'         => '22',
        ),

        array(
            'id'          => 'font_size_nav',
            'type'        => 'spinner',
            'title'       => esc_html__('Navigation font size', 'himara'),
            'subtitle'    => esc_html__('Applies to main website navigation', 'himara'),
            'default'     => '15',
            'min'         => '10',
            'step'        => '1',
            'max'         => '20',
        ),

        array(
            'id'         => 'font_size_h1',
            'type'       => 'spinner',
            'title'      => esc_html__('H1 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H1 elements', 'himara'),
            'default'    => '34',
            'min'        => '20',
            'step'       => '1',
            'max'        => '60',
        ),

        array(
            'id'         => 'font_size_h2',
            'type'       => 'spinner',
            'title'      => esc_html__('H2 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H2 elements', 'himara'),
            'default'    => '30',
            'min'        => '18',
            'step'       => '1',
            'max'        => '55',
        ),

        array(
            'id'         => 'font_size_h3',
            'type'       => 'spinner',
            'title'      => esc_html__('H3 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H3 elements', 'himara'),
            'default'    => '26',
            'min'        => '16',
            'step'       => '1',
            'max'        => '45',
        ),

        array(
            'id'         => 'font_size_h4',
            'type'       => 'spinner',
            'title'      => esc_html__('H4 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H4 elements', 'himara'),
            'default'    => '22',
            'min'        => '14',
            'step'       => '1',
            'max'        => '40',
        ),

        array(
            'id'         => 'font_size_h5',
            'type'       => 'spinner',
            'title'      => esc_html__('H5 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H5 elements', 'himara'),
            'default'    => '20',
            'min'        => '12',
            'step'       => '1',
            'max'        => '30',
        ),

        array(
            'id'         => 'font_size_h6',
            'type'       => 'spinner',
            'title'      => esc_html__('H6 font size', 'himara'),
            'subtitle'   => esc_html__('Applies to H6 elements', 'himara'),
            'default'    => '18',
            'min'        => '10',
            'step'       => '1',
            'max'        => '20',
        ),

     )
    )
);

/* Stylings */
Redux::setSection(
    $opt_name,
    array(

    'icon'             => 'el-icon-brush',
    'title'            => esc_html__('Color Scheme', 'himara'),
    'fields'           => array(

        array(
            'id'          => 'primary_color',
            'type'        => 'link_color',
            'title'       => esc_html__('Primary Color', 'himara'),
            'title'       => esc_html__('Main Color Scheme', 'himara'),
            'default'     => array(
                'regular' => '#deb666',
                'hover'   => '#b69854',
                'active'  => '#b69854',
            ),
        ),

        array(
            'id'          => 'body_background_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Background Color', 'himara'),
            'transparent' => false,
            'default'     => '#ffffff',
        ),

        array(
            'id'          => 'body_text_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Text Color', 'himara'),
            'transparent' => false,
            'default'     => '#858a99',
        ),

        array(
            'id'          => 'heading_color',
            'type'        => 'color',
            'title'       => esc_html__('Heading Color', 'himara'),
            'transparent' => false,
            'default'     => '#606060',
        ),

     )

    )
);

/* Settings */
Redux::setSection(
    $opt_name,
    array(

    'icon'            => 'el-icon-cog',
    'title'           => esc_html__('Settings', 'himara'),
    'desc'            => esc_html__('These are some additional miscellaneous theme settings', 'himara'),
    'fields'          => array(

      array(
          'id'         => 'himara_layout',
          'type'       => 'button_set',
          'title'      => esc_html__('Layout', 'himara'),
          'subtitle'   => esc_html__('Choose your site layout', 'himara'),
          'multi'      => false,
          'options'    => array(
              'wide'   => 'Wide',
              'boxed'  => 'Boxed',
           ),
          'default'    => 'wide'
      ),

      array(
          'id'         => 'himara_boxed_bg_color',
          'type'       => 'color',
          'title'      => esc_html__('Background Color', 'himara'),
          'subtitle'   => esc_html__('Set the background color', 'himara'),
          'default'    => '#ffffff',
          'transparent'=> false,
          'required'   => array( 'himara_layout', '=', 'boxed' )
      ),

      array(
            'id'         => 'himara_boxed_bg_image',
            'type'       => 'media',
            'title'      => esc_html__('Background Image', 'himara'),
            'subtitle'   => esc_html__('Upload your background image', 'himara'),
            'default'    => array( 'url' => esc_url(get_template_directory_uri().'/assets/images/boxed_bg.jpg') ),
            'required'   => array( 'himara_layout', '=', 'boxed' )
        ),

        array(
            'id'         => 'himara_container',
            'type'       => 'switch',
            'title'      => esc_html__('Container', 'himara'),
            'subtitle'   => esc_html__('Enable Container', 'himara'),
            'default'    => true
        ),

        array(
            'id'         => 'himara_lightbox',
            'type'       => 'switch',
            'title'      => esc_html__('Image Lightbox', 'himara'),
            'subtitle'   => esc_html__('Enable theme lighbox or use Elementor default lightbox', 'himara'),
            'default'    => true
        ),

        array(
            'id'         => 'himara_padding',
            'type'       => 'switch',
            'title'      => esc_html__('Main Padding', 'himara'),
            'subtitle'   => esc_html__('Enable Padding', 'himara'),
            'default'    => true
        ),

        array(
            'id'         => 'smoothscroll',
            'type'       => 'switch',
            'title'      => esc_html__('Smooth Scroll', 'himara'),
            'subtitle'   => esc_html__('Enable Smooth Scroll', 'himara'),
            'default'    => false
        ),

        array(
            'id'         => 'preloader',
            'type'       => 'switch',
            'title'      => esc_html__('Preloader', 'himara'),
            'subtitle'   => esc_html__('Enable Preloader', 'himara'),
            'default'    => true
        ),


        array(
            'id'         => 'preloader_home',
            'type'       => 'switch',
            'title'      => esc_html__('Preloader only on Home Page', 'himara'),
            'subtitle'   => esc_html__('Enable Preloader on Home Page', 'himara'),
            'required'   => array( 'preloader', '=', true ),
            'default'    => true
        ),

        array(
            'id'           => 'preloader_style',
            'type'         => 'radio',
            'title'        => esc_html__('Preloader Style', 'himara'),
            'options'      => array(
                '1'   => esc_html__('Style 1', 'himara'),
                '2'   => esc_html__('Style 2', 'himara'),
                '3'   => esc_html__('Style 3', 'himara')
            ),
            'default'      => '3',
            'required'   => array( 'preloader', '=', true ),
        ),

        array(
            'id'         => 'preloader_bg_color',
            'type'       => 'color',
            'title'      => esc_html__('Preloader Background Color', 'himara'),
            'default'    => '#deb666',
            'transparent'=> false,
            'required'   => array( 'preloader', '=', true )
        ),

        array(
            'id'         => 'preloader_color',
            'type'       => 'color',
            'title'      => esc_html__('Preloader Color', 'himara'),
            'default'    => '#deb666',
            'transparent'=> false,
            'required'   => array( 'preloader', '=', true )
        ),

        array(
              'id'         => 'preloader_image',
              'type'       => 'media',
              'title'      => esc_html__('Background Image', 'himara'),
              'subtitle'   => esc_html__('Upload your background image', 'himara'),
              'default'     => array( 'url' => esc_url(get_template_directory_uri().'/assets/images/logo.svg') ),
              'url'         => false,
              'required'   => array( 'preloader', '=', true )
        ),

        array(
            'id'         => 'back_to_top',
            'type'       => 'switch',
            'title'      => esc_html__('Back to Top Button', 'himara'),
            'subtitle'      => esc_html__('Enable the back to top button on your pages', 'himara'),
            'default'    => true
        ),

        array(
            'id'         => 'back_to_top_mobile',
            'type'       => 'switch',
            'title'      => esc_html__('Back to Top Button on Mobile', 'himara'),
            'subtitle'   => esc_html__('Enable the back to top button when viewing on a mobile device.', 'himara'),
            'default'    => true,
            'required'   => array( 'back_to_top', '=', true )
        ),

        array(
            'id'         => 'back_to_top_side',
            'type'       => 'button_set',
            'title'      => esc_html__('Back to Top Button Side', 'himara'),
            'subtitle'      => esc_html__('Choose the side to display the back to top button', 'himara'),
            'multi'      => false,
            'options'    => array(
                'left'   => 'Left',
                'right'  => 'Right',
             ),
            'default'    => 'right',
            'required'   => array( 'back_to_top', '=', true )
        ),

        array(
            'id'          => 'back_to_top_bottom',
            'type'        => 'text',
            'class'       => 'small-text',
            'title'       => esc_html__('Back to top bottom position', 'himara'),
            'desc'        => esc_html__('Note: value is in px.', 'himara'),
            'default'     => '40',
        ),

        array(
            'id'          => 'back_to_top_right',
            'type'        => 'text',
            'class'       => 'small-text',
            'title'       => esc_html__('Back to top right position', 'himara'),
            'desc'        => esc_html__('Note: value is in px.', 'himara'),
            'default'     => '40',
            'required'    => array( 'back_to_top_side', '=', 'right' ),
        ),

        array(
            'id'          => 'back_to_top_left',
            'type'        => 'text',
            'class'       => 'small-text',
            'title'       => esc_html__('Back to top left position', 'himara'),
            'desc'        => esc_html__('Note: value is in px.', 'himara'),
            'default'     => '40',
            'required'    => array( 'back_to_top_side', '=', 'left' ),
        ),

        array(
            'id'         => 'back_to_top_bg_color',
            'type'       => 'color',
            'title'      => esc_html__('Back to Top Button Color', 'himara'),
            'default'    => '#deb666',
            'transparent'=> false,
            'required'   => array( 'back_to_top', '=', true )
        ),

        array(
            'id'         => 'back_to_top_bg_hover_color',
            'type'       => 'color',
            'title'      => esc_html__('Back to Top Button Hover Color', 'himara'),
            'default'    => '#deb666',
            'transparent'=> false,
            'required'   => array( 'back_to_top', '=', true )
        ),

        array(
            'id'         => 'back_to_top_color',
            'type'       => 'color',
            'title'      => esc_html__('Back to Top Button Icon Color', 'himara'),
            'default'    => '#32353c',
            'transparent'=> false,
            'required'   => array( 'back_to_top', '=', true )
        ),

      )

    )
);


/* Footer */
Redux::setSection(
    $opt_name,
    array(

    'icon'             => 'el el-minus',
    'title'            => esc_html__('Footer', 'himara'),
    'desc'             => esc_html__('Manage default settings for your Footer', 'himara'),
    'fields'           => array(

        array(
            'id'         => 'footer',
            'type'       => 'button_set',
            'title'      => esc_html__('Footer', 'himara'),
            'subtitle'   => esc_html__('Choose if you want to have a footer', 'himara'),
            'multi'      => false,
            'options'    => array(
                'enabled'   => 'Enabled',
                'disabled'  => 'Disabled',
                ),
            'default'    => 'enabled'
        ),

        array(
            'id'        => 'footer_layout',
            'type'      => 'image_select',
            'title'     => esc_html__('Columns', 'himara'),
            'subtitle'  => esc_html__('Choose number of columns to display in footer area', 'himara'),
            'desc'  => wp_kses(sprintf(__('Each column represents one Footer Sidebar in <a href="%s" target="_blank">Apperance -> Widgets</a> settings.', 'himara'), admin_url('widgets.php')), wp_kses_allowed_html('post')),
            'options'   => array(
                '1_12'    => array( 'title' => esc_html__('1 Column', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/footer-column-1.png' ),
                '2_6'    => array( 'title' => esc_html__('2 Columns', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/footer-column-2.png' ),
                '3_4'    => array( 'title' => esc_html__('3 Columns', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/footer-column-3.png' ),
                '4_3'    => array( 'title' => esc_html__('4 Columns', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/footer-column-4.png' ),
            ),
            'default'   => '4_3',
            'required'   => array( 'footer', '=', 'enabled' )
        ),

        array(
            'id'          => 'footer_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'himara'),
            'default'     => '#f5f5f5',
            'transparent' => false,
            'required'   => array( 'footer', '=', 'enabled' )
        ),

        array(
            'id'          => 'footer_border_color',
            'type'        => 'color',
            'title'       => esc_html__('Border Color', 'himara'),
            'default'     => '#f0f0f0',
            'transparent' => false,
            'required'   => array( 'footer', '=', 'enabled' )
        ),

        array(
            'id'          => 'footer_heading_color',
            'type'        => 'color',
            'title'       => esc_html__('Heading Color', 'himara'),
            'default'     => '#858a99',
            'transparent' => false,
            'required'   => array( 'footer', '=', 'enabled' )
        ),

        array(
            'id'          => 'footer_text_color',
            'type'        => 'color',
            'title'       => esc_html__('Text Color', 'himara'),
            'default'     => '#858a99',
            'transparent' => false,
            'required'   => array( 'footer', '=', 'enabled' )
        ),

        array(
            'id'          => 'footer_links_color',
            'type'        => 'link_color',
            'title'       => esc_html__('Links Color', 'himara'),
            'default'     => array(
                'regular' => '#858a99',
                'hover'   => '#deb666',
                'active'  => '#deb666',
            ),
            'required'   => array( 'footer', '=', 'enabled' )
        ),

      array(
          'id'          => 'footer_copyright_bg',
          'type'        => 'color',
          'title'       => esc_html__('Copyright Background Color', 'himara'),
          'default'     => '#fff',
          'transparent' => false,
          'required'   => array( 'footer', '=', 'enabled' )
      ),

      array(
        'id'          => 'footer_underline_color',
        'type'        => 'color',
        'title'       => esc_html__('Hover Underline Color', 'himara'),
        'default'     => '#32353c',
        'transparent' => false,
        'required'   => array( 'footer', '=', 'enabled' )
        ),

      array(
          'id' => 'footer_copyright',
          'type' => 'text',
          'title' => __('Copyright Text', 'himara'),
          'subtitle' => __('Please enter the copyright section text. e.g. &copy; 2022 Hotel Himara. All Rights Reserved', 'himara'),
          'required'   => array( 'footer', '=', 'enabled' )
      ),

    array(
        'id'          => 'footer_copyright_text_color',
        'type'        => 'color',
        'title'       => esc_html__('Copyright Text Color', 'himara'),
        'subtitle'    => esc_html__('Choose a color for your copyright text', 'himara'),
        'default'     => '#858a99',
        'transparent' => false,
        'required'   => array( 'footer', '=', 'enabled' )
    ),

    array(
        'id'          => 'credit_cards',
        'type'        => 'switch',
        'title'       => esc_html__('Display "Accepted Credit Cards"', 'himara'),
        'subtitle'    => esc_html__('Check if you want to display Accepted Credit Cards', 'himara'),
        'default'     => true,
        'required'   => array( 'footer', '=', 'enabled' )
    ),

    )
)

);

/* Blog */
Redux::setSection(
    $opt_name,
    array(

    'icon'             => 'el el-th-list',
    'title'            => esc_html__('Blog', 'himara'),
    'desc'             => esc_html__('Manage your Blog', 'himara'),
    'fields'           => array(

      array(
          'id'           => 'himara_blog_arhive_layout',
          'type'         => 'radio',
          'title'        => esc_html__('Blog Archive Layout', 'himara'),
          'options'      => array(
              'classic'   => esc_html__('Classic View', 'himara'),
              'list'   => esc_html__('List View', 'himara'),
              'grid'   => esc_html__('Grid View', 'himara')
          ),
          'default'      => 'classic',
      ),

      array(
          'id'           => 'himara_blog_single_layout',
          'type'         => 'radio',
          'title'        => esc_html__('Blog Single Layout', 'himara'),
          'options'      => array(
              'classic'   => esc_html__('Classic View', 'himara'),
              'hero'   => esc_html__('Hero View', 'himara'),
          ),
          'default'      => 'classic',
      ),

      array(
        'id'          => 'himara_blog_sidebar',
        'type'        => 'image_select',
        'title'       => esc_html__('Sidebar', 'himara'),
        'subtitle'    => esc_html__('Select sidebar side for pages', 'himara'),
        'options'     => array(
            'left'      => array( 'title' => esc_html__('Left', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-left.png' ),
            'none'      => array( 'title' => esc_html__('None', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-none.png' ),
            'right'     => array( 'title' => esc_html__('Right', 'himara'),    'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-right.png' ),
        ),
        'default'     => 'right',
      ),

    array(
        'id'          => 'himara_post_excerpt_limit',
        'type'        => 'text',
        'class'       => 'small-text',
        'title'       => esc_html__('Excerpt limit', 'himara'),
        'subtitle'    => esc_html__('Specify your excerpt limit', 'himara'),
        'desc'        => esc_html__('Note: Value represents number of characters', 'himara'),
        'default'     => '300',
        'validate'    => 'numeric',
    ),

    array(
        'id'         => 'blog_page_header',
        'type'       => 'switch',
        'title'      => esc_html__('Archive Page Header', 'himara'),
        'subtitle'      => esc_html__('Enable the page header for archive pages (index, single, search, category, tags)', 'himara'),
        'default'    => true
    ),

    array(
        'id'          => 'single_post_tags',
        'type'        => 'switch',
        'title'       => esc_html__('Tags', 'himara'),
        'subtitle'    => esc_html__('Check if you want to display tags', 'himara'),
        'default'     => false
    ),

    array(
        'id'          => 'single_post_share',
        'type'        => 'switch',
        'title'       => esc_html__('Share Buttons', 'himara'),
        'subtitle'    => esc_html__('Check if you want to display share buttons', 'himara'),
        'default'     => false
    ),

    array(
        'id'          => 'single_post_author',
        'type'        => 'switch',
        'title'       => esc_html__('About Author', 'himara'),
        'subtitle'    => esc_html__('Check if you want to display the about author area', 'himara'),
        'default'     => true
    ),


)

)

);

/* Page */
Redux::setSection(
    $opt_name,
    array(

    'icon'             => 'el el-file',
    'title'            => esc_html__('Page', 'himara'),
    'desc'             => esc_html__('Manage your Page', 'himara'),
    'fields'           => array(

      array(
          'id'         => 'page_header',
          'type'       => 'button_set',
          'title'      => esc_html__('Page Header', 'himara'),
          'subtitle'   => esc_html__('Choose Page Header Style', 'himara'),
          'multi'      => false,
          'options'    => array(
              'color'  => 'Color Background',
              'image'  => 'Image Background',
           ),
          'default'    => 'image'
      ),

      array(
            'id'         => 'page_header_image_bg',
            'type'       => 'media',
            'title'      => esc_html__('Background Image', 'himara'),
            'subtitle'   => esc_html__('Upload your background image', 'himara'),
            'default'    => array( 'url' => esc_url(get_template_directory_uri().'/assets/images/page-header-bg.jpg') ),
            'required'   => array( 'page_header', '=', 'image' )
        ),

        array(
              'id'         => 'page_header_color_bg',
              'type'        => 'color',
              'title'       => esc_html__('Page Header Background Color', 'himara'),
              'transparent' => false,
              'default'     => '#f5f3f0',
              'required'   => array( 'page_header', '=', 'color' )
          ),

        array(
              'id'         => 'page_header_border_color',
              'type'        => 'color',
              'title'       => esc_html__('Page Header Border Color', 'himara'),
              'transparent' => false,
              'default'     => '#f2f1f0',
              'required'   => array( 'page_header', '=', 'color' )
          ),

        array(
              'id'         => 'page_header_color',
              'type'        => 'color',
              'title'       => esc_html__('Page Header Text Color', 'himara'),
              'transparent' => false,
              'default'     => '#606060',
        ),

        array(
          'id'          => 'page_breadcrumb',
          'type'        => 'switch',
          'title'       => esc_html__('Display Breadcrumb', 'himara'),
          'subtitle'    => esc_html__('Check if you want to display breadcrumb area on pages', 'himara'),
          'default'     => true,
         ),

         array(
            'id'          => 'page_header_padding_top',
            'type'        => 'text',
            'class'       => 'small-text',
            'title'       => esc_html__('Page Header Padding Top', 'himara'),
            'desc'        => esc_html__('Note: padding value is in px.', 'himara'),
            'default'     => '40',
        ),

        array(
            'id'          => 'page_header_padding_bottom',
            'type'        => 'text',
            'class'       => 'small-text',
            'title'       => esc_html__('Page Header Padding Bottom', 'himara'),
            'desc'        => esc_html__('Note: padding value is in px.', 'himara'),
            'default'     => '40',
        ),

        array(
            'id'         => 'page_header_aligment',
            'type'       => 'button_set',
            'title'      => esc_html__('Page Header Aligment', 'himara'),
            'subtitle'   => esc_html__('Choose Page Header aligment', 'himara'),
            'multi'      => false,
            'options'    => array(
                'left'  => 'Left',
                'center'  => 'Center',
             ),

            'default'    => 'left'
        ),

        array(
            'id'          => 'himara_page_sidebar',
            'type'        => 'image_select',
            'title'       => esc_html__('Sidebar', 'himara'),
            'subtitle'    => esc_html__('Select sidebar side for pages', 'himara'),
            'options'     => array(
                'left'      => array( 'title' => esc_html__('Left', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-left.png' ),
                'none'      => array( 'title' => esc_html__('None', 'himara'), 'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-none.png' ),
                'right'     => array( 'title' => esc_html__('Right', 'himara'),    'img' =>  get_template_directory_uri().'/assets/images/admin/sidebar-right.png' ),
            ),
            'default'     => 'none',
        ),

     )

    )

);

/* Google Map */
Redux::setSection(
    $opt_name,
    array(

    'icon'            => 'el el-map-marker',
    'title'           => esc_html__('Google Map', 'himara'),
    'fields'          => array(

        array(
            'id'         => 'google_map_api_key',
            'type'       => 'text',
            'title'      => esc_html__('API Key', 'himara'),
            'desc'   => wp_kses(sprintf(__('<a href="%s" target="_blank">Get API Key</a>.', 'himara'), 'https://developers.google.com/maps/documentation/javascript/get-api-key'), wp_kses_allowed_html('post')),
        ),

     )
    )
);

/* Additional code */
Redux::setSection(
    $opt_name,
    array(

        'icon'        => 'el-icon-css',
        'title'       => esc_html__('Additional Code', 'himara'),
        'desc'        =>  esc_html__('These options are for advanced users only, so use it with caution.', 'himara'),
        'fields'      => array(

        array(
            'id'         => 'additional_css',
            'type'       => 'ace_editor',
            'title'      => esc_html__('Additional CSS', 'himara'),
            'subtitle'   => esc_html__('Use this field to add CSS code and modify the default theme styling', 'himara'),
            'mode'       => 'css',
            'theme'      => 'monokai',
            'default'    => ''
        ),

        array(
            'id'         => 'additional_js',
            'type'       => 'ace_editor',
            'title'      => esc_html__('Additional JavaScript', 'himara'),
            'subtitle'   => esc_html__('Use this field to add JavaScript code', 'himara'),
            'desc'       => esc_html__('Note: Please use clean execution JavaScript code without "script" tags', 'himara'),
            'mode'       => 'javascript',
            'theme'      => 'monokai',
            'default'    => ''
        )
     )
    )
);


/* Translation */
Redux::setSection(
    $opt_name,
    array(

        'icon'        => 'el-icon-globe-alt',
        'title'       => esc_html__('Translation', 'himara'),
        'desc'        =>  esc_html__('Please make sure to install and set up the respective plugin first', 'himara'),
        'fields'      => array(



        array(
          'id'         => 'footer_language_switcher',
          'type'       => 'checkbox',
          'multi'      => false,
          'title'      => esc_html__('Display Language Switcher in the footer', 'himara'),
          'options'    => array(
              'wpml'   => esc_html__('WPML', 'himara'),
              'polylang' => esc_html__('Polylang', 'himara'),
          ),
        ),

        array(
            'id'    => 'info_warning',
            'type'  => 'info',
            'title' => esc_html__('Recommended Multilingual Plugin', 'himara'),
            'style' => 'info',
            'desc'  =>  wp_kses(sprintf(__('If you want to build a multi Multilingual hotel website we suggest WPML plugin. <a href="%s" target="_blank">Get WPML</a>.', 'himara'), 'https://wpml.org/?aid=225435&affiliate_key=xqc1kSQTtLzj'), wp_kses_allowed_html('post')),

        ),


     )
    )
);



/* Performance */
Redux::setSection(
    $opt_name,
    array(

    'icon'            => 'el-icon-dashboard',
    'title'           => esc_html__('Performance', 'himara'),
    'desc'            => esc_html__('Use these options to put your theme to a high speed as well as save your server resources!', 'himara'),
    'fields'          => array(

        array(
            'id'         => 'disable_img_sizes',
            'type'       => 'checkbox',
            'multi'      => true,
            'title'      => esc_html__('Disable additional image sizes', 'himara'),
            'subtitle'   => esc_html__('By default, theme generates additional image size for each of the layouts it offers. You can use this option to avoid creating additional sizes if you are not using particular layout in order to save your server space.', 'himara'),
            'options'    => array(
                'himara_image_size_480_480'     => esc_html__('480 x 480', 'himara'),
                'himara_image_size_400_800'     => esc_html__('400 x 800', 'himara'),
                'himara_image_size_600_400'     => esc_html__('600 x 400', 'himara'),
                'himara_image_size_1170_500'    => esc_html__('1170 x 500', 'himara'),
                'himara_image_size_1920_800'    => esc_html__('1920 x 800', 'himara'),
            ),

            'default' => array()
        ),
     )
    )
);

/**
 * Message set home page as static page
*/
if (get_option('show_on_front') != 'page') {
    $info = array(
                'id' => 'home_setup_info',
                'type' => 'info',
                'style' => 'critical',
                'title' => esc_html__('Important note:', 'himara'),
                'subtitle' => wp_kses_post(sprintf(__('Your front page is currently set to display <strong>"latest posts"</strong>. In order to use these options, you need to set your front page option as <strong>"static page"</strong> inside <a href="%s" target="_blank">Settings => Reading</a>.', 'himara'), admin_url('options-reading.php'))),
            );
} else {

    $info = array();
}
