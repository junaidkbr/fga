<?php
  $section_class = [
    'reg-choices',
    'layout-' . get_query_var( 'layout_index' ),
    get_sub_field( 'section_classes' )
  ];
?>
<section <?php fga_section_id(); ?> class="<?php echo implode( ' ', $section_class ); ?>">
  <?php
    while ( have_rows( 'icon_blocks' ) ) :
      the_row();

      $icon_id = get_sub_field( 'icon' );

      if ( $icon_id ) {
        $icon_src = wp_get_attachment_image_url( $icon_id, 'full' );
        $icon_alt = get_post_meta( $icon_id, '_wp_attachment_image_alt', TRUE ) ?? get_sub_field( 'heading' );
      }
  ?>
    <div class="reg-choices__new">
      <?php if ( $icon_id ) : ?>
        <img class="reg-choices__image" src="<?php echo $icon_src; ?>" alt="<?php echo $icon_alt; ?>">
      <?php endif; ?>

      <?php
        fga_the_field( 'heading', '<h2 class="reg-choices__name">', '</h2>', true );
        fga_the_field( 'description', '<p class="reg-choices__paragraph">', '</p>', true );
        fga_the_link( get_sub_field( 'button' ), 'reg-choices__button' );
      ?>
    </div>
  <?php endwhile; ?>
</section>