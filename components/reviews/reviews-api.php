<?php

function ReviewsRoute() {
    register_rest_route('io/v1','reviews',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getReviews' // notre fonfonction 
    ));

   
}

function getReviews(){
    return get_all_Reviews();
}
add_action('rest_api_init', 'ReviewsRoute');


