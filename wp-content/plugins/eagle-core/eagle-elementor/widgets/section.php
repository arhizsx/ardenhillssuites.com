<?php



// Update background control and add Parallax Option
add_action( 'elementor/element/section/section_background/before_section_end', function( $control_stack, $args ) {

	// Get existing control
	$control = \Elementor\Plugin::instance()->controls_manager->get_control_from_stack( $control_stack->get_unique_name(), 'background_attachment' );

	// Add new option
	$control['options']['parallax'] = __( 'Parallax' );

	// Update the control
	$control_stack->update_control( 'background_attachment', $control );

    // Parallax Speed
    $control_stack->add_control(
        'parallax_speed', [
            'label' => __( 'Parallax Speed', 'eagle' ),
            'description' => __( 'Note: The Parallax Live Preview is not working.', 'eagle' ),


            'type' => \Elementor\Controls_Manager::SLIDER,

            'default' => [

                'size' => .5,
            ],



            'range' => [
                'px' => [
                    'max' => 1,
                    'step' => 0.01,
                ],
            ],

            'label_block' => true,
            'conditions' => [
                'terms' => [
                    [
                        'name' => 'background_attachment',
                        'operator' => 'in',
                        'value' => [
                            'parallax',
                        ],
                    ],
                ],
            ],
        ]
    );


}, 10, 2 );


 // Override Section Render
 function eth_change_section_content( $widget_content, $element ) {

    // add_filter('elementor/frontend/section/should_render', function( $widget_content, $widget ) {

        // $content = ob_get_clean();


    //	if ( 'heading' === $widget->get_name() ) {


        $settings = $element->get_settings();


        //  echo var_dump($settings);


		if( $settings['background_attachment'] === 'parallax' ) {

			// $element->add_render_attribute( 'testimonial_content', 'class', $settings['background_attachment'], true );

            // echo "hello";

            // echo var_dump( $settings['parallax_speed'] );

            $element->add_render_attribute( '_wrapper', 'class', 'elementor-eth-parallax' );

            $element->add_render_attribute( '_wrapper', 'data-src', $settings['background_image']['url'] );

            $element->add_render_attribute( '_wrapper', 'data-parallax', 'scroll' );

            $element->add_render_attribute( '_wrapper', 'data-speed', $settings['parallax_speed']['size'] );

            $element->add_render_attribute( '_wrapper', 'data-z-index', '0' );

            $element->add_render_attribute( '_wrapper', 'style', 'background-color: transparent; background-image: unset; ' );





            // $element->add_render_attribute(
            //     '_wrapper',
            //     'class', [
            //         'elementor-section',
            //         'elementor-eth-parallax',
            //     ]
            // );

		}


		// $settings = $widget->get_settings();

		// if ( $settings['background_attachment'] === 'parallax' ) {

        //    $widget_content = "This is an parallax section";

		// }





	//}

	return $widget_content;

}


add_filter('elementor/frontend/section/should_render', 'eth_change_section_content', 10, 2 );