<?php

/*-----------------------------------------------------------
VARIABLES - THEME OPTIONS
-----------------------------------------------------------*/
$himara_main_font = himara_get_font_option( 'himara_main_font' );
$himara_nav_font = himara_get_font_option( 'himara_nav_font' );
$himara_h_font = himara_get_font_option( 'himara_h_font' );
$himara_menu_color = himara_get_option('menu_color');
$himara_sub_menu_color = himara_get_option('sub_menu_color');
$himara_submenu_menu_bg = himara_get_option('sub_menu_bg');
$himara_submenu_menu_hover_bg = himara_get_option('sub_menu_hover_bg');
$himara_submenu_menu_border = himara_get_option('sub_menu_border');
$himara_boxed_bg_color = himara_get_option('himara_boxed_bg_color');
$himara_boxed_bg_image = himara_get_option('himara_boxed_bg_image');
$himara_footer_link_color = himara_get_option( 'footer_links_color' )

?>

:root {
  --text-color: #6d7991;
  --heading-color: #32353c;
  --main-color: <?php echo esc_attr( himara_get_option('primary_color')['regular'] ) ?>;
  --main-color-hover: <?php echo esc_attr( himara_get_option('primary_color')['hover'] ) ?>;
  --button-color: #32353c;
  --menu-color: <?php echo esc_attr( $himara_menu_color['regular'] ) ?>;
  --menu-color-hover: <?php echo esc_attr( $himara_menu_color['hover'] ) ?>;
  --menu-color-active: <?php echo esc_attr( $himara_menu_color['active'] ) ?>;
  --sub-menu-color: <?php echo esc_attr( $himara_sub_menu_color['regular'] ) ?>;
  --sub-menu-color-hover: <?php echo esc_attr( $himara_sub_menu_color['hover'] ) ?>;
  --sub-menu-color-active: <?php echo esc_attr( $himara_sub_menu_color['hover'] ) ?>;
}

body{
  <?php if ( himara_get_option('himara_main_font') ) : ?>
  font-family: <?php echo wp_kses_post($himara_main_font['font-family']); ?>;
  <?php endif; ?>
}

h1,
h2,
h3,
h4,
h5,
h6,
.widget_search .wp-block-search__label {
  <?php if ( himara_get_option('himara_h_font') ) : ?>
  font-family: <?php echo wp_kses_post($himara_h_font['font-family']); ?> ;
  <?php endif; ?>
}

.loader {
  <?php if ( himara_get_option('preloader_bg_color') ) : ?>
  background: <?php echo wp_kses_post( himara_get_option('preloader_bg_color') ); ?> ;
  <?php endif; ?>
}

.loader1 .dot,
.loader2 .loader-inner span {
  <?php if ( himara_get_option('preloader_color') ) : ?>
  background: <?php echo wp_kses_post( himara_get_option('preloader_color') ); ?> ;
  <?php endif; ?>
}

.loader3 .spin span {
  <?php if ( himara_get_option('preloader_color') ) : ?>
    border-left-color: <?php echo wp_kses_post( himara_get_option('preloader_color') ); ?> ;
  <?php endif; ?>
}

