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
class EAGLE_SOCIAL extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_social';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Social Media', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-social-icons';
	}

	/* Retrieve the list of categories the widget belongs to.*/
	public function get_categories() {
		return [ 'eaglethemes' ];
	}

	/*Retrieve the list of scripts the widget depended on. */
	public function get_script_depends() {
		return [ 'core' ];
	}

	/* Register the widget controls. */
	protected function register_controls() {


    $this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'eagle' ),
			]
	);

			$repeater = new \Elementor\Repeater();

            //Icon
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'eagle' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                ]
            );

            //Icon
            $repeater->add_control(
                'social_icon',
                [
                    'label' => esc_html__( 'Social Title ', 'eagle' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
			//Link
			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'eagle' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'eagle' ),
					'default' => [
						'url' => '',
						'is_external' => false,
						'nofollow' => false,
						'custom_attributes' => '',
					],
				]
			);

			$this->add_control(
				'social',
				[
					'label' => __( 'Social Media', 'eagle' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'title' => __( 'Social #1', 'eagle' ),
						],
						[
							'title' => __( 'Social #2', 'eagle' ),
						],
					],
					'title_field' => '{{{ social_icon }}}',
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

        //Border Style
        $this->add_control(
			'border_style',
			[
				'label' => esc_html__( 'Border Style', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => esc_html__( 'Solid', 'eagle' ),
					'dashed' => esc_html__( 'Dashed', 'eagle' ),
					'dotted' => esc_html__( 'Dotted', 'eagle' ),
					'double' => esc_html__( 'Double', 'eagle' ),
					'none' => esc_html__( 'None', 'eagle' ),
				],
                'selectors' => [
					'{{WRAPPER}} .eth-social-media a' => 'border-style: {{VALUE}} ;',
				],
               
			]
		);

		// Margin Right
        $this->add_control(
            'spacing',
                [
                'label' => esc_html__( 'Horizontal Spacing', 'eagle' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eth-social-media a' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eth-social-media a:last-child' => 'margin-right: 0;',
                ],
            ]
        );

        // Border Width
		$this->add_control(
			'border_width', [
				'label' => __( 'Border Width', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eth-social-media a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);

        // Border Radius
		$this->add_control(
			'border_radius', [
				'label' => __( 'Border Radius', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eth-social-media a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);
        
		// Border Color
		$this->add_control(
		'border_color', [
			'label' => __( 'Border Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-social-media a' => 'border-color: {{VALUE}}'
			],
			]
		);

		// Border Color Hover
		$this->add_control(
		'border_color_hover', [
			'label' => __( 'Border Color Hover', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-social-media a:hover' => 'border-color: {{VALUE}}'
			],
			]
		);

		// Background Color
		$this->add_control(
		'background_color', [
			'label' => __( 'Background Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-social-media a' => 'background-color: {{VALUE}}'
			],
			]
		);

		// Background Color Hover
		$this->add_control(
		'background_color_hover', [
			'label' => __( 'Background Color Hover', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-social-media a:hover' => 'background-color: {{VALUE}}'
			],
			]
		);


		$this->end_controls_section();

    	// New Section [Icon]
		$this->start_controls_section(
			'Icon_section',
			[
				'label' => __( 'Icon', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        // Icon Size
        $this->add_control(
			'width',
			[
				'label' => esc_html__( 'Icon Size', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 17,
				],
				'selectors' => [
					'{{WRAPPER}} .eth-social-media a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Color
		$this->add_control(
		'icon_color', [
				'label' => __( 'Icon Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon' => 'color: {{VALUE}}'
				],
			]
		);

		// Icon Color Hover
		$this->add_control(
		'icon_color_hover', [
				'label' => __( 'Icon Color Hover', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon:hover' => 'color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();

	}

	/* Render */
	protected function render() {

		$settings = $this->get_settings_for_display();

	?>

			<div class="eth-social-media">
	<?php

		foreach (  $settings['social'] as $item ) :

			if ( ! empty( $item['link']['url'] ) ) {
				$this->add_link_attributes( 'link', $item['link'] );
	

	?>

			<?php if ( ! empty( $item['link']['url'] ) )  echo '<a ' .$this->get_render_attribute_string( 'link' ).'>' ?> 
																

						<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>

			<?php if ( ! empty( $item['link']['url'] ) ) echo "</a>" ?>

		
	<?php

		$this->remove_render_attribute( 'link' );
		}
		endforeach ?>
			</div>


    <?php

	}

}
