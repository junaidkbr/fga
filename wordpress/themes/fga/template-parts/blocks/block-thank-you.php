<?php
  $section_class = [
    'page-welcome-title thank-you',
    'layout-' . get_query_var( 'layout_index' ),
    get_sub_field( 'section_classes' )
  ];
?>
<section <?php fga_section_id(); ?> class="<?php echo trim( implode( ' ', $section_class ) ); ?>">
  <?php if ( get_sub_field( 'subheading' ) || get_sub_field( 'heading' ) ) : ?>
    <h1 class="page-welcome-title__heading-md">
      <?php
        fga_the_field( 'subheading', '<span class="text-red">', '</span><br>', true );
        fga_the_field( 'heading', '', '', true );
      ?>
    </h1>

    <hr class="help-box__seperator">
  <?php endif; ?>

  <?php fga_the_field( 'description', '<p class="page-welcome-title__paragraph narrow text-xs">', '</p>', true ); ?>
</section>
