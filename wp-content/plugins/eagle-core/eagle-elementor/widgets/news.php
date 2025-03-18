<?php
namespace ElementorEagleThemes\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* --------------------------------------------------------------------------
* Elementor News Widget
* Author: Eagle Themes
* Since: 1.0.0
---------------------------------------------------------------------------*/
class EAGLE_NEWS extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_news';
	}

	/*  Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle News', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-document-file';
	}

	/* Retrieve the list of categories the widget belongs to. */
	public function get_categories() {
		return [ 'eaglethemes' ];
	}

	/* Retrieve the list of scripts the widget depended on. */
	public function get_script_depends() {
		return [ 'elementor-themes' ];
	}

	/* Register the widget controls. */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Settings', 'eagle' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'eagle' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1'  => __( 'Style 1', 'eagle' ),
					'style-2'  => __( 'Style 2', 'eagle' ),
					'style-3'  => __( 'Style 3', 'eagle' ),
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => __( 'Order By', 'eagle' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'date'  => __( 'Date', 'eagle' ),
					'id'  => __( 'ID', 'eagle' ),
					'author'  => __( 'Author', 'eagle' ),
					'title'  => __( 'Title', 'eagle' ),
					'name'  => __( 'Title', 'eagle' ),
					'rand'  => __( 'Random', 'eagle' ),
				],
				'default' => 'date',
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'eagle' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'asc'  => __( 'Ascending', 'eagle' ),
					'desc'  => __( 'Descending', 'eagle' ),
				],
				'default' => 'asc',
			]
		);

		$this->add_control(
			'items',
			[
				'label' => __( 'Items to Display', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
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



				'desktop_default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
			]
		);


		$this->add_control(
			'offset',
			[
				'label' => __( 'Offset', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
			]
		);

		$this->add_control(
			'meta',
			[
				'label' => __( 'Meta', 'eagle' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eagle' ),
				'label_off' => esc_html__( 'Hide', 'eagle' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'characters_limit',
			[
				'label' => __( 'Characters Limit', 'eagle' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '100',
			]
		);

  		$this->end_controls_section();


		// New Section [Tab]
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'eagle' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eagle' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-title a' => 'color: {{VALUE}}',
				],
				'default' => himara_get_option( 'heading_color' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'eagle' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .post-title',

			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'meta_section',
			[
				'label' => esc_html__( 'Meta', 'eagle' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => esc_html__( 'Meta Color', 'eagle' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
					'{{WRAPPER}} .post-meta' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-meta a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Meta Typography', 'eagle' ),
				'name' => 'meta_typography',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'eagle' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-content p' => 'color: {{VALUE}}'
				],
				'default' => himara_get_option( 'body_text_color' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Content Typography', 'eagle' ),
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .post-content p'
			]
		);


		$this->end_controls_section();


	}

	/* Render */
	protected function render() {

		// QRY
		$settings = $this->get_settings_for_display();

	    $args = array(
	        'post_type' => 'post',
	        'posts_per_page' => $settings['items'],
	        'orderby' => $settings['order_by'],
	        'order' => $settings['order'],
	        'offset' => $settings['offset']
	    );

      	$news_qry = new \WP_Query($args);

      ?>

	<div class="himara-news <?php echo esc_attr( $settings['style'] ) ?>">

        <div class="row <?php echo esc_attr( 'row-cols-lg-'.$settings['columns'].' '.'row-cols-md-'.$settings['columns_tablet'].' '.'row-cols-sm-'.$settings['columns_mobile'] ) ?>">

	        <?php
	          if ($news_qry->have_posts()): while ($news_qry->have_posts()): $news_qry->the_post();

	                $eagle_news_title = get_the_title();
	                $eagle_news_url = get_permalink();
	                $eagle_news_thumbnail_url = get_the_post_thumbnail_url();
					$post_author = get_the_author_meta('display_name');
					$post_author_id = get_the_author_meta('ID');
					$post_author_gravatar = get_avatar_url($post_author_id, array('size' => 14));

	           ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('post-item post-grid-item');?>>

						<figure class="post-thumbnail">
							<a href="<?php echo esc_url( $eagle_news_url ) ?>">
								<img src="<?php echo esc_url( $eagle_news_thumbnail_url ) ?>" class="img-fluid" alt="<?php echo esc_html( $eagle_news_title ) ?>">
							</a>
						</figure>

						<div class="post-details ">

							<h2 class="post-title">
								<a href="<?php echo esc_url( $eagle_news_url ) ?>"><?php echo esc_html( $eagle_news_title ) ?></a>
							</h2>


							<?php if ( $settings['meta'] === 'yes' ) : ?>
								<div class="post-meta">

									<?php echo __('By', 'eagle') ?> <?php echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ).'">'.get_the_author_meta( 'display_name', $post_author_id ).'</a>,' ?>
									<?php echo __('on', 'eagle') ?> <?php echo strtolower( get_the_date() ) ?>, </span>

									<?php $cats = get_the_category( ', ' ); ?>

									<?php if ( !empty($cats)) : ?>

										in <?php echo wp_kses_post( strtolower( $cats[0] ) ) ?> category

									<?php endif ?>

								</div>
							<?php endif ?>

							<div class="post-content">
								<?php echo himara_get_excerpt( $settings['characters_limit'] ); ?>
							</div>

						</div>


					</article>

	          <?php endwhile; endif; ?>
	          <?php wp_reset_postdata(); ?>

		</div>

	</div>


	<?php

	}

	/* Live Render */
	protected function content_template() {

		return false;

	}
}
