<?php

function getContactPageData()
{
    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('page'),
        'post_status' => 'publish',
        'pagename' => 'contact'
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        $results=  get_contact_page_data_formated();
        
    }
    return $results;   
}

function get_contact_details(){
    return array(
        "message" => get_theme_mod('contactpage_settings_message'),
        "phone_number" => get_theme_mod('contactpage_phone_number'),
        "whatapp_number" => get_theme_mod('contactpage_whatapp_number'),
        "address" => get_theme_mod('contactpage_address'),
        "email" => get_theme_mod('contactpage_email'),
        "appointement_url" => get_theme_mod('appointement_url'),
    );
}

function get_contact_page_data_formated(){
    return array(
        'id' => get_the_ID(),
        'title' => get_field('title_page'),
        'seo' => get_seo_data(),
        'content' => convert_content_list(get_field('content_list'))

    );
}
