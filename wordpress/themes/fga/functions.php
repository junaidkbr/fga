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
 * Changes ACF JSON directory
 *
 * @param  String $path Default ACF JSON directory
 * @return String Modified ACF JSON directory path
 */
function fga_acf_json_directory( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'fga_acf_json_directory' );