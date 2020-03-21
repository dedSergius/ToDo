<?php


namespace App\Utility;


use App\Models\Tasks;

class Paginator
{
    /**
     * @var int
     */
    public static $limit = 3;

    public static function getPagesCounts(){
        $TO = new Tasks();
        return ceil($TO->getTasksCount()[0]->count / self::$limit);
    }

    public static function getPageNumber(){
        return Input::get("pn");
    }



}