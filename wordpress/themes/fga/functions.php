<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function fga_theme_setup() {
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

  // Custom image sizes
  add_image_size('header-badge', 9999, 57 );
}
add_action( 'after_setup_theme', 'fga_theme_setup' );

/**
 * Enqueue Styles and Scripts.
 */
function fga_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'fga', get_stylesheet_directory_uri() . '/assets/css/styles.css', array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'fga_enqueue_assets' );

/**
 * Custom template tags for FGA
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions for FGA
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Changes ACF Save-JSON directory
 *
 * @param  String $path Default ACF JSON directory
 * @return String Modified ACF JSON directory path
 */
function fga_acf_json_save_directory( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'fga_acf_json_save_directory' );

/**
 * Changes ACF Load-JSON Directory
 *
 * @param Array $paths ACF JSON directory paths
 * @return String Modified ACF JSON directory paths
 */
function fga_acf_json_load_directory( $paths ) {
	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/inc/acf-json';

	return $paths;
}
add_filter('acf/settings/load_json', 'fga_acf_json_load_directory');

/**
 * Adds Theme Options Page
 */
if ( function_exists( 'acf_add_options_sub_page' ) ) {
  acf_add_options_sub_page( array(
  'page_title'    => __( 'Theme Options', 'fga'),
  'menu_title'    => __( 'Theme Options', 'fga'),
  'parent_slug'   => 'themes.php',
  'capability'    => 'manage_options',
  'position'      => 59
));
}