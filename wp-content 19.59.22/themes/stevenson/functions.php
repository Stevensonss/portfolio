<?php

function mon_theme_setup() {
    // Ajouter la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );
    
}
add_action( 'after_setup_theme', 'mon_theme_setup' );

// Ajoute les styles personnalisés 

function mon_theme_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' ); // Ajoute Bootstrap depuis leur CDN
    wp_enqueue_style( 'mon-style', get_stylesheet_uri() ); // Ajoute le fichier style.css du thème
}

// Ajoute les scripts personnalisés
function mon_theme_enqueue_scripts() {
    
    // Déréférencement de la version de jQuery fourni par WordPress
    wp_deregister_script('jquery');

    // Récupération de la dernière version de jQuery depuis le CDN de jQuery
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), false, true );  // Ajout du fichier bootstrap.js

    wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/script.js', array(), false, true);

}

add_action( 'wp_enqueue_scripts', 'mon_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mon_theme_enqueue_scripts' );

function create_custom_post_type() {
    register_post_type( 'projets',
        array(
            'labels' => array(
                'name' => __( 'Projets' ),
                'singular_name' => __( 'Projet' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 2,
			'menu_icon' => 'dashicons-admin-customizer', // Remplacez 'dashicons-admin-post' par le chemin de votre icône
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'show_in_rest' => true, // Utilisation de l'API REST
            'rest_base' => 'projets', // Nom de l'endroit où retrouver le post type dans l'API REST.
            'editor' => 'block', // Utilisation de l'éditeur de bloc Gutenberg
        )
    );

    // Ajout de la taxonomie "Catégories de projets"
    register_taxonomy(
        'categorie_projet',
        'projets',
        array(
            'label' => __( 'Catégories de projets' ),
            'rewrite' => array( 'slug' => 'categorie-projet' ),
            'hierarchical' => true,
            'show_in_rest' => true, // Utilisation de l'API REST
        )
    );
}
add_action( 'init', 'create_custom_post_type' );

function get_homepage_content() {
    $homepage = get_option('page_on_front');
    $content = apply_filters('the_content', get_post_field('post_content', $homepage));
    return $content;
 }

 function get_contact_page_content() {
    $contact_page = get_page_by_title('Contact'); // Récupérer la page par son titre
    $content = apply_filters('the_content', $contact_page->post_content);
    return $content;
}