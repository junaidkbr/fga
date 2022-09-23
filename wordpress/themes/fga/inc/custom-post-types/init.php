<?php
/**
 * Custom post types
 */
$post_types = array( 'business' );

foreach ( $post_types as $post_type ) {
    require get_parent_theme_file_path( '/inc/custom-post-types/' . $post_type . '-post-type.php');
}