.topbar {
  <?php if ( himara_get_option('topbar_bg') ) : ?>
  background: <?php echo esc_attr( himara_get_option('topbar_bg') ); ?> ;
  <?php endif; ?>
  <?php if ( himara_get_option('topbar_border') ) : ?>
  border: 1px solid <?php echo esc_attr( himara_get_option('topbar_border') ); ?> ;
  <?php endif; ?>
  <?php if ( himara_get_option('topbar_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('topbar_color')['regular'] ); ?> ;
  <?php endif; ?>
}

.topbar .top-menu li a {
  <?php if ( himara_get_option('topbar_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('topbar_color')['regular'] ); ?> ;
  <?php endif; ?>
}

.topbar .top-menu li i {
  <?php if ( himara_get_option('topbar_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('topbar_color')['regular'] ); ?> ;
  <?php endif; ?>
}

.topbar .top-menu li a:hover {
  <?php if ( himara_get_option('topbar_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('topbar_color')['hover'] ); ?> ;
  <?php endif; ?>
}

.topbar .top-menu li a:active {
  <?php if ( himara_get_option('topbar_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('topbar_color')['active'] ); ?> ;
  <?php endif; ?>
}

header.horizontal-header,
header.vertical-header,
.himara-vertical-header header {
  <?php if ( himara_get_option('himara_nav_font') ) : ?>
  font-family: <?php echo wp_kses_post($himara_nav_font['font-family']); ?>;
  <?php endif; ?>

  <?php if ( himara_get_option('header_bg') ) : ?>
  background: <?php echo esc_attr( himara_get_option('header_bg') ); ?> ;
  <?php endif; ?>
}

header.header-fixed-top.scroll-header {
  <?php if ( himara_get_option('header_bg') ) : ?>
  background: <?php echo esc_attr( himara_get_option('header_bg') ); ?> ;
  <?php endif; ?>
  <?php if ( himara_get_option('header_border_bottom') ) : ?>
  border-color: <?php echo esc_attr( himara_get_option('header_border_bottom') ) ?>;
  <?php endif; ?>
}

header.vertical-header {
  <?php if ( himara_get_option('header_border_vertical') ) : ?>
  border-color: <?php echo esc_attr( himara_get_option('header_border_vertical') ) ?>;
  <?php endif; ?>
}

header.horizontal-header .main-menu .menu .dropdown .submenu,
header.vertical-header .main-menu .dropdown .submenu {
  <?php if ( !empty( $himara_submenu_menu_bg ) ) : ?>
  background: <?php echo esc_attr( $himara_submenu_menu_bg ) ?>;
  <?php endif ?>
}

header.horizontal-header .main-menu .menu .dropdown.open .submenu .menu-item,
header.vertical-header .main-menu .menu .dropdown.open .submenu .menu-item {
  <?php if ( !empty( himara_get_option('sub_menu_border') )) : ?>
  border-color: <?php echo esc_attr( himara_get_option('sub_menu_border') ) ?>;
  <?php endif ?>
}

header.horizontal-header .main-menu .menu .dropdown.open .submenu .menu-item a:hover,
header.vertical-header .main-menu .menu .dropdown.open .submenu .menu-item a:hover {
  <?php if ( himara_get_option('sub_menu_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('sub_menu_color')['hover'] ); ?> ;
  <?php endif; ?>
}

header.horizontal-header .main-menu .menu .dropdown.open .submenu .menu-item a:active,
header.horizontal-header .main-menu .menu .dropdown.open .submenu .menu-item.open > a,
header.vertical-header .main-menu .menu .dropdown.open .submenu .menu-item a:active,
header.vertical-header .main-menu .menu .dropdown.open .submenu .menu-item.open > a  {
  <?php if ( himara_get_option('sub_menu_color') ) : ?>
  color: <?php echo esc_attr( himara_get_option('sub_menu_color')['active'] ); ?> ;
  <?php endif; ?>
}

header.horizontal-header .main-menu .menu .dropdown.open .submenu .menu-item:hover,
header.vertical-header .main-menu .menu .dropdown.open .submenu .menu-item:hover {
  <?php if ( !empty( $himara_submenu_menu_hover_bg )) : ?>
  background: <?php echo esc_attr( $himara_submenu_menu_hover_bg ) ?>;
  <?php endif ?>
}

header.horizontal-header .main-menu .menu .dropdown .submenu:after {
  <?php if ( !empty( $himara_submenu_menu_bg ) ) : ?>
  border-bottom-color: <?php echo esc_attr( $himara_submenu_menu_bg ) ?>;
  <?php endif ?>
}

header.vertical-header .main-menu .menu .dropdown .submenu:after {
  <?php if ( !empty( $himara_submenu_menu_bg ) ) : ?>
  border-right-color: <?php echo esc_attr( $himara_submenu_menu_bg ) ?>;
  <?php endif ?>
}


.toggle-menu-button .line {
  <?php if(!empty( himara_get_option('menu_toggle_button_color') )) : ?>
  background: <?php echo esc_attr( himara_get_option('menu_toggle_button_color') ) ?>;
  <?php endif ?>
}

.transparent-header .toggle-menu-button .line {
  <?php if(!empty( himara_get_option('menu_toggle_button_color_transparent') )) : ?>
  background: <?php echo esc_attr( himara_get_option('menu_toggle_button_color_transparent') ) ?>;
  <?php endif ?>
}

.scroll-header .toggle-menu-button .line {
  <?php if(!empty( himara_get_option('menu_toggle_button_color_scroll') )) : ?>
  background: <?php echo esc_attr( himara_get_option('menu_toggle_button_color_scroll') ) ?>;
  <?php endif ?>
}

.page-title .inner,
.eb-page-header {
  <?php if ( himara_get_option('page_header_padding_top') ) : ?>
  padding-top:  <?php echo esc_attr( himara_get_option('page_header_padding_top') ) ?>px;
  padding-bottom:  <?php echo esc_attr( himara_get_option('page_header_padding_bottom') ) ?>px;
  <?php endif ?>
}

.page-title .inner {
  <?php if ( !empty( himara_get_option('page_header_aligment') ) ) : ?>
  text-align: <?php echo esc_attr( himara_get_option('page_header_aligment') ) ?>;
  <?php endif ?>
}

.page-title .breadcrumb {
  <?php if ( !empty( himara_get_option('page_header_aligment') ) ) : ?>
  justify-content: <?php echo esc_attr( himara_get_option('page_header_aligment') ) ?>;
  <?php endif ?>
}

.page-title .inner h1,
.eb-page-header .title h1,
.page-title .breadcrumb,
.page-title .breadcrumb a,
.page-title .breadcrumb li:last-child,
.page-title .breadcrumb li:after,
.eb-page-header.eb-room-header .room-price,
.eb-page-header.eb-room-header .normal-price {
  <?php if ( !empty( himara_get_option('page_header_color') ) ) : ?>
  color:  <?php echo esc_attr( himara_get_option('page_header_color') ) ?>
  <?php endif ?>
}

.page-title,
.eb-page-header {
  <?php if ( !empty( himara_get_option('page_header_color_bg') ) ) : ?>
  background:  <?php echo esc_attr( himara_get_option('page_header_color_bg') ) ?>;
  border-bottom: 1px solid <?php echo esc_attr( himara_get_option('page_header_border_color') ) ?>;
  border-top: 1px solid <?php echo esc_attr( himara_get_option('page_header_border_color') ) ?>
  <?php endif ?>
}

footer {
  <?php if ( !empty( himara_get_option('footer_bg_color') ) ) : ?>
  background: <?php echo esc_attr( himara_get_option('footer_bg_color') ) ?>;
  border-top: 1px solid <?php echo esc_attr( himara_get_option('footer_border_color') ) ?>;
  <?php endif ?>
}

footer .footer-widgets .widget-title,
footer .footer-widgets h2 {
  <?php if( !empty( himara_get_option('footer_heading_color') )) : ?>
  color:  <?php echo esc_attr( himara_get_option('footer_heading_color') ) ?>;
  <?php endif ?>
}

footer .footer-widgets,
footer .footer-info,
footer .social-media a  {
  <?php if ( !empty( himara_get_option('footer_text_color') ) ) : ?>
  color:  <?php echo esc_attr( himara_get_option('footer_text_color') ) ?>;
  <?php endif ?>
}

footer .footer-widgets ul li a  {
  <?php if(!empty( $himara_footer_link_color['regular'] )) : ?>
	color: <?php echo esc_html( $himara_footer_link_color['regular'] ) ?>;
  <?php endif ?>
}

footer .footer-widgets ul li:hover a,
footer .footer-widgets ul li a:hover  {
  <?php if(!empty( $himara_footer_link_color['hover'] )) : ?>
	color: <?php echo esc_html( $himara_footer_link_color['hover'] ) ?>;
  <?php endif ?>
}

.footer-widgets ul li a:active  {
  <?php if(!empty( $himara_footer_link_color['active'] )) : ?>
	color: <?php echo esc_html( $himara_footer_link_color['active'] ) ?>;
  <?php endif ?>
}

footer .footer-info .payment-methods .payment-methods-icons span {
  <?php if ( !empty( himara_get_option('footer_text_color') ) ) : ?>
  color:  <?php echo esc_attr( himara_get_option('footer_text_color') ) ?>;
  <?php endif ?>
}

footer .subfooter {
  <?php if ( !empty( himara_get_option('footer_border_color') ) ) : ?>
  border-top: 1px solid <?php echo esc_attr( himara_get_option('footer_border_color') ) ?>;
  <?php endif ?>
}

footer .subfooter .copyrights,
footer .subfooter .copyrights a,
footer .himara-subfooter-menu a,
footer .subfooter .himara-subfooter-menu li a {
  <?php if ( !empty( himara_get_option('footer_copyright_text_color') ) ) : ?>
  color:  <?php echo esc_attr( himara_get_option('footer_copyright_text_color') ) ?>;
  <?php endif ?>
}

footer .footer-widgets ul li a:after {
  <?php if(!empty( himara_get_option('footer_underline_color') )) : ?>
	background: <?php echo esc_html( himara_get_option('footer_underline_color') ) ?>;
  <?php endif ?>
}

footer .subfooter .himara-subfooter-menu li:after {
  <?php if ( !empty( himara_get_option('footer_copyright_text_color') ) ) : ?>
  background:  <?php echo esc_attr( himara_get_option('footer_copyright_text_color') ) ?>;
  <?php endif ?>
}

.back-to-top {
  <?php if(!empty( himara_get_option('back_to_top_bg_color') )) : ?>
	background: <?php echo esc_html( himara_get_option('back_to_top_bg_color') ) ?>;
  <?php endif ?>
}

.back-to-top i,
.back-to-top:hover i {
  <?php if(!empty( himara_get_option('back_to_top_color') )) : ?>
	color: <?php echo esc_html( himara_get_option('back_to_top_color') ) ?>;
  <?php endif ?>
}

.back-to-top.active {
  <?php if ( !empty(  himara_get_option('back_to_top_bottom') ) ) : ?>
  bottom: <?php echo esc_attr( himara_get_option('back_to_top_bottom') ) ?>px;
  <?php endif ?>
}

.back-to-top.right {
  <?php if ( !empty( himara_get_option('back_to_top_right') ) ) : ?>
  right: <?php echo esc_attr( himara_get_option('back_to_top_right') ) ?>px;
  <?php endif ?>
}

.back-to-top.left {
  <?php if( !empty( himara_get_option('back_to_top_left') ) ) : ?>
  left: <?php echo esc_attr( himara_get_option('back_to_top_left') ) ?>px;
  <?php endif ?>
}

.back-to-top:hover {
  <?php if(!empty( himara_get_option('back_to_top_bg_hover_color') )) : ?>
	background: <?php echo esc_html( himara_get_option('back_to_top_bg_hover_color') ) ?>;
  <?php endif ?>
}
