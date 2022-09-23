<?php
/**
 * Business Post Type
 */
function business_post_type()
{
  $labels = [
    'name'                  => __( 'Businesses', 'fga' ),
    'singular_name'         => __( 'Business', 'fga' ),
    'menu_name'             => __( 'Businesses', 'fga' ),
    'name_admin_bar'        => __( 'Business', 'fga' ),
    'archives'              => __( 'Business Archives', 'fga' ),
    'attributes'            => __( 'Business Attributes', 'fga' ),
    'parent_item_colon'     => __( 'Parent Business:', 'fga' ),
    'all_items'             => __( 'All Businesses', 'fga' ),
    'add_new_item'          => __( 'Add New Business', 'fga' ),
    'add_new'               => __( 'Add New Business', 'fga' ),
    'new_item'              => __( 'New Business', 'fga' ),
    'edit_item'             => __( 'Edit Business', 'fga' ),
    'update_item'           => __( 'Update Business', 'fga' ),
    'view_item'             => __( 'View Business', 'fga' ),
    'view_items'            => __( 'View Businesses', 'fga' ),
    'search_items'          => __( 'Search Team', 'fga' ),
    'not_found'             => __( 'Not found', 'fga' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'fga' ),
    'featured_image'        => __( 'Featured Image', 'fga' ),
    'set_featured_image'    => __( 'Set featured image', 'fga' ),
    'remove_featured_image' => __( 'Remove featured image', 'fga' ),
    'use_featured_image'    => __( 'Use as featured image', 'fga' ),
    'insert_into_item'      => __( 'Insert into Business', 'fga' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Business', 'fga' ),
    'items_list'            => __( 'Businesses list', 'fga' ),
    'items_list_navigation' => __( 'Businesses list navigation', 'fga' ),
    'filter_items_list'     => __( 'Filter Businesses list', 'fga' ),
  ];

  $args = [
    'label'               => __( 'Businesses', 'fga' ),
    'description'         => __( 'Businesses submissions at FGA.', 'fga' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'permalink', 'thumbnail' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 20,
    'menu_icon'           => 'dashicons-list-view',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest'        => true,
  ];

  register_post_type('business', $args);
}
add_action( 'init', 'business_post_type', 10 );
