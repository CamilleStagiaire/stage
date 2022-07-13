<?php

/**
 * Plugin Name: Category Shortcode
 * Version: 1.0
 * Author: Camille
 */

function custom_boutiqueCategory()
{
    // the query
    $the_query = new WP_Query(array('category_name' => 'boutique', 'order' => 'ASC'));
    // La boucle WordPress
    $string = '';
    if ($the_query->have_posts()) {
        $string .= '<ul class="postsbycategory widget_recent_entries">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            if (has_post_thumbnail()) {
                $string .= '<li>';
            } else {
                // Si aucune image n’existe
                $string .= '<li><a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_title() . '</a></li>';
            }
        }
    }
    $string .= '</ul>';
    return $string;
    /* Restauration des données */
    wp_reset_postdata();
}

// acticles pour la page site
function custom_siteCategory()
{
    $the_query = new WP_Query(array('category_name' => 'site', 'order' => 'ASC'));
    // La boucle WordPress
    $string = '';
    if ($the_query->have_posts()) {
        $string .= '<div id="site">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<div class="site">' . get_the_content()  .'</div>';
        }
        $string .= '</div">';
    }   
    return $string;
    wp_reset_postdata();
}

// Ajout des shortcodes
add_shortcode('boutique', 'custom_boutiqueCategory');
add_shortcode('site', 'custom_siteCategory');

add_filter('widget_text', 'do_shortcode');

