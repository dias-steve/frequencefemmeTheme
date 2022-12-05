<?php
function homePageRoute() {
    register_rest_route('io/v1','homepage',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getHomePage' // notre fonfonction 
    ));

}
add_action('rest_api_init', 'homePageRoute');

function getHomePage(){
    return getHomePageData();
}