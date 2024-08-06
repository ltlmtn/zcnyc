<?php
    $tagline = get_bloginfo('description');
    $theme = get_stylesheet_directory_uri();
?>

<div class="header-areas desktop-width">
    <div class="wordmark">
        <a href="<?= get_home_url(); ?>">
            <div class="line-one">Impossible</div>
            <div class="line-two">Objects</div>
            <div class="tagline"><?= $tagline; ?></div>
        </a>
    </div>
    <div class="logo">
        <a href="<?= get_home_url(); ?>">
            <img src="<?= $theme; ?>/assets/images/io-icon.svg" alt="Impossible Objects Logo" />
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