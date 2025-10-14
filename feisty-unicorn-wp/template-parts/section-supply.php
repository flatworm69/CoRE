<?php $partners = fuch_default_partners(); ?>
<section class="supply" id="partners">
    <div class="container">
        <div class="supply__intro">
            <span class="supply__eyebrow"><?php esc_html_e('Dropship & Private Label', 'feisty-unicorn'); ?></span>
            <h2 class="section-title"><?php esc_html_e('Roasters & Fulfillment Allies', 'feisty-unicorn'); ?></h2>
            <p class="supply__copy"><?php esc_html_e('WordPress or Shopify, your beans still need world-class roasting. These partners align with the Feisty Unicorn go-to-market plan and have labeling docs ready.', 'feisty-unicorn'); ?></p>
        </div>
        <div class="supply__grid">
            <?php foreach ($partners as $partner) : ?>
                <article class="supply__card">
                    <div class="supply__card-header">
                        <h3><?php echo esc_html($partner['name']); ?></h3>
                        <span class="supply__badge"><?php esc_html_e('Preferred', 'feisty-unicorn'); ?></span>
                    </div>
                    <p class="supply__summary"><?php echo esc_html($partner['summary']); ?></p>
                    <ul class="supply__list">
                        <?php foreach ($partner['services'] as $service) : ?>
                            <li><?php echo esc_html($service); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="supply__footer">
                        <a class="button button--ghost" href="<?php echo esc_url($partner['cta_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($partner['cta_label']); ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="supply__disclaimer">
            <strong><?php esc_html_e('Compliance Reminder:', 'feisty-unicorn'); ?></strong> <?php esc_html_e('When dropshipping via Temecula Coffee Roasters list them as manufacturer/distributor as required, include net weight in ounces and grams, ingredients, roast level, and your business address.', 'feisty-unicorn'); ?>
        </div>
    </div>
</section>
