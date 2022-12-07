<?php
//footer register
function register_my_menus() {
    register_nav_menus(
      array(
        'footer_menu_social' => __( 'Footer Menu Social' ),
        'footer_menu_legal' => __( 'Footer Menu Legal' ),
        'footer_menu_aide' => __( 'Footer Menu Aide' ),

       )
     );
   }
   add_action( 'init', 'register_my_menus' );




function createMenuItem($id, $name, $link, $thumbnailUrl, $thumnailAlt, $parent, $haveChildren){
    $menuItem = array(
        "term_id" => $id,
        "name" => $name,
        "parent" => $parent,
        "link" => $link,
        "slug" => $name,
        "description" => "",
        "thumbnail" => array(
            "url" => $thumbnailUrl,
            "alt" => $thumnailAlt,
        ),
        "have_childs" => $haveChildren
        );
     
    return $menuItem;
}



function getMenuNav($id_menu){
    $MenuNavItemRaw =wp_get_nav_menu_items($id_menu);
    $menuformated = array();

    foreach( $MenuNavItemRaw as $item){
        $link_item = $item->object === "custom"? $item->url : '/'.$item->object.'/'.$item->object_id;
      
        $new_item =  createMenuItem(
            $item->ID,
            $item->title,
            $link_item,
            false,
            false,
            (int)$item->menu_item_parent,
            haveChildMenuItem($item->ID,$MenuNavItemRaw)
        );
        $new_item['post_type'] = $item->object;
        $new_item['id_post'] =$item->object_id;


        array_push($menuformated, $new_item);
    }
  
  return        $menuformated;

}

function haveChildMenuItem($id_menu_item,$MenuNavItemRaw){

    foreach($MenuNavItemRaw as $item){
        if ($item->menu_item_parent == $id_menu_item){
            return true;
        }
    }
    return false;
}


function getFooterMenu(){
 
    $menu_list = wp_get_nav_menus();

    $list_menu_footer = array();
    foreach( $menu_list  as $menu){
        $menu_name = $menu->name;
        $new_menu_item = array(
            'name'=>  $menu_name,
            'childrens' =>  getMenuNav($menu->term_id)
        );
        array_push($list_menu_footer, $new_menu_item);

    }
    return $list_menu_footer;
}

function getFooterData(){
    return getFooterMenu();
};
