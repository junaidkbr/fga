<?php
/**
 * Renders Header and Footer Logo
 *
 * @param String $field Name of the logo ACF field
 * @param String $logo_class CSS Class to apply to the logo container
 */
function fga_render_logo( $field = 'header_logo', $logo_class = 'header__logo' ) {
  if ( ! $field ) {
    return;
  }

  $logo_attachment_id = get_field( $field, 'option' );

  if ( ! $logo_attachment_id ) {
    return;
  }

  $logo_url = get_bloginfo( 'url' );
  $logo_src = wp_get_attachment_image_url( $logo_attachment_id, 'full' );
  $logo_alt = get_post_meta( $logo_attachment_id, '_wp_attachment_image_alt', TRUE ) ?? get_bloginfo( 'title' );

  echo "<a href=\"{$logo_url}\">";
  echo "<img class=\"$logo_class\" src=\"{$logo_src}\" alt=\"{$logo_alt}\" width=\"300\" height=\"63\">";
  echo "</a>";
}
