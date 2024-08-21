<?php
    $get_heading = $attributes['heading'];
    $get_blurb = $attributes['blurb'];
    $get_button_label = $attributes['label'];
    $get_button_destination = $attributes['destination'];
    $get_desktop_image = $attributes['image_desktop'];
    $get_mobile_image = $attributes['image_mobile'];
?>

<div class="big-cta">
    <?php if( $get_desktop_image ) : ?>
        <div class="image desktop" style="background-image: url(<?= $get_desktop_image['url']; ?>);"></div>
    <?php endif; ?>
    <?php if( $get_mobile_image ) : ?>
        <div class="image mobile" style="background-image: url(<?= $get_mobile_image['url']; ?>);"></div>
    <?php endif; ?>
    <div class="content">
        <?php if( $get_heading ) : ?>
            <h2><?= $get_heading; ?></h2>
        <?php endif; ?>
        <?php if( $get_blurb ) : ?>
            <div class="blurb"><?= $get_blurb; ?></div>
        <?php endif; ?>
        <?php if( $get_button_destination ) : ?>
            <a href="<?= $get_button_destination; ?>" class="button"><?= $get_button_label; ?></a>
        <?php endif; ?>
    </div>
</div>