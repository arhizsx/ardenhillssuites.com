<?php get_header();?>

<?php get_template_part('templates/elements/page-header') ?>

<main class ="<?php himara_main_class() ?>">
<div class="<?php himara_container_class() ?>">
  <div class="row">

    <?php if ( himara_sidebar('', false) === 'left' ) : ?>
       <?php get_sidebar(); ?>
     <?php endif; ?>

    <div class="<?php himara_sidebar('entry') ?> blog-posts">

      <div class="row">
      <?php while( have_posts() ) : the_post(); ?>

        <?php

        $himara_blog_layout = himara_get_option('himara_blog_arhive_layout');

        if ( empty( $himara_blog_layout ) ) $himara_blog_layout = 'classic';

        get_template_part('templates/archive/'.$himara_blog_layout)

        ?>

      <?php endwhile; ?>

      </div>

      <?php get_template_part('templates/archive/pagination')?>

    </div>

    <?php if ( himara_sidebar('', false) === 'right' ) : ?>
       <?php get_sidebar(); ?>
    <?php endif; ?>

   </div>
  </div>
</main>

<?php get_footer() ?>
