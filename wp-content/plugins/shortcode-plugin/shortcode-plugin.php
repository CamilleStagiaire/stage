<?php

/**
 * Plugin Name: Category Shortcode
 * Version: 1.0
 * Author: Camille
 */

defined('ABSPATH') or die('rien à voir');

// function custom_boutiqueCategory()
// {
//     // the query
//     $the_query = new WP_Query(array('category_name' => 'boutique', 'order' => 'ASC'));
//     // La boucle WordPress
//     $string = '';
//     if ($the_query->have_posts()) {
//         $string .= '<ul class="postsbycategory widget_recent_entries">';
//         while ($the_query->have_posts()) {
//             $the_query->the_post();
//             if (has_post_thumbnail()) {
//                 $string .= '<li>';
//             } else {
//                 // Si aucune image n’existe
//                 $string .= '<li><a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_title() . '</a></li>';
//             }
//         }
//     }
//     $string .= '</ul>';
//     return $string;
//     /* Restauration des données */
//     wp_reset_postdata();
// }

// acticles pour la page réfzrencement
function custom_referencementCategory($post_id)
{
    $the_query = new WP_Query(array('category_name' => 'referencement', 'order' => 'ASC'));
    // La boucle WordPress
    $string = '';
    if ($the_query->have_posts()) {
        $string .= '';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<h1 class="text-center mb-5">' . get_the_title()  .'</h1>' .  '<div class="divider"></div>';
            $string .= '<div class="row" id="ref"><div id="seo" class="col-md-4 offset-1">' . get_the_post_thumbnail($post_id, [500,500] )  .'</div>';
            $string .= '<div id="referencement"  class="col-md-6 ps-5">' . get_the_content()  .'</div></div>';
        }
        $string .= '</div">';
    }   
    return $string;
    wp_reset_postdata();
}

//'<span class="dashicons dashicons-admin-customizer"></span>' 

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
            $string .= '<div class="site ps-5">' . get_the_content()  .'</div>';
        }
        $string .= '</div">';
    }   
    return $string;
    wp_reset_postdata();
}

// Ajout des shortcodes
add_shortcode('boutique', 'custom_boutiqueCategory');
add_shortcode('referencement', 'custom_referencementCategory');
add_shortcode('site', 'custom_siteCategory');

add_filter('widget_text', 'do_shortcode');

//Filtre pour l'API REST
add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }
 
    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }
 
    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});

