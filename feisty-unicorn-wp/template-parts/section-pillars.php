<?php $pillars = fuch_default_pillars(); ?>
<section class="pillars" id="pillars">
    <div class="container">
        <div class="pillars__intro">
            <span class="pillars__eyebrow"><?php esc_html_e('Brand Pillars', 'feisty-unicorn'); ?></span>
            <h2 class="section-title"><?php esc_html_e('What Makes Feisty Unicorn Different', 'feisty-unicorn'); ?></h2>
            <p class="pillars__copy"><?php esc_html_e('From private-label wizardry to nerdcore storytelling, the entire WordPress theme is tuned for a high-energy coffee brand that can evolve into a physical café + escape room destination.', 'feisty-unicorn'); ?></p>
        </div>
        <div class="pillars__grid">
            <?php foreach ($pillars as $pillar) : ?>
                <article class="pillars__card">
                    <span class="pillars__icon" aria-hidden="true"><?php echo esc_html($pillar['icon']); ?></span>
                    <h3><?php echo esc_html($pillar['title']); ?></h3>
                    <p class="pillars__tagline"><?php echo esc_html($pillar['description']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
