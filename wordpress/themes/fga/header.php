<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header id="site-header" class="header">
    <div class="header__wrapper">
      <span class="header__logo-wrapper">
        <?php fga_render_logo(); ?>
      </span>

      <?php if ( have_rows( 'header_badges', 'option' ) ) : ?>
        <span class="header__badges">
          <?php
            while ( have_rows( 'header_badges', 'option' ) ) :
              the_row();

              $attachment_id = get_sub_field( 'badge' );
              $src = wp_get_attachment_image_url( $attachment_id, 'header-badge' );
              $alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', TRUE );
          ?>
            <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
          <?php endwhile; ?>
        </span>
      <?php endif; ?>
    </div>
  </header>

  <main id="site-content" class="content-wrapper">