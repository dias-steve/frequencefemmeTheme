<?php

function actionRoute() {
    register_rest_route('io/v1','actions/(?P<id>\d+)',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getActionDetail' // notre fonfonction 
    ));

    register_rest_route('io/v1','actioncats/(?P<categoriesfilter>\d+)',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getActionCatDetail' // notre fonfonction 
    ));

    register_rest_route('io/v1','actions',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAllActions' // notre fonfonction 
    ));

    register_rest_route('io/v1','actions',array(
        'methods' => 'POST',
        'callback' => 'getActionCatDetail' // notre fonfonction 
    ));

    register_rest_route('io/v1','actioncats',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAllActionsCat' // notre fonfonction 
    ));
}
add_action('rest_api_init', 'actionRoute');

function getActionDetail($data){
    return getActionById($data['id']);
}

function getActionCatDetail($data){
    return getActionByCat($data['categoriesfilter'], $data['page'],8);
}

function getAllActions(){
    return get_all_actions();
}

function getAllActionsCat(){
    return get_all_actionCat();
}


function getAllActionsPaged($data){
    return 'ok';
}