<?php


function fancy_lab_customizer( $wp_customize){

    //section
    $wp_customize->add_section(
        'sec_copyright', array(
            'title' => 'Copyright Settings',
            'description' => 'Copyright Secion'
        )
    );

            //field 1 

            $wp_customize->add_setting(
                'set_copyright', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright', array(
                    'label' => 'Copyright',
                    'description' => 'Please, add your copyright Infirmation here',
                    'section' => 'sec_copyright',
                    'type' => 'text'
                )
            );

    // section 2 
    $wp_customize->add_section(
        'sec_maintenance_mode', array(
            'title' => 'Mode Maintenance',
            'description' => 'Mettre le site en mode maintenance'
        )
    );

            //field 1 

            $wp_customize->add_setting(
                'set_maintenance_mode', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'theme_slug_sanitize_checkbox'
                )
            );

            $wp_customize->add_control(
                'set_maintenance_mode', array(
                    'label' => 'Mode maintenance',
                    'description' => 'Mettre le mode maintenance',
                    'section' => 'sec_maintenance_mode',
                    'type' => 'checkbox'
                )
            );

            //field 2

            $wp_customize->add_setting(
                'set_maintenance_message', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_maintenance_message', array(
                    'label' => 'message',
                    'description' => 'Entrez le message ici svp',
                    'section' => 'sec_maintenance_mode',
                    'type' => 'text'
                )
            );



            $wp_customize->add_setting(
                'set_maintenance_seo_desc', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_maintenance_seo_desc', array(
                    'label' => 'SEO Meta description',
                    'description' => 'Entrez la meta description ici',
                    'section' => 'sec_maintenance_mode',
                    'type' => 'textarea'
                )
            );

            //field 3

            $wp_customize->add_setting(
                'set_maintenance_image', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'theme_slug_sanitize_file'
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control( 
                    $wp_customize, 
                    'set_maintenance_image', 
                    array(
                        'label'      => __( 'Image principale', 'theme_slug' ),
                        'section'    => 'sec_maintenance_mode'                   
                    )
                ) 
            );  
            
            //field 4


            $wp_customize->add_setting(
                'set_maintenance_image_alt', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_maintenance_image_alt', array(
                    'label' => 'image alt',
                    'section' => 'sec_maintenance_mode',
                    'type' => 'text'
                )
            );

            //field 5

            $wp_customize->add_setting(
                'set_maintenance_image_logo', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'theme_slug_sanitize_file'
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control( 
                    $wp_customize, 
                    'set_maintenance_image_logo', 
                    array(
                        'label'      => __( 'Image logo', 'theme_slug' ),
                        'section'    => 'sec_maintenance_mode'                   
                    )
                ) 
            );

    // section 2 
    $wp_customize->add_section(
        'sec_contact', array(
            'title' => 'Apparence page Contact',
            'description' => 'Réglages des la page contact'
        )
    );

            //field 1 

            $wp_customize->add_setting(
                'sec_contact_message', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'sec_contact_message', array(
                    'label' => 'message',
                    'description' => 'Entrez le message ici svp',
                    'section' => 'sec_contact',
                    'type' => 'text'
                )
            );


}

function theme_slug_sanitize_checkbox( $input ){
              
    //returns true if checkbox is checked
    
    return ( $input);
}

    //file input sanitization function
function theme_slug_sanitize_file( $file, $setting ) {
        
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon',
        'svg'   => 'image/svg',
    );
        
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
        
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}

add_action('customize_register', 'fancy_lab_customizer');