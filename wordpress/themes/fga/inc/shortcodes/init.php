<?php
/**
 * Shortcodes
 */
$shortcodes = array( 'year' );

foreach ( $shortcodes as $shortcode ) {
    require get_parent_theme_file_path( '/inc/shortcodes/' . str_replace( '_', '-', $shortcode ) . '-shortcode.php' );
}
