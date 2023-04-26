<?php
function revalidateSection($wp_customize){
    //section
    $wp_customize->add_section(
        'sec_revalidate', array(
            'title' => 'Update frontend Settings',
            'description' => 'Udapte settings'
        )
    );
            //field 1 
            $wp_customize->add_setting(
                'revalidate_url', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'revalidate_url', array(
                    'label' => 'Url revalidation frontend ',
                    'description' => 'Please, add the revalidated url with token such as http:[url]?secret=[token]',
                    'section' => 'sec_revalidate',
                    'type' => 'text'
                )
            );
}




function io_theme_settings_customizer_revalidate($wp_customize){
    revalidateSection($wp_customize);

}


add_action('customize_register', 'io_theme_settings_customizer_revalidate');