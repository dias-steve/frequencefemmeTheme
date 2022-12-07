<?php

function contactpage_settings($wp_customize)
{
    //section
    $wp_customize->add_section(
        'contactpage_settings_section',
        array(
            'title' => 'Page Contact',
            'description' => 'customisation des images et des texts'
        )
    );

    //Title page
    $wp_customize->add_setting(
        'contactpage_title_page',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_title_page',
        array(
            'label' => 'Titre de la page',
            'description' => 'Titre affiché',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    //Message d'accueil
    $wp_customize->add_setting(
        'contactpage_settings_message',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_settings_message',
        array(
            'label' => 'Message',
            'description' => 'Message affiché',
            'section' => 'contactpage_settings_section',
            'type' => 'textarea'
        )
    );


    //Telephone
    $wp_customize->add_setting(
        'contactpage_phone_number',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_phone_number',
        array(
            'label' => 'Numéro de téléphone',
            'description' => 'Numéro de téléphone affiché',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    //Whatapp number
    $wp_customize->add_setting(
        'contactpage_whatapp_number',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_whatapp_number',
        array(
            'label' => 'Numéro whatapp',
            'description' => 'Numéro whatapp',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    //Address
    $wp_customize->add_setting(
        'contactpage_address',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_address',
        array(
            'label' => 'Adresse postale',
            'description' => 'Adresse postale affichée',
            'section' => 'contactpage_settings_section',
            'type' => 'textarea'
        )
    );


    //Address
    $wp_customize->add_setting(
        'contactpage_email',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_email',
        array(
            'label' => 'Email de contact',
            'description' => 'Email de contact affiché',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    //Image Up
    $wp_customize->add_setting(
        'contactpage_image_up',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'theme_slug_sanitize_file'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'contactpage_image_up',
            array(
                'label'      => __('Image du haut de la page', 'theme_slug'),
                'section'    => 'contactpage_settings_section'
            )
        )
    );

    //Image up atl
    $wp_customize->add_setting(
        'contactpage_image_up_alt',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_image_up_alt',
        array(
            'label' => 'Text alternatif de Image du haut de la page',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );


    $wp_customize->add_control(
        'contactpage_image_down_alt',
        array(
            'label' => 'Text alternatif de Image du bas de la page',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    /** SEO */
    //seo title page
    $wp_customize->add_setting(
        'contactpage_seo_title',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_seo_title',
        array(
            'label' => 'SEO titre de la page',
            'section' => 'contactpage_settings_section',
            'type' => 'text'
        )
    );

    //seo title page
    $wp_customize->add_setting(
        'contactpage_seo_metadescription',
        array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'contactpage_seo_metadescription',
        array(
            'label' => 'SEO meta description de la page',
            'section' => 'contactpage_settings_section',
            'type' => 'textarea'
        )
    );
}

add_action('customize_register', 'contactpage_settings');
