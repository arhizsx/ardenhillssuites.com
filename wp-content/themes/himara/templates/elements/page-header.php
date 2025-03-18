<?php
$himara_page_title = get_post_meta(get_the_id(), 'himara_mtb_title', true);
?>
<?php if ($himara_page_title == true) : ?>
<div class="page-title" style="<?php if (himara_get_option('page_header') == 'image' ) { ?> background: url(<?php echo esc_url( himara_get_option('page_header_image_bg') ) ?> ) <?php } else { ?> background: <?php echo esc_html( himara_get_option('page_header_color_bg') );  }?>; background-repeat: no-repeat;
    background-size: cover;  ">
  <div class="container">
    <div class="inner">

      <?php if (is_search()) : ?>

      <?php  echo '<h1>' . esc_html__('Searh Results For', 'himara') . ' "' . get_search_query(). '" ' , '</h1>'; ?>

      <?php else : ?>

        <h1><?php echo single_post_title() ?></h1>
        <?php if ( himara_get_option('page_breadcrumb')) : himara_get_breadcrumb(); endif ?>

      <?php endif ?>

    </div>
  </div>
</div>
<?php endif ?>
