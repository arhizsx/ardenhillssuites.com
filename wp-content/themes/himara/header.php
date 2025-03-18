<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( himara_body_class() ); ?>>

  <?php wp_body_open(); ?>

  <?php if ( himara_get_option('preloader') &&  himara_get_option('preloader_home') == false ) : ?>
    <?php get_template_part('templates/loader/loader-'. himara_get_option('preloader_style') ); ?>
  <?php elseif ( himara_get_option('preloader_home') && is_front_page() ) : ?>
    <?php get_template_part('templates/loader/loader-'. himara_get_option('preloader_style') ); ?>
  <?php endif ?>

  <nav id="mobile-menu"></nav>

  <div class="wrapper">

    <?php get_template_part('templates/header/topbar'); ?>

    <header class="header <?php himara_header_class() ?>" data-menutoggle="991">

      <div class="container">

        <div class="brand">
          <?php himara_get_branding(); ?>
        </div>

        <nav id="main-menu" class="main-menu">
          <?php get_template_part('templates/header/menu'); ?>
        </nav>

        <?php if ( himara_get_option('header_layout') === 'vertical' ) : ?>

          <div class="header-content">

            <?php if ( himara_get_option('vertical_header_content') === 'text' ) : ?>

              <?php echo esc_html( himara_get_option('header_mssg') ) ?>

            <?php else : ?>

              <ul class="header_social_media">

                <?php if ( !empty( himara_get_option('header_facebook_url') ) ) : ?><li><a href="<?php echo esc_url( himara_get_option('header_facebook_url') ) ?>" target="_blank"><?php echo __('Facebook', 'himara') ?></a></li><?php endif ?>
                <?php if ( !empty( himara_get_option('header_instagram_url') ) ) : ?><li><a href="<?php echo esc_url( himara_get_option('header_instagram_url') ) ?>" target="_blank"><?php echo __('Instagram', 'himara') ?></a></li><?php endif ?>
                <?php if ( !empty( himara_get_option('header_booking_com_url') ) ) : ?><li><a href="<?php echo esc_url( himara_get_option('header_booking_com_url') ) ?>" target="_blank"><?php echo __('Booking.com', 'himara') ?></a></li><?php endif ?>
                <?php if ( !empty( himara_get_option('header_airbnb_url') ) ) : ?><li><a href="<?php echo esc_url( himara_get_option('header_airbnb_url') ) ?>" target="_blank"><?php echo __('Airbnb', 'himara') ?></a></li><?php endif ?>
                <?php if ( !empty( himara_get_option('header_pinterest_url') ) ) : ?><li><a href="<?php echo esc_url( himara_get_option('header_pinterest_url') ) ?>" target="_blank"><?php echo __('Pinterest', 'himara') ?></a></li><?php endif ?>

              </ul>

            <?php endif ?>

          </div>

        <?php endif ?>

        <div id="toggle-menu-button" class="toggle-menu-button">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

      </div>

    </header>
