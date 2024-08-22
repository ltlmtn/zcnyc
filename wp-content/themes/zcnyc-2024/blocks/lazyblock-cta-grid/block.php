<?php
    $ctas = $attributes['ctas'];
    $columns = $attributes['columns'];
    if( $columns == '' ) {
        $columns = 3;
    } else {
        $columns = $columns;
    }
    $monochrome = $attributes['monochrome'];
    if( $monochrome == 1 ) {
        $monochrome = 'monochrome';
    } else {
        $monochrome = '';
    }
?>

<div class="cta-grid columns-<?= $columns . ' ' . $monochrome; ?>">
    <?php foreach( $ctas as $cta ) :
        $get_image = $cta['image'];
        $image = wp_get_attachment_image_url( $get_image['id'], 'large' );
        $label = $cta['label'];
        $destination = $cta['destination'];
        $summary = $cta['summary'];
        $get_target = $cta['target'];
        if( $get_target == 1 ) {
            $target = '_blank';
        } else {
            $target = '_self';
        }
    ?>

    <a href="<?= $destination; ?>" class="cta-grid-item" target="<?= $target; ?>">
        <div class="cta-grid-image" style="background-image: url(<?= $image; ?>);"></div>
        <div class="content">
            <h3><?= $label; ?></h3>
            <div class="cta-grid-button">&rarr;</div>
        </div>
        <?php if( $summary ) : ?>
            <div class="cta-grid-summary">
                <?= $summary; ?>
            </div>
        <?php endif; ?>
    </a>

    <?php endforeach; ?>
</div>