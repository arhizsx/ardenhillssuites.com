<?php

// Include Redux Framework
include_once 'redux/framework.php';

// Include Redux Εχτενσιονσ
include_once 'redux-extension-loader.php';


/*-----------------------------------------------------------------------------------*/
// Remove the demo link and the notice
/*-----------------------------------------------------------------------------------*/
if (! function_exists('himara_remove_redux_demo')) {
    function himara_remove_redux_demo()
    {
        if ( class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2);
        }
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ));
        }
    }
}

add_action('init', 'himara_remove_redux_demo');