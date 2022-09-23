<?php
function year_shortcode( $atts, $content = '' ) {
  return date( 'Y' );
}
add_shortcode( 'year', 'year_shortcode');
