<?php //

function getActionById($id){

    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('actions'),
        'post_status' => 'publish',
        'post_id' => $id,
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();


        if(get_the_ID() == $id){
            $results = get_Action_detail_formated();
        }
    }
    return $results;    
}


function getActionByCat($idCat, $nbPage ,$nbPost){
    if($idCat){
        $results = array(
            'page' => array( 
                'current_page' => $nbPage,
                'page_nb_max' => 10
            ),
            'list_post' => array()
        );
        $mainQuery = new WP_Query(array(
            'posts_per_page' => $nbPost,
            'post_type' => array('actions'),
            'post_status' => 'publish',
            'paged'=> $nbPage,
            'tax_query' => array(
                array(
                    'taxonomy' => 'action_cat',
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
            array_push($results['list_post'],  get_Action_detail_formated());
            
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

function get_all_actions(){
    $results= array();
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('actions'),
        'post_status' => 'publish',

    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        array_push($results, get_Action_detail_formated());
        
    }
    return $results;   
}

function get_all_actionCat(){
    return get_all_terms_list_reformat( 'action_cat', '/actioncat' );
}

function get_Action_detail_formated(){
    return array ('id' => get_the_ID(),
    'title' => get_the_title(),
    'thumbnail' => getThumbnailFormated(get_the_ID()),
    'author' => get_the_author(),
    'content' => get_the_content(),
    'taxinomie' =>  get_term_list_reformat(get_the_ID(),'action_cat', '/actioncat'),
    'tag_list' =>  get_term_list_reformat(get_the_ID(),'post_tag','/tag'),
    'post_type' => get_post_type(),
    'link' => get_the_post_link_front(),
    'seo' => get_seo_data(),
);
}
?>