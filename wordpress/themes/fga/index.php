<?php get_header(); ?>

  <div class="content-wrapper__column">
    <?php
      if ( have_posts() ) {

        while ( have_posts() ) {
          the_post();
          the_content();
        }
      }
    ?>
  </div>

<?php get_footer(); ?>
