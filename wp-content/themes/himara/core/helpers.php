<?php

/* --------------------------------------------------------------------------
 * Set some default theme options if Redux is not enabled yet
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_default_options' ) ) {

	function himara_default_options( $option = null ) {

		if ( empty( $option ) ) {
			return false;
		}

		$defaults = array(

			'himara_main_font'     => array(
				'google'      => true,
				'font-weight'  => '400',
				'font-family' => 'Roboto',
				'subsets' => 'latin-ext'
			),

			'himara_h_font'     => array(
				'google'      => true,
				'font-weight'  => '600',
				'font-family' => 'Jost',
				'subsets' => 'latin-ext'
			),

			'himara_nav_font'     => array(
				'font-weight'  => '900',
				'font-family' => 'Roboto',
				'subsets' => 'latin-ext'
			),

			'primary_color'     => array(
				'regular'  => '#606060',
				'hover'  => '#606060',
				'active'  => '#b69854',
			),

			'menu_color'     => array(
				'regular' => '#32353c',
				'hover'   => '',
				'active'  => '',
			),

			'sub_menu_color'     => array(
				'regular' => '#32353c',
				'hover'   => '',
				'active'  => '',
			),

			'footer_language_switcher'     => array(
				'wpml'  => false,
				'polylang'  => false,
			),

			'himara_blog_sidebar' => 'right',
			'himara_page_sidebar' => 'right',


		);

		$defaults = apply_filters( 'himara_modify_default_options', $defaults );

		if ( isset( $defaults[$option] ) ) {
			return $defaults[$option];
		}


		return false;
	}

}


/* --------------------------------------------------------------------------
 * Get theme options
 * @since  1.0.0
 * return 'false' if option is not found
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_option' ) ) {

	function himara_get_option( $option ) {

		global $himara_settings;

		if ( empty( $himara_settings ) ) {
			$himara_settings = get_option( 'himara_settings' );
		}

		if ( empty( $himara_settings[$option] ) ) {
			$himara_settings[$option] = himara_default_options( $option );
		}

		if ( isset( $himara_settings[$option] ) ) {

			return is_array( $himara_settings[$option] ) && isset( $himara_settings[$option]['url'] ) ? $himara_settings[$option]['url'] : $himara_settings[$option];

		} else {

			return false;

		}


	}

}

/* --------------------------------------------------------------------------
 * Translate options
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_translate_options' ) ):
	function himara_get_translate_options() {
		global $himara_translate;
		get_template_part( 'core/translate' );
		$translate = apply_filters( 'himara_modify_translate_options', $himara_translate );
		return $translate;
	}
endif;


/* --------------------------------------------------------------------------
 * Check if variable is not empty
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_css_style' ) ) :

	function himara_get_css_style($property, $variable) {

		if ( !empty($variable) ) {

			echo esc_attr( $property.':'.$variable );

		} else {

			return false;

		}

	}

endif;

/* --------------------------------------------------------------------------
 * Compress dynamic CSS
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_compress_css_code' ) ) :
	function himara_compress_css_code( $code ) {

		// Remove Comments
		$code = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code );

		// Remove tabs, spaces, newlines, etc.
		$code = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $code );

		return $code;
	}
endif;


/* --------------------------------------------------------------------------
 * Generate dynamic CSS
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_generate_dynamic_css' ) ):
	function himara_generate_dynamic_css() {
		ob_start();
		get_template_part( 'assets/css/dynamic-css' );

		// Dynamic CSS (Theme Options)
		$dynamic_css = ob_get_contents();
		ob_end_clean();

		// Custom CSS (Additional CSS)
		$additional_css = himara_get_option( 'additional_css' );
		return himara_compress_css_code( $dynamic_css.' '.$additional_css );
	}
endif;

/*-----------------------------------------------------------------------------------
* Outputs additional JavaScript code from theme options
* @since  1.0.0
-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'himara_wp_footer', 89 );

if ( !function_exists( 'himara_wp_footer' ) ):
	function himara_wp_footer() {

		//Additional JS
		$additional_js = trim( preg_replace( '/\s+/', ' ', himara_get_option( 'additional_js' ) ) );
		if ( !empty( $additional_js ) ) {
			echo '<script type="text/javascript">
				/* <![CDATA[ */
					'.wp_kses_post( $additional_js ).'
				/* ]]> */
				</script>';
		}

	}
