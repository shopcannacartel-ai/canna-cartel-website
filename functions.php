<?php
/** Canna Cartel Unified — theme setup. */
if (!defined('ABSPATH')) { exit; }

function ccu_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height' => 320, 'width' => 720, 'flex-width' => true, 'flex-height' => true));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    register_nav_menus(array('primary' => __('Primary navigation', 'canna-cartel-unified')));
}
add_action('after_setup_theme', 'ccu_theme_setup');

function ccu_enqueue_assets() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ccu-main', get_theme_file_uri('main.css'), array(), $version);
    wp_enqueue_script('ccu-menu', get_theme_file_uri('main.js'), array(), $version, true);
}
add_action('wp_enqueue_scripts', 'ccu_enqueue_assets');

function ccu_url($path) { return home_url('/' . ltrim($path, '/')); }

function ccu_navigation_fallback() {
    $links = array(
        array('Home', '/'), array('Membership', '/membership/'), array('About', '/about/'),
        array('Education & FAQ', '/frequently-asked-questions/'),
        array('Updates', '/member-updates-and-competitions/'),
        array('Shop · Still in Harvest', '/shop/'), array('Help', '/help-and-contact/')
    );
    echo '<ul class="ccu-menu">';
    foreach ($links as $item) {
        echo '<li><a href="' . esc_url(ccu_url($item[1])) . '">' . esc_html($item[0]) . '</a></li>';
    }
    echo '</ul>';
}

/** Render only the exact approved logo that an administrator uploads to WordPress. */
function ccu_logo($size = 'header') {
    if (has_custom_logo()) {
        $class = $size === 'hero' ? 'ccu-hero-logo' : 'ccu-header-logo';
        echo '<div class="' . esc_attr($class) . '">';
        the_custom_logo();
        echo '</div>';
    } else {
        echo '<a class="ccu-logo-unset" href="' . esc_url(home_url('/')) . '">'
            . esc_html__('CANNA CARTEL 420', 'canna-cartel-unified') . '</a>';
    }
}

function ccu_asset($filename) {
    return get_template_directory_uri() . '/assets/images/' . rawurlencode($filename);
}

/** Add safely-scoped body class; do not interfere with existing account functionality. */
add_filter('body_class', function($classes) { $classes[] = 'ccu-site'; return $classes; });
