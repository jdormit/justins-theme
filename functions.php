<?php
function justins_theme_setup() {
    add_theme_support('custom-logo', [
        'width' => 100,
        'height' => 100,
        'flex-width' => true
    ]);
    add_theme_support('post-thumbnails');
    add_image_size('listing-thumb', 230, 230, true);
    add_image_size('category-thumb', 400, 400, true);
}

function justins_theme_load_scripts() {
    wp_enqueue_style('justins_theme_style', get_stylesheet_uri());
    wp_enqueue_style('grid', get_theme_file_uri('/css/grid.css'));
}

function justins_theme_init() {
    register_nav_menus([
        'header_menu' => __('Header Menu')
    ]);
}

add_action('after_setup_theme', 'justins_theme_setup');
add_action('wp_enqueue_scripts', 'justins_theme_load_scripts');
add_action('init', 'justins_theme_init');
?>