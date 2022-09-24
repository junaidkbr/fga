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
  add_image_size( 'header-badge', 9999, 57 );
  add_image_size( 'banner-background', 1680, 99999 );
}
add_action( 'after_setup_theme', 'fga_theme_setup' );

/**
 * Enqueue Styles and Scripts.
 */
function fga_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'fga', get_stylesheet_directory_uri() . '/assets/css/styles.css', array(), $theme_version );

  wp_deregister_script( 'jquery' );

  wp_enqueue_script( 'business-form', get_stylesheet_directory_uri() . '/assets/js/business-form.js', array(), $theme_version, true );
  wp_localize_script( 'business-form', 'fga_ajax', array(
    'ajax_url'  => admin_url( 'admin-ajax.php' ),
    'nonce'     => wp_create_nonce( 'business-form-submission' ),
  ) );
}
add_action( 'wp_enqueue_scripts', 'fga_enqueue_assets' );

/**
 * Removes Gutenberg Block Library CSS
 */
function fga_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-blocks-style' );
 }
add_action( 'wp_enqueue_scripts', 'fga_remove_wp_block_library_css', 100 );

/**
 * Plugin dependency class
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Custom template tags for FGA
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions for FGA
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types/init.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes/init.php';

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function fga_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'                => 'Advanced Custom Fields PRO',
			'slug'                => 'advanced-custom-fields-pro',
      'required'            => true,
			'force_activation'    => true,
      'is_callable'         => 'acf',
		),
	);

	$config = array(
		'id'           => 'fga',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'fga_register_required_plugins' );

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
	$paths[] = get_stylesheet_directory() . '/acf-json';

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

/**
 * Handles Business Form AJAX Request
 */
function fga_ajax_business_form() {
  check_ajax_referer( 'business-form-submission', 'security' );
  $data = json_decode( html_entity_decode( stripslashes ( $_REQUEST['data'] ) ), true );

  // Collect post data
  $post_data = array(
    'post_title'      => $data[ 'business-name' ],
    'post_content'    => $data[ 'message' ],
    'post_status'     => 'publish',
    'post_type'       => 'business',
  );

  // Create post
  $post_id = wp_insert_post( $post_data );

  if ( is_wp_error( $post_id ) ) {
    // Post creation failed
    echo wp_json_encode( array(
      'status'  => 'error',
      'message' => 'Failed submitting business.',
    ) );
    wp_die();
  }

  // Insert custom fields
  update_field( 'status', 'active', $post_id );
  update_field( 'first_name', $data[ 'first-name' ], $post_id );
  update_field( 'last_name', $data[ 'last-name' ], $post_id );
  update_field( 'business_name', $data[ 'business-name' ], $post_id );
  update_field( 'cage', $data[ 'cage' ], $post_id );
  update_field( 'duns', fga_generate_duns(), $post_id );

  // Send an email to admin
  $body = '';

  foreach( $data as $name => $value ) {
    $name = ucwords( str_replace( '-', ' ', $name ) );
    $body .= "{$name}: {$value}\n";
  }

  wp_mail(
    get_option( 'admin_email' ),
    'New Business Submission',
    $body,
  );

  echo wp_json_encode( array(
    'status'  => 'success',
    'message' => 'Business successfully submitted.',
  ) );
	wp_die();
}
add_action( 'wp_ajax_business_form', 'fga_ajax_business_form' );
add_action( 'wp_ajax_nopriv_business_form', 'fga_ajax_business_form' );

function fga_generate_duns() {
  $duns = 0;
  $duns_is_unique = true;

  do {
    // Generate random DUNS number
    $duns = mt_rand(100000000, 999999999);

    // Check uniqueness
    $posts = new WP_Query( array(
      'post_type'     => 'business',
      'post_status'   => 'any',
      'meta_key'      => 'duns',
      'meta_value'    => $duns,
    ) );

    if ( $posts->found_posts !== 0 ) {
      $duns_is_unique = false;
    }
  } while ( ! $duns_is_unique );

  return $duns;
}
