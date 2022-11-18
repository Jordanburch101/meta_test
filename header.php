<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">

  <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- AOS_end -->

  <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <!-- SWIPER_end -->

  <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
  <!-- Fancybox_end -->

  <!--[if IE 9]>
    <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
  <![endif]-->
  <!--[if lte IE 8]>
    <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Mobile Nav -->
  <div id="mobileNav">
      <div class="mobileNav-header">
          <a href="<?php echo home_url(); ?>" class="header-logo"><img src="<?php echo get_field('footer_logo', 'option'); ?>"/></a>
          <a href="#" class="navToggle me-3"><i class="fa fa-times" aria-hidden="true"></i></a>
      </div>
      <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'nav','container_class' => 'mobile-main-menu ')); ?>
  </div>
  <div class="mobileNav-overlay"></div>
  <!-- end Mobile Nav -->

  <div id="wrap">
    <header id='header'>
      <section class="container">
        <div class="row">
          <div class="col-12">
          <a href="<?php echo home_url(); ?>" class="header-logo"><img src="<?php echo get_field('header_logo', 'option'); ?>"/></a>
              <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'nav','container_class' => 'main-menu d-none d-lg-block','walker' => new megaMenu())); ?>
              <a href="#" class="navToggle d-inline-block d-lg-none">Menu <i class="fa fa-bars" aria-hidden="true"></i></a>
          </div>
        </div>
      </section>
    </header>

<h1>HELLO TEST</h1>