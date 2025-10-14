<?php
/**
 * Footer template
 */
?>
</main>
<footer class="site-footer" id="contact">
    <div class="container site-footer__grid">
        <div class="site-footer__brand">
            <h2 class="site-footer__title"><?php bloginfo('name'); ?></h2>
            <p><?php bloginfo('description'); ?></p>
            <ul class="social-links">
                <li><a href="https://instagram.com/feistyunicorncoffee" aria-label="Instagram"><span aria-hidden="true">📸</span><span class="visually-hidden"><?php esc_html_e('Instagram', 'feisty-unicorn'); ?></span></a></li>
                <li><a href="https://tiktok.com/@feistyunicorncoffee" aria-label="TikTok"><span aria-hidden="true">🎵</span><span class="visually-hidden"><?php esc_html_e('TikTok', 'feisty-unicorn'); ?></span></a></li>
                <li><a href="https://discord.gg/feistyunicorn" aria-label="Discord"><span aria-hidden="true">🕹️</span><span class="visually-hidden"><?php esc_html_e('Discord', 'feisty-unicorn'); ?></span></a></li>
            </ul>
        </div>
        <div class="site-footer__contact">
            <h3 class="site-footer__title"><?php esc_html_e('Reach Out', 'feisty-unicorn'); ?></h3>
            <p><strong><?php esc_html_e('Email', 'feisty-unicorn'); ?>:</strong> <a href="mailto:<?php echo antispambot(get_theme_mod('fuch_contact_email', 'hello@feistyunicorn.coffee')); ?>"><?php echo esc_html(get_theme_mod('fuch_contact_email', 'hello@feistyunicorn.coffee')); ?></a></p>
            <p><strong><?php esc_html_e('Phone', 'feisty-unicorn'); ?>:</strong> <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', get_theme_mod('fuch_contact_phone', '+1 (555) 555-UNIC')); ?>"><?php echo esc_html(get_theme_mod('fuch_contact_phone', '+1 (555) 555-UNIC')); ?></a></p>
            <p><strong><?php esc_html_e('Address', 'feisty-unicorn'); ?>:</strong><br><?php echo wp_kses_post(nl2br(get_theme_mod('fuch_contact_address', "1234 Mythic Ave\nSuite U\nLos Angeles, CA 90028"))); ?></p>
            <p><strong><?php esc_html_e('Support Hours', 'feisty-unicorn'); ?>:</strong><br><?php echo wp_kses_post(nl2br(get_theme_mod('fuch_contact_hours', "Mon–Fri: 7a-6p PT\nSat–Sun: 9a-2p PT"))); ?></p>
        </div>
        <div class="newsletter">
            <h3 class="site-footer__title"><?php esc_html_e('Join the Chaos', 'feisty-unicorn'); ?></h3>
            <p><?php esc_html_e('Get beans, merch drops, and arcade release notes delivered weekly.', 'feisty-unicorn'); ?></p>
            <form class="newsletter__form" method="post" action="https://formsubmit.co/hello@feistyunicorn.coffee">
                <label class="visually-hidden" for="newsletter-email"><?php esc_html_e('Email address', 'feisty-unicorn'); ?></label>
                <input class="newsletter__input" type="email" id="newsletter-email" name="email" placeholder="<?php esc_attr_e('Email address', 'feisty-unicorn'); ?>" required>
                <button type="submit" class="button button--primary"><?php esc_html_e('Subscribe', 'feisty-unicorn'); ?></button>
            </form>
            <p class="newsletter__hint"><?php esc_html_e('By subscribing you agree to our caffeinated antics and privacy policy.', 'feisty-unicorn'); ?></p>
            <?php if (is_active_sidebar('footer-newsletter')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-newsletter'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="site-footer__nav">
            <h3 class="site-footer__title"><?php esc_html_e('Explore', 'feisty-unicorn'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'social-links',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved. Fuel responsibly.', 'feisty-unicorn'); ?></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
