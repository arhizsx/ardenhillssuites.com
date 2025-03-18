<?php

/**
 * Description:     Register all required Elementor Widgets
 * Author:          Eagle-Themes
 * Author URI:      http://eagle-themes.com/
 * Version:         1.0.0
 */

namespace ElementorEagleThemes;

/* Class Plugin */
class Plugin {

 	/* Instance */
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/* widget_scripts */
	public function widget_scripts() {
		wp_register_script( 'core-js', plugins_url( '/assets/js/core.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_style( 'core-css', plugins_url( '/assets/css/core.css', __FILE__ ), false, false);
	}

	/* Include Widgets files */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/news.php' );
		require_once( __DIR__ . '/widgets/brand.php' );
		require_once( __DIR__ . '/widgets/video.php' );
		require_once( __DIR__ . '/widgets/map.php' );
		require_once( __DIR__ . '/widgets/services.php' );
		require_once( __DIR__ . '/widgets/gallery.php' );
		require_once( __DIR__ . '/widgets/restaurant-menu.php' );
		require_once( __DIR__ . '/widgets/staff.php' );
		require_once( __DIR__ . '/widgets/contact-info.php' );
		require_once( __DIR__ . '/widgets/social.php' );
	}

	/* Register Widgets */
	public function register_widgets() {

		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_NEWS() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_BRAND() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_VIDEO() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_MAP() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_SERVICES() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_GALLERY() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_RESTAURNAT_MENU() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_STAFF() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_CONTACT() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EAGLE_SOCIAL() );
	}

	/* Plugin class constructor */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

}

// Instantiate Plugin Class
Plugin::instance();
