<?php
/*---------------------------------------------------------------------------------
@ Metaboxes
@ Since 1.0.0
-----------------------------------------------------------------------------------*/

add_action('cmb2_admin_init', 'himara_general_meta');

function himara_general_meta() {

    $prefix = 'himara_mtb_';

    $cmb = new_cmb2_box(array(
        'id'            => $prefix.'meta',
        'title'         => esc_html__('Layout', 'himara'),
        //'context'      => 'side',
        'object_types'  => array('page', 'eagle_places', 'eagle_rooms', 'post'),
    ));


			$cmb->add_field( array(
						'name'        => __('Top Bar', 'himara'),
						'id'	  => $prefix.'topbar',
						'type'    => 'switch',
						'default'  => himara_get_option('topbar'),
						'label'    => array(
							'true'=> 'Yes',
							'false'=> 'No'
						),
				));

        $cmb->add_field( array(
              'name'        => __('Transparent Top Bar', 'himara'),
              'id'	  => $prefix.'topbar_transparent',
              'type'    => 'switch',
              'default'    => himara_get_option('topbar_transparent'),
              'label'    => array(
                'true'=> 'Yes',
                'false'=> 'No'
              ),
          ));


			$cmb->add_field( array(
				    'name'        => __('Sticky Header', 'himara'),
				    'id'	  => $prefix.'header_sticky',
					  'type'    => 'switch',
					  'default'    => himara_get_option('header_sticky'),
					  'label'    => array(
							'true'=> 'Yes',
							'false'=> 'No'
						),
			  ));

				$cmb->add_field( array(
							'name'        => __('Transparent Header', 'himara'),
							'id'	  => $prefix.'header_transparent',
							'type'    => 'switch',
							'default'    => himara_get_option('header_transparent'),
							'label'    => array(
								'true'=> 'Yes',
								'false'=> 'No'
							),
				));

        $cmb->add_field( array(
              'name'        => __('Semi Transparent Header', 'himara'),
              'id'	  => $prefix.'header_semi_transparent',
              'type'    => 'switch',
              'default'    => false,
              'label'    => array(
                'true'=> 'Yes',
                'false'=> 'No'
              ),
          ));

				$cmb->add_field( array(
							'name'        => __('Page Title', 'himara'),
							'id'               => $prefix.'title',
							'type'    => 'switch',
							'default'    => true,
							'label'    => array(
								'true'=> 'Yes',
								'false'=> 'No'
							),
					));

          $cmb->add_field( array(
                'name'        => __('Padding Left / Right', 'himara'),
                'id'          => $prefix.'container',
                'type'    => 'switch',
                'default'    => true,
                'label'    => array(
                  'true'=> 'Yes',
                  'false'=> 'No'
                ),
            ));
          $cmb->add_field( array(
                'name'        => __('Padding Top / Bottom', 'himara'),
                'id'          => $prefix.'padding',
                'type'    => 'switch',
                'default'    => true,
                'label'    => array(
                  'true'=> 'Yes',
                  'false'=> 'No'
                ),
            ));

          $cmb->add_field( array(
            'name'             => __( 'Sidebar', 'himara' ),
            'id'               => $prefix.'sidebar',
            'type'             => 'radio_image',
            'default'    => himara_get_option('himara_page_sidebar'),
            'options'          => array(
              'left'    => __('Left', 'himara'),
              'none'  => __('None', 'himara'),
              'right' => __('Right', 'himara'),
              'inherit' => __('Inherit', 'himara'),
            ),
            'images_path'      => get_template_directory_uri(),
            'images'           => array(
              'left'    => 'assets/images/admin/sidebar-left.png',
              'none'  => 'assets/images/admin/sidebar-none.png',
              'right' => 'assets/images/admin/sidebar-right.png',
              'inherit' => 'assets/images/admin/sidebar-inherit.png',
            ),
          ) );

}
