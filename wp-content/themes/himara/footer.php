<?php
$footer_facebook_link = himara_get_option('footer_facebook_link');
$footer_twitter_link = himara_get_option('footer_twitter_link');
$footer_googleplus_link = himara_get_option('footer_googleplus_link');
$footer_youtube_link = himara_get_option('footer_youtube_link');
$footer_instagram_link = himara_get_option('footer_instagram_link');
$footer_pinterest_link = himara_get_option('footer_pinterest_link');
$footer_linkedin_link = himara_get_option('footer_linkedin_link');
?>

<?php if ( himara_get_option('footer') !== 'disabled' ) : ?>

<footer>

  <?php if ( is_active_sidebar( 'himara_footer_sidebar_1' ) || is_active_sidebar( 'himara_footer_sidebar_2' ) || is_active_sidebar( 'himara_footer_sidebar_3' ) || is_active_sidebar( 'himara_footer_sidebar_4' ) ) : ?>

    <div class="footer-widgets">
        <div class="container">
            <div class="row">
              <?php

                $footer_layout = himara_get_option('footer_layout');

                if ( !empty( $footer_layout ) ) {

                  $layout = explode( "_", himara_get_option('footer_layout') );
                  $columns = $layout[0];
                  $col_lg = $layout[1];
                  $col_md = $columns > 1 ? 6 : 12;

                } else {

                  $columns = 4;
                  $col_lg = 3;
                  $col_md = 3;

                }
              ?>
              <?php for($i = 1; $i <= $columns; $i++) : ?>
                <div class="col-lg-<?php echo esc_attr($col_lg); ?> col-md-<?php echo esc_attr($col_md); ?> col-sm-12">
                  <?php if( is_active_sidebar( 'himara_footer_sidebar_'.$i ) ) : ?>
                  <?php dynamic_sidebar( 'himara_footer_sidebar_'.$i );?>
                  <?php endif; ?>
                </div>
              <?php endfor; ?>

            </div>
        </div>
    </div>

    <?php endif ?>

    <?php if ( himara_get_option('credit_cards') == true || ( himara_get_option('footer_language_switcher')['wpml'] == true || himara_get_option('footer_language_switcher')['polylang'] == true ) )  : ?>

    <div class="footer-info">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">

          <?php if ( himara_get_option('credit_cards') ) : ?>
              <div class="payment-methods">
                <strong><?php echo __('We accept', 'himara') ?></strong>
                <div class="payment-methods-icons">
                  <span><i class="fa-brands fa-cc-paypal"></i></span>
                  <span><i class="fa-brands fa-cc-mastercard"></i></span>
                  <span><i class="fa-brands fa-cc-visa"></i></span>
                  <span><i class="fa-brands fa-cc-amex"></i></span>
                </div>
              </div>
            <?php endif ?>

          </div>

          <div class="col-md-6">

          <?php if ( !empty( himara_get_option('footer_language_switcher') ) ) : ?>

          <?php if ( himara_get_option('footer_language_switcher')['wpml'] == true   ||  himara_get_option('footer_language_switcher')['polylang'] == true  ) : ?>

            <div class="languages">

              <strong><?php echo __('Language', 'himara') ?></strong>
              <div class="footer-language-switcher">

                  <!-- Polylang -->
                  <?php if (function_exists('pll_the_languages') && himara_get_option('footer_language_switcher')['polylang'] == true ) : ?>

                    <span class="selected-language">
                        <i class="las la-globe"></i>
                        <?php echo esc_html( pll_current_language( 'name' ) ) ?>
                    </span>

                    <div class="language-switcher">
                      <div class="language-switcher-title">
                        <?php echo esc_html__( 'Languages', 'himara' ) ?>
                      </div>
                      <div class="lang-items">
                        <?php pll_the_languages( array('show_flags'=>0, 'hide_current'=> 0 ));?>
                      </div>
                    </div>

                  <?php endif ?>

                  <!-- WPML -->
                  <?php if ( function_exists('wpml_loaded') && himara_get_option('footer_language_switcher')['wpml'] == true ) :

                    $languages = icl_get_languages('skip_missing=0&orderby=code');


                    if( !empty( $languages ) ) :

                      $active_lang_flag_url = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];

                    ?>

                    <span class="selected-language">

                      <span class="image-cropper"><img src="<?php echo esc_url( $active_lang_flag_url ) ?>" alt=" <?php echo esc_html( ICL_LANGUAGE_NAME ) ?> "></span>

                      <?php if ( defined( 'ICL_LANGUAGE_NAME' ) ) { echo esc_html( ICL_LANGUAGE_NAME );} ?>

                    </span>

                    <div class="language-switcher">

                      <div class="lang-items">
                          <?php

                            foreach( $languages as $language ) :

                              $flag_url = $language['country_flag_url'];

                              if( $language['active'] ) {

                                $class = "active";

                              } else {

                                $class = "";

                              }

                          ?>
                          <div class="lang-item <?php echo esc_attr( $class ) ?>">
                            <a href="<?php echo esc_url( $language['url'] ) ?>">
                              <img src="<?php echo esc_url( $flag_url ) ?>" alt="<?php echo esc_html( ICL_LANGUAGE_NAME ) ?>">
                              <?php echo icl_disp_language( $language['native_name'] ) ?>
                            </a>
                          </div>
                          <?php endforeach ?>
                      </div>
                    </div>

                  <?php endif ?>
                  <?php endif ?>

              </div>

            </div>

          <?php endif ?>
          <?php endif ?>

          </div>


        </div>

      </div>

    </div>

    <?php endif ?>

    <div class="subfooter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-first order-last order-md-last">
                    <div class="copyrights">

                    <?php if( !empty(himara_get_option('footer_copyright') )) { ?>

                    <?php echo wp_kses_post( himara_get_option('footer_copyright') )?>

                    <?php } else { ?>

                    &copy; <?php echo date('Y') . ' ' . esc_html( get_bloginfo('name') ). '.'; ?>
                    <?php $eagle_themes_url = 'https://eagle-themes.com/' ?>
                    <?php echo wp_kses_post('Crafted with ❤ by <a href="'. esc_url($eagle_themes_url, 'zane') .'" target="_blank">Eagle-Themes</a>', 'himara') ?>

                    <?php } ?>

                    </div>
                </div>
                <div class="col-lg-6">

                  <?php

                    // Check if the menu has been assigned
                    if ( has_nav_menu( 'himara_subfooter_menu' ) ) {

                      wp_nav_menu(array ('theme_location' => 'himara_subfooter_menu', 'echo' => true, 'menu_class' => 'himara-subfooter-menu', 'depth' => 1 ));

                    }

                  ?>

                </div>
            </div>
        </div>
      </div>

</footer>

<?php endif ?>

</div>

<!-- Back to top -->
<?php if ( himara_get_option('back_to_top') ) : ?>
  <div class="back-to-top <?php echo esc_attr( himara_get_option( 'back_to_top_side' ) )?><?php if ( himara_get_option('back_to_top_mobile') == false ) echo esc_attr(" d-none d-sm-block "); ?> ">
      <i class="ion-ios-arrow-up"></i>
  </div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
