<?php
    $items = $attributes['items'];
    $columns = $attributes['columns'];
    if( $columns == '' ) {
        $columns = 3;
    } else {
        $columns = $columns;
    }
?>

<div class="cta-grid columns-<?= $columns; ?>">
    <?php foreach( $items as $item ) :
        $get_image = $item['image'];
        $image = wp_get_attachment_image_url( $get_image['id'], 'large' );
        $label = $item['label'];
        $destination = $item['destination'];
        $summary = $item['summary'];
    ?>
    
    <a href="<?= $destination; ?>" class="cta-grid-item">
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