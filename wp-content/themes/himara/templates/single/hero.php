<div class="blog-post-hero gradient-overlay op5" data-src="<?php echo the_post_thumbnail_url('himara_image_size_1920_800') ?>" data-parallax="scroll" data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">
  <div class="container inner">
    <h2 class="blog-post-title"><?php echo get_the_title() ?></h2>
    <div class="blog-post-info">
      <?php
      $post_author = get_the_author_meta('display_name');
      $post_author_id = get_the_author_meta('ID');
      $post_author_gravatar = get_avatar_url($post_author_id, array('size' => 60));
      ?>
      <img src="<?php echo esc_url( $post_author_gravatar ) ?>"  alt="<?php echo esc_html( $post_author ) ?>" class="author-avatar">
      <p>
        <?php echo esc_html__('by', 'himara') ?>
        <span>
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ) ?>">
            <?php echo get_the_author_meta( 'display_name', $post_author_id ) ?>
          </a>
        </span>
      </p>
      <p>
        <?php echo esc_html__('on', 'himara') ?>
        <span><?php echo get_the_date() ?></span>
      </p>
    </div>
  </div>
</div>
