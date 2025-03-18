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
class EAGLE_CONTACT extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_contact_info';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Contact Info', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-info-circle-o';
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

			// Title
			$repeater->add_control(
				'title', [
					'label' => __( 'Title', 'eagle' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Service Title' , 'eagle' ),
					'label_block' => true,
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
				'contact',
				[
					'label' => __( 'Items', 'eagle' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'title' => __( 'Item #1', 'eagle' ),
						],
						[
							'title' => __( 'Item #2', 'eagle' ),
						],
					],
					'title_field' => '{{{ title }}}',
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




		// Border Color
		$this->add_control(
		'border_color', [
			'label' => __( 'Border Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-contact-info ul li' => 'border-color: {{VALUE}}'
			],
			]
		);

		// Seperator Color
		$this->add_control(
		'seperator_color', [
			'label' => __( 'Seperator Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .eth-contact-info ul li i:after' => 'background-color: {{VALUE}}'
			],
			]
		);


		// Margin Bottom
        $this->add_control(
            'spacing',
                [
                'label' => esc_html__( 'Vertical Spacing', 'eagle' ),
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
                    '{{WRAPPER}} .eth-contact-info ul li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eth-contact-info ul li:last-child' => 'margin-bottom: 0;',
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
					'{{WRAPPER}} .eth-contact-info ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);


		$this->end_controls_section();

		// New Section [Title]
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Title Color
		$this->add_control(
		'title_color', [
			'label' => __( 'Title Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}'
			],
			'default' => himara_get_option( 'heading_color' ),
		]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'eagle' ),
				'name' => 'menu_title_typography',
				'selector' => '{{WRAPPER}} .title',

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
			'size',
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
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Color
		$this->add_control(
		'icon_color', [
				'label' => __( 'Icon Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();

	}

	/* Render */
	protected function render() {

		$settings = $this->get_settings_for_display();

	?>
		<div class="eth-contact-info">
			<ul>

	<?php

		foreach (  $settings['contact'] as $item ) :

			if ( ! empty( $item['link']['url'] ) ) {
				$this->add_link_attributes( 'link', $item['link'] );
			}

	?>
		<li>

			<?php if ( ! empty( $item['link']['url'] ) ) echo '<a ' .$this->get_render_attribute_string( 'link' ).'>' ?>

				<span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
				<span class="title"><?php echo esc_html( $item['title'] ) ?></span>

			<?php if ( ! empty( $item['link']['url'] ) ) echo '</a>' ?>

		</li>
	<?php

		$this->remove_render_attribute( 'link' );

		endforeach ?>
			</ul>
		</div>
    <?php

	}

}
