<?php
/**
 * Renders ACF Flexible Content a.k.a Blocks
 *
 * @param String $template The flexible layout field-group name
 */
function fga_render_acf_blocks( $template = 'blocks', $post_id = null ) {
  if ( ! $post_id ) {
    $post_id = get_the_ID();
  }

  if ( get_post_status($post_id) !== 'publish' ) {
  	return;
  }

  if ( have_rows( $template, $post_id ) ) {
    $layout_index = 1;

    while ( have_rows( $template, $post_id ) ) {
      the_row();

      set_query_var( 'layout_index', $post_id . '--' . $layout_index );
      $layout = str_replace( '_', '-', get_row_layout() );
      get_template_part( 'template-parts/blocks/block', $layout );

      $layout_index++;
    }
  }
}

/**
 *  Print HTML section ID from Composer field
 */
function fga_section_id() {
  $section_id = '';

  if ( $section_id = get_sub_field( 'section_id' ) ) {
    $section_id = 'id="' . $section_id . '"';
  }

  echo $section_id;
}

/**
 * Custom ACF Field Wrapper
 *
 * @param  String $name         Name of the ACF field
 * @param  String $before       HTML Markup before the field
 * @param  String $after        HTML Markup after the field
 * @param  Boolean $sub_field   If the field is subfield
 * @param  Boolean $option      If the field is an option
 */
function fga_the_field( $name = false, $before = '', $after = '', $sub_field = false, $option = false )
{
  if ( ! $name ) {
    return;
  }

  $output = '';

  if ( ! $option ) {
    if ( ! $sub_field && get_field( $name ) ) {
      $output = get_field( $name, false, false );
    } else if ( $sub_field && get_sub_field( $name ) ) {
      $output = get_sub_field( $name );
    }
  } else {
    if ( ! $sub_field && get_field( $name, 'option' ) ) {
      $output = get_field( $name, 'option' );
    } else if ( $sub_field && get_sub_field( $name ) ) {
      $output = get_sub_field( $name, 'option' );
    }
  }

  if ( ! empty( $output ) ) {
    echo $before . do_shortcode( $output ) . $after;
  }
}
