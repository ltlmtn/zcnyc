<?php
    $get_count = $attributes['count'];
    if( $get_count == '' ) {
        $count = 99;
    } else {
        $count = $get_count;
    }
    $get_autoplay = $attributes['autoplay'];
    if( $get_autoplay == 1 ) {
        $autoplay = 'true';
    } else {
        $autoplay = 'false';
    }
    $get_autoplay_speed = $attributes['autoplay_speed'];
    if ( $get_autoplay_speed != '' ) {
        $autoplay_speed = $get_autoplay_speed;
    } else {
        $autoplay_speed = 5000;
    }
    $heading = $attributes['heading'];
    $description = $attributes['description'];
    $get_category_filter = $attributes['category_filter'];
    if( $get_category_filter == '' ) {
        $category_filter = 'zen-center-of-nyc-fire-lotus-temple';
    } else {
        $category_filter = $get_category_filter;
    }
?>

<div class="events-carousel-headings page-width">
    <?php if( $heading ) : ?>
        <h2><?= $heading; ?></h2>
    <?php endif; ?>
    <?php if( $description ) : ?>
        <div class="description"><?= $description; ?></div>
    <?php endif; ?>
</div>
<div class="events-carousel">
    <div>
        <ul class="event-slides">
            <?php
            // make sure calling the api doesn't cause a fatal error if the RS_Connect_Api class is not found
            $rs_connect_api = class_exists('RS_Connect_Api') ? new RS_Connect_Api() : null;

            // make sure we have the $rs_connect_api class
            if (! empty($rs_connect_api) ) {
                // get the program data from the api
                $get_programs = $rs_connect_api::get_programs();
                $programs = array_reverse($get_programs);
                $counter = 0; // initialize counter
                foreach( $programs as $program ) {
                $featured_image = $program->photo_details->medium ?? null;
                $program_categories = $program->categories;
                $terms = array();
                foreach($program_categories as $category) {
                    array_push($terms, $category->slug);
                }
                if (in_array('video-conference', $terms)) {
                    $venue = 'Online';
                } else {
                    $venue = 'On-Site';
                }
                if (in_array($category_filter, $terms)) {
                    $details_url = $program->alternate_url ? $program->alternate_url : get_site_url().'/programs/'.$program->ID.'/'.$program->slug;
                    echo '<li class="slide">';
                        echo '<div class="slide-areas">';
                            echo '<div class="slide-image-area">';
                                echo '<div class="program-image" style="background-image: url(\''.$featured_image->url.'\');">&nbsp;</div>';
                            echo '</div>';
                            echo '<div class="slide-content-area">';
                                echo '<div class="program-title"><a href="' . $details_url . '">' . $program->title . '</a> '.$program->teacher_list.'</div>';
                                echo '<div class="program-meta">';
                                    echo '<div class="program-date">' . $program->date . '</div>';
                                    echo '<div class="program-venue">' . $venue . '</div>';
                                echo '</div>';
                                echo '<div class="program-excerpt">'.$program->text.'</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</li>';
                    $counter++; // increment counter
                    if ($counter == $count) {
                    break; // stop the loop after $count is reached
                    }
                }
                }                    
            }
            ?>
        </ul>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.event-slides').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: 'calc(  (100% - 800px) / 2 )',
            autoplay: <?= $autoplay ?>,
            autoplaySpeed: <?= $autoplay_speed ?>,
            adaptiveHeight: true,
            nextArrow: '<button type="button" class="slick-next"><ion-icon name="chevron-forward-outline"></ion-icon></button>',
            prevArrow: '<button type="button" class="slick-prev"><ion-icon name="chevron-back-outline"></ion-icon></button>',
            responsive: [
                {
                    breakpoint: 1080,
                    settings: {
                        centerPadding: '10%'
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false
                    }
                }
            ]
        });
    });
</script>