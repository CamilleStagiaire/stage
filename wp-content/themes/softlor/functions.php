<?php

defined('ABSPATH') or die('rien à voir');

require_once('options/apparence.php');

function softlor_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('slider', 1024, 424, true);
    add_image_size('banner', 1024, 200, true);
}

// enregistrement / utilisation des scripts et css
function softlor_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'); // enregistrement du style
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true); // enregistrement du js bootstrap
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', [], false, true);  // enregistrement du script popper
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', [], false, true);  // enregistrement du script jquery
    }
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css', [], false, 'all');
    wp_enqueue_style('softlor_style', get_stylesheet_uri(), ['bootstrap', 'animate']); // renvoie le chemin vers le fichier css
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('carrousel', get_template_directory_uri() . '/assets/anim.js', ['bootstrap', 'jquery'], false, true);
}

function softlor_title_separator()
{
    return '|';
}

//changement de classe de la barre de navigation
function softlor_menu_class(array $classes): array
{
    $classes[] = 'nav-item text-center';
    return $classes;
}

function softlor_menu_link_class(array $attrs): array
{
    $attrs['class'] = 'nav-link active px-5';
    return $attrs;
}

// gestion des icones dynaniques de la page d'accueil 
function softlor_init()
{
    register_post_type('icone', [
        'label' => __('Icones', 'softlor'),
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-menu',
        'supports' => ['title', 'editor', 'thumbnail', 'page-attributes', 'excerpt'],
        'show_in_rest' => true, // pour avoir l'éditeur visuel
        'has_archive' => true,
        'exclude_from_search' => true,
    ]);
}

add_action('init', 'softlor_init');
add_action('after_setup_theme', 'softlor_supports');
add_action('wp_enqueue_scripts', 'softlor_register_assets');
add_filter('document_title_separator', 'softlor_title_separator');
add_filter('nav_menu_css_class', 'softlor_menu_class');
add_filter('nav_menu_link_attributes', 'softlor_menu_link_class');

//options de réglage (pour admin) cf bloc nous contacter
require_once('options/agence.php');
AgenceMenuPage::register();

//bloc Carrousel
function carrousel_init()
{
    $labels = array(
        'name' => __('Caroussel d\'images Accueil', 'softlor'),
        'singular_name' => 'Image accueil',
        'add_new' => __('Ajouter une image', 'softlor'),
        'add_new_item' => __('Ajouter une image', 'softlor'),
        'edit_item' => 'Ajouter une image',
        'new_item' => 'Nouveau',
        'all_items' => __('Voir la liste', 'softlor'),
        'view_item' => 'Voir l\'élément',
        'search_items' => __('Rechercher une image', 'softlor'),
        'not_found' =>  'Aucun élément trouvé',
        'not_found_in_trash' => 'Aucun élément dans la corbeille',
        'menu_name' => __('Carrousel', 'softlor'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-embed-photo',
        'exclude_from_search' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'page-attributes', 'excerpt'],
    );
    register_post_type('carrousel', $args);
}
add_action('init', 'carrousel_init');

//ajout de l'image et ordre dans la colonne admin pour le carrousel
add_filter('manage_edit-carrousel_columns', 'carrousel_col_change'); // change nom colonnes

function carrousel_col_change($columns)
{
    $columns['carrousel_image_order'] = __("Ordre", 'softlor');
    $columns['carrousel_image'] = __("Image affichée", 'softlor');

    return $columns;
}

add_action('manage_carrousel_posts_custom_column', 'carrousel_show', 10, 2);

function carrousel_show($column, $post_id)
{
    global $post;
    if ($column == 'carrousel_image') {
        echo the_post_thumbnail([100, 100]);
    }
    if ($column == 'carrousel_image_order') {
        echo $post->menu_order;
    }
}

// tri auto de l'ordre dans la colonne admin carrousel
function carrousel_change_slides_order(WP_Query $query)
{
    global $post_type, $pagenow;
    if ($pagenow == 'edit.php' && $post_type == 'carrousel') {
        $query->query_vars['orderby'] = 'menu_order';
        $query->query_vars['order'] = 'asc';
    }
}
add_action('pre_get_posts', 'carrousel_change_slides_order');

//ajout de l'image et ordre dans la colonne admin pour les icones
add_filter('manage_edit-icone_columns', 'icone_col_change'); // change nom colonnes

function icone_col_change($columns)
{
    $columns['icone_image_order'] = __("Ordre", 'softlor');
    $columns['icone_image'] = __("Image affichée", 'softlor');

    return $columns;
}

add_action('manage_icone_posts_custom_column', 'icone_show', 10, 2);

function icone_show($column, $post_id)
{
    global $post;
    if ($column == 'icone_image') {
        echo the_post_thumbnail([100, 100]);
    }
    if ($column == 'icone_image_order') {
        echo $post->menu_order;
    }
}

// tri auto de l'ordre dans la colonne admin icones
function icone_change_slides_order(WP_Query $query)
{
    global $post_type, $pagenow;
    if ($pagenow == 'edit.php' && $post_type == 'icone') {
        $query->query_vars['orderby'] = 'menu_order';
        $query->query_vars['order'] = 'asc';
    }
}
add_action('pre_get_posts', 'icone_change_slides_order');

//https://developer.wordpress.org/apis/handbook/internationalization/
add_action('after_setup_theme', function () {
    load_theme_textdomain('softlor', get_template_directory() . '/languages');
});

/* Activer le support des catégories pour les pages */
function softlor_cat_pages()
{
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'softlor_cat_pages');

// widgets de la sidebar
function softlor_register_widget()
{
    //register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'pages',
        'name' => 'Sidebar page bannière',
        'before_widget' => '<div class="p-4 %2$s" id=="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="fst-italic">',
        'after_title' => '</h4>',
    ]);
}

add_action('widgets_init', 'softlor_register_widget');

// Supprimer les colonnes ajoutées par Yoas
function softlor_remove_wp_seo_columns( $columns ) {
	unset( $columns['wpseo-score'] );
	unset( $columns['wpseo-score-readability'] );
	unset( $columns['wpseo-title'] );
	unset( $columns['wpseo-metadesc'] );
	unset( $columns['wpseo-focuskw'] );
	unset( $columns['wpseo-links'] );
	unset( $columns['wpseo-linked'] );
	return $columns;
}
add_filter( 'manage_edit-icone_columns', 'softlor_remove_wp_seo_columns', 10, 1 );
add_filter( 'manage_edit-page_columns', 'softlor_remove_wp_seo_columns', 10, 1 );
add_filter( 'manage_edit-post_columns', 'softlor_remove_wp_seo_columns', 10, 1 );