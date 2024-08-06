<?php
    function register_events_post_type() {
        $labels = array(
            'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Events', 'text_domain' ),
            'name_admin_bar'        => __( 'Event', 'text_domain' ),
            'archives'              => __( 'Event Archives', 'text_domain' ),
            'attributes'            => __( 'Event Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Event:', 'text_domain' ),
            'all_items'             => __( 'All Events', 'text_domain' ),
            'add_new_item'          => __( 'Add New Event', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Event', 'text_domain' ),
            'edit_item'             => __( 'Edit Event', 'text_domain' ),
            'update_item'           => __( 'Update Event', 'text_domain' ),
            'view_item'             => __( 'View Event', 'text_domain' ),
            'view_items'            => __( 'View Events', 'text_domain' ),
            'search_items'          => __( 'Search Event', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into event', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this event', 'text_domain' ),
            'items_list'            => __( 'Events list', 'text_domain' ),
            'items_list_navigation' => __( 'Events list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter events list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Event', 'text_domain' ),
            'description'           => __( 'Events post type', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'menu_icon'             => 'dashicons-calendar-alt',
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'template_lock'         => 'all',
            'template'              => array(
                array( 'core/paragraph', array(
                    'placeholder' => 'Add event description...',
                ) ),
            ),
            
        );
        register_post_type( 'events', $args );
    }
    add_action( 'init', 'register_events_post_type', 0 );


function add_custom_meta_box() {
    add_meta_box(
        'event_meta_box',
        'Event Details',
        'render_event_meta_box',
        'events',
        'normal',
        'high'
    );
}

function render_event_meta_box($post) {
    // Retrieve the current values for the metafields
    $expiration_date = get_post_meta($post->ID, 'expiration_date', true);
    $visible_date = get_post_meta($post->ID, 'visible_date', true);
    $capacity_limit = get_post_meta($post->ID, 'capacity_limit', true);
    
    // Output the HTML for the metafields
    ?>
    <div class="event-meta-fields">
        <div class="expiration-date">
            <label for="expiration_date">Expiration Date:</label>
            <input type="date" id="expiration_date" name="expiration_date" value="<?php echo esc_attr($expiration_date); ?>">
            <div class="description">This is the date after which the event will no longer be visible as "upcoming."</div>
        </div>
        <div class="visible-date">
            <label for="visible_date">Visible Date:</label>
            <input type="text" id="visible_date" name="visible_date" value="<?php echo esc_attr($visible_date); ?>">
            <div class="description">This is the date as it will be seen by visitors.</div>
        </div>
        <div class="capacity-limit">
            <label for="capacity_limit">Capacity Limit:</label>
            <input type="text" id="capacity_limit" name="capacity_limit" value="<?php echo esc_attr($capacity_limit); ?>">
            <div class="description">IE "20 People" or "50 Cars"</div>
        </div>
    </div>
    <style>
        .event-meta-fields {
            align-items: start;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1rem;
            justify-content: start;
        }
        .event-meta-fields label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .event-meta-fields input {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }
        .event-meta-fields .description {
            font-size: 14px;
            color: #666;
        }
    </style>
    <?php
}

function save_event_meta_data($post_id) {
    // Save the metafield values when the post is saved or updated
    if (isset($_POST['expiration_date'])) {
        update_post_meta($post_id, 'expiration_date', sanitize_text_field($_POST['expiration_date']));
    }
    if (isset($_POST['visible_date'])) {
        update_post_meta($post_id, 'visible_date', sanitize_text_field($_POST['visible_date']));
    }
    if (isset($_POST['capacity_limit'])) {
        update_post_meta($post_id, 'capacity_limit', sanitize_text_field($_POST['capacity_limit']));
    }
}

add_action('add_meta_boxes', 'add_custom_meta_box');
add_action('save_post', 'save_event_meta_data');

function add_expiration_date_column($columns) {
    $columns['expiration_date'] = '<b>Expiration Date</b>';
    return $columns;
}
add_filter('manage_events_posts_columns', 'add_expiration_date_column');

function display_expiration_date_column($column, $post_id) {
    if ($column === 'expiration_date') {
        $expiration_date = get_post_meta($post_id, 'expiration_date', true);
        echo $expiration_date;
    }
}
add_action('manage_events_posts_custom_column', 'display_expiration_date_column', 10, 2);

function make_expiration_date_column_sortable($columns) {
    $columns['expiration_date'] = 'expiration_date';
    return $columns;
}
add_filter('manage_edit-events_sortable_columns', 'make_expiration_date_column_sortable');

?>