<div class="loader loader3">
  <div class="loader-inner">
    <div class="spin">
      <span></span>
      <?php if (himara_get_option('preloader_image')) : ?>
        <img src="<?php echo esc_url( himara_get_option('preloader_image') ) ?>" alt="<?php echo get_bloginfo() ?>">
      <?php endif ?>
    </div>
  </div>
</div>
