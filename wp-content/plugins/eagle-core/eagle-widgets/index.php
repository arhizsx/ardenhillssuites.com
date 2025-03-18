<?php

/* --------------------------------------------------------------------------
 * Register Widgets
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action( 'widgets_init', 'himara_register_widgets' );

if ( !function_exists( 'himara_register_widgets' ) ) :
	function himara_register_widgets() {

    // Include all required files
    foreach ( glob ( plugin_dir_path( __FILE__ ) . "*/*.php" ) as $file ){
    	include_once $file;
    }

	register_widget( 'Himara_About_Footer_Widget' );
	// register_widget( 'Himara_Contact_Footer_Widget' );
	register_widget( 'Himara_Category_Widget' );
	register_widget( 'Himara_Recent_Posts_Widget' );

	}
endif;
