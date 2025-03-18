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
class EAGLE_VIDEO extends Widget_Base {

	/* Retrieve the widget name. */
	public function get_name() {
		return 'eth_video';
	}

	/* Retrieve the widget title. */
	public function get_title() {
		return __( 'Eagle Video PopUp', 'eagle' );
	}

	/* Retrieve the widget icon. */
	public function get_icon() {
		return 'eicon-video-playlist';
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

    	// URL
		$this->add_control(

			'url',
			[
				'label' => __( 'Video URL', 'eagle' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Video URL', 'eagle' ),
				'show_external' => false,
			]


		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'eagle' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'.mfp-iframe-holder .mfp-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	/* Render */
	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
			<div class="video">
				<div class="container">
					<div class="video-popup">
						<a class="popup-video" href="<?php echo $settings['url']['url']; ?>">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
			</div>

<?php

	}

/* Live Render */
	protected function content_template() {
		?>
				<div class="video">
					<div class="container">
						<div class="video-popup">
							<a class="popup-vimeo" href="{{ settings.video_url.url }}">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
<?php
	}
}
