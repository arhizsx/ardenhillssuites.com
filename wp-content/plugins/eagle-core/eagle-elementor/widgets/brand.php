<?php
namespace ElementorEagleThemes\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
* Elementor Section Title Widget
* @since  1.0.0
---------------------------------------------------------------------------*/
class EAGLE_BRAND extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_brand';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Brand', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-star';
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
			'section_brand',
			[
				'label' => __( 'Brand', 'eagle' ),
			]
		);

		// Logo
		$this->add_control(
			'logo',
			[
				'label' => __( 'Logo', 'eagle' ),
				'label_block' => false,
				'type' => Controls_Manager::MEDIA,
			]
		);

		//Logo Width
		$this->add_control(
			'width',
			[
				'label' => __( 'Offset', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '100',
			]
		);

		// Stars Switch
		$this->add_control(
			'rating_switch',
			[
				'label' => __( 'Rating', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'eagle' ),
				'label_off' => __( 'False', 'eagle' ),
				'return_value' => 'true',
				'default' => 'true',

			]
		);

		//Stars
		$this->add_control(
			'stars',
			[
				'label' => esc_html__( 'Stars', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5,
				'step' => 1,
				'default' => 5,
				'dynamic' => [
					'active' => true,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'rating_switch',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],
			]
		);

    	// Title
		$this->add_control(
		'title',
			[
				'label' => __( 'Title', 'eagle' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'eagle' ),
				'placeholder' => esc_html__( 'Type your title here', 'eagle' ),
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

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
		'section_style',
			[
				'label' => __( 'Style', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Stars Color
		$this->add_control(
		'stars_color',
			[
				'label' => __( 'Stars Color', 'eagle' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .brand-info .inner .stars i:before' => 'color: {{VALUE}}'
				],
			]

		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .brand-info .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .brand-info .inner .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		'title_color',
			[
				'label' => __( 'Title Color', 'eagle' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .brand-info .inner .title' => 'color: {{VALUE}}'
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
				'selector' => '{{WRAPPER}} .brand-info .inner .title',

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
		'text_color',
			[
				'label' => __( 'Text Color', 'eagle' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .brand-info .inner .desc' => 'color: {{VALUE}}'
				],
				'default' => himara_get_option( 'body_text_color' ),
			]

		);

		// Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .brand-info .inner .desc',
			]
		);

		$this->end_controls_section();

		// New Section [Background]
		$this->start_controls_section(
			'background_section',
			[
				'label' => __( 'Background', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Background Color
		$this->add_control(
			'background_color',
				[
					'label' => __( 'Color', 'eagle' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .brand-info .inner .content' => 'background: {{VALUE}};',
						'{{WRAPPER}} .brand-info .inner ' => 'border-color: {{VALUE}};'
					],
				]

			);

		// Background Image
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_image',
				'label' => esc_html__( 'Background', 'eagle' ),
				'types' => [ 'classic', 'video' ],
				'selectors' => [
					'{{WRAPPER}} .brand-info' => 'background-image: url({{VALUE}});',
				],
			]
		);

		$this->end_controls_section();

	}

		//Rating Render
		protected function render_stars( ) {

			$settings = $this->get_settings_for_display();
			$rating = $settings['stars'];
			$stars_html = '';

			for ( $stars = 1; $stars <=  $rating; $stars++ ) {

					$stars_html .= '<i class="fa fa-star"></i>';
			}

			return $stars_html;
		}

		/* Render */
		protected function render() {

			$settings = $this->get_settings_for_display();
			$stars_element = '<div>' . $this->render_stars() . '</div>';

			?>
				<div class="brand-info">
					<div class="inner">
						<div class="content">
							<img src="<?php echo esc_url( $settings['logo']['url'] ) ?>" width="<?php echo esc_html( $settings['width'] ) ?>" alt="<?php echo esc_html( $settings['title'] ) ?>">
							<div class="stars"><?php echo $stars_element ?></div>
							<h5 class="title"> <?php echo esc_html( $settings['title'] ) ?></h5>
							<div class="desc"> <?php echo $settings['description'] ?></div>
						</div>
					</div>
				</div>
			<?php
		}


}
