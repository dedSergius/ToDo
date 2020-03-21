<?php

namespace App\Models;

use Exception;
use App\Utility;

/**
 * Task Create Model:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class EditTask
{
    public static function edit()
    {

        try {
            $Task = new Tasks;
            $taskID = $Task->updateTask([
                "text" => htmlentities(Utility\Input::post("text")),
                "id" => htmlentities(Utility\Input::post("id")),
            ]);

            Utility\Flash::success(Utility\Text::get("TASK_UPDATE"));
            return $taskID;
        } catch (Exception $ex) {
            Utility\Flash::danger($ex->getMessage());
        }
        return false;
    }

    public static function done(){
        try {
            $Task = new Tasks;
            $taskID = $Task->doneTask([
                "id" => htmlentities(Utility\Input::post("id")),
            ]);

            Utility\Flash::success(Utility\Text::get("TASK_UPDATE"));
            return $taskID;
        } catch (Exception $ex) {
            Utility\Flash::danger($ex->getMessage());
        }
        return false;
    }

}
