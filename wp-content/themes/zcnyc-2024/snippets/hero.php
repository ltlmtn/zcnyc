<?php
    $monochrome_setting = get_theme_mod('monochrome_heroes');
    if( $monochrome_setting ) {
        $hero_type = 'monochrome';
    } else {
        $hero_type = 'color';
    }
    $feautured_image = get_the_post_thumbnail_url( $post->ID, 'full' );
    if( $feautured_image ) {
        $hero_type = 'has-image';
    } else {
        $hero_type = 'no-image';
    }
?>

<div class="hero <?= $hero_type . $monochrome_setting; ?>">
    <?php if( $feautured_image ) { ?>
        <div class="hero-image" style="background-image: url(<?php echo $feautured_image; ?>);"></div>
    <?php } ?>
    <div class="desktop-width">
        <h1><?php the_title(); ?></h1>
    </div>
</div>