endif;

/* --------------------------------------------------------------------------
 * Image Sizes
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_image_sizes' ) ):
	function himara_get_image_sizes() {
		$sizes = array(
			'himara_image_size_480_480' => array( 'title' => esc_html__('480 x 480', 'himara'), 'w' => 480, 'h' => 480, 'crop' => true),
			'himara_image_size_400_800' => array( 'title' => esc_html__('400 x 800', 'himara'), 'w' => 400, 'h' => 800, 'crop' => true),
			'himara_image_size_600_400' => array( 'title' => esc_html__('600 x 400', 'himara'), 'w' => 600, 'h' => 400, 'crop' => true),
			'himara_image_size_1170_500' => array( 'title' => esc_html__('1170 x 500', 'himara'), 'w' => 1170, 'h' => 500, 'crop' => true),
			'himara_image_size_1920_800' => array( 'title' => esc_html__('1920 x 800', 'himara'), 'w' => 1920, 'h' => 800, 'crop' => true),
		);

		$disable_img_sizes = himara_get_option( 'disable_img_sizes' );
		if(!empty( $disable_img_sizes )){
			$disable_img_sizes = array_keys( array_filter( $disable_img_sizes ) );
		}
		if(!empty($disable_img_sizes) ){
			foreach($disable_img_sizes as $size_id ){
				unset( $sizes[$size_id]);
			}
		}
		$sizes = apply_filters( 'himara_modify_image_sizes', $sizes );
		return $sizes;
	}
endif;

/* --------------------------------------------------------------------------
 * Get branding
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_get_branding' ) ) {

	function himara_get_branding() {

		$header_layout = himara_get_option('header_layout');

		$first_logo = himara_get_option( 'logo' );
		$second_logo = himara_get_option( 'second_logo' );
		$logo_height = himara_get_option( 'logo_height' );
		$second_logo_height = himara_get_option( 'second_logo_height' );
		$trasnparent_page_header = get_post_meta( get_the_ID(), 'himara_mtb_header_transparent', true );

		// Transparent Header
		if ( $trasnparent_page_header == true )  {

			$header_first_logo = $second_logo;
			$header_second_logo = $first_logo;

		// Normal Header
		} elseif ( $header_layout === 'horizontal' ) {

			$header_first_logo = $first_logo;
			$header_second_logo = $first_logo;

		// Vertical Header
		} else {

			$header_first_logo = $first_logo;
			$header_second_logo = $second_logo;
		}

		if ( empty( $header_first_logo ) ) {

			$output = '
			<a class="navbar-brand text" href="'.home_url('/').'">
				'.esc_html( get_bloginfo() ).'
			</a>';

		} else {

			$output = '
				<div class="logo">
					<a class="first-logo" href="'.home_url('/').'">
						<img src="'.$header_first_logo.'" height="'.$logo_height.'" style="height: '.$logo_height.'px" class="first-logo-img" alt="'.esc_attr( get_bloginfo( 'name' ) ).'">
					</a>
					<a class="second-logo" href="'.home_url('/').'" style="display: none;">
						<img src="'.$header_second_logo.'" height="'.$second_logo_height.'" style="height: '.$second_logo_height.'px" class="second-logo-img" alt="'.esc_attr( get_bloginfo( 'name' ) ).'">
					</a>
				</div>'

			;

		}

		echo wp_kses_post( $output );

	}

 }

/* --------------------------------------------------------------------------
 * Append menu text to main mobile menu
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if(!function_exists('himara_append_text_mobile_menu')):

    add_filter('wp_nav_menu_items','mobile_menu_text', 10, 2);

    function mobile_menu_text( $nav, $args ) {

      if ( $args->theme_location == 'himara_main_menu' ) {

        $newmenuitem = '<li class="mobile_menu_title" style="display:none;">'. __('Menu', 'himara') .'</li>';
        $nav = $newmenuitem.$nav;

         }

        return $nav;

    }

endif;

/* --------------------------------------------------------------------------
 * @ Get blog pages
 * @ Return Boolean
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_is_blog' ) ):
function himara_is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_tag() || is_single() || is_search());
}
endif;

/* --------------------------------------------------------------------------
 * @ Get Header Class
 * @ Return String (sticky header or/and transparent-header or/and semi-transparent-header)
 * @ since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_header_class' ) ) {

 	function himara_header_class() {

		$himara_header_class = himara_get_option('header_layout');

		if ( $himara_header_class == '' ) $himara_header_class = 'horizontal';

		$himara_header_class = $himara_header_class.'-header ';

		$himara_mtb_transparent_header = get_post_meta(get_the_ID(), 'himara_mtb_header_transparent', true);
		$himara_mtb_semi_transparent_header = get_post_meta(get_the_ID(), 'himara_mtb_header_semi_transparent', true);
		$himara_mtb_fixed_header = get_post_meta(get_the_ID(), 'himara_mtb_header_sticky', true);

		// EB Fixed Header only for horizontal header
		if ( is_singular( 'eagle_rooms' ) ) {

			if ( get_post_meta(get_the_ID(), 'eagle_booking_mtb_room_header_sticky', true) == 1 && himara_get_option('header_layout') === 'horizontal') $himara_header_class .= 'sticky-header ';

		}

		// Get The Default Option
		if (empty($himara_mtb_fixed_header) && $himara_mtb_fixed_header != '0') {
			$himara_mtb_fixed_header = himara_get_option('header_sticky');
		}


		if ( $himara_mtb_fixed_header == true && himara_get_option('header_layout') === 'horizontal' ) {
			$himara_header_class .= 'sticky-header ';
		}

		if ( $himara_mtb_transparent_header == true ) {
			$himara_header_class .= 'transparent-header ';
		}

		if ( $himara_mtb_semi_transparent_header == true ) {
			$himara_header_class .= 'semi-transparent-header ';
		}

		echo esc_attr( $himara_header_class );

	}

}

/* --------------------------------------------------------------------------
 * @ Body Class
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_body_class' ) ) {

 	function himara_body_class() {

		// Get MTB
		$himara_header[] = 'himara-'.himara_get_option('header_layout').'-header';

		$himara_header[] = himara_get_option('header_state');

		return $himara_header;

	}

}

/* --------------------------------------------------------------------------
 * @ Get Main Class
 * @ Return String (padding or no-padding)
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_main_class' ) ):

 	function himara_main_class() {

		// Get MTB
		$himara_mtb_padding = get_post_meta(get_the_ID(), 'himara_mtb_padding', true);

		// Eagle Booking Plugin
		if ( is_singular( 'eagle_rooms' ) ) {
			$himara_mtb_padding = get_post_meta(get_the_ID(), 'eagle_booking_mtb_room_padding', true);
		}

		if ( $himara_mtb_padding == '' ) $himara_mtb_padding = true;

		if ( $himara_mtb_padding == true ) {

			$himara_main_class = 'padding';

		} else {

			$himara_main_class = 'no-padding';
		}

		echo esc_attr( $himara_main_class );

}

endif;

/* --------------------------------------------------------------------------
 * @ Get Container Class
 * @ Return String (container or empty)
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_container_class' ) ):
 	function himara_container_class() {

		$himara_mtb_container = get_post_meta(get_the_ID(), 'himara_mtb_container', true);

		// Eagle Booking Plugin
		if ( is_singular( 'eagle_rooms' ) ) {
			$himara_mtb_container = get_post_meta(get_the_ID(), 'eagle_booking_mtb_room_container', true);
		}

		// Get The Default Option
		if ( empty( $himara_mtb_container ) && $himara_mtb_container != '0') {

			$himara_mtb_container = himara_get_option('himara_container');

			if ( empty( himara_get_option('himara_container') ) ) $himara_mtb_container = true;

		}

		if ( $himara_mtb_container == false ) {

			$himara_container_class = '';

		} else {

			$himara_container_class = 'container';
		}

		echo esc_attr( $himara_container_class );

}

endif;

/* --------------------------------------------------------------------------
 * @ Get Sidebar
 * @ Return/Echo String (col-lg-12 or col-lg-9 and col-lg-3 and left or right or none)
 * @ Parameters column(string), echo(boolean)
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_sidebar' ) ):
 	function himara_sidebar( $column = '', $echo = true ) {

		// MTB
		$himara_mtb_sidebar = get_post_meta( get_the_ID(), 'himara_mtb_sidebar', true );

		// MTB of blog pages
		if (himara_is_blog()) {
			$himara_mtb_sidebar = get_post_meta(get_queried_object_id(), 'himara_mtb_sidebar', true);
		}

		// Eagle Booking (MTB)
		if ( is_singular( 'eagle_rooms' ) ) {
			$himara_mtb_sidebar = get_post_meta( get_the_ID(), 'eagle_booking_mtb_room_sidebar', true );
		}

		// Default Options
		if ( empty( $himara_mtb_sidebar ) || $himara_mtb_sidebar == 'inherit' ) {
			if (himara_is_blog()) {
				$himara_mtb_sidebar = himara_get_option('himara_blog_sidebar');
			} else {
				$himara_mtb_sidebar = himara_get_option('himara_page_sidebar');
			}
		}

		// Initialize
		$himara_sidebar = '';

		// Entry Class
		if ($column == 'entry') {

			if ( $himara_mtb_sidebar === 'none' || !is_active_sidebar('himara_default_sidebar')  ) {

				$himara_sidebar .= 'col-lg-12';

			} else {

				$himara_sidebar .= 'col-lg-9';

			}

		// Sidebar Class
		} elseif ( $column === 'sidebar' ) {

				if ( $himara_mtb_sidebar !== 'none' ) {
					$himara_sidebar .= 'col-lg-3';
				}

		// Sidebar Side
		} else {

			$himara_sidebar = $himara_mtb_sidebar;
		}

		// Return or Echo
		if($echo == true) {
			echo esc_attr( $himara_sidebar );
		} else {
			return $himara_sidebar;
		}

}

endif;

/* --------------------------------------------------------------------------
 * @ Get Sidebar Side
 * @ Return String (left or right or none)
 * @ Since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_sidebar' ) ):
 	function himara_sidebar() {

		$himara_mtb_sidebar = get_post_meta( get_the_ID(), 'himara_mtb_sidebar', true );

		if ( empty( $himara_mtb_sidebar ) ) {
			$himara_mtb_sidebar = 'right';
		}

		return $himara_mtb_sidebar;
	}

endif;

/* --------------------------------------------------------------------------
 * @ Get Page Title
 * @ since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_page_title' ) ):
 	function himara_page_title() {

		$page_title = get_post_meta(get_the_ID(), 'himara_mtb_title', true);

		if (himara_is_blog()) {
			$blog_post_page = get_option( 'page_for_posts' );
			$page_title = get_post_meta($blog_post_page, 'himara_mtb_title', true);
		}

		if ( $page_title == true || $page_title == '' ) {
				return true;
		} else {
				return false;
		}

}

endif;

/* --------------------------------------------------------------------------
 * Get font option
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_get_font_option' ) ):
	function himara_get_font_option( $option = false ) {

		$font = himara_get_option( $option );

		// $native_fonts = himara_get_native_fonts();

		if (  is_array( $font['font-family'] ) ) {
			$font['font-family'] = "'".$font['font-family']."'";
		}

		return $font;
	}
endif;



/* --------------------------------------------------------------------------
 * Generate Google fonts links
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
 if ( !function_exists( 'himara_generate_fonts_link' ) ):
	function himara_generate_fonts_link() {

		$fonts = array();
		$fonts[] = himara_get_option( 'himara_main_font' );
		$fonts[] = himara_get_option( 'himara_h_font' );
		$fonts[] = himara_get_option( 'himara_nav_font' );
		$unique = array();
		$native = array();
		$protocol = is_ssl() ? 'https://' : 'http://';
		$link = array();

		foreach ( $fonts as $font ) {
			if ( !in_array( $font['font-family'], $native ) ) {
				$temp = array();
				if ( isset( $font['font-style'] ) ) {
					$temp['font-style'] = $font['font-style'];
				}
				if ( isset( $font['subsets'] ) ) {
					$temp['subsets'] = $font['subsets'];
				}
				if ( isset( $font['font-weight'] ) ) {
					$temp['font-weight'] = $font['font-weight'];
				}
				$unique[$font['font-family']][] = $temp;
			}
		}

		$subsets = array( 'latin' );

		foreach ( $unique as $family => $items ) {

			$link[$family] = $family;

			$weight = array( '400' );

			foreach ( $items as $item ) {

				//Check weight and style
				if ( isset( $item['font-weight'] ) && !empty( $item['font-weight'] ) ) {
					$temp = $item['font-weight'];
					if ( isset( $item['font-style'] ) && empty( $item['font-style'] ) ) {
						$temp .= $item['font-style'];
					}

					if ( !in_array( $temp, $weight ) ) {
						$weight[] = $temp;
					}
				}

				//Check subsets
				if ( isset( $item['subsets'] ) && !empty( $item['subsets'] ) ) {
					if ( !in_array( $item['subsets'], $subsets ) ) {
						$subsets[] = $item['subsets'];
					}
				}
			}

			$link[$family] .= ':'.implode( ",", $weight );
		}

		if ( !empty( $link ) ) {

			$query_args = array(
				'family' => urlencode( implode( '|', $link ) ),
				'subset' => urlencode( implode( ',', $subsets ) )
			);


			$fonts_url = add_query_arg( $query_args, $protocol.'fonts.googleapis.com/css' );

			return esc_url_raw( $fonts_url );
		}

		return '';

	}
endif;


/* --------------------------------------------------------------------------
 * WP_Bootstrap_Navwalker
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) {

	class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {


		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\"submenu\" >\n";
		}

		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$class_names = $value = '';
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				if ( $args->has_children ) {
					$class_names .= ' dropdown'; }
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active'; }
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . '>';
				$atts = array();


				$atts['target'] = ! empty( $item->target )	? $item->target	: '';
				$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth ) {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
					$atts['aria-haspopup']	= 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;

				if ( ! empty( $item->attr_title ) ) :
								$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) :
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
								else :
									$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
											endif;
				else :
					$item_output .= '<a' . $attributes . '>';
				endif;
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ( $args->has_children && 0 === $depth ) ? '</a>' : '</a>';
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}

		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		public static function fallback( $args ) {
			if ( current_user_can( 'edit_theme_options' ) ) {

				/* Get Arguments. */
				$container = $args['container'];
				$container_id = $args['container_id'];
				$container_class = $args['container_class'];
				$menu_class = $args['menu_class'];
				$menu_id = $args['menu_id'];

				if ( $container ) {
					echo '<' . esc_attr( $container );
					if ( $container_id ) {
						echo ' id="' . esc_attr( $container_id ) . '"';
					}
					if ( $container_class ) {
						echo ' class="' . sanitize_html_class( $container_class ) . '"'; }
					echo '>';
				}
				echo '<ul';
				if ( $menu_id ) {
					echo ' id="' . esc_attr( $menu_id ) . '"'; }
				if ( $menu_class ) {
					echo ' class="' . esc_attr( $menu_class ) . '"'; }
				echo '>';
				echo '<li><a href="' .esc_url( admin_url( 'nav-menus.php' ) ). '">' . esc_html__( 'Add a menu', 'himara' ) . '</a></li>';
				echo '</ul>';
				if ( $container ) {
					echo '</' . esc_attr( $container ) . '>'; }
			}
		}
	}
}


