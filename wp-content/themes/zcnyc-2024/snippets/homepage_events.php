<?php


    $donation_button_text = get_theme_mod('donation_button_text');
    $donation_button_link = get_theme_mod('donation_button_link');
    $donation_button_modal = get_theme_mod('donation_button_modal');

    $args = array(
        'post_type' => 'events',
        'meta_key' => 'expiration_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'expiration_date',
                'value' => date('Y-m-d'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            $visible_date = get_post_meta(get_the_ID(), 'visible_date', true);
            $capacity_limit = get_post_meta(get_the_ID(), 'capacity_limit', true);
            $excerpt = get_the_excerpt(); 

            echo '<li>';
                echo '<div class="event-date">' . $visible_date . '</div>';
                echo '<h3>' . get_the_title() . '</h3>';
                if( $excerpt ) {
                    echo '<div class="event-description">' . $excerpt . '</div>';
                } else {
                    echo '<div class="event-description">' . get_the_content() . '</div>';
                }
                if( $capacity_limit ) {
                    echo '<div class="event-capacity">' . $capacity_limit . '</div>';
                }
            echo '</li>';
        }

            // Donation Button
            if( $donation_button_modal ) {
                $modal = 'data-featherlight="#donate-modal"';
            } else {
                $modal = '';
            }
            if( $donation_button_link && $donation_button_text ) {
                echo '<li>';
                    echo '<a href="' . $donation_button_link . '" class="button donate" '.$modal.'>' . $donation_button_text . '</a>';
                echo '</li>';
            }

        echo '</ul>';
        wp_reset_postdata();
    } else {
        // No events found
    }

    if( $donation_button_modal ) {
        echo '<div style="display: none;">';
            echo '<div id="donate-modal" class="donate-modal">' . $donation_button_modal . '</div>';
        echo '</div>';
    }

?>