<?php
    $offset_side = $attributes['offset-side'];
    $get_image = $attributes['image'];
    if( $get_image ) {
        $image = wp_get_attachment_image_url( $get_image['id'], 'full' );
    }
    $heading = $attributes['heading'];
    $content = $attributes['content'];
    $destination = $attributes['destination'];
    $label = $attributes['label'];
?>

<div class="offset-poster <?= $offset_side; ?>">
    <div class="offset-poster-image" style="background-image: url(<?= $image; ?>);"></div>
    <div class="offset-poster-content">
        <div class="heading"><?= $heading; ?></div>
        <div class="content"><?= $content; ?></div>
        <a href="<?= $destination; ?>" class="button"><?= $label; ?></a>
    </div>
</div>