/* --------------------------------------------------------------------------
 * Limit character
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_trim_chars' ) ):
	function himara_trim_chars( $string, $limit, $more = '...' ) {
		if ( !empty( $limit ) ) {
			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $string ), ' ' );
			preg_match_all( '/./u', $text, $chars );
			$chars = $chars[0];
			$count = count( $chars );
			if ( $count > $limit ) {
				$chars = array_slice( $chars, 0, $limit );
				for ( $i = ( $limit -1 ); $i >= 0; $i-- ) {
					if ( in_array( $chars[$i], array( '.', ' ', '-', '?', '!' ) ) ) {
						break;
					}
				}
				$chars =  array_slice( $chars, 0, $i );
				$string = implode( '', $chars );
				$string = rtrim( $string, ".,-?!" );
				$string.= $more;
			}
		}
		return $string;
	}
endif;


/* --------------------------------------------------------------------------
 * Post excerpt limit
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_excerpt' ) ):
	function himara_get_excerpt( $limit = 250 ) {
		$manual_excerpt = false;
		if ( has_excerpt() ) {
			$content =  get_the_excerpt();
			$manual_excerpt = true;
		} else {
			$text = get_the_content( '' );
			$text = strip_shortcodes( $text );
			$text = apply_filters( 'the_content', $text );
			$content = str_replace( ']]>', ']]&gt;', $text );
		}
		if ( !empty( $content ) ) {
			if ( !empty( $limit ) || !$manual_excerpt ) {
				$more = himara_get_option( 'more_string' );
				$content = wp_strip_all_tags( $content );
				$content = preg_replace( '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $content );
				$content = himara_trim_chars( $content, $limit, $more );
			}
			return wp_kses_post( wpautop( $content ) );
		}
		return '';
	}
endif;

/* --------------------------------------------------------------------------
* Share social media
* @since  1.0.0
---------------------------------------------------------------------------*/
if ( ! function_exists( 'himara_social_share' ) ) {
 function himara_social_share() {
	 global $post;
	 $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
	 ?>
		 <div class="share">
			 <span class="share-text"><i class="fa fa-share-alt"></i><?php echo esc_html__('Share', 'himara') ?></span>
			 <div class="social-media">
				 <a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php esc_url( the_permalink() ); ?>" onclick="share_popup(this.href,'<?php echo __('Share on Facebook', 'himara'); ?>','700','400'); return false;" data-toggle="tooltip" ?>"><i class="fa fa-facebook"></i></a>
				 <a class="twitter" href="https://twitter.com/share?url=<?php esc_url( the_permalink() ); ?>" onclick="share_popup(this.href,'<?php echo __('Share on Twitter', 'himara'); ?>','700','400'); return false;" data-toggle="tooltip" ?>"><i class="fa fa-twitter"></i></a>
				 <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php esc_url( the_permalink() ); ?>" onclick="share_popup(this.href,'<?php echo __('Share on Pinterest', 'himara'); ?>','700','400'); return false;" data-toggle="tooltip" ?>"><i class="fa fa-pinterest"></i></a>
		 	</a>
		 </div>

	 <?php
 }
}

