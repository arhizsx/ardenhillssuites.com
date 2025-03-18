<?php if($pagination = get_the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__('Previous', 'himara'), 'next_text' => esc_html__('Next', 'himara')))) : ?>
  <div class="blog-pagination mt100">
    <?php echo wp_kses_post($pagination); ?>
  </div>
<?php endif; ?>
