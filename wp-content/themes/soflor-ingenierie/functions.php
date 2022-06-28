<?php

require_once('options/apparence.php');



function projet_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    //add_image_size('card-header', 350, 215, true);
}

function projet_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'); // enregistrement du style
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true); // enregistrement du js bootstrap
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', [], false, true);  // enregistrement du script popper
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', [], false, true);  // enregistrement du script jquery
    }
    wp_enqueue_style('bootstrap'); // utilisation du style
    wp_enqueue_script('bootstrap'); // utilisation des scripts
}






function projet_title_separator()
{
    return '|';
}

function projet_menu_class(array $classes): array
{
    $classes[] = 'nav-item text-center';
    return $classes;
}

function projet_menu_link_class(array $attrs): array
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

add_action('after_setup_theme', 'projet_supports');
add_action('wp_enqueue_scripts', 'projet_register_assets');
add_filter('document_title_separator', 'projet_title_separator');
add_filter('nav_menu_css_class', 'projet_menu_class');
add_filter('nav_menu_link_attributes', 'projet_menu_link_class');
