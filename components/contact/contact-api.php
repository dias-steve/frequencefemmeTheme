<?php

function contactRoute() {
    register_rest_route('io/v1','contactmessage',array(
        'methods' => 'POST',
        'callback' => 'sendMailfromAPI' 
    ));


}
add_action('rest_api_init', 'contactRoute');

function sendMailfromAPI($data){
    return sendMessageContact($data['message'], $data['public_key'], $data['secret_key']);
}