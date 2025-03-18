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
class EAGLE_SERVICES extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_services';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Services', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-settings';
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

			// Description
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

			// Icon
			$repeater->add_control(
				'icon',
				[
						'label' => __( 'Icon', 'eagle' ),
						'label_block' => false,
						'type' => Controls_Manager::MEDIA,
					]
			);

			// Active Icon
			$repeater->add_control(
				'active_icon',
				[
						'label' => __( 'Active Icon', 'eagle' ),
						'label_block' => false,
						'type' => Controls_Manager::MEDIA,
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
				'services',
				[
					'label' => __( 'Slides', 'eagle' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'title' => __( 'Slide #1', 'eagle' ),
						],
						[
							'title' => __( 'Slide #2', 'eagle' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

			// Autoplay
			$this->add_control(
				'autoplay',
					[
						'label' => __( 'Autoplay', 'eagle' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'On', 'eagle' ),
						'label_off' => __( 'Off', 'eagle' ),
						'return_value' => true,
						'default' => true,
					]
				);


		$this->end_controls_section();


    	// Style Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Style
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'eagle' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal'  => __( 'Normal', 'eagle' ),
					'on_image'  => __( 'On Image', 'eagle' ),
				],
			]
		);

		// Image Border Radius
		$this->add_control(
			'border_radius_services',
				[
						'label' => __( 'Services Border Radius', 'eagle' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
						'{{WRAPPER}} .owl-thumb-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
					],
				]

			);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'label' => __( 'Box Shadow', 'eagle' ),
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}}  .owl-thumb-item'
			]
		);

		// Items Spacing
        $this->add_control(
			'spacing',
			[
				'label' => esc_html__( 'Services Spacing', 'eagle' ),
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
					'{{WRAPPER}} .owl-thumb-item' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .owl-thumb-item:last-child' => 'margin-bottom: 0',
				],
			]
		);

		$this->end_controls_section();

		// Section Title
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Title Alignment
		$this->add_control(
			'title_align',
			[
				'label' => esc_html__( 'Alignment', 'eagle' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'eagle' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'eagle' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'eagle' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
                    '{{WRAPPER}} .owl-thumb-item .details h5' => 'text-align: {{VALUE}};',
                ],
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .owl-thumb-item .details h5'

			]
		);

		// Title Color
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-thumb-item .details h5' => 'color: {{VALUE}}',
				],
				'default' => himara_get_option( 'heading_color' ),
			]
		);


		// Title Color Active
		$this->add_control(
			'title_color_active',
			[
				'label' => __( 'Color Active', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-thumb-item.active .details h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .services-v2 .owl-thumb-item.active .details h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		// Section Description
		$this->start_controls_section(
			'section_desc',
			[
				'label' => __( 'Description', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Title Alignment
		$this->add_control(
			'desc_align',
			[
				'label' => esc_html__( 'Alignment', 'eagle' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'eagle' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'eagle' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'eagle' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
                    '{{WRAPPER}} .owl-thumb-item .details p' => 'text-align: {{VALUE}};',
                ],
			]
		);

		// Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography', 'eagle' ),
				'name' => 'desc_typography',
				'selectors' => [
					'{{WRAPPER}} .services .owl-thumb-item.active .details p',
					'{{WRAPPER}} .services .owl-thumb-item .details p',
					'{{WRAPPER}} .services-v2 .owl-thumb-item.active .details p',
					'{{WRAPPER}} .services-v2 .owl-thumb-item .details p',
				],



			]
		);

		// Description Color
		$this->add_control(
		'desc_color',
			[
				'label' => __( 'Color', 'eagle' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-thumb-item .details p' => 'color: {{VALUE}}',
				],
				'default' => himara_get_option( 'body_text_color' ),
			]

		);

		// Description Color Active
		$this->add_control(
		'desc_color_active',
			[
				'label' => __( 'Color Active', 'eagle' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-thumb-item.active .details p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .services-v2 .owl-thumb-item.active .details p' => 'color: {{VALUE}}',
				],
			]

		);

		$this->end_controls_section();


		// Section Background
		$this->start_controls_section(
			'section_background',
			[
				'label' => __( 'Background', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Background Color
		$this->add_control(
			'background',
				[
					'label' => __( 'Color', 'eagle' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-thumb-item ' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .services-v2 .owl-thumb-item ' => 'background-color: {{VALUE}}',
					],
				]

			);

			// Background Color Active
			$this->add_control(
			'background_active',
				[
					'label' => __( 'Color Active', 'eagle' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-thumb-item.active ' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .services-v2 .owl-thumb-item.active ' => 'background-color: {{VALUE}}',
					],
				]

			);

			// Background Border Color
			$this->add_control(
			'background_border',
				[
					'label' => __( 'Border Color ', 'eagle' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-thumb-item' => 'border-color: {{VALUE}}',
						'{{WRAPPER}} .services-v2 .owl-thumb-item' => 'border-color: {{VALUE}}',
					],
				]

			);

			// Background Border Color Active
			$this->add_control(
			'background_border_active',
				[
					'label' => __( 'Border Color Active', 'eagle' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-thumb-item.active' => 'border-color: {{VALUE}}',
						'{{WRAPPER}} .services-v2 .owl-thumb-item.active' => 'border-color: {{VALUE}}',
					],
				]

			);

		$this->end_controls_section();

		// Section Image
		$this->start_controls_section(
			'section_img',
			[
				'label' => __( 'Image', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Image Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'eagle' ),
				'name' => 'img_title_typography',
				'selector' => '{{WRAPPER}} .gradient-overlay h4'

			]
		);

		// Image Title Color
		$this->add_control(
			'img_title_color',
			[
				'label' => __( 'Title Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gradient-overlay h4' => 'color: {{VALUE}}',
				],
			]
		);

		// Image Border Radius
		$this->add_control(
		'img_border_radius',
			[
					'label' => __( 'Border Radius', 'eagle' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-stage-outer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]

		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'img_background_overlay',
				'label' => __( 'Gradient Overlay', 'eagle' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .gradient-overlay:after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label' => __( 'Title Gradient Overlay', 'eagle' ),
				'name' => 'img_title_background',
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .services figcaption',
				'selector' => '{{WRAPPER}} .services-v2 figcaption',
			]
		);

		$this->end_controls_section();
	}

	/* Render */
	protected function render() {
		$settings = $this->get_settings_for_display();
	  $eagle_token = wp_generate_password(5, false, false);
    ?>

		<script>
		jQuery(document).ready(function ($) {
			 jQuery(function($) {
			  // =============================================
				// SERVICES - OWL CAROUSEL
				// =============================================
				var owl = $('#services-<?php echo esc_html( $eagle_token ) ?>');
				owl.owlCarousel({
					thumbs: true,
					thumbsPrerendered: true,
					items: 1,
					animateOut: 'fadeOut',
					animateIn: 'fadeIn',
					loop: true,
					autoplay: <?php echo $settings['autoplay'] ? 'true' : 'false'?>,
					dots: false,
					nav: false,
					mouseDrag: false,
				});

			 });
		});
		</script>


		<?php if ($settings['style'] === 'normal') : ?>

		<div class="services services-<?php echo esc_attr( $eagle_token ) ?>">
			<div class="row">
				<div class="col-lg-7 col-12">
					<div id="services-<?php echo esc_html( $eagle_token ) ?>" data-slider-id="services-<?php echo esc_html( $eagle_token ) ?>" class="owl-carousel">
					<?php	if ( $settings['services'] ) : ?>
						<?php	foreach (  $settings['services'] as $item ) : ?>
							<!-- ITEM -->
							<?php

								if ( ! empty( $item['link']['url'] ) ) {
									$this->add_link_attributes( 'link', $item['link'] );
								}

								if ( ! empty( $item['link']['url'] ) ) echo '<a ' .$this->get_render_attribute_string( 'link' ).'>'

							?>
							<figure class="gradient-overlay">
								<img src="<?php echo esc_url( $item['image']['url'] ) ?>" class="img-fluid" alt="<?php echo esc_attr( $item['image']['alt'] ) ?>" >
								<figcaption>
									<h4><?php echo esc_html( $item['title'] ) ?></h4>
								</figcaption>
							</figure>
							<?php if ( ! empty( $item['link']['url'] ) ) echo '</a>'?>
						<?php endforeach ?>
					<?php endif ?>

					</div>
				</div>
				<div class="col-lg-5 col-12">
					<div class="owl-thumbs" data-slider-id="services-<?php echo esc_html( $eagle_token ) ?>">
						<?php	if ( $settings['services'] ) : ?>
							<?php	foreach (  $settings['services'] as $item ) :


								if ( !empty( $item['active_icon']['url'] ) ) {

									$active_icon_url = $item['active_icon']['url'];

								} else {

									$active_icon_url = $item['icon']['url'];

								}

								if ( !empty( $item['active_icon']['alt'] ) ) {

									$active_icon_alt = $item['active_icon']['alt'];

								} else {

									$active_icon_alt = $item['icon']['alt'];

								}

							?>

							<div class="owl-thumb-item">
								<span class="icon">
									<img src="<?php echo esc_url($item['icon']['url']) ?>" alt="<?php echo esc_attr( $item['icon']['alt'] ) ?>" class="icon-normal">
									<img src="<?php echo esc_url( $active_icon_url ) ?>" alt="<?php echo esc_attr( $active_icon_alt ) ?>" class="icon-active">
								</span>
								<div class="details">
									<h5><?php echo esc_html( $item['title'] ) ?></h5>
									<p><?php echo esc_html( $item['description'] ) ?></p>
								</div>
							</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
			</div>
    </div>


	<?php else : ?>

		<div class="services-v2 services-<?php echo esc_attr( $eagle_token ) ?>">
			<!-- MAIN IMAGE -->
			<div id="services-<?php echo esc_html( $eagle_token ) ?>" data-slider-id="services-<?php echo esc_html( $eagle_token ) ?>" class="main-image services-v2-owl owl-carousel">
				<?php	if ( $settings['services'] ) : ?>
					<?php	foreach (  $settings['services'] as $item ) : ?>
						<!-- ITEM -->
						<figure class="gradient-overlay">
							<img src="<?php echo esc_url( $item['image']['url'] ) ?>" class="img-fluid" alt="<?php echo esc_attr( $item['image']['alt'] ) ?>">
							<figcaption>
								<h4><?php echo esc_html( $item['title'] ) ?></h4>
							</figcaption>
						</figure>
					<?php endforeach ?>
				<?php endif ?>
			</div>
			<!-- THUMBS -->
			<div class="owl-thumbs" data-slider-id="services-<?php echo esc_html( $eagle_token ) ?>">
				<?php	if ( $settings['services'] ) : ?>
					<?php	foreach (  $settings['services'] as $item ) :

						if ( !empty( $item['active_icon']['url'] ) ) {

							$active_icon_url = $item['active_icon']['url'];

						} else {

							$active_icon_url = $item['icon']['url'];

						}

						if ( !empty( $active_icon_alt ) ) {

							$active_icon_url = $item['active_icon']['alt'];

						} else {

							$active_icon_alt = $item['icon']['alt'];

						}

					?>
					<!-- THUMBNAIL -->
					<div class="owl-thumb-item">
						<div class="inner">
							<span class="icon">
								<img src="<?php echo esc_url($item['icon']['url']) ?>" alt="<?php echo esc_attr( $item['icon']['alt'] ) ?>" class="icon-normal">
								<img src="<?php echo esc_url( $active_icon_url ) ?>" alt="<?php echo esc_attr( $active_icon_alt ) ?>" class="icon-active">
							</span>
							<div class="details">
								<h5><?php echo esc_html( $item['title'] ) ?></h5>
								<p><?php echo esc_html( $item['description'] ) ?></p>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>

	<?php endif ?>


<?php
}

}
