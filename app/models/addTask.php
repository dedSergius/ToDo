<?php

namespace App\Models;

use Exception;
use App\Utility;

/**
 * Task Create Model:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class AddTask
{
    private static $_inputs = [
        "username" => [
            "required" => true,
        ],
        "email" => [
            "required" => true,
            "filter" => "email",
        ]
    ];

    public static function add()
    {

        if (!Utility\Input::check($_POST, self::$_inputs)) {
            return false;
        }
        try {
            $Task = new Tasks;
            $taskID = $Task->createTask([
                "username" => htmlentities(Utility\Input::post("username")),
                "email" => htmlentities(Utility\Input::post("email")),
                "text" => htmlentities(Utility\Input::post("text")),
            ]);

            Utility\Flash::success(Utility\Text::get("TASK_CREATED"));
            return $taskID;
        } catch (Exception $ex) {
            Utility\Flash::danger($ex->getMessage());
        }
        return false;
    }

}
