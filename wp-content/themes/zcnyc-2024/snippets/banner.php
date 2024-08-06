<?php
    $banner_text = get_theme_mod('banner_text');
    $banner_button_label = get_theme_mod('banner_button_label');
    $banner_button_url = get_theme_mod('banner_button_url');
?>

<?php if($banner_text): ?>
    <section id="banner">
        <div class="container">
            <div class="banner-text"><?= $banner_text; ?></div>
            <?php if($banner_button_label): ?>
                <a href="<?= $banner_button_url; ?>" class="button"><?= $banner_button_label; ?></a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>