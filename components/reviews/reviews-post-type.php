<?php

function reviews_post_types(){
    register_post_type('reviews', array(
        'public' => true,
        'label' =>'Avis',
        'show_in_rest'=> true,
        'supports' => array('title','thumbnail','editor','custom-fields', 'revisions'),
        'labels' => array( //gestion des labels liés à ce postType
            'name' => 'Avis', // nom sur menu 
            'add_new_item' =>'Ajouter une Avis', //changement du label add new post
            'edit_item' => 'Editer une Avis',
            'all_items' => 'Toutes les Avis',
            'singular_name' => 'Avis',
        ),
        'menu_icon' => 'dashicons-universal-access-alt',
        'taxonomies'=> array( 'Avis_cat', 'post_tag'),
    ));
}

add_action('init', 'reviews_post_types');
