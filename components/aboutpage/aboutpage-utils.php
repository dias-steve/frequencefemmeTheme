<?php
function  getAboutPageData() {
    $results = null;
    
    $mainQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => array('page'),
        'post_status' => 'publish',
        'pagename' => 'about'
        
    ));

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        $results= get_about_page_data();
        
    }
    return $results;    

}

function get_about_page_data() {

    $bloc_list= splitBlocContentAbout(get_field('about_content'));
 

    // splite bloc

    $result = array(
        'bloc_hero' => get_bloc_hero_data(),
        'bloc_list_befor_aboutsec' => $bloc_list['before_aboutsec'],
        'bloc_list_after_aboutser' =>  $bloc_list['after_aboutsec'] ,
        'bloc_member' =>  get_about_member_data(),
        'bloc_aboutsec' => get_aboutsec_data()
    ); 
    return $result;
}

function get_about_page_hero_data(){
    
}

function get_bloc_hero_data(){
    $result = array(
        'title' => get_field('about_hero_title'),
        'paragraph' => get_field('about_hero_paragraph') ,
        'image' => get_field('about_hero_image'),
    );
    return $result;
}

function get_about_member_data(){
    $result = array(
        'donation_url'=> get_field('donation_url'),
        'image' => get_field('image_membre'),
        'member_description' => get_field('member_description'),
        'donation_description'=> get_field('donation_description'),
    );
    return $result;
}

function get_aboutsec_data(){
    $result = array(
        'missions_list'=> get_field('missions_list') ,
        'slogan' =>  get_field('slogan'),
        'image_up' => get_field('image_up'),
        'image_down' => get_field('image_down'),
    );

    return $result;
}

function splitBlocContentAbout($blocs_list){
    $result = array(
        'before_aboutsec' => array(),
        'after_aboutsec' => array()
    );

    if(is_array($blocs_list)){

        foreach($blocs_list as $bloc){
            if($bloc['before_aboutsec']){
                array_push($result['before_aboutsec'], $bloc);
            }else{
                array_push($result['after_aboutsec'], $bloc);
            }
        }
    }
    return $result;
}




