<?php
/**
 * Registers custom post types + meta for the FUCH experience.
 */

if (!defined('ABSPATH')) {
    exit;
}

const FUCH_CPTS = [
    'fuch_drink' => [
        'singular' => 'Drink',
        'plural'   => 'Drinks',
        'icon'     => 'dashicons-coffee',
    ],
    'fuch_testimonial' => [
        'singular' => 'Testimonial',
        'plural'   => 'Testimonials',
        'icon'     => 'dashicons-format-quote',
    ],
    'fuch_event' => [
        'singular' => 'Event',
        'plural'   => 'Events',
        'icon'     => 'dashicons-calendar-alt',
    ],
];

function fuch_register_cpts() {
    foreach (FUCH_CPTS as $type => $config) {
        $labels = [
            'name'               => _x($config['plural'], 'Post Type General Name', 'feisty-unicorn'),
            'singular_name'      => _x($config['singular'], 'Post Type Singular Name', 'feisty-unicorn'),
            'menu_name'          => __($config['plural'], 'feisty-unicorn'),
            'name_admin_bar'     => __($config['singular'], 'feisty-unicorn'),
            'add_new'            => __('Add New', 'feisty-unicorn'),
            'add_new_item'       => sprintf(__('Add New %s', 'feisty-unicorn'), $config['singular']),
            'edit_item'          => sprintf(__('Edit %s', 'feisty-unicorn'), $config['singular']),
            'new_item'           => sprintf(__('New %s', 'feisty-unicorn'), $config['singular']),
            'view_item'          => sprintf(__('View %s', 'feisty-unicorn'), $config['singular']),
            'view_items'         => sprintf(__('View %s', 'feisty-unicorn'), $config['plural']),
            'search_items'       => sprintf(__('Search %s', 'feisty-unicorn'), $config['plural']),
            'not_found'          => __('Not found', 'feisty-unicorn'),
            'not_found_in_trash' => __('Not found in Trash', 'feisty-unicorn'),
        ];

        $supports = ['title', 'editor', 'thumbnail', 'excerpt'];
        if ('fuch_testimonial' === $type) {
            $supports = ['title', 'editor'];
        }

        register_post_type($type, [
            'label'               => __($config['plural'], 'feisty-unicorn'),
            'description'         => sprintf(__('%s for Feisty Unicorn Coffee House site sections.', 'feisty-unicorn'), $config['plural']),
            'labels'              => $labels,
            'supports'            => $supports,
            'taxonomies'          => [],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 20,
            'menu_icon'           => $config['icon'],
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => false,
            'show_in_rest'        => true,
            'rewrite'             => false,
        ]);
    }
}
add_action('init', 'fuch_register_cpts');

/**
 * Meta boxes
 */
function fuch_register_meta_boxes() {
    add_meta_box('fuch_drink_meta', __('Drink Details', 'feisty-unicorn'), 'fuch_render_drink_meta', 'fuch_drink', 'normal', 'default');
    add_meta_box('fuch_testimonial_meta', __('Testimonial Details', 'feisty-unicorn'), 'fuch_render_testimonial_meta', 'fuch_testimonial', 'normal', 'default');
    add_meta_box('fuch_event_meta', __('Event Details', 'feisty-unicorn'), 'fuch_render_event_meta', 'fuch_event', 'normal', 'default');
}
add_action('add_meta_boxes', 'fuch_register_meta_boxes');

