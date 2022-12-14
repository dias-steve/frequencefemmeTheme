<?php

// add event date field to events post type
function add_post_meta_boxes() {
    add_meta_box(
        "post_metadata_events_post", // div id containing rendered fields
        "Numéro d'affichage de l'avis (Obligatoire)", // section heading displayed as text
        "post_meta_box_events_post", // callback function to render fields
        "reviews", // name of post type on which to render fields
        "normal", // location on the screen
        "high" // placement priority
    );
}
add_action( "admin_init", "add_post_meta_boxes" );

// save field value
function save_post_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
    update_post_meta( $post->ID, "review_order_number", sanitize_text_field( $_POST[ "review_order_number" ] ) );
}
add_action( 'save_post', 'save_post_meta_boxes' );

// callback function to render fields
function post_meta_box_events_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
    $advertisingCategory =  $custom[ "review_order_number" ][ 0 ];

    echo "<input type=\"number\" name=\"review_order_number\" value=\"".$advertisingCategory."\" placeholder=\"1\"/> ";
}