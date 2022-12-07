<?php
function FooterRoute() {
    register_rest_route('io/v1','Footer',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getFooter' // notre fonfonction 
    ));

}
add_action('rest_api_init', 'FooterRoute');

function getFooter() {
    return getFooterData();
}