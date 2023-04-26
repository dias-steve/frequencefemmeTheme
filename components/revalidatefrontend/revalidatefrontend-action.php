<?php
add_action('save_post','save_post_callback');
function save_post_callback($post_id){
$post = get_post( $post_id);

  
 $post->post_type;
 $url = get_theme_mod('revalidate_url');

 if($url && $url !== "" &&  $post->post_type && $post_id){
    httpGet((string)$url.'&path=/'.$post->post_type.'/'.$post_id);
 }

 if(revalidatePageSpecial($post->post_type,$post_id )){
    httpGet((string)$url.'&path='.revalidatePageSpecial($post->post_type,$post_id));
 }

//if you get here then it's your post type so do your things....
}

function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}

function revalidatePageSpecial($postType, $postId){
    //$homepageid = get_option('page_on_front');
    if($postType === 'page' && get_the_title($postId) === '[Home]'){
        return '/';
    }

    if($postType === 'page' && get_the_title($postId) === '[Contact]'){
        return '/contact';
    }

    if($postType === 'page' && get_the_title($postId) === '[Parcours]'){
        return '/parcours';
    }

    if($postType === 'page' && get_the_title($postId) === ' 	
    [Apropos]'){
        return '/apropos';
    }


    return false;
}