function fuch_render_drink_meta($post) {
    wp_nonce_field('fuch_save_drink_meta', 'fuch_drink_nonce');
    $tagline = get_post_meta($post->ID, '_fuch_drink_tagline', true);
    $price   = get_post_meta($post->ID, '_fuch_drink_price', true);
    $flavor  = get_post_meta($post->ID, '_fuch_drink_flavor', true);
    ?>
    <p>
        <label for="fuch_drink_tagline"><strong><?php esc_html_e('Tagline', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_drink_tagline" name="fuch_drink_tagline" value="<?php echo esc_attr($tagline); ?>" class="widefat" />
    </p>
    <p>
        <label for="fuch_drink_price"><strong><?php esc_html_e('Price', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_drink_price" name="fuch_drink_price" value="<?php echo esc_attr($price); ?>" class="widefat" />
    </p>
    <p>
        <label for="fuch_drink_flavor"><strong><?php esc_html_e('Flavor / Format', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_drink_flavor" name="fuch_drink_flavor" value="<?php echo esc_attr($flavor); ?>" class="widefat" />
    </p>
    <?php
}

function fuch_render_testimonial_meta($post) {
    wp_nonce_field('fuch_save_testimonial_meta', 'fuch_testimonial_nonce');
    $title  = get_post_meta($post->ID, '_fuch_testimonial_title', true);
    $rating = get_post_meta($post->ID, '_fuch_testimonial_rating', true);
    ?>
    <p>
        <label for="fuch_testimonial_title"><strong><?php esc_html_e('Role / Attribution', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_testimonial_title" name="fuch_testimonial_title" value="<?php echo esc_attr($title); ?>" class="widefat" />
    </p>
    <p>
        <label for="fuch_testimonial_rating"><strong><?php esc_html_e('Rating (1-5)', 'feisty-unicorn'); ?></strong></label><br />
        <input type="number" min="1" max="5" id="fuch_testimonial_rating" name="fuch_testimonial_rating" value="<?php echo esc_attr($rating); ?>" />
    </p>
    <?php
}

function fuch_render_event_meta($post) {
    wp_nonce_field('fuch_save_event_meta', 'fuch_event_nonce');
    $date     = get_post_meta($post->ID, '_fuch_event_date', true);
    $location = get_post_meta($post->ID, '_fuch_event_location', true);
    $cta      = get_post_meta($post->ID, '_fuch_event_cta_label', true);
    $url      = get_post_meta($post->ID, '_fuch_event_cta_url', true);
    ?>
    <p>
        <label for="fuch_event_date"><strong><?php esc_html_e('Event Date', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_event_date" name="fuch_event_date" value="<?php echo esc_attr($date); ?>" class="widefat" placeholder="Oct 31, 2025" />
    </p>
    <p>
        <label for="fuch_event_location"><strong><?php esc_html_e('Location', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_event_location" name="fuch_event_location" value="<?php echo esc_attr($location); ?>" class="widefat" />
    </p>
    <p>
        <label for="fuch_event_cta_label"><strong><?php esc_html_e('CTA Label', 'feisty-unicorn'); ?></strong></label><br />
        <input type="text" id="fuch_event_cta_label" name="fuch_event_cta_label" value="<?php echo esc_attr($cta); ?>" class="widefat" />
    </p>
    <p>
        <label for="fuch_event_cta_url"><strong><?php esc_html_e('CTA URL', 'feisty-unicorn'); ?></strong></label><br />
        <input type="url" id="fuch_event_cta_url" name="fuch_event_cta_url" value="<?php echo esc_attr($url); ?>" class="widefat" />
    </p>
    <?php
}

function fuch_save_drink_meta($post_id) {
    if (!isset($_POST['fuch_drink_nonce']) || !wp_verify_nonce($_POST['fuch_drink_nonce'], 'fuch_save_drink_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = [
        '_fuch_drink_tagline' => sanitize_text_field($_POST['fuch_drink_tagline'] ?? ''),
        '_fuch_drink_price'   => sanitize_text_field($_POST['fuch_drink_price'] ?? ''),
        '_fuch_drink_flavor'  => sanitize_text_field($_POST['fuch_drink_flavor'] ?? ''),
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }
}
add_action('save_post_fuch_drink', 'fuch_save_drink_meta');

function fuch_save_testimonial_meta($post_id) {
    if (!isset($_POST['fuch_testimonial_nonce']) || !wp_verify_nonce($_POST['fuch_testimonial_nonce'], 'fuch_save_testimonial_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $title  = sanitize_text_field($_POST['fuch_testimonial_title'] ?? '');
    $rating = isset($_POST['fuch_testimonial_rating']) ? min(5, max(1, (int) $_POST['fuch_testimonial_rating'])) : '';

    update_post_meta($post_id, '_fuch_testimonial_title', $title);
    update_post_meta($post_id, '_fuch_testimonial_rating', $rating);
}
add_action('save_post_fuch_testimonial', 'fuch_save_testimonial_meta');

function fuch_save_event_meta($post_id) {
    if (!isset($_POST['fuch_event_nonce']) || !wp_verify_nonce($_POST['fuch_event_nonce'], 'fuch_save_event_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = [
        '_fuch_event_date'     => sanitize_text_field($_POST['fuch_event_date'] ?? ''),
        '_fuch_event_location' => sanitize_text_field($_POST['fuch_event_location'] ?? ''),
        '_fuch_event_cta_label'=> sanitize_text_field($_POST['fuch_event_cta_label'] ?? ''),
        '_fuch_event_cta_url'  => esc_url_raw($_POST['fuch_event_cta_url'] ?? ''),
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }
}
add_action('save_post_fuch_event', 'fuch_save_event_meta');
