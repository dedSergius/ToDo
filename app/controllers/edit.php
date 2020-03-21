<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\EditTask;
use App\Models\Tasks;
use App\Utility\Auth;
use App\Utility\Input;
use App\Utility\Redirect;

class Edit extends Controller
{
    function index(){
        Auth::checkAuthenticated();
        $TO = new Tasks();
        $task = $TO->getTask(Input::get("id"));
        $this->view->render("edit", [
            "title" => "Редактировать задачу",
            "task" => $task
        ]);
    }

    function edit(){
        Auth::checkAuthenticated();
        if(EditTask::edit())
            Redirect::to(APP_URL);
        Redirect::to(APP_URL. "edit");
    }

    function check(){
        Auth::checkAuthenticated();
        EditTask::done();
    }
}