/* --------------------------------------------------------------------------
 * Share PopUp
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'himara_share_popup', 79 );

if ( ! function_exists( 'himara_share_popup' ) ) {
function himara_share_popup(){
  ?>
  <script>
      function share_popup(url, title, w, h) {
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=no, menubar=no, resizable=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        if (window.focus) {
            newWindow.focus();
        }
    }
  </script>
  <?php
    }
}


/* --------------------------------------------------------------------------
 * Comments
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( ! function_exists( 'himara_custom_comments' ) ) {
function himara_custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-avatar">
				<?php
				$gravatar_alt = get_comment_author();
				echo get_avatar($comment,'80', '', $gravatar_alt); ?>
		</div>
		<div class="comment-box">
			<div class="comment-header">
				<?php
				$author = get_comment_author();
				$link = get_comment_author_url();
				if(!empty($link))
					$author = '<a rel="nofollow" href="'.$link.'" >'.$author.'</a>';
				printf('<h4 class="comment-author-name">%s</h4>', $author) ?>

				<?php edit_comment_link( '<i class="fa fa-pencil" aria-hidden="true"></i>', '') ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			<div class="comment-info">
				<i class="fa-regular fa-clock"></i>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<span>
						<?php printf( esc_html__('%1$s at %2$s','himara'), get_comment_date(),  get_comment_time()) ?>
					</span>
				</a>
			</div>
			<div class='comment-text'>
				<?php comment_text(); ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<em class="info"><i class="fa fa-info-circle" aria-hidden="true"></i></em>
				<?php endif; ?>
			</div>
		</div>
	<?php
	}
}

/* --------------------------------------------------------------------------
 * Rearrange comments form fields
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
function himara_rearrange_comment_form_fields( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'himara_rearrange_comment_form_fields' );



/* --------------------------------------------------------------------------
 * Breadcrumb
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_breadcrumb' ) ) {
    function himara_get_breadcrumb($options = array()) {

        global $post;
        $allowed_html_array = array(
            'i' => array(
                'class' => array()
            )
        );
        $text['home']     = esc_html__('Home', 'himara');
        $text['category'] = esc_html__('%s', 'himara');
        $text['tax']      = esc_html__('%s', 'himara');
        $text['tag']      = esc_html__('%s', 'himara');
        $text['author']   = esc_html__('%s', 'himara');

        $defaults = array(
            'show_current' => 1,
            'show_on_home' => 0,
            'delimiter' => '',
            'before' => '<li class="active">',
            'after' => '</li>',
            'home_before' => '',
            'home_after' => '',
            'home_link' => home_url() . '/',
            'link_before' => '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">',
            'link_after'  => '</li>',
            'link_attr'   => '',
            'link_in_before' => '',
            'link_in_after'  => ''
        );

        extract($defaults);

        $link = '<a itemprop="url" href="%1$s"><span itemprop="title">' . $link_in_before . '%2$s' . $link_in_after . '</span></a>';

        $link = $link_before . $link . $link_after;

        if (isset($options['text'])) {
            $options['text'] = array_merge($text, (array) $options['text']);
        }

        extract($options);

        $replace = $link_before . '<a' . esc_attr( $link_attr ) . '\\1>' . $link_in_before . '\\2' . $link_in_after . '</a>' . $link_after;

        /*
         * Use bbPress's breadcrumbs when available
         */
        if (function_exists('bbp_breadcrumb') && is_bbpress()) {

            $bbp_crumbs =
                bbp_get_breadcrumb(array(
                    'home_text' => $text['home'],
                    'sep' => '',
                    'sep_before' => '',
                    'sep_after'  => '',
                    'pad_sep' => 0,
                    'before' => $home_before,
                    'after' => $home_after,
                    'current_before' => $before,
                    'current_after'  => $after,
                ));

            if ($bbp_crumbs) {
                echo '<ul class="breadcrumb favethemes_bbpress_breadcrumb">' .$bbp_crumbs. '</ul>';
                return;
            }
        }

            echo '<ul class="breadcrumb">' .$home_before . sprintf($link, $home_link, $text['home']) . $home_after . $delimiter;

            if (is_category() || is_tax())
            {
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                if( $term ) {

                    $taxonomy_object = get_taxonomy( get_query_var( 'taxonomy' ) );

                    $parent = $term->parent;

                    while ($parent):
                        $parents[] = $parent;
                        $new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
                        $parent = $new_parent->parent;
                    endwhile;
                    if(!empty($parents)):
                        $parents = array_reverse($parents);

                        foreach ($parents as $parent):
                            $item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));

                            $term_link = get_term_link( $item );
                            if ( is_wp_error( $term_link ) ) {
                                continue;
                            }
                            echo '<li><a href="'.esc_url( $term_link ).'">'.$item->name.'</a></li>';
                        endforeach;
                    endif;

                    echo '<li>'.esc_html($term->name).'</li>';

                } else {

                    $the_cat = get_category(get_query_var('cat'), false);

                    if ($the_cat->parent != 0) {

                        $cats = get_category_parents($the_cat->parent, true, $delimiter);
                        $cats = preg_replace('#<a([^>]+)>([^<]+)</a>#', $replace, $cats);

                        echo wp_kses_post($cats);
                    }

                    echo wp_kses_post($before . sprintf((is_category() ? $text['category'] : $text['tax']), single_cat_title('', false)) . $after);
                }

            }

            else if (is_day()) {

                echo  sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter
                    . sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter
                    . $before . get_the_time('d') . $after;

            }
            else if (is_month()) {

                echo  sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter
                    . $before . get_the_time('F') . $after;

            }
            else if (is_year()) {

                echo wp_kses_post($before . get_the_time('Y') . $after);

            }
            else if (is_single() && !is_attachment()) {
                if (get_post_type() != 'post' && get_post_type() != 'property' ) {

                    $post_type = get_post_type_object(get_post_type());
                    if ($show_current == 1) {
                        echo esc_attr($delimiter) . $before . get_the_title() . $after;
                    }
                }
                elseif( get_post_type() == 'property' ){

                    $terms = get_the_terms( get_the_ID(), 'property_type' );
                    if( !empty($terms) ) {
                        foreach ($terms as $term) {
                            $term_link = get_term_link($term);
                            if (is_wp_error($term_link)) {
                                continue;
                            }
                            echo '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="' . esc_url($term_link) . '"> <span itemprop="title">' . esc_attr( $term->name ). '</span></a></li>';
                        }
                    }

                    if ($show_current == 1) {
                        echo esc_attr($delimiter) . $before . get_the_title() . $after;
                    }
                }
                else {

                    $cat = get_the_category();
                    $cats = get_category_parents($cat[0], true, esc_attr($delimiter));

                    if ($show_current == 0) {
                        $cats = preg_replace("#^(.+)esc_attr($delimiter)$#", "$1", $cats);
                    }

                    $cats = preg_replace('#<a([^>]+)>([^<]+)</a>#', $replace, $cats);

                    echo wp_kses_post($cats);

                    if ($show_current == 1) {
                        echo wp_kses_post($before . get_the_title() . $after);
                    }
                }

            }
            elseif (!is_single() && !is_page() && get_post_type() != 'post') {

                $post_type = get_post_type_object(get_post_type());

                echo wp_kses_post($before . $post_type->labels->name . $after);

            }
            elseif (is_attachment()) {

                $parent = get_post($post->post_parent);
                $cat = current(get_the_category($parent->ID));
                $cats = get_category_parents($cat, true, esc_attr($delimiter));

                if (!is_wp_error($cats)) {
                    $cats = preg_replace('#<a([^>]+)>([^<]+)</a>#', $replace, $cats);
                    echo wp_kses_post($cats);
                }

                printf($link, get_permalink($parent), $parent->post_title);

                if ($show_current == 1) {
                    echo esc_attr($delimiter) . $before . get_the_title() . $after;
                }

            }
            elseif (is_page() && !$post->post_parent && $show_current == 1) {

                echo wp_kses_post($before . get_the_title() . $after);

            }
            elseif (is_page() && $post->post_parent) {

                $parent_id  = $post->post_parent;
                $breadcrumbs = array();

                while ($parent_id) {
                    $page = get_post($parent_id);
                    $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    $parent_id  = $page->post_parent;
                }

                $breadcrumbs = array_reverse($breadcrumbs);

                for ($i = 0; $i < count($breadcrumbs); $i++) {

                    echo esc_html( $breadcrumbs[$i] );

                    if ($i != count($breadcrumbs)-1) {
                        echo esc_attr($delimiter);
                    }
                }

                if ($show_current == 1) {
                    echo esc_attr($delimiter) . $before . get_the_title() . $after;
                }

            }
            elseif (is_tag()) {
                echo wp_kses_post($before . sprintf($text['tag'], single_tag_title('', false)) . $after);

            }
            elseif (is_author()) {

                global $author;

                $userdata = get_userdata($author);
                echo wp_kses_post($before . sprintf($text['author'], $userdata->display_name) . $after);

            }
            elseif (is_404()) {
                echo wp_kses_post($before . esc_attr( $text['404'] ). $after);
            }
            if (get_query_var('paged')) {

                if (is_category() || is_day() || is_month() || is_year() || is_tag() || is_author()) {
                    echo ' (' .esc_html__('Page', 'himara'). ' ' . get_query_var('paged') . ')';
                }
            }

            echo '</ul>';

    }
}


/* --------------------------------------------------------------------------
 * Get JS options
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'himara_get_js_settings' ) ):
	function himara_get_js_settings() {

		$js_settings = array();
		$js_settings['header_layout'] = himara_get_option( 'header_layout' );
		$js_settings['header_state'] = himara_get_option( 'header_state' );

		return $js_settings;
	}
endif;
