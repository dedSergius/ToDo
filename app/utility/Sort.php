<?php


namespace App\Utility;


class Sort
{
    public static function getSortParams(){
        if(!Input::get("sf") == ""){
            if (in_array(Input::get("sf"), ["id","username","email", "status"])){
                $sf = Input::get("sf");
            } else $sf = "id";
        } else if (Cookie::get("sf")) {
            $sf = Cookie::get("sf");
        } else $sf = "id";

        if(!Input::get("sd") == ""){
            if (in_array(Input::get("sd"), ["ASC","DESC"])){
                $sd = Input::get("sd");
            } else $sd = "ASC";
        } else if (Cookie::get("sd")) {
            $sd = Cookie::get("sd");
        } else $sd = "ASC";

        return [$sf, $sd];
    }

    public static function setSortParams($field, $direction){
        $expiry = Config::get("COOKIE_DEFAULT_EXPIRY");
        Cookie::put("sf", $field, $expiry);
        Cookie::put("sd", $direction, $expiry);
    }
}