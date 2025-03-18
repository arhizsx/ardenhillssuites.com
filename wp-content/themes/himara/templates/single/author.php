<?php $himara_author_id = get_post_field( 'post_author', get_the_ID() ); ?>
<?php $himara_author_description = get_the_author_meta( 'description' ); ?>
<?php if( himara_get_option( 'single_post_author' ) && !empty($himara_author_description) ): ?>
<div class="post-author">
  <div class="section-title mt100">
    <h4><?php echo esc_html__('About Author', 'himara') ?></h4>
    <p class="section-subtitle"><?php echo esc_html__('More details about', 'himara') ?> <?php echo get_the_author_meta('nickname') ?></p>
  </div>
  <div class="post-author-box">
  <div class="row">
    <div class="col-md-2 col-sm-2">
      <figure class="author-avatar">
          <a href="<?php echo esc_url( get_author_posts_url($himara_author_id) ) ?>">
              <?php echo get_avatar( get_the_author_meta('ID'), 130); ?>
          </a>
      </figure>
    </div>
    <div class="col-md-10 col-sm-10">
      <div class="details">
          <a href="<?php echo esc_url( get_author_posts_url($himara_author_id) ) ?>">
              <?php echo '<h4 class="author-name">'.get_the_author_meta('display_name').'</h4>'; ?>
          </a>
          <div class="himara-author-desc">
              <?php echo wpautop( get_the_author_meta('description') ); ?>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php endif; ?>
