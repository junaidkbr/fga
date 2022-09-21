  </main><!-- #site-content -->

  <footer id="site-footer" class="footer">
    <img class="footer__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="Federal Government Advisors">

    <?php
      fga_the_field( 'footer_copyright_notice', '<p class="footer__copyright">', '</p>', false, true );
      fga_the_field( 'footer_disclaimer_message', '<p class="footer__info">', '</p>', false, true );
    ?>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
