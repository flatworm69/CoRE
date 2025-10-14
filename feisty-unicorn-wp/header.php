<?php
/**
 * The header for the theme.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $brand_copy = fuch_default_brand_copy(); ?>
<div class="announcement-bar">
    <div class="container">
        <span><?php echo esc_html(fuch_theme_mod('fuch_announcement', $brand_copy['announcement'])); ?></span>
    </div>
</div>
<header class="site-header">
    <div class="container">
        <div class="brand">
            <a class="brand__link" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="brand__icon">🦄</span>
                <span class="brand__text">
                    <span class="brand__name"><?php bloginfo('name'); ?></span>
                    <span class="brand__tagline"><?php echo esc_html__('Caffeine + Chaos + Charm', 'feisty-unicorn'); ?></span>
                </span>
            </a>
        </div>
        <nav id="primary-menu" class="site-nav" aria-label="<?php esc_attr_e('Primary navigation', 'feisty-unicorn'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class'     => 'menu',
                'container'      => false,
                'fallback_cb'    => function () {
                    echo '<ul class="menu"><li><a href="#shop">' . esc_html__('Shop', 'feisty-unicorn') . '</a></li><li><a href="#arcade">' . esc_html__('Arcade', 'feisty-unicorn') . '</a></li><li><a href="#partners">' . esc_html__('Partners', 'feisty-unicorn') . '</a></li><li><a href="#events">' . esc_html__('Events', 'feisty-unicorn') . '</a></li></ul>';
                },
            ]);
            ?>
        </nav>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="visually-hidden"><?php esc_html_e('Toggle navigation', 'feisty-unicorn'); ?></span>
        </button>
    </div>
</header>
<main id="main" class="site-main">
