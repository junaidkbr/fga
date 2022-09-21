  </main><!-- #site-content -->

  <footer id="site-footer" class="footer">
    <?php
      fga_render_logo( 'footer_logo', 'footer__logo' );
      fga_the_field( 'footer_copyright_notice', '<p class="footer__copyright">', '</p>', false, true );
      fga_the_field( 'footer_disclaimer_message', '<p class="footer__info">', '</p>', false, true );
    ?>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
