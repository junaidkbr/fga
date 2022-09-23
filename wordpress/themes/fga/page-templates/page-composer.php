<?php
/**
 * Template Name: Composer
 */
?>
<?php get_header(); ?>

  <div class="content-wrapper__column <?php the_field( 'wrapper_classes' ); ?>">
    <?php fga_render_acf_blocks(); ?>
  </div>

<?php get_footer(); ?>
