<?php


    function getThumbnailFormated($idPost){
        $thumbnail_id = get_post_thumbnail_id($idPost);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
        return array( 'alt' => $alt, 'url' => get_the_post_thumbnail_url($idPost));
    }

    function get_the_post_link_front(){
        return '/'.get_post_type().'/'.get_the_ID();
    }

    function get_seo_data(){
        return array(
            'title_seo' => get_field('title_seo'),
            'meta_description_seo' => get_field('meta_description_seo'),
            'other_data_seo' => get_field('other_data_seo'),
        );
    }

