<?php
/**
 * Adds Customizer controls for key marketing content.
 */

if (!defined('ABSPATH')) {
    exit;
}

function fuch_customize_register($wp_customize) {
    $defaults = fuch_default_brand_copy();

    $wp_customize->add_section('fuch_brand_hero', [
        'title'       => __('Hero & Announcement', 'feisty-unicorn'),
        'priority'    => 30,
        'description' => __('Update the marquee copy that appears above the fold on the homepage.', 'feisty-unicorn'),
    ]);

    $fields = [
        'announcement'       => ['label' => __('Announcement Bar Text', 'feisty-unicorn'), 'type' => 'text'],
        'hero_kicker'        => ['label' => __('Hero Kicker', 'feisty-unicorn'), 'type' => 'text'],
        'hero_title'         => ['label' => __('Hero Title', 'feisty-unicorn'), 'type' => 'text'],
        'hero_subtitle'      => ['label' => __('Hero Subtitle', 'feisty-unicorn'), 'type' => 'textarea'],
        'hero_cta_text'      => ['label' => __('Primary CTA Label', 'feisty-unicorn'), 'type' => 'text'],
        'hero_cta_url'       => ['label' => __('Primary CTA URL', 'feisty-unicorn'), 'type' => 'url'],
        'hero_secondary_text'=> ['label' => __('Secondary CTA Label', 'feisty-unicorn'), 'type' => 'text'],
        'hero_secondary_url' => ['label' => __('Secondary CTA URL', 'feisty-unicorn'), 'type' => 'url'],
    ];

    foreach ($fields as $key => $config) {
        $sanitize = 'sanitize_text_field';
        if ('textarea' === $config['type']) {
            $sanitize = 'wp_kses_post';
        } elseif ('url' === $config['type']) {
            $sanitize = 'esc_url_raw';
        }

        $wp_customize->add_setting("fuch_{$key}", [
            'default'           => $defaults[$key] ?? '',
            'sanitize_callback' => $sanitize,
            'transport'         => 'postMessage',
        ]);

        $control_args = [
            'label'    => $config['label'],
            'section'  => 'fuch_brand_hero',
            'settings' => "fuch_{$key}",
            'type'     => $config['type'],
        ];

        if ('url' === $config['type']) {
            $control_args['type'] = 'url';
            $wp_customize->add_control(new WP_Customize_URL_Control($wp_customize, "fuch_{$key}", $control_args));
        } elseif ('textarea' === $config['type']) {
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, "fuch_{$key}", array_merge($control_args, [
                'type' => 'textarea',
            ])));
        } else {
            $wp_customize->add_control("fuch_{$key}", $control_args);
        }
    }

    $wp_customize->add_section('fuch_footer_contact', [
        'title'       => __('Footer Contact', 'feisty-unicorn'),
        'priority'    => 40,
        'description' => __('Contact details shown in the footer contact card.', 'feisty-unicorn'),
    ]);

    $footer_fields = [
        'fuch_contact_email' => ['label' => __('Contact Email', 'feisty-unicorn'), 'default' => 'hello@feistyunicorn.coffee'],
        'fuch_contact_phone' => ['label' => __('Contact Phone', 'feisty-unicorn'), 'default' => '+1 (555) 555-UNIC'],
        'fuch_contact_address' => ['label' => __('Mailing Address', 'feisty-unicorn'), 'default' => "1234 Mythic Ave\nSuite U\nLos Angeles, CA 90028"],
        'fuch_contact_hours' => ['label' => __('Support Hours', 'feisty-unicorn'), 'default' => "Mon–Fri: 7a-6p PT\nSat–Sun: 9a-2p PT"],
    ];

    foreach ($footer_fields as $id => $config) {
        $wp_customize->add_setting($id, [
            'default'           => $config['default'],
            'sanitize_callback' => 'wp_kses_post',
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, $id, [
            'label'    => $config['label'],
            'section'  => 'fuch_footer_contact',
            'settings' => $id,
            'type'     => 'textarea',
        ]));
    }
}
add_action('customize_register', 'fuch_customize_register');
