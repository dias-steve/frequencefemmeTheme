<?php
    function rgpdRoute(){

    register_rest_route('io/v1','rgpd',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getRGPDData' // notre fonfonction 
    ));
    }

    add_action('rest_api_init', 'rgpdRoute');

    function getRGPDData(){
        return getRGPDDataAll();
    }