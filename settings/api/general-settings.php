<?php
function settingRoute() {
    register_rest_route('io/v1','settings',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'settingData' // notre fonction 
    ));

}
add_action('rest_api_init', 'settingRoute');

function settingData() {
    return getSettingData();
}