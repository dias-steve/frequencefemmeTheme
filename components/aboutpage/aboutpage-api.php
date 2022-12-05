<?php

function aboutPageRoute() {

    register_rest_route('io/v1','aboutpage',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAboutPage' // notre fonfonction 
    ));


}
add_action('rest_api_init', 'aboutPageRoute');

function getAboutPage() {
    return getAboutPageData();
}