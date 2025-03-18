<div class="col-lg-12">
  <!-- Article  -->
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-item post-classic-item');?>>
    <!-- Image -->
    <?php if (has_post_thumbnail()) : ?>
    <figure class="post-thumbnail gradient-overlay-hover link-icon">
        <a href="<?php esc_url( the_permalink() ) ?>">
          <img src="<?php  echo the_post_thumbnail_url('himara_image_size_1920_800')  ?>" class="img-fluid" alt="<?php echo the_title_attribute() ?>">
        </a>
    </figure>
    <?php endif ?>
    <!-- Details -->
    <div class="post-details<?php if( !has_post_thumbnail() ) : ?> no-thumbnail<?php endif ?> ">
      <!-- Title -->
      <?php the_title( sprintf( '<h2 class="post-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <!-- Info -->
        <div class="post-meta">
            <!-- Author -->
            <?php
            $post_author = get_the_author_meta('display_name');
            $post_author_id = get_the_author_meta('ID');
            $post_author_gravatar = get_avatar_url($post_author_id, array('size' => 14));
            ?>
            <span class="author"><i class="icon-user"></i><?php echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ).'">'.get_the_author_meta( 'display_name', $post_author_id ).'</a>' ?></span>
            <!-- Date -->
            <span class="date"><i class="icon-clock"></i><a href="<?php echo esc_url( get_permalink() ) ?>"><?php echo get_the_date() ?></a></span>
            <!-- Comments -->
            <?php
              if ( comments_open() || get_comments_number() ) {
                $ccount = (int) get_comments_number();
                $rep	= esc_html('comments', 'himara');
                if($ccount === 1) $rep	= esc_html('comment', 'himara');
                ?>
                <span class="comments"><i class="icon-bubble"></i><a href="<?php echo esc_url( get_permalink()).'#comments' ?>"><?php echo esc_html($ccount .' '. $rep) ?></a></span>
            <?php } ?>
            <!-- Categories -->
            <?php $cats = get_the_category_list( ', ' ); ?>
            <?php if (!empty($cats)) : ?>
            <span class="category"><i class="icon-folder"></i><?php echo wp_kses_post($cats) ?></span>
            <?php endif ?>
        </div>
      </div>
        <!-- Content -->
        <div class="post-content">
          <?php
          if (himara_get_option('post_excerpt_limit')) {
             echo himara_get_excerpt( himara_get_option( 'post_excerpt_limit' ) );
          } else {
             echo wp_trim_words( get_the_content(), 50, '...' );
          }
          ?>
    </div>
  </article>
</div>
