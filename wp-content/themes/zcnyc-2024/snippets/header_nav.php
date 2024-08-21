<?php
    $theme = get_stylesheet_directory_uri();
?>

<div class="menu-shader"></div>

<div class="header-areas desktop-width">
    <div class="logo">
        <div class="logo-background"></div>
        <a href="<?= get_home_url(); ?>">
            <img src="<?= $theme; ?>/assets/images/logo-header.svg" alt="ZCNYC Logo" />
        </a>
    </div>
    <div class="menu-toggle">
        <div class="menu-open"><ion-icon name="menu"></ion-icon></div>
        <div class="menu-close"><ion-icon name="close"></ion-icon></div>
    </div>
    <div class="nav">
        <div class="nav-content">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'main_navigation',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'menu_id' => 'main-navigation'
                ) );
            ?>
        </div>
    </div>
</div>