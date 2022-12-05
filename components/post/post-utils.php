<?php

use LDAP\Result;

function getPostById($id){
    $results = null;
    
    $mainQuery = new WP_Query(array(
  
        'post_type' => array('post'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post_id' => $id,
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();


        if(get_the_ID() == $id){
            $results = get_post_detail_formated();
        }
    }
    return $results;
}

function getPostByCat($idCat, $nbPage, $nbposts){
    if($idCat){
        $results = array(
            'page' => array( 
                'current_page' => $nbPage,
                'page_nb_max' => 10,
                'nb_posts_found' => 1
               
            ),
            'list_post' => array()
        );
     

        $mainQuery = new WP_Query(array(
            'posts_per_page' =>  $nbposts,
            'post_type' => array('post'),
            'post_status' => 'publish',
            'paged'=> $nbPage,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $idCat,
                    
                ),
            ),
        ));
 
  
        
        while($mainQuery->have_posts()) {
        
          
            $results['page'] = array(
                'current_page' => $nbPage,
                'page_nb_max' => $mainQuery->max_num_pages,
                'nb_posts_found' => $mainQuery->found_posts
            );
            $mainQuery->the_post();
            array_push($results['list_post'],  get_post_detail_formated());
            
        }
        return $results;  
    }else{
        $results = array(
            'page' => array( 
                'current_page' => 1,
                'page_nb_max' => 1
            ),
            'list_post' => array()
        );
     
        return $results;  
    }
}

function get_all_post_paged($nbPage){

}

function get_all_posts($nbPage, $limitPostPerPage){
    $results= array(

    );
    $mainQuery = new WP_Query(array(
        'posts_per_page' => $limitPostPerPage,
        'post_type' => array('post'),
        'post_status' => 'publish',
        'order' => 'DESC',
        'paged'=> $nbPage

    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        
        array_push($results, get_post_detail_formated());
        
    }
    return $results;   
}

function get_all_posts_paged($nbPage, $limitPostPerPage){
    $results= array();
    $mainQuery = new WP_Query(array(
        'posts_per_page' => $limitPostPerPage,
        'post_type' => array('post'),
        'post_status' => 'publish',
        'order' => 'DESC',
        'paged'=> $nbPage
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        array_push($results, get_post_detail_formated());
    }

    return $results;
}

function  get_all_postCat(){
    return get_all_terms_list_reformat( 'category', '/postcat' );
}

function get_post_detail_formated(){

    $TermObjectList = get_term_list_reformat(get_the_ID(),'category', '/postcat');

    $idTermRelated = null;
    $TermObjectSetected = null;
    $idPost = get_the_ID();
    if(is_array($TermObjectList) && $TermObjectList[0]->term_id !== null){
        $idTermRelated =$TermObjectList[0]->term_id;
        $TermObjectSetected = $TermObjectList[0];

    }
    return array ('id' => get_the_ID(),
    'title' => get_the_title(),
    'thumbnail' => getThumbnailFormated(get_the_ID()),
    'author' => get_the_author(),
    'content' => get_the_content(),
    'taxinomie' =>  get_term_list_reformat(get_the_ID(),'category', '/postcat'),
    'tag_list' =>  get_term_list_reformat(get_the_ID(),'post_tag','/tag'),
    'post_type' => get_post_type(),
    'link' => get_the_post_link_front(),
    'date' => get_the_date(),
    'seo' => get_seo_data(),
    'excerpt' => get_the_excerpt(),
    'post_time' => array(
        'raw' => get_post_time()

    ),
    'related_posts' => array(
        'taxinomie' =>   $TermObjectSetected,
        'posts_list' => get_list_posts_related($idTermRelated, 3, get_the_ID())),
    'last_posts_list' => get_list_last_posts( 3, $idPost )
);}

function get_post_apercu_formated(){
    return array ('id' => get_the_ID(),
    'title' => get_the_title(),
    'thumbnail' => getThumbnailFormated(get_the_ID()),
    'taxinomie' =>  get_term_list_reformat(get_the_ID(),'category', '/postcat'),
    'tag_list' =>  get_term_list_reformat(get_the_ID(),'post_tag','/tag'),
    'post_type' => get_post_type(),
    'link' => get_the_post_link_front(),
    'date' => get_the_date(),
    'excerpt' => get_the_excerpt()
    );

}
function get_one_page_article_formated(){

    $seo = get_seo_data();
    $title = get_the_title();

    $blockList = get_field('blocs_list');
    $result_list = array();



    if (is_array($blockList)){
        foreach ($blockList as $block){
            $block_formated =convert_block($block);
            if( $block_formated){
                array_push($result_list, $block_formated );
            }
        }
    }
    return array(
        'seo' => $seo,
        'title' => $title,
        'content' => $result_list,
    );
}

function convert_block($block){
    switch ($block['bloc_type']) {
        case 'article_a_la_une':
            return array(
                'bloc_type' => 'article_a_la_une',
                'article_une'=>  getPostById($block['article_une']->ID),
                'list_last_posts' => get_list_last_posts(3,$block['article_une']->ID)
            );

        case 'liste_darticle':
            return array(
                'bloc_type' => 'liste_darticle',
                'articlecat_info'=> get_terms_reformated($block['article_cat'],'/postcat'),
                'list_articles' => getPostByCat($block['article_cat']->term_id,1,3)['list_post']
            );

        case 'liste_categorie_article':
            return array(
                'bloc_type' => 'liste_categorie_article',
                'list_articlecat' => convert_termlist_to_formated( $block['list_articlecat'], '/postcat')
            );
        
        default:
            return $block;
      }

}

function io_get_one_page_article_data(){
    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('page'),
        'post_status' => 'publish',
        'pagename' => 'one_page_article'
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        $results = get_one_page_article_formated();
    }
    return $results;    
}

function get_list_posts_related($idCat, $nbposts, $idpost) {
    if($idCat){
        $results= array();
        $mainQuery = new WP_Query(array(
            'posts_per_page' =>  $nbposts,
            'post_type' => array('post'),
            'post_status' => 'publish',
            'category' => 4,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $idCat,
                    
                ),
            ),
        ));

        while($mainQuery->have_posts()) {
            $mainQuery->the_post();
           if(get_the_ID() !== $idpost)
            array_push($results, get_post_apercu_formated());
            
        }
        return $results;  
    }else{
        return null;
    }
}

function get_list_last_posts($nbposts, $idpost) {
    
        $results= array();
        $mainQuery = new WP_Query(array(
            'posts_per_page' =>  $nbposts,
            'post_type' => array('post'),
            'post_status' => 'publish',
            'orderby'   => array(
                'date' =>'DESC',
                'menu_order'=>'DESC',
                /*Other params*/
            )),
        );

        while($mainQuery->have_posts()) {
            $mainQuery->the_post();
           if(get_the_ID() !== $idpost)
            array_push($results, get_post_apercu_formated());
            
        }
        return $results;  

}