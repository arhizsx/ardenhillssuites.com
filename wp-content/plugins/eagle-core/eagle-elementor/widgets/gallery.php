<?php
namespace ElementorEagleThemes\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
* Elementor Gallery
* Author: Eagle Themes
* Since: 1.0.0
---------------------------------------------------------------------------*/
class EAGLE_GALLERY extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_gallery';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Gallery', 'eagle' );
	}

	/* Retrieve the list of categories the widget belongs to.*/
	public function get_categories() {
		return [ 'eaglethemes' ];
	}

	/*Retrieve the list of scripts the widget depended on. */
	public function get_script_depends() {
		return [ 'core-js', 'core-css' ];
	}

	/* Register the widget controls. */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Data', 'eagle' ),
			]
		);

		// Items to Display
		$this->add_control(
			'items',
			[
				'label' => __( 'Items', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '10',
			]
		);

		// Order By
		$this->add_control(
			'order_by',
			[
				'label' => __( 'Order By', 'plugin-domain' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'none'  => __( 'None', 'eagle' ),
					'ID'  => __( 'ID', 'eagle' ),
					'title'  => __( 'Title', 'eagle' ),
					'date'  => __( 'Date', 'eagle' ),
					'rand'  => __( 'Random', 'eagle' ),
					'menu_order'  => __( 'Menu Order', 'eagle' ),
				],
			]
		);

			// Order
			$this->add_control(
				'order',
				[
					'label' => __( 'Order', 'plugin-domain' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'ASC',
					'options' => [
						'ASC'  => __( 'ASC', 'eagle' ),
						'DESC'  => __( 'DESC', 'eagle' ),
					],
				]
			);

			// Offset
			$this->add_control(
				'offset',
				[
					'label' => __( 'Offset', 'eagle' ),
					'type' => Controls_Manager::NUMBER,
					'default' => '',
				]
			);

		$this->end_controls_section();


	// New Section [Layout]
	$this->start_controls_section(
		'layout_section',
		[
			'label' => __( 'Layout', 'eagle' ),
			'tab' => Controls_Manager::TAB_CONTENT,
		]
	);

	// Style
	$this->add_control(
		'style',
		[
			'label' => __( 'Style', 'eagle' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'grid',
			'options' => [
				'grid'  => __( 'Grid', 'eagle' ),
				'carousel'  => __( 'Carousel', 'eagle' ),
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

	// Filters
	$this->add_control(
		'filters',
		[
			'label' => __( 'Filters', 'eagle' ),
			'type' => Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'eagle' ),
			'label_off' => __( 'Hide', 'eagle' ),
			'return_value' => 'true',
			'conditions' => [
				'terms' => [
					[
						'name' => 'style',
						'operator' => 'in',
						'value' => [
							'grid',
						],
					],
				],
			],
		]
	);

	$this->add_control(
		'counter',
		[
			'label' => __( 'Counter', 'eagle' ),
			'type' => Controls_Manager::SWITCHER,
			'label_on' => __( 'True', 'eagle' ),
			'label_off' => __( 'False', 'eagle' ),
			'return_value' => 'true',

			'condition' => [
				'filters' => 'true',
			],
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

	$this->add_control(
		'title',
		[
			'label' => __( 'Title', 'eagle' ),
			'type' => Controls_Manager::SWITCHER,
			'label_on' => __( 'True', 'eagle' ),
			'label_off' => __( 'False', 'eagle' ),
			'return_value' => 'true',
		]
	);


	$this->add_control(
		'lightbox',
		[
			'label' => __( 'Lightbox', 'eagle' ),
			'description' => __( 'Note: Make sure to disable Elementor Lightbox first.', 'eagle' ),
			'description' => esc_html__( 'Note: Make sure to disable Elementor Lightbox first.', 'eagle' ) . sprintf( ' <a href="%1$s" target="_blank">%2$s</a>', 'https://elementor.com/help/lightbox/', __( 'Learn more.', 'elementor' ) ),
			'type' => Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'eagle' ),
			'label_off' => __( 'Hide', 'eagle' ),
			'return_value' => 'true',
		]
	);

	$this->end_controls_section();

	// New Section [Filters on Style Tab]
	$this->start_controls_section(
		'filters_section',
		[
			'label' => __( 'Filters', 'eagle' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_control(
		'filter_color', [
			'label' => __( 'Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .gallery-filters a' => 'color: {{VALUE}}'
			],
		]
	);

	$this->add_control(
		'filter_active_color', [
			'label' => __( 'Active & Hover Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .gallery-filters a.active' => 'color: {{VALUE}}',
				'{{WRAPPER}} .gallery-filters a:hover' => 'color: {{VALUE}}',
			],
		]
	);

	// Title Typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'label' => __( 'Typography', 'eagle' ),
			'name' => 'filter_typography',
			'selector' => '{{WRAPPER}} .gallery-filters a',

		]
	);

	$this->end_controls_section();

	// New Section [Title on Style Tab]
	$this->start_controls_section(
		'title_section',
		[
			'label' => __( 'Title', 'eagle' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_control(
		'title_color', [
			'label' => __( 'Color', 'eagle' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .gallery-item figcaption' => 'color: {{VALUE}}'
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
			'selector' => '{{WRAPPER}} .gallery-item figcaption',

		]
	);

	$this->end_controls_section();

	// New Section [Title on Style Tab]
	$this->start_controls_section(
		'image_section',
		[
			'label' => __( 'Image', 'eagle' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name' => 'background',
			'label' => __( 'Gradient Overlay', 'eagle' ),
			'types' => [ 'gradient' ],
			'selector' => '{{WRAPPER}} .gallery-item figure:after',
		]
	);

	$this->add_responsive_control(
		'border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'eagle' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .gallery-item figure' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

}

/* Render */
protected function render() {

	$settings = $this->get_settings_for_display();

	// Elementor Responsive Bug: Set default columns
	$desktop_cols = !empty( $settings['columns'] ) ? $settings['columns'] : 4;
	$tablet_cols = !empty( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : 3;
	$mobile_cols = !empty( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : 1;

	$eagle_query_args = array(
		'post_type' => 'eagle_gallery',
		'posts_per_page' => $settings['items'],
		'orderby' => $settings['order_by'],
		'order' => $settings['order'],
		'offset' =>  $settings['offset'],
	);

	$eagle_gallery_query = new \WP_Query($eagle_query_args);
	$unique_token = wp_generate_password(5, false, false);

	$class = '';

	?>

	<?php if ( $settings['style'] === 'carousel' ) { ?>

		<script>
		jQuery(document).ready(function ($) {
			jQuery(function($) {

				var owl = $('#gallery-<?php echo esc_attr( $unique_token ) ?>');
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

			$class .= 'row grid row-cols-lg-'. $desktop_cols.' '.'row-cols-md-'.$tablet_cols.' '.'row-cols-sm-'.$mobile_cols;

			}

			if ( $settings['lightbox'] == true ) $class .= ' lightbox-gallery';

		?>

		<?php if ( $settings['style'] === 'grid' && $settings['filters'] == true ) : ?>

			<div class="gallery-filters">
				<a href="#" data-filter="*" class="filter active"><?php echo esc_html__('All', 'eagle') ?> <?php if ( $settings['counter'] == true ) : ?> <span class="filter-count"></span> <?php endif ?></a>
				<?php

					$terms = get_terms('eagle_gallery_category');

					foreach ($terms as $term) {

					?>

					<a href="#" data-filter=".filter-<?php echo esc_attr($term->slug); ?>" class="filter"><?php echo esc_html( $term->name ); ?> <?php if ( $settings['counter'] == true ) : ?> <span class="filter-count"></span> <?php endif ?></a>

				<?php } ?>

			</div>

		<?php endif ?>

		<div id="gallery-<?php echo esc_attr( $unique_token ) ?>" class="eth-gallery <?php echo esc_attr( $class ) ?>">

			<?php

			if ( $eagle_gallery_query->have_posts()): while ($eagle_gallery_query->have_posts()): $eagle_gallery_query->the_post();

				// Defautls
				$eagle_gallery_title = get_the_title();
				$eagle_gallery_img = get_the_post_thumbnail_url();

				// Gallery Grid (Isotope)
				$terms = get_the_terms(get_the_id(), 'eagle_gallery_category');
				$term_slug = array();
				$term_name = array();

				if ( is_array($terms) || is_object($terms) ) {

					foreach ($terms as $term) {
						$term_slug[] = $term->slug;
						$term_name[] = $term->name;

					}
				}

			?>

			<div class="gallery-item isotope-item gallery-item filter-<?php echo join( " ", $term_slug) ?> eth-lined-animation">
				<figure>
					<a href="<?php echo esc_url( $eagle_gallery_img ) ?>" data-title="<?php echo $eagle_gallery_title ?>">

						<img src="<?php echo esc_url( $eagle_gallery_img ) ?>" alt="<?php echo esc_html( $eagle_gallery_title ) ?>">
					</a>
					<?php if ( $settings['title'] ) : ?><figcaption> <a href="<?php echo esc_url( $eagle_gallery_img ) ?>" class="title" data-title="<?php echo $eagle_gallery_title ?>"> <?php echo esc_html( $eagle_gallery_title ) ?> <span></span></a></figcaption> <?php endif ?>
				</figure>
			</div>

		<?php endwhile; endif; ?>

		<?php wp_reset_postdata(); ?>

	</div>

<?php

	}

}
