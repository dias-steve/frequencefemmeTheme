<?php

require get_template_directory() . '/post-types.php';
require get_template_directory() . '/settings/general-settings.php';
require get_template_directory() . '/settings/api/general-settings.php';
require get_template_directory() . '/settings/api/general-settings-utils.php';

require get_template_directory() . '/settings/s2-externallink-settings.php';
require get_template_directory() . '/components/frontAccessTicket/frontAccessTicket-functions.php';
require get_template_directory() . '/components/step/step-functions.php';
require get_template_directory() . '/utils/utils.php';
require get_template_directory() . '/components/page/page-functions.php';
require get_template_directory() . '/components/post/post-functions.php';
require get_template_directory() . '/components/contact/contact-functions.php';
require get_template_directory() . '/components/homepage/homepage-functions.php';
require get_template_directory() . '/components/aboutpage/aboutpage-functions.php';

require get_template_directory() . '/components/rgpdPopUp/rgpdPopUp-functions.php';


function initCors( $value ) {
    $origin_url = '*';
  
    /*Check if production environment or not
    if (ENVIRONMENT === 'production') {
      $origin_url = 'https://linguinecode.com';
    }
  */
    header( 'Access-Control-Allow-Origin: ' . $origin_url );
    header( 'Access-Control-Allow-Methods: GET' );
    header( 'Access-Control-Allow-Credentials: true' );
    return $value;
  }
function customRoutesSettings(){



    remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
    add_filter( 'rest_pre_serve_request', 'initCors');
}
add_theme_support( 'post-thumbnails' ); 
add_action('rest_api_init', 'customRoutesSettings', 15);