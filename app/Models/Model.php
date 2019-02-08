<?php

namespace App\Models;

Class Model implements ModelInterface{

    public static function return($data){

        if($data){
            return json_encode(["success" => true, "data" => $data]);
        } else {
            return json_encode(["success" => false, "data" => $data]);
        }


    }

}
