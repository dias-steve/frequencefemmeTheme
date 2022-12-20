<?php function register_my_menus() {
    register_nav_menus(
      array(
        'footer_aide_sec' => __( 'Menu Footer section aide' ),
        'footer_legal_sec' => __( 'Menu Footer section légale' ),
        'footer_social_sec' => __( 'Menu Footer section sociale'),
        'menu_header_sec' => __('Menu Header')
       )
     );
   }
add_action( 'init', 'register_my_menus' );