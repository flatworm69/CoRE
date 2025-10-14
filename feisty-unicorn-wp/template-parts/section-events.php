<?php
$events_query = get_posts([
    'post_type'      => 'fuch_event',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

if (!empty($events_query)) {
    $events = array_map(function ($post) {
        return [
            'title'       => get_the_title($post),
            'description' => apply_filters('the_content', $post->post_content),
            'date'        => get_post_meta($post->ID, '_fuch_event_date', true),
            'location'    => get_post_meta($post->ID, '_fuch_event_location', true),
            'cta_label'   => get_post_meta($post->ID, '_fuch_event_cta_label', true),
            'cta_url'     => get_post_meta($post->ID, '_fuch_event_cta_url', true),
        ];
    }, $events_query);
} else {
    $events = fuch_default_events();
}
?>
<section class="events" id="events">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Launch Events & Activations', 'feisty-unicorn'); ?></h2>
        <div class="events__list">
            <?php foreach ($events as $event) : ?>
                <article class="event">
                    <?php if (!empty($event['date'])) : ?>
                        <span class="event__date"><?php echo esc_html($event['date']); ?></span>
                    <?php endif; ?>
                    <h3><?php echo esc_html($event['title']); ?></h3>
                    <?php if (!empty($event['location'])) : ?>
                        <p class="event__location"><?php echo esc_html($event['location']); ?></p>
                    <?php endif; ?>
                    <div class="event__description">
                        <?php
                        $description = is_array($event['description']) ? implode('', $event['description']) : $event['description'];
                        if (strpos($description, '<p') === false) {
                            $description = wpautop($description);
                        }
                        echo wp_kses_post($description);
                        ?>
                    </div>
                    <?php if (!empty($event['cta_label']) && !empty($event['cta_url'])) : ?>
                        <a class="button button--ghost" href="<?php echo esc_url($event['cta_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($event['cta_label']); ?></a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="events__cta">
            <a class="button button--primary" href="#newsletter"><?php esc_html_e('Get Event Alerts', 'feisty-unicorn'); ?></a>
        </div>
    </div>
</section>
