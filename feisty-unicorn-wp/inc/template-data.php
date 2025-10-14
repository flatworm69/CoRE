<?php
/**
 * Default copy + structured data used across template parts.
 */

if (!defined('ABSPATH')) {
    exit;
}

function fuch_default_brand_copy() {
    return [
        'announcement' => __('Wake the FUCH Up! New drops of Wake the FUCH Up! Dark Roast ship weekly. Limited roast badges incoming.', 'feisty-unicorn'),
        'hero_kicker'  => __('Caffeine + Chaos + Charm', 'feisty-unicorn'),
        'hero_title'   => __('Feisty Unicorn Coffee House', 'feisty-unicorn'),
        'hero_subtitle'=> __('Nerdcore-fueled beans, punk rock vibes, and limited-batch merch roasted with private-label partners you can trust.', 'feisty-unicorn'),
        'hero_cta_text'=> __('Shop Wake the FUCH Up! Beans', 'feisty-unicorn'),
        'hero_cta_url' => '#shop',
        'hero_secondary_text' => __('Preview the FUCH Arcade', 'feisty-unicorn'),
        'hero_secondary_url'  => '#arcade',
    ];
}

function fuch_default_pillars() {
    return [
        [
            'title'       => __('Private-Label Wizardry', 'feisty-unicorn'),
            'description' => __('Temecula Coffee Roasters roast-to-order beans with our feisty unicorn QA ritual so every bag lands fresh and flavorful.', 'feisty-unicorn'),
            'icon'        => '🧙‍♀️',
        ],
        [
            'title'       => __('Nerdcore Brand Energy', 'feisty-unicorn'),
            'description' => __('Caffeine chaos meets arcade nostalgia—collectible art drops, playful copy, and community-powered storytelling.', 'feisty-unicorn'),
            'icon'        => '⚡️',
        ],
        [
            'title'       => __('Omnichannel Ready', 'feisty-unicorn'),
            'description' => __('Built for online bean drops today with a roadmap for a hybrid escape room + cafe flagship tomorrow.', 'feisty-unicorn'),
            'icon'        => '🌐',
        ],
    ];
}

function fuch_default_drinks() {
    return [
        [
            'title'       => __('Wake the FUCH Up! Dark Roast', 'feisty-unicorn'),
            'tagline'     => __('Brooding, bold, battle-ready.', 'feisty-unicorn'),
            'description' => __('Velvety dark chocolate, toasted pecan, and midnight caramel riding a rocket-powered unicorn. Whole bean or drip grind.', 'feisty-unicorn'),
            'price'       => __('$25', 'feisty-unicorn'),
            'flavor'      => __('Dark Roast · 12oz', 'feisty-unicorn'),
        ],
        [
            'title'       => __('Chaotic Good Chai', 'feisty-unicorn'),
            'tagline'     => __('Spiced pixel potion.', 'feisty-unicorn'),
            'description' => __('Cardamom thunderbolts, vanilla lightning, and ginger heat swirling in a creamy crescendo. Pairs with oat or whole milk.', 'feisty-unicorn'),
            'price'       => __('$6', 'feisty-unicorn'),
            'flavor'      => __('Signature Drink · Café special', 'feisty-unicorn'),
        ],
        [
            'title'       => __('Level Up Latte', 'feisty-unicorn'),
            'tagline'     => __('Power-up caramel boost.', 'feisty-unicorn'),
            'description' => __('Butterscotch mana, espresso XP shots, and sparkling amethyst sprinkles—your daily quest complete.', 'feisty-unicorn'),
            'price'       => __('$6', 'feisty-unicorn'),
            'flavor'      => __('Seasonal · Available iced', 'feisty-unicorn'),
        ],
        [
            'title'       => __('Mythic Matcha', 'feisty-unicorn'),
            'tagline'     => __('Vibrant jade focus.', 'feisty-unicorn'),
            'description' => __('Ceremonial-grade matcha fused with pandan vanilla cream and a spark of yuzu zest for a neon green thrill ride.', 'feisty-unicorn'),
            'price'       => __('$6.50', 'feisty-unicorn'),
            'flavor'      => __('Plant Powered · 100% vegan', 'feisty-unicorn'),
        ],
    ];
}

