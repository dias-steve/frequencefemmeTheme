<?php

function s2_social_settings ($wp_customize){
        //section
        $wp_customize->add_section(
            'social_external_links', array(
                'title' => 'Réseau sociaux',
                'description' => 'Copyright Secion'
            )
        );


            //facebook
            $wp_customize->add_setting(
                'social_facebook', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_facebook', array(
                    'label' => 'Url Facebook',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //facebook ID
            $wp_customize->add_setting(
                'social_facebook_id', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_facebook_id', array(
                    'label' => 'Facebook ID',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //instagram
            $wp_customize->add_setting(
                'social_instgram', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_instgram', array(
                    'label' => 'Url Instagram',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //instagram ID
            $wp_customize->add_setting(
                'social_instgram_id', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_instgram_id', array(
                    'label' => 'Instagram ID',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //snapchat
            $wp_customize->add_setting(
                'social_snapchat', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_snapchat', array(
                    'label' => 'Url snapchat',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //snapchat ID
            $wp_customize->add_setting(
                'social_snapchat_id', array(
                    'type'  => 'theme_mod',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'social_snapchat_id', array(
                    'label' => 'Snapchat ID',
                    'description' => '',
                    'section' => 'social_external_links',
                    'type' => 'text'
                )
            );

            //LinkedIN
            $wp_customize->add_setting(
            'social_linkedin', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control(
            'social_linkedin', array(
                'label' => 'Url linkedIn',
                'description' => '',
                'section' => 'social_external_links',
                'type' => 'text'
            )
        );
        //LinkedIN ID
        $wp_customize->add_setting(
            'social_linkedin_id', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control(
            'social_linkedin_id', array(
                'label' => 'linkedin ID',
                'description' => '',
                'section' => 'social_external_links',
                'type' => 'text'
            )
        );

        //Twitter
        $wp_customize->add_setting(
            'social_twitter', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control(
            'social_twitter', array(
                'label' => 'Url Twitter',
                'description' => '',
                'section' => 'social_external_links',
                'type' => 'text'
            )
        );

        //Twitter ID
        $wp_customize->add_setting(
            'social_twitter_id', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control(
            'social_twitter_id', array(
                'label' => 'ID Twitter',
                'description' => '',
                'section' => 'social_external_links',
                'type' => 'text'
            )
        );

        //Donation
        $wp_customize->add_setting(
            'social_donation', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control(
            'social_donation', array(
                'label' => 'Url plateforme donation',
                'description' => '',
                'section' => 'social_external_links',
                'type' => 'text'
            )
        );


}

add_action('customize_register', 's2_social_settings');

function getExternalUrlList(){
    return array(

        "media_list" => array(
        array( 
            "media"=> "facebook",
            "url" => get_theme_mod('social_facebook'),
            "id" => get_theme_mod('social_facebook_id'),
        ),

        array( 
            "media"=> "twitter",
            "url" => get_theme_mod('social_twitter'),
            "id" => get_theme_mod('social_twitter_id'),
        ),
        
        array( 
            "media"=> "snapchat",
            "url" => get_theme_mod('social_snapchat'),
            "id" => get_theme_mod('social_snapchat_id'),
        ),
        array( 
            "media"=> "linkedin",
            "url" => get_theme_mod('social_linkedin'),
            "id" => get_theme_mod('social_linkedin_id'),
        ),
        array( 
            "media"=> "instagram",
            "url" => get_theme_mod('social_instgram'),
            "id" => get_theme_mod('social_instgram_id'),
        )),

        'social_donation' => get_theme_mod('social_donation'),

    );
}
