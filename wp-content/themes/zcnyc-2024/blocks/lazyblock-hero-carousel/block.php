<?php
    $autoplay = $attributes['autoplay'];
    if( $autoplay == 1 ) {
        $autoplay = 'true';
    } else {
        $autoplay = 'false';
    }
    $monochrome = get_theme_mod('monochrome_heroes');
    if( $monochrome == 1 ) {
        $monochrome = 'monochrome';
    } else {
        $monochrome = 'color';
    }
    $autoplay_speed = $attributes['autoplay_speed'];
    if( $autoplay_speed == '' ) {
        $autoplay_speed = 5000;
    } else {
        $autoplay_speed = $autoplay_speed * 1000;
    }
    $slides = $attributes['slides'];
?>

<div class="hero-carousel <?= $monochrome; ?>">
    <?php if( $slides ) : ?>
        <?php foreach ($slides as $slide) : ?>
            <?php
                $get_image = $slide['image'];
                if( $get_image ) {
                    $image = $get_image['url'];
                }
                $heading = $slide['heading'];
            ?>
            <div class="slide">
                <div class="image" style="background-image: url('<?= $image; ?>');"></div>
                <div class="content">
                    <?php if( $heading ) : ?>
                        <h2><?= $heading; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.hero-carousel').slick({
            autoplay: <?= $autoplay; ?>,
            autoplaySpeed: <?= $autoplay_speed; ?>,
            arrows: false,
            dots: true,
            fade: true,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            pauseOnHover: false,
            pauseOnFocus: false
        });
    });
</script>