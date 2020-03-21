<?php

namespace App\Models;

use App\Core\Model;
use Exception;


/**
 * Task Model:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Tasks extends Model
{
    public function getTasks($field = "id", $direction = "ASC", $start = 0, $quantity = 3){
        return $this->Db->query("SELECT * FROM `tasks` ORDER BY `{$field}` {$direction} LIMIT {$start},{$quantity}")->results();
    }

    public function getTask($id){
            return $this->Db->query("SELECT * FROM `tasks` WHERE `id` =  {$id}")->results();
    }

    public function getTasksCount(){
        return $this->Db->query("SELECT count(*) AS count FROM `tasks`")->results();
    }

    public function createTask(array $fields)
    {
        if (!$taskID = $this->Db->query("INSERT INTO `tasks` (`id`, `username`, `email`, `text`, `status`, `edited`) VALUES (NULL, '{$fields["username"]}', '{$fields["email"]}', '{$fields["text"]}', '0', '0')")) {
            throw new Exception("Ошибка создания таска");
        }
        return $taskID;
    }

    public function updateTask(array $fields)
    {
        if (!$taskID = $this->Db->query("UPDATE `tasks` SET `text` = '{$fields["text"]}', `edited` = '1' WHERE `tasks`.`id` = {$fields["id"]}")) {
            throw new Exception("Ошибка обновления таска");
        }
        return $taskID;
    }

    public function doneTask(array $fields)
    {
        if (!$taskID = $this->Db->query("UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = {$fields["id"]}")) {
            throw new Exception("Ошибка обновления таска");
        }
        return $taskID;
    }

}

