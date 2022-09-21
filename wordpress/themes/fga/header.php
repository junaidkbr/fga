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
        <img class="header__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="Federal Government Advisors">
      </span>

      <span class="header__badges">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/trust.svg" alt="Trust Pilot">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/google.svg" alt="Google">
      </span>
    </div>
  </header>

  <main id="site-content" class="content-wrapper">