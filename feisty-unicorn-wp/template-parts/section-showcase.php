<?php $merch = fuch_default_merch(); ?>
<section class="showcase" id="merch">
    <div class="container">
        <div class="showcase__intro">
            <span class="showcase__eyebrow"><?php esc_html_e('Merch & Collectibles', 'feisty-unicorn'); ?></span>
            <h2 class="section-title"><?php esc_html_e('Build the Feisty Unicorn Universe', 'feisty-unicorn'); ?></h2>
            <p class="showcase__copy"><?php esc_html_e('Pair the beans with punk unicorn merch drops, enamel pins, and travel mugs. Use these tiles as WooCommerce product teasers or link to your Shopify storefront while the WordPress theme powers marketing content.', 'feisty-unicorn'); ?></p>
        </div>
        <div class="showcase__grid">
            <?php foreach ($merch as $item) : ?>
                <article class="showcase__item">
                    <div class="showcase__media">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/merch-placeholder.svg'); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                    </div>
                    <div class="showcase__content">
                        <span class="showcase__tag"><?php esc_html_e('Coming Soon', 'feisty-unicorn'); ?></span>
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p class="showcase__notes"><?php echo esc_html($item['description']); ?></p>
                        <ul class="showcase__meta">
                            <li><?php esc_html_e('Estimated Price:', 'feisty-unicorn'); ?> <?php echo esc_html($item['price']); ?></li>
                            <li><?php esc_html_e('Preorder Interest Waitlist via ConvertKit Automations.', 'feisty-unicorn'); ?></li>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
