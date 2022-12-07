<?php //

function getStepById($id){

    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('step'),
        'post_status' => 'publish',
        'post_id' => $id,
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();


        if(get_the_ID() == $id){
            $results = get_Step_detail_formated();
        }
    }
    return $results;    
}




function get_all_Steps(){
    $results= array();
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('step'),
        'post_status' => 'publish',

    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        array_push($results, get_Step_detail_formated());
        
    }
    return get_sorted_step_list($results);   
}



function get_Step_detail_formated(){
    $post = get_post();
    return array ('id' => get_the_ID(),
    'title' => get_the_title(),
    'thumbnail' => getThumbnailFormated(get_the_ID()),
    'content' => get_the_content(),
    'step_number' => get_field('step_number')
);
}

function get_step_page_data(){
    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('page'),
        'post_status' => 'publish',
        'pagename' => 'parcours'
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        $results= get_step_page_data_formated();
        
    }
    return $results;    
}

function get_step_page_data_formated(){
    return array(
        'id' => get_the_ID(),
        'title' => get_field('title_page'),
        'seo' => get_seo_data(),
        'content' => convert_content_list(get_field('content_list'))

    );
}

function get_sorted_step_list($step_list){

    for ($i = 0; $i < count($step_list) - 1 ; $i++){
        
        if($step_list[$i]['step_number'] > $step_list[$i + 1]['step_number'] ){
            $temp = $step_list[$i];
            $step_list[$i] = $step_list[$i + 1];
            $step_list[$i + 1] = $temp;

            /*updating the value of j = -1
            so after getting updated for j++
            in the loop it becomes 0 and
            the loop begins from the start.*/
            $i = -1;

        }
    }

    return $step_list;

}
?>