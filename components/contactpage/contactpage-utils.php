<?php

function getContactPageData()
{

    $result = array(
        "seo" => array(
            "title_seo" =>  get_theme_mod('contactpage_seo_title'),
            "meta_description_seo" =>  get_theme_mod('contactpage_seo_metadescription'),
            "other_data_seo" => null,
        ),

        "title" => get_theme_mod('contactpage_title_page'),

        "content" => array(
            "image_up" => array(
                "url" => get_theme_mod('contactpage_image_up'),
                "alt" => get_theme_mod('contactpage_image_up_alt')
            ),
            "image_down" => array(
                "url" => get_theme_mod('contactpage_image_down'),
                "alt" => get_theme_mod('contactpage_image_down_alt')
            ),
            "message" => get_theme_mod('contactpage_settings_message'),
            "phone_number" => get_theme_mod('contactpage_phone_number'),
            "whatapp_number" => get_theme_mod('contactpage_whatapp_number'),
            "address" => get_theme_mod('contactpage_address'),
            "email" => get_theme_mod('contactpage_email'),
            "appointement_url" => get_theme_mod('appointement_url'),
        )


    );
    return $result;
}