function fuch_default_testimonials() {
    return [
        [
            'quote'  => __('“Wake the FUCH Up! tastes like a boss battle victory. I haven’t missed a deadline since.”', 'feisty-unicorn'),
            'name'   => __('Alex “Patch Notes” Rivera', 'feisty-unicorn'),
            'title'  => __('Lead Game Designer, Pixel Pilots', 'feisty-unicorn'),
            'rating' => 5,
        ],
        [
            'quote'  => __('“The nerdcore branding sells itself. We stock Feisty Unicorn in our escape room lounge and it flies off the shelves.”', 'feisty-unicorn'),
            'name'   => __('Maris Doty', 'feisty-unicorn'),
            'title'  => __('Co-Founder, FUCH', 'feisty-unicorn'),
            'rating' => 5,
        ],
        [
            'quote'  => __('“Finally—a dropship coffee brand with memes, merchandise, and quality beans we’re proud to serve.”', 'feisty-unicorn'),
            'name'   => __('Jordan Kim', 'feisty-unicorn'),
            'title'  => __('Owner, The Quest Hub Café', 'feisty-unicorn'),
            'rating' => 5,
        ],
    ];
}

function fuch_default_events() {
    return [
        [
            'title'       => __('FUCH Arcade Launch Night', 'feisty-unicorn'),
            'date'        => __('Aug 16, 2025', 'feisty-unicorn'),
            'location'    => __('Twitch + Discord simulcast', 'feisty-unicorn'),
            'description' => __('Speedrun the new mascot runner, unlock merch drops, and snag early-bird bean subscriptions.', 'feisty-unicorn'),
            'cta_label'   => __('RSVP on Luma', 'feisty-unicorn'),
            'cta_url'     => 'https://lu.ma/',
        ],
        [
            'title'       => __('Pop-Up Brew Lab', 'feisty-unicorn'),
            'date'        => __('Sept 7, 2025', 'feisty-unicorn'),
            'location'    => __('Los Angeles — Secret Warehouse', 'feisty-unicorn'),
            'description' => __('Immersive tasting room with escape-room puzzles, latte art battles, and matcha glow bar.', 'feisty-unicorn'),
            'cta_label'   => __('Join the waitlist', 'feisty-unicorn'),
            'cta_url'     => '#newsletter',
        ],
    ];
}

function fuch_default_partners() {
    return [
        [
            'name'        => __('Temecula Coffee Roasters', 'feisty-unicorn'),
            'summary'     => __('US-based roaster handling roast-to-order, packaging, and dropship fulfillment with private-label flexibility.', 'feisty-unicorn'),
            'services'    => [__('Private label beans', 'feisty-unicorn'), __('Dropship fulfillment', 'feisty-unicorn'), __('Custom packaging', 'feisty-unicorn')],
            'cta_label'   => __('Review labeling guide', 'feisty-unicorn'),
            'cta_url'     => 'https://temeculacoffeeroasters.com/pages/label-template',
        ],
        [
            'name'        => __('Dripshipper (Shopify App)', 'feisty-unicorn'),
            'summary'     => __('On-demand roasting, Shopify integration, and fast delivery windows for subscription bean clubs.', 'feisty-unicorn'),
            'services'    => [__('Automated fulfillment', 'feisty-unicorn'), __('Coffee & tea catalog', 'feisty-unicorn'), __('Brand-ready packaging', 'feisty-unicorn')],
            'cta_label'   => __('Compare membership tiers', 'feisty-unicorn'),
            'cta_url'     => 'https://apps.shopify.com/dripshipper',
        ],
        [
            'name'        => __('Limini Coffee (UK)', 'feisty-unicorn'),
            'summary'     => __('Roast, white-label, and ship across the UK with optional tea, chocolate, and espresso gear.', 'feisty-unicorn'),
            'services'    => [__('UK dropshipping', 'feisty-unicorn'), __('Training & barista kits', 'feisty-unicorn'), __('Wholesale pricing', 'feisty-unicorn')],
            'cta_label'   => __('Read dropship details', 'feisty-unicorn'),
            'cta_url'     => 'https://www.limicoffee.co.uk/',
        ],
    ];
}

function fuch_default_merch() {
    return [
        [
            'title'       => __('FUCH Punk Unicorn Tee', 'feisty-unicorn'),
            'description' => __('Vintage 90s neon palette, front pocket logo, back print “Wake the FUCH Up!”.', 'feisty-unicorn'),
            'price'       => __('$32', 'feisty-unicorn'),
        ],
        [
            'title'       => __('Arcade Token Enamel Pins', 'feisty-unicorn'),
            'description' => __('Set of three glow-in-the-dark pins celebrating Feisty Unicorn mascot poses.', 'feisty-unicorn'),
            'price'       => __('$18', 'feisty-unicorn'),
        ],
        [
            'title'       => __('FUCH Travel Mug', 'feisty-unicorn'),
            'description' => __('Insulated tumbler with “Get FUCH’d” etching and holographic unicorn art.', 'feisty-unicorn'),
            'price'       => __('$28', 'feisty-unicorn'),
        ],
    ];
}

function fuch_theme_mod($name, $default) {
    $value = get_theme_mod($name);
    if (empty($value)) {
        return $default;
    }
    return $value;
}
