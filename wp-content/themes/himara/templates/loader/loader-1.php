<div class="loader loader1">
  <div class="loader-inner">
    <div class="loader-logo">
      <?php if (himara_get_option('preloader_image')) : ?>
        <img src="<?php echo esc_url( himara_get_option('preloader_image') ) ?>" alt="<?php echo get_bloginfo() ?>">
      <?php endif ?>
    </div>
  </div>
  <div class="dot"></div>
</div>
