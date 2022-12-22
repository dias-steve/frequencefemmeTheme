<?php

function getSettingData(){
    $result = array(
        'title_website' => get_bloginfo( 'name' ), 
   
        'copyright_text' => get_theme_mod('set_copyright'),
        'maintenance_mode' => array(
                    'is_activated' => get_theme_mod( 'set_maintenance_mode'),
                    'maintenance_message' => get_theme_mod( 'set_maintenance_message' ),
                    'maintenance_thumbnail' => array(
                        'url' => get_theme_mod( 'set_maintenance_image'),
                        'alt' => get_theme_mod( 'set_maintenance_image_alt')
                    ),
                    'maintenance_image_logo' => array(
                        'url' => get_theme_mod( 'set_maintenance_image_logo'),
                        'alt' => 'logo-icon'
                    ),
                    'seo' => array(
                        'meta_description' => get_theme_mod( 'set_maintenance_seo_desc')
                    )
                    ),
        'menus' => getAllMenuKeyDetail()
    );
    return $result;
}