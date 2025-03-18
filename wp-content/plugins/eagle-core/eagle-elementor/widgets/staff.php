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
class EAGLE_STAFF extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_staff';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __('Eagle Staff', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-person';
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

			// Staff Name
			$repeater->add_control(
				'name', [
					'label' => __( 'Name', 'eagle' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Staff Name' , 'eagle' ),
					'label_block' => true,
				]
			);

     		 // Staff Role
			$repeater->add_control(
				'role', [
					'label' => __( 'Role', 'eagle' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				]
			);

			// Desc
			$repeater->add_control(
				'description',
				[
					'label' => __( 'Description', 'eagle' ),
					'type' => Controls_Manager::TEXTAREA,
					'rows' => 10,
					'default' => __( 'Default description', 'eagle' ),
					'placeholder' => __( 'Type your description here', 'eagle' ),
				]
			);

			// Image
			$repeater->add_control(
				'image',
				[
					'label' => __( 'Image', 'eagle' ),
					'label_block' => false,
					'type' => Controls_Manager::MEDIA,
				]
      		);


			$repeater->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'image_size',
					'exclude' => [],
					'include' => [],
					'default' => 'thumbnail',
				]
			);

		$this->add_control(
			'staff',
			[
				'label' => __( 'Items', 'eagle' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Title #1', 'eagle' ),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'eagle' ),
					],
					[
						'title' => esc_html__( 'Title #2', 'eagle' ),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'eagle' ),
					],
					[
						'title' => esc_html__( 'Title #3', 'eagle' ),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'eagle' ),
					],
					[
						'title' => esc_html__( 'Title #4', 'eagle' ),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'eagle' ),
					],
				],
				'title' => '{{{ title }}}',
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

		$this->add_control(
			'style',
			[
				'label' => esc_html__( 'Layout', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid'  => esc_html__( 'Grid', 'eagle' ),
					'carousel' => esc_html__( 'Carousel', 'eagle' ),
				],
			]
		);

		$this->add_responsive_control(
				'columns',
				[
					'label' => __( 'Columns', 'eagle' ),
					'type' => Controls_Manager::SELECT,
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'options' => [
						'1'  => '1',
						'2'  => '2',
						'3'  => '3',
						'4'  => '4',
						'5'  => '5',
						'6'  => '6'
					],

					'desktop_default' => '4',
					'tablet_default' => '3',
					'mobile_default' => '1',
				]
		);

		// Loop (Carousel)
		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'eagle' ),
				'label_off' => __( 'False', 'eagle' ),
				'return_value' => 'true',
				'conditions' => [
					'terms' => [
						[
							'name' => 'style',
							'operator' => 'in',
							'value' => [
								'carousel',
							],
						],
					],
				],
			]
		);

		// Navigation (Carousel)
		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'eagle' ),
				'label_off' => __( 'False', 'eagle' ),
				'return_value' => 'true',
				'conditions' => [
					'terms' => [
						[
							'name' => 'style',
							'operator' => 'in',
							'value' => [
								'carousel',
							],
						],
					],
				],
			]
		);

		// Vertical Spacing
        $this->add_control(
            'vertical_spacing',
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
                    '{{WRAPPER}} .eth-staff' => 'row-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

		// New Section [Image]
		$this->start_controls_section(
			'Image_section',
			[
				'label' => __( 'Image', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Mouse Over Overlay Switch
		$this->add_control(
			'overlay',
			[
				'label' => __( 'Hover Overlay', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'eagle' ),
				'label_off' => __( 'False', 'eagle' ),
				'return_value' => 'true',

			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Gradient Overlay', 'eagle' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .staff-item figure:before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'overlay',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],
			]
		);

		//Border Radius Image
		$this->add_responsive_control(
			'border_img_radius',
			[
				'label' => esc_html__( 'Border Radius', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .staff-item figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);

		$this->end_controls_section();

		// New Section [Role]
		$this->start_controls_section(
			'role_section',
			[
				'label' => __( 'Role', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Role Color
		$this->add_control(
			'role_color', [
				'label' => __( 'Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .staff-item .position' => 'color: {{VALUE}}'
				],
			]
		);

		// Role Background Color
		$this->add_control(
			'role_bg_color', [
				'label' => __( 'Background Color ', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .staff-item .position' => 'background: {{VALUE}}'
				],
			]
		);

		//Role Position Top
		$this->add_control(
			'role_position_top',
			[
				'label' => esc_html__( 'Position Top', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .staff-item .position' => 'top: {{SIZE}}{{UNIT}};',
				],

			]
		);

		//Role Position Left
		$this->add_control(
			'role_position_left',
			[
				'label' => esc_html__( 'Position Left', 'eagle' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .staff-item .position' => 'left: {{SIZE}}{{UNIT}};',
				],

			]
		);

		// Role Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'role_typography',
				'selector' => '{{WRAPPER}} .staff-item .position',

			]
		);

		//Role Border Radius
		$this->add_responsive_control(
			'role_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'eagle' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .staff-item .position' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'label' => __( 'Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .details h5' => 'color: {{VALUE}}'
			],
			'default' => himara_get_option( 'heading_color' ),
		]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .details h5',
			]
		);

		// Color Description
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'color',
				'label' => esc_html__( 'Background', 'eagle' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .staff-item .details',
			]
		);

		//Border Description
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'eagle' ),
				'selector' => '{{WRAPPER}} .staff-item .details',
				'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '0',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => false,
                        ],
                    ],
                    'color' => [
                        'default' => '#efefef',
                    ],
                ],
			]
		);

		//Border Radius Description
		$this->add_responsive_control(
			'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'eagle' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .staff-item .details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		// New Section [Description]
		$this->start_controls_section(
			'description_section',
			[
				'label' => __( 'Description', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Description Color
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .details p' => 'color: {{VALUE}}'
				],
				'default' => himara_get_option( 'body_text_color' ),
			]
		);

		//Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .details p',

			]
		);

		$this->end_controls_section();

	}

	/* Render */
	protected function render() {

		$settings = $this->get_settings_for_display();

		// Elementor Responsive Bug: Set default columns
        $desktop_cols = !empty( $settings['columns'] ) ? $settings['columns'] : 4;
        $tablet_cols = !empty( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : 3;
        $mobile_cols = !empty( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : 1;

		?>
	<?php
		$class = '';
		$eb_unique_token = wp_generate_password(5, false, false);

		if ( $settings['style'] === 'carousel' ) {  ?>
				<script>
					jQuery(document).ready(function ($) {
						jQuery(function($) {

							var owl = $('#staff-<?php echo esc_attr( $eb_unique_token ) ?>');

							owl.owlCarousel({
								loop: <?php echo $settings['loop'] ? 'true' : 'false'  ?>,
								margin: 30,
								nav: <?php echo $settings['navigation'] ? 'true' : 'false'  ?>,
								dots: false,
								navText: [
									"<i class='ion-ios-arrow-back'></i>",
									"<i class='ion-ios-arrow-forward'></i>"
								],
								responsive: {

									0: {
										items: <?php echo $mobile_cols ?>
									},

									768: {
										items: <?php echo $tablet_cols ?>
									},

									992: {
										items: <?php echo $desktop_cols ?>
									}

								}
							});
						});
					});
				</script>
				<?php
					$class .= 'owl-carousel';
				} else {
					$class .= 'eth-staff row row-cols-lg-'.$desktop_cols.' '.'row-cols-md-'.$tablet_cols.' '.'row-cols-sm-'.$mobile_cols;
				}
		?>

		<div id="staff-<?php echo esc_attr( $eb_unique_token ) ?>" class="<?php echo esc_attr($class)?>">

			<?php

			foreach (  $settings['staff'] as $item ) :

			?>

				<div class="staff-item">

					<figure>
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'image_size', 'image' ) ?>
						<span class="position"><?php echo esc_html( $item['role'] ) ?></span>
					</figure>

					<div class="details">
						<h5><?php echo esc_html( $item['name'] ) ?></h5>
						<p><?php echo esc_html( $item['description'] ) ?></p>
					</div>

				</div>


	 		<?php

	 		endforeach ?>

		</div>

	<?php

	}

}
