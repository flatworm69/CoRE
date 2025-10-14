<?php
$copy = fuch_default_brand_copy();
$kicker = fuch_theme_mod('fuch_hero_kicker', $copy['hero_kicker']);
$title = fuch_theme_mod('fuch_hero_title', $copy['hero_title']);
$subtitle = fuch_theme_mod('fuch_hero_subtitle', $copy['hero_subtitle']);
$primary_label = fuch_theme_mod('fuch_hero_cta_text', $copy['hero_cta_text']);
$primary_url = fuch_theme_mod('fuch_hero_cta_url', $copy['hero_cta_url']);
$secondary_label = fuch_theme_mod('fuch_hero_secondary_text', $copy['hero_secondary_text']);
$secondary_url = fuch_theme_mod('fuch_hero_secondary_url', $copy['hero_secondary_url']);
?>
<section class="hero" id="home">
    <div class="container hero__content">
        <div class="hero__copy">
            <span class="hero__eyebrow"><?php echo esc_html($kicker); ?></span>
            <h1 class="hero__title"><?php echo esc_html($title); ?></h1>
            <p class="hero__subtitle"><?php echo wp_kses_post($subtitle); ?></p>
            <div class="hero__acronym">
                <strong><?php esc_html_e('Get FUCH’d:', 'feisty-unicorn'); ?></strong> <?php esc_html_e('Feisty Unicorn Coffee House fuels your quests with Wake the FUCH Up! flagship beans and chaotic-good beverages.', 'feisty-unicorn'); ?>
            </div>
            <div class="hero__actions">
                <a class="button button--primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_label); ?></a>
                <?php if ($secondary_label && $secondary_url) : ?>
                    <a class="button button--ghost" href="<?php echo esc_url($secondary_url); ?>"><?php echo esc_html($secondary_label); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero__media">
            <div class="hero__feature">
                <span class="hero__badge"><?php esc_html_e('Featured Roast', 'feisty-unicorn'); ?></span>
                <h3><?php esc_html_e('Wake the FUCH Up! Dark Roast', 'feisty-unicorn'); ?></h3>
                <p class="hero__blurb"><?php esc_html_e('Private-label beans roasted with Temecula Coffee Roasters, packaged in compliance with their label guide, and shipped dropship-fast.', 'feisty-unicorn'); ?></p>
            </div>
            <figure class="hero__art">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-art-placeholder.svg'); ?>" alt="<?php esc_attr_e('Feisty Unicorn Coffee hero illustration', 'feisty-unicorn'); ?>">
                <figcaption class="hero__art-caption"><?php esc_html_e('Artwork: Punk unicorn mascot leading the caffeine charge.', 'feisty-unicorn'); ?></figcaption>
            </figure>
        </div>
    </div>
</section>
