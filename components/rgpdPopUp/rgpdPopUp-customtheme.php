<?php
function popup_settings ($wp_customize){
    //section
    $wp_customize->add_section(
        'rgpd_pop_up', array(
            'title' => 'RGPD Pop-up',
            'description' => ''
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
}

add_action('customize_register', 'popup_settings');