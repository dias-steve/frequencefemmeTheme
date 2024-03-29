<?php
function getHomePageData(){
    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('page'),
        'post_status' => 'publish',
        'pagename' => 'home'
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        $results= get_home_page_data();
        
    }
    return $results;    
}

function get_home_page_data(){
    return array(
        'id' => get_the_ID(),
        'title' => get_field('title_page'),
        'seo' => get_seo_data(),
        'content' => convert_content_list(get_field('content_list')),

    );
}







