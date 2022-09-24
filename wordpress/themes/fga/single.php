<?php get_header(); ?>

  <div class="content-wrapper__column">
    <?php
      if ( have_posts() ) {

        while ( have_posts() ) {
          the_post();

          echo '<h1>' . get_the_title() . '</h1>';
          the_content();
        }
      }
    ?>
  </div>

<?php get_footer(); ?>
