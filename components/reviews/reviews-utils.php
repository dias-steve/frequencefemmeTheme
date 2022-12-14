<?php 


function get_all_Reviews(){
    $results= array();
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('reviews'),
        'post_status' => 'publish',
        "orderby" => "meta_value",
        "order" => "ASC",
        "meta_key" => "review_order_number",

    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        array_push($results, get_reviews_detail_formated());
        
    }
    return $results;   
}

function get_reviews_detail_formated(){
    return array ('id' => get_the_ID(),
    'title' => get_the_title(),
    'thumbnail' => getThumbnailFormated(get_the_ID()),
    'content' => get_the_content(),
    'order_number' => get_post_meta(get_the_ID(), 'review_order_number', true),
  
);
}