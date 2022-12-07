<?php
function contactPageRoute() {
    register_rest_route('io/v1','contactpage',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getContactpage' // notre fonfonction 
    ));

}
add_action('rest_api_init', 'contactPageRoute');

function getContactpage() {
    return getContactPageData();
}