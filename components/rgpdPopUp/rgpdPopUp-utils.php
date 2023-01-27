<?php
function getRGPDDataAll(){ 
    $result = array(

        'message' => get_theme_mod( 'rgpd_pop_up_message'),
        'title' => get_theme_mod( 'rgpd_pop_up_title'),
        'btn_label_accept' => get_theme_mod( 'rgpd_pop_up_btn_label_accept'),
        'rgpd_pop_up_btn_label_cookie' => get_theme_mod( 'rgpd_pop_up_btn_label_cookie'),
        'rgpd_pop_up_btn_link_cookie' => get_theme_mod( 'rgpd_pop_up_btn_link_cookie')

    );

    return $result;
}