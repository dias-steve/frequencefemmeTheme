<?php

    function convert_content_list ($content_list) {
        if(is_array($content_list)){
            for ($i = 0; $i < count($content_list); $i++) {
                if ($content_list[$i]["bloc_type"] == "path" ){
                    $content_list[$i]["step_list"] = get_all_Steps(); // steps-utils
                }
                if ($content_list[$i]["bloc_type"] == "path-detailed" ){
                    $content_list[$i]["step_list"] = get_all_Steps(); // steps-utils
                }

                if ($content_list[$i]["bloc_type"] == "review"){
                    $content_list[$i]["reviews_list"] = get_all_Reviews(); // steps-utils
                }

                if ($content_list[$i]["bloc_type"] == "contact-details"){
                    $content_list[$i]["contact_details"] =get_contact_details(); // steps-utils
                }

          
            }
        }
    
        return $content_list;
    }
