<?php
function justins_theme_setup() {
    add_theme_support('custom-logo', [
        'width' => 150,
        'height' => 150,
        'flex-width' => true
    ]);
    add_theme_support('post-thumbnails');
    add_image_size('listing-thumb', 230, 230, true);
    add_image_size('category-thumb', 400, 400, true);
    add_filter('image_size_names_to_choose', 'justins_theme_register_image_sizes');
}

function justins_theme_register_image_sizes($sizes) {
    return array_merge($sizes, [
        'listing-thumb' => __('230px square thumbnail'),
        'category-thumb' => __('400px square thumbnail')
    ]);
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