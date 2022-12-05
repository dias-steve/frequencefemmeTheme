<?php

function step_post_types(){
    register_post_type('step', array(
        'public' => true,
        'label' =>'Step',
        'show_in_rest'=> true,
        'supports' => array('title','thumbnail','editor'),
        'labels' => array( //gestion des labels liés à ce postType
            'name' => 'Steps', // nom sur menu 
            'add_new_item' =>'Ajouter un step', //changement du label add new post
            'edit_item' => 'Editer un step',
            'all_items' => 'Tout les steps',
            'singular_name' => 'step',
        ),
        'menu_icon' => 'dashicons-yes-alt',
        'taxonomies'=> array( 'step_cat', 'post_tag'),
    ));
}

add_action('init', 'step_post_types');

//hook into the init step and call create_book_taxonomies when it fires
 
//add_action( 'init', 'create_step_cat_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_step_cat_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'step categorie', 'create_subjects_hierarchical_taxonomy general name' ),
    'singular_name' => _x( 'step categorie', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search step categorie' ),
    'all_items' => __( 'All step categories' ),
    'parent_item' => __( 'Parent step categorie' ),
    'parent_item_colon' => __( 'Parent step categorie:' ),
    'edit_item' => __( 'Edit step categorie' ), 
    'update_item' => __( 'Update step categorie' ),
    'add_new_item' => __( 'Add New step categorie' ),
    'new_item_name' => __( 'New step categorie nom' ),
    'menu_name' => __( 'step categorie' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('step_cat',array('step'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'step_cat' ),
  ));
 
}

