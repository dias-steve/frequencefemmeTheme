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

    $bloc3 = get_home_page_bloc3();
    $termAction = get_field('actioncat');

 

    return array(
        'id' => get_the_ID(),
        'seo' => get_seo_data(),
        'title' => 'Accueil',
        'bloc3' => $bloc3,
        'bloc1' => get_home_page_bloc1(),
        'bloc6_membership' => get_home_page_bloc6_membership(),
        'bloc7_social_link' => get_home_page_bloc7_social(),
        'bloc4_apropos'=> get_home_page_bloc4(),
        'bloc2_list_post' => get_home_page_bloc2(),
  

        'bloc5_list_action'=> get_home_page_bloc5_action($termAction),
    );
}


function  get_home_page_bloc1() {
        return array(
            'title' => get_field('bloc1_title'),
            'description' => get_field('bloc1_description'),
            'thumbnail' => get_field('bloc1_image'),
            'bloc1_post' => convert_post_to_formated_post(get_field('bloc1_post')),
        );
}

function get_home_page_bloc2(){
    return array(
        'term' => get_terms_reformated(get_field('postcat'),'/postcat'),
        'list_articles' => getPostByCat(get_field('postcat')->term_id,1,3)['list_post'],
    );
}

//missions_list
function get_home_page_bloc3(){

    
    $result = array(
        'missions_list'=> get_field('missions_list') ,
        'slogan' =>  get_field('slogan'),
        'image_up' => get_field('image_up'),
        'image_down' => get_field('image_down'),
    );

    return $result;
}

function get_home_page_bloc4(){
    $result = array(
        'missions_list'=> get_field('missions_list') ,
        'slogan' =>  get_field('slogan'),
        'image_up' => get_field('image_up'),
        'image_down' => get_field('image_down'),
    );

    return $result;
}

function get_home_page_bloc5_action($term){

    $result = array(
        'term' => get_terms_reformated($term,'/actioncat'),
        'list_articles' =>  getActionByCat($term->term_id, 1 ,3)['list_post']

        //TODO:  Notice from wp >>>Trying to get property 'term_id' of non-object in <b>/home/viclhgv/www/wp-content/themes/unsecondsourire/components/homepage/homepage-utils.php</b> on line <b>95</b><br />
    );
    return $result;
}

function get_home_page_bloc6_membership(){
    $result = array(
        'donation_url'=> get_field('donation_url'),
        'image' => get_field('image_membre'),
        'member_description' => get_field('member_description'),
        'donation_description'=> get_field('donation_description'),
    );
    return $result;
}

function get_home_page_bloc7_social(){
    $result = array(
        array(
            'title' => 'Facebook',
            'url' => get_theme_mod('social_facebook')
        ),
        array(
            'title' => 'Instagram',
            'url' => get_theme_mod('social_instgram')
        )
    );


    return $result;
}

