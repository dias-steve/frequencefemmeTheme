<?php

function postRoute() {
    register_rest_route('io/v1','posts/(?P<id>\d+)',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getPostDetail' // notre fonfonction 
    ));

    register_rest_route('io/v1','postcat/(?P<id>\d+)',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getPostCatDetail' // notre fonfonction 
    ));

    register_rest_route('io/v1','posts',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAllPosts' // notre fonfonction 
    ));

    register_rest_route('io/v1','posts',array(
        'methods' => 'POST',
        'callback' => 'getAllPostsPaged' // notre fonfonction 
    ));

    register_rest_route('io/v1','postcat',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getAllPostCat' // notre fonfonction 
    ));

    register_rest_route('io/v1','one_page_article',array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'getOnePageActicle' // notre fonfonction 
    ));

    
}
add_action('rest_api_init', 'postRoute');

function getPostDetail($data){
    return getPostById($data['id']);
}

function getPostCatDetail($data){
    return getPostByCat($data['id'],1,-1);
}

function getAllPosts(){

    return get_all_posts(1, -1);
        
     

}
function getAllPostsPaged($data){
    //TODO: implement the getting of params from the post resquest
    $nbItemPerPage = 8;
    if($data['page']){
        
      
        return  getPostByCat($data['categoriesfilter'],$data['page'],$nbItemPerPage);
  

    }else{
        return  getPostByCat($data['categoriesfilter'],1,$nbItemPerPage);
    }
}

function getAllPostCat(){
    return get_all_postCat();
}

function getOnePageActicle(){
    return io_get_one_page_article_data();
}