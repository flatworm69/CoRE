<?php
/**
 * Feisty Unicorn Coffee House WordPress Theme functions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once get_template_directory() . '/inc/template-data.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Theme setup
 */
function fuch_theme_setup() {
    load_theme_textdomain('feisty-unicorn', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    add_theme_support('editor-styles');
    add_editor_style('assets/css/theme.css');

    register_nav_menus([
        'primary' => __('Primary Menu', 'feisty-unicorn'),
        'footer'  => __('Footer Menu', 'feisty-unicorn'),
    ]);
}
add_action('after_setup_theme', 'fuch_theme_setup');

/**
 * Register widget area
 */
function fuch_widgets_init() {
    register_sidebar([
        'name'          => __('Footer Newsletter', 'feisty-unicorn'),
        'id'            => 'footer-newsletter',
        'description'   => __('Add widgets here to appear in the footer beside the newsletter form.', 'feisty-unicorn'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'fuch_widgets_init');

/**
 * Enqueue scripts and styles
 */
function fuch_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'fuch-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Raleway:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'feisty-unicorn-theme',
        get_template_directory_uri() . '/assets/css/theme.css',
        ['fuch-fonts'],
        filemtime(get_template_directory() . '/assets/css/theme.css')
    );

    wp_enqueue_script(
        'feisty-unicorn-theme',
        get_template_directory_uri() . '/assets/js/theme.js',
        [],
        filemtime(get_template_directory() . '/assets/js/theme.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'fuch_enqueue_assets');

/**
 * Register block styles and pattern categories.
 */
function fuch_register_block_support() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category('fuch-brand', [
            'label' => __('Feisty Unicorn Brand', 'feisty-unicorn'),
        ]);
    }
}
add_action('init', 'fuch_register_block_support');

