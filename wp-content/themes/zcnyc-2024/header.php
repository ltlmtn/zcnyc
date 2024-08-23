<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php get_template_part('snippets/header_meta') ?>

<?php 
  $styleSheetHash = '?v=' . rand(0, 99999999999);
  $theme = get_stylesheet_directory_uri();
?>

<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.css" integrity="sha512-56GJrpSgHk6Mc9Fltt+bQKcICJoEpxtvozXPA5n5OT0rfWiqGlJmJCI/vl16kctf/0XbBloh03vl7OF2xFnR8g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?><?= $styleSheetHash; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri(); ?>/assets/css/base.css<?= $styleSheetHash; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri(); ?>/assets/css/tablet.css<?= $styleSheetHash; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri(); ?>/assets/css/desktop.css<?= $styleSheetHash; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri(); ?>/assets/fonts/stylesheet.css<?= $styleSheetHash; ?>" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.js" integrity="sha512-0UbR6HN0dY8fWN9T7fF658896tsPgnbRREHCNq46J9/JSn8GonXDZmqtTc3qS879GM0zV49b9LPhdc/maKP8Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<?php
  if( is_user_logged_in() ) {
    $loggedin = 'logged-in';
  } else {
    $loggedin = 'not-logged-in';
  }
  $slug = get_post_field( 'post_name', get_post() );
?>

<body id="body" class="asw <?php if(is_front_page()) { echo 'home '; } else { echo get_post_type() . ' ' . $slug; } ?> <?= $loggedin; ?>">

<header id="top">
  <?php
    if( is_front_page() && is_active_sidebar('homepage_hero') ) {
      dynamic_sidebar( 'homepage_hero' );
    } else {
      get_template_part('snippets/hero');
    }
    get_template_part('snippets/banner');
    get_template_part('snippets/header_nav');
  ?>
</header>

<!-- END OF HEADER.PHP -->
