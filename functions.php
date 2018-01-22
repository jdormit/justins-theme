<?php
function justins_theme_load_scripts() {
    wp_enqueue_style('justins_theme_style', get_stylesheet_uri());
    wp_enqueue_style('grid', get_theme_file_uri('/css/grid.css'));
}
add_action('wp_enqueue_scripts', 'justins_theme_load_scripts');
?>