<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Tasks;
use App\Models\User;
use App\Utility;
use App\utility\Paginator;
use App\utility\Sort;

/**
 * Mainpage Controller:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Index extends Controller
{

    private $direction;
    private $field;

    /**
     * Index: Renders the mainpage (todolist) view.
     * @access public
     * @return void
     * @example register/index
     */
    function index()
    {
        $TO = new Tasks();
        if (Paginator::getPageNumber() == "") {
            $page_number = 1;
        } else if (Paginator::getPageNumber() != "" AND Paginator::getPageNumber() == 1)
            Utility\Redirect::to(APP_URL);
        else $page_number = Paginator::getPageNumber();
        $tasks = $TO->getTasks(Sort::getSortParams()[0], Sort::getSortParams()[1], (($page_number - 1) * Paginator::$limit));
        $userID = Utility\Session::get(Utility\Config::get("SESSION_USER"));
        if (!$User = User::getInstance($userID)){
            $userdata = null;
        } else $userdata = $User->data();
        $this->view->render("todolist", [
            "pages_count" => Paginator::getPagesCounts(),
            "page_number" => $page_number,
            "sf" => Sort::getSortParams()[0],
            "sd" => Sort::getSortParams()[1],
            "tasks" => $tasks,
            "title" => APP_NAME,
            "user" => $userdata
        ]);
    }
}

?>