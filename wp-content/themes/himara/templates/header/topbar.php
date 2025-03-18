<?php

$himara_topbar = get_post_meta(get_the_id(), 'himara_mtb_topbar', true);
$himara_topbar_transparent = get_post_meta(get_the_id(), 'himara_mtb_topbar_transparent', true);

if ($himara_topbar_transparent == true) {

  $himara_topabr_class = 'transparent';

} else {

  $himara_topabr_class = '';

}

if ( $himara_topbar == true && himara_get_option('header_layout') === 'horizontal' ) :

?>

  <div class="himara-top-bar topbar <?php echo esc_attr( $himara_topabr_class ) ?>">
    <div class="container">

      <div class="inner">

          <?php if ( himara_get_option('topbar_welcome_mssg') ) : ?>
            <div class="welcome-mssg <?php if ((himara_get_option('topbar_mobile_elements')['topbar_welcome_mssg_mobile']) == '1') echo esc_attr("d-none d-lg-block"); ?>"><?php echo himara_get_option('topbar_welcome_mssg') ?></div>
          <?php endif ?>

          <ul class="top-menu">

            <?php if ( himara_get_option('topbar_phone') ) : ?>
              <li class="<?php if ((himara_get_option('topbar_mobile_elements')['topbar_phone_mobile']) == '1') echo esc_attr("d-none d-lg-block"); ?>"><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html( himara_get_option('topbar_phone_link') ) ?> "> <?php echo esc_html( himara_get_option('topbar_phone') ) ?> </a></li>
            <?php endif ?>

            <?php if ( himara_get_option('topbar_email') ) : ?>
              <li class="email <?php if (( himara_get_option('topbar_mobile_elements')['topbar_email_mobile']) == '1') echo esc_attr("d-none d-lg-block"); ?>"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo esc_html( himara_get_option('topbar_email') ) ?>"><?php echo esc_html( himara_get_option('topbar_email') ) ?></a></li>
            <?php endif ?>

          </ul>

      </div>

    </div>

  </div>

  <?php

endif;