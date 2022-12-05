<?php

function action_post_types(){
    register_post_type('actions', array(
        'public' => true,
        'label' =>'Action',
        'show_in_rest'=> true,
        'supports' => array('title','thumbnail','editor'),
        'labels' => array( //gestion des labels liés à ce postType
            'name' => 'Actions', // nom sur menu 
            'add_new_item' =>'Ajouter une action', //changement du label add new post
            'edit_item' => 'Editer une action',
            'all_items' => 'Toutes les actions',
            'singular_name' => 'action',
        ),
        'menu_icon' => 'dashicons-universal-access-alt',
        'taxonomies'=> array( 'action_cat', 'post_tag'),
    ));
}

add_action('init', 'action_post_types');

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_action_cat_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_action_cat_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'action categorie', 'create_subjects_hierarchical_taxonomy general name' ),
    'singular_name' => _x( 'action categorie', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search action categorie' ),
    'all_items' => __( 'All action categories' ),
    'parent_item' => __( 'Parent action categorie' ),
    'parent_item_colon' => __( 'Parent action categorie:' ),
    'edit_item' => __( 'Edit action categorie' ), 
    'update_item' => __( 'Update action categorie' ),
    'add_new_item' => __( 'Add New action categorie' ),
    'new_item_name' => __( 'New action categorie nom' ),
    'menu_name' => __( 'action categorie' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('action_cat',array('action'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'action_cat' ),
  ));
 
}

