<?php get_header();?>

<?php get_template_part('templates/elements/page-header') ?>

<main class ="<?php himara_main_class() ?>">
<div class="container">
  <div class="row">

    <?php if ( himara_sidebar('', false) === 'left' ) : ?>
         <?php get_sidebar(); ?>
     <?php endif; ?>

    <div class="<?php himara_sidebar('entry') ?> blog-posts">

      <div class="row">

      <?php

      if ( have_posts() ) :  while( have_posts() ) : the_post(); ?>

          <?php get_template_part('templates/archive/'.himara_get_option('himara_blog_arhive_layout'))?>

      <?php

      endwhile;

      else : ?>

        <div class="alert alert-simple alert-dismissible clearfix mt20 text-center" role='alert'><?php echo __('No results found. Please try again with a different keyword.', 'himara') ?> </div>

    <?php endif  ?>
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
