<?php

/**
 * Plugin Name: Category Shortcode
 * Version: 1.0
 * Author: Camille
 */

defined('ABSPATH') or die('rien à voir');

// acticle pour la page boutique
function custom_boutiqueCategory()
{
    $the_query = new WP_Query(array('category_name' => 'boutique', 'order' => 'ASC'));
    $string = '<div>';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<h1 class="text-center mb-5">' . get_the_title()  . '</h1>' .  '<div class="divider"></div>';
            $string .= '<div id="boutique" class="mx-5 px-5 py-3">' . get_the_content() . '</div>';
        }
        $string .= '</div>';
    }
    return $string;
    wp_reset_postdata();
}

// acticle pour la page infogérance
function custom_infogeranceCategory($post_id)
{
    $the_query = new WP_Query(array('category_name' => 'infogerance', 'order' => 'ASC'));
    $string = '<div>';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<h1 class="text-center mb-5">' . get_the_title()  . '</h1>' .  '<div class="divider"></div>';
            $string .= '<div class="row align-items-center"><div id="info" class="col-lg-5 offset-1 pe-5">' . get_the_content() . '</div>';
            $string .= '<div id="infogerance" class="col-lg-4 offset-1">' . get_the_post_thumbnail($post_id, [500, 500]) . '</div></div>';
        }
        $string .= '</div>';
    }
    return $string;
    wp_reset_postdata();
}

// acticle pour la page référencement
function custom_referencementCategory($post_id)
{
    $the_query = new WP_Query(array('category_name' => 'referencement', 'order' => 'ASC'));
    $string = '<div>';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<h1 class="text-center mb-5">' . get_the_title()  . '</h1>' .  '<div class="divider"></div>';
            $string .= '<div class="row"><div id="seo" class="col-lg-4 offset-1">' . get_the_post_thumbnail($post_id, [500, 500])  . '</div>';
            $string .= '<div id="referencement"  class="col-lg-6 px-5">' . get_the_content()  . '</div></div>';
        }
        $string .= '</div">';
    }
    return $string;
    wp_reset_postdata();
}

//'<span class="dashicons dashicons-admin-customizer"></span>' 

// acticles pour la page site
function custom_siteCategory($post_id)
{
    $the_query = new WP_Query(array('category_name' => 'site', 'order' => 'ASC'));
    $string = '';
    if ($the_query->have_posts()) {
        $string .= '<div id="site">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<div class="site row py-3"><div class="col-lg-7"><h2 class="py-4">' . get_the_title() . '</h2>' . get_the_content() . '</div>' . '<div class="col-lg-4 offset-1">' . get_the_post_thumbnail($post_id, [300, 300]) . '</div></div>';
        }
        $string .= '</div>';
    }
    return $string;
    wp_reset_postdata();
}

// Ajout des shortcodes
add_shortcode('boutique', 'custom_boutiqueCategory');
add_shortcode('referencement', 'custom_referencementCategory');
add_shortcode('infogerance', 'custom_infogeranceCategory');
add_shortcode('site', 'custom_siteCategory');

add_filter('widget_text', 'do_shortcode');

//Filtre pour l'API REST
add_filter('rest_authentication_errors', function ($result) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if (true === $result || is_wp_error($result)) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if (!is_user_logged_in()) {
        return new WP_Error(
            'rest_not_logged_in',
            __('You are not currently logged in.'),
            array('status' => 401)
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});
