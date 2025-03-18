<?php

namespace ElementorEagleThemes\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
* Elementor Section Title Widget
* Author: Eagle Themes
* Since: 1.0.0
---------------------------------------------------------------------------*/
class EAGLE_MAP extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_map';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Map', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-google-maps';
	}

	/* Retrieve the list of categories the widget belongs to.*/
	public function get_categories() {
		return [ 'eaglethemes' ];
	}

	/*Retrieve the list of scripts the widget depended on. */
	public function get_script_depends() {
		return [ 'elementor-section-title' ];
	}

	/* Register the widget controls. */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'eagle' ),
			]
		);

   		// Description
		$this->add_control(
			'description',
				[
					'label' => __( 'Description', 'eagle' ),
					'label_block' => false,
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Default description', 'eagle' ),
					'placeholder' => __( 'Type your description here', 'eagle' ),
				]
			);

    	// Latitude
		$this->add_control(
			'latitude',
			[
				'label' => __( 'Map Latitude', 'eagle' ),
				'type' => Controls_Manager::TEXT,
				'default' => '39.7715865',
			]
		);

    	// Longitude
		$this->add_control(
			'longitude',
			[
				'label' => __( 'Map Longitude', 'eagle' ),
				'type' => Controls_Manager::TEXT,
				'default' => '19.997841',
			]
		);

		$this->add_control(
            'position_description',
            [
                'raw' =>  esc_html__( 'How to get Latitude and Longitude.', 'elementor' ) . sprintf( ' <a href="%1$s" target="_blank">%2$s</a>', 'https://support.google.com/maps/answer/18539', esc_html__( 'Learn more.', 'elementor' ) ),
                'type' => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
                'render_type' => 'ui',
            ]
        );


		// Pin
		$this->add_control(
			'pin',
			[
					'label' => __( 'Map Pin', 'eagle' ),
					'label_block' => false,
					'type' => Controls_Manager::MEDIA,
				]
			);


		$this->end_controls_section();


		// New Section [Layout]
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __( 'Layout', 'eagle' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


    	// Height
		$this->add_responsive_control(
			'height',
			[
				'label' => __( 'Map Height', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [

					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],

				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .eth-google-map .inner-map' => 'height: {{SIZE}}px;',
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],

			]

		);

    	// Zoom
		$this->add_control(
			'zoom',
			[
				'label' => esc_html__( 'Zoom', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
			]
		);


		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'eagle' ),
				'selector' =>'{{WRAPPER}} .eth-google-map','.eth-google-map .inner-map',
			]

		);

        // Border Radius
		$this->add_control(
			'border_radius', [
				'label' => __( 'Border Radius', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eth-google-map' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
					'{{WRAPPER}} .eth-google-map .inner-map' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
				'default' => [
					'top' => '180',
					'right' => '180',
					'bottom' => '180',
					'left' => '180',
					'isLinked' => false,
				],
        	],
		);

		//Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'eagle' ),
				'selector' => '{{WRAPPER}} .eth-google-map',
			]

		);

		$this->end_controls_section();

		// New Section [StreetView]
        $this->start_controls_section(
            'streetview_style',
            [
                'label' => __( 'Street View', 'eagle' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]

        );

		// Street View
		$this->add_responsive_control(
			'streetview',
			[
				'label' => __( 'StreetView Button', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'eagle' ),
				'label_off' => __( 'Hide', 'eagle' ),
				'return_value'	=> 'none',
				'default'	=> 'Show',
				'selectors' => [
					'{{WRAPPER}} .toggle-streetview' => 'display: {{VALUE}}',

				],
			]

		);

		// StreetView Color
		$this->add_control(
			'streetview_color', [
				'label' => __( 'Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .toggle-streetview' => 'background-color: {{VALUE}};',
				],
			]
		);

		// StreetView Icon Color
		$this->add_control(
			'streetview_icon_color', [
				'label' => __( 'Icon Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eth-google-map .toggle-streetview i' => 'color: {{VALUE}}; ',
				],
			]
		);

		// StreetView Position Vertical
		$this->add_responsive_control(
			'streetview_position_vertical',
			[
				'label' => esc_html__( 'Button Position Vertical', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' =>  ['px', '%'],
				'range' => [

					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],

					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],

				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-streetview' => 'top: {{SIZE}}{{UNIT}};',
				],

			]
		);

		//StreetView Position Horizontal
		$this->add_responsive_control(
			'streetview_position_horizontal',
			[
				'label' => esc_html__( 'Button Position Horizontal', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' =>  ['px', '%'],
				'range' => [

					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],

					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],

				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-streetview' => 'left: {{SIZE}}{{UNIT}};',
				],


			]
		);

		$this->end_controls_section();
	}


	/* Render */
	protected function render() {
		$settings = $this->get_settings_for_display();
	 	$eagle_token = wp_generate_password(5, false, false);

		//  If no Google Map API Key don't render
		 if ( empty( himara_get_option('google_map_api_key') ) ) {

			return;

		 }

    ?>

		<script>
		jQuery(document).ready(function ($) {
			 jQuery(function($) {



// GOOGLE MAP
    // =============================================
    function initialize() {
      var map;
      var panorama;
      var var_latitude = <?php echo $settings[ 'latitude' ] ?>; // Google Map Latitude
      var var_longitude = <?php echo $settings[ 'longitude' ] ?>; // Google Map Longitude
      var pin = '<?php echo $settings['pin']['url']?>';

      //Map pin-window details
      var hotel_desc = '<?php echo $settings[ 'description' ] ?>';
      var title = '<?php echo get_bloginfo('name') ?>';


      var hotel_location = new google.maps.LatLng(var_latitude, var_longitude);
      var mapOptions = {
        center: hotel_location,
        zoom: <?php echo $settings['zoom']['size'] ?>,
        scrollwheel: false,
        streetViewControl: false,
        styles: [{
          "featureType": "administrative",
          "elementType": "labels.text.fill",
          "stylers": [{
            "color": "#444444"
          }]
        }, {
          "featureType": "landscape",
          "elementType": "all",
          "stylers": [{
            "color": "#f5f5f5"
          }]
        }, {
          "featureType": "poi",
          "elementType": "all",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "road",
          "elementType": "all",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 45
          }]
        }, {
          "featureType": "road.highway",
          "elementType": "all",
          "stylers": [{
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.arterial",
          "elementType": "labels.icon",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "transit",
          "elementType": "all",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "water",
          "elementType": "all",
          "stylers": [{
            "color": "#1dc1f8"
          }, {
            "visibility": "on"
          }]
        }]
      };

      map = new google.maps.Map(document.getElementById('map-canvas-<?php echo $eagle_token ?>'), mapOptions);

      var contentString =
        '<div id="infowindow_content">' + hotel_desc + '</div>';

      var var_infowindow = new google.maps.InfoWindow({
        content: contentString
      });
      var marker = new google.maps.Marker({
        position: hotel_location,
        map: map,
        icon: pin,
        title: title,
        maxWidth: 500,
        optimized: false,
      });
      google.maps.event.addListener(marker, 'click', function() {
        var_infowindow.open(map, marker);
      });
      panorama = map.getStreetView();
      panorama.setPosition(hotel_location);
      panorama.setPov( /** @type {google.maps.StreetViewPov} */ ({
        heading: 265,
        pitch: 0
      }));
	  <?php if( $settings['streetview'] == true) : ?>
      var openStreet = document.getElementById('openStreetView');
      if (openStreet) {
        document.getElementById("openStreetView").onclick = function() {
          toggleStreetView()
        };
      }

      function toggleStreetView() {
        var toggle = panorama.getVisible();
        if (toggle == false) {
          panorama.setVisible(true);
        } else {
          panorama.setVisible(false);
        }
      }
	  <?php endif ?>
    }
		//Check if google map exist
		if ($("#map-canvas-<?php echo $eagle_token ?>").length) {

			// google.maps.event.addDomListener(window, 'load', initialize());
			addEventListener("load", initialize, false);

		}

		});

		});

		</script>

		<div class="eth-google-map">
			<div id="map-canvas-<?php echo $eagle_token ?>" class="inner-map"></div>
			<div class="toggle-streetview" id="openStreetView">
				<i class="fa fa-street-view" aria-hidden="true"></i>
			</div>
		</div>
<?php
	}

}
