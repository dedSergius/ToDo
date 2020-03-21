<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\AddTask;
use App\Utility\Redirect;

class Add extends Controller
{
    function index(){
        $this->view->render("add", [
            "title" => "Добавить задачу в ".APP_NAME
        ]);
    }

    function create(){
        if(AddTask::add())
            Redirect::to(APP_URL);
        Redirect::to(APP_URL. "add");
    }
}