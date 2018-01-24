<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <style type="text/css">
         html {
             font-family: <?php echo get_theme_mod('font'); ?>;
         }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="pageHeader">
                <?php the_custom_logo(); ?>
                <?php wp_nav_menu(['theme_location' => 'header_menu', 'container_class' => 'menu']); ?>
            </header>

