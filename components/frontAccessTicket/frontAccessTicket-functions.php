<?php


function frontAcess_post_types(){

    register_post_type('frontaccess', array(
        'public' => true,
        'label' =>'frontaccess',
        'show_in_rest'=> true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array('title'),
        'labels' => array( //gestion des labels liés à ce postType
            'name' => 'Frontaccess', // nom sur menu 
            'add_new_item' =>'Add new Frontaccess ticket', //changement du label add new post
            'edit_item' => 'Edit Frontaccess ticket',
            'all_items' => 'All Frontaccess ticket',
            'singular_name' => 'frontaccess ticket',
        ),
    ));
}
function getAuthAccessFront($data) {
    if($data['user'] && $data['mdp']){
    $results = array(
        'is_auth' => false,
        'token' => null
    );
    $user_id = $data['user'];
      $mdp = $data['mdp'];

    if(is_authenticated($user_id, $mdp)){
        $results['is_auth'] = true;
        $results['token'] = '7263HSK89SJKS0033';
    }
    return $results;
}else{
    return null;
}
}

function is_authenticated($user_id, $mdp){
    
    $mainQuery = new WP_Query(array(
        'post_type' => array('frontaccess'),
        'post_status' => 'publish',
    ));
    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        if($user_id ===  get_field('user_id') &&  $mdp ===  get_field('mdp')){
           return  true;
        }
    }

    return false;

}

function frontAccessRoute() {
    register_rest_route('io/v1','frontaccessauth',array(
        'methods' => 'POST',
        'callback' => 'getAuthAccessFront' // notre fonfonction 
    ));
}

add_action('rest_api_init', 'frontAccessRoute', 15);
add_action('init', 'frontAcess_post_types');