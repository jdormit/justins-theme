<?php
function justins_theme_register_image_sizes($sizes) {
    return array_merge($sizes, [
        'listing-thumb' => __('Medium thumbnail'),
        'category-thumb' => __('Large thumbnail'),
        'display' => __('Display')
    ]);
}

function justins_theme_setup() {
    add_theme_support('custom-logo', [
        'width' => 150,
        'height' => 150,
        'flex-width' => true
    ]);
    add_theme_support('post-thumbnails');
    add_image_size('listing-thumb', 230, 230, true);
    add_image_size('category-thumb', 400, 400, true);
    add_image_size('display', 720, 720);
    add_filter('image_size_names_choose', 'justins_theme_register_image_sizes');
    add_theme_support('title-tag');
}

function justins_theme_load_scripts() {
    wp_enqueue_style('normalize', get_theme_file_uri('/css/normalize.css'));
    wp_enqueue_style('fonts', get_theme_file_uri('/css/fonts.css'));
    wp_enqueue_style('justins_theme_style', get_stylesheet_uri());
}

function justins_theme_init() {
    register_nav_menus([
        'header_menu' => __('Header Menu')
    ]);
}

function justins_theme_customize_register($wp_customize) {
    $wp_customize->add_setting('copyright_holder');
    $wp_customize->add_setting('copyright_begin');
    $wp_customize->add_setting('copyright_end');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright_holder', [
        'label' => "Copyright holder",
        'section' => 'title_tagline'
    ]));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright_begin', [
        'label' => "Copyright begin date or year (optional)",
        'section' => 'title_tagline'
    ]));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright_end', [
        'label' => "Copyright end date or year (defaults to current year)",
        'section' => 'title_tagline'
    ]));
    $wp_customize->add_section('look_and_feel', [
        'title' => 'Look and Feel',
        'priority' => 30
    ]);
    $wp_customize->add_setting('font', [
        'default' => '"Open Sans", Helvetica, Arial, sans-serif'
    ]);
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'font', [
        'label' => "Font",
        'type' => 'select',
        'section' => 'look_and_feel',
        'choices' => [
            '"Weber Hand", "Helvetica Neue", Helvetica, Arial, sans-serif' => 'Weber Hand',
            '"Open Sans", Helvetica, Arial, sans-serif' => 'Open Sans',
            '"Noto Serif", "Times New Roman", serif' => 'Noto Serif'
        ]
    ]));
}

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');
add_action('after_setup_theme', 'justins_theme_setup');
add_action('wp_enqueue_scripts', 'justins_theme_load_scripts');
add_action('customize_register', 'justins_theme_customize_register');
add_action('init', 'justins_theme_init');
?>