<?php get_header(); ?>

<?php get_template_part('templates/elements/page-header') ?>

<main class="<?php himara_main_class() ?>">
  <div class="<?php himara_container_class() ?>">
    <div class="row">

      <?php if ( himara_sidebar('', false) === 'left' ) : ?>
           <?php get_sidebar(); ?>
       <?php endif; ?>

      <div class="<?php himara_sidebar('entry') ?>">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>
        <div class="clearfix"></div>
        <?php wp_link_pages( array('before' => '<div class="himara-link-pages">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
        <div class="clearfix"></div>

        <?php comments_template(); ?>
        <?php endwhile ?>
      </div>

      <?php if ( himara_sidebar('', false) === 'right' ) : ?>
           <?php get_sidebar(); ?>
       <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer() ?>
