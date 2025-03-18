<?php get_header();?>

<?php if ( himara_get_option('himara_blog_single_layout') === 'hero' ) : ?>
  <?php get_template_part('templates/single/hero'); ?>
<?php endif ?>

<main class ="<?php himara_main_class() ?>">
<div class="<?php himara_container_class() ?>">
  <div class="row">

    <?php if ( himara_sidebar('', false) === 'left' ) : ?>
         <?php get_sidebar(); ?>
     <?php endif; ?>

    <div class="<?php himara_sidebar('entry') ?> blog-post">

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('entry');?>>

        <?php if ( empty( himara_get_option('himara_blog_single_layout') ) || himara_get_option('himara_blog_single_layout') === 'classic' ) : ?>
          <?php get_template_part('templates/single/classic'); ?>
        <?php endif ?>


        <section class="post-content">
          <?php the_content() ?>
          <div class="clearfix"></div>
          <?php wp_link_pages( array('before' => '<div class="himara-link-pages">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
          <div class="clearfix"></div>
        </section>

         <?php if (himara_get_option('single_post_tags') || himara_get_option('single_post_share') ) : ?>
          <section class="post-footer">
          <?php if (himara_get_option('single_post_tags') && has_tag() ) : ?>

          <div class="tags">
            <span><i class="fa fa-tags"></i><?php echo esc_html__('Tags', 'himara') ?></span>
            <?php the_tags( false, ' ', false ); ?>
          </div>
          <?php endif ?>
          <?php if (himara_get_option('single_post_share')) : ?>

              <?php himara_social_share() ?>
          <?php endif ?>
          </section>
          <?php endif; ?>
      </article>

      <?php get_template_part('templates/single/author') ?>

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
