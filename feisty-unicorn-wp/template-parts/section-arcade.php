<section class="arcade" id="arcade">
    <div class="container">
        <div class="arcade__intro">
            <span class="arcade__eyebrow"><?php esc_html_e('Arcade Mini-Game', 'feisty-unicorn'); ?></span>
            <h2 class="section-title"><?php esc_html_e('FUCH Mascot Runner', 'feisty-unicorn'); ?></h2>
            <p class="arcade__copy"><?php esc_html_e('Tap or press space to make the feisty unicorn leap goblins, collect coffee beans, and climb the leaderboard. Embed on landing pages or deploy as a standalone promotional game.', 'feisty-unicorn'); ?></p>
        </div>
        <div class="arcade__canvas-wrap">
            <canvas data-arcade-canvas width="640" height="360" aria-label="Feisty Unicorn endless runner game"></canvas>
            <div class="arcade__hud">
                <span class="arcade__score" data-arcade-score><?php esc_html_e('Score: 0', 'feisty-unicorn'); ?></span>
                <button class="button button--primary" data-arcade-start type="button"><?php esc_html_e('Start Run', 'feisty-unicorn'); ?></button>
            </div>
            <p class="arcade__tip"><?php esc_html_e('Mobile ready: tap the canvas to jump. Desktop: press space or click.', 'feisty-unicorn'); ?></p>
        </div>
    </div>
</section>
