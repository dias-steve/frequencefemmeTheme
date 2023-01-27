<?php
function popup_settings ($wp_customize){
    //section
    $wp_customize->add_section(
        'rgpd_pop_up', array(
            'title' => 'RGPD Pop-up',
            'description' => ''
        )
    );


    //POP UP title
    $wp_customize->add_setting(
        'rgpd_pop_up_title', array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'rgpd_pop_up_title', array(
            'label' => 'Titre',
            'description' => 'Titre de la popup',
            'section' => 'rgpd_pop_up',
            'type' => 'text'
        )
    );

    //POP UP message
    $wp_customize->add_setting(
        'rgpd_pop_up_message', array(
            'type'  => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'rgpd_pop_up_message', array(
            'label' => 'Message',
            'description' => 'Message RGPD affiché au visteur du site',
            'section' => 'rgpd_pop_up',
            'type' => 'textarea'
        )
    );



        //POP UP btn
        $wp_customize->add_setting(
            'rgpd_pop_up_btn_label_accept', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
    
        $wp_customize->add_control(
            'rgpd_pop_up_btn_label_accept', array(
                'label' => 'Label du bouton accepter',
                'description' => 'Label du bouton accepter, ce bouton entraine la fermeture de la pop up',
                'section' => 'rgpd_pop_up',
                'type' => 'text'
            )
        );


        //POP UP btn
        $wp_customize->add_setting(
            'rgpd_pop_up_btn_label_cookie', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
    
        $wp_customize->add_control(
            'rgpd_pop_up_btn_label_cookie', array(
                'label' => 'Label du bouton voir la politique de cookies',
                'description' => 'Ce bouton redirige le visiteur vers la page de politique de cookies',
                'section' => 'rgpd_pop_up',
                'type' => 'text'
            )
        );


        //POP UP btn cookie link
        $wp_customize->add_setting(
            'rgpd_pop_up_btn_link_cookie', array(
                'type'  => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
    
        $wp_customize->add_control(
            'rgpd_pop_up_btn_link_cookie', array(
                'label' => 'Lien du bouton voir la politique de cookies',
                'description' => 'Repecter le schemas suivant : /page/[id de la page politque de cookie]',
                'section' => 'rgpd_pop_up',
                'type' => 'text'
            )
        );
}

add_action('customize_register', 'popup_settings');