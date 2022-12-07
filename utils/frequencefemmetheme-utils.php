<?php

    function convert_content_list ($content_list) {
        if(is_array($content_list)){
            for ($i = 0; $i < count($content_list); $i++) {
                if ($content_list[$i]["bloc_type"] == "path"){
                    $content_list[$i]["step_list"] = get_all_Steps(); // steps-utils
                }
            }
        }
    
        return $content_list;
    }
