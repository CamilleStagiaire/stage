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
   

   
    add_image_size('slider',1024, 424, true);
    add_image_size('banner',1024, 200, true);
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
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css', [], false, 'all'); 
    wp_enqueue_style('projet_style', get_stylesheet_uri(), ['bootstrap','animate' ]);
    wp_enqueue_script('bootstrap'); // utilisation des scripts
    wp_enqueue_script('carrousel', get_template_directory_uri() . '/assets/carrousel.js', ['bootstrap', 'jquery'], false, true); 
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

function softlor_init()
{
   

    register_post_type('icone', [
        'label' => 'Icone',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true, // pour avoir l'éditeur visuel
        'has_archive' => true,

    ]);

}


add_action('init', 'softlor_init');
add_action('after_setup_theme', 'projet_supports');
add_action('wp_enqueue_scripts', 'projet_register_assets');
add_filter('document_title_separator', 'projet_title_separator');
add_filter('nav_menu_css_class', 'projet_menu_class');
add_filter('nav_menu_link_attributes', 'projet_menu_link_class');

function carrousel_init () {

	$labels = array(
        'name' => 'Image Caroussel Accueil',
        'singular_name' => 'Image accueil',
        'add_new' => 'Ajouter une image',
        'add_new_item' => 'Ajouter une image accueil',
        'edit_item' => 'Modifier une image accuei',
        'new_item' => 'Nouveau',
        'all_items' => 'Voir la liste',
        'view_item' => 'Voir l\'élément',
        'search_items' => 'Rechercher une image',
        'not_found' =>  'Aucun élément trouvé',
        'not_found_in_trash' => 'Aucun éléméntSlide dans la corbeille',
        'menu_name' => 'Slider Frontal',
        
      );

      $args = array (
        'labels' => $labels,
		'public' => true,
		'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
		'capability_type'=>'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-embed-photo',
        'exclude_from_search' => true,
		'supports' => array('title', 'page-attributes', 'thumbnail', 'excerpt'),
       
        
	);
    register_post_type('carrousel', $args);	

}
add_action('init','carrousel_init');

add_filter('manage_edit-carrousel_columns', 'carrousel_col_change');

function carrousel_col_change($columns) {
    $columns['carrousel_image_order'] = "Ordre";
    $columns['carrousel_image'] = "Image affichée";
 
    return $columns;
}

add_action('manage_carrousel_posts_custom_column','carrousel_show', 10, 2);

function carrousel_show($column, $post_id) {
    global $post;
    if ($column == 'carrousel_image') {
        echo the_post_thumbnail([100,100]);  }
        if ($column == 'carrousel_image_order') {
            echo $post->menu_order;  }
}

function carrousel_change_slides_order($query) {

    global $post_type, $pagenow;
    if($pagenow == 'edit.php' && $post_type == 'carrousel'){
        $query->query_vars['orderby'] = 'menu_order';
        $query->query_vars['order'] = 'asc';
    }
}
add_action('pre_get_posts','carrousel_change_slides_order');

