<?php
    $autoplay = $attributes['autoplay'];
    if( $autoplay == 1 ) {
        $autoplay = 'true';
    } else {
        $autoplay = 'false';
    }
    $autoplay_speed = $attributes['autoplay_speed'];
    if( $autoplay_speed == '' ) {
        $autoplay_speed = 5000;
    } else {
        $autoplay_speed = $autoplay_speed * 1000;
    }
    $images = $attributes['images'];
?>

<div class="gallery-carousel">
    <?php if( $images ) : ?>
        <?php foreach ($images as $image) : ?>
            <?php
                $image_id = $image['id'];
                $large_image = wp_get_attachment_image_src($image_id, 'large');
                $full_image = wp_get_attachment_image_src($image_id, 'full');
                if( $large_image ) {
                    $image = $large_image[0];
                } else {
                    $image = $full_image[0];
                }
                $alt = 'Gallery Image';
            ?>
            <img src="<?= $image; ?>" alt="<?= $alt; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.gallery-carousel').slick({
            autoplay: <?= $autoplay; ?>,
            autoplaySpeed: <?= $autoplay_speed; ?>,
            arrows: true,
            dots: false,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            variableWidth: true,
            nextArrow: '<button type="button" class="slick-next"><ion-icon name="chevron-forward-outline"></ion-icon></button>',
            prevArrow: '<button type="button" class="slick-prev"><ion-icon name="chevron-back-outline"></ion-icon></button>',
        });
    });
</script>