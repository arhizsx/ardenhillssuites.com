<?php

/**
 * Widget Name:     About Hotel
 * Description:     Widget that adds all info of the hotel.
 * Author:          Eagle-Themes (Jomin Muskaj)
 * Author URI:      http://eagle-themes.com/
 * Version:         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Himara_About_Footer_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'himara_about_footer_widget',
			__( 'Himara About (Footer)', 'eagle' ),
			array(
				'description' => __( 'A widget that displays an about logo, description and contact info', 'eagle' ),
				'classname' => 'about-footer'
			)
		);
	}
	public function widget( $args, $instance ) {
		extract( $args );
		if(empty($instance)){

			$instance = array(
        'image' => '',
        'height' => '30',
        'description' => '',

        'address' => '',
        'phone' => '',
        'email' => '',
        'web' => '',
        'social_media_label' => '',
        'facebook' => '',
        'instagram' => '',
        'twitter' => '',
        'youtube' => '',
        'airbnb' => '',
        'tripadvisor' => '',

        'social_media_new_tab' => ''

        );

		}

		$image = $instance['image'] ?? '' ;
    $height = $instance['height'] ?? '';
		$description = $instance['description'] ?? '';

    $address = $instance['address'] ?? '';
    $phone = $instance['phone'] ?? '';
    $email = $instance['email'] ?? '';
    $web = $instance['web'] ?? '';
    $web = $instance['web'] ?? '';

    $facebook = $instance['facebook'] ?? '';
    $social_media_label = $instance['social_media_label'] ?? '';
    $instagram = $instance['instagram'] ?? '';
    $twitter = $instance['twitter'] ?? '';
    $youtube = $instance['youtube'] ?? '';
    $airbnb = $instance['airbnb'] ?? '';
    $tripadvisor = $instance['tripadvisor'] ?? '';

    $social_media_new_tab = $instance['social_media_new_tab'] ?? '';

		echo wp_kses_post($args['before_widget']);

    if ( $social_media_new_tab == true ) {

      $target = '_blank';

    } else {

      $target = '_self';

    }

    $image_full = wp_get_attachment_image_src( $image, 'full' );
    $title = get_bloginfo( 'name' );

    if ( $image_full != '' ) :

    ?>

    <img src="<?php echo esc_url($image_full[0]); ?>" alt="<?php echo esc_attr($title); ?>" class="footer-logo" <?php if( $height != '' ) : ?>style="height: <?php echo esc_html($height) ?>px" <?php endif ?>>

    <?php endif; ?>

        <div class="inner">

          <p><?php echo wp_kses($description, wp_kses_allowed_html( 'post' )); ?></p>

          <ul class="contact-info">
            <li><?php echo wp_kses( $address, wp_kses_allowed_html( 'post' )); ?></li>
            <li><?php echo wp_kses( $phone, wp_kses_allowed_html( 'post' )); ?></li>
            <li><?php echo wp_kses( $email, wp_kses_allowed_html( 'post' )); ?></li>
            <li><?php echo wp_kses( $web, wp_kses_allowed_html( 'post' )); ?></li>
          </ul>

        </div>

        <?php if ( $facebook != '' || $instagram != '' ||  $twitter != '' || $youtube != '' ||  $airbnb != '' ||  $tripadvisor != '' ) : ?>

        <div><strong><?php echo wp_kses( $social_media_label, wp_kses_allowed_html( 'post' ) ) ?></strong></div>
        <div class="eth-social-media mt10">

            <?php if ( $facebook != '') : ?> <a href="<?php echo esc_url( $facebook ) ?>" class="facebook" target="<?php echo esc_attr( $target ) ?>"><i class="fa-brands fa-facebook-f"></i></a> <?php endif ?>
            <?php if ( $instagram != '' ) : ?> <a href="<?php echo esc_url( $instagram ) ?>" class="instagram" target="<?php echo esc_attr( $target ) ?>"><i class="fa-brands fa-instagram"></i></a> <?php endif ?>
            <?php if ( $twitter != '' ) : ?><a href="<?php echo esc_url( $twitter ) ?>" class="twitter" target="<?php echo esc_attr( $target ) ?>"><i class="fa-brands fa-twitter"></i></a><?php endif ?>
            <?php if ( $youtube != '' ) : ?><a href="<?php echo esc_url( $youtube ) ?>" class="youtube" target="<?php echo esc_attr( $target ) ?>"><i class="fa-brands fa-youtube"></i></a><?php endif ?>
            <?php if ( $airbnb != '' ) : ?><a href="<?php echo esc_url( $airbnb ) ?>" class="airbnb" target="<?php echo esc_attr( $target ) ?>"><i class="fa-brands fa-airbnb"></i></a><?php endif ?>
            <?php if ( $tripadvisor != '' ) : ?><a href="<?php echo esc_url( $tripadvisor ) ?>" class="tripadvisor" target="<?php echo esc_attr( $target ) ?>"><i class="fa fa-tripadvisor"></i></a><?php endif ?>

        </div>

        <?php

        endif;

		echo wp_kses($after_widget, wp_kses_allowed_html( 'post' ));

    }

    public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance['image'] = strip_tags( $new_instance['image'] );
      $instance['height'] = $new_instance['height'];

      $instance['description'] = $new_instance['description'];
      $instance['address'] = $new_instance['address'];
      $instance['phone'] = $new_instance['phone'];
      $instance['email'] = $new_instance['email'];
      $instance['web'] = $new_instance['web'];

      $instance['social_media_label'] = $new_instance['social_media_label'];
      $instance['facebook'] = $new_instance['facebook'];
      $instance['instagram'] = $new_instance['instagram'];
      $instance['twitter'] = $new_instance['twitter'];
      $instance['youtube'] = $new_instance['youtube'];
      $instance['airbnb'] = $new_instance['airbnb'];
      $instance['tripadvisor'] = $new_instance['tripadvisor'];

      $instance['social_media_new_tab'] = $new_instance['social_media_new_tab'];

      return $instance;

    }

    public function form( $instance ) {
      $defaults = array(
        'image' => '',
        'height' => '',
        'description' => '',

        'address' => '',
        'phone' => '',
        'email' => '',
        'web' => '',

        'social_media_label' => '',
        'facebook' => '',
        'instagram' => '',
        'twitter' => '',
        'youtube' => '',
        'airbnb' => '',
        'tripadvisor' => '',

        'social_media_new_tab' => '',

      );

      $instance = wp_parse_args( (array) $instance, $defaults );
      $image_full = wp_get_attachment_image_src($instance['image'], 'full');

    ?>

      <!-- Hotel Info -->
      <h5><?php echo __('Hotel Info', 'eagle') ?></h5>

      <p class="upload-item">

        <label for="<?php echo esc_attr($this->get_field_id('image')) ?>"><?php echo __('Logo', 'eagle') ?></label><br />
        <img class="custom_media_image" src="<?php echo esc_url($image_full[0]) ?>" style="display:block; max-width:100%; height:auto; margin-bottom:8px;" />


        <input type="hidden" class="widefat custom_media_id" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')) ?>" value="<?php echo esc_attr($instance['image']); ?>">

        <input type="button" value="<?php echo __( 'Upload Image', 'eagle' ) ?>" class="button custom_media_upload" id="custom_image_uploader" />
        <input type="button" value="<?php echo __( 'Remove', 'eagle' ) ?>" class="button custom_media_upload_remove" /></p>

      </p>

      <p><label for="<?php echo esc_attr($this->get_field_id( 'height' )) ?>"><?php echo __('Logo Height', 'eagle') ?>:</label>
      <input id="<?php echo esc_attr($this->get_field_id( 'height' )) ?>" name="<?php echo esc_attr($this->get_field_name( 'height' )) ?>" value="<?php echo esc_attr($instance['height']) ?>" style="width:100%;" /></p>

      <p><label for="<?php echo esc_attr($this->get_field_id( 'description' )) ?>"><?php echo __('About', 'eagle') ?></label>

      <textarea id="<?php echo esc_attr($this->get_field_id( 'description' )) ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )) ?>" style="width:100%;" rows="4"><?php echo wp_kses($instance['description'], wp_kses_allowed_html( 'post' )) ?></textarea></p>

      <!-- Contact Info -->
      <h5><?php echo __('Contact Info', 'eagle') ?></h5>

      <p style="width: 100%">
        <label><?php echo __('Address', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'address' )) ?>" value="<?php echo esc_attr($instance['address']) ?>" style="width:100%;" />
      </p>

      <p style="width: 100%">
        <label><?php echo __('Phone', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'phone' )) ?>" value="<?php echo esc_attr($instance['phone']) ?>" style="width:100%;" />
      </p>

      <p style="width: 100%">
        <label><?php echo __('Email', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'email' )) ?>" value="<?php echo esc_attr($instance['email']) ?>" style="width:100%;" />
      </p>

      <p style="width: 100%">
        <label><?php echo __('Web', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'web' )) ?>" value="<?php echo esc_attr($instance['web']) ?>" style="width:100%;" />
      </p>

      <!-- Soacial Media -->
      <h5><?php echo __('Social Media', 'eagle') ?></h5>

      <p>
        <label><?php echo __('Social Media Label', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'social_media_label' )) ?>" value="<?php echo esc_attr($instance['social_media_label']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Facebook URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'facebook' )) ?>" value="<?php echo esc_attr($instance['facebook']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Instagram URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'instagram' )) ?>" value="<?php echo esc_attr($instance['instagram']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Twitter URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'twitter' )) ?>" value="<?php echo esc_attr($instance['twitter']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Youtube URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'youtube' )) ?>" value="<?php echo esc_attr($instance['youtube']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Airbnb URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'airbnb' )) ?>" value="<?php echo esc_attr($instance['airbnb']) ?>" style="width:100%;" />
      </p>

      <p>
        <label><?php echo __('Tripadvisor URL', 'eagle') ?></label>
        <input name="<?php echo esc_attr($this->get_field_name( 'tripadvisor' )) ?>" value="<?php echo esc_attr($instance['tripadvisor']) ?>" style="width:100%;" />
      </p>

      <p>
        <input id="<?php echo esc_attr($this->get_field_name( 'social_media_new_tab' )) ?>" type="checkbox" name="<?php echo esc_attr($this->get_field_name( 'social_media_new_tab' )) ?>">
        <label for="<?php echo esc_attr($this->get_field_name( 'social_media_new_tab' )) ?>"><?php echo __('Open social media links in a new tab', 'eagle') ?></label>
      </p>

<?php
	}
}
