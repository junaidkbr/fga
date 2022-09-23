<?php
  $section_class = [
    'help-box',
    'layout-' . get_query_var( 'layout_index' ),
    get_sub_field( 'section_classes' )
  ];
?>
<section <?php fga_section_id(); ?> class="<?php echo trim( implode( ' ', $section_class ) ); ?>">
  <?php if ( $background_image_id = get_sub_field( 'background_image' ) ) : ?>
    <style scoped>
      .help-box.layout-<?php echo get_query_var( 'layout_index', '' ); ?> {
        background-image: url(<?php echo wp_get_attachment_image_url( $background_image_id, 'banner-background' ); ?>);
      }
    </style>
  <?php endif; ?>

  <?php
    fga_the_field( 'heading', '<h2 class="help-box__heading">', '</h2>', true );

    if ( get_sub_field( 'heading' ) && get_sub_field( 'description' ) ) {
      echo '<hr class="help-box__seperator">';
    }

    fga_the_field( 'description', '<p class="help-box__paragraph">', '</p>', true );
  ?>
</section>
