<?php
    function getCategoryDetail($id){
        $cat = get_category( $id );
        return array( 'id'=>$id,'name' => $cat->name, 'slug' => $cat->slug );
    }
    function convertIdCategoryListToDetail ($idList){
        $result = array();
        foreach ($idList as $id){
            array_push($result, getCategoryDetail($id));

        }
        return $result;
    }

    function getThumbnailFormated($idPost){
        $thumbnail_id = get_post_thumbnail_id($idPost);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
        return array( 'alt' => $alt, 'url' => get_the_post_thumbnail_url($idPost));
    }

    function getListPostByTag($tagId){
        $results= array();
        $mainQuery = new WP_Query(array(
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'term_id',
                    'terms'    =>$tagId,
                    
                ),
            ),
        ));
    
        while($mainQuery->have_posts()) {
            $mainQuery->the_post();
            array_push($results, array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'post_type' => get_post_type(),
                'link' => get_the_post_link_front(),
            ));
            
        }
        return $results;   
    }

    function get_the_post_link_front(){
        return '/'.get_post_type().'/'.get_the_ID();
    }


    function get_term_list_reformat($postId, $term_slug, $prefixlink){
        $list_term = get_the_terms($postId,$term_slug);
        $results = array();
    
        if(is_array($list_term)){
       foreach($list_term as $term){
        array_push($results, get_terms_reformated($term, $prefixlink));
       }
    }
       return $results;
    }

    function get_all_terms_list_reformat($slug_taxinomie, $prefixlink){
        $list_term = get_terms( $slug_taxinomie );
        $results = array();
        if(is_array($list_term)){
       foreach($list_term as $term){
        array_push($results,get_terms_reformated($term, $prefixlink));
       }
    }
       return $results;
    }

    function get_terms_reformated($term, $prefixlink){
        if($term){
        $term->link = $prefixlink.'?catid='.$term->term_id.'&catname='.$term->name;
        }
        return $term;
    }
    

    function get_seo_data(){
        return array(
            'title_seo' => get_field('title_seo'),
            'meta_description_seo' => get_field('meta_description_seo'),
            'other_data_seo' => get_field('other_data_seo'),
        );
    }

    function convert_termlist_to_formated( $term_list, $prefixlink){
        $results = array();
       if(is_array($term_list)){
           foreach($term_list as $term){
               $termformated = get_terms_reformated($term, $prefixlink);
               array_push($results, $termformated);
           }
       }
       return $results;
   }

    function convert_post_to_formated_post($post){
        if($post->post_type && $post->ID){
            $post->link = '/'.$post->post_type.'/'.$post->ID;
            return $post;
        }else{
            return $post;
        }
    }


