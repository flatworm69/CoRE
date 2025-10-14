<?php
$drinks_query = get_posts([
    'post_type'      => 'fuch_drink',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

if (!empty($drinks_query)) {
    $drinks = array_map(function ($post) {
        return [
            'title'       => get_the_title($post),
            'tagline'     => get_post_meta($post->ID, '_fuch_drink_tagline', true),
            'description' => apply_filters('the_content', $post->post_content),
            'price'       => get_post_meta($post->ID, '_fuch_drink_price', true),
            'flavor'      => get_post_meta($post->ID, '_fuch_drink_flavor', true),
            'image'       => get_the_post_thumbnail_url($post, 'large'),
        ];
    }, $drinks_query);
} else {
    $drinks = fuch_default_drinks();
}
$placeholder_image = get_template_directory_uri() . '/assets/images/drink-placeholder.svg';
?>
<section class="menu" id="shop">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Signature Drinks & Beans', 'feisty-unicorn'); ?></h2>
        <p class="menu__intro"><?php esc_html_e('From dropship-friendly bagged beans to experiential café specials, every product leans into Feisty Unicorn’s nerdcore, punk-infused brand language.', 'feisty-unicorn'); ?></p>
        <div class="menu__grid">
            <?php foreach ($drinks as $drink) : ?>
                <article class="menu__item">
                    <header class="menu__header">
                        <h3><?php echo esc_html($drink['title']); ?></h3>
                        <?php if (!empty($drink['price'])) : ?>
                            <span class="menu__price"><?php echo esc_html($drink['price']); ?></span>
                        <?php endif; ?>
                    </header>
                    <?php if (!empty($drink['tagline'])) : ?>
                        <span class="menu__badge"><?php echo esc_html($drink['tagline']); ?></span>
                    <?php endif; ?>
                    <div class="menu__description">
                        <?php
                        $description = is_array($drink['description']) ? implode('', $drink['description']) : $drink['description'];
                        if (strpos($description, '<p') === false) {
                            $description = wpautop($description);
                        }
                        echo wp_kses_post($description);
                        ?>
                    </div>
                    <?php if (!empty($drink['flavor'])) : ?>
                        <p class="menu__flavor"><?php echo esc_html($drink['flavor']); ?></p>
                    <?php endif; ?>
                    <?php
                    $image = !empty($drink['image']) ? $drink['image'] : $placeholder_image;
                    ?>
                    <figure class="menu__art">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($drink['title']); ?>">
                    </figure>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
