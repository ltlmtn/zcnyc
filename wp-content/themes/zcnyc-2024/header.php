<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-90NEQ2H8DW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-90NEQ2H8DW');
</script>

<?php get_template_part('snippets/header_meta') ?>

<?php 
  $styleSheetHash = '?v=' . rand(0, 99999999999);
  $theme = get_stylesheet_directory_uri();
?>

<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
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
