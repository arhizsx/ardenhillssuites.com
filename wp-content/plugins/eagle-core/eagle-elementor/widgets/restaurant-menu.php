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
class EAGLE_RESTAURNAT_MENU extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_restaurant_menu';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Restaurant Menu', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-menu-bar';
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

			// Title
			$repeater->add_control(
				'title', [
					'label' => __( 'Title', 'eagle' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Service Title' , 'eagle' ),
					'label_block' => true,
				]
			);

     		 // Price
			$repeater->add_control(
				'price', [
					'label' => __( 'Price', 'eagle' ),
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
					'name' => 'menu_image_size',
					'exclude' => [],
					'include' => [],
					'default' => 'thumbnail',
				]
			);



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
				'menu',
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

				'desktop_default' => '2',
				'tablet_default' => '2',
				'mobile_default' => '1',
			]
	);


	$this->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name' => 'background',
			'label' => esc_html__( 'Background', 'eagle' ),
			'types' => [ 'classic', 'gradient', 'video' ],
			'selector' => '{{WRAPPER}} .restaurant-menu-item .inner',
		]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'border',
			'label' => esc_html__( 'Border', 'eagle' ),
			'selector' => '{{WRAPPER}} .restaurant-menu-item .inner',
		]
	);



	$this->add_responsive_control(
		'border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'eagle' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .restaurant-menu-item .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);


	$this->add_responsive_control(
		'img_border_radius',
		[
			'label' => esc_html__( 'Image Border Radius', 'eagle' ),
			'type' => Controls_Manager::DIMENSIONS,
			'allowed_dimensions' => ['top', 'left'],
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .restaurant-menu-item .inner figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	// Info Padding
	$this->add_responsive_control(
		'info_padding',
		[
			'label' => esc_html__( 'Info Spacing', 'eagle' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .restaurant-menu-item .inner .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	// Vertical Spacing
	$this->add_control(
		'menu_vertical_spacing',
		[
			'label' => esc_html__( 'Menu Veritcal Spacing', 'eagle' ),
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
				'size' => 30,
			],
			'selectors' => [
				'{{WRAPPER}} .eth-restaurant-menu' => 'column-gap: {{SIZE}}{{UNIT}}',
			],
		]
	);

	// Horizontal Spacing
	$this->add_control(
		'menu_horizontal_spacing',
		[
			'label' => esc_html__( 'Menu Horizontal Spacing', 'eagle' ),
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
				'size' => 30,
			],
			'selectors' => [
				'{{WRAPPER}} .eth-restaurant-menu' => 'row-gap: {{SIZE}}{{UNIT}}',
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
				'{{WRAPPER}} .restaurant-menu-item .title' => 'color: {{VALUE}}'
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

    	// New Section [Price]
		$this->start_controls_section(
			'price_section',
			[
				'label' => __( 'Price', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Price Typography', 'eagle' ),
				'name' => 'menu_price_typography',
				'selector' => '{{WRAPPER}} .restaurant-menu-item .price',

			]
		);

		// Price Color
		$this->add_control(
			'price_color', [
				'label' => __( 'Price Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurant-menu-item .price' => 'color: {{VALUE}}'
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
		'description_color', [
			'label' => __( 'Description Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .restaurant-menu-item .content' => 'color: {{VALUE}}'
			],
			'default' => himara_get_option( 'body_text_color' ),
		]
		);

		// Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Description Typography', 'eagle' ),
				'name' => 'menu_desc_typography',
				'selector' => '{{WRAPPER}} .restaurant-menu-item .content',

			]
		);


		$this->end_controls_section();

	}

	/* Render */
	protected function render() {

		$settings = $this->get_settings_for_display();

		// Elementor Responsive Bug: Set default columns
        $desktop_cols = !empty( $settings['columns'] ) ? $settings['columns'] : 2;
        $tablet_cols = !empty( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : 2;
        $mobile_cols = !empty( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : 1;
    ?>

    <div class="<?php echo esc_attr( 'eb-g-lg-'.$desktop_cols.' '.'eb-g-md-'.$tablet_cols.' '.'eb-g-sm-'.$mobile_cols ) ?> eth-restaurant-menu">

	<?php

	foreach (  $settings['menu'] as $item ) :

		if ( ! empty( $item['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $item['link'] );
		}

	?>

		<div class="restaurant-menu-item">

			<?php if ( ! empty( $item['link']['url'] ) ) echo '<a ' .$this->get_render_attribute_string( 'link' ).'>' ?>

				<div class="inner">

					<figure>
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'image_size', 'image' ) ?>
					</figure>

					<div class="info">
						<div class="meta">
							<span class="title"><?php echo esc_html( $item['title'] ) ?></span>
							<span class="price"><?php echo esc_html( $item['price'] ) ?></span>
						</div>
						<p class="content"><?php echo esc_html( $item['description'] ) ?></p>
					</div>

				</div>

			<?php if ( ! empty( $item['link']['url'] ) ) echo '</a>' ?>

		</div>

	 <?php

	 $this->remove_render_attribute( 'link' );

	 endforeach ?>

	</div>

<?php

	}

}
