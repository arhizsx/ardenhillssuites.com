<?php if ( has_post_thumbnail() ) : ?>
<figure class="post-thumbnail">
    <img src="<?php echo the_post_thumbnail_url('himara_image_size_1170_650') ?>" class="img-responsive" alt="<?php echo the_title_attribute() ?>">
</figure>
<?php endif ?>

<div class="post-header<?php if( !has_post_thumbnail() ) : ?> no-thumbnail<?php endif ?> ">

  <h1 class="post-title"><?php echo get_the_title() ?></h1>

  <div class="post-meta">

      <?php
      $post_author = get_the_author_meta('display_name');
      $post_author_id = get_the_author_meta('ID');
      $post_author_gravatar = get_avatar_url($post_author_id, array('size' => 14));
      ?>

      <span class="author"><i class="icon-user"></i><?php echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ).'">'.get_the_author_meta( 'display_name', $post_author_id ).'</a>' ?></span>
      <span class="date"><i class="icon-clock"></i><a href="<?php echo esc_url( get_permalink() ) ?>"><?php echo get_the_date() ?></a></span>

      <?php
        if ( comments_open() || get_comments_number() ) {
          $ccount = (int) get_comments_number();
          $rep	= esc_html('comments', 'himara');
          if($ccount === 1) $rep	= esc_html('comment', 'himara');
          ?>
          <span class="comment"><i class="icon-bubble"></i><a href="<?php echo esc_url( get_permalink()).'#comments' ?>"><?php echo esc_html($ccount .' '. $rep) ?></a></span>
      <?php } ?>

      <?php $cats = get_the_category_list( ', ' ); ?>
      <?php if (!empty($cats)) : ?>
      <span class="category"><i class="icon-folder-alt"></i><?php echo wp_kses_post($cats) ?></span>
      <?php endif ?>
  </div>
</div>
