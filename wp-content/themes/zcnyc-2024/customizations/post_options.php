<?php
    function add_post_options_meta() {
        add_meta_box(
            'post_options_meta',
            'Post Options',
            'render_post_options_meta',
            'post',
            'normal',
            'high'
        );
    }

    function render_post_options_meta($post) {
        $links_to = get_post_meta($post->ID, '_links_to', true);
        ?>
        <label for="links_to">External URL:</label>
        <input type="text" name="links_to" id="links_to" value="<?php echo esc_attr($links_to); ?>">
        <?php
    }

    function save_post_options_meta($post_id) {
        if (isset($_POST['links_to'])) {
            update_post_meta($post_id, '_links_to', sanitize_text_field($_POST['links_to']));
        }
    }

    add_action('add_meta_boxes', 'add_post_options_meta');
    add_action('save_post', 'save_post_options_meta');
?>