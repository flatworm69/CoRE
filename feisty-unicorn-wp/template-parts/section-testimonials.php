<?php
$testimonials_query = get_posts([
    'post_type'      => 'fuch_testimonial',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

if (!empty($testimonials_query)) {
    $testimonials = array_map(function ($post) {
        return [
            'quote' => apply_filters('the_content', $post->post_content),
            'name'  => get_the_title($post),
            'title' => get_post_meta($post->ID, '_fuch_testimonial_title', true),
            'rating'=> (int) get_post_meta($post->ID, '_fuch_testimonial_rating', true),
        ];
    }, $testimonials_query);
} else {
    $testimonials = fuch_default_testimonials();
}
?>
<section class="testimonials" id="testimonials" data-slider>
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Testimonials', 'feisty-unicorn'); ?></h2>
        <div class="testimonials__slider">
            <?php foreach ($testimonials as $index => $testimonial) : ?>
                <blockquote class="testimonial<?php echo 0 === $index ? ' is-active' : ''; ?>">
                    <p><?php
                    $quote = is_array($testimonial['quote']) ? implode('', $testimonial['quote']) : $testimonial['quote'];
                    if (strpos($quote, '<p') === false) {
                        $quote = wpautop($quote);
                    }
                    echo wp_kses_post($quote);
                    ?></p>
                    <footer>
                        <cite><?php echo esc_html($testimonial['name']); ?></cite>
                        <?php if (!empty($testimonial['title'])) : ?>
                            <div class="testimonial__meta"><?php echo esc_html($testimonial['title']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($testimonial['rating'])) : ?>
                            <div class="testimonial__rating" aria-label="<?php echo esc_attr(sprintf(__('Rated %s out of 5', 'feisty-unicorn'), $testimonial['rating'])); ?>">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <span><?php echo $i < $testimonial['rating'] ? '★' : '☆'; ?></span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </footer>
                </blockquote>
            <?php endforeach; ?>
        </div>
    </div>
</section>
