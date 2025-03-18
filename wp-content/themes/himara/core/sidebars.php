<?php

/* --------------------------------------------------------------------------
 * Register Sidebars
 * @since  1.0.0
 ---------------------------------------------------------------------------*/
add_action( 'widgets_init', 'himara_register_sidebars' );

if ( !function_exists( 'himara_register_sidebars' ) ) :
	function himara_register_sidebars() {

        /* --------------------------------------------------------------------------
        * Default Sidebar
        * @since  1.0.0
        ---------------------------------------------------------------------------*/
        register_sidebar(
            array(
                'id' => 'himara_default_sidebar',
                'name' => esc_html__( 'Default Sidebar', 'himara' ),
                'description' => esc_html__( 'This is default sidebar', 'himara' ),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            )
        );

        /* --------------------------------------------------------------------------
        * Footer #1
        * @since  1.0.0
        ---------------------------------------------------------------------------*/
        register_sidebar(
            array(
                'id' => 'himara_footer_sidebar_1',
                'name' => esc_html__( 'Footer # 1', 'himara' ),
                'description' => esc_html__( 'This is footer left column', 'himara' ),
                'before_widget' => '<div id="%1$s" class="clearfix widget footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );


        /* --------------------------------------------------------------------------
        * Footer #2
        * @since  1.0.0
        ---------------------------------------------------------------------------*/
        register_sidebar(
            array(
                'id' => 'himara_footer_sidebar_2',
                'name' => esc_html__( 'Footer # 2', 'himara' ),
                'description' => esc_html__( 'This footer center column', 'himara' ),
                'before_widget' => '<div id="%1$s" class="clearfix widget footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );

        /* --------------------------------------------------------------------------
        * Footer #3
        * @since  1.0.0
        ---------------------------------------------------------------------------*/
        register_sidebar(
            array(
                'id' => 'himara_footer_sidebar_3',
                'name' => esc_html__( 'Footer # 3', 'himara' ),
                'class'         => 'nav-list',
                'description' => esc_html__( 'This footer right column', 'himara' ),
                'before_widget' => '<div id="%1$s" class="clearfix widget footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );

        /* --------------------------------------------------------------------------
        * Footer #4
        * @since  1.0.0
        ---------------------------------------------------------------------------*/
        register_sidebar(
            array(
                'id' => 'himara_footer_sidebar_4',
                'name' => esc_html__( 'Footer # 4', 'himara' ),
                'description' => esc_html__( 'This footer right column', 'himara' ),
                'before_widget' => '<div id="%1$s" class="clearfix widget footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );

    }

endif;
