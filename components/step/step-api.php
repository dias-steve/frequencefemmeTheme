<?php

function stepRoute() {
    register_rest_route('io/v1','steps/(?P<id>\d+)',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getstepDetail' // notre fonfonction 
    ));



    register_rest_route('io/v1','steps',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAllsteps' // notre fonfonction 
    ));


    register_rest_route('io/v1','stepspage',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getStepPage' // notre fonfonction 
    ));

    


}
add_action('rest_api_init', 'stepRoute');

function getstepDetail($data){
    return getstepById($data['id']);
}


function getAllsteps(){
    return get_all_steps();
}

function getStepPage(){
    return get_step_page_data();
